    var selectedStandard = '';
    $(document).ready(function() {
        addCustomerList();
        binds();
        getStandardData();
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
        let array_unit = ["µA", "mA", "A", "kA", "MA", "µV", "mV", "V", "kV", "MV", "µΩ", "mΩ", "Ω", "kΩ", "MΩ", "GΩ" ,"°C"];
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
    /**get array of Documenting process calibrator */
    let standardData = [];
    function getStandardData(){
        $.ajax({
            cache: false,
            async: false,
            type: "post",
            url: "/standard/documentingProcessCalibrator/getStandardDataDocumentingProcessCalibrator",
            success: function(result) {
                standardData = result.standardData;
                addStandardToTableDocumentingProcessCalibrator();
                $('#modalStandardTable').DataTable(); 
            },
            error: function (error) {
                console.log(error);
            },
        });
    }
    function addStandardToTableDocumentingProcessCalibrator(){
        let tableBody = $('#standardTableTbody'); 
        tableBody.empty(); 
        let today = new Date();
        standardData.forEach(item => {
            let dateOfCalibration = new Date(item.dateOfCalibration);
            let dueDate = new Date(dateOfCalibration.setFullYear(dateOfCalibration.getFullYear() + 1));
            let oneMonthBeforeDue = new Date(dueDate);
            oneMonthBeforeDue.setMonth(oneMonthBeforeDue.getMonth() - 1);
    
            let bgColor = 'background-color:rgba(0,128,0,0.5)'; // Default color
            let disabled = false;
    
            if (today >= oneMonthBeforeDue && today < dueDate) {
                bgColor = 'background-color:rgba(255,165,0,0.5)'; // Warning color
            } else if (today >= dueDate) {
                bgColor = 'background-color:rgba(255,0,0,0.5)'; // Overdue color
                disabled = false;
            }
    
            let row = $('<tr>').attr('style', bgColor);
            // let row = $('<tr>');
            let checkBoxTD = $('<td>');
            let standardTD = $('<td>');
            let certificateNumberTD = $('<td>');
            let descriptionTD = $('<td>');
            let providerTD = $('<td>');
            let checkbox = $('<input>').attr({
                'type':'checkbox',
                'id':item['certificateNumber'],
                'data-group':'standardCheckBox',
                'value':item['certificateNumber'], 
            })

            let serialNumber = $('<label>').text(item['serialNumber']).attr('for', item['certificateNumber'])
            let certificateNumber = $('<label>').text(item['certificateNumber']).attr('for', item['certificateNumber'])
            let description = $('<label>').text(item['description']).attr('for', item['certificateNumber'])
            let provider = $('<label>').text(item['calibrationProvider']).attr('for', item['certificateNumber'])

            checkBoxTD.append(checkbox);
            standardTD.append(serialNumber);
            certificateNumberTD.append(certificateNumber);
            descriptionTD.append(description);
            providerTD.append(provider);

            row.append(
                checkBoxTD,
                standardTD,
                certificateNumberTD,
                descriptionTD,
                providerTD,
            )
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
    function selectStandardFromData(standardData){
        let selectedStandardArray = standardData.split('(SPLIT)');
        $('input[data-collection="standardCheckBox"]').each(function() {
        if(selectedStandardArray.includes($(this).val()))
            $(this).trigger('click')
        });
    }   
    var selectedStandardData = [];
    function getSelectedStandardValues() {
        let selectedStandard = $('#selectedStandard').val();
        let array_selectedStandard = selectedStandard ? selectedStandard.split('(SPLIT)') : [];
        for (let i = 0; i < standardData.length; i++) {
            let obj = standardData[i];
            if (array_selectedStandard.includes(obj.certificateNumber)) {
                selectedStandardData[obj.certificateNumber] = obj;
            }
        }
        getID(selectedStandardData);
    }
    /**get array of Documenting process calibrator details */
    let standardValues = [];
    function getStandardValues(getIDValue) {
        let standardID = getIDValue; 
        $.ajax({
            cache: false,
            async: false,
            type: "post",
            url: "/standard/documentingProcessCalibrator/getStandardValuesDocumentingProcessCalibratorByDetailsID",
            data: {
                'selectedStandardID': standardID,
            },
            success: function(result) {
                standardValues = result.standardValues;
            },
            error: function (error) {
                console.log(error)
            },
        });
    }
    function getID() {
        let getIDValue = []; 
        let array_selectedStandard = Object.keys(selectedStandardData); 
        for (let i = 0; i < array_selectedStandard.length; i++) {
            let key = array_selectedStandard[i];
            let obj = selectedStandardData[key];
            if (obj.id) {
                getIDValue.push(obj.id); 
            }
        }
        getStandardValues(getIDValue);
    }
    function newRawDataTable(tableNumber) {
        let rowNumber = 1;
        let tableDivs = $('#divForTables');
        let $table = $('<table>', {
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
        let tdDivSelectOption = (id, placeholder, array_Options, array_Values) => {
            let td = $('<td>');
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
            let td = $('<td>');
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
            let td = $('<td>').attr('colspan', '4');
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
            let td = $('<td>').attr('style', 'vertical-align:middle');
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
        let array_optionPower = ['AC', 'DC'];
        let array_function = ['Voltage', 'Current', 'Resistance'];
        let array_functionType = ['source','measure'   ];
        let array_sensorType = [ 'Thermocouple Type K', 'Thermocouple Type T','Thermocouple Type J',  'RTD Pt100', 'DC Voltage', 'DC Current'   ];
        let array_unit = ["°C","µA","mA","A","kA","MA","µV","mV","V","kV","MV","µΩ","mΩ","Ω","kΩ","MΩ","GΩ"];
        let selectPower = tdDivSelectOption('power', 'Type', array_optionPower, array_optionPower);
        let selectFunction = tdDivSelectOption('function', 'Function', array_function, array_function);
        let selectFunctionType = tdDivSelectOption('functionType', 'Std Function', array_functionType, array_functionType);
        let selectSensorType = tdDivSelectOption('sensorType', 'SensorType', array_sensorType, array_sensorType);
        let selectRangeUnit = tdDivSelectOption('unit', 'Unit', array_unit, array_unit);
        let inputResolution = tdDivInput('resolution', ' UUC Res/Grad');
        let inputReadability = tdDivInput('readability', 'UUC Readability');
        let inputTrialNumber = tdDivInput('numberOfTrials', 'Number Of Trials');
        let uucFunction = tdDivInput('uucFunction', 'UUC Function Info');
        let uucChannel = tdDivInput('uucChannel', 'UUC Channel');
        let buttons = buttonGroup('addRow', 'removeRow');
        let theadTR1 = $('<tr>');
        let theadTR2 = $('<tr>');
        let innerTable = $('<table>').append(
            theadTR1.append(
                selectPower,
                selectFunction,
                inputTrialNumber,
                selectRangeUnit,
                selectFunctionType,
            ),
            theadTR2.append(
                selectSensorType,
                uucFunction,
                uucChannel,
                inputResolution,
                inputReadability,
            )
        );
        let theadTRParent = $('<tr>').append(
            $('<td>').attr('colspan', '8').append(innerTable)
        );
        thead.append(
            theadTRParent,
            $('<tr>').append(
                $('<td>').attr('colspan', '8').append(buttons)
            )
        );
        $table.append(thead,tbody)

        /**accordion for table */
        let $accordionCard = $('<div>', {
            'class': 'card',
            'id': 'accordion' + tableNumber
        });    
        let $cardHeader = $('<div>', {
            'class': 'card-header d-flex justify-content-between align-items-center',
            'id': 'heading' + tableNumber,
            'click': function() {
                $('#collapse' + tableNumber).collapse('toggle');
            },
        

        });
        let $cardBody = $('<div>', {
            'class': 'card-body'
        });
        let $collapse = $('<div>', {
            'class': 'collapse',
            'id': 'collapse' + tableNumber,
            'aria-labelledby': 'heading' + tableNumber,
            'data-bs-parent': '#accordion' + tableNumber,
        
        });
        let $tableLabel = $('<span>', {
            'class': 'btn',
            'html': 'Table ' + tableNumber,
        });
        $cardHeader.append($tableLabel);
        $cardBody.append($table);
        $collapse.append($cardBody);
        $accordionCard.append($cardHeader, $collapse);
        tableDivs.append($accordionCard);

    }
    function removeTable(){
        $('#divForTables').children(':last-child').remove();
    }
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
        let currentCoilChecker = $('#coilSwitchTable1').is(':checked')
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
            let $input;
            // switch (i) {
            //     case 0:
            //         if (powerValue == 'AC'){
            //             let div =  $('<div>', {
            //                 'class': 'input-group',
            //             })
            //             let divHerts = $('<div>', {
            //                 class: 'input-group form-control p-1'
            //             })
            //             let hertz = $('<input>', {
            //                 'type': 'text',
            //                 'class': 'form-control',
            //                 'data-group': 'raw_data',
            //                 "data-required": "false",
            //                 'id': 'testPointHertz' + 'TABLE' + tableNumber + 'ROW' + rowNumber
            //             })
            //             let hertzUnit = $('<input>', {
            //                 'type': 'text',
            //                 'class': 'form-control',
            //                 'data-group': 'raw_data',
            //                 "data-required": "false",
            //                 'id': 'testPointHertzUnit' + 'TABLE' + tableNumber + 'ROW' + rowNumber,
            //                 'list': 'hertz'
            //             })
            //             divHerts.append(hertz, hertzUnit)


            //             $input = div.append($('<input>',{
            //                 'type': 'text',
            //                 'class': 'form-control',
            //                 'data-group': 'raw_data',
            //                 "data-required": "false",
            //                 'id': ids[i] + 'TABLE' + tableNumber + 'ROW' + rowNumber
            //             }).add(
            //                 divHerts
            //             ))
            //             break;
            //         }
            //     default:
                    $input = $('<input>',{
                        'type': 'text',
                        'class': 'form-control',
                        'data-group': 'raw_data',
                        "data-required": "false",
                        'id': ids[i] + 'TABLE' + tableNumber + 'ROW' + rowNumber,
                        'style': 'min-width:100px'
                    })
            // }
            $td.append($input);
            $tr.append($td);
        }
        return $tr;
    }

    function getAverageOfEnvironment(start, end, average){
        let startVal = parseFloat(document.getElementById(start).value);
        let endVal = parseFloat(document.getElementById(end).value);
        document.getElementById(average).value = (startVal+endVal)/2;
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
    function filterObjects(
        // type, 
        // tableFunction,
        tableFunctionType,
        tableSensorType
        ) {
        let standard_data = standardValues;
        // let filtered_type = findObjectByData(standard_data, 'type', type);
        // let filtered_function = findObjectByData(filtered_type, 'function', tableFunction);
        let filtered_functionType = findObjectByData(standard_data, 'functionType', tableFunctionType);
        let filtered_sensorType = findObjectByData(filtered_functionType, 'sensorType', tableSensorType);
        return filtered_sensorType;
    }
    function convertTestpoint(value, unit) {
        let float_value = Number(value);
        /**Check if the unit is degrees Celsius (°C) */
        if (unit === "°C") {
            return float_value; // No conversion needed for degrees Celsius
        }
        const units = {
            'V': 'volts',
            'A': 'amps',
            'Ω': 'ohms',
        };
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
        };
        let unitNoPrefix = unit.split('').length == 1 ? unit.split('')[0] : unit.split('')[1];
        let unitWord = units[unitNoPrefix];
        let result = float_value * convertion[unitWord][unit] / convertion[unitWord]['m'+unitNoPrefix];
        return result;
    }
    /**standard data */
    function data_standardValue(testPoint, unit, array_data) {
        let val = 0;
        let highestValue = 0;
        for (let i = 0; i < array_data.length; i++) {
            let dataUnit = array_data[i];
            let standardUnit = dataUnit.settingValueUnit;
            let dataUnitNext = array_data[i + 1];
            let standardUnitNext = dataUnitNext ? dataUnitNext.settingValueUnit : standardUnit;

            let number_settingValue = parseFloat(dataUnit.settingValue);
            let number_settingValueNext = dataUnitNext ? parseFloat(dataUnitNext.settingValue) : number_settingValue;

            let testpoint_m = convertTestpoint(testPoint, unit);
            let rangeMin_m = convertTestpoint(number_settingValue, standardUnit);
            let rangeMax_m = convertTestpoint(number_settingValueNext, standardUnitNext);

            /**Update the highest value seen so far */
            if (testpoint_m > rangeMin_m) {
                highestValue = dataUnit.id;
            }
            if (testpoint_m <= rangeMin_m) {
                val = dataUnit.id;
                break;
            }
        }
        /**If no suitable range was found, return the highest value */
        if (val === 0) {
            val = highestValue;
        }
        return Number(val);
    }
    function findStandardValues(standardValue, standardValue_filtered) {
        let targetStandardValue = null;
        let targetnexthigherStandardValue = null;
        for (let i = 0; i < standardValue_filtered.length; i++) {
            let current = standardValue_filtered[i];
            /**Find the target standard value */
            if (current.id == standardValue) {
                targetStandardValue = current;
            } 
            /**Find the next higher standard value */
            else if (current.id > standardValue) {
                if (!targetnexthigherStandardValue || current.id < targetnexthigherStandardValue.id) {
                    targetnexthigherStandardValue = current;
                }
            }
            /**Exit early if both target values are found */
            if (targetStandardValue && targetnexthigherStandardValue) {
                break;
            }
        }
        /**If no next higher value is found, use the current value as the next higher value */
        if (!targetnexthigherStandardValue && targetStandardValue) {
            targetnexthigherStandardValue = targetStandardValue;
        }
        return {
            targetStandardValue,
            targetnexthigherStandardValue
        };
    }
    /**Influence factor standard data */
    function data_standardInfluenceFactorValue(testPoint, unit,  array_data) {
        let val = 0;
        let lowestValue = 0;
        let highestValue = 0;
        for (let i = 0; i < array_data.length; i++) {
            let dataUnit = array_data[i];
            let standardUnit = dataUnit.settingValueUnit;
            let dataUnitNext = array_data[i + 1];
            let standardUnitNext = dataUnitNext ? dataUnitNext.settingValueUnit : standardUnit;

            let number_settingValue = parseFloat(dataUnit.settingValue);
            let number_settingValueNext = dataUnitNext ? parseFloat(dataUnitNext.settingValue) : number_settingValue;

            let testpoint_m = convertTestpoint(testPoint, unit);
            let rangeMin_m = convertTestpoint(number_settingValue, standardUnit);
            let rangeMax_m = convertTestpoint(number_settingValueNext, standardUnitNext);

            /**Update the highest value seen so far */

            if (testpoint_m <= rangeMin_m) {
                lowestValue = dataUnit.id;
            }

            if (testpoint_m >= rangeMax_m) {
                highestValue = dataUnit.id;
            }
            if (testpoint_m <= rangeMin_m) {
                val = dataUnit.id;
                break;
            }
        }
        if (val === 0) {
            val = lowestValue;
        }
        /**If no suitable range was found, return the highest value */
        if (val === 0) {
            val = highestValue;
        }
        return Number(val);
    }
    function findInfluenceFactorStandardValues(standardInfluenceFactorValue, standardValue_filtered) {
        let targetInfluenceFactorStandardValue = null;
        let targetInfluenceFactorStandardValueNext = null;
        for (let i = 0; i < standardValue_filtered.length; i++) {
            let current = standardValue_filtered[i];
            /**Find the target standard value */
            if (current.id == standardInfluenceFactorValue) {
                targetInfluenceFactorStandardValue = current;
            } 
            /**Find the next higher standard value */
            else if (current.id > standardInfluenceFactorValue) {
                if (!targetInfluenceFactorStandardValueNext || current.id < targetInfluenceFactorStandardValueNext.id) {
                    targetInfluenceFactorStandardValueNext = current;
                }
            }
            /**Exit early if both target values are found */
            if (targetInfluenceFactorStandardValue && targetInfluenceFactorStandardValueNext) {
                break;
            }
        }
        /**If no next higher value is found, use the current value as the next higher value */
        if (!targetInfluenceFactorStandardValueNext && targetInfluenceFactorStandardValue) {
            targetInfluenceFactorStandardValueNext = targetInfluenceFactorStandardValue;
        }
        return {
            targetInfluenceFactorStandardValue,
            targetInfluenceFactorStandardValueNext
        };
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
            let td2 = $('<td>').html(parseFloat(CalData[tableName][rowName]['uncertaintyUUCRepeatability']).toFixed(6))
            let td3 = $('<td>').html(parseFloat(CalData[tableName][rowName]['uncertaintyUUCResolution']).toFixed(6))
            let td4 = $('<td>').html(parseFloat(CalData[tableName][rowName]['uncertaintyReferenceStandard']).toFixed(6))
            let td5 = $('<td>').html(parseFloat(CalData[tableName][rowName]['uncertaintyResolutionStandard']).toFixed(6))
            let td6 = $('<td>').html(parseFloat(CalData[tableName][rowName]['uncertaintyInfluenceFactor']).toFixed(6))
            let td7 = $('<td>').html(parseFloat(CalData[tableName][rowName]['uncertaintyDrifStandard']).toFixed(6))
            let td8 = $('<td>').html(parseFloat(CalData[tableName][rowName]['combinedUncertainty']).toFixed(6))
            let td9 = $('<td>').html(parseFloat(CalData[tableName][rowName]['vEff']).toFixed(6))
            let td10 = $('<td>').html(parseFloat(CalData[tableName][rowName]['k']).toFixed(6))
            let td11 = $('<td>').html(parseFloat(CalData[tableName][rowName]['expandedUncertainty']).toFixed(6))
            $(uncBudgetTbody).append(
            $(tr).append(td1,td2,td3,td4,td5,td6,td7,td8,td9,td10,td11)
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
            url: "/temperaturecontroll/add_New_Worksheet_Data",
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
                window.location.href = "/temperaturecontroll/worksheet/"+JSON.parse(result).id;

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
            url: "/temperaturecontroll/update_Worksheet_Data",
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

                var toastElement = document.getElementById('toastSaved');
                var toast = new bootstrap.Toast(toastElement);
                toast.show();
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
        getSelectedStandardValues(selectedStandard);
        getValuesOfSelectedStandardUsingSerialNumber
    }
    function getValuesOfSelectedStandardUsingSerialNumber(){
        let standardIDs = selectedStandard.split("(SPLITHERE)");
        let array_Values = [];
        addDocumentingStandardDetails(standardIDs)
    }
    /**initialize loading */
    $( window ).on( "load", function() {
        if ($('#idOfCertificate').val() != ''){
            let idOfCertificate = $('#idOfCertificate').val();
            $.ajax({
                cache: false,
                type: "post",
                url: "/temperaturecontroll/get_data_by_id",
                data: {
                    'idOfCertificate' : idOfCertificate,
                },
                success: function(result) {
                    // userCheck(result.userData.id, result.worksheetData.calibratorAccountID, result.userData.email, result.worksheetData.calibratorAccountEmail, result.worksheetData.completion)
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
                admin_tools()
                
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
    /**calculation of uncertainty budget */
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
                /**test points */
                let array_trials = [];
                $('input[id^="trial"][id$="'+tableIdRowNumber+'"]').each(function() {
                    calculatedData[tableName][rowNumber][$(this).attr('id')] = $(this).val();
                    array_trials.push($(this).val())
                })
                /** standard value  */
                let range_value = $('#range');
                let range =  range_value.val();
                /**check if analog or digital */
                let equipmentTypeValue = $('#type');
                let equipmentType =  equipmentTypeValue.val();
                /** UUC value  */
                let testpointValue = $('#testPoint'+'TABLE'+i+'ROW'+x);
                let testpoint = testpointValue.val();
                let uucResolutionValue = $('#resolutionTable'+i);
                let uucResolution = uucResolutionValue.val();
                let uucReadabilityValue = $('#readabilityTable'+i);
                let uucReadability = uucReadabilityValue.val();
                /**standard filtering */
                let unitValue = $('#unitTable'+i);
                let unit_value = unitValue.val();
                let functionType_value = $('#functionTypeTable'+i);
                let functionTypeValue = functionType_value.val();
                let sensorType_value = $('#sensorTypeTable'+i);
                let sensorTypeValue = sensorType_value.val();
                /**data filtering */
                let standardValue_filtered =  filterObjects(
                    functionTypeValue,
                    sensorTypeValue,
                    );
                let standardValue = data_standardValue(
                    testpoint,
                    unit_value, 
                    standardValue_filtered
                    );
                let result = findStandardValues(
                    standardValue,
                    standardValue_filtered
                    );
                /**standard influence factor */
                let standardInfluenceFactorValue = data_standardInfluenceFactorValue(
                    testpoint,
                    unit_value, 
                    standardValue_filtered
                    );
                let resultInfluenceFactor = findInfluenceFactorStandardValues(
                    standardInfluenceFactorValue,
                    standardValue_filtered
                    );
                /** influence factor The object with ID equal to standardValue */   
                let stdInfluenceFactorValue = resultInfluenceFactor.targetInfluenceFactorStandardValue; 
                let stdInfluenceFactorValueNext = resultInfluenceFactor.targetInfluenceFactorStandardValueNext; 
                let influenceFactorStandard = stdInfluenceFactorValue.influenceFactorValue; 
                let percentageInfluenceFactorStandard = stdInfluenceFactorValue.percentageValue;  

                /**  standard instrument value The object with ID equal to standardValue */        
                let  standardInstrumentValue = result.targetStandardValue; 
                let  standardInstrumentValueNext = result.targetnexthigherStandardValue; 

                /** standard value */   
                let sensorType = standardInstrumentValue.sensorType;   
                let uncertainty = standardInstrumentValue.uncertainty;
                let coverageFactor = standardInstrumentValue.coverageFactorValue;
                let stdResolution = standardInstrumentValue.standardResolution; 
                let stdReadability = standardInstrumentValue.standardReadability; 
                let driftofStandardValue = standardInstrumentValue.drift; 

                /** first value */  
                let settingValueMin = standardInstrumentValue.settingValue;
                let standardIndicatedMin = standardInstrumentValue.indicatedValue;
                /**next value higher */
                let settingValueMax = standardInstrumentValueNext.settingValue;
                let standardIndicatedMax = standardInstrumentValueNext.indicatedValue;
                /**coputation of values */   
                let computed_correction = diferrence(
                    standardIndicatedMin,
                    settingValueMin,
                    );
                let computed_correctionNext = diferrence(  
                    standardIndicatedMax,
                    settingValueMax,
                    );
                let computed_interpolateCorrection = interppolateCorrection(
                    testpoint,
                    settingValueMin,
                    computed_correction,
                    settingValueMax,
                    computed_correctionNext,
                    );
                /** no dependent used for for formula documentation only */    
                let computed_correctedValue = correctedValue(
                        testpoint,
                        computed_interpolateCorrection,
                    );
                let computed_average = average(array_trials);
                let computed_mean = mean(
                    computed_average,
                    computed_interpolateCorrection
                    );
                let computed_deviation = deviation(
                    computed_mean, 
                    testpoint
                    );
                let computed_standardDeviation = standardDeviation(array_trials)
                let computed_uucRepeatability = uucRepeatability(computed_standardDeviation)
                let computed_uncertaintyUUCRepeatability = uncertaintyUUCRepeatability(
                    computed_uucRepeatability,
                    );
                let computed_uncertaintyUUCResolution;
                    /**analog */
                    if (equipmentType == 1) { 
                            computed_uncertaintyUUCResolution = uncertaintyUUCResolutionAnalog(
                                /**graduation term for analog */
                                uucResolution, 
                                uucReadability,
                            );
                    }
                    /** digital */
                    else if (equipmentType == 2) { 
                            computed_uncertaintyUUCResolution = uncertaintyUUCResolutionDigital(
                                uucResolution,
                                divisor_sqrt3,
                            );
                    }
                let computed_uncertaintyReferenceStandard = uncertaintyReferenceStandard(
                    uncertainty,
                    coverageFactor, 
                    );
                let computed_uncertaintyResolutionStandard = uncertaintyResolutionStandard(
                        stdResolution,
                        stdReadability,
                    );
                let computed_multipliedInfluenceFactorAndPercentage = multipliedInfluenceFactorAndPercentage(
                    sensorType,
                    testpoint,
                    influenceFactorStandard,
                    percentageInfluenceFactorStandard

                    );

                let computed_uncertaintyInfluenceFactor = uncertaintyInfluenceFactor(            
                    computed_multipliedInfluenceFactorAndPercentage          
                    );
                let computed_uncertaintyDriftStandard= uncertaintyDriftStandard(  
                            driftofStandardValue,        
                    );    
                let computed_combinedUncertainty = combinedUncertainty(
                    computed_uncertaintyUUCRepeatability, 
                    computed_uncertaintyUUCResolution, 
                    computed_uncertaintyReferenceStandard, 
                    computed_uncertaintyInfluenceFactor,
                    computed_uncertaintyResolutionStandard,
                    computed_uncertaintyDriftStandard,
                    ); 
                let computed_Veff = Veff(
                        computed_combinedUncertainty,
                        computed_uncertaintyUUCRepeatability, 
                        computed_uncertaintyUUCResolution, 
                        computed_uncertaintyReferenceStandard, 
                        computed_uncertaintyInfluenceFactor,
                        computed_uncertaintyResolutionStandard,
                        computed_uncertaintyDriftStandard,
                    ); 
                let computed_k = coverageFactor_k(
                    computed_Veff
                    );         
                let computed_expandedUncertainty = expandedUncertainty(
                    computed_combinedUncertainty, 
                    computed_k
                    );    
            /**data to uncertainty budget */   
                calculatedData[tableName][rowNumber]['driftOfStd'] = driftofStandardValue; 
                calculatedData[tableName][rowNumber]['standardResolution'] = stdResolution;
                calculatedData[tableName][rowNumber]['testpoint'] = testpoint;
                calculatedData[tableName][rowNumber]['average'] = computed_average;
                calculatedData[tableName][rowNumber]['mean'] = computed_mean;
                calculatedData[tableName][rowNumber]['correctionFromCertificate'] = computed_interpolateCorrection;
                calculatedData[tableName][rowNumber]['correctedValue'] = computed_correctedValue;
            
                calculatedData[tableName][rowNumber]['deviation'] = computed_deviation;
                calculatedData[tableName][rowNumber]['standardDeviation'] = computed_standardDeviation;
                calculatedData[tableName][rowNumber]['uucRepeatability'] = computed_uucRepeatability;

                calculatedData[tableName][rowNumber]['uncertaintyUUCRepeatability'] = computed_uncertaintyUUCRepeatability;
                calculatedData[tableName][rowNumber]['uncertaintyUUCResolution'] = computed_uncertaintyUUCResolution;
                calculatedData[tableName][rowNumber]['uncertaintyReferenceStandard'] = computed_uncertaintyReferenceStandard;
                calculatedData[tableName][rowNumber]['uncertaintyResolutionStandard'] = computed_uncertaintyResolutionStandard;

                calculatedData[tableName][rowNumber]['uncertaintyInfluenceFactor'] = computed_uncertaintyInfluenceFactor;
                calculatedData[tableName][rowNumber]['uncertaintyDrifStandard'] = computed_uncertaintyDriftStandard;

                calculatedData[tableName][rowNumber]['combinedUncertainty'] = computed_combinedUncertainty;
                calculatedData[tableName][rowNumber]['vEff'] = computed_Veff;
                calculatedData[tableName][rowNumber]['k'] = computed_k;
                calculatedData[tableName][rowNumber]['expandedUncertainty'] = computed_expandedUncertainty;
            }
        }
        $('#calculatedData').val(JSON.stringify(calculatedData))
        addToUncertaintyBudgetTable();
        
    }