const k = 2;
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

function combinedUncertainty(
    uncertaintyOfStandardUsed,                            
    uncertaintyDuetoDriftOfStandard,                      
    uncertaintyDueToResOfStandard,                        
    uncertaintyDueToResOfUUC,                              
    hstBias,                                              
    uncertaintyHstStandardDeviation                      
)
{
    let float_uncertaintyOfStandardUsed = parseFloat(uncertaintyOfStandardUsed);
    let float_uncertaintyDuetoDriftOfStandard = parseFloat(uncertaintyDuetoDriftOfStandard);
    let float_uncertaintyDueToResOfStandard = parseFloat(uncertaintyDueToResOfStandard);
    let float_uncertaintyDueToResOfUUC = parseFloat(uncertaintyDueToResOfUUC);
    let float_typeB_hstBias = parseFloat(hstBias);
    let float_typeB_uncertaintyHstStandardDeviation = parseFloat(uncertaintyHstStandardDeviation);

    let result = 
    
    Math.sqrt(Math.pow(float_uncertaintyOfStandardUsed, 2)
    + Math.pow(float_uncertaintyDuetoDriftOfStandard, 2) 
    + Math.pow(float_uncertaintyDueToResOfStandard, 2) 
    + Math.pow(float_uncertaintyDueToResOfUUC, 2) 
    + Math.pow(float_typeB_hstBias, 2) 
    + Math.pow(float_typeB_uncertaintyHstStandardDeviation, 2))

    return result;
}

function expandedUncertainty(combinedUncertainty){
    let float_combinedUncertainty = parseFloat(combinedUncertainty);
    let float_k = parseFloat(k);
    let result = float_combinedUncertainty * float_k;
    return result;
}

function calculateDriftOfStandard(
    observationObsPeriodValue,
    element_prevOutputFrequencyValue,
    element_outputFrequencyValue
    ){
    let float_observationObsPeriod = parseFloat(observationObsPeriodValue); //6
    let float_prevOutputFrequencyValue = parseFloat(element_prevOutputFrequencyValue); //6
    let float_outputFrequencyValue = parseFloat(element_outputFrequencyValue); //6
    
    let difference =  float_outputFrequencyValue  - float_prevOutputFrequencyValue  ;
    let quotient = difference / float_outputFrequencyValue;
    let result = float_observationObsPeriod * quotient;


    return result;
}

function calculateStandardUncertaintyValue(
    observationObsPeriodValue,
    element_uncertainty_HzValue,
    element_coverageFactorValue,
    element_outputFrequencyValue, 
    )
    {

    let float_observationObsPeriod = parseFloat(observationObsPeriodValue); 
    let float_element_uncertainty_Hz = parseFloat(element_uncertainty_HzValue); 
    let float_coveragedFactor = parseFloat(element_coverageFactorValue); 
    let float_element_outputFrequency = parseFloat(element_outputFrequencyValue); 

    let quotient1 = float_element_uncertainty_Hz / float_coveragedFactor;
    let quotient = quotient1 / float_element_outputFrequency  ;

let result =   quotient * float_observationObsPeriod;


    return result;
}

function uncertaintyOfStandardUsed(
    standardUncertaintyValue,
    element_coverageFactorValue, 
    )
    {
    let float_standardUncertaintyValue = parseFloat(standardUncertaintyValue); //1
    let float_element_coverageFactorValue = parseFloat(element_coverageFactorValue); //1
    let result = float_standardUncertaintyValue / float_element_coverageFactorValue
    return result;
}

function uncertaintyDuetoDriftOfStandard(driftOfStandard){
    let float_driftOfStandard = parseFloat(driftOfStandard); //2
    let result = float_driftOfStandard /  Math.sqrt(3)
    return result;

}

function uncertaintyDueToResOfStandard(
    standardResolutionValue

    ){
    let float_standardResolutionValue  = parseFloat(standardResolutionValue); //3
    let result = float_standardResolutionValue /( k *  Math.sqrt(3))
    return result;

}

function uncertaintyDueToResOfUUC(
    uucResolutionValue, 
){
    let float_uucResolutionValuen = parseFloat(uucResolutionValue); //4
    let result = float_uucResolutionValuen / (k * Math.sqrt(3)) 
    return result;

}

function hstBias(averageHST){
    let float_averageHST =  parseFloat(averageHST); //5
    let result = float_averageHST /  Math.sqrt(3)
    return result;

}

function uncertaintyHstStandardDeviation(stdDeviationHST){
    let float_stdDeviationHST = parseFloat(stdDeviationHST); //6
    let result = float_stdDeviationHST / 1
    return result;

}



