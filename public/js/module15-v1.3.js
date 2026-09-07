var selectedStandard = '';
var standardValues = {};
var currentCoilValues;

const uuc_coverageFactor = 1; // Static 1 until confirmation on where to get the value
const uuc_sensitivityCoefficient = 1; // Static 1 until confirmation on where to get the value
const uuc_coverageFactor_sqrt3 = Math.sqrt(3); // Static sqrt(3) until confirmation on where to get the value
const standard_k = 2; // Static 2 until multimeter standard is made
const standard_sensitivityCoefficient = 1; // Static 1 until confirmation on where to get the value
const k2 = 2 // Static 2 until confirmation on where to get the value

$(document).ready(function() {
    addCustomerList();
    binds();
    addStandardToTable();
    getCurrentCoilData();
    addPersonnel();
    setUnits();
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

function setUnits(){
    let array_unit = ["µA", "mA", "A", "kA", "MA", "µV", "mV", "V", "kV", "MV", "µΩ", "mΩ", "Ω", "kΩ", "MΩ", "GΩ"];
    let array_hertz = ["µHz", "mHz", "Hz", "kHz", "MHz"];
  
    array_unit.forEach(items => {
      let option = $('<option>').val(items)
      $('#units').append(option)
    })
    array_hertz.forEach(items => {
      let option = $('<option>').val(items)
      $('#hertz').append(option)
    })
}

function getCurrentCoilData(){
    $.ajax({
        cache: false,
        type: "post",
        url: "/standard/currentCoil/getStandardDataCurrentCoil",
        async: false,
        success: function(result) {
            currentCoilValues = result.standardData;
        },
        error: function(e){
            console.log(e)
        }
    })
}

/**
 * 
 * @param {Number} tableNumber - number of table base on $('#divForTables').children().length;
 */
function newRawDataTable(tableNumber){
    let rowNumber = 1;
    let tableDivs = $('#divForTables');
    let table = $('<table>', {
        'class': "table table-bordered",
        'id': 'table' + tableNumber
    })
    let thead = $('<thead>')
    let tbody = $('<tbody>');


    /**
     * 
     * @param {String} id - id for <select> tag
     * @param {String} placeholder - html for <label> tag
     * @param {Array<String>} array_Options - array for html of <option> tag
     * @param {Array<String>} array_Values - array for value of <option> tag
     * @returns {Object} - returns <td><div><select> tag with <option>'s element with value base on array_options array
    */
    let	tdDivSelectOption = (id, placeholder, array_Options, array_Values) => {
    	let	td = $('<td>');
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
    /**
     * 
     * @param {String} id - id for <input> tag
     * @param {String} placeholder - html for <label> tag
     * @returns {Object} - returns <td><div><input> tag
    */
    let tdDivInput = (id, placeholder) => {
    	let	td = $('<td>');
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
    /**
     * 
     * @param {string} addBtn - id for <button> tag, Add Button
     * @param {String} rmvBtn - id for <button> tag, Remove Button
     * @returns {Object} - returns <td><div><button> tag
     */
    let buttonGroup = (addBtn, rmvBtn) => {
        let	td = $('<td>').attr('colspan', '9');
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
        }).on('click', function(){
            if($('#powerTable' + tableNumber).val() != 'Select . . .'){
                let newRow = addRowToMeasurementTable(tableNumber, rowNumber);
                tbody.append(newRow);
                rowNumber++;
            }else{
                alert('Select Type . . .')
            }
            
        })
        let removeBtn = $('<button>',{
            'type': 'button',
            'class': 'btn btn-danger',
            'html': 'Remove Row', 
            'id': rmvBtn + 'Table' + tableNumber,
            'data-TableNumber':tableNumber,
        }).on('click', function(){
            if (rowNumber > 1) {
                rowNumber--;
                tbody.find('tr:last').remove();
                if(rowNumber == 1){
                    thead.find('tr:last').remove();
                    $($(thead).children()[0]).children().each(function(){
                        $(this).attr('colspan', 1)
                    })
                    $($(thead).children()[1]).children().each(function(){
                        $(this).attr('colspan', 9)
                    })
                }
            }
            
            
        })

        return td.append(btnGroup.append(newBtn, removeBtn))
    }
    /**
     * 
     * @param {String} id - id for <input> tag
     * @param {String} placeholder - html for <label> tag
     * @returns {Object} - returns <td><div><input> tag
    */
    let tdDivCheck = (id, placeholder) => {
    	let	td = $('<td>').attr('style', 'vertical-align:middle');
        let div =  $('<div>', {
            'class': 'form-check form-switch',
        })
        let input = $('<input>', {
        'type': 'checkbox',
        'class': 'form-check-input',
        'data-group': 'raw_data',
        'id': id+'Table'+tableNumber,
        'placeholder': placeholder,
        })
        let label = $('<label>').attr('for', id+'Table'+tableNumber,).attr('class', 'form-check-label').html(placeholder)
        return td.append(div.append(input, label))
    }

    let array_optionPower = ['AC', 'DC', '2-wire', '3-wire', '4-wire', 'Shorted', 'N/A'];
    let array_optionPower_value = ['AC', 'DC', '2-wire', '3-wire', '4-wire', 'Shorted', 'Resistance'];   
    let array_function = ['Voltage', 'Current', 'Resistance'];
    let array_coils = [];
    let array_coils_value = [];

    currentCoilValues.forEach(items=>{
        array_coils.push(items.serialNumber)
        array_coils_value.push(items.turns)
    })

    let array_unit = ["µA","mA","A","kA","MA","µV","mV","V","kV","MV","µΩ","mΩ","Ω","kΩ","MΩ","GΩ"];

    let selectPower = tdDivSelectOption('power', 'Type', array_optionPower, array_optionPower_value);
    let selectFunction = tdDivSelectOption('function', 'Function', array_function, array_function);
    let inputRange = tdDivInput('range', 'Range');
    let selectRangeUnit = tdDivSelectOption('unit', 'Unit', array_unit, array_unit);
    let inputResolution = tdDivInput('resolution', 'Res/Grad');
    let inputReadability = tdDivInput('readability', 'Readability');
    let inputTrialNumber = tdDivInput('numberOfTrials', 'Number Of Trials');
    let inputCoilSwitch = tdDivCheck('coilSwitch', 'Use Current Coil');
    let selectCoils = tdDivSelectOption('usedCoils', 'Current Coil', array_coils, array_coils_value);

    let buttons = buttonGroup('addRow', 'removeRow')

    

    let theadTR1 = $('<tr>')
    let theadTR2 = $('<tr>')
    let theadTR3 = $('<tr>')
    
    thead.append(
        theadTR1.append(
            selectPower,
            selectFunction,
            inputTrialNumber,
            inputRange,
            selectRangeUnit,
            inputResolution,
            inputReadability,
            inputCoilSwitch,
            selectCoils
        ),
        theadTR2.append(
            buttons,
        ),
       
    )
    

    tableDivs.append(table.append(thead,tbody))

}

function removeTable(){
    $('#divForTables').children(':last-child').remove();
}

/**
 * 
 * @param {Number} tableNumber - table number for id
 * @param {Number} rowNumber - row number for id
 * @returns {Object} - returns <tr><td><input> tag
 */
function addRowToMeasurementTable(tableNumber, rowNumber){
    let $tr = $('<tr>');
    let array_thead = ['Test Point'];
    let ids = [
        'testPoint',
    ];
    let array_colspan = [];
    let array_input_colspan = [];
    
    let numberOfTrials = $('#numberOfTrialsTable' + tableNumber).val()
    let powerValue = $('#powerTable' + tableNumber).val()
    let currentCoilChecker = $('#coilSwitchTable' + tableNumber).is(':checked')

    let thead = $('#table' + tableNumber + ' thead');

    if(currentCoilChecker){
        ids.push('testCurrent');
        array_thead.push('Test Current');
    }

    for (let i = 1; i <= numberOfTrials; i++) {
        ids.push('trial' + i);
        array_thead.push('Trial ' + i);
    }

    if(rowNumber === 1){
        let tdDescTheadTR = $('<tr>')
        array_thead.forEach(items=>{
            let td = $('<td>').html(items)
            tdDescTheadTR.append(td);
        })
        thead.append(tdDescTheadTR);
    }


    let thead_tr = thead.children();
    for (let i = 0; i < thead_tr.length; i++) {
        let tr_header = $(thead_tr[0]).children();
        let tr_trials = $(thead_tr[2]).children();
        let tr_td = $(thead_tr[i]).children();

        let array_bigger = tr_header.length > tr_trials.length ? tr_header : tr_trials;
        let array_smaller = tr_header.length < tr_trials.length ? tr_header : tr_trials;
        let counter_big = array_bigger.length;
        let counter_small = array_smaller.length;

        let counter_current = tr_td.length;

        if(i === 1){
            $(tr_td[0]).attr('colspan', counter_big);
            continue;
        }

        if(counter_current == counter_small){
            let temp_arr = [];
            for (let i = 0; i < tr_td.length; i++) {
                let add_colspan_to_non = $(tr_td[i]).attr('colspan') ?? 1;
                $(tr_td[i]).attr('colspan', add_colspan_to_non)
                temp_arr.push(add_colspan_to_non)
            }

    
            while (counter_small < counter_big) {
                let array_colspan_smaller = [];
                for (let i = 0; i < array_smaller.length; i++) {
                  let colspan_current_element = Number($(array_smaller[i]).attr('colspan'));
                  array_colspan_smaller.push(colspan_current_element);
                }

                let sum_colspan = array_colspan_smaller.reduce((acc, curr) => acc + curr, 0);

                if(sum_colspan < counter_big){
                    for (let i = 0; i < array_colspan_smaller.length; i++) {
                        if (counter_small >= counter_big) {
                            break;
                        }
                        let colspan_current_element = array_colspan_smaller[i];
                        $(array_smaller[i]).attr('colspan', colspan_current_element + 1);
                        if(tr_trials.length < counter_big){
                          array_colspan[i] = colspan_current_element + 1
                        }
                        counter_small++;
                    }
                }
                else{
                    counter_small++;
                }
            }
            for (let i = 0; i < tr_trials.length; i++) {
                let add_colspan_to_non = $(tr_trials[i]).attr('colspan')??1 ;
                array_colspan[i] = add_colspan_to_non
            }
            
        }
        
    }

    for(let i = 0; i < ids.length; i++){
        let $td = $('<td>').attr('colspan', array_colspan[i]);
        //let $td = $('<td>');
        let $input;
        switch (i) {
            case 0:
                if (powerValue == 'AC'){
                    let div =  $('<div>', {
                        'class': 'input-group',
                    })
                      let divHerts = $('<div>', {
                        class: 'input-group form-control p-1'
                      })
                      let hertz = $('<input>', {
                        'type': 'text',
                        'class': 'form-control',
                        'data-group': 'raw_data',
                        "data-required": "false",
                        'id': 'testPointHertz' + 'TABLE' + tableNumber + 'ROW' + rowNumber
                      })
                      let hertzUnit = $('<input>', {
                        'type': 'text',
                        'class': 'form-control',
                        'data-group': 'raw_data',
                        "data-required": "false",
                        'id': 'testPointHertzUnit' + 'TABLE' + tableNumber + 'ROW' + rowNumber,
                        'list': 'hertz'
                      })
                      divHerts.append(hertz, hertzUnit)


                    $input = div.append($('<input>',{
                        'type': 'text',
                        'class': 'form-control',
                        'data-group': 'raw_data',
                        "data-required": "false",
                        'id': ids[i] + 'TABLE' + tableNumber + 'ROW' + rowNumber
                    }).add(
                        divHerts
                    ))
                    break;
                }
            default:
                $input = $('<input>',{
                    'type': 'text',
                    'class': 'form-control',
                    'data-group': 'raw_data',
                    "data-required": "false",
                    'id': ids[i] + 'TABLE' + tableNumber + 'ROW' + rowNumber,
                    'style': 'min-width:100px'
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
    standardDetails.forEach(item => {
        let suffix = 'days left before due date';
        let date_next_calibration = new Date(item.dateOfCalibration)
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

        let labelDaysTD = $('<td>');
        let labelDays = $('<label>').text(days_due + ' ' + suffix).attr('for', item['id'])
       

        let checkbox = $('<input>').attr({
          'type':'checkbox',
          'id':item['id'],
          'data-group':'standardCheckBox',
          'value':item['id'],
        })
        checkBoxTD.append(checkbox);

        let label = $('<label>').text(item['serialNumber']).attr('for', item['serialNumber'])
        labelTD.append(label);
        labelDaysTD.append(labelDays);
        row.append(checkBoxTD).append(labelTD).append(labelDaysTD)
        tableBody.append(row)
    })
}

function selectStandard(){
    let selectedStandardArray = [];
    $('input[data-group="standardCheckBox"]:checked').each(function() {
      selectedStandardArray.push($(this).val())
    });
    let selectedStandard = selectedStandardArray.join('(SPLIT)');
    $('#selectedStandard').val(selectedStandard)

    updateProcessStandard(selectedStandard);
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

    for (let i = 0; i < standardDetails.length; i++) {
      let obj = standardDetails[i];
      if (array_selectedStandard.includes(obj.balance)) {
        selectedStandardData[obj.balance] = obj;
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

function findObjectByData(array, key, searchData){
    let array_data = [];
    for (let i = 0; i < array.length; i++) {
        if (array[i][key] === searchData) {
            array_data.push(array[i]);
        }
    }
    return array_data; 
}

function filterObjects(type, tableFunction){
    let standard_data = standardValues.standardValues;
    let filtered_type = findObjectByData(standard_data, 'type', type)
    let filtered_function = findObjectByData(filtered_type, 'function', tableFunction)
    let result = filtered_function;

    return result;
}

function data_standardValue(testPoint, unit, array_data, hertz = 0, hertzUnit = ''){
    let result_to_return;
    let val = [];
    let testpoint_m = convertTestpoint(testPoint, unit)
    let float_hertz = parseFloat(hertz) 
    
    let last_recorded_data;

    if(hertzUnit == ''){
        let data_sorted;
        let max_range
        let counter = 1;
        for(let i = 0; i < array_data.length; i++){
            let standardUnit = array_data[i].rangeMaxUnit;
            let number_rangeMin = Number(array_data[i].rangeMin);
            let number_rangeMax = Number(array_data[i].rangeMax);
        
            let testpoint_m = convertTestpoint(testPoint, unit)
            let rangeMin_m = convertTestpoint(number_rangeMin, standardUnit)
            let rangeMax_m = convertTestpoint(number_rangeMax, standardUnit)
            
            //last_recorded_data = array_data[i];
    
            if(Math.abs(testpoint_m) >= rangeMin_m && Math.abs(testpoint_m) <= rangeMax_m){
                result_to_return = array_data[i]
                break;
            }

            if(!max_range){
                max_range = rangeMax_m;
                data_sorted = array_data[i]
            }
            if(rangeMin_m > testpoint_m && counter > 0){
                max_range = rangeMax_m;
                data_sorted = array_data[i]
                counter -= 1;
            }
            
            if(rangeMax_m > testpoint_m){
                continue;
            }
            if(rangeMax_m > max_range){
                max_range = rangeMax_m;
                data_sorted = array_data[i]
            }
        }
    
        if(!result_to_return){
            result_to_return = data_sorted
        }
    }else{
        let float_hertz_converted = convertTestpoint(float_hertz, hertzUnit);

        let hertz_is_changed = false; 
        
        let data_to_compare = [];
        let data_to_compare_inrange = [];

        for (let i = 0; i < array_data.length; i++) {
            let standardUnit = array_data[i].rangeMaxUnit;
            let number_rangeMin = Number(array_data[i].rangeMin);
            let number_rangeMax = Number(array_data[i].rangeMax);
            let number_hertz = Number(array_data[i].outputSettingHertz);
            let number_hertzUnit = array_data[i].outputSettingHertzUnit;
        
            let rangeMin_m = convertTestpoint(number_rangeMin, standardUnit)
            let rangeMax_m = convertTestpoint(number_rangeMax, standardUnit)

            let hertz_m = convertTestpoint(number_hertz, number_hertzUnit)
            
            if(Math.abs(testpoint_m) >= rangeMin_m && Math.abs(testpoint_m) <= rangeMax_m){
                if(float_hertz_converted == hertz_m){
                    result_to_return = array_data[i]
                    break;
                }else{
                    data_to_compare_inrange.push(array_data[i])
                }
            }else if(Math.abs(testpoint_m) > rangeMax_m){
                data_to_compare.push(array_data[i])
            }
        }

        if(!result_to_return){
            if(data_to_compare_inrange.length > 0){
                let bigger_object;
                let bigger_counter = float_hertz_converted;
                let bigger_within_array;
                let bigger_within_array_counter;
                for (let i = 0; i < data_to_compare_inrange.length; i++) {
                    let number_hertz = Number(data_to_compare_inrange[i].outputSettingHertz);
                    let number_hertzUnit = data_to_compare_inrange[i].outputSettingHertzUnit;
                    let hertz_m = convertTestpoint(number_hertz, number_hertzUnit)
                    if(bigger_counter < hertz_m){
                        bigger_object = data_to_compare_inrange[i]
                        break
                    }
                    if(bigger_within_array_counter < hertz_m){
                        bigger_within_array_counter = hertz_m
                        bigger_within_array = data_to_compare_inrange[i]
                    }
                }
                if(!bigger_object){
                    result_to_return = bigger_within_array
                }else{
                    result_to_return = bigger_object
                }

            }
            // else{
            //     let bigger_object;
            //     let bigger_counter = float_hertz_converted;
            //     let bigger_within_array;
            //     let bigger_within_array_counter;
            //     for (let i = 0; i < data_to_compare.length; i++) {
            //         let number_hertz = Number(data_to_compare[i].outputSettingHertz);
            //         let number_hertzUnit = data_to_compare[i].outputSettingHertzUnit;
            //         let hertz_m = convertTestpoint(number_hertz, number_hertzUnit)
            //         if(bigger_counter < hertz_m){
            //             bigger_object = data_to_compare[i]
            //             break
            //         }
            //         if(bigger_within_array_counter < hertz_m){
            //             bigger_within_array_counter = hertz_m
            //             bigger_within_array = data_to_compare[i]
            //         }
            //     }
            //     if(!bigger_object){
            //         result_to_return = bigger_within_array
            //     }else{
            //         result_to_return = bigger_object
            //     }
            // }
            else{
                let ranges = {}
                for (let i = 0; i < data_to_compare.length; i++) {
                    let number_hertz = Number(data_to_compare[i].outputSettingHertz);
                    let number_hertzUnit = data_to_compare[i].outputSettingHertzUnit;
                    let hertz_m = convertTestpoint(number_hertz, number_hertzUnit)

                    let standardUnit = array_data[i].rangeMaxUnit;
                    let number_rangeMin = Number(array_data[i].rangeMin);
                    let number_rangeMax = Number(array_data[i].rangeMax);
                    let rangeMin_m = convertTestpoint(number_rangeMin, standardUnit)
                    let rangeMax_m = convertTestpoint(number_rangeMax, standardUnit)

                    ranges[i] = {
                        "min":rangeMin_m,
                        "max":rangeMax_m,
                        "hertz":hertz_m,
                    }
                }

                
                let filtered_range_to_be_used = {};
                
                let max_range
                for(var key in ranges){
                    if(!max_range){
                        max_range = ranges[key].max;
                        filtered_range_to_be_used[key] = ranges[key]
                    }
                    if(ranges[key].max > testpoint_m){
                        continue;
                    }
                    if(ranges[key].max > max_range){
                        filtered_range_to_be_used = {}
                        max_range = ranges[key].max;
                        filtered_range_to_be_used[key] = ranges[key]
                    }
                    if(ranges[key].max == max_range){
                        max_range = ranges[key].max;
                        filtered_range_to_be_used[key] = ranges[key]
                    }
                }

                let filtered_range_to_be_used_keys = Object.keys(filtered_range_to_be_used);
                let object_to_return
                for (let i = 0; i < filtered_range_to_be_used_keys.length; i++) {
                    if(filtered_range_to_be_used[filtered_range_to_be_used_keys[i]]['hertz'] == float_hertz_converted){
                        object_to_return = data_to_compare[filtered_range_to_be_used_keys[i]]
                        break;
                    }else if(filtered_range_to_be_used[filtered_range_to_be_used_keys[i]]['hertz'] > float_hertz_converted){
                        object_to_return = data_to_compare[filtered_range_to_be_used_keys[i]]
                        break;
                    }
                }
                result_to_return = object_to_return
            }
        }

    }

    return result_to_return;
}
  
function convertTestpoint(value, unit) {
    let float_value = Number(value)
    const units = {
        'V': 'volts',
        'A': 'amps',
        'Ω': 'ohms',
        'Hz': 'hertz',

    }
    const convertion = {
        "volts": {
            'µV': 0.000001,
            'mV': 0.001,
            'V': 1,
            'kV': 1000,
            'MV': 1000000
        },
        "amps": {
            'µA': 0.000001,
            'mA': 0.001,
            'A': 1,
            'kA': 1000,
            'MA': 1000000
        },
        "ohms": {
            'µΩ': 0.000001,
            'mΩ': 0.001,
            'Ω': 1,
            'kΩ': 1000,
            'MΩ': 1000000,
            'GΩ': 1000000000
        },
        "hertz": {
            'µHz': 0.000001,
            'mHz': 0.001,
            'Hz': 1,
            'kHz': 1000,
            'MHz': 1000000,
            'GHz': 1000000000
        },

    }
    let unitNoPrefix;
    if(unit.includes('Hz')){
        unitNoPrefix = unit.split('').length == 2 ? unit.split('')[0] + unit.split('')[1] : unit.split('')[1] + unit.split('')[2]
    }else{
        unitNoPrefix = unit.split('').length == 1 ? unit.split('')[0] : unit.split('')[1]
    }
    
    let unitWord = units[unitNoPrefix];
    if(!unitWord){
        debugger
    }
    let result = float_value * convertion[unitWord][unit] / convertion[unitWord]['m'+unitNoPrefix]
    return result;
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

            $('input[id^="trial"][id$="'+tableIdRowNumber+'"]').each(function() {
                calculatedData[tableName][rowNumber][$(this).attr('id')] = $(this).val();
                array_trials.push($(this).val())
            })

            let currentCoil_sensitivityCoefficient;

            let $element_testPoint = $('#testPoint'+'TABLE'+i+'ROW'+x);
            let $element_resolution = $('#resolutionTable'+i);
            let $element_readability = $('#readabilityTable'+i);

            let $element_range = $('#rangeTable'+i);
            let $element_unit = $('#unitTable'+i);
            let $element_function = $('#functionTable'+i);
            let $element_power = $('#powerTable'+i);
            let $element_coilSwitch = $('#coilSwitchTable'+i);
            let $element_usedCoils = $('#usedCoilsTable'+i);
            
            let with_current_coil = $element_coilSwitch.is(':checked')

            let standard_value_filtered =  filterObjects($element_power.val(), $element_function.val())
            let standardValue;

            if(with_current_coil){
                let $element_testCurrent = $('#testCurrent'+'TABLE'+i+'ROW'+x);
                if($element_power.val() === 'AC'){
                    let $element_hertz = $('#testPointHertz'+'TABLE'+i+'ROW'+x);
                    let $element_hertz_unit = $('#testPointHertzUnit'+'TABLE'+i+'ROW'+x);
                    standardValue = data_standardValue($element_testCurrent.val(), $element_unit.val(), standard_value_filtered, $element_hertz.val(), $element_hertz_unit.val())

console.log($element_testCurrent.val())
                }else{
                    standardValue = data_standardValue($element_testCurrent.val(), $element_unit.val(), standard_value_filtered)
                    
console.log($element_testCurrent.val())
                }
            }else{
                if($element_power.val() === 'AC'){
                    let $element_hertz = $('#testPointHertz'+'TABLE'+i+'ROW'+x);
                    let $element_hertz_unit = $('#testPointHertzUnit'+'TABLE'+i+'ROW'+x);
                    standardValue = data_standardValue($element_testPoint.val(), $element_unit.val(), standard_value_filtered, $element_hertz.val(), $element_hertz_unit.val())
                }else{
                    standardValue = data_standardValue($element_testPoint.val(), $element_unit.val(), standard_value_filtered)
                }
            }

console.log($element_testPoint.val())
console.log($element_function.val())
console.log($element_power.val())
console.log(standardValue)
            
            let computed_currentCoilInteraction = 0;
            if(with_current_coil){
                let $element_testCurrent = $('#testCurrent'+'TABLE'+i+'ROW'+x);
                currentCoil_sensitivityCoefficient = $element_usedCoils.val()
                computed_currentCoilInteraction = currentCoilInteraction($element_testCurrent.val(), currentCoil_sensitivityCoefficient);
                calculatedData[tableName][rowNumber]['currentCoilInteraction'] = computed_currentCoilInteraction;
            }

            calculatedData[tableName][rowNumber]['testpoint'] = $element_testPoint.val();
            let computed_average = average(array_trials);
            calculatedData[tableName][rowNumber]['average'] = computed_average;
            let computed_deviation = deviation(computed_average, $element_testPoint.val())
            calculatedData[tableName][rowNumber]['deviation'] = computed_deviation;
            let computed_standardDeviation = standardDeviation(array_trials)
            calculatedData[tableName][rowNumber]['standardDeviation'] = computed_standardDeviation;
            let computed_valueRepeatability = valueRepeatability(computed_standardDeviation)
            calculatedData[tableName][rowNumber]['valueRepeatability'] = computed_valueRepeatability;
            let computed_uncertaintyRepeatability = uncertaintyRepeatability(computed_valueRepeatability, uuc_coverageFactor, uuc_sensitivityCoefficient)
            calculatedData[tableName][rowNumber]['uncertaintyRepeatability'] = computed_uncertaintyRepeatability;
            let computed_uncertaintyUUCResolution = uncertaintyUUCResolution($element_resolution.val(), $element_readability.val(), uuc_coverageFactor_sqrt3, uuc_sensitivityCoefficient)
            calculatedData[tableName][rowNumber]['uncertaintyUUCResolution'] = computed_uncertaintyUUCResolution;
            let computed_uncertaintyStandard = uncertaintyStandard(standardValue.uncertainty.replace(' ', ''), standard_k, standard_sensitivityCoefficient)
            calculatedData[tableName][rowNumber]['uncertaintyStandard'] = computed_uncertaintyStandard;

            let drift = standardValue.drift;
            calculatedData[tableName][rowNumber]['drift'] = drift;
            let computed_uncertaintyDrift = uncertaintyDrift(drift);
            calculatedData[tableName][rowNumber]['uncertaintyDrift'] = computed_uncertaintyDrift;

            let computed_combinedUncertainty = with_current_coil != true ? combinedUncertainty(computed_uncertaintyRepeatability, computed_uncertaintyUUCResolution, computed_uncertaintyStandard, computed_uncertaintyDrift) : currentCoil_combinedUncertainty(computed_uncertaintyRepeatability, computed_uncertaintyUUCResolution, computed_uncertaintyStandard, computed_uncertaintyDrift, computed_currentCoilInteraction);

            calculatedData[tableName][rowNumber]['combinedUncertainty'] = computed_combinedUncertainty;
            let computed_vEff = vEff(computed_combinedUncertainty, computed_uncertaintyRepeatability, computed_uncertaintyUUCResolution, computed_uncertaintyStandard, computed_uncertaintyDrift)
            calculatedData[tableName][rowNumber]['vEff'] = computed_vEff;
            let computed_k = computed_vEff > 100 ? 2 : calculateK(computed_vEff);
            calculatedData[tableName][rowNumber]['k'] = computed_k;
            let computed_expandedUncertainty = expandedUncertainty(computed_combinedUncertainty, computed_k)
            calculatedData[tableName][rowNumber]['expandedUncertainty'] = computed_expandedUncertainty;
            

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
        let td1 = $('<td>').html(parseFloat(CalData[tableName][rowName]['testpoint']))
        let td2 = $('<td>').html(parseFloat(CalData[tableName][rowName]['average']).toFixed(6))
        let td3 = $('<td>').html(parseFloat(CalData[tableName][rowName]['deviation']).toFixed(6))
        let td4 = $('<td>').html(parseFloat(CalData[tableName][rowName]['standardDeviation']).toFixed(6))
        let td5 = $('<td>').html(parseFloat(CalData[tableName][rowName]['valueRepeatability']).toFixed(6))
        let td6 = $('<td>').html(parseFloat(CalData[tableName][rowName]['uncertaintyRepeatability']).toFixed(6))
        let td7 = $('<td>').html(parseFloat(CalData[tableName][rowName]['uncertaintyUUCResolution']).toFixed(6))
        let td8 = $('<td>').html(parseFloat(CalData[tableName][rowName]['uncertaintyStandard']).toFixed(6))
        let td9 = $('<td>').html(parseFloat(CalData[tableName][rowName]['uncertaintyDrift']).toFixed(6))
        let td10 = $('<td>').html(parseFloat(CalData[tableName][rowName]['combinedUncertainty']).toFixed(6))
        let td11 = $('<td>').html(parseFloat(CalData[tableName][rowName]['vEff']).toFixed(6))
        let td12 = $('<td>').html(parseFloat(CalData[tableName][rowName]['k']).toFixed(6))
        let td13 = $('<td>').html(parseFloat(CalData[tableName][rowName]['expandedUncertainty']).toFixed(6))

        $(uncBudgetTbody).append(
          $(tr).append(td1,td2,td3,td4,td5,td6,td7,td8,td9,td10,td11,td12,td13)
        )
      }
    }
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
        url: "/electricalmeter/add_New_Worksheet_Data",
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
            window.location.href = "/electricalmeter/worksheet/"+JSON.parse(result).id;

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
        if($(this).attr('type') == 'checkbox'){
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
        url: "/electricalmeter/update_Worksheet_Data",
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

function updateProcessStandard(standardPicked){
    let selectedStandard = standardPicked.split("(SPLITHERE)")
    $('input[type="checkbox"][data-group*="standardCheckBox"]').each(function(){
        let currentCheckboxValue = $(this).val();
        if(selectedStandard.includes(currentCheckboxValue)){
            $(this).prop('checked', true);
        }
        
    })
    processModalStandardCheckbox();

}

function processModalStandardCheckbox(){
    var selected = $("input[data-group*='standardCheckBox']:checked").map(function () {
        return this.value;
    }).get();
    
    let tempSelectedStandard = selected.join('(SPLITHERE)');

    
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

    getValuesOfSelectedStandardUsingSerialNumber();
}

function getValuesOfSelectedStandardUsingSerialNumber(){
    let standardIDs = selectedStandard.split("(SPLITHERE)");
    let array_Values = [];
    getValuesOfSelectedStandard(standardIDs)

}

function getValuesOfSelectedStandard(ids){
    $.ajax({
        cache: false,
        type: "post",
        url: "/standard/multiProductCalibrator/getStandardValuesMultiProductCalibratorByDetailsID",
        async: false,
        data: {
            'selectedStandardID': ids
        },
        success: function(result) {
            standardValues = result;
            
        },
        error: function(e){
            console.log(e)
        }
    })
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
            let serialNumber = $('<td>').html(value['values'][i]['serialNumber']);
            // let marking = $('<td>').html(value['values'][i]['marking']);
            let marking = $('<td>').html(markingsToBeUsed);
            let conventionalMass = $('<td>').html(value['values'][i]['conventionalMass']);
            let unit = $('<td>').html(value['values'][i]['unit']);
            let uncertainty = $('<td>').html(value['values'][i]['uncertainty']);
            let mpe = $('<td>').html(value['values'][i]['mpe']);

            let button = $('<td>').append($('<button>').attr('class', 'button').attr('class', 'btn btn-outline-secondary').attr('id', 'standardButton' + value['values'][i]['id']).attr('data-function', 'add').attr('data-id', value['values'][i]['id']).html('Use').click(function(){
                // standardUseButton(value['values'][i]['id'], value['values'][i]['marking'], value['values'][i]['conventionalMass'], value['values'][i]['uncertainty'], value['values'][i]['mpe'], value['values'][i]['type'], $(this));
                standardUseButton(value['values'][i]['id'], markingsToBeUsed, value['values'][i]['conventionalMass'], value['values'][i]['uncertainty'], value['values'][i]['mpe'], value['values'][i]['type'], $(this));
            }));

            tr.append(nominalValue, serialNumber, marking, button, conventionalMass, unit, uncertainty, mpe);
            table.append(tr)
        }
        
    });
}

$( window ).on( "load", function() {
    if ($('#idOfCertificate').val() != ''){
        let idOfCertificate = $('#idOfCertificate').val();
        $.ajax({
            cache: false,
            type: "post",
            url: "/electricalmeter/get_data_by_id",
            data: {
                'idOfCertificate' : idOfCertificate,
            },
            success: function(result) {
                //userCheck(result.userData.id, result.worksheetData.calibratorAccountID, result.userData.email, result.worksheetData.calibratorAccountEmail, result.worksheetData.completion)
                $('#saveButton').html('Update')
                $('#saveButton').on("click", function(){updateData()});
                
                if(result.worksheetData['standard'] != null){
                    selectedStandard = result.worksheetData['standard'];
                    $('#selectedStandard').val(result.worksheetData['standard'])
                    updateProcessStandard(result.worksheetData['standard']);
                }

                let calculatedDataRAW = result.worksheetData['calculatedData'];
                let calculatedData = calculatedDataRAW != "" ? JSON.parse(calculatedDataRAW) : {};
                $('#calculatedData').val(JSON.stringify(calculatedData));
                
                let dataInputs = JSON.parse(result.worksheetData['dataInputs'])
                let count = 0;
                
                for (let key in dataInputs) {
                    if (key.startsWith('powerTable')) {
                        count++;
                    }
                }

                
                

                for (let index = 1; index <= count; index++) {
                    $('#addTable').trigger('click')
                    let rowCount = 0;
                    for (let key in dataInputs) {
                        if (key.startsWith('testPointTABLE'+index)) {
                            rowCount++;
                        }
                    }

                    $('#powerTable'+index).val(dataInputs['powerTable'+index]);
                    $('#numberOfTrialsTable'+index).val(dataInputs['numberOfTrialsTable'+index]);
                    if(dataInputs['coilSwitchTable'+index]==='checked'){
                        $('#coilSwitchTable'+index).attr(dataInputs['coilSwitchTable'+index], true)      
                    }
                    
                    for (let x = 1; x <= rowCount; x++) {
                        $('#addRowTable'+index).click();
                    }
                    
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
        $('#submitButton').attr('disabled', '');   
    }
});