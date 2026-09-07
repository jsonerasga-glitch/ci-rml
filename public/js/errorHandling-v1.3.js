let is_certificate_Number_valid = 'false';

$(document).ready(function() {
    bindErrorHandling();
    maintanance_check()
});

function bindErrorHandling(){
    bind('certificateNumber','change',function(){
        let moduleNumber = $('#moduleNumber').val()
        checkCertificateNumber(moduleNumber, $(this))
    });
}

function valueCheck(inputID){
    return new Promise((resolve, reject) => {
        const value = $(inputID).val();
        if (value !== undefined && value !== null && value.trim() !== '') {
            resolve(true);
        } else {
            reject(false);
        }
    });
}

async function checkInput(inputID){
    const id = '#' + inputID;
    let status;
    try {
        let haveValue = await valueCheck(id);
        status = haveValue
    } catch (error) {
        status = error;
        $(id).focus();
    }
    return status;
}

async function calculateWithErrorHandling(){
    let equipment_information = $('input[data-group="equipment_information"][data-required="true"], select[data-group="equipment_information"][data-required="true"]');
    let raw_data = $('input[data-group="raw_data"][data-required="true"], select[data-group="raw_data"][data-required="true"]');
    let idOfCertificate = parseFloat($('#idOfCertificate').val());

    if(is_certificate_Number_valid === 'false' && isNaN(idOfCertificate)){
        showToast("Certificate is Not Valid");
        return;
    }


    for(const element of equipment_information){
        let inputID = $(element).attr('id');
        let haveValue = await checkInput(inputID)
        if(haveValue === false){
            showToast(inputID + " have no value.");
            return;
        }
    }
    for(const element of raw_data){
        let inputID = $(element).attr('id');
        let haveValue = await checkInput(inputID)
        if(haveValue === false){
            showToast(inputID + " have no value.");
            return;
        }
    }

    calculateValues()
}

async function checkCertificateNumber(module, certNumberElement){
   
    let moduleNumber = module
    let url;
    let toCheck = certNumberElement.val()

    switch (moduleNumber) {
        case '1':
            url = '/electronicBalance/certificateNumberChecker'
            break;
        case '2':
            url = '/thermohygrometer/certificateNumberChecker'
            break;
        case '3':
            url = '/testWeight/certificateNumberChecker'
            break;

        case '4':
            url = '/weighingScale/certificateNumberChecker'
            break;
        case '5':
            url = '/digitalThermometer/certificateNumberChecker'
            break;
        case '6':
            url = '/digitalTimer/certificateNumberChecker'
            break;

        case '7':
            url = '/pressureGauge/certificateNumberChecker'
            break;

        case '8':
            url = '/pHMeter/certificateNumberChecker'
            break;
        case '9':
            url = '/glassware/certificateNumberChecker'
            break;
        case '10':
            url = '/temperaturecontroll/certificateNumberChecker'
            break;
        case '11':
            url = '/enclosure/certificateNumberChecker'
            break;
        case '13':
            url = '/refractometer/certificateNumberChecker'
            break;

        case '14':
            url = '/caliper/certificateNumberChecker'
            break;

        case '15':
            url = '/electricalmeter/certificateNumberChecker'
            break;
 
        default:
            console.log('Error')
            break;
    }  

    $('#certificateNumberValidText').addClass('d-none');
    $('#loading').removeClass('d-none');

    $.ajax({    
        cache: false,
        type: "post",
        url: url,
        data: {
            'certificateNumberToCheck':toCheck,
        },
        success: function(result) {
            is_certificate_Number_valid = result;
        },
        error: function (error) {
            console.log(error);
        },
    }).then(function(){
        if(is_certificate_Number_valid === 'true'){
            $('#loading').addClass('d-none');
            $('#certificateNumberValid').removeClass('d-none');
            $('#certificateNumberValidText').removeClass('d-none');
            $('#certificateNumberValidText').html('Valid')
            $('#certificateNumberValid').removeClass('bg-white')
            $('#certificateNumberValid').removeClass('bg-danger')
            $('#certificateNumberValid').addClass('bg-success')
        }else{
            $('#loading').addClass('d-none');
            $('#certificateNumberValid').removeClass('d-none');
            $('#certificateNumberValidText').removeClass('d-none');
            $('#certificateNumberValidText').html('Invalid')
            $('#certificateNumberValid').removeClass('bg-white')
            $('#certificateNumberValid').removeClass('bg-success')
            $('#certificateNumberValid').addClass('bg-danger')
        }
    })
    
}

$( document ).ready(function() {
    //Initializing toasts 
    var toastElList = [].slice.call(document.querySelectorAll('.toast'))
    var toastList = toastElList.map(function (toastEl) {
      return new bootstrap.Toast(toastEl)
    })
});

function showToast(message, duration = 5000){
    const $toastContainer = $('#toastContainer');
    
    const $toast = $(
        '<div class="toast align-items-center text-white bg-danger border-0" role="alert">' +
            '<div class="d-flex">'+
                '<div class="toast-body">' + message + '</div>' +
                '<button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>'+
            '</div>'+
        '</div>');
    
    $toastContainer.append($toast);
    
    $toast.toast({ delay: duration });
    $toast.toast('show');
    
    setTimeout(() => {
        $toast.toast('hide');
        $toast.remove();
    }, duration);
}

function maintanance_check(){
    let module_number = $('#moduleNumber').val()
    let sessionID = $('#sessionID').val()
   
    let under_maintenance = []; // add module number if under maintainance 

    if(under_maintenance.includes(module_number)){
        if(sessionID === '13'){ // admin@admin.com
            return;
        } else{

            $('body').html('Under Maintenance dont use')
        }
    }
    
}

{/* 
ADD THIS TO INPUT ELEMENT 
data-required="false"

IF NEEDS CHECKING, CHANGE TO "true"
data-required="true"


ADD THIS TO WORKSHEET.PHP
<div class="position-fixed top-0 end-0 p-3" style="z-index:11">
    <div id="toastContainer" class="toast-container"></div>
</div> 

ADD THIS WITH OTHER SCRIPTS
<script src="/js/errorHandling.js"></script>

CHANGE ONCLICK CALCULATE BUTTON WITH 
calculateWithErrorHandling()

CHANGE CALCULATE FUNCTION NAME WITH
calculateValues()

e.g calculateAll() => calculateValues()

*/}

/*
replace certificateNUmber Input with this 

<div class="mb-1">
    <label>Calibration Certificate Number</label>
    <div class="input-group">
        <input name='certificateNumber' data-group="equipment_information" id='certificateNumber' type="text" class="form-control text-break mt-n2">
        <span class="input-group-text bg-white text-white d-none" id='certificateNumberValid'>
            <div class="spinner-border" id='loading'>
            </div>
            <div id='certificateNumberValidText'></div>
        </span>
    </div>
</div>


Add to controller of worksheet and change MODEL_OF_WORKSHEET to worksheet model 

public function certificateNumberChecker(){
    $rml = new MODEL_OF_WORKSHEET();
    $certNumToCheck = $this->request->getPost('certificateNumberToCheck');
    $isValid = 'false';
    $numberInDatabase = $rml->where('certificateNumber', $certNumToCheck)->countAllResults();
    if($numberInDatabase > 0){
                    $isValid = 'false';
            }else{
                    $isValid = 'true';
            }
    return $isValid;
}

*/


