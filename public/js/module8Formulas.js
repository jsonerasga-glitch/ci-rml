

    const k = 2;
    const temp_divisor = 2;
    function average(array_value){
        const filtered_array = array_value.filter(value => value !== '' && !isNaN(parseFloat(value)));
        const numberOfTrials = filtered_array.length;
        const result = filtered_array.reduce((sum, num) => parseFloat(sum) + parseFloat(num), 0) / numberOfTrials;
        return result;
    }

    //Have Rounding Discrepancy that starts at the 7th decimal place
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

   function uncertaintyDueToCalibratorUnc(
        uncertaintyValue, 
        testValue, 
        coverageFactor,
    ){
        let float_uncertaintyValue   = parseFloat(uncertaintyValue); 
        let float_testValue   = parseFloat(testValue); 
        let float_coverageFactor   = parseFloat(coverageFactor); 


        let result = float_uncertaintyValue  * float_testValue / float_coverageFactor; 
        return result;
    }

    function uncertaintyDueToRepeatabilityForMeter(
        array_value,
        trialmaxmeter,
    ){
        let float_array_value = parseFloat(array_value);
        let float_trialmaxmeter = parseFloat(trialmaxmeter);
        let float_sqrt = Math.sqrt(float_trialmaxmeter)
        let result =   float_array_value / 1 / float_sqrt ; 
        return result;
    }
    
    function uncertaintyDueToResOfPHForMeter(
        value, 
      
    ){
        let float_value = parseFloat(value); 
        let result =  float_value / k / Math.sqrt(3); 
        return result;
    }
    
    function uncertaintyDueToResOfTempDegreesForMeter(
        valueA, 
        valueB
    ){
        let float_valueA  = parseFloat(valueA); 
        let float_valueB  = parseFloat(valueB); 
        let result =  float_valueA * (float_valueB / k) / Math.sqrt(3); 
        return result;
    }


    //test for electrode
    function uncertaintyDueToBufferCalibrationForElectrode(
        uncertaintyValue, 
    ){
        let float_uncertaintyValue   = parseFloat(uncertaintyValue); 

        let result = float_uncertaintyValue / Math.sqrt(3); 
        return result;
    }

    function uncertaintyDueToBufferTempForElectrode(
        uncertaintyValueA,   
        uncertaintyValueB,
       
    ){
        let float_uncertaintyValueA  = parseFloat(uncertaintyValueA); 
        let float_uncertaintyValueB   = parseFloat(uncertaintyValueB); 

        let result = float_uncertaintyValueA * float_uncertaintyValueB / Math.sqrt(3); 
        return result;
    }

    function uncertaintyDueToRepeatabilityForElectrode(
        uncertaintyValueA, 
        uncertaintyValueB,
       
    ){
        let float_uncertaintyValueA   = parseFloat(uncertaintyValueA); 
        let float_uncertaintyValueB  = parseFloat(uncertaintyValueB); 

        let result = float_uncertaintyValueA / 1 / Math.sqrt(float_uncertaintyValueB); 
        return result;
    }

    function uncertaintyDueToResOfPHForElectrode(
        uncertaintyValue, 
       
    ){
        let float_uncertaintyValue   = parseFloat(uncertaintyValue); 

        let result = float_uncertaintyValue / k / Math.sqrt(3); 
        return result;
    }
    
    // //uncertainty calculation value
    function combinedUncertainty(
        valueA,
        valueB,
        valueC,
        valueD,
    )
    {
        let float_valueA = parseFloat((Math.pow(valueA, 2)));
        let float_valueB = parseFloat((Math.pow(valueB, 2)));
        let float_valueC = parseFloat((Math.pow(valueC, 2)));
        let float_valueD = parseFloat((Math.pow(valueD, 2)));

        // let float_valueA = parseFloat(valueA);
        // let float_valueB = parseFloat(valueB);
        // let float_valueC = parseFloat(valueC);
        // let float_valueD = parseFloat(valueD);


        

        let result = 
        


        Math.sqrt(
          float_valueA
        + float_valueB 
        + float_valueC
        + float_valueD
        )
    
    //    Math.sqrt(
    //       Math.pow (float_valueA,2)
    //     + Math.pow (float_valueB,2) 
    //     + Math.pow(float_valueC,2)
    //     + Math.pow (float_valueD,2)
    //     )


        return result;
    }

    function vEffective(
        // valueA,
        // valueB,
        // valueC,
        // valueD,
        // valueE,

        valueA = Math.trunc(valueA),
        valueB = Math.trunc(valueA),
        valueC = Math.trunc(valueA),
        valueD = Math.trunc(valueA),
        valueE = Math.trunc(valueA),


        degreeOfFreedomValueA,
        degreeOfFreedomValueB,
        degreeOfFreedomValueC,	
        degreeOfFreedomValueD,
    )
    {

        var float_valueA = Math.pow(parseFloat(valueA), 4);
        var float_valueB = Math.pow(parseFloat(valueB), 4);
        var float_valueC = Math.pow(parseFloat(valueC), 4);
        var float_valueD = Math.pow(parseFloat(valueD), 4);
        var float_valueE = Math.pow(parseFloat(valueE), 4);

         let float_degreeOfFreedomValueA = parseFloat(degreeOfFreedomValueA);
         let float_degreeOfFreedomValueB = parseFloat(degreeOfFreedomValueB);
         let float_degreeOfFreedomValueC = parseFloat(degreeOfFreedomValueC);
         let float_degreeOfFreedomValueD = parseFloat(degreeOfFreedomValueD);
     
         let result =
         (float_valueA)/
         (
            (float_valueB/float_degreeOfFreedomValueA) +
            ( float_valueC/float_degreeOfFreedomValueB) +
            ( float_valueD/float_degreeOfFreedomValueC) +
            ( float_valueE/float_degreeOfFreedomValueD)
            )

        return result;
    }

    function coverageFactork(vEffective) {
        // Truncate vEffective value
        vEffective = Math.trunc(vEffective);
        let kVal = formulajs.TINV(1 - (0.0455 / 2), vEffective);
        let valFloat = parseFloat(kVal);
        let result = Math.round(valFloat * 100) / 100;
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

    function appliedVoltage(
        tempDegreeValue,
        pHvalue

    ) {
        let float_tempDegreeValue =  parseFloat(tempDegreeValue);
        let float_pHvalue = parseFloat(pHvalue);
        let En = 8.31439*Math.log(10)*(float_tempDegreeValue + 273.15)/96495.7*1000
        let phval = 7 -  float_pHvalue ;


   
    //    let result =  ((8.31439 * ( parseFloat(tempDegreeValue) + 273.15) *  Math.log(10) ) / (96495.7 * 1000 )) * (7 - parseFloat(pHvalue));

        let result = En * phval;
        return result;
    } 

    function tempDegtopH(
        tempDegreeValue,
        pHvalue

    ) {
    
    let float_tempDegreeValue =  parseFloat(tempDegreeValue);
    let float_pHvalue = parseFloat(pHvalue);


    let En = 8.31439*Math.log(10)*(float_tempDegreeValue + 273.15)/96495.7*1000
    let En_prev = 8.31439*Math.log(10)*((float_tempDegreeValue - 5) + 273.15)/96495.7*1000
    let phval = 7 -  float_pHvalue ;
    let pHtomV = En * phval;
    let slope = (En - En_prev) / 5

/*
pHtomV = 354
En = 59.15
slope = 1.98
**/

    let prevtemp = parseFloat(tempDegreeValue - 0.1);
    let uncpH_prev = 7-(pHtomV/(En+(slope*(prevtemp-float_tempDegreeValue))))
    let uncpH = 7-(pHtomV/(En+(slope*(float_tempDegreeValue-float_tempDegreeValue))))
    let diffpH = uncpH - uncpH_prev
    let result = diffpH / 0.1 ;
        return result;
    }

    /**change ion temp with average */
    function changeinTemperature(valueA, valueB) {
        // Calculate the average
        let sum = valueA + valueB;
        let average = sum / 2;
    
        // Round the average to one decimal place
        let roundedAverage = Math.round(average * 10) / 10;
    
        let difference = roundedAverage - valueB;
    
        let  roundedDifference  = Math.round(difference * 10) / 10;
        let result = Math.abs(roundedDifference);
    
        return result;
    }
    
    /**change in before - after */
    function changeinTemperatureB(
        variableA, 
        variableB
        ) {

        let float_variableA = parseFloat(variableA);
        let float_variableB = parseFloat(variableB);

       
        let diff = float_variableA - float_variableB;
        // Round the average to two decimal place
        let  roundedDiff  = Math.round(diff * 100) / 100;
        let result = Math.abs(roundedDiff);
        return result;
    }
    
    function bufferTempATC(
        variableA,
    ){
        let float_variableA = parseFloat(variableA);
        result = float_variableA / temp_divisor;
        return result;

    };