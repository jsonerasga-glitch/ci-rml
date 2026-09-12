# RML++ Calibration Workflows

## 1. What this document describes

This document explains how each calibration module currently works in the RML++ CodeIgniter application and how the workflow should be represented in the Laravel + React replacement.

It describes:

- What is being calibrated.
- What information the operator enters.
- Which reference standards are selected.
- What measurements are recorded.
- What calculations and uncertainty concepts are used.
- How a worksheet becomes a certificate.
- How correction and verification work.
- Which current source files must be used to confirm exact fields and formulas.

Important: the application stores several calculated payloads as JSON or serialized values such as `calculatedData`, `calculatedValues`, `specificationsArray`, and `environmentArray`. The exact equation, decimal place, coverage factor, acceptance limit, and status value must be confirmed from the matching JavaScript formula file and the production database before rewriting it. This guide is a functional explanation, not a replacement for technical-method approval.

## 2. Common calibration process

All major modules follow the same lifecycle.

### Step 1: Receive and identify the equipment

The operator records the customer and equipment identity. Common fields include:

- Customer and address.
- Technical service request or job number.
- Certificate number.
- Date received.
- Date calibrated.
- Recommended due date or calibration interval.
- Place of calibration.
- Equipment description/type.
- Manufacturer.
- Model number.
- Serial number.
- Equipment or asset ID.
- Measurement range and unit.
- Resolution/readability.
- Environmental conditions such as temperature, relative humidity, and pressure.

The exact field set varies by module. Do not use one generic database record for fields that have different meanings or units.

### Step 2: Perform preliminary inspection

The operator records whether the equipment is acceptable for calibration before measurements are taken. Existing worksheets can include preliminary inspection checkboxes, remarks, accessories, condition, and identification checks.

The replacement UI should show inspection results before the measurement section and prevent a final certificate if a required inspection item is incomplete.

### Step 3: Select the reference standard

The operator selects an active standard/reference record. A standard normally contains:

- Description/type.
- Manufacturer.
- Model or class.
- Serial number.
- Identification number.
- Calibration certificate number.
- Calibration date/provider.
- Uncertainty.
- Resolution/readability.
- Validity/status.
- Module-specific values such as nominal values, test points, drift, MPE, PAB, or uncertainty components.

The selected standard must be saved with the worksheet so later changes to the master standard do not silently change an existing certificate.

### Step 4: Record measurements

Measurement tables normally contain one or more nominal/test points and repeated readings from:

- The reference standard.
- The unit under calibration (UUC).
- Environmental sensors.
- Multiple positions, loads, directions, or conditions.

The UI must support dynamic rows where the current worksheet supports them. Every reading must retain its unit, test point, sequence/position, and source.

### Step 5: Calculate results

Typical calculated values include:

- Mean or average reading.
- Error/deviation.
- Correction.
- Interpolated correction.
- Repeatability.
- Standard deviation.
- Resolution uncertainty.
- Reference-standard uncertainty.
- Drift or influence-factor uncertainty.
- Combined standard uncertainty.
- Expanded uncertainty.
- Effective degrees of freedom and coverage factor where applicable.
- Pass/fail or conformance result.

The server must recompute all authoritative values. The React UI may calculate live previews, but submitted results must be checked against the server calculation.

### Step 6: Review and complete

The operator assigns or records the calibrator and verifier/checker. Remarks, images, logos, and configurable certificate statements are added. The worksheet is saved as draft until all required data is complete.

### Step 7: Correction and verification

The current controllers expose correction and verification actions. The replacement should implement explicit transitions:

```text
Draft
  -> Submitted for verification
  -> Needs correction
  -> Corrected
  -> Verified
```

The exact status names must be taken from the existing data. Every transition must store the actor, timestamp, comment, and previous/new status. A verified record must be locked unless an authorized correction process reopens it.

### Step 8: Preview and certificate

The current application renders HTML print views and uses Dompdf for preview/download. The replacement must provide:

- Browser preview.
- Printable view.
- Draft PDF, if supported by the module.
- Final certificate PDF.
- Correct logos and signatures.
- Correct page breaks and table formatting.
- Stored certificate data that is reproducible later.

## 3. Shared calculation concepts

### 3.1 Average

For repeated numeric readings, the current formula files generally remove empty/non-numeric values and calculate the arithmetic mean:

```text
average = sum(valid readings) / number of valid readings
```

The implementation must define behavior for zero valid readings and must not silently treat an invalid value as zero.

### 3.2 Deviation/error

Many modules use a difference between a measured/average value and a nominal or reference value:

```text
deviation = average reading - reference/test point
```

The sign convention must be retained per module. Do not change it to absolute value unless the source method does so.

### 3.3 Standard deviation and repeatability

Several formula files use sample standard deviation:

```text
s = sqrt(sum((reading - average)^2) / (n - 1))
```

Repeatability is then derived by dividing the standard deviation by a module-specific factor based on the number of trials. The factor is not universal; confirm it from the module formula file.

### 3.4 Type A and Type B uncertainty

The uncertainty budget may contain:

- Type A repeatability from repeated observations.
- UUC resolution/readability.
- Reference-standard certificate uncertainty divided by a coverage factor.
- Reference-standard resolution.
- Drift.
- Environmental influence factors.
- Temperature/humidity/pressure effects.
- Geometry or positioning effects.
- Balance or comparator effects.

Components are normally combined by root-sum-of-squares, then multiplied by a coverage factor to produce expanded uncertainty. The exact component list differs by module.

### 3.5 Rounding

Do not round intermediate values prematurely. Store sufficient precision, apply the source rounding rules at the display/certificate boundary, and test the output against existing certificates.

## 4. Module: Single-range electronic balance / electrical meter workflow

### Purpose

The single-range electronic balance/electronic measurement workflow compares unit-under-test readings against selected standards and produces error, correction, uncertainty, and conformance information.

### Current source

- Controller: `app/Controllers/ElectController.php`
- Legacy views: `app/Views/SingleRangeElectronicBalance/`
- Models: `app/Models/ElectModel_1.php`, `ElectModel_2.php`, `ElectModel_3.php`, and `ElectModel_image.php`
- Related JavaScript: `public/js/module1-v1.2.6.js`, `module1Formulas.js`, and related module scripts

### Operator inputs

- Certificate number.
- Customer and address.
- Equipment identity and range.
- Calibration dates and due date.
- Environmental conditions.
- Selected standard.
- Standard serial/certificate details.
- Test points and repeated readings.
- Calibrator/checker/verifier.
- Remarks and images.

The controller explicitly receives multiple uncertainty values such as `uncertain1` through `uncertain8`; these must be mapped to named uncertainty components in the replacement rather than left as unexplained positional fields.

### Measurement process

1. Select an active standard record.
2. Define the test point/range.
3. Enter repeated standard and UUC readings.
4. Calculate averages and deviations.
5. Record graph data where the current worksheet uses it.
6. Review uncertainty rows and calculated result.
7. Save the calculation payload and worksheet metadata.

### Output

- Measurement table.
- Error/correction values.
- Uncertainty budget.
- Graph where applicable.
- Certificate/print view.
- Draft/final PDF.

## 5. Module: Electronic balance

### Current source

- Controller: `app/Controllers/ElectronicBalanceController.php`
- Views: `app/Views/ElectronicBalance/`
- Models: `app/Models/ElectronicBalanceModel.php`, standard balance models

### Purpose

The electronic balance workflow compares balance indications against active standard values across selected load/test points. It records calculated data and may attach images to the worksheet.

### Operator inputs

- Certificate number.
- Customer and equipment metadata.
- Balance manufacturer/model/serial/ID.
- Capacity/range and readability/resolution.
- Environmental conditions.
- Active standard selection.
- Standard serial number and standard values.
- Test-point readings and repetitions.
- Calibrator and verifier information.
- Remarks/images.

### Process

1. Load only active standards.
2. Select a standard and retrieve its details/values by serial or ID.
3. Enter balance readings for each requested test point.
4. Calculate average, deviation/error, correction, repeatability, and uncertainty components according to the current formula payload.
5. Save the worksheet and any images in one logical operation.
6. Preview/print/download the certificate.

### Special behavior to preserve

- The current controller has a certificate-number checker.
- Standard values are retrieved separately from standard details.
- Image upload can update the worksheet after creation.
- PDF generation supports preview and download modes.
- Correction verification changes worksheet state and must be audited.

## 6. Module: Weighing scale

### Current source

- Controller: `app/Controllers/WeighingScaleController.php`
- Views: `app/Views/WeighingScale/`
- Related models: weighing-scale model and shared electrical standard models

### Purpose

The weighing-scale workflow verifies scale indication at selected loads or test points using reference standards. It supports calculated values, images, PAB logo selection, remarks, correction, and verification.

### Operator inputs

- Customer, address, certificate number.
- Scale description, manufacturer, model, serial number, equipment ID.
- Capacity/range, unit, resolution/readability.
- Location/place of calibration.
- Calibration dates and due date.
- Environmental conditions.
- Standard used and selected standard values.
- Applied load/test point.
- Scale indication/repeated readings.
- Calibrator, checker, verifier.
- PAB logo choice, images, and remarks.

### Process

1. Identify the scale and confirm capacity/range.
2. Select the active standard/load values.
3. Apply each test load and enter the scale indication.
4. Calculate average indication, error/correction, and uncertainty.
5. Review whether the result meets the configured acceptance rule.
6. Save the calculated values payload.
7. Produce a report/certificate with the selected PAB logo and optional images.

### Special behavior to preserve

- `PabLogoUpdate` is a separate current action.
- `updatePlaceholder` and `updateWord` modify certificate text/remarks.
- There are both worksheet and print-specific views.
- `generateReport` supports draft, preview, and download modes.

## 7. Module: Test weight

### Current source

- Controller: `app/Controllers/TestWeightController.php`
- Views: `app/Views/TestWeight/`
- Models: `TestWeightModel`, `TestWeightMPEModel`, `TestWeightPABModel`, `TestWeightSensitivityTestModel`, `TestWeightAlloyModel`, `TestWeightStandardDetailsModel`, and `TestWeightStandardValuesModel`
- Formula files: `public/js/module9Formulas.js`, `module9FormulasRev2-v2.0.1.js`, plus module 9 UI script

### Purpose

Test-weight calibration determines the conventional mass or calibrated value of weights by comparing them with reference weights using a balance/comparator. It also supports MPE, PAB, alloy, sensitivity, air-density, buoyancy, and uncertainty data.

### Master data required

- Test-weight standard description, manufacturer, type/class.
- Serial number and certificate number.
- Previous air density.
- Date of calibration and provider.
- Nominal value, unit, marking, conventional value, uncertainty, and MPE.
- Alloy information.
- PAB scope/classification/range/method records.

### Worksheet inputs

- Customer and equipment identity.
- Weight class/approximate class.
- Nominal weight and unit.
- Selected standard weights.
- Standard and sample markings/serial/ID/manufacturer.
- Balance/comparator identity and resolution.
- Air density and environmental values.
- Density of sample/reference.
- Previous calibration data where required.
- Repeated weighing observations.
- Calibrator/encoder/checker/verifier.
- Images, remarks, and certificate statements.

### Measurement process

1. Select standard weights matching the nominal value/class.
2. Confirm standard certificate, uncertainty, and validity.
3. Record the balance/comparator and environmental conditions.
4. Record repeated comparison weighings.
5. Calculate average differences and conventional mass.
6. Apply buoyancy/air-density correction where the selected method requires it.
7. Calculate repeatability and uncertainty components.
8. Compare the result against the applicable MPE/PAB rule.
9. Save the worksheet and generate the certificate.

### Sensitivity test

The current sensitivity-test view includes empty/full readings for multiple trials, empty/full standard deviations, sensitivity-weight delta, uncertainty of sensitivity weight, pooled value, minimum/maximum/difference values, resolution values, and date. This is a separate supporting record and should be modeled as a child resource of the relevant standard or worksheet.

### Formula concepts visible in the source

The module 9 formulas include water density, air density, buoyancy/conventional-mass factors, evaporation uncertainty, repeatability, combined uncertainty, and expanded uncertainty. The two formula versions must be compared before migration; do not assume the newer file is automatically the approved method.

## 8. Module: Pressure gauge

### Current source

- Controller: `app/Controllers/PressureGaugeController.php`
- Views: `app/Views/PressureGauge/`
- Related source: `app/Views/BourdonTubeIndustrialPressureGauge/`
- Conversion: `public/js/pressureConvert.js`
- Models: `PressureGaugeModel`, `PressureGaugeStandardModel`, `PressureGaugeStandardValueModel`

### Purpose

The pressure-gauge workflow applies reference pressure values to the gauge and records the gauge indication for increasing/decreasing or other configured points. It converts units and produces error/correction and uncertainty information.

### Operator inputs

- Gauge manufacturer, model, serial number, range, class, and unit.
- Customer/job/certificate data.
- Place and dates of calibration.
- Pressure source/standard and certificate details.
- Pressure test points.
- Applied/reference pressure.
- Gauge readings, increasing/decreasing direction, and repetitions.
- Ambient pressure, temperature, and humidity where required.
- Calibrator/checker/verifier.
- Images and remarks.

### Process

1. Choose a pressure standard and its active values.
2. Choose the working unit.
3. Convert reference values into the working unit using the approved conversion table.
4. Apply pressure at each point and record the gauge indication.
5. Repeat in the required direction(s).
6. Calculate average, error/correction, hysteresis or repeatability where supported.
7. Calculate uncertainty and compare with the configured acceptance rule.
8. Preview and issue the certificate.

### Special behavior

`pressureConvert.js` contains conversion matrices and named units including atm, bar, kPa, psi, mmHg, MPa, kg/cm², inHg, inH₂O, mH₂O, mmH₂O, mbar, and Pa. The replacement must use an explicit unit registry and test every supported conversion pair.

## 9. Module: Digital thermometer

### Current source

- Controller: `app/Controllers/DigitalThermometerController.php`
- Views: `app/Views/DigitalThermometer/`
- Formula files: module 10 scripts, including `module10Formulas.js`
- Standards: `DigitalThermometerModel`, `TemperatureSource`, `TemperatureRecorderModel`, and related standard models

### Purpose

The digital-thermometer workflow compares the thermometer under test with a reference temperature standard at one or more temperature points. It supports sensor/source information, standard values, environmental data, previous tables, uncertainty, correction, and certificate output.

### Operator inputs

- Customer and certificate information.
- Thermometer/sensor type.
- Manufacturer, model, serial number, equipment ID.
- Range, readability/resolution, classification.
- Calibration procedure and place.
- Immersion depth.
- Sensor construction/type and liquid-in-glass/partial-immersion details where applicable.
- Active temperature source/reference standard.
- Temperature test points and repeated readings.
- Ambient temperature, RH, and pressure.
- Calibrator/checker/verifier.
- Images, remarks, and certificate statements.

### Measurement process

1. Select the active reference temperature source/standard.
2. Stabilize the source and record the environmental/medium conditions.
3. Place the UUC and reference sensor according to the approved procedure.
4. Record reference and UUC readings at each test point.
5. Calculate average, correction/error, interpolation correction where needed, repeatability, and uncertainty.
6. Save the specification, environmental, and calculated-value payloads.
7. Generate preview/print/PDF output.

### Formula concepts visible in the source

The module 10 formula file includes average, mean, interpolation correction, corrected value, deviation, standard deviation, repeatability, UUC resolution, reference-standard uncertainty, influence factors, drift, combined uncertainty, and expanded uncertainty. Interpolation must be tested at points between approved reference values and at boundary points.

## 10. Module: Thermo-hygrometer

### Current source

- Controllers: `Thermo_HygrometerController.php`, `ThermoController.php`
- Views: `app/Views/Thermohygrometer/` and `app/Views/Thermo_Hygrometer/`
- Models: `Thermo_HygrometerModel`, `ThermoModel`, `ThermoStandard`, `ThermoStandardAddDriftModel`, `ThermoStandardAddDriftPRTModel`, `ThermoStandardAddTestPointsModel`, and `ThermoChamberModel`
- Formula files: module 11/12 scripts as used by the relevant view

### Purpose

The thermo-hygrometer workflow calibrates temperature and relative-humidity channels, commonly at chamber points and possibly for internal/external sensors. It can use chamber instability/inhomogeneity and reference standards.

### Operator inputs

- Customer and equipment identity.
- Sensor type and internal/external channel selection.
- Manufacturer/model/serial/equipment ID.
- Temperature and RH range/resolution.
- Chamber selection.
- Reference thermo-hygrometer/thermometer standard.
- Chamber instability and inhomogeneity values.
- Temperature and RH test points.
- Internal/external UUC readings.
- Reference readings and repetitions.
- Ambient conditions.
- Calibration personnel and verifier.
- PAB logo, remarks, previous results, and images.

### Measurement process

1. Select a valid reference standard and chamber.
2. Confirm chamber serial number, temperature instability/inhomogeneity, and RH instability/inhomogeneity.
3. Stabilize at each set point.
4. Record reference and UUC temperature readings.
5. Record reference and UUC RH readings.
6. Repeat for internal/external channels as configured.
7. Calculate averages, corrections, channel-specific uncertainty, and conformance.
8. Review previous calibration values when the worksheet supports a previous/down/full comparison.
9. Produce certificate and optionally include PAB logo.

### Special behavior

The current print view has separate display controls for sensor, in/out temperature, in/out RH, and all data. The React certificate preview should expose the same controlled sections without changing the stored result.

## 11. Module: Temperature controller

### Current source

- Controllers: `TemperaturecontrollController.php`, `TempControlController.php`
- Views: `app/Views/TemperatureControll/`

### Purpose

The temperature-controller workflow checks the controller’s displayed or controlled temperature against a reference at configured points. It is distinct from the thermo-hygrometer because its UUC is a controller/indicating-control device rather than a combined temperature/RH instrument.

### Operator inputs

- Customer, certificate, equipment identity, and range.
- Controller set point and indication.
- Reference standard and standard readings.
- Temperature points and repetitions.
- Environmental data.
- Personnel, verifier, remarks, and images.

### Measurement process

1. Select the active temperature reference.
2. Set the controller to each approved point.
3. Allow stabilization.
4. Record set point, controller indication, and reference reading.
5. Calculate indication error/correction and uncertainty.
6. Compare against the applicable limit.
7. Save and generate the certificate.

## 12. Module: Enclosure / temperature enclosure

### Current source

- Controller: `app/Controllers/EnclosureController.php`
- Views: `app/Views/Enclosure/`
- Standard model: `TemperatureRecorderModel`

### Purpose

The enclosure workflow evaluates temperature distribution or sensor readings inside an enclosure, incubator, freezer, chamber, or related equipment using a temperature reference/recorder.

### Operator inputs

- Enclosure description, manufacturer, model, serial, and ID.
- Customer and certificate data.
- Set-point/range and location.
- Reference temperature recorder/standard.
- Sensor positions or diagram.
- Environmental and chamber conditions.
- Temperature observations for each position/time point.
- Personnel, verifier, remarks, and diagram/image.

### Measurement process

1. Select the active temperature recorder/reference.
2. Place sensors in the configured positions.
3. Set the enclosure to the requested operating point.
4. Wait for stabilization and record each sensor position.
5. Calculate average, maximum/minimum, spread/distribution, correction, and uncertainty where configured.
6. Attach or render the enclosure diagram.
7. Generate the print view and certificate.

### Special behavior

The current PDF path accepts a `diagram_certificate` payload. In Laravel, validate this as an image/diagram resource, store it privately, and render only an approved sanitized asset.

## 13. Module: Digital timer

### Current source

- Controller: `app/Controllers/DigitalTimerController.php`
- Views: `app/Views/DigitalTimer/`
- Models: `DigitalTimerModel`, `DigitalTimerStandardModel`, `DIgitalTimerStandardValuesModel`, and `TimerStandardModel`

### Purpose

The digital-timer workflow compares the timer indication with a reference time/standard at selected time points and determines error/correction and uncertainty.

### Operator inputs

- Timer manufacturer/model/serial/equipment ID.
- Range, resolution, and unit.
- Customer/certificate/job dates.
- Active time standard and standard values.
- Nominal time points.
- Repeated timer readings.
- Start/stop method or trigger details where applicable.
- Calibrator/checker/verifier, remarks, and images.

### Measurement process

1. Select the active timer standard.
2. Set the nominal duration or test point.
3. Run the timer for each repetition.
4. Record actual/reference duration and UUC indication.
5. Calculate average, error/correction, repeatability, resolution uncertainty, standard uncertainty, and expanded uncertainty as configured.
6. Save the result and generate the certificate.

## 14. Module: pH meter

### Current source

- Controller: `app/Controllers/PHmeterController.php`
- Standard controller: `app/Controllers/standardPHMeterController.php`
- Views: `app/Views/PHMeter/`
- Models: `PHmeterModel`, `PHMeterStandardModel`, `BufferSolutionStandardModel`, and `BufferSolutionStandardValuesModel`

### Purpose

The pH-meter workflow compares the meter’s pH indication with certified buffer solutions or another approved reference standard at multiple pH values and temperatures.

### Master data

- Buffer solution identity and lot/description.
- Certified pH value at a stated temperature.
- Uncertainty/certificate information.
- Validity/status.
- Additional standard values and measurements.

### Operator inputs

- Meter manufacturer/model/serial/equipment ID.
- Range/resolution.
- Buffer standard selection.
- Buffer/reference pH value.
- Solution temperature and meter temperature compensation.
- Repeated UUC readings.
- Calibration point sequence.
- Calibrator/checker/verifier, remarks, and images.

### Measurement process

1. Select valid buffer standards.
2. Confirm buffer temperature and certified value.
3. Rinse/prepare electrode according to the approved procedure.
4. Allow the reading to stabilize.
5. Record reference pH, temperature, and UUC indication.
6. Repeat for each buffer/test point.
7. Calculate pH error/correction, slope/intercept or other configured pH metrics, and uncertainty.
8. Compare the result with the configured acceptance criteria.
9. Issue the certificate.

### Technical note

The current controller has some standard families commented out in places. The replacement must distinguish enabled buffer-solution functionality from planned/disabled multi-product calibrator or documenting-process-calibrator functionality.

## 15. Module: Refractometer

### Current source

- Controller: `app/Controllers/refractometerController.php`
- Views: `app/Views/Refractometer/`
- Related standard: `BalanceStandardModel` is loaded by the current controller and must be confirmed against the production method/schema before migration.

### Purpose

The refractometer workflow checks refractive-index or related scale indication against reference values at selected points.

### Operator inputs

- Refractometer manufacturer/model/serial/equipment ID.
- Range, scale, resolution, and units.
- Customer/certificate metadata.
- Reference standard and certified value.
- Sample/reference temperature.
- Test-point/reference values and UUC readings.
- Repetitions, personnel, verifier, remarks, and images.

### Measurement process

1. Select the approved reference standard.
2. Condition the sample/reference at the specified temperature.
3. Apply the sample and record the stabilized refractometer reading.
4. Repeat at the required values.
5. Calculate average, error/correction, repeatability, and uncertainty.
6. Compare against the applicable limit.
7. Produce the certificate.

The standard relationship must be confirmed before migration because the current controller names the loaded standard variable `standardBalance`.

## 16. Module: Caliper

### Current source

- Controller: `app/Controllers/CaliperController.php`
- Views: `app/Views/Caliper/`
- Models: `CaliperModel`, `GaugeBlockModel`, `GaugeBlockMeasurementModel`, `GaugeBlockUncertaintyModel`
- Formula file: module 14 formula file is associated with dimensional/length uncertainty behavior and must be confirmed against the current caliper UI.

### Purpose

The caliper workflow checks dimensional indication against gauge blocks or other dimensional standards at multiple positions and sizes.

### Operator inputs

- Caliper manufacturer/model/serial/equipment ID.
- Range and resolution/readability.
- Customer/certificate metadata.
- Gauge-block standard selection.
- Nominal dimension and unit.
- External, internal, depth, or step measurement type where enabled.
- Repeated measurements at each point.
- Environmental temperature.
- Gauge-block flatness, parallelism, wringing, and uncertainty data where applicable.
- Personnel, verifier, remarks, and images.

### Measurement process

1. Select valid gauge blocks and measurement details.
2. Verify the caliper zero and condition.
3. Measure each nominal point in the approved direction/position.
4. Record repeated values.
5. Calculate average, indication error, repeatability, and dimensional uncertainty.
6. Include geometry components such as flatness/parallelism when required.
7. Compare against the applicable limit and issue the certificate.

### Formula concepts visible in the source

The module 14 formula file includes resolution, standard deviation, temperature/CTE effects, flatness, parallelism, wringing, combined uncertainty, effective degrees of freedom, coverage factor, and expanded uncertainty functions. Confirm which components the active caliper worksheet actually uses.

## 17. Module: Glassware / volumetric equipment

### Current source

- Controller: `app/Controllers/GlasswareController.php`
- Views: `app/Views/Glassware/`
- Standards loaded: balance, barometer, thermometer, thermometer test points, and drift/PRT records
- Formula file: `public/js/module9Formulas.js` and `module9FormulasRev2-v2.0.1.js` contain gravimetric/volume-related functions used by the application and must be matched to the active glassware view.

### Purpose

The glassware workflow determines delivered/contained volume by weighing water and applying water-density, air-density, buoyancy, temperature, and evaporation corrections.

### Master data and standards

- Balance standard and uncertainty/resolution.
- Barometer/pressure standard.
- Thermometer standard.
- Thermometer drift, PRT, and test-point data.
- Water temperature and density method.
- Air temperature, pressure, and humidity.

### Operator inputs

- Glassware type, class, nominal volume, manufacturer, serial/ID.
- Customer/certificate metadata.
- Water temperature and environmental conditions.
- Empty/filled balance readings.
- Reference/balance standard details.
- Repeated fill/empty observations.
- Calibration personnel, verifier, remarks, and images.

### Measurement process

1. Select active balance, barometer, and thermometer standards.
2. Record environmental conditions.
3. Record the empty vessel and vessel-plus-water balance readings.
4. Compute water mass from the difference.
5. Calculate water density and air density using the active approved equations.
6. Apply buoyancy, thermal expansion, and evaporation corrections.
7. Calculate volume at the reference temperature.
8. Calculate repeatability and uncertainty components.
9. Compare the result with the glassware tolerance/classification.
10. Generate the certificate.

### Formula concepts visible in the source

The module 9 revision files contain functions for Tanaka water density, air density, gravimetric method, balance uncertainty, load resolution, temperature drift, evaporation loss, water-temperature uncertainty, density uncertainty, combined uncertainty, and expanded uncertainty. These must be versioned and approved before a Laravel implementation replaces them.

## 18. Supporting standards and calibration data

### Temperature source

The digital-thermometer views support source fields such as code, description, maximum instability, maximum axial effect, and maximum radial effect. These are used to select a valid reference and to contribute to uncertainty or stability assessments.

### Thermo-hygrometer chamber

The chamber views include serial number, temperature instability, temperature inhomogeneity, RH instability, and RH inhomogeneity. These values must be linked to the chamber record selected by the worksheet.

### Test-weight MPE/PAB

The test-weight master pages support:

- MPE by class, nominal value, unit, and MPE.
- PAB by classification, instrument, class, range, CMC, and method.
- Alloy records.
- Standard details and nominal values.

These are reference data used by the worksheet, not free-text values to be typed repeatedly.

### Gauge block

Gauge-block standards may contain nominal/actual values, measurements, uncertainty, flatness, parallelism, and related dimensional data. These support caliper and other dimensional workflows.

## 19. React page structure

Each module should use the following page structure:

```text
CalibrationListPage
  -> filters and search
  -> status tabs
  -> results table
  -> row actions

CalibrationWorksheetPage
  -> EquipmentIdentitySection
  -> EnvironmentSection
  -> StandardSelectionSection
  -> PreliminaryInspectionSection
  -> MeasurementTable
  -> CalculationSummary
  -> UncertaintyBudget
  -> RemarksAndFiles
  -> WorkflowActions

CertificatePreviewPage
  -> certificate sections
  -> display options
  -> print/download actions
```

Use module configuration only for labels and layout where the data model is genuinely shared. Keep module-specific input names, units, validation, and calculation services explicit.

## 20. Laravel implementation model

For every calibration module create:

```text
app/Models/<Module>Worksheet.php
app/Models/<Module>Measurement.php
app/Models/<Module>Standard.php
app/Http/Requests/<Module>WorksheetRequest.php
app/Http/Resources/<Module>WorksheetResource.php
app/Policies/<Module>WorksheetPolicy.php
app/Actions/Worksheets/<Module>/CreateWorksheet.php
app/Actions/Worksheets/<Module>/UpdateWorksheet.php
app/Services/Calibration/<Module>Calculator.php
app/Services/Certificates/<Module>CertificateRenderer.php
resources/js/pages/worksheets/<module>/ListPage.jsx
resources/js/pages/worksheets/<module>/WorksheetPage.jsx
resources/js/features/calibration/<module>/calculator.js
tests/Feature/Worksheets/<Module>WorksheetTest.php
tests/Unit/Calibration/<Module>CalculatorTest.php
```

The calculator must accept validated structured input and return named values:

```json
{
  "test_points": [],
  "results": [],
  "uncertainty_budget": [],
  "combined_uncertainty": null,
  "expanded_uncertainty": null,
  "coverage_factor": null,
  "decision": null,
  "rounding": {}
}
```

Do not return opaque positional arrays from the new API.

## 21. Required verification before migration sign-off

For each module, compare the old and new application using at least three real or sanitized records:

1. Same metadata and standard selection.
2. Same measurement rows.
3. Same intermediate values.
4. Same uncertainty budget.
5. Same final result and decision.
6. Same displayed decimal places and units.
7. Same certificate number and dates.
8. Same PDF page structure and visible content.

Record any discrepancy in a calculation comparison report. Do not waive a discrepancy by rounding unless the technical owner approves it.

## 22. Source-to-document checklist

Before an AI begins implementing a module, it must read:

- The module controller.
- The module model(s).
- The create worksheet view.
- The edit worksheet view.
- The table/list view.
- The print/certificate view.
- The active formula JavaScript file.
- The route definitions.
- The production schema for tables touched by the controller.

It must then produce a module-specific field dictionary, API request example, API response example, calculation test vectors, and PDF acceptance checklist before writing the Laravel code.

