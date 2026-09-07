/**
 * 
 * @param {Array<Number>} array_trials
 * @returns {Number}
 */
function average(array_trials){
    const filtered_array = array_trials.filter(value => value !== '' && !isNaN(parseFloat(value)));
    const numberOfTrials = filtered_array.length;
    const result = filtered_array.reduce((sum, num) => parseFloat(sum) + parseFloat(num), 0) / numberOfTrials;
    return result;
}

/**
 * 
 * @param {Number} average 
 * @param {Number} testPoint 
 * @returns {Number}
 */
function deviation(average, testPoint){
    let float_average = Number(average);
    let float_testPoint = Number(testPoint);
    let result = float_average - float_testPoint;
    return result;
}

/**
 * - Have Rounding Discrepancy that starts at the 7th decimal place
 * @param {Array<Number>} array_trials 
 * @returns {Number}
 */
function standardDeviation(array_trials){
    const arr = array_trials.filter(value => value !== '' && !isNaN(parseFloat(value)));
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
 * @param {Number} standardDeviation 
 * @returns {Number}
 */
function valueRepeatability(standardDeviation){
    let float_standardDeviation = Number(standardDeviation);
    let devisor = Math.sqrt(5); // number of trials
    let result = float_standardDeviation / devisor;
    return result;
}

/**
 * 
 * @param {Number} valueRepeatability 
 * @param {Number} coverageFactor
 * @param {Number} sensitivityCoefficient 
 * @returns {Number}
 */
function uncertaintyRepeatability(valueRepeatability, coverageFactor, sensitivityCoefficient){
    let float_valueRepeatability = Number(valueRepeatability);
    let float_coverageFactor = Number(coverageFactor);
    let float_sensitivityCoefficient = Number(sensitivityCoefficient);
    let result = (float_valueRepeatability/float_coverageFactor)*float_sensitivityCoefficient;
    return result;
}

/**
 * 
 * @param {Number} resolution 
 * @param {Number} readability 
 * @param {Number} coverageFactor 
 * @param {Number} sensitivityCoefficient 
 * @returns {Number}
 */
function uncertaintyUUCResolution(resolution, readability, coverageFactor, sensitivityCoefficient){
    let float_resolution = Number(resolution);
    let float_readability = Number(readability);
    let float_coverageFactor = Number(coverageFactor);
    let float_sensitivityCoefficient = Number(sensitivityCoefficient);
    let result = ((float_resolution*float_readability)/float_coverageFactor)*float_sensitivityCoefficient;
    return result;
}

/**
 * 
 * @param {Number} standardValue 
 * @param {Number} standardCoverageFactor 
 * @param {Number} standardSensitivityCoefficient 
 * @returns {Number}
 */
function uncertaintyStandard(standardValue, standardCoverageFactor, standardSensitivityCoefficient){
    let float_standardValue = Number(standardValue);
    let float_standardCoverageFactor = Number(standardCoverageFactor);
    let float_standardSensitivityCoefficient = Number(standardSensitivityCoefficient);
    let result = (float_standardValue/float_standardCoverageFactor)*float_standardSensitivityCoefficient;
    return result;
}

/**
 * 
 * @param {Number} drift 
 * @returns {Number}
 */
function uncertaintyDrift(drift){
    let float_drift = Number(drift);
    let result = float_drift/Math.sqrt(3)
    return result;
}

/**
 * 
 * @param {Number} uncertaintyRepeatability 
 * @param {Number} uncertaintyUUCResolution 
 * @param {Number} uncertaintyStandard 
 * @returns {Number}
 */
function combinedUncertainty(uncertaintyRepeatability, uncertaintyUUCResolution, uncertaintyStandard, uncertaintyDrift){
    let float_uncertaintyRepeatability = Number(uncertaintyRepeatability);
    let float_uncertaintyUUCResolution = Number(uncertaintyUUCResolution);
    let float_uncertaintyStandard = Number(uncertaintyStandard);
    let float_uncertaintyDrift = Number(uncertaintyDrift);
    let float_uncertaintyRepeatability_sqrd = Math.pow(float_uncertaintyRepeatability, 2);
    let float_uncertaintyUUCResolution_sqrd = Math.pow(float_uncertaintyUUCResolution, 2);
    let float_uncertaintyStandard_sqrd = Math.pow(float_uncertaintyStandard, 2);
    let float_uncertaintyDrift_sqrd = Math.pow(float_uncertaintyDrift, 2);
    let sumOfSquared = float_uncertaintyRepeatability_sqrd + float_uncertaintyUUCResolution_sqrd + float_uncertaintyStandard_sqrd + float_uncertaintyDrift_sqrd;
    let result = Math.sqrt(sumOfSquared);
    return result;
}

/**
 * 
 * @param {Number} uncertaintyRepeatability 
 * @param {Number} uncertaintyUUCResolution 
 * @param {Number} uncertaintyStandard 
 * @returns {Number}
 */
function currentCoil_combinedUncertainty(uncertaintyRepeatability, uncertaintyUUCResolution, uncertaintyStandard, uncertaintyDrift, currentCoilInteraction){
    let float_uncertaintyRepeatability = Number(uncertaintyRepeatability);
    let float_uncertaintyUUCResolution = Number(uncertaintyUUCResolution);
    let float_uncertaintyStandard = Number(uncertaintyStandard);
    let float_uncertaintyDrift = Number(uncertaintyDrift);
    let float_currentCoilInteraction = Number(currentCoilInteraction);
    
    let float_uncertaintyRepeatability_sqrd = Math.pow(float_uncertaintyRepeatability, 2);
    let float_uncertaintyUUCResolution_sqrd = Math.pow(float_uncertaintyUUCResolution, 2);
    let float_uncertaintyStandard_sqrd = Math.pow(float_uncertaintyStandard, 2);
    let float_uncertaintyDrift_sqrd = Math.pow(float_uncertaintyDrift, 2);
    let float_currentCoilInteraction_sqrd = Math.pow(float_currentCoilInteraction, 2);
    let sumOfSquared = float_uncertaintyRepeatability_sqrd + float_uncertaintyUUCResolution_sqrd + float_uncertaintyStandard_sqrd + float_uncertaintyDrift_sqrd + float_currentCoilInteraction_sqrd;
    let result = Math.sqrt(sumOfSquared);
    return result;
}

/**
 * 
 * @param {Number} combinedUncertainty 
 * @param {Number} uncertaintyRepeatability 
 * @param {Number} uncertaintyUUCResolution 
 * @param {Number} uncertaintyStandard 
 * @returns {Number}
 */
function vEff(combinedUncertainty, uncertaintyRepeatability, uncertaintyUUCResolution, uncertaintyStandard, uncertaintyDrift){
let float_combinedUncertainty = Number(combinedUncertainty);
let float_uncertaintyRepeatability = Number(uncertaintyRepeatability);
let float_uncertaintyUUCResolution = Number(uncertaintyUUCResolution);
let float_uncertaintyStandard = Number(uncertaintyStandard);
let float_uncertaintyDrift = Number(uncertaintyDrift);

let float_combinedUncertainty_frt = Math.pow(float_combinedUncertainty, 4);
let float_uncertaintyRepeatability_frt = Math.pow(float_uncertaintyRepeatability, 4);
let float_uncertaintyUUCResolution_frt = Math.pow(float_uncertaintyUUCResolution, 4);
let float_uncertaintyStandard_frt = Math.pow(float_uncertaintyStandard, 4);
let float_uncertaintyDrift_frt = Math.pow(float_uncertaintyDrift, 4);

let result = float_combinedUncertainty_frt / ((float_uncertaintyRepeatability_frt / 2) + (float_uncertaintyUUCResolution_frt / 1000000) + (float_uncertaintyStandard_frt / 1000000) + (float_uncertaintyDrift_frt / 1000000));
return result;
}

/**
 * 
 * @param {Number} veffective 
 * @returns {Number}
 */
function calculateK(veffective){
    let val_vEffective = Math.trunc(veffective);
    let kVal = formulajs.TINV(1 - 0.0455 / 2, val_vEffective);
    let valFloat = parseFloat(kVal)
    // let result = valFloat.toFixed(4)
    let result = valFloat.toFixed(4)
    return result;
}

/**
 * 
 * @param {Number} combinedUncertainty 
 * @param {Number} k2 
 * @returns {Number}
 */
function expandedUncertainty(combinedUncertainty, k2){
    let float_combinedUncertainty = Number(combinedUncertainty);
    let float_k = Number(k2);
    let result = float_combinedUncertainty * float_k;
    return result;
}

/**
 * 
 * @param {Number} testCurrent 
 * @param {Number} sensitivityCoefficient 
 * @returns {Number}
 */
function currentCoilInteraction(testCurrent, sensitivityCoefficient){
    let float_testCurrent = Number(testCurrent);
    let float_sensitivityCoefficient = Number(sensitivityCoefficient);
    // let result = (float_testCurrent * 0.005 * float_sensitivityCoefficient) + 0.5;
    let result = ((float_testCurrent * 0.005 * float_sensitivityCoefficient) + 0.5) / Math.sqrt(3);
    return result;
}