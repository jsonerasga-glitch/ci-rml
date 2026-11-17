<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

/**
 * Which calibration modules appear in the sidebar (Worksheets, Certificates,
 * Standards) and on the main Dashboard.
 *
 * To show a module again, add its key to $enabled. Hidden modules are only
 * removed from the menus: their pages, routes and data are untouched.
 */
class CalibrationModules extends BaseConfig
{
	/** Module keys to show, in display order. */
	public $enabled = [
		'electronicBalance',
		'thermohygrometer',
		'testWeight',
	];

	/**
	 * Every module: label, worksheet URL, certificates URL, and the element ids
	 * the pages use to highlight their menu entry (layouts/sidebarAdmin).
	 */
	public $catalog = [
		'testWeight'            => ['label' => 'Test Weights', 'worksheet' => '/testWeight/worksheet', 'certificates' => '/testWeightTable', 'n' => 1],
		'electronicBalance'     => ['label' => 'Single Range Electronic Balance (SREB)', 'worksheet' => '/electronicBalance/worksheet', 'certificates' => '/electronicBalance/certificates', 'n' => 2],
		'weighingScale'         => ['label' => 'Weighing Scale', 'worksheet' => '/weighingScale/worksheet', 'certificates' => '/weighingScaleTable', 'n' => 3],
		'pressureGauge'         => ['label' => 'Pressure Gauge', 'worksheet' => '/pressureGauge/worksheet', 'certificates' => '/pressureGauge/certificates', 'n' => 4],
		'digitalThermometer'    => ['label' => 'Thermometer', 'worksheet' => '/digitalThermometer/worksheet', 'certificates' => '/digitalThermometer/certificates', 'n' => 5],
		'thermohygrometer'      => ['label' => 'Thermohygrometer', 'worksheet' => '/thermohygrometer/worksheet', 'certificates' => '/thermohygrometer/certificates', 'n' => 7],
		'enclosure'             => ['label' => 'Enclosure / Autoclave / Waterbath', 'worksheet' => '/enclosure/worksheet', 'certificates' => '/enclosure/certificates', 'n' => 8],
		'glassware'             => ['label' => 'Glassware / POVA', 'worksheet' => '/glassware/worksheet', 'certificates' => '/glassware/certificates', 'n' => 9],
		'electricalMeter'       => ['label' => 'Electrical Meters / DMM', 'worksheet' => '/electricalmeter/worksheet', 'certificates' => '/electricalmeter/certificates', 'n' => 11],
		'digitalTimer'          => ['label' => 'Timer / Stopwatch', 'worksheet' => '/digitalTimer/worksheet', 'certificates' => '/digitalTimer/certificates', 'n' => 13],
		'pHMeter'               => ['label' => 'pH Meter', 'worksheet' => '/pHMeter/worksheet', 'certificates' => '/pHMeter/certificates', 'n' => 14],
		'refractometer'         => ['label' => 'Refractometer', 'worksheet' => '/refractometer/worksheet', 'certificates' => '/refractometer/certificates', 'n' => 15],
		'temperatureController' => ['label' => 'Temperature Controller', 'worksheet' => '/temperaturecontroll/worksheet', 'certificates' => '/temperaturecontroll/certificates', 'n' => 16],
		'caliper'               => ['label' => 'Caliper / Micrometer', 'worksheet' => '/caliper/worksheet', 'certificates' => '/caliper/certificates', 'n' => 17],
	];

	/**
	 * Reference standards menu: [label, URL, element id, modules that use it].
	 * A standard is listed when at least one of its modules is enabled.
	 */
	public $standards = [
		['Reference Weight', '/standard/referenceWeight', 'standard1', ['testWeight', 'electronicBalance', 'weighingScale']],
		['Test Gauge', '/pressureGauge/standardTable', 'standard2', ['pressureGauge']],
		['Temperature Source', '/standard/temperatureSource', 'standard4', ['digitalThermometer']],
		['Chamber', '/standard/chamber', 'standard18', ['thermohygrometer']],
		['Reference Thermometer / Thermo-Hygrometer', '/thermoStandardTable', 'standard5', ['thermohygrometer', 'digitalThermometer']],
		['Balance', '/standard/balance', 'standard6', ['testWeight', 'glassware']],
		['Barometer', '/standard/barometer', 'standard7', ['glassware']],
		['Multi-Product Calibrator', '/standard/multiProductCalibrator', 'standard8', ['electricalMeter']],
		['High Res Programmable Timer / Counter', '/standard/digitalTimer', 'standard10', ['digitalTimer']],
		['Gauge Block', '/standard/gaugeBlock', 'standard12', ['caliper']],
		['Temperature Recorder / Wireless Temperature Logger', '/standard/tempRecorder', 'standard14', ['enclosure', 'temperatureController']],
		['Buffer Solution', '/standard/bufferSolution', 'standard16', ['pHMeter']],
		['Documenting Process Calibrator', '/standard/documentingProcessCalibrator', 'standard17', ['temperatureController', 'digitalThermometer']],
		['Current Coil', '/standard/currentCoil', 'standard19', ['electricalMeter']],
	];

	/** Enabled modules in display order: key => catalog entry. */
	public function visible(): array
	{
		$out = [];
		foreach ($this->enabled as $key) {
			if (isset($this->catalog[$key])) {
				$out[$key] = $this->catalog[$key];
			}
		}

		return $out;
	}

	/** Standards used by at least one enabled module. */
	public function visibleStandards(): array
	{
		return array_values(array_filter($this->standards, fn ($s) => (bool) array_intersect($s[3], $this->enabled)));
	}
}
