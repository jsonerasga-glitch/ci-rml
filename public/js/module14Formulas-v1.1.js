const divisor_2 = 2;
const divisor_sqrt12 = Math.sqrt(12);
const sensitivity_coefficient_1 = 1;
const k2 = 2;


function average(array_value){
    const filtered_array = array_value.filter(value => value !== '' && !isNaN(parseFloat(value)));
    const numberOfTrials = filtered_array.length;
    const result = filtered_array.reduce((sum, num) => parseFloat(sum) + parseFloat(num), 0) / numberOfTrials;
    return result;
}

function formula_standardDeviation(array_trials){
    const arr = array_trials.filter(value => value !== '' && !isNaN(parseFloat(value)));
    const n = arr.length;
    const mean = arr.reduce((sum, num) => parseFloat(sum) + parseFloat(num), 0) / n;
    const squaredDifferences = arr.map(num => Math.pow(num - mean, 2));
    const sumSquaredDifferences = squaredDifferences.reduce((sum, num) => sum + num, 0);
    const variance = sumSquaredDifferences / (n - 1);
    const standardDeviation = Math.sqrt(variance);
    return standardDeviation;
}


function value_build_up_reference_standard(num_maxRange){
    let float_maxRange = parseFloat(num_maxRange);
    let result;
    if(float_maxRange<200){
        result = 0.002;
    }else{
        result = 3;
    }
    return result;
}

function value_difference_CTE(num_CTEuuc, num_CTEstd){
    let float_CTEuuc = parseFloat(num_CTEuuc);
    let float_CTEstd = parseFloat(num_CTEstd);
    let result = float_CTEuuc - float_CTEstd;
    return result;
}

function value_sensitivity_resolution(num_graduation){
    let float_graduation = parseFloat(num_graduation);
    let result = float_graduation / 2;
    return result;
}

function value_flatness(num_max_spindelAnvil){
    let float_max_spindelAnvil = parseFloat(num_max_spindelAnvil);
    let result = float_max_spindelAnvil / 2 / Math.sqrt(3);
    return result;
}

function value_parallel(num_parallel){
    let float_parallel = parseFloat(num_parallel);
    let result = float_parallel / 2 / Math.sqrt(3);
    return result;
}

function sensitivity_coefficient_difference_CTE(num_maxRange, num_allowableTempFluctuation){
    let float_maxRange = parseFloat(num_maxRange);
    let float_allowableTempFluctuation = parseFloat(num_allowableTempFluctuation);
    let result = float_maxRange * float_allowableTempFluctuation;
    return result;
}

function sensitivity_coefficient_CTE(num_maxRange, num_tempRange){
    let float_maxRange = parseFloat(num_maxRange);
    let float_tempRange = parseFloat(num_tempRange);
    let result = float_maxRange * float_tempRange;
    return result;
}

function sensitivity_coefficient_difference_temperature(num_CTEuuc, num_maxRange){
    let float_maxRange = parseFloat(num_maxRange);
    let float_CTEuuc = parseFloat(num_CTEuuc);
    let result = float_CTEuuc * float_maxRange;
    return result;
}   

function UiCi(num_value, num_divisor, num_sensitivityCoefficient){
    let float_value = parseFloat(num_value);
    let float_divisor = parseFloat(num_divisor);
    let float_sensitivityCoefficient = parseFloat(num_sensitivityCoefficient);
    let result = Math.pow(((float_value / float_divisor) * float_sensitivityCoefficient), 2);
    return result;
}

function combinedUncertainty(num_unc_standard, num_unc_buildUpReferenceStandard, num_unc_differenceCTE, num_unc_CTE, num_unc_diffTemp, num_unc_tempCalItem, num_unc_sensitivityResolution, num_unc_repeatedReading){
    let float_unc_standard = parseFloat(num_unc_standard);
    let float_unc_buildUpReferenceStandard = parseFloat(num_unc_buildUpReferenceStandard);
    let float_unc_differenceCTE = parseFloat(num_unc_differenceCTE);
    let float_unc_CTE = parseFloat(num_unc_CTE);
    let float_unc_diffTemp = parseFloat(num_unc_diffTemp);
    let float_unc_tempCalItem = parseFloat(num_unc_tempCalItem);
    let float_unc_sensitivityResolution = parseFloat(num_unc_sensitivityResolution);
    let float_unc_repeatedReading = parseFloat(num_unc_repeatedReading);

    let sum = float_unc_standard + float_unc_buildUpReferenceStandard + float_unc_differenceCTE + float_unc_CTE + float_unc_diffTemp + float_unc_tempCalItem + float_unc_sensitivityResolution + float_unc_repeatedReading
    let result = Math.sqrt(sum);
    return result
}

function micrometer_combinedUncertainty(num_unc_standard, num_unc_buildUpReferenceStandard, num_unc_differenceCTE, num_unc_CTE, num_unc_diffTemp, num_unc_tempCalItem, num_unc_sensitivityResolution, num_unc_repeatedReading, num_unc_parallelism, num_unc_flatness){
    let float_unc_standard = parseFloat(num_unc_standard);
    let float_unc_buildUpReferenceStandard = parseFloat(num_unc_buildUpReferenceStandard);
    let float_unc_differenceCTE = parseFloat(num_unc_differenceCTE);
    let float_unc_CTE = parseFloat(num_unc_CTE);
    let float_unc_diffTemp = parseFloat(num_unc_diffTemp);
    let float_unc_tempCalItem = parseFloat(num_unc_tempCalItem);
    let float_unc_sensitivityResolution = parseFloat(num_unc_sensitivityResolution);
    let float_unc_repeatedReading = parseFloat(num_unc_repeatedReading);

    let float_unc_parallelism = parseFloat(num_unc_parallelism);
    let float_unc_flatness = parseFloat(num_unc_flatness);

    let sum = float_unc_standard + float_unc_buildUpReferenceStandard + float_unc_differenceCTE + float_unc_CTE + float_unc_diffTemp + float_unc_tempCalItem + float_unc_sensitivityResolution + float_unc_repeatedReading + float_unc_parallelism + float_unc_flatness
    let result = Math.sqrt(sum);
    return result
}

function expandedUncertainty(num_combinedUncertainty, num_k){
    let float_combinedUncertainty = parseFloat(num_combinedUncertainty);
    let float_k = parseFloat(num_k);
    let result =  float_combinedUncertainty * float_k;
    return result;
}

function uncertainty_flatness(num_flatness){

}



//#region Old Formulas

function uncertainty_standard(num_standardUncertainty){
    let num_result =  Number(num_standardUncertainty) / 2;
    return num_result;
}

function uncertainty_uucResolution(num_graduation, num_readability){
    let num_result = (Number(num_graduation) * Number(num_readability)) / 2 / Math.sqrt(3);
    return num_result;
}

function uncertainty_wringg(){
    let num_result = 0.0005 / 2 / Math.sqrt(3);
    return num_result;
}

function uncertainty_deltaT(num_temp){
    let num_result = (Number(num_temp) - 20) / (2 * Math.sqrt(3));
    return num_result;
}

function uncertainty_deltaL(num_deltaT, num_equiv){
    let num_result = Number(num_deltaT) * ((11.5 * Math.pow(10, -6)) * Number(num_equiv));
    return num_result;
}

function uncertainty_standardDeviation(array_trials){
    let num_stDev = formula_standardDeviation(array_trials);
    let num_countOfTrials = array_trials.length;
    let num_result = num_stDev / num_countOfTrials;
    return num_result;
}

function uncertainty_combinedUncertainty(num_uncertaintyStandard, num_uncertaintyUUCResolution, num_uncertaintyWringg, num_uncertaintyDeltaL, num_uncertaintyStDev){
    let float_num_uncertaintyStandard = Number(num_uncertaintyStandard);
    let float_num_uncertaintyUUCResolution = Number(num_uncertaintyUUCResolution);
    let float_num_uncertaintyWringg = Number(num_uncertaintyWringg);
    let float_num_uncertaintyDeltaL = Number(num_uncertaintyDeltaL);
    let float_num_uncertaintyStDev = Number(num_uncertaintyStDev);

    let float_num_uncertaintyStandard_sqrd = Math.pow(float_num_uncertaintyStandard, 2)
    let float_num_uncertaintyUUCResolution_sqrd = Math.pow(float_num_uncertaintyUUCResolution, 2)
    let float_num_uncertaintyWringg_sqrd = Math.pow(float_num_uncertaintyWringg, 2)
    let float_num_uncertaintyDeltaL_sqrd = Math.pow(float_num_uncertaintyDeltaL, 2)
    let float_num_uncertaintyStDev_sqrd = Math.pow(float_num_uncertaintyStDev, 2)
    
    let sumOfSquared = float_num_uncertaintyStandard_sqrd + float_num_uncertaintyUUCResolution_sqrd + float_num_uncertaintyWringg_sqrd + float_num_uncertaintyDeltaL_sqrd + float_num_uncertaintyStDev_sqrd;

    let num_result = Math.sqrt(sumOfSquared);
    return num_result;
}

function calculateK(veffective){
    let val_vEffective = Math.trunc(veffective);
    let kVal = formulajs.TINV(1 - 0.0455 / 2, val_vEffective);
    let valFloat = parseFloat(kVal)
    let num_result = valFloat.toFixed(4)
    return num_result;
}

function expandedUncertainty(num_combinedUncertainty, num_k){
    let float_combinedUncertainty = Number(num_combinedUncertainty);
    let float_k = Number(num_k);
    let result = float_combinedUncertainty * float_k;
    return result;
}

function nominal_length(num_equiv, num_overall){
    let float_num_equiv = Number(num_equiv);
    let float_num_overall = Number(num_overall);
    let result = float_num_equiv + (float_num_overall / 1000);
    return result;
}

function uuc_err(num_average, num_nominalLength){
    let float_num_average = Number(num_average);
    let float_num_nominalLength = Number(num_nominalLength);
    let result = (float_num_average - float_num_nominalLength);
    return result;
}
