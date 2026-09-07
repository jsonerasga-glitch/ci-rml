
var standardDataBuffer = {};
var standardDataDocumentingProcess = {};
var standardDataMultiProduct = {};

$(document).ready(function() {
    addCustomerList();
    addPersonnel();
    getStandardBuffer();
    addStandardToTableBufferSolution();
    getStandardMultiProduct();
    addStandardToTableMultiProductCalibrator();
    getStandardDocumentingProcess();
    addStandardToTableDocumentingProcessCalibrator();
    binds();
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
        addRawTestForMeterDataTable();
    });
    bind('deleteTable','click',function(){
        removeMeterDataTable()
    });
    bind('modalStandardButton','click',function(){
        $('#modalStandard').modal('show');
    });

    bind('modalStandardButtonCalibrator','click',function(){
        $('#modalStandardCalibrator').modal('show');
    });

    bind('calculateButton','click',function(){
        calculateWithErrorHandling();
    });
    bind('modalStandardSelect','click',function(){
        selectStandard();
        $('#modalStandard').modal('hide');
    });

    bind('modalStandardSelectCalibrator','click',function(){
        selectStandard();
        $('#modalStandardCalibrator').modal('hide');
    });

    bind('dateCalibrated','change',function(){
        setDate();
    });
    bind('recommendedDueDateSelect','change',function(){
        setDate();
    });

    bind('checkedBy','change',function(){
        copyFromDataset('checkedBy', 'verifierPosition', 'verifierposition')
        getEmailOfVerifier('checkedBy');
    }); 
    bind('verifierPosition','change',function(){
        copyFromDataset('verifierPosition', 'checkedBy', 'verifiername')
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

function getEmailOfVerifier(copyFrom){
    var from = document.getElementById(copyFrom);
    var verifierEmail = document.getElementById('verifierEmail');
    verifierEmail.value = from.selectedOptions[0].dataset['email'];
}

function personnelFromDatabase(officer_ID, verifier_ID, position_ID, officer_db, verifier_db, position_db){
    $('#'+officer_ID).val(officer_db);
    $('#'+verifier_ID).val(verifier_db);
    $('#'+position_ID).val(position_db);
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

function getAverageOfEnvironment(start, end, average){
    let startVal = parseFloat(document.getElementById(start).value);
    let endVal = parseFloat(document.getElementById(end).value);
    document.getElementById(average).value = (startVal+endVal)/2;
}

/**get array of buffer solution*/
let standardBuffer = [];
function getStandardBuffer(){
    $.ajax({
        cache: false,
        async: false,
        type: "post",
        url: "/standard/bufferSolution/getStandardDataBufferSolution",
        success: function(result) {
            standardBuffer = result.standardData;
            // addStandardToTableBufferSolution();
            // $('#modalStandardTable').DataTable();   
        },
        error: function (error) {
            console.log(error);
        },
    });
}
function addStandardToTableBufferSolution() {
    let tableBodyA = $('#standardTableTbody');
    tableBodyA.empty(); 
    let today = new Date();
    standardBuffer.forEach(item => {
        let dateOfCalibration = new Date(item.dateOfCalibration);
        let dueDate = new Date(dateOfCalibration.setFullYear(dateOfCalibration.getFullYear() + 1));
        let oneMonthBeforeDue = new Date(dueDate);
        oneMonthBeforeDue.setMonth(oneMonthBeforeDue.getMonth() - 1);
        let suffix = 'days left before due date';

        let bgColor = 'background-color:rgba(0,128,0,0.5)'; // Default color
        let disabled = false;
       

        if (today >= oneMonthBeforeDue && today < dueDate) {
            bgColor = 'background-color:rgba(255,165,0,0.5)'; // Warning color
        } else if (today >= dueDate) {
            bgColor = 'background-color:rgba(255,0,0,0.5)'; // Overdue color
            disabled = false;
            suffix = 'days over due date';
        }

        let days_due = Math.round(Math.abs((today - dueDate) / (24 * 60 * 60 * 1000)));

        let row = $('<tr>').attr('style', bgColor);
        // let row = $('<tr>');
        let checkBoxTD = $('<td>');
        let standardTD = $('<td>');
        let certificateNumberTD = $('<td>');
        let descriptionTD = $('<td>');
        let providerTD = $('<td>');
        let daysDueTD = $('<td>');
        let checkbox = $('<input>').attr({
            'type': 'checkbox',
            'id': item['certificateNumber'],
            'data-group': 'standardCheckBox',
            'data-collection': 'standardCheckBox', 
            'value': item['certificateNumber'],
        });
        let pHValue = $('<label>').text(item['pHValue']).attr('for', item['certificateNumber']);
        let certificateNumber = $('<label>').text(item['certificateNumber']).attr('for', item['certificateNumber']);
        let description = $('<label>').text(item['description']).attr('for', item['certificateNumber']);
        let provider = $('<label>').text(item['calibrationProvider']).attr('for', item['certificateNumber']);
        let daysDue = $('<label>').text(days_due + ' ' + suffix).attr('for', item['certificateNumber'])

        checkBoxTD.append(checkbox);
        standardTD.append(pHValue);
        certificateNumberTD.append(certificateNumber);
        descriptionTD.append(description);
        providerTD.append(provider);
        daysDueTD.append(daysDue);

        row.append(
            checkBoxTD,
            standardTD,
            certificateNumberTD,
            descriptionTD,
            providerTD,
            daysDueTD,
        );
        tableBodyA.append(row);
    });
}
function getStandardBufferSolution(perTableStandard){
    let selectedStandard = $('#selectedStandard').val();
    let array_selectedStandard = selectedStandard.split('(SPLIT)');
    let selectedStandardDataBuffer = {};
    for (let i = 0; i < standardBuffer.length; i++) {
    let obj = standardBuffer[i];
    if (array_selectedStandard.includes(obj.certificateNumber)) {
        selectedStandardDataBuffer[obj.certificateNumber] = obj;
    }
    }
    return selectedStandardDataBuffer[perTableStandard];
}
function getBufferID() {
    let dataVal = standardBuffer; // Assuming standardBuffer is an array of objects
    let getBufferIDValue = []; // Initialize an empty array to store IDs

    // Iterate over each object in the dataVal array
    for (let i = 0; i < dataVal.length; i++) {
        let item = dataVal[i];
        if (item.id) {
            getBufferIDValue.push(item.id); // Add the ID to the array
        }
    }
    getStandardDataBufferSolutionValues(getBufferIDValue);
}
let standardBufferValues = [];
function getStandardDataBufferSolutionValues(getBufferIDValue) {
    let standardID = getBufferIDValue; 
    $.ajax({
        cache: false,
        async: false,
        type: "post",
        url: "/standard/bufferSolution/getStandardValuesBufferSolutionByDetailsID",
        data: {
            'selectedStandardID': standardID,
        },
        success: function(result) {
            standardBufferValues = result.standardValues;
        },
        error: function (error) {
            console.log(error)
        },
    });
}
 function getStandardBufferSolutionValues(perTableStandard) {
            let selectedArray = {};
            for (let i = 0; i < standardBufferValues.length; i++) {
                let obj = standardBufferValues[i];
            
                    if (!selectedArray[obj.certificateNumber]) {
                        selectedArray[obj.certificateNumber] = [];
                    }
                    selectedArray[obj.certificateNumber].push(obj);  
            }
            return selectedArray;
}

/**get array of multi-product calibrator */
let standarMultiProduct = [];
function getStandardMultiProduct(){
    $.ajax({
        cache: false,
        async: false,
        type: "post",
        url: "/standard/multiProductCalibrator/getStandardDataMultiProductCalibrator",
        success: function(result) {
            standarMultiProduct = result.standardData;
            // addStandardToTableMultiProductCalibrator();
            // $('#modalStandardTableCalibrator').DataTable();     
            
        },
        error: function (error) {
            console.log(error);
        },
    });
}
function addStandardToTableMultiProductCalibrator(){
        let tableBody = $('#standardTableTbodyCalibrator'); 
        // tableBody.empty(); 
        let today = new Date();
        standarMultiProduct.forEach(item => {
            let dateOfCalibration = new Date(item.dateOfCalibration);
            let dueDate = new Date(dateOfCalibration.setFullYear(dateOfCalibration.getFullYear() + 1));
            let oneMonthBeforeDue = new Date(dueDate);
            oneMonthBeforeDue.setMonth(oneMonthBeforeDue.getMonth() - 1);

            let suffix = 'days left before due date';
    
            let bgColor = 'background-color:rgba(0,128,0,0.5)'; // Default color
            let disabled = false;
    
            if (today >= oneMonthBeforeDue && today < dueDate) {
                bgColor = 'background-color:rgba(255,165,0,0.5)'; // Warning color
            } else if (today >= dueDate) {
                bgColor = 'background-color:rgba(255,0,0,0.5)'; // Overdue color
                disabled = false;
                suffix = 'days over due date';
            }
    
            let days_due = Math.round(Math.abs((today - dueDate) / (24 * 60 * 60 * 1000)));

            let row = $('<tr>').attr('style', bgColor);
            // let row = $('<tr>');
            let checkBoxTD = $('<td>');
            let standardTD = $('<td>');
            let certificateNumberTD = $('<td>');
            let descriptionTD = $('<td>');
            let providerTD = $('<td>');
            let daysDueTD = $('<td>');
            let checkbox = $('<input>').attr({
                'type':'checkbox',
                'id':item['certificateNumber'],
                'data-group':'standardCheckBox',
                'data-collection': 'standardCheckBox', 
                'value':item['certificateNumber'], 
            })
            let serialNumber = $('<label>').text(item['serialNumber']).attr('for', item['certificateNumber'])
            let certificateNumber = $('<label>').text(item['certificateNumber']).attr('for', item['certificateNumber'])
            let description = $('<label>').text(item['description']).attr('for', item['certificateNumber'])
            let provider = $('<label>').text(item['calibrationProvider']).attr('for', item['certificateNumber'])
            let daysDue = $('<label>').text(days_due + ' ' + suffix).attr('for', item['certificateNumber'])
    
            checkBoxTD.append(checkbox);
            standardTD.append(serialNumber);
            certificateNumberTD.append(certificateNumber);
            descriptionTD.append(description);
            providerTD.append(provider);
            daysDueTD.append(daysDue);
    
            row.append(
                checkBoxTD,
                standardTD,
                certificateNumberTD,
                descriptionTD,
                providerTD,
                daysDueTD,
            )
            tableBody.append(row)
        })
}
function getStandardMultiProductCalibrator(perTableStandard){
    let selectedStandard = $('#selectedStandard').val();
    let array_selectedStandard = selectedStandard.split('(SPLIT)');
    let selectedStandardMultiProduct = {};
    for (let i = 0; i < standarMultiProduct.length; i++) {
        let obj = standarMultiProduct[i];
        if (array_selectedStandard.includes(obj.certificateNumber)) {
            selectedStandardMultiProduct[obj.certificateNumber] = obj;
        }
    }
    return selectedStandardMultiProduct[perTableStandard];
}
function getMultiProductID() {
    let dataVal = standardDataMultiProduct;
    let getMultiProductIDValue = [dataVal.id]; 
    let array_selectedStandard = Object.keys(dataVal); 
    for (let i = 0; i < array_selectedStandard.length; i++) {
        let key = array_selectedStandard[i];
        if (key) {
            getMultiProductIDValue.push(key); // Push the ID to getIDValue array
        }
    }
    getStandardDataMultiProductCalibratorValues(getMultiProductIDValue);
}
let standardMutltiProductValues = [];
function getStandardDataMultiProductCalibratorValues(getMultiProductIDValue) {
    let standardID = getMultiProductIDValue; 
    $.ajax({
        cache: false,
        async: false,
        type: "post",
        url: "/standard/multiProductCalibrator/getStandardValuesMultiProductCalibratorByDetailsID",
        data: {
            'selectedStandardID': standardID,
        },
        success: function(result) {
            standardMutltiProductValues = result.standardValues;
        },
        error: function (error) {
            console.log(error)
        },
    });
}
function getStandardMultiProductCalibratorValues() {
    let selectedStandardMultiProduct = {};
    for (let i = 0; i < standardMutltiProductValues.length; i++) {
        let obj = standardMutltiProductValues[i];
        if (obj.type === 'DC' && obj.function === 'Voltage' && obj.rangeMinUnit === 'mV' ||  obj.rangeMinUnit === 'V')    {
            if (!selectedStandardMultiProduct[obj.standardID]) {
                selectedStandardMultiProduct[obj.standardID] = [];
            }
            selectedStandardMultiProduct[obj.standardID].push(obj);
        }
    }
    return selectedStandardMultiProduct;
}

/**get array of Documenting process calibrator */
var standardDocumentingProcess = [];
function getStandardDocumentingProcess(){
    $.ajax({
        cache: false,
        async: false,
        type: "post",
        url: "/standard/documentingProcessCalibrator/getStandardDataDocumentingProcessCalibrator",
        success: function(result) {
            standardDocumentingProcess = result.standardData;
            // addStandardToTableDocumentingProcessCalibrator();
            // $('#modalStandardTableCalibrator').DataTable();     
            
        },
        error: function (error) {
            console.log(error);
        },
    });
}
function addStandardToTableDocumentingProcessCalibrator(){
    let tableBody = $('#standardTableTbodyCalibrator'); 
    // tableBody.empty(); 
    let today = new Date();
    standardDocumentingProcess.forEach(item => {
          
        let dateOfCalibration = new Date(item.dateOfCalibration);
        let dueDate = new Date(dateOfCalibration.setFullYear(dateOfCalibration.getFullYear() + 1));
        let oneMonthBeforeDue = new Date(dueDate);
        oneMonthBeforeDue.setMonth(oneMonthBeforeDue.getMonth() - 1);

        let suffix = 'days left before due date';

        let bgColor = 'background-color:rgba(0,128,0,0.5)'; // Default color
        let disabled = false;

        if (today >= oneMonthBeforeDue && today < dueDate) {
            bgColor = 'background-color:rgba(255,165,0,0.5)'; // Warning color
        } else if (today >= dueDate) {
            bgColor = 'background-color:rgba(255,0,0,0.5)'; // Overdue color
            disabled = false;
            suffix = 'days over due date';
        }

        let days_due = Math.round(Math.abs((today - dueDate) / (24 * 60 * 60 * 1000)));

        let row = $('<tr>').attr('style', bgColor);
        // let row = $('<tr>');
        let checkBoxTD = $('<td>');
        let standardTD = $('<td>');
        let certificateNumberTD = $('<td>');
        let descriptionTD = $('<td>');
        let providerTD = $('<td>');
        let daysDueTD = $('<td>');
        let checkbox = $('<input>').attr({
            'type':'checkbox',
            'id':item['certificateNumber'],
            'data-group':'standardCheckBox',
            'data-collection': 'standardCheckBox', 
            'value':item['certificateNumber'], 
        })
        let serialNumber = $('<label>').text(item['serialNumber']).attr('for', item['certificateNumber'])
        let certificateNumber = $('<label>').text(item['certificateNumber']).attr('for', item['certificateNumber'])
        let description = $('<label>').text(item['description']).attr('for', item['certificateNumber'])
        let provider = $('<label>').text(item['calibrationProvider']).attr('for', item['certificateNumber'])
        let daysDue = $('<label>').text(days_due + ' ' + suffix).attr('for', item['certificateNumber'])

        checkBoxTD.append(checkbox);
        standardTD.append(serialNumber);
        certificateNumberTD.append(certificateNumber);
        descriptionTD.append(description);
        providerTD.append(provider);
        daysDueTD.append(daysDue);

        row.append(
            checkBoxTD,
            standardTD,
            certificateNumberTD,
            descriptionTD,
            providerTD,
            daysDueTD,
        )
        tableBody.append(row)
    })
}
function getStandardDocumentingProcessCalibrator(perTableStandard){
    let selectedStandard = $('#selectedStandard').val();
    let array_selectedStandard = selectedStandard.split('(SPLIT)');
    let selectedStandardDocumentingProcess = {};
    for (let i = 0; i < standardDocumentingProcess.length; i++) {
        let obj = standardDocumentingProcess[i];
        if (array_selectedStandard.includes(obj.certificateNumber)) {
            selectedStandardDocumentingProcess[obj.certificateNumber] = obj;
        }
    }
    return selectedStandardDocumentingProcess[perTableStandard]; 
}
function getDocumentingProcessID() {
    let dataValue = standardDataDocumentingProcess;
    let getDocumentingIDValue = [dataValue.id]; 
    let array_selectedStandard = Object.keys(dataValue); 
    for (let i = 0; i < array_selectedStandard.length; i++) {
        let key = array_selectedStandard[i];
        if (key) {
            getDocumentingIDValue.push(key); 
        }
    }
    getStandardDataDocumentingProcessCalibratorValues(getDocumentingIDValue);
}
let standardDocumentingProcessValues = [];
function getStandardDataDocumentingProcessCalibratorValues(getDocumentingIDValue) {
    let standardID = getDocumentingIDValue; 
    $.ajax({
        cache: false,
        async: false,
        type: "post",
        url: "/standard/documentingProcessCalibrator/getStandardValuesDocumentingProcessCalibratorByDetailsID",
        data: {
            'selectedStandardID': standardID,
        },
        success: function(result) {
            standardDocumentingProcessValues = result.standardValues;
        },
        error: function (error) {
            console.log(error);
        }
    });
}
function getStandardDocumentingProcessCalibratorValues() {
    let selectedStandardDocumentingProcess = {};
    for (let i = 0; i < standardDocumentingProcessValues.length; i++) {
        let obj = standardDocumentingProcessValues[i];
            if (obj.type === 'DC' && obj.function === 'Voltage'&& obj.sensorType ===   'DC Voltage')    {
            if (!selectedStandardDocumentingProcess[obj.standardID]) {
                selectedStandardDocumentingProcess[obj.standardID] = [];
            }
            selectedStandardDocumentingProcess[obj.standardID].push(obj);
        }
    }
    return selectedStandardDocumentingProcess;
}

/**handle selected standard */
function selectStandard(){
    let selectedStandardArray = [];
    $('input[data-group="standardCheckBox"]:checked').each(function() {
    selectedStandardArray.push($(this).val())
    });
    let selectedStandard = selectedStandardArray.join('(SPLIT)');
    $('#selectedStandard').val(selectedStandard)
    updateProcessStandard(selectedStandard);
    $('select[data-id="standardSelect"]').each(function() {
        $(this).html($('<option>', {
            "html": "Select . . .",
            'value': 'NaN'
        }));
        selectedStandardArray.forEach(sn => {
            $(this).append($('<option>').html(sn).val(sn));
        });
    });
    
 
}
function selectStandardFromData(standardData){
    let selectedStandardArray = standardData.split('(SPLIT)');
    $('input[data-collection="standardCheckBox"]').each(function() {
    if(selectedStandardArray.includes($(this).val()))
        $(this).trigger('click')
    });
}
function updateProcessStandard(standardPicked){
    let selectedStandard = standardPicked.split("(SPLITHERE)")
    $('input[type="checkbox"][data-group*="standardCheckBox"]').each(function(){
        let currentCheckboxValue = $(this).val();
        if(selectedStandard.includes(currentCheckboxValue)){
            $(this).prop('checked', true);
        } 
    })
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
        url: "/pHMeter/add_New_Worksheet_Data",
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
            window.location.href = "/pHMeter/worksheet/"+JSON.parse(result).id;

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
    let equipmentUndertestValues = {};

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
        url: "/pHMeter/update_Worksheet_Data",
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
            url: "/pHMeter/get_data_by_id",
            data: {
                'idOfCertificate' : idOfCertificate,
            },
            success: function(result) {
                // userCheck(
                //     // result.userData.id,
                //     // result.userData.email, 
                //      result.worksheetData.calibratorAccountID, 
                //      result.worksheetData.calibratorAccountEmail, 
                //      result.worksheetData.completion
                //      )
                $('#saveButton').html('Update')
                $('#saveButton').on("click", function(){updateData()});
                
                if (result.worksheetData['standard'] != null) {
                    selectStandardFromData(result.worksheetData['standard']);
                    $('#modalStandardSelect').trigger('click');
                    $('#modalStandardSelectCalibrator').trigger('click');
                  
                }

               
                let numberOfTable = countKeysWithPattern(result.worksheetData['dataInputs'], 'numberOfTables');
            
                let db_dataInputs = JSON.parse(result.worksheetData['dataInputs']);  
                            for (let i = 1; i <= numberOfTable; i++) {
                                $('#addTable').trigger('click');

                                let db_selectFunction = db_dataInputs['selectFunction' + i];             
                                $("#selectFunction" + i + " option[value='"+db_selectFunction+"']").attr('selected', 'true');
                                $('#selectFunction' + i ).trigger('change')
            
                                let initialCheckboxValue = db_dataInputs['changeinAtctable' + i];                                
                                initialCheckboxValue == '1' ? $('#changeinAtctable' + i).attr('checked',''):$('#changeinAtctable' + i);
                                $('#changeinAtctable' + i).trigger('change');
    
                                function addRowsToTablesWithPattern(pattern, tableIndex) {
                                    let numberOfRows = countKeysWithPattern(result.worksheetData['dataInputs'], pattern + tableIndex + 'row');
                                    for (let x = 0; x < numberOfRows; x++) {
                                        $('#addButtonTable' + tableIndex).trigger('click');
                                    }
                           
                                }               
               
                                addRowsToTablesWithPattern('readingForMeterTesttable', i);
                                addRowsToTablesWithPattern('appliedValueForElectrodeTesttable', i); 
                            }

                let infoArray = ['customerInfo', 'equipmentInfo', 'environmentInfo', 'dataInputs'];
                for (let i = 0; i < infoArray.length; i++) {
                    let infoValues = JSON.parse(result.worksheetData[infoArray[i]]);
                    let keys = Object.keys(infoValues);
                    for (let x = 0; x < keys.length; x++) {
                        let id = keys[x];
                        if(infoValues[id]==='checked'){
                            $('#'+id).attr(infoValues[id], true)      
                        }else{
                            $('#'+id).val(infoValues[id])      
                        }
                    }   
                }    

                let calculatedDataRAW = result.worksheetData['calculatedData'];
                let calculatedData = calculatedDataRAW != "" ? JSON.parse(calculatedDataRAW) : {};
                    $('#calculatedData').val(JSON.stringify(calculatedData));
                    

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

        $('#chart').attr('disabled', '');
        $('#worksheetPDF').attr('disabled', '');
        $('#certificatePDF').attr('disabled', '');
        $('#certificatePDFDraft').attr('disabled', '');
        $('#certificatePDFDownload').attr('disabled', '');
        $('#editRemarks').attr('disabled', '');
    }
});

function removeMeterDataTable(tableNumber){
    $('#divForTables').children(':last-child').remove();
    tableNumber > 1 ? tableNumber-- : 1;
}
function removeMeasurementRow(numberOfTable) {
    const body = $(`#table${numberOfTable} tbody`);
    if (body.children().length > 2) {
        body.children().last().remove();
    }
    return -1;
}
 
function addToUncertaintyBudgetTable() {
    let CalData = JSON.parse($('#calculatedData').val());    
    /** handle table for meter       */
    let uncBudgetTbodyForMeter = $('#uncertaintyBudgetTbodyForMeter');
    uncBudgetTbodyForMeter.html('');
    let showMeterHeader = false;
    for (let i = 0; i < Object.keys(CalData).length; i++) {
        let tableName = 'table' + (i + 1);
        let tr = $('<tr>');
        let td1 = $('<td>').html(parseFloat(CalData[tableName]['averageAppliedValueForMeterTest']).toFixed(4));
        let td2 = $('<td>').html(parseFloat(CalData[tableName]['uncertaintyDueToCalibrationForMeter']).toExponential(12));
        let td3 = $('<td>').html(parseFloat(CalData[tableName]['uncertaintyDueToRepeatabilityForMeter']).toExponential(12));
        let td4 = $('<td>').html(parseFloat(CalData[tableName]['uncertaintyDueToResOfPHForMeter']).toFixed(12));
        let td5 = $('<td>').html(parseFloat(CalData[tableName]['uncertaintyDueToResOfDegreesForMeter']).toFixed(12));
        let td6 = $('<td>').html(parseFloat(CalData[tableName]['combinedUncertaintyForMeter']).toFixed(12));
        let td7 = $('<td>').html(parseFloat(CalData[tableName]['vEffectiveForMeter']).toFixed(12));
        let td8 = $('<td>').html(parseFloat(CalData[tableName]['coverageFactorkforMeter']).toFixed(2));
        let td9 = $('<td>').html(parseFloat(CalData[tableName]['expandedUncertaintyForMeter']).toFixed(12));
        /**
         *Check if any value is not null and not undefined before appending row 
         */
        if (CalData[tableName]['averageAppliedValueForMeterTest'] !== null && 
            CalData[tableName]['averageAppliedValueForMeterTest'] !== undefined) {
            showMeterHeader = true;
            uncBudgetTbodyForMeter.append($(tr).append(td1, td2, td3, td4, td5, td6, td7, td8, td9));
           }
    }
    /** Display header row only if there is at least one row of data        */
    if (showMeterHeader) {
        let meterHeaderRowData = [
            'm𝑒t𝑒𝑟 <br> av𝑒𝑟ag𝑒',
            '𝑈𝑠𝑡𝑑_𝑢𝑛𝑐',
            '𝑈𝑟𝑒𝑝_𝑢𝑢𝑐',
            '𝑈𝑟𝑒𝑠_𝑢𝑢𝑐 pH',
            '𝑈𝑟𝑒𝑠_𝑢𝑢𝑐 t𝑒mp',
            '𝑈𝑐',
            '𝑉𝑒𝑓𝑓',
            '𝑘',
            '𝑈𝑒'
        ];
        let meterHeaderRow = $('<tr>');
        meterHeaderRowData.forEach(header => {
            meterHeaderRow.append(`<th>${header}</th>`);
        });
        uncBudgetTbodyForMeter.prepend(meterHeaderRow);
    }
    /** handle table for eletrode    */
    let uncBudgetTbodyForElectrode = $('#uncertaintyBudgetTbodyForElectrode');
    uncBudgetTbodyForElectrode.html('');
    let showElectrodeHeader = false;
    for (let i = 0; i < Object.keys(CalData).length; i++) {
        let tableName = 'table' + (i + 1);
    
        let tr = $('<tr>');
        let td1 = $('<td>').html(parseFloat(CalData[tableName]['averageAppliedValueForElectrode']).toFixed(4));

        let td2 = $('<td>').html(parseFloat(CalData[tableName]['uncertaintyDueToCalibrationForElectrode']).toFixed(12));
        let td3 = $('<td>').html(parseFloat(CalData[tableName]['uncertaintyDueToRepeatabilityForElectrode']).toFixed(12));
        let td4 = $('<td>').html(parseFloat(CalData[tableName]['uncertaintyDueToResOfPHForElectrode']).toFixed(12));
        let td5 = $('<td>').html(parseFloat(CalData[tableName]['uncertaintyDueToResOfDegreesForElectrode']).toFixed(12));

        let td6 = $('<td>').html(parseFloat(CalData[tableName]['combinedUncertaintyForElectrode']).toFixed(12));
        let td7 = $('<td>').html(parseFloat(CalData[tableName]['vEffectiveForElectrode']).toFixed(12));
        let td8 = $('<td>').html(parseFloat(CalData[tableName]['coverageFactorkForElcetrode']).toFixed(2));
        let td9 = $('<td>').html(parseFloat(CalData[tableName]['expandedUncertaintyForElectrode']).toFixed(12));
       
        
        /**
         * Check if any value is not null and not undefined before appending row
         */
        if (CalData[tableName]['averageAppliedValueForElectrode'] !== null && 
            CalData[tableName]['averageAppliedValueForElectrode'] !== undefined) {
            showElectrodeHeader = true;
            uncBudgetTbodyForElectrode.append($(tr).append(td1, td2, td3, td4, td5, td6, td7, td8, td9));
        }
    }
    /** Display header row only if there is at least one row of data        */
    if (showElectrodeHeader) {
        let meterHeaderRowData = [
            '𝑒l𝑒ct𝑟od𝑒 <br> av𝑒𝑟ag𝑒',
            '𝑈𝑠𝑡𝑑_𝑢𝑛𝑐',
            '𝑈𝑟𝑒𝑝_𝑢𝑢𝑐',
            '𝑈𝑟𝑒𝑠_𝑢𝑢𝑐',
            '𝑈𝑟𝑒𝑠_𝑢𝑢𝑐 temp',
            '𝑈𝑐',
            '𝑉𝑒𝑓𝑓',
            '𝑘',
            '𝑈𝑒'
        ];
        let electrodeHeaderRow = $('<tr>');
        meterHeaderRowData.forEach(header => {
            electrodeHeaderRow.append(`<th>${header}</th>`);
        });
        uncBudgetTbodyForElectrode.prepend(electrodeHeaderRow);
    }

}

function addRowToTestForMeter(tableNumber, rowNumber ,selectedFunction) {
    let $tr = $('<tr>',);
    if (!selectedFunction) { 
        console.error('No selected function provided.');
        return null;
    }
    let ids;
    if (selectedFunction === 'testForMeter') {
        ids = [
            'trialTestForMeter', 
            'readingForMeterTest',
        ];
    } else if (selectedFunction === 'testForElectrode') {
        ids = [
            'trialTestForElectrode',
            'appliedValueForElectrodeBefore', 
            'appliedValueForElectrodeTest', 
            'electrodeRemarks'
        ];
    } else {
        console.error('Unknown function:', selectedFunction);
        return null;
    }
    for (let i = 0; i < ids.length; i++) {
        let $td = $('<td>');
        let $element;
            if (ids[i].includes('trialTestForMeter')) {
                $element = $('<input>', {
                    'class': 'form-control',
                    'data-group': 'raw_data',
                    'id': ids[i] + 'table' + tableNumber + 'row' + rowNumber,
                    'value': rowNumber,
                    'type': 'text', 
                 
                });
        } else if (ids[i].includes('trialTestForElectrode')) {
                $element = $('<input>', {
                    'class': 'form-control ',
                    "data-group": "raw_data",
                    'id': ids[i] + 'table' + tableNumber + 'row' + rowNumber,
                    'value': rowNumber,
                    'type': 'text' 
                });
        } else {
            // For other IDs, create input field
            $element = $('<input>', {
                'type': 'text',
                'class': 'form-control',
                'data-group': 'raw_data',
                "data-required": "false",
                'id': ids[i] + 'table' + tableNumber + 'row' +  rowNumber
            });
        }

        $td.append($element);
        $tr.append($td);
    }
    return $tr;
}


function addRawTestForMeterDataTable() {
    let numberOfTable = $('#divForTables').children().length;
    let tableNumber = numberOfTable + 1;
    let rowNumber = 1;
    let $tableDivs = $('#divForTables');
    let $table = $('<table>', {
        'class': 'table',
        'id': 'table' + tableNumber
      });  
    let $thead = $('<thead>');
    let $tbody = $('<tbody>');
    let $deleteTableBtn = $('<button>', {
                'type': 'button',
                'class': 'btn btn-danger',
                'text': 'Delete Row',
                'click': function () {
              if ( $tbody.children().length > 3) {
                   $tbody.find('tr:last').remove();
                        }
                    if (rowNumber > 1) {
                        rowNumber--;
                    }
                }
    });
    let $addTableBtn = $('<button>', {
                'type': 'button',
                'class': 'btn btn-success',
                'html': 'Add Row',
                'id': 'addButtonTable' + tableNumber,
                'click': function () {
                    let type = $('#selectFunction' + tableNumber);
                    if (type.val() === "testForMeter" || type.val() === "testForElectrode") {
                        let newRow = addRowToTestForMeter(tableNumber, rowNumber, type.val());
                        $tbody.append(newRow);
                        rowNumber++;
                    } else {
                        alert('Choose a function');
                    }
                }
    });  
    
    let $dropdown = dropDown();
    let $chooseStandard = $("<td>").html(
        $("<div>").append($dropdown)
    ); 
    function dropDown() {
        let selectedStandard = $('#selectedStandard').val();
        if (typeof selectedStandard !== 'string') {
                selectedStandard = '';
         }
        let selectedStandardArray = selectedStandard.split('(SPLIT)'); // Split the string into an array

        let $input = $('<select>', {
            "class": "form-select",
            "data-group": "raw_data",
            "data-id": "standardSelect",
            "data-required": "false",
            "id": 'stdtable' + tableNumber,
        });

        // Append the default "Select" option
        $input.append($('<option>', {
            "html": "Select Standard",
            'value': 'NaN'
        }));

        // Append options based on selectedStandardArray
        selectedStandardArray.forEach(item => {
            $input.append($('<option>').val(item).html(item));
        });

        return $input;
    }
    let $selectedFunction = $("<td>").html(
                $("<div>").html(function () {
        
                    let $input = $('<select>', {
                        "class": "form-select",
                        "data-group": "raw_data",
                        "data-id": "selectFunction",
                        "data-required": "false",
                        "id": 'selectFunction' + tableNumber,
                        // Add change event handler to update table headers
                        "change": function () {
                            updateTableHeaders($(this).val());
                        }
                    }).append(
                        $('<option>', {
                            "html": "Choose function",
                            'value': ''
                        }),
                        $('<option>', {
                            "html": "Test for Meter",
                            'value': 'testForMeter'
                        }),
                        $('<option>', {
                            "html": "Test for Electrode",
                            'value': 'testForElectrode'
                        })
                    );
                    let $label = $('<label>', {
                        'for': 'selectFunction' + tableNumber,
                        'text': 'Select' // Label text for input field
                    });

        
        
                    return $input.append($label);
                })
    );  
    let $hiddenInputTableNumber = $('<input>', {
        'type': 'hidden',
        'data-group': 'raw_data',
        'id': 'numberOfTables' + tableNumber,
        'value': tableNumber
    });
    /**update table headers for conditional selection of test for meter or test for electrode */
    function updateTableHeaders(selectedFunction) {
                $tbody.html('');
                let $tableRowData;
                switch (selectedFunction) {
                    case 'testForMeter':
                        let pHForMeterTestID = 'pHForMeterTest' + 'table' + tableNumber;
                        let tempDegreeForMeterTestID = 'tempDegreeForMeterTest' + 'table' + tableNumber;
                        let appliedVoltagemVID = 'appliedVoltagemV' + 'table' + tableNumber;
                        let tempDegreetopHID = 'tempDegreetopH' + 'table' + tableNumber;      
                        let asfoundValueID = 'asfoundValue' + 'table' + tableNumber;
                        let meterRemarksID = 'meterRemarks' + 'table' + tableNumber;

                        let $pHForMeterTest = $('<td>').append(
                            $('<div>', {'class': 'form-floating mb-3'}).append(
                                $('<input>', {
                                    'type': 'text',
                                    'id': pHForMeterTestID,
                                    "data-group": "raw_data",
                                    'class': 'form-control',
                                    'placeholder': 'Enter ' ,
                                    'on': {
                                        'input': function() {
                                            calculateappliedVoltage(
                                                pHForMeterTestID,
                                                tempDegreeForMeterTestID,
                                                appliedVoltagemVID, 
                                                tableNumber
                                            );
                            
                                            calculatetempdegreetopH(
                                                pHForMeterTestID,
                                                tempDegreeForMeterTestID,
                                                tempDegreetopHID, 
                                                tableNumber
                                            );
                                        }
                                    }, 
                                }),
                                $('<label>', {
                                    'for': pHForMeterTestID,
                                    'text': 'Test Point, pH' 
                                })
                            )
                        );
                        let $tempDegreeForMeterTest = $('<td>').append(
                            $('<div>', {'class': 'form-floating mb-3'}).append(
                                $('<input>', {
                                    'type': 'text',
                                    'id': tempDegreeForMeterTestID,
                                    "data-group": "raw_data",
                                    'class': 'form-control', 
                                    'placeholder': 'Enter ' , 
                                    'on': {
                                        'input': function() {
                                            calculateappliedVoltage(
                                                pHForMeterTestID,
                                                tempDegreeForMeterTestID,
                                                appliedVoltagemVID, 
                                                tableNumber
                                            );
                            
                                            calculatetempdegreetopH(
                                                pHForMeterTestID,
                                                tempDegreeForMeterTestID,
                                                tempDegreetopHID, 
                                                tableNumber
                                            );
                                        }
                                    },
                                }),
                                $('<label>', {
                                    'for': tempDegreeForMeterTestID,
                                    'text': 'Temperature in °C',
                                })
                            )
                        );
                        let $appliedVoltagemV = $('<td>').append(
                            $('<div>', {'class': 'form-floating mb-3'}).append(
                                $('<input>', {
                                    'type': 'text',
                                    'id': appliedVoltagemVID,
                                    "data-group": "raw_data",
                                    'class': 'form-control', // Apply Bootstrap form-control class
                                    'placeholder': 'Enter '  // Placeholder based on label text
                                }),
                                $('<label>', {
                                    'for': appliedVoltagemVID,
                                    'text': 'Applied Voltage', // Label text for pH input field
                                    'style': 'font-size: 12px',
                                })
                            )
                        );
                        let $tempDegreetopH = $('<td>').append(
                            $('<div>', {'class': 'form-floating mb-3'}).append(
                                $('<input>', {
                                    'type': 'text',
                                    'id': tempDegreetopHID,
                                    "data-group": "raw_data",
                                    'class': 'form-control', // Apply Bootstrap form-control class
                                    'placeholder': 'Enter '  // Placeholder based on label text
                                }),
                                $('<label>', {
                                    'for': tempDegreetopHID,
                                    'text': 'Temperature °C to pH' // Label text for pH input field
                                })
                            )
                        );
                        let $asfoundValue = $('<td>').append(
                            $('<div>', {'class': 'form-floating mb-3'}).append(
                                $('<input>', {
                                    'type': 'text',
                                    'id': asfoundValueID,
                                    "data-group": "raw_data",
                                    'class': 'form-control',
                                    'placeholder': 'Enter ' ,
                            
                                }),
                                $('<label>', {
                                    'for': asfoundValueID,
                                    'text': 'As Found' 
                                })
                            )
                        );

                        let $meterRemarks = $('<td>').append(
                            $('<div>', {'class': 'form-floating mb-3'}).append(
                                $('<input>', {
                                    'type': 'text',
                                    'id': meterRemarksID,
                                    "data-group": "raw_data",
                                    'class': 'form-control',
                                    'placeholder': 'Enter ' ,
                            
                                }),
                                $('<label>', {
                                    'for': meterRemarksID,
                                    'text': 'Remarks' 
                                })
                            )
                        );
             
                        
                    // First row
                    let $firstRow1 = $('<tr>').append(
                        $pHForMeterTest,
                        $tempDegreeForMeterTest,

                        $appliedVoltagemV,
                        $tempDegreetopH,
                    );

                    // Second row
                    let $secondRow2 = $('<tr>').append(
                        $asfoundValue,
                        $meterRemarks,
                    );

                    // Append both rows to the table
                    $tableRowData = $().add($firstRow1).add($secondRow2);

                        array_row = ['Trial Number', 'Reading'];
                        break;
      
                    case 'testForElectrode':
                        let bufferSolutionID = 'bufferSolution' + 'table' + tableNumber;
                        let bufferSolutionTempInitialBeforeAdjustmentID = 'bufferSolutionTempInitialBeforeAdjustment' + 'table' + tableNumber;
                        let bufferSolutionTempFinalBeforeAdjustmentID = 'bufferSolutionTempFinalBeforeAdjustment' + 'table' + tableNumber;

                        let bufferSolutionTempBeforeCalibrationID = 'bufferSolutionTempBeforeCalibration' + 'table' + tableNumber;
                        let bufferSolutionTempDuringCalibrationID = 'bufferSolutionTempDuringCalibration' + 'table' + tableNumber;
                        let changeinTempID = 'changeinTemp' + 'table' + tableNumber;             
                        let changeinAtcID = 'changeinAtc' + 'table' + tableNumber;     
                        let atcInputFieldID = 'atcInputField' + 'table' + tableNumber;           
                        let $bufferSolution = $('<td>').append(
                            $('<div>', {'class': 'form-floating mb-3'}).append(
                                $('<input>', {
                                    'type': 'text',
                                    'id': bufferSolutionID,
                                    "data-group": "raw_data",
                                    'class': 'form-control', 
                                    'placeholder': 'Enter '  
                                }),
                                $('<label>', {
                                    'for': bufferSolutionID,
                                    'text': 'Test Point, pH',
                                    'style': 'font-size: 12px',  
                                })
                            )
                        );  
                        let $bufferSolutionTempInitialBeforeAdjustment = $('<td>').append(
                            $('<div>', {'class': 'form-floating mb-3'}).append(
                                $('<input>', {
                                    'type': 'text',
                                    'id': bufferSolutionTempInitialBeforeAdjustmentID,
                                    "data-group": "raw_data",
                                    'class': 'form-control',
                                    'placeholder': 'Enter ' ,
                                }),
                                $('<label>', {
                                    'for': bufferSolutionTempInitialBeforeAdjustmentID,
                                    'text': 'Initial Temp Before Adjustment °C',
                                    'style': 'font-size: 12px', 
                                })
                            )
                        );  
                        let $bufferSolutionTempFinalBeforeAdjustment = $('<td>').append(
                            $('<div>', {'class': 'form-floating mb-3'}).append(
                                $('<input>', {
                                    'type': 'text',
                                    'id': bufferSolutionTempFinalBeforeAdjustmentID,
                                    "data-group": "raw_data",
                                    'class': 'form-control',
                                    'placeholder': 'Enter ' ,
                                }),
                                $('<label>', {
                                    'for': bufferSolutionTempFinalBeforeAdjustmentID,
                                    'text': 'Final Temp Before Adjustment °C' ,
                                    'style': 'font-size: 12px', 
                                })
                            )
                        );  
                        let $bufferSolutionTempBeforeCalibration = $('<td>').append(
                            $('<div>', {'class': 'form-floating mb-3'}).append(
                                $('<input>', {
                                    'type': 'text',
                                    'id': bufferSolutionTempBeforeCalibrationID,
                                    "data-group": "raw_data",
                                    'class': 'form-control',
                                    'placeholder': 'Enter ' ,
                                    'on': {
                                        'input': function() {
                                            calculateChangeinTemp(
                                                bufferSolutionTempBeforeCalibrationID,
                                                 bufferSolutionTempDuringCalibrationID,
                                                 changeinTempID, 
                                                 tableNumber
                                                 );
                                                }
                                            }, 
                                }),
                                $('<label>', {
                                    'for': bufferSolutionTempBeforeCalibrationID,
                                    'text': 'Initial Temp After Adjustment °C' ,
                                    'style': 'font-size: 12px', 
                                })
                            )
                        );         
                        let $bufferSolutionTempDuringCalibration = $('<td>').append(
                            $('<div>', {'class': 'form-floating mb-3'}).append(
                                $('<input>', {
                                    'type': 'text',
                                    'id': bufferSolutionTempDuringCalibrationID,
                                    "data-group": "raw_data",
                                    'class': 'form-control', 
                                    'placeholder': 'Enter ' , 
                                    'on': {
                                        'input': function() {
                                            calculateChangeinTemp(
                                                bufferSolutionTempBeforeCalibrationID,
                                                 bufferSolutionTempDuringCalibrationID,
                                                 changeinTempID, 
                                                 tableNumber
                                                 );
                                                }
                                            },

                             

                                }),
                                $('<label>', {
                                    'for': bufferSolutionTempDuringCalibrationID,
                                    'text': 'Final Temp After Adjustment °C',
                                    'style': 'font-size: 12px', 
                                })
                            )
                        );  
                        let $changeinTemp = $('<td>').append(
                            $('<div>', {'class': 'form-floating mb-3'}).append(
                                $('<input>', {
                                    'type': 'text',
                                    'id': changeinTempID,
                                    "data-group": "raw_data",
                                    'class': 'form-control', 
                                    'placeholder': 'Enter ',
                                      
                                }),
                                $('<label>', {
                                    'for': changeinTempID,
                                    'text': 'Change in Temp °C ±',
                                    'style': 'font-size: 12px',  
                                })
                            )
                        ); 
                        /**create a conditional for ATC value */
                        let $changeinAtcValue = initializeCheckbox(changeinAtcID, initialValue,atcInputFieldID);


                  // First row
                    let $firstRow = $('<tr>').append(
                        $bufferSolution,
                        $bufferSolutionTempInitialBeforeAdjustment,
                        $bufferSolutionTempFinalBeforeAdjustment
                    );

                    // Second row
                    let $secondRow = $('<tr>').append(
                        $('<td>').append($changeinAtcValue),
                        $bufferSolutionTempBeforeCalibration,
                        $bufferSolutionTempDuringCalibration,
                        $changeinTemp
                    );

                    // Append both rows to the table
                    $tableRowData = $().add($firstRow).add($secondRow);

                 


                        array_row = ['Trial Number', 'UUC Reading Before Adjustment' , 'UUC Reading After Adjustment', 'Remarks'];
                        break;
                    default:
                    break;
                 }
        let $tableRowTitle = $('<tr>'); 
        for (let i = 0; i < array_row.length; i++) {
                    let $column = $('<th>', {
                        'html': array_row[i]
                    });
                    $tableRowTitle.append($column); 
        }
      
        $tbody.find('tr').remove();
    
        $tbody.append($tableRowData);
        $thead.append( 
            $addTableBtn,
            $deleteTableBtn,
            );
        $tbody.append($tableRowTitle);
     
     }
    $thead.append(                 
                     $('<tr>').append(
                        $hiddenInputTableNumber,
                        $selectedFunction,
                        $chooseStandard,
                    )
                
    );      
    $table.append(
         $thead,
         $tbody,
    );
    /**accordion */   
    let $accordionCard = $('<div>', {
        'class': 'card',
        'id': 'accordion' + tableNumber
    });    
    let $cardHeader = $('<div>', {
        'class': 'card-header d-flex justify-content-between align-items-center',
        'id': 'heading' + tableNumber,
        'click': function() {
            $('#collapse' + tableNumber).collapse('toggle');
        }
    });
    let $cardBody = $('<div>', {
        'class': 'card-body'
    });
    let $collapse = $('<div>', {
        'class': 'collapse',
        'id': 'collapse' + tableNumber,
        'aria-labelledby': 'heading' + tableNumber,
        'data-bs-parent': '#accordion' + tableNumber
    });
    let $tableLabel = $('<span>', {
        'class': 'btn',
        'html': 'Table ' + tableNumber,
    });
    $cardHeader.append($tableLabel);
    $cardBody.append($table);
    $collapse.append($cardBody);
    $accordionCard.append($cardHeader, $collapse);
    $tableDivs.append($accordionCard);
}

function calculateappliedVoltage(
    pHForMeterTest,
    tempDegreeForMeterTest,
    appliedVoltagemV
) {
    const valueA = $(`#${pHForMeterTest}`).val();
    const valueB = $(`#${tempDegreeForMeterTest}`).val();
    let result = appliedVoltage(valueB, valueA);
    /** Round the value to two decimal places*/
    result = Math.round(result * 100) / 100;
    $(`#${appliedVoltagemV}`).val(result);
}

function calculatetempdegreetopH(
    pHForMeterTest,
    tempDegreeForMeterTest,
    tempDegreetopH,
) {
    const valueA = $(`#${pHForMeterTest}`).val();
    const valueB = $(`#${tempDegreeForMeterTest}`).val();
    let float_valueA = parseFloat(valueA);
    let float_valueB = parseFloat(valueB);
    let result = tempDegtopH(float_valueB, float_valueA);
    $(`#${tempDegreetopH}`).val(result.toFixed(5));
}

function calculateValues(){
    let calculatedData = {};
    let numberOfTable = $('#divForTables').children().length;
    /**  degree of freedon value for meter     */ 
    let degreeOfFreedomDueToCalibrationForMeter = 100000000;	
    let degreeOfFreedomDueToRepeatabilityForMeter = 4;
    let degreeOfFreedomDueToResolutionOfPHForMeter = 100000000;	
    let degreeOfFreedomDueToResolutionOfDegreesForMeter = 100000000;	
    /**  degree of freedon value for electrode     */ 
    let degreeOfFreedomDueToCalibrationForElectrode = 100000000;	
    let degreeOfFreedomDueToResolutionOfDegreesForElectrode = 100000000;	
    let degreeOfFreedomDueToRepeatabilityForElectrode = 4;	
    let degreeOfFreedomDueToResolutionOfPHForElectrode = 100000000;
    /**  set to static value due to same value for all calibration settings     */
    let millivoltsTopH = 0.016906; 
    let resolutionOfPHValue = $('#resolutionOfPH');
    let resolutionOfPH =  resolutionOfPHValue.val();
    let resolutionOfTempDegreeValue = $('#resolutionOfTempC');
    let resolutionOfTempDegrees =  resolutionOfTempDegreeValue.val();
    /**loopingfor calculation each table */
    for(let i = 1; i <= numberOfTable; i++){
        let tableName = 'table' + i;
        calculatedData[tableName] = {};
        let numberOfRowPerTable = $('#' + tableName + ' tbody').children().length;
        /** standard value  */
        let element_standard = $('#std'+  tableName );
        let standardValue = element_standard.val()
        /**get buffer standard */

        standardDataBuffer = getStandardBufferSolution(standardValue); 
        if (standardDataBuffer !== undefined) {
            getBufferID();
        }
        let standardDataBufferValues = getStandardBufferSolutionValues(standardValue);  
        let targetStandardValue = standardDataBufferValues[standardValue];
                        
        /**get multi product standard */
        standardDataMultiProduct = getStandardMultiProductCalibrator(standardValue);  
        if (standardDataMultiProduct !== undefined) {
            getMultiProductID();
        }
        let standardDataMultiProductValues = getStandardMultiProductCalibratorValues(standardValue);  

        /**get documenting process standard */
        standardDataDocumentingProcess = getStandardDocumentingProcessCalibrator(standardValue);  
            if (standardDataDocumentingProcess !== undefined) {   
                getDocumentingProcessID();
            }
        let standardDataDocumentingProcessValues = getStandardDocumentingProcessCalibratorValues(standardValue); 

        /** variables for meter test  */
        let pHForMeterTestValue = $('#pHForMeterTest' + tableName);
        let pHForMeterTest =  pHForMeterTestValue.val();
        let tempDegreeForMeterValue = $('#tempDegreeForMeterTest' + tableName);
        let tempDegreeForMeterTest =  tempDegreeForMeterValue.val();
        /** variables for electrode test  */
        let bufferSolutionValue = $('#bufferSolution' + tableName);
        let bufferSolution      =  bufferSolutionValue.val();
        let bufferSolutionTempBeforeCalibration = $('#bufferSolutionTempBeforeCalibration' + tableName);
        let bufferSolutionTempBeforeCalibrationValue=  bufferSolutionTempBeforeCalibration.val();
        let bufferSolutionTempDuringCalibration = $('#bufferSolutionTempDuringCalibration' + tableName);
        let bufferSolutionTempDuringCalibrationValue=  bufferSolutionTempDuringCalibration.val();
        /**string for calculation change in temp */
        let changeinTempValue = $('#changeinTemp' + tableName);
        let changeinTemperature=  changeinTempValue.val();
        /**trial test */
        let trialmaxMeterValue = $('input[id^="trialTestForMeter' + tableName + '"]').last();
        let trialmaxmeter = trialmaxMeterValue.val();
        let trialmaxValue = $('input[id^="trialTestForElectrode' + tableName + '"]').last();
        let trialmax = trialmaxValue.val();
        /**array string */
        // let array_appliedValueForMeterTest = [];
        let array_readingForMeterTest = [];
        let array_trialmaxmeter = [];
        let array_appliedValueForElectrode = [];
        let array_trialmaxelectrode = [];
        for (let x = 1; x <= numberOfRowPerTable; x++) {
                let rowNumber = 'row' + x;
                let tableIdRowNumber = 'table' + i + rowNumber;
                /**Collect reading readings */
                $('input[id^="readingForMeterTest' + tableIdRowNumber + '"]').each(function() {
                    let readingValue = parseFloat($(this).val());
                    if (!isNaN(readingValue)) {
                        array_readingForMeterTest.push(readingValue);
                    }
                });
                /**Collect reading readings */
                $('input[id^="appliedValueForElectrodeTest' + tableIdRowNumber + '"]').each(function() {
                    let readingValue = parseFloat($(this).val());
                    if (!isNaN(readingValue)) {
                        array_appliedValueForElectrode.push(readingValue);
                    }
                });
                /**Collect reading readings */
                    $('input[id^="trialTestForMeter' + tableIdRowNumber + '"]').each(function() {
                        let readingValue = parseFloat($(this).val());
                            if (!isNaN(readingValue)) {
                                 array_trialmaxmeter.push(readingValue);
                        }
                           
                });

                /**Collect reading readings */
                $('input[id^="trialTestForElectrode' + tableIdRowNumber + '"]').each(function() {
                    let readingValue = parseFloat($(this).val());
                    if (!isNaN(readingValue)) {
                        array_trialmaxelectrode.push(readingValue);
                    }
               
                });
            }   
        let readings = $('#selectFunction' + i).toArray();
        /**get standard value from multiproduct or documenting process */
        let standardExpandedUncertainty;
        let coverageFactor;    
        /**get standard value from buffer solution */
        let uncertaintypH;
        let sensitivityCoefficient;
        /** After collecting all readings, check if any of the values are 'Buffer' or 'Calibrator'
                 * get string value include testForElectrode
                 */
        let standardElectrode = readings.some(element => {
                    let value = $(element).val();
                    return typeof value === 'string' && value.includes('testForElectrode');
            });
        let standardMeter = readings.some(element => {
                    let value = $(element).val();
                    return typeof value === 'string' && value.includes('testForMeter');
            });
        /** Handle cases based on whether 'Buffer' or 'Calibrator' is present in the readings.      */
        if (standardElectrode) {
                    /** uncertainty of pH Standard */
                    let uncertaintypHValue = standardDataBuffer['uncertaintypH'];
                    uncertaintypH = uncertaintypHValue;
                    /**sensitivity coefficient standard */
                    let temp_rangeValue = $('#bufferSolutionTempDuringCalibration' + tableName);
                    let temp_range_value = parseFloat(temp_rangeValue.val()); // Parse the value to float
                    let temp_range = Math.abs(temp_range_value); // Parse the value to float
                    
                        for (let i = 0; i < targetStandardValue.length; i++) {
                            let data = targetStandardValue[i];
                            let temperature = parseFloat(data.temperature);
                            let nextTemperature = parseFloat(data.nextTemperature);
                            let temp_range_C = temp_range; 
            
                            if (temp_range_C >= temperature && temp_range_C < nextTemperature) {
                                sensitivityCoefficient = parseFloat(data.sensitivityCoefficient);
                                break;
                            }
                        }

        }   
        else if (standardMeter) {
            /**get value from appliedVoltagemV */
            let element_rangeValue = $('#appliedVoltagemV' + tableName);
            let element_range_value = parseFloat(element_rangeValue.val()); 
            let element_range = Math.abs(element_range_value); 
            if (standardDataMultiProduct !== undefined) {
                /**  Access the first array element directly */
                let targetStandardValue = Object.values(standardDataMultiProductValues)[0]; 
                for (let i = 0; i < targetStandardValue.length; i++) {
                    let data = targetStandardValue[i];
                    let outputSetting = parseFloat(data.outputSetting);
                    let outputSettingUnit = data.outputSettingUnit;
            
                    let dataNext = targetStandardValue[i + 1];
                    let outputSettingNext = dataNext ? parseFloat(dataNext.outputSetting) : outputSetting;
                    let outputSettingUnitNext = dataNext ? dataNext.outputSettingUnit : outputSettingUnit;
            
                    if (outputSettingUnit === 'V') {
                        outputSetting *= 1000; // Convert to mV
                    }
                    if (outputSettingUnitNext === 'V') {
                        outputSettingNext *= 1000; // Convert to mV
                    }
            
                    let element_range_mV = element_range; // element_range is already in mV
                    /**Check if element_range_mV is less than 100 and adjust Set outputSetting to 100 if element_range_mV is less than 100 */
                    if (element_range_mV < 100) {
                        element_range_mV = 100; // 
                    }
            
                    if (element_range_mV >= outputSetting && element_range_mV < outputSettingNext) {
                        standardExpandedUncertainty = parseFloat(data.uncertainty);
                        coverageFactor = parseFloat(data.coverageFactorValue);
                        let uncertaintyUnit = data.uncertaintyUnit;
                        /**Convert to mV */
                        if (uncertaintyUnit === 'V') {
                            uncertaintyValue *= 1000; 
                        }
                        break;
                    }
                }
              
            } 
            else if (standardDataDocumentingProcess !== undefined ) {  
                /**Function to filter data based on element_range and unit */ 
                function filterData(element_range, data) {
                    let unit = 'mV';
                    let range = element_range;

                    if (element_range >= 100) {
                        unit = 'V';
                        range = element_range / 1000; // Convert mV to V
                    }

                    return data.filter(item => item.rangeValueUnit === unit && item.rangeValue >= range);
                }

                let targetStandardArray = Object.values(standardDataDocumentingProcessValues)[0]; 
                let targetStandardValue = filterData(element_range, targetStandardArray);
                for (let i = 0; i < targetStandardValue.length; i++) {
                    let data = targetStandardValue[i];
                    let settingValue = parseFloat(data.settingValue);
                    let settingValueUnit = data.settingValueUnit;
    
                    let dataNext = targetStandardValue[i + 1];
                    let settingValueNext = dataNext ? parseFloat(dataNext.settingValue) : settingValue;
                    let settingValueUnitNext = dataNext ? dataNext.settingValueUnit : settingValueUnit;
                    /**Convert to mV */
                    if (settingValueUnit === 'V') {
                        settingValue *= 1000; // 
                    }
                    if (settingValueUnitNext === 'V') {
                        settingValueNext *= 1000;
                    }
                    /**element_range is already in mV */
                    let element_range_mV = element_range; 
                    if (element_range_mV >= settingValue && element_range_mV < settingValueNext) {
                        standardExpandedUncertainty = parseFloat(data.uncertainty);
                        coverageFactor = parseFloat(data.coverageFactorValue);
                        break;
                    }
                }
               
            }
        }
        let selectFunctionValue = $("#selectFunction" + i);
        let selectedType = selectFunctionValue.val();  
        /**choosing type */   
        if  (selectedType == 'testForMeter') {
        /**   Calculate Test for Meter      */  
        // let computed_averageAppliedValueForMeterTest = average(array_appliedValueForMeterTest);
        let computed_averageReadingForMeter = average(array_readingForMeterTest);
        let computed_standardDeviationReadingForMeter = standardDeviation(array_readingForMeterTest);    
        let computed_appliedVoltage = appliedVoltage(
                            tempDegreeForMeterTest,
                            pHForMeterTest
                        );
        let computed_tempDegtopH = tempDegtopH(
                            tempDegreeForMeterTest,
                            pHForMeterTest
                        );
        let computed_uncertaintyDueToCalibratorUnc = uncertaintyDueToCalibratorUnc(
                            standardExpandedUncertainty, 
                            millivoltsTopH,
                            coverageFactor  
                        );
        let computed_uncertaintyDueToRepeatabilityForMeter = uncertaintyDueToRepeatabilityForMeter(
            computed_standardDeviationReadingForMeter,
            trialmaxmeter,
                        );
        let computed_uncertaintyDueToResOfPHForMeter = uncertaintyDueToResOfPHForMeter(
                             resolutionOfPH
                        );
        let computed_uncertaintyDueToResOfTempDegreesForMeter = uncertaintyDueToResOfTempDegreesForMeter(
                             resolutionOfTempDegrees,
                             computed_tempDegtopH                          
                        );          
        let computed_combinedUncertaintyForMeter= combinedUncertainty(
            computed_uncertaintyDueToCalibratorUnc,
            computed_uncertaintyDueToRepeatabilityForMeter,
            computed_uncertaintyDueToResOfPHForMeter,
            computed_uncertaintyDueToResOfTempDegreesForMeter,
                        );
        let computed_vEffectiveForMeter = vEffective(
            computed_combinedUncertaintyForMeter,
            computed_uncertaintyDueToCalibratorUnc,
            computed_uncertaintyDueToRepeatabilityForMeter,
            computed_uncertaintyDueToResOfPHForMeter,
            computed_uncertaintyDueToResOfTempDegreesForMeter,
                            
                            degreeOfFreedomDueToCalibrationForMeter,
                            degreeOfFreedomDueToRepeatabilityForMeter,
                            degreeOfFreedomDueToResolutionOfPHForMeter,	
                            degreeOfFreedomDueToResolutionOfDegreesForMeter,	
                        );
        let computed_coverageFactorkForMeter = coverageFactork(
            computed_vEffectiveForMeter,
                        );
        let computed_expandedUncertaintyForMeter = expandedUncertainty(
            computed_combinedUncertaintyForMeter,
            computed_coverageFactorkForMeter
                        );
        /**   Calculated data for test meter      */  
        calculatedData[tableName]['standardInputpHEquivalent'] = pHForMeterTest;
        calculatedData[tableName]['averageAppliedValueForMeterTest'] = pHForMeterTest;
        calculatedData[tableName]['averageReadingForMeter'] = computed_averageReadingForMeter;
        calculatedData[tableName]['standardDeviationReadingMeter'] = computed_standardDeviationReadingForMeter;
        calculatedData[tableName]['appliedVoltage'] = computed_appliedVoltage;
        calculatedData[tableName]['tempDegtopH'] = computed_tempDegtopH;
        calculatedData[tableName]['millivoltsTopH'] = millivoltsTopH;
        calculatedData[tableName]['uncertaintyDueToCalibrationForMeter']  = computed_uncertaintyDueToCalibratorUnc; 
        calculatedData[tableName]['uncertaintyDueToRepeatabilityForMeter'] = computed_uncertaintyDueToRepeatabilityForMeter;
        calculatedData[tableName]['uncertaintyDueToResOfPHForMeter'] = computed_uncertaintyDueToResOfPHForMeter;
        calculatedData[tableName]['uncertaintyDueToResOfDegreesForMeter'] = computed_uncertaintyDueToResOfTempDegreesForMeter;
        calculatedData[tableName]['combinedUncertaintyForMeter'] = computed_combinedUncertaintyForMeter;
        calculatedData[tableName]['vEffectiveForMeter'] = computed_vEffectiveForMeter;
        calculatedData[tableName]['coverageFactorkforMeter'] = computed_coverageFactorkForMeter;
        calculatedData[tableName]['expandedUncertaintyForMeter'] = computed_expandedUncertaintyForMeter;    
            }
        else if (selectedType == 'testForElectrode') {
                   
        let computed_averageAppliedValueForElectrode = average(array_appliedValueForElectrode);
        let computed_repeatability = standardDeviation(array_appliedValueForElectrode);

        /**buffer temperature value base on temperature changes duirng calibration */
        let computed_changeInTempDuringCalibrationValue = changeinTemperature;
        let computed_bufferTemp;

        let selectProcessValue = $("#changeinAtc" + tableName);
        let selectedProcess = selectProcessValue.val();  
        let atcInputFieldValue = $("#atcInputField" + tableName);
        let atcValue = atcInputFieldValue.val();  
    
        /** without ATC */
         if (selectedProcess == '0') { 
            computed_bufferTemp = computed_changeInTempDuringCalibrationValue
        }
        /**with ATC */
        else if (selectedProcess == '1') { 
            computed_bufferTemp = bufferTempATC(
            atcValue,
            );
        }

        let computed_tempDegtopHforElectrode = tempDegtopH(
                     bufferSolutionTempBeforeCalibrationValue,
                     bufferSolution,
                );
        let computed_uncertaintyDueToBufferCalibrationForElectrode = uncertaintyDueToBufferCalibrationForElectrode(
                    uncertaintypH,
                );
        let computed_uncertaintyDueToBufferTempForElectrode = uncertaintyDueToBufferTempForElectrode(  
                    computed_bufferTemp,
                    sensitivityCoefficient,
                );
        let computed_uncertaintyDueToRepeatabilityForElectrode = uncertaintyDueToRepeatabilityForElectrode(
                    computed_repeatability,
                    trialmax
                );  
        let computed_uncertaintyDueToResOfPHForElectrode= uncertaintyDueToResOfPHForElectrode(
                    resolutionOfPH
                );  
        let computed_combinedUncertaintyForElectrode  = combinedUncertainty(
                    computed_uncertaintyDueToBufferCalibrationForElectrode,
                    computed_uncertaintyDueToBufferTempForElectrode,
                    computed_uncertaintyDueToRepeatabilityForElectrode,
                    computed_uncertaintyDueToResOfPHForElectrode,
                );        
        let computed_vEffectiveForElectrode = vEffective(
                    computed_combinedUncertaintyForElectrode,
                    computed_uncertaintyDueToBufferCalibrationForElectrode,
                    computed_uncertaintyDueToBufferTempForElectrode,
                    computed_uncertaintyDueToRepeatabilityForElectrode,
                    computed_uncertaintyDueToResOfPHForElectrode,

                    degreeOfFreedomDueToCalibrationForElectrode,
                    degreeOfFreedomDueToResolutionOfDegreesForElectrode,	
                    degreeOfFreedomDueToRepeatabilityForElectrode,
                    degreeOfFreedomDueToResolutionOfPHForElectrode,
                );
        let computed_coverageFactorkForElectrode = coverageFactork(
                    computed_vEffectiveForElectrode,
                );
        let computed_expandedUncertaintyForElectrode = expandedUncertainty(
                    computed_combinedUncertaintyForElectrode,
                    computed_coverageFactorkForElectrode
                );
        /**   Calculated data for test electrode      */    
        calculatedData[tableName]['testPointForElectrode'] = bufferSolution;
        calculatedData[tableName]['appliedValueForElectrode'] = bufferSolution;
        calculatedData[tableName]['changeInTempDuringCalibrationValue'] = computed_changeInTempDuringCalibrationValue;
        calculatedData[tableName]['computed_tempDegtopHforElectrode'] = computed_tempDegtopHforElectrode;
        calculatedData[tableName]['averageAppliedValueForElectrode'] = computed_averageAppliedValueForElectrode;
        calculatedData[tableName]['repeatabilityForElectrode'] = computed_repeatability;
        calculatedData[tableName]['uncertaintyDueToCalibrationForElectrode']  = computed_uncertaintyDueToBufferCalibrationForElectrode; 
        calculatedData[tableName]['uncertaintyDueToRepeatabilityForElectrode'] = computed_uncertaintyDueToRepeatabilityForElectrode;
        calculatedData[tableName]['uncertaintyDueToResOfPHForElectrode'] = computed_uncertaintyDueToResOfPHForElectrode;
        calculatedData[tableName]['uncertaintyDueToResOfDegreesForElectrode'] = computed_uncertaintyDueToBufferTempForElectrode;
        calculatedData[tableName]['combinedUncertaintyForElectrode'] = computed_combinedUncertaintyForElectrode;
        calculatedData[tableName]['vEffectiveForElectrode'] = computed_vEffectiveForElectrode;
        calculatedData[tableName]['coverageFactorkForElcetrode'] = computed_coverageFactorkForElectrode;
        calculatedData[tableName]['expandedUncertaintyForElectrode'] = computed_expandedUncertaintyForElectrode;
            }
    }
$('#calculatedData').val(JSON.stringify(calculatedData));
addToUncertaintyBudgetTable();
}

let initialValue = '0'; 
function initializeCheckbox(changeinAtcID, initialValue, atcInputFieldID) {
    let $changeinAtc = $('<div>', { 'class': 'form-floating mb-3' }).append(
        $('<div>', { 'class': 'form-check' }).append(
            $('<input>', {
                'type': 'checkbox',
                'id': changeinAtcID,
                'name': changeinAtcID,
                'class': 'form-check-input',
                'value': initialValue,
                'data-group': 'raw_data',
                'checked': initialValue === '1' 
            }).on('change' , function() {
                if ($(this).is(':checked')) { 
                    $(this).val('1');
                    if (!$('#' + atcInputFieldID ).length) { 
                        $('<input>', {
                            'type': 'text',
                            'id': atcInputFieldID,
                            'name': atcInputFieldID,
                            'class': 'form-control mt-3',
                            'placeholder': 'Enter ATC',
                            'data-group': 'raw_data'
                        }).insertAfter($(this).closest('.form-floating'));
                    }
                } else {
                    $(this).val('0'); 
                    $('#' + atcInputFieldID).remove(); 
                }
            }),
            $('<label>', {
                'for': changeinAtcID,
                'class': 'form-check-label',
                'text': 'ATC'
            })
        ),
    );
    return $changeinAtc; 
}

function calculateChangeinTemp(
    bufferSolutionTempBeforeCalibrationID,
    bufferSolutionTempDuringCalibrationID,
    changeinTempID, 
) {
    const variableA = parseFloat($(`#${bufferSolutionTempBeforeCalibrationID}`).val());
    const variableB = parseFloat($(`#${bufferSolutionTempDuringCalibrationID}`).val());
    let result = changeinTemperatureB(variableA, variableB);
    $(`#${changeinTempID}`).val(result);
}

  
