const standardUnit = 'kPa';
const valK = 2;
var selectedSequence = 'B';
var selectedStandard = '';

function bind(id, evt, func) {
    var el = document.getElementById(id);
    if (el.addEventListener){
        el.addEventListener(evt, func);
    } else if (el.attachEvent) {
        el.attachEvent('on' + evt, func);
    }
}
function sequenceSelected(){
    if($("#sequenceB").hasClass( "table-active" )){
        setMeasurementTableSequenceB();
        return 'B';    
    }else if($("#sequenceA").hasClass( "table-active" )){
        setMeasurementTableSequenceA();
        return 'A';
    }
};
function setBinds(){
    bind('sequenceA', 'click', function(){
        $("#sequenceB").removeClass( "table-active" );
        $("#sequenceA").addClass( "table-active" ); 
        sequenceSelected();
    })
    bind('sequenceB', 'click', function(){
        $("#sequenceA").removeClass( "table-active" );
        $("#sequenceB").addClass( "table-active" );    
        sequenceSelected();
    })
    bind('checkedBy','change',function(){
        copyFromDataset('checkedBy', 'verifierPosition', 'verifierposition')
        getEmailOfVerifier('checkedBy');
    });
    bind('verifierPosition','change',function(){
        copyFromDataset('verifierPosition', 'checkedBy', 'verifiername')
    });
    bind('rangeUnit','change',function(){
        setUnits();
    });
    bind('recommendedDueDateSelect','change',function(){
        setDate();
    });
    
    
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
$( document ).ready(function() {
    setBinds();
    sequenceSelected();
    addPersonnel();
    addStandardDetailsToModalTable();
    addCustomerList();
});


function setMeasurementTableSequenceB(){
    selectedSequence = 'B';
    $('#sequenceSelected').val(selectedSequence);
    var tabIndexStart = 27; //starts at 27
    var table = $('#measurementTable'); // select the tbody of the table by id
    table.empty();
    var unit = $('#rangeUnit').find(':selected').text();
    var thead = $('<thead></thead>');
    var tr1 = $('<tr></tr>');
    for (var i = 0; i < 3; i++) {
        tr1.append('<th colspan="2">'+ (i+1) + (i==0 ? 'st ' : (i==1 ? 'nd ' : (i==2 ? 'rd ' : 'th '))) + 'Measurement Series, <span data-id="unit">'+unit+'</span></th>');
    }
    tr1.prepend("<th rowspan='2'>Test Point</th>");
    var tr2 = $('<tr></tr>');
    for (var i = 0; i < 6; i++) {
        tr2.append('<th>' + (i % 2 == 0 ? 'UUC' : 'STD') + ' Reading</th>');
    }
    thead.append(tr1);
    thead.append(tr2);
    $(table).prepend(thead);
    var tbody = $('<tbody></tbody>');
    for (var i = 0; i < 9; i++) {
      var row = $('<tr>');
      for (var j = 1; j <= 6; j++) {
        var inputType = (j % 2 == 0) ? 'std' : 'uuc';
        var series = (j<3)?'M1':(j<5)?'M2':(j<7)?'M3':'M4';
        var addThis = [0, 0, 1, 18, 19, 36, 37];      
        var input = $('<input>', {
          class:'form-control border-0 bg-transparent',
          type: 'text',
          id: series+inputType + 'Row' + i,
          name: series+inputType + 'Row' + i,
          'data-group':"raw_data",
          tabindex: tabIndexStart + parseInt(addThis[j])
        }); 
        var cell = $('<td>').append(input);
        row.append(cell);
      }
      var input = $('<input>', {
        class:'form-control border-0 bg-transparent',
        type: 'text',
        id: 'testPointRow' + i,
        name: 'testPointRow' + i,
        'data-group':"raw_data"
      });
      var cell = $('<td>').append(input);
      row.prepend(cell);
      tabIndexStart += 2;
      tbody.append(row);  //append the row to existing tbody
    }
    $(table).prepend(tbody);
}
function setMeasurementTableSequenceA(){
    selectedSequence = 'A';
    $('#sequenceSelected').val(selectedSequence);
    var tabIndexStart = 27; //starts at 27
    var table = $('#measurementTable'); // select the tbody of the table by id
    table.empty();
    var unit = $('#rangeUnit').find(':selected').text();
    var thead = $('<thead></thead>');
    var tr1 = $('<tr></tr>');
    for (var i = 0; i < 4; i++) {
        tr1.append('<th colspan="2">'+ (i+1) + (i==0 ? 'st ' : (i==1 ? 'nd ' : (i==2 ? 'rd ' : 'th '))) + 'Measurement Series, <span data-id="unit">'+unit+'</span></th>');
    }
    var tr2 = $('<tr></tr>');
    for (var i = 0; i < 8; i++) {
        tr2.append('<th>' + (i % 2 == 0 ? 'UUC' : 'STD') + ' Reading</th>');
    }
    thead.append(tr1);
    thead.append(tr2);
    $(table).prepend(thead);
    var tbody = $('<tbody></tbody>');
    for (var i = 0; i < 9; i++) {
      var row = $('<tr>');
      for (var j = 1; j <= 8; j++) {
        var inputType = (j % 2 == 0) ? 'std' : 'uuc';
        var series = (j<3)?'M1':(j<5)?'M2':(j<7)?'M3':'M4';
        var addThis = [0, 0, 1, 18, 19, 36, 37, 54, 55];      
        var input = $('<input>', {
          class:'form-control border-0 bg-transparent',
          type: 'text',
          id: series+inputType + 'Row' + i,
          name: series+inputType + 'Row' + i,
          tabindex: tabIndexStart + parseInt(addThis[j])
        }); 
        var cell = $('<td>').append(input);
        row.append(cell);
      }
      tabIndexStart += 2;
      tbody.append(row);  //append the row to existing tbody
    }
    $(table).prepend(tbody);
}
function setUnits(){
    let selectedUnit = $('#rangeUnit').val();
    $('span[data-id="unit"]').each(function(){
        $(this).html(selectedUnit)
    })
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
function personnelFromDatabase(officer_ID, verifier_ID, position_ID, officer_db, verifier_db, position_db){
    $('#'+officer_ID).val(officer_db);
    $('#'+verifier_ID).val(verifier_db);
    $('#'+position_ID).val(position_db);
}

function addCustomerList(){
    $.ajax({
        cache: false,
        type: "post",
        url: "/pressureGauge/geCustomerData",
        success: function(result) {
            result.customers.forEach(data => {
                let customer = data.customer + ' @ ' + data.address;
                $('#customerList').append(
                    $('<option>').val(customer)
                )
            })
        },
        error: function (error) {
            console.log(error);
        },
    })
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

function checkCertNum() {
    var search = document.getElementById('certificateNumber').value;
    var certNum = document.getElementById('certificateNumber');
    $.ajax({
        cache: false,
        type: "post",
        url: "/pressureGauge/checkCertificateNumber",
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

function standardToUUC(value, unitStandard, unitUUC){
    let val = parseFloat(value);
    return convert2(val, unitUUC, unitStandard);
}

function addStandardDetailsToModalTable(){
    let tbody = document.createElement('tbody');
    let today = new Date();
    standardDetails.forEach(items=>{
        let date_next_calibration = today;
        let dateCalibrated = items['dateOfCalibration']
        let suffix = 'days left before due date';
        if(dateCalibrated != ''){
          date_next_calibration = new Date(items['dateOfCalibration'])
          date_next_calibration.setFullYear(date_next_calibration.getFullYear() + 1);
        }
        let days_due = Math.round(Math.abs((today - date_next_calibration) / (24 * 60 * 60 * 1000)));
  
        let checkboxId = 'modalStandard'+items['id'];
        let tr = document.createElement('tr');
        tr.setAttribute('onclick','toggleCheckbox("'+checkboxId+'")');

        let checkboxTD = document.createElement('td');
        let checkbox = document.createElement('input');
        checkbox.setAttribute('type','checkbox');
        checkbox.setAttribute('class','form-check-input');
        checkbox.setAttribute('id', checkboxId);
        checkbox.setAttribute('value', items['serialNumber']);
        
        checkboxTD.append(checkbox);    

        let standardDescription = document.createElement('td');
        standardDescription.innerHTML = items['standardDescription'];
        let model = document.createElement('td');
        model.innerHTML = items['model'];
        let serialNumber = document.createElement('td');
        serialNumber.innerHTML = items['serialNumber'];
        let unit = document.createElement('td');
        unit.innerHTML = items['unit_Original']+' → '+items['unit_Converted'];
        let calibrationCertificate = document.createElement('td');
        calibrationCertificate.innerHTML = items['calibrationCertificate'];
        let laboratory = document.createElement('td');
        laboratory.innerHTML = items['laboratory'];
        let days_due_TD = document.createElement('td');
        days_due_TD.innerHTML = days_due + ' ' + suffix;

        

        if(today > date_next_calibration){
            tr.setAttribute('style', 'background-color: rgba(255, 0, 0, 0.4)')
        }else if(today < date_next_calibration){
            tr.setAttribute('style', 'background-color: rgba(0, 255, 0, 0.4)')
            suffix = 'days over due date';
        }else{
            tr.setAttribute('style', 'background-color: rgba(255, 0, 0, 0.4)')
        }
    
        

        tr.append(checkboxTD);  
        tr.append(standardDescription);
        tr.append(model);
        tr.append(serialNumber);
        tr.append(unit);
        tr.append(calibrationCertificate);
        tr.append(laboratory);
        tr.append(days_due_TD);
        
        tbody.append(tr);
    })
    $('#modalStandardTable').append(tbody);

    $('#modalStandardTable').DataTable({
        paging:false
    });
}

function toggleCheckbox(id){
    let chkId = '#'+id;
    $(chkId).prop("checked", !$(chkId).prop("checked"));
    
}

function processModalStandardCheckbox(){
    var selected = $("input[id*='modalStandard']:checked").map(function () {
        return this.value;
    }).get();
    selectedStandard = selected.join('(SPLITHERE)');

    selected.forEach( SN => {
        getValuesOfSelectedStandard(SN)
    })
}

function getValuesOfSelectedStandard(serialNumber){
    $.ajax({
        cache: false,
        type: "post",
        url: "/pressureGauge/get_standard_value_by_serial",
        data: {
            'serialNumber': serialNumber
        },
        success: function(result) {
            standardValues = result;
        },
    })
}

function getAverageOfEnvironment(start, end, average){
    let startVal = parseFloat(document.getElementById(start).value);
    let endVal = parseFloat(document.getElementById(end).value);
    document.getElementById(average).value = (startVal+endVal)/2;
}

function saveData(){
    let certificateNumber = $('#certificateNumber').val();
    let standard = selectedStandard;
    let calculatedData = $('#calculatedData').val();

    let completion = $('#completion').val();
    let calibratorAccountEmail = $('#calibratorAccountEmail').val();;
    let calibratorAccountID = $('#calibratorAccountID').val();
    let verifierEmail = $('#verifierEmail').val();
    let calibratedBy = $('#calibratedBy').val();;
    let checkedBy = $('#checkedBy').val();
    let verifierPosition = $('#verifierPosition').val();    

    let customer_information = $('input[data-group="customer_information"], select[data-group="customer_information"], textarea[data-group="customer_information"]');
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
        url: "/pressureGauge/add_New_Worksheet_Data",
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
            window.location.href = "/pressureGauge/worksheet/"+JSON.parse(result).id;

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
    let calculatedData = $('#calculatedData').val();

    

    let completion = $('#completion').val();
    let calibratorAccountEmail = $('#calibratorAccountEmail').val();;
    let calibratorAccountID = $('#calibratorAccountID').val();
    let verifierEmail = $('#verifierEmail').val();
    let calibratedBy = $('#calibratedBy').val();;
    let checkedBy = $('#checkedBy').val();
    let verifierPosition = $('#verifierPosition').val();    

    let customer_information = $('input[data-group="customer_information"], select[data-group="customer_information"], textarea[data-group="customer_information"]');
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
        url: "/pressureGauge/update_Worksheet_Data",
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

            var toastElement = document.getElementById('toastSaved');//select id of toast
            var toast = new bootstrap.Toast(toastElement);//inizialize it
            toast.show();//show it
        },
        error: function (error) {
            console.log(error);
        },
    })

}

function updateProcessStandard(standardPicked){
    let selectedStandard = standardPicked.split("(SPLITHERE)")
    $('input[type="checkbox"][id*="modalStandard"]').each(function(){
        let currentCheckboxValue = $(this).val();
        if(selectedStandard.includes(currentCheckboxValue)){
            $(this).prop('checked', true);
        }
        
    })
    processModalStandardCheckbox();

}

function uploadFiles(){
    let files = $('#fileInput')[0].files;
    let idOfCertificate = $('#idOfCertificate').val();
    let formData = new FormData();

    for (let i = 0; i < files.length; i++) {
        formData.append('imageFiles[]', files[i]);
    }

    $.ajax({
        url: '/pressureGauge/imageUpdate/' + idOfCertificate,
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
            url: "/pressureGauge/get_data_by_id",
            data: {
                'idOfCertificate' : idOfCertificate,
            },
            success: function(result) {
                //userCheck(result.userData.id, result.worksheetData.calibratorAccountID, result.userData.email, result.worksheetData.calibratorAccountEmail, result.worksheetData.completion)
                $('#saveButton').html('Update')
                $('#saveButton').on("click", function(){updateData()});

                let calculatedDataRAW = result.worksheetData['calculatedData'];
                let calculatedData = calculatedDataRAW != "" ? JSON.parse(calculatedDataRAW) : {};
                $('#calculatedData').val(JSON.stringify(calculatedData));
                

                if(result.worksheetData['standard'] != null){
                    updateProcessStandard(result.worksheetData['standard']);
                }

                let infoArray = ['customerInfo', 'equipmentInfo', 'environmentInfo'];
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

                let infoArray_dataInputs = ['dataInputs'];
                for (let i = 0; i < infoArray_dataInputs.length; i++) {
                    let infoValues = JSON.parse(result.worksheetData[infoArray_dataInputs[i]]);
                    let keys = Object.keys(infoValues);
                    for (let x = 0; x < keys.length; x++) {
                        let id = keys[x];
                        $('#'+id).val(infoValues[id])                        
                    }   
                }    


                if(calculatedDataRAW != "{}"){
                    addToUncertaintyBudgetTable();
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



