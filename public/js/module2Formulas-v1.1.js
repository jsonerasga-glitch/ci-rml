function calculatedValueConsideringCorrection(setting, correction) {
  // console.log("calculatedValueConsideringCorrection "+ correction +" "+ setting);
  return parseFloat(setting) - parseFloat(correction);
}

function standardDev({trial1, trial2, trial3}) {
  t1 = parseFloat(trial1);
  t2 = parseFloat(trial2);
  t3 = parseFloat(trial3);
  var ArrayOfRepeat = [t1, t2, t3];
  var mean = (t1 + t2 + t3) / 3;
  var arrayOfSquared = [];
  var addingTheSquared = 0;
  var SquaredOfSum;
  ArrayOfRepeat.forEach((item) => {
    let y = item - mean;
    let x = Math.pow(y, 2);
    arrayOfSquared.push(x);
  });
  arrayOfSquared.forEach((item) => {
    addingTheSquared = item + addingTheSquared;
  });
  SquaredOfSum = addingTheSquared / (3 - 1);
  //document.getElementById(standard).value = Math.sqrt(SquaredOfSum);
  return Math.sqrt(SquaredOfSum);
}

function average({trial1, trial2, trial3, aver, standardDevs}) {
  t1 = parseFloat(document.getElementById(trial1).value);
  t2 = parseFloat(document.getElementById(trial2).value);
  t3 = parseFloat(document.getElementById(trial3).value);
  document.getElementById(aver).value = (t1 + t2 + t3) / 3;
}

function getAverage(dataAsArray, idOfAverage){
  let countOfData = dataAsArray.length;
  let idForElement = '#'+idOfAverage;
  let elementAverage = $(idForElement);
  let result = dataAsArray.reduce(function(acc, current) { return acc + current; }, 0);
  elementAverage.val(result/countOfData)
}

function slopeFormula(driftArray, searchingFor, isPRT) {
  if (!isPRT) {
    var UnfilteredArray = driftArray;
    var arrayOfTestPoint = [];

    for (let index = 0; index < UnfilteredArray.length; index++) {
      var arr = [];
      var arrDateValue = [];
      var arrTestValue = [];
      let filteredDATA = UnfilteredArray.filter(function (e) {
        return e.testPoint == UnfilteredArray[index].testPoint;
      });
      for (x = 0; x < filteredDATA.length; x++) {
        arrDateValue.push(filteredDATA[x].dateValue);
        arrTestValue.push(parseFloat(filteredDATA[x].testValue));
      }

      var perday = formulajs.SLOPE(arrTestValue, arrDateValue);
      var peryear = formulajs.SLOPE(arrTestValue, arrDateValue) * 365.25;
      var roundedperYear = formulajs.ROUNDUP(peryear, 3);
      arrayOfTestPoint.push(Math.abs(roundedperYear));
    }

    return Math.max(...arrayOfTestPoint);
  } else {
    var UnfilteredArray = driftArray;
    var driftPRTArray = [];
    var largest = 0;
    for (var i = 0; i < UnfilteredArray.length; i++) {
      driftPRTArray.push(UnfilteredArray[i]["drift"]);
    }
    for (i = 0; i < driftPRTArray.length; i++) {
      if (driftPRTArray[i] > largest) {
        var largest = driftPRTArray[i];
      }
    }
    console.log("driftPRTArray", Math.max(driftPRTArray));
    console.log("driftPRTArray", driftPRTArray);
    console.log("largest", largest);
    return largest;
  }
}

function UncUUCResolutionFunction(tableNumber, rowNumber) {
  var tableRange = parseFloat(
    document.getElementById("rangeTbodyTable" + tableNumber + "Row" + rowNumber)
      .value
  );
  var tableResGrad = parseFloat(
    document.getElementById(
      "resolutionTbodyTable" + tableNumber + "Row" + rowNumber
    ).value
  );
  var tableReadability = parseFloat(
    document.getElementById(
      "readabilityTbodyTable" + tableNumber + "Row" + rowNumber
    ).value
  );
  return (tableResGrad * tableReadability) / Math.sqrt(3);
}

function UncUUCRepeatabilityFunction(stdDevUUC) {
  return parseFloat(stdDevUUC) / Math.sqrt(3);
}

function UncStandardRepeatabilityFunction(stdDevStandard) {
  return parseFloat(stdDevStandard) / Math.sqrt(3);
}

function correctedValue({standardReadingAve, correctionFromCertificate}) {
  return standardReadingAve + correctionFromCertificate;
}

function correctedValueFunction({
  standardReadingAve,
  correctionFromCertificate,
}) {
  return parseFloat(standardReadingAve) + parseFloat(correctionFromCertificate);
}

function UncStandardReadoutFunction(readoutStandardUncFromCert, coverageFactor) {
  // return parseFloat(readoutStandardUncFromCert) / 2;
  return parseFloat(readoutStandardUncFromCert) / parseFloat(coverageFactor);
}

function UncStandardPRTFunction(PRTStandardUncFromCert, coverageFactor) {
  // return parseFloat(PRTStandardUncFromCert) / 2;
  // return parseFloat(PRTStandardUncFromCert) / 1.97;
  return parseFloat(PRTStandardUncFromCert) / parseFloat(coverageFactor);
}

function UncDriftFunction(drift) {
  return parseFloat(drift) / Math.sqrt(3);
}

function UncSTDResolutionFunction(STDRes) {
  return parseFloat(STDRes) / (2 * Math.sqrt(3));
}

function UncChamberUniformityFunction(chamberUniformity) {
  return parseFloat(chamberUniformity) / Math.sqrt(3);
}
function UncChamberInstabilityFunction(chamberInstability) {
  return parseFloat(chamberInstability) / Math.sqrt(3);
}

function hysteresisFunction({
  uucReadingAve1,
  uucReadingAve2,
  correctedValue1,
  correctedValue2,
}) {
  //return (uucReadingAve1-uucReadingAve2)-(correctedValue1-correctedValue2);
  return (
    (parseFloat(uucReadingAve1) -
      parseFloat(uucReadingAve2) -
      (parseFloat(correctedValue1) - parseFloat(correctedValue2))) /
    Math.sqrt(3)
  );
}

//Veffective
function DOFFunction({aj, aa, ac, ag, i, w, o, ah, ai, uucTrialCount, stdTrialCount}) {
  /*
    i:UncUUCResolution,
    o:UncUUCRepeatability,
    z:UncStandardReadout,
    ac:UncDrift,
    ae:UncSTDResolution,
    ag:UncChamberUniformity,
    ah:hysteresis,
    aa:UncStandardPRT,
    w:UncStandardRepeatability,
    aj:combinedUncertainty,
    ai:	UncChamberInstability,

    updated formula
    function DOFFunction({aj, aa, ac, ae, ag, i, w, o, ah, ai}) {
    Removed AE = uncertainty due to standard resolution
    updated formula to cp-012-f2 revision 2 : Effectivity date: 01-dec-2023
    added uucTrialCount, stdTrialCount
  */
  var calclatedAJ = Math.pow(parseFloat(aj), 4);
  var calclatedAA = Math.pow(parseFloat(aa), 4);
  var calclatedAC = Math.pow(parseFloat(ac), 4);
  //var calclatedAE = Math.pow(parseFloat(ae), 4);
  var calclatedAG = Math.pow(parseFloat(ag), 4);
  var calclatedI = Math.pow(parseFloat(i), 4);
  var calclatedW = Math.pow(parseFloat(w), 4);
  var calclatedO = Math.pow(parseFloat(o), 4);
  var calclatedAh = Math.pow(parseFloat(ah), 4);
  var calclatedAi = Math.pow(parseFloat(ai), 4);

  let calculated_uucTrialCount = parseFloat(uucTrialCount) - 1;
  let calculated_stdTrialCount = parseFloat(stdTrialCount) - 1;
  // return (calclatedAJ/((calclatedAA/1000000)+
  // (calclatedAC/1000000)+(calclatedAE/1000000)+
  // (calclatedAG/1000000)+(calclatedI/1000000)+
  // (calclatedW/1000000)+(calclatedO/1000000)+(calclatedAh/1000000)+(calclatedAi/1000000)));
  //
  // return (
  //   calclatedAJ /
  //   (calclatedAA / 1000000 +
  //     calclatedAC / 1000000 +
  //     //calclatedAE / 1000000 +
  //     calclatedAG / 1000000 +
  //     calclatedI / 1000000 +
  //     calclatedW / 2 +
  //     calclatedO / 2 +
  //     calclatedAh / 1000000 +
  //     calclatedAi / 1000000)
  // );
  return (
    calclatedAJ /
    (calclatedAA / 1000000 +
      calclatedAC / 1000000 +
      calclatedAG / 1000000 +
      calclatedI / 1000000 +
      calclatedW / calculated_stdTrialCount +
      calclatedO / calculated_uucTrialCount +
      calclatedAh / 1000000 +
      calclatedAi / 1000000)
  );
}

function combinedUncertaintyFunction({i, o, z, ac, ag, ah, aa, w, ai}) {
  /*
    i:UncUUCResolution,
    o:UncUUCRepeatability,
    z:UncStandardReadout,
    ac:UncDrift,
    ae:UncSTDResolution,
    ag:UncChamberUniformity,
    ah:hysteresis,
    aa:UncStandardPRT,
    w:UncStandardRepeatability,
    ai:	UncChamberInstability,

    updated formula
    function combinedUncertaintyFunction({i, o, z, ac, ae, ag, ah, aa, w, ai}) {
    Removed AE = uncertainty due to standard resolution
    updated formula to cp-012-f2 revision 2 : Effectivity date: 01-dec-2023
  */
  var calclatedI = Math.pow(parseFloat(i), 2);
  var calclatedO = Math.pow(parseFloat(o), 2);
  var calclatedZ = Math.pow(parseFloat(z), 2);
  var calclatedAC = Math.pow(parseFloat(ac), 2);
  //var calclatedAE = Math.pow(parseFloat(ae), 2);
  var calclatedAG = Math.pow(parseFloat(ag), 2);
  var calclatedAH = Math.pow(parseFloat(ah), 2);
  var calclatedAA = Math.pow(parseFloat(aa), 2);
  var calclatedW = Math.pow(parseFloat(w), 2);
  var calclatedAI = Math.pow(parseFloat(ai), 2);

  return Math.sqrt(
    calclatedI +
      calclatedO +
      calclatedZ +
      calclatedAC +
      //calclatedAE +
      calclatedAG +
      calclatedAH +
      calclatedAA +
      calclatedW +
      calclatedAI
  );
  
}

function calculateKFunction(valueDOF) {
  var KCalculated = formulajs.TINV(1 - 0.0455 / 2, Math.trunc(parseFloat(valueDOF)));
  return KCalculated.toFixed(5);
}

function expandedUncertaintyFunction(combinedUncertain, K) {
  return parseFloat(combinedUncertain) * K;
}

function readoutStandardUncertaintyFromCertificateGet(unitSelect, sn, raw_testPoint) {
  let testPoint = parseFloat(raw_testPoint)
  var unit;
  if (unitSelect == "Temp") {
    unit = "Temperature";
  }else if (unitSelect == "TempOut") {
    unit = "Temperature";
  }else {
    unit = "Relative Humidity";
  }
  let arrayReadoutStandard = [];
  let arrayTestPoint = [];
  let objectUncertainty = {};
  for (i = 0; i < standardValues.length; i++) {
    if (
      standardValues[i].unit == unit &&
      standardValues[i].standardID == sn
    ) {
      arrayReadoutStandard.push(
        parseFloat(standardValues[i].readoutStandardUncertaintyFromCertificate)
      );
      arrayTestPoint.push(
        parseFloat(standardValues[i].testPoint)
      );
      objectUncertainty[parseFloat(standardValues[i].testPoint)] = standardValues[i].readoutStandardUncertaintyFromCertificate;
    }
  }
  //max = Math.max.apply(null, arrayReadoutStandard);
  //return max.toFixed(3);
  let testpointForUncertainty = getTestPoint(arrayTestPoint, testPoint)
  return objectUncertainty[testpointForUncertainty];
}

function getTestPoint(array, testPoint) {
  if (array.includes(testPoint)) {
      let index = array.indexOf(testPoint)
      return array[index];
  }
  array.push(testPoint);
  array.sort((a, b) => a - b);
  let index = array.indexOf(testPoint);
  
  if (index == array.length-1){
    array.splice(index, 1);
    return Math.max(...array)
  }
  return array[index + 1];
}

function PRTStandardUncertaintyFromCertificateGet(unitSelect, sn, raw_testPoint) {
  let testPoint = parseFloat(raw_testPoint)
  var unit;
  if (unitSelect == "Temp") {
    unit = "Temperature";
  }else if (unitSelect == "TempOut") {
    unit = "Temperature";
  }else {
    unit = "Relative Humidity";
  }
  let arrayReadoutStandard = [];
  let arrayTestPoint = [];
  let objectUncertainty = {};
  for (i = 0; i < standardValues.length; i++) {
    if (
      standardValues[i].unit == unit &&
      standardValues[i].standardID == sn
    ) {
      arrayReadoutStandard.push(
        parseFloat(standardValues[i].uncertainty)
      );
      arrayTestPoint.push(
        parseFloat(standardValues[i].testPoint)
      );
      objectUncertainty[parseFloat(standardValues[i].testPoint)] = standardValues[i].uncertainty;
    }
  }

  

  //max = Math.max.apply(null, arrayReadoutStandard);
  //return max.toFixed(3);
  let testpointForUncertainty = getTestPoint(arrayTestPoint, testPoint)
  return objectUncertainty[testpointForUncertainty];
}

function linearRegression(y, x) {
  var lr = {};
  var n = y.length;
  var sum_x = 0;
  var sum_y = 0;
  var sum_xy = 0;
  var sum_xx = 0;
  var sum_yy = 0;

  for (var i = 0; i < y.length; i++) {
    sum_x += x[i];
    sum_y += y[i];
    sum_xy += x[i] * y[i];
    sum_xx += x[i] * x[i];
    sum_yy += y[i] * y[i];
  }

  lr["slope"] = (n * sum_xy - sum_x * sum_y) / (n * sum_xx - sum_x * sum_x);
  lr["intercept"] = (sum_y - lr.slope * sum_x) / n;
  lr["r2"] = Math.pow(
    (n * sum_xy - sum_x * sum_y) /
      Math.sqrt((n * sum_xx - sum_x * sum_x) * (n * sum_yy - sum_y * sum_y)),
    2
  );

  console.log(lr["slope"]);
  return lr["slope"];
}
