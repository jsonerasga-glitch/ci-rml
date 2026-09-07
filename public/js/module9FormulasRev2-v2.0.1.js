/*

April 23, 2024
    CP-015-F2 Rev.2
    Effectivity Date: 03 January 2024

*/

/**
 * 
 * @param {Array<Number>} array_value 
 * @returns {Number}
 */
function average(array_value){
  const filtered_array = array_value.filter(value => value !== '' && !isNaN(parseFloat(value)));
  const numberOfTrials = filtered_array.length;
  const result = filtered_array.reduce((sum, num) => parseFloat(sum) + parseFloat(num), 0) / numberOfTrials;
  return result;
}

/**
 * 
 * @param {Array<Number>} array_value 
 * @returns {Nummber}
 */
function standardDeviation(array_value){
  const arr = array_value.filter(value => value !== '' && !isNaN(parseFloat(value)));
  const n = arr.length;
  const mean = arr.reduce((sum, num) => parseFloat(sum) + parseFloat(num), 0) / n;
  const squaredDifferences = arr.map(num => Math.pow(num - mean, 2));
  const sumSquaredDifferences = squaredDifferences.reduce((sum, num) => sum + num, 0);
  const variance = sumSquaredDifferences / (n - 1);
  const standardDeviation = Math.sqrt(variance);
  return standardDeviation;
}

/**
 * 
 * @param {Number} waterTemperature 
 * @returns {Number}
 */
function formula_tanakaWaterDensity(waterTemperature){
  let float_waterTemperature = parseFloat(waterTemperature);
  return 0.99997495 * (1 - ((Math.pow((float_waterTemperature + (-3.983035)),2) * (float_waterTemperature + 301.797))) / (522528.9 * (float_waterTemperature + 69.34881)));
}

/**
 * 
 * @param {Number} pressure 
 * @param {Number} humidity 
 * @param {Number} airTemperature 
 * @returns {Number}
 */
function formula_airDensity(pressure, humidity, airTemperature){
  let float_pressure = parseFloat(pressure);
  let float_humidity = parseFloat(humidity);
  let float_airTemperature = parseFloat(airTemperature);
  // let result = ((((0.34848) * float_pressure)-((0.0009 * float_humidity) * (Math.exp(0.061 * float_airTemperature)))) / (float_airTemperature + 273.15)) * (1 / 1000)
  let result = ((((0.34848) * float_pressure)-((0.009 * float_humidity) * (Math.exp(0.061 * float_airTemperature)))) / (float_airTemperature + 273.15)) * (1 / 1000)
  return result;
}

/**
 * 
 * @param {Number} balanceReading_receivingVessel 
 * @param {Number} balanceReading_receivingVesselWater 
 * @returns {Number}
 */
function formula_m(balanceReading_receivingVessel, balanceReading_receivingVesselWater){
  let float_balanceReading_receivingVessel = parseFloat(balanceReading_receivingVessel);
  let float_balanceReading_receivingVesselWater = parseFloat(balanceReading_receivingVesselWater);
  let result = float_balanceReading_receivingVesselWater - float_balanceReading_receivingVessel;
  return result;
}

/**
 * 
 * @param {Number} waterDensity 
 * @param {Number} airDensity 
 * @returns {Number}
 */
function formula_A(waterDensity, airDensity){
  let float_waterDensity = parseFloat(waterDensity);
  let float_airDensity = parseFloat(airDensity);
  let result = 1 / ((float_waterDensity - (float_airDensity)));
  return result;
}

/**
 * 
 * @param {Number} airDensity 
 * @param {Number} assumedDensityReferenceWeight 
 * @returns {Number}
 */
function formula_B(airDensity, assumedDensityReferenceWeight){
  let float_airDensity = parseFloat(airDensity);
  let float_assumedDensityReferenceWeight = parseFloat(assumedDensityReferenceWeight);
  let result = 1 - (float_airDensity / float_assumedDensityReferenceWeight);
  return result;
}

/**
 * 
 * @param {Number} cubicThermalExpansion 
 * @param {Number} waterTemperature 
 * @returns {Number}
 */
function formula_C(cubicThermalExpansion, waterTemperature){
  let float_cubicThermalExpansion = parseFloat(cubicThermalExpansion);
  let float_waterTemperature = parseFloat(waterTemperature);
  let result = 1 - (float_cubicThermalExpansion * (float_waterTemperature - 20))
  return result;
}

/**
 * 
 * @param {Number} waterDensity 
 * @param {Number} airDensity 
 * @param {Number} assumedDensityReferenceWeight 
 * @returns {Number}
 */
function formula_Z(waterDensity, airDensity, assumedDensityReferenceWeight){
  let float_waterDensity = parseFloat(waterDensity);
  let float_airDensity = parseFloat(airDensity);
  let float_assumedDensityReferenceWeight = parseFloat(assumedDensityReferenceWeight);
  let result = (1 / ((float_waterDensity * 1000) - (float_airDensity * 1000))) * (1 - ((float_airDensity * 1000) / (float_assumedDensityReferenceWeight * 1000)))
  return result;
}

/**
 * 
 * @param {Number} waterTemperature 
 * @returns {Number}
 */
function formula_beta(waterTemperature){
  let float_waterTemperature = parseFloat(waterTemperature);
  let result = ((-0.1176 * (Math.pow(float_waterTemperature, 2))) + (15.846 * float_waterTemperature) - 62.677) * Math.pow(10, -6);
  return result;
}

/**
 * 
 * @param {Number} A 
 * @param {Number} B 
 * @param {Number} C 
 * @param {Number} m 
 * @returns {Number}
 */
function formula_V20(A, B, C, m, equipmentType){
  let float_A = parseFloat(A);
  let float_B = parseFloat(B);
  let float_C = parseFloat(C);
  let float_m = parseFloat(m);
  let result = float_A * float_B * float_C * float_m * 1000;
  if(equipmentType == '1'){
    result = float_A * float_B * float_C * float_m;
  }
  
  return result;
}

/**
 * 
 * @param {Number} estimatedEvaporation 
 * @returns {Number}
 */
function uncertainty_evaporation(estimatedEvaporation){
  // let float_estimatedEvaporation = parseFloat(estimatedEvaporation); 
  // let converted = float_estimatedEvaporation / 1000;
  // let result = converted * Math.sqrt(3);
  // return result;
  let float_estimatedEvaporation = parseFloat(estimatedEvaporation);

  let value = ((estimatedEvaporation) => {
    let result = estimatedEvaporation / 1000;
    return result;
  })(float_estimatedEvaporation);

  let sensitivity = (()=>{
    //NOT NEEDED (FORMAT USED AS SAME AS OTHER UNCERTAINTY COMPUTATION FOR COMBINED UNCERTAINTY FUNCTION)
    let result = 1;
    return result;
  })();

  let uncertainty = ((value)=>{
    let result = value / Math.sqrt(3);
    return result;
  })(value);

  let result = {
    "value":value,
    "sensitivity":sensitivity,
    "uncertainty":uncertainty,
  }

  return result;
}

/**
 * 
 * @param {Array<Number>} array_v20 
 * @param {Number} countOfRepeatability 
 * @returns {Object<Number>}
 */
function uncertainty_repeatability(array_v20, countOfRepeatability){
  let stdDev = standardDeviation(array_v20);
  let int_countOfRepeatability = countOfRepeatability;

  let value = ((stdDev, countOfRepeatability) => {
    // urep repeatability value
    let result = stdDev / Math.sqrt(countOfRepeatability);
    return result;
  })(stdDev, int_countOfRepeatability);

  let sensitivity = (()=>{
    // urep repeatability sensitivity
    let result = 1;
    return result;
  })();

  let uncertainty = ((value, sensitivity)=>{
    // urep repeatability uncertainty
    let result = value * sensitivity;
    return result;
  })(value, sensitivity);

  let result = {
    "value":value,
    "sensitivity":sensitivity,
    "uncertainty":uncertainty,
  }

  return result;
}

/**
 * 
 * @param {Array<Object<Number>>} array_results 
 * @returns {Number}
 */
function uncertainty_combined(array_results){
  let sum = 0;
  array_results.forEach(items=>{
    let float_uncertainty= parseFloat(items.uncertainty);
    sum += Math.pow(float_uncertainty, 2);
  })
  let result = Math.sqrt(sum);
  return result;
}

/**
 * 
 * @param {Number} combined_uncertainty 
 * @param {Number} k 
 * @returns {Number}
 */
function uncertainty_expanded(combined_uncertainty, k){
  let float_combined_uncertainty = parseFloat(combined_uncertainty); 
  let float_k = parseFloat(k); 

  let result = float_combined_uncertainty * float_k;
  return result;
}


function formula_utA(array_temperatureValues){
  let max = array_temperatureValues.reduce((acc, curr)=>{return (parseFloat(curr) > parseFloat(acc)) ? curr : acc;},array_temperatureValues[0]);
  let min = array_temperatureValues.reduce((acc, curr)=>{return (parseFloat(curr) < parseFloat(acc)) ? curr : acc;},array_temperatureValues[0]);
  let result = (max - min) / Math.sqrt(12);
  return result;
}

function formula_uhr(array_humidityValues){
  let max = array_humidityValues.reduce((acc, curr)=>{return (parseFloat(curr) > parseFloat(acc)) ? curr : acc;},array_humidityValues[0]);
  let min = array_humidityValues.reduce((acc, curr)=>{return (parseFloat(curr) < parseFloat(acc)) ? curr : acc;},array_humidityValues[0]);
  // let result = (max - min) / Math.sqrt(12);
  let result = (max - min) / Math.sqrt(12) / 100
  return result;
}

// PISTON-OPERATED VOLUMETRIC APPARATUS

/**
 * {Object<Number>}
 * {
 *      value:{Number},
 *      sensitivity:{Number},
 *      uncertainty:{Number},
 * }
 * 
 */

/**
 * 
 * @param {Number} expandedUncertainty 
 * @param {Number} coverageFactor 
 * @param {Number} resolution 
 * @param {Number} average_C 
 * @param {Number} average_Z 
 * @returns {Object<Number>}
 */
function uncertainty_balance_u(expandedUncertainty, coverageFactor, resolution, average_C, average_Z){
  let float_expandedUncertainty = parseFloat(expandedUncertainty);
  let float_coverageFactor = parseFloat(coverageFactor);
  let float_resolution = parseFloat(resolution);
  let float_average_C = parseFloat(average_C);
  let float_average_Z = parseFloat(average_Z);

  let value = ((expandedUncertainty, coverageFactor, resolution) => {
    // ubal_U value
    let result = Math.sqrt(((Math.pow((expandedUncertainty / coverageFactor), 2)) + (Math.pow((resolution / 2 / Math.sqrt(3)), 2))) * 2);
    return result;
  })(float_expandedUncertainty, float_coverageFactor, float_resolution);

  let sensitivity = ((average_C, average_Z)=>{
    // ubal_U sensitivity
    let result = (average_C) * average_Z;
    return result;
  })(float_average_C, float_average_Z);

  let uncertainty = ((value, sensitivity)=>{
    // ubal_U uncertainty
    let result = value * sensitivity;
    return result;
  })(value, sensitivity);

  let result = {
    "value":value,
    "sensitivity":sensitivity,
    "uncertainty":uncertainty,
  }

  return result;
}

/**
 * 
 * @param {Number} expandedUncertainty 
 * @param {Number} coverageFactor 
 * @param {Number} resolution 
 * @param {Number} average_temp 
 * @param {Number} average_waterTemp 
 * @param {Number} average_m 
 * @param {Number} average_Z 
 * @param {Number} cubicThermalExpansion 
 * @returns {Object<Number>}
 */
function uncertainty_thermo_water(expandedUncertainty, coverageFactor, resolution, average_temp, average_waterTemp, average_m, average_Z, cubicThermalExpansion){
  let float_expandedUncertainty = parseFloat(expandedUncertainty);
  let float_coverageFactor = parseFloat(coverageFactor);
  let float_resolution = parseFloat(resolution);
  let float_average_temp = parseFloat(average_temp);
  let float_average_waterTemp = parseFloat(average_waterTemp);
  let float_average_m = parseFloat(average_m);
  let float_average_Z = parseFloat(average_Z);
  let float_cubicThermalExpansion = parseFloat(cubicThermalExpansion);

  let value = ((expandedUncertainty, coverageFactor, resolution, average_temp, average_waterTemp) => {
    // uthermo_water value
    let result = Math.sqrt((Math.pow((expandedUncertainty/coverageFactor), 2) + Math.pow((resolution / 2 / Math.sqrt(3)), 2) + Math.pow(((Math.abs(average_temp - average_waterTemp)) / 2 / Math.sqrt(3)), 2)))
    return result;
  })(float_expandedUncertainty, float_coverageFactor, float_resolution, float_average_temp, float_average_waterTemp);

  let sensitivity = ((average_m, average_Z, cubicThermalExpansion)=>{
    // uthermo_water sensitivity
    let result = ((average_m * 1000) * (average_Z) * (-cubicThermalExpansion));
    return result;
  })(float_average_m, float_average_Z, float_cubicThermalExpansion);

  let uncertainty = ((value, sensitivity)=>{
    // uthermo_water uncertainty
    let result = value * sensitivity;
    return result;
  })(value, sensitivity);

  let result = {
    "value":value,
    "sensitivity":sensitivity,
    "uncertainty":uncertainty,
  }

  return result;
}

/**
 * 
 * @param {Number} expandedUncertainty 
 * @param {Number} coverageFactor 
 * @param {Number} resolution 
 * @param {Number} average_Beta 
 * @param {Number} average_waterDensity 
 * @param {Number} average_m 
 * @param {Number} average_airDensity 
 * @param {Number} assumedDensityReferenceWeight 
 * @param {Number} average_C 
 * @returns {Object<Number>}
 */
function uncertainty_water_dens(expandedUncertainty, coverageFactor, resolution, average_Beta, average_waterDensity, average_m, average_airDensity, assumedDensityReferenceWeight, average_C){
  let float_expandedUncertainty = parseFloat(expandedUncertainty);
  let float_coverageFactor = parseFloat(coverageFactor);
  let float_resolution = parseFloat(resolution);
  let float_average_Beta = parseFloat(average_Beta);
  let float_average_waterDensity = parseFloat(average_waterDensity);
  let float_average_m = parseFloat(average_m);
  let float_average_airDensity = parseFloat(average_airDensity);
  let float_assumedDensityReferenceWeight = parseFloat(assumedDensityReferenceWeight);
  let float_average_C = parseFloat(average_C);

  let value = ((expandedUncertainty, coverageFactor, resolution, average_Beta, average_waterDensity) => {
    // uwater_dens value
    // let result = Math.sqrt((Math.pow(((0.00000045*1000)),2)) + Math.pow((Math.sqrt((Math.pow((expandedUncertainty/coverageFactor),2))+(Math.pow((resolution/2/Math.sqrt(3)),2)))*average_Beta*(average_waterDensity*1000)),2))
    let result = Math.sqrt((Math.pow(((0.00000045)),2)) + Math.pow((Math.sqrt((Math.pow((expandedUncertainty/coverageFactor),2))+(Math.pow((resolution/2/Math.sqrt(3)),2)))*average_Beta*(average_waterDensity)),2))
    return result;
  })(float_expandedUncertainty, float_coverageFactor, float_resolution, float_average_Beta, float_average_waterDensity);

  let sensitivity = ((average_m, average_airDensity, assumedDensityReferenceWeight, average_C, average_waterDensity)=>{
    // uwater_dens sensitivity
    // let result = ((-average_m * 1000)) * (1 - ((average_airDensity * 1000) / (assumedDensityReferenceWeight * 1000))) * (average_C) * ((1 / ((average_waterDensity * 1000)-Math.pow((average_airDensity*  1000),2))));
    let result = ((-average_m * 1000)) * (1 - ((average_airDensity) / (assumedDensityReferenceWeight))) * (average_C) * ((1 / (Math.pow((average_waterDensity-average_airDensity),2))));
    return result;
  })(float_average_m, float_average_airDensity, float_assumedDensityReferenceWeight, float_average_C, float_average_waterDensity);

  let uncertainty = ((value, sensitivity)=>{
    // uwater_dens uncertainty
    let result = value * sensitivity;
    return result;
  })(value, sensitivity);

  let result = {
    "value":value,
    "sensitivity":sensitivity,
    "uncertainty":uncertainty,
  }

  return result;
}

/**
 * 
 * @param {Number} average_airDensity 
 * @param {Number} u_pA 
 * @param {Number} u_tA 
 * @param {Number} u_hr 
 * @param {Number} uform_ρA 
 * @param {Number} average_m 
 * @param {Number} average_waterDensity 
 * @param {Number} average_C 
 * @param {Number} average_Z 
 * @param {Number} assumedDensityReferenceWeight 
 * @returns {Object<Number>}
 */
function uncertainty_air_dens(average_airDensity, u_pA, u_tA, u_hr, uform_ρA, average_m, average_waterDensity, average_C, average_Z, assumedDensityReferenceWeight){
  let float_average_airDensity = parseFloat(average_airDensity);
  let float_u_pA = parseFloat(u_pA);
  let float_u_tA = parseFloat(u_tA);
  let float_u_hr = parseFloat(u_hr);
  let float_uform_ρA = parseFloat(uform_ρA);

  let float_average_m = parseFloat(average_m);
  let float_average_waterDensity = parseFloat(average_waterDensity);
  let float_average_C = parseFloat(average_C);
  let float_average_Z = parseFloat(average_Z);
  let float_assumedDensityReferenceWeight = parseFloat(assumedDensityReferenceWeight);

  let value = ((average_airDensity, u_pA, u_tA, u_hr, uform_ρA) => {
    // uair_dens value
    // let result = (average_airDensity * 1000) * Math.sqrt((Math.pow((0.00001 * u_pA),2)) + (Math.pow((-0.004 * u_tA),2)) + (Math.pow((-0.009 * u_hr),2)) + (Math.pow((uform_ρA / (average_airDensity * 1000)),2)))
    let result = (average_airDensity) * Math.sqrt((Math.pow((0.00001 * u_pA),2)) + (Math.pow((-0.004 * u_tA),2)) + (Math.pow((-0.009 * u_hr),2)) + (Math.pow((uform_ρA / (average_airDensity)),2)))
    return result;
  })(float_average_airDensity, float_u_pA, float_u_tA, float_u_hr, float_uform_ρA);

  let sensitivity = ((average_m, average_waterDensity, average_airDensity, average_C, average_Z, assumedDensityReferenceWeight)=>{
    // uair_dens sensitivity
    // let result = ((average_m * 1000) * (1 / ((average_waterDensity * 1000) - (average_airDensity * 1000))) * average_C * (average_Z - (1 / (assumedDensityReferenceWeight * 1000))));
    let result = ((average_m * 1000) * (1 / ((average_waterDensity) - (average_airDensity))) * average_C * (average_Z - (1 / (assumedDensityReferenceWeight))));
    return result;
  })(float_average_m, float_average_waterDensity, float_average_airDensity, float_average_C, float_average_Z, float_assumedDensityReferenceWeight);

  let uncertainty = ((value, sensitivity)=>{
    // uair_dens uncertainty
    let result = value * sensitivity;
    return result;
  })(value, sensitivity);

  let result = {
    "value":value,
    "sensitivity":sensitivity,
    "uncertainty":uncertainty,
  }

  return result;
}

/**
 * 
 * @param {Number} uncertaintyDensityReferenceWeight 
 * @param {Number} average_m 
 * @param {Number} average_waterDensity 
 * @param {Number} average_airDensity 
 * @param {Number} average_C 
 * @param {Number} assumedDensityReferenceWeight 
 * @returns {Object<Number>}
 */
function uncertainty_weight_pova(uncertaintyDensityReferenceWeight, average_m, average_waterDensity, average_airDensity, average_C, assumedDensityReferenceWeight){
  let float_uncertaintyDensityReferenceWeight = parseFloat(uncertaintyDensityReferenceWeight);
  let float_average_m = parseFloat(average_m);
  let float_average_waterDensity = parseFloat(average_waterDensity);
  let float_average_airDensity = parseFloat(average_airDensity);
  let float_average_C = parseFloat(average_C);
  let float_assumedDensityReferenceWeight = parseFloat(assumedDensityReferenceWeight);

  let value = ((uncertaintyDensityReferenceWeight) => {
    // uweight value
    let result = uncertaintyDensityReferenceWeight / 2
    return result;
  })(float_uncertaintyDensityReferenceWeight);

  let sensitivity = ((average_m, average_waterDensity, average_airDensity, average_C, assumedDensityReferenceWeight)=>{
    // uweight sensitivity
    // let result = ((average_m * 1000) * (1 / ((average_waterDensity * 1000) - (average_airDensity * 1000))) * (average_C) * ((average_airDensity * 1000) / (Math.pow((assumedDensityReferenceWeight * 1000), 2))));
    let result = ((average_m * 1000) * (1 / ((average_waterDensity) - (average_airDensity))) * (average_C) * ((average_airDensity) / (Math.pow((assumedDensityReferenceWeight), 2))));
    return result;
  })(float_average_m, float_average_waterDensity, float_average_airDensity, float_average_C, float_assumedDensityReferenceWeight);

  let uncertainty = ((value, sensitivity)=>{
    // uweight uncertainty
    let result = value * sensitivity;
    return result;
  })(value, sensitivity);

  let result = {
    "value":value,
    "sensitivity":sensitivity,
    "uncertainty":uncertainty,
  }

  return result;
}

/**
 * 
 * @param {Array<Number>} array_pressureValues 
 * @param {Number} average_m 
 * @param {Number} average_waterDensity 
 * @param {Number} k1 
 * @param {Number} average_temp 
 * @param {Number} t0 
 * @returns {Object<Number>}
 */
function uncertainty_pressureVariation(array_pressureValues, average_m, average_waterDensity, k1, average_temp, t0){
  let float_pressure_max = parseFloat(array_pressureValues.reduce((a, b) => Math.max(a, b)));
  let float_pressure_min = parseFloat(array_pressureValues.reduce((a, b) => Math.min(a, b)));
  let float_average_m = parseFloat(average_m);
  let float_average_waterDensity = parseFloat(average_waterDensity);
  let float_k1 = parseFloat(k1);
  let float_average_temp = parseFloat(average_temp);
  let float_t0 = parseFloat(t0);
  
  let value = ((pressure_max, pressure_min) => {
    // uV∆p pressure variation value
    let result = (pressure_max - pressure_min) / Math.sqrt(3);
    return result;
  })(float_pressure_max, float_pressure_min);

  let sensitivity = ((average_m, average_waterDensity, k1, average_temp, t0)=>{
    // uV∆p pressure variation sensitivity
    // let result = ((average_m * 1000)/  Math.pow((average_waterDensity * 1000), 2)) * ((k1) / (average_temp + t0))
    let result = ((average_m * 1000)/  Math.pow((average_waterDensity), 2)) * ((k1) / (average_temp + t0))
    return result;
  })(float_average_m, float_average_waterDensity, float_k1, float_average_temp, float_t0);

  let uncertainty = ((value, sensitivity)=>{
    // uV∆p pressure variation uncertainty
    let result = value * sensitivity;
    return result;
  })(value, sensitivity);

  let result = {
    "value":value,
    "sensitivity":sensitivity,
    "uncertainty":uncertainty,
  }

  return result;
}
 
/**
 * 
 * @param {Array<Number>} array_humidityValues 
 * @param {Number} average_m 
 * @param {Number} average_waterDensity 
 * @param {Number} k2 
 * @param {Number} average_temp 
 * @param {Number} k3 
 * @param {Number} t0 
 * @returns {Object<Number>}
 */
function uncertainty_humidityVariation(array_humidityValues, average_m, average_waterDensity, k2, average_temp, k3, t0){
  let float_humidity_max = parseFloat(array_humidityValues.reduce((a, b) => Math.max(a, b)));
  let float_humidity_min = parseFloat(array_humidityValues.reduce((a, b) => Math.min(a, b)));
  let float_average_m = parseFloat(average_m);
  let float_average_waterDensity = parseFloat(average_waterDensity);
  let float_k2 = parseFloat(k2);
  let float_k3 = parseFloat(k3);
  let float_average_temp = parseFloat(average_temp);
  let float_t0 = parseFloat(t0);
  
  let value = ((humidity_max, humidity_min) => {
    // uV∆hs  humidity variation value
    let result = (humidity_max - humidity_min) / Math.sqrt(3);
    return result;
  })(float_humidity_max, float_humidity_min);

  let sensitivity = ((average_m, average_waterDensity, k2, average_temp, k3, t0)=>{
    // uV∆hs  humidity variation sensitivity
    // let result = ((average_m * 1000) / (Math.pow((average_waterDensity * 1000), 2))) * ((((k2 * 1000) * average_temp) + k3) / (average_temp + t0));
    let result = ((average_m * 1000) / (Math.pow((average_waterDensity), 2))) * ((((k2) * average_temp) + k3) / (average_temp + t0));
    return result;
  })(float_average_m, float_average_waterDensity, float_k2, float_average_temp, float_k3, float_t0);

  let uncertainty = ((value, sensitivity)=>{
    // uV∆hs  humidity variation uncertainty
    let result = value * sensitivity;
    return result;
  })(value, sensitivity);

  let result = {
    "value":value,
    "sensitivity":sensitivity,
    "uncertainty":uncertainty,
  }

  return result;
}

/**
 * 
 * @param {Array<Number>} array_temperatureValues 
 * @param {Number} average_m 
 * @param {Number} average_airDensity 
 * @param {Number} average_waterDensity 
 * @param {Number} average_humidity 
 * @param {Number} k2 
 * @param {Number} t0 
 * @param {Number} k3 
 * @param {Number} k1 
 * @param {Number} average_temp 
 * @returns {Object<Number>}
 */
function uncertainty_temperatureVariation(array_temperatureValues, average_m, average_airDensity, average_waterDensity, average_humidity, k2, t0, k3, k1, average_temp){
  let float_temperature_max = parseFloat(array_temperatureValues.reduce((a, b) => Math.max(a, b)));
  let float_temperature_min = parseFloat(array_temperatureValues.reduce((a, b) => Math.min(a, b)));
  let float_average_m = parseFloat(average_m);
  let float_average_airDensity = parseFloat(average_airDensity);
  let float_average_waterDensity = parseFloat(average_waterDensity);
  let float_average_humidity = parseFloat(average_humidity);
  let float_k2 = parseFloat(k2);
  let float_t0 = parseFloat(t0);
  let float_k3 = parseFloat(k3);
  let float_k1 = parseFloat(k1);
  let float_average_temp = parseFloat(average_temp);

  let value = ((temperature_max, temperature_min) => {
    // uV∆ts variation  temperature variation value
    let result = (temperature_max - temperature_min) / Math.sqrt(3);
    return result;
  })(float_temperature_max, float_temperature_min);

  let sensitivity = ((average_m, average_airDensity, average_waterDensity, average_humidity, k2, t0, k3, k1, average_temp)=>{
    // uV∆ts variation  temperature variation sensitivity
    // let result = ((average_m * 1000) / (Math.pow((average_waterDensity * 1000), 2))) * (((average_humidity * ((k2 * t0) - k3)) - (k1 * (average_airDensity * 1000))) / (Math.pow((average_temp + t0), 2)));
    let result = ((average_m * 1000) / (Math.pow((average_waterDensity), 2))) * (((average_humidity * ((k2 * t0) - k3)) - (k1 * (average_airDensity))) / (Math.pow((average_temp + t0), 2)));
    return result;
  })(float_average_m, float_average_airDensity, float_average_waterDensity, float_average_humidity, float_k2, float_t0, float_k3, float_k1, float_average_temp);

  let uncertainty = ((value, sensitivity)=>{
    // uV∆ts variation  temperature variation uncertainty
    let result = value * sensitivity;
    return result;
  })(value, sensitivity);

  let result = {
    "value":value,
    "sensitivity":sensitivity,
    "uncertainty":uncertainty,
  }

  return result;
}

/**
 * 
 * @param {Number} cubicThermalExpansion 
 * @param {Number} average_m 
 * @param {Number} average_waterDensity 
 * @param {Number} average_airDensity 
 * @param {Number} assumedDensityReferenceWeight 
 * @param {Number} average_waterTemp 
 * @param {Number} t0 
 * @returns {Object<Number>}
 */
function uncertainty_cubicExpansionCoefficent(cubicThermalExpansion, average_m, average_waterDensity, average_airDensity, assumedDensityReferenceWeight, average_waterTemp, t0){
  let float_cubicThermalExpansion = parseFloat(cubicThermalExpansion);
  let float_average_m = parseFloat(average_m);
  let float_average_waterDensity = parseFloat(average_waterDensity);
  let float_average_airDensity = parseFloat(average_airDensity);
  let float_assumedDensityReferenceWeight = parseFloat(assumedDensityReferenceWeight);
  let float_average_waterTemp = parseFloat(average_waterTemp);
  let float_t0 = parseFloat(t0);

  let value = ((cubicThermalExpansion) => {
    // uγ cubic expansion coefficient value
    let result = (0.1 * cubicThermalExpansion) / Math.sqrt(3);
    return result;
  })(float_cubicThermalExpansion);

  let sensitivity = ((average_m, average_waterDensity, average_airDensity, assumedDensityReferenceWeight, average_waterTemp, t0)=>{
    // uγ cubic expansion coefficient sensitivity
    // let result = (average_m * 1000) * (1 / ((average_waterDensity * 1000) - (average_airDensity * 1000))) * (1 - ((average_airDensity * 1000) / (assumedDensityReferenceWeight * 1000))) * (-(average_waterTemp - t0));
    let result = (average_m * 1000) * (1 / ((average_waterDensity) - (average_airDensity))) * (1 - ((average_airDensity) / (assumedDensityReferenceWeight))) * (-(average_waterTemp - t0));
    return result;
  })(float_average_m, float_average_waterDensity, float_average_airDensity, float_assumedDensityReferenceWeight, float_average_waterTemp, float_t0);

  let uncertainty = ((value, sensitivity)=>{
    // uγ cubic expansion coefficient uncertainty
    let result = value * sensitivity;
    return result;
  })(value, sensitivity);

  let result = {
    "value":value,
    "sensitivity":sensitivity,
    "uncertainty":uncertainty,
  }

  return result;
}

/**
 * 
 * @param {Number} uucResolution 
 * @returns {Object<Number>}
 */
function uncertainty_resolutionUUC(uucResolution){
  let float_uucResolution = parseFloat(uucResolution);

  let value = ((uucResolution) => {
    // ures resolution UUC value
    let result = uucResolution / Math.sqrt(12);
    return result;
  })(float_uucResolution);

  let sensitivity = (()=>{
    // ures resolution UUC sensitivity
    let result = 1;
    return result;
  })();

  let uncertainty = ((value, sensitivity)=>{
    // ures resolution UUC uncertainty
    let result = value * sensitivity;
    return result;
  })(value, sensitivity);

  let result = {
    "value":value,
    "sensitivity":sensitivity,
    "uncertainty":uncertainty,
  }

  return result;
}

/**
 * 
 * @param {Number} uucResolution 
 * @returns {Object<Number>}
 */
function uncertainty_setting(uucResolution){
  let float_uucResolution = parseFloat(uucResolution);

  let value = ((uucResolution) => {
    // usetting value
    let result = uucResolution / Math.sqrt(12);
    return result;
  })(float_uucResolution);

  let sensitivity = (()=>{
    // usetting sensitivity
    let result = 1;
    return result;
  })();

  let uncertainty = ((value, sensitivity)=>{
    // usetting uncertainty
    let result = value * sensitivity;
    return result;
  })(value, sensitivity);

  let result = {
    "value":value,
    "sensitivity":sensitivity,
    "uncertainty":uncertainty,
  }

  return result;
}

/**
 * 
 * @param {String} equipment 
 * @param {Number} nominalValue 
 * @param {Number} mpre 
 * @returns {Object<Number>}
 */
function uncertainty_reproducibility(equipment, nominalValue, mpre = 0){
  let string_equipment;

  // 1 = glassware, 2 pova pipette variable, 3 pova other, 4 pova fixed
  if(equipment == '2' || equipment == '3' || equipment == '4'){
    if(equipment == '2' || equipment == '4'){
      string_equipment = "Pipettor";                          
    }
  }

  let float_nominalValue = parseFloat(nominalValue);
  let float_mpre = parseFloat(mpre);

  let value = ((equipment, nominalValue, mpre = 0) => {
    // uduc reproducibility value
    let result;
    if(equipment === "Pipettor"){
      result = (0.001 * nominalValue) / Math.sqrt(3);
    }else{
      result = (0.1 * mpre) / Math.sqrt(1);
    }
    return result;
  })(string_equipment, float_nominalValue, float_mpre);

  let sensitivity = (()=>{
    // uduc reproducibility sensitivity
    let result = 1;
    return result;
  })();

  let uncertainty = ((value, sensitivity)=>{
    // uduc reproducibility uncertainty
    let result = value * sensitivity;
    return result;
  })(value, sensitivity);

  let result = {
    "value":value,
    "sensitivity":sensitivity,
    "uncertainty":uncertainty,
  }

  return result;
}



// VOLUMETRIC GLASS and PLASTIC WARE

/**
 * 
 * @param {Number} expandedUncertainty 
 * @param {Number} coverageFactor 
 * @param {Number} resolution 
 * @param {Number} average_A 
 * @param {Number} average_B 
 * @param {Number} average_C 
 * @returns {Object<Number>}
 */
function uncertainty_mass(expandedUncertainty, coverageFactor, resolution, average_A, average_B, average_C){
  let float_expandedUncertainty = parseFloat(expandedUncertainty);
  let float_coverageFactor = parseFloat(coverageFactor);
  let float_resolution = parseFloat(resolution);
  let float_average_A = parseFloat(average_A);
  let float_average_B = parseFloat(average_B);
  let float_average_C = parseFloat(average_C);


  let value = ((expandedUncertainty, coverageFactor, resolution) => {
    // umass value
    let result = Math.sqrt(2 * ((Math.pow((expandedUncertainty / coverageFactor), 2)) + (Math.pow((resolution / 2 / Math.sqrt(3)), 2))));
    return result;
  })(float_expandedUncertainty, float_coverageFactor, float_resolution);

  let sensitivity = ((average_A, average_B, average_C)=>{
    // umass sensitivity
    let result = average_A * average_B * average_C;
    return result;
  })(float_average_A, float_average_B, float_average_C);

  let uncertainty = ((value, sensitivity)=>{
    // umass uncertainty
    let result = value * sensitivity;
    return result;
  })(value, sensitivity);

  let result = {
    "value":value,
    "sensitivity":sensitivity,
    "uncertainty":uncertainty,
  }

  return result;
}

/**
 * 
 * @param {Number} expandedUncertainty 
 * @param {Number} resolution 
 * @param {Number} average_temp 
 * @param {Number} average_waterTemp 
 * @param {Number} average_m 
 * @param {Number} average_A 
 * @param {Number} average_B 
 * @param {Number} cubicThermalExpansion 
 * @returns {Object<Number>}
 */
function uncertainty_temp(expandedUncertainty, resolution, average_temp, average_waterTemp, average_m, average_A, average_B, cubicThermalExpansion){
  let float_expandedUncertainty = parseFloat(expandedUncertainty);
  let float_resolution = parseFloat(resolution);
  let float_average_temp = parseFloat(average_temp);
  let float_average_waterTemp = parseFloat(average_waterTemp);
  let float_average_m = parseFloat(average_m);
  let float_average_A = parseFloat(average_A);
  let float_average_B = parseFloat(average_B);
  let float_cubicThermalExpansion = parseFloat(cubicThermalExpansion);


  let value = ((expandedUncertainty, resolution, average_temp, average_waterTemp) => {
    // utemp value
    let result = Math.sqrt(Math.pow((expandedUncertainty/2),2)+Math.pow((resolution/2/Math.sqrt(3)),2)+Math.pow(((Math.abs(average_temp-average_waterTemp))/2/Math.sqrt(3)),2));
    return result;
  })(float_expandedUncertainty, float_resolution, float_average_temp, float_average_waterTemp);

  let sensitivity = ((average_m, average_A, average_B, cubicThermalExpansion)=>{
    // utemp sensitivity
    let result = average_m * average_A * average_B * (-cubicThermalExpansion);
    return result;
  })(float_average_m, float_average_A, float_average_B, float_cubicThermalExpansion);

  let uncertainty = ((value, sensitivity)=>{
    // utemp uncertainty
    let result = value * sensitivity;
    return result;
  })(value, sensitivity);

  let result = {
    "value":value,
    "sensitivity":sensitivity,
    "uncertainty":uncertainty,
  }

  return result;
}

/**
 * 
 * @param {Number} expandedUncertainty 
 * @param {Number} coverageFactor 
 * @param {Number} resolution 
 * @param {Number} average_Beta 
 * @param {Number} average_waterDensity 
 * @param {Number} average_m 
 * @param {Number} average_A 
 * @param {Number} average_B 
 * @param {Number} average_C 
 * @returns {Object<Number>}
 */
function uncertainty_ρW(expandedUncertainty, coverageFactor, resolution, average_Beta, average_waterDensity, average_m, average_A, average_B, average_C){
  let float_expandedUncertainty = parseFloat(expandedUncertainty);
  let float_coverageFactor = parseFloat(coverageFactor);
  let float_resolution = parseFloat(resolution);
  let float_average_Beta = parseFloat(average_Beta);
  let float_average_waterDensity = parseFloat(average_waterDensity);
  let float_average_m = parseFloat(average_m);
  let float_average_A = parseFloat(average_A);
  let float_average_B = parseFloat(average_B);
  let float_average_C = parseFloat(average_C);

  let value = ((expandedUncertainty, coverageFactor, resolution, average_Beta, average_waterDensity) => {
    // utemp value
    let result = Math.sqrt((Math.pow((0.00000045), 2)) + (Math.pow((Math.sqrt((Math.pow((expandedUncertainty / coverageFactor), 2)) + (Math.pow((resolution / 2 / Math.sqrt(3)), 2))) * average_Beta*  average_waterDensity), 2)))
    return result;
  })(float_expandedUncertainty, float_coverageFactor, float_resolution, float_average_Beta, float_average_waterDensity);

  let sensitivity = ((average_m, average_A, average_B, average_C)=>{
    // utemp sensitivity
    let result = (-average_m) * (Math.pow(average_A, 2)) * average_B * average_C;
    return result;
  })(float_average_m, float_average_A, float_average_B, float_average_C);

  let uncertainty = ((value, sensitivity)=>{
    // utemp uncertainty
    let result = value * sensitivity;
    return result;
  })(value, sensitivity);

  let result = {
    "value":value,
    "sensitivity":sensitivity,
    "uncertainty":uncertainty,
  }

  return result;
}

/**
 * 
 * @param {Number} average_airDensity 
 * @param {Number} u_pA 
 * @param {Number} u_tA 
 * @param {Number} u_hr 
 * @param {Number} uform_ρA 
 * @param {Number} average_m 
 * @param {Number} average_A 
 * @param {Number} average_C 
 * @param {Number} average_B 
 * @param {Number} assumedDensityReferenceWeight 
 * @returns {Object<Number>}
 */
function uncertainty_ρA(average_airDensity, u_pA, u_tA, u_hr, uform_ρA, average_m, average_A, average_C, average_B, assumedDensityReferenceWeight){
  let float_average_airDensity= parseFloat(average_airDensity);
  let float_u_pA= parseFloat(u_pA);
  let float_u_tA= parseFloat(u_tA);
  let float_u_hr= parseFloat(u_hr);
  let float_uform_ρA= parseFloat(uform_ρA);
  let float_average_m= parseFloat(average_m);
  let float_average_A= parseFloat(average_A);
  let float_average_C= parseFloat(average_C);
  let float_average_B= parseFloat(average_B);
  let float_assumedDensityReferenceWeight= parseFloat(assumedDensityReferenceWeight);

  let value = ((average_airDensity, u_pA, u_tA, u_hr, uform_ρA) => {
    // uρA value
    let result = average_airDensity * Math.sqrt((Math.pow((0.00001 * u_pA), 2)) + (Math.pow((-0.004 * u_tA), 2)) + (Math.pow((-0.009 * u_hr), 2)) + (Math.pow((uform_ρA / average_airDensity), 2)))
    return result;
  })(float_average_airDensity, float_u_pA, float_u_tA, float_u_hr, float_uform_ρA);

  let sensitivity = ((average_m, average_A, average_C, average_B, assumedDensityReferenceWeight)=>{
    // uρA sensitivity
    let result = (average_m * average_A * average_C * (average_B * average_A - (1 / assumedDensityReferenceWeight)));
    return result;
  })(float_average_m, float_average_A, float_average_C, float_average_B, float_assumedDensityReferenceWeight);

  let uncertainty = ((value, sensitivity)=>{
    // uρA uncertainty
    let result = value * sensitivity;
    return result;
  })(value, sensitivity);

  let result = {
    "value":value,
    "sensitivity":sensitivity,
    "uncertainty":uncertainty,
  }

  return result;
}

/**
 * 
 * @param {Number} uncertaintyDensityReferenceWeight 
 * @param {Number} average_m 
 * @param {Number} average_A 
 * @param {Number} average_C 
 * @param {Number} average_airDensity 
 * @param {Number} assumedDensityReferenceWeight 
 * @returns {Object<Number>}
 */
function uncertainty_weight_volumetric(uncertaintyDensityReferenceWeight, average_m, average_A, average_C, average_airDensity, assumedDensityReferenceWeight){
  let float_uncertaintyDensityReferenceWeight = parseFloat(uncertaintyDensityReferenceWeight);
  let float_average_m = parseFloat(average_m);
  let float_average_A = parseFloat(average_A);
  let float_average_C = parseFloat(average_C);
  let float_average_airDensity = parseFloat(average_airDensity);
  let float_assumedDensityReferenceWeight = parseFloat(assumedDensityReferenceWeight);

  let value = ((uncertaintyDensityReferenceWeight) => {
    // uweight value
    let result = uncertaintyDensityReferenceWeight / 2
    return result;
  })(float_uncertaintyDensityReferenceWeight);

  let sensitivity = ((average_m, average_A, average_C, average_airDensity, assumedDensityReferenceWeight)=>{
    // uweight sensitivity
    let result = average_m * average_A * average_C * (average_airDensity / (Math.pow(assumedDensityReferenceWeight, 2)));
    return result;
  })(float_average_m, float_average_A, float_average_C, float_average_airDensity, float_assumedDensityReferenceWeight);

  let uncertainty = ((value, sensitivity)=>{
    // uweight uncertainty
    let result = value * sensitivity;
    return result;
  })(value, sensitivity);

  let result = {
    "value":value,
    "sensitivity":sensitivity,
    "uncertainty":uncertainty,
  }

  return result;
}

/**
 * 
 * @param {Number} cubicThermalExpansion 
 * @param {Number} average_m 
 * @param {Number} average_A 
 * @param {Number} average_B 
 * @param {Number} average_waterTemp 
 * @param {Number} t0 
 * @returns {Object<Number>}
 */
function uncertainty_y(cubicThermalExpansion, average_m, average_A, average_B, average_waterTemp, t0){
  let float_cubicThermalExpansion = parseFloat(cubicThermalExpansion);
  let float_average_m = parseFloat(average_m);
  let float_average_A = parseFloat(average_A);
  let float_average_B = parseFloat(average_B);
  let float_average_waterTemp = parseFloat(average_waterTemp);
  let float_t0 = parseFloat(t0);

  let value = ((cubicThermalExpansion) => {
    // uγ value
    let result = cubicThermalExpansion * 0.1 / Math.sqrt(3);
    return result;
  })(float_cubicThermalExpansion);

  let sensitivity = ((average_m, average_A, average_B, average_waterTemp, t0)=>{
    // uγ sensitivity
    let result = average_m * average_A * average_B * (-(average_waterTemp - t0)) * 0.001;
    return result;
  })(float_average_m, float_average_A, float_average_B, float_average_waterTemp, float_t0);

  let uncertainty = ((value, sensitivity)=>{
    // uγ uncertainty
    let result = value * sensitivity;
    return result;
  })(value, sensitivity);

  let result = {
    "value":value,
    "sensitivity":sensitivity,
    "uncertainty":uncertainty,
  }

  return result;
}

/**
 * 
 * @param {String} caseNumber 
 * @param {Number} graduation 
 * @param {Number} neckDiameter 
 * @param {Number} graduationHeight 
 * @returns {Object<Number>}
 */
function uncertainty_meniscus(caseNumber, graduation = 0, neckDiameter = 0, graduationHeight = 0){
  let string_caseNumber = String(caseNumber);
  let float_graduation = parseFloat(graduation);
  let float_neckDiameter = parseFloat(neckDiameter);
  let float_graduationHeight = parseFloat(graduationHeight);

  let value = ((caseNumber, graduation = 0, neckDiameter = 0, graduationHeight = 0) => {
    // umeniscus value
    let result;
    switch (caseNumber) {
      case '1':
        result = (graduation * 0.5) / Math.sqrt(3);
        break;
      case '2':
        result = ((0.5 * graduationHeight * (Math.PI * ((Math.pow(neckDiameter, 2)) / 4))) / 1000) / Math.sqrt(3);
        break;        
      default:
        break;
    }
    return result;
  })(string_caseNumber, float_graduation, float_neckDiameter, float_graduationHeight);

  let sensitivity = (()=>{
    // umeniscus sensitivity
    let result = 1;
    return result;
  })();

  let uncertainty = ((value, sensitivity)=>{
    // umeniscus uncertainty
    let result = value * sensitivity;
    return result;
  })(value, sensitivity);

  let result = {
    "value":value,
    "sensitivity":sensitivity,
    "uncertainty":uncertainty,
  }

  return result;
}



  // caseNumber = 1;
  // let graduation = 0.02
  // let neckDiameter = 3
  // let graduationHeight = 0.5
  // let waterDensity = 0.998206745559617;
  // let airDensity = 0.00120011044363632;
  // let assumedDensityReferenceWeight = 7.95;
  // let uncertaintyDensityReferenceWeight = 0.14;
  // let waterTemperature = 20.0;
  // let A = 1.00300235201912;
  // let B = 0.999849042711492;
  // let C = 1;
  // let m = 2;

  // let bal_expandedUncertainty = 0.00022;
  // let bal_coverageFactor = 1.96;
  // let bal_resolution = 0.0001;
  // let thermoWater_expandedUncertainty = 0.16;
  // let thermoWater_coverageFactor = 1.96;
  // let thermoWater_resolution = 0.1;

  // let average_A = 1.00300235097297;
  // let average_B = 0.999849042842298;
  // let average_C = 1;
  // let average_Z = 0.00100316393229515;
  // let average_m = 2;
  // let average_temp = 20.0;
  // let average_humidity = 50.1;
  // let average_waterTemp = 20;
  // let average_Beta = 0.000207203;
  // let average_waterDensity = 0.998206745559617;
  // let average_airDensity = 0.0012001094037356;
  // let cubicThermalExpansion = 0.000015;

  // let temperature_ta = [20, 20, 20, 20, 20, 20, 20, 20, 20, 20];
  // let humidity = [50, 50, 50, 50, 50, 50, 51, 50, 50, 50];
  // let pressure = [1010, 1010, 1010, 1010, 1010, 1010, 1010, 1010, 1010, 1010];
  // let v20 = [2.00570188300739, 2.00570188300739, 2.00570188300739, 2.00570188300739, 2.00570188300739, 2.00570188300739, 2.00570186471142, 2.00570188300739, 2.00570188300739, 2.00570188300739]

  
  // let u_pA = 10;
  // let u_tA = 0;
  // let u_hr = 0.288675134594813;
  // let uform_ρA = 0.00024;
  // let uucResolution = 0.01;
  // let nominalValue = 20;
  // let t0 = 20;







