
/*

April 23, 2024
    CP-001-F2 Rev.1
    Effectivity Date: 01 June 2023

*/

function interpolationOfCorrection(num_tp_min, num_tp_max, num_corr_min, num_corr_max, num_mid){
    let float_tp_min = parseFloat(num_tp_min);
    let float_tp_max = parseFloat(num_tp_max);
    let float_corr_min = parseFloat(num_corr_min);
    let float_corr_max = parseFloat(num_corr_max);
    let float_mid = parseFloat(num_mid);

    let diff_tp = float_tp_max - float_tp_min;
    let diff_corr = float_corr_max - float_corr_min;
    let ratio = diff_corr / diff_tp;

    let correction = float_corr_min + ((float_mid - float_tp_min) * ratio)
    return correction;
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
    let num_result = valFloat.toFixed(4)
    return num_result;
}
0
/**
 * 
 * @param {Number} valResult 
 * @param {Number} CfVal 
 * @param {Number} ScVal 
 * @param {String} unit 
 * @returns {Object<Number>}
 * uStdMax:{
 *       unit:{Number}
 *       standardUnit:{Number}
 *  }
 */
function uStdMax(valResult, CfVal, ScVal, unit){
    let val = parseFloat(valResult);
    let Cf = parseFloat(CfVal);
    let Sc = parseFloat(ScVal);
    let result = (val/Cf)*Sc;
    let converted = standardToUUC(result, standardUnit, unit);
    //                                      ↑ PAB Unit
    let uncertainty = {[unit]:result,[standardUnit]:converted};
    return uncertainty;
}

/**
 * 
 * @param {Number} valResult 
 * @param {Number} CfVal        
 * @param {Number} ScVal 
 * @param {String} unit 
 * @returns {Object<Number>}
 * uHeightDifference{
 *      Pa:{Number}
 *      standardUnit:{Number}
 *      unit:{Number}
 * }      
 */
function uHeightDifference(valResult, CfVal, ScVal, unit){
    let convertValue= convert2(1,unit,standardUnit);
    let val = parseFloat(valResult);
    let Cf = parseFloat(CfVal);
    let Sc = parseFloat(ScVal);

    let Pa = (val/Cf)*1
    let uucResult = Pa*(convertValue/1000)
    let standardResult = convert2(Pa,'Pa',standardUnit)
    
    let uStd = {'Pa':Pa,[standardUnit]:uucResult,[unit]:standardResult};
    return uStd;
}

/**
 * 
 * @param {Number} valResult 
 * @param {Number} readbltyVal 
 * @param {Number} CfVal 
 * @param {Number} ScVal 
 * @param {String} unit 
 * @returns {Object<Number>}
 * uResolutionUUC{
 *      unit:{Number}
 *      standardUnit:{Number}
 * }		
 */
function uResolution(valResult, readbltyVal, CfVal, ScVal, unit){
    let val = parseFloat(valResult);
    let readblty = parseFloat(readbltyVal);
    let Cf = parseFloat(CfVal);
    let Sc = parseFloat(ScVal);

    let result = ((val*readblty)/Cf)*Sc;
    let converted = standardToUUC(result, standardUnit, unit);
    let uncertainty = {[unit]:result,[standardUnit]:converted};
    return uncertainty;
}

/**
 * 
 * @param {Number} valResult 
 * @param {Number} CfVal 
 * @param {Number} ScVal 
 * @param {String} unit 
 * @returns {Object<Number>}
 * uZeroDeviation{
 *      unit:{Number}
 *      standardUnit:{Number}
 * }		
 */
function uZeroDeviation(valResult, CfVal, ScVal, unit){
    let val = parseFloat(valResult);
    let Cf = parseFloat(CfVal);
    let Sc = parseFloat(ScVal);
    let result = (val/Cf)*Sc;
    let converted = standardToUUC(result, standardUnit, unit);
    //let uncertainty = {[standardUnit]:result,[unit]:converted};
    let uncertainty = {[unit]:result,[standardUnit]:converted};
    return uncertainty;
}

/**
 * 
 * @param {Number} valResult 
 * @param {Number} CfVal 
 * @param {Number} ScVal 
 * @param {String} unit 
 * @returns {Object<Number>}
 * uHysterisis = [
 *      unit:{Number}
 *      standardUnit:{Number}
 * ]
 */
function uHysterisis(valResult, CfVal, ScVal, unit){
    let val = parseFloat(valResult);
    let Cf = parseFloat(CfVal);
    let Sc = parseFloat(ScVal);
    let result = (val/Cf)*Sc;
    let converted = standardToUUC(result, standardUnit, unit);
    let uncertainty = {[unit]:result,[standardUnit]:converted};
    return uncertainty;
}

/**
 * 
 * @param {Number} valResult 
 * @param {Number} CfVal 
 * @param {Number} ScVal 
 * @param {String} unit 
 * @returns {Object<Number>}
 * uRepeatability{
 *      unit:{Number}
 *      standardUnit:{Number}
 * }		
 */
function uRepeatability(valResult, CfVal, ScVal, unit){
    let val = parseFloat(valResult);
    let Cf = parseFloat(CfVal);
    let Sc = parseFloat(ScVal);
    let result = (val/Cf)*Sc;
    let converted = standardToUUC(result, standardUnit, unit);
    let uncertainty = {[unit]:result,[standardUnit]:converted};
    return uncertainty;
}

/**
 * 
 * @param {Number} uStdMax 
 * @param {Number} uHeightDifference 
 * @param {Number} uResolutionUUC 
 * @param {Number} uZeroDeviation 
 * @param {Number} uHysterisis 
 * @param {Number} uRepeatability 
 * @param {Number} uResolutionSTD 
 * @returns {Array<Number>}
 * uCUucUnit[] and uCStdUnit[]
 */
function uC(uStdMax, uHeightDifference, uResolutionUUC, uZeroDeviation, uHysterisis, uRepeatability, uResolutionSTD){
    let uStdMaxResult = parseFloat(uStdMax);
    let uHeightDifferenceResult = parseFloat(uHeightDifference);
    let uResolutionUUCResult = parseFloat(uResolutionUUC);
    let uResolutionSTDResult = parseFloat(uResolutionSTD);
    let uZeroDeviationResult = parseFloat(uZeroDeviation);
    let uHysterisisResult = parseFloat(uHysterisis);
    let uRepeatabilityResult = parseFloat(uRepeatability);

    let result = Math.sqrt((Math.pow(uStdMaxResult,2))+(Math.pow(uHeightDifferenceResult,2))+(Math.pow(uResolutionUUCResult,2))+(Math.pow(uZeroDeviationResult,2))+(Math.pow(uHysterisisResult,2))+(Math.pow(uRepeatabilityResult,2))+(Math.pow(uResolutionSTDResult,2)));
    return result;
}

function vEff(uc,uStdMax,uHeightDifference,uResolutionUUC,uZeroDeviation,uHysterisis){
    let uCResult = parseFloat(uc);
    let uStdMaxResult = parseFloat(uStdMax);
    let uHeightDifferenceResult = parseFloat(uHeightDifference);
    let uResolutionUUCResult = parseFloat(uResolutionUUC);
    let uZeroDeviationResult = parseFloat(uZeroDeviation);
    let uHysterisisResult = parseFloat(uHysterisis);

    let result = (Math.pow(uCResult, 4)) / ((Math.pow(uStdMaxResult, 4)/1000000) + (Math.pow(uHeightDifferenceResult, 4)/1000000) + (Math.pow(uResolutionUUCResult, 4)/1000000) + (Math.pow(uZeroDeviationResult, 4)/1000000) + (Math.pow(uHysterisisResult, 4)/1000000));
    return result;
}

function uE(uc,kVal){
    let uCResult = parseFloat(uc);
    let K = parseFloat(kVal);

    let result = K*uCResult;
    return result;
}

function getArrayOfTestPoints(){
    let result = [];
    for (let i = 0; i < 9; i++) {
        let idOfTestPOint = 'testPointRow'+i;
        result.push(document.getElementById(idOfTestPOint).value)
    }
    return result;
}


function valStdMax(){
    let arrayOfUncertainty = [];
    standardValues.standardValue.forEach( val => {
        arrayOfUncertainty.push(parseFloat(val.uncertainty))
    })
    let result = arrayOfUncertainty.reduce((a, b) => Math.max(a, b), -Infinity);
    return result;
}

function valStdCF(){   
    let result = standardValues.standardDetails[0].coverageFactor
    return result;
}


function valStdOriginalUnit(){   
    let result = standardValues.standardDetails[0].unit_Original
    return result;
}

function valStdConvertedUnit(){   
    let result = standardValues.standardDetails[0].unit_Converted
    return result;
}



function valStdCorr(num_tp){
    console.log(standardValues)
}

function valHeightDifference(){
    let hDiff = Number(document.getElementById('hDiff').value);
    let medium = document.getElementById('medium').value;
    let readability = Number(document.getElementById('readability').value);
    let rhAmb = Number(document.getElementById('rhAmb').value);
    let pAmb = Number(document.getElementById('pAmb').value);

    let pAmbUnit = document.getElementById('pAmbUnit').value;

    /////////// Uncertain To Be Checked
    let uRuler = 0;
    let g = 9.80665;
    ///////////

    let pf = medium == 'air' ? 1.2 : medium == 'distilled water' ? 1 : 0;
    let pa = (((0.34848*1000*pAmb)-(0.009024*rhAmb*Math.exp(0.0612*readability)))/(273.15+readability));

    let result = (((pf-pa)*g*uRuler*hDiff));
    return result;
}

function valZeroDev(){
    let m1StdReadingUUCUnit= Number(document.getElementById('M1stdRow0').value);
    let m2StdReadingUUCUnit = Number(document.getElementById('M2stdRow0').value);
    let result = (Math.max(Math.abs(m1StdReadingUUCUnit-m2StdReadingUUCUnit)))
    return result;
}

function valHysterisis(m1StdReadingId, m2StdReadingId){
    let calibSequenceN = selectedSequence == 'A' ? 2 : selectedSequence == 'B' ? 1 : selectedSequence == 'C' ? 1 : 0;
    let m1Row1StdReadingUUCUnit= Number(document.getElementById('M1stdRow0').value);
    let m1StdReading = parseFloat($('#'+m1StdReadingId).val());
    let m2StdReading = parseFloat($('#'+m2StdReadingId).val());
    let result = (1/calibSequenceN)*((Math.abs((m2StdReading-m1Row1StdReadingUUCUnit)-(m1StdReading-m1Row1StdReadingUUCUnit))));
    return result;
}

function valRep(m1StdReadingId, m3StdReadingId){
    let m1StdReadingUUCUnit= Number(document.getElementById('M1stdRow0').value);
    let m3StdReadingUUCUnit = Number(document.getElementById('M3stdRow0').value);
    let m1StdReading = parseFloat($('#'+m1StdReadingId).val());
    let m3StdReading = parseFloat($('#'+m3StdReadingId).val());

    let result = ((Math.abs((m3StdReading-m3StdReadingUUCUnit)-(m1StdReading-m1StdReadingUUCUnit)))/(2*Math.sqrt(3)))
    return result;
}

function valRepAndMax(){
    let araryOfValRep = [];
    for (let i = 0; i < 9; i++) {
        let m1ID = 'M1stdRow'+i;
        let m3ID = 'M3stdRow'+i;
        araryOfValRep.push(valRep(m1ID, m3ID));
    }
    let maxVal = araryOfValRep.reduce((a, b) => Math.max(a, b), -Infinity);
    let result = {'valRepMax':maxVal, 'valRep': araryOfValRep}
    return result;
}

function calculateValues(){
    let ScVal = 1;
    let unit =  $('#rangeUnit').val();

    let uucResolution = $('#resolution').val();
    let stdResolution = $('#resolutionSTD').val();

    let uucReadability = $('#readability').val();
    let stdReadability = $('#readabilitySTD').val();

    let test_Points = getArrayOfTestPoints();

    let val_Std_Max_Original = valStdMax();
    let val_Std_Coverage_Factor = valStdCF();
    let val_Std_Original_Unit = valStdOriginalUnit();
    let val_Std_Converted_Unit = valStdConvertedUnit();
    let val_Std_Max = convert2(val_Std_Max_Original, val_Std_Converted_Unit, unit);
    
    let val_Height_Difference = valHeightDifference();
    let val_Zero_Dev = valZeroDev();

    let val_Rep_And_Max = valRepAndMax();
    let val_Rep = val_Rep_And_Max.valRep;
    let val_Rep_Max = val_Rep_And_Max.valRepMax;

    let val_Hysterisis = []
    for (let i = 0; i < 9; i++) {
        let m1ID = 'M1stdRow'+i;
        let m2ID = 'M2stdRow'+i;
        val_Hysterisis.push(valHysterisis(m1ID, m2ID));
    }
    let u_Resolution_UUC = uResolution(uucResolution, uucReadability, Math.sqrt(3), ScVal, unit);
    let u_Resolution_STD = uResolution(stdResolution, stdReadability, Math.sqrt(3), ScVal, unit);
    let u_Std_Max = uStdMax(val_Std_Max, val_Std_Coverage_Factor, ScVal, unit);
    let u_Height_Difference = uHeightDifference(val_Height_Difference, Math.sqrt(3), ScVal, unit);
    let u_Zero_Deviation = uZeroDeviation(val_Zero_Dev, 2*Math.sqrt(3), ScVal, unit);
    let u_Repeatability = uRepeatability(val_Rep_Max, 2*Math.sqrt(3), ScVal, unit);

    let u_Hysterisis = []
    for (let i = 0; i < val_Hysterisis.length; i++) {
        u_Hysterisis.push(uHysterisis(val_Hysterisis[i], 2*Math.sqrt(3), ScVal, unit))   
    }

    let u_C_Uuc_Unit = [];
    let u_C_Std_Unit = [];
    for (let i = 0; i < u_Hysterisis.length; i++) {
        u_C_Uuc_Unit.push(uC(u_Std_Max[unit], u_Height_Difference[unit], u_Resolution_UUC[unit], u_Zero_Deviation[unit], u_Hysterisis[i][unit], u_Repeatability[unit], u_Resolution_STD[unit]))   
        u_C_Std_Unit.push(uC(u_Std_Max[standardUnit], u_Height_Difference[standardUnit], u_Resolution_UUC[standardUnit], u_Zero_Deviation[standardUnit], u_Hysterisis[i][standardUnit], u_Repeatability[standardUnit], u_Resolution_STD[standardUnit]))   
    }
    let u_E_Uuc_Unit = [];
    let u_E_Std_Unit = [];
    for (let i = 0; i < u_C_Uuc_Unit.length; i++) {
        u_E_Uuc_Unit.push(uE(u_C_Uuc_Unit[i],valK))   
        u_E_Std_Unit.push(uE(u_C_Std_Unit[i],valK))   
    }
   
    let result = {
        testPoints:test_Points,
        unit:unit,
        uResolutionUUC:u_Resolution_UUC,
        uResolutionSTD:u_Resolution_STD,
        uStdMax: u_Std_Max,
        uHeightDifference:u_Height_Difference,
        uZeroDeviation:u_Zero_Deviation,
        uRepeatability:u_Repeatability,
        uHysterisis:u_Hysterisis,
        uCUucUnit:u_C_Uuc_Unit,
        uCStdUnit:u_C_Std_Unit,
        uEUucUnit:u_E_Uuc_Unit,
        uEStdUnit:u_E_Std_Unit,
    };
    $('#calculatedData').val(JSON.stringify(result));
    
   
    addToUncertaintyBudgetTable()
    
    // console.log(result);
}


function addToUncertaintyBudgetTable(){
    let calculatedData = JSON.parse($('#calculatedData').val());
    let unit = calculatedData.unit;
    $('#uncertBudgetTableTheadTr').html("");
    for (let i = 1; i <= 16; i++) {
        let td = document.createElement('td');
        if(i%2 == 0){
            td.innerHTML = standardUnit;
        }else{
            td.innerHTML = unit;
        }
        
        $('#uncertBudgetTableTheadTr').append(td)
    }
    $('#uncertBudgetTBody').html("");
    for (let i = 0; i < calculatedData.uCStdUnit.length; i++) {
        let tr = document.createElement('tr');
        
        let test_Points_Td = document.createElement('td');
        let uStdMax_unitUUC = document.createElement('td');
        let uStdMax_unitSTD = document.createElement('td');
        let uResolutionUUC_unitUUC = document.createElement('td');
        let uResolutionUUC_unitSTD = document.createElement('td');
        let uResolutionSTD_unitUUC = document.createElement('td');
        let uResolutionSTD_unitSTD = document.createElement('td');
        let uZeroDeviation_unitUUC = document.createElement('td');
        let uZeroDeviation_unitSTD = document.createElement('td');
        let uHysterisis_unitUUC = document.createElement('td');
        let uHysterisis_unitSTD = document.createElement('td');
        let uRepeatability_unitUUC = document.createElement('td');
        let uRepeatability_unitSTD = document.createElement('td');
        let uCUucUnit_unitUUC = document.createElement('td');
        let uCStdUnit_unitSTD = document.createElement('td');
        let k_Td = document.createElement('td');
        let uEUucUnit_unitSTD = document.createElement('td');
        let uEStdUnit_unitUUC = document.createElement('td');
        
        test_Points_Td.innerHTML = calculatedData.testPoints[i];
        uStdMax_unitUUC.innerHTML = calculatedData.uStdMax[unit].toFixed(4);
        uStdMax_unitSTD.innerHTML = calculatedData.uStdMax[standardUnit].toFixed(4);
        uResolutionSTD_unitUUC.innerHTML = calculatedData.uResolutionSTD[unit].toFixed(4);
        uResolutionSTD_unitSTD.innerHTML = calculatedData.uResolutionSTD[standardUnit].toFixed(4);
        uResolutionUUC_unitUUC.innerHTML = calculatedData.uResolutionUUC[unit].toFixed(4);
        uResolutionUUC_unitSTD.innerHTML = calculatedData.uResolutionUUC[standardUnit].toFixed(4);
        uZeroDeviation_unitUUC.innerHTML = calculatedData.uZeroDeviation[unit].toFixed(4);
        uZeroDeviation_unitSTD.innerHTML = calculatedData.uZeroDeviation[standardUnit].toFixed(4);
        uHysterisis_unitUUC.innerHTML = calculatedData.uHysterisis[i][unit].toFixed(4);
        uHysterisis_unitSTD.innerHTML = calculatedData.uHysterisis[i][standardUnit].toFixed(4);
        uRepeatability_unitUUC.innerHTML = calculatedData.uRepeatability[unit].toFixed(4);
        uRepeatability_unitSTD.innerHTML = calculatedData.uRepeatability[standardUnit].toFixed(4);
        uCUucUnit_unitUUC.innerHTML = calculatedData.uCUucUnit[i].toFixed(4);
        uCStdUnit_unitSTD.innerHTML = calculatedData.uCStdUnit[i].toFixed(4);
        k_Td.innerHTML = valK;
        uEUucUnit_unitSTD.innerHTML = calculatedData.uEUucUnit[i].toFixed(4);
        uEStdUnit_unitUUC.innerHTML = calculatedData.uEStdUnit[i].toFixed(4);

        tr.append(test_Points_Td);
        tr.append(uStdMax_unitUUC);
        tr.append(uStdMax_unitSTD);        
        tr.append(uResolutionSTD_unitUUC);
        tr.append(uResolutionSTD_unitSTD);
        tr.append(uResolutionUUC_unitUUC);
        tr.append(uResolutionUUC_unitSTD);
        tr.append(uZeroDeviation_unitUUC);
        tr.append(uZeroDeviation_unitSTD);
        tr.append(uHysterisis_unitUUC);
        tr.append(uHysterisis_unitSTD);
        tr.append(uRepeatability_unitUUC);
        tr.append(uRepeatability_unitSTD);
        tr.append(uCUucUnit_unitUUC);
        tr.append(uCStdUnit_unitSTD);
        tr.append(k_Td);
        tr.append(uEUucUnit_unitSTD);
        tr.append(uEStdUnit_unitUUC);
       
        $('#uncertBudgetTBody').append(tr);
    }
}
