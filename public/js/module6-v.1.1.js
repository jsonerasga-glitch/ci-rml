var standardDataDigitalTimer = {};
var standardDataDigitalTimerValues = {};
   
   $(document).ready(function() {
        addCustomerList();
        addPersonnel();
        getStandardData();
        addStandardToTableDigitalTimer();

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
            newRawDataTable();
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


       /**get array of Documenting process calibrator */
       let standardData = [];
       function getStandardData(){
           $.ajax({
               cache: false,
               async: false,
               type: "post",
               url: "/standard/digitalTimer/getStandardDataDigitalTimer",
               success: function(result) {
                   standardData = result.standardData;
                   addStandardToTableDigitalTimer();
                   $('#modalStandardTable').DataTable(); 
               },
               error: function (error) {
                   console.log(error);
               },
           });
       }

    function addStandardToTableDigitalTimer() {
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
            let suffix = 'days left before due date';

            if (today >= oneMonthBeforeDue && today < dueDate) {
                bgColor = 'background-color:rgba(255,165,0,0.5)'; // Warning color
            } else if (today >= dueDate) {
                bgColor = 'background-color:rgba(255,0,0,0.5)'; // Overdue color
                disabled = false;
                suffix = 'days over due date';
            }

            let days_due = Math.round(Math.abs((today - dueDate) / (24 * 60 * 60 * 1000)));
           
    
            let row = $('<tr>').attr('style', bgColor);
            let checkBoxTD = $('<td>');
            let standardTD = $('<td>');
            let certificateNumberTD = $('<td>');
            let descriptionTD = $('<td>');
            let providerTD = $('<td>');
            let days_due_TD = $('<td>');
    
            let checkbox = $('<input>').attr({
                'type': 'checkbox',
                'id': item['certificateNumber'],
                'data-group': 'standardCheckBox',
                'value': item['certificateNumber'],
                // 'disabled': disabled // Disable checkbox if necessary
            });
    
            let serialNumber = $('<label>').text(item['serialNumber']).attr('for', item['certificateNumber']);
            let certificateNumber = $('<label>').text(item['certificateNumber']).attr('for', item['certificateNumber']);
            let description = $('<label>').text(item['description']).attr('for', item['certificateNumber']);
            let provider = $('<label>').text(item['calibrationProvider']).attr('for', item['certificateNumber']);
            let days_due_html = $('<label>').text(days_due + ' ' + suffix).attr('for', item['certificateNumber']);
            
            checkBoxTD.append(checkbox);
            standardTD.append(serialNumber);
            certificateNumberTD.append(certificateNumber);
            descriptionTD.append(description);
            providerTD.append(provider);
            days_due_TD.append(days_due_html);

            row.append(
                checkBoxTD,
                standardTD,
                certificateNumberTD,
                descriptionTD,
                providerTD,
                days_due_TD
            );
    
            tableBody.append(row);
        });
       }
    
       function getStandardDigitalTimer(perTableStandard){
        let selectedStandard = $('#selectedStandard').val();
        let array_selectedStandard = selectedStandard.split('(SPLIT)');
        let selectedStandardDataDigital= {};
        for (let i = 0; i < standardData.length; i++) {
        let obj = standardData[i];
        if (array_selectedStandard.includes(obj.certificateNumber)) {
            selectedStandardDataDigital[obj.certificateNumber] = obj;
            }
        }
        return selectedStandardDataDigital[perTableStandard];
       }

        function getDigitalTimerID() {
                let dataValue = standardDataDigitalTimer;
                let getTimerIDValue = [dataValue.id]; 
                let array_selectedStandard = Object.keys(dataValue);
            
                for (let i = 0; i < array_selectedStandard.length; i++) {
                    let key = array_selectedStandard[i];
                    if (key) {
                        getTimerIDValue.push(key);
                    }
                }
                getStandardDataDigitalTimerValues(getTimerIDValue);
            }

        let standardDigitalTimerValues = [];
        function getStandardDataDigitalTimerValues(getTimerIDValue) {
            let standardID = getTimerIDValue;  
            $.ajax({
                cache: false,
                async: false,
                type: "post",
                url: "/standard/digitalTimer/getStandardValuesDigitalTimerByDetailsID",
                data: {
                    'selectedStandardID': standardID,
                },
                success: function(result) {
                    standardDigitalTimerValues = result.standardValues;
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }
  
        function getStandardDigitalTimerValues() {
            let selectedStandardDigitalTimer = {};
            for (let i = 0; i < standardDigitalTimerValues.length; i++) {
                let obj = standardDigitalTimerValues[i];
                    if (!selectedStandardDigitalTimer[obj.standardID]) {
                        selectedStandardDigitalTimer[obj.standardID] = [];
                    }
                    selectedStandardDigitalTimer[obj.standardID].push(obj);
            }
            return selectedStandardDigitalTimer;
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

        function updateProcessStandard(standardPicked){
            let selectedStandard = standardPicked.split("(SPLITHERE)")
            $('input[type="checkbox"][data-group*="standardCheckBox"]').each(function(){
                let currentCheckboxValue = $(this).val();
                if(selectedStandard.includes(currentCheckboxValue)){
                    $(this).prop('checked', true);
                }
                
            })
        
        }

        let stdResoValue;
        let stdResoValueTrim;
        let stdResoValueSeeDecimal;

        function fetchStandardData() {
            let element_standard = $('#selectedStandard');
            let standardValue = element_standard.val();
            
            // Return early if standardValue is null or empty
            if (!standardValue) {
                return;
            }
            standardDataDigitalTimer = getStandardDigitalTimer(standardValue);
            if (standardDataDigitalTimer !== undefined) {
                getDigitalTimerID();
            }
            standardDataDigitalTimerValues = getStandardDigitalTimerValues(standardValue);
          
        }



    function calculateValues(){
        let calculatedData = {};
        let numberOfTable = $('#divForTables').children().length;
        for(let i = 1; i <= numberOfTable; i++){
            let tableName = 'table' + i;
            calculatedData[tableName]= {};
            fetchStandardData();
            let coverageFactorValue = (standardDataDigitalTimer.coverageFactor);
            let standardReso_Value = (standardDataDigitalTimer.standardResolution);
            let standardResolutionValue = TrimTrailingZeroes(standardReso_Value);
       
            let firstKey = Object.keys(standardDataDigitalTimerValues)[0];
            let readingsArray = standardDataDigitalTimerValues[firstKey];
            let readings = readingsArray[0].type;

            let standardTimerReadingValue = $('#averageStdReadingObservation' + numberOfTable);
            let timerCalibrationReadingValue = $('#averageUUCReadingObservation' + numberOfTable);
            let observationObsPeriod_value = $('#observationObsPeriod' + numberOfTable);
            let averageHSTValue = $('#averageHST' + numberOfTable); 
            let standardDeviationHSTValue = $('#standardDeviationHST' + numberOfTable); 
            let uucResolution_value = $('#uucResolution' + numberOfTable); 
            let observationObsPeriodValue =  observationObsPeriod_value.val();
            let uucResolutionValue = uucResolution_value.val();
            
            let averageHST = averageHSTValue.val();
            let stdDeviationHST = standardDeviationHSTValue.val();
            let standardTimerReading =  standardTimerReadingValue.val();
            let timerCalibrationReading = timerCalibrationReadingValue.val();
            let driftOfStandard;
            let standardUncertaintyValue;

            // Determine if readings includes 'frequency' or 'time'
            let standardA = readings.includes('frequency');
            let standardB = readings.includes('time');

            /** Handle cases based on whether '6680B' or '18HS80TW' is present in the readings.      */
            if (standardA) {
                let measuredFrequencyValue;
                let previousMeasuredFrequencyValue;
                let uncertaintyHertzValue;
                // Iterate over the keys of standardDataDigitalTimerValues
                for (let key in standardDataDigitalTimerValues) {
                    if (standardDataDigitalTimerValues.hasOwnProperty(key)) {
                        let dataArray = standardDataDigitalTimerValues[key];
                        if (dataArray.length > 0) {
                            let data = dataArray[0];
                            measuredFrequencyValue = data.measuredFrequency;
                            previousMeasuredFrequencyValue = data.previousMeasuredFrequency;
                            uncertaintyHertzValue = data.uncertaintyHertz;
                            break;
                        }
                    }
                }

        
                let element_driftValue = calculateDriftOfStandard(
                    observationObsPeriodValue,
                    previousMeasuredFrequencyValue, 
                    measuredFrequencyValue
                    );

                let element_uncertaintyValue = calculateStandardUncertaintyValue(
                    observationObsPeriodValue,
                    uncertaintyHertzValue,
                    coverageFactorValue,
                    measuredFrequencyValue,  
                    );
            
                driftOfStandard = element_driftValue;
                standardUncertaintyValue = element_uncertaintyValue;
             }   
            else if (standardB) {
                let driftSecondValue;
                let uncertaintySecondValue;
                // Iterate over the keys of standardDataDigitalTimerValues
                for (let key in standardDataDigitalTimerValues) {
                    if (standardDataDigitalTimerValues.hasOwnProperty(key)) {
                        let dataArray = standardDataDigitalTimerValues[key];

                        if (dataArray.length > 0) {
                            // Access the first element of the array
                            let data = dataArray[0];
                            
                            // Get the values for driftSecond and uncertaintySecond
                            driftSecondValue = data.driftSecond;
                            uncertaintySecondValue = data.uncertaintySecond;

                            // Break after finding the first valid entry
                            break;
                        }
                    }
                }
                driftOfStandard = driftSecondValue;
                standardUncertaintyValue = uncertaintySecondValue;
             }  
                let computed_uncertaintyOfStandardUsed  = uncertaintyOfStandardUsed(
                                                standardUncertaintyValue,
                                                coverageFactorValue 
                                        );                
                let computed_uncertaintyDuetoDriftOfStandard = uncertaintyDuetoDriftOfStandard(driftOfStandard);  
                let computed_uncertaintyDueToResOfStandard = uncertaintyDueToResOfStandard(
                                                // stdResolution
                                                standardResolutionValue,
                                        );  
                let computed_uncertaintyDueToResOfUUC = uncertaintyDueToResOfUUC(
                                                uucResolutionValue,                                           
                                        );  
                let computed_hstBias = hstBias(averageHST);  
                let computed_uncertaintyHstStandardDeviation = uncertaintyHstStandardDeviation(stdDeviationHST);  
                let computed_combinedUncertainty = combinedUncertainty(
                                                computed_uncertaintyOfStandardUsed,                             
                                                computed_uncertaintyDuetoDriftOfStandard,                       
                                                computed_uncertaintyDueToResOfStandard,                         
                                                computed_uncertaintyDueToResOfUUC,                              
                                                computed_hstBias,                                               
                                                computed_uncertaintyHstStandardDeviation                        

                                        )
                let computed_expandedUncertainty = expandedUncertainty(computed_combinedUncertainty)

                calculatedData[tableName]['averageHST'] = averageHST; 
                calculatedData[tableName]['standardDeviationHST'] = stdDeviationHST; 
                calculatedData[tableName]['standardTimerReading'] = standardTimerReading; 
                calculatedData[tableName]['timerCalibrationReading'] = timerCalibrationReading; 
                calculatedData[tableName]['driftOfStandard'] = driftOfStandard; 
                calculatedData[tableName]['standardUncertaintyValue'] = standardUncertaintyValue; 
                calculatedData[tableName]['uncertaintyOfStandardUsed'] = computed_uncertaintyOfStandardUsed; 
                calculatedData[tableName]['uncertaintyOfDriftStandard'] = computed_uncertaintyDuetoDriftOfStandard; 
                calculatedData[tableName]['uncertaintyResOfStandard'] = computed_uncertaintyDueToResOfStandard; 
                calculatedData[tableName]['uncertaintyResOfUUC'] = computed_uncertaintyDueToResOfUUC; 
                calculatedData[tableName]['hstBias'] = computed_hstBias; 
                calculatedData[tableName]['uncertaintyHstStandardDeviation'] = computed_uncertaintyHstStandardDeviation; 
                calculatedData[tableName]['combinedUncertainty'] = computed_combinedUncertainty; 
                calculatedData[tableName]['coverageFactor'] = coverageFactorValue; 
                calculatedData[tableName]['expandedUncertainty'] = computed_expandedUncertainty; 

                calculatedData[tableName]['uucResolution'] = uucResolutionValue; 
                calculatedData[tableName]['standardResolutionValue'] = standardResolutionValue; 

            let numberOfRowPerTable = $('#' + tableName + ' tbody').children().length;
            for (let x = 1; x <= numberOfRowPerTable; x++) {
                let rowNumber = 'row' + x;
                // Check if the hst element exists for the current row
                if ($('#hst' + tableName + rowNumber).length > 0) {
                    // Create a new object for each row
                    calculatedData[tableName][rowNumber] = {};
                    let $element_hst = $('#hst' + tableName + rowNumber);
                    calculatedData[tableName][rowNumber]['hst'] = $element_hst.val(); // Assign hst value to the current row
                    }
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
            }       
            let tr = $('<tr>');
            let td1 = $('<td>').html(parseFloat(CalData[tableName]['driftOfStandard'] || 0).toFixed(12));
            let td2 = $('<td>').html(parseFloat(CalData[tableName]['standardUncertaintyValue'] || 0).toFixed(12));
            let td3 = $('<td>').html(parseFloat(CalData[tableName]['uncertaintyOfStandardUsed'] || 0).toFixed(12));
            let td4 = $('<td>').html(parseFloat(CalData[tableName]['uncertaintyOfDriftStandard'] || 0).toFixed(12));
            let td5 = $('<td>').html(parseFloat(CalData[tableName]['uncertaintyResOfStandard'] || 0).toFixed(12));
            let td6 = $('<td>').html(parseFloat(CalData[tableName]['uncertaintyResOfUUC'] || 0).toFixed(12));
            let td7 = $('<td>').html(parseFloat(CalData[tableName]['hstBias'] || 0).toFixed(12));
            let td8 = $('<td>').html(parseFloat(CalData[tableName]['uncertaintyHstStandardDeviation'] || 0).toFixed(12));
            let td9 = $('<td>').html(parseFloat(CalData[tableName]['combinedUncertainty'] || 0).toFixed(12));
            let td10 = $('<td>').html(parseFloat(CalData[tableName]['coverageFactor'] || 0).toFixed(4));
            let td11 = $('<td>').html(parseFloat(CalData[tableName]['expandedUncertainty'] || 0).toFixed(12));

            $(uncBudgetTbody).append(
                $(tr).append(td1,td2,td3,td4,td5,td6,td7,td8,td9,td10,td11)
            );  
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
            url: "/digitalTimer/add_New_Worksheet_Data",
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
                window.location.href = "/digitalTimer/worksheet/"+JSON.parse(result).id;

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
        });
        var dataInputs = JSON.stringify(rawValues);

        $.ajax({
            cache: false,
            type: "post",
            url: "/digitalTimer/update_Worksheet_Data",
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

    $( window ).on( "load", function() {
        if ($('#idOfCertificate').val() != ''){
            let idOfCertificate = $('#idOfCertificate').val();
            $.ajax({
                cache: false,
                type: "post",
                url: "/digitalTimer/get_data_by_id",
                data: {
                    'idOfCertificate' : idOfCertificate,
                },
                success: function(result) {
                    // userCheck(
                    //     // result.userData.id, 
                    //     // result.userData.email,
                    //     result.worksheetData.calibratorAccountID, 
                       
                    //      result.worksheetData.calibratorAccountEmail, 
                    //      result.worksheetData.completion
                    //      )
                    $('#saveButton').html('Update')
                    $('#saveButton').on("click", function(){updateData()});
                    
                    // if(result.worksheetData['standard'] != null){
                    //                         selectStandardFromData(result.worksheetData['standard']);
                    //                         $('#modalStandardSelect').trigger('click')
                    //                     }
                    if(result.worksheetData['standard'] != null){
                        selectedStandard = result.worksheetData['standard'];
                        $('#selectedStandard').val(result.worksheetData['standard'])
                        updateProcessStandard(result.worksheetData['standard']);
                        fetchStandardData();
                    }       

                    let calculatedDataRAW = result.worksheetData['calculatedData'];
                    let calculatedData = calculatedDataRAW != "" ? JSON.parse(calculatedDataRAW) : {};
                    $('#calculatedData').val(JSON.stringify(calculatedData));
                    
                    let numberOfTable = countKeysWithPattern(result.worksheetData['dataInputs'], 'numberOfTables'); 
                
                    for (let i = 1; i <= numberOfTable; i++) {
                        $('#addTable').trigger('click');
                        let numberOfRowsPerTable = countKeysWithPattern(result.worksheetData['dataInputs'], 'std1'+'table'+i+'row');
                        for (let x = 0; x < numberOfRowsPerTable; x++) {
                                                $('#addButtonTable'+i).trigger('click')
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
        }
    });

    function newRawDataTable() {
        let numberOfTable = $('#divForTables').children().length;
        let tableNumber = numberOfTable + 1;
        let rowNumber = 1;
        let tableDivs = $('#divForTables');
        let $table = $('<table>', {
            'class': "table",
            'id': 'table' + tableNumber
        });
        let $tbody = $('<tbody>');
        /**Button row */
        let $deleteTableBtn = $('<button>', {
            'type': 'button',
            'class': 'btn btn-danger',
            'html': 'Delete Row',
            'click': function () {
                if ( $tbody.children().length > 7) {
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
            'click': function() {
                let newRow = addRowToMeasurementTable(tableNumber, rowNumber);
                $tbody.append(newRow);
                rowNumber++;
            }
        });
        let $hiddenInputTableNumber = $('<input>', {
            'type': 'hidden',
            'data-group': 'raw_data',
            'id': 'numberOfTables' + tableNumber,
            'value': tableNumber
        });
        /**Table row 1 */
        let $uuResolution = $("<td>").html(createFormInput('uucResolution' + tableNumber, "UUC Resolution, s"));
        let $readabilityUsed = $("<td>").html(createFormInput('readabilityUsed' + tableNumber, "Readability Used"));
        /** Table row 2 */
        let $titleRow = $('<tr>').append(
            $('<td>', {
                'colspan': '3',
                'text': 'HUMAN SYNCHRONIZATION'
            }),
            $('<td>', {
                'colspan': '2',
                'text': 'OBSERVATION'
            })
            );
        let $humanSynchronizationObsPeriod = $("<td>", {
            "colspan": "3"
        }).html(createFormInput('humanSynchronizationObsPeriod' + tableNumber, "OBS PERIOD"));
        let $observationObsPeriod = $("<td>", {
            "colspan": "2"
        }).html(createFormInput('observationObsPeriod' + tableNumber, "OBS PERIOD"));
        let array_thead = [
            'Standard Reading',
            'UUC Reading',
            'HST',
            'Standard Reading',
            'UUC Reading',            
        ];
        let $headerRow = $('<tr>');
        for (let i = 0; i < array_thead.length; i++) {
                let $column = $('<th>', {
                    'html': array_thead[i]
                });
                $headerRow.append($column); 
        }
        $tbody.append( 
            $('<tr>').append( 
                $uuResolution,
                $readabilityUsed,
         
            ),
            $titleRow,
            $('<tr>').append(
                $humanSynchronizationObsPeriod,
                $observationObsPeriod
            ),
            $('<tr>').append(
        
                $hiddenInputTableNumber  
            ),
            $addTableBtn,
            $deleteTableBtn,
            $headerRow 
        );
        let $tableFooter = $('<tfoot>').append(
            $('<tr>').append(
                $('<td>', {
                    'colspan': '2',
                }),
                $('<td>').append(
                    $('<div>', {'class': 'form-floating mb-4'}).append(
                        $('<input>', {
                            'type': 'text',
                            'id': 'averageHST' + tableNumber,
                            'data-group': 'raw_data',
                            'class': 'form-control bg-warning',
                            'placeholder': 'Enter Ave. HST' // Placeholder based on label text
                        }).prop('disabled', true), // Set input as disabled
                        $('<label>', {
                            'for': 'averageHST' + tableNumber,
                            'text': 'Ave. HST' // Label text for input field
                        })
                    )
                ),
                
             
                $('<td>').append(
                    $('<div>', {'class': 'form-floating mb-4'}).append(
                        $('<input>', {
                            'type': 'text',
                            'id': 'averageStdReadingObservation' + tableNumber,
                            'data-group': 'raw_data',
                            'class': 'form-control bg-warning',
                            'placeholder': 'Enter Ave. HST' // Placeholder based on label text
                        }).prop('disabled', true), // Set input as disabled
                        $('<label>', {
                            'for': 'averageStdReadingObservation' + tableNumber,
                            'text': 'Standard Timer ' // Label text for input field
                        })
                    )
                ),

      
             
                $('<td>').append(
                    $('<div>', {'class': 'form-floating mb-4'}).append(
                        $('<input>', {
                            'type': 'text',
                            'id': 'averageUUCReadingObservation' + tableNumber,
                            'data-group': 'raw_data',
                            'class': 'form-control bg-warning',
                            'placeholder': 'Enter Ave. HST' // Placeholder based on label text
                        }).prop('disabled', true), // Set input as disabled
                        $('<label>', {
                            'for': 'averageUUCReadingObservation' + tableNumber,
                            'text': 'Timer Under Calibration ' // Label text for input field
                        })
                    )
                ),





         









            ),
            //
            $('<tr>').append(
                $('<td>', {
                    'colspan': '2',
                }),
                $('<td>').append(
                    $('<div>', {'class': 'form-floating mb-4'}).append(
                        $('<input>', {
                            'type': 'text',
                            'id': 'standardDeviationHST' + tableNumber,
                            'data-group': 'raw_data',
                            'class': 'form-control bg-warning',
                            'placeholder': 'Enter Ave. HST' 
                        }).prop('disabled', true), 
                        $('<label>', {
                            'for': 'standardDeviationHST' + tableNumber,
                            'text': 'Std Dev. HST'
                        })
                    )
                ),

            ),
        );
        $table.append(
            $tbody,
            $tableFooter,
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
        tableDivs.append($accordionCard);
    }

    function createFormInput(id, label) {
        let $input = $('<input>', {
            'type': 'text',
            'class': 'form-control',
            "data-group": "raw_data",
            'id': id,
            'placeholder': label // Using the label as placeholder text
        });
        let $label = $('<label>', {
            'for': id,
            'text': label // Using the label text
        });
        let $floatingDiv = $('<div>', {
            'class': 'form-floating mb-3' 
        }).append($input, $label);
        return $floatingDiv;
    }

    function addRowToMeasurementTable(tableNumber, rowNumber) {
        let $tr = $('<tr>');
        let std1ID = 'std1' + 'table' + tableNumber + 'row' + rowNumber;
        let uuc1ID = 'uuc1' + 'table' + tableNumber + 'row' + rowNumber;
        let hstID = 'hst' + 'table' + tableNumber + 'row' + rowNumber;
        let std2ID = 'std2' + 'table' + tableNumber + 'row' + rowNumber;
        let uuc2ID = 'uuc2' + 'table' + tableNumber + 'row' + rowNumber;
        let $std1 = $('<td>', {
            'html': $('<input>', {
                'type': 'text',
                'id': std1ID,
                "data-group": "raw_data",
                'class' : 'form-control',
            })
        });
        let $uuc1 = $('<td>', {
            'html': $('<input>', {
                'type': 'text',
                'id': uuc1ID,
            
                "data-group": "raw_data",
                'class' : 'form-control',
                'on': {
                    'input': function() {
                        calculateCorrection(std1ID, uuc1ID, hstID, tableNumber);
                            }
                        },                   
            })
        });
        let $hst = $('<td>', {
            'html': $('<input>', {
                'type': 'text',
                'id': hstID,
                "data-group": "raw_data",
                'class' : 'form-control',
                'class' : 'form-control bg-warning',
                
            }).prop('disabled', true),
        });
        let $std2 = $('<td>', {
            'html': $('<input>', {
                'type': 'text',
                'id': std2ID,
                "data-group": "raw_data",
                'class' : 'form-control',
                'on': {
                    'input': function() {
                        calculateAverageStdReadingObservation(  tableNumber);
                            }
                        }, 
            })
        });
        let $uuc2 = $('<td>', {
            'html': $('<input>', {
                'type': 'text',
                'id': uuc2ID,
                "data-group": "raw_data",
                'class' : 'form-control',
                'on': {
                    'input': function() {
                        calculateAverageUUCReadingObservation( tableNumber);
                        calculateOffset( tableNumber);
                            }
                        }, 
            })
        });
        $tr.append(
            $std1, 
            $uuc1,
            $hst, 
            $std2, 
            $uuc2);
        return $tr;
    }

    function removeTable(tableNumber){
        $('#divForTables').children(':last-child').remove();
        tableNumber > 0 ? tableNumber-- : 1;
    }

    function removeMeasurementRow(numberOfTable) {
        const body = $(`#table${numberOfTable} tbody`);
        if (body.children().length > 2) {
            body.children().last().remove();
        }
        return -1;
    }

    function calculateCorrection(
        std1ID, 
        uuc1ID,
        hstID, 
        tableNumber,    
        ) {
        const std1Value = $(`#${std1ID}`).val();
        const uuc1Value = $(`#${uuc1ID}`).val();
        const hstResult = std1Value && uuc1Value ? parseFloat(std1Value) - parseFloat(uuc1Value) : ''; // Calculate the difference
        $(`#${hstID}`).val(hstResult);
        calculateAverageHST(tableNumber);
        calculateStandardDeviationHST(tableNumber);
    }

    function calculateAverageHST(tableNumber) {
        const body = $(`#table${tableNumber} tbody`);
        let sum = 0;
        let count = 0;
        const filteredValues = [];
        body.find('input[id^="hst' + 'table' + tableNumber + 'row"]').each(function() {
            const value = parseFloat($(this).val());
            if (!isNaN(value)) {
                sum += value;
                count++;
                filteredValues.push(value);
            }
        });
        const aveHSTResult = count > 0 ? sum / count : 0;
        $('#averageHST' + tableNumber).val(aveHSTResult);
        return filteredValues.length;
    }

    function calculateStandardDeviationHST(tableNumber) {
        fetchStandardData(stdResoValueSeeDecimal);
        const body = $(`#table${tableNumber} tbody`);
        let sum = 0;
        let sumOfSquares = 0;
        let count = 0;
        const hstValues = [];
        
        body.find('input[id^="hst' + 'table' + tableNumber + 'row"]').each(function() {
            const value = parseFloat($(this).val());
            if (!isNaN(value)) {
                sum += value;
                sumOfSquares += value * value;
                count++;
                hstValues.push(value);
            }
        });

        const stdDev = standardDeviation(hstValues)
        const correctedStandardDeviation = stdDev / Math.sqrt(count);
        $('#standardDeviationHST' +tableNumber).val(correctedStandardDeviation);
    }

    function calculateAverageStdReadingObservation(tableNumber) {
        const body = $(`#table${tableNumber} tbody`);
        let sum = 0;
        let count = 0;
        body.find('input[id^="std2' + 'table' + tableNumber + 'row"]').each(function() {
            const value = parseFloat($(this).val());
            if (!isNaN(value)) {
                sum += value;
                count++;
            }
        });
        const stdAverage = count > 0 ? sum / count : '';
        // const averageValue = Math.round(average * 10000) / 10000;

        $('#averageStdReadingObservation' + tableNumber ).val(stdAverage);
    }

    function calculateAverageUUCReadingObservation(tableNumber) {
        const body = $(`#table${tableNumber} tbody`);
        let sum = 0;
        let count = 0;
        body.find('input[id^="uuc2' + 'table' + tableNumber + 'row"]').each(function() {
            const value = parseFloat($(this).val());
            if (!isNaN(value)) {
                sum += value;
                count++;
            }
        });
        const uucAverage = count > 0 ? sum / count : '';
        // const uucAverageValue = Math.round(uucAverage * 1000) / 1000;
        $('#averageUUCReadingObservation' + tableNumber).val(uucAverage);
    }

    function TrimTrailingZeroes(variable) {
        if (typeof variable !== 'string') {
            variable = variable.toString();
        }
    
        if (variable.indexOf('.') !== -1) {
            // Remove trailing zeros
            variable = variable.replace(/0+$/, '');
            // Remove trailing dot if there are no more decimal places
            variable = variable.replace(/\.$/, '');
        }
    
        return variable;
    }

    function sigFig(value, digits) {
        if (value === 0) {
            var decimalPlaces = digits - 1;
        } else {
            var decimalPlaces = digits - Math.floor(Math.log10(Math.abs(value))) - 1;
        }
    
        var roundedValue = parseFloat(value.toFixed(decimalPlaces));
        if (Math.floor(Math.log10(Math.abs(value))) !== Math.floor(Math.log10(Math.abs(roundedValue)))) {
            decimalPlaces--;
        }
    
        var result = (decimalPlaces > 0) ? value.toFixed(decimalPlaces) : Math.round(value).toString();
        return result;
    }

    function seeDecimal(value) {
        if (isNaN(value)) {
            return false;
        }
        
        value = parseFloat(value);
        if (parseInt(value) === value) {
            return 0;
        }
    
        // Convert value to string and find the decimal part
        let valueStr = value.toString();
        let decimalPart = valueStr.split(".")[1];
        
        return decimalPart ? decimalPart.length : 0;
    }

    function matchDecimal(value, numberOfDecimalPoints) {
        // Parse the value to float (if it's not already)
        value = parseFloat(value);
        
        if (!isNaN(value)) {
            // Use toFixed to format the number with the specified decimal points
            return value.toFixed(numberOfDecimalPoints); // Always format to 4 decimal places
        } else {
            return "Error: Invalid numeric value";
        }
    }
    