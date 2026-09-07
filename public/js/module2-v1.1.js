
$( document ).ready(function() {
    addPersonnel();
    addStandardDetailsToModalTable()
    usePreviousDataAddRows();
    addCustomerList();

});

// $(document).ready(function(){
//     let sessionID = $('#sessionID').val()
//     if(sessionID === '13'){
//         return;
//     } else{
//         $('body').html('Under Maintenance dont use')
//     }
// })

var selectedStandard = '';
var selectedStandard_serialNumber = '';
var selectedChamber = '';
var selectedChamber_serialNumber = '';
var detailsAndValues;

//#region General Functions
function bind(id, evt, func){
    var el = document.getElementById(id);
    if (el.addEventListener){
        el.addEventListener(evt, func);
    } else if (el.attachEvent) {
        el.attachEvent('on' + evt, func);
    }
}
function copyFromDataset(copyFrom, copyTo, datasetName){
    var from = document.getElementById(copyFrom);
    var to = document.getElementById(copyTo);
    to.value = from.selectedOptions[0].dataset[datasetName];
}
function getEmailOfVerifier(copyFrom){
    var from = document.getElementById(copyFrom);
    var verifierEmail = document.getElementById('verifierEmail');
    verifierEmail.value = from.selectedOptions[0].dataset['email'];
}
function addPersonnel(){
    var calibrationOfficer = document.getElementById('calibratedBy');
    var verifier = document.getElementById('checkedBy');
    var verifierPosition = document.getElementById('verifierPosition');

    personnels.forEach(item => {
        var option = document.createElement('option');
        option.setAttribute('value', item.personnelName);
        option.innerHTML = item.personnelName;
        calibrationOfficer.appendChild(option);
    })
    verifiers.forEach(item => {
        var option = document.createElement('option');
        option.setAttribute('value', item.verifierName);
        option.setAttribute('data-verifierposition', item.verifierPosition);
        option.setAttribute('data-email', item.verifierEmail);
        option.innerHTML = item.verifierName;
        verifier.appendChild(option);

        var option = document.createElement('option');
        option.setAttribute('value', item.verifierPosition);
        option.setAttribute('data-verifiername', item.verifierName);
        option.setAttribute('data-email', item.verifierEmail);
        option.innerHTML = item.verifierPosition;
        verifierPosition.appendChild(option);
    })
    getEmailOfVerifier('checkedBy');
}
function getCustomerDetails(){
    let customer = document.getElementById('customer');
    let address = document.getElementById('address');
    let idOfCustomer = document.getElementById('idOfCustomer');

    const detailsSplit = customer.value.split(' @ ');
    if(detailsSplit.length > 1){
      customer.value = detailsSplit[0];
      address.value = detailsSplit[1];
    }else{
      address.value = '';
    }
}
function addCustomerList(){
    customers.forEach(data => {
        let customer = data.customer + ' @ ' + data.address;
        $('#customerList').append(
            $('<option>').val(customer)
        )
    })
}
function setDate() {
    let d = new Date(document.getElementById("dateCalibrated").value)
    let mon = +document.getElementById("recommendedDueDateSelect").value;
    if(mon == '0'){
        document.getElementById("recommendedDueDate").valueAsDate = null;
    }else{
        d.setMonth(d.getMonth() + mon)
        document.getElementById("recommendedDueDate").valueAsDate = d;

    }
}
function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}
function toggleCheckbox(id){
    let chkId = '#'+id;
    $(chkId).prop("checked", !$(chkId).prop("checked"));

}
function processModalStandardCheckbox(){
    var selected = $("input[id*='modalStandard']:checked").map(function () {
        return this.value;
    }).get();
    var selected_serialNumber = $("input[id*='modalStandard']:checked").map(function () {
        return $(this).data('serialnumber');
    }).get();
    selectedStandard = selected.join('(SPLITHERE)');
    selectedStandard_serialNumber = selected_serialNumber.join('(SPLITHERE)');

    $('select[id^=standardUsedTbody]').each(function(){
        $(this).html('');
        $(this).append($('<option>').html('Select Standard'))
    });
    $('select[id^=standardUsedTbody]').each(function(){
        selectedStandard.split('(SPLITHERE)').forEach(standard => {
            $(this).append($('<option>').val(standard).html(standard))
        })
        selectedStandard_serialNumber.split('(SPLITHERE)').forEach(standard => {
            $(this).append($('<option>').val(standard).html(standard))
        })
    });

}
function processModalChamberCheckbox(){
    var selected = $("input[id*='chamber']:checked").map(function () {
        return this.value;
    }).get();
    var selected_serialNumber = $("input[id*='chamber']:checked").map(function () {
        return $(this).data('serialnumber');
    }).get();
    selectedChamber = selected.join('(SPLITHERE)');
    selectedChamber_serialNumber = selected_serialNumber.join('(SPLITHERE)');
}
function getValuesOfSelectedStandard(){
    let splitSelectedStandard = selectedStandard.split('(SPLITHERE)');
    $.ajax({
        async:false,
        cache: false,
        type: "post",
        url: "/thermohygrometer/get_standard_value_by_serial",
        data: {
            'serialNumber': splitSelectedStandard
        },
        success: function(result) {
            //standardValues = result;
            detailsAndValues = result;
        },
    })
}
function search(nameKey, myArray){
    for (var i=0; i < myArray.length; i++) {
        if (myArray[i].TP === nameKey) {
            return true;
        }
    }
}
function checkIfPRT(serialNumber){
    var PRT = false;
    for(var i = 0; i < prtDriftValues[0].length; i++){
        if(serialNumber == prtDriftValues[0][i].standardID){
            PRT = true
        }
        if(PRT == true){
            return PRT
        }
    }
    return PRT
}
function filterDataDynamic(searchingFor, searchIn, UnfilteredArray){
    let filteredDATA = UnfilteredArray.filter(function (e) {
    if (searchingFor == searchingFor ) {
        return e[searchIn] == searchingFor;
        }
    });
    return filteredDATA;
}
function correctionFromCertificate(testPointValue, rowSelectedStandard, tableUnit){
    // let standardValuesUsingSerialNumber = standardValues.filter(item => item['serialNumber'] === rowSelectedStandard)
    let standardValuesUsingSerialNumber = standardValues.filter(item => item['standardID'] === rowSelectedStandard)
    let standardValuesUsingTableFunction = standardValuesUsingSerialNumber.filter(item => item['unit'] === tableUnit)
    let standardValuesUsingTestPoint = standardValuesUsingTableFunction.find(item => item['testPoint'] == testPointValue)

    if(standardValuesUsingTestPoint){
        return parseFloat(parseFloat(standardValuesUsingTestPoint['correction']));
    }else{
        let arrayOfTestPoints = [];
        standardValuesUsingTableFunction.forEach(item => {
            arrayOfTestPoints.push(parseFloat(item['testPoint']))
        })
        arrayOfTestPoints.push(parseFloat(testPointValue))

        let sortedArrayOfTestPoint = arrayOfTestPoints.sort(function(a, b) {
            return a - b;
        });

        let index = $.inArray(parseFloat(testPointValue), sortedArrayOfTestPoint);
        let standardValuesUsingTestPointMIN = standardValuesUsingTableFunction.find(item => item['testPoint'] == sortedArrayOfTestPoint[(index - 1)])
        let standardValuesUsingTestPointMax = standardValuesUsingTableFunction.find(item => item['testPoint'] == sortedArrayOfTestPoint[(index + 1)])

        let differenceOfTP = parseFloat(standardValuesUsingTestPointMax['testPoint']) - parseFloat(standardValuesUsingTestPointMIN['testPoint']);
        let differenceOfCorr = parseFloat(standardValuesUsingTestPointMax['correction']) - parseFloat(standardValuesUsingTestPointMIN['correction']);
        let ratio = differenceOfCorr / differenceOfTP;
        let interpolatedCorr = parseFloat(standardValuesUsingTestPointMIN['correction']) + (testPointValue - standardValuesUsingTestPointMIN['testPoint'])*ratio;
        return parseFloat(interpolatedCorr);
    }

}
function getStandardCoverageFactor(testpoint, unit, serialNumber){
    let unitOfTable = unit != 'Temp' ? 'Relative Humidity' : 'Temperature';
    let serialNumberDetailsFiltered = filterDataDynamic(serialNumber, 'id', detailsAndValues.details);
    let defaultCoverageFactor = serialNumberDetailsFiltered[0].coverageFactor;
    let coverageFactorPerTestpoint;
    try {
        let serialNumberFiltered = filterDataDynamic(serialNumber, 'id', detailsAndValues.values);
        let unitFiltered = filterDataDynamic(unitOfTable, 'unit', serialNumberFiltered);
        let testpointFiltered = filterDataDynamic(testpoint, 'testPoint', unitFiltered);
        coverageFactorPerTestpoint = testpointFiltered[0].coverageFactor;
    } catch (error) {
        coverageFactorPerTestpoint = defaultCoverageFactor;
    }
    return coverageFactorPerTestpoint;
}
//#endregion General Functions

//#region Bind
bind('checkedBy','change',function(){
    copyFromDataset('checkedBy', 'verifierPosition', 'verifierposition')
    getEmailOfVerifier('checkedBy');
});
bind('verifierPosition','change',function(){
    copyFromDataset('verifierPosition', 'checkedBy', 'verifiername')
});
bind('addButtonMeasurementTables','click',function(){
    addNewTables();
});
bind('removeButtonMeasurementTables','click',function(){
    deleteTable();
});

bind('dateCalibrated','change',function(){
    setDate();
});
bind('recommendedDueDateSelect','change',function(){
    setDate();
});

//#endregion Bind

//#region Table Functions

function addNewTables(){
    let tableDiv = $('#measurementDataTables');
    let currentNumberOfTables = tableDiv.children().length;
    let thisTableNumber = currentNumberOfTables+1;
    let rowNumber = 1;
    let arrayOfText = [
        'Test Points',
        'UUC reading',
        'Standard reading',
        //'Range',
        'Res/Grad\'n',
        'Readability',
        'Standard Used',
        'Correction', 
        'STD Resolution',
        'Chamber',
        'Chamber Inhomogeneity',
        'Chamber Instability',
        'Corrected Value',
        //'(Test Point - correction)',
    ]
    let arrayOfTextTrials = [
        'Trial 1',
        'Trial 2',
        'Trial 3',
        'Average',
        'Trial 1',
        'Trial 2',
        'Trial 3',
        'Average',
    ]

    let trLabels = $('<tr>');
    arrayOfText.forEach(label => {
        let th = $('<th>').attr('rowspan', '2').html(label);
        if(label == 'UUC reading' || label == 'Standard reading'){
            th.removeAttr('rowspan')
            th.attr('colspan', '4')
        }
        trLabels.append(th)
    });
    let trTrials = $('<tr>');
    arrayOfTextTrials.forEach(label => {
        trTrials.append($('<th>').html(label))
    });

    let div = $('<div>').attr('class', 'row table-responsive');
    let table = $('<table>').attr('class', 'table table-bordered align-middle text-center').attr('id', 'table'+thisTableNumber);
    let tbody = $('<tbody>');
    let thead = $('<thead>')
        .append(
            $('<tr>')
            .append(
                $('<td>')
                .attr('colspan', '18')
                .append(
                    $('<div>')
                    .attr('class', 'input-group')
                    .append(
                        $('<button>')
                        .attr('type', 'button')
                        .attr('class', 'btn btn-success')
                        .attr('id', 'buttonAddTable'+thisTableNumber)
                        .html('Add New Row')
                        .click(function(){
                            let type = $('#functionTable'+thisTableNumber);
                            if(type.val() == "Choose function"){
                                alert('Choose a function');
                            }else{
                                let newRow = addNewRows(thisTableNumber, rowNumber);
                                tbody.append(newRow);
                                rowNumber++;
                            }

                        })
                    )
                    .append(
                        $('<button>')
                        .attr('type', 'button')
                        .attr('class', 'btn btn-danger')
                        .attr('id', 'buttonDeleteTable'+thisTableNumber)
                        .html('Delete Last Row')
                        .click(function(){
                            tbody.find('tr:last').remove();
                            if (rowNumber > 1) {
                            rowNumber--;
                            }
                        })
                    )
                    .append(
                        $('<select>')
                        .attr('class', 'form-select')
                        .attr('name', 'typeOfEquipmentTable'+thisTableNumber)
                        .attr('id', 'typeOfEquipmentTable'+thisTableNumber)
                        .attr('data-group', 'raw_data')
                        .append(
                            $('<option>')
                            .html('Choose equipment type')
                        )
                        .append(
                            $('<option>')
                            .val('digital')
                            .html('Digital')
                        )
                        .append(
                            $('<option>')
                            .val('analog')
                            .html('Analog')
                        )
                    )
                    .append(
                        $('<select>')
                        .attr('class', 'form-select')
                        .attr('name', 'functionTable'+thisTableNumber)
                        .attr('id', 'functionTable'+thisTableNumber)
                        .attr('data-group', 'raw_data')
                        .append(
                            $('<option>')
                            .html('Choose function')
                        )
                        .append(
                            $('<option>')
                            .val('Temp')
                            .html('Temperature')
                        )
                        .append(
                            $('<option>')
                            .val('Rh')
                            .html('Relative Humidity')
                        )
                        .append(
                            $('<option>')
                            .val('TempOut')
                            .html('Temperature Out')
                        )
                        .append(
                            $('<option>')
                            .val('RhOut')
                            .html('Relative Humidity Out')
                        )
                    )
                    .append(
                        $('<input>')
                        .attr('class', 'form-control')
                        .attr('type', 'text')
                        .attr('id', 'channelNameTable'+thisTableNumber)
                        .attr('name', 'channelNameTable'+thisTableNumber)
                        .attr('placeholder', 'Channel Name')
                        .attr('data-group', 'raw_data')
                    )
                    .append(
                        $('<input>')
                        .attr('class', 'form-control')
                        .attr('type', 'text')
                        .attr('id', 'brandTable'+thisTableNumber)
                        .attr('name', 'brandTable'+thisTableNumber)
                        .attr('placeholder', 'Brand')
                        .attr('data-group', 'raw_data')
                    )
                    .append(
                        $('<input>')
                        .attr('class', 'form-control')
                        .attr('type', 'text')
                        .attr('id', 'serialNumberTable'+thisTableNumber)
                        .attr('name', 'serialNumberTable'+thisTableNumber)
                        .attr('placeholder', 'Serial Number')
                        .attr('data-group', 'raw_data')
                    )
                    .append(
                        $('<input>')
                        .attr('class', 'form-control')
                        .attr('type', 'text')
                        .attr('id', 'modelTable'+thisTableNumber)
                        .attr('name', 'modelTable'+thisTableNumber)
                        .attr('placeholder', 'Model')
                        .attr('data-group', 'raw_data')
                    )
                    .append(
                        $('<input>')
                        .attr('class', 'form-control')
                        .attr('type', 'text')
                        .attr('id', 'custonDecimalPlaceTable'+thisTableNumber)
                        .attr('name', 'custonDecimalPlaceTable'+thisTableNumber)
                        .attr('placeholder', 'Number of Decimal points (set to -1 if Not Applicable)')
                        .attr('data-group', 'raw_data')
                        .attr('value', '-1')
                    )
                )
            )
        )
        .append(trLabels, trTrials)
    tableDiv.append(
        div.append(
            table.append(thead, tbody)
        )
    )

}

function deleteTable(){
    $("#measurementDataTables").children().last().remove();
}

function addNewRows(tableNumber, rowNumber){
    let idOfTable = 'Table'+tableNumber;
    let arrayOfId = [
        'testPointTbody',
        'UUCtrial1Tbody',
        'UUCtrial2Tbody',
        'UUCtrial3Tbody',
        'UUCAverageTbody',
        'standardTrial1Tbody',
        'standardTrial2Tbody',
        'standardTrial3Tbody',
        'standardAverageTbody',
        'rangeTbody',
        'resolutionTbody',
        'readabilityTbody',
        'standardUsedTbody',
        'correctionTbody',
        'standardResolutionTbody',
        'chamberTbody',
        'chamberInhomogeneityTbody',
        'chamberInstabilityTbody',
        'correctedValueTbody',
        'consideringCorrectionTbody',
    ]
    // standardUsedTbodyTable1Row1
    let tr = $('<tr>');
    arrayOfId.forEach(ids => {
        let idWithNumbers = ids + idOfTable + 'Row' + rowNumber;
        let tableFunction = $('#function'+idOfTable).val();
        // let tableUnit = tableFunction === 'Temp' ? 'Temperature' : tableFunction === 'Rh' ? "Relative Humidity" : 'ERROR';
        let tableUnit = tableFunction === 'Temp' ? 'Temperature' : tableFunction === 'Rh' ? "Relative Humidity" : tableFunction === 'TempOut' ? "Temperature" : tableFunction === 'RhOut' ? "Relative Humidity" : 'ERROR';

        let input = $('<input>')
            .attr('class', 'form-control border-0 bg-transparent')
            .attr('id', idWithNumbers)
            .attr('name', idWithNumbers)
            .attr('data-rownumber', rowNumber)
            .attr('data-group', 'raw_data')
            .attr('style', 'width:8em')
            .attr('type', 'text')

        let td = $('<td>')

        if(ids == 'readabilityTbody'){
            let typeOfEquipment = $("#typeOfEquipment"+idOfTable).val();

            input = $('<select>',{
                'class': 'form-select border-0 bg-transparent',
                'id': idWithNumbers,
                'name': idWithNumbers,
                'data-rownumber': rowNumber,
                'data-group': 'raw_data',
                'style': 'width:8em',
            })

            if(typeOfEquipment == 'analog'){
                $(input).append($('<option>',{
                    'value':'0.5',
                    'html':'1/2'
                }),$('<option>',{
                    'value':'0.2',
                    'html':'1/5'
                }),$('<option>',{
                    'value':'0.1',
                    'html':'1/10'
                }))
            }else{
                $(input).append($('<option>',{
                    'value':'0.5',
                    'html':'0.5'
                }))
            }

            $("#typeOfEquipment"+idOfTable).on('change', function(){
                $('#'+idWithNumbers).html('')
                if($(this).val() == 'analog'){
                    $('#'+idWithNumbers).append($('<option>',{
                        'value':'0.5',
                        'html':'1/2'
                    }),$('<option>',{
                        'value':'0.2',
                        'html':'1/5'
                    }),$('<option>',{
                        'value':'0.1',
                        'html':'1/10'
                    }))
                }else{
                    $('#'+idWithNumbers).append($('<option>',{
                        'value':'0.5',
                        'html':'0.5'
                    }))
                }
            })

        }

        if(ids == 'consideringCorrectionTbody' || ids == 'UUCAverageTbody' || ids == 'standardAverageTbody' || ids == 'standardResolutionTbody' || ids == 'chamberInhomogeneityTbody' || ids == 'chamberInstabilityTbody' || ids == 'correctedValueTbody' ){
            td.attr('class', 'bg-warning')
        }
        if(ids == 'standardUsedTbody'){
            let standardArray = selectedStandard.split('(SPLITHERE)');
            let standardArray_serialNumber = selectedStandard_serialNumber.split('(SPLITHERE)');
            td = $('<td>')
            let selectStandard = $('<select>')
                .attr('class', 'border-0 bg-transparent')
                .attr('id', idWithNumbers)
                .attr('name', idWithNumbers)
                .attr('data-rownumber', rowNumber)
                .attr('data-group', 'raw_data')
                .on('change', function(){
                    let rowSelectedStandard = $(this).val();
                    if(rowSelectedStandard == 'Select Standard'){
                        return 0;
                    }
                    let testPointValue = $('#testPointTbody'+ idOfTable + 'Row' + rowNumber).val();
                    let stdResolution;
                    let standardUsingSerialNumber = standardDetails.find(item => item['id'] === rowSelectedStandard)
                    let standardAverage = parseFloat($('#standardAverageTbody'+ idOfTable + 'Row' + rowNumber).val());
                    if(standardUsingSerialNumber){
                        if(tableFunction === 'Temp'){
                            stdResolution = standardUsingSerialNumber['stdResolutionTemp'];
                        }
                        if(tableFunction === 'TempOut'){
                            stdResolution = standardUsingSerialNumber['stdResolutionTemp'];
                        }
                        if(tableFunction === 'Rh'){
                            stdResolution = standardUsingSerialNumber['stdResolutionRH'];
                        }
                        if(tableFunction === 'RhOut'){
                            stdResolution = standardUsingSerialNumber['stdResolutionRH'];
                        }
                    }
                    $('#standardResolutionTbody'+idOfTable+'Row' + rowNumber).val(stdResolution);

                    let correction = correctionFromCertificate(testPointValue, rowSelectedStandard, tableUnit);

                    let correctedValue = standardAverage + correction;
                    $('#correctedValueTbody'+ idOfTable + 'Row' + rowNumber).val(correctedValue);
                    $('#correctionTbody'+ idOfTable + 'Row' + rowNumber).val(correction);
                })
                .append(
                $('<option>')
                .html('Select Standard')
            );

            standardArray.forEach((serialNumbers, index) => {
                selectStandard.append(
                    $('<option>').val(serialNumbers).html(standardArray_serialNumber[index])
                )
            });
            td.append(selectStandard)
        }
        if(ids == 'correctionTbody'){
            input.on('input', function(){
                let standardAverage = parseFloat($('#standardAverageTbody'+ idOfTable + 'Row' + rowNumber).val());
                let correction = parseFloat($(this).val())
                if(isNaN(correction)){
                    let rowSelectedStandard = $('#standardUsedTbody'+ idOfTable + 'Row' + rowNumber).val();
                    let testPointValue = $('#testPointTbody'+ idOfTable + 'Row' + rowNumber).val();
                    correction = correctionFromCertificate(testPointValue, rowSelectedStandard, tableUnit);
                }
                let correctedValue = standardAverage + correction;
                $('#correctedValueTbody'+ idOfTable + 'Row' + rowNumber).val(correctedValue);
            })
        }
        if(ids == 'chamberTbody'){
            let standardArray = selectedChamber.split('(SPLITHERE)');
            let standardArray_serialNumber = selectedChamber_serialNumber.split('(SPLITHERE)');
            td = $('<td>')
            let selectStandard = $('<select>')
                .attr('class', 'border-0 bg-transparent')
                .attr('id', idWithNumbers)
                .attr('name', idWithNumbers)
                .attr('data-rownumber', rowNumber)
                .attr('data-group', 'raw_data')
                .on('change', function(){
                    let rowSelectedStandard = $(this).val();
                    let testPointValue = $('#testPointTbody'+ idOfTable + 'Row' + rowNumber).val();
                    let chamberSelectedData = getChamberNextHigher(testPointValue, chamberStandard, rowSelectedStandard, tableFunction)
                    $('#chamberInhomogeneityTbody'+idOfTable+'Row'+rowNumber).val(chamberSelectedData.inhomogeneity)
                    $('#chamberInstabilityTbody'+idOfTable+'Row'+rowNumber).val(chamberSelectedData.instability)
                })
                .append(
                    $('<option>')
                    .html('Select Chamber')
                );

            standardArray.forEach((serialNumbers, index) => {
                selectStandard.append(
                    $('<option>').val(serialNumbers).html(standardArray_serialNumber[index])
                )
            });
            td.append(selectStandard)
        }
        if(ids == 'chamberInhomogeneityTbody' || ids == 'chamberInstabilityTbody'){
            chamberStandard.forEach(item => {
                if(item['serialNumber'] == selectedChamber){
                    if(item['unit'] == 'Temperature'){
                        if(tableFunction === 'Temp' ){
                            if(ids == 'chamberInhomogeneityTbody'){
                                input.val(item['inhomogeneity'])
                            }
                            if(ids == 'chamberInstabilityTbody'){
                                input.val(item['Instability'])
                            }
                        }
                    }
                    if(item['unit'] == 'Relative Humidity'){
                        if(tableFunction === 'Rh'){
                            if(ids == 'chamberInhomogeneityTbody'){
                                input.val(item['inhomogeneity'])
                            }
                            if(ids == 'chamberInstabilityTbody'){
                                input.val(item['Instability'])
                            }
                        }
                    }
                }
            });
        }
        if(ids == 'UUCtrial1Tbody' || ids == 'UUCtrial2Tbody' || ids == 'UUCtrial3Tbody'){
            input.on('input', function() {
                let idOfAverage = 'UUCAverageTbody'+idOfTable+'Row' + rowNumber;
                let T1 = parseFloat($('#UUCtrial1Tbody'+idOfTable+'Row' + rowNumber).val());
                let T2 = parseFloat($('#UUCtrial2Tbody'+idOfTable+'Row' + rowNumber).val());
                let T3 = parseFloat($('#UUCtrial3Tbody'+idOfTable+'Row' + rowNumber).val());
                let dataAsArray = [T1, T2, T3];
                getAverage(dataAsArray, idOfAverage)
            });
        }
        if(ids == 'standardTrial1Tbody' || ids == 'standardTrial2Tbody' || ids == 'standardTrial3Tbody'){
            input.on('input', function() {
                let idOfAverage = 'standardAverageTbody'+idOfTable+'Row' + rowNumber;
                let T1 = parseFloat($('#standardTrial1Tbody'+idOfTable+'Row' + rowNumber).val());
                let T2 = parseFloat($('#standardTrial2Tbody'+idOfTable+'Row' + rowNumber).val());
                let T3 = parseFloat($('#standardTrial3Tbody'+idOfTable+'Row' + rowNumber).val());
                let dataAsArray = [T1, T2, T3];
                getAverage(dataAsArray, idOfAverage)
            });
        }


        if(ids == 'rangeTbody' || ids == 'consideringCorrectionTbody'){
            td.attr('class', 'd-none')
        }

        if(ids != 'standardUsedTbody' && ids != 'chamberTbody'){
            td.append(input)
        }

        tr.append(td);
    });
    return tr;
}

function addStandardDetailsToModalTable(){
    let tbody = document.createElement('tbody');
    let today = new Date();
    standardDetails.forEach(items=>{
        let checkboxId = 'modalStandard'+items['id'];
        let tr = document.createElement('tr');
        tr.setAttribute('onclick','toggleCheckbox("'+checkboxId+'")');

        let date_next_calibration = new Date(items.dateOfNextCali)

        let checkboxTD = document.createElement('td');
        let checkbox = document.createElement('input');
        checkbox.setAttribute('type','checkbox');
        checkbox.setAttribute('class','form-check-input');
        checkbox.setAttribute('id', checkboxId);
        // checkbox.setAttribute('value', items['serialNumber']);
        checkbox.setAttribute('value', items['id']);
        checkbox.setAttribute('data-serialnumber', items['serialNumber']);
        checkboxTD.append(checkbox);

        let standardDescription = document.createElement('td');
        standardDescription.innerHTML = items['standard'];
        let serialNumber = document.createElement('td');
        serialNumber.innerHTML = items['serialNumber'];
        let calibrationCertificate = document.createElement('td');
        calibrationCertificate.innerHTML = items['certificateNumber'];
        let laboratory = document.createElement('td');
        laboratory.innerHTML = items['issuingLab'];
        

        let days_due = Math.round(Math.abs((today - date_next_calibration) / (24 * 60 * 60 * 1000)));

        let suffix = 'days left before due date';

        if(today > date_next_calibration){
            checkbox.setAttribute('disabled', 'true')
            tr.setAttribute('style', 'background-color: rgba(255, 0, 0, 0.4)')
            suffix = 'days over due date';
        }else{
            tr.setAttribute('style', 'background-color: rgba(0, 255, 0, 0.4)')
            suffix = 'days left before due date';
        }
        
        let days_due_td = document.createElement('td');
        days_due_td.innerHTML = days_due + ' ' + suffix

        tr.append(checkboxTD);
        tr.append(standardDescription);
        tr.append(serialNumber);
        tr.append(calibrationCertificate);
        tr.append(laboratory);
        tr.append(days_due_td);

        if(today > date_next_calibration){
            tbody.append(tr)
          }else{
            tbody.prepend(tr)
          }
    })
    $('#modalStandardTable').append(tbody);

    let chamberTBody = $('<tbody>');
    let serialNumberCondition;
    chamberStandard.forEach(items=>{

        if(items['serialNumber'] == serialNumberCondition){
            return;
        }
        let checkboxId = 'chamber'+items['id'];
        let tr = document.createElement('tr');
        tr.setAttribute('onclick','toggleCheckbox("'+checkboxId+'")');

        let checkboxTD = document.createElement('td');
        let checkbox = document.createElement('input');
        checkbox.setAttribute('type','checkbox');
        checkbox.setAttribute('class','form-check-input');
        checkbox.setAttribute('id', checkboxId);
        // checkbox.setAttribute('value', items['serialNumber']);
        checkbox.setAttribute('value', items['id']);
        checkbox.setAttribute('data-serialnumber', items['serialNumber']);
        checkboxTD.append(checkbox);

        let serialNumber = document.createElement('td');
        serialNumber.innerHTML = items['serialNumber'];
        serialNumberCondition = items['serialNumber'];
        tr.append(checkboxTD);
        tr.append(serialNumber);
        chamberTBody.append(tr);
    })
    $('#modalChamberTable').append(chamberTBody)

    $('#modalStandardTable').DataTable({
        paging:false
    });
}

//#endregion Table Functions

function getChamberNextHigher(testPoint, array_data, serialNumber, unit){

    let float_testpoint = Number(testPoint);
    let unit_full = unit == 'Temp' || unit == 'TempOut'? 'Temperature' : 'Relative Humidity';
    let inhomogeneity, instability;
    let inhomogeneity_changed = false
    let instability_changed = false

    let parsed_data = array_data;

    let data_selected_chamber;
    for (let i = 0; i < parsed_data.length; i++) {
      if (parsed_data[i].id == serialNumber) {
        data_selected_chamber = parsed_data[i];
      }
    }

    let chamber_measurements = JSON.parse(data_selected_chamber.measurements);

    let array_instability = [];
    let array_inhomogeneity = [];

    let array_instability_setting = [];
    let array_inhomogeneity_setting = [];


    for (let i = 0; i < chamber_measurements.length; i++) {
      if (chamber_measurements[i].type == 'instability') {
        if (chamber_measurements[i].unit == unit_full) {
          array_instability.push({
            "setting": chamber_measurements[i].setting,
            "value": chamber_measurements[i].value
          })
        }
      }
      if (chamber_measurements[i].type == 'inhomogeneity') {
        if (chamber_measurements[i].unit == unit_full) {
          array_inhomogeneity.push({
            "setting": chamber_measurements[i].setting,
            "value": chamber_measurements[i].value
          })
        }
      }
    }

    for (let i = 0; i < array_instability.length; i++) {
      array_instability_setting.push(parseFloat(array_instability[i].setting))
      if (array_instability[i].setting == float_testpoint) {
        instability = array_instability[i].value
        instability_changed = true
      }
    }
    for (let i = 0; i < array_inhomogeneity.length; i++) {
      array_inhomogeneity_setting.push(parseFloat(array_instability[i].setting))
      if (array_inhomogeneity[i].setting == float_testpoint) {
        inhomogeneity = array_inhomogeneity[i].value
        inhomogeneity_changed = true
      }
    }

    if (!instability_changed) {
      array_instability_setting.push(float_testpoint);
      array_instability_setting.sort(function(a, b) {
        return a - b;
      });
      let indexOfTestPoint = array_instability_setting.indexOf(float_testpoint)
      let nextHigherTestPoint;
      if (indexOfTestPoint == array_instability_setting.length - 1) {
        nextHigherTestPoint = indexOfTestPoint - 1
      } else {
        nextHigherTestPoint = indexOfTestPoint + 1
      }
      let testpointToGetData = array_instability_setting[nextHigherTestPoint]

      for (let i = 0; i < array_instability.length; i++) {
        if (array_instability[i].setting == testpointToGetData) {
          instability = array_instability[i].value
        }
      }
    }

    if (!inhomogeneity_changed) {
      array_inhomogeneity_setting.push(float_testpoint);
      array_inhomogeneity_setting.sort(function(a, b) {
        return a - b;
      });
      let indexOfTestPoint = array_inhomogeneity_setting.indexOf(float_testpoint)
      let nextHigherTestPoint;
      if (indexOfTestPoint == array_inhomogeneity_setting.length - 1) {
        nextHigherTestPoint = indexOfTestPoint - 1
      } else {
        nextHigherTestPoint = indexOfTestPoint + 1
      }
      let testpointToGetData = array_inhomogeneity_setting[nextHigherTestPoint]

      for (let i = 0; i < array_inhomogeneity.length; i++) {
        if (array_inhomogeneity[i].setting == testpointToGetData) {
          inhomogeneity = array_inhomogeneity[i].value
        }
      }
    }

    let result = {
        "inhomogeneity": inhomogeneity,
        "instability": instability,
    }
    return result;
}

function calculateValues(){
    getValuesOfSelectedStandard();
    var numberOfTables = document.getElementById('measurementDataTables').childElementCount;
    var arrayOfComputedPerTable = {};
    getValuesOfSelectedStandard()
    for (let i = 1; i <= numberOfTables; i++) {
        var table = document.getElementById('table'+i);
        var inputs = table.getElementsByTagName('input');
        var selects = table.getElementsByTagName('select');

        var typeOfEquipment = selects['typeOfEquipmentTable'+i].value;
        var functionType = selects['functionTable'+i].value;
        let tableUnit = selects['functionTable'+i].value === 'Temp' ? 'Temperature' : selects['functionTable'+i].value === 'Rh' ? "Relative Humidity" : selects['functionTable'+i].value === 'TempOut' ? "Temperature" : selects['functionTable'+i].value === 'RhOut' ? "Relative Humidity" : 'ERROR';

        var channelName = inputs['channelNameTable'+i].value
        var brand = inputs['brandTable'+i].value
        var serialNumber = inputs['serialNumberTable'+i].value
        var modelName = inputs['modelTable'+i].value
        var custonDecimalPlace = inputs['custonDecimalPlaceTable'+i].value

        var numberOfRows = table.rows.length - 3;
        var objectKey = functionType+channelName;
        var objectOfComputedPerRow = {
            'typeOfEquipment':typeOfEquipment,
            "functionType":functionType,
            "channelName":channelName,
            "brand":brand,
            "serialNumber":serialNumber,
            "modelName":modelName,
            'custonDecimalPlace':custonDecimalPlace,
            "inputs":{},
            "caluculated":{},

        };


        var firstTestPoint = inputs['testPointTbodyTable'+i+'Row'+1].value;
        var firstStandardUsed = selects['standardUsedTbodyTable'+i+'Row'+1].value;

        var firstUUCAverage = inputs['UUCAverageTbodyTable'+i+'Row'+1].value;
        var firstStandardReadingAve = inputs['standardAverageTbodyTable'+i+'Row'+1].value;
        var firstCorrectionFromCertificate = correctionFromCertificate(firstTestPoint, firstStandardUsed, tableUnit);
        var firstCorrectedValue = parseFloat($('#correctedValueTbodyTable'+i+'Row'+1).val());

        var endTestPoint = inputs['testPointTbodyTable'+i+'Row'+numberOfRows].value;
        var endStandardUsed = selects['standardUsedTbodyTable'+i+'Row'+numberOfRows].value;
        var endUUCAverage = inputs['UUCAverageTbodyTable'+i+'Row'+numberOfRows].value;
        var endStandardReadingAve = inputs['standardAverageTbodyTable'+i+'Row'+numberOfRows].value;
        var endCorrectionFromCertificate = correctionFromCertificate(endTestPoint, endStandardUsed, tableUnit);
        var endCorrectedValue = parseFloat($('#correctedValueTbodyTable'+i+'Row'+numberOfRows).val());

        for (let x = 1; x <= numberOfRows; x++) {


            objectOfComputedPerRow["inputs"]['Row'+x] = {};
            objectOfComputedPerRow["caluculated"]['Row'+x] = {};

            var testPoint = inputs['testPointTbodyTable'+i+'Row'+x].value;
            var standardUsed = selects['standardUsedTbodyTable'+i+'Row'+x].value;

            let standardCoverageFactor = getStandardCoverageFactor(testPoint, functionType, standardUsed);

            var consideringCorrection = inputs['consideringCorrectionTbodyTable'+i+'Row'+x].value;
            var resolution = inputs['resolutionTbodyTable'+i+'Row'+x].value;
            var readablitiy = selects['readabilityTbodyTable'+i+'Row'+x].value;
            var uucTrial1 = inputs['UUCtrial1TbodyTable'+i+'Row'+x].value;
            var uucTrial2 = inputs['UUCtrial2TbodyTable'+i+'Row'+x].value;
            var uucTrial3 = inputs['UUCtrial3TbodyTable'+i+'Row'+x].value;
            var uucAverage = inputs['UUCAverageTbodyTable'+i+'Row'+x].value;
            var standardTrial1 = inputs['standardTrial1TbodyTable'+i+'Row'+x].value;
            var standardTrial2 = inputs['standardTrial2TbodyTable'+i+'Row'+x].value;
            var standardTrial3 = inputs['standardTrial3TbodyTable'+i+'Row'+x].value;
            var standardAverage = inputs['standardAverageTbodyTable'+i+'Row'+x].value;
            var standardResolution = inputs['standardResolutionTbodyTable'+i+'Row'+x].value;
            var chamberInhomogeneity = inputs['chamberInhomogeneityTbodyTable'+i+'Row'+x].value;
            var chamberInstability = inputs['chamberInstabilityTbodyTable'+i+'Row'+x].value;
            var range = inputs['rangeTbodyTable'+i+'Row'+x].value;
            var correctedValue = inputs['correctedValueTbodyTable'+i+'Row'+x].value;


            let array_uucTrial = [
                uucTrial1,
                uucTrial2,
                uucTrial3,
            ]
            let array_standardTrial = [
                standardTrial1,
                standardTrial2,
                standardTrial3,
            ]

            objectOfComputedPerRow["inputs"]['Row'+x]['testPoint'] = testPoint;
            objectOfComputedPerRow["inputs"]['Row'+x]['standardUsed'] = standardUsed;
            objectOfComputedPerRow["inputs"]['Row'+x]['consideringCorrection'] = consideringCorrection;
            objectOfComputedPerRow["inputs"]['Row'+x]['resolution'] = resolution;
            objectOfComputedPerRow["inputs"]['Row'+x]['readablitiy'] = readablitiy;
            objectOfComputedPerRow["inputs"]['Row'+x]['uucTrial1'] = uucTrial1;
            objectOfComputedPerRow["inputs"]['Row'+x]['uucTrial2'] = uucTrial2;
            objectOfComputedPerRow["inputs"]['Row'+x]['uucTrial3'] = uucTrial3;
            objectOfComputedPerRow["inputs"]['Row'+x]['uucAverage'] = uucAverage;
            objectOfComputedPerRow["inputs"]['Row'+x]['standardTrial1'] = standardTrial1;
            objectOfComputedPerRow["inputs"]['Row'+x]['standardTrial2'] = standardTrial2;
            objectOfComputedPerRow["inputs"]['Row'+x]['standardTrial3'] = standardTrial3;
            objectOfComputedPerRow["inputs"]['Row'+x]['standardAverage'] = standardAverage;
            objectOfComputedPerRow["inputs"]['Row'+x]['standardResolution'] = standardResolution;
            objectOfComputedPerRow["inputs"]['Row'+x]['chamberInhomogeneity'] = chamberInhomogeneity;
            objectOfComputedPerRow["inputs"]['Row'+x]['chamberInstability'] = chamberInstability;
            objectOfComputedPerRow["inputs"]['Row'+x]['range'] = range;
            objectOfComputedPerRow["inputs"]['Row'+x]['correctedValue'] = correctedValue;
            objectOfComputedPerRow["inputs"]['Row'+x]['array_uucTrial'] = array_uucTrial;
            objectOfComputedPerRow["inputs"]['Row'+x]['array_standardTrial'] = array_standardTrial;

            var isPRT = checkIfPRT(standardUsed);

            try{
                function sortedArrayForRow(){
                    var tempTemp = [];
                    var tempRh = [];
                    var sorted = {
                        "Temp":[],
                        "Rh":[],
                    }

                    for(sorted_x=0;sorted_x<standardValues.length;sorted_x++){
                        if (standardValues[sorted_x].standardID == standardUsed) {
                            if (standardValues[sorted_x].unit == "Temperature") {
                                tempTemp.push({
                                    TP:	standardValues[sorted_x].testPoint,
                                    drift : standardValues[sorted_x].drift
                                });
                            }
                            if (standardValues[sorted_x].unit == "Relative Humidity") {
                                tempRh.push({
                                    TP:	standardValues[sorted_x].testPoint,
                                    drift : standardValues[sorted_x].drift
                                });
                            }
                        }
                    };
                    sorted["Temp"] = tempTemp.sort(function(a, b){return a.TP - b.TP});
                    sorted["Rh"] = tempRh.sort(function(a, b){return a.TP - b.TP});
                    return sorted;
                }

                var sortedArray = function(){
                    if(functionType == "Temp"){
                        return sortedArrayForRow()['Temp'];
                    }else if(functionType == "Rh"){
                        return sortedArrayForRow()['Rh'];
                    }else if(functionType == "TempOut"){
                        return sortedArrayForRow()['Temp'];
                    }else if(functionType == "RhOut"){
                        return sortedArrayForRow()['Rh'];
                    }
                }

                function getDriftNextHigher(testPoint, array_drift){
                    let testPointNumber = Number(testPoint)

                    let drift = 0;
                    let driftChanged = false;

                    let array_testpoints = [];

                    array_drift.forEach(item=>{
                        array_testpoints.push(Number(item.TP))
                        if(item.TP == testPointNumber){
                            drift = item.drift
                            driftChanged = true;
                        }
                    })
                    if(!driftChanged){
                        array_testpoints.push(testPointNumber)
                        // array_testpoints.sort();
                        array_testpoints.sort(function(a, b){
                            return a - b;
                        });
                        let indexOfTestPoint = array_testpoints.indexOf(testPointNumber)
                        let nextHigherTestPoint;
                        if(indexOfTestPoint == array_testpoints.length-1){
                            nextHigherTestPoint = indexOfTestPoint - 1
                        }else{
                            nextHigherTestPoint = indexOfTestPoint + 1
                        }
                        let testpointToGetDrift = array_testpoints[nextHigherTestPoint]

                        array_drift.forEach(item=>{
                            // array_testpoints.push(Number(item.TP))
                            if(item.TP == testpointToGetDrift){
                                drift = item.drift
                            }
                        })

                    }

                    if(drift == ''){
                        array_drift = array_drift.filter(function(obj){
                            if(obj.drift == ''){
                                const index = array_testpoints.indexOf(Number(obj.TP));
                                if (index > -1){
                                    array_testpoints.splice(index, 1);
                                }
                            }
                            return obj.drift != '';
                        });



                        // array_testpoints.push(testPointNumber)
                        // array_testpoints.sort();

                        if(array_testpoints.indexOf(testPointNumber) == -1){
                            array_testpoints.push(testPointNumber)
                        }
                        array_testpoints.sort(function(a, b){
                            return a - b;
                        });
                        let indexOfTestPoint = array_testpoints.indexOf(testPointNumber)
                        let nextHigherTestPoint;
                        if(indexOfTestPoint == array_testpoints.length-1){
                            nextHigherTestPoint = indexOfTestPoint - 1
                        }else{
                            nextHigherTestPoint = indexOfTestPoint + 1
                        }
                        let testpointToGetDrift = array_testpoints[nextHigherTestPoint]

                        array_drift.forEach(item=>{
                            //array_testpoints.push(Number(item.TP))
                            if(item.TP == testpointToGetDrift){
                                drift = item.drift
                            }
                        })
                    }
                    return Number(drift);
                }

                function driftArrayForRow(){
                    var driftForReturn = {
                        "Temp":[],
                        "Rh":[],
                        "PRT":[],
                    };
                    if(!isPRT){
                        for(drift_x=0;drift_x<driftValues.length;drift_x++){
                            if (driftValues[drift_x].standardID == standardUsed) {
                                if (driftValues[drift_x].unit == 'Air Temperature') {
                                    driftForReturn['Temp'].push({
                                        dateCalibrated: driftValues[drift_x].dateCalibrated,
                                        dateValue: formulajs.DATEVALUE(driftValues[drift_x].dateCalibrated),
                                        testPoint:	driftValues[drift_x].testPoint,
                                        testValue:	driftValues[drift_x].testPointValue,
                                    });
                                }
                                if (driftValues[drift_x].unit == 'Relative Humidity') {
                                    driftForReturn['Rh'].push({
                                        dateCalibrated: driftValues[drift_x].dateCalibrated,
                                        dateValue: formulajs.DATEVALUE(driftValues[drift_x].dateCalibrated),
                                        testPoint:	driftValues[drift_x].testPoint,
                                        testValue:	driftValues[drift_x].testPointValue,
                                    });
                                }
                            }
                        };
                    }else{
                        for(driftPRT_x=0;driftPRT_x<prtDriftValues.length;driftPRT_x++){
                            if (prtDriftValues[driftPRT_x].standardID ==  standardUsed) {
                                driftForReturn['PRT'].push({
                                    testPoint: prtDriftValues[driftPRT_x].testPoint,
                                    previousTest: prtDriftValues[driftPRT_x].previousTest,
                                    currentTest:	prtDriftValues[driftPRT_x].currentTest,
                                    drift:	prtDriftValues[driftPRT_x].drift,
                                });
                            }
                        };
                    }
                    return driftForReturn;
                }

                var driftArrayFiltered = function(){
                    if (isPRT) {
                        return driftArrayForRow()['PRT'];
                    } else {
                        if(functionType == "Temp"){
                            return driftArrayForRow()['Temp'];
                        }else if(functionType == "Rh"){
                            return driftArrayForRow()['Rh'];
                        }
                    }
                }

                var uucSTDDev = standardDev({trial1:uucTrial1,trial2:uucTrial2,trial3:uucTrial3});
                var standardSTDDev = standardDev({trial1:standardTrial1,trial2:standardTrial2,trial3:standardTrial3}); ;
                var correctionFromCertCondition;
                correction = correctionFromCertificate(testPoint, standardUsed, tableUnit);
                correctionFromCertCondition = correctionFromCertificate(testPoint, standardUsed, tableUnit);


                var readoutStandardUncertaintyFromCertificate = readoutStandardUncertaintyFromCertificateGet(functionType,standardUsed,testPoint);
                var PRTStandardUncertaintyFromCertificate = PRTStandardUncertaintyFromCertificateGet(functionType,standardUsed,testPoint);
                var consideringCorrectionFull = calculatedValueConsideringCorrection(testPoint,correction);
                var correctedValueFull = correctedValueFunction({standardReadingAve:standardAverage, correctionFromCertificate:parseFloat(correctionFromCertCondition)});
                // var drift = slopeFormula(driftArrayFiltered(),testPoint,isPRT);
                // if (driftArrayFiltered().length <= 1 ){
                //     drift = 0;
                // }
                var drift = getDriftNextHigher(testPoint, sortedArray())

                var UncUUCResolution = UncUUCResolutionFunction(i,x);
                var UncUUCRepeatability = UncUUCRepeatabilityFunction(uucSTDDev);
                var UncStandardRepeatability = UncStandardRepeatabilityFunction(standardSTDDev);
                var UncStandardReadout = UncStandardReadoutFunction(parseFloat(readoutStandardUncertaintyFromCertificate), standardCoverageFactor);
                var UncStandardPRT = UncStandardPRTFunction(parseFloat(PRTStandardUncertaintyFromCertificate), standardCoverageFactor);
                var UncDrift = UncDriftFunction(drift);
                var UncSTDResolution = UncSTDResolutionFunction(standardResolution);
                var UncChamberUniformity = UncChamberUniformityFunction(chamberInhomogeneity);
                var UncChamberInstability = UncChamberInstabilityFunction(chamberInstability);

                var hysteresis = hysteresisFunction({
                    uucReadingAve1:firstUUCAverage,
                    uucReadingAve2:endUUCAverage,
                    correctedValue1:firstCorrectedValue,
                    correctedValue2:endCorrectedValue
                });
                var combinedUncertainty = combinedUncertaintyFunction({
                    i:UncUUCResolution,
                    o:UncUUCRepeatability,
                    z:UncStandardReadout,
                    ac:UncDrift,
                    //ae:UncSTDResolution,
                    ag:UncChamberUniformity,
                    ah:hysteresis,
                    aa:UncStandardPRT,
                    w:UncStandardRepeatability,
                    ai:	UncChamberInstability,
                });
                var DOF = DOFFunction({
                    i:UncUUCResolution,
                    o:UncUUCRepeatability,
                    z:UncStandardReadout,
                    ac:UncDrift,
                    //ae:UncSTDResolution,
                    ag:UncChamberUniformity,
                    ah:hysteresis,
                    aa:UncStandardPRT,
                    w:UncStandardRepeatability,
                    aj:combinedUncertainty,
                    ai:	UncChamberInstability,
                    uucTrialCount: array_uucTrial.length,
                    stdTrialCount: array_standardTrial.length,
                });
                var k = calculateKFunction(parseFloat(DOF));
                var expandedUncertainty = expandedUncertaintyFunction(combinedUncertainty,k);

                objectOfComputedPerRow["caluculated"]['Row'+x]['isPRT'] = isPRT;
                objectOfComputedPerRow["caluculated"]['Row'+x]['uucSTDDev'] = uucSTDDev;
                objectOfComputedPerRow["caluculated"]['Row'+x]['standardSTDDev'] = standardSTDDev;
                objectOfComputedPerRow["caluculated"]['Row'+x]['correctionFromCertCondition'] = correctionFromCertCondition;
                objectOfComputedPerRow["caluculated"]['Row'+x]['readoutStandardUncertaintyFromCertificate'] = readoutStandardUncertaintyFromCertificate;
                objectOfComputedPerRow["caluculated"]['Row'+x]['PRTStandardUncertaintyFromCertificate'] = PRTStandardUncertaintyFromCertificate;
                objectOfComputedPerRow["caluculated"]['Row'+x]['consideringCorrectionFull'] = consideringCorrectionFull;
                objectOfComputedPerRow["caluculated"]['Row'+x]['correctedValueFull'] = correctedValueFull;
                objectOfComputedPerRow["caluculated"]['Row'+x]['drift'] = drift;
                objectOfComputedPerRow["caluculated"]['Row'+x]['UncUUCResolution'] = UncUUCResolution;
                objectOfComputedPerRow["caluculated"]['Row'+x]['UncUUCRepeatability'] = UncUUCRepeatability;
                objectOfComputedPerRow["caluculated"]['Row'+x]['UncStandardRepeatability'] = UncStandardRepeatability;
                objectOfComputedPerRow["caluculated"]['Row'+x]['UncStandardReadout'] = UncStandardReadout;
                objectOfComputedPerRow["caluculated"]['Row'+x]['UncStandardPRT'] = UncStandardPRT;
                objectOfComputedPerRow["caluculated"]['Row'+x]['UncDrift'] = UncDrift;
                objectOfComputedPerRow["caluculated"]['Row'+x]['UncSTDResolution'] = UncSTDResolution;
                objectOfComputedPerRow["caluculated"]['Row'+x]['UncChamberUniformity'] = UncChamberUniformity;
                objectOfComputedPerRow["caluculated"]['Row'+x]['UncChamberInstability'] = UncChamberInstability;
                objectOfComputedPerRow["caluculated"]['Row'+x]['hysteresis'] = hysteresis;
                objectOfComputedPerRow["caluculated"]['Row'+x]['combinedUncertainty'] = combinedUncertainty;
                objectOfComputedPerRow["caluculated"]['Row'+x]['DOF'] = DOF;
                objectOfComputedPerRow["caluculated"]['Row'+x]['k'] = k;
                objectOfComputedPerRow["caluculated"]['Row'+x]['expandedUncertainty'] = expandedUncertainty;
            }catch(e){
                console.log(e);
            }
        }
            arrayOfComputedPerTable[objectKey] = objectOfComputedPerRow;
    }
    document.getElementById('calculatedData').value = JSON.stringify(arrayOfComputedPerTable);
    document.getElementById('measurementDatas').value = JSON.stringify(arrayOfComputedPerTable);

    addToUncertaintyBudgetTable()
}
function addToUncertaintyBudgetTable(){
    let datas = JSON.parse($('#calculatedData').val());
    let modatTableTbody = document.getElementById('uncertBudgetTBody');
    modatTableTbody.innerHTML = "";
    Object.keys(datas).forEach(keys=>{
        Object.keys(datas[keys]['caluculated']).forEach(rows=>{
            let modalTestpoint = parseFloat(datas[keys]['inputs'][rows]['testPoint']).toFixed(5)
            let uncStandard = parseFloat(datas[keys]['caluculated'][rows]['UncStandardPRT']).toFixed(5)
            let uncStdRepeatability = parseFloat(datas[keys]['caluculated'][rows]['UncStandardRepeatability']).toFixed(5)
            let uncStdDrift = parseFloat(datas[keys]['caluculated'][rows]['UncDrift']).toFixed(5)
            let uncStdResolution = parseFloat(datas[keys]['caluculated'][rows]['UncSTDResolution']).toFixed(5)
            let uncUucResokution = parseFloat(datas[keys]['caluculated'][rows]['UncUUCResolution']).toFixed(5)
            let uncUucRepeatability = parseFloat(datas[keys]['caluculated'][rows]['UncUUCRepeatability']).toFixed(5)
            let hysterisis = parseFloat(datas[keys]['caluculated'][rows]['hysteresis']).toFixed(5)
            let uncChamberInhomo = parseFloat(datas[keys]['caluculated'][rows]['UncChamberUniformity']).toFixed(5)
            let uncChamberInstability = parseFloat(datas[keys]['caluculated'][rows]['UncChamberInstability']).toFixed(5)
            let combinedUnc = parseFloat(datas[keys]['caluculated'][rows]['combinedUncertainty']).toFixed(5)
            let coverageFactor = parseFloat(datas[keys]['caluculated'][rows]['k']).toFixed(5)
            let ExpandedUnc = parseFloat(datas[keys]['caluculated'][rows]['expandedUncertainty']).toFixed(5)
            let unit = datas[keys]['functionType']=='Temp'||datas[keys]['functionType']=='TempOut'?'°C':'%RH'

            let tr = document.createElement('tr');
            let td1 = document.createElement('td');
            let td2 = document.createElement('td');
            let td3 = document.createElement('td');
            let td4 = document.createElement('td');
            let td5 = document.createElement('td');
            let td6 = document.createElement('td');
            let td7 = document.createElement('td');
            let td8 = document.createElement('td');
            let td9 = document.createElement('td');
            let td10 = document.createElement('td');
            let td11 = document.createElement('td');
            let td12 = document.createElement('td');
            let td13 = document.createElement('td');
            let td14 = document.createElement('td');
            td1.innerHTML = modalTestpoint;
            td2.innerHTML = uncStandard;
            td3.innerHTML = uncStdRepeatability;
            td4.innerHTML = uncStdDrift;
            //td5.innerHTML = uncStdResolution;
            td6.innerHTML = uncUucResokution;
            td7.innerHTML = uncUucRepeatability;
            td8.innerHTML = hysterisis;
            td9.innerHTML = uncChamberInhomo;
            td10.innerHTML = uncChamberInstability;
            td11.innerHTML = combinedUnc;
            td12.innerHTML = coverageFactor;
            td13.innerHTML = ExpandedUnc;
            td14.innerHTML = unit;

            tr.append(td1)
            tr.append(td2)
            tr.append(td3)
            tr.append(td4)
            //tr.append(td5)
            tr.append(td6)
            tr.append(td7)
            tr.append(td8)
            tr.append(td9)
            tr.append(td10)
            tr.append(td11)
            tr.append(td12)
            tr.append(td13)
            tr.append(td14)
            modatTableTbody.append(tr);

        })

    })
}

function usePreviousDataAddRows(){
    let tbody = $('#previousDataModalTableTbody');
    $.ajax({
        cache: false,
        type: "post",
        url: "/thermohygrometer/get_data_for_previous_table",
        success: function(result) {
            tbody.html('');
            let previousData = result.previousData;
            previousData.forEach(items => {
                let tr = $('<tr>');
                let tdId = $('<td>').html(items.id).addClass('d-none');
                let tdcertNum = $('<td>').html(items.certificateNumber);
                let tdButton = $('<td>').append(
                    $('<button>').attr('type', 'button').addClass('btn btn-success').attr('data-bs-dismiss', 'modal').html('Use').on('click', function(){
                        usePreviousDataAddData(items.id)
                    })
                )
                tr.append(tdId, tdcertNum, tdButton)
                tbody.append(tr)
            })
            $('#previousDataModalTable').DataTable({
                "order": [[ 0, "desc" ]]
            });
        },
        error: function (error) {
            console.log(error);
        },
    })
}
function usePreviousDataAddData(id){
    let idOfCertificate = id;
    $.ajax({
        cache: false,
        type: "post",
        url: "/thermohygrometer/get_data_by_id",
        data: {
            'idOfCertificate' : idOfCertificate,
        },
        success: function(result) {

            $('#calculatedData').val(result.worksheetData['calculatedData']);

            if(result.worksheetData['standard'] != null){
                updateProcessStandard(result.worksheetData['standard'], result.worksheetData['chamber']);
            }

            let dataInputs = JSON.parse(result.worksheetData['dataInputs'])

            let count = 0;
            for (let key in dataInputs) {
                if (key.startsWith('function')) {
                    count++;
                }
            }

            for (let index = 1; index <= count; index++) {
                addNewTables();
                let rowCount = 0;
                for (let key in dataInputs) {
                    if (key.startsWith('testPointTbodyTable'+index)) {
                        rowCount++;
                    }
                }
                $('#functionTable'+index).val(dataInputs['functionTable'+index]);
                for (let x = 1; x <= rowCount; x++) {
                    $('#buttonAddTable'+index).click();
                }

            }



            let infoArray = ['customerInfo', 'equipmentInfo', 'environmentInfo', 'dataInputs'];
            let blacklistID = ['certificateNumber', 'customer', 'address', 'tsrNumber']
            for (let i = 0; i < infoArray.length; i++) {
                let infoValues = JSON.parse(result.worksheetData[infoArray[i]]);
                let keys = Object.keys(infoValues);
                for (let x = 0; x < keys.length; x++) {
                    let id = keys[x];
                    if(blacklistID.includes(id)){
                        continue;
                    }else(
                        $('#'+id).val(infoValues[id])
                    )



                }
            }


        },
        error: function (error) {
            console.log(error);
        },
    })
}

function saveData(){
    let certificateNumber = $('#certificateNumber').val();
    let standard = selectedStandard;
    let chamber = selectedChamber;
    let calculatedData = $('#calculatedData').val();

    let completion = $('#completion').val();
    let calibratorAccountEmail = $('#calibratorAccountEmail').val();;
    let calibratorAccountID = $('#calibratorAccountID').val();
    let verifierEmail = $('#verifierEmail').val();
    let calibratedBy = $('#calibratedBy').val();;
    let checkedBy = $('#checkedBy').val();
    let verifierPosition = $('#verifierPosition').val();

    let customer_information = $('input[data-group="customer_information"], select[data-group="customer_information"]');
    let equipment_information = $('input[data-group="equipment_information"], select[data-group="equipment_information"]');
    let environmental_information = $('input[data-group="environmental_information"], select[data-group="environmental_information"]');
    let raw_data = $('input[data-group="raw_data"], select[data-group="raw_data"]');

    let customerValues = {};
    let equipmentValues = {};
    let environmentalValues = {};
    let rawValues = {};

    customer_information.each(function() {
        let key = $(this).attr('id');
        let value = $(this).val();
        customerValues[key] = value;
    });
    var customerInfo = JSON.stringify(customerValues);

    equipment_information.each(function() {
        let key = $(this).attr('id');
        let value = $(this).val();
        equipmentValues[key] = value;
    });
    var equipmentInfo = JSON.stringify(equipmentValues);

    environmental_information.each(function() {
        let key = $(this).attr('id');
        let value = $(this).val();
        environmentalValues[key] = value;
    });
    var environmentInfo = JSON.stringify(environmentalValues);

    raw_data.each(function() {
        let key = $(this).attr('id');
        let value = $(this).val();
        rawValues[key] = value;
        if($(this).prop('checked') == true){
            rawValues[key] = 'checked';
        }
    });
    var dataInputs = JSON.stringify(rawValues);

    $.ajax({
        cache: false,
        type: "post",
        url: "/thermohygrometer/add_New_Worksheet_Data",
        data: {
            'calibrationCertificate' : certificateNumber,
            'standard' : standard,
            'standardAndAccessories': selectedStandard_serialNumber,
            'chamber' : chamber,
            'selectedChamber': selectedChamber_serialNumber,
            'customerInfo' : customerInfo,
            'equipmentInfo' : equipmentInfo,
            'environmentInfo' : environmentInfo,
            'dataInputs' : dataInputs,
            'calculatedData' : calculatedData,
            'completion' : completion,
            'calibrationOfficer' : calibratedBy,
            'checkedBy' : checkedBy,
            'verifierPosition' : verifierPosition,
            'calibratorAccountEmail' : calibratorAccountEmail,
            'calibratorAccountID' : calibratorAccountID,
            'verifierEmail' : verifierEmail,
        },
        success: function(result) {
            console.log(result);
            $('#idOfCertificate').val(JSON.parse(result).id);
            saveDataUsingForm();
            window.location.href = "/thermohygrometer/worksheet/"+JSON.parse(result).id;


        },
        error: function (error) {
            console.log(error);
        },
    })

}
function updateData(){
    let idOfCertificate = $('#idOfCertificate').val();

    let certificateNumber = $('#certificateNumber').val();
    let standard = selectedStandard;
    let chamber = selectedChamber;
    let calculatedData = $('#calculatedData').val();



    let completion = $('#completion').val();
    let calibratorAccountEmail = $('#calibratorAccountEmail').val();;
    let calibratorAccountID = $('#calibratorAccountID').val();
    let verifierEmail = $('#verifierEmail').val();
    let calibratedBy = $('#calibratedBy').val();;
    let checkedBy = $('#checkedBy').val();
    let verifierPosition = $('#verifierPosition').val();

    let customer_information = $('input[data-group="customer_information"], select[data-group="customer_information"]');
    let equipment_information = $('input[data-group="equipment_information"], select[data-group="equipment_information"]');
    let environmental_information = $('input[data-group="environmental_information"], select[data-group="environmental_information"]');
    let raw_data = $('input[data-group="raw_data"], select[data-group="raw_data"]');

    let customerValues = {};
    let equipmentValues = {};
    let environmentalValues = {};
    let rawValues = {};

    customer_information.each(function() {
        let key = $(this).attr('id');
        let value = $(this).val();
        customerValues[key] = value;
    });
    var customerInfo = JSON.stringify(customerValues);

    equipment_information.each(function() {
        let key = $(this).attr('id');
        let value = $(this).val();
        equipmentValues[key] = value;
    });
    var equipmentInfo = JSON.stringify(equipmentValues);

    environmental_information.each(function() {
        let key = $(this).attr('id');
        let value = $(this).val();
        environmentalValues[key] = value;
    });
    var environmentInfo = JSON.stringify(environmentalValues);

    raw_data.each(function() {
        let key = $(this).attr('id');
        let value = $(this).val();
        rawValues[key] = value;
        if($(this).prop('checked') == true){
            rawValues[key] = 'checked';
        }
    });
    var dataInputs = JSON.stringify(rawValues);

    $.ajax({
        cache: false,
        type: "post",
        url: "/thermohygrometer/update_Worksheet_Data",
        data: {
            'idOfCertificate' : idOfCertificate,
            'calibrationCertificate' : certificateNumber,
            'standard' : standard,
            'standardAndAccessories': selectedStandard_serialNumber,
            'chamber' : chamber,
            'selectedChamber': selectedChamber_serialNumber,
            'customerInfo' : customerInfo,
            'equipmentInfo' : equipmentInfo,
            'environmentInfo' : environmentInfo,
            'dataInputs' : dataInputs,
            'calculatedData' : calculatedData,
            'completion' : completion,
            'calibrationOfficer' : calibratedBy,
            'checkedBy' : checkedBy,
            'verifierPosition' : verifierPosition,
            'calibratorAccountEmail' : calibratorAccountEmail,
            'calibratorAccountID' : calibratorAccountID,
            'verifierEmail' : verifierEmail,
        },
        success: function(result) {
            console.log(result);
            $('#idOfCertificate').val(JSON.parse(result).id)
            saveDataUsingForm()
            var toastElement = document.getElementById('toastSaved');//select id of toast
            var toast = new bootstrap.Toast(toastElement);//inizialize it
            toast.show();//show it
        },
        error: function (error) {
            console.log(error);
        },
    })

}
function saveDataUsingForm(){
    let formElement = $("#thermoHygroForm");
    var formData = formElement.serialize();
    $.ajax({
        cache: false,
        async: false,
        type: "POST",
        url: "/thermoUpdateData",
        data: formData,
        success: function(response) {
            console.log("Form submitted successfully:");
        },
        error: function(error) {
            console.error("Error submitting form:", error);
        }
    });

}
function updateProcessStandard(standardPicked, chamberPicked){
    let selectedStandard = standardPicked.split("(SPLITHERE)")
    let selectedChamber = chamberPicked != null ? chamberPicked.split("(SPLITHERE)"): "";
    
    $('input[type="checkbox"][id*="modalStandard"]').each(function(){
        let currentCheckboxValue = $(this).val();
        if(selectedStandard.includes(currentCheckboxValue)){
            $(this).prop('checked', true);
        }

    })
    $('input[type="checkbox"][id*="chamber"]').each(function(){
        let currentCheckboxValue = $(this).val();
        if(selectedChamber.includes(currentCheckboxValue)){
            $(this).prop('checked', true);
        }

    })
    processModalStandardCheckbox();
    processModalChamberCheckbox()
}
function personnelFromDatabase(officer_ID, verifier_ID, position_ID, officer_db, verifier_db, position_db){
    $('#'+officer_ID).val(officer_db);
    $('#'+verifier_ID).val(verifier_db);
    $('#'+position_ID).val(position_db);
}

function uploadFiles(){
    let files = $('#fileInput')[0].files;
    let idOfCertificate = $('#idOfCertificate').val();
    let formData = new FormData();

    for (let i = 0; i < files.length; i++) {
        formData.append('imageFiles[]', files[i]);
    }

    $.ajax({
        url: '/thermohygrometer/imageUpdate/' + idOfCertificate,
        type: 'POST',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(response) {
            console.log('Files uploaded successfully:', response);

        },
        error: function(error) {
            console.error('Error uploading files:', error);
        }
    });
}

$( window ).on( "load", function() {
    if ($('#idOfCertificate').val() != ''){
        let idCert = $('#idOfCertificate').val();
        $.ajax({
            cache: false,
            type: "post",
            url: "/thermohygrometer/get_data_by_id",
            data: {
                'idOfCertificate' : $('#idOfCertificate').val(),
            },
            success: function(result) {
                //userCheck(result.userData.id, result.worksheetData.calibratorAccountID, result.userData.email, result.worksheetData.calibratorAccountEmail, result.worksheetData.completion)
                $('#saveButton').html('Update')
                $('#saveButton').on("click", function(){updateData()});

                if(result.worksheetData['standard'] != null){
                    updateProcessStandard(result.worksheetData['standard'], result.worksheetData['chamber']);
                }

                let calculatedDataRAW = result.worksheetData['calculatedData'];
                let calculatedData = calculatedDataRAW != "" ? JSON.parse(calculatedDataRAW) : {};
                $('#calculatedData').val(JSON.stringify(calculatedData));


                let dataInputs = JSON.parse(result.worksheetData['dataInputs'])

                let count = 0;
                for (let key in dataInputs) {
                    if (key.startsWith('function')) {
                        count++;
                    }
                }

                for (let index = 1; index <= count; index++) {
                    addNewTables();
                    let rowCount = 0;
                    for (let key in dataInputs) {
                        if (key.startsWith('testPointTbodyTable'+index)) {
                            rowCount++;
                        }
                    }
                    $('#functionTable'+index).val(dataInputs['functionTable'+index]);

                    if('typeOfEquipmentTable'+index in dataInputs){
                        $('#typeOfEquipmentTable'+index).val(dataInputs['typeOfEquipmentTable'+index]);
                    }

                    for (let x = 1; x <= rowCount; x++) {
                        $('#buttonAddTable'+index).click();
                    }

                }



                let infoArray = ['customerInfo', 'equipmentInfo', 'environmentInfo', 'dataInputs'];
                for (let i = 0; i < infoArray.length; i++) {
                    let infoValues = JSON.parse(result.worksheetData[infoArray[i]]);
                    let keys = Object.keys(infoValues);
                    for (let x = 0; x < keys.length; x++) {
                        let id = keys[x];
                        $('#'+id).val(infoValues[id])
                    }
                }

                personnelFromDatabase('calibratedBy', 'checkedBy', 'verifierPosition', result.worksheetData['calibrationOfficer'], result.worksheetData['checkedBy'], result.worksheetData['verifierPosition'])
                $('#status').val(result.worksheetData['completion'])

                addToUncertaintyBudgetTable()

            },
            error: function (error) {
                console.log(error);
            },
        }).then(function(){
            if($('#status').val() == 'For Verification'){
                makeReadOnly()
                userGetComments()
            }
            if($('#status').val() == 'For Correction'){
                userGetComments()
                $('#submitButton').html('Resubmit')
            }
            if($('#status').val() == 'For printing'){
                $('#certificatePDF').removeAttr('disabled')
                $('#certificatePDFDraft').attr('disabled','')
                verifiedReadOnly()
            }

        })
    }else{
        $('#saveButton').html('Save');
        $('#saveButton').on("click", function(){saveData()});
        $('#worksheetPDF').attr('disabled', '');
        $('#certificatePDF').attr('disabled', '');
        $('#certificatePDFDraft').attr('disabled', '');
        $('#certificatePDFDownload').attr('disabled', '');
        $('#editRemarks').attr('disabled', '');
        $('#submitButton').attr('disabled', '');
    }
});


