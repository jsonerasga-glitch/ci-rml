$(document).ready(function() {
    bindAdmin();
    
    
});

function bindAdmin(){
    bind('verifyButton','click',function(){
        verification();
    });
    bind('correctionButton','click',function(){
        correction();
    });
    bind('submitButton','click',function(){
        submitToVerifier();
    });
    
}


function makeReadOnly(){
    $('#adminTools').removeClass('d-none')

    $('input').each(function(){
        if( $(this).attr('type')=='checkbox' || $(this).attr('type')=='radio'){
            $(this).attr('disabled', '')
        }else{
            $(this).attr('readonly', '')
        }

        $(this).click(function(){
            highlightToggle($(this))
        })

        
    })
    
    $('select').each(function(){
        $(this).attr('readonly', '')
        $(this).click(function(){
            highlightToggle($(this))
        })
    })
    
    $('button').each(function(){
        if($(this).attr('data-group') != 'tools'){
            $(this).attr('disabled', '')
        }
    })
}

function verifiedReadOnly(){
    $('input').each(function(){
        if( $(this).attr('type')=='checkbox' || $(this).attr('type')=='radio'){
            $(this).attr('disabled', '')
        }else{
            $(this).attr('readonly', '')
        }
    })
    $('textarea').each(function(){
        $(this).attr('readonly', '')
    })
    
    $('select').each(function(){
        $(this).attr('disabled', '')
    })

    $('button').each(function(){
        if($(this).attr('data-group') != 'tools'){
            $(this).attr('disabled', '')
        }
    })

    $('body').append(add_modal())
    admin_tools()
}

function highlightElement(element){
    let id = element.attr('id');
    
    let hasClass = '';
    if(element.hasClass('highlightCorrection')){
            hasClass = 'highlightCorrection';
    }else{
        hasClass = 'none'
    }
    
    switch (hasClass) {
        
            case 'highlightCorrection':
                element.removeClass('highlightCorrection')
                hasClass = '';
                break;
            case 'none':
                element.addClass('highlightCorrection')
                hasClass = '';
                break;
            default:
                break;
    }
}

function highlightElementVerify(element){
    let id = element.attr('id');
    
    let hasClass = '';
    if(element.hasClass('highlightVerify')){
            hasClass = 'highlightVerify';
    }else{
        hasClass = 'none'
    }
    
    switch (hasClass) {
            case 'highlightVerify':
                element.removeClass('highlightVerify')
                hasClass = '';
                break;
            case 'none':
                element.addClass('highlightVerify')
                hasClass = '';
                break;
            default:
                break;
    }
}

function highlightToggle(element){
    let hasClass = '';
    if(element.hasClass('nobg highlightCorrection')){
        hasClass = 'nobg';
    }
    else if(element.hasClass('highlightCorrection')){
        hasClass = 'highlightCorrection';
    }
    else if(element.hasClass('highlightVerify')){
        hasClass = 'highlightVerify';
    }
    else{
        hasClass = 'none'
    }
    switch (hasClass) {
        case 'highlightCorrection':
            element.removeClass('highlightCorrection')
            element.addClass('highlightVerify')
            hasClass = '';
            break;
        case 'highlightVerify':
            element.removeClass('highlightVerify')
            element.addClass('highlightCorrection')
            hasClass = '';
            break;
        case 'nobg':
            element.removeClass('highlightCorrection')
            hasClass = '';
            break;
        default:
            element.addClass('nobg highlightCorrection')
            hasClass = '';
            break;
    }
}


function correction(){
    $('#status').val('For Correction');
    let array_highlightedID = [];
    $('input.highlightCorrection').each(function(){
        array_highlightedID.push($(this).attr('id'))
    })
    $('select.highlightCorrection').each(function(){
        array_highlightedID.push($(this).attr('id'))
    })
    let objectsComments = {};

    let comment = $('#correctionComments').val()
    let idOfCertificate = $('#idOfCertificate').val();

    objectsComments['ids'] = array_highlightedID;
    objectsComments['comment'] = comment;    

    let comments = JSON.stringify(objectsComments);
    let completion = $('#status').val();

    let url='';
    let moduleNumber = $('#moduleNumber').val();
    switch (moduleNumber) {
        case '1':
            url = '/electronicBalance/verifyCorrection'
            break;
        case '2':
            url = '/thermohygrometer/verifyCorrection'
            break;
        case '3':
            url = '/testWeight/verifyCorrection'
            break;
        case '4':
            url = '/weighingScale/verifyCorrection'
            break;
        case '5':
            url = '/digitalThermometer/verifyCorrection'
            break;
        case '7':
            url = '/pressureGauge/verifyCorrection'
            break;
        case '11':
            url = '/enclosure/verifyCorrection'
            break;
        case '14':
            url = '/caliper/verifyCorrection'
            break;
        case '15':
            url = '/electricalMeter/verifyCorrection'
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
            'comments': comments,
            'completion': completion,
        },
        success: function(result) {
            location.reload();            
        },
        error: function (error) {
            console.log(error);
        },
    })
}

function verification(){
    $('#status').val('For printing');

    let comment = $('#correctionComments').val()
    let idOfCertificate = $('#idOfCertificate').val();

    let comments = comment;
    let completion = $('#status').val();

    let url='';
    let moduleNumber = $('#moduleNumber').val();
    switch (moduleNumber) {
        case '1':
            url = '/electronicBalance/verifyCorrection'
            break;
        case '2':
            url = '/thermohygrometer/verifyCorrection'
            break;
        case '3':
            url = '/testWeight/verifyCorrection'
            break;
        case '4':
            url = '/weighingScale/verifyCorrection'
            break;
        case '5':
            url = '/digitalThermometer/verifyCorrection'
            break;
        case '7':
            url = '/pressureGauge/verifyCorrection'
            break;
        case '11':
            url = '/enclosure/verifyCorrection'
            break;
        case '14':
            url = '/caliper/verifyCorrection'
            break;
        case '15':
            url = '/electricalMeter/verifyCorrection'
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
            'comments': comments,
            'completion': completion,
        },
        success: function(result) {
            location.reload();            
        },
        error: function (error) {
            console.log(error);
        },
    })
}

function submitToVerifier(){
    if(confirm('Are you sure you want submit?')){
        $('#status').val('For Verification');

        let array_highlightedID = [];
        $('input.highlightCorrection').each(function(){
            array_highlightedID.push($(this).attr('id'))
        })
        $('select.highlightCorrection').each(function(){
            array_highlightedID.push($(this).attr('id'))
        })
        let objectsComments = {};

        let comment = $('#correctionComments').val()
        let idOfCertificate = $('#idOfCertificate').val();

        objectsComments['ids'] = array_highlightedID;
        objectsComments['comment'] = comment;    

        let comments = JSON.stringify(objectsComments);
        let completion = $('#status').val();
        let url='';
        let moduleNumber = $('#moduleNumber').val();
        switch (moduleNumber) {
            case '1':
                url = '/electronicBalance/verifyCorrection'
                break;
            case '2':
                url = '/thermohygrometer/verifyCorrection'
                break;
            case '3':
                url = '/testWeight/verifyCorrection'
                break;
            case '4':
                url = '/weighingScale/verifyCorrection'
                break;
            case '5':
                url = '/digitalThermometer/verifyCorrection'
                break;
            case '7':
                url = '/pressureGauge/verifyCorrection'
                break;
            case '11':
                url = '/enclosure/verifyCorrection'
                break;
            case '14':
                url = '/caliper/verifyCorrection'
                break;
            case '15':
                url = '/electricalMeter/verifyCorrection'
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
                'comments': comments,
                'completion': completion,
            },
            success: function(result) {
                location.reload();            
            },
            error: function (error) {
                console.log(error);
            },
        })
    }else{
        console.log('Canceled.');
    }

    
    
}

function userGetComments(){
    let idOfCertificate = $('#idOfCertificate').val();

    let url='';
    let moduleNumber = $('#moduleNumber').val();
    switch (moduleNumber) {
        case '1':
            url = '/electronicBalance/get_data_by_id'
            break;
        case '2':
            url = '/thermohygrometer/get_data_by_id'
            break;
        case '3':
            url = '/testWeight/get_data_by_id'
            break;
        case '4':
            url = '/weighingScale/get_data_by_id'
            break;
        case '5':
            url = '/digitalThermometer/get_data_by_id'
            break;
        case '7':
            url = '/pressureGauge/get_data_by_id'
            break;
        case '11':
            url = '/enclosure/get_data_by_id'
            break;
        case '14':
            url = '/caliper/get_data_by_id'
            break;
        case '15':
            url = '/electricalMeter/get_data_by_id'
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
            if($('#status').val() == 'For Correction'){
                let object_Comments = JSON.parse(result.worksheetData['comments']);
                $('#correctionComments').html(object_Comments.comment)
                let forHiglights = object_Comments.ids;
                forHiglights.forEach(elements => {
                    highlightElement($('#'+elements))
                })

                
            }     
            if($('#status').val() == 'For Verification'){
                let object_Comments = JSON.parse(result.worksheetData['comments']);
                $('#correctionComments').html(object_Comments.comment)
                let forHiglights = object_Comments.ids;
                forHiglights.forEach(elements => {
                    highlightElementVerify($('#'+elements))
                })

                
            }        
        },
        error: function (error) {
            console.log(error);
        },
    })
}


function userCheck(id, worksheetId, email, worksheetEmail, status){
    if(id === worksheetId){
        return;
    }
    if(email === worksheetEmail){
        return;
    }
    let statusFilter = ['For Verification', 'For printing', 'Verified'];
    if(statusFilter.includes(status)){
        return;
    }
    if(id === '13'){
        return;
    }    
    window.location.href = '/';
}


function admin_tools(){
    let sesrol = $('#sesrol').html()
    let idOfCertificate = $('#idOfCertificate').val()
    let status = $('#status').val()

    let btn_floating = $('div[class="btn-toolbar position-fixed"]')
    let button = $('<button>', {
        "type" : 'button',
        "class" : 'btn btn-primary ms-2',
        "data-bs-toggle" : 'modal',
        "data-bs-target" : '#statusModal',
        "html" : 'Update Status'
    })
    
    if(sesrol === 'admin' && idOfCertificate != '' && status === 'For printing'){
        btn_floating.append(button)
    }
}


function edit(){
	if(confirm('Are you sure you want to update the status of the worksheet?') === true){
  	    update_status()
	}else{
  	    alert('Canceled')
  }
}

function update_status(){
	//alert('save ajax here')
    let worksheetType = $('#moduleNumber').val()
    let idOfCertificate = $('#idOfCertificate').val()
    let statusSelect = $('#statusSelect').val()
    let url = '/status/update';
    $.ajax({
        cache: false,
        type: "post",
        url: url,
        data: {
            'worksheetType': worksheetType,
            'worksheetID': idOfCertificate,
            'completion' : statusSelect,
        },
    })
    .done(function(result){
        $('#status').val(statusSelect)
        window.location.href = window.location.href;
    })
    .fail(function(e){
        console.log(e)
    })
}





function add_modal(){
    let div = $('<div>')
    let button = $('<button>', {
  	"type" : 'button',
    "class" : 'btn btn-primary',
	"data-bs-toggle" : 'modal',
	"data-bs-target" : '#statusModal',
    "html" : 'Launch demo'
    })
    let modal_div = $('<div>', {
  	"class" : 'modal fade',
    "id" : 'statusModal',
    "tabindex" : '-1'
    })
    let modal_dialog = $('<div>', {
  	"class" : 'modal-dialog',
	})
    let modal_content = $('<div>', {
  	"class" : 'modal-content',
	})
    let modal_header = $('<div>', {
  	"class" : 'modal-header',
	})
    let modal_title = $('<div>', {
  	"class" : 'modal-title',
    "html" : 'Edit Status'
	})
    let btn_close = $('<button>', {
  	"type" : 'button',
  	"class" : 'btn-close',
    "data-bs-dismiss" : 'modal'
	})
    let modal_body = $('<div>', {
  	"class" : 'modal-body'
	})
    let p_current_stat = $('<p>', {
        "html" : 'Current Status : ',
    }).append($('<strong>', {"id": 'currentStatus', 'html' : '<h1>' + $('#status').val() + '</h1>'}))

    let modal_footer = $('<div>', {
        "class" : 'modal-footer'
    })
    let btn_close_secondary = $('<button>', {
        "type" : 'button',
        "class" : 'btn btn-secondary',
        "data-bs-dismiss" : 'modal',
        "html" : 'Close'
    })
    let btn_save = $('<button>', {
        "type" : 'button',
        "class" : 'btn btn-danger',
        "id" : 'saveStatusModal',
        "html" : 'Save changes'
    }).on('click', function(){edit()})

    let status_array = ['Select Status', 'Pending', 'For Verification', 'For Correction', 'For printing'];
    let select_status = $('<select>', {'class' : 'form-select', 'id': 'statusSelect'})
    status_array.forEach(items => {
        let option = $('<option>').html(items)
        select_status.append(option)
    })

    modal_header.append(modal_title, btn_close)
    modal_body.append(p_current_stat, select_status)
    // modal_body.append(select_status)
    modal_footer.append(btn_close_secondary, btn_save)
    modal_content.append(modal_header, modal_body, modal_footer)
    modal_dialog.append(modal_content)
    modal_div.append(modal_dialog)
    // div.append(button, modal_div)
    div.append(modal_div)
    return div;
}