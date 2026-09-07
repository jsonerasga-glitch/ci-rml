//#region VARIABLES
  var tableNumber = 1;
  var equipmentType = 0;
  var caseNumber = 0;
  var pipetteType = 0;
  var pipetteChannel = 0;
  var caseNumber = 0;
  var selectedStandard = '';

  var u_pA = 10*100;
  var uform_ρA = 0.00024;
  var t0 = 20;

  const kSqrt6 = Math.sqrt(6);
  const kSqrt3 = Math.sqrt(3);
  const k2 = 2;

  const assumedDensityReferenceWeight = 7.95;
  const uncertaintyDensityReferenceWeight = 140*0.001;

  //  to be saved to DB 
  const pw = {
    'a1': -3.983035,
    'a2': 301.797,
    'a3': 522528.9,
    'a4': 69.34881,
    'a5': 0.99997495,
    'a1Unit': '°C',
    'a2Unit': '°C',
    'a3Unit': '°C2',
    'a4Unit': '°C',
    'a5Unit': 'g/mL',
  }

  const pa = {
    'tAo': 273.15,
    'k1': 3.4844*(Math.pow(10,-4)),
    'k2': -2.52*(Math.pow(10,-6)),
    'k3': 2.0582*(Math.pow(10,-5)),
    'tAoUnit': 'K',
    'k1Unit': 'ᵒC/hpa',
    'k2Unit': 'g/ml',
    'k3Unit': 'ᵒC',
  }

  const materials = {
    // "b" == 10^-6
    // "Y" == a * b
    "Borosilicate glass 3.3": {
      "a": 9.9,
      "b": 0.000001,
      "Y": 0.0000099
    },
    "Borosilicate glass 5.0": {
      "a": 15,
      "b": 0.000001,
      "Y": 0.000015
    },
    "Soda-lime glass": {
      "a": 27,
      "b": 0.000001,
      "Y": 0.000027
    },
    "PP (Polypropylene)": {
      "a": 240,
      "b": 0.000001,
      "Y": 0.00024
    },
    "PS (Polystyrene)": {
      "a": 450,
      "b": 0.000001,
      "Y": 0.00045
    },
    "PC (Polycarbonate)": {
      "a": 210,
      "b": 0.000001,
      "Y": 0.00021
    },
    "PFA": {
      "a": 390,
      "b": 0.000001,
      "Y": 0.00039
    },
    "PMP": {
      "a": 360,
      "b": 0.000001,
      "Y": 0.00036
    },
    "SAN": {
      "a": 55,
      "b": 0.000001,
      "Y": 0.000055
    },
    "Aluminum": {
      "a": 69,
      "b": 0.000001,
      "Y": 0.000069
    },
    "Stainelss Steel": {
      "a": 48,
      "b": 0.000001,
      "Y": 0.000048
    },
    "Carbob fibre": {
      "a": 1,
      "b": 0.000001,
      "Y": 0.000001
    },
    "Silicon dioxide": {
      "a": 48,
      "b": 0.000001,
      "Y": 0.000048
    },
    "Copper-zinc alloy (brass)": {
      "a": 54,
      "b": 0.000001,
      "Y": 0.000054
    }
  }



//#endregion VARIABLES

$( document ).ready(function() {
  removeRawDataTable();
  changeCase();
  changePipetteType();
  changePipetteChannel();
  changeEquipmentType();
  addStandardToTableBalance();
  addStandardToTableBarometer();
  addStandardToTableThermometer();
  materialTable();
  addPersonnel()
  addCustomerList();
});

//#region GENERAL FUNCTIONS   

  function bind(id, evt, func){
    var el = document.getElementById(id);
    if (el.addEventListener){
        el.addEventListener(evt, func);
    } else if (el.attachEvent) {
        el.attachEvent('on' + evt, func);
    }
  }

  function changeCase(){
    $('#case').on('change', function() {
      if(this.value == 0){
        $('#case1Div').addClass('d-none');
        $('#case2Div').addClass('d-none');
        caseNumber = 0;
      }
      if(this.value == 1){
        $('#case1Div').removeClass('d-none');
        $('#case2Div').addClass('d-none');
        caseNumber = 1;

      }
      if(this.value == 2){
        $('#case2Div').removeClass('d-none');
        $('#case1Div').addClass('d-none');
        caseNumber = 2;

      }
    });
    
  }
  function changeEquipmentType(){
    //1 = glassware
    //2 = pova pipette
    //3 = pova other
    $('#equipmentType').on('change', function() {
      if(this.value == 0){
        equipmentType = 0;
        $('#capacityPlaceholder').removeClass('d-none');
        $('#capacityPova').addClass('d-none');
        $('#capacityGlassware').addClass('d-none');
      }

      // capacityPlaceholder
      // capacityPova
      // capacityGlassware

      if(this.value == 1){
        equipmentType = 1;
        $('#caseDiv').removeClass('d-none');

        $('#MPREDiv').addClass('d-none');
        //$('#resolutionDiv').addClass('d-none');
      }
      if(this.value == 2){
        equipmentType = 2;
        $('#caseDiv').addClass('d-none');
        $('#case1Div').addClass('d-none');
        $('#case2Div').addClass('d-none')

        //$('#resolutionDiv').removeClass('d-none');
        $('#MPREDiv').addClass('d-none');
      }
      if(this.value == 3){
        equipmentType = 3;
        $('#caseDiv').addClass('d-none');
        $('#case1Div').addClass('d-none');
        $('#case2Div').addClass('d-none');

        // $('#MPREDiv').removeClass('d-none');
        //$('#resolutionDiv').addClass('d-none');
      }
    });
  }

  function personnelFromDatabase(officer_ID, verifier_ID, position_ID, officer_db, verifier_db, position_db){
    $('#'+officer_ID).val(officer_db);
    $('#'+verifier_ID).val(verifier_db);
    $('#'+position_ID).val(position_db);
}

  function changePipetteType(){
    $('#pipetteType').on('change', function() {
      if(this.value == 0){
        pipetteType = 0;
      }
      if(this.value == 1){
        pipetteType = 1;
      }
      if(this.value == 2){
        pipetteType = 2;
      }
    });
  }

  function changePipetteChannel(){
    $('#pipetteChannel').on('change', function() {
      if(this.value == 0){
        pipetteChannel = 0;
      }
      if(this.value == 1){
        pipetteChannel = 1;
      }
      if(this.value == 2){
        pipetteChannel = 2;
      }
    });
  }


  function getBalanceValues(perTableBalance){
    let selectedStandard = $('#selectedBalance').val();
    let array_selectedStandard = selectedStandard.split('(SPLIT)');
    let selectedStandardData = {};

    for (let i = 0; i < standardBalance.length; i++) {
      let obj = standardBalance[i];
      if (array_selectedStandard.includes(obj.balance)) {
        selectedStandardData[obj.balance] = obj;
      }
    }
  
    return selectedStandardData[perTableBalance];
  }
  function getBarometerValues(perTableBarometer){
    let selectedStandard = $('#selectedBarometer').val();
    let array_selectedStandard = selectedStandard.split('(SPLIT)');
    let selectedStandardData = {};

    for (let i = 0; i < standardBarometer.length; i++) {
      let obj = standardBarometer[i];
      if (array_selectedStandard.includes(obj.serialNumber)) {
        selectedStandardData[obj.serialNumber] = obj;
      }
    }
  
    return selectedStandardData[perTableBarometer];
  }
  function getThermometerValues(){
    let selectedStandard = $('#selectedThermometer').val();
    let serialNumbers = selectedStandard.split("(SPLIT)");
    let selectedStandardData = {};

    function getObjectBySerialNumber(jsonArray) {
      let obj_objects = {};
      for (let x = 0; x < serialNumbers.length; x++) {
        let array_values = [];
        for (let i = 0; i < jsonArray.length; i++) {
          let obj = jsonArray[i];
          if (obj.serialNumber == serialNumbers[x]) {
            array_values.push(obj);
          }
        }
        obj_objects[serialNumbers[x]] = array_values
      }
      return obj_objects;
    }

    let objectFromstandardThermometerDetails = getObjectBySerialNumber(standardThermometerDetails);
    let objectFromstandardThermometerDriftPRT = getObjectBySerialNumber(standardThermometerDriftPRT);
    let objectFromstandardThermometerTestpoint = getObjectBySerialNumber(standardThermometerTestpoint);
    selectedStandardData['details'] = objectFromstandardThermometerDetails;
    selectedStandardData['drift'] = objectFromstandardThermometerDriftPRT;
    selectedStandardData['uncertaintyValues'] = objectFromstandardThermometerTestpoint;

    return selectedStandardData;
  }

  function getLastObject(data){
    let keys = Object.keys(data);
    let lastKey = keys[keys.length - 1];
    let lastValue = data[lastKey];
    
    return {
      key: lastKey,
      value: lastValue
    };
  }

  function convertObjectToArray(data){
    var keys = Object.keys(data);
    var length = keys.length;
    var dataArray = new Array(length);
    for (var i = 0; i < length; i++) {
      dataArray[i] = data[keys[i]];
    }
    return dataArray;
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

  function findValueInArrayOfObjects(array_data, string_keyReference, referenceValue, string_keyResult){
    const foundObject = array_data.find(obj => obj[string_keyReference] == referenceValue);
    return foundObject ? foundObject[string_keyResult] : null;
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
  

//#endregion GENERAL FUNCTIONS

//#region BIND EVENTS 
  bind('checkedBy','change',function(){
    copyFromDataset('checkedBy', 'verifierPosition', 'verifierposition')
    getEmailOfVerifier('checkedBy');
  });
  bind('verifierPosition','change',function(){
    copyFromDataset('verifierPosition', 'checkedBy', 'verifiername')
  });
 
  bind('modalBalanceButton','click',function(){
    $('#modalBalanceList').modal('show');
  });
  bind('modalBarometerButton','click',function(){
    $('#modalBarometerList').modal('show');
  });
  bind('modalThermometerButton','click',function(){
    $('#modalThermometerList').modal('show');
  });
  bind('modalMaterial','click',function(){
    $('#modalMaterialList').modal('show');
  });
  

  bind('modalBalanceSelect','click',function(){
    selectedStandardsToInput('standardBalance', 'selectedBalance');
    $('#modalBalanceList').modal('hide');
  });

  bind('modalBarometerSelect','click',function(){
    selectedStandardsToInput('standardBarometer', 'selectedBarometer');
    $('#modalBarometerList').modal('hide');
  });

  bind('modalThermometerSelect','click',function(){
    selectedStandardsToInput('standardThermometer', 'selectedThermometer');
    $('#modalThermometerList').modal('hide');
  });

  bind('calculateButton','click',function(){
    //calculate();
    calculateValues();
  });

  bind('dateCalibrated','change',function(){
    setDate();
});
bind('recommendedDueDateSelect','change',function(){
    setDate();
});



  
 
//#endregion BIND EVENTS

//#region TABLE FUNCTIONS

  function addRawDataTable(){
      var table = $('<table>').attr('id', 'table' + tableNumber).attr('class', 'table table-bordered');
      var thead = $('<thead>');
      var tbody = $('<tbody>');
      var tfoot = $('<tfoot>');
      var thisTableNumber = tableNumber;
      var rowNumber = 1;
      var headers = ['n', 'Temperature', 'Humidity', 'Pressure', 'Water Temperature', 'Balance Reading (receiving Vessel)', 'Balance Reading (receiving Vessel+water)'];
      var buttonRow = $('<tr>');
      var th = $('<th>').attr('colspan', '7');

      var div = $('<div>').addClass('row');
      var divButtons = $('<div>').addClass('col d-lg-flex justify-content-lg-end align-items-lg-center');
      var addButtonGroup = $('<div>').addClass('btn-group').attr('role', 'group');
      var addRowButton = $('<button>').addClass('btn btn-success').attr('type', 'button').text('Add Row').attr('id', 'newRowTable' + tableNumber).click(function(){
        var newRow = addRowToMeasurementTable(thisTableNumber, rowNumber);
        tbody.append(newRow);
        rowNumber++;
      });
      var deleteRowButton = $('<button>').addClass('btn btn-success').attr('type', 'button').text('Delete Row').click(function() {
        tbody.find('tr:last').remove();
        if (rowNumber > 1) {
          rowNumber--;
        }
      });
      
      addButtonGroup.append(addRowButton, deleteRowButton);
      divButtons.append(addButtonGroup);
      
      var divInputs = $('<div>').addClass('col-lg-7 offset-lg-0 d-flex d-sm-flex justify-content-center align-items-sm-center justify-content-lg-start');

      var percentageValueDiv = $('<div>').addClass('me-3');
      var percentageLabel = $('<label>').text('Percentage (%):');
      var percentageInput = $('<input>').attr('id', 'percentageValueTable' + tableNumber).attr('data-group', 'raw_data').attr('type', 'text').addClass('form-control');
      percentageValueDiv.append(percentageLabel, percentageInput);

      var nominalValueDiv = $('<div>').addClass('me-3');
      var minLabel = $('<label>').text('Nominal Value:');
      var minInput = $('<input>').attr('id', 'nominalValueTable' + tableNumber).attr('data-group', 'raw_data').attr('type', 'text').addClass('form-control');
      nominalValueDiv.append(minLabel, minInput);



      var nominalUnitDiv = $('<div>').addClass('me-3');
      var minUnitLabel = $('<label>').text('Nominal Unit:');
      var minUnitInput = $('<select>').attr('id', 'nominalUnitTable' + tableNumber).attr('data-group', 'raw_data').attr('type', 'text').addClass('form-control').append($('<option>').val('1').html('µL'), $('<option>').val('2').html('mL'));
      nominalUnitDiv.append(minUnitLabel, minUnitInput);


      var estimatedEvaporationDiv = $('<div>').addClass('me-3');
      var estimatedEvaporationLabel = $('<label>').text('Estimated Evaporation (µL):');
      var estimatedEvaporationInput = $('<input>').attr('id', 'estimatedEvaporationTable' + tableNumber).attr('data-group', 'raw_data').attr('type', 'text').addClass('form-control');
      estimatedEvaporationDiv.append(estimatedEvaporationLabel, estimatedEvaporationInput);

      var mpreDiv = $('<div>').addClass('me-3');
      if(equipmentType == 3){
        $(mpreDiv).addClass('me-3');
      }else{
        $(mpreDiv).addClass('me-3 d-none');
      }
      var mpreLabel = $('<label>').text('MPRE:');
      var mpreInput = $('<input>').attr('id', 'mpreTable' + tableNumber).attr('data-group', 'raw_data').attr('type', 'text').addClass('form-control');
      mpreDiv.append(mpreLabel, mpreInput);


      // var divInputs = $('<div>').addClass('col-lg-7 offset-lg-0 d-flex d-sm-flex justify-content-center align-items-sm-center justify-content-lg-start');
      // var minDiv = $('<div>').addClass('');
      // var minLabel = $('<label>').text('Min(mL):');
      // var minInput = $('<input>').attr('id', 'minTable' + tableNumber).attr('data-group', 'raw_data').attr('type', 'text').addClass('form-control');
      // minDiv.append(minLabel, minInput);
      // var maxDiv = $('<div>').addClass('');
      // var maxLabel = $('<label>').text('Max(mL):');
      // var maxInput = $('<input>').attr('id', 'maxTable' + tableNumber).attr('data-group', 'raw_data').attr('type', 'text').addClass('form-control');
      // maxDiv.append(maxLabel, maxInput);

      var thDivSelects = $('<div>').addClass('row');
      var thDivBalance = $('<div>').addClass('col offset-lg-0 d-flex d-sm-flex justify-content-center align-items-sm-center justify-content-lg-start');
      var balanceLabel = $('<label>').text('Balance Used:');
      let selectBalancePer = $('<select>').attr('id', 'usedBalanceTable' + tableNumber).attr('data-group', 'raw_data').addClass('form-control');
      let selectedBalance = $('#selectedBalance').val();
      let selectedBalanceArray = selectedBalance.split('(SPLIT)');
      let optionBalance = $('<option>').attr('value', '').text('Select . . .');
      selectBalancePer.append(optionBalance);
      selectedBalanceArray.forEach(item => {
        let optionBalance = $('<option>').attr('value', item).text(item);
        selectBalancePer.append(optionBalance);
      })
      thDivBalance.append(balanceLabel, selectBalancePer);

      let thDivBarometer = $('<div>').addClass('col offset-lg-0 d-flex d-sm-flex justify-content-center align-items-sm-center justify-content-lg-start');
      let selectBarometerPer = $('<select>').attr('id', 'usedBarometerTable' + tableNumber).attr('data-group', 'raw_data').addClass('form-control');
      var barometerLabel = $('<label>').text('Barometer Used:');
      let selectedBarometer = $('#selectedBarometer').val();
      let selectedBarometerArray = selectedBarometer.split('(SPLIT)');
      let optionBarometer = $('<option>').attr('value', '').text('Select . . .');
      selectBarometerPer.append(optionBarometer);
      selectedBarometerArray.forEach(item => {
        let optionBarometer = $('<option>').attr('value', item).text(item);
        selectBarometerPer.append(optionBarometer);
      })
      thDivBarometer.append(barometerLabel, selectBarometerPer);
      
      let thDivThermometer = $('<div>').addClass('col offset-lg-0 d-flex d-sm-flex justify-content-center align-items-sm-center justify-content-lg-start');
      let selectThermometerPer = $('<select>').attr('id', 'usedThermometerTable' + tableNumber).attr('data-group', 'raw_data').addClass('form-control');
      var thermometerLabel = $('<label>').text('Thermometer Used:');
      let selectedThermometer = $('#selectedThermometer').val();
      let selectedThermometerArray = selectedThermometer.split('(SPLIT)');
      let optionThermometer = $('<option>').attr('value', '').text('Select . . .');
      selectThermometerPer.append(optionThermometer);
      selectedThermometerArray.forEach(item => {
        let optionThermometer = $('<option>').attr('value', item).text(item);
        selectThermometerPer.append(optionThermometer);
      })
      thDivThermometer.append(thermometerLabel, selectThermometerPer);
      thDivSelects.append(thDivBalance, thDivBarometer, thDivThermometer)

      var trFoot = $('<tr>');
      var thFootLabel = $('<th>').addClass('text-end').attr('colspan', '5').text('Evaporation Loss');

      var receivingVesselTh = $('<th>').addClass('');
      var receivingVesselInput = $('<input>').attr('id', 'receivingVesselEvaporationLossTable' + tableNumber).attr('data-group', 'raw_data').attr('type', 'text').addClass('form-control');
      receivingVesselTh.append(receivingVesselInput);

      var receivingVesselWaterTh = $('<th>').addClass('');
      var receivingVesselWaterInput = $('<input>').attr('id', 'receivingVesselWaterEvaporationLossTable' + tableNumber).attr('data-group', 'raw_data').attr('type', 'text').addClass('form-control');
      receivingVesselWaterTh.append(receivingVesselWaterInput);

      trFoot.append(thFootLabel, receivingVesselTh, receivingVesselWaterTh);
      tfoot.append(trFoot);

      // divInputs.append(minDiv, maxDiv);   
      divInputs.append(percentageValueDiv, nominalValueDiv, nominalUnitDiv, estimatedEvaporationDiv, mpreDiv);   
      div.append(divButtons, divInputs);
      th.append(div);
      buttonRow.append(th);
      thead.append(buttonRow);
      var headerRow = $('<tr>');
      var headerSelectRow = $('<tr>');
      for (var i = 0; i < headers.length; i++) {
        var th = $('<th class="text-center align-middle">').text(headers[i]);
        headerRow.append(th);
      }
      var headerSelectRowTh = $('<th>').attr('colspan', '7');
      headerSelectRowTh.append(thDivSelects);
      headerSelectRow.append(headerSelectRowTh);
      thead.append(headerSelectRow).append(headerRow);
      // table.append(thead).append(tbody).append(tfoot);
      table.append(thead).append(tbody);
      $('#divForTables').append(table);
      tableNumber++;
  }

  function addRowToMeasurementTable(tableNumber, rowNumber){
      var tr = $('<tr>');
      var ids = ['n', 'temperature', 'humidity', 'pressure', 'waterTemperature', 'readingVessel', 'readingVesselWater'];
      for (var i = 0; i < ids.length; i++) {
          var td = $('<td>');
          var input = $('<input>').attr('type', 'text').attr('class', 'form-control').attr('data-group', 'raw_data').attr('id', ids[i] + 'TABLE' + tableNumber + 'ROW' + rowNumber);
          if (ids[i] === 'n') {
              input.val(rowNumber);
          }
          td.append(input);
          tr.append(td);
      }
      return tr;
  }

  function removeRawDataTable(){
      $('#deleteTable').click(function() {
          $('#divForTables').children(':last-child').remove();
          tableNumber--;
      });
  }

  function materialTable(){
    var select = $('#selectedMaterial');
    for (var key in materials) {
      select.append($('<option>', {
        value: key,
        text: key
      }));
    }
  }

  function addUncertaintyBudget(string_calculatedData){
    $('#uncertaintyBudgetTbody').html('');
    const array_sourceType = [
      'balanceMass', 
      'densityOfMassPieces', 
      'waterTemperatureDensity', 
      'airTemperatureDensity', 
      'airPressure', 
      'relativeHumidity', 
      'exclusive', 
      'repeatbility', 
      'combined', 
    ]
    let json_data = JSON.parse(string_calculatedData)
    let array_keys = Object.keys(json_data);
    for (let i = 0; i < array_keys.length; i++) {
      for (let x = 0; x < array_sourceType.length; x++) {
        const string_tag = array_sourceType[x];
        let array_uncertaintyKeys = Object.keys(json_data[array_keys[i]]['uncertainty'][string_tag])
        array_uncertaintyKeys.forEach(string_key => {
          let string_calculatedValue = json_data[array_keys[i]]['uncertainty'][string_tag][string_key];
          $('#uncertaintyBudgetTbody').append($('<tr>').append($('<td>').html(string_key)).append($('<td>').html(string_calculatedValue)))
        })
      }
    }
  }


/*
u(m)
u<sub>(bal)</sub>
u<sub>(res)</sub>
u<sub>(res)</sub>
u<sub>(bal)</sub>
u(evap.)
u<sub>(Pb)</sub>
u<sub>(t<sub>w</sub>)</sub>
u<sub>(Pw)</sub>
u<sub>(ta)</sub>
u<sub>(pa)</sub>
u<sub>(pA)</sub>
u<sub>(φ)</sub>
u(SE<sub>Δt</sub>)  ||||| u(y)
u(SE<sub>Δφ</sub>)  ||||| u(t<sub>d</sub>)
u(SE<sub>pa</sub>)  ||||| u(men)
u(δV<sub>rep</sub>)

*/


//#endregion TABLE FUNCTIONS

//#region STANDARD FUNCTIONS
  
  function addStandardToTableBalance(){
    let tableBody = $('#standardTableTbodyBalance');
    let today = new Date();
    standardBalance.forEach(item => {
      let suffix = 'days left before due date';
      let date_next_calibration = today;
      let dateCalibrated = item.dateCalibrated
      if(dateCalibrated != ''){
        date_next_calibration = new Date(item.dateCalibrated)
        date_next_calibration.setFullYear(date_next_calibration.getFullYear() + 1);
      }
      let days_due = Math.round(Math.abs((today - date_next_calibration) / (24 * 60 * 60 * 1000)));

      let row = $('<tr>');
      let checkBoxTD = $('<td>');
      let labelTD = $('<td>');
      let daysTD = $('<td>');

      let checkbox = $('<input>').attr({
        'type':'checkbox',
        'id':item['serialNumber'],
        'name':'standardBalance',
        'value':item['serialNumber'],
      })
      checkBoxTD.append(checkbox);


      if(today > date_next_calibration){
        checkbox.attr('disabled', 'true')
        row.attr('style', 'background-color: rgba(255, 0, 0, 0.4)')
        suffix = 'days over due date';
      }else if(today < date_next_calibration){
        row.attr('style', 'background-color: rgba(0, 255, 0, 0.4)')
      }

      let label = $('<label>').text(item['serialNumber']).attr('for', item['serialNumber'])
      let days_due_label = $('<label>').text(days_due + ' ' + suffix).attr('for', item['serialNumber'])
      labelTD.append(label);

      daysTD.append(days_due_label)
      row.append(checkBoxTD).append(labelTD).append(daysTD)
      tableBody.append(row)
    })
    
    $('#standardTableBalance').DataTable({
      paging:false
    });
  }

  function addStandardToTableBarometer(){
    let tableBody = $('#standardTableTbodyBarometer');
    let today = new Date();
    standardBarometer.forEach(item => {
      let suffix = 'days left before due date';
      let date_next_calibration = today;
      let dateCalibrated = item.dateOfCalibration
      if(dateCalibrated != ''){
        date_next_calibration = new Date(item.dateOfCalibration)
        date_next_calibration.setFullYear(date_next_calibration.getFullYear() + 1);
      }
      let days_due = Math.round(Math.abs((today - date_next_calibration) / (24 * 60 * 60 * 1000)));
      let row = $('<tr>');
      let checkBoxTD = $('<td>');
      let labelTD = $('<td>');
      let daysTD = $('<td>');

      let checkbox = $('<input>').attr({
        'type':'checkbox',
        'id':item['serialNumber'],
        'name':'standardBarometer',
        'value':item['serialNumber'],
      })
      checkBoxTD.append(checkbox);

      if(today > date_next_calibration){
        // checkbox.attr('disabled', 'true')
        row.attr('style', 'background-color: rgba(255, 0, 0, 0.4)')
        suffix = 'days over due date';
      }else if(today < date_next_calibration){
        row.attr('style', 'background-color: rgba(0, 255, 0, 0.4)')
      }
      
      let label = $('<label>').text(item['serialNumber']).attr('for', item['serialNumber'])
      let days_due_label = $('<label>').text(days_due + ' ' + suffix).attr('for', item['serialNumber'])
      labelTD.append(label);
      daysTD.append(days_due_label)

      row.append(checkBoxTD).append(labelTD).append(daysTD)
      tableBody.append(row)
    })
    
    $('#standardTableBarometer').DataTable({
      paging:false
    });
  }

  function addStandardToTableThermometer(){
    let tableBody = $('#standardTableTbodyThermometer');
    let today = new Date();
    standardThermometerDetails.forEach(item => {
      let suffix = 'days left before due date';
      let date_next_calibration = today;
      let dateCalibrated = item.dateOfNextCali
      if(dateCalibrated != ''){
        date_next_calibration = new Date(item.dateOfNextCali)
        date_next_calibration.setFullYear(date_next_calibration.getFullYear() + 1);
      }
      let days_due = Math.round(Math.abs((today - date_next_calibration) / (24 * 60 * 60 * 1000)));

      let row = $('<tr>');
      let checkBoxTD = $('<td>');
      let labelTD = $('<td>');
      let descriptionTD = $('<td>');
      let daysTD = $('<td>');

      let checkbox = $('<input>').attr({
        'type':'checkbox',
        'id':item['serialNumber'],
        'name':'standardThermometer',
        'value':item['serialNumber'],
      })
      checkBoxTD.append(checkbox);

      let label = $('<label>').text(item['serialNumber']).attr('for', item['serialNumber'])
      labelTD.append(label);

      let description = $('<label>').text(item['standard']).attr('for', item['serialNumber'])
      descriptionTD.append(description);

      if(today > date_next_calibration){
        checkbox.attr('disabled', 'true')
        row.attr('style', 'background-color: rgba(255, 0, 0, 0.4)')
        suffix = 'days over due date';
      }else if(today < date_next_calibration){
        row.attr('style', 'background-color: rgba(0, 255, 0, 0.4)')
      }

      let days_due_label = $('<label>').text(days_due + ' ' + suffix).attr('for', item['serialNumber'])
      daysTD.append(days_due_label);


      row.append(checkBoxTD).append(labelTD).append(descriptionTD).append(daysTD)
      tableBody.append(row)
    })
    
    $('#standardTableThermometer').DataTable({
      paging:false
    });
  }

  function selectedStandardsToInput(name, inputID){
    let selectedStandardArray = [];
    $('input[name="'+name+'"]:checked').each(function() {
      selectedStandardArray.push($(this).val())
    });
    let selectedStandard = selectedStandardArray.join('(SPLIT)');
    $('#'+inputID).val(selectedStandard)
  }

  function processModalStandardCheckbox(){
    var selected = $("input[id*='modalStandard']:checked").map(function () {
        return this.value;
    }).get();
    selectedStandard = selected.join('(SPLIT)');

    selected.forEach( SN => {
        getValuesOfSelectedStandard(SN)
    })

    
    
    
}

//#endregion STANDARD FUNCTIONS

 
//#region CALCULATE FUNCTIONS

  function getDataNextHigher(testPoint, array_data){
    if(array_data == undefined){
        alert('No standard selected');
        return;
    }
    let testPointNumber = Number(testPoint)

    let key = ''

    let data_values
    let dataChanged = false;

    let array_testpoints = [];

    array_data.forEach(item=>{
        array_testpoints.push(Number(item[key]))
        if(item[key] == testPointNumber){
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
            array_testpoints.push(Number(item[key]))
            if(item[key] == testpointToGetData){
                data_values = item
            }
        })
    
    }
    return data_values;
  }

  function getDataNextHigherOfReference(testPoint, array_data){
    if(array_data == undefined){
        alert('No standard selected');
        return;
    }
    let testPointNumber = Number(testPoint)

    // let key = 'testLoad'
    let key = 'nominalLoad'

    let data_values
    let dataChanged = false;

    let array_testpoints = [];

    array_data.forEach((item, index)=>{
        array_testpoints.push(Number(item[key]))
        if(item[key] == testPointNumber){
            data_values = array_data[index+1]
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
            array_testpoints.push(Number(item[key]))
            if(item[key] == testpointToGetData){
                data_values = item
            }
        })
    
    }
    return data_values;
  }

  function calculate(){

    let equipmentType = $('#equipmentType').val();
    let channelValue = pipetteChannel == 1 ? 0.07/100 : 0.1/100;

    //currenty for glassware and piston
    //currenty for glassware and piston
    //currenty for glassware and piston
    //currenty for glassware and piston
    //currenty for glassware and piston
    //currenty for glassware and piston    

    let numberOfTable = $('#divForTables').children().length;
    let selectedMaterial = $('#selectedMaterial').val();
    let calculatedData = {};

    //#region declared data will be changed
    let expandedUncertaintyThermometerWater = 0.13;
    let driftThermometerWater = 0;
    let temperatureCoefficientSensitivity = 0.0001/100;
    let driftBalance = 0;
    let driftBarometer = 0;
    let driftHumiditySensor = 0;
    let driftThermometerAir = 0;
   
    //#endregion declared data will be changed
    
    for (let tableNumber = 1; tableNumber <= numberOfTable; tableNumber++) {
      let tableID = 'table'+tableNumber;
      calculatedData[tableID] = {
        'uncertainty':{
          'balanceMass':{}, 
          'densityOfMassPieces':{},
          'waterTemperatureDensity':{},
          'airTemperatureDensity':{},
          'airPressure':{},
          'relativeHumidity':{},
          'repeatbility':{},
          'exclusive':{},
          'combined':{}
        },
        'variables':{}
      };

      let float_testPoint = parseFloat($('#testPointTABLE'+tableNumber+'ROW1').val());

      calculatedData[tableID]['variables']['testPoint'] = float_testPoint;

      let numberOfRowInTable = $('#'+tableID+' tbody').children().length;

      let string_perTableBalance = $('#usedBalanceTable'+tableNumber).val();
      let perTableBalanceData = getBalanceValues(string_perTableBalance);
      let object_balanceMeasurements = JSON.parse(perTableBalanceData.measurements);
      let array_testLoad = [float_testPoint];
      object_balanceMeasurements.forEach(key => {
        array_testLoad.push(parseFloat(key.testLoad));
      })
      array_testLoad.sort((a, b) => a - b);
      let int_indexOfTestload = array_testLoad.indexOf(float_testPoint) === 0 ? 1 : array_testLoad.indexOf(float_testPoint);
      let float_testpointToBeUsed = array_testLoad[int_indexOfTestload+1];
      let uncertaintyBalance = findValueInArrayOfObjects(object_balanceMeasurements, 'testLoad', float_testpointToBeUsed, 'uncertaintyMeasurement');
      let resolution = parseFloat(perTableBalanceData.resolution1);

      calculatedData[tableID]['variables']['uncertaintyBalance'] = uncertaintyBalance;
      calculatedData[tableID]['variables']['resolution'] = resolution;
      
      let string_perTableBarometer = $('#usedBarometerTable'+tableNumber).val();
      let perTableBarometerData = getBarometerValues(string_perTableBarometer);
      let expandedUncertaintyBarometer = parseFloat(perTableBarometerData.uncertaintyHPA);
      let expandedUncertaintyHumiditySensor = parseFloat(perTableBarometerData.uncertaintyRH);
      let expandedUncertaintyThermometerAir = parseFloat(perTableBarometerData.uncertaintyTEMPAIR);

      calculatedData[tableID]['variables']['expandedUncertaintyBarometer'] = expandedUncertaintyBarometer;
      calculatedData[tableID]['variables']['expandedUncertaintyHumiditySensor'] = expandedUncertaintyHumiditySensor;
      calculatedData[tableID]['variables']['expandedUncertaintyThermometerAir'] = expandedUncertaintyThermometerAir;
      
      //#region declared data will be changed
      // THIS IS CHANGED, DECLARED VALUES IS FOR FALLBACK
      let td = 0.5;
      let ΡB = 8;
      //let y = materials[selectedMaterial]['Y'];
      let t0 = 20; 
      let tempDifference = 0.5;
      let relativeHumidityDifference = 5;
      let atmosphericPressureDifference = 20;
      //#endregion declared data will be changed

      let y = equipmentType == 1 ? 1 * (Math.pow(10, -5)) : 0;

      
      let object_weightOfWater = () => {
        let array_calculated = {};
        for (let rowNumber = 1; rowNumber <= numberOfRowInTable; rowNumber++) {
          let ig = $('#'+'readingVessel'+'TABLE'+tableNumber+'ROW'+rowNumber).val();
          let il = $('#'+'readingVesselWater'+'TABLE'+tableNumber+'ROW'+rowNumber).val();
          let calculated = weightOfWater(ig, il);
          array_calculated[rowNumber] = calculated;
        }
        return array_calculated;
      }
      let object_waterDensityTanakaEquation = () => {
        let array_calculated = {};
        for (let rowNumber = 1; rowNumber <= numberOfRowInTable; rowNumber++) {
          let waterTemperature = $('#'+'waterTemperature'+'TABLE'+tableNumber+'ROW'+rowNumber).val();
          let calculated = waterDensityTanakaEquation(waterTemperature);
          array_calculated[rowNumber] = calculated;
        }
        return array_calculated;
      }
      let object_airDensitySpeiwickEquation = () => {
        let array_calculated = {};
        for (let rowNumber = 1; rowNumber <= numberOfRowInTable; rowNumber++) {
          let pressure = $('#'+'pressure'+'TABLE'+tableNumber+'ROW'+rowNumber).val();
          let humidity = $('#'+'humidity'+'TABLE'+tableNumber+'ROW'+rowNumber).val();
          let airTemperature = $('#'+'temperature'+'TABLE'+tableNumber+'ROW'+rowNumber).val();
          let calculated = airDensitySpeiwickEquation(pressure, humidity, airTemperature);
          array_calculated[rowNumber] = calculated;
        }
        return array_calculated;
      }

      let object_gravimetricMethod = () => {
        let array_calculated = {};
        for (let rowNumber = 1; rowNumber <= numberOfRowInTable; rowNumber++) {
          let waterTemperature = $('#'+'waterTemperature'+'TABLE'+tableNumber+'ROW'+rowNumber).val();
          let weightOfWater = object_weightOfWater()[rowNumber];
          let waterDensity = object_waterDensityTanakaEquation()[rowNumber];
          let airDensity = object_airDensitySpeiwickEquation()[rowNumber];

          let calculated = gravimetricMethod(weightOfWater, waterDensity, airDensity, ΡB, y, waterTemperature, t0,)
          array_calculated[rowNumber] = calculated;
        }
        return array_calculated;
      }

      let array_gravimetricMethod = convertObjectToArray(object_gravimetricMethod());
      var float_endValueOfWeightOfWater = getLastObject(object_weightOfWater());
      let float_receivingVesselEvaporationLoss = parseFloat($('#receivingVesselEvaporationLossTable'+tableNumber).val());
      let float_receivingVesselWaterEvaporationLoss = parseFloat($('#receivingVesselWaterEvaporationLossTable'+tableNumber).val());

      let float_EvaporationLossWeightOfWater = (float_endValueOfWeightOfWater.value-(float_receivingVesselWaterEvaporationLoss-float_receivingVesselEvaporationLoss))/10;

      let object_airTemperature = () => {
        let array_values = {};
        for (let rowNumber = 1; rowNumber <= numberOfRowInTable; rowNumber++) {
          let float_temperature = parseFloat($('#'+'temperature'+'TABLE'+tableNumber+'ROW'+rowNumber).val());
          array_values[rowNumber] = float_temperature;
        }
        return array_values;
      }
      let object_humidity = () => {
        let array_values = {};
        for (let rowNumber = 1; rowNumber <= numberOfRowInTable; rowNumber++) {
          let float_humidity = parseFloat($('#'+'humidity'+'TABLE'+tableNumber+'ROW'+rowNumber).val());
          array_values[rowNumber] = float_humidity;
        }
        return array_values;
      }
      let object_pressure = () => {
        let array_values = {};
        for (let rowNumber = 1; rowNumber <= numberOfRowInTable; rowNumber++) {
          let float_pressure = parseFloat($('#'+'pressure'+'TABLE'+tableNumber+'ROW'+rowNumber).val());
          array_values[rowNumber] = float_pressure;
        }
        return array_values;
      }
      let object_waterTemperature = () => {
        let array_values = {};
        for (let rowNumber = 1; rowNumber <= numberOfRowInTable; rowNumber++) {
          let float_waterTemperature = parseFloat($('#'+'waterTemperature'+'TABLE'+tableNumber+'ROW'+rowNumber).val());
          array_values[rowNumber] = float_waterTemperature;
        }
        return array_values;
      }

      let averageWeightOfWater = averageObject(object_weightOfWater());
      let averageWaterDensityTanakaEquation = averageObject(object_waterDensityTanakaEquation());
      let averageAirDensitySpeiwickEquation = averageObject(object_airDensitySpeiwickEquation());
      let averageGravimetricMethod = averageObject(object_gravimetricMethod());
      
      let averageAirTemperature = averageObject(object_airTemperature());
      let averageHumidity = averageObject(object_humidity());
      let averagePressure = averageObject(object_pressure());
      let averageWaterTemperature = averageObject(object_waterTemperature());

      let array_uncertaintyDistributions = [];

      //#region GENERAL 
      calculatedData[tableID]['weightOfWater'] = object_weightOfWater();
      calculatedData[tableID]['waterDensityTanakaEquation'] = object_waterDensityTanakaEquation();
      calculatedData[tableID]['airDensitySpeiwickEquation'] = object_airDensitySpeiwickEquation();
      calculatedData[tableID]['gravimetricMethod'] = object_gravimetricMethod();
      //#endregion GENERAL
      //#region balanceMass 
      let float_standardUncertaintyOfTheBalance = standardUncertaintyOfTheBalance(k2, uncertaintyBalance);
      let float_standardUncertaintyResolutionLoad = standardUncertaintyResolutionLoad(kSqrt3, resolution);
      let float_Drift = driftBalance;
      let float_standardUncertaintyTemperatureDriftCoefficient = standardUncertaintyTemperatureDriftCoefficient(kSqrt3, averageWeightOfWater, temperatureCoefficientSensitivity, td);
      let float_standardUncertaintyEvaporationLoss = standardUncertaintyEvaporationLoss(kSqrt3, float_EvaporationLossWeightOfWater);
      let float_standardUncertaintyBalanceMass = standardUncertaintyBalanceMass(float_standardUncertaintyOfTheBalance, float_standardUncertaintyResolutionLoad, float_Drift, float_standardUncertaintyTemperatureDriftCoefficient, float_standardUncertaintyEvaporationLoss)
      let float_sensitivityCoefficientBalanceMass = sensitivityCoefficientBalanceMass(averageWaterDensityTanakaEquation) 
      let float_uncertaintyDistributionBalanceMass = uncertaintyDistributionBalanceMass(float_standardUncertaintyBalanceMass, float_sensitivityCoefficientBalanceMass)

      
      //#endregion balanceMass 
      //#region densityOfMassPieces 
      let float_standardUncertaintyDensityMassPieces = standardUncertaintyDensityMassPieces(k2);
      let float_sensitivityCoefficientDensityMassPieces = sensitivityCoefficientDensityMassPieces(averageWeightOfWater, averageAirDensitySpeiwickEquation, averageWaterDensityTanakaEquation, ΡB);
      let float_uncertaintyDistributionDensityMassPieces = uncertaintyDistributionDensityMassPieces(float_standardUncertaintyDensityMassPieces, float_sensitivityCoefficientDensityMassPieces);

      //#endregion densityOfMassPieces 
      //#region waterTemperatureDensity
      let float_temperatureDriftWater = driftThermometerWater;
      let float_standardUncertaintyOfThermometerWater = standardUncertaintyOfThermometerWater(expandedUncertaintyThermometerWater, k2, float_temperatureDriftWater);
      let float_sensitivityCoefficientThermometerWater = sensitivityCoefficientThermometerWater(averageWeightOfWater, averageWaterDensityTanakaEquation, averageWaterTemperature);
      let float_uncertaintyDistributionThermometerWater = uncertaintyDistributionThermometerWater(float_standardUncertaintyOfThermometerWater, float_sensitivityCoefficientThermometerWater)

      let float_standardUncertaintyOfThermometerWaterDensity = standardUncertaintyOfThermometerWaterDensity(k2)
      let float_sensitivityCoefficientThermometerWaterDensity = sensitivityCoefficientThermometerWaterDensity(averageWeightOfWater, averageWaterDensityTanakaEquation)
      let float_uncertaintyDistributionThermometerWaterDensity = uncertaintyDistributionThermometerWaterDensity(float_standardUncertaintyOfThermometerWaterDensity, float_sensitivityCoefficientThermometerWaterDensity)
      
     
      //#endregion waterTemperatureDensity
      //#region airTemperatureDensity
      let float_temperatureDriftAir = driftThermometerAir;
      let float_standardUncertaintyOfThermometerAir = standardUncertaintyOfThermometerAir(expandedUncertaintyThermometerAir, k2, float_temperatureDriftAir);
      let float_sensitivityCoefficientThermometerAir = sensitivityCoefficientThermometerAir(averageWeightOfWater, averageWaterDensityTanakaEquation, averageHumidity, averagePressure, averageAirTemperature);
      let float_uncertaintyDistributionThermometerAir = uncertaintyDistributionThermometerAir(float_standardUncertaintyOfThermometerAir, float_sensitivityCoefficientThermometerAir);

      let float_standardUncertaintyOfThermometerAirDensity = standardUncertaintyOfThermometerAirDensity(kSqrt3);
      let float_sensitivityCoefficientThermometerAirDensity = sensitivityCoefficientThermometerAirDensity(averageWeightOfWater, averageWaterDensityTanakaEquation, ΡB);
      let float_uncertaintyDistributionThermometerAirDensity = uncertaintyDistributionThermometerAirDensity(float_standardUncertaintyOfThermometerAirDensity, float_sensitivityCoefficientThermometerAirDensity);
      
      //#endregion airTemperatureDensity
      //#region airPressure 
      let float_barometerDrift = driftBarometer;
      let float_standardUncertaintyBarometer = standardUncertaintyBarometer(expandedUncertaintyBarometer, k2, float_barometerDrift)
      let float_sensitivityCoefficientAirPressure = sensitivityCoefficientAirPressure(averageWeightOfWater, averageWaterDensityTanakaEquation, averageAirTemperature)
      let float_uncertaintyDistributioAirPressure = uncertaintyDistributioAirPressure(float_standardUncertaintyBarometer, float_sensitivityCoefficientAirPressure)

      
      //#endregion airPressure
      //#region relativeHumidity 
      let float_humidityDrift = driftHumiditySensor;
      let float_standardUncertaintyHumiditySensor = standardUncertaintyHumiditySensor(expandedUncertaintyHumiditySensor, k2, float_humidityDrift);
      let float_sensitivityCoefficientHumiditySensor = sensitivityCoefficientHumiditySensor(averageWeightOfWater, averageWaterDensityTanakaEquation, averageAirTemperature);
      let float_uncertaintyDistributionHumiditySensor = uncertaintyDistributionHumiditySensor(float_standardUncertaintyHumiditySensor, float_sensitivityCoefficientHumiditySensor);

      
      //#endregion relativeHumidity 
      //#region repeatability 
      let float_standardUncertaintyRepeatability = standardUncertaintyRepeatability(array_gravimetricMethod, Math.sqrt(numberOfRowInTable));
      let float_sensitivityCoefficientRepeatability = sensitivityCoefficientRepeatability();
      let float_uncertaintyDistributionRepeatability = uncertaintyDistributionRepeatability(float_standardUncertaintyRepeatability, float_sensitivityCoefficientRepeatability);

      //#endregion repeatability 

      //#region glassware exclusive
      if(equipmentType == 1){
        let float_standardUncertaintyDeviceTemperatureGlassware = standardUncertaintyDeviceTemperatureGlassware(tempDifference, kSqrt3);
        let float_sensitivityCoefficientDeviceTemperatureGlassware = sensitivityCoefficientDeviceTemperatureGlassware(averageWeightOfWater, averageWaterDensityTanakaEquation, y)
        let float_uncertaintyDistributionDeviceTemperatureGlassware = uncertaintyDistributionDeviceTemperatureGlassware(float_standardUncertaintyDeviceTemperatureGlassware, float_sensitivityCoefficientDeviceTemperatureGlassware)
        
        let float_standardUncertaintyCubicThermalExpansion = standardUncertaintyCubicThermalExpansion(kSqrt3, y);
        let float_sensitivityCoefficientCubicThermalExpansion = sensitivityCoefficientCubicThermalExpansion(averageWeightOfWater, averageWaterDensityTanakaEquation, averageWaterTemperature, t0);
        let float_uncertaintyDistributionDeviceTemperature = uncertaintyDistributionDeviceTemperature(float_standardUncertaintyCubicThermalExpansion, float_sensitivityCoefficientCubicThermalExpansion);
        
        let float_standardUncertaintyMeniscus = standardUncertaintyMeniscus();
        let float_sensitivityCoefficientMeniscus = sensitivityCoefficientMeniscus();
        let float_uncertaintyDistributionMeniscus = uncertaintyDistributionMeniscus(float_standardUncertaintyMeniscus, float_sensitivityCoefficientMeniscus);

        calculatedData[tableID]['uncertainty']['exclusive']['standardUncertaintyDeviceTemperatureGlassware'] = float_standardUncertaintyDeviceTemperatureGlassware;
        calculatedData[tableID]['uncertainty']['exclusive']['sensitivityCoefficientDeviceTemperatureGlassware'] = float_sensitivityCoefficientDeviceTemperatureGlassware;
        calculatedData[tableID]['uncertainty']['exclusive']['uncertaintyDistributionDeviceTemperatureGlassware'] = float_uncertaintyDistributionDeviceTemperatureGlassware;
        calculatedData[tableID]['uncertainty']['exclusive']['standardUncertaintyCubicThermalExpansion'] = float_standardUncertaintyCubicThermalExpansion;
        calculatedData[tableID]['uncertainty']['exclusive']['sensitivityCoefficientCubicThermalExpansion'] = float_sensitivityCoefficientCubicThermalExpansion;
        calculatedData[tableID]['uncertainty']['exclusive']['uncertaintyDistributionDeviceTemperature'] = float_uncertaintyDistributionDeviceTemperature;
        calculatedData[tableID]['uncertainty']['exclusive']['standardUncertaintyMeniscus'] = float_standardUncertaintyMeniscus;
        calculatedData[tableID]['uncertainty']['exclusive']['sensitivityCoefficientMeniscus'] = float_sensitivityCoefficientMeniscus;
        calculatedData[tableID]['uncertainty']['exclusive']['uncertaintyDistributionMeniscus'] = float_uncertaintyDistributionMeniscus;

        array_uncertaintyDistributions.push(float_uncertaintyDistributionDeviceTemperatureGlassware);
        array_uncertaintyDistributions.push(float_uncertaintyDistributionDeviceTemperature);
        array_uncertaintyDistributions.push(float_uncertaintyDistributionMeniscus);
      }
      //#endregion glassware exclusive
      //#region piston pipette exclusive
      if(equipmentType == 2){
        let averageGravimetricMethodConverted = averageGravimetricMethod * 1000;
        let float_standardUncertaintyDeviceTemperaturePistonPipette = standardUncertaintyDeviceTemperaturePistonPipette(tempDifference, kSqrt3);
        let float_sensitivityCoefficientDeviceTemperaturePistonPipette = sensitivityCoefficientDeviceTemperaturePistonPipette(averageGravimetricMethod);
        let float_uncertaintyDistributionDeviceTemperaturePistonPipette = uncertaintyDistributionDeviceTemperaturePistonPipette(float_standardUncertaintyDeviceTemperaturePistonPipette, float_sensitivityCoefficientDeviceTemperaturePistonPipette);

        let float_standardUncertaintyDeviceRelativeHumidityPistonPipette = standardUncertaintyDeviceRelativeHumidityPistonPipette(relativeHumidityDifference, kSqrt3);
        let float_sensitivityCoefficientDeviceRelativeHumidityPistonPipette = sensitivityCoefficientDeviceRelativeHumidityPistonPipette(averageGravimetricMethod);
        let float_uncertaintyDistributionDeviceRelativeHumidityPistonPipette = uncertaintyDistributionDeviceRelativeHumidityPistonPipette(float_standardUncertaintyDeviceRelativeHumidityPistonPipette, float_sensitivityCoefficientDeviceRelativeHumidityPistonPipette);
      
        let float_atmosphericPressureSensitivityCoefficientPerCapacity = atmosphericPressureSensitivityCoefficientPerCapacity(tableNumber, averageWaterDensityTanakaEquation, averagePressure)

        let float_standardUncertaintyAtmosphericPressurePistonPipette = standardUncertaintyAtmosphericPressurePistonPipette(atmosphericPressureDifference, kSqrt6);
        let float_sensitivityCoefficientAtmosphericPressurePistonPipette = sensitivityCoefficientAtmosphericPressurePistonPipette(float_atmosphericPressureSensitivityCoefficientPerCapacity);
        let float_uncertaintyDistributionAtmosphericPressurePistonPipette = uncertaintyDistributionAtmosphericPressurePistonPipette(float_standardUncertaintyAtmosphericPressurePistonPipette, float_sensitivityCoefficientAtmosphericPressurePistonPipette);

        let float_standardUncertaintyProcessHandling = standardUncertaintyProcessHandling(channelValue, averageGravimetricMethodConverted, kSqrt3);
        let float_sensitivityCoefficientProcessHandling = sensitivityCoefficientProcessHandling();
        let float_uncertaintyDistributionProcessHandling = uncertaintyDistributionProcessHandling(float_standardUncertaintyProcessHandling, float_sensitivityCoefficientProcessHandling);

        calculatedData[tableID]['uncertainty']['exclusive']['standardUncertaintyDeviceTemperaturePistonPipette'] = float_standardUncertaintyDeviceTemperaturePistonPipette;
        calculatedData[tableID]['uncertainty']['exclusive']['sensitivityCoefficientDeviceTemperaturePistonPipette'] = float_sensitivityCoefficientDeviceTemperaturePistonPipette;
        calculatedData[tableID]['uncertainty']['exclusive']['uncertaintyDistributionDeviceTemperaturePistonPipette'] = float_uncertaintyDistributionDeviceTemperaturePistonPipette * 1000;
        calculatedData[tableID]['uncertainty']['exclusive']['standardUncertaintyDeviceRelativeHumidityPistonPipette'] = float_standardUncertaintyDeviceRelativeHumidityPistonPipette;
        calculatedData[tableID]['uncertainty']['exclusive']['sensitivityCoefficientDeviceRelativeHumidityPistonPipette'] = float_sensitivityCoefficientDeviceRelativeHumidityPistonPipette;
        calculatedData[tableID]['uncertainty']['exclusive']['uncertaintyDistributionDeviceRelativeHumidityPistonPipette'] = float_uncertaintyDistributionDeviceRelativeHumidityPistonPipette * 1000;
        calculatedData[tableID]['uncertainty']['exclusive']['atmosphericPressureSensitivityCoefficientPerCapacity'] = float_atmosphericPressureSensitivityCoefficientPerCapacity;
        calculatedData[tableID]['uncertainty']['exclusive']['standardUncertaintyAtmosphericPressurePistonPipette'] = float_standardUncertaintyAtmosphericPressurePistonPipette;
        calculatedData[tableID]['uncertainty']['exclusive']['sensitivityCoefficientAtmosphericPressurePistonPipette'] = float_sensitivityCoefficientAtmosphericPressurePistonPipette;
        calculatedData[tableID]['uncertainty']['exclusive']['uncertaintyDistributionAtmosphericPressurePistonPipette'] = float_uncertaintyDistributionAtmosphericPressurePistonPipette * 1000;
        calculatedData[tableID]['uncertainty']['exclusive']['standardUncertaintyProcessHandling'] = float_standardUncertaintyProcessHandling;
        calculatedData[tableID]['uncertainty']['exclusive']['sensitivityCoefficientProcessHandling'] = float_sensitivityCoefficientProcessHandling;
        calculatedData[tableID]['uncertainty']['exclusive']['uncertaintyDistributionProcessHandling'] = float_uncertaintyDistributionProcessHandling;

        array_uncertaintyDistributions.push(float_uncertaintyDistributionDeviceTemperaturePistonPipette);
        array_uncertaintyDistributions.push(float_uncertaintyDistributionDeviceRelativeHumidityPistonPipette);
        array_uncertaintyDistributions.push(float_uncertaintyDistributionAtmosphericPressurePistonPipette);
        array_uncertaintyDistributions.push(float_uncertaintyDistributionProcessHandling);
      }
      //#endregion piston pipette exclusive

      //#region store data to json
      if(equipmentType == 2){
        calculatedData[tableID]['uncertainty']['balanceMass']['standardUncertaintyOfTheBalance'] = float_standardUncertaintyOfTheBalance;
        calculatedData[tableID]['uncertainty']['balanceMass']['standardUncertaintyResolutionLoad'] = float_standardUncertaintyResolutionLoad;
        calculatedData[tableID]['uncertainty']['balanceMass']['Drift'] = float_Drift;
        calculatedData[tableID]['uncertainty']['balanceMass']['standardUncertaintyTemperatureDriftCoefficient'] = float_standardUncertaintyTemperatureDriftCoefficient;
        calculatedData[tableID]['uncertainty']['balanceMass']['standardUncertaintyEvaporationLoss'] = float_standardUncertaintyEvaporationLoss;
        calculatedData[tableID]['uncertainty']['balanceMass']['standardUncertaintyBalanceMass'] = float_standardUncertaintyBalanceMass;
        calculatedData[tableID]['uncertainty']['balanceMass']['sensitivityCoefficientBalanceMass'] = float_sensitivityCoefficientBalanceMass;
        calculatedData[tableID]['uncertainty']['balanceMass']['uncertaintyDistributionBalanceMass'] = float_uncertaintyDistributionBalanceMass;
        calculatedData[tableID]['uncertainty']['densityOfMassPieces']['standardUncertaintyDensityMassPieces'] = float_standardUncertaintyDensityMassPieces;
        calculatedData[tableID]['uncertainty']['densityOfMassPieces']['sensitivityCoefficientDensityMassPieces'] = float_sensitivityCoefficientDensityMassPieces;
        calculatedData[tableID]['uncertainty']['densityOfMassPieces']['uncertaintyDistributionDensityMassPieces'] = float_uncertaintyDistributionDensityMassPieces;
        calculatedData[tableID]['uncertainty']['waterTemperatureDensity']['temperatureDriftWater'] = float_temperatureDriftWater;
        calculatedData[tableID]['uncertainty']['waterTemperatureDensity']['standardUncertaintyOfThermometerWater'] = float_standardUncertaintyOfThermometerWater;
        calculatedData[tableID]['uncertainty']['waterTemperatureDensity']['sensitivityCoefficientThermometerWater'] = float_sensitivityCoefficientThermometerWater;
        calculatedData[tableID]['uncertainty']['waterTemperatureDensity']['uncertaintyDistributionThermometerWater'] = float_uncertaintyDistributionThermometerWater;
        calculatedData[tableID]['uncertainty']['waterTemperatureDensity']['standardUncertaintyOfThermometerWaterDensity'] = float_standardUncertaintyOfThermometerWaterDensity;
        calculatedData[tableID]['uncertainty']['waterTemperatureDensity']['sensitivityCoefficientThermometerWaterDensity'] = float_sensitivityCoefficientThermometerWaterDensity;
        calculatedData[tableID]['uncertainty']['waterTemperatureDensity']['uncertaintyDistributionThermometerWaterDensity'] = float_uncertaintyDistributionThermometerWaterDensity;
        calculatedData[tableID]['uncertainty']['airTemperatureDensity']['temperatureDriftAir'] = float_temperatureDriftAir;
        calculatedData[tableID]['uncertainty']['airTemperatureDensity']['standardUncertaintyOfThermometerAir'] = float_standardUncertaintyOfThermometerAir;
        calculatedData[tableID]['uncertainty']['airTemperatureDensity']['sensitivityCoefficientThermometerAir'] = float_sensitivityCoefficientThermometerAir;
        calculatedData[tableID]['uncertainty']['airTemperatureDensity']['uncertaintyDistributionThermometerAir'] = float_uncertaintyDistributionThermometerAir;
        calculatedData[tableID]['uncertainty']['airTemperatureDensity']['standardUncertaintyOfThermometerAirDensity'] = float_standardUncertaintyOfThermometerAirDensity;
        calculatedData[tableID]['uncertainty']['airTemperatureDensity']['sensitivityCoefficientThermometerAirDensity'] = float_sensitivityCoefficientThermometerAirDensity;
        calculatedData[tableID]['uncertainty']['airTemperatureDensity']['uncertaintyDistributionThermometerAirDensity'] = float_uncertaintyDistributionThermometerAirDensity;
        calculatedData[tableID]['uncertainty']['airPressure']['barometerDrift'] = float_barometerDrift;
        calculatedData[tableID]['uncertainty']['airPressure']['standardUncertaintyBarometer'] = float_standardUncertaintyBarometer;
        calculatedData[tableID]['uncertainty']['airPressure']['sensitivityCoefficientAirPressure'] = float_sensitivityCoefficientAirPressure;
        calculatedData[tableID]['uncertainty']['airPressure']['uncertaintyDistributioAirPressure'] = float_uncertaintyDistributioAirPressure;
        calculatedData[tableID]['uncertainty']['relativeHumidity']['humidityDrift'] = float_humidityDrift;
        calculatedData[tableID]['uncertainty']['relativeHumidity']['standardUncertaintyHumiditySensor'] = float_standardUncertaintyHumiditySensor;
        calculatedData[tableID]['uncertainty']['relativeHumidity']['sensitivityCoefficientHumiditySensor'] = float_sensitivityCoefficientHumiditySensor;
        calculatedData[tableID]['uncertainty']['relativeHumidity']['uncertaintyDistributionHumiditySensor'] = float_uncertaintyDistributionHumiditySensor;
        calculatedData[tableID]['uncertainty']['repeatbility']['standardUncertaintyRepeatability'] = float_standardUncertaintyRepeatability;
        calculatedData[tableID]['uncertainty']['repeatbility']['sensitivityCoefficientRepeatability'] = float_sensitivityCoefficientRepeatability;
        calculatedData[tableID]['uncertainty']['repeatbility']['uncertaintyDistributionRepeatability'] = float_uncertaintyDistributionRepeatability;
      }else{
        calculatedData[tableID]['uncertainty']['balanceMass']['standardUncertaintyOfTheBalance'] = float_standardUncertaintyOfTheBalance;
        calculatedData[tableID]['uncertainty']['balanceMass']['standardUncertaintyResolutionLoad'] = float_standardUncertaintyResolutionLoad;
        calculatedData[tableID]['uncertainty']['balanceMass']['Drift'] = float_Drift;
        calculatedData[tableID]['uncertainty']['balanceMass']['standardUncertaintyTemperatureDriftCoefficient'] = float_standardUncertaintyTemperatureDriftCoefficient;
        calculatedData[tableID]['uncertainty']['balanceMass']['standardUncertaintyEvaporationLoss'] = float_standardUncertaintyEvaporationLoss;
        calculatedData[tableID]['uncertainty']['balanceMass']['standardUncertaintyBalanceMass'] = float_standardUncertaintyBalanceMass;
        calculatedData[tableID]['uncertainty']['balanceMass']['sensitivityCoefficientBalanceMass'] = float_sensitivityCoefficientBalanceMass;
        calculatedData[tableID]['uncertainty']['balanceMass']['uncertaintyDistributionBalanceMass'] = float_uncertaintyDistributionBalanceMass;
        calculatedData[tableID]['uncertainty']['densityOfMassPieces']['standardUncertaintyDensityMassPieces'] = float_standardUncertaintyDensityMassPieces;
        calculatedData[tableID]['uncertainty']['densityOfMassPieces']['sensitivityCoefficientDensityMassPieces'] = float_sensitivityCoefficientDensityMassPieces;
        calculatedData[tableID]['uncertainty']['densityOfMassPieces']['uncertaintyDistributionDensityMassPieces'] = float_uncertaintyDistributionDensityMassPieces;
        calculatedData[tableID]['uncertainty']['waterTemperatureDensity']['temperatureDriftWater'] = float_temperatureDriftWater;
        calculatedData[tableID]['uncertainty']['waterTemperatureDensity']['standardUncertaintyOfThermometerWater'] = float_standardUncertaintyOfThermometerWater;
        calculatedData[tableID]['uncertainty']['waterTemperatureDensity']['sensitivityCoefficientThermometerWater'] = float_sensitivityCoefficientThermometerWater;
        calculatedData[tableID]['uncertainty']['waterTemperatureDensity']['uncertaintyDistributionThermometerWater'] = float_uncertaintyDistributionThermometerWater;
        calculatedData[tableID]['uncertainty']['waterTemperatureDensity']['standardUncertaintyOfThermometerWaterDensity'] = float_standardUncertaintyOfThermometerWaterDensity;
        calculatedData[tableID]['uncertainty']['waterTemperatureDensity']['sensitivityCoefficientThermometerWaterDensity'] = float_sensitivityCoefficientThermometerWaterDensity;
        calculatedData[tableID]['uncertainty']['waterTemperatureDensity']['uncertaintyDistributionThermometerWaterDensity'] = float_uncertaintyDistributionThermometerWaterDensity;
        calculatedData[tableID]['uncertainty']['airTemperatureDensity']['temperatureDriftAir'] = float_temperatureDriftAir;
        calculatedData[tableID]['uncertainty']['airTemperatureDensity']['standardUncertaintyOfThermometerAir'] = float_standardUncertaintyOfThermometerAir;
        calculatedData[tableID]['uncertainty']['airTemperatureDensity']['sensitivityCoefficientThermometerAir'] = float_sensitivityCoefficientThermometerAir;
        calculatedData[tableID]['uncertainty']['airTemperatureDensity']['uncertaintyDistributionThermometerAir'] = float_uncertaintyDistributionThermometerAir;
        calculatedData[tableID]['uncertainty']['airTemperatureDensity']['standardUncertaintyOfThermometerAirDensity'] = float_standardUncertaintyOfThermometerAirDensity;
        calculatedData[tableID]['uncertainty']['airTemperatureDensity']['sensitivityCoefficientThermometerAirDensity'] = float_sensitivityCoefficientThermometerAirDensity;
        calculatedData[tableID]['uncertainty']['airTemperatureDensity']['uncertaintyDistributionThermometerAirDensity'] = float_uncertaintyDistributionThermometerAirDensity;
        calculatedData[tableID]['uncertainty']['airPressure']['barometerDrift'] = float_barometerDrift;
        calculatedData[tableID]['uncertainty']['airPressure']['standardUncertaintyBarometer'] = float_standardUncertaintyBarometer;
        calculatedData[tableID]['uncertainty']['airPressure']['sensitivityCoefficientAirPressure'] = float_sensitivityCoefficientAirPressure;
        calculatedData[tableID]['uncertainty']['airPressure']['uncertaintyDistributioAirPressure'] = float_uncertaintyDistributioAirPressure;
        calculatedData[tableID]['uncertainty']['relativeHumidity']['humidityDrift'] = float_humidityDrift;
        calculatedData[tableID]['uncertainty']['relativeHumidity']['standardUncertaintyHumiditySensor'] = float_standardUncertaintyHumiditySensor;
        calculatedData[tableID]['uncertainty']['relativeHumidity']['sensitivityCoefficientHumiditySensor'] = float_sensitivityCoefficientHumiditySensor;
        calculatedData[tableID]['uncertainty']['relativeHumidity']['uncertaintyDistributionHumiditySensor'] = float_uncertaintyDistributionHumiditySensor;
        calculatedData[tableID]['uncertainty']['repeatbility']['standardUncertaintyRepeatability'] = float_standardUncertaintyRepeatability;
        calculatedData[tableID]['uncertainty']['repeatbility']['sensitivityCoefficientRepeatability'] = float_sensitivityCoefficientRepeatability;
        calculatedData[tableID]['uncertainty']['repeatbility']['uncertaintyDistributionRepeatability'] = float_uncertaintyDistributionRepeatability;

        array_uncertaintyDistributions.push(float_uncertaintyDistributionBalanceMass);
        array_uncertaintyDistributions.push(float_uncertaintyDistributionDensityMassPieces);
        array_uncertaintyDistributions.push(float_uncertaintyDistributionThermometerWater);
        array_uncertaintyDistributions.push(float_uncertaintyDistributionThermometerWaterDensity);
        array_uncertaintyDistributions.push(float_uncertaintyDistributionThermometerAir);
        array_uncertaintyDistributions.push(float_uncertaintyDistributionThermometerAirDensity);
        array_uncertaintyDistributions.push(float_uncertaintyDistributionHumiditySensor);
        array_uncertaintyDistributions.push(float_uncertaintyDistributionRepeatability);
      }
      //#endregion store data to json

      //#region uncertainty 
      let float_combinedUncertainty = combinedUncertainty(array_uncertaintyDistributions);
      let float_expandedUncertainty = expandedUncertainty(float_combinedUncertainty, k2);
      let float_expandedUncertaintyPercentage = expandedUncertaintyPercentage(float_expandedUncertainty, float_testPoint);

      calculatedData[tableID]['uncertainty']['combined']['combinedUncertainty'] = float_combinedUncertainty;
      calculatedData[tableID]['uncertainty']['combined']['expandedUncertainty'] = float_expandedUncertainty;
      calculatedData[tableID]['uncertainty']['combined']['expandedUncertaintyPercentage'] = float_expandedUncertaintyPercentage;
      
      //#endregion uncertainty

      

      
    }
    $('#calculatedData').val(JSON.stringify(calculatedData));
    addUncertaintyBudget(JSON.stringify(calculatedData))
    console.log(calculatedData);
  }

  function calculateValues(){
    let numberOfTables = $('#divForTables').children().length;

    let equipmentType = $("#equipmentType").val();
    let pipetteType = $("#pipetteType").val();
    let capacityMin = $("#capacityMin").val();
    let capacityMinUnit = $("#capacityMinUnit").val();
    let capacityMax = $("#capacityMax").val();
    let capacityMaxUnit = $("#capacityMaxUnit").val();
    let caseValue = $("#case").val();
    let graduation = $("#graduation").val();
    let graduationUnit = $("#graduationUnit").val();
    let neckDiameter = $("#neckDiameter").val();
    let graduationHeight = $("#graduationHeight").val();
    let resolution = $("#resolution").val();
    let setting = $("#setting").val();
    let mpre = $("#mpre").val();
    let selectedMaterial = $("#selectedMaterial").val();
    
    let calculatedData = {};

    for (let i = 1; i <= numberOfTables; i++){
      
      let tableID = 'table' + i;
      let numberOfRows = $("#"+ tableID +" tbody").children().length;

      calculatedData[tableID] = {};

      let nominalValue = $("#nominalValueTable"+i).val();
      let nominalUnit = $("#nominalUnitTable"+i).val();
      
      let converted_nominalValue = parseFloat(nominalValue) / 1000;
      if(equipmentType == '1'){
        converted_nominalValue = parseFloat(nominalValue);
      }
      if(equipmentType != '1'){
        mpre = $("#mpreTable"+i).val() != '' ? $("#mpreTable"+i).val() : mpre;
      }

      let estimatedEvaporation = $("#estimatedEvaporationTable"+i).val();

      let cubicThermalExpansion = materials[selectedMaterial]['Y']

      let usedBalance = $("#usedBalanceTable"+i).val();
      let usedBarometer = $("#usedBarometerTable"+i).val();
      let usedThermometer = $("#usedThermometerTable"+i).val();

      let array_temperature = [];
      let array_humidity = [];
      let array_pressure = [];
      let array_waterTemperature = [];
      let array_readingVessel = [];
      let array_readingVesselWater = [];

      let array_waterDensity = [];
      let array_airDensity = [];
      let array_m = [];
      let array_A = [];
      let array_B = [];
      let array_C = [];
      let array_Z = [];
      let array_beta = [];
      let array_V20 = [];

      for (let ii = 1; ii <= numberOfRows; ii++){
        let tableWithRow = "TABLE" + i + "ROW" + ii;

        let temperature = parseFloat($('#temperature' + tableWithRow).val());
        let humidity = parseFloat($('#humidity' + tableWithRow).val());
        let pressure = parseFloat($('#pressure' + tableWithRow).val());
        let waterTemperature = parseFloat($('#waterTemperature' + tableWithRow).val());
        let readingVessel = parseFloat($('#readingVessel' + tableWithRow).val());
        let readingVesselWater = parseFloat($('#readingVesselWater' + tableWithRow).val());

        let waterDensity = formula_tanakaWaterDensity(waterTemperature);
        let airDensity = formula_airDensity(pressure, humidity, temperature);
        let m = formula_m(readingVessel, readingVesselWater);
        let A = formula_A(waterDensity, airDensity);
        let B = formula_B(airDensity, assumedDensityReferenceWeight);
        let C = formula_C(cubicThermalExpansion, waterTemperature);
        let Z = formula_Z(waterDensity, airDensity, assumedDensityReferenceWeight);
        let beta = formula_beta(waterTemperature);
        let V20 = formula_V20(A, B, C, m, equipmentType);

        array_temperature.push(temperature)
        array_humidity.push(humidity)
        array_pressure.push(pressure)
        array_waterTemperature.push(waterTemperature)
        array_readingVessel.push(readingVessel)
        array_readingVesselWater.push(readingVesselWater)

        array_waterDensity.push(waterDensity)
        array_airDensity.push(airDensity)
        array_m.push(m)
        array_A.push(A)
        array_B.push(B)
        array_C.push(C)
        array_Z.push(Z)
        array_beta.push(beta)
        array_V20.push(V20)

      }

      calculatedData[tableID]['dataInputs'] = {
        "array_temperature" : array_temperature,
        "array_humidity" : array_humidity,
        "array_pressure" : array_pressure,
        "array_waterTemperature" : array_waterTemperature,
        "array_readingVessel" : array_readingVessel,
        "array_readingVesselWater" : array_readingVesselWater,
      };

      calculatedData[tableID]['calculated'] = {
        "array_waterDensity" : array_waterDensity,
        "array_airDensity" : array_airDensity,
        "array_m" : array_m,
        "array_A" : array_A,
        "array_B" : array_B,
        "array_C" : array_C,
        "array_Z" : array_Z,
        "array_beta" : array_beta,
        "array_V20" : array_V20,
      };

      let selectedBalanceData = standardBalance.find(o => o.serialNumber === usedBalance);
      let selectedThermometerDetails = standardThermometerDetails.find(o => o.serialNumber === usedThermometer);

      let bal_resolution = selectedBalanceData.resolution
      let bal_resolution1 = selectedBalanceData.resolution;
      let bal_resolution2 = selectedBalanceData.resolution2;

      if(selectedBalanceData.conditionForResolution != ''){
        let bal_conditionForResolution = parseFloat(selectedBalanceData.conditionForResolution) * 1000;
        let reso_nominal_val = parseFloat(nominalValue);
        if(nominalUnit == '2'){
          reso_nominal_val = parseFloat(nominalValue) * 1000;
        }
        bal_resolution = reso_nominal_val > bal_conditionForResolution ? bal_resolution2 : bal_resolution1;
        if(nominalUnit == '1'){
          bal_resolution = parseFloat(bal_resolution) * 1000;
        }
      }
      
      let bal_coverageFactor = selectedBalanceData.coverageFactor;
      let bal_measurements = JSON.parse(selectedBalanceData.measurements);
      let bal_uncertainty_object = getDataNextHigherOfReference(converted_nominalValue, bal_measurements)
      //let bal_uncertainty_object = getDataNextHigherOfReference(nominalValue, bal_measurements)
      let bal_uncertainty = parseFloat(bal_uncertainty_object.uncertaintyMeasurement) * 1000
      if(equipmentType == '1'){
        bal_uncertainty = parseFloat(bal_uncertainty_object.uncertaintyMeasurement);
      }
     
      let thermoWater_resolution = selectedThermometerDetails.stdResolutionTemp
      let thermoWater_coverageFactor = selectedThermometerDetails.coverageFactor
      let thermoWater_uncertainty_object = standardThermometerTestpoint.filter(o => o.serialNumber === usedThermometer).reduce((acc, curr)=>{return (parseFloat(curr.uncertainty) > parseFloat(acc.uncertainty)) ? curr : acc;},standardThermometerTestpoint[0])
      let thermoWater_uncertainty = parseFloat(thermoWater_uncertainty_object.uncertainty)
      
      calculatedData[tableID]['standardData'] = {
        "bal_resolution" : bal_resolution,
        "bal_coverageFactor" : bal_coverageFactor,
        "bal_uncertainty" : bal_uncertainty,
        "thermoWater_resolution" : thermoWater_resolution,
        "thermoWater_coverageFactor" : thermoWater_coverageFactor,
        "thermoWater_uncertainty" : thermoWater_uncertainty,
      };


      let average_temperature = average(array_temperature);
      let average_humidity = average(array_humidity);
      let average_pressure = average(array_pressure);
      let average_waterTemperature = average(array_waterTemperature);
      let average_readingVessel = average(array_readingVessel);
      let average_readingVesselWater = average(array_readingVesselWater);
      let average_waterDensity = average(array_waterDensity);
      let average_airDensity = average(array_airDensity);
      let average_m = average(array_m);
      let average_A = average(array_A);
      let average_B = average(array_B);
      let average_C = average(array_C);
      let average_Z = average(array_Z);
      let average_beta = average(array_beta);
      let average_V20 = average(array_V20);

      let u_tA = formula_utA(array_temperature);
      let u_hr = formula_uhr(array_humidity);

      // 1 = glassware, 2 pova pipette variable, 3 pova other, 4 pova fixed
      if(equipmentType != '1'){

        let computed_uncertainty_balance_u = uncertainty_balance_u(bal_uncertainty, bal_coverageFactor, bal_resolution, average_C, average_Z);
        let computed_uncertainty_thermo_water = uncertainty_thermo_water(thermoWater_uncertainty, thermoWater_coverageFactor, thermoWater_resolution, average_temperature, average_waterTemperature, average_m, average_Z, cubicThermalExpansion);
        let computed_uncertainty_water_dens = uncertainty_water_dens(thermoWater_uncertainty, thermoWater_coverageFactor, thermoWater_resolution, average_beta, average_waterDensity, average_m, average_airDensity, assumedDensityReferenceWeight, average_C);
        let computed_uncertainty_air_dens = uncertainty_air_dens(average_airDensity, u_pA, u_tA, u_hr, uform_ρA, average_m, average_waterDensity, average_C, average_Z, assumedDensityReferenceWeight);
        let computed_uncertainty_weight_pova = uncertainty_weight_pova(uncertaintyDensityReferenceWeight, average_m, average_waterDensity, average_airDensity, average_C, assumedDensityReferenceWeight);
        let computed_uncertainty_pressureVariation = uncertainty_pressureVariation(array_pressure, average_m, average_waterDensity, pa.k1, average_temperature, t0);
        let computed_uncertainty_humidityVariation = uncertainty_humidityVariation(array_humidity, average_m, average_waterDensity, pa.k2, average_temperature, pa.k3, t0);
        let computed_uncertainty_temperatureVariation = uncertainty_temperatureVariation(array_temperature, average_m, average_airDensity, average_waterDensity, average_humidity, pa.k2, t0, pa.k3, pa.k1, average_temperature);
        let computed_uncertainty_cubicExpansionCoefficent = uncertainty_cubicExpansionCoefficent(cubicThermalExpansion, average_m, average_waterDensity, average_airDensity, assumedDensityReferenceWeight, average_waterTemperature, t0);
        let computed_uncertainty_resolutionUUC = uncertainty_resolutionUUC(resolution);
        let computed_uncertainty_setting = uncertainty_setting(setting);
        let computed_uncertainty_reproducibility = uncertainty_reproducibility(equipmentType, nominalValue, mpre);
        let computed_uncertainty_repeatability = uncertainty_repeatability(array_V20, numberOfRows);
        let computed_uncertainty_evaporation = uncertainty_evaporation(estimatedEvaporation);

        let array_uncertainty = [
          computed_uncertainty_balance_u,
          computed_uncertainty_thermo_water,
          computed_uncertainty_water_dens,
          computed_uncertainty_air_dens,
          computed_uncertainty_weight_pova,
          computed_uncertainty_pressureVariation,
          computed_uncertainty_humidityVariation,
          computed_uncertainty_temperatureVariation,
          computed_uncertainty_cubicExpansionCoefficent,
          computed_uncertainty_resolutionUUC,
          computed_uncertainty_setting,
          computed_uncertainty_reproducibility,
          computed_uncertainty_repeatability,
          computed_uncertainty_evaporation,
        ];
        let computed_uncertainty_combined = uncertainty_combined(array_uncertainty);
        let computed_uncertainty_expanded = uncertainty_expanded(computed_uncertainty_combined, k2);
        
        calculatedData[tableID]['computed_uncertainty'] = {
          "computed_uncertainty_balance_u" : computed_uncertainty_balance_u,
          "computed_uncertainty_evaporation" : computed_uncertainty_evaporation,
          "computed_uncertainty_thermo_water" : computed_uncertainty_thermo_water,
          "computed_uncertainty_water_dens" : computed_uncertainty_water_dens,
          "computed_uncertainty_air_dens" : computed_uncertainty_air_dens,
          "computed_uncertainty_weight_pova" : computed_uncertainty_weight_pova,
          "computed_uncertainty_pressureVariation" : computed_uncertainty_pressureVariation,
          "computed_uncertainty_humidityVariation" : computed_uncertainty_humidityVariation,
          "computed_uncertainty_temperatureVariation" : computed_uncertainty_temperatureVariation,
          "computed_uncertainty_cubicExpansionCoefficent" : computed_uncertainty_cubicExpansionCoefficent,
          "computed_uncertainty_resolutionUUC" : computed_uncertainty_resolutionUUC,
          "computed_uncertainty_setting" : computed_uncertainty_setting,
          "computed_uncertainty_reproducibility" : computed_uncertainty_reproducibility,
          "computed_uncertainty_repeatability" : computed_uncertainty_repeatability,
         
          "computed_uncertainty_combined" : computed_uncertainty_combined,
          "computed_uncertainty_expanded" : computed_uncertainty_expanded,
        };
      }else{
        let computed_uncertainty_mass = uncertainty_mass(bal_uncertainty, bal_coverageFactor, bal_resolution, average_A, average_B, average_C);
        let computed_uncertainty_temp = uncertainty_temp(thermoWater_uncertainty, thermoWater_resolution, average_temperature, average_waterTemperature, average_m, average_A, average_B, cubicThermalExpansion);
        let computed_uncertainty_ρW = uncertainty_ρW(thermoWater_uncertainty, thermoWater_coverageFactor, thermoWater_resolution, average_beta, average_waterDensity, average_m, average_A, average_B, average_C);
        let computed_uncertainty_ρA = uncertainty_ρA(average_airDensity, u_pA, u_tA, u_hr, uform_ρA, average_m, average_A, average_C, average_B, assumedDensityReferenceWeight);
        let computed_uncertainty_weight_volumetric = uncertainty_weight_volumetric(uncertaintyDensityReferenceWeight, average_m, average_A, average_C, average_airDensity, assumedDensityReferenceWeight);
        let computed_uncertainty_y = uncertainty_y(cubicThermalExpansion, average_m, average_A, average_B, average_waterTemperature, t0);
        let computed_uncertainty_meniscus = uncertainty_meniscus(caseValue, graduation, neckDiameter, graduationHeight);
        let computed_uncertainty_repeatability = uncertainty_repeatability(array_V20, numberOfRows);
        let computed_uncertainty_evaporation = uncertainty_evaporation(estimatedEvaporation);

        let array_uncertainty = [          
          computed_uncertainty_mass,
          computed_uncertainty_temp,
          computed_uncertainty_ρW,
          computed_uncertainty_ρA,
          computed_uncertainty_weight_volumetric,
          computed_uncertainty_y,
          computed_uncertainty_meniscus,
          computed_uncertainty_repeatability,
        ];
        let computed_uncertainty_combined = uncertainty_combined(array_uncertainty);
        let computed_uncertainty_expanded = uncertainty_expanded(computed_uncertainty_combined, k2);

        let roundTo = 2 - (1 + (Math.floor(Math.log10(Math.abs(parseFloat(computed_uncertainty_expanded))))));
        let computed_uncertainty_expanded_rounded = computed_uncertainty_expanded.toFixed(roundTo);

        calculatedData[tableID]['computed_uncertainty'] = {
          "computed_uncertainty_mass" : computed_uncertainty_mass,
          "computed_uncertainty_temp" : computed_uncertainty_temp,
          "computed_uncertainty_evaporation" : computed_uncertainty_evaporation,
          "computed_uncertainty_ρW" : computed_uncertainty_ρW,
          "computed_uncertainty_ρA" : computed_uncertainty_ρA,
          "computed_uncertainty_weight_volumetric" : computed_uncertainty_weight_volumetric,
          "computed_uncertainty_y" : computed_uncertainty_y,
          "computed_uncertainty_meniscus" : computed_uncertainty_meniscus,
          "computed_uncertainty_repeatability" : computed_uncertainty_repeatability,
          "computed_uncertainty_combined" : computed_uncertainty_combined,
          "computed_uncertainty_expanded" : computed_uncertainty_expanded,
          "computed_uncertainty_expanded_rounded": computed_uncertainty_expanded_rounded,
        };
      }
    }

    $('#calculatedData').val(JSON.stringify(calculatedData))
    addUncertaintyBudget()
  }
//#endregion


function addUncertaintyBudget(){
  // $("#uncertaintyBudgetTable").html('')
  $("#uncertaintyBudgetThead").html('')
  $("#uncertaintyBudgetTbody").html('')
  let calculated = JSON.parse($('#calculatedData').val())
  let tableKeys = Object.keys(calculated)

  for (let i = 0; i < tableKeys.length; i++) {
    let calculated_header = Object.keys(calculated['table'+(i+1)].computed_uncertainty)
    let thead_tr = $('<tr>')
    let tbody_tr = $('<tr>');
    for (let ii = 0; ii < calculated_header.length; ii++) {
      if(i==0){
        let th = $('<th>').html(calculated_header[ii])
        thead_tr.append(th)
      }
      if(calculated_header[ii] == 'computed_uncertainty_combined'){
        let td = $('<td>').html(calculated['table'+(i+1)].computed_uncertainty[calculated_header[ii]]) 
        tbody_tr.append(td)
      }else if(calculated_header[ii] == 'computed_uncertainty_expanded'){
        let td = $('<td>').html(calculated['table'+(i+1)].computed_uncertainty[calculated_header[ii]]) 
        tbody_tr.append(td)

      }else if(calculated_header[ii] == 'computed_uncertainty_expanded_rounded'){
        let td = $('<td>').html(calculated['table'+(i+1)].computed_uncertainty[calculated_header[ii]]) 
        tbody_tr.append(td)
      }
      else{
        let td = $('<td>').html(calculated['table'+(i+1)].computed_uncertainty[calculated_header[ii]].uncertainty) 
        tbody_tr.append(td)
      }
    }
    $("#uncertaintyBudgetThead").append(thead_tr)
    $("#uncertaintyBudgetTbody").append(tbody_tr)
  }
}

//#region DATABASE FUNCTION
  function saveData(){
    let certificateNumber = $('#certificateNumber').val();
    let selectedBalance = $('#selectedBalance').val();
    let selectedBarometer = $('#selectedBarometer').val();
    let selectedThermometer = $('#selectedThermometer').val();
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
        url: "/glassware/add_New_Worksheet_Data",
        data: {
            'calibrationCertificate' : certificateNumber,
            'selectedBalance' : selectedBalance,
            'selectedBarometer' : selectedBarometer,
            'selectedThermometer' : selectedThermometer,
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
            window.location.href = "/glassware/worksheet/"+JSON.parse(result).id;

        },
        error: function (error) {
            console.log(error);
        },
    })
  }

  function updateData(){
    let idOfCertificate = $('#idOfCertificate').val();

    let certificateNumber = $('#certificateNumber').val();
    let selectedBalance = $('#selectedBalance').val();
    let selectedBarometer = $('#selectedBarometer').val();
    let selectedThermometer = $('#selectedThermometer').val();
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
        url: "/glassware/update_Worksheet_Data",
        data: {
            'idOfCertificate' : idOfCertificate,
            'calibrationCertificate' : certificateNumber,
            'selectedBalance' : selectedBalance,
            'selectedBarometer' : selectedBarometer,
            'selectedThermometer' : selectedThermometer,
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

  // function uploadFiles(){
  //   let files = $('#fileInput')[0].files;
  //   let idOfCertificate = $('#idOfCertificate').val();
  //   let formData = new FormData();

  //   for (let i = 0; i < files.length; i++) {
  //       formData.append('imageFiles[]', files[i]);
  //   }

  //   $.ajax({
  //       url: '/glassware/imageUpdate/' + idOfCertificate,
  //       type: 'POST',
  //       data: formData,
  //       cache: false,
  //       contentType: false,
  //       processData: false,
  //       success: function(response) {
  //           console.log('Files uploaded successfully:', response);
            
  //       },
  //       error: function(error) {
  //           console.error('Error uploading files:', error);
  //       }
  //   });
  // }

  function updateProcessStandards(selectedBalance, selectedBarometer, selectedThermometer){
    let array_selectedBalance = selectedBalance.split("(SPLIT)");
    let array_selectedBarometer = selectedBarometer.split("(SPLIT)");
    let array_selectedThermometer = selectedThermometer.split("(SPLIT)");

    $('input[type="checkbox"][name="standardBalance"]').each(function(){
      let currentCheckboxValue = $(this).val();
      if(array_selectedBalance.includes(currentCheckboxValue)){
          $(this).prop('checked', true);
      }
    })
    $('input[type="checkbox"][name="standardBarometer"]').each(function(){
      let currentCheckboxValue = $(this).val();
      if(array_selectedBarometer.includes(currentCheckboxValue)){
          $(this).prop('checked', true);
      }
    })
    $('input[type="checkbox"][name="standardThermometer"]').each(function(){
      let currentCheckboxValue = $(this).val();
      if(array_selectedThermometer.includes(currentCheckboxValue)){
          $(this).prop('checked', true);
      }
    })
    selectedStandardsToInput('standardBalance', 'selectedBalance');
    selectedStandardsToInput('standardBarometer', 'selectedBarometer');
    selectedStandardsToInput('standardThermometer', 'selectedThermometer');
  }

  $( window ).on( "load", function() {
    if ($('#idOfCertificate').val() != ''){
        let idOfCertificate = $('#idOfCertificate').val();
        $.ajax({
            cache: false,
            type: "post",
            url: "/glassware/get_data_by_id",
            data: {
                'idOfCertificate' : idOfCertificate,
            },
            success: function(result) {
                $('#saveButton').html('Update')
                $('#saveButton').on("click", function(){updateData()});

                $('#calculatedData').val(result.worksheetData['calculatedData']);

                

                $('#selectedBalance').val(result.worksheetData['selectedBalance']);
                $('#selectedBarometer').val(result.worksheetData['selectedBarometer']);
                $('#selectedThermometer').val(result.worksheetData['selectedThermometer']);

                if(result.worksheetData['selectedBalance'] != null && result.worksheetData['selectedBarometer'] != null && result.worksheetData['selectedThermometer'] != null){
                  updateProcessStandards(result.worksheetData['selectedBalance'], result.worksheetData['selectedBarometer'], result.worksheetData['selectedThermometer'])
                }


                let infoArray = ['customerInfo', 'equipmentInfo', 'environmentInfo'];
                for (let i = 0; i < infoArray.length; i++) {
                    let infoValues = JSON.parse(result.worksheetData[infoArray[i]]);
                    let keys = Object.keys(infoValues);
                    for (let x = 0; x < keys.length; x++) {
                        let id = keys[x];
                        $('#'+id).val(infoValues[id])                        
                    }   
                }            
                $('#equipmentType').trigger('change')
                $('#case').trigger('change')
                $('#pipetteType').trigger('change')
                $('#pipetteChannel').trigger('change')

                let numberOfTable = countKeysWithPattern(result.worksheetData['dataInputs'], 'usedBarometerTable');
                for (let i = 1; i <= numberOfTable; i++) {
                  addRawDataTable()
                  let numberOfRows = countKeysWithPattern(result.worksheetData['dataInputs'], 'nTABLE'+i);
                  for (let x = 1; x <= numberOfRows; x++) {
                    $("#newRowTable"+i).trigger("click");
                  }
                }

                let dataInputs_array = ['equipmentInfo', 'dataInputs'];
                for (let i = 0; i < dataInputs_array.length; i++) {
                    if(dataInputs_array[i] === 'equipmentInfo'){
                      let infoValues = JSON.parse(result.worksheetData[dataInputs_array[i]]);
                      let keys = Object.keys(infoValues);
                      for (let x = 0; x < keys.length; x++) {
                        let id = keys[x];
                          if(id === 'mpre'){
                            if(infoValues[id] != ''){
                              $('input[id^="mpreTable"]').val(infoValues[id])
                            }else{
                              $('#'+id).val(infoValues[id])
                            }
                          }else{
                            $('#'+id).val(infoValues[id])    
                          }
                      }   
                    }else{
                      let infoValues = JSON.parse(result.worksheetData[dataInputs_array[i]]);
                      let keys = Object.keys(infoValues);
                      for (let x = 0; x < keys.length; x++) {
                          let id = keys[x];
                          $('#'+id).val(infoValues[id])                        
                      }   
                    }
                }   

                personnelFromDatabase('calibratedBy', 'checkedBy', 'verifierPosition', result.worksheetData['calibrationOfficer'], result.worksheetData['checkedBy'], result.worksheetData['verifierPosition'])
                //tableChart(result.worksheetData['calculatedData'], result.worksheetData['dataInputs'])

                $('#status').val(result.worksheetData['completion'])

                if(result.worksheetData['calculatedData'] != '' && result.worksheetData['calculatedData'] != '{}'){
                  addUncertaintyBudget()
                }
                
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
        
    }
  });
//#endregion DATABASE FUNCTION




