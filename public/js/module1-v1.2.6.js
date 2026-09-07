$( document ).ready(function() {
    addPersonnel();
    addStandardDetailsToModalTable();
    setBinds();
    eccentricityTestTable();
    illustrationTable();
    addCustomerList();
    //repeatabilityTable();
});

var numberOfRow = 1;
var selectedStandard = '';
var standardValues = {};
var currentlySelected = 0;

function bind(id, evt, func) {
    var el = document.getElementById(id);
    if (el.addEventListener){
        el.addEventListener(evt, func);
    } else if (el.attachEvent) {
        el.attachEvent('on' + evt, func);
    }
}

function setBinds(){ 
    bind('checkedBy','change',function(){
        copyFromDataset('checkedBy', 'verifierPosition', 'verifierposition')
        getEmailOfVerifier('checkedBy');
    });
    bind('verifierPosition','change',function(){
        copyFromDataset('verifierPosition', 'checkedBy', 'verifiername')
    });
    bind('linearityAddButton','click',function(){
        linearityTable()
    });    
    bind('linearityDeleteButton','click',function(){
        if($('#linearityTable tbody').children().length != 0){
            $('#linearityTable tbody').children(':last-child').remove();
            numberOfRow--;    
        }
    }); 

    bind('numberOfRepeatabilityAdd','click',function(){
        repeatabilityTable()
    }); 
    bind('dateCalibrated','change',function(){
        setDate();
    });
    bind('recommendedDueDateSelect','change',function(){
        setDate();
    });

    bind('unit','change',function(){
        let numberOfRow = $('#linearityTable tbody').children().length;
        let newUnit = $(this).val()
        for (let i = 1; i <= numberOfRow; i++) {
            // fallback value = 0 is there is no value in indication
            // will prevent NaN in linearError;
            let indicationVal = $("#indication"+i).val() === '' ? 0 : parseFloat($("#indication"+i).val());
            let convetionalMassG = $("#conventionalMassG"+i).val() === '' ? 0 : parseFloat($("#conventionalMassG"+i).val())
            $("#conventionalMassCurrentUnit"+i).val(convertMass(convetionalMassG, 'g', newUnit));
            $("#linearError"+i).val((indicationVal - convertMass(convetionalMassG, 'g', newUnit)).toFixed(6));
        }
    });

    bind('equipmentType','click',function(){
        setResolution()
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

function personnelFromDatabase(officer_ID, verifier_ID, position_ID, officer_db, verifier_db, position_db){
    $('#'+officer_ID).val(officer_db);
    $('#'+verifier_ID).val(verifier_db);
    $('#'+position_ID).val(position_db);
}

function standardToUUC(value, unitStandard, unitUUC){
    let val = parseFloat(value);
    return convert2(val, unitUUC, unitStandard);
}

function addStandardDetailsToModalTable(){
    let tbody = document.createElement('tbody');
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
        let tr = document.createElement('tr');
        tr.setAttribute('onclick','toggleCheckbox("'+checkboxId+'")');
        tr.setAttribute('style', bgColor)

        let checkboxTD = document.createElement('td');
        let checkbox = document.createElement('input');
        checkbox.setAttribute('type','checkbox');
        checkbox.setAttribute('class','form-check-input');
        checkbox.setAttribute('id', checkboxId);
        // checkbox.setAttribute('value', items['serialNumber']);
        checkbox.setAttribute('value', items['id']);


        if (today.getFullYear() === dueDate.getFullYear() && today.getMonth() === dueDate.getMonth() && today.getDate() === dueDate.getDate()) {
            $(checkbox).prop("disabled", true);
            $(tr).removeAttr("onclick");
        }
        else if (today > dueDate) {
            $(checkbox).prop("disabled", true);
            $(tr).removeAttr("onclick");
        }
        
        checkboxTD.append(checkbox);    

        let standardDescription = document.createElement('td');
        standardDescription.innerHTML = items['description'];
        let classTD = document.createElement('td');
        classTD.innerHTML = items['class'];
        let serialNumber = document.createElement('td');
        serialNumber.innerHTML = items['serialNumber'];
        let typeTD = document.createElement('td');
        typeTD.innerHTML = items['type'];
        let calibrationCertificate = document.createElement('td');
        calibrationCertificate.innerHTML = items['certificateNumber'];
        let laboratory = document.createElement('td');
        laboratory.innerHTML = items['calibrationProvider'];
        let daye_due_html = document.createElement('td');
        daye_due_html.innerHTML = days_due + ' ' + suffix;
        

        tr.append(checkboxTD);  
        tr.append(standardDescription);
        tr.append(classTD);
        tr.append(serialNumber);
        tr.append(typeTD);
        tr.append(calibrationCertificate);
        tr.append(laboratory);
        tr.append(daye_due_html);

        if(today > dateOfCalibration){
            tbody.append(tr)
        }else{
            tbody.prepend(tr)
        }

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
    
    let tempSelectedStandard = selected.join('(SPLITHERE)');

    selected.forEach( SN => {
        getValuesOfSelectedStandard(SN)
    })
    let old = selectedStandard.split('(SPLITHERE)');
    let newSelected = selected;
    if(!old.every(item => newSelected.includes(item))){
        for (let i = 1; i <= $('#linearityTable tbody').children().length; i++) {
            let currentlySelected = i;
            $("#valuesId"+currentlySelected).val('')
            $("#markingsUsed"+currentlySelected).val('')
            $("#standardUsed"+currentlySelected).val('')
            $("#conventionalMassG"+currentlySelected).val(0)
            $("#conventionalMassCurrentUnit"+currentlySelected).val(0)
            $("#linearError"+currentlySelected).val(0)
            $("#standardUncertainty"+currentlySelected).val(0)
            $("#mpe"+currentlySelected).val(0)
            $("#class"+currentlySelected).val(0)
            $("#convection"+currentlySelected).val(0)
        }
    }

    selectedStandard = tempSelectedStandard
    standardValues = {}
    getValuesOfSelectedStandardUsingSerialNumber();
}

function setResolution(){
    let type = $("#equipmentType").val()
    $("#readability").html('');

    if(type === 'analog'){
        $("#readability").append($("<option>",{
            'html': "1/2",
            'value':'0.5'
        }),
        $("<option>",{
            'html': "1/5",
            'value':'0.2'
        }),
        $("<option>",{
            'html': "1/10",
            'value':'0.1'
        }))
    }else if(type === 'digital'){
        $("#readability").append($("<option>",{
            'html': "0.5",
            'value':'0.5'
        }))
    }else{
        $("#readability").html('');
    }
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

function getAverageOfEnvironment(start, end, average){
    let startVal = parseFloat(document.getElementById(start).value);
    let endVal = parseFloat(document.getElementById(end).value);
    document.getElementById(average).value = (startVal+endVal)/2;
}

function convertMass(value, currentUnit, targetUnit){
    const conversionRates = {
      mg: 0.001,
      g: 1,
      kg: 1000
    };
    let answer = value * conversionRates[currentUnit] / conversionRates[targetUnit];
    return answer;
}

function matchDecimal(value, numberOfDecimalPoints){
    if (!isNaN(value)) {
        return parseFloat(value).toFixed(numberOfDecimalPoints);
    } else if (typeof value === 'string') {
        var numericValue = parseFloat(value);
        if (!isNaN(numericValue)) {
            return numericValue.toFixed(numberOfDecimalPoints);
        } else {
            return "Error: Invalid numeric value in value";
        }
    } else {
        return "Error: Invalid type for value (NaN)";
    }
}
function sigFig(value, digits){
    value = parseFloat(value);
    digits = parseFloat(digits);

    if (value === 0) {
        var decimalPlaces = digits - 1;
    } else if (value < 0) {
        var decimalPlaces = digits - Math.floor(Math.log10(value * -1)) - 1;
    } else {
        var decimalPlaces = digits - Math.floor(Math.log10(value)) - 1;
    }

    var answer = (decimalPlaces > 0) ?
        parseFloat(value.toFixed(decimalPlaces)) : Math.round(value * Math.pow(10, decimalPlaces)) / Math.pow(10, decimalPlaces);

    return answer;
}
function countDecimals(value) {
    // Convert the value to a string
    var valueString = value.toString();

    // Check if the value contains a decimal point
    if (valueString.indexOf('.') !== -1) {
        // Get the substring after the decimal point
        var decimalPart = valueString.split('.')[1];

        // Return the length of the decimal part
        return decimalPart.length;
    } else {
        // If there is no decimal point, return 0
        return 0;
    }
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

    let customer_information = $('input[data-group="customer_information"], select[data-group="customer_information"]');
    let equipment_information = $('input[data-group="equipment_information"], select[data-group="equipment_information"]');
    let environmental_information = $('input[data-group="environmental_information"], select[data-group="environmental_information"]');
    let raw_data = $('input[data-group="raw_data"], select[data-group="raw_data"]');

    let graph_data_raw = $('input[data-group="graph_data"], select[data-group="graph_data"]');

    let customerValues = {};
    let equipmentValues = {};
    let environmentalValues = {};
    let rawValues = {};
    let graph_values = {};

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
        if($(this).attr('type') == 'radio'){
            if($(this).prop('checked') == true){
                rawValues[key] = 'checked';
            }else{
                rawValues[key] = value;
            }
        }
    });
    var dataInputs = JSON.stringify(rawValues);

    graph_data_raw.each(function() {
        let key = $(this).attr('id');
        let value = $(this).val();
        graph_values[key] = value;
    });
    var graph_data = JSON.stringify(graph_values);
    

    $.ajax({
        cache: false,
        type: "post",
        url: "/electronicBalance/add_New_Worksheet_Data",
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
            'graph_data': graph_data,
        },
        success: function(result) {
            console.log(result);
            $('#idOfCertificate').val(JSON.parse(result).id);
            window.location.href = "/electronicBalance/worksheet/" + JSON.parse(result).id;
            

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

    let customer_information = $('input[data-group="customer_information"], select[data-group="customer_information"]');
    let equipment_information = $('input[data-group="equipment_information"], select[data-group="equipment_information"]');
    let environmental_information = $('input[data-group="environmental_information"], select[data-group="environmental_information"]');
    let raw_data = $('input[data-group="raw_data"], select[data-group="raw_data"]');

    let graph_data_raw = $('input[data-group="graph_data"], select[data-group="graph_data"]');

    let customerValues = {};
    let equipmentValues = {};
    let environmentalValues = {};
    let rawValues = {};
    let graph_values = {};

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
        if($(this).attr('type') == 'radio'){
            if($(this).prop('checked') == true){
                rawValues[key] = 'checked';
            }else{
                rawValues[key] = value;
            }
        }
    });
    var dataInputs = JSON.stringify(rawValues);

    graph_data_raw.each(function() {
        let key = $(this).attr('id');
        let value = $(this).val();
        graph_values[key] = value;
    });
    var graph_data = JSON.stringify(graph_values);

    $.ajax({
        cache: false,
        type: "post",
        url: "/electronicBalance/update_Worksheet_Data",
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
            'graph_data': graph_data,
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

$( window ).on( "load", function() {
    if ($('#idOfCertificate').val() != ''){
        let idOfCertificate = $('#idOfCertificate').val();
        $.ajax({
            cache: false,
            type: "post",
            url: "/electronicBalance/get_data_by_id",
            data: {
                'idOfCertificate' : idOfCertificate,
            },
            success: function(result) {
                //userCheck(result.userData.id, result.worksheetData.calibratorAccountID, result.userData.email, result.worksheetData.calibratorAccountEmail, result.worksheetData.completion)
                $('#saveButton').html('Update')
                $('#saveButton').on("click", function(){updateData()});
                
                if(result.worksheetData['standard'] != null){
                    // selectedStandard = result.worksheetData['standard'];
                    updateProcessStandard(result.worksheetData['standard']);
                }               

                let count = 0;
                let countRepeat = -1;
                for (let key in JSON.parse(result.worksheetData['dataInputs'])) {
                    if (key.startsWith('linearLoad')) {
                        count++;
                    }
                    if(key.startsWith('repeat')){
                        countRepeat++;
                    }

                }
                $('#numberOfRepeatability').val(countRepeat);
                if($('#numberOfRepeatability').val() > 0){
                    $('#numberOfRepeatabilityAdd').trigger('click')
                }
                
                for (let index = 0; index < count; index++) {
                    linearityTable()
                }

                let infoArray = ['customerInfo', 'equipmentInfo', 'environmentInfo', 'dataInputs', 'graph_data'];
                for (let i = 0; i < infoArray.length; i++) {
                    let infoValues = JSON.parse(result.worksheetData[infoArray[i]]);
                    if(infoValues == null){
                        continue;
                    }
                    let keys = Object.keys(infoValues);
                    for (let x = 0; x < keys.length; x++) {
                        let id = keys[x];
                        if(infoValues[id]==='checked'){
                            $('#'+id).attr(infoValues[id], true)      
                        }else{
                            $('#'+id).val(infoValues[id])      
                        }
                        if(id == 'equipmentType'){
                            bind(id,'click',function(){
                                setResolution()
                            });
                            $('#'+id).trigger('click')
                            $('#'+id).off('click')
                        }
                    }

                }    

                personnelFromDatabase('calibratedBy', 'checkedBy', 'verifierPosition', result.worksheetData['calibrationOfficer'], result.worksheetData['checkedBy'], result.worksheetData['verifierPosition'])

                $('#status').val(result.worksheetData['completion'])
                
                let calculatedDataRAW = result.worksheetData['calculatedData'];
                let calculatedData = calculatedDataRAW != "" ? JSON.parse(calculatedDataRAW) : {};
                $('#calculatedData').val(JSON.stringify(calculatedData));
                addToUncertaintyBudgetTable()
                  
                tableChart(result.worksheetData['calculatedData'], result.worksheetData['dataInputs'], result.worksheetData['equipmentInfo'])

                
                
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
        $('#submitButton').attr('disabled', '');   
    }
});

function uploadFiles(){
    let files = $('#fileInput')[0].files;
    let idOfCertificate = $('#idOfCertificate').val();
    let formData = new FormData();

    for (let i = 0; i < files.length; i++) {
        formData.append('imageFiles[]', files[i]);
    }

    $.ajax({
    url: '/electronicBalance/imageUpdate/' + idOfCertificate,
    // url: '/electronicBalance/imageUpdate/' + 34,
      type: 'POST',
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success: function(response) {
        console.log('Files uploaded successfully:', response);
        //window.location.href = "/electronicBalance/worksheet/" + idOfCertificate;
      },
      error: function(error) {
        console.error('Error uploading files:', error);
      }
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

//#region TABLE FUNCTIONS
function eccentricityTestTable(){
    var loadPositions = [1, 2, 3, 4, 5, 1];
    var tableBody = $("#eccentricityTable tbody");

    for (let i = 0; i < loadPositions.length; i++) {
        if(i===0){
            let row = $("<tr></tr>");
            row.append("<td class='align-middle'>" + loadPositions[i] + "</td>");
            row.append("<td><input class='form-control border-0' data-group='raw_data' data-required='true' type='text' id='eccentricity" + loadPositions[i] + "Start'></td>");
            row.append("<td class='bg-secondary'></td>");
            tableBody.append(row);
            bind("eccentricity" + loadPositions[i] + "Start",'input',function(){
                eccentricityError();
            });
        }
        else if(i===(loadPositions.length-1)){
            let row = $("<tr class='d-none'></tr>");
            row.append("<td class='align-middle d-none'>" + loadPositions[i] + "</td>");
            row.append("<td><input class='form-control border-0 d-none' data-group='raw_data' data-required='false' type='text' id='eccentricity" + loadPositions[i] + "End'></td>");
            row.append("<td><input class='d-none' data-group='raw_data' data-required='false' type='hidden' id='error" + loadPositions[i] + "'><input class='form-control border-0' data-group='raw_data' data-required='false' type='text' id='error" + loadPositions[i] + "View' tabindex='-1' readonly></td>");
            tableBody.append(row); 
        }
        else{
            let row = $("<tr></tr>");
            row.append("<td class='align-middle'>" + loadPositions[i] + "</td>");
            row.append("<td><input class='form-control border-0' data-group='raw_data' data-required='true' type='text' id='eccentricity" + loadPositions[i] + "'></td>");
            row.append("<td><input class='' data-group='raw_data' data-required='false' type='hidden' id='error" + loadPositions[i] + "'><input class='form-control border-0' data-group='raw_data' data-required='false' type='text' id='error" + loadPositions[i] + "View' tabindex='-1' readonly></td>");
            tableBody.append(row);    
            bind("eccentricity" + loadPositions[i],'input',function(){
                eccentricityError();
            }); 
        }
    }
    var row = $("<tr class='d-none'></tr>");
    row.append("<td class='bg-secondary'></td>");
    row.append("<td class='align-middle'>Error Difference</td>");
    row.append("<td><input class='form-control border-0' data-group='raw_data'  data-required='false' type='text' id='errDiff'></td>");
    tableBody.append(row);     

}

function illustrationTable(){
    var table = $("#illustrationTable");
    var images = [
        { id: "illusA", src: "/image/SREBillustrationA.png" },
        { id: "illusB", src: "/image/SREBillustrationB.png" },
        { id: "illusC", src: "/image/SREBillustrationC.png" },
    ];
    var row = $("<tr>");
    for (var i = 0; i < images.length; i++) {
        var image = images[i];
        var column = $("<td>").append(
            $("<label>").append(
                $("<input>").attr("type", "radio").attr("name", "illusRadio").attr("id", image.id).attr("value", image.id).attr('data-group', 'raw_data').attr('class', 'mx-2'),
                $("<img>").attr("src", image.src).attr('height', '90px')
            ).attr('class', 'form-check-label')
        );
        row.append(column);
    }
    column.append($("<label>").append(
            $("<input>").attr("type", "radio").attr("name", "illusRadio").attr("id", 'illusOther').attr("value", 'illusOther').attr('data-group', 'raw_data').attr('class', 'mx-2'),
            $("<input>").attr("type", 'file').attr('class', 'form-control')
        ).attr('class', 'form-check-label')
    )
    row.append(column);
    table.append(row);
}

function linearityTable(){
    var table = $("#linearityTable tbody");
    let idsForInput = ['linearLoad','indication','standardUsed'];
    let idsForHiddenInput = ['valuesId', 'markingsUsed', 'conventionalMassCurrentUnit', 'conventionalMassG', 'standardUncertainty', 'mpe', 'convection', 'class', 'linearError']
    let tr = $('<tr>');
    let divHidden = $('<div>').attr('class', 'd-none');
    for (let x = 0; x < idsForInput.length; x++) {
        let td = $('<td>');
        if(idsForInput[x] === 'standardUsed'){
            let div = $('<div>').attr('class', 'input-group');
            let input = $('<input>').attr('type', 'text').attr('data-group', 'raw_data').attr('data-required', 'false').attr('class', 'form-control border ').attr('id', idsForInput[x] + numberOfRow);
            let addButton = $('<button>').attr('type', 'button').attr('class', 'btn btn-primary').attr('data-bs-toggle', 'modal').attr('data-bs-target', '#standardValuesModal').attr('data-rownumber', numberOfRow).text('+').click(function(){
                currentlySelected = $(this).data("rownumber");
                resetButton();
              });
            div.append(input, addButton);
            td.append(div);
        }else{
            let input = $('<input>').attr('type', 'text').attr('data-group', 'raw_data').attr('data-required', 'false').attr('class', 'form-control border ').attr('id', idsForInput[x] + numberOfRow);
            td.append(input);
        }
        tr.append(td);
    }
    for (let x = 0; x < idsForHiddenInput.length; x++) {
        let input = $('<input>').attr('type', 'hidden').attr('data-group', 'raw_data').attr('data-required', 'false').attr('id', idsForHiddenInput[x] + numberOfRow);
        if(idsForHiddenInput[x] != 'valuesId' && idsForHiddenInput[x] != 'markingsUsed'){
            input.val('0');
        }
        divHidden.append(input);
    }
    tr.prepend(divHidden);
    table.append(tr);
    numberOfRow++
}

function repeatabilityTable(){
    let table = $('#repeatabilityTableTbody');
    let numberOfRepeatability = parseFloat($('#numberOfRepeatability').val());
    let leftCount = Math.ceil(numberOfRepeatability/2)
    $(table).html('');
    for (let i = 1; i <= leftCount; i++) {
        let rightLoadCount = leftCount + i;
        let leftKey = 'repeat' + i;
        if(rightLoadCount <= numberOfRepeatability){
            let rightKey = 'repeat' + (rightLoadCount);

            let tr = $('<tr>')
            let trialA = $('<td class="text-center">').html(i)
            let inputA = $('<input>').attr('class', "form-control border-0").attr('data-group','raw_data').attr('data-required','true').attr('id', leftKey).on('input', function(){repeatabilityStandardDeviation();})
            let indicationA = $('<td>').append(inputA)
            let trialB = $('<td class="text-center">').html(rightLoadCount)
            let inputB = $('<input>').attr('class', "form-control border-0").attr('data-group','raw_data').attr('data-required','true').attr('id', rightKey).on('input', function(){repeatabilityStandardDeviation();})
            let indicationB = $('<td>').append(inputB)
            tr.append(trialA, indicationA, trialB, indicationB)
            table.append(tr)
        }else{
            let tr = $('<tr>')
            let trialA = $('<td class="text-center">').html(i)
            let inputA = $('<input>').attr('class', "form-control border-0").attr('data-group','raw_data').attr('data-required','true').attr('id', leftKey).on('input', function(){repeatabilityStandardDeviation();})
            let indicationA = $('<td>').append(inputA)
            let trialB = $('<td class="text-center" >').html()
            let indicationB = $('<td colspan="2">').append('')
            tr.append(trialA, indicationA, trialB, indicationB)
            table.append(tr)
        }
    }

    let tr = $('<tr>');
    let label = $('<td colspan="3" class="text-end">').html("St. Dev. (g)");
    let input = $('<input>').attr('class', "form-control border-0").attr('data-group','raw_data').attr('data-required','false').attr('id', 'stDev');
    let indication = $('<td>').append(input);
    tr.append(label, indication);
   
    table.append(tr);
}

function removeRepeatabilityTable(){
    let table = $('#repeatabilityTableTbody');
    let numberOfRepeatability = parseFloat($('#numberOfRepeatability').val());
    let leftCount = Math.ceil(numberOfRepeatability/2)

    

    let tr = $('<tr>');
    let label = $('<td colspan="3" class="text-end">').html("St. Dev. (g)");
    let input = $('<input>').attr('class', "form-control border-0").attr('data-group','raw_data').attr('data-required','false').attr('id', 'stDev');
    let indication = $('<td>').append(input);
    tr.append(label, indication);
    table.append(tr);
}

function addValuesToStandardValuesModal(){
    let table = $('#modalStandardValueTable tbody');
    table.html('');
    $.each(standardValues, function(key, value) {
        for (let i = 0; i < value['values'].length; i++) {
            let markingsToBeUsed = '';
            if(value['values'][i]['marking']=='none'){
                markingsToBeUsed = value['values'][i]['serialNumber'] + ' - ' + value['values'][i]['nominalValue'] + " "+ value['values'][i]['nominalUnit'] + ' - none';
            }else if(value['values'][i]['marking']=='point'){
                markingsToBeUsed = value['values'][i]['serialNumber'] + ' - ' + value['values'][i]['nominalValue'] + " "+ value['values'][i]['nominalUnit'] + ' - point';
            }else{
                markingsToBeUsed = value['values'][i]['marking'];
            }
            
            let tr = $('<tr>');
            let nominalValue = $('<td>').html(value['values'][i]['nominalValue'] + " "+ value['values'][i]['nominalUnit']);
            // let serialNumber = $('<td>').html(value['values'][i]['serialNumber']);
            let serialNumber = $('<td>').html(value['details'][0]['serialNumber']);
            // let marking = $('<td>').html(value['values'][i]['marking']);
            let marking = $('<td>').html(markingsToBeUsed);
            let conventionalMass = $('<td>').html(value['values'][i]['conventionalMass']);
            let unit = $('<td>').html(value['values'][i]['unit']);
            let uncertainty = $('<td>').html(value['values'][i]['uncertainty']);
            let mpe = $('<td>').html(value['values'][i]['mpe']);

            let button = $('<td>').append($('<button>').attr('class', 'button').attr('class', 'btn btn-outline-secondary').attr('id', 'standardButton' + value['values'][i]['id']).attr('data-function', 'add').attr('data-id', value['values'][i]['id']).html('Use').click(function(){
                // standardUseButton(value['values'][i]['id'], value['values'][i]['marking'], value['values'][i]['conventionalMass'], value['values'][i]['uncertainty'], value['values'][i]['mpe'], value['values'][i]['type'], $(this));
                standardUseButton(value['values'][i]['id'], markingsToBeUsed, value['values'][i]['conventionalMass'], value['values'][i]['uncertainty'], value['values'][i]['mpe'], value['details'][0]['type'], $(this));
            }));

            tr.append(nominalValue, serialNumber, marking, button, conventionalMass, unit, uncertainty, mpe);
            table.append(tr)
        }
        
    });
}

function resetButton(){
    let IDS = $('#valuesId'+currentlySelected).val();
    let arrayIDS = IDS.split("(SPLIT)");

    var useButtons = $('button[id^="standardButton"]');
    useButtons.each(function() {
        $(this).html("Use");
        $(this).data('function', 'add');
      });

    for (let i = 0; i < arrayIDS.length; i++) {
        let idOfButton = 'standardButton'+arrayIDS[i];
        if ($('#'+idOfButton).data("function") == 'add'){
            $('#'+idOfButton).html("Unselect");
            $('#'+idOfButton).data('function', 'remove');
        }
    }
    $('#marksUsed').html('');
    $('#convenMassTotalG').html('');
    $('#convenMassTotalCurrent').html('');
    $('#uncertaintyTotal').html('');
    $('#mpeTotal').html('');
    addFromHiddenToModal();
}

function addFromHiddenToModal(){
    let marks = $('#markingsUsed'+currentlySelected).val()
    let indication = $("#indication"+currentlySelected).val();
    let convenUnit = $('#conventionalMassCurrentUnit'+currentlySelected).val()
    let convenG = $('#conventionalMassG'+currentlySelected).val()
    let uncert = $('#standardUncertainty'+currentlySelected).val()
    let mpe = $('#mpe'+currentlySelected).val()
    let classification = $('#class'+currentlySelected).val()
    let convec = $("#convection"+currentlySelected).val(); 
    let linearError = $("#linearError"+currentlySelected).val();
    let unit = $('#unit').val()

    var marksPlus = marks.replace(/\(SPLIT\)/g, " + ");

    $('#marksUsed').html(marksPlus);
    $('#indicationCurrent').html(indication);
    $('#convenMassTotalG').html(convenG);
    $('#convenMassTotalCurrent').html(convenUnit);
    $('#currentUnit').html(unit);
    $('#linearErrorTotal').html(linearError);
    $('#uncertaintyTotal').html(uncert);
    $('#mpeTotal').html(mpe);
    $('#standardClass').html(classification);
    $('#convection').html(convec);
}
//#endregion TABLE FUNCTIONS

//#region CHART FUNCTIONS

function tableChart(calculatedData, dataInputs, equipmentInfo){
    let $tbody = $('<tbody>');
    let array_calculatedData = JSON.parse(calculatedData)
    let array_dataInputs = JSON.parse(dataInputs)
    let numberOfCalculated = array_calculatedData.length;

    readabilityDecimalPoint = countDecimals($('#resolution').val())

    for (let i = 0; i < numberOfCalculated; i++) {
        let n = i+1
        let linearLoad = matchDecimal(array_dataInputs['linearLoad'+ n], readabilityDecimalPoint)
        let indication = matchDecimal(array_dataInputs['indication'+ n], readabilityDecimalPoint)
        let linearError = matchDecimal(array_dataInputs['linearError'+ n], readabilityDecimalPoint)
        let uncertainty = sigFig(array_calculatedData[i]['expandedUncertainty'], 2)

        let $tr = $('<tr>')
        let $td1 = $('<td>')
        let $td2 = $('<td>')
        let $td3 = $('<td>')
        let $td4 = $('<td>')
        let $td5 = $('<td>',{
            'id': 'uncert'+n,
            'data-value': uncertainty
        })

        let $checkbox = $('<input>', {
            'type' : 'checkbox',
            'id' : 'linear'+ n,
            'name' : 'linear',
            'value' : n,
            'checked': ''
        })
        let $label1 = $('<label>', {
            'for': 'linear'+ n,
            'html': linearLoad,
        })
        let $label2 = $('<label>', {
            'for': 'linear'+ n,
            'html': indication,
        })
        let $label3 = $('<label>', {
            'for': 'linear'+ n,
            'html': linearError,
        })
        let $label4 = $('<label>', {
            'for': 'linear'+ n,
            'html': uncertainty,
        })
        $td1.append($checkbox)
        $td2.append($label1)
        $td3.append($label2)
        $td4.append($label3)
        $td5.append($label4)
        $tr.append($td1,$td2,$td3,$td4,$td5)
        $tbody.append($tr)
    }    
    $("#chartTable").append($tbody);
    setPoints(calculatedData, dataInputs, equipmentInfo)
}
function setPoints(calculatedData, dataInputs, equipmentInfo){
    let calculated, inputs, equipment;
    if(calculatedData==null){
        $.ajax({
            async: false,
            cache: false,
            type: "post",
            url: "/electronicBalance/get_data_by_id",
            data: {
                'idOfCertificate' :  $('#idOfCertificate').val(),
            },
            success: function(result) {
                calculated = result.worksheetData['calculatedData'];
                inputs = result.worksheetData['dataInputs'];
                equipmentInfo = result.worksheetData['equipmentInfo'];
                equipment = equipmentInfo;
            },
        })
    }else{
        calculated = calculatedData;
        inputs = dataInputs;
        equipment = equipmentInfo
    }

    let array_calculatedData = JSON.parse(calculated)
    let array_dataInputs = JSON.parse(inputs)
    let array_equipmentInfo = JSON.parse(equipment)

    let checkboxes = document.getElementsByName('linear');
    let objectArray = [];
    for (var i=0; i<checkboxes.length; i++) {
        let objectChecked = {};
        let n = i+1
        if (checkboxes[i].checked) {
            let selectedClassID = i === 0 ? 'class2' : 'class' + (i+1);     
            let conventionalMass_key =  'conventionalMassCurrentUnit'+(i+1);
            // let linearLoad = matchDecimal(array_dataInputs['linearLoad'+ n], readabilityDecimalPoint)
            // let linearError = matchDecimal(array_dataInputs['linearError'+ n], readabilityDecimalPoint)
            //let uncertainty = sigFig(array_calculatedData[i]['expandedUncertainty'], 2)
            // equipment
            // getCMCValue($maxCapacity, $classPerTestPoint, $unit, $conventionalMassForCMC, $array_calculatedData[i]['expandedUncertainty'])
            
            let indication = Number(array_dataInputs['indication'+n])
            let conventionalMassCurrentUnit = Number(array_dataInputs['conventionalMassCurrentUnit'+n])
            let linearLoad = matchDecimal(array_dataInputs['linearLoad'+ n], readabilityDecimalPoint)
            let lin_err = indication - conventionalMassCurrentUnit
            let linearError = matchDecimal(lin_err, readabilityDecimalPoint)
            let uncertainty = getCMCValue(array_equipmentInfo.maxCapacity, array_dataInputs[selectedClassID], array_equipmentInfo.unit, array_dataInputs[conventionalMass_key], array_calculatedData[i]['expandedUncertainty'])    
            

            objectChecked["x"] = linearLoad;
            objectChecked["y"] = linearError;
            objectChecked["err"] = uncertainty;
            objectArray.push(objectChecked);

        }
    }
    createChart(objectArray)
}
function createChart(data){
    let array_x = [];
    let array_y = [];
    let array_err = [];
    let array_label = [];
    let array_range = [$('#min').val(), $('#max').val()];
    let tickFormat = '.'+ $('#vFormat').val() +'f';
    let start_at = $('#start_at').val();   
    let step_size = $('#step_size').val();  


    var chartImage= $('#chartImage');

    let unit = $('#unit').val();

    data.forEach(element => {
        array_x.push(parseFloat(element.x));
        array_y.push(parseFloat(element.y));
        array_err.push(parseFloat((element.err).toPrecision(2)));
        array_label.push(element.x);
    });

    const trace = {
        x: array_x,
        y: array_y,
        error_y: {
            type: 'data',
            array: array_err,
            visible: true,
            color: 'red',
        },
        type: 'scatter',
        mode: 'markers',
        marker: {
            size: 12, 
        },    
    };

    var data = [trace];

    const layout = {
        xaxis : {
            'type':'category',
            'title': '<i>Load ('+unit+')</i>',
            'tickmode': 'array',
            'tickvals': array_x,
            'ticktext': array_label,
            'showgrid': false,
        },  
        yaxis : {
            'title': {
                'text':'<i>Error ('+unit+')</i>',
                'standoff': 10
            },
            'tickformat': tickFormat, // number of decimal points in y-axis label .4f = 0.0000, .5f = 0.00000
            'showgrid': false,
            'range': array_range,
            'tick0': start_at,    
            'dtick': step_size  
        },
        margin : {
            t:50,
            l:100,
            r:30
        }
    };

    Plotly.newPlot('polyChart', data, layout).then(function(gd){
        Plotly.toImage(
            gd,{
                'format':'png',
            }
        ).then(
            function(url){
                chartImage.attr("src", url);
                $('#chart_input').val(url)
            }
        )
    })
}

function removeSubscripts(inputs){
    let subscripts = {
        '₀': '0', '₁': '1', '₂': '2', '₃': '3', '₄': '4',
        '₅': '5', '₆': '6', '₇': '7', '₈': '8', '₉': '9'
    }
    let noSubscript = inputs;
    let replaced;
    do{
        let replaced = false;
        for (const subscript in subscripts){
            noSubscript = noSubscript.replace(new RegExp(subscript, 'g'), subscripts[subscript]);
            replaced = true;
        }
    } while(replaced);

    return noSubscript;
}

function classSearch(input, searchingFor){
    if (strpos(input, searchingFor) !== false) {
        return true;
    } else {
        return false;
    }
}

function strpos(haystack, needle, offset) {
    var i = (haystack+'').indexOf(needle, (offset || 0));
    return i === -1 ? false : i;
  }

function convertUnit(value, fromUnit, toUnit) {
    const unitConversions = {
        'mg': 1,
        'g': 1000,
        'kg': 1000000,
    };

    if (!(fromUnit in unitConversions) || !(toUnit in unitConversions)) {
        return "Invalid units provided.";
    }

    const conversionFactor = unitConversions[fromUnit] / unitConversions[toUnit];
    const convertedValue = value * conversionFactor;

    return convertedValue;
}

function getCMCValue(maxCapacity, class_testpoint, unit, conventionalMass, expandedUncertain){
    let float_maxCapacity = parseFloat(maxCapacity);
    let float_expandedUncertain = parseFloat(expandedUncertain);
    let float_conventionalMass = parseFloat(conventionalMass);
    let noSubClass = removeSubscripts(class_testpoint);
    let processedClass = noSubClass.toUpperCase();
    let cmc = 0;

    if(classSearch(processedClass, "E2")){
        maxCapacityG = convertUnit(float_maxCapacity, unit, 'g');
        if(maxCapacityG <= 610){
            cmc = float_conventionalMass * 0.0000014;
        }
    }
    if(classSearch(processedClass, "F1")){
        maxCapacityG = convertUnit(float_maxCapacity, unit, 'g');
        if(maxCapacityG <= 610){
            cmc = float_conventionalMass * 0.0000083;
        }
    }
    if(classSearch(processedClass, "F2")){
        maxCapacitKG = convertUnit(float_maxCapacity, unit, 'kg');
        if(maxCapacitKG <= 60){
            cmc = float_conventionalMass * 0.00002;
        }
    }
    if(classSearch(processedClass, "FREE")){
        maxCapacitKG = convertUnit(float_maxCapacity, unit, 'kg');
        if(maxCapacitKG <= 300){
            cmc = float_conventionalMass * 0.000092;
        }
    }

    let uncertainty = float_expandedUncertain > cmc ? float_expandedUncertain : cmc;
    return uncertainty;

}

//#endregion CHART FUNCTIONS

//#region STANDARD FUNCTIONS
function getValuesOfSelectedStandardUsingSerialNumber(){
    let serialNumberOfStandard = selectedStandard.split("(SPLITHERE)");
    serialNumberOfStandard.forEach(item => {
        getValuesOfSelectedStandard(item)
    })

    addValuesToStandardValuesModal()
}

function addStandardValue(id, markingsUsed, conventionalMassG, standardUncertainty, mpe, standardClass){
    let conventionalMassGToAdd = parseFloat(conventionalMassG);
    let standardUncertaintyToAdd = parseFloat(standardUncertainty);
    let mpeToAdd = parseFloat(mpe);

    let ids = $("#valuesId"+currentlySelected).val();
    let mark = $("#markingsUsed"+currentlySelected).val();
    let conventionalG = parseFloat($("#conventionalMassG"+currentlySelected).val());
    let uncertainty = parseFloat($("#standardUncertainty"+currentlySelected).val());
    let mpeVal = parseFloat($("#mpe"+currentlySelected).val());
    let unit = $('#unit').val();

    let indicationVal = parseFloat($("#indication"+currentlySelected).val());

    let newConventionalG = (conventionalG+conventionalMassGToAdd).toFixed(6);
    let marksUsed = mark == '' ? markingsUsed : mark+"(SPLIT)"+markingsUsed;
    let marksPlus = marksUsed.replace(/\(SPLIT\)/g, " + ");
    
    $("#valuesId"+currentlySelected).val(ids == '' ? id : ids+"(SPLIT)"+id);
    $("#markingsUsed"+currentlySelected).val(marksUsed);
    $("#standardUsed"+currentlySelected).val(marksPlus);
    $("#conventionalMassG"+currentlySelected).val(newConventionalG);
    $("#conventionalMassCurrentUnit"+currentlySelected).val(convertMass(newConventionalG, 'g', unit));
    $("#linearError"+currentlySelected).val((indicationVal - convertMass(newConventionalG, 'g', unit)).toFixed(6));
    $("#standardUncertainty"+currentlySelected).val((uncertainty+standardUncertaintyToAdd).toFixed(6));
    $("#mpe"+currentlySelected).val((mpeVal+mpeToAdd).toFixed(6));
    $("#class"+currentlySelected).val(standardClass);
    $("#convection"+currentlySelected).val(convection());
}
function removeStandardValue(id, markingsUsed, conventionalMassG, standardUncertainty, mpe){
    let conventionalMassGToAdd = parseFloat(conventionalMassG);
    let standardUncertaintyToAdd = parseFloat(standardUncertainty);
    let mpeToAdd = parseFloat(mpe);

    let ids = $("#valuesId"+currentlySelected).val();
    let mark = $("#markingsUsed"+currentlySelected).val();
    let conventionalG = parseFloat($("#conventionalMassG"+currentlySelected).val());
    let uncertainty = parseFloat($("#standardUncertainty"+currentlySelected).val());
    let mpeVal = parseFloat($("#mpe"+currentlySelected).val());
    let indicationVal = parseFloat($("#indication"+currentlySelected).val());

    let unit = $('#unit').val();
    let newConventionalG = (conventionalG-conventionalMassGToAdd).toFixed(6)

    let idsInArray = ids.split("(SPLIT)");
    let markInArray = mark.split("(SPLIT)");
    idsInArray = idsInArray.filter(function(element) {
        return element !== id;
    });
    markInArray = markInArray.filter(function(element) {
        return element !== markingsUsed;
    });
    let newids = idsInArray.join('(SPLIT)')
    let newmarks = markInArray.join('(SPLIT)')

    let marksPlus = newmarks.replace(/\(SPLIT\)/g, " + ");

    $("#valuesId"+currentlySelected).val(newids);
    $("#markingsUsed"+currentlySelected).val(newmarks);
    $("#standardUsed"+currentlySelected).val(marksPlus);
    $("#conventionalMassG"+currentlySelected).val(newConventionalG);
    $("#conventionalMassCurrentUnit"+currentlySelected).val(convertMass(newConventionalG, 'g', unit));
    $("#linearError"+currentlySelected).val((indicationVal - convertMass(newConventionalG, 'g', unit)).toFixed(6));
    $("#standardUncertainty"+currentlySelected).val((uncertainty-standardUncertaintyToAdd).toFixed(6));
    $("#mpe"+currentlySelected).val((mpeVal-mpeToAdd).toFixed(6));
}

function standardUseButton(id, markingsUsed, conventionalMassG, standardUncertainty, mpe, standardClass, elmnt){
    if(elmnt.data("function") == 'add'){
        addStandardValue(id, markingsUsed, conventionalMassG, standardUncertainty, mpe, standardClass);
        elmnt.html("Unselect");
        elmnt.data('function', 'remove');
        addFromHiddenToModal()
        return 'add';
    }
    if(elmnt.data("function") == 'remove'){
        removeStandardValue(id, markingsUsed, conventionalMassG, standardUncertainty, mpe);
        elmnt.html("Use");
        elmnt.data('function', 'add');
        addFromHiddenToModal()
        return 'remove';
    }
    
}

//#endregion STANDARD FUNCTIONS


function calculateValues(){
    let numberOfRow = $('#linearityTable tbody').children().length;

    let unit = $('#unit').val();
    let kForCompute = parseFloat($('#kForCompute').val());

    let errDiff = parseFloat($('#errDiff').val());
    let load = parseFloat($('#load').val());
    let readability = parseFloat($('#readability').val());
    let resolution = parseFloat($('#resolution').val());
    let stDevRepeatability = parseFloat($('#stDev').val());
    
    let divisor;
    if (unit == "mg") {
    divisor = 1;
    } else if (unit == "g") {
    divisor = 1000;
    } else if (unit == "kg") {
    divisor = 1000000;
    }

    let uncertaintyBudget = [];

    for (let i = 1; i <= numberOfRow; i++) {
        let budget = {};
        let uncertainty = parseFloat($('#standardUncertainty'+i).val());
        let mpe = parseFloat($('#mpe'+i).val());
        let convection = parseFloat($('#convection'+i).val());
        let indication = parseFloat($('#indication'+i).val());
        let linearLoad = parseFloat($('#linearLoad'+i).val());

        let ReferenceWeightCalculated = uncertainty / (divisor * kForCompute);
        let AirBuoyancytCalculated = mpe / (divisor * 4 * Math.sqrt(3));
        let DriftOfWeightCalculated = mpe / (divisor * 3 * Math.sqrt(3));
        let ConvectionEffectsCalculated = convection / (divisor * Math.sqrt(3));
        // let RoundingNoLoadCalculated = readability / (2 * Math.sqrt(3));
        // let RoundingWithLoadCalculated = readability / (2 * Math.sqrt(3));
        
        let RoundingNoLoadCalculated = resolution * readability / Math.sqrt(3);
        let RoundingWithLoadCalculated = resolution * readability / Math.sqrt(3);

        let EccentricityCalculated = indication * errDiff / 2 / load / Math.sqrt(3);
    
        let referenceSquared = Math.pow(ReferenceWeightCalculated, 2);
        let airBuoyancySquared = Math.pow(AirBuoyancytCalculated, 2);
        let driftSquared = Math.pow(DriftOfWeightCalculated, 2);
        let convectionSquared = Math.pow(ConvectionEffectsCalculated, 2);
        let roundingNoLoadSquared = Math.pow(RoundingNoLoadCalculated, 2);
        let roundingWithLoadSquared = Math.pow(RoundingWithLoadCalculated, 2);
        let eccentricitySquared = Math.pow(EccentricityCalculated, 2);
        let repeatabilitySquared = Math.pow(stDevRepeatability, 2);

        let StandardUncertaintyError;
        // if(i === 1){
        //     StandardUncertaintyError = Math.sqrt(
        //         referenceSquared +
        //         airBuoyancySquared +
        //         driftSquared +
        //         convectionSquared +
        //         roundingNoLoadSquared +
        //         eccentricitySquared +
        //         repeatabilitySquared
        //     );
        // }else{
        //     StandardUncertaintyError = Math.sqrt(
        //         referenceSquared +
        //         airBuoyancySquared +
        //         driftSquared +
        //         convectionSquared +
        //         roundingNoLoadSquared +
        //         roundingWithLoadSquared +
        //         eccentricitySquared +
        //         repeatabilitySquared
        //     );
        // }
        if(linearLoad == 0){
            StandardUncertaintyError = Math.sqrt(
                referenceSquared +
                // airBuoyancySquared +
                // driftSquared +
                0 + // airBouyancy = 0 if test load is 0 
                0 + // drift = 0 if test load is 0
                convectionSquared +
                roundingNoLoadSquared +
                // roundingWithLoadSquared +
                // eccentricitySquared +
                0 + // roundingWithLoad = 0 if test load is 0
                0 + // eccentricity = 0 if test load is 0
                repeatabilitySquared
            );
        }else{
            StandardUncertaintyError = Math.sqrt(
                referenceSquared +
                airBuoyancySquared +
                driftSquared +
                convectionSquared +
                roundingNoLoadSquared +
                roundingWithLoadSquared +
                eccentricitySquared +
                repeatabilitySquared
            );
        }
           
        let expandedUncertainty = StandardUncertaintyError * 2;

        budget['linearLoad'] = linearLoad;
        budget['ReferenceWeightCalculated'] = ReferenceWeightCalculated;
        budget['AirBuoyancytCalculated'] = AirBuoyancytCalculated;
        budget['DriftOfWeightCalculated'] = DriftOfWeightCalculated;
        budget['ConvectionEffectsCalculated'] = ConvectionEffectsCalculated;
        budget['RoundingNoLoadCalculated'] = RoundingNoLoadCalculated;
        budget['RoundingWithLoadCalculated'] = RoundingWithLoadCalculated;
        budget['EccentricityCalculated'] = EccentricityCalculated;
        budget['stDevRepeatability'] = stDevRepeatability;
        budget['StandardUncertaintyError'] = StandardUncertaintyError;
        budget['kForCompute'] = kForCompute;
        budget['expandedUncertainty'] = expandedUncertainty;

        uncertaintyBudget.push(budget);
    }

    

    $('#calculatedData').val(JSON.stringify(uncertaintyBudget));
    addToUncertaintyBudgetTable()
}

function addToUncertaintyBudgetTable(){
    let uncertaintyBudgetTable = $('#uncertBudgetTBody');
    let uncertaintyBudget = JSON.parse($('#calculatedData').val());
    uncertaintyBudgetTable.html('');
    for (let i = 0; i < uncertaintyBudget.length; i++) {
        let tr = $('<tr>');
        let linearLoad = $('<td>').html((uncertaintyBudget[i]['linearLoad']).toFixed(5));
        let ReferenceWeightCalculated = $('<td>').html((uncertaintyBudget[i]['ReferenceWeightCalculated']).toFixed(5));
        let AirBuoyancytCalculated = $('<td>').html((uncertaintyBudget[i]['AirBuoyancytCalculated']).toFixed(5));
        let DriftOfWeightCalculated = $('<td>').html((uncertaintyBudget[i]['DriftOfWeightCalculated']).toFixed(5));
        let ConvectionEffectsCalculated = $('<td>').html((uncertaintyBudget[i]['ConvectionEffectsCalculated']).toFixed(5));
        let RoundingNoLoadCalculated = $('<td>').html((uncertaintyBudget[i]['RoundingNoLoadCalculated']).toFixed(5));
        let RoundingWithLoadCalculated = $('<td>').html((uncertaintyBudget[i]['RoundingWithLoadCalculated']).toFixed(5));
        let EccentricityCalculated = $('<td>').html((uncertaintyBudget[i]['EccentricityCalculated']).toFixed(5));
        let stDevRepeatability = $('<td>').html((uncertaintyBudget[i]['stDevRepeatability']).toFixed(5));
        let StandardUncertaintyError = $('<td>').html((uncertaintyBudget[i]['StandardUncertaintyError']).toFixed(5));
        let kForCompute = $('<td>').html((uncertaintyBudget[i]['kForCompute']).toFixed(5));
        let expandedUncertainty = $('<td>').html((uncertaintyBudget[i]['expandedUncertainty']).toFixed(5));
        tr.append(
            linearLoad,
            ReferenceWeightCalculated,
            AirBuoyancytCalculated,
            DriftOfWeightCalculated,
            ConvectionEffectsCalculated,
            RoundingNoLoadCalculated,
            RoundingWithLoadCalculated,
            EccentricityCalculated,
            stDevRepeatability,
            StandardUncertaintyError,
            kForCompute,
            expandedUncertainty
        );
        uncertaintyBudgetTable.append(tr);
    }
}
