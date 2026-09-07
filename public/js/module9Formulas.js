//#region GENERAL FORMULAS
  //Have Rounding Discrepancy that starts a the 7th decimal place
  function standardDeviation(arr) {
    const n = arr.length;
    const mean = arr.reduce((sum, num) => sum + num, 0) / n;
    const squaredDifferences = arr.map(num => Math.pow(num - mean, 2));
    const sumSquaredDifferences = squaredDifferences.reduce((sum, num) => sum + num, 0);
    const variance = sumSquaredDifferences / (n - 1);
    const standardDeviation = Math.sqrt(variance);
    return standardDeviation;
  }

  function sumOfSquares(uncertaintyDistributions){
    let sum = 0;
    for (let i = 0; i < uncertaintyDistributions.length; i++) {
      sum += uncertaintyDistributions[i] * uncertaintyDistributions[i];
    }
    return sum;
  }

  function averageArray(array) {
    const sum = array.reduce((acc, value) => acc + value, 0);
    const count = array.length;
    const average = sum / count;
    return average;
  }
  function averageObject(obj) {
    let sum = 0;
    let count = 0;
  
    // Iterate over the object keys and sum up the values
    $.each(obj, function(key, value) {
      if (!isNaN(value)) {
        sum += parseFloat(value);
        count++;
      }
    });
  
    // Calculate the average
    const average = count > 0 ? sum / count : 0;
  
    return average;
  }

  function weightOfWater(ig, il){
    let float_il = parseFloat(il);
    let float_ig = parseFloat(ig);
    return float_il - float_ig;
  }

  function waterDensityTanakaEquation(waterTemperature){
    let float_waterTemperature = parseFloat(waterTemperature);
    return 0.99997495 * (1 - ((Math.pow((float_waterTemperature + (-3.983035)),2) * (float_waterTemperature + 301.797))) / (522528.9 * (float_waterTemperature + 69.34881)));
  }

  function airDensitySpeiwickEquation(pressure, humidity, airTemperature){
      let float_pressure = parseFloat(pressure);
      let float_humidity = parseFloat(humidity);
      let float_airTemperature = parseFloat(airTemperature);
      return (((3.4844 * Math.pow(10,-4)) * float_pressure) + (float_humidity * (((-2.52 * Math.pow(10,-6)) * float_airTemperature) + (2.0582 * Math.pow(10,-5))))) / (float_airTemperature + 273.15);
  }

  function gravimetricMethod(weightOfWater, waterDensity, airDensity, ΡB, y, waterTemperature, t0,){
  let float_weightOfWater = parseFloat(weightOfWater)
  let float_waterDensity = parseFloat(waterDensity)
  let float_airDensity = parseFloat(airDensity)
  let float_ΡB = parseFloat(ΡB)
  let float_y = parseFloat(y)
  let float_waterTemperature = parseFloat(waterTemperature)
  let float_t0 = parseFloat(t0)

  return (float_weightOfWater) * (1 / (float_waterDensity - float_airDensity)) * (1 - (float_airDensity / float_ΡB)) * (1 - (float_y * (float_waterTemperature - float_t0)));
  }

//#endregion GENERAL FORMULAS

//#region UNCERTAINTY BALANCE/MASS

  function standardUncertaintyOfTheBalance(K, uncertaintyOfBalance){
    let float_K = parseFloat(K);
    let float_uncertaintyOfBalance = parseFloat(uncertaintyOfBalance);
    return float_uncertaintyOfBalance/float_K;
  }

  function standardUncertaintyResolutionLoad(K, resolution){
    let float_K = parseFloat(K);
    let float_resolution = parseFloat(resolution);  
    return ((float_resolution/2)/float_K);
  }

  function standardUncertaintyTemperatureDriftCoefficient(K, weightOfWaterAverage, temperatureCoefficientOfSensitivity, td){
    let float_K = parseFloat(K);
    let float_weightOfWaterAverage = parseFloat(weightOfWaterAverage);
    let float_temperatureCoefficientOfSensitivity = parseFloat(temperatureCoefficientOfSensitivity);
    let float_td = parseFloat(td);

    return ((float_weightOfWaterAverage)*float_temperatureCoefficientOfSensitivity*float_td)/float_K;
  }

  function standardUncertaintyEvaporationLoss(K, evaporationLoss){
    let float_K = parseFloat(K);
    let float_evaporationLoss = parseFloat(evaporationLoss);
    return float_evaporationLoss/float_K;
  }

  function standardUncertaintyBalanceMass(standardUncertaintyOfTheBalance, standardUncertaintyResolutionLoad, standardUncertaintyDrift,standardUncertaintyTemperatureDriftCoefficient, standardUncertaintyEvaporationLoss){
    let float_standardUncertaintyOfTheBalance = parseFloat(standardUncertaintyOfTheBalance);
    let float_standardUncertaintyResolutionLoad = parseFloat(standardUncertaintyResolutionLoad);
    let float_standardUncertaintyDrift = parseFloat(standardUncertaintyDrift);
    let float_standardUncertaintyTemperatureDriftCoefficient = parseFloat(standardUncertaintyTemperatureDriftCoefficient);
    let float_standardUncertaintyEvaporationLoss = parseFloat(standardUncertaintyEvaporationLoss);
    return Math.sqrt(Math.pow(float_standardUncertaintyOfTheBalance,2) + Math.pow(float_standardUncertaintyResolutionLoad,2) + Math.pow(float_standardUncertaintyDrift,2) + Math.pow(float_standardUncertaintyTemperatureDriftCoefficient,2) + Math.pow(float_standardUncertaintyEvaporationLoss,2)) 
  }

  function sensitivityCoefficientBalanceMass(tanakaAvarage){
    let float_tanakaAvarage = parseFloat(tanakaAvarage);
    return 1/float_tanakaAvarage;
  }

  function uncertaintyDistributionBalanceMass(standardUncertaintyBalanceMass, sensitivityCoefficientBalanceMass){
    let float_standardUncertaintyBalanceMass = parseFloat(standardUncertaintyBalanceMass);
    let float_sensitivityCoefficientBalanceMass = parseFloat(sensitivityCoefficientBalanceMass);
    return float_standardUncertaintyBalanceMass * float_sensitivityCoefficientBalanceMass;
  }

//#endregion UNCERTAINTY BALANCE/MASS

//#region UNCERTAINTY DENSITY of MASS PIECES  

  function standardUncertaintyDensityMassPieces(K){
    let float_K = parseFloat(K);
    return (140000)/(float_K)*(1)/(1000000);
  }

  function sensitivityCoefficientDensityMassPieces(weightOfWaterAverage, speiwickAverage, tanakaAvarage, ΡB){
    let float_weightOfWaterAverage = parseFloat(weightOfWaterAverage);
    let float_speiwickAverage = parseFloat(speiwickAverage);
    let float_tanakaAvarage = parseFloat(tanakaAvarage);
    let float_ΡB = parseFloat(ΡB);

    return (float_weightOfWaterAverage*float_speiwickAverage)/(float_tanakaAvarage*(Math.pow(float_ΡB,2)))
  }

  function uncertaintyDistributionDensityMassPieces(standardUncertaintyDensityMassPieces, sensitivityCoefficientDensityMassPieces){
    let float_standardUncertaintyDensityMassPieces = parseFloat(standardUncertaintyDensityMassPieces);
    let float_sensitivityCoefficientDensityMassPieces = parseFloat(sensitivityCoefficientDensityMassPieces);
    return float_standardUncertaintyDensityMassPieces * float_sensitivityCoefficientDensityMassPieces;
  }

//#endregion UNCERTAINTY DENSITY of MASS PIECES  

//#region UNCERTAINTY WATER TEMPERATURE / DENSITY  

  function standardUncertaintyOfThermometerWater(expandedUncertaintyOfThermometer, K, waterTemperatureDrift){
    let float_expandedUncertaintyOfThermometer = parseFloat(expandedUncertaintyOfThermometer);
    let float_K = parseFloat(K);
    let float_waterTemperatureDrift = parseFloat(waterTemperatureDrift);

    return Math.pow((Math.pow((float_expandedUncertaintyOfThermometer / float_K),2)+ Math.pow(float_waterTemperatureDrift, 2)),(1/2))
  }

  function sensitivityCoefficientThermometerWater(weightOfWaterAverage, tanakaAvarage, waterTemperatureAverage){
    let float_weightOfWaterAverage = parseFloat(weightOfWaterAverage);
    let float_tanakaAvarage = parseFloat(tanakaAvarage);
    let float_waterTemperatureAverage = parseFloat(waterTemperatureAverage);

    let float_a1 = pw.a1;
    let float_a2 = pw.a2;
    let float_a3 = pw.a3;
    let float_a4 = pw.a4;
    let float_a5 = pw.a5;

    let b1 = Math.pow((float_waterTemperatureAverage + float_a1),2);
    let b2 = float_waterTemperatureAverage + float_a2;
    let b3 = float_waterTemperatureAverage + float_a4;
    let b4 = Math.pow((float_waterTemperatureAverage + float_a1),2);
    let b5 = 2 * (float_waterTemperatureAverage + float_a4);
    let b6 = float_waterTemperatureAverage + float_a2;
    let b7 = float_waterTemperatureAverage + float_a1;
    let b8 =  Math.pow((float_waterTemperatureAverage + float_a4),2);

    let a = -(float_a5/float_a3);
    let b =((b1*b2)-(b3*b4)-((b5)*b6*b7))/b8;

    let x = -(float_weightOfWaterAverage/(Math.pow(float_tanakaAvarage,2)));
    let y = a*b

    return x * y;
  }

  function uncertaintyDistributionThermometerWater(standardUncertaintyOfThermometerWater, sensitivityCoefficientThermometerWater){
    let float_standardUncertaintyOfThermometerWater = parseFloat(standardUncertaintyOfThermometerWater);
    let float_sensitivityCoefficientThermometerWater = parseFloat(sensitivityCoefficientThermometerWater);
    return float_standardUncertaintyOfThermometerWater * float_sensitivityCoefficientThermometerWater;
  }

  function standardUncertaintyOfThermometerWaterDensity(K){
    let float_K = parseFloat(K);
    return (10 * (Math.pow(10,-7)) ) / float_K;
  }

  function sensitivityCoefficientThermometerWaterDensity(weightOfWaterAverage, tanakaAvarage){
    let float_weightOfWaterAverage = parseFloat(weightOfWaterAverage);
    let float_tanakaAvarage = parseFloat(tanakaAvarage);

    return -(float_weightOfWaterAverage/(Math.pow(float_tanakaAvarage,2)));
  }

  function uncertaintyDistributionThermometerWaterDensity(standardUncertaintyOfThermometerWaterDensity, sensitivityCoefficientThermometerWaterDensity){
    let float_standardUncertaintyOfThermometerWaterDensity = parseFloat(standardUncertaintyOfThermometerWaterDensity);
    let float_sensitivityCoefficientThermometerWaterDensity = parseFloat(sensitivityCoefficientThermometerWaterDensity);
    return float_standardUncertaintyOfThermometerWaterDensity * float_sensitivityCoefficientThermometerWaterDensity;
  }

//#endregion UNCERTAINTY WATER TEMPERATURE / DENSITY

//#region UNCERTAINTY AIR TEMPERATURE / AIR DENSITY  
  function standardUncertaintyOfThermometerAir(expandedUncertaintyOfThermometer, K, airTemperatureDrift){
    let float_expandedUncertaintyOfThermometer = parseFloat(expandedUncertaintyOfThermometer);
    let float_K = parseFloat(K);
    let float_airTemperatureDrift = parseFloat(airTemperatureDrift);

    return Math.pow((Math.pow((float_expandedUncertaintyOfThermometer / float_K),2)+ Math.pow(float_airTemperatureDrift, 2)),(1/2))
  }

  function sensitivityCoefficientThermometerAir(weightOfWaterAverage, tanakaAvarage, humidityAverage, pressureAverage, temperatureAirAverage){
    let float_weightOfWaterAverage = parseFloat(weightOfWaterAverage);
    let float_tanakaAvarage = parseFloat(tanakaAvarage);
    let float_humidityAverage = parseFloat(humidityAverage);
    let float_pressureAverage = parseFloat(pressureAverage);
    let float_temperatureAirAverage = parseFloat(temperatureAirAverage);

    let float_tAo = pa.tAo;
    let float_k1 = pa.k1;
    let float_k2 = pa.k2;
    let float_k3 = pa.k3;

    let a1 = float_humidityAverage;
    let a2 = float_k2;
    let a3 = float_tAo;
    let a4 = float_k3;
    let a5 = float_k1;
    let a6 = float_pressureAverage;

    let a = a1*((a2*a3)-a4)-(a5*a6);
    let b = Math.pow((float_temperatureAirAverage+float_tAo),2)

    let x = (float_weightOfWaterAverage/(Math.pow(float_tanakaAvarage,2)));
    let y = a/b

    return x * y;
  }

  function uncertaintyDistributionThermometerAir(standardUncertaintyOfThermometerAir, sensitivityCoefficientThermometerAir){
    let float_standardUncertaintyOfThermometerAir = parseFloat(standardUncertaintyOfThermometerAir);
    let float_sensitivityCoefficientThermometerAir = parseFloat(sensitivityCoefficientThermometerAir);
    return float_standardUncertaintyOfThermometerAir * float_sensitivityCoefficientThermometerAir;
  }

  function standardUncertaintyOfThermometerAirDensity(K){
    let float_K = parseFloat(K);
    return (5 * (Math.pow(10,-7)) ) / float_K;
  }

  function sensitivityCoefficientThermometerAirDensity(weightOfWaterAverage, tanakaAvarage, pB){
    let float_weightOfWaterAverage = parseFloat(weightOfWaterAverage);
    let float_tanakaAvarage = parseFloat(tanakaAvarage);
    let float_pB = parseFloat(pB);  
    return float_weightOfWaterAverage * ((-float_tanakaAvarage + float_pB) / (float_pB * (Math.pow(float_tanakaAvarage, 2))));
  }

  function uncertaintyDistributionThermometerAirDensity(standardUncertaintyOfThermometerAirDensity, sensitivityCoefficientThermometerAirDensity){
    let float_standardUncertaintyOfThermometerAirDensity = parseFloat(standardUncertaintyOfThermometerAirDensity);
    let float_sensitivityCoefficientThermometerAirDensity = parseFloat(sensitivityCoefficientThermometerAirDensity);
    return float_standardUncertaintyOfThermometerAirDensity * float_sensitivityCoefficientThermometerAirDensity;
  }

//#endregion UNCERTAINTY AIR TEMPERATURE / AIR DENSITY  

//#region UNCERTAINTY AIR PRESSURE
  function standardUncertaintyBarometer(expandedUncertaintyBarometer, K, barometerDrift){
    let float_expandedUncertaintyBarometer = parseFloat(expandedUncertaintyBarometer);
    let float_K = parseFloat(K);
    let float_barometerDrift = parseFloat(barometerDrift);
    return Math.pow(Math.pow((float_expandedUncertaintyBarometer/float_K),2)+(Math.pow(float_barometerDrift,2)),(1/2))
  }
  function sensitivityCoefficientAirPressure(weightOfWaterAverage, tanakaAvarage, temperatureAirAverage){
    let float_weightOfWaterAverage = parseFloat(weightOfWaterAverage);
    let float_tanakaAvarage = parseFloat(tanakaAvarage);
    let float_temperatureAirAverage = parseFloat(temperatureAirAverage);

    let float_tAo = pa.tAo;
    let float_k1 = pa.k1;

    return ((float_weightOfWaterAverage/(Math.pow(float_tanakaAvarage,2))) * (float_k1 / (float_temperatureAirAverage + float_tAo)))
  }
  function uncertaintyDistributioAirPressure(standardUncertaintyBarometer, sensitivityCoefficientAirPressure){
    let float_standardUncertaintyBarometer = parseFloat(standardUncertaintyBarometer);
    let float_sensitivityCoefficientAirPressure = parseFloat(sensitivityCoefficientAirPressure);
    return float_standardUncertaintyBarometer * float_sensitivityCoefficientAirPressure;
  }
//#endregion UNCERTAINTY AIR PRESSURE

//#region UNCERTAINTY RELATIVE HUMIDITY
  function standardUncertaintyHumiditySensor(expandedUncertaintyHumiditySensor, K, humidityDrift){
    let float_expandedUncertaintyHumiditySensor = parseFloat(expandedUncertaintyHumiditySensor);
    let float_K = parseFloat(K);
    let float_humidityDrift = parseFloat(humidityDrift);
    return Math.pow(Math.pow((float_expandedUncertaintyHumiditySensor/float_K),2)+(Math.pow(float_humidityDrift,2)),(1/2))
  }
  function sensitivityCoefficientHumiditySensor(weightOfWaterAverage, tanakaAvarage, temperatureAirAverage){
    let float_weightOfWaterAverage = parseFloat(weightOfWaterAverage);
    let float_tanakaAvarage = parseFloat(tanakaAvarage);
    let float_temperatureAirAverage = parseFloat(temperatureAirAverage);

    let float_tAo = pa.tAo;
    let float_k2 = pa.k2;
    let float_k3 = pa.k3;
    return ((float_weightOfWaterAverage/(Math.pow(float_tanakaAvarage,2))) * (((float_k2 * float_temperatureAirAverage) + float_k3) / (float_temperatureAirAverage + float_tAo)))
  }
  function uncertaintyDistributionHumiditySensor(standardUncertaintyHumiditySensor, sensitivityCoefficientHumiditySensor){
    let float_standardUncertaintyHumiditySensor = parseFloat(standardUncertaintyHumiditySensor);
    let float_sensitivityCoefficientHumiditySensor = parseFloat(sensitivityCoefficientHumiditySensor);
    return float_standardUncertaintyHumiditySensor * float_sensitivityCoefficientHumiditySensor;
  }
//#endregion UNCERTAINTY RELATIVE HUMIDITY

//#region UNCERTAINTY REPEATABILITY
  function standardUncertaintyRepeatability(arrayOfGravimetric, K){
    let float_K = parseFloat(K);
    let STDEV = standardDeviation(arrayOfGravimetric);
    return STDEV / float_K;
  }
  function sensitivityCoefficientRepeatability(){
    return 1;
  }
  function uncertaintyDistributionRepeatability(standardUncertaintyRepeatability, sensitivityCoefficientRepeatability){
    let float_standardUncertaintyRepeatability = parseFloat(standardUncertaintyRepeatability);
    let float_sensitivityCoefficientRepeatability = parseFloat(sensitivityCoefficientRepeatability);
    return float_standardUncertaintyRepeatability * float_sensitivityCoefficientRepeatability;
  }

//#endregion UNCERTAINTY REPEATABILITY

//#region UNCERTAINTY
  function combinedUncertainty(uncertaintyDistributions){
    let sumsq = sumOfSquares(uncertaintyDistributions);
    return Math.sqrt(sumsq);
  }
  function expandedUncertainty(combinedUncertainty, K){
    let float_combinedUncertainty = parseFloat(combinedUncertainty);
    let float_K = parseFloat(K);
    return float_combinedUncertainty * float_K;
  }
  function expandedUncertaintyPercentage(expandedUncertainty, capacity){
    let float_expandedUncertainty = parseFloat(expandedUncertainty);
    let float_capacity = parseFloat(capacity);
    return float_expandedUncertainty / float_capacity;
  }
//#endregion UNCERTAINTY


//#region GLASSWARE SPECIFIC FUNCTIONS
  function standardUncertaintyDeviceTemperatureGlassware(tempDifference, K){
    let float_tempDifference = parseFloat(tempDifference);
    let float_K = parseFloat(K);
    return float_tempDifference/float_K;
  }
  function sensitivityCoefficientDeviceTemperatureGlassware(weightOfWaterAverage, tanakaAvarage, y){
    let float_weightOfWaterAverage = parseFloat(weightOfWaterAverage);
    let float_tanakaAvarage = parseFloat(tanakaAvarage);
    let float_y = parseFloat(y);
    return -(float_weightOfWaterAverage/float_tanakaAvarage)*float_y;
  }
  function uncertaintyDistributionDeviceTemperatureGlassware(standardUncertaintyDeviceTemperatureGlassware, sensitivityCoefficientDeviceTemperatureGlassware){
    let float_standardUncertaintyDeviceTemperatureGlassware = parseFloat(standardUncertaintyDeviceTemperatureGlassware);
    let float_sensitivityCoefficientDeviceTemperatureGlassware = parseFloat(sensitivityCoefficientDeviceTemperatureGlassware);
    return float_standardUncertaintyDeviceTemperatureGlassware * float_sensitivityCoefficientDeviceTemperatureGlassware;
  }
  function standardUncertaintyCubicThermalExpansion(K, y){
    let float_K = parseFloat(K);
    let float_y = parseFloat(y);
    return (0.1*float_y)/float_K;
  }
  function sensitivityCoefficientCubicThermalExpansion(weightOfWaterAverage, tanakaAvarage, waterTemperatureAverage, t0){
    let float_weightOfWaterAverage = parseFloat(weightOfWaterAverage);
    let float_tanakaAvarage = parseFloat(tanakaAvarage);
    let float_waterTemperatureAverage = parseFloat(waterTemperatureAverage);
    let float_t0 = parseFloat(t0);
    return -(float_weightOfWaterAverage / float_tanakaAvarage) * (float_waterTemperatureAverage - float_t0)
  }
  function uncertaintyDistributionDeviceTemperature(standardUncertaintyCubicThermalExpansion, sensitivityCoefficientCubicThermalExpansion){
    let float_standardUncertaintyCubicThermalExpansion = parseFloat(standardUncertaintyCubicThermalExpansion);
    let float_sensitivityCoefficientCubicThermalExpansion = parseFloat(sensitivityCoefficientCubicThermalExpansion);
    return float_standardUncertaintyCubicThermalExpansion * float_sensitivityCoefficientCubicThermalExpansion;
  }
  function standardUncertaintyMeniscus(){
    let aPlus = $('#aPlus').val(); 
    let aMinus = $('#aMinus').val(); 
    let neckDiameter = $('#neckDiameter').val(); 
    let graduationHeight = $('#graduationHeight').val();      
    let K = kSqrt3;
    if(caseNumber == 1){
      return meniscusCase1(aPlus, aMinus, K);
    }else if(caseNumber == 2){
      return meniscusCase2(neckDiameter, graduationHeight, K);
    }
  }
  function meniscusCase1(aPlus, aMinus, K){
    let float_aPlus = parseFloat(aPlus);
    let float_aMinus = parseFloat(aMinus);
    let float_K = parseFloat(K);
    let a = float_aPlus - float_aMinus;
    return a / (2 * float_K);
  }
  function meniscusCase2(neckDiameter, graduationHeight, K){
    let float_neckDiameter = parseFloat(neckDiameter);
    let float_graduationHeight = parseFloat(graduationHeight);
    let float_K = parseFloat(K);
    return ((0.5 * float_neckDiameter * (Math.PI * (Math.pow(float_graduationHeight,2) / 4))) / 1000) / float_K;
  }
  function sensitivityCoefficientMeniscus(){
    return 1;
  }
  function uncertaintyDistributionMeniscus(standardUncertaintyMeniscus, sensitivityCoefficientMeniscus){
    let float_standardUncertaintyMeniscus = parseFloat(standardUncertaintyMeniscus);
    let float_sensitivityCoefficientMeniscus = parseFloat(sensitivityCoefficientMeniscus);
    return float_standardUncertaintyMeniscus * float_sensitivityCoefficientMeniscus;
  }
//#endregion GLASSWARE SPECIFIC FUNCTIONS

//#region PISTON PIPETTE SPECIFIC FUNCTIONS
  function standardUncertaintyDeviceTemperaturePistonPipette(tempDifference, K){
    let float_tempDifference = parseFloat(tempDifference);
    let float_K = parseFloat(K);
    return float_tempDifference/float_K;
  }
  function sensitivityCoefficientDeviceTemperaturePistonPipette(gravimetricAverage){
    let float_gravimetricAverage = parseFloat(gravimetricAverage);
    return (0.0022 * float_gravimetricAverage);
  }
  function uncertaintyDistributionDeviceTemperaturePistonPipette(standardUncertaintyDeviceTemperaturePistonPipette, sensitivityCoefficientDeviceTemperaturePistonPipette){
    let float_standardUncertaintyDeviceTemperaturePistonPipette = parseFloat(standardUncertaintyDeviceTemperaturePistonPipette);
    let float_sensitivityCoefficientDeviceTemperaturePistonPipette = parseFloat(sensitivityCoefficientDeviceTemperaturePistonPipette);
    return float_standardUncertaintyDeviceTemperaturePistonPipette * float_sensitivityCoefficientDeviceTemperaturePistonPipette;
  }
  function standardUncertaintyDeviceRelativeHumidityPistonPipette(rhDifference, K){
    let float_rhDifference = parseFloat(rhDifference);
    let float_K = parseFloat(K);
    return float_rhDifference/float_K;
  }
  function sensitivityCoefficientDeviceRelativeHumidityPistonPipette(gravimetricAverage){
    let float_gravimetricAverage = parseFloat(gravimetricAverage);
    return (0.0007 * float_gravimetricAverage);
  }
  function uncertaintyDistributionDeviceRelativeHumidityPistonPipette(standardUncertaintyDeviceRelativeHumidityPistonPipette, sensitivityCoefficientDeviceRelativeHumidityPistonPipette){
    let float_standardUncertaintyDeviceRelativeHumidityPistonPipette = parseFloat(standardUncertaintyDeviceRelativeHumidityPistonPipette);
    let float_sensitivityCoefficientDeviceRelativeHumidityPistonPipette = parseFloat(sensitivityCoefficientDeviceRelativeHumidityPistonPipette);
    return float_standardUncertaintyDeviceRelativeHumidityPistonPipette * float_sensitivityCoefficientDeviceRelativeHumidityPistonPipette;
  }
  function standardUncertaintyAtmosphericPressurePistonPipette(atmosphericPressureDifference, K){
    let float_atmosphericPressureDifference = parseFloat(atmosphericPressureDifference);
    let float_K = parseFloat(K);
    return float_atmosphericPressureDifference/float_K;
  }
  function sensitivityCoefficientAtmosphericPressurePistonPipette(atmosphericPressureSensitivityCoefficientConsideringCapacity){
    let float_atmosphericPressureSensitivityCoefficientConsideringCapacity = parseFloat(atmosphericPressureSensitivityCoefficientConsideringCapacity);
    return float_atmosphericPressureSensitivityCoefficientConsideringCapacity;
  }
  function uncertaintyDistributionAtmosphericPressurePistonPipette(standardUncertaintyAtmosphericPressurePistonPipette, sensitivityCoefficientAtmosphericPressurePistonPipette){
    let float_standardUncertaintyAtmosphericPressurePistonPipette = parseFloat(standardUncertaintyAtmosphericPressurePistonPipette);
    let float_sensitivityCoefficientAtmosphericPressurePistonPipette = parseFloat(sensitivityCoefficientAtmosphericPressurePistonPipette);
    return float_standardUncertaintyAtmosphericPressurePistonPipette * float_sensitivityCoefficientAtmosphericPressurePistonPipette;
  }
  function standardUncertaintyProcessHandling(channelValue, gravimetricConvertedAverage, K){
    let float_channelValue = parseFloat(channelValue);
    let float_gravimetricConvertedAverage = parseFloat(gravimetricConvertedAverage);
    let float_K = parseFloat(K);
    return (float_channelValue * float_gravimetricConvertedAverage) / float_K;
  }
  function sensitivityCoefficientProcessHandling(){
    return 1;
  }
  function uncertaintyDistributionProcessHandling(standardUncertaintyProcessHandling, sensitivityCoefficientProcessHandling){
    let float_standardUncertaintyProcessHandling = parseFloat(standardUncertaintyProcessHandling);
    let float_sensitivityCoefficientProcessHandling = parseFloat(sensitivityCoefficientProcessHandling);
    return float_standardUncertaintyProcessHandling * float_sensitivityCoefficientProcessHandling;
  } 
  function atmosphericPressureSensitivityCoefficientPerCapacity(tableNumber, tanakaAverage, pressureAverage){
    let float_min = parseFloat($('#minTable'+tableNumber).val());
    let float_max = parseFloat($('#maxTable'+tableNumber).val());
    let float_tanakaAverage = tanakaAverage;
    let float_pa = tanakaAverage;
    let accelerationDueToGravity = 9.81
    let float_pressureSquared = Math.pow(parseFloat(pressureAverage),2)

    if(float_min > 5 && float_min <= 10){
      let liquidLift = 150/1000;
      let airCushion = 20000/1000;
      let atmosphericPressureSensitivityCoefficient = (-airCushion*float_tanakaAverage*(accelerationDueToGravity)*float_pa*liquidLift)/(float_pressureSquared);
      return parseFloat(atmosphericPressureSensitivityCoefficient);
    }else if (float_min > 1 && float_min <= 5){
      let liquidLift = 130/1000;
      let airCushion = 10000/1000;
      let atmosphericPressureSensitivityCoefficient = (-airCushion*float_tanakaAverage*(accelerationDueToGravity)*float_pa*liquidLift)/(float_pressureSquared);
      return parseFloat(atmosphericPressureSensitivityCoefficient);
    }else if (float_min > 0.3 && float_min <= 1){
      let liquidLift = 55/1000;
      let airCushion = 3000/1000;
      let atmosphericPressureSensitivityCoefficient = (-airCushion*float_tanakaAverage*(accelerationDueToGravity)*float_pa*liquidLift)/(float_pressureSquared);
      return parseFloat(atmosphericPressureSensitivityCoefficient);
    }else if (float_min > 0.1 && float_min <= 0.3){
      let liquidLift = 45/1000;
      let airCushion = 1000/1000;
      let atmosphericPressureSensitivityCoefficient = (-airCushion*float_tanakaAverage*(accelerationDueToGravity)*float_pa*liquidLift)/(float_pressureSquared);
      return parseFloat(atmosphericPressureSensitivityCoefficient);
    }else if (float_min > 0.01 && float_min <= 0.1){
      let liquidLift = 30/1000;
      let airCushion = 500/1000;
      let atmosphericPressureSensitivityCoefficient = (-airCushion*float_tanakaAverage*(accelerationDueToGravity)*float_pa*liquidLift)/(float_pressureSquared);
      return parseFloat(atmosphericPressureSensitivityCoefficient);
    }else if (float_min >= 0.001 && float_min <= 0.01){
      let liquidLift = 19/1000;
      let airCushion = 100/1000;
      let atmosphericPressureSensitivityCoefficient = (-airCushion*float_tanakaAverage*(accelerationDueToGravity)*float_pa*liquidLift)/(float_pressureSquared);
      return parseFloat(atmosphericPressureSensitivityCoefficient);
    }else{
      return 0;
    }
  }
//#endregion PISTON PIPETTE SPECIFIC FUNCTIONS
