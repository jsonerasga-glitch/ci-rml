# How Reference Standards Work in Calibration

## Short answer

Reference standards are not continuously recalibrated or updated during every customer calibration. They are controlled master records that are periodically recalibrated, verified, or quarantined.

During a customer calibration, the operator selects an active reference standard and uses its approved values, uncertainty, and other technical data. The worksheet should preserve a snapshot of the selected standard so later changes to the master record cannot silently alter an existing certificate.

## Normal reference-standard lifecycle

1. The reference standard is calibrated against a higher-level standard.
2. Its certificate, values, uncertainty, calibration date, provider, and due date are recorded.
3. The standard is marked active only while it is approved for use.
4. The operator selects the active standard during the customer calibration.
5. The worksheet stores the standard information used for that calibration.
6. The standard is later recalibrated, verified, replaced, suspended, or marked out of tolerance.

Recalibration should normally create a new version or a new controlled record. It should not rewrite the standard information used by completed certificates.

## Meaning in `CALIBRATION_WORKFLOWS.md`

The document states:

> “The selected standard must be saved with the worksheet so later changes to the master standard do not silently change an existing certificate.”

This means the Laravel replacement should save a historical snapshot of the selected standard, not only its current database ID or serial number.

For example:

```json
{
  "standard_id": 123,
  "serial_number": "STD-001",
  "certificate_number": "CAL-2026-015",
  "calibration_date": "2026-01-10",
  "due_date": "2027-01-10",
  "values": [],
  "uncertainty": {},
  "coverage_factor": 2,
  "source_version": 4
}
```

The master standard record may change later, but this snapshot remains fixed for the worksheet and final certificate.

## What “continuously updated” means in practice

Continuous updating normally refers to ongoing control activities, not continuously changing the certified value. A laboratory may perform:

- Periodic recalibration.
- Intermediate checks using check standards.
- Control-chart or measurement-assurance monitoring.
- Drift monitoring.
- Inspection after damage, repair, or unusual use.
- Review of historical calibration results.
- Adjustment of the future recalibration interval based on stability data.

NIST states that there is generally no universal recalibration interval. The interval depends on stability, usage, environment, required accuracy, contracts, and regulations. Measurement-assurance data and control charts can be used to characterize the behavior of individual standards over time.

## Manual laboratory process

In a manual process, the technician or technical manager usually:

1. Checks that the reference standard is within its approved validity period.
2. Confirms that the standard has the correct range, class, uncertainty, and certificate.
3. Checks its physical condition and identification.
4. Performs any required intermediate check before use.
5. Selects the standard on the worksheet.
6. Copies or records the standard values and uncertainty used.
7. Performs the customer calibration.
8. Reviews the result and uncertainty budget.
9. Issues the certificate containing the traceability information.

The system should automate these checks and preserve the same evidence digitally.

## If a standard is found out of tolerance

The expected process is:

```text
Detect problem
  -> mark standard inactive or quarantined
  -> stop using it
  -> identify worksheets that used it
  -> perform an impact assessment
  -> determine whether results remain valid
  -> correct or recall affected certificates if necessary
  -> recalibrate, repair, or replace the standard
  -> approve a new standard version
```

The impact assessment should consider the period since the last known valid check and whether the standard's error could affect reported customer results.

## Implications for this application

The current legacy application appears to implement part of this process:

- Controllers load standards using `status = active`.
- Worksheets store selected standard identifiers in the `standard` field.
- Standard values and calculated results are stored separately in JSON fields.
- The electronic-balance print view re-queries standard master data by serial number.

The last behavior is risky. If the master standard is edited later, an old worksheet or certificate preview could display newer standard metadata. The Laravel replacement should instead:

- Store a frozen standard snapshot on the worksheet.
- Keep the original master standard version for audit purposes.
- Prevent verified certificates from changing silently.
- Record who approved, suspended, or replaced a standard.
- Link each standard to the worksheets and certificates that used it.
- Support active, expired, suspended, quarantined, and retired statuses.
- Record calibration and validity dates explicitly.
- Support impact assessments when a standard is later found out of tolerance.

The `active` flag alone is therefore not enough. It should be combined with validity dates, version history, audit history, and historical snapshots.

## Important note about recalibration intervals

Some legacy JavaScript appears to assume a one-year due period. That should not be treated as a universal technical rule. The interval should be defined by the standard, method, customer or regulatory requirement, and documented stability evidence.

## Sources

- [NIST: Recommended Calibration Interval](https://www.nist.gov/calibrations/recommended-calibration-interval)
- [NIST: Reference Standards](https://www.itl.nist.gov/div898/handbook/mpc/section3/mpc312.htm)
- [NIST: GMP 11 — Assignment and Adjustment of Calibration Intervals](https://nvlpubs.nist.gov/nistpubs/ir/2019/NIST.IR.6969-2019.pdf)
- [NIST: Instrument Control for Linear Calibration](https://www.itl.nist.gov/div898/handbook/mpc/section3/mpc37.htm)
