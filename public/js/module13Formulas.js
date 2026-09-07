var k2 = 2;

function average(array_trials){
    const filtered_array = array_trials.filter(value => value !== '' && !isNaN(parseFloat(value)));
    const numberOfTrials = filtered_array.length;
    const result = filtered_array.reduce((sum, num) => parseFloat(sum) + parseFloat(num), 0) / numberOfTrials;
    return result;
}

//Have Rounding Discrepancy that starts at the 7th decimal place
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

function typeA_Repeatability(array_trials){
    let stDev = standardDeviation(array_trials);
    let result = parseFloat(stDev) / Math.sqrt(6)
    return result;
}

function typeB_UUCResolution(uucResolution){
    let float_uucResolution = parseFloat(uucResolution);
    let result = float_uucResolution / Math.sqrt(12)
    return result;
}

function typeB_Standard(uncertaintyOfStandard){
    let float_uncertaintyOfStandard = parseFloat(uncertaintyOfStandard);
    let result = float_uncertaintyOfStandard / 2
    return result;
}

function typeB_BalanceResolution(balanceResolution){
    let float_balanceResolution = parseFloat(balanceResolution);
    let result = float_balanceResolution / Math.sqrt(12)
    return result;
}

function combinedUncertainty(
    typeA_Repeatability,
    typeB_UUCResolution,
    typeB_Standard,
    typeB_BalanceResolution
){
    let float_typeA_Repeatability = parseFloat(typeA_Repeatability);
    let float_typeB_UUCResolution = parseFloat(typeB_UUCResolution);
    let float_typeB_Standard = parseFloat(typeB_Standard);
    let float_typeB_BalanceResolution = parseFloat(typeB_BalanceResolution);

    let result = Math.sqrt(Math.pow(float_typeA_Repeatability, 2) + Math.pow(float_typeB_UUCResolution, 2) + Math.pow(float_typeB_Standard, 2) + Math.pow(float_typeB_BalanceResolution, 2))
    return result;
}

function expandedUncertanty(combinedUncertainty, k){
    let float_combinedUncertainty = parseFloat(combinedUncertainty);
    let float_k = parseFloat(k);
    let result = float_combinedUncertainty * float_k;
    return result;
}