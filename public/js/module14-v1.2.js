var selectedStandard, standardUncertaintyValues, standardMeasurementValues;

$(document).ready(function() {
    binds();
    addPersonnel();
    addCustomerList();
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
    bind('selectStandardButton','click',function(){
        getStandardDetails();
    });
    bind('calculateButton','click',function(){
        calculateWithErrorHandling();
    });
    bind('checkedBy','change',function(){
        copyFromDataset('checkedBy', 'verifierPosition', 'verifierposition')
        getEmailOfVerifier('checkedBy');
    }); 
    bind('verifierPosition','change',function(){
        copyFromDataset('verifierPosition', 'checkedBy', 'verifiername')
    });
    bind('dateCalibrated','change',function(){
        setDate();
    });
    bind('recommendedDueDateSelect','change',function(){
        setDate();
    });
    bind('deleteTable','click',function(){
        removeTable()
    });
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
function addCustomerList(){
    customers.forEach(data => {
        let customer = data.customer + ' @ ' + data.address;
        $('#customerList').append(
            $('<option>').val(customer)
        )
    })
}
function removeTable(){
    $('#divForTables').children(':last-child').remove();
}

//#region Standard Functions
function getStandardDetails(){
    let url = '/standard/gaugeBlock/getStandardDataGaugeBlockDetails';
    $.ajax({
        cache: false,
        type: "post",
        url: url,
    })
    .done(function(result){
        addStandardToTable(result.standardData)
    })
    .fail(function(error){
        console.log(error)
        alert('Unable to fetch Standard Details')
    })
}
function addStandardToTable(data){
    let tableBody = $('#standardTableTbody');  
    $(tableBody).html('')
    let selectedIDs =  $('#selectedStandard').val().split('(SPLITHERE)')
    let today = new Date();
    data.forEach(item => {
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
        let labelDescriptionTD = $('<td>');
        let labelManufacturerTD = $('<td>');
        let labelSerialNumberTD = $('<td>');
        let labelMaterialTD = $('<td>');
        let labelCertNumberTD = $('<td>');
        let labelProviderTD = $('<td>');
        let labelDaysTD = $('<td>');

        let isChecked = selectedIDs.includes(item['id'])

        let checkbox = $('<input>').attr({
          'type':'checkbox',
          'id':item['id'],
          'data-group':'standardCheckBox',
          'value':item['id'],
        })
        if(isChecked){checkbox.attr('checked','true')}
        checkBoxTD.append(checkbox);

        let labelDescription = $('<label>').text(item['description']).attr('for', item['id'])
        let labelManufacturer = $('<label>').text(item['manufacturer']).attr('for', item['id'])
        let labelSerialNumber = $('<label>').text(item['serialNumber']).attr('for', item['id'])
        let labelMaterial = $('<label>').text(item['material']).attr('for', item['id'])
        let labelCertNumber = $('<label>').text(item['certificateNumber']).attr('for', item['id'])
        let labelProvider = $('<label>').text(item['calibrationProvider']).attr('for', item['id'])
        let labelDays = $('<label>').text(days_due + ' ' + suffix).attr('for', item['id'])

        labelDescriptionTD.append(labelDescription);
        labelManufacturerTD.append(labelManufacturer);
        labelSerialNumberTD.append(labelSerialNumber);
        labelMaterialTD.append(labelMaterial);
        labelCertNumberTD.append(labelCertNumber);
        labelProviderTD.append(labelProvider);
        labelDaysTD.append(labelDays);
    
        row.append(checkBoxTD, labelDescriptionTD, labelManufacturerTD, labelSerialNumberTD, labelMaterialTD, labelCertNumberTD, labelProviderTD, labelDaysTD)
        tableBody.append(row)
    })
    updateProcessStandard()
}
function updateProcessStandard(){
    let selectedStandard = $('#selectedStandard').val().split("(SPLITHERE)")
    $('input[type="checkbox"][data-group*="standardCheckBox"]').each(function(){
        let currentCheckboxValue = $(this).val();
        if(selectedStandard.includes(currentCheckboxValue)){
            $(this).prop('checked', true);
        }
        
    })
    processModalStandardCheckbox();
}
function processModalStandardCheckbox(){
    let selected = $("input[data-group*='standardCheckBox']:checked").map(function () {
        return this.value;
    }).get();
    
    let tempSelectedStandard = selected.join('(SPLITHERE)');
    selectedStandard = tempSelectedStandard
    $('#selectedStandard').val(selectedStandard)
    get_standard_values();
}
function get_standard_values(){
    let selectedIDs = selectedStandard.split('(SPLITHERE)')
    $.ajax({
        cache: false,
        type: "post",
        url: "/standard/gaugeBlock/getStandardValuesGaugeBlockByDetailsID",
        data: {
            'selectedStandardID': selectedIDs,
        }
    })
    .done(function(result) {
            standardUncertaintyValues = result.standardUncertaintyData;
            standardMeasurementValues = result.standardMeasurementData;
    })
    .fail(function (error) {
        console.log(error)
        alert('Unable to get Standard value of id: ' + selectedIDs)
    })
}
//#endregion Standard Functions

function newRawDataTable(tableNumber){
    let rowNumber = 1;
    let tableDivs = $('#divForTables');
    let table = $('<table>', {
        'class': "table table-bordered",
        'id': 'table' + tableNumber
    })
    let thead = $('<thead>')
    let tbody = $('<tbody>');



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
            if($('#typeTable' + tableNumber).val() != 'Select . . .'){
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
                        $(this).attr('colspan', 6)
                    })
                    $($(thead).children()[2]).children().each(function(){
                        $(this).attr('colspan', 6)
                    })
                    $($(thead).children()[1]).children().each(function(){
                        $(this).attr('colspan', 1)
                    })
                }
            }
            
            
        })

        return td.append(btnGroup.append(newBtn, removeBtn))
    }

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


    let array_optionPower = ['Caliper', 'Micrometer'];
    let array_unit = ['μm', 'mm'];

    let selectType = tdDivSelectOption('type', 'Type', array_optionPower, array_optionPower);
    let inputRange = tdDivInput('range', 'Range (Max)');
    let inputGraduation = tdDivInput('graduation', 'Graduation');
    let inputReadability = tdDivInput('readability', 'Readability');
    let selectRangeUnit = tdDivSelectOption('unit', 'Unit', array_unit, array_unit);
    let inputTrialNumber = tdDivInput('numberOfTrials', 'Number Of Trials');
    let buttons = buttonGroup('addRow', 'removeRow')

    let array_inputs_id = [['CTEuuc', 'CTEstd', 'tempFluctuation', 'tempRange'], ['CTEuucMax', 'CTEuucMin', 'CTEuucRange'], ['parallelism', 'spindle', 'anvil']]
    let array_inputs_label = [['Coefficient of Thermal Expansion (UUC)', 'Coefficient of Thermal Expansion (Standard)', 'Allowable Temperature Fluctuation', 'Temperature Range'], ['Coefficient of Thermal Expansion UUC (MAX)', 'Coefficient of Thermal Expansion UUC (MIN)', 'Coefficient of Thermal Expansion UUC (RANGE)'], ['Parallelism', 'Spindle', 'Anvil']]

    function div_row_col(array_ID, array_label){
        let numberOfCol = array_ID.length;
        let div_row = $('<div>').attr('class', 'row d-flex align-items-center');
        
        for (let i = 0; i < numberOfCol; i++) {
            let div_col = $('<div>').attr('class', 'col');
            let numberOfrow = array_ID[i].length;
            for (let ii = 0; ii < numberOfrow; ii++) {
                let div =  $('<div>', {
                    'class': 'form-floating mb-3',
                })
                let input = $('<input>', {
                'type': 'text',
                'class': 'form-control',
                'data-group': 'raw_data',
                'id': array_ID[i][ii]+'Table'+tableNumber,
                'placeholder': array_label[i][ii],
                })
                let label = $('<label>').attr('for', array_ID[i][ii]+'Table'+tableNumber).html(array_label[i][ii])
                div.append(input, label)
                div_col.append(div)
            }
            div_row.append(div_col)
        }
        return div_row;
    } 

    let theadTR1 = $('<tr>')
    let theadTR2 = $('<tr>')
    let theadTR3 = $('<tr>')
    
    thead.append(
        theadTR1.append(
           $('<td>').attr('colspan', '6').append(div_row_col(array_inputs_id, array_inputs_label))
        ),
        theadTR2.append(
            selectType,
            inputTrialNumber,
            inputRange,
            selectRangeUnit,
            inputGraduation,
            inputReadability,
        ),
        theadTR3.append(
            buttons,
        ),
    )
    

    tableDivs.append(table.append(thead,tbody))

}

function addRowToMeasurementTable(tableNumber, rowNumber){
    let $tr = $('<tr>');
    let array_thead = [
        'Gauge Block Used (A)',
        'Gauge Block Used (B)',
        'Equiv.',
    ];
    let ids = [
        'gaugeBlockUsedA',
        'gaugeBlockUsedB',
        'equiv',
    ];
    let array_colspan = [];
    
    let numberOfTrials = $('#numberOfTrialsTable' + tableNumber).val()
    let powerValue = $('#typeTable' + tableNumber).val()


    let thead = $('#table' + tableNumber + ' thead');

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
        let tr_header = $(thead_tr[1]).children()
        let tr_trials = $(thead_tr[3]).children();
        let tr_td = $(thead_tr[i]).children();

        let array_bigger = tr_header.length > tr_trials.length ? tr_header : tr_trials;
        let array_smaller = tr_header.length < tr_trials.length ? tr_header : tr_trials;
        let counter_big = array_bigger.length;
        let counter_small = array_smaller.length;

        let counter_current = tr_td.length;

        if(i === 0){
            $(tr_td[0]).attr('colspan', counter_big);
            continue;
        }
        if(i === 2){
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
        let $input;
        switch (i) {
            case 0: // gaugeBlockUsedA
            case 1: // gaugeBlockUsedB
                $input = $('<input>',{
                    'type': 'text',
                    'class': 'form-control',
                    'data-group': 'raw_data',
                    "data-required": "false",
                    'id': ids[i] + 'TABLE' + tableNumber + 'ROW' + rowNumber,
                    'style': 'min-width:100px'
                }).on('input', function(){
                    let valA = parseFloat($("#gaugeBlockUsedA" + 'TABLE' + tableNumber + 'ROW' + rowNumber).val())
                    let valB = parseFloat($("#gaugeBlockUsedB" + 'TABLE' + tableNumber + 'ROW' + rowNumber).val())
                    $("#equiv" + 'TABLE' + tableNumber + 'ROW' + rowNumber).val(valA + valB)
                })
                break;
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
    //asdasd
}

function data_standardValue(testPoint, array_data){
    if(array_data == undefined){
        alert('No standard selected');
        return;
    }
    let val;
    for(let i = 0; i < array_data.length; i++){
        let number_testPoint = Number(testPoint);
        let number_rangeMin = Number(array_data[i].rangeMin);
        let number_rangeMax = Number(array_data[i].rangeMax);
        if(number_testPoint >= number_rangeMin && number_testPoint <= number_rangeMax){
            val = array_data[i]
            break;
        }
    }
  
    if(val == undefined){
        let max_range = array_data[(array_data.length - 1)].rangeMax;
        let min_range = array_data[0].rangeMin;
        if(Number(testPoint) > Number(max_range)){
            val = array_data[(array_data.length - 1)]
        }
        if(Number(testPoint) < Number(min_range)){
            val = array_data[0]
        }
    }
    return val;
}

function getDataNextHigher(testPoint, array_data){
    if(array_data == undefined){
        alert('No standard selected');
        return;
    }
    let testPointNumber = Number(testPoint)

    let data_values
    let dataChanged = false;

    let array_testpoints = [];

    array_data.forEach(item=>{
        array_testpoints.push(Number(item.nominalLength))
        if(item.nominalLength == testPointNumber){
            data_values = item
            dataChanged = true;
        }
    })
    if(!dataChanged){
        array_testpoints.push(testPointNumber)
        array_testpoints.sort(function(a, b){
            return a - b;
        });
        let indexOfTestPoint = array_testpoints.indexOf(testPointNumber)
        let nextHigherTestPoint;
        if(indexOfTestPoint == array_testpoints.length-1){
            nextHigherTestPoint = indexOfTestPoint - 1
        }else{
            nextHigherTestPoint = indexOfTestPoint + 1
        }
        let testpointToGetData = array_testpoints[nextHigherTestPoint]

        array_data.forEach(item=>{
            array_testpoints.push(Number(item.nominalLength))
            if(item.nominalLength == testpointToGetData){
                data_values = item
            }
        })
    
    }
    return data_values;
}

function calculateValues(){
    let tableCount = $('#divForTables').children().length;
    let standardUncertainty = 0.000058; // Fallback in case of error
    let calculatedData = {};
    for (let i = 1; i <= tableCount; i++) {
        let tableID = 'table'+i;
        let tableRows = $('#'+tableID+" tbody").children().length;

        let CTEuuc = $('#CTEuucTable'+i).val();
        let CTEstd = $('#CTEstdTable'+i).val();
        let tempFluctuation = $('#tempFluctuationTable'+i).val();
        let tempRange = $('#tempRangeTable'+i).val();
        let CTEuucMax = $('#CTEuucMaxTable'+i).val();
        let CTEuucMin = $('#CTEuucMinTable'+i).val();
        let CTEuucRange = $('#CTEuucRangeTable'+i).val();

        let parallelism = $('#parallelismTable'+i).val();
        let spindle = $('#spindleTable'+i).val();
        let anvil = $('#anvilTable'+i).val();

        let type = $('#typeTable'+i).val();
        let range = $('#rangeTable'+i).val();
        let unit = $('#unitTable'+i).val();
        let graduation = $('#graduationTable'+i).val();
        let readability = $('#readabilityTable'+i).val();

        let numberOfTrials = $('#numberOfTrialsTable'+i).val();

        let repeated_reading_divisor = Math.sqrt(numberOfTrials);

        let calculated_valueBuildUpReferenceStandard = value_build_up_reference_standard(range);
        let calculated_valueDifferenceCTE = value_difference_CTE(CTEuuc, CTEstd);
        let calculated_valueSensitivityResolution = value_sensitivity_resolution(graduation)
        let calculated_sensitivityCoefficientDifferenceCTE = sensitivity_coefficient_difference_CTE(range, tempFluctuation)
        let calculated_sensitivityCoefficientCTE = sensitivity_coefficient_CTE(range, tempRange)
        let calculated_sensitivityCoefficientDifferenceTemperature = sensitivity_coefficient_difference_temperature(CTEuuc, range)

        calculatedData[tableID] = {};

        for (let ii = 1; ii <= tableRows; ii++) {
            let rowID = 'row'+ii;
            let gaugeBlockUsedA = $('#gaugeBlockUsedATABLE'+i+'ROW'+ii).val();
            let gaugeBlockUsedB = $('#gaugeBlockUsedBTABLE'+i+'ROW'+ii).val();
            let equiv = $('#equivTABLE'+i+'ROW'+ii).val();
            let trials = [];
            for (let iii = 1; iii <= numberOfTrials; iii++) {
                trials.push($('#trial'+iii+'TABLE'+i+'ROW'+ii).val());
            }
            let data_Uncertainty = data_standardValue(equiv, standardUncertaintyValues)

            let measurement_data
            let measurement_dataA
            let measurement_dataB


            if(gaugeBlockUsedB == "0"){
                measurement_data = getDataNextHigher(equiv, standardMeasurementValues)
            }else{
                measurement_dataA = getDataNextHigher(gaugeBlockUsedA, standardMeasurementValues)
                measurement_dataB = getDataNextHigher(gaugeBlockUsedB, standardMeasurementValues)    
            }

            standardUncertainty = Number(data_Uncertainty.uncertainty / 1000)

            let stdDev = formula_standardDeviation(trials);
            let calculated_average = average(trials);

            let overall
            if(gaugeBlockUsedB == "0"){
                overall = Math.sqrt(Math.pow(Number(measurement_data.centLngError),2) + Math.pow(Number(measurement_data.maxLngError),2) + Math.pow(Number(measurement_data.minLngError),2) + Math.pow(Number(measurement_data.parallel),2))
            }else{
                overallA = Math.sqrt(Math.pow(Number(measurement_dataA.centLngError),2) + Math.pow(Number(measurement_dataA.maxLngError),2) + Math.pow(Number(measurement_dataA.minLngError),2) + Math.pow(Number(measurement_dataA.parallel),2));
                overallB = Math.sqrt(Math.pow(Number(measurement_dataB.centLngError),2) + Math.pow(Number(measurement_dataB.maxLngError),2) + Math.pow(Number(measurement_dataB.minLngError),2) + Math.pow(Number(measurement_dataB.parallel),2));
                overall = overallA + overallB;
            }

            let value_parallelism_uncertainty = 0;
            let value_flatness_uncertainty = 0;

            if(type === "Micrometer"){
                let float_parallelism = parseFloat(parallelism)
                let float_spindle = parseFloat(spindle)
                let float_anvil = parseFloat(anvil)

                let parallelism_measuring_faces = float_parallelism * 0.575 /* 0.575 is CONSTANT */
                if(unit === 'mm'){
                    parallelism_measuring_faces = parallelism_measuring_faces / 1000; /* Convert to mm */
                }
                
                let processed_spindle = float_spindle * 0.00032 /* 0.00032 is CONSTANT */
                let processed_anvil = float_anvil * 0.00032 /* 0.00032 is CONSTANT */

                let flatness_measuring_faces = processed_spindle >= processed_anvil ? processed_spindle : processed_anvil;

                value_flatness_uncertainty = value_flatness(flatness_measuring_faces);
                value_parallelism_uncertainty = value_parallel(parallelism_measuring_faces)
            }
            
            let nomLnt = nominal_length(equiv, overall);
            let calculated_uuc_err = uuc_err(calculated_average, nomLnt)
            
            let unc_parallelism = Math.pow(value_parallelism_uncertainty, 2)
            let unc_flatness = Math.pow(value_flatness_uncertainty, 2)
            let unc_standard = UiCi(standardUncertainty, divisor_2, sensitivity_coefficient_1);
            let unc_buildUpReferenceStandard = UiCi(calculated_valueBuildUpReferenceStandard, divisor_sqrt12, sensitivity_coefficient_1);
            let unc_differenceCTE = UiCi(calculated_valueDifferenceCTE, divisor_sqrt12, calculated_sensitivityCoefficientDifferenceCTE);
            let unc_CTE = UiCi(CTEuucRange, divisor_sqrt12, calculated_sensitivityCoefficientCTE);
            let unc_diffTemp = UiCi(tempRange, divisor_sqrt12, calculated_sensitivityCoefficientDifferenceTemperature);
            let unc_tempCalItem = UiCi(tempFluctuation, divisor_sqrt12, CTEuucRange);
            let unc_sensitivityResolution = UiCi(calculated_valueSensitivityResolution, divisor_sqrt12, sensitivity_coefficient_1);
            let unc_repeatedReading = UiCi(stdDev, repeated_reading_divisor, sensitivity_coefficient_1);

            let calculated_combinedUncertainty = 0
            if(type === "Micrometer"){
                calculated_combinedUncertainty = micrometer_combinedUncertainty(unc_standard, unc_buildUpReferenceStandard, unc_differenceCTE, unc_CTE, unc_diffTemp, unc_tempCalItem, unc_sensitivityResolution, unc_repeatedReading, unc_parallelism, unc_flatness)
            }else{
                calculated_combinedUncertainty = combinedUncertainty(unc_standard, unc_buildUpReferenceStandard, unc_differenceCTE, unc_CTE, unc_diffTemp, unc_tempCalItem, unc_sensitivityResolution, unc_repeatedReading)
            }
            
            let calculated_expandedUncertainty = expandedUncertainty(calculated_combinedUncertainty, k2);

            calculatedData[tableID][rowID] = {
                "unit": unit,
                "equiv": equiv,
                "overall": overall,
                "nomLnt": nomLnt,
                "uuc_err": calculated_uuc_err,
                "average": calculated_average,
                "CTEuuc" : CTEuuc,
                "CTEstd" : CTEstd,
                "tempFluctuation" : tempFluctuation,
                "tempRange" : tempRange,
                "CTEuucRange" : CTEuucRange,
                "range" : range,
                "graduation" : graduation,
                "numberOfTrials" : numberOfTrials,
                "calculated_valueBuildUpReferenceStandard" : calculated_valueBuildUpReferenceStandard,
                "calculated_valueDifferenceCTE" : calculated_valueDifferenceCTE,
                "calculated_valueSensitivityResolution" : calculated_valueSensitivityResolution,
                "calculated_sensitivityCoefficientDifferenceCTE" : calculated_sensitivityCoefficientDifferenceCTE,
                "calculated_sensitivityCoefficientCTE" : calculated_sensitivityCoefficientCTE,
                "calculated_sensitivityCoefficientDifferenceTemperature" : calculated_sensitivityCoefficientDifferenceTemperature,
                "stdDev" : stdDev,
                "unc_standard" : unc_standard,
                "unc_buildUpReferenceStandard" : unc_buildUpReferenceStandard,
                "unc_differenceCTE" : unc_differenceCTE,
                "unc_CTE" : unc_CTE,
                "unc_diffTemp" : unc_diffTemp,
                "unc_tempCalItem" : unc_tempCalItem,
                "unc_sensitivityResolution" : unc_sensitivityResolution,
                "unc_repeatedReading" : unc_repeatedReading,
                "unc_parallelism" : unc_parallelism,
                "unc_flatness" : unc_flatness,
                "calculated_combinedUncertainty" : calculated_combinedUncertainty,
                "k" : k2,
                "calculated_expandedUncertainty" : calculated_expandedUncertainty,
            }
        }
    }
    $('#calculatedData').val(JSON.stringify(calculatedData))
    addToUncertaintyBudgetTable()
}

function addToUncertaintyBudgetTable(){    
    let datas = JSON.parse($('#calculatedData').val());
    let modatTableTbody = $('#uncertBudgetTBody');
    $('#uncertBudgetTBody').html('')
    Object.keys(datas).forEach(keys=>{
        Object.keys(datas[keys]).forEach(rows=>{
            let tr = $('<tr>')
            let tdEquiv = $('<td>').html(parseFloat(datas[keys][rows]['equiv']).toPrecision(2))
            let tdUnit = $('<td>').html(datas[keys][rows]['unit'])
            let tdUnc_standard = $('<td>').html(parseFloat(datas[keys][rows]['unc_standard']).toPrecision(2))
            let tdUnc_buildUpReferenceStandard = $('<td>').html(parseFloat(datas[keys][rows]['unc_buildUpReferenceStandard']).toPrecision(2))
            let tdUnc_differenceCTE = $('<td>').html(parseFloat(datas[keys][rows]['unc_differenceCTE']).toPrecision(2))
            let tdUnc_CTE = $('<td>').html(parseFloat(datas[keys][rows]['unc_CTE']).toPrecision(2))
            let tdUnc_diffTemp = $('<td>').html(parseFloat(datas[keys][rows]['unc_diffTemp']).toPrecision(2))
            let tdUnc_tempCalItem = $('<td>').html(parseFloat(datas[keys][rows]['unc_tempCalItem']).toPrecision(2))
            let tdUnc_sensitivityResolution = $('<td>').html(parseFloat(datas[keys][rows]['unc_sensitivityResolution']).toPrecision(2))
            let tdUnc_repeatedReading = $('<td>').html(parseFloat(datas[keys][rows]['unc_repeatedReading']).toPrecision(2))
            let tdCalculated_combinedUncertainty = $('<td>').html(parseFloat(datas[keys][rows]['calculated_combinedUncertainty']).toPrecision(2))
            let tdK = $('<td>').html(parseFloat(datas[keys][rows]['k']).toPrecision(2))
            let tdCalculated_expandedUncertainty = $('<td>').html(parseFloat(datas[keys][rows]['calculated_expandedUncertainty']).toPrecision(2))
            tr.append(
                tdEquiv,
                tdUnit,
                tdUnc_standard,
                tdUnc_buildUpReferenceStandard,
                tdUnc_differenceCTE,
                tdUnc_CTE,
                tdUnc_diffTemp,
                tdUnc_tempCalItem,
                tdUnc_sensitivityResolution,
                tdUnc_repeatedReading,
                tdCalculated_combinedUncertainty,
                tdK,
                tdCalculated_expandedUncertainty,
            )
            modatTableTbody.append(tr);
        })
    })
}

//#region Database Interaction

function saveData(){
    let certificateNumber = $('#certificateNumber').val();
    let selectedStandard = $('#selectedStandard').val();
    let calculatedData = $('#calculatedData').val();

    let completion = $('#completion').val();
    let calibratorAccountEmail = $('#calibratorAccountEmail').val();
    let calibratorAccountID = $('#calibratorAccountID').val();
    let verifierEmail = $('#verifierEmail').val();
    let calibratedBy = $('#calibratedBy').val();
    let checkedBy = $('#checkedBy').val();
    let verifierPosition = $('#verifierPosition').val();    

    let customer_information = $('input[data-group="customer_information"], select[data-group="customer_information"], textarea[data-group="customer_information"]');
    let equipment_information = $('input[data-group="equipment_information"], select[data-group="equipment_information"], textarea[data-group="equipment_information"]');
    let environmental_information = $('input[data-group="environmental_information"], select[data-group="environmental_information"], textarea[data-group="environmental_information"]');
    let raw_data = $('input[data-group="raw_data"], select[data-group="raw_data"], textarea[data-group="raw_data"]');

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
        url: "/caliper/add_New_Worksheet_Data",
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
    })
    .done(function(result){
        $('#idOfCertificate').val(JSON.parse(result).id);
        window.location.href = "/caliper/worksheet/"+JSON.parse(result).id;
    })
    .fail(function(error){
        console.log(error);
        alert("Unable to save to database")
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

    let customer_information = $('input[data-group="customer_information"], select[data-group="customer_information"], textarea[data-group="customer_information"]');
    let equipment_information = $('input[data-group="equipment_information"], select[data-group="equipment_information"], textarea[data-group="equipment_information"]');
    let environmental_information = $('input[data-group="environmental_information"], select[data-group="environmental_information"], textarea[data-group="environmental_information"]');
    let raw_data = $('input[data-group="raw_data"], select[data-group="raw_data"], textarea[data-group="raw_data"]');

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
        url: "/caliper/update_Worksheet_Data",
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
            url: "/caliper/get_data_by_id",
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
                    getStandardDetails()
                }

                let calculatedDataRAW = result.worksheetData['calculatedData'];
                let calculatedData = calculatedDataRAW != "" ? JSON.parse(calculatedDataRAW) : {};
                $('#calculatedData').val(JSON.stringify(calculatedData));
                
                let dataInputs = JSON.parse(result.worksheetData['dataInputs'])
                let count = 0;              

                for (let key in dataInputs) {
                    if (key.startsWith('typeTable')) {
                        count++;
                    }
                }

                for (let index = 1; index <= count; index++) {
                    $('#addTable').trigger('click')
                    let rowCount = 0;
                    for (let key in dataInputs) {
                        if (key.startsWith('gaugeBlockUsedATABLE'+index)) {
                            rowCount++;
                        }
                    }

                    $('#typeTable'+index).val(dataInputs['typeTable'+index]);
                    $('#numberOfTrialsTable'+index).val(dataInputs['numberOfTrialsTable'+index]);
            
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
        $('#worksheetPDF').attr('disabled', '');
        $('#certificatePDF').attr('disabled', '');
        $('#certificatePDFDraft').attr('disabled', '');
        $('#certificatePDFDownload').attr('disabled', '');
        $('#editRemarks').attr('disabled', '');
        $('#submitButton').attr('disabled', '');   
    }
});