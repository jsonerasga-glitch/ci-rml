$(document).ready(function(){
    bind_to_elements()
})

let cp_to_module = {
    '001':'7',
    '002':'4',
    '003':'3',
    '004':'15',
    '005':'15',
    '006':'15',
    '007':'15',
    '008':'5',
    '009':'11',
    '010':'1',
    '011':'5',
    '012':'2',
    '013':'11',
    '014':'8',
    '015':'9',
    '016':'9',
    '017':'6',
    '018':'10',
}

let module_to_cp = {
    '7':'001',
    '4':'002',
    '3':'003',
    '15':'004',
    '15':'005',
    '15':'006',
    '15':'007',
    '5':'008',
    '11':'009',
    '1':'010',
    '5':'011',
    '2':'012',
    '11':'013',
    '8':'014',
    '9':'015',
    '9':'016',
    '6':'017',
    '10':'018',
}

function bind(id, evt, func) {
    var el = document.getElementById(id);
    if (el.addEventListener){
        el.addEventListener(evt, func);
    } else if (el.attachEvent) {
        el.attachEvent('on' + evt, func);
    }
}

function bind_to_elements(){
    bind('btn_add', 'click', function(){
        add_row()
    })
    bind('btn_minus', 'click', function(){
        remove_row()
    })
    bind('btn_save', 'click', function(){
        save_data()
    })
    bind('btn_update', 'click', function(){
        update_data()
    })
    
    bind('btn_select', 'click', function(){
        get_cmc_per_module()
    })
    
}

function add_row(){
    let table_thead = $('#cmcTable thead');
    let table_tbody = $('#cmcTable tbody');
    let moduleNumber = $('#moduleNumber').val();
    let row_count = table_tbody.children().length;

    let unit_grams = ['mg', 'g', 'kg'];
    let unit_liter = ['µL', 'mL'];
    let unit_pressure = ['Pa', 'kPa', 'MPa'];
    let unit_temp_with_humidity = ['Temperature', 'Relative Humidity'];
    let unit_seconds = ['ms', 's'];

    let class_thermometer = [
        'Digital Temperature Indicator Systems', 
        'Liquid-in-Glass Thermometer', 
        'Bimetallic System'
    ];

    let class_electronic_balance = [
        'E1',
        'E2',
        'F1',
        'F2',
        'M1',
        'M2',
        'FREE',
    ];

    let type_glassware = [
        'Volumetric glass and plastic ware',
        'Piston-operated volumetric apparatus (piston pipette with variable volume)',
        'Piston-operated volumetric apparatus (others)',
        'Piston-operated volumetric apparatus (piston pipette with fixed volume)'
    ]

    let type_enclosure = [
        'Freezer and Chiller',
        'Incubator Refrigerated / Cooled Incubator',
        'Ovens',
        'Liquid Baths',
        'Autoclaves',
        'Sterilizing Ovens'
    ]

    if(row_count == 0){
        let header_tr = $('<tr>')
        let header_html
        switch (moduleNumber) {
            case '1':
            case '3':
            case '4':
            case '5':
                header_html = ['Class', 'Range Minimum', 'Unit', 'Range Maximum', 'Unit', 'CMC Value (<i>if percent, use the decimal equivalent</i>)']

                for (let i = 0; i < header_html.length; i++) {
                    let header_th = $('<th>').html(header_html[i])
                    header_tr.append(header_th)
                }
                
                table_thead.append(header_tr)
                break;
            case '9':
            case '11':
                header_html = ['Type', 'Range Minimum', 'Unit', 'Range Maximum', 'Unit', 'CMC Value (<i>if percent, use the decimal equivalent</i>)']

                for (let i = 0; i < header_html.length; i++) {
                    let header_th = $('<th>').html(header_html[i])
                    header_tr.append(header_th)
                }
                
                table_thead.append(header_tr)
                break;
            
            default:
                header_html = ['Range Minimum', 'Unit', 'Range Maximum', 'Unit', 'CMC Value (<i>if percent, use the decimal equivalent</i>)']

                for (let i = 0; i < header_html.length; i++) {
                    let header_th = $('<th>').html(header_html[i])
                    header_tr.append(header_th)
                }
                
                table_thead.append(header_tr)
                break;
        }
    }

    let body_tr = $('<tr>')
    let input_ids
    let unit;
    switch (moduleNumber) {
        case '1':
        case '3':
        case '4':
        case '5':
            input_ids = ['class', 'rangeMin', 'rangeMinUnit', 'rangeMax', 'rangeMaxUnit', 'cmcValue']

            
            if(moduleNumber == '5'){
                unit = unit_temp_with_humidity;
            }else{
                unit = unit_grams;
            }

            for (let i = 0; i < input_ids.length; i++) {
                let id = input_ids[i] + 'Row' + (row_count + 1)
                let body_tr_td = $('<td>')
                let input_element = $('<input>', {
                    "type": "text",
                    "class": "form-control",
                    "id" : id,
                })
                if(moduleNumber == '5' && input_ids[i] === 'class'){
                    input_element = $('<select>', {
                        "type": "text",
                        "class": "form-control",
                        "id" : id,
                    })
                    for (let ii = 1; ii <= class_thermometer.length; ii++) {
                       let option_unit = $('<option>').html(class_thermometer[(ii-1)]).val((ii-1))
                       input_element.append(option_unit)
                    }
                }else if((moduleNumber == '1'||moduleNumber == '3'||moduleNumber == '4') && input_ids[i] === 'class'){
                    input_element = $('<select>', {
                        "type": "text",
                        "class": "form-control",
                        "id" : id,
                    })
                    for (let ii = 1; ii <= class_electronic_balance.length; ii++) {
                       let option_unit = $('<option>').html(class_electronic_balance[(ii-1)]).val((ii-1))
                       input_element.append(option_unit)
                    }
                }

                

                if(input_ids[i] === 'rangeMinUnit' || input_ids[i] === 'rangeMaxUnit'){
                    input_element = $('<select>', {
                        "type": "text",
                        "class": "form-control",
                        "id" : id,
                    })
                    for (let ii = 0; ii < unit.length; ii++) {
                       let option_unit = $('<option>').html(unit[ii])
                       input_element.append(option_unit)
                    }
                }
                body_tr_td.append(input_element)
                body_tr.append(body_tr_td)
            }

            table_tbody.append(body_tr)
            break;
        case '9':
        case '11':
            input_ids = ['type', 'rangeMin', 'rangeMinUnit', 'rangeMax', 'rangeMaxUnit', 'cmcValue']

            if(moduleNumber == '11'){
                unit = unit_temp_with_humidity;
            }else{
                unit = unit_liter;
            }

            for (let i = 0; i < input_ids.length; i++) {
                let id = input_ids[i] + 'Row' + (row_count + 1)
                let body_tr_td = $('<td>')
                let input_element = $('<input>', {
                    "type": "text",
                    "class": "form-control",
                    "id" : id,
                })
                if(moduleNumber == '11' && input_ids[i] === 'type'){
                    input_element = $('<select>', {
                        "type": "text",
                        "class": "form-control",
                        "id" : id,
                    })
                    for (let ii = 1; ii <= type_enclosure.length; ii++) {
                       let option_unit = $('<option>').html(type_enclosure[(ii-1)]).val((ii-1))
                       input_element.append(option_unit)
                    }
                }else if(moduleNumber == '9' && input_ids[i] === 'type'){
                    input_element = $('<select>', {
                        "type": "text",
                        "class": "form-control",
                        "id" : id,
                    })
                    for (let ii = 1; ii <= type_glassware.length; ii++) {
                       let option_unit = $('<option>').html(type_glassware[(ii-1)]).val((ii-1))
                       input_element.append(option_unit)
                    }
                }
                if(input_ids[i] === 'rangeMinUnit' || input_ids[i] === 'rangeMaxUnit'){
                    input_element = $('<select>', {
                        "type": "text",
                        "class": "form-control",
                        "id" : id,
                    })
                    for (let ii = 0; ii < unit.length; ii++) {
                       let option_unit = $('<option>').html(unit[ii])
                       input_element.append(option_unit)
                    }
                }
                body_tr_td.append(input_element)
                body_tr.append(body_tr_td)
            }
            table_tbody.append(body_tr)
            break;
        default:
            input_ids = ['rangeMin', 'rangeMinUnit', 'rangeMax', 'rangeMaxUnit', 'cmcValue']

            if(moduleNumber == '7'){
                unit = unit_pressure;
            }else if(moduleNumber == '6'){
                unit = unit_seconds;
            }else if(moduleNumber == '2'){
                unit = unit_temp_with_humidity;
            }

            for (let i = 0; i < input_ids.length; i++) {
                let id = input_ids[i] + 'Row' + (row_count + 1)
                let body_tr_td = $('<td>')
                let input_element = $('<input>', {
                    "type": "text",
                    "class": "form-control",
                    "id" : id,
                })
                if(input_ids[i] === 'rangeMinUnit' || input_ids[i] === 'rangeMaxUnit'){
                    if(moduleNumber=='7' || moduleNumber=='6' || moduleNumber=='2'){
                        input_element = $('<select>', {
                            "type": "text",
                            "class": "form-control",
                            "id" : id,
                        })
                        for (let ii = 0; ii < unit.length; ii++) {
                            let option_unit = $('<option>').html(unit[ii])
                            input_element.append(option_unit)
                        }
                    }
                }
                body_tr_td.append(input_element)
                body_tr.append(body_tr_td)
            }

            table_tbody.append(body_tr)
            break;
    }

}
function remove_row(){
    let table_tbody = $('#cmcTable tbody')
    let table_thead = $('#cmcTable thead')
    let row_count = table_tbody.children().length;

    if(row_count-1 == 0){
        table_tbody.children().last().remove()
        table_thead.children().last().remove()
    }

    if(row_count == 0){
        console.log('No row to delete')
    }else{
        table_tbody.children().last().remove()
    }
    
    
}

async function process_conditions(){
    let moduleNumber = $('#moduleNumber').val();
    let tableTbody = $('#cmcTable tbody')
    let row_count = tableTbody.children().length
    let conditions_obj = []

    for (let i = 1; i <= row_count; i++) {
        let element_ids = [
            "rangeMinRow" + i,
            "rangeMinUnitRow" + i,
            "rangeMaxRow" + i,
            "rangeMaxUnitRow" + i,
            "cmcValueRow" + i
        ]

        if(moduleNumber == '1' || moduleNumber == '3' || moduleNumber == '4' || moduleNumber == '5'){
            element_ids.push('classRow' + i)
        }else if(moduleNumber == '9' || moduleNumber == '11'){
            element_ids.push('typeRow' + i)
        }

        let temp_obj_cond = {}
        element_ids.forEach(items => {
            let value_of_element = $('#' + items).val();
            temp_obj_cond[items] = value_of_element
        })

        conditions_obj.push(temp_obj_cond)
    }

    return JSON.stringify(conditions_obj)
}

async function save_data(){
    let moduleNumber = $('#moduleNumber').val();
    let conditions = await process_conditions();
    
    let url = '/cmc/save_data';
    $.ajax({
        cache: false,
        type: "post",
        url: url,
        data:{
            "moduleNumber" : moduleNumber,
            "conditions" : conditions,
        }
    })
    .done(function(result){
        $('#conditionID').val(JSON.parse(result).id)
        var toastElement = document.getElementById('toastSaved');//select id of toast
        var toast = new bootstrap.Toast(toastElement);//inizialize it
        toast.show();//show it
        $('#btn_save').addClass('d-none')
        $('#btn_update').removeClass('d-none')
    })
    .fail(function(e){
        console.error(e);
    })
}

async function update_data(){
    let moduleNumber = $('#moduleNumber').val();
    let conditionID = $('#conditionID').val();
    let conditions = await process_conditions();
    
    let url = '/cmc/update_data';
    $.ajax({
        cache: false,
        type: "post",
        url: url,
        data:{
            "conditionID" : conditionID,
            "moduleNumber" : moduleNumber,
            "conditions" : conditions,
        }
    })
    .done(function(result){
        $('#conditionID').val(JSON.parse(result).id)
        var toastElement = document.getElementById('toastUpdated');//select id of toast
        var toast = new bootstrap.Toast(toastElement);//inizialize it
        toast.show();//show it
    })
    .fail(function(e){
        console.error(e);
    })
}

async function get_cmc_per_module(){
    $('#cmc_div').removeClass('d-none')

    let cmc_data = await get_cmc_data();
    let moduleNumber = $('#moduleNumber').val();

    $('#cmcTable thead').html('')
    $('#cmcTable tbody').html('')
    
    let filtered_data = filterDataDynamic(moduleNumber, 'moduleNumber', cmc_data.cmcData);

    if(filtered_data.length != 0){
        let conditions = JSON.parse(filtered_data[0].conditions)
        let count_of_conditions = conditions.length

        $('#conditionID').val(filtered_data[0].id)

        for (let i = 0; i < count_of_conditions; i++) {
            $('#btn_add').trigger('click')
            $('#rangeMaxRow' + (i+1)).val(conditions[i]['rangeMaxRow' + (i+1)])
            $('#rangeMaxUnitRow' + (i+1)).val(conditions[i]['rangeMaxUnitRow' + (i+1)])
            $('#rangeMinRow' + (i+1)).val(conditions[i]['rangeMinRow' + (i+1)])
            $('#rangeMinUnitRow' + (i+1)).val(conditions[i]['rangeMinUnitRow' + (i+1)])
            $('#cmcValueRow' + (i+1)).val(conditions[i]['cmcValueRow' + (i+1)])

            if(moduleNumber == '1' || moduleNumber == '3' || moduleNumber == '4' || moduleNumber == '5'){
                $('#classRow' + (i+1)).val(conditions[i]['classRow' + (i+1)])
            }else if(moduleNumber == '9' || moduleNumber == '11'){
                $('#typeRow' + (i+1)).val(conditions[i]['typeRow' + (i+1)])
            }
            
        }
        $('#btn_save').addClass('d-none')
        $('#btn_update').removeClass('d-none')
        
    }else{
        $('#cmcTable thead').html('')
        $('#cmcTable tbody').html('')

        $('#btn_save').removeClass('d-none')
        $('#btn_update').addClass('d-none')
    }
}

function filterDataDynamic(searchingFor, searchIn, UnfilteredArray){
    let filteredDATA = UnfilteredArray.filter(function (e) {
    if (searchingFor == searchingFor ) {
        return e[searchIn] == searchingFor;
        }
    });
    return filteredDATA;
}

// function get_cmc_data(){
//     $('#cmc_div').removeClass('d-none')
// }


//#region DATA CONTROLLER

async function get_cmc_data(){
    let url = '/cmc/get_cmc_data_full';
    return $.ajax({
        cache: false,
        type: "post",
        url: url,
    })
    .fail(function(e){
        console.error(e);
    })
}



