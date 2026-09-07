$( document ).ready(function() {
    addPersonnel();
    addStandardTable();
    addCustomerList();
    addDiagram()
});

var tableNumber = 1;
var standardReadingByRow;
var standardReadingByChannel;
var selectedStandard = '';

bind('checkedBy','change',function(){
    copyFromDataset('checkedBy', 'verifierPosition', 'verifierposition')
    getEmailOfVerifier('checkedBy');
});
bind('addTable','click',function(){
    addNewTable()
});
bind('deleteTable','click',function(){
    removeTable()
});
bind('calculateButton','click',function(){
    calculateWithErrorHandling()
});
// bind('calibrationProcedure','change',function(){
//     // calculate()
//     $("#calculateButton").off('click')

//     let procedure = $(this).val();
//     if(procedure == 1){
//         bind('calculateButton','click',function(){
//             calculate()
//         });
//     }else if(procedure == 2){
//         bind('calculateButton','click',function(){
//             //calculateWaterbath()
//             calculate();
//         });
//     }

// });

bind('calibrationProcedure','change',function(){
    setCenterChannel()
});
bind('modalStandardSelect','click',function(){
    selectStandard()
});
bind('dateCalibrated','change',function(){
    setDate();
});
bind('recommendedDueDateSelect','change',function(){
    setDate();
});

bind('diagramOtherFile', 'change', function(){
    get_diagram(this, 'diagramPreview', 'diagram_certificate')
})


function bind(id, evt, func){
    var el = document.getElementById(id);
    if (el.addEventListener){
        el.addEventListener(evt, func);
    } else if (el.attachEvent) {
        el.attachEvent('on' + evt, func);
    }
}

function getEmailOfVerifier(copyFrom){
    var from = document.getElementById(copyFrom);
    var verifierEmail = document.getElementById('verifierEmail');
    verifierEmail.value = from.selectedOptions[0].dataset['email'];
}
function copyFromDataset(copyFrom, copyTo, datasetName){
    var from = document.getElementById(copyFrom);
    var to = document.getElementById(copyTo);
    to.value = from.selectedOptions[0].dataset[datasetName];
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

function personnelFromDatabase(officer_ID, verifier_ID, position_ID, officer_db, verifier_db, position_db){
    $('#'+officer_ID).val(officer_db);
    $('#'+verifier_ID).val(verifier_db);
    $('#'+position_ID).val(position_db);
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

function setDate(){
    let d = new Date(document.getElementById("dateCalibrated").value)
    let mon = +document.getElementById("recommendedDueDateSelect").value;
    if(mon == '0'){
        document.getElementById("recommendedDueDate").valueAsDate = null;
    }else{
        d.setMonth(d.getMonth() + mon)
        document.getElementById("recommendedDueDate").valueAsDate = d;
    }
}

function addNewTable(){
    var rowNumber = 1;
    var thisTableNumber = tableNumber;

    let tableDiv = $('#divForTables');
    let table = $('<table>').attr('id', 'table' + tableNumber).attr('class', 'table table-bordered');
    let thead = $('<thead>');
    let tbody = $('<tbody>');

    let theadTRButtons = $('<tr>');
    let theadTDButtons = $('<td>').attr('colspan', 3);
    var divButtons = $('<div>').addClass('col-8 d-lg-flex justify-content-lg-start align-items-lg-center');
    var addButtonGroup = $('<div>').addClass('btn-group').attr('role', 'group');
    var addRowButton = $('<button>').addClass('btn btn-success').attr('type', 'button').text('Add Row').attr('id', 'newRowTable' + tableNumber).click(function(){
      var newRow = addRowToMeasurementTable(thisTableNumber, rowNumber);
      tbody.append(newRow);
      rowNumber++;
      //addChannelsToPosition(thisTableNumber, rowNumber);
    });
    var deleteRowButton = $('<button>').addClass('btn btn-success').attr('type', 'button').text('Delete Row').click(function() {
      tbody.find('tr:last').remove();
      if (rowNumber > 1) {
        rowNumber--;
      }
    });
    
    addButtonGroup.append(addRowButton, deleteRowButton);
    divButtons.append(addButtonGroup);

    let fileDiv = $('<div>').addClass('row');
    let fileDiv2 = $('<div>').addClass('col input-group align-items-lg-center');
    let fileInput = $('<input>').addClass('form-control').attr('type', 'file').attr('id', 'csvFileInput' + tableNumber).attr('accept', '.csv');
    // let fileButton = $('<button>').addClass('btn btn-success').attr('type', 'button').attr('id', 'convertButton' + tableNumber).html('Upload').click(function(){
    //     getDataFromCSV()
    // });

    fileDiv.append(fileDiv2.append(fileInput), divButtons);
    theadTRButtons.append(theadTDButtons.append(fileDiv));

    let theadTR0 = $('<tr>');
    let standardSelectTd  =  $('<td>');
    let standardSelectDiv = $('<div>').addClass('');
    let standardSelectLabel = $('<label>').text('Standard Used:');
    let standardSelectInput = $('<select>').attr('id', 'usedStandard' + tableNumber).attr('data-tablenumber', tableNumber).attr('data-group', 'raw_data').addClass('form-control').on('change', function(){
        if($(this).val() != ""){
            let selectedStandard = $(this).val()
            let standard_json;

            standard.forEach((items, index)=>{
                if(items['serialNumber'] == selectedStandard){
                    standard_json = JSON.parse(items['measurements']);
                }
            })

            let tablenumber = $(this).data('tablenumber')
            let select_input = $('#referenceChannelUsed'+tablenumber)

            let numberOfChannels = standard_json.length;

            for (let i = 0; i < numberOfChannels; i++) {
                const channel = standard_json[i];
                let channelName = channel[0].channelName;
                $(select_input).append($('<option>', {
                    'value':channelName,
                    'html':channelName,
                }))
                
            }
        }
       
    });
    let optionStandard = $('<option>').attr('value', '').text('Select . . .');
    let standardResolutionTd =  $('<td>');
    let standardResolutionDiv = $('<div>').addClass('');
    let standardResolutionLabel = $('<label>').text('Standard Resolution:');
    let standardResolutionInput = $('<input>').attr('id', 'standardResolution' + tableNumber).attr('data-group', 'raw_data').attr('type', 'text').addClass('form-control');

    
    theadTR0.append(
        standardSelectTd.append(
            standardSelectDiv.append(standardSelectLabel, standardSelectInput.append(optionStandard))
        ),
        standardResolutionTd.append(
            standardResolutionDiv.append(standardResolutionLabel, standardResolutionInput)
        ),
    );


    let theadTR1 = $('<tr>');
    let tempSettingsTd  =  $('<td>');
    let tempSettingsDiv = $('<div>').addClass('');
    let tempSettingsLabel = $('<label>').text('Temperature Setting (°C):');
    let tempSettingsInput = $('<input>').attr('id', 'tempSetting' + tableNumber).attr('data-group', 'raw_data').attr('type', 'text').addClass('form-control');

    let tempSettingsDisplayTd  =  $('<td>');
    let tempSettingsDisplayDiv = $('<div>').addClass('');
    let tempSettingsDisplayLabel = $('<label>').text('Temperature Setting to be Displayed:');
    let tempSettingsDisplayInput = $('<input>').attr('id', 'tempSettingDisplay' + tableNumber).attr('data-group', 'raw_data').attr('type', 'text').addClass('form-control');

    let resolutionTd =  $('<td>');
    let resolutionDiv = $('<div>').addClass('');
    let resolutionLabel = $('<label>').text('UUC Resolution / Graduation:');
    let resolutionInput = $('<input>').attr('id', 'resolution' + tableNumber).attr('data-group', 'raw_data').attr('type', 'text').addClass('form-control');

    let theadTR2 = $('<tr>');
    let loadingEffectTd  =  $('<td>');
    let loadingEffectDiv = $('<div>').addClass('');
    // let testpointLabel = $('<label>').text('Test Point (oC):');
    // let testpointInput = $('<input>').attr('id', 'testPoint' + tableNumber).attr('data-group', 'raw_data').attr('type', 'text').addClass('form-control');

    let loadingEffectLabel = $('<label>').text('Loading Effect');
    let loadingEffectInput = $('<input>').attr('id', 'loadingEffect' + tableNumber).attr('data-group', 'raw_data').attr('type', 'text').addClass('form-control').attr('list', 'loadingEffectLIST');

    let readabilityTd =  $('<td>');
    let readabilityDiv = $('<div>').addClass('');
    let readabilityLabel = $('<label>').text('Readability:');
    let readabilityInput = $('<input>').attr('id', 'readability' + tableNumber).attr('data-group', 'raw_data').attr('type', 'text').addClass('form-control');

    let referenceStandardSelectTd  =  $('<td>');
    let referenceStandardSelectDiv = $('<div>').addClass('');
    let referenceStandardSelectLabel = $('<label>').text('Reference Channel / Serial Number:');
    let referenceStandardSelectInput = $('<select>').attr('id', 'referenceChannelUsed' + tableNumber).attr('data-group', 'raw_data').addClass('form-control')
    let referenceOptionStandard = $('<option>').attr('value', '').text('Select . . .');

    thead.append(
        theadTRButtons,
        theadTR0,
        theadTR1.append(
            tempSettingsTd.append(
                tempSettingsDiv.append(tempSettingsLabel, tempSettingsInput)
            ),
            tempSettingsDisplayTd.append(
                tempSettingsDisplayDiv.append(tempSettingsDisplayLabel, tempSettingsDisplayInput)
            ),
            resolutionTd.append(
                resolutionDiv.append(resolutionLabel, resolutionInput)
            )
        ),
        theadTR2.append(
            loadingEffectTd.append(
                loadingEffectDiv.append(loadingEffectLabel, loadingEffectInput)
            ),
            readabilityTd.append(
                readabilityDiv.append(readabilityLabel, readabilityInput)
            ),
            referenceStandardSelectTd.append(
                referenceStandardSelectDiv.append(referenceStandardSelectLabel, referenceStandardSelectInput.append(referenceOptionStandard))
            ),
        )
    );
    

    let tbodyTR1 = $('<tr>');
    let tbodyHeaderTime = $('<td>').html('Trial');
    let tbodyHeaderLoading = $('<td>').html('Channel / Serial Number ');
    let tbodyHeaderUUCIndicator = $('<td>').html('UUC Indicator  Reading, ___');
    tbodyTR1.append(tbodyHeaderTime, tbodyHeaderLoading, tbodyHeaderUUCIndicator)

   
    thead.append(tbodyTR1)
    

    table.append(thead, tbody);
    tableDiv.append(table);
    tableNumber++;
    addStandardToTable()
}

function addRowToMeasurementTable(tableNumber, rowNumber){
    let tr = $('<tr>');
    let ids = [
        'position', 
        'standardPerPosition',
        'uucIndication', 
    ];

    
    for (let i = 0; i < ids.length; i++) {
        let td = $('<td>');
        // let input = $('<input>').attr('type', 'text').attr('class', 'form-control').attr('data-group', 'raw_data').attr('id', ids[i] + 'TABLE' + tableNumber + 'ROW' + rowNumber);
        let input;
        // if (ids[i] === 'position') {
        //     input.val(rowNumber);
        // }
        // if(i === 1){
        //     input.attr('list', 'loadingEffectLIST')
        // }

        switch (i) {
            case 0:
                input = $('<input>').attr('type', 'text').attr('class', 'form-control').attr('data-group', 'raw_data').attr('id', ids[i] + 'TABLE' + tableNumber + 'ROW' + rowNumber);
                $(input).val(rowNumber);
                break;
            case 1:
                let selectedStandard = $('#usedStandard'+tableNumber).val()
                let standard_json;

                standard.forEach((items, index)=>{
                    if(items['serialNumber'] == selectedStandard){
                        standard_json = JSON.parse(items['measurements']);
                    }
                })

                input = $('<select>', {
                    "class" : "form-select",
                    "data-group": "raw_data",
                    "id" : ids[i] + 'TABLE' + tableNumber + 'ROW' + rowNumber,
                    "html" : $('<option>', {
                        "html" : "Select . . .",
                    }),
                })

                let numberOfChannels = standard_json.length;
    
                for (let i = 0; i < numberOfChannels; i++) {
                    const channel = standard_json[i];
                    let channelName = channel[0].channelName;
                    $(input).append($('<option>', {
                        'value':channelName,
                        'html':channelName,
                    }))
                    
                }

                break;
            case 2:
                input = $('<input>').attr('type', 'text').attr('class', 'form-control').attr('data-group', 'raw_data').attr('id', ids[i] + 'TABLE' + tableNumber + 'ROW' + rowNumber);
                break;
            default:
                input = $('<input>').attr('type', 'text').attr('class', 'form-control').attr('data-group', 'raw_data').attr('id', ids[i] + 'TABLE' + tableNumber + 'ROW' + rowNumber);
        }

        td.append(input);
        tr.append(td);
    }
    return tr;
}

function addDiagram(){
    let image_paths = [
        '/image/Autoclave sensor 2.png',
        '/image/enclosureIncubator.png',
        '/image/Freezer.png',
        '/image/liquid Bath bowl no sensor.png',
        '/image/liquid Bath rectangle left sensor.png',
        '/image/liquid Bath rectangle right sensor.png',
    ]
    for (let i = 0; i < image_paths.length; i++) {
        const image_to_display = image_paths[i];
        let tr = $('<tr>')
        let td = $('<td>')

        let input = $('<input>', {
            'type' : 'radio',
            'class' : '',
            'id' : 'diagram'+(i+1),
            'name' : 'diagram',
            'value' : 'diagram'+(i+1),
            'data-group':"equipment_information",
        })
    
        let image = $('<img>', {
            'src':image_to_display,
            'style': "height:15em;",
            'id' : 'diagram'+(i+1)+'Image',
        })
        let label = $('<label>',{
            'for': 'diagram'+(i+1),
        })
        tr.append(td.append(input), td.append(label.append(image)))
        $('#diagramTable').append(tr)
    }
    let tr = $('<tr>')
    let td = $('<td>')

    let input = $('<input>', {
        'type' : 'radio',
        'class' : '',
        'id' : 'diagramOther',
        'name' : 'diagram',
        'value' : 'diagramOther',
        'data-group':"equipment_information",
    })

    let image = $('<input>', {
        'type' : 'file',
        'class' : '',
        'id' : 'diagramOtherFile',
        'value' : 'diagramOtherFile',
    })
    let label = $('<label>',{
        'for': 'diagramOther',
    })
    tr.append(td.append(input), td.append(label.append(image)))
    $('#diagramTable').append(tr)
}

function addUncertaintyBudget(){
    $('#uncertaintyBudgetTbody').html('');
    let string_calculatedData = $('#calculatedData').val();
    let calculatedData = JSON.parse(string_calculatedData)
    let numberOfTable = Object.keys(calculatedData).length

    for (let i = 1; i <= numberOfTable; i++) {
        let tableKey = 'table'+i;
        let dataUncertainty = calculatedData[tableKey]['uncertainty'];
        let tr = $('<tr>');
        let uncertaintyDueToUUCResolutionTD = $('<td>').html(dataUncertainty['uncertaintyDueToUUCResolution']);
        let uncertaintyDueToUUCRepeatabilityTD = $('<td>').html(dataUncertainty['uncertaintyDueToUUCRepeatability']);
        let uncertaintyDueToSTDResolutionTD = $('<td>').html(dataUncertainty['uncertaintyDueToSTDResolution']);
        //let uncertaintyDueToSTDRepeatabilityTD = $('<td>').html(dataUncertainty['uncertaintyDueToSTDRepeatability']);
        let uncertaintyReferenceStandardUsedTD = $('<td>').html(dataUncertainty['uncertaintyReferenceStandardUsed']);
        let uncertaintyDriftStandardUsedTD = $('<td>').html(dataUncertainty['uncertaintyDriftStandardUsed']);
        let uncertaintyTemperatureInstabilityTD = $('<td>').html(dataUncertainty['uncertaintyTemperatureInstability']);
        let uncertaintySpatialInhomogenityTD = $('<td>').html(dataUncertainty['uncertaintySpatialInhomogenity']);
        let uncertaintyRadiationEffectTD = $('<td>').html(dataUncertainty['uncertaintyRadiationEffect']);
        let uncertaintyLoadingEffectTD = $('<td>').html(dataUncertainty['uncertaintyLoadingEffect']);
        let combinedUncertaintyTD = $('<td>').html(dataUncertainty['combinedUncertainty']);
        let effectiveDegreeOfFreedomTD = $('<td>').html(dataUncertainty['effectiveDegreeOfFreedom']);
        let calculateKFunctionTD = $('<td>').html(dataUncertainty['calculateKFunction']);
        let expandedUncertaintyTD = $('<td>').html(dataUncertainty['expandedUncertainty']);
        tr.append(
            uncertaintyDueToUUCResolutionTD,
            uncertaintyDueToUUCRepeatabilityTD,
            uncertaintyDueToSTDResolutionTD,
            //uncertaintyDueToSTDRepeatabilityTD,
            uncertaintyReferenceStandardUsedTD,
            uncertaintyDriftStandardUsedTD,
            uncertaintyTemperatureInstabilityTD,
            uncertaintySpatialInhomogenityTD,
            uncertaintyRadiationEffectTD,
            uncertaintyLoadingEffectTD,
            combinedUncertaintyTD,
            effectiveDegreeOfFreedomTD,
            calculateKFunctionTD,
            expandedUncertaintyTD,
        )
        $('#uncertaintyBudgetTbody').append(tr)
    }
}

function removeTable(){
    $('#divForTables').children(':last-child').remove();
    tableNumber > 1 ? tableNumber-- : 1;
}

function averageArray(array){
    const arr_filtered = array.filter(value => value !== '' && !isNaN(parseFloat(value)));
    const sum = arr_filtered.reduce((acc, value) => parseFloat(acc) + parseFloat(value), 0);
    const count = array.length;
    const average = sum / count;
    return average;
}

//Have Rounding Discrepancy that starts a the 7th decimal place
function standardDeviation(arr){
    const n = arr.length;
    const mean = arr.reduce((sum, num) => parseFloat(sum) + parseFloat(num), 0) / n;
    const squaredDifferences = arr.map(num => Math.pow(num - mean, 2));
    const sumSquaredDifferences = squaredDifferences.reduce((sum, num) => sum + num, 0);
    const variance = sumSquaredDifferences / (n - 1);
    const standardDeviation = Math.sqrt(variance);
    return standardDeviation;
}

function sumOfSquares(array_uncertainty){
    let sum = 0;
    for (let i = 0; i < array_uncertainty.length; i++) {
      sum += array_uncertainty[i] * array_uncertainty[i];
    }
    return sum;
}

function getDataFromCSV(tableNumber){
    let idFile = $('#csvFileInput'+tableNumber);
    let idButton = $('#convertButton'+tableNumber);
    let array_dataByChannel = [];
    const file = idFile[0].files[0];

    return new Promise((resolve, reject) => {
        const reader = new FileReader();

        reader.onload = function (e) {
            const csvData = e.target.result;
            let data = csvToJSON(csvData)
            resolve(data);
        };

        reader.onerror = function (e) {
            reject(e.target.error);
        };

        reader.readAsText(file);
    });
    
}   

function csvToJSON(csvData){
    const rows = csvData.trim().split('\r\n');
    const columnNames = rows[0].split(',');
    const jsonArray = [];

    for (let i = 1; i < rows.length; i++) {
      const values = rows[i].split(',');
      const jsonObject = {};

      for (let j = 0; j < columnNames.length; j++) {
        jsonObject[columnNames[j]] = values[j];
      }

      jsonArray.push(jsonObject);
    }
    let arrayOfObjectsPerChannel = {};
    columnNames.forEach(channel => {
      arrayOfObjectsPerChannel[channel] = [];
    });
    jsonArray.forEach(channelValue => {
        columnNames.forEach(channel => {
            if(!isNaN(parseFloat(channelValue[channel]))){
                arrayOfObjectsPerChannel[channel].push(channelValue[channel])
            }
          });
    });

    return arrayOfObjectsPerChannel;
}

function countKeysWithPattern(data, pattern){
    let count = 0;
    let json_data = JSON.parse(data);
    for (let key in json_data) {
      if (key.startsWith(pattern)) {
        count++;
      }
    }
    return count;
}

function getStandardValues(perTableStandard){
    let selectedStandard = $('#selectedStandard').val();
    let array_selectedStandard = selectedStandard.split('(SPLIT)');
    let selectedStandardData = {};

    for (let i = 0; i < standard.length; i++) {
      let obj = standard[i];
      if (array_selectedStandard.includes(obj.serialNumber)) {
        selectedStandardData[obj.serialNumber] = obj;
      }
    }
  
    return selectedStandardData[perTableStandard];
}

function getDataNextHigher(testPoint, array_data, serialNumber){
    if(array_data == undefined){
        alert('No standard selected');
        return;
    }
    let testPointNumber = Number(testPoint)

    let key = 'standard'

    let data_values
    let dataChanged = false;

    let array_testpoints = [];

    let array_channel_name_index = {};

    //arrange as channelName/serialNumber:{rows:{data}}
    for (let i = 0; i < array_data.length; i++) {
        let itemCount = array_data[i].length
        let item_channelName = array_data[i][0].channelName
        let item_channelNumber = array_data[i][0].channelNumber
        if(item_channelName === serialNumber || item_channelNumber === serialNumber){
            array_channel_name_index[serialNumber] = {}
            for (let ii = 0; ii < itemCount; ii++) {
                const item = array_data[i][ii];
                let channelName = item.channelName;
                let channelNumber = item.channelNumber;
                array_channel_name_index[serialNumber]["Row" + (ii + 1)] = 
                {
                    "channelNumber": channelNumber,
                    "channelName": channelName,
                    "standard": item[channelNumber + "STANDARDrow" + (ii + 1)],
                    "testPoint": item[channelNumber + "TESTPOINTrow" + (ii + 1)],
                    "uuc": item[channelNumber + "UUCrow" + (ii + 1)],
                    "uncertainty": item[channelNumber + "UNCERTAINTYrow" + (ii + 1)],
                    "correction": item[channelNumber + "CORRECTIONrow" + (ii + 1)],
                    "previousCorrection": item[channelNumber + "PREVIOUSCORRECTIONreow" + (ii + 1)],
                    "drift": item[channelNumber + "DRIFTrow" + (ii + 1)],
                }
            }
        }
    }

    // array_data.forEach((items, index) => {
    //     let itemCount = items.length
    //     let item_channelName = items[0].channelName
    //     let item_channelNumber = items[0].channelNumber
    //     if(item_channelName === serialNumber || item_channelNumber === serialNumber){
    //         array_channel_name_index[item_channelName] = {}
    //         for (let i = 0; i < itemCount; i++) {
    //             const item = items[i];
    //             let channelName = item.channelName;
    //             let channelNumber = item.channelNumber;
    //             array_channel_name_index[item_channelName]["Row" + (i + 1)] = 
    //             {
    //                 "channelNumber": channelNumber,
    //                 "channelName": channelName,
    //                 "standard": item[channelNumber + "STANDARDrow" + (i + 1)],
    //                 "testPoint": item[channelNumber + "TESTPOINTrow" + (i + 1)],
    //                 "uuc": item[channelNumber + "UUCrow" + (i + 1)],
    //                 "uncertainty": item[channelNumber + "UNCERTAINTYrow" + (i + 1)],
    //                 "correction": item[channelNumber + "CORRECTIONrow" + (i + 1)],
    //                 "previousCorrection": item[channelNumber + "PREVIOUSCORRECTIONreow" + (i + 1)],
    //                 "drift": item[channelNumber + "DRIFTrow" + (i + 1)],
    //             }
    //         }
    //     }
        
    // })


    for (const [object_key, value] of Object.entries(array_channel_name_index[serialNumber])) {
        array_testpoints.push(Number(value[key]))
        if(value[key] == testPointNumber){
            data_values = value
            dataChanged = true;
        }
    }   

      if(!dataChanged){
        array_testpoints.push(testPointNumber)
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
        let testpointToGetData = array_testpoints[nextHigherTestPoint]

        for (const [object_key, value] of Object.entries(array_channel_name_index[serialNumber])) {
            array_testpoints.push(Number(value[key]))
            if(value[key] == testpointToGetData){
                data_values = value
            }
        } 
    
    }
    return data_values;

    
    // array_data.forEach(item=>{
    //     array_testpoints.push(Number(item[key]))
    //     if(item[key] == testPointNumber){
    //         data_values = item
    //         dataChanged = true;
    //     }
    // })
    
    // if(!dataChanged){
    //     array_testpoints.push(testPointNumber)
    //     array_testpoints.sort(function(a, b){
    //         return a - b;
    //     });
    //     let indexOfTestPoint = array_testpoints.indexOf(testPointNumber)
    //     let nextHigherTestPoint;
    //     if(indexOfTestPoint == array_testpoints.length-1){
    //         nextHigherTestPoint = indexOfTestPoint - 1
    //     }else{
    //         nextHigherTestPoint = indexOfTestPoint + 1
    //     }
    //     let testpointToGetData = array_testpoints[nextHigherTestPoint]

    //     array_data.forEach(item=>{
    //         array_testpoints.push(Number(item[key]))
    //         if(item[key] == testpointToGetData){
    //             data_values = item
    //         }
    //     })
    
    // }
    // return data_values;

}

function getCorrectionForCertificate(average, array_data){
    let numberOfChannel = array_data.length;
    let array_correction_perChannel = {};
    let float_average = parseFloat(average);
    for (let i = 0; i < numberOfChannel; i++) {
        let channelName = array_data[i][0]['channelName'];
        let numberOfRowsPerChannel = array_data[i].length
        let need_interpolation = true;
        let array_testPoints = []
        let array_corrections = [];
        for (let ii = 0; ii < numberOfRowsPerChannel; ii++) {
            let channelKey = 'channel' + (i+1)
            let rowKey = 'row' + (ii+1)
            let std_testpoint = parseFloat(array_data[i][ii][channelKey + 'TESTPOINT' + rowKey]);
            let std_correction = parseFloat(array_data[i][ii][channelKey + 'CORRECTION' + rowKey]);
            array_testPoints.push(std_testpoint);
            array_corrections.push(std_correction);

            if(std_testpoint == float_average){
                array_correction_perChannel[channelName] = std_correction;
                need_interpolation = false;
                break;
            }
        }

        if(need_interpolation){
            let average_index, higher_testpoint, lower_testpoint
            let array_testPoints_original = JSON.parse(JSON.stringify(array_testPoints))
            array_testPoints.push(float_average)
            array_testPoints.sort(function(a, b){
                return a - b;
            });
            average_index = array_testPoints.indexOf(float_average)
            if(average_index == array_testPoints.length-1){
                higher_testpoint = array_testPoints[average_index - 1]
            }else{
                higher_testpoint = array_testPoints[average_index + 1]
            }
            if(average_index == 0){
                lower_testpoint = array_testPoints[average_index + 1]
            }else{
                lower_testpoint = array_testPoints[average_index - 1]
            }

            let higher_index_testpoint = array_testPoints_original.indexOf(higher_testpoint)
            let lower_index_testpoint = array_testPoints_original.indexOf(lower_testpoint)

            let higher_correction = array_corrections[higher_index_testpoint]
            let lower_correction = array_corrections[lower_index_testpoint]

            let dif_testpoint = parseFloat(higher_testpoint) - parseFloat(lower_testpoint)
            let dif_correction = parseFloat(higher_correction) - parseFloat(lower_correction)
            let ratio = dif_correction / dif_testpoint;
            let corr = parseFloat(lower_correction) + ((float_average - parseFloat(lower_testpoint)) * ratio)

            array_correction_perChannel[channelName] = corr;
        }
        
    }
    
    return array_correction_perChannel;
}

function uncertaintyDueToUUCResolution(resolution, readability){
    let float_resolution = parseFloat(resolution);
    let float_readability = parseFloat(readability);
    let result = float_resolution * float_readability / Math.sqrt(3);
    return result;
}

function uncertaintyDueToUUCRepeatability(array_testPoint, uucResolution = 0){
    let float_standardDeviation = parseFloat(standardDeviation(array_testPoint));
    let countOfTestPoint = array_testPoint.length;
    let result = float_standardDeviation / Math.sqrt(countOfTestPoint);
    return result;
}

function uncertaintyDueToUUCRepeatabilityWaterBath(array_testPoint, uucResolution){
    let result;
    let float_standardDeviation = parseFloat(standardDeviation(array_testPoint));
    let countOfTestPoint = array_testPoint.length;
    let checkValue = float_standardDeviation / Math.sqrt(countOfTestPoint);
    result = checkValue
    // if(checkValue == 0){
    //     result = uucResolution / Math.sqrt(12);
    // }else{
    //     result = checkValue
    // }
    return result;
}

function uncertaintyDueToSTDResolution(resolution){
    let float_resolution = parseFloat(resolution);
    let result = float_resolution / (2 * Math.sqrt(3));
    return result;
}

function uncertaintyDueToSTDRepeatability(array_channel9Data){
    let float_standardDeviation = parseFloat(standardDeviation(array_channel9Data));
    let countOfTestPoint = array_channel9Data.length;
    let result = float_standardDeviation / Math.sqrt(countOfTestPoint);
    return result;
}

function uncertaintyReferenceStandardUsed(uncertaintyValueFromSTDUsed){
    let float_uncertaintyValueFromSTDUsed = parseFloat(uncertaintyValueFromSTDUsed);
    let result = float_uncertaintyValueFromSTDUsed / 2;
    return result;
}

function uncertaintyDriftStandardUsed(driftFromSTDUsed){
    let float_driftFromSTDUsed = parseFloat(driftFromSTDUsed);
    let result = float_driftFromSTDUsed / Math.sqrt(3);
    return result;
}

function uncertaintyTemperatureInstability(standardInstability){
    let float_standardInstability = parseFloat(standardInstability);
    let result = (1 / Math.sqrt(3)) * float_standardInstability;
    return result;
}

function uncertaintySpatialInhomogenity(standardInhomoginity){
    let float_standardInhomoginity = parseFloat(standardInhomoginity);
    let result = (1 / Math.sqrt(3)) * float_standardInhomoginity;
    return result;
}

function uncertaintyRadiationEffect(radiationEffect){
    let float_radiationEffect = parseFloat(radiationEffect);
    let result;
    if(radiationEffect == 0.3){
        result = 0.3 / Math.sqrt(3);
    }else{
        result = float_radiationEffect / Math.sqrt(3);
    }
    return result;
}

function uncertaintyLoadingEffect(loadingEffect, loadingEffectValue = 0){
    let result;
    if(loadingEffect == "UNLOADED"){
        result = 0;
    }else if(loadingEffect == "LOADED (no uncertainty)"){
        result = 0;
    }else{
        result = loadingEffectValue / Math.sqrt(3);
    }
    return result;
}

function combinedUncertainty(array_uncertainty){
    let temp_array = array_uncertainty.filter(value => !isNaN(value));
    let sumSquared = sumOfSquares(temp_array);
    let result = Math.sqrt(sumSquared);
    return result;
}

function effectiveDegreeOfFreedom(object_uncertainties, array_Testpoint, array_standardReadingChannel9){
    let result = Math.pow(object_uncertainties['combinedUncertainty'], 4) / (
        (Math.pow(object_uncertainties['uncertaintyDueToUUCResolution'], 4) / 1000000) + 
        (Math.pow(object_uncertainties['uncertaintyDueToUUCRepeatability'], 4) / (array_Testpoint.length - 1)) + 
        (Math.pow(object_uncertainties['uncertaintyDueToSTDResolution'], 4) / 1000000) + 
        //(Math.pow(object_uncertainties['uncertaintyDueToSTDRepeatability'], 4) / (array_standardReadingChannel9.length - 1)) + 
        (Math.pow(object_uncertainties['uncertaintyReferenceStandardUsed'], 4) / 1000000) + 
        (Math.pow(object_uncertainties['uncertaintyDriftStandardUsed'], 4) / 1000000) + 
        (Math.pow(object_uncertainties['uncertaintyTemperatureInstability'], 4) / 1000000) + 
        (Math.pow(object_uncertainties['uncertaintySpatialInhomogenity'], 4) / 1000000) + 
        (Math.pow(object_uncertainties['uncertaintyRadiationEffect'], 4) / 1000000) + 
        (Math.pow(object_uncertainties['uncertaintyLoadingEffect'], 4) / 1000000)
      );
    return result;
}
function effectiveDegreeOfFreedomWaterbath(object_uncertainties, array_Testpoint, array_standardReadingChannel9){
    let result = Math.pow(object_uncertainties['combinedUncertainty'], 4) / (
        (Math.pow(object_uncertainties['uncertaintyDueToUUCResolution'], 4) / 1000000) + 
        (Math.pow(object_uncertainties['uncertaintyDueToUUCRepeatability'], 4) / (array_Testpoint.length - 1)) + 
        (Math.pow(object_uncertainties['uncertaintyDueToSTDResolution'], 4) / 1000000) + 
        //(Math.pow(object_uncertainties['uncertaintyDueToSTDRepeatability'], 4) / (array_standardReadingChannel9.length - 1)) + 
        (Math.pow(object_uncertainties['uncertaintyReferenceStandardUsed'], 4) / 1000000) + 
        (Math.pow(object_uncertainties['uncertaintyDriftStandardUsed'], 4) / 1000000) + 
        (Math.pow(object_uncertainties['uncertaintyTemperatureInstability'], 4) / 1000000) + 
        (Math.pow(object_uncertainties['uncertaintySpatialInhomogenity'], 4) / 1000000) + 
        (Math.pow(object_uncertainties['uncertaintyLoadingEffect'], 4) / 1000000)
      );
    return result;
}

function calculateKFunction(degreeOfFreedom){
    let val_vEffective = Math.trunc(degreeOfFreedom);
    let kVal = formulajs.TINV(1 - 0.0455 / 2, val_vEffective);
    let valFloat = parseFloat(kVal)
    // let result = valFloat.toFixed(4)
    let result = valFloat
    return result;

}

function expandedUncertainty(combinedUncertainty, coverageFactor){
    let float_combinedUncertainty = parseFloat(combinedUncertainty);
    let float_coverageFactor = parseFloat(coverageFactor);
    let result = float_combinedUncertainty * float_coverageFactor;
    return result;
}

function arrayMax(array){
    return array.reduce((a, b) => Math.max(a, b));
}

function arrayMin(array){
    return array.reduce((a, b) => Math.min(a, b));
}


async function calculateValues(){
    let numberOfTable = $('#divForTables').children().length;
    let calibrationProcedure = $('#calibrationProcedure').val()
    let equipmentType = $('#equipmentType').val()
    let calculatedData = {};
    let centerChannel = $("#centerChannel").val();
    let center
    if(parseInt(centerChannel) <= 9 && parseInt(centerChannel) > 0){
        center = "CH0"+centerChannel;
    }else{
        center = "CH"+centerChannel;
    }
    
    let wallChannel = $('#wallChannel').val();
    let wall;
    if(parseInt(wallChannel) <= 9 && parseInt(wallChannel) >= 0){
        wall = "CH0"+wallChannel;
    }else{
        wall = "CH"+wallChannel;
    }

    let array_graph_data = {}


    for (let i = 1; i <= numberOfTable; i++) {
        let numberOfRowPerTable = $('#table' + i + ' tbody').children().length;
        let tableID = 'table'+i;
        let loading = $("#loadingEffect"+i).val()

        //let testPoint = parseFloat($('#testPoint'+i).val());
        let testPoint = parseFloat($('#tempSetting'+i).val());
        let tempSettingDisplay = $('#tempSettingDisplay'+i).val();
        
        let resolution = parseFloat($('#resolution'+i).val());
        let readability = parseFloat($('#readability'+i).val());
        let standardResolution = parseFloat($('#standardResolution'+i).val());

        calculatedData[tableID] = {
            'variables':{},
            'uncertainty':{},
            'averages':{},
        };

        array_graph_data[tableID] = {}
        
        let array_uncertainty = [];        

        let object_uncertaintyValues = {
            "combinedUncertainty" : 0,
            "uncertaintyDueToUUCResolution" : 0,
            "uncertaintyDueToUUCRepeatability" : 0,
            "uncertaintyDueToSTDResolution" : 0,
            //"uncertaintyDueToSTDRepeatability" : 0,
            "uncertaintyReferenceStandardUsed" : 0,
            "uncertaintyDriftStandardUsed" : 0,
            "uncertaintyTemperatureInstability" : 0,
            "uncertaintySpatialInhomogenity" : 0,
            "uncertaintyRadiationEffect" : 0,
            "uncertaintyLoadingEffect" : 0,
        };

        let arrayOfUUCIndication = [];

        let standardReadingByChannel = await getDataFromCSV(i);
        let arrayOfChannelKeys = Object.keys(standardReadingByChannel);
        
        let standardReadingChannel9Average = averageArray(standardReadingByChannel[center]);
        let arrayForInstability = [];
        let arrayForInhomoginity = [];  
        let arrayForRadiationEffect = [];
        let arrayForLoadingEffect  = [];

        
        let resultRadiationEffect;
        let resultLoadingEffect;
        let standardRadiationEffect = null;
        let standardLoadingEffect = 0;
        let radiationEffect = null;

        function get_keys_inhomogeneity(){
            let temp_keys = JSON.parse(JSON.stringify(arrayOfChannelKeys))
            
            const index_time = temp_keys.indexOf("TIME");
            if (index_time > -1) { 
                temp_keys.splice(index_time, 1); 
            }
            const index_center = temp_keys.indexOf(center);
            if (index_center > -1) { 
                temp_keys.splice(index_center, 1); 
            }
            const index_wall = temp_keys.indexOf(wall);
            if (index_wall > -1) { 
                temp_keys.splice(index_wall, 1); 
            }
            return temp_keys;
        }

        function get_channels_used(){
            let temp_keys = JSON.parse(JSON.stringify(arrayOfChannelKeys))
            
            const index_time = temp_keys.indexOf("TIME");
            if (index_time > -1) { 
                temp_keys.splice(index_time, 1); 
            }

            const index_wall = temp_keys.indexOf(wall);
            if (index_wall > -1) { 
                temp_keys.splice(index_wall, 1); 
            }
            return temp_keys;
        }

        let array_inhomogeneity_channel_Keys = get_keys_inhomogeneity();
        let array_channels_used = get_channels_used();

        let array_per_channel_inhomogeneity = {};
        let array_instability_certificate_value = [];
        


        for (let ii = 0; ii < array_inhomogeneity_channel_Keys.length; ii++) {
            const channelKeys = array_inhomogeneity_channel_Keys[ii];
            array_per_channel_inhomogeneity[channelKeys] = [];
        }

        standardReadingByChannel[center].forEach((val, index) => {
            let resultInstability = Math.abs(standardReadingChannel9Average - val);
            arrayForInstability.push(resultInstability);
            array_instability_certificate_value.push(standardReadingChannel9Average - val)
            array_inhomogeneity_channel_Keys.forEach(channelKey => {
                
                let resultInhomogenety = Math.abs(val - standardReadingByChannel[channelKey][index]);
                arrayForInhomoginity.push(resultInhomogenety);

                array_per_channel_inhomogeneity[channelKey].push((val - standardReadingByChannel[channelKey][index]));
            })

            if(equipmentType == '1' || equipmentType == '2' || equipmentType == '3' || equipmentType == '6'){
                if(wall != 'CH00'){
                    if(testPoint >= 0 && testPoint <= 50){
                        radiationEffect = 0.30;
                    }else{
                        resultRadiationEffect = Math.abs(val - standardReadingByChannel[wall][index]);
                        arrayForRadiationEffect.push(resultRadiationEffect);
                        standardRadiationEffect = (0.1) * parseFloat(arrayMax(arrayForRadiationEffect));
                        radiationEffect = standardRadiationEffect;
    
                        resultLoadingEffect = Math.abs(standardReadingByChannel[wall][index] - val);
                        arrayForLoadingEffect.push(resultLoadingEffect);
                        standardLoadingEffect = (0.2) * parseFloat(arrayMax(arrayForLoadingEffect));
                    }
                }else{
                    if(testPoint >= -100 && testPoint <= 0){
                        radiationEffect = 0.30;
                    }
                    if(testPoint > 0 && testPoint <= 50){
                        radiationEffect = 0.30;
                    }
                    if(testPoint > 50 && testPoint <= 100){
                        radiationEffect = 0.45;
                    }
                    if(testPoint > 100 && testPoint <= 150){
                        radiationEffect = 0.60;
                    }
                    if(testPoint > 150 && testPoint <= 200){
                        radiationEffect = 0.90;
                    }
                }
            }
            
        })
        let standardInstability = parseFloat(arrayMax(arrayForInstability));
        let standardInhomoginity = parseFloat(arrayMax(arrayForInhomoginity));

        for (let x = 1; x <= numberOfRowPerTable; x++) {
            let uucIndication = parseFloat($('#uucIndicationTABLE'+i+'ROW'+x).val());
            arrayOfUUCIndication.push(uucIndication);
            
        }

        let averageOfUUCIndication = averageArray(arrayOfUUCIndication);

        // let uncertaintyValueFromSTDUsed = 0.73;
        let driftFromSTDUsed = 2.03;
        let loadingEffect = loading;

        let string_perTableStandard = $('#usedStandard'+i).val();
        let object_perTableStandardValues = getStandardValues(string_perTableStandard);
        let uncertaintyValueFromSTDUsed = JSON.parse(object_perTableStandardValues.measurements);
        
        let referenceChannelUsed = $('#referenceChannelUsed'+i).val()
        
        let standard_data = getDataNextHigher(testPoint, uncertaintyValueFromSTDUsed, referenceChannelUsed)

        let correctionForCertificate = getCorrectionForCertificate(averageOfUUCIndication, uncertaintyValueFromSTDUsed)
        
        let spatial_inhomogeneity_min_max_certificate_value = {}
        let temporal_instability_min_max_certificate_value = {}

        for (let ii = 0; ii < array_inhomogeneity_channel_Keys.length; ii++) {
            let channelKey = array_inhomogeneity_channel_Keys[ii];
            
            spatial_inhomogeneity_min_max_certificate_value[channelKey] = {};

            let max = array_per_channel_inhomogeneity[channelKey][0];
            let min = array_per_channel_inhomogeneity[channelKey][0];
            for (let iii = 1; iii < array_per_channel_inhomogeneity[channelKey].length; ++iii) {
                if (array_per_channel_inhomogeneity[channelKey][iii] < min) {
                    min = array_per_channel_inhomogeneity[channelKey][iii];
                }
                if (array_per_channel_inhomogeneity[channelKey][iii] > max) {
                    max = array_per_channel_inhomogeneity[channelKey][iii];
                }
            }

            if(max > Math.abs(min)){
                spatial_inhomogeneity_min_max_certificate_value[channelKey]['max'] = max;
            }else{
                spatial_inhomogeneity_min_max_certificate_value[channelKey]['max'] = min;
            }
            spatial_inhomogeneity_min_max_certificate_value[channelKey]['min'] = min;
        }

        for (let ii = 0; ii < 1; ii++) {
            let channelKey = center;
            
            temporal_instability_min_max_certificate_value[channelKey] = {};

            let max = array_instability_certificate_value[0];
            let min = array_instability_certificate_value[0];
            for (let iii = 1; iii < array_instability_certificate_value.length; ++iii) {
                if (array_instability_certificate_value[iii] < min) {
                    min = array_instability_certificate_value[iii];
                }
                if (array_instability_certificate_value[iii] > max) {
                    max = array_instability_certificate_value[iii];
                }
            }

            if(max > Math.abs(min)){
                temporal_instability_min_max_certificate_value[channelKey]['max'] = max;
            }else{
                temporal_instability_min_max_certificate_value[channelKey]['max'] = min;
            }
            temporal_instability_min_max_certificate_value[channelKey]['min'] = min;
        }

        if(equipmentType != '5'){
            let array_channelName = [center, 'TIME'];
            for (let ii = 0; ii < array_channelName.length; ii++) {
                array_graph_data[tableID][array_channelName[ii]] = JSON.parse(JSON.stringify(standardReadingByChannel[array_channelName[ii]]))
                
            }
        }else{
            let array_channelName = JSON.parse(JSON.stringify(arrayOfChannelKeys));
            for (let ii = 0; ii < array_channelName.length; ii++) {
                array_graph_data[tableID][array_channelName[ii]] = JSON.parse(JSON.stringify(standardReadingByChannel[array_channelName[ii]]))
                
            }
        }

        

        
        let standard_data_uncertainty = standard_data.uncertainty
        driftFromSTDUsed = standard_data.drift;
        
        calculatedData[tableID]['variables']['standardInstability'] = standardInstability;
        calculatedData[tableID]['variables']['standardInhomoginity'] = standardInhomoginity;
        calculatedData[tableID]['variables']['radiationEffect'] = radiationEffect ?? 0;
        calculatedData[tableID]['variables']['standardLoadingEffect'] = standardLoadingEffect;
        calculatedData[tableID]['variables']['testPoint'] = testPoint;
        calculatedData[tableID]['variables']['tempSettingDisplay'] = tempSettingDisplay;
        calculatedData[tableID]['variables']['resolution'] = resolution;
        calculatedData[tableID]['variables']['readability'] = readability;
        calculatedData[tableID]['variables']['standardResolution'] = standardResolution;
        calculatedData[tableID]['variables']['standardUncertainty'] = standard_data_uncertainty;
        calculatedData[tableID]['variables']['driftFromSTDUsed'] = driftFromSTDUsed;
        calculatedData[tableID]['variables']['loadingEffect'] = loadingEffect;
        calculatedData[tableID]['variables']['averageOfUUCIndication'] = averageOfUUCIndication;
        calculatedData[tableID]['variables']['center'] = center;
        
        calculatedData[tableID]['correctionForCertificate'] = correctionForCertificate;
        calculatedData[tableID]['temporal_instability_min_max_certificate_value'] = temporal_instability_min_max_certificate_value;
        calculatedData[tableID]['spatial_inhomogeneity_min_max_certificate_value'] = spatial_inhomogeneity_min_max_certificate_value;
        calculatedData[tableID]['array_inhomogeneity_channel_Keys'] = array_inhomogeneity_channel_Keys;
        //calculatedData[tableID]['array_per_channel_inhomogeneity'] = array_per_channel_inhomogeneity;
        calculatedData[tableID]['array_channels_used'] = array_channels_used;
        //calculatedData[tableID]['standardReadingByChannel'] = standardReadingByChannel;

        let variable_uncertaintyDueToUUCResolution = uncertaintyDueToUUCResolution(resolution, readability);
        let variable_uncertaintyDueToUUCRepeatability 
        if(equipmentType == '1' || equipmentType == '2' || equipmentType == '3' || equipmentType == '6'){
            variable_uncertaintyDueToUUCRepeatability = uncertaintyDueToUUCRepeatability(arrayOfUUCIndication);
        }else{
            variable_uncertaintyDueToUUCRepeatability = uncertaintyDueToUUCRepeatabilityWaterBath(arrayOfUUCIndication, resolution);
        }

        let variable_uncertaintyDueToSTDResolution = uncertaintyDueToSTDResolution(standardResolution);
        //let variable_uncertaintyDueToSTDRepeatability = uncertaintyDueToSTDRepeatability(standardReadingByChannel[center]);
        let variable_uncertaintyReferenceStandardUsed = uncertaintyReferenceStandardUsed(standard_data_uncertainty);
        let variable_uncertaintyDriftStandardUsed = uncertaintyDriftStandardUsed(driftFromSTDUsed);
        let variable_uncertaintyTemperatureInstability = uncertaintyTemperatureInstability(standardInstability);
        let variable_uncertaintySpatialInhomogenity = uncertaintySpatialInhomogenity(standardInhomoginity);
        let variable_uncertaintyRadiationEffect = uncertaintyRadiationEffect(radiationEffect);
        let variable_uncertaintyLoadingEffect = uncertaintyLoadingEffect(loadingEffect, standardLoadingEffect);
        
        array_uncertainty = [
            variable_uncertaintyDueToUUCResolution,
            variable_uncertaintyDueToUUCRepeatability,
            variable_uncertaintyDueToSTDResolution,
            //variable_uncertaintyDueToSTDRepeatability,
            variable_uncertaintyReferenceStandardUsed,
            variable_uncertaintyDriftStandardUsed,
            variable_uncertaintyTemperatureInstability,
            variable_uncertaintySpatialInhomogenity,
            variable_uncertaintyRadiationEffect,
            variable_uncertaintyLoadingEffect,
        ]

        let variable_combinedUncertainty = combinedUncertainty(array_uncertainty)

        object_uncertaintyValues['combinedUncertainty'] = variable_combinedUncertainty;
        object_uncertaintyValues['uncertaintyDueToUUCResolution'] = variable_uncertaintyDueToUUCResolution;
        object_uncertaintyValues['uncertaintyDueToUUCRepeatability'] = variable_uncertaintyDueToUUCRepeatability;
        object_uncertaintyValues['uncertaintyDueToSTDResolution'] = variable_uncertaintyDueToSTDResolution;
        //object_uncertaintyValues['uncertaintyDueToSTDRepeatability'] = variable_uncertaintyDueToSTDRepeatability;
        object_uncertaintyValues['uncertaintyReferenceStandardUsed'] = variable_uncertaintyReferenceStandardUsed;
        object_uncertaintyValues['uncertaintyDriftStandardUsed'] = variable_uncertaintyDriftStandardUsed;
        object_uncertaintyValues['uncertaintyTemperatureInstability'] = variable_uncertaintyTemperatureInstability;
        object_uncertaintyValues['uncertaintySpatialInhomogenity'] = variable_uncertaintySpatialInhomogenity;
        object_uncertaintyValues['uncertaintyRadiationEffect'] = variable_uncertaintyRadiationEffect;
        object_uncertaintyValues['uncertaintyLoadingEffect'] = variable_uncertaintyLoadingEffect;

        let variable_effectiveDegreeOfFreedom;
        if(equipmentType == '1' || equipmentType == '2' || equipmentType == '3' || equipmentType == '6'){
            variable_effectiveDegreeOfFreedom = effectiveDegreeOfFreedom(object_uncertaintyValues, arrayOfUUCIndication, standardReadingByChannel[center]);
        }else{
            variable_effectiveDegreeOfFreedom = effectiveDegreeOfFreedomWaterbath(object_uncertaintyValues, arrayOfUUCIndication, standardReadingByChannel[center]);
        }
        
        let variable_calculateKFunction = calculateKFunction(variable_effectiveDegreeOfFreedom);
        let variable_expandedUncertainty = expandedUncertainty(variable_combinedUncertainty, variable_calculateKFunction);

        calculatedData[tableID]['uncertainty']['uncertaintyDueToUUCResolution'] = variable_uncertaintyDueToUUCResolution;
        calculatedData[tableID]['uncertainty']['uncertaintyDueToUUCRepeatability'] = variable_uncertaintyDueToUUCRepeatability;
        calculatedData[tableID]['uncertainty']['uncertaintyDueToSTDResolution'] = variable_uncertaintyDueToSTDResolution;
        //calculatedData[tableID]['uncertainty']['uncertaintyDueToSTDRepeatability'] = variable_uncertaintyDueToSTDRepeatability;
        calculatedData[tableID]['uncertainty']['uncertaintyReferenceStandardUsed'] = variable_uncertaintyReferenceStandardUsed;
        calculatedData[tableID]['uncertainty']['uncertaintyDriftStandardUsed'] = variable_uncertaintyDriftStandardUsed;
        calculatedData[tableID]['uncertainty']['uncertaintyTemperatureInstability'] = variable_uncertaintyTemperatureInstability;
        calculatedData[tableID]['uncertainty']['uncertaintySpatialInhomogenity'] = variable_uncertaintySpatialInhomogenity;
        calculatedData[tableID]['uncertainty']['uncertaintyRadiationEffect'] = variable_uncertaintyRadiationEffect;
        calculatedData[tableID]['uncertainty']['uncertaintyLoadingEffect'] = variable_uncertaintyLoadingEffect;
        calculatedData[tableID]['uncertainty']['combinedUncertainty'] = variable_combinedUncertainty;
        calculatedData[tableID]['uncertainty']['effectiveDegreeOfFreedom'] = variable_effectiveDegreeOfFreedom;
        calculatedData[tableID]['uncertainty']['calculateKFunction'] = variable_calculateKFunction;
        calculatedData[tableID]['uncertainty']['expandedUncertainty'] = variable_expandedUncertainty;
        
        for (let ii = 0; ii < arrayOfChannelKeys.length; ii++) {
            const channel = arrayOfChannelKeys[ii];
            let average = averageArray(standardReadingByChannel[channel]);
            calculatedData[tableID]['averages'][channel] = average;
        }
        
       
        
    }
    $('#calculatedData').val(JSON.stringify(calculatedData));
    addUncertaintyBudget()
    
    try {
        create_chart(array_graph_data, center)
    } catch (error) {
        console.log (error)
    }
}

// function create_label(time_data, number_of_label){addUncertaintyBudget
//     let time_count = time_data.length;
//     let time_last = parseFloat(time_data[time_count-1]);
//     let time_first = 0;
//     let time_increment = time_last / number_of_label;
//     let label = [0];
//     let counter = time_first;
//     for (let i = 0; i < number_of_label; i++) {
//         counter += time_increment;
//         label.push(counter)
//     }
//     return label;
// }

function create_label(data, number_of_label){
    let count = data.length;
    let data_last = parseFloat(data[count-1]);
    let data_first = 0;
    let data_increment = data_last / number_of_label;
    let label = ["0"];
    let counter = data_first;
    for (let i = 0; i < number_of_label; i++) {
        counter += data_increment;
        label.push(counter.toFixed(0))
    }
    return label;
}

function create_label_y(rangeMin, rangeMax, number_of_label){
    let first = parseFloat(rangeMin);
    let last = parseFloat(rangeMax);

    let data_increment = (first - last) / (number_of_label - 1)
    let label = [first];
    let counter = first;
    for (let i = 0; i < number_of_label; i++) {
        label.push(parseFloat((counter + i * data_increment).toFixed(2)))
    }
    return label;
}

function create_chart(origin_data, center_channel){
    let data_values_full = JSON.parse(JSON.stringify(origin_data))
    let tableCount = Object.keys(data_values_full).length
    let url_joined = '';
    let time_unit = $('#time').val() == "seconds" ? 's' : $('#time').val();
    
    let equipmentType = $('#equipmentType').val();
    if(equipmentType == '5'){

        for (let i = 0; i < tableCount; i++) {
            let channel_count = (Object.keys(data_values_full['table'+(i+1)]).length) - 1
            let channel_keys = Object.keys(data_values_full['table'+(i+1)])
            for (let ii = 0; ii < channel_count; ii++) {
                
                let temp_setting = $('#tempSetting'+(i+1)).val()
                let data_values = data_values_full['table'+(i+1)]
                let array_x = [];
                let array_y = [];
            
                array_x = data_values['TIME'];
                array_y = data_values[channel_keys[ii]];
        
                let min = Math.trunc(arrayMin(array_y))
                array_y.unshift(min - 0.25);
                array_y.push(min + 0.25);
                let array_x_count = [];
        
                for (let i = 0; i < array_y.length; i++) {
                    array_x_count.push(i)
                }
            
                let array_label = create_label(JSON.parse(JSON.stringify(data_values['TIME'])), 10)
                let array_label_text = create_label(JSON.parse(JSON.stringify(array_x_count)), 10)
                let array_label_y = array_y
        
                const trace = {
                    x: array_x_count,
                    y: array_y,
            
                    mode: 'lines',   
                    line: {
                        color: 'rgb(0,0,255)',
                        width: 1
                    }
                };
            
                var data = [trace];
        
                const layout_2 = {
                    height: 300,
                    title: {
                        text:'Temperature Stability Measurement at Location '+(ii+1),
                        xanchor:'center',
                        yanchor:'center',
                        yref:'container',
                        
                    },
                    // xaxis : {
                    //     //'type':'category',
                    //     // 'title': '<i>Time, '+time_unit+'</i>',
                    //     // 'tickmode': 'array',
                    //     // 'tickvals': array_label,
                    //     // 'ticktext': array_label,
                    //     'showgrid': true,
                    //     'showline': true,
                    //     'mirror' : true,
                    // },  
                    // yaxis : {
                    //     //'type':'category',
                    //     // 'title': '<i>Temperature,°C</i>',
                    //     // 'tickmode': 'array',
                    //     // 'tickvals': array_label_y_full,
                    //     // 'ticktext': array_label_y_full,
                    //     'showgrid': true,
                    //     'showline': true,
                    //     'mirror' : true,
                    // },
                    xaxis : {
                        'type':'category',
                        'title': '<i>Time, '+time_unit+'</i>',
                        'tickmode': 'array',
                        'tickvals': array_label,
                        'ticktext': array_label,
                        'showgrid': true,
                        'showline': true,
                        'mirror' : true,
                    },  
                    yaxis : {
                        //'type':'category',
                        'title': '<i>Temperature,°C</i>',
                        // 'tickmode': 'array',
                        // 'tickvals': array_label_y_full,
                        // 'ticktext': array_label_y_full,
                        'showgrid': true,
                        'showline': true,
                        'mirror' : true,
                    },
                    margin : {
                        t:50,
                        r:30,
                        b:50,
                        l:30
                    },
                
                };

                const layout = {
                    height: 300,
                    title: {
                        text:'Temperature Stability Measurement at Location '+(ii+1),
                        xanchor:'center',
                        yanchor:'center',
                        yref:'container',
                      },
                    xaxis : {
                        'type':'category',
                        'title': '<i>Time, '+time_unit+'</i>',
                        'tickmode': 'array',
                        'tickvals': array_label_text,
                        'ticktext': array_label,
                        
                        'showgrid': true,
                        'showline': true,
                        'mirror' : true,
                    },  
                    yaxis : {
                        //'type':'category',
                        'title': '<i>Temperature,°C</i>',
                        // 'tickmode': 'array',
                        // 'tickvals': array_label_y_full,
                        // 'ticktext': array_label_y_full,
                        'showgrid': true,
                        'showline': true,
                        'mirror' : true,
                    },
                    margin : {
                        t:50,
                        r:30,
                        b:45,
                        l:65
                    },
                   
                };
            
                let div_chart = $("<div>").attr('id', 'chart_number_'+i+'_'+ii)
                $('#polyChart').append(div_chart)
        
                Plotly.newPlot('chart_number_'+i+'_'+ii, data, layout).then(function(gd){
                    Plotly.toImage(
                        gd,{
                            'format':'svg',
                        }
                    )
                    .then(
                        function(url){
                            if(url_joined === ''){
                                url_joined = url;
                            }else{
                                url_joined += "(SPLITHERE)" + url;
                            }
                        }
                    )
                    .then(function(){
                        $('#chart_input').val(url_joined)
                    })
                })
            }
        }
    }else{
        for (let i = 0; i < tableCount; i++) {
            let temp_setting = $('#tempSetting'+(i+1)).val()
            let data_values = data_values_full['table'+(i+1)]
            let array_x = [];
            let array_y = [];
        
            array_x = data_values['TIME'];
            array_y = data_values[center_channel];
        
            let array_x_count = [];
        
            for (let i = 0; i < array_y.length; i++) {
                array_x_count.push(i)
            }
        
            let array_label = create_label(JSON.parse(JSON.stringify(data_values['TIME'])), 10)
            let array_label_text = create_label(JSON.parse(JSON.stringify(array_x_count)), 10)
            let array_label_y = array_y
        
            const trace = {
                x: array_x_count,
                y: array_y,

        
                mode: 'lines',   
                line: {
                    color: 'rgb(0,0,255)',
                    width: 1
                }
            };
        
            var data = [trace];
        
            const layout = {
                height: 300,
                title: {
                    text:'Temperature Instability at '+temp_setting+' °C',
                    xanchor:'center',
                    yanchor:'center',
                    yref:'container',
                  },
                xaxis : {
                    'type':'category',
                    'title': '<i>Time, '+time_unit+'</i>',
                    'tickmode': 'array',
                    'tickvals': array_label_text,
                    'ticktext': array_label,
                    'showgrid': true,
                    'showline': true,
                    'mirror' : true,
                },  
                yaxis : {
                    //'type':'category',
                    'title': '<i>Temperature,°C</i>',
                    // 'tickmode': 'array',
                    // 'tickvals': array_label_y_full,
                    // 'ticktext': array_label_y_full,
                    'showgrid': true,
                    'showline': true,
                    'mirror' : true,
                },
                margin : {
                    t:50,
                    r:30
                },
               
            };

            let div_chart = $("<div>").attr('id', 'chart_number'+i)
            $('#polyChart').append(div_chart)
    
            Plotly.newPlot('chart_number'+i, data, layout).then(function(gd){
                Plotly.toImage(
                    gd,{
                        'format':'svg',
                    }
                )
                .then(
                    function(url){
                        if(url_joined === ''){
                            url_joined = url;
                        }else{
                            url_joined += "(SPLITHERE)" + url;
                        }
                    }
                )
                .then(function(){
                    $('#chart_input').val(url_joined)
                })
            })
        }
    }
    
    
}

function get_diagram(image_elemnt, preview_id, cert_id){
	let file_reader = new FileReader();
    let file = $(image_elemnt)[0].files[0]
        let file_url = URL.createObjectURL(file)
    $('#'+preview_id).attr('src', file_url)
    
    $(file_reader).on('load', function(e){
        $('#'+cert_id).val(e.target.result)
    })
    
    file_reader.readAsDataURL($(image_elemnt)[0].files[0]);
}	

function saveData(){
    let certificateNumber = $('#certificateNumber').val();
    let selectedStandard = $('#selectedStandard').val();
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
        if($(this).attr('type') == 'radio'){
            if($(this).prop('checked') == true){
                rawValues[key] = 'checked';
            }else{
                rawValues[key] = value;
            }
        }
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
        if($(this).attr('type') == 'radio'){
            if($(this).prop('checked') == true){
                rawValues[key] = 'checked';
            }else{
                rawValues[key] = value;
            }
        }
    });
    var dataInputs = JSON.stringify(rawValues);

    let images = {} 

    $.ajax({
        cache: false,
        type: "post",
        url: "/enclosure/add_New_Worksheet_Data",
        data: {
            'calibrationCertificate' : certificateNumber,
            'standard' : selectedStandard,
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
    })
    .done(function(result){
        $('#idOfCertificate').val(JSON.parse(result).id);


        let add_diagram = () => {
            let idOfCertificate = $('#idOfCertificate').val();
            let moduleNumber = $('#moduleNumber').val();
            let files_diagram = $('#diagramOtherFile')[0].files;
            let fileType_diagram = 'diagram';
    
            let formData_diagram = new FormData();
        
            for (let i = 0; i < files_diagram.length; i++) {
                formData_diagram.append('imageFiles[]', files_diagram[i]);
            }
    
            formData_diagram.append('certificate_id', idOfCertificate);
            formData_diagram.append('module_Number', moduleNumber);
            formData_diagram.append('fileType', fileType_diagram);
        
            return $.ajax({
                url: '/image/add/' + idOfCertificate,
                type: 'POST',
                data: formData_diagram,
                cache: false,
                contentType: false,
                processData: false,
            })
        }

        let add_csv = () => {
            let idOfCertificate = $('#idOfCertificate').val();
            let moduleNumber = $('#moduleNumber').val();
            let files_CSV = $('input[id^="csvFileInput"]');
            let fileType_csv = 'data';
            let formData_csv = new FormData();
        
            for (let i = 0; i < files_CSV.length; i++) {
                for (let ii = 0; ii < files_CSV[i].files.length; ii++) {
                    formData_csv.append('imageFiles[]', files_CSV[i].files[ii]);
                }
            }
    
            formData_csv.append('certificate_id', idOfCertificate);
            formData_csv.append('module_Number', moduleNumber);
            formData_csv.append('fileType', fileType_csv);
        
            return $.ajax({
                url: '/image/add/' + idOfCertificate,
                type: 'POST',
                data: formData_csv,
                cache: false,
                contentType: false,
                processData: false,
            })
        }

        $.when(add_diagram(), add_csv()).then(function(diagram_id, csv_id){
            let idOfCertificate = $('#idOfCertificate').val();
            let moduleNumber = $('#moduleNumber').val();
            images["diagram"] = JSON.parse(diagram_id[0]).imageIDArray
            images["data"] = JSON.parse(csv_id[0]).imageIDArray

            $.ajax({
                url: '/worksheet/update_worksheet_image',
                type: 'POST',
                data: {
                    "worksheetType": moduleNumber,
                    "images": JSON.stringify(images),
                    "certificateID": idOfCertificate,
                },
                cache: false,
            })
            .done(function(response){
                console.log('Files successfully added to worksheet: ', response);
                let idOfCertificate = $('#idOfCertificate').val();
                window.location.href = "/enclosure/worksheet/"+idOfCertificate;
            })
            .fail(function(error){
                console.error('Error uploading files: ', error);
            })
        })

    })
    .fail(function(error){
        console.log(error);
    })

    
}

function updateData(){
    let idOfCertificate = $('#idOfCertificate').val();

    let certificateNumber = $('#certificateNumber').val();
    let selectedStandard = $('#selectedStandard').val();
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
        if($(this).attr('type') == 'radio'){
            if($(this).prop('checked') == true){
                rawValues[key] = 'checked';
            }else{
                rawValues[key] = value;
            }
        }
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
        if($(this).attr('type') == 'radio'){
            if($(this).prop('checked') == true){
                rawValues[key] = 'checked';
            }else{
                rawValues[key] = value;
            }
        }
    });
    var dataInputs = JSON.stringify(rawValues);

    $.ajax({
        cache: false,
        type: "post",
        url: "/enclosure/update_Worksheet_Data",
        data: {
            'idOfCertificate' : idOfCertificate,
            'calibrationCertificate' : certificateNumber,
            'standard' : selectedStandard,
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
            $('#idOfCertificate').val(JSON.parse(result).id)

            var toastElement = document.getElementById('toastSaved');//select id of toast
            var toast = new bootstrap.Toast(toastElement);//inizialize it
            toast.show();//show it
        },
        error: function (error) {
            console.log(error);
        },
    })

}

$( window ).on( "load", function() {
    if ($('#idOfCertificate').val() != ''){
        let idOfCertificate = $('#idOfCertificate').val();
        $.ajax({
            cache: false,
            type: "post",
            url: "/enclosure/get_data_by_id",
            data: {
                'idOfCertificate' : idOfCertificate,
            },
            success: function(result) {
                $('#saveButton').html('Update')
                $('#saveButton').on("click", function(){updateData()});

                $('#calculatedData').val(result.worksheetData['calculatedData']);

                let dataInputs = JSON.parse(result.worksheetData['dataInputs']) ?? "{}";

                if(result.worksheetData['standard'] != null && dataInputs['selectedStandard'] != ''){
                    // updateProcessStandard(result.worksheetData['standard']);

                    $('#selectedStandard').val(dataInputs['selectedStandard'])
                    let selectedStandard = result.worksheetData['standard']??dataInputs['selectedStandard'];
                    let array_standard_selected = selectedStandard.split("(SPLIT)")

                    for (let i = 0; i < array_standard_selected.length; i++) {
                        $("input[type='checkbox'][value='"+array_standard_selected[i]+"']").attr('checked', 'true')
                    }

                    selectStandard()
                }
                
                let infoArray_none_data = ['customerInfo', 'equipmentInfo', 'environmentInfo'];
                for (let i = 0; i < infoArray_none_data.length; i++) {
                    let infoValues = JSON.parse(result.worksheetData[infoArray_none_data[i]]);
                    let keys = Object.keys(infoValues);
                    for (let x = 0; x < keys.length; x++) {
                        let id = keys[x];
                        $('#'+id).val(infoValues[id])                        
                    }   
                }    
               
                
                let numberOfTable = countKeysWithPattern(result.worksheetData['dataInputs'], 'usedStandard');

                for (let i = 1; i <= numberOfTable; i++) {
                    addNewTable();
                    let usedStandardKey = "usedStandard"+i;
                    $("#"+usedStandardKey).val(dataInputs[usedStandardKey]).trigger('change')
                    let numberOfRowsPerTable = countKeysWithPattern(result.worksheetData['dataInputs'], 'positionTABLE'+i+'ROW');
                    for (let x = 0; x < numberOfRowsPerTable; x++) {
                        $('#newRowTable'+i).trigger('click')
                    }                    
                }

                let infoArray = ['dataInputs'];
                for (let i = 0; i < infoArray.length; i++) {
                    let infoValues = JSON.parse(result.worksheetData[infoArray[i]]);
                    let keys = Object.keys(infoValues);
                    for (let x = 0; x < keys.length; x++) {
                        let id = keys[x];
                        $('#'+id).val(infoValues[id])                        
                    }   
                }                

                let calculatedDataRAW = result.worksheetData['calculatedData'];
                let calculatedData = calculatedDataRAW != "" ? JSON.parse(calculatedDataRAW) : {};
                $('#calculatedData').val(JSON.stringify(calculatedData));
                

                personnelFromDatabase('calibratedBy', 'checkedBy', 'verifierPosition', result.worksheetData['calibrationOfficer'], result.worksheetData['checkedBy'], result.worksheetData['verifierPosition'])
                //tableChart(result.worksheetData['calculatedData'], result.worksheetData['dataInputs'])

                $('#status').val(result.worksheetData['completion'])

                addUncertaintyBudget()

                
                
                get_files().then(function(){
                    if("data" in data_files_organized){
                        let csv_inputs = $('input[id^="csvFileInput"]')
                        for (let i = 0; i < csv_inputs.length; i++) {
                            $(csv_inputs[i]).val(data_files_organized.data[i].path)
                            
                        }
                    }
                })

                

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
    }
});
