function average(arrayOfValue) {
  var sum = 0;
  for (let i = 0; i < arrayOfValue.length; i++) {
    sum += parseFloat(arrayOfValue[i]);
  }
  return sum / arrayOfValue.length;
}

function standardDev(data) {
  var meanOfArray = 0;
  var distanceFromMean = [];
  var sumOfDistance = 0;
  var sumDividedByLength = 0;
  var standardDeviation = 0;
  for (let i = 0; i < data.length; i++) {
    meanOfArray += parseFloat(data[i]);
    if (i == data.length - 1) {
      meanOfArray = meanOfArray / data.length;
    }
  }
  for (let i = 0; i < data.length; i++) {
    var distance = Math.pow(parseFloat(data[i]) - meanOfArray, 2);
    distanceFromMean.push(distance);
  }
  for (let i = 0; i < distanceFromMean.length; i++) {
    sumOfDistance += distanceFromMean[i];
  }
  sumDividedByLength = sumOfDistance / (data.length - 1);
  standardDeviation = Math.sqrt(sumDividedByLength);
  return standardDeviation;
}

function interpolationCorr(midValue, standardUsed, standardArray) {
  var arrayofTemp = [];
  var sortedArrayofTemp = [];
  let testPointMax;
  let testPointMin;
  let corrMax;
  let corrMin;
  let midIndex;
  let mid = midValue;
  let difTP;
  let difCorr;
  let ratio;
  var arrayOfSet = filterDataDynamic(
    standardUsed,
    "serialNumber",
    standardArray
  );
  for (x = 0; x < arrayOfSet.length; x++) {
    if (arrayOfSet[x].unit == "Temperature") {
      arrayofTemp.push({
        TP: arrayOfSet[x].testPoint,
        Corr: arrayOfSet[x].correction,
      });
    }
  }
  arrayofTemp.push({TP: mid});
  sortedArrayofTemp = arrayofTemp.sort(function (a, b) {
    return a.TP - b.TP;
  });
  // Find
  for (var i = 0; i < sortedArrayofTemp.length; i++) {
    if (sortedArrayofTemp[i].TP == mid) {
      // midIndex is set to the index of the element
      midIndex = i;
      break;
    }
  }
  testPointMax = sortedArrayofTemp[midIndex + 1].TP;
  testPointMin = sortedArrayofTemp[midIndex - 1].TP;
  corrMax = sortedArrayofTemp[midIndex + 1].Corr;
  corrMin = sortedArrayofTemp[midIndex - 1].Corr;
  difTP = parseFloat(testPointMax) - parseFloat(testPointMin);
  difCorr = parseFloat(corrMax) - parseFloat(corrMin);
  ratio = difCorr / difTP;
  midCorr =
    parseFloat(corrMin) + (parseFloat(mid) - parseFloat(testPointMin)) * ratio;
  return midCorr;
}

function UncUUCReso(uucReso, readability) {
  return (parseFloat(uucReso) * parseFloat(readability)) / Math.sqrt(3);
}

function UncRepeatability(value) {
  return parseFloat(value) / Math.sqrt(3);
}

function UncStandardReadout(readoutStandardUncFromCert) {
  return (readoutStandardUncFromCert / 2) * 10;
}

function UncStandardPRT(PRTStandardUncFromCert) {
  return PRTStandardUncFromCert / 2;
}

function UncDrift(drift) {
  return drift / Math.sqrt(3);
}

function correctedValue(stdAverage, correction) {
  return parseFloat(stdAverage) + parseFloat(correction);
}

function hysteresis({
  uucReadingAve1,
  uucReadingAve2,
  correctedValue1,
  correctedValue2,
}) {
  return (
    (uucReadingAve1 - uucReadingAve2 - (correctedValue1 - correctedValue2)) /
    Math.sqrt(3)
  );
}

function combinedUncertainty(
  uncUUCReso,
  uncRepeatSTD,
  uncRepeatUUC,
  uncStandardReadout,
  uncDrift,
  bathInsta,
  axialHomo,
  radialHomo,
  hysteresis,
  uncStandardPRT
) {
  var uncUUCResoCalculated = Math.pow(uncUUCReso, 2);
  var uncRepeatSTDCalculated = Math.pow(uncRepeatSTD, 2);
  var uncRepeatUUCCalculated = Math.pow(uncRepeatUUC, 2);
  var uncStandardReadoutCalculated = Math.pow(uncStandardReadout, 2);
  var uncDriftCalculated = Math.pow(uncDrift, 2);
  var bathInstaCalculated = Math.pow(bathInsta, 2);
  var axialHomoCalculated = Math.pow(axialHomo, 2);
  var radialHomoCalculated = Math.pow(radialHomo, 2);
  var hysteresisCalculated = Math.pow(hysteresis, 2);
  var uncStandardPRTCalculated = Math.pow(uncStandardPRT, 2);

  return Math.sqrt(
    uncUUCResoCalculated +
      uncRepeatSTDCalculated +
      uncRepeatUUCCalculated +
      uncStandardReadoutCalculated +
      uncDriftCalculated +
      bathInstaCalculated +
      axialHomoCalculated +
      radialHomoCalculated +
      hysteresisCalculated +
      uncStandardPRTCalculated
  );
}

function vEffective(
  combinedUncertanty,
  uncUUCReso,
  uncRepeatSTD,
  uncRepeatUUC,
  uncStandardPRT,
  uncDrift,
  bathInsta,
  axialHomo,
  radialHomo,
  hysteresis
) {
  var combinedUncertantyCalculated = Math.pow(combinedUncertanty, 4);
  var uncUUCResoCalculated = Math.pow(uncUUCReso, 4);
  var uncRepeatSTDCalculated = Math.pow(uncRepeatSTD, 4);
  var uncRepeatUUCCalculated = Math.pow(uncRepeatUUC, 4);
  var uncStandardPRTCalculated = Math.pow(uncStandardPRT, 4);
  var uncDriftCalculated = Math.pow(uncDrift, 4);
  var bathInstaCalculated = Math.pow(bathInsta, 4);
  var axialHomoCalculated = Math.pow(axialHomo, 4);
  var radialHomoCalculated = Math.pow(radialHomo, 4);
  var hysteresisCalculated = Math.pow(hysteresis, 4);
  return (
    combinedUncertantyCalculated /
    (uncUUCResoCalculated / 1000000 +
      uncRepeatSTDCalculated / 2 +
      uncRepeatUUCCalculated / 2 +
      uncStandardPRTCalculated / 1000000 +
      uncDriftCalculated / 1000000 +
      bathInstaCalculated / 1000000 +
      axialHomoCalculated / 1000000 +
      radialHomoCalculated / 1000000 +
      hysteresisCalculated / 1000000)
  );
}

function calculateK(veffective) {
  let vEff_trunc = Math.trunc(veffective)
  let kVal = formulajs.TINV(1 - 0.0455 / 2, vEff_trunc);
  let valFloat = parseFloat(kVal)
  let result = valFloat
  return result;
}

function expandedUncertainty(combined, k) {
  return combined * k;
}



// $( window ).on( "load", function() {
//   if ($('#idOfCertificate').val() != ''){
//       let idOfCertificate = $('#idOfCertificate').val();
//       $.ajax({
//           cache: false,
//           type: "post",
//           url: "/testWeight/get_data_by_id",
//           data: {
//               'idOfCertificate' : idOfCertificate,
//           },
//           success: function(result) {
//               $('#saveButton').html('Update')
//               $('#saveButton').on("click", function(){updateData()});

//               $('#calculatedData').val(result.worksheetData['calculatedData']);

//               if(result.worksheetData['standard'] != null){
//                   updateProcessStandard(result.worksheetData['standard']);
//               }

//               let dataInputs = JSON.parse(result.worksheetData['dataInputs'])
//               let count = dataInputs != null ? Object.keys(dataInputs).length : 0;                

//               let infoArray = ['equipmentInfo', 'customerInfo', 'environmentInfo'];
//               for (let i = 0; i < infoArray.length; i++) {
//                   let infoValues = JSON.parse(result.worksheetData[infoArray[i]]);
//                   let keys = Object.keys(infoValues);
//                   for (let x = 0; x < keys.length; x++) {
//                       let id = keys[x];
//                       $('#'+id).val(infoValues[id])                        
//                   } 
                  
//               }      

//               for (let index = 1; index <= count; index++) {
//                   addAnotherInfo()
//                   let infoValues = dataInputs['Table'+index];
//                   let keys = Object.keys(infoValues);
//                   for (let x = 0; x < keys.length; x++) {
//                       let id = keys[x];
//                       $('#Table'+index+' #'+id).val(infoValues[id])        
//                       if(id === 'SampleNominalUnit'){
//                           $('#Table'+index+" #SampleNominalUnit").trigger("change");
//                       }   
//                       if(id === 'comparator'){
//                           $('#Table'+index+" #comparator").trigger("change");
//                       }        
                      
//                   } 
                  
//               }          
//           },
//           error: function (error) {
//               console.log(error);
//           },
//       })
//   }else{
//       $('#saveButton').html('Save');
//       $('#saveButton').on("click", function(){saveData()});        
//   }
// })