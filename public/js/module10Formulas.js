const sensitivityCoefficient = 1; 
const cf = 1; 
// const divisor_sqrt3 = Math.sqrt(3);
const divisor_sqrt3 = 1.732050807568880;




const constant_multiplicand = 2;

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

/** where mean computed from differece of average and correction from certificate */
function mean(
    computed_average,
    correctionfromCertificate
    ){

    let float_computed_average = parseFloat(computed_average);
    let float_correctionfromCertificate = parseFloat(correctionfromCertificate);
    let result = float_computed_average - float_correctionfromCertificate

    return result;
}

/** where x is tespoint number
 * x = b + ((x-a)*((d-b)/(c-a)))	
 */
function interppolateCorrection(
    variable_tp, 
    variableA, 
    variableB,
    variableC,
    variableD
  ) {

    let float_variable_tp= parseFloat(variable_tp);
    let float_variableA = parseFloat(variableA);
    let float_variableB = parseFloat(variableB);
    let float_variableC = parseFloat(variableC);
    let float_variableD = parseFloat(variableD);

    
let  difference_variableE = float_variableC - float_variableA
let  difference_variableF = float_variableD - float_variableB

let  ratio = difference_variableF / difference_variableE

let  result =  float_variableB + ((float_variable_tp - float_variableA) * ratio);


return result;
}
function correctedValue(
    testPoint,
    computed_interpolateCorrection
    ){
    let float_testPoint = parseFloat(testPoint);
    let float_interpolateCorrection = parseFloat(computed_interpolateCorrection);
    let result =  float_testPoint + float_interpolateCorrection;
    return result;
}

function deviation(average, testPoint){
    let float_average = parseFloat(average);
    let float_testPoint = parseFloat(testPoint);
    let result = float_average - float_testPoint;
    return result;
}

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

function diferrence(
    variableA,
    variableB
    ){

    let float_variableA = parseFloat(variableA);
    let float_variableB = parseFloat(variableB);
    let result = float_variableA - float_variableB;

    return result;
}

function uucRepeatability(standardDeviation){
    let float_standardDeviation = parseFloat(standardDeviation);
    let result = float_standardDeviation / divisor_sqrt3;
    return result;
}

function uncertaintyUUCRepeatability(
    uucRepeatability, 
    ){
    let float_uucRepeatability= parseFloat(uucRepeatability);
    let float_divisor = parseFloat(cf);
    let float_sensitivityCoefficient = parseFloat(sensitivityCoefficient);
    let result = (float_uucRepeatability/float_divisor) * float_sensitivityCoefficient;
    return result;
}

function uncertaintyUUCResolutionAnalog(
    uucGraduation, 
    uucReadability, 
    ){
    let float_uucGraduation = parseFloat(uucGraduation);
    let float_ruucReadability = parseFloat(uucReadability);
    let float_divisor = parseFloat(divisor_sqrt3);
    let float_sensitivityCoefficient = parseFloat(sensitivityCoefficient);
    let result = ((float_uucGraduation * float_ruucReadability) / float_divisor) * float_sensitivityCoefficient;
    return result;
}

function uncertaintyUUCResolutionDigital(
    uucResolution, 
    ){
    let float_uucResolution= parseFloat(uucResolution);
    let float_divisor = parseFloat(divisor_sqrt3);
    let float_sensitivityCoefficient = parseFloat(sensitivityCoefficient);
    let float_constant_multiplicand = parseFloat(constant_multiplicand);
    let divisor = float_constant_multiplicand * float_divisor;
    let result = ((float_uucResolution)/divisor) * float_sensitivityCoefficient;
    return result;
}

function uncertaintyReferenceStandard(
    standardUncertaintyValue, 
    coverageFactor, 

    ){
    let float_standardUncertaintyValue= parseFloat(standardUncertaintyValue);
    let float_coverageFactor = parseFloat(coverageFactor);
    let float_sensitivityCoefficient = parseFloat(sensitivityCoefficient);
    let result = (float_standardUncertaintyValue/float_coverageFactor) * float_sensitivityCoefficient;
    return result;
}

function uncertaintyResolutionStandard(
    stdResolution,
    stdReadability,
    ){
    let float_stdResolution = parseFloat(stdResolution);
    let float_stdReadability = parseFloat(stdReadability);
    let float_divisor = parseFloat(divisor_sqrt3);
    let float_sensitivityCoefficient = parseFloat(sensitivityCoefficient);
    let result = ((float_stdResolution * float_stdReadability) / float_divisor) * float_sensitivityCoefficient
    return result;
}

function multipliedInfluenceFactorAndPercentage(
    sensorType,
    testpoint,
    influenceFactorStandard,
    percentageInfluenceFactorStandard
) {
    let str_sensorType = String(sensorType); // Ensure sensorType is treated as a string
    let float_testpoint = parseFloat(testpoint);
    let float_influenceFactorStandard = parseFloat(influenceFactorStandard);
    let float_percentageInfluenceFactorStandard = parseFloat(percentageInfluenceFactorStandard);
    let result;

    if (str_sensorType === 'RTD Pt100') {
        if (float_testpoint > 100) {
            result = (float_testpoint * float_percentageInfluenceFactorStandard) + float_influenceFactorStandard;
        } else {
            result = float_influenceFactorStandard;
        }
    } else {
        result = float_influenceFactorStandard;
    }

    return result;
}



function uncertaintyInfluenceFactor(
    influenceFactorStandard,
    ){
    let float_influenceFactorStandard = parseFloat(influenceFactorStandard);
    let float_divisor = parseFloat(divisor_sqrt3);
    let float_sensitivityCoefficient = parseFloat(sensitivityCoefficient);
    let result =(float_influenceFactorStandard/float_divisor)*float_sensitivityCoefficient
    return result;
}

function uncertaintyDriftStandard(               
    driftofStandardValue,
    ){
    let float_influenceFactorStandard = parseFloat(driftofStandardValue);
    let float_divisor = parseFloat(divisor_sqrt3);
    let float_sensitivityCoefficient = parseFloat(sensitivityCoefficient);
    let result =(float_influenceFactorStandard / float_divisor) * float_sensitivityCoefficient
    return result;
}

  function combinedUncertainty(
    computed_uncertaintyUUCRepeatability, 
    computed_uncertaintyUUCResolution, 
    computed_uncertaintyReferenceStandard, 
    computed_uncertaintyInfluenceFactor,
    computed_uncertaintyResolutionStandard,
    computed_uncertaintyDriftStandard,
)
{
    let float_valueA = parseFloat(computed_uncertaintyUUCRepeatability);
    let float_valueB = parseFloat(computed_uncertaintyUUCResolution);
    let float_valueC = parseFloat(computed_uncertaintyReferenceStandard);

    let float_valueD = parseFloat(computed_uncertaintyInfluenceFactor);
    let float_valueE = parseFloat(computed_uncertaintyResolutionStandard);
    let float_valueF = parseFloat(computed_uncertaintyDriftStandard);


    // let valueA = Math.pow(float_valueA, 2);
    // let valueB = Math.pow(float_valueB, 2);
    // let valueC = Math.pow(float_valueC, 2);

    // let valueD = Math.pow(float_valueD, 2);
    // let valueE = Math.pow(float_valueE, 2);
    // let valueF = Math.pow(float_valueF, 2);

    let valueA = float_valueA ** 2;
    let valueB = float_valueB ** 2;
    let valueC = float_valueC ** 2;
    let valueD = float_valueD ** 2;
    let valueE = float_valueE ** 2;
    let valueF = float_valueF ** 2;

   sum =  
          valueA
        + valueB 
        + valueC
        + valueD
        + valueE
        + valueF

    let result = Math.sqrt(sum);
    
    // Math.sqrt(
    //   valueA
    // + valueB 
    // + valueC

    // + valueD
    // + valueE
    // + valueF
    // )
    
    

      
      
    
    
    
    




    return result;
}

function Veff(
    computed_combinedUncertainty,

    computed_uncertaintyRepeatability, 
    computed_uncertaintyUUCResolution, 
    computed_uncertaintyStandard, 

    computed_uncertaintyDuetoInfluenceFactor,
    computed_uncertaintyDuetoResofStandard,
    computed_uncertaintydrifofStandard,
 ){

let float_combinedUncertainty = parseFloat(computed_combinedUncertainty);

let float_uncertaintyRepeatability = parseFloat(computed_uncertaintyRepeatability);
let float_uncertaintyUUCResolution = parseFloat(computed_uncertaintyUUCResolution);
let float_uncertaintyStandard = parseFloat(computed_uncertaintyStandard);

let float_uncertaintyDuetoInfluenceFactor = parseFloat(computed_uncertaintyDuetoInfluenceFactor);
let float_uncertaintyDuetoResofStandard = parseFloat(computed_uncertaintyDuetoResofStandard);
let float_uncertaintydrifofStandard = parseFloat(computed_uncertaintydrifofStandard);


let combinedUncertainty_frt = Math.pow(float_combinedUncertainty, 4);

let uncertaintyRepeatability_frt = Math.pow(float_uncertaintyRepeatability, 4);
let uncertaintyUUCResolution_frt = Math.pow(float_uncertaintyUUCResolution, 4);
let uncertaintyStandar_frt = Math.pow(float_uncertaintyStandard, 4);

let uncertaintyDuetoInfluenceFactor_frt = Math.pow(float_uncertaintyDuetoInfluenceFactor, 4);
let uncertaintyDuetoResofStandard_frt = Math.pow(float_uncertaintyDuetoResofStandard, 4);
let uncertaintydrifofStandard_frt = Math.pow(float_uncertaintydrifofStandard, 4);

let result = combinedUncertainty_frt / 

((uncertaintyRepeatability_frt / 2) 
+ (uncertaintyUUCResolution_frt / 1000000) 
+ (uncertaintyStandar_frt / 1000000) 
+ (uncertaintyDuetoInfluenceFactor_frt / 1000000) 
+ (uncertaintyDuetoResofStandard_frt / 1000000) 
+ (uncertaintydrifofStandard_frt / 1000000));


return result;
    }

function coverageFactor_k(vEffective) {
        // Truncate vEffective value
        vEffective = Math.trunc(vEffective);
        let kVal = formulajs.TINV(1 - (0.0455 / 2), vEffective);
        let valFloat = parseFloat(kVal);
        let result = valFloat;
        return result;
    }

function expandedUncertainty(
        combinedUncertainty, 
        coverageFactork
      
    ){
        let float_combinedUncertainty = parseFloat(combinedUncertainty); 
        let float_coverageFactork = parseFloat(coverageFactork); 
        let result =  float_combinedUncertainty * float_coverageFactork; 
        return result;
    }




 