$(document).ready(function() {
    addCustomerList();
    binds();
    addStandardToTable();
    addPersonnel();
});

function bind(id, evt, func){
    var el = document.getElementById(id);
    if (el.addEventListener){
        el.addEventListener(evt, func);
    } else if (el.attachEvent) {
        el.attachEvent('on' + evt, func);
    }
}

function binds(){
    bind('addTable','click',function(){
        let numberOfTables = $('#divForTables').children().length;
        newRawDataTable(numberOfTables+1);
    });
    bind('deleteTable','click',function(){
        removeTable()
    });
    bind('modalStandardButton','click',function(){
        $('#modalStandard').modal('show');
    });
    bind('calculateButton','click',function(){
        calculateWithErrorHandling();
    });
    bind('modalStandardSelect','click',function(){
        selectStandard();
        $('#modalStandard').modal('hide');
    });

    bind('dateCalibrated','change',function(){
        setDate();
    });
    bind('recommendedDueDateSelect','change',function(){
        setDate();
    });
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
function getEmailOfVerifier(copyFrom){
    var from = document.getElementById(copyFrom);
    var verifierEmail = document.getElementById('verifierEmail');
    verifierEmail.value = from.selectedOptions[0].dataset['email'];
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

function newRawDataTable(tableNumber){
    let rowNumber = 1;
    let tableDivs = $('#divForTables');
    let $table = $('<table>', {
        'class': "table table-bordered",
        'id': 'table' + tableNumber
    })
    let $thead = $('<thead>')
    let $tbody = $('<tbody>');
    let $row1 = $('<tr>');
    let $row = $('<tr>');

    let array_thead = ['Test Point','UUC Resolution','Standard','Trial 1','Trial 2','Trial 3','Trial 4','Trial 5','Trial 6'];
    for (let i = 0; i < array_thead.length; i++) {
        let $column = $('<th>', {'html': array_thead[i]});
        $row.append($column);
    }

    let $divRow = $('<div>', {class: 'row'});
    let $divRowInner = $('<div>', {class: 'row mx-auto d-flex'});
    let $btnGroup = $('<div>', {class: 'btn-group', role: 'group'});
    let $addTableBtn = $('<button>', {type: 'button', class: 'btn btn-success', text: 'Add Row', id: 'addButtonTable' + tableNumber,}).click(function(){
        let newRow = addRowToMeasurementTable(tableNumber, rowNumber);
        $tbody.append(newRow);
        rowNumber++;
    });
    let $deleteTableBtn = $('<button>', {type: 'button', class: 'btn btn-danger', text: 'Delete Row'}).click(function() {
        $tbody.find('tr:last').remove();
        if (rowNumber > 1) {
            rowNumber--;
        }
    }); 
    let $hiddenInputTableNumber = $('<input>', {type: 'hidden', 'data-group': 'raw_data', id: 'numberOfTables' + tableNumber, value: tableNumber}); 

    $divRow.append($divRowInner.append($btnGroup.append($addTableBtn, $deleteTableBtn, $hiddenInputTableNumber)));
    let $tableName = $('<th>').attr('colspan', '1').html('<h4>Table #' + tableNumber + '</h4>');
    let $column = $('<th>').attr('colspan', '8').append($divRow);
    $row1.append($tableName, $column);

    $(tableDivs).append($table.append($thead.append($row1, $row), $tbody));
}

function removeTable(){
    $('#divForTables').children(':last-child').remove();
    tableNumber > 1 ? tableNumber-- : 1;
}

function addRowToMeasurementTable(tableNumber, rowNumber){
    let $tr = $('<tr>');
    let ids = [
        'testPoint', 
        'uucResolution',
        'standard', 
        'trial1',
        'trial2',
        'trial3',
        'trial4',
        'trial5',
        'trial6',
    ];
    
    for(let i = 0; i < ids.length; i++){
        let $td = $('<td>');
        let $input;
        switch (i) {
            case 2:
                let selectedStandard = $('#selectedStandard').val()
                let array_StandardSelected = selectedStandard.split('(SPLIT)')

                $input = $('<select>', {
                    "class" : "form-select",
                    "data-group": "raw_data",
                    "data-id": "standardSelect",
                    "data-required": "false",
                    "id" : ids[i] + 'TABLE' + tableNumber + 'ROW' + rowNumber,
                    "html" : $('<option>', {
                        "html" : "Select . . .",
                        'value' : 'NaN'
                    }),
                })

                if(selectedStandard != ""){
                    array_StandardSelected.forEach(serialNumber => {
                        $input.append($('<option>').val(serialNumber).html(serialNumber))
                    })
                }
                break;
            default:
                $input = $('<input>',{
                    'type': 'text',
                    'class': 'form-control',
                    'data-group': 'raw_data',
                    "data-required": "false",
                    'id': ids[i] + 'TABLE' + tableNumber + 'ROW' + rowNumber
                })
        }

        $td.append($input);
        $tr.append($td);    
    }
    return $tr;
}

function addStandardToTable(){
    let tableBody = $('#standardTableTbody');
    let today = new Date();
    standardBalance.forEach(item => {
        let suffix = 'days left before due date';
        let date_next_calibration = new Date(item.dateCalibrated)
        date_next_calibration.setFullYear(date_next_calibration.getFullYear() + 1);
        let days_due = Math.round(Math.abs((today - date_next_calibration) / (24 * 60 * 60 * 1000)));

        let row = $('<tr>');
        if(today > date_next_calibration){
          // checkbox.attr('disabled', 'true')
          row.attr('style', 'background-color: rgba(255, 0, 0, 0.4)')
          suffix = 'days over due date';
        }else{
          row.attr('style', 'background-color: rgba(0, 255, 0, 0.4)')
        }

        let checkBoxTD = $('<td>');
        let labelTD = $('<td>');
        let daysTD = $('<td>');

        let checkbox = $('<input>').attr({
          'type':'checkbox',
          'id':item['serialNumber'],
          'data-group':'standardCheckBox',
          'value':item['serialNumber'],
        })
        checkBoxTD.append(checkbox);

        let label = $('<label>').text(item['serialNumber']).attr('for', item['serialNumber'])
        let days_due_label = $('<label>').text(days_due + ' ' + suffix).attr('for', item['serialNumber'])
        labelTD.append(label);
        daysTD.append(days_due_label);

        row.append(checkBoxTD).append(labelTD).append(daysTD)
        tableBody.append(row)
    })
}

function selectStandard(){
    let selectedStandardArray = [];
    let old_selectedStandard = $('#selectedStandard').val();
    $('input[data-group="standardCheckBox"]:checked').each(function() {
      selectedStandardArray.push($(this).val())
    });
    let selectedStandard = selectedStandardArray.join('(SPLIT)');
    $('#selectedStandard').val(selectedStandard)

    $('select[data-id="standardSelect"]').each(function() {
        if($(this).val() == 'NaN'){
            $(this).html($('<option>', {
                "html" : "Select . . .",
                'value' : 'NaN'
            }))
            selectedStandardArray.forEach(sn => {
                $(this).append($('<option>').html(sn).val(sn))
            })
        }else{
            let old_splitted = old_selectedStandard.split('(SPLIT)')
            let new_splitted = selectedStandard.split('(SPLIT)')
            let added = [];
            let removed = [];

            new_splitted.forEach(item => {
                if (!old_splitted.includes(item)) {
                    added.push(item);
                }
            });

            old_splitted.forEach(item => {
                if (!new_splitted.includes(item)) {
                    removed.push(item);
                }
            }); 

            if(removed.includes($(this).val())){
                $(this).html($('<option>', {
                    "html" : "Select . . .",
                    'value' : 'NaN'
                }))
                new_splitted.forEach(sn => {
                    $(this).append($('<option>').html(sn).val(sn))
                })
            }else{
                let currently_Selected = $(this).val();
                $(this).html($('<option>', {
                    "html" : "Select . . .",
                    'value' : 'NaN'
                }))
                selectedStandardArray.forEach(sn => {
                    $(this).append($('<option>').html(sn).val(sn))
                })
                $(this).find('option[value="' + currently_Selected + '"]').prop('selected', true)
            }
        }
    });
}

function selectStandardFromData(standard){
    let selectedStandardArray = standard.split('(SPLIT)');
    $('input[data-group="standardCheckBox"]').each(function() {
      if(selectedStandardArray.includes($(this).val()))
        $(this).trigger('click')
    });
}

function getBalanceValues(perTableBalance){
    let selectedStandard = $('#selectedStandard').val();
    let array_selectedStandard = selectedStandard.split('(SPLIT)');
    let selectedStandardData = {};

    for (let i = 0; i < standardBalance.length; i++) {
      let obj = standardBalance[i];
      if (array_selectedStandard.includes(obj.serialNumber)) {
        selectedStandardData[obj.serialNumber] = obj;
      }
    }
  
    return selectedStandardData[perTableBalance];
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

function calculateValues(){
    let calculatedData = {};
    let numberOfTable = $('#divForTables').children().length;

    for(let i = 1; i <= numberOfTable; i++){
        let tableName = 'table'+i;
        calculatedData[tableName] = {};
        let numberOfRowPerTable = $('#' + tableName + ' tbody').children().length;
        for (let x = 1; x <= numberOfRowPerTable; x++) {
            let rowNumber = 'row'+x;
            let tableIdRowNumber = 'TABLE'+i+'ROW'+x;
            calculatedData[tableName][rowNumber] = {};
            let array_trials = [];

            let $element_testPoint = $('#testPoint'+'TABLE'+i+'ROW'+x);
            let $element_uucResolution = $('#uucResolution'+'TABLE'+i+'ROW'+x);
            let $element_standard = $('#standard'+'TABLE'+i+'ROW'+x);

            let balanceData = getBalanceValues($element_standard.val())            
            let array_standardMeasurementUncertainty = [];
            let measurements = JSON.parse(balanceData.measurements);
            measurements.forEach(items => {
                array_standardMeasurementUncertainty.push(parseFloat(items.uncertaintyMeasurement))
            })
            let uncertaintyOfStandard = array_standardMeasurementUncertainty.reduce((a, b) => Math.max(a, b), -Infinity);
            let balanceResolution = balanceData['resolution'];

            $('input[id^="trial"][id$="'+tableIdRowNumber+'"]').each(function() {
                calculatedData[tableName][rowNumber][$(this).attr('id')] = $(this).val();
                array_trials.push($(this).val())
            })

            let computed_average = average(array_trials);
            let computed_typeA_Repeatability = typeA_Repeatability(array_trials);
            let computed_typeB_UUCResolution = typeB_UUCResolution($element_uucResolution.val());
            let computed_typeB_Standard = typeB_Standard(uncertaintyOfStandard);
            let computed_typeB_BalanceResolution = typeB_BalanceResolution(balanceResolution);

            let computed_combinedUncertainty = combinedUncertainty(
                computed_typeA_Repeatability,
                computed_typeB_UUCResolution,
                computed_typeB_Standard,
                computed_typeB_BalanceResolution
            )
            let computed_expandedUncertanty = expandedUncertanty(computed_combinedUncertainty, k2)
            
            calculatedData[tableName][rowNumber]['average'] = computed_average;
            calculatedData[tableName][rowNumber]['typeA_Repeatability'] = computed_typeA_Repeatability;
            calculatedData[tableName][rowNumber]['typeB_UUCResolution'] = computed_typeB_UUCResolution;
            calculatedData[tableName][rowNumber]['typeB_Standard'] = computed_typeB_Standard;
            calculatedData[tableName][rowNumber]['typeB_BalanceResolution'] = computed_typeB_BalanceResolution;
            calculatedData[tableName][rowNumber]['combinedUncertainty'] = computed_combinedUncertainty;
            calculatedData[tableName][rowNumber]['k'] = k2;
            calculatedData[tableName][rowNumber]['expandedUncertainty'] = computed_expandedUncertanty;
            
            calculatedData[tableName][rowNumber]['testPoint'] = $element_testPoint.val();
            calculatedData[tableName][rowNumber]['uucResolution'] = $element_uucResolution.val();
            calculatedData[tableName][rowNumber]['standardUsed'] = $element_standard.val();
            calculatedData[tableName][rowNumber]['uncertaintyOfStandard'] = uncertaintyOfStandard;
            calculatedData[tableName][rowNumber]['balanceResolution'] = balanceResolution;
        }        
    }
    $('#calculatedData').val(JSON.stringify(calculatedData))
    addToUncertaintyBudgetTable();
}

function addToUncertaintyBudgetTable(){
    let uncBudgetTbody = $('#uncertaintyBudgetTbody');
    $(uncBudgetTbody).html('');
    let CalData = JSON.parse($('#calculatedData').val());

    let countofTable = Object.keys(CalData).length;
    
    for (let i = 0; i < countofTable; i++) {
      let tableName = 'table'+(i+1);
      let countOfRows = Object.keys(CalData[tableName]).length;
      for (let x = 1; x <= countOfRows; x++) {
        let rowName = 'row'+x;
              
        let tr = $('<tr>');
        let td1 = $('<td>').html(parseFloat(CalData[tableName][rowName]['testPoint']).toFixed(6))
        let td2 = $('<td>').html(parseFloat(CalData[tableName][rowName]['average']).toFixed(6))
        let td3 = $('<td>').html(parseFloat(CalData[tableName][rowName]['typeA_Repeatability']).toFixed(6))
        let td4 = $('<td>').html(parseFloat(CalData[tableName][rowName]['typeB_UUCResolution']).toFixed(6))
        let td5 = $('<td>').html(parseFloat(CalData[tableName][rowName]['typeB_Standard']).toFixed(6))
        let td6 = $('<td>').html(parseFloat(CalData[tableName][rowName]['typeB_BalanceResolution']).toFixed(6))
        let td7 = $('<td>').html(parseFloat(CalData[tableName][rowName]['combinedUncertainty']).toFixed(6))
        let td8 = $('<td>').html(parseFloat(CalData[tableName][rowName]['k']).toFixed(6))
        let td9 = $('<td>').html(parseFloat(CalData[tableName][rowName]['expandedUncertainty']).toFixed(6))

        $(uncBudgetTbody).append(
          $(tr).append(td1,td2,td3,td4,td5,td6,td7,td8,td9)
        )
      }
    }
}

function personnelFromDatabase(officer_ID, verifier_ID, position_ID, officer_db, verifier_db, position_db){
    $('#'+officer_ID).val(officer_db);
    $('#'+verifier_ID).val(verifier_db);
    $('#'+position_ID).val(position_db);
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
    });
    var dataInputs = JSON.stringify(rawValues);

    $.ajax({
        cache: false,
        type: "post",
        url: "/refractometer/add_New_Worksheet_Data",
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
        success: function(result) {
            $('#idOfCertificate').val(JSON.parse(result).id);
            window.location.href = "/refractometer/worksheet/"+JSON.parse(result).id;

        },
        error: function (error) {
            console.log(error);
        },
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
    });
    var dataInputs = JSON.stringify(rawValues);

    $.ajax({
        cache: false,
        type: "post",
        url: "/refractometer/update_Worksheet_Data",
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
            url: "/refractometer/get_data_by_id",
            data: {
                'idOfCertificate' : idOfCertificate,
            },
            success: function(result) {
                $('#saveButton').html('Update')
                $('#saveButton').on("click", function(){updateData()});

                if(result.worksheetData['standard'] != null){
                    selectStandardFromData(result.worksheetData['standard']);
                    $('#modalStandardSelect').trigger('click')
                }
                
                let calculatedDataRAW = result.worksheetData['calculatedData'];
                let calculatedData = calculatedDataRAW != "" ? JSON.parse(calculatedDataRAW) : {};
                $('#calculatedData').val(JSON.stringify(calculatedData));
              
                let numberOfTable = countKeysWithPattern(result.worksheetData['dataInputs'], 'numberOfTables'); 

                for (let i = 1; i <= numberOfTable; i++) {
                    $('#addTable').trigger('click');
                    let numberOfRowsPerTable = countKeysWithPattern(result.worksheetData['dataInputs'], 'testPointTABLE'+i+'ROW');
                    for (let x = 0; x < numberOfRowsPerTable; x++) {
                        $('#addButtonTable'+i).trigger('click')
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
    }
});