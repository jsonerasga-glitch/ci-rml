function average(array_values){
    let count = array_values.length
    let average = 0;
    for (i = 0; i < array_values.length; i++){
        average += Number(array_values[i]);
    }
    return average / count;
}

function differenceMCI(T1, T2, S1, S2){
    return ((parseFloat(T1) + parseFloat(T2)) / 2) - ((parseFloat(S1) + parseFloat(S2)) / 2);
}

function differenceAve(cycle, values){
    let cycleCount
    if(cycle){
        cycleCount = Number(cycle);
    }else{
        cycleCount = parseFloat($('#cycle').val());
    }
    var average = 0;
    for (i = 0; i < values.length; i++){
        average += values[i];
    }
    return average / cycleCount;
}

function standardDeviationOfMCI(values){
    var approxClass = document.getElementById('approxClass').value;
    if (approxClass != 'E2' && approxClass != 'F1'){
        var Max = Math.max.apply(null, values);
        var Min = Math.min.apply(null, values);
        var Result = (Max - Min) / (2 * Math.sqrt(3));
        return Result;
    } else {
        var Result = stdDev(values);
        return Result;
    }

}

function stdDev(data){
    var meanOfArray = 0;
    var distanceFromMean = [];
    var sumOfDistance = 0;
    var sumDividedByLength = 0;
    var standardDeviation = 0;
    for (let i = 0; i < data.length; i++){
        meanOfArray += parseFloat(data[i]);
        if (i == (data.length - 1)){
            meanOfArray = meanOfArray / data.length;
        }
    }
    for (let i = 0; i < data.length; i++){
        var distance = Math.pow((parseFloat(data[i]) - meanOfArray), 2);
        distanceFromMean.push(distance);
    }
    for (let i = 0; i < distanceFromMean.length; i++){
        sumOfDistance += distanceFromMean[i];
    }
    sumDividedByLength = sumOfDistance / (data.length - 1);
    standardDeviation = Math.sqrt(sumDividedByLength);
    return standardDeviation;
}
function CMSample(unit, CMofStandard, correctionAirBuoyancy, AverageOfDmc){
    var result;
    if (unit == "kg"){
        result = (CMofStandard * (1 + correctionAirBuoyancy) + AverageOfDmc) / 1000;
    }
    if (unit == "g"){
        result = (CMofStandard * (1 + correctionAirBuoyancy) + AverageOfDmc);
    }
    if (unit == "mg"){
        result = (CMofStandard * (1 + correctionAirBuoyancy) + AverageOfDmc) * 1000;
    }
    return result;
}
function airBuoyancyCorrection(densityReferenceInput, densitySampleInput, computedDensityUsingMeasuredPressureTempRHInput, conventionalAirDensityInput){
    let densityReference = Number(densityReferenceInput)
    let densitySample = Number(densitySampleInput)
    let computedDensityUsingMeasuredPressureTempRH = Number(computedDensityUsingMeasuredPressureTempRHInput)
    let conventionalAirDensity = Number(conventionalAirDensityInput)

    return ((computedDensityUsingMeasuredPressureTempRH - conventionalAirDensity) * ((1 / densitySample) - (1 / densityReference)))
}
function deviation(CMSampleInput, nominalValueInput){
    let CMSample = Number(CMSampleInput)
    let nominalValue = Number(nominalValueInput)
    var result = CMSample - nominalValue;
    return result;
}
function uncertSensitivityOfBalanceU(differenceAveInput, uncertSensitivityWeightInput, sensivitivyWeightInput, uncertSensitivityWeightDeltaInput, sensivitivyWeightDeltaInput){
    let differenceAve = Number(differenceAveInput);
    let uncertSensitivityWeight = Number(uncertSensitivityWeightInput);
    let sensivitivyWeight = Number(sensivitivyWeightInput);
    let uncertSensitivityWeightDelta = Number(uncertSensitivityWeightDeltaInput);
    let sensivitivyWeightDelta = Number(sensivitivyWeightDeltaInput);

    let differenceAve_sqrd = Math.pow(differenceAve, 2)
    let uncertSensitivityWeight_sqrd = Math.pow(uncertSensitivityWeight, 2)
    let sensivitivyWeight_sqrd = Math.pow(sensivitivyWeight, 2)
    let uncertSensitivityWeightDelta_sqrd = Math.pow(uncertSensitivityWeightDelta, 2)
    let sensivitivyWeightDelta_sqrd = Math.pow(sensivitivyWeightDelta, 2)
    let result = Math.sqrt(differenceAve_sqrd * ((uncertSensitivityWeight_sqrd / sensivitivyWeight_sqrd) + (uncertSensitivityWeightDelta_sqrd / sensivitivyWeightDelta_sqrd)))

    //var result = Math.sqrt(Math.pow(differenceAve, 2) * ((Math.pow(uncertSensitivityWeight, 2) / (Math.pow(sensivitivyWeight, 2))) + (Math.pow((uncertSensitivityWeightDelta), 2) / (Math.pow((sensivitivyWeightDelta), 2)))));
    return result;
}
function uncertResolutionOfBalanceU(balanceResoInput){
    let balanceReso = Number(balanceResoInput)
    var result = (((balanceReso / 2) / (Math.sqrt(3)))) * (Math.sqrt(2));
    return result;
}

function uncertEccentricLoadingU(difBetMaxMinVal){
    var result = difBetMaxMinVal / (2 * Math.sqrt(3));
    return result;
}

function TempAve(tempStart, tempFinish){
    var result = (tempStart + tempFinish) / 2
    return result;
}

function RHAve(RHStart, RHFinish){
    var result = (RHStart + RHFinish) / 2
    return result;
}

function APAve(APStart, APFinish){
    var result = (APStart + APFinish) / 2
    return result;
}

function computedDensityUsingMeasuredPressureTempRH(APInput, RHInput, TempInput){
    let AP = Number(APInput);
    let RH = Number(RHInput);
    let Temp = Number(TempInput);
    var result = ((0.34848 * AP - (0.009 * RH) * Math.exp((0.061 * Temp))) / (273.15 + Temp))
    return result;
}

function standardUncertDensityOfSampleWeight(uncertOfStandarSampleInput){
    let uncertOfStandarSample = Number(uncertOfStandarSampleInput)
    var result = uncertOfStandarSample / 2
    return result;
}

function standardUncertDensityOfReferenceWeight(uncertOfStandarReferenceInput){
    let uncertOfStandarReference = Number(uncertOfStandarReferenceInput)
    var result = uncertOfStandarReference / 2
    return result;
}

function standardUncertApproxAirDensity(computedDensityInput){
    let computedDensity = Number(computedDensityInput)
    var result = (2 * (Math.exp(-4))) * computedDensity;
    return result;
}

function standardUncertaintyAirBuoyancyCorrectionFactor(
    conventionalMassOfStandard,
    densityOfReference,
    densityOfSample,
    standardUncertApproxAirDensity,
    computedDensity,
    conventionalAirDensity,
    standardUncertDensitySample,
    standardUncertDensityReference,
    prevAirDensity
){
    var result = (Math.pow((conventionalMassOfStandard * ((densityOfReference - densityOfSample) / (
            densityOfReference * densityOfSample)) * (standardUncertApproxAirDensity)), 2)) +
        (Math.pow((conventionalMassOfStandard * (computedDensity - conventionalAirDensity)), 2) *
            ((Math.pow(standardUncertDensitySample, 2)) / (Math.pow(densityOfSample, 4)))) +
        ((((Math.pow(conventionalMassOfStandard, 2)) * (computedDensity - conventionalAirDensity)) *
            ((computedDensity - conventionalAirDensity) - (2 * (prevAirDensity - conventionalAirDensity))) *
            ((Math.pow(standardUncertDensityReference, 2)) / (Math.pow(densityOfReference, 4)))));

    return result;
}

function standardUncertConventionalMassOfReference(uncertReferenceWeightUsed, k){
    var result = parseFloat(uncertReferenceWeightUsed) / parseFloat(k)
    return result;
}
function uncertaintyReferenceWeight(uncReferenceWeight,k, drift){
    let uncReferenceWeightValue = parseFloat(uncReferenceWeight);
    let kValue = parseFloat(k);
    let driftValue = Number(drift)
    //var result = uncReferenceWeightValue/kValue;
    //return result;
    
    //let result = Math.sqrt(Math.pow((uncReferenceWeightValue/kValue),2) + ((driftValue/Math.pow(Math.sqrt(3), 2))))
    let result = Math.sqrt((Math.pow((uncReferenceWeightValue/kValue),2))+(Math.pow((driftValue/Math.sqrt(3)),2)));
    return result;
}

function standardUncertaintyWeighingProcess(pooledValue , standardDeviationOfMCI, cycle){
    var result = parseFloat(pooledValue);
    return result;
    
}

function standardUncertaintyBalance(uncertSensiBalance, uncertResoBalance, uncertEccentLoading, uncertMagneticSusceptibility){
    var result = Math.sqrt(sumOfSquare([uncertSensiBalance, uncertResoBalance]));
    return result;
}

function uc(airBuoyVal, uncertRefWeightVal, uncertWeighProcessVal, uncertBalVal){
    let airBuoy = airBuoyVal;
    let uncertRefWeight = uncertRefWeightVal;
    let uncertWeighProcess = uncertWeighProcessVal;
    let uncertBal = uncertBalVal;
    return Math.sqrt(parseFloat(airBuoy) + parseFloat(Math.pow(uncertRefWeight, 2)) + parseFloat(Math.pow(uncertWeighProcess, 2)) + parseFloat(Math.pow(uncertBal, 2)))
}

function ue(uc, k){
    return uc * k;
}

function ueINmg(ue, unit){
    var result;
    if (unit == "kg"){
        result = ue * 1000000;
    }
    if (unit == "g"){
        result = ue * 1000;
    }
    if (unit == "mg"){
        result = ue;
    }
    return result;
}



























///////////////////////////////////////////////// old formulas



// function differenceMCI(T1, T2, S1, S2) {
//     return ((parseFloat(T1) + parseFloat(T2)) / 2) - ((parseFloat(S1) + parseFloat(S2)) / 2);
// }

// function differenceAve(values) {
//     let cycleCount = parseFloat($('#cycle').val());
//     var average = 0;
//     for (i = 0; i < values.length; i++) {
//         average += values[i];
//     }
//     return average / cycleCount;
// }

// function standardDeviationOfMCI(values) {
//     var approxClass = document.getElementById('approxClass').value;
//     if (approxClass != 'E2' && approxClass != 'F1') {
//         var Max = Math.max.apply(null, values);
//         var Min = Math.min.apply(null, values);
//         var Result = (Max - Min) / (2 * Math.sqrt(3));
//         return Result;
//     } else {
//         var Result = stdDev(values);
//         return Result;
//     }

// }

// function stdDev(data) {
//     var meanOfArray = 0;
//     var distanceFromMean = [];
//     var sumOfDistance = 0;
//     var sumDividedByLength = 0;
//     var standardDeviation = 0;
//     for (let i = 0; i < data.length; i++) {
//         meanOfArray += parseFloat(data[i]);
//         if (i == (data.length - 1)) {
//             meanOfArray = meanOfArray / data.length;
//         }
//     }
//     for (let i = 0; i < data.length; i++) {
//         var distance = Math.pow((parseFloat(data[i]) - meanOfArray), 2);
//         distanceFromMean.push(distance);
//     }
//     for (let i = 0; i < distanceFromMean.length; i++) {
//         sumOfDistance += distanceFromMean[i];
//     }
//     sumDividedByLength = sumOfDistance / (data.length - 1);
//     standardDeviation = Math.sqrt(sumDividedByLength);
//     return standardDeviation;
// }

// function CMSample(unit, CMofStandard, correctionAirBuoyancy, AverageOfDmc) {
//     var result;
//     if (unit == "kg") {
//         result = (CMofStandard * (1 + correctionAirBuoyancy) + AverageOfDmc) / 1000;
//     }
//     if (unit == "g") {
//         result = (CMofStandard * (1 + correctionAirBuoyancy) + AverageOfDmc);
//     }
//     if (unit == "mg") {
//         result = (CMofStandard * (1 + correctionAirBuoyancy) + AverageOfDmc) * 1000;
//     }
//     return result;
// }

// function airBuoyancyCorrection(densityReference, densitySample, computedDensityUsingMeasuredPressureTempRH,
//     conventionalAirDensity) {
//     return ((computedDensityUsingMeasuredPressureTempRH - conventionalAirDensity) * ((1 / densitySample) - (1 /
//         densityReference)))

// }
// function deviation(CMSample, nominalValue) {
//     var result = CMSample - nominalValue;
//     return result;
// }

// function uncertSensitivityOfBalanceU(differenceAve, uncertSensitivityWeight, sensivitivyWeight,
//     uncertSensitivityWeightDelta, sensivitivyWeightDelta) {
//     var result = Math.sqrt(Math.pow(differenceAve, 2) * ((Math.pow(uncertSensitivityWeight, 2) / (Math.pow(
//         sensivitivyWeight, 2))) + (Math.pow((uncertSensitivityWeightDelta), 2) / (Math.pow((
//         sensivitivyWeightDelta), 2)))));
//     return result;
// }

// function uncertResolutionOfBalanceU(balanceReso) {
//     var result = (((balanceReso / 2) / (Math.sqrt(3)))) * (Math.sqrt(2));
//     return result;
// }

// function uncertEccentricLoadingU(difBetMaxMinVal) {
//     var result = difBetMaxMinVal / (2 * Math.sqrt(3));
//     return result;
// }

// function TempAve(tempStart, tempFinish) {
//     var result = (tempStart + tempFinish) / 2
//     return result;
// }

// function RHAve(RHStart, RHFinish) {
//     var result = (RHStart + RHFinish) / 2
//     return result;
// }

// function APAve(APStart, APFinish) {
//     var result = (APStart + APFinish) / 2
//     return result;
// }

// function computedDensityUsingMeasuredPressureTempRH(AP, RH, Temp) {
//     var result = ((0.34848 * AP - (0.009 * RH) * Math.exp((0.061 * Temp))) / (273.15 + Temp))
//     return result;
// }

// function standardUncertDensityOfSampleWeight(uncertOfStandarSample) {
//     var result = uncertOfStandarSample / 2
//     return result;
// }

// function standardUncertDensityOfReferenceWeight(uncertOfStandarReference) {
//     var result = uncertOfStandarReference / 2
//     return result;
// }

// function standardUncertApproxAirDensity(computedDensity) {
//     var result = (2 * (Math.exp(-4))) * computedDensity;
//     return result;
// }

// function standardUncertaintyAirBuoyancyCorrectionFactor(
//     conventionalMassOfStandard,
//     densityOfReference,
//     densityOfSample,
//     standardUncertApproxAirDensity,
//     computedDensity,
//     conventionalAirDensity,
//     standardUncertDensitySample,
//     standardUncertDensityReference,
//     prevAirDensity
// ) {
//     var result = (Math.pow((conventionalMassOfStandard * ((densityOfReference - densityOfSample) / (
//             densityOfReference * densityOfSample)) * (standardUncertApproxAirDensity)), 2)) +
//         (Math.pow((conventionalMassOfStandard * (computedDensity - conventionalAirDensity)), 2) *
//             ((Math.pow(standardUncertDensitySample, 2)) / (Math.pow(densityOfSample, 4)))) +
//         ((((Math.pow(conventionalMassOfStandard, 2)) * (computedDensity - conventionalAirDensity)) *
//             ((computedDensity - conventionalAirDensity) - (2 * (prevAirDensity - conventionalAirDensity))) *
//             ((Math.pow(standardUncertDensityReference, 2)) / (Math.pow(densityOfReference, 4)))));

//     return result;
// }

// function standardUncertConventionalMassOfReference(uncertReferenceWeightUsed, k) {
//     var result = parseFloat(uncertReferenceWeightUsed) / parseFloat(k)
//     return result;
// }
// function uncertaintyReferenceWeight(uncReferenceWeight,k){
//     let uncReferenceWeightValue = parseFloat(uncReferenceWeight);
//     let kValue = parseFloat(k);
//     var result = uncReferenceWeightValue/kValue;
//     return result;
// }

// function standardUncertaintyWeighingProcess(standardDeviationOfMCI, cycle, pooledValue) {
//     var result = parseFloat(pooledValue);
//     return result;

// }

// function standardUncertaintyBalance(uncertSensiBalance, uncertResoBalance, uncertEccentLoading,
//     uncertMagneticSusceptibility) {
//     var result = Math.sqrt(sumOfSquare([uncertSensiBalance, uncertResoBalance]));
//     return result;
// }

// function uc(airBuoyVal, uncertRefWeightVal, uncertWeighProcessVal, uncertBalVal) {
//     let airBuoy = airBuoyVal;
//     let uncertRefWeight = uncertRefWeightVal;
//     let uncertWeighProcess = uncertWeighProcessVal;
//     let uncertBal = uncertBalVal;
//     return Math.sqrt(parseFloat(airBuoy) + parseFloat(Math.pow(uncertRefWeight, 2)) + parseFloat(Math.pow(uncertWeighProcess, 2)) + parseFloat(Math.pow(uncertBal, 2)))
// }

// function ue(uc, k) {
//     return uc * k;
// }

// function ueINmg(ue, unit) {
//     var result;
//     if (unit == "kg") {
//         result = ue * 1000000;
//     }
//     if (unit == "g") {
//         result = ue * 1000;
//     }
//     if (unit == "mg") {
//         result = ue;
//     }
//     return result;
// }