

$(document).ready(function() {
    bindPrinting();
    add_date_of_issue()
});

function toggleModal(idOfModal){
    let idWithhash = '#'+idOfModal;
    $(idWithhash).modal('toggle');
}

function bindPrinting(){
    $('#editRemarks').html('Edit Statements')

    bind('editRemarks','click',function(){
        toggleModal('statementsModal')
    });
    bind('modalUpdateRemarks','click',function(){
        let moduleNumber = $('#moduleNumber').val()
        processRemarks();
        updateStatements(moduleNumber);
    });
    bind('certificatePDF','click',function(){
        let id = $('#idOfCertificate').val()
        let moduleNumber = $('#moduleNumber').val()
        certificate(id, moduleNumber, 0, 0)
    });
    bind('certificatePDFDraft','click',function(){
        let id = $('#idOfCertificate').val()
        let moduleNumber = $('#moduleNumber').val()
        certificate(id, moduleNumber, 1, 0)
    });
    bind('certificatePDFDownload','click',function(){
        let id = $('#idOfCertificate').val()
        let moduleNumber = $('#moduleNumber').val()
        let status = $('#status').val()
        let draft = status === 'Verified' ? 0 : 1;
        certificate(id, moduleNumber, draft, 1)
    });    
    bind('worksheetPDF','click',function(){
        let moduleNumber = $('#moduleNumber').val()
        worksheet(moduleNumber)
    });
}

async function get_placeholder_data(worksheetData){
    await $.ajax({
        cache: false,
        type: "post",
        url: '/placeholder/get_placeholders',
    })
    .done(function(result) {
        addStatementsNotCustom(worksheetData, result.data)
    })
    .fail(function(error) {
        console.log(error);
    })
}

function addStatementsNotCustom(datas, placeholders){
    let worksheetData = datas;
    $('#settingCalibrationProcedureAndTraceability').val(worksheetData.settingCalibrationProcedureAndTraceability);
    $('#settingUncertaintyOfMeasurement').val(worksheetData.settingUncertaintyOfMeasurement);
    $('#settingCalibrationResults').val(worksheetData.settingCalibrationResults);
    $('#settingMeasurementCondition').val(worksheetData.settingMeasurementCondition);
    let remarks = worksheetData.settingRemarks ?? '';
    $('#settingRemarks').val(remarks);

    if(remarks != ''){
        remarks.split('(splitHere)').forEach((remark, index) => {
            let label = $('<label>', {
                'for':'remarks' + (index + 1),
                'html': "Remark " + (index + 1),
            })
            let textArea = $('<textarea>',{
                'class':'form-control',
                'id':"remarks" + (index + 1),
                'rows': "3",
                'data-group':'remarks',
                'html': remark
            })
            $('#remarksDiv').append(label, textArea)
        })
    }

    let addBtn = $('<button>', {
        'type':'button',
        'class':'btn btn-primary mb-2',
        'id':'addRemarksBtn',
        'html':'Add Remark',
    }).click(function(){
        newRemark();
    })

    let removeBtn = $('<button>', {
        'type':'button',
        'class':'btn btn-danger mb-2',
        'id':'deleteRemarksBtn',
        'html':'Delete Remark',
    }).click(function(){
        removeRemark();
    })

    let getDefaultsBtn = $('<button>', {
        'type':'button',
        'class':'btn btn-info mb-2',
        'id':'getDefaultsBtn',
        'html':'Get Default Remarks',
    }).click(function(){
        process_default_remarks(placeholders)
    })

    $('#remarksButton').prepend(addBtn, removeBtn, getDefaultsBtn);
}

function process_default_remarks(defaultRemarks){
    let moduleNumber = $('#moduleNumber').val();
    let moduleKey = 'module' + moduleNumber;
    let full_default_remarks = defaultRemarks[0][moduleKey+'Remarks']

    let array_remarks = full_default_remarks.split('(splitHere)')

    for (let i = 0; i < array_remarks.length; i++){
        $('#addRemarksBtn').trigger('click')
        $('#remarks'+(i+1)).html(array_remarks[i])
    }
}

function newRemark(){
    let numberOfRemarks = ($('#remarksDiv').children().length) / 2;
    let label = $('<label>', {
        'for':'remarks' + (numberOfRemarks + 1),
        'html': "Remark " + (numberOfRemarks + 1),
    })
    let textArea = $('<textarea>',{
        'class':'form-control',
        'id':"remarks" + (numberOfRemarks + 1),
        'rows': "3",
        'data-group':'remarks',
        'html': ''
    })
    $('#remarksDiv').append(label, textArea) 
}
function removeRemark(){
    $('#remarksDiv').children(':last-child').remove();
    $('#remarksDiv').children(':last-child').remove();
}

function processRemarks(){
    let processedRemarks = '';
    $('textarea[data-group="remarks"]').each(function() {
        if(processedRemarks == ''){
            processedRemarks += $(this).val();
        }else{
            processedRemarks += '(splitHere)' + $(this).val();
        }
    });
    $('#settingRemarks').val(processedRemarks)
}

function updateStatements(moduleNumber){
    let idOfCertificate = $('#idOfCertificate').val();
    let settingCalibrationProcedureAndTraceability = $('#settingCalibrationProcedureAndTraceability').val();
    let settingUncertaintyOfMeasurement = $('#settingUncertaintyOfMeasurement').val();
    let settingCalibrationResults = $('#settingCalibrationResults').val();
    let settingMeasurementCondition = $('#settingMeasurementCondition').val();
    let settingRemarks = $('#settingRemarks').val();

    let url = '';
    switch (moduleNumber) {
        case '1':
            url = '/electronicBalance/updatePlaceholder'
            break;
        case '3':
            url = '/testWeight/updatePlaceholder'
            break;
        case '4':
            url = '/weighingScale/updatePlaceholder'
            break;
        case '5':
            url = '/digitalThermometer/updatePlaceholder'
            break;
        case '6':
            url = '/digitalTimer/updatePlaceholder'
            break;
        case '7':
            url = '/pressureGauge/updatePlaceholder'
            break;
        case '8':
            url = '/pHMeter/updatePlaceholder'
            break;

        case '9':
            url = '/glassware/updatePlaceholder'
            break;


        case '10':
                url = '/temperaturecontroll/updatePlaceholder'
                break;
        case '11':
                url = '/enclosure/updatePlaceholder'
                break;


        case '13':
            url = '/refractometer/updatePlaceholder'
            break;
        case '14':
            url = '/caliper/updatePlaceholder'
            break;
        case '15':
            url = '/electricalmeter/updatePlaceholder'
            break;

        default:
            console.log('Error')
            break;
    }  

    $.ajax({
        cache: false,
        type: "post",
        url: url,
        data: {
            'idOfCertificate' : idOfCertificate,
            'settingCalibrationProcedureAndTraceability':settingCalibrationProcedureAndTraceability,
            'settingUncertaintyOfMeasurement':settingUncertaintyOfMeasurement,
            'settingCalibrationResults':settingCalibrationResults,
            'settingMeasurementCondition':settingMeasurementCondition,
            'settingRemarks':settingRemarks,
        },
        success: function(result) {
            console.log('Update Successful')
            alert('Update Successful')
        },
        error: function (error) {
            console.log(error);
            alert('An error occured while updating')
        },
    })
}

function worksheet(moduleNumber){
    let id = $('#idOfCertificate').val()
    let url = '';
    switch (moduleNumber) {
        case '1':
            url = '/worksheets/ElectronicBalance/' + id
            break;
       case '2':
            url = '/worksheets/ThermoHygrometer/' + id
            break;
        case '3':
            url = '/worksheets/TestWeight/' + id
            break;
        case '4':
            url = '/worksheets/WeighingScale/' + id
            break;
        case '5':
            url = '/worksheets/DigitalThermometer/' + id
            break;
        case '6':
            url = '/worksheets/DigitalTimer/' + id
            break;
        case '7':
            url = '/worksheets/PressureGauge/' + id
            break;
        case '8':
            url = '/worksheets/PHMeter/' + id
            break;
        case '9':
            url = '/worksheets/Glassware/' + id
            break;
        case '10':
            url = '/worksheets/TemperatureController/' + id
            break;
        case '11':
            url = '/worksheets/Enclosure/' + id
            break;
        case '13':
            url = '/worksheets/Refractometer/' + id
            break;
        case '14':
            url = '/worksheets/Caliper/' + id
            break;
        case '15':
            url = '/worksheets/ElectricalMeter/' + id
            break;

        default:
            console.log('Error')
            break;
    }    
    window.open(url, '_blank');
}

function certificate(ID, moduleNumber, draft, download){
    $('#certificateId').val(ID)
    $('#certificateDraft').val(draft)
    $('#certificateDownload').val(download)
    let certificateLabel = $('#certificateNumber').val() + ' - ' + $('#customer').val()        
    $('#certificateLabel').val(certificateLabel)
    switch (moduleNumber) {
        case '1':
            $("#certificateForm").attr('action', '/electronicBalance/generateReport')
            $("#certificateForm").submit();
            break;
        case '2':
            $("#certificateForm").attr('action', '/thermohygrometer/generateReport')
            $("#certificateForm").submit();
            break;
        case '3':
            if($("#isNew").val() === 'true'){
                $("#certificateForm").attr('action', '/testWeight/generateReport')
            }else{
                window.open('/testWeightEdit/'+ID, '_blank');
                break;
            }
            $("#certificateForm").submit();
            break;
        case '4':
            $("#certificateForm").attr('action', '/weighingScale/generateReport')
            $("#certificateForm").submit()
            break;
        case '5':
            $("#certificateForm").attr('action', '/digitalThermometer/generateReport')
            $("#certificateForm").submit()
            break;
        case '6':
            $("#certificateForm").attr('action', '/digitalTimer/generateReport')
            $("#certificateForm").submit();
            break;
         case '7':
            $("#certificateForm").attr('action', '/pressureGauge/generateReport')
            $("#certificateForm").submit();
            break;
        case '8':
            $("#certificateForm").attr('action', '/pHMeter/generateReport')
            $("#certificateForm").submit();
            break;
        case '9':
            $("#certificateForm").attr('action', '/glassware/generateReport')
            $("#certificateForm").submit();
            break;
        case '10':
            $("#certificateForm").attr('action', '/temperaturecontroll/generateReport')
            $("#certificateForm").submit();
            break;
        case '11':
            $("#certificateForm").attr('action', '/enclosure/generateReport')
            $("#certificateForm").submit();
            break;
        case '13':
            $("#certificateForm").attr('action', '/refractometer/generateReport')
            $("#certificateForm").submit();
            break;
        case '14':
            $("#certificateForm").attr('action', '/caliper/generateReport')
            $("#certificateForm").submit();
            break;
        case '15':
            $("#certificateForm").attr('action', '/electricalmeter/generateReport')
            $("#certificateForm").submit();
            break;

        default:
            console.log('Error')
            break;
    }    
}

function add_date_of_issue(){
    let is_new = $('#idOfCertificate').val() == '' ? true : false;
    let div = $('<div>', {
        'class' : 'input-group mb-4',
    })
    let input = $('<input>', {
        'class': 'form-control',
        'type': 'date',
        'id': 'dateOfIssue',
    })
    let button = $('<button>', {
        'class': 'btn btn-outline-secondary',
        'type': 'button',
        'html': "UPDATE DATE OF ISSUE"
    }).on('click', function(){update_issue_date()})

    if(is_new){
        input.attr('disabled', true)
        button.attr('disabled', true)
    }

    let divInptBtn =  div.append(input, button)

    if($('div[id="remarksDiv"]').length){
        $('#statementsModal div[id="remarksDiv"]').parent().prepend(divInptBtn)
    }
    
}

function update_issue_date(){
    let idOfCertificate = $('#idOfCertificate').val();
    let moduleNumber = $('#moduleNumber').val();
    let issue_date = $('#dateOfIssue').val();
    let url = '/placeholder/update_date_issued';
    $.ajax({
        cache: false,
        type: "post",
        url: url,
        data: {
            'moduleNumber': moduleNumber,
            'idOfCertificate': idOfCertificate,
            'dateOfIssue':issue_date,
        },
        success: function(result) {
            console.log('Update Successful')
            alert('Update Successful')
        },
        error: function (error) {
            console.log(error);
        },
    })
}

$( window ).on( "load", function() {
    if ($('#idOfCertificate').val() != ''){
        let idOfCertificate = $('#idOfCertificate').val();
        let url = '';
        let moduleNumber = $('#moduleNumber').val();
        switch (moduleNumber) {
            case '1':
                url = '/electronicBalance/get_data_by_id';
                break;
            case '2':
                url = '/thermohygrometer/get_data_by_id';
                break;        
            case '3':
                url = '/testWeight/get_data_by_id';
                break;   
            case '4':
                url = '/weighingScale/get_data_by_id';
                break; 
            case '5':
                url = '/digitalThermometer/get_data_by_id';
                break; 
            case '6':
                url = '/digitalTimer/get_data_by_id';
                break;   
            case '7':
                url = '/pressureGauge/get_data_by_id';
                break;  
            case '8':
                url = '/pHMeter/get_data_by_id';
                break; 
            case '9':
                url = '/glassware/get_data_by_id';
                break; 
            case '10':
                url = '/temperaturecontroll/get_data_by_id';
                break;
            case '11':
                url = '/enclosure/get_data_by_id';
                break;  
            case '13':
                url = '/refractometer/get_data_by_id';
                break;             
            case '14':
                url = '/caliper/get_data_by_id';
                break;        
            case '15':
                url = '/electricalmeter/get_data_by_id';
                break; 
            default:
                console.log('Error')
                break;
        }    
        $.ajax({
            cache: false,
            type: "post",
            url: url,
            data: {
                'idOfCertificate' : idOfCertificate,
            },
            success: function(result) {
                $('#status').val(result.worksheetData.completion);
                get_placeholder_data(result.worksheetData)            
            },
            error: function (error) {
                console.log(error);
            },
        })
    }
});

