function setCenterChannel(){
    if($('#calibrationProcedure').val() == 1){
        $("#centerChannel").val('9')
    }
    if($('#calibrationProcedure').val() == 2){
        $("#centerChannel").val('2')
    }
    
}

function addStandardTable(){
    let tableBody = $("#standardTableTbody")
    let today = new Date();
    standard.forEach(element => {
        let suffix = 'days left before due date';
        let date_next_calibration = new Date(element.dateOfCalibration)
        date_next_calibration.setFullYear(date_next_calibration.getFullYear() + 1);
        let days_due = Math.round(Math.abs((today - date_next_calibration) / (24 * 60 * 60 * 1000)));
        let tr = $('<tr>');
        let checkbox = $('<input>').attr({
            type: 'checkbox',
            id: element.serialNumber,
            value: element.serialNumber,
            'data-group': 'checkbox', 
          });
        let checkboxTD = $('<td>');
        let serialNumberTD = $('<td>');
        let certificateNumberTD = $('<td>');
        let descriptionTD = $('<td>');
        let providerTD = $('<td>');
        let brandTD = $('<td>');
        let modelTD = $('<td>');
        let dateOfCalibrationTD = $('<td>');

        if(today > date_next_calibration){
            checkbox.attr('disabled', 'true')
            tr.attr('style', 'background-color: rgba(255, 0, 0, 0.4)')
            suffix = 'days over due date';
          }else{
            tr.attr('style', 'background-color: rgba(0, 255, 0, 0.4)')
          }
  

        checkboxTD.html($('<label>').html(checkbox).attr('for', element.serialNumber));
        serialNumberTD.html($('<label>').html(element.serialNumber).attr('for', element.serialNumber));
        certificateNumberTD.html($('<label>').html(element.certificateNumber).attr('for', element.serialNumber));
        descriptionTD.html($('<label>').html(element.description).attr('for', element.serialNumber));
        providerTD.html($('<label>').html(element.provider).attr('for', element.serialNumber));
        brandTD.html($('<label>').html(element.brand).attr('for', element.serialNumber));
        modelTD.html($('<label>').html(element.model).attr('for', element.serialNumber));
        // dateOfCalibrationTD.html($('<label>').html(element.dateOfCalibration).attr('for', element.serialNumber));
        dateOfCalibrationTD.html($('<label>').html(days_due + ' ' + suffix).attr('for', element.serialNumber));

        tr.append(
            checkboxTD,
            serialNumberTD,
            certificateNumberTD,
            descriptionTD,
            providerTD,
            brandTD,
            modelTD,
            dateOfCalibrationTD
        )
        //tableBody.append(tr)

        if(today > date_next_calibration){
          tableBody.append(tr)
        }else{
          tableBody.prepend(tr)
        }

    });

    $('#standardTable').DataTable({
      paging:false
    });
    
}

function selectStandard(){
    let selectedStandardArray = [];
    $('input[data-group="checkbox"]:checked').each(function() {
      selectedStandardArray.push($(this).val())
    });
    let selectedStandard = selectedStandardArray.join('(SPLIT)');
    $('#selectedStandard').val(selectedStandard)

    return selectedStandard;
}

// function addStandardToTable(){
//     let selectedStandard = $('#selectedStandard').val();
//     let array_selectedStandard = selectedStandard.split('(SPLIT)');

//     $('select[id^="usedStandard"]').each(function() {
//         $(this).html('');
//         let optionSelect = $('<option>', {
//             'value' : '',
//             'html' : 'Select . . .',
//         });
//         $(this).append(optionSelect);
//         array_selectedStandard.forEach(element => {
//             let options = $('<option>', {
//                 'value' : element,
//                 'html' : element,
//             });
//             $(this).append(options);
//         })
//     });
// }

function addStandardToTable(){
    let selectedStandard = $('#selectedStandard').val();
    let array_selectedStandard = selectedStandard.split('(SPLIT)');

    $('select[id^="usedStandard"]').each(function(){

        if($(this).val() == ''){
            $(this).html('');
            let optionSelect = $('<option>', {
                'value' : '',
                'html' : 'Select . . .',
            });
            $(this).append(optionSelect);
            array_selectedStandard.forEach(element => {
                let options = $('<option>', {
                    'value' : element,
                    'html' : element,
                });
                $(this).append(options);
            })
        }else{
            let current_value = $(this).val();
            $(this).html('');
            let optionSelect = $('<option>', {
                'value' : '',
                'html' : 'Select . . .',
            });
            $(this).append(optionSelect);
            array_selectedStandard.forEach(element => {
                let options = $('<option>', {
                    'value' : element,
                    'html' : element,
                });
               
                $(this).append(options);
            })
            $(this).val(current_value)
        }

        
    });
    
}

function addChannelsToPosition(tableNumber, rowNumber){
    // table1
    // usedStandard1
    // standardPerPositionTABLE1ROW1
    // newRowTable1

    let numberOfRows = $('#table'+tableNumber+' tbody').children().length
    let selectedStandard = $('#usedStandard'+tableNumber).val()
    let standardPerPosition = $('#standardPerPositionTABLE'+tableNumber+'ROW'+rowNumber)
    let standard_json;

    standard.forEach((items, index)=>{
        if(items['serialNumber'] == selectedStandard){
            standard_json = JSON.parse(items['measurements']);
        }
    })
    
    let numberOfChannels = standard_json.length;
    
    for (let i = 0; i < numberOfChannels; i++) {
        const channel = standard_json[i];
        let channelName = channel.channelName;
        $(standardPerPosition).append($('<option>', {
            'value':channelName,
            'html':channelName,
        }))
        
    }
}

async function calculateWaterbath(){
    let numberOfTable = $('#divForTables').children().length;
    let arrayOfChannelKeys = ['CH01', 'CH03'];
    let calculatedData = {};
    

    for (let i = 1; i <= numberOfTable; i++) {
        let numberOfRowPerTable = $('#table' + i + ' tbody').children().length;
        let tableID = 'table'+i;
        calculatedData[tableID] = {
            'variables':{},
            'uncertainty':{},
        };
        let array_uncertainty = [];        

        let object_uncertaintyValues = {
            "combinedUncertainty" : 0,
            "uncertaintyDueToUUCResolution" : 0,
            "uncertaintyDueToUUCRepeatability" : 0,
            "uncertaintyDueToSTDResolution" : 0,
            "uncertaintyDueToSTDRepeatability" : 0,
            "uncertaintyReferenceStandardUsed" : 0,
            "uncertaintyDriftStandardUsed" : 0,
            "uncertaintyTemperatureInstability" : 0,
            "uncertaintySpatialInhomogenity" : 0,
            "uncertaintyLoadingEffect" : 0,
        };

        let arrayOfUUCIndication = [];

        let standardReadingByChannel = await getDataFromCSV(i);
        console.log('table'+i+ ' data: ', standardReadingByChannel);
    
        let standardReadingChannel9Average = averageArray(standardReadingByChannel['CH02']);
        let arrayForInstability = [];
        let arrayForInhomoginity = [];
        let arrayForLoadingEffect  = [];

        standardReadingByChannel['CH02'].forEach((val, index) => {
            let resultInstability = Math.abs(standardReadingChannel9Average - val);
            arrayForInstability.push(resultInstability);
            arrayOfChannelKeys.forEach(channelKey => {
                let resultInhomogenety = Math.abs(val - standardReadingByChannel[channelKey][index]);
                arrayForInhomoginity.push(resultInhomogenety);
            })
            let resultLoadingEffect = Math.abs(standardReadingByChannel['CH03'][index] - val);
            arrayForLoadingEffect.push(resultLoadingEffect);
            
        })
        let standardInstability = Math.max(...arrayForInstability);
        let standardInhomoginity = Math.max(...arrayForInhomoginity);
        let standardLoadingEffect = (0.2) * Math.max(...arrayForLoadingEffect);

        for (let x = 1; x <= numberOfRowPerTable; x++) {
            let uucIndication = parseFloat($('#uucIndicationTABLE'+i+'ROW'+x).val());
            arrayOfUUCIndication.push(uucIndication);
        }

        let averageOfUUCIndication = averageArray(arrayOfUUCIndication);
        let testPoint = parseFloat($('#testPoint'+i).val());
        let resolution = parseFloat($('#resolution'+i).val());
        let readability = parseFloat($('#readability'+i).val());
        let standardResolution = parseFloat($('#standardResolution'+i).val());

        //To be changed to standard uncertainty value To be changed to standard uncertainty value To be changed to standard uncertainty value
        //To be changed to standard uncertainty value To be changed to standard uncertainty value To be changed to standard uncertainty value
        //To be changed to standard uncertainty value To be changed to standard uncertainty value To be changed to standard uncertainty value
        //To be changed to standard uncertainty value To be changed to standard uncertainty value To be changed to standard uncertainty value
        let uncertaintyValueFromSTDUsed = 0.73;
        let driftFromSTDUsed = 2.03;
        let loadingEffect = 'UNLOADED';
        
        
        calculatedData[tableID]['variables']['standardInstability'] = standardInstability;
        calculatedData[tableID]['variables']['standardInhomoginity'] = standardInhomoginity;
        calculatedData[tableID]['variables']['standardLoadingEffect'] = standardLoadingEffect;
        calculatedData[tableID]['variables']['testPoint'] = testPoint;
        calculatedData[tableID]['variables']['resolution'] = resolution;
        calculatedData[tableID]['variables']['readability'] = readability;
        calculatedData[tableID]['variables']['standardResolution'] = standardResolution;
        calculatedData[tableID]['variables']['uncertaintyValueFromSTDUsed'] = uncertaintyValueFromSTDUsed;
        calculatedData[tableID]['variables']['driftFromSTDUsed'] = driftFromSTDUsed;
        calculatedData[tableID]['variables']['loadingEffect'] = loadingEffect;

        calculatedData[tableID]['standardReadingByChannel'] = standardReadingByChannel;

        let variable_uncertaintyDueToUUCResolution = uncertaintyDueToUUCResolution(resolution, readability);
        let variable_uncertaintyDueToUUCRepeatability = uncertaintyDueToUUCRepeatability(arrayOfUUCIndication);
        let variable_uncertaintyDueToSTDResolution = uncertaintyDueToSTDResolution(standardResolution);
        let variable_uncertaintyDueToSTDRepeatability = uncertaintyDueToSTDRepeatability(standardReadingByChannel['CH02']);
        let variable_uncertaintyReferenceStandardUsed = uncertaintyReferenceStandardUsed(uncertaintyValueFromSTDUsed);
        let variable_uncertaintyDriftStandardUsed = uncertaintyDriftStandardUsed(driftFromSTDUsed);
        let variable_uncertaintyTemperatureInstability = uncertaintyTemperatureInstability(standardInstability);
        let variable_uncertaintySpatialInhomogenity = uncertaintySpatialInhomogenity(standardInhomoginity);
        let variable_uncertaintyLoadingEffect = uncertaintyLoadingEffect(loadingEffect);
        
        array_uncertainty = [
            variable_uncertaintyDueToUUCResolution,
            variable_uncertaintyDueToUUCRepeatability,
            variable_uncertaintyDueToSTDResolution,
            variable_uncertaintyDueToSTDRepeatability,
            variable_uncertaintyReferenceStandardUsed,
            variable_uncertaintyDriftStandardUsed,
            variable_uncertaintyTemperatureInstability,
            variable_uncertaintySpatialInhomogenity,
            variable_uncertaintyLoadingEffect,
        ]

        let variable_combinedUncertainty = combinedUncertainty(array_uncertainty)

        object_uncertaintyValues['combinedUncertainty'] = variable_combinedUncertainty;
        object_uncertaintyValues['uncertaintyDueToUUCResolution'] = variable_uncertaintyDueToUUCResolution;
        object_uncertaintyValues['uncertaintyDueToUUCRepeatability'] = variable_uncertaintyDueToUUCRepeatability;
        object_uncertaintyValues['uncertaintyDueToSTDResolution'] = variable_uncertaintyDueToSTDResolution;
        object_uncertaintyValues['uncertaintyDueToSTDRepeatability'] = variable_uncertaintyDueToSTDRepeatability;
        object_uncertaintyValues['uncertaintyReferenceStandardUsed'] = variable_uncertaintyReferenceStandardUsed;
        object_uncertaintyValues['uncertaintyDriftStandardUsed'] = variable_uncertaintyDriftStandardUsed;
        object_uncertaintyValues['uncertaintyTemperatureInstability'] = variable_uncertaintyTemperatureInstability;
        object_uncertaintyValues['uncertaintySpatialInhomogenity'] = variable_uncertaintySpatialInhomogenity;
        object_uncertaintyValues['uncertaintyLoadingEffect'] = variable_uncertaintyLoadingEffect;

        let variable_effectiveDegreeOfFreedom = effectiveDegreeOfFreedomWaterbath(object_uncertaintyValues, arrayOfUUCIndication, standardReadingByChannel['CH02']);
        let variable_calculateKFunction = calculateKFunction(variable_effectiveDegreeOfFreedom);
        let variable_expandedUncertainty = expandedUncertainty(variable_combinedUncertainty, variable_calculateKFunction);

        calculatedData[tableID]['uncertainty']['uncertaintyDueToUUCResolution'] = variable_uncertaintyDueToUUCResolution;
        calculatedData[tableID]['uncertainty']['uncertaintyDueToUUCRepeatability'] = variable_uncertaintyDueToUUCRepeatability;
        calculatedData[tableID]['uncertainty']['uncertaintyDueToSTDResolution'] = variable_uncertaintyDueToSTDResolution;
        calculatedData[tableID]['uncertainty']['uncertaintyDueToSTDRepeatability'] = variable_uncertaintyDueToSTDRepeatability;
        calculatedData[tableID]['uncertainty']['uncertaintyReferenceStandardUsed'] = variable_uncertaintyReferenceStandardUsed;
        calculatedData[tableID]['uncertainty']['uncertaintyDriftStandardUsed'] = variable_uncertaintyDriftStandardUsed;
        calculatedData[tableID]['uncertainty']['uncertaintyTemperatureInstability'] = variable_uncertaintyTemperatureInstability;
        calculatedData[tableID]['uncertainty']['uncertaintySpatialInhomogenity'] = variable_uncertaintySpatialInhomogenity;
        calculatedData[tableID]['uncertainty']['uncertaintyLoadingEffect'] = variable_uncertaintyLoadingEffect;
        calculatedData[tableID]['uncertainty']['combinedUncertainty'] = variable_combinedUncertainty;
        calculatedData[tableID]['uncertainty']['effectiveDegreeOfFreedom'] = variable_effectiveDegreeOfFreedom;
        calculatedData[tableID]['uncertainty']['calculateKFunction'] = variable_calculateKFunction;
        calculatedData[tableID]['uncertainty']['expandedUncertainty'] = variable_expandedUncertainty;

    }
    $('#calculatedData').val(JSON.stringify(calculatedData));
    addUncertaintyBudget(JSON.stringify(calculatedData))
   
}