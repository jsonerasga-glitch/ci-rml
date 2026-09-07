function standardDeviation(arr) {
    const n = arr.length;
    const mean = arr.reduce((sum, num) => sum + num, 0) / n;
    const squaredDifferences = arr.map(num => Math.pow(num - mean, 2));
    const sumSquaredDifferences = squaredDifferences.reduce((sum, num) => sum + num, 0);
    const variance = sumSquaredDifferences / (n - 1);
    const standardDeviation = Math.sqrt(variance);
    return standardDeviation;
}

function repeatabilityStandardDeviation(){
    let arr = [];
    let numberOfRepeatability = parseFloat($('#numberOfRepeatability').val());
    for (let i = 1; i <= numberOfRepeatability; i++) {
        let val = parseFloat($('#repeat'+i).val());
        arr.push(val);
    }
    $('#stDev').val(standardDeviation(arr));
}

function eccentricityError(){
    var p1Start = $('#eccentricity1Start').val();
    //var p1End = $('#eccentricity1End').val();
    var pValues = [
      $('#eccentricity2').val(),
      $('#eccentricity3').val(),
      $('#eccentricity4').val(),
      $('#eccentricity5').val()
    ];
    var eValues = [];
    var eViewValues = [];
    
    $.each(pValues, function(index, pValue) {
      pValue = parseFloat(pValue).toFixed(4);
      eValues[index] = (parseFloat(pValue) - parseFloat(p1Start)).toFixed(4);
      eViewValues[index] = (parseFloat(pValue) - parseFloat(p1Start)).toFixed(4);
    });
  
    var e1Value = (parseFloat(p1Start)).toFixed(4);
    $('#error1View').val(e1Value);
    $('#error1').val(e1Value);

    let absoluteValues = eValues.map(Math.abs);

    var errDiff = Math.max.apply(null, absoluteValues);
    $('#errDiff').val(errDiff.toFixed(4));
  
    $.each(eValues, function(index, eValue) {
      $('#error' + (index + 2)).val(eValue);
      $('#error' + (index + 2) + 'View').val(eValue);
    });
}

function convection(){
    let classi = $('#class' + currentlySelected).val();
    let mpeVal = $('#mpe' + currentlySelected).val();
    let convec;

    // if (/(F[₂2]|M[12]|M[₁₂])/.test(classi)) {
    //     convec = 0;
    // } else if (/(F1|E2|F₁|E₂)/.test(classi)) {
    //     convec = parseFloat(mpeVal) / 3;
    // } else if (classi == 'Free Nominal Mass Standards') {
    //     convec = parseFloat(mpeVal) / 3;
    // }

    if(/(F1|E2|F₁|E₂)/.test(classi)){
      convec = parseFloat(mpeVal) / 3;
    }else{
        convec = 0;
    }
    return convec
}