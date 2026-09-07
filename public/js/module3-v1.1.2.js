
var standardValues;
var selectedStandard = '';
var selectedStandardID = '';

var numberOfTables = 0;
var selectedTable = '';

var k2 = 2;


$( document ).ready(function() {
    bindEventsToInputAndButtons();
    addPersonnel();
    addDetailsToStandardTable()
    addCustomerList();
});

function bind(id, evt, func) {
    var el = document.getElementById(id);
    if (el.addEventListener) {
        el.addEventListener(evt, func);
    } else if (el.attachEvent) {
        el.attachEvent('on' + evt, func);
    }
}

function bindEventsToInputAndButtons() {
    bind('checkedBy','change',function(){
        copyFromDataset('checkedBy', 'verifierPosition', 'verifierposition')
        getEmailOfVerifier('checkedBy');
    });
    bind('verifierPosition','change',function(){
        copyFromDataset('verifierPosition', 'checkedBy', 'verifiername')
    });
    bind('addNewTable', 'click', function() {
        addNewTable()
    });
    bind('removeTable', 'click', function() {
        removeTable()
    });
    
    
    
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
function addCustomerList(){
    customers.forEach(data => {
        let customer = data.customer + ' @ ' + data.address;
        $('#customerList').append(
            $('<option>').val(customer)
        )
    })
}
function personnelFromDatabase(officer_ID, verifier_ID, position_ID, officer_db, verifier_db, position_db){
    $('#'+officer_ID).val(officer_db);
    $('#'+verifier_ID).val(verifier_db);
    $('#'+position_ID).val(position_db);
}

function saveData(){
    let certificateNumber = $('#certificateNumber').val();
    let standard = selectedStandard;
    let calculatedData = $('#calculatedData').val();

    let completion = $('#completion').val();
    //let completion = 'Not Completed';
    let calibratorAccountEmail = $('#calibratorAccountEmail').val();
    let calibratorAccountID = $('#calibratorAccountID').val();
    let verifierEmail = $('#verifierEmail').val();
    let calibratedBy = $('#calibratedBy').val();
    let checkedBy = $('#checkedBy').val();
    let verifierPosition = $('#verifierPosition').val();    

    let customer_information = $('input[data-group="customer_information"], select[data-group="customer_information"], textarea[data-group="customer_information"]');
    let equipment_information = $('input[data-group="equipment_information"], select[data-group="equipment_information"]');
    let environmental_information = $('input[data-group="environmental_information"], select[data-group="environmental_information"]');
    let raw_data = $('table[id^="table"]');

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
    
    raw_data.each(function() {
        let tableKey = $(this).attr('id');
        let tableID = '#'+$(this).attr('id');
        let table = $(tableID+' [data-group="raw_data"]');
        rawValues[tableKey] = {};
        table.each(function() {
            let key = $(this).attr('id');
            let value = $(this).val();
            rawValues[tableKey][key] = value;
        })
    });


    var dataInputs = JSON.stringify(rawValues);

    $.ajax({
        cache: false,
        async: false,
        type: "post",
        url: "/testWeight/add_New_Worksheet_Data",
        data: {
            'calibrationCertificate' : certificateNumber,
            'standard' : standard,
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
            window.location.href = "/testWeight/worksheet/"+JSON.parse(result).id;

        },
        error: function (error) {
            console.log(error);
        },
    })

}

function saveDataUsingForm(){
    let formElement = $("#testWeightForm");
    var formData = formElement.serialize();
    $.ajax({
        cache: false,
        async: false,
        type: "POST",
        url: "/testWeightUpdateData",
        data: formData,
        success: function(response) {
            console.log("Form submitted successfully:", response);
        },
        error: function(error) {
            console.error("Error submitting form:", error);
        }
    });
  
}

function updateData(){
    let certificateNumber = $('#certificateNumber').val();
    let standard = selectedStandard;
    let calculatedData = $('#calculatedData').val() == '' ? {} : $('#calculatedData').val();
    let idOfCertificate = $('#idOfCertificate').val();

    let completion = $('#completion').val();
    //let completion = 'Not Completed';
    let calibratorAccountEmail = $('#calibratorAccountEmail').val();
    let calibratorAccountID = $('#calibratorAccountID').val();
    let verifierEmail = $('#verifierEmail').val();
    let calibratedBy = $('#calibratedBy').val();
    let checkedBy = $('#checkedBy').val();
    let verifierPosition = $('#verifierPosition').val();    

    let customer_information = $('input[data-group="customer_information"], select[data-group="customer_information"], textarea[data-group="customer_information"]');
    let equipment_information = $('input[data-group="equipment_information"], select[data-group="equipment_information"]');
    let environmental_information = $('input[data-group="environmental_information"], select[data-group="environmental_information"]');
    let raw_data = $('table[id^="table"]');

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

    // raw_data.each(function() {
    //     let key = $(this).attr('id');
    //     let value = $(this).val();
    //     rawValues[key] = value;
    //     if($(this).prop('checked') == true){
    //         rawValues[key] = 'checked';
    //     }
    // });
    
    raw_data.each(function() {
        let tableKey = $(this).attr('id');
        let tableID = '#'+$(this).attr('id');
        let table = $(tableID+' [data-group="raw_data"]');
        rawValues[tableKey] = {};
        table.each(function() {
            let key = $(this).attr('id');
            let value = $(this).val();
            rawValues[tableKey][key] = value;
        })
    });


    var dataInputs = JSON.stringify(rawValues);

     $.ajax({
         cache: false,
         type: "post",
         url: "/testWeight/update_Worksheet_Data",
         data: {
                'idOfCertificate' : idOfCertificate,
                'calibrationCertificate' : certificateNumber,
                'standard' : standard,
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
            saveDataUsingForm();
            var toastElement = document.getElementById('toastSaved');//select id of toast
            var toast = new bootstrap.Toast(toastElement);//inizialize it
            toast.show();//show it
        },
         error: function (error) {
             console.log(error);
         },
     })

}

function getValuesOfSelectedStandard(serialNumber){
    $.ajax({
        cache: false,
        type: "post",
        url: "/electronicBalance/get_standard_value_by_serial",
        async: false,
        data: {
            'serialNumber': serialNumber
        },
        success: function(result) {
            standardValues[serialNumber] = result;
        },
    })
}

function updateProcessStandard(standardPicked){
    let selectedStandard = standardPicked.split("(SPLITHERE)")
    $('input[type="checkbox"][name^="weightCheckbox"]').each(function(){
        let currentCheckboxValue = $(this).val();
        if(selectedStandard.includes(currentCheckboxValue)){
            $(this).prop('checked', true);
        }
        
    })
    processModalStandardCheckbox();

}

function getValuesOfSelectedStandardByDetailsID(){
    let array_selectedID = selectedStandardID.split('(SPLITHERE)')
    $.ajax({
        cache: false,
        type: "post",
        url: "/standard/referenceWeight/getStandardValuesReferenceWeightByDetailsID",
        async: false,
        data: {
            'selectedStandardID': array_selectedID
        },
        success: function(result) {
            standardValues = result.standardValues;
            addValuesToStandardTable()
        },
    })
}

function getStandardDetailsFromDB(){
    $.ajax({
        async: false,
        cache: false,
        type: "post",
        url: "/standard/referenceWeight/getStandardDataReferenceWeight",
        success: function(result) {
            standardDetails = result.standardData;
        },
    }).then(function(){
        addDetailsToStandardTable();
    })
}

function addDetailsToStandardTable(){

    let tbody = $('<tbody>');
    let today = new Date();
    standardDetails.forEach(items=>{
        let dateOfCalibration = new Date(items.dateOfCalibration); 
        let dueDate = new Date(dateOfCalibration.setFullYear(dateOfCalibration.getFullYear() + 1));
        let oneMonthBeforeDue = new Date(dueDate);
        oneMonthBeforeDue.setMonth(oneMonthBeforeDue.getMonth() - 1);

        let bgColor = 'background-color:rgba(0,128,0,0.5)';
        let disabled = false;
        let suffix = 'days left before due date';
        if (today.getFullYear() === oneMonthBeforeDue.getFullYear() && today.getMonth() === oneMonthBeforeDue.getMonth()) {
            bgColor = 'background-color:rgba(255,165,0,0.5)';
            suffix = 'days left before due date';
        } 
        else if (today.getFullYear() === dueDate.getFullYear() && today.getMonth() === dueDate.getMonth() && today.getDate() === dueDate.getDate()) {
            bgColor = 'background-color:rgba(255,0,0,0.5)';
            disabled = true;
            suffix = 'days left before due date';
        }
        else if (today > dueDate) {
            bgColor = 'background-color:rgba(255,0,0,0.5)';
            disabled = true;
            suffix = 'days over due date';
        }

        let days_due = Math.round(Math.abs((today - dueDate) / (24 * 60 * 60 * 1000)));

        let checkboxId = 'modalStandard'+items['id'];
        let tr = $('<tr>').attr('style', bgColor);

        let checkboxTD =  $('<td>');
        let checkbox = $('<input>', {
            'type': 'checkbox',
            'class': 'form-check-input',
            'id': checkboxId,
            'name': 'weightCheckbox',
            'value': items['serialNumber'],
            'data-standard_id': items['id']
        });

        if (today.getFullYear() === dueDate.getFullYear() && today.getMonth() === dueDate.getMonth() && today.getDate() === dueDate.getDate()) {
            $(checkbox).attr("disabled", true);
        }
        else if (today > dueDate) {
            $(checkbox).attr("disabled", true);
        }
        
        checkboxTD.append(checkbox);    

        let standardDescription = $('<td>').html('<label for="'+checkboxId+'">'+items['description']+'</label>')
        let classTD = $('<td>').html('<label for="'+checkboxId+'">'+items['class']+'</label>');
        let serialNumber = $('<td>').html('<label for="'+checkboxId+'">'+items['serialNumber']+'</label>');
        let typeTD = $('<td>').html('<label for="'+checkboxId+'">'+items['type']+'</label>');
        let calibrationCertificate = $('<td>').html('<label for="'+checkboxId+'">'+items['certificateNumber']+'</label>');
        let laboratory = $('<td>').html('<label for="'+checkboxId+'">'+items['calibrationProvider']+'</label>');
        let days_due_html = $('<td>').html('<label for="'+checkboxId+'">'+ days_due + ' ' + suffix+'</label>');


        tr.append(
            checkboxTD,
            standardDescription,
            classTD,
            serialNumber,
            typeTD,
            calibrationCertificate,
            laboratory,
            days_due_html,
        );  
        tbody.append(tr);
    })

    $('#modalStandardTable').append(tbody);

    $('#modalStandardTable').DataTable({
        paging:false
    });
}

function addValuesToStandardTable(){
    $('#modalStandardValueTable tbody').html('');
    standardValues.forEach(items => {
        let selectedStandardData = standardDetails.find(o => o.id === items.standardID);
       
        let nominalValue = $('<td>').html(items.nominalValue + ' ' + items.nominalUnit);
        let serialNumber = $('<td>').html(selectedStandardData.serialNumber);

        let marks;
        if(items.marking == 'none' || items.marking == 'point'){
            marks = '(' + items.nominalValue + ' ' + items.nominalUnit + ' - ' + items.serialNumber + ' - ' + items.marking + ')';
        }else{
            marks = items.marking;
        }

        let marking = $('<td>').html(marks);
        let classOfStandard = $('<td>').html(selectedStandardData.class);
        let conventionalMass = $('<td>').html(items.conventionalMass);
        let unit = $('<td>').html(items.unit);
        let uncertainty = $('<td>').html(items.uncertainty);
        let mpe = $('<td>').html(items.mpe);
        let btnTD = $('<td>')
        let useBtn = $('<button>', {
            'class' : 'btn btn-outline-secondary',
            'id' : 'useBtn' + items.id,
            'html' : 'Use',
            'data-id' : items.id.toString(),
            'data-function' : 'add',
            'data-markings' : marks,
        }).on('click', function(){
            addIDToInput($(this), items.conventionalMass, items.uncertainty, items.drift);
            addConventionalMassUncertainty();
            addMarksToInput($(this))
            toggleButton($(this));
        })
        let tr = $('<tr>');
        tr.append(
            nominalValue,
            serialNumber,
            marking,
            classOfStandard,
            btnTD.append(useBtn),
            conventionalMass,
            unit,
            uncertainty,
            mpe,
        )
        $('#modalStandardValueTable tbody').append(tr);
    })
}
function toggleButton(e){
    if(e.data('function') == 'add'){
        e.data('function', 'remove');
        e.removeClass('btn-outline-secondary');
        e.addClass('btn-outline-warning');
        e.html('Remove');
    }
    else if(e.data('function') == 'remove'){
        e.data('function', 'add');
        e.removeClass('btn-outline-warning');
        e.addClass('btn-outline-secondary');
        e.html('Use');
    }
}

function addIDToInput(e, conMass, unc, drft){
    let selectedIDs = $('#selectedValuesIdTable' + selectedTable).val();
    let selectedConMass = $('#selectedValuesConventionalMassTable' + selectedTable).val();
    let selectedUncert = $('#selectedValuesUncertaintyTable' + selectedTable).val();
    let selectedDrift = $('#selectedValuesDriftTable' + selectedTable).val();
    let array_ids = selectedIDs == '' ? [] : selectedIDs.split('(SPLITHERE)');
    let array_ConMass = selectedConMass == '' ? [] : selectedConMass.split('(SPLITHERE)');
    let array_Uncert = selectedUncert == '' ? [] : selectedUncert.split('(SPLITHERE)');
    let array_Drift = selectedDrift == '' ? [] : selectedDrift.split('(SPLITHERE)');

    let btnID = e.data('id').toString();

    if(e.data('function') == 'add'){
        if (!array_ids.includes(btnID)) {
            array_ids.push(btnID)
            array_ConMass.push(conMass)
            array_Uncert.push(unc)
            array_Drift.push(drft)
        }
    }
    else if(e.data('function') == 'remove'){
        if (array_ids.includes(btnID)) {
            const index = array_ids.indexOf(btnID);
            array_ids.splice(index, 1);
            array_ConMass.splice(index, 1);
            array_Uncert.splice(index, 1);
            array_Drift.splice(index, 1);
        }
    }
    array_ids = array_ids.join('(SPLITHERE)');
    array_ConMass = array_ConMass.join('(SPLITHERE)');
    array_Uncert = array_Uncert.join('(SPLITHERE)');
    array_Drift = array_Drift.join('(SPLITHERE)');
    $('#selectedValuesIdTable' + selectedTable).val(array_ids)
    $('#selectedValuesConventionalMassTable' + selectedTable).val(array_ConMass)
    $('#selectedValuesUncertaintyTable' + selectedTable).val(array_Uncert)
    $('#selectedValuesDriftTable' + selectedTable).val(array_Drift)
    
}
function addMarksToInput(e){
    let selectedMarkings = $('#standardUsedIDsTable' + selectedTable).val();
    let array_marks = selectedMarkings == '' ? [] : selectedMarkings.split(' + ');
    let btnMarks = e.data('markings').toString();

    $('#standardUsedIDsTable' + selectedTable).val()
    if(e.data('function') == 'add'){
        if (!array_marks.includes(btnMarks)) {
            array_marks.push(btnMarks)
        }
    }
    else if(e.data('function') == 'remove'){
        if (array_marks.includes(btnMarks)) {
            const index = array_marks.indexOf(btnMarks);
            array_marks.splice(index, 1);
        }
    }
    array_marks = array_marks.join(' + ');
    $('#standardUsedIDsTable' + selectedTable).val(array_marks)
    $('#marksUsed').html(array_marks);
    
}
    
function addConventionalMassUncertainty(){
    let selectedConMass = $('#selectedValuesConventionalMassTable' + selectedTable).val();
    let selectedUncert = $('#selectedValuesUncertaintyTable' + selectedTable).val();
    let selectedDrift = $('#selectedValuesDriftTable' + selectedTable).val();
    let array_ConMass = selectedConMass == '' ? [] : selectedConMass.split('(SPLITHERE)');
    let array_Uncert = selectedUncert == '' ? [] : selectedUncert.split('(SPLITHERE)');
    let array_Drift = selectedDrift == '' ? [] : selectedDrift.split('(SPLITHERE)');

    let sum_ConMass = array_ConMass.reduce((accumulator, currentValue) => Number(accumulator) + Number(currentValue), 0);
    let sum_Uncert = array_Uncert.reduce((accumulator, currentValue) => Number(accumulator) + Number(currentValue), 0);
    let sum_Drift = array_Drift.reduce((accumulator, currentValue) => Number(accumulator) + Number(currentValue), 0);

    $('#convenMassTotalG').html(sum_ConMass)
    $('#uncertaintyTotal').html(sum_Uncert)
    $('#driftTotalG').html(sum_Drift)
    
    $('#ConventionalMassTotal' + selectedTable).val(sum_ConMass)
    $('#UncertaintySTDTotal' + selectedTable).val(sum_Uncert)
    $('#DriftSTDTotal' + selectedTable).val(sum_Drift)
}

function processModalStandardCheckbox(){
    let snSelected = [];
    let IDSelected = [];
    $("input[id*='modalStandard']:checked").map(function () {
        snSelected.push($(this).val()); 
        IDSelected.push($(this).data('standard_id'))
    });
    
    selectedStandard = snSelected.join('(SPLITHERE)');
    selectedStandardID = IDSelected.join('(SPLITHERE)')

    getValuesOfSelectedStandardByDetailsID();
}

function uploadFiles(){
    let files = $('#fileInput')[0].files;
    let idOfCertificate = $('#idOfCertificate').val();
    let formData = new FormData();

    for (let i = 0; i < files.length; i++) {
        formData.append('imageFiles[]', files[i]);
    }

    $.ajax({
        url: '/testWeight/imageUpdate/' + idOfCertificate,
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
        let idOfCertificate = $('#idOfCertificate').val();
        $.ajax({
            cache: false,
            type: "post",
            url: "/testWeight/get_data_by_id",
            data: {
                'idOfCertificate' : idOfCertificate,
            },
            success: function(result) {
                $('#saveButton').html('Update')
                $('#saveButton').on("click", function(){updateData()});

              
                
                if(result.worksheetData['standard'] != null){
                    //$('#modalStandardTable').DataTable().clear().destroy();
                    updateProcessStandard(result.worksheetData['standard']);
                    //$('#modalStandardTable').DataTable({});
                }
                let calculatedDataRAW = result.worksheetData['calculatedData'];
                let calculatedData = calculatedDataRAW != "" ? JSON.parse(calculatedDataRAW) : {};
                $('#calculatedData').val(JSON.stringify(calculatedData));

                let dataInputs = JSON.parse(result.worksheetData['dataInputs'])
                let count = dataInputs != null ? Object.keys(dataInputs).length : 0;                

                let infoArray = ['equipmentInfo', 'customerInfo', 'environmentInfo'];
                for (let i = 0; i < infoArray.length; i++) {
                    let infoValues = JSON.parse(result.worksheetData[infoArray[i]]);
                    let keys = Object.keys(infoValues);
                    for (let x = 0; x < keys.length; x++) {
                        let id = keys[x];
                        $('#'+id).val(infoValues[id])                        
                    } 
                    
                }   

                
                
                let calibrated = result.worksheetData.dateTimeCalibrated
                let datedCalibrationDate = new Date(calibrated)
                let dateExpire = '19-02-2024';
                let dateExpire_array = dateExpire.split('-');
                let lastOldCalibration = new Date(dateExpire_array[2], dateExpire_array[1] - 1, dateExpire_array[0]);

                personnelFromDatabase('calibratedBy', 'checkedBy', 'verifierPosition', result.worksheetData['calibrationOfficer'], result.worksheetData['checkedBy'], result.worksheetData['verifierPosition'])
                $('#status').val(result.worksheetData['completion'])

                if(datedCalibrationDate >= lastOldCalibration){
                    for (let index = 1; index <= count; index++) {
                        addNewTable()
                        let infoValues = dataInputs['table'+index];
                        let keys = Object.keys(infoValues);
                        let numberOfRows = keys.filter(item=>item.includes('Tb')).length
                        for (let i = 1; i <= numberOfRows; i++) {
                            $('#addTable'+index).trigger('click')
                        }
                        for (let x = 0; x < keys.length; x++) {
                            let id = keys[x];     
                            $('#table'+index+' #'+id).val(infoValues[id])  
                        } 
                    }  
                    $('#isNew').val('true');
                    addToUncertaintyBudget();
                }else{
                    for (let index = 1; index <= count; index++) {
                        addAnotherInfo()
                        let infoValues = dataInputs['Table'+index];
                        let keys = Object.keys(infoValues);
                        for (let x = 0; x < keys.length; x++) {
                            let id = keys[x];
                            $('#Table'+index+' #'+id).val(infoValues[id])        
                            if(id === 'SampleNominalUnit'){
                                $('#Table'+index+" #SampleNominalUnit").trigger("change");
                            }   
                            if(id === 'comparator'){
                                $('#Table'+index+" #comparator").trigger("change");
                            }        
                        } 
                    }
                    $('#isNew').val('false');
                    $('#oldBanner').removeClass('d-none')
                    addToUncertaintyBudget_old();
                }

               
   
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

const array_comparatorDetails = () => {
    let array = [];
    sensitivityTest.forEach(balance => {
        array.push(balance.serialNumber)
    })
    return array;
}
const array_comparatorDetailsID = () => {
    let array = [];
    sensitivityTest.forEach(balance => {
        array.push(balance.id)
    })
    return array;
}

const array_materialsDetails = () => {
    let array = [];
    alloyDetails.forEach(material => {
        array.push(material.material)
    })
    return array;
}
const array_materialsDetailsID = () => {
    let array = [];
    alloyDetails.forEach(material => {
        array.push(material.id)
    })
    return array;
}


function addNewTable() {
    let rawDataTables = $('#rawDataTables');
    let numberOfTables = $(rawDataTables).children().length
    let tableNumber = numberOfTables+1

    let accordionItem = $('<div>').addClass('accordion-item');
    let accordionHeader = $('<h2>').addClass('accordion-header');
    let accordionButton = $('<button>', {
        'class': 'accordion-button collapsed',
        'type': 'button',
        'data-group': 'tools',
        'data-bs-toggle': 'collapse',
        'data-bs-target': '#collapse-Table' + tableNumber,
        'html': 'Calibration Information #' + tableNumber,
    });
    let accordionCollapse = $('<div>', {
        'class': 'accordion-collapse collapse',
        'id': 'collapse-Table' + tableNumber,
    });
    let accordionBody = $('<div>', {
        'class': 'accordion-body',
    });
    let table = $('<table>', {
        'class': 'table',
        'id':'table'+tableNumber
    })
    let thead = $('<thead>');
    let tbody = $('<tbody>');
    let headRow1 = $('<tr>');
    let headRow2 = $('<tr>');
    let headRow3 = $('<tr>');
    let headRow4 = $('<tr>');

    
    let array_units = ['kg', 'g', 'mg'];
    let array_materials = array_materialsDetails();
    let array_materialID = array_materialsDetailsID();
    let array_comparator = array_comparatorDetails();
    let array_comparatorID = array_comparatorDetailsID();
    
    let inputWithFloatingLabel = (id, placeholder) => {
    	let	td = $('<td>').addClass('w-25');
        let div =  $('<div>', {
            'class': 'form-floating',
        })
        let input = $('<input>', {
        'type': 'text',
        'class': 'form-control',
        'data-group': 'raw_data',
        'id': id+'Table'+tableNumber,
        'placeholder': placeholder,
        })
        let label = $('<label>').attr('for', id+'Table'+tableNumber,).html(placeholder)
        return td.append(div.append(input, label))
    }
    let inputGroupWithFloatingLabel = (id, placeholder) => {
    	let	td = $('<td>').addClass('w-25 align-middle');
        let hiddenIDs = $('<input>',{
            'type':'hidden',
            'id':'selectedValuesIdTable'+tableNumber,
            'data-group':'raw_data'
        })
        let hiddenConventionalMass = $('<input>',{
            'type':'hidden',
            'id':'selectedValuesConventionalMassTable'+tableNumber,
            'data-group':'raw_data'
        })
        let hiddenUncertainty = $('<input>',{
            'type':'hidden',
            'id':'selectedValuesUncertaintyTable'+tableNumber,
            'data-group':'raw_data'
        })
        let hiddenDrift = $('<input>',{
            'type':'hidden',
            'id':'selectedValuesDriftTable'+tableNumber,
            'data-group':'raw_data'
        })

        let hiddenConventionalMassTotal = $('<input>',{
            'type':'hidden',
            'id':'ConventionalMassTotal'+tableNumber,
            'data-group':'raw_data'
        })
        let hiddenUncertaintyTotal = $('<input>',{
            'type':'hidden',
            'id':'UncertaintySTDTotal'+tableNumber,
            'data-group':'raw_data'
        })
        let hiddenDriftTotal = $('<input>',{
            'type':'hidden',
            'id':'DriftSTDTotal'+tableNumber,
            'data-group':'raw_data'
        })

        let inputGroup = $('<div>', {
            'class': 'input-group',
        })
        let input = $('<input>', {
          'type': 'text',
          'class': 'form-control',
          'data-group': 'raw_data',
          'id':  id+'Table'+tableNumber,
          'placeholder': placeholder,
        })
        let btn = $('<button>', {
          'type': 'button',
          'class': 'btn btn-outline-primary',
          'id': 'addStandard'+tableNumber,
          'html': 'Add',
          'data-bs-toggle': 'modal',
          'data-bs-target': '#standardValuesModal',
        }).on('click', function(){
            selectedTable = tableNumber;
            
            let selectedIDs = $('#selectedValuesIdTable' + selectedTable).val();
            $('button[id^="useBtn"]').each(function(){
                let btnID = $(this).data('id').toString();
                if($(this).data('function') == 'remove'){
                    toggleButton($(this));
                }
                if(selectedIDs.includes(btnID)){
                    toggleButton($(this));
                }
            })
        })
        
        return td.append(inputGroup.append(input, btn), hiddenIDs, hiddenConventionalMass, hiddenUncertainty, hiddenDrift, hiddenConventionalMassTotal, hiddenUncertaintyTotal, hiddenDriftTotal)
    }
    let	selectWithFloatingLabel = (id, placeholder, array_Options) => {
    	let	td = $('<td>').addClass('w-25');
        let div =  $('<div>', {
            'class': 'form-floating',
        })
        let select = $('<select>', {
        'class':'form-select',
        'data-group': 'raw_data',
        'id':  id+'Table'+tableNumber,
        'html':$('<option>',{
            'html':'Select . . . ',
            'selected':'',
          })
        })
        array_Options.forEach(item=>{
        	let options = $('<option>',{
          	'value':item,
            'html':item
          })
          select.append(options)
        })
        
        let label = $('<label>').attr('for', id+'Table'+tableNumber,).html(placeholder)
        return td.append(div.append(select, label))
    }
    let	selectWithFloatingLabelDifferentValue = (id, placeholder, array_Options, array_Values) => {
    	let	td = $('<td>').addClass('w-25');
        let div =  $('<div>', {
            'class': 'form-floating',
        })
        let select = $('<select>', {
        'class':'form-select',
        'data-group': 'raw_data',
        'id':  id+'Table'+tableNumber,
        'html':$('<option>',{
            'html':'Select . . . ',
            'selected':'',
          })
        })
        array_Options.forEach((item, index)=>{
        	let options = $('<option>',{
          	'value':array_Values[index],
            'html':item
          })
          select.append(options)
        })
        
        let label = $('<label>').attr('for', id+'Table'+tableNumber,).html(placeholder)
        return td.append(div.append(select, label))
    }
    
    let environmentGroup = (temperature, rh, pressure, temperaturePlaceholder, rhPlaceholder, pressurePlaceholder) => {
    	let	td = $('<td>').addClass('align-middle').attr('colspan', '2');
        let inputGroup = $('<div>', {
            'class': 'input-group justify-content-center',
        })
        let formFloatingTemperature = $('<div>', {
            'class': 'form-floating me-2 w-25 ',
        })
        let inputTemperature = $('<input>', {
            'type': 'text',
            'class': 'form-control',
            'data-group': 'raw_data',
            'id':  temperature,
            'placeholder': temperaturePlaceholder,
        })
        let labelTemperature = $('<label>').attr('for', temperature).html(temperaturePlaceholder).attr('style', 'font-size: 0.95em;')  
        
        formFloatingTemperature.append(inputTemperature, labelTemperature)
        
        let formFloatingRh = $('<div>', {
            'class': 'form-floating me-2 w-25 ',
        })
        let inputRh = $('<input>', {
            'type': 'text',
            'class': 'form-control',
            'data-group': 'raw_data',
            'id':  rh,
            'placeholder': rhPlaceholder,
        })
        let labelRh = $('<label>').attr('for', rh).html(rhPlaceholder)       
      
        formFloatingRh.append(inputRh, labelRh)
        
        let formFloatingPressure = $('<div>', {
            'class': 'form-floating me-2 w-25 ',
        })
        let inputPressure = $('<input>', {
            'type': 'text',
            'class': 'form-control',
            'data-group': 'raw_data',
            'id':  pressure,
            'placeholder': pressurePlaceholder,
        })
        let labelPressure = $('<label>').attr('for', pressure).html(pressurePlaceholder)       
        
        formFloatingPressure.append(inputPressure, labelPressure)
        
        inputGroup.append(formFloatingTemperature, formFloatingRh, formFloatingPressure)
        
        return td.append(inputGroup);
    }

    let buttonGroup = (addBtn, rmvBtn) => {
        let	td = $('<td>').attr('colspan', '2');
        let btnGroup = $('<div>', {
            'class':'btn-group w-100',
            'role':'group',
        })
        let newBtn = $('<button>',{
            'type': 'button',
            'class': 'btn btn-primary',
            'html': 'Add Row',
            'id': addBtn + 'Table' + tableNumber,
            'data-TableNumber':tableNumber,
        }).click(function(){
            let tbleNumber = $(this).data('tablenumber')
            addNewRows(tbleNumber)
        })
        let removeBtn = $('<button>',{
            'type': 'button',
            'class': 'btn btn-danger',
            'html': 'Remove Row', 
            'id': rmvBtn + 'Table' + tableNumber,
            'data-TableNumber':tableNumber,
        }).click(function(){
            let tbleNumber = $(this).data('tablenumber')
            removeRow(tbleNumber)
        })

        return td.append(btnGroup.append(newBtn, removeBtn))
    }

    let tableLabel = $('<td>').html($('<h3>').html('Calibration Information #' + tableNumber)).append($('<input>',{'type':'hidden','data-tablenumber':tableNumber, 'data-group':'raw_data'}))
    let SampleNominalValue = inputWithFloatingLabel('SampleNominalValue', 'Nominal Value')
    let SampleNominalUnit = selectWithFloatingLabel('SampleNominalUnit', 'UUC Unit', array_units)
    let SampleMarking = inputWithFloatingLabel('SampleMarking', 'Marking')
    
    let sampleSelected = selectWithFloatingLabelDifferentValue('sampleSelected', 'Sample Material', array_materials, array_materialID)
    let referenceSelected = selectWithFloatingLabelDifferentValue('referenceSelected', 'Reference Material', array_materials, array_materialID)
    let comparator = selectWithFloatingLabelDifferentValue('comparator', 'Comparator', array_comparator, array_comparatorID)
    let standardUsedIDs = inputGroupWithFloatingLabel('standardUsedIDs', 'Standard Used')
   
   	let environmentStart = environmentGroup('TemperatureStart', 'HumidityStart' , 'PressureStart' ,'Temperature Start', 'Humidity Start' , 'Pressure Start' )
   	let environmentEnd = environmentGroup('TemperatureFinish', 'HumidityFinish' , 'PressureFinish' ,'Temperature Finish', 'Humidity Finish' , 'Pressure Finish' )

    let btnGroup = buttonGroup('add', 'remove');

    let unitRawData = selectWithFloatingLabel('unitRawData', 'Reading Unit', array_units) 
    let uncertaintyUnit = selectWithFloatingLabel('uncertaintyUnit', 'Uncertainty Unit', array_units) 

    rawDataTables.append(
        accordionItem.append(
            accordionHeader.append(accordionButton), 
            accordionCollapse.append(
                accordionBody.append(
                    table.append(
                        thead.append(
                            headRow1.append(tableLabel, SampleNominalValue, SampleNominalUnit, SampleMarking), 
                            headRow2.append(sampleSelected, referenceSelected, comparator, standardUsedIDs),
                            headRow3.append(environmentStart,environmentEnd),
                            headRow4.append(btnGroup, unitRawData, uncertaintyUnit)
                        ),
                        tbody
                    )
                )
            )
        )
    )
   return true;
}

function addNewRows(tableNumber){
    let table = $('#table'+ tableNumber + ' tbody')
    let numberOfRows = $(table).children().length
    let rowNumber = numberOfRows+1
    let tr = $('<tr>')
    let countLabel = $('<td>').html(rowNumber);

    let inputWithFloatingLabel = (id, placeholder) => {
    	let	td = $('<td>').addClass('w-25');
        let div =  $('<div>', {
            'class': 'form-floating',
        })
        let input = $('<input>', {
        'type': 'text',
        'class': 'form-control',
        'data-group': 'raw_data',
        'id': id+rowNumber,
        'placeholder': placeholder,
        })
        let label = $('<label>').attr('for', id+rowNumber).html(placeholder)
        return td.append(div.append(input, label))
    }
    
    let Sa = inputWithFloatingLabel('Sa', 'A1');
    let Tb = inputWithFloatingLabel('Tb', 'B1');
    let Tc = inputWithFloatingLabel('Tc', 'B2');
    let Sd = inputWithFloatingLabel('Sd', 'A2');

    table.append(tr.append(Sa, Tb, Tc, Sd))
}

function removeRow(tableNumber){
    let table = $('#table'+ tableNumber + ' tbody')
    let numberOfRows = $(table).children().length
    if(numberOfRows>0){
        $(table).children().last().remove()
    }
}
function removeTable(){
    let div = $('#rawDataTables')
    let numberOfTables = $(div).children().length
    if(numberOfTables>0){
        $(div).children().last().remove()
    }
}

function convertValueToMG(unit, value){
    if(unit === 'kg'){
        return Number(value) * 1000000
    }else if(unit === "g"){
        return Number(value) * 1000
    }
}

function calculateValues(){
    let numberOfTables = $('#rawDataTables').children().length;

    let cycle = $('#cycle').val()
    let conventionalAirDensity = 1.2 // static value in excel ρ0 conventional air density (kg/m3):
    let calculatedData = {}

    for (let i = 1; i <= numberOfTables; i++) {
        //let inputs = $('#table'+i).find('input, select');
        let tableData = {};
        let inputs = $('#table'+i+' input');
        let selects = $('#table'+i+' select');

        let SampleNominalValueTable = inputs.filter('#SampleNominalValueTable'+i).val();
        let SampleNominalUnitTable = selects.filter('#SampleNominalUnitTable'+i).val();
        let SampleMarkingTable = inputs.filter('#SampleMarkingTable'+i).val();
        let selectedValuesIdTable = inputs.filter('#selectedValuesIdTable'+i).val();
        
        let sampleSelectedTable = selects.filter('#sampleSelectedTable'+i).val();
        let referenceSelectedTable = selects.filter('#referenceSelectedTable'+i).val();
        let comparatorTable = selects.filter('#comparatorTable'+i).val();

        let ConventionalMassTotal = inputs.filter('#ConventionalMassTotal'+i).val();
        let UncertaintySTDTotal = inputs.filter('#UncertaintySTDTotal'+i).val();
        let uncertaintyOfReferenceUsed = Number(UncertaintySTDTotal) / 1000
        let DriftSTDTotal = inputs.filter('#DriftSTDTotal'+i).val();

        let TemperatureStart = inputs.filter('#TemperatureStart').val();
        let HumidityStart = inputs.filter('#HumidityStart').val();
        let PressureStart = inputs.filter('#PressureStart').val();
        let TemperatureFinish = inputs.filter('#TemperatureFinish').val();
        let HumidityFinish = inputs.filter('#HumidityFinish').val();
        let PressureFinish = inputs.filter('#PressureFinish').val();
        let unitRawDataTable = selects.filter('#unitRawDataTable'+i).val();
        let uncertaintyUnitTable = selects.filter('#uncertaintyUnitTable'+i).val();
        

        let valuesMaterialSample = filterDataDynamic(sampleSelectedTable, 'id', alloyDetails);
        let valuesMaterialReference = filterDataDynamic(referenceSelectedTable, 'id', alloyDetails);
        let valuesComparator = filterDataDynamic(comparatorTable, 'id', sensitivityTest);

        let densityOfSample = Number(valuesMaterialSample[0].density);
        let densityOfReference = Number(valuesMaterialReference[0].density);
        let uncertaintyOfSample = Number(valuesMaterialSample[0].uncertainty);
        let uncertaintyOfReference = Number(valuesMaterialReference[0].uncertainty);
        
        let comparatorResolution = Number(valuesComparator[0].resolution);
        let comparatorResolution1 = Number(valuesComparator[0].resolution);
        let comparatorResolution2 = Number(valuesComparator[0].resolution2);

        if(valuesComparator[0].conditionForResolution != '' && valuesComparator[0].conditionForResolution != null ){
            let comparatorconditionForResolution = Number(valuesComparator[0].conditionForResolution);
            let condition_MG = convertValueToMG('g', comparatorconditionForResolution)
            let nominal_MG = convertValueToMG(SampleNominalUnitTable, SampleNominalValueTable)
            comparatorResolution = nominal_MG > condition_MG ? comparatorResolution2 : comparatorResolution1;
          }

        let comparatorSensitivityWeight = Number(valuesComparator[0].sensitivityWeight);
        let comparatorUncertaintySensitivityWeight = Number(valuesComparator[0].uncertSensitivityWeight);
        let comparatorSensitivityWeightDelta = Number(valuesComparator[0].sensitivityWeightDelta);
        let comparatorUncertaintySensitivityWeightDelta = Number(valuesComparator[0].uncertSensitivityWeightDelta);
        let comparatorPooledValue = Number(valuesComparator[0].pooledValue);
        

        let array_standardID = selectedStandardID.split('(SPLITHERE)');
        let array_standardValuesID = selectedValuesIdTable.split('(SPLITHERE)');

        let selectedDetails = filterDataDynamic_SearchingArray(array_standardID, 'id', standardDetails);
        let selectedValues = filterDataDynamic_SearchingArray(array_standardValuesID, 'id', standardValues);

        let airDensity = () => {
            let density = 0;
            let standard_id = selectedValues[0].standardID

            selectedDetails.forEach((item, index) => {
                if(item.id == standard_id){
                    if(density < item.prevAirDensity){
                        density = item.prevAirDensity
                        return Number(density)
                    }
                }
            })
            if(density == ''){
                density = 1.2 //constant
            }
            return Number(density);
        }

        let coverageFactor = () => {
            let coverageFactor = 0;
            selectedValues.forEach((item, index) => {
                if(coverageFactor < item.coverageFactor){
                    coverageFactor = item.coverageFactor
                }
            })
            return Number(coverageFactor);
        }


        let table = $('#table'+ i + ' tbody'); 

        let tableName = 'Table'+ i;

        let tableRowCount = table.children().length;

        let array_dmci = [];

        for (let rowCount = 1; rowCount <= tableRowCount; rowCount++) {
            let A1 = $('#table'+ i + ' tbody' + ' #Sa' + rowCount).val();
            let B1 = $('#table'+ i + ' tbody' + ' #Tb' + rowCount).val();
            let B2 = $('#table'+ i + ' tbody' + ' #Tc' + rowCount).val();
            let A2 = $('#table'+ i + ' tbody' + ' #Sd' + rowCount).val();

            let dmci = differenceMCI(B1, B2, A1, A2)
            array_dmci.push(dmci)
        }

        let averageOFDifference = differenceAve(cycle, array_dmci);

        let array_temp = [TemperatureStart, TemperatureFinish];
        let array_rh = [HumidityStart, HumidityFinish];
        let array_ap = [PressureStart, PressureFinish];

        let average_temp = average(array_temp);
        let average_rh = average(array_rh);
        let average_ap = average(array_ap);

        let computedDensity = computedDensityUsingMeasuredPressureTempRH(average_ap, average_rh, average_temp);

        let correctionFactorforAirBuoyancy = airBuoyancyCorrection(densityOfReference, densityOfSample, computedDensity, conventionalAirDensity);
        let conventionalMassSampleAirBuoyancyCorrection= CMSample(SampleNominalUnitTable, ConventionalMassTotal, correctionFactorforAirBuoyancy, averageOFDifference);

        let deviationCalculated = deviation(conventionalMassSampleAirBuoyancyCorrection, SampleNominalValueTable);

        let uncertaintySensitivityBalance = uncertSensitivityOfBalanceU(averageOFDifference, comparatorUncertaintySensitivityWeight, comparatorSensitivityWeight, comparatorUncertaintySensitivityWeightDelta, comparatorSensitivityWeightDelta);
        let uncertaintyResolutionBalance = uncertResolutionOfBalanceU(comparatorResolution);

        let standardUncertaintyDensitySample = standardUncertDensityOfSampleWeight(uncertaintyOfSample)
        let standardUncertaintyDensityReference = standardUncertDensityOfReferenceWeight(uncertaintyOfReference)
        let standardUncertaintyApproximationAirDensity = standardUncertApproxAirDensity(computedDensity)
        
        let standardUncertaintyAirBuoyancyCorrection = standardUncertaintyAirBuoyancyCorrectionFactor(
            ConventionalMassTotal,
            densityOfReference,
            densityOfSample,
            standardUncertaintyApproximationAirDensity,
            computedDensity,
            conventionalAirDensity,
            standardUncertaintyDensitySample,
            standardUncertaintyDensityReference,
            airDensity()
        )

        let uncertaintyOfReferenceWeight = uncertaintyReferenceWeight(uncertaintyOfReferenceUsed, coverageFactor(), DriftSTDTotal);
        
        let uncertaintyWeighingProcess = standardUncertaintyWeighingProcess(comparatorPooledValue)
        let uncertaintyBalance = standardUncertaintyBalance(uncertaintySensitivityBalance, uncertaintyResolutionBalance)
        let combinedUncertainty = uc(standardUncertaintyAirBuoyancyCorrection, uncertaintyOfReferenceWeight, uncertaintyWeighingProcess, uncertaintyBalance)
        let expandedUncertainty = ue(combinedUncertainty, k2)

        let expandedUncertaintyMG = convertValueToMG(unitRawDataTable, expandedUncertainty)

        tableData['SampleNominalValueTable'] = {'value':SampleNominalValueTable}
        tableData['SampleNominalUnitTable'] = {'value':SampleNominalUnitTable}
        tableData['SampleMarkingTable'] = {'value':SampleMarkingTable}
        tableData['selectedValuesIdTable'] = {'value':selectedValuesIdTable}
        tableData['sampleSelectedTable'] = {'value':sampleSelectedTable}
        tableData['referenceSelectedTable'] = {'value':referenceSelectedTable}
        tableData['comparatorTable'] = {'value':comparatorTable}
        tableData['ConventionalMassTotal'] = {'value':ConventionalMassTotal}
        tableData['UncertaintySTDTotal'] = {'value':UncertaintySTDTotal}
        tableData['uncertaintyOfReferenceUsed'] = {'value':uncertaintyOfReferenceUsed}
        tableData['DriftSTDTotal'] = {'value':DriftSTDTotal}
        tableData['TemperatureStart'] = {'value':TemperatureStart}
        tableData['HumidityStart'] = {'value':HumidityStart}
        tableData['PressureStart'] = {'value':PressureStart}
        tableData['TemperatureFinish'] = {'value':TemperatureFinish}
        tableData['HumidityFinish'] = {'value':HumidityFinish}
        tableData['PressureFinish'] = {'value':PressureFinish}
        tableData['unitRawDataTable'] = {'value':unitRawDataTable}
        tableData['uncertaintyUnitTable'] = {'value':uncertaintyUnitTable}
        tableData['densityOfSample'] = {'value':densityOfSample}
        tableData['densityOfReference'] = {'value':densityOfReference}
        tableData['uncertaintyOfSample'] = {'value':uncertaintyOfSample}
        tableData['uncertaintyOfReference'] = {'value':uncertaintyOfReference}
        tableData['comparatorResolution'] = {'value':comparatorResolution}
        tableData['comparatorSensitivityWeight'] = {'value':comparatorSensitivityWeight}
        tableData['comparatorUncertaintySensitivityWeight'] = {'value':comparatorUncertaintySensitivityWeight}
        tableData['comparatorSensitivityWeightDelta'] = {'value':comparatorSensitivityWeightDelta}
        tableData['comparatorUncertaintySensitivityWeightDelta'] = {'value':comparatorUncertaintySensitivityWeightDelta}
        tableData['comparatorPooledValue'] = {'value':comparatorPooledValue}
        tableData['array_standardID'] = {'value':array_standardID}
        tableData['array_standardValuesID'] = {'value':array_standardValuesID}
        tableData['airDensity'] = {'value':airDensity()}
        tableData['airDensity'] = {'value':airDensity()}
        tableData['coverageFactor'] = {'value':coverageFactor()}
        tableData['tableRowCount'] = {'value':tableRowCount}
        tableData['array_dmci'] = {'value':array_dmci}
        tableData['averageOFDifference'] = {'value':averageOFDifference}
        tableData['array_temp'] = {'value':array_temp}
        tableData['array_rh'] = {'value':array_rh}
        tableData['array_ap'] = {'value':array_ap}
        tableData['average_temp'] = {'value':average_temp}
        tableData['average_rh'] = {'value':average_rh}
        tableData['average_ap'] = {'value':average_ap}
        tableData['computedDensity'] = {'value':computedDensity}
        tableData['correctionFactorforAirBuoyancy'] = {'value':correctionFactorforAirBuoyancy}
        tableData['conventionalMassSampleAirBuoyancyCorrection'] = {'value':conventionalMassSampleAirBuoyancyCorrection}
        tableData['deviationCalculated'] = {'value':deviationCalculated}
        tableData['uncertaintySensitivityBalance'] = {'value':uncertaintySensitivityBalance}
        tableData['uncertaintyResolutionBalance'] = {'value':uncertaintyResolutionBalance}
        tableData['standardUncertaintyDensitySample'] = {'value':standardUncertaintyDensitySample}
        tableData['standardUncertaintyDensityReference'] = {'value':standardUncertaintyDensityReference}
        tableData['standardUncertaintyApproximationAirDensity'] = {'value':standardUncertaintyApproximationAirDensity}
        tableData['standardUncertaintyAirBuoyancyCorrection'] = {'value':standardUncertaintyAirBuoyancyCorrection}
        tableData['uncertaintyOfReferenceWeight'] = {'value':uncertaintyOfReferenceWeight}
        tableData['uncertaintyWeighingProcess'] = {'value':uncertaintyWeighingProcess}
        tableData['uncertaintyBalance'] = {'value':uncertaintyBalance}
        tableData['combinedUncertainty'] = {'value':combinedUncertainty}
        tableData['k'] = {'value':k2}
        tableData['expandedUncertainty'] = {'value':expandedUncertainty}
        tableData['expandedUncertaintyMG'] = {'value':expandedUncertaintyMG}
        tableData['conventionalAirDensity'] = {'value':conventionalAirDensity}

        calculatedData[tableName] = tableData
    }
    $('#calculatedData').val(JSON.stringify(calculatedData))
    addToUncertaintyBudget()
}


function filterDataDynamic(searchingFor, searchIn, UnfilteredArray) {
    let filteredDATA = UnfilteredArray.filter(function(e) {
        if (searchingFor == searchingFor) {
            return e[searchIn] == searchingFor;
        }
    });
    return filteredDATA;
}

function filterDataDynamic_SearchingArray(searchingFor, searchIn, UnfilteredArray){
    let filteredDATA = UnfilteredArray.filter(function(e) {
        if(searchingFor.includes(e[searchIn])){
            return e[searchIn]
        }
    });
    return filteredDATA;
}

function addToUncertaintyBudget(){
    let datas = JSON.parse($('#calculatedData').val());
    let numberOfTable = Object.keys(datas).length

    let tbodyUncertBalacne = document.getElementById('uncertBudgetTBody');
    
    let headersValues =[
        "SampleNominalValue",
        // "SampleNominalUnit",
        "sensitivityWeight",
        "standardUncertaintySensitivityWeight",
        "sensitivityWeightDelta",
        "uncertSensitivityWeightDelta",

        "uncertSensitivityOfBalanceU",
        "uncertResolutionOfBalanceU",
        "computedDensityUsingMeasuredPressureTempRH",
        "conventionalAirDensity",

        "standardUncertDensityOfSampleWeight",
        "standardUncertDensityOfReferenceWeight",
        "standardUncertApproxAirDensity",
        "standardUncertaintyAirBuoyancyCorrectionFactor",
        "uncertReferenceWeight",
        "standardUncertaintyWeighingProcess",
        "standardUncertaintyBalance",
        "uc",
        "k",
        "ue",
        "unitRawData",
    ];

    $('#uncertBudgetTBody').html('')
    for (let i = 1; i <= numberOfTable; i++) {
        let conventional_air_den = typeof datas['Table'+i].conventionalAirDensity == 'undefined' ? datas['Table'+i].airDensity.value : datas['Table'+i].conventionalAirDensity.value;

        let tr = $('<tr>').append(
            $('<td>').html(datas['Table'+i].SampleNominalValueTable.value + " " + datas['Table'+i].SampleNominalUnitTable.value),
            $('<td>').html(datas['Table'+i].comparatorSensitivityWeight.value),
            $('<td>').html(datas['Table'+i].comparatorUncertaintySensitivityWeight.value),
            $('<td>').html(datas['Table'+i].comparatorSensitivityWeightDelta.value),
            $('<td>').html(datas['Table'+i].comparatorUncertaintySensitivityWeightDelta.value),
            $('<td>').html(datas['Table'+i].uncertaintySensitivityBalance.value),
            $('<td>').html(datas['Table'+i].uncertaintyResolutionBalance.value),
            $('<td>').html(datas['Table'+i].computedDensity.value),
            // $('<td>').html(datas['Table'+i].airDensity.value),
            $('<td>').html(conventional_air_den),
            $('<td>').html(datas['Table'+i].standardUncertaintyDensitySample.value),
            $('<td>').html(datas['Table'+i].standardUncertaintyDensityReference.value),
            $('<td>').html(datas['Table'+i].standardUncertaintyApproximationAirDensity.value),
            $('<td>').html(datas['Table'+i].standardUncertaintyAirBuoyancyCorrection.value),
            $('<td>').html(datas['Table'+i].uncertaintyOfReferenceWeight.value),
            $('<td>').html(datas['Table'+i].uncertaintyWeighingProcess.value),
            $('<td>').html(datas['Table'+i].uncertaintyBalance.value),
            $('<td>').html(datas['Table'+i].combinedUncertainty.value),
            $('<td>').html(datas['Table'+i].k.value),
            $('<td>').html(datas['Table'+i].expandedUncertainty.value),
            //$('<td>').html(datas['Table'+i].expandedUncertaintyMG.value),
            $('<td>').html(datas['Table'+i].unitRawDataTable.value),
        )
        $('#uncertBudgetTBody').append(tr)
    }

}

function addToUncertaintyBudget_old(){
    let datas = JSON.parse($('#calculatedData').val());
    let numberOfTable = Object.keys(datas).length
    let tbodyUncertBalacne = document.getElementById('uncertBudgetTBody');
    
    let headersValues =[
        "SampleNominalValue",
        // "SampleNominalUnit",
        "sensitivityWeight",
        "standardUncertaintySensitivityWeight",
        "sensitivityWeightDelta",
        "uncertSensitivityWeightDelta",
        "uncertSensitivityOfBalanceU",
        "uncertResolutionOfBalanceU",
        "computedDensityUsingMeasuredPressureTempRH",
        "conventionalAirDensity",
        "standardUncertDensityOfSampleWeight",
        "standardUncertDensityOfReferenceWeight",
        "standardUncertApproxAirDensity",
        "standardUncertaintyAirBuoyancyCorrectionFactor",
        "uncertReferenceWeight",
        "standardUncertaintyWeighingProcess",
        "standardUncertaintyBalance",
        "uc",
        "k",
        "ue",
        "unitRawData",
    ];
    $('#uncertBudgetTBody').html('')
    for (let x = 1; x <= numberOfTable; x++) {
        let trOfValues = document.createElement("tr");
        for (let i = 0; i < headersValues.length; i++) {
            let tdValues = document.createElement("td");
            tdValues.innerHTML = datas["Table"+x][headersValues[i]]['value'] ;
            trOfValues.append(tdValues);
        }
        tbodyUncertBalacne.append(trOfValues);
    }
    
    
}












$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});

var isSubmitting = false

$(document).ready(function() {
    $('#testWeightForm').submit(function() {
        isSubmitting = true
    })

    $('#testWeightForm').data('initial-state', $('#testWeightForm').serialize());


})

function openModal(modalId) {
    $(modalId).modal('toggle');
}

function confirmationSave(idOfForm) {
    document.getElementById('completion').value = "Not Completed";
    try {
        getInputValueFromTables();
        alert('Calculation Successful');
        document.getElementById('calculateButton').setAttribute('class', 'btn btn-success');
        document.getElementById('calculateButton').setAttribute('disabled', 'true');
        document.getElementById('cancelCalculate').setAttribute('style', 'display:initial');

        document.getElementById(idOfForm).submit();
    } catch (error) {
        console.log(error)
        alert('Unable to Calculate \n' + error.message);
    }


}

function submitForm(idOfForm) {
    document.getElementById('completion').value = "Pending";
    try {
        getInputValueFromTables();
        alert('Calculation Successful');
        document.getElementById('calculateButton').setAttribute('class', 'btn btn-success');
        document.getElementById('calculateButton').setAttribute('disabled', 'true');
        document.getElementById('cancelCalculate').setAttribute('style', 'display:initial');

        if($('#saveButton').html == 'Save'){
            saveData();
        }else{
            updateData();
        }
    
    } catch (error) {
        console.log(error);
        alert('Unable to Calculate \n' + error.message);
    }

}

const calculateValues_old = () => {
    try {
        getInputValueFromTables();
        document.getElementById('calculateButton').setAttribute('class', 'btn btn-success');
        document.getElementById('calculateButton').setAttribute('disabled', 'true');
        document.getElementById('cancelCalculate').setAttribute('style', 'display:initial');

        alert('Calculation Successful');
    } catch (error) {
        console.log(error);
        alert('Unable to Calculate \n' + error.message);
    }
}
const cancelCalculate = () => {
    document.getElementById('calculateButton').setAttribute('class', 'btn btn-warning');
    document.getElementById('calculateButton').removeAttribute('disabled');
    document.getElementById('cancelCalculate').setAttribute('style', 'display:none');
}

var weight;
var weightSplit = [];
var dataOfSelectedWeight;
function filterData(searchingFor, UnfilteredArray) {

            let filteredDATA = UnfilteredArray.filter(function(e) {
                if (searchingFor == searchingFor) {
                    return e.serialNumber == searchingFor;
                }
            });

            return filteredDATA;
}
function filterDataBasedOnUnit(searchingFor, unit, UnfilteredArray) {

            let filteredDATA = UnfilteredArray.filter(function(e) {
                if (searchingFor == searchingFor) {
                    return e.serialNumber == searchingFor && e.nominalUnit == unit;
                }
            });

            return filteredDATA;
}
function filterDataBasedOnId(searchingFor, id, UnfilteredArray) {

            let filteredDATA = UnfilteredArray.filter(function(e) {
                if (searchingFor == searchingFor) {
                    return e.serialNumber == searchingFor && e.id == id;
                }
            });

            return filteredDATA;
}

function getWeight(
            tableNumber, 
            STDaValue,
            STDbValue,
            STDcValue,
            STDdValue,
            STDeValue,
            ){
            var markedCheckbox = document.getElementsByName('weightCheckbox');  
            var PlaceholderWeight;
            for (var checkbox of markedCheckbox) {  
                if (checkbox.checked){
                    if(PlaceholderWeight == null){
                        PlaceholderWeight = checkbox.value ;  
                    }else {
                        if(!PlaceholderWeight.includes(checkbox.value)){
                            PlaceholderWeight += ','+checkbox.value;}
                    }
                        
                }  
            
            }  
            weight = PlaceholderWeight;
            weightSplit = weight.split(",");
            //console.log(weightSplit);
            addStandard('STDa'+tableNumber, STDaValue);
            addStandard('STDb'+tableNumber, STDbValue);
            addStandard('STDc'+tableNumber, STDcValue);
            addStandard('STDd'+tableNumber, STDdValue);
            addStandard('STDe'+tableNumber, STDeValue);
            document.getElementById('weight').value = weight;
            getDataOfSelectedWeight();
}

const getDataOfSelectedWeight = () => {
            var tempArray = [];
            for (let i = 0; i < weightSplit.length; i++) {
                tempArray.push(filterData(weightSplit[i], arrStandardValues));
            }
            dataOfSelectedWeight = tempArray;

}
const addto1 = () => {
            addStandard('STDa1');
            addStandard('STDb1');
            addStandard('STDc1');
            addStandard('STDd1');
            addStandard('STDe1');
}
function stringReplace(find, replace, valueString) {
            var replaceString = valueString;
            for (var i = 0; i < find.length; i++) {
                replaceString = replaceString.replace(find[i], replace[i]);
            }
            return replaceString;
};
function addStandard(tableNumber, value){
            var dateToday = new Date();
            var dd = String(dateToday.getDate()).padStart(2, '0');
            var mm = String(dateToday.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = dateToday.getFullYear();
            dateToday = yyyy + '-' + mm + '-' + dd;

            var select = document.getElementById(tableNumber);
            var tableDIV = select.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.id;
            var table = document.getElementById(tableDIV);
            var tableSelect = table.getElementsByTagName('select')

            var unitOfSample = tableSelect.SampleNominalUnit.value;
            for(var i = select.childElementCount; i > 1; i--){
                select.removeChild(select.lastElementChild);
                }

            var forComparison = [];
            if(weightSplit.length == 0){
                console.log("No Standard Selected")
            }else{
                for (let i = 0; i < weightSplit.length; i++) {
                    forComparison.push(filterDataBasedOnUnit(weightSplit[i],unitOfSample,standardDetails));
                }
            }
            
            for (let x = 0; x < forComparison.length;x++) {
                for (let i = 0; i < forComparison[x].length; i++) {

                    if (forComparison[x].length == 0) x++;

                    var dateOfCalibration = arrStandardDetails.filter(function (e) {
                        return e.serialNumber == forComparison[x][i]['serialNumber'];
                    });

                    for (let i = 1; i <= numberOfTables; i++) {
                        var tables = document.getElementById('Table'+i);
                        var input = tables.getElementsByTagName('input');
                        input["prevAirDensity"].value = dateOfCalibration[0]['prevAirDensity'];
                    }

                    const classesOfStandard = ['E1', 'E2', 'F1', 'F2', 'M1', 'M2', 'M3'];

                    let actualClass = null;

                    if (forComparison[x][i]['class'] != null) {
                        let textClass = forComparison[x][i]['class'];
                        let find = ["₁","₂","₃","₄","₅","₆","₇","₈","₉","₀"];
                        let replace = ["1","2","3","4","5","6","7","8","9","0"];
                        let newClass = stringReplace(find, replace, textClass);
                        classesOfStandard.forEach(c => {
                            if(newClass.includes(c)){
                                actualClass = c
                            }
                        })
                    }else{
                        let textClass = forComparison[x][i]['type'];
                        let find = ["₁","₂","₃","₄","₅","₆","₇","₈","₉","₀"];
                        let replace = ["1","2","3","4","5","6","7","8","9","0"];
                        let newClass = stringReplace(find, replace, textClass);
                        classesOfStandard.forEach(c => {
                            if(newClass.includes(c)){
                                actualClass = c
                            }
                        })
                    }
                    let valueOfOPtion = forComparison[x][i]['conventionalMass'] + "," + forComparison[x][i]['uncertainty'] + "," + forComparison[x][i]['id'];
                    var opt = document.createElement('option');
                    opt.value = valueOfOPtion;
                    opt.innerHTML = actualClass + "-" + forComparison[x][i]['serialNumber'] + "-" + forComparison[x][i]['marking'] + "(" + forComparison[x][i]['nominalValue'] + " " + forComparison[x][i]['nominalUnit'] + ")";
                    opt.setAttribute('data-ID', forComparison[x][i]['id']);
                    opt.setAttribute('data-serialNumber', forComparison[x][i]['serialNumber']);
                    opt.setAttribute('data-forMPE', actualClass + "@" + forComparison[x][i]['nominalUnit'] + "@" + forComparison[x][i]['nominalValue']);
                    opt.setAttribute('data-prevAirDensity', dateOfCalibration[0]['prevAirDensity']);
                    if (dateOfCalibration[0]['dateOfCalibration'] < dateToday) {
                        opt.setAttribute('style', "background-color:rgba(255,0,0, 0.5)");
                    } else {
                        opt.setAttribute('style', "background-color:rgba(0,255,0, 0.5)");
                    }
                    if(value == valueOfOPtion){
                        opt.setAttribute('selected', "");
                    }
                    select.appendChild(opt);
                }
            }		
}
function setPrevAirDensity(selectId) {
            var select = document.getElementById(selectId);
            var tableDIV = select.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.id;
            var tables = document.getElementById(tableDIV);
            var input = tables.getElementsByTagName('input');
            var selectedOption = select.options.selectedIndex;
            input["prevAirDensity"].value = select.options[selectedOption].dataset.prevairdensity;
}
function GetElementInsideContainer(containerID, childID) {
            var elm = {};
            var elms = document.getElementById(containerID).getElementsByTagName("*");
            for (var i = 0; i < elms.length; i++) {
                if (elms[i].id === childID) {
                    elm = elms[i];
                    break;
                }
            }
            return elm;
}
function setBalanceReso(TableID) {
            var SampleNominalValue = GetElementInsideContainer(TableID, 'SampleNominalValue');
            var SampleNominalUnit = GetElementInsideContainer(TableID, 'SampleNominalUnit');
            var balanceReso = GetElementInsideContainer(TableID, 'balanceReso');
            var comparator = GetElementInsideContainer(TableID, 'comparator');
            var convertedKGtoG;
            var convertedMGtoG;
            var convertedToG;

            if (SampleNominalUnit.value == 'kg') {
                convertedToG = parseFloat(SampleNominalValue.value) * 1000
            }
            if (SampleNominalUnit.value == 'mg') {
                convertedToG = parseFloat(SampleNominalValue.value) / 1000
            }
            if (SampleNominalUnit.value == 'g') {
                convertedToG = parseFloat(SampleNominalValue.value)
            }

            

            for (let x = 0; x < sensitivityTest[0].length; x++) {
                const sensitivity = sensitivityTest[0][x];
                if (comparator.value == sensitivity.balance) {
                    if (sensitivity.conditionForResolution != null) {
                        if (convertedToG <= sensitivity.conditionForResolution) {
                            balanceReso.value = sensitivity.resolution2
                        } else {
                            balanceReso.value = sensitivity.resolution1
                        }
                    } else {
                        balanceReso.value = sensitivity.resolution1;
                    }
                }
            }

}
function addCycles(number) {
            var tr = document.createElement('tr');
            var td1 = document.createElement('td');
            var td2 = document.createElement('td');
            var td3 = document.createElement('td');
            var td4 = document.createElement('td');
            var td5 = document.createElement('td');
            var td6 = document.createElement('td');
            var td7 = document.createElement('td');
            var i1 = document.createElement('input');
            var i2 = document.createElement('input');
            var i3 = document.createElement('input');
            var i4 = document.createElement('input');
            td2.innerHTML = number;
            i1.setAttribute('type', 'text');
            i2.setAttribute('type', 'text');
            i3.setAttribute('type', 'text');
            i4.setAttribute('type', 'text');
            i1.setAttribute('class', 'form-control');
            i2.setAttribute('class', 'form-control');
            i3.setAttribute('class', 'form-control');
            i4.setAttribute('class', 'form-control');
            i1.setAttribute('placeholder', 'S');
            i2.setAttribute('placeholder', 'T');
            i3.setAttribute('placeholder', 'T');
            i4.setAttribute('placeholder', 'S');
            i1.setAttribute('id', 'Sa' + number);
            i2.setAttribute('id', 'Tb' + number);
            i3.setAttribute('id', 'Tc' + number);
            i4.setAttribute('id', 'Sd' + number);

            i1.setAttribute('data-group', 'raw_data');
            i2.setAttribute('data-group', 'raw_data');
            i3.setAttribute('data-group', 'raw_data');
            i4.setAttribute('data-group', 'raw_data');

            td3.appendChild(i1);
            td4.appendChild(i2);
            td5.appendChild(i3);
            td6.appendChild(i4);
            tr.appendChild(td1);
            tr.appendChild(td2);
            tr.appendChild(td3);
            tr.appendChild(td4);
            tr.appendChild(td5);
            tr.appendChild(td6);
            tr.appendChild(td7);

            return tr;
}
function getMPE(filterClass, unit, value) {
            var classOfStandard = '';
            const classes = ['E1', 'E2', 'F1', 'F2', 'M1', 'M2'];

            filterClass = filterClass.replace('₀', '0');
            filterClass = filterClass.replace('₁', '1');
            filterClass = filterClass.replace('₂', '2');
            filterClass = filterClass.replace('₃', '3');
            filterClass = filterClass.replace('₄', '4');
            filterClass = filterClass.replace('₅', '5');
            filterClass = filterClass.replace('₆', '6');
            filterClass = filterClass.replace('₇', '7');
            filterClass = filterClass.replace('₈', '8');
            filterClass = filterClass.replace('₉', '9');

            for (let i = 0; i < classes.length; i++) {
                if (filterClass.includes(classes[i])) {
                    classOfStandard = classes[i];
                }
            }

            var dataClass = filterDataDynamic(classOfStandard, 'class', mpeArray);
            var dataUnit = filterDataDynamic(unit, 'nominalUnit', dataClass);
            var dataValue = filterDataDynamic(value, 'nominalValue', dataUnit);

            if (dataValue[0].MPE == null) {
                return 0;
            } else {
                return dataValue[0].MPE;
            }
}
function selectMPE(id, tableNumber) {
            var selection = document.getElementById(id);
            var formpe = selection.options[selection.selectedIndex].dataset.formpe;
            var formpeArray = formpe.split('@');
            var mpeValue = getMPE(formpeArray[0], formpeArray[1], formpeArray[2]);
            document.getElementById(tableNumber).value = mpeValue;
}
var allData = {};
const getInputValueFromTables = () => {
            for(var x = 1; x <= numberOfTables; x++){
                var data2 = {}; 
                var arrayForDifferenceAverage = [];

                var cycle = document.getElementById('cycle').value; 
                var table = document.getElementById('Table'+x); 
                var input = table.getElementsByTagName('input');
                var select = table.getElementsByTagName('select'); 

                var comparator = select["comparator"].value;
                var unitRawData = select["unitRawData"].value;
                var balanceResolution = input['balanceReso'].value;
                var nominalUnit = select["SampleNominalUnit"].value;
                var prevAirDensity = parseFloat(input["prevAirDensity"].value) != null? parseFloat(input["prevAirDensity"].value):0;
                
                var nominalValue = parseFloat(input["SampleNominalValue"].value);
                var cmOfStandard = parseFloat(input["ConventionalMassTotal"+x].value)
                var mpeOfStandard = parseFloat(input["MPESTDTotal"+x].value)
                var uncertDensitySampleValue = parseFloat(input["uncertDensitySample"].value);
                var uncertDensityReferenceValue = parseFloat(input["uncertDensityReference"].value);
                var densityReferenceValue = parseFloat(input["densityReference"].value);
                var densitySampleValue = parseFloat(input["densitySample"].value);
                var kValue	 = parseFloat(input["k"].value);
                var uncertaintySTDTotalValue = parseFloat(input["UncertaintySTDTotal"+x].value);

                var arrayForuncertSensitivityOfBalanceU = searchForSensitivityTest(comparator) // G, H in excel
                
                var aveOfDifference = 0;	
                var standardDeviationOfMCIValue = 0;
                var CMSampleValue = 0;		
                var airBuoyancyCorrectionValue = 0
                var standardUncertaintyWeighingProcessValue = 0;
                var uncertSensitivityOfBalanceUValue = 0;
                var uncertResolutionOfBalanceUValue = 0;
                var uncertEccentricLoadingUValue = 0;
                var differenceBetweenMaximumAndMinimum = arrayForuncertSensitivityOfBalanceU.differenceValue;
                var pooledValue = arrayForuncertSensitivityOfBalanceU.pooledValue;
                var sensitivityWeightValue = arrayForuncertSensitivityOfBalanceU.sensitivityWeight;
                var standardUncertaintySensitivityWeightValue = arrayForuncertSensitivityOfBalanceU.uncertSensitivityWeight;
                var sensitivityWeightDeltaValue = arrayForuncertSensitivityOfBalanceU.sensitivityWeightDelta;
                var uncertSensitivityWeightDeltaValue = arrayForuncertSensitivityOfBalanceU.uncertSensitivityWeightDelta;
                
                var uncertaintyOfMagneticSusceptibilityUMA = 0; // L in excel. no formula
                var aveOfTemp = 0;	
                var aveOfRH = 0;
                var aveOfAP = 0;	
                var conventionalAirDensity = 1.2; // W in excel. no formula
                var computedDensityUsingMeasuredPressureTempRHValue = 0;
                var standardUncertApproxAirDensityValue = 0;
                var standardUncertDensityOfSampleWeightValue = 0;
                var standardUncertDensityOfReferenceWeightValue = 0;
                var standardUncertaintyAirBuoyancyCorrectionFactorValue = 0
                var standardUncertConventionalMassOfReferenceValue = 0
                let uncertReferenceWeightValue = 0;
                var standardUncertaintyBalanceValue = 0;
                var ucValue = 0;
                var ueValue = 0;

                var arrayForUC;

                data2["sensitivityWeight"] = {
                    "value" : sensitivityWeightValue,
                }
                data2["standardUncertaintySensitivityWeight"] = {
                    "value" : standardUncertaintySensitivityWeightValue,
                }
                data2["sensitivityWeightDelta"] = {
                    "value" : sensitivityWeightDeltaValue,
                }	
                data2["uncertSensitivityWeightDelta"] = {
                    "value" : uncertSensitivityWeightDeltaValue,
                }		

                for (var i = 0; i < input.length; i++) { 
                    data2[input[i].id] = {
                        "value": input[i].value,
                    }
                }

                for (var i = 0; i < select.length; i++) { 
                    data2[select[i].id] = {
                        "value": select[i].value,
                    }
                }

                data2["cycleDifferences"] = {					
                    "difference1": input['Sa1'] != null? differenceMCI(input['Tb1'].value,input['Tc1'].value,input['Sa1'].value,input['Sd1'].value):null,
                    "difference2": input['Sa2'] != null? differenceMCI(input['Tb2'].value,input['Tc2'].value,input['Sa2'].value,input['Sd2'].value):null,
                    "difference3": input['Sa3'] != null? differenceMCI(input['Tb3'].value,input['Tc3'].value,input['Sa3'].value,input['Sd3'].value):null,
                    "difference4": input['Sa4'] != null? differenceMCI(input['Tb4'].value,input['Tc4'].value,input['Sa4'].value,input['Sd4'].value):null,
                    "difference5": input['Sa5'] != null? differenceMCI(input['Tb5'].value,input['Tc5'].value,input['Sa5'].value,input['Sd5'].value):null,
                }	
                
                for(var i = 0; i <=5 ; i++){
                    if(data2.cycleDifferences['difference'+i] != null){
                        arrayForDifferenceAverage.push(data2.cycleDifferences['difference'+i]);
                    }
                }

                data2["differenceAve"] = {
                    "value" : differenceAve(arrayForDifferenceAverage),
                }
                aveOfDifference = differenceAve(arrayForDifferenceAverage);

                data2["standardDeviationOfMCI"] = {
                    "value" : standardDeviationOfMCI(arrayForDifferenceAverage),
                }
                standardDeviationOfMCIValue = standardDeviationOfMCI(arrayForDifferenceAverage);
                
                aveOfTemp = TempAve(parseFloat(input["TemperatureStart"].value),parseFloat(input["TemperatureFinish"].value));
                data2["TempAve"] = {
                    "value" : aveOfTemp,
                }
                
                aveOfRH = RHAve(parseFloat(input["HumidityStart"].value),parseFloat(input["HumidityFinish"].value));
                data2["RHAve"] = {
                    "value" : aveOfRH,
                }

                aveOfAP = APAve(parseFloat(input["PressureStart"].value),parseFloat(input["PressureFinish"].value));
                data2["APAve"] = {
                    "value" : aveOfAP,
                }	

                computedDensityUsingMeasuredPressureTempRHValue =  computedDensityUsingMeasuredPressureTempRH(aveOfAP,aveOfRH,aveOfTemp);
                data2["computedDensityUsingMeasuredPressureTempRH"] = {
                    "value" : computedDensityUsingMeasuredPressureTempRHValue,
                }

                airBuoyancyCorrectionValue = airBuoyancyCorrection(densityReferenceValue,densitySampleValue,computedDensityUsingMeasuredPressureTempRHValue,conventionalAirDensity)
                data2["airBuoyancyCorrection"] = {
                    "value" : airBuoyancyCorrectionValue,
                }
                
                data2["CMSample"] = {
                    "value" : CMSample(nominalUnit,cmOfStandard,airBuoyancyCorrectionValue,aveOfDifference),
                }
                CMSampleValue = CMSample(nominalUnit,cmOfStandard,airBuoyancyCorrectionValue,aveOfDifference);

                data2["deviation"] = {
                    "value" : deviation(CMSampleValue,nominalValue),
                }

                data2["differenceBetweenMaximumAndMinimum"] = {
                    "value" : differenceBetweenMaximumAndMinimum,
                }

                data2["standardUncertaintyWeighingProcess"] = {
                    //"value" : standardUncertaintyWeighingProcess(standardDeviationOfMCIValue,cycle),
                    "value" : standardUncertaintyWeighingProcess(standardDeviationOfMCIValue,cycle,pooledValue),
                }
                standardUncertaintyWeighingProcessValue = standardUncertaintyWeighingProcess(standardDeviationOfMCIValue,cycle,pooledValue);

                //uncertSensitivityOfBalanceUValue = uncertSensitivityOfBalanceU(standardUncertaintyWeighingProcessValue,parseFloat(arrayForuncertSensitivityOfBalanceU.uncertSensitivityWeight),parseFloat(arrayForuncertSensitivityOfBalanceU.sensitivityWeight),standardDeviationOfMCIValue,cycle)
                uncertSensitivityOfBalanceUValue = uncertSensitivityOfBalanceU(aveOfDifference,arrayForuncertSensitivityOfBalanceU.uncertSensitivityWeight,arrayForuncertSensitivityOfBalanceU.sensitivityWeight,arrayForuncertSensitivityOfBalanceU.uncertSensitivityWeightDelta,arrayForuncertSensitivityOfBalanceU.sensitivityWeightDelta) 
                data2["uncertSensitivityOfBalanceU"] = {
                    "value" : uncertSensitivityOfBalanceUValue.toFixed(20),
                }

                var uncertResolutionOfBalanceUValue = uncertResolutionOfBalanceU(balanceResolution) 
                data2["uncertResolutionOfBalanceU"] = {
                    "value" : uncertResolutionOfBalanceUValue.toFixed(20),
                }

                data2["pooledValue"] = {
                    "value" : arrayForuncertSensitivityOfBalanceU.pooledValue,
                }

                uncertEccentricLoadingUValue = uncertEccentricLoadingU(differenceBetweenMaximumAndMinimum)
                data2["uncertEccentricLoadingU"] = {
                    "value" : uncertEccentricLoadingUValue,
                }

                data2["uncertaintyOfMagneticSusceptibilityUMA"] = {
                    "value" : uncertaintyOfMagneticSusceptibilityUMA,
                }

                data2["conventionalAirDensity"] = {
                    "value" : conventionalAirDensity,
                }

                standardUncertDensityOfSampleWeightValue = standardUncertDensityOfSampleWeight(uncertDensitySampleValue)
                data2["standardUncertDensityOfSampleWeight"] = {
                    "value" : standardUncertDensityOfSampleWeightValue,
                }

                standardUncertDensityOfReferenceWeightValue = standardUncertDensityOfReferenceWeight(uncertDensityReferenceValue)
                data2["standardUncertDensityOfReferenceWeight"] = {
                    "value" : standardUncertDensityOfReferenceWeightValue,
                }

                standardUncertApproxAirDensityValue = standardUncertApproxAirDensity(computedDensityUsingMeasuredPressureTempRHValue);
                data2["standardUncertApproxAirDensity"] = {
                    "value" : standardUncertApproxAirDensityValue,
                }
                standardUncertaintyAirBuoyancyCorrectionFactorValue = standardUncertaintyAirBuoyancyCorrectionFactor(cmOfStandard,densityReferenceValue,densitySampleValue, standardUncertApproxAirDensityValue,computedDensityUsingMeasuredPressureTempRHValue,conventionalAirDensity,standardUncertDensityOfSampleWeightValue,standardUncertDensityOfReferenceWeightValue,prevAirDensity)
                data2["standardUncertaintyAirBuoyancyCorrectionFactor"] = {
                    "value" : standardUncertaintyAirBuoyancyCorrectionFactorValue.toFixed(20),
                }

                standardUncertConventionalMassOfReferenceValue = standardUncertConventionalMassOfReference(uncertaintySTDTotalValue,kValue,mpeOfStandard);
                data2["standardUncertConventionalMassOfReference"] = {
                    "value" : standardUncertConventionalMassOfReferenceValue,
                }

                standardUncertaintyBalanceValue = standardUncertaintyBalance(uncertSensitivityOfBalanceUValue.toFixed(20),uncertResolutionOfBalanceUValue.toFixed(20),uncertEccentricLoadingUValue,uncertaintyOfMagneticSusceptibilityUMA)
                data2["standardUncertaintyBalance"] = {
                    "value" : standardUncertaintyBalanceValue,
                }

                uncertReferenceWeightValue = uncertaintyReferenceWeight(uncertaintySTDTotalValue,kValue);
                data2["uncertReferenceWeight"] = {
                    "value" : uncertReferenceWeightValue,
                }

                //OLD arrayForUC = [standardUncertaintyAirBuoyancyCorrectionFactorValue,standardUncertConventionalMassOfReferenceValue,standardUncertaintyWeighingProcessValue,standardUncertaintyBalanceValue];
                //arrayForUC = [standardUncertaintyAirBuoyancyCorrectionFactorValue,uncertReferenceWeightValue,standardUncertaintyWeighingProcessValue,standardUncertaintyBalanceValue];
                //ucValue = uc(arrayForUC)
                ucValue = uc(standardUncertaintyAirBuoyancyCorrectionFactorValue,uncertReferenceWeightValue,standardUncertaintyWeighingProcessValue,standardUncertaintyBalanceValue)
                data2["uc"] = {
                    "value" : ucValue,
                }
                
                ueValue = ue(ucValue,kValue);
                data2["ue"] = {
                    "value" : ueValue,
                }
                
                data2["ueINmg"] = {
                    "value" : ueINmg(ueValue,unitRawData),
                }
                
                allData["Table"+x] = data2;

                let tbodyUncertBalacne = document.getElementById('uncertBudgetTBody');
            let trOfValues = document.createElement("tr");
            let headersValues =[
                "SampleNominalValue",
                // "SampleNominalUnit",
                "sensitivityWeight",
                "standardUncertaintySensitivityWeight",
                "sensitivityWeightDelta",
                "uncertSensitivityWeightDelta",
                "uncertSensitivityOfBalanceU",
                "uncertResolutionOfBalanceU",
                "computedDensityUsingMeasuredPressureTempRH",
                "conventionalAirDensity",
                "standardUncertDensityOfSampleWeight",
                "standardUncertDensityOfReferenceWeight",
                "standardUncertApproxAirDensity",
                "standardUncertaintyAirBuoyancyCorrectionFactor",
                "uncertReferenceWeight",
                "standardUncertaintyWeighingProcess",
                "standardUncertaintyBalance",
                "uc",
                "k",
                "ue",
                "unitRawData",
            ];

            for (let i = 0; i < headersValues.length; i++) {
                let tdValues = document.createElement("td");
                tdValues.innerHTML = allData["Table"+x][headersValues[i]]['value'] ;
                trOfValues.append(tdValues);
            }
            tbodyUncertBalacne.append(trOfValues);
            }

            //document.getElementById('allData').value = JSON.stringify(allData);
            document.getElementById('allData').value = JSON.stringify(allData); 
            $('#calculatedData').val(JSON.stringify(allData));
            //console.log(allData);

            
}
const setDefaultTo0 = (TableNumber) => {
            var table = document.getElementById('Table' + TableNumber);
            var input = table.getElementsByTagName('input');

            for (let index = 0; index < input.length; index++) {
                input[index].defaultValue = 0;
                input['k'].defaultValue = 2;
                input['SampleNominalUnit'].defaultValue = 'g';
                $("input:text").focus(function() {
                    $(this).select();
                });
            }


}
const sumOfSquare = (array) => {
            var sum = 0;
            for (i = 0; i < array.length; i++) {
                num = new Number(array[i]);
                sum += Number(Math.pow(num, 2));
            }
            return parseFloat(sum.toFixed(21));
}
const addCycleToFirstTable = (approx, tableNumber) => {

            var TableBody = document.getElementById('cycleTable' + tableNumber);
            var cycleCount = document.getElementById('cycle').value;
            for (var i = TableBody.rows.length; i > 1; i--) {
                TableBody.removeChild(TableBody.lastElementChild);
            }
            for (var i = 1; i <= cycleCount; i++) {
                    var cycle = addCycles(i);
                    TableBody.appendChild(cycle)
                }
}
const hideRow = (tableId) => {
            var table = document.getElementById(tableId)
            if (table.className == 'fadeIn') {
                table.setAttribute('class', 'fadeOut')
            } else {
                table.setAttribute('class', 'fadeIn')
            }


}
const setCycle = (approx) => {
            if (approx == 'E2' || approx == 'F1') {
                document.getElementById('cycle').value = '5';
            } else {
                document.getElementById('cycle').value = '3';
            }
}
const standardChangeToInput = (valueOfSelect, conventional, uncertainty) => {
            var value = valueOfSelect.split(',');
            var con = value[0];
            var unc = value[1];
            document.getElementById(conventional).value = con;
            document.getElementById(uncertainty).value = unc;
}
const totalConventionalUncertainty = (tableNumber) => {
            var value1 = parseFloat(document.getElementById('ConventionalMassSTDa' + tableNumber).value) || 0;
            var value2 = parseFloat(document.getElementById('ConventionalMassSTDb' + tableNumber).value) || 0;
            var value3 = parseFloat(document.getElementById('ConventionalMassSTDc' + tableNumber).value) || 0;
            var value4 = parseFloat(document.getElementById('ConventionalMassSTDd' + tableNumber).value) || 0;
            var value5 = parseFloat(document.getElementById('ConventionalMassSTDe' + tableNumber).value) || 0;
            var value6 = parseFloat(document.getElementById('UncertaintySTDa' + tableNumber).value) / 1000 || 0;
            var value7 = parseFloat(document.getElementById('UncertaintySTDb' + tableNumber).value) / 1000 || 0;
            var value8 = parseFloat(document.getElementById('UncertaintySTDc' + tableNumber).value) / 1000 || 0;
            var value9 = parseFloat(document.getElementById('UncertaintySTDd' + tableNumber).value) / 1000 || 0;
            var value10 = parseFloat(document.getElementById('UncertaintySTDe' + tableNumber).value) / 1000 || 0;
            document.getElementById('ConventionalMassTotal' + tableNumber).value = value1 + value2 + value3 + value4 +
                value5;
            document.getElementById('UncertaintySTDTotal' + tableNumber).value = value6 + value7 + value8 + value9 +
                value10;
}
const searchForSensitivityTest = (balance) => {
            var testArray = sensitivityTest;
            var resultArray;
            testArray[0].filter(function(e) {
                if(e.balance == balance){
                    resultArray = e;
                }
            })
            return resultArray;

}
const differenceBetweenMaximumAndMinimumValues = () => {
            var result = 0.00049 - (-0.00037);
            return result;
}
const checkCalibrationData = (dateOfCalibStandard) => {
            var x = new Date(dateOfCalibStandard);
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();

            today = yyyy + '-' + mm + '-' + dd;

}
const densityUncertaintySample = (tableNumber, value) => {
            var table = document.getElementById('Table' + tableNumber);
            var input = table.getElementsByTagName('input');
            const valueArray = value.split(",");
            input["uncertDensitySample"].value = valueArray[1];
            input["densitySample"].value = valueArray[0];
}
const densityUncertaintyReference = (tableNumber, value) => {
            var table = document.getElementById('Table' + tableNumber);
            var input = table.getElementsByTagName('input');
            const valueArray = value.split(",");
            input["uncertDensityReference"].value = valueArray[1];
            input["densityReference"].value = valueArray[0];
}
var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
};
function setDate() {
            let d = new Date(document.getElementById("sDate").value)
            let mon = +document.getElementById("recommendedDueDateSelect").value;
            if(mon == '0'){
                document.getElementById("eDate").valueAsDate = null;
            }else{
                d.setMonth(d.getMonth() + mon)
                document.getElementById("eDate").valueAsDate = d;

            }
}
function getCustomerDetails() {
            var customerDetails = document.getElementById('CustomerDetails');
            var customer = document.getElementById('customer');
            var address = document.getElementById('address');
            var idOfCustomer = document.getElementById('idOfCustomer');

            const detailsSplit = customer.value.split(' @ ');
            if (detailsSplit.length > 1) {
                customer.value = detailsSplit[0];
                address.value = detailsSplit[1];
            } else {
                address.value = ''
            }
}
function getStandardDetails(selectNumber, tableNumber) {
            var tableNum = selectNumber;
            var idOfSelected = tableNum.options[tableNum.selectedIndex].getAttribute('data-id');
            var dataOfSelected = filterDataDynamic(idOfSelected, 'id', arrStandardValues);
            var table = document.getElementById('Table' + tableNumber);
            var input = table.getElementsByTagName('input')
            input['StandardIdNumber'].value = dataOfSelected[0]['class'];
            input['StandardSerialNumber'].value = dataOfSelected[0]['serialNumber'];
            input['StandardNominalValue'].value = dataOfSelected[0]['nominalValue'];
            input['StandardNominalUnit'].value = dataOfSelected[0]['nominalUnit'];
}
document.getElementById("sDate").addEventListener("change", setDate)
document.getElementById("recommendedDueDateSelect").addEventListener("change", setDate)
function logoutConfirmation(url) {
            href = ""
            var txt;
            if (confirm("Do you want to logout?")) {
                location.href = url;
            }
}

function addAnotherInfo() {
    numberOfTables +=1;
    var approxClass = document.getElementById('approxClass').value;
    var MainDiv = document.getElementById('TableDiv');
    var container = document.createElement("div");
    container.setAttribute("style", "margin-top:20px;background-color:transparent");
    container.setAttribute("id", "Table"+numberOfTables);

    var FirstP = document.createElement("p");

    FirstP.setAttribute('onclick','hideRow("Table'+numberOfTables+'")');
    container.setAttribute('class','fadeIn');

    
    FirstP.setAttribute("class", "h3");
    FirstP.setAttribute("style", "color:black;");
    FirstP.innerHTML = "Calibration Information #" + numberOfTables;

    //firstDiv
        var firstDivInside = document.createElement("div");
        firstDivInside.setAttribute(
            "style",
            "display:flex;flex-direction: row;margin-bottom:25px;display:flex;justify-content:center"
        );

        var ul = document.createElement("ul");
        ul.setAttribute("class", "list-group list-group-flush");
        var li1 = document.createElement("li");
        li1.setAttribute("class", "list-group-item");
        li1.innerHTML = "Previous Air Density";
        var li2 = document.createElement("li");
        li2.setAttribute("class", "list-group-item");
        var prevAirDensity = document.createElement("input");
        prevAirDensity.setAttribute("class", "form-control");
        prevAirDensity.setAttribute("type", "text");
        prevAirDensity.setAttribute("id", "prevAirDensity");
        prevAirDensity.setAttribute("name", "prevAirDensity");
        prevAirDensity.setAttribute("class", "form-control");
        prevAirDensity.setAttribute("data-group", "raw_data");
        prevAirDensity.setAttribute("tabindex", "-1");
        prevAirDensity.setAttribute(
            "style",
            "background-color: #F1C40F; 1;border-radius:5px"
        );

        li2.appendChild(prevAirDensity);
        ul.appendChild(li1);
        ul.appendChild(li2);
        firstDivInside.appendChild(ul);

        var ul = document.createElement("ul");
        ul.setAttribute("class", "list-group list-group-flush");
        var li1 = document.createElement("li");
        li1.setAttribute("class", "list-group-item");
        li1.innerHTML = "K";
        var li2 = document.createElement("li");
        li2.setAttribute("class", "list-group-item");
        var k = document.createElement("input");
        k.setAttribute("data-group", "raw_data");
        k.setAttribute("class", "form-control");
        k.setAttribute("type", "text");
        k.setAttribute("id", "k");
        k.setAttribute("name", "k");
        k.setAttribute("tabindex", "-1");
        k.setAttribute("value", "2");
        k.setAttribute(
            "style",
            "background-color: #F1C40F;border-radius:5px"
        );

        li2.appendChild(k);
        ul.appendChild(li1);
        ul.appendChild(li2);
        firstDivInside.appendChild(ul);

        var ul = document.createElement("ul");
        ul.setAttribute("class", "list-group list-group-flush");
        var li1 = document.createElement("li");
        li1.setAttribute("class", "list-group-item");
        li1.innerHTML = "SC";
        var li2 = document.createElement("li");
        li2.setAttribute("class", "list-group-item");
        var sc = document.createElement("input");
        sc.setAttribute("data-group", "raw_data");
        sc.setAttribute("class", "form-control");
        sc.setAttribute("type", "text");
        sc.setAttribute("id", "sc");
        sc.setAttribute("name", "sc");
        sc.setAttribute("tabindex", "-1");
        sc.setAttribute("value", "1");
        sc.setAttribute(
            "style",
            "background-color:#F1C40F;border-radius:5px"
        );

        li2.appendChild(sc);
        ul.appendChild(li1);
        ul.appendChild(li2);
        firstDivInside.appendChild(ul);

        container.appendChild(firstDivInside);
    //firstDiv
    //secondDiv
        var secondDivInside = document.createElement("div");
        secondDivInside.setAttribute(
            "style",
            "display:flex;flex-direction: row;margin-bottom:5px;display:flex;justify-content:space-around;align-items:center"
        );

        var div1 = document.createElement("div");
        div1.setAttribute(
            "style",
            "margin-bottom:20px;display:flex;justify-content:center"
        );

        var table = document.createElement("table");
        var tbody = document.createElement("tbody");

        var tr = document.createElement("tr");
        var td1 = document.createElement("td");
        var td2 = document.createElement("td");
        var td3 = document.createElement("td");
        var td4 = document.createElement("td");
        td2.innerHTML = "Material";
        td3.innerHTML = "Density(kg/m3)";
        td4.innerHTML = "Uncertainty of Density";
        tr.appendChild(td1);
        tr.appendChild(td2);
        tr.appendChild(td3);
        tr.appendChild(td4);
        tbody.appendChild(tr);

        var tr = document.createElement("tr");
        var td1 = document.createElement("td");
        var td2 = document.createElement("td");
        var td3 = document.createElement("td");
        var td4 = document.createElement("td");
        var select = document.createElement("select");
        td1.innerHTML = "Sample: ";
        select.setAttribute("class", "form-control");
        select.setAttribute("id", "sampleSelected");
        select.setAttribute('onchange',"densityUncertaintySample("+numberOfTables+",this.value)");
        select.setAttribute("data-group", "raw_data");
        // <?php
        //     echo "var tdNewDensityOptionChoose = document.createElement('option');tdNewDensityOptionChoose.setAttribute('selected','');tdNewDensityOptionChoose.innerHTML = 'Choose';select.appendChild(tdNewDensityOptionChoose);";
        //     for($alloyLoop = 0; $alloyLoop < count($alloyDetails[0]); $alloyLoop++){
        //         echo 'var tdNewDensityOption'.$alloyLoop.'= document.createElement("option");';
        //         echo 'tdNewDensityOption'.$alloyLoop.'.setAttribute("value","'.$alloyDetails[0][$alloyLoop]['density'].','.$alloyDetails[0][$alloyLoop]['uncertainty'].','.$alloyDetails[0][$alloyLoop]['material'].'");';
        //         echo 'tdNewDensityOption'.$alloyLoop.'.innerHTML ="'.$alloyDetails[0][$alloyLoop]['material'].'";';
        //         echo 'select.appendChild(tdNewDensityOption'.$alloyLoop.');';
        //     }
        // ?>

        var densitySample = document.createElement("input");
        densitySample.setAttribute("data-group", "raw_data");
        densitySample.setAttribute("class", "form-control");
        densitySample.setAttribute("type", "text");
        densitySample.setAttribute("id", "densitySample");
        densitySample.setAttribute("name", "densitySample");
        densitySample.setAttribute("tabindex", "-1");
        densitySample.setAttribute(
            "style",
            "background-color:#F1C40F;border-radius:5px"
        );
        var uncertDensitySample = document.createElement("input");
        uncertDensitySample.setAttribute("data-group", "raw_data");
        uncertDensitySample.setAttribute("class", "form-control");
        uncertDensitySample.setAttribute("type", "text");
        uncertDensitySample.setAttribute("id", "uncertDensitySample");
        uncertDensitySample.setAttribute("name", "uncertDensitySample");
        uncertDensitySample.setAttribute("tabindex", "-1");
        uncertDensitySample.setAttribute(
            "style",
            "background-color:#F1C40F;border-radius:5px"
        );

        td2.appendChild(select);
        td3.appendChild(densitySample);
        td4.appendChild(uncertDensitySample);
        tr.appendChild(td1);
        tr.appendChild(td2);
        tr.appendChild(td3);
        tr.appendChild(td4);
        tbody.appendChild(tr);

        var tr = document.createElement("tr");
        var td1 = document.createElement("td");
        var td2 = document.createElement("td");
        var td3 = document.createElement("td");
        var td4 = document.createElement("td");
        var select = document.createElement("select");
        select.setAttribute("data-group", "raw_data");
        td1.innerHTML = "Reference: ";
        select.setAttribute("class", "form-control");
        select.setAttribute("id", "referenceSelected");
        select.setAttribute('onchange',"densityUncertaintyReference("+numberOfTables+",this.value)");
        // <?php
        //     echo "var tdNewDensityOptionChoose = document.createElement('option');tdNewDensityOptionChoose.setAttribute('selected','');tdNewDensityOptionChoose.innerHTML = 'Choose';select.appendChild(tdNewDensityOptionChoose);";
        //     for($alloyLoop = 0; $alloyLoop < count($alloyDetails[0]); $alloyLoop++){
        //         echo 'var tdNewDensityOption'.$alloyLoop.'= document.createElement("option");';
        //         echo 'tdNewDensityOption'.$alloyLoop.'.setAttribute("value","'.$alloyDetails[0][$alloyLoop]['density'].','.$alloyDetails[0][$alloyLoop]['uncertainty'].','.$alloyDetails[0][$alloyLoop]['material'].'");';
        //         echo 'tdNewDensityOption'.$alloyLoop.'.innerHTML ="'.$alloyDetails[0][$alloyLoop]['material'].'";';
        //         echo 'select.appendChild(tdNewDensityOption'.$alloyLoop.');';
        //     }
        // ?>

        var densityReference = document.createElement("input");
        densityReference.setAttribute("data-group", "raw_data");
        densityReference.setAttribute("class", "form-control");
        densityReference.setAttribute("type", "text");
        densityReference.setAttribute("id", "densityReference");
        densityReference.setAttribute("name", "densityReference");
        densityReference.setAttribute("tabindex", "-1");
        densityReference.setAttribute(
            "style",
            "background-color:#F1C40F;border-radius:5px"
        );
        var uncertDensityReference = document.createElement("input");
        uncertDensityReference.setAttribute("data-group", "raw_data");
        uncertDensityReference.setAttribute("class", "form-control");
        uncertDensityReference.setAttribute("type", "text");
        uncertDensityReference.setAttribute("id", "uncertDensityReference");
        uncertDensityReference.setAttribute("name", "uncertDensityReference");
        uncertDensityReference.setAttribute("tabindex", "-1");
        uncertDensityReference.setAttribute(
            "style",
            "background-color:#F1C40F;border-radius:5px"
        );

        td2.appendChild(select);
        td3.appendChild(densityReference);
        td4.appendChild(uncertDensityReference);
        tr.appendChild(td1);
        tr.appendChild(td2);
        tr.appendChild(td3);
        tr.appendChild(td4);
        tbody.appendChild(tr);

        var div2 = document.createElement("div");
        div2.setAttribute(
            "style",
            "margin-bottom:20px;display:flex;justify-content:center"
        );

        var ul = document.createElement("ul");
        ul.setAttribute("class", "list-group list-group-flush");
        var li1 = document.createElement("li");
        li1.setAttribute("class", "list-group-item");
        li1.innerHTML = "Comparator:";
        var li2 = document.createElement("li");
        li2.setAttribute("class", "list-group-item");
        var select = document.createElement("select");
        var option1 = document.createElement("option");
        select.setAttribute("data-group", "raw_data");
        select.setAttribute ('class','form-control');
        select.setAttribute('id','comparator');
        select.setAttribute('onchange','setBalanceReso("Table'+numberOfTables+'")');
        option1.setAttribute('selected','');
        option1.innerHTML = "Choose...";
        select.appendChild(option1);
        for (let i = 0; i < sensitivityTest[0].length; i++) {
            var option = document.createElement("option");
            option.setAttribute('value',sensitivityTest[0][i]['balance']);	
            option.innerHTML = sensitivityTest[0][i]['balance'];
            select.appendChild(option);
        }
        li2.appendChild(select);
        ul.appendChild(li1);
        ul.appendChild(li2);
        div2.appendChild(ul);

        var ul = document.createElement("ul");
        ul.setAttribute("class", "list-group list-group-flush");
        var li1 = document.createElement("li");
        li1.setAttribute("class", "list-group-item");
        li1.innerHTML = "Balance Resolution";
        var li2 = document.createElement("li");
        li2.setAttribute("class", "list-group-item");
        var balanceReso = document.createElement("input");
        balanceReso.setAttribute("data-group", "raw_data");
        balanceReso.setAttribute("class", "form-control");
        balanceReso.setAttribute("type", "text");
        balanceReso.setAttribute("id", "balanceReso");
        balanceReso.setAttribute("name", "balanceReso");
        balanceReso.setAttribute("tabindex", "-1");
        balanceReso.setAttribute(
            "style",
            "background-color:#F1C40F;border-radius:5px"
        );

        li2.appendChild(balanceReso);
        ul.appendChild(li1);
        ul.appendChild(li2);
        div2.appendChild(ul);

        table.appendChild(tbody);
        div1.appendChild(table);
        secondDivInside.appendChild(div1);
        secondDivInside.appendChild(div2);
        container.appendChild(secondDivInside);

    //secondDiv
    //thirdDiv
        var thirdDivInside = document.createElement("div");
        thirdDivInside.setAttribute(
            "style",
            "margin-bottom:5px;display:flex;justify-content:center"
        );

        var div1 = document.createElement("div");
        div1.setAttribute("class","input-group mb-3");
        var div2 = document.createElement("div");
        div2.setAttribute("class","input-group-prepend");
        var span = document.createElement("span");
        span.setAttribute("class","input-group-text");
        span.innerHTML = "Sample:"
        div2.appendChild(span);
        var input1 = document.createElement("input");
        input1.setAttribute("data-group", "raw_data");
        input1.setAttribute("type","text");
        input1.setAttribute("class","form-control");
        input1.setAttribute("id","SampleNominalValue");
        input1.setAttribute("placeholder","Nominal Value");
        input1.setAttribute("onchange","setBalanceReso('Table"+numberOfTables+"')");
        var select = document.createElement("select");
        select.setAttribute("data-group", "raw_data");
        var option2 = document.createElement("option");
        var option3 = document.createElement("option");
        var option4 = document.createElement("option");
        option2.setAttribute('value','mg');
        option3.setAttribute('value','g');
        option4.setAttribute('value','kg');
        option2.innerHTML = "mg"
        option3.innerHTML = "g"
        option4.innerHTML = "kg"
        select.setAttribute("class","form-control input-group-append");
        select.setAttribute("id","SampleNominalUnit");
        select.setAttribute("onchange","setBalanceReso('Table"+numberOfTables+"');getWeight("+numberOfTables+")");
        var input2 = document.createElement("input");
        input2.setAttribute("data-group", "raw_data");
        input2.setAttribute("type","text");
        input2.setAttribute("class","form-control");
        input2.setAttribute("id","SampleMarking");
        input2.setAttribute("placeholder","Marking");
        var input3 = document.createElement("input");
        input3.setAttribute("data-group", "raw_data");
        input3.setAttribute("type","text");
        input3.setAttribute("hidden","");
        input3.setAttribute("class","form-control");
        input3.setAttribute("id","SampleSerialNumber");
        input3.setAttribute("placeholder","Serial Number");
        var input4 = document.createElement("input");
        input4.setAttribute("data-group", "raw_data");
        input4.setAttribute("type","text");
        input4.setAttribute("hidden","");
        input4.setAttribute("class","form-control");
        input4.setAttribute("id","SampleIdNumber");
        input4.setAttribute("placeholder","Identification Number");
        var input5 = document.createElement("input");
        input5.setAttribute("data-group", "raw_data");
        input5.setAttribute("type","text");
        input5.setAttribute("hidden","");
        input5.setAttribute("class","form-control");
        input5.setAttribute("id","SampleManufacturer");
        input5.setAttribute("placeholder","Manufacturer");


        select.appendChild(option2);
        select.appendChild(option3);
        select.appendChild(option4);
        div1.appendChild(div2);
        div1.appendChild(input1);
        div1.appendChild(select);
        div1.appendChild(input2);
        div1.appendChild(input3);
        div1.appendChild(input4);
        div1.appendChild(input5);

        thirdDivInside.appendChild(div1);

        container.appendChild(thirdDivInside);
    //thirdDiv
    //fourthDiv
        var fourthDivInside = document.createElement("div");
        fourthDivInside.setAttribute(
            "style",
            "display:flex;flex-direction: row;margin-bottom:5px;display:flex;justify-content:space-around;align-items:center"
        );

        var div = document.createElement("div");
        div.setAttribute(
            "style",
            "margin-bottom:20px;display:flex;justify-content:center"
        );

        var table = document.createElement("table");
        var tbody = document.createElement("tbody");

        var tr = document.createElement("tr");
        var td1 = document.createElement("td");
        var td2 = document.createElement("td");
        var td3 = document.createElement("td");
        td2.innerHTML = "Start";
        td3.innerHTML = "Finish";
        tr.appendChild(td1);
        tr.appendChild(td2);
        tr.appendChild(td3);
        tbody.appendChild(tr);

        var tr = document.createElement("tr");
        var td1 = document.createElement("td");
        var td2 = document.createElement("td");
        var td3 = document.createElement("td");
        var input1 = document.createElement("input");
        var input2 = document.createElement("input");
        input1.setAttribute('id','TemperatureStart');
        input1.setAttribute('style','border-radius:5px');
        input1.setAttribute('type','text');
        input1.setAttribute('class','form-control');
        input1.setAttribute("data-group", "raw_data");
        input2.setAttribute("data-group", "raw_data");
        input2.setAttribute('id','TemperatureFinish');
        input2.setAttribute('style','border-radius:5px');
        input2.setAttribute('type','text');
        input2.setAttribute('class','form-control');
        td1.innerHTML = "Temparature (C):";
        td2.appendChild(input1);
        td3.appendChild(input2);
        tr.appendChild(td1);
        tr.appendChild(td2);
        tr.appendChild(td3);
        tbody.appendChild(tr);

        var tr = document.createElement("tr");
        var td1 = document.createElement("td");
        var td2 = document.createElement("td");
        var td3 = document.createElement("td");
        var input1 = document.createElement("input");
        var input2 = document.createElement("input");
        input1.setAttribute('id','HumidityStart');
        input1.setAttribute('style','border-radius:5px');
        input1.setAttribute('type','text');
        input1.setAttribute('class','form-control');
        input1.setAttribute("data-group", "raw_data");
        input2.setAttribute("data-group", "raw_data");
        input2.setAttribute('id','HumidityFinish');
        input2.setAttribute('style','border-radius:5px');
        input2.setAttribute('type','text');
        input2.setAttribute('class','form-control');
        td1.innerHTML = "Humidity (%RH):";
        td2.appendChild(input1);
        td3.appendChild(input2);
        tr.appendChild(td1);
        tr.appendChild(td2);
        tr.appendChild(td3);
        tbody.appendChild(tr);

        var tr = document.createElement("tr");
        var td1 = document.createElement("td");
        var td2 = document.createElement("td");
        var td3 = document.createElement("td");
        var input1 = document.createElement("input");
        var input2 = document.createElement("input");
        input1.setAttribute('id','PressureStart');
        input1.setAttribute('style','border-radius:5px');
        input1.setAttribute('type','text');
        input1.setAttribute('class','form-control');
        input1.setAttribute("data-group", "raw_data");
        input2.setAttribute("data-group", "raw_data");
        input2.setAttribute('id','PressureFinish');
        input2.setAttribute('style','border-radius:5px');
        input2.setAttribute('type','text');
        input2.setAttribute('class','form-control');
        td1.innerHTML = "Pressure (hPa):";
        td2.appendChild(input1);
        td3.appendChild(input2);
        tr.appendChild(td1);
        tr.appendChild(td2);
        tr.appendChild(td3);
        tbody.appendChild(tr);

        table.appendChild(tbody);
        div.appendChild(table)
        fourthDivInside.appendChild(div);
        container.appendChild(fourthDivInside);

        var div = document.createElement("div");
        div.setAttribute(
            "style",
            "margin-bottom:20px;display:flex;justify-content:center"
        );

        var table = document.createElement("table");
        var thead = document.createElement("thead");
        var tbody = document.createElement("tbody");

        var tr = document.createElement("tr");
        tr.setAttribute('style','text-align:center');
        var th = document.createElement("th");
        th.setAttribute('col','3');
        th.innerHTML = '<h4>Standard Used</h4>';
        tr.appendChild(th);
        thead.appendChild(tr);

        var tr = document.createElement("tr");
        var th1 = document.createElement("th");
        var th2 = document.createElement("th");
        var th3 = document.createElement("th");
        var th4 = document.createElement("th");
        th1.innerHTML = 'Std. Code';
        th2.innerHTML = 'Conventional Mass';
        th3.innerHTML = 'Uncertainty of Measurement (mg)';
        th4.innerHTML = '1/3 of MPE of Standard (mg converted to g)';
        tr.appendChild(th1);
        tr.appendChild(th2);
        tr.appendChild(th3);
        thead.appendChild(tr);
        table.appendChild(thead);

        var tr = document.createElement("tr");
        var td1 = document.createElement("td");
        var td2 = document.createElement("td");
        var td3 = document.createElement("td");
        var select = document.createElement("select");
        select.setAttribute("data-group", "raw_data");
        var option = document.createElement("option");
        select.setAttribute('class','form-control');
        select.setAttribute('id','STDa'+numberOfTables);
        // select.setAttribute('onchange',"standardChangeToInput(this.value,'ConventionalMassSTDa"+numberOfTables+"','UncertaintySTDa"+numberOfTables+"');totalConventionalUncertainty('"+numberOfTables+"')");
        select.setAttribute('onchange',"selectMPE(this.id,'MPESTDa"+numberOfTables+"');getStandardDetails(this,"+numberOfTables+");standardChangeToInput(this.value,'ConventionalMassSTDa"+numberOfTables+"','UncertaintySTDa"+numberOfTables+"');totalConventionalUncertainty('"+numberOfTables+"')");
        option.setAttribute('value', ',,');
        option.innerHTML = "Choose...";
        var input1 = document.createElement("input");
        input1.setAttribute("data-group", "raw_data");
        input1.setAttribute('id','ConventionalMassSTDa'+numberOfTables);
        input1.setAttribute('style','background-color:#F1C40F;border-radius:5px');
        input1.setAttribute('type','text');
        input1.setAttribute('class','form-control');
        input1.setAttribute('tabindex','-1');
        var input2 = document.createElement("input");
        input2.setAttribute("data-group", "raw_data");
        input2.setAttribute('id','UncertaintySTDa'+numberOfTables);
        input2.setAttribute('style','background-color:#F1C40F;border-radius:5px');
        input2.setAttribute('type','text');
        input2.setAttribute('class','form-control');
        input2.setAttribute('tabindex','-1');

        var td4 = document.createElement("td");
        var input3 = document.createElement("input");
        input3.setAttribute("data-group", "raw_data");
        input3.setAttribute('id','MPESTDa'+numberOfTables);
        input3.setAttribute('style','background-color:#F1C40F;border-radius:5px');
        input3.setAttribute('type','hidden');
        input3.setAttribute('class','form-control');
        input3.setAttribute('tabindex','-1');

        select.appendChild(option);
        td1.appendChild(select);
        td2.appendChild(input1);
        td3.appendChild(input2);
        td4.appendChild(input3);

        tr.appendChild(td1);
        tr.appendChild(td2);
        tr.appendChild(td3);
        tr.appendChild(td4);
        tbody.appendChild(tr);
        table.appendChild(tbody);

        var tr = document.createElement("tr");
        var td1 = document.createElement("td");
        var td2 = document.createElement("td");
        var td3 = document.createElement("td");
        var select = document.createElement("select");
        select.setAttribute("data-group", "raw_data");
        var option = document.createElement("option");
        select.setAttribute('class','form-control');
        select.setAttribute('id','STDb'+numberOfTables);
        select.setAttribute('onchange',"selectMPE(this.id,'MPESTDb"+numberOfTables+"');standardChangeToInput(this.value,'ConventionalMassSTDb"+numberOfTables+"','UncertaintySTDb"+numberOfTables+"');totalConventionalUncertainty('"+numberOfTables+"')");
        option.setAttribute('value',',,');
        option.innerHTML = "Choose...";
        var input1 = document.createElement("input");
        input1.setAttribute("data-group", "raw_data");
        input1.setAttribute('id','ConventionalMassSTDb'+numberOfTables);
        input1.setAttribute('style','background-color:#F1C40F;border-radius:5px');
        input1.setAttribute('type','text');
        input1.setAttribute('class','form-control');
        input1.setAttribute('tabindex','-1');
        var input2 = document.createElement("input");
        input2.setAttribute("data-group", "raw_data");
        input2.setAttribute('id','UncertaintySTDb'+numberOfTables);
        input2.setAttribute('style','background-color:#F1C40F;border-radius:5px');
        input2.setAttribute('type','text');
        input2.setAttribute('class','form-control');
        input2.setAttribute('tabindex','-1');

        var td4 = document.createElement("td");
        var input3 = document.createElement("input");
        input3.setAttribute("data-group", "raw_data");
        input3.setAttribute('id','MPESTDb'+numberOfTables);
        input3.setAttribute('style','background-color:#F1C40F;border-radius:5px');
        input3.setAttribute('type','hidden');
        input3.setAttribute('class','form-control');
        input3.setAttribute('tabindex','-1');
        
        select.appendChild(option);
        td1.appendChild(select);
        td2.appendChild(input1);
        td3.appendChild(input2);
        td4.appendChild(input3);

        tr.appendChild(td1);
        tr.appendChild(td2);
        tr.appendChild(td3);
        tr.appendChild(td4);
        tbody.appendChild(tr);
        table.appendChild(tbody);

        var tr = document.createElement("tr");
        var td1 = document.createElement("td");
        var td2 = document.createElement("td");
        var td3 = document.createElement("td");
        var select = document.createElement("select");
        select.setAttribute("data-group", "raw_data");
        var option = document.createElement("option");
        select.setAttribute('class','form-control');
        select.setAttribute('id','STDc'+numberOfTables);
        select.setAttribute('onchange',"selectMPE(this.id,'MPESTDc"+numberOfTables+"');standardChangeToInput(this.value,'ConventionalMassSTDc"+numberOfTables+"','UncertaintySTDc"+numberOfTables+"');totalConventionalUncertainty('"+numberOfTables+"')");
        option.setAttribute('value',',,');
        option.innerHTML = "Choose...";
        var input1 = document.createElement("input");
        input1.setAttribute("data-group", "raw_data");
        input1.setAttribute('id','ConventionalMassSTDc'+numberOfTables);
        input1.setAttribute('style','background-color:#F1C40F;border-radius:5px');
        input1.setAttribute('type','text');
        input1.setAttribute('class','form-control');
        input1.setAttribute('tabindex','-1');
        var input2 = document.createElement("input");
        input2.setAttribute("data-group", "raw_data");
        input2.setAttribute('id','UncertaintySTDc'+numberOfTables);
        input2.setAttribute('style','background-color:#F1C40F;border-radius:5px');
        input2.setAttribute('type','text');
        input2.setAttribute('class','form-control');
        input2.setAttribute('tabindex','-1');
        var td4 = document.createElement("td");
        var input3 = document.createElement("input");
        input3.setAttribute("data-group", "raw_data");
        input3.setAttribute('id','MPESTDc'+numberOfTables);
        input3.setAttribute('style','background-color:#F1C40F;border-radius:5px');
        input3.setAttribute('type','hidden');
        input3.setAttribute('class','form-control');
        input3.setAttribute('tabindex','-1');

        select.appendChild(option);
        td1.appendChild(select);
        td2.appendChild(input1);
        td3.appendChild(input2);
        td4.appendChild(input3);

        tr.appendChild(td1);
        tr.appendChild(td2);
        tr.appendChild(td3);
        tr.appendChild(td4);
        tbody.appendChild(tr);
        table.appendChild(tbody);

        var tr = document.createElement("tr");
        var td1 = document.createElement("td");
        var td2 = document.createElement("td");
        var td3 = document.createElement("td");
        var select = document.createElement("select");
        select.setAttribute("data-group", "raw_data");
        var option = document.createElement("option");
        select.setAttribute('class','form-control');
        select.setAttribute('id','STDd'+numberOfTables);
        select.setAttribute('onchange',"selectMPE(this.id,'MPESTDd"+numberOfTables+"');standardChangeToInput(this.value,'ConventionalMassSTDd"+numberOfTables+"','UncertaintySTDd"+numberOfTables+"');totalConventionalUncertainty('"+numberOfTables+"')");
        option.setAttribute('value',',,');
        option.innerHTML = "Choose...";
        var input1 = document.createElement("input");
        input1.setAttribute("data-group", "raw_data");
        input1.setAttribute('id','ConventionalMassSTDd'+numberOfTables);
        input1.setAttribute('style','background-color:#F1C40F;border-radius:5px');
        input1.setAttribute('type','text');
        input1.setAttribute('class','form-control');
        input1.setAttribute('tabindex','-1');
        var input2 = document.createElement("input");
        input2.setAttribute("data-group", "raw_data");
        input2.setAttribute('id','UncertaintySTDd'+numberOfTables);
        input2.setAttribute('style','background-color:#F1C40F;border-radius:5px');
        input2.setAttribute('type','text');
        input2.setAttribute('class','form-control');
        input2.setAttribute('tabindex','-1');
        var td4 = document.createElement("td");
        var input3 = document.createElement("input");
        input3.setAttribute("data-group", "raw_data");
        input3.setAttribute('id','MPESTDd'+numberOfTables);
        input3.setAttribute('style','background-color:#F1C40F;border-radius:5px');
        input3.setAttribute('type','hidden');
        input3.setAttribute('class','form-control');
        input3.setAttribute('tabindex','-1');

        select.appendChild(option);
        td1.appendChild(select);
        td2.appendChild(input1);
        td3.appendChild(input2);
        td4.appendChild(input3);

        tr.appendChild(td1);
        tr.appendChild(td2);
        tr.appendChild(td3);
        tr.appendChild(td4);
        tbody.appendChild(tr);
        table.appendChild(tbody);

        var tr = document.createElement("tr");
        var td1 = document.createElement("td");
        var td2 = document.createElement("td");
        var td3 = document.createElement("td");
        var select = document.createElement("select");
        select.setAttribute("data-group", "raw_data");
        var option = document.createElement("option");
        select.setAttribute('class','form-control');
        select.setAttribute('id','STDe'+numberOfTables);
        select.setAttribute('onchange',"selectMPE(this.id,'MPESTDe"+numberOfTables+"');standardChangeToInput(this.value,'ConventionalMassSTDe"+numberOfTables+"','UncertaintySTDe"+numberOfTables+"');totalConventionalUncertainty('"+numberOfTables+"')");
        option.setAttribute('value',',,');
        option.innerHTML = "Choose...";
        var input1 = document.createElement("input");
        input1.setAttribute("data-group", "raw_data");
        input1.setAttribute('id','ConventionalMassSTDe'+numberOfTables);
        input1.setAttribute('style','background-color:#F1C40F;border-radius:5px');
        input1.setAttribute('type','text');
        input1.setAttribute('class','form-control');
        input1.setAttribute('tabindex','-1');
        var input2 = document.createElement("input");
        input2.setAttribute("data-group", "raw_data");
        input2.setAttribute('id','UncertaintySTDe'+numberOfTables);
        input2.setAttribute('style','background-color:#F1C40F;border-radius:5px');
        input2.setAttribute('type','text');
        input2.setAttribute('class','form-control');
        input2.setAttribute('tabindex','-1');
        var td4 = document.createElement("td");
        var input3 = document.createElement("input");
        input3.setAttribute("data-group", "raw_data");
        input3.setAttribute('id','MPESTDe'+numberOfTables);
        input3.setAttribute('style','background-color:#F1C40F;border-radius:5px');
        input3.setAttribute('type','hidden');
        input3.setAttribute('class','form-control');
        input3.setAttribute('tabindex','-1');


        select.appendChild(option);
        td1.appendChild(select);
        td2.appendChild(input1);
        td3.appendChild(input2);
        td4.appendChild(input3);

        tr.appendChild(td1);
        tr.appendChild(td2);
        tr.appendChild(td3);
        tr.appendChild(td4);
        tbody.appendChild(tr);
        table.appendChild(tbody);

        var tr = document.createElement("tr");
        var td1 = document.createElement("td");
        var td2 = document.createElement("td");
        var td3 = document.createElement("td");
        td1.innerHTML = "Total";
        var input1 = document.createElement("input");
        input1.setAttribute("data-group", "raw_data");
        input1.setAttribute('id','ConventionalMassTotal'+numberOfTables);
        input1.setAttribute('style','background-color:#F1C40F;border-radius:5px');
        input1.setAttribute('type','text');
        input1.setAttribute('class','form-control');
        input1.setAttribute('tabindex','-1');
        var input2 = document.createElement("input");
        input2.setAttribute("data-group", "raw_data");
        input2.setAttribute('id','UncertaintySTDTotal'+numberOfTables);
        input2.setAttribute('style','background-color:#F1C40F;border-radius:5px');
        input2.setAttribute('type','text');
        input2.setAttribute('class','form-control');
        input2.setAttribute('tabindex','-1');
        var td4 = document.createElement("td");
        var input3 = document.createElement("input");
        input3.setAttribute("data-group", "raw_data");
        input3.setAttribute('id','MPESTDTotal'+numberOfTables);
        input3.setAttribute('style','background-color:#F1C40F;border-radius:5px');
        input3.setAttribute('type','hidden');
        input3.setAttribute('class','form-control');
        input3.setAttribute('tabindex','-1');

        td2.appendChild(input1);
        td3.appendChild(input2);
        td4.appendChild(input3);

        tr.appendChild(td1);
        tr.appendChild(td2);
        tr.appendChild(td3);
        tr.appendChild(td4);
        tbody.appendChild(tr);
        table.appendChild(tbody);

        div.appendChild(table)
        fourthDivInside.appendChild(div);
        container.appendChild(fourthDivInside);

    //fourthDiv
    //fifthDiv
        var fifthDivInside = document.createElement("div");
        fifthDivInside.setAttribute(
            "style",
            "margin-bottom:50px;display:flex;justify-content:center"
        );
        var table = document.createElement("table");
        var tbody = document.createElement("tbody");
        tbody.setAttribute('id','cycleTable'+numberOfTables);
        var tr = document.createElement("tr");
        var td1 = document.createElement("td");
        var td2 = document.createElement("td");
        var td3 = document.createElement("td");
        var td4 = document.createElement("td");
        var td5 = document.createElement("td");
        var tdEnd = document.createElement("td");
        var tdFront = document.createElement("td");

        var hiddenInput1 = document.createElement("input");
        var hiddenInput2 = document.createElement("input");
        var hiddenInput3 = document.createElement("input");
        var hiddenInput4 = document.createElement("input");

        hiddenInput1.setAttribute("data-group", "raw_data");
        hiddenInput2.setAttribute("data-group", "raw_data");
        hiddenInput3.setAttribute("data-group", "raw_data");
        hiddenInput4.setAttribute("data-group", "raw_data");

        var select = document.createElement('select');
        var option1 = document.createElement('option');
        var option2 = document.createElement('option');
        var option3 = document.createElement('option');
        select.setAttribute('id','unitRawData');
        select.setAttribute('data-group','raw_data');
        option2.setAttribute('selected','');
        option1.setAttribute('value','mg');
        option2.setAttribute('value','g');
        option3.setAttribute('value','kg');
        option1.innerHTML = "mg";
        option2.innerHTML = "g";
        option3.innerHTML = "kg";
        hiddenInput1.setAttribute("type",'hidden');
        hiddenInput1.setAttribute("id",'StandardIdNumber');
        hiddenInput2.setAttribute("type",'hidden');
        hiddenInput2.setAttribute("id",'StandardSerialNumber');
        hiddenInput3.setAttribute("type",'hidden');
        hiddenInput3.setAttribute("id",'StandardNominalValue');
        hiddenInput4.setAttribute("type",'hidden');
        hiddenInput4.setAttribute("id",'StandardNominalUnit');

        select.appendChild(option1);
        select.appendChild(option2);
        select.appendChild(option3);

        td1.setAttribute('style','width:50px');
        td1.appendChild(select);
        td2.innerHTML = 'A1';
        td3.innerHTML = 'B1';
        td4.innerHTML = 'B2';
        td5.innerHTML = 'A2';

        tr.appendChild(tdFront);
        tr.appendChild(td1);
        tr.appendChild(td2);
        tr.appendChild(td3);
        tr.appendChild(td4);
        tr.appendChild(td5);
        tr.appendChild(tdEnd);
        tbody.appendChild(tr);
        table.appendChild(tbody);
        fifthDivInside.appendChild(table);
        fifthDivInside.appendChild(hiddenInput1);
        fifthDivInside.appendChild(hiddenInput2);
        fifthDivInside.appendChild(hiddenInput3);
        fifthDivInside.appendChild(hiddenInput4);
        container.appendChild(fifthDivInside);
    //fifthDiv
    //sixthDIv
       
        
        var sixthDivInside = document.createElement("div");
        sixthDivInside.setAttribute(
            "style",
            ""
        );
        sixthDivInside.setAttribute(
            "class",
            "table-responsive hidden"
        );
        
        container.appendChild(sixthDivInside);
    //sixthDIv
    MainDiv.appendChild(FirstP);
    MainDiv.appendChild(container);
    addCycleToFirstTable(approxClass, numberOfTables);
    getWeight(numberOfTables,',,',',,',',,',',,',',,');
    
}
function checkCertNum() {
    var search = document.getElementById('certificateNumber').value;
    var certNum = document.getElementById('certificateNumber');
    $.ajax({
        cache: false,
        type: "post",
        url: "/testWeight/checkCertificateNumber",
        data: {
            'q': search
        },
        success: function(result) {
            if (result == 'true') {
                certNum.setAttribute('style', 'background-color:rgba(255,0,0,0.5)')
            } else {
                certNum.setAttribute('style', 'background-color:rgba(0,255,0,0.5)')
            }
            window.setTimeout(checkCertNum, 5000);
        },
    })
}

function deleteTable() {
    var tablediv = document.getElementById('TableDiv');
    for (let index = 0; index < 2; index++) {
        var lastChild = tablediv.lastElementChild;
        tablediv.removeChild(lastChild);
    }
    numberOfTables -= 1;
}
