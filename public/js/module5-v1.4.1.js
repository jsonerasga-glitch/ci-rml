var selectedStandard = '';
var selectedTestpoint = [];  
var lineraityTestSelectedRow = 0;
var linearityTestNumberOfRow = 0;

var kForFormula = 2;


$( window ).on( "load", function() {
  if ($('#idOfCertificate').val() != ''){
      let idOfCertificate = $('#idOfCertificate').val();
      $.ajax({
          cache: false,
          type: "post",
          url: "/digitalThermometer/get_data_by_id",
          data: {
              'idOfCertificate' : idOfCertificate,
          },
          success: function(result) {
            $('#saveButton').html('Update')
            $('#saveButton').on("click", function(){updateData()});

            

            if(result.worksheetData['standard'] != null){
              selectStandardFromData(result.worksheetData['standard']);
              $('#modalStandardSelect').trigger('click')
            }
            
            let calculatedDataRAW = result.worksheetData['calculatedData'];
            let calculatedData = calculatedDataRAW != "" ? JSON.parse(calculatedDataRAW) : {};
            $('#calculatedData').val(JSON.stringify(calculatedData));
            
            let numberOfTable = countKeysWithPattern(result.worksheetData['dataInputs'], 'numberOfTables'); 

            for (let i = 1; i <= numberOfTable; i++) {
                  $('#addButtonMeasurementTables').trigger('click')
                  let numberOfRowsPerTable = countKeysWithPattern(result.worksheetData['dataInputs'], 'testPointTbodyTable'+i+'Row');
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
                  $('#'+id).attr('checked', infoValues[id])      
                }else{
                    $('#'+id).val(infoValues[id])      
                } 
                if(id == 'type'){
                  bind(id,'click',function(){
                      setResolution()
                  });
                  $('#'+id).trigger('click')
                  $('#'+id).off('click')
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

$( document ).ready(function() {
  addStandardTable()
  binds()
  addPersonnel();
  usePreviousDataAddRows();
});


function bind(id, evt, func) {
  var el = document.getElementById(id);
  if (el.addEventListener){
    el.addEventListener(evt, func);
  } else if (el.attachEvent) {
    el.attachEvent('on' + evt, func);
  }
}

function binds(){
  bind('dateCalibrated','change',function(){
    setDate()
  });
  bind('addButtonMeasurementTables','click',function(){
    addTablesToDiv("measurementDataTables")
  });  
  bind('removeButtonMeasurementTables','click',function(){
    deleteTable("measurementDataTables")
  });
  bind('modalStandardSelect','click',function(){
    selectedStandard = selectStandard()
  });
  bind('type', 'click', function(){
    setResolution()
  })
}

function setResolution(){
  let type = $("#type").val()
  $("#readability").html('');

  if(type === 'analog'){
      $("#readability").append($("<option>",{
          'html': "1/2",
          'value':'0.5'
      }),
      $("<option>",{
          'html': "1/5",
          'value':'0.2'
      }),
      $("<option>",{
          'html': "1/10",
          'value':'0.1'
      }))
  }else if(type === 'digital'){
      $("#readability").append($("<option>",{
          'html': "0.5",
          'value':'0.5'
      }))
  }else{
      $("#readability").html('');
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

function sixMonthsPrior(date){
  var dt = new Date(date);
  var mnth = dt.getMonth();
  dt.setMonth(dt.getMonth() - 6);
  var diff = (mnth + 12 - dt.getMonth()) % 12;
  if (diff < 6){
    dt.setDate(0)
  }
  
  return dt;
}

function addStandardTable(){
  let tableBody = $("#standardTableTbody")

  let today = new Date();

  standard.forEach(element => {
      let tr = $('<tr>');
      let date_next_calibration = new Date(element.dateOfNextCali)
      
      let checkbox = $('<input>').attr({
          type: 'checkbox',
          id: element.serialNumber,
          value: element.serialNumber,
          'data-group': 'checkbox', 
          'data-required': 'false', 
          'data-resolutionTemp':element.stdResolutionTemp,
          'data-resolutionRH':element.stdResolutionRH,
      });

      

      let checkboxTD = $('<td>');
      let serialNumberTD = $('<td>');
      let certificateNumberTD = $('<td>');
      let descriptionTD = $('<td>');
      let providerTD = $('<td>');
      // let brandTD = $('<td>');
      let modelTD = $('<td>');
      let dateOfCalibrationTD = $('<td>');

      checkboxTD.html($('<label>').html(checkbox).attr('for', element.serialNumber));
      serialNumberTD.html($('<label>').html(element.serialNumber).attr('for', element.serialNumber));
      certificateNumberTD.html($('<label>').html(element.certificateNumber).attr('for', element.serialNumber));
      descriptionTD.html($('<label>').html(element.standard).attr('for', element.serialNumber));
      providerTD.html($('<label>').html(element.issuingLab).attr('for', element.serialNumber));
      // brandTD.html($('<label>').html(element.brand).attr('for', element.serialNumber));
      modelTD.html($('<label>').html(element.modelNumber).attr('for', element.serialNumber));
     
      let suffix = 'days left before due date';
      if(today > date_next_calibration){
        checkbox.attr('disabled', 'true')
        tr.attr('style', 'background-color: rgba(255, 0, 0, 0.4)')
        suffix = 'days over due date';
      }else{
        tr.attr('style', 'background-color: rgba(0, 255, 0, 0.4)')
        suffix = 'days left before due date';
      }

      let days_due = Math.round(Math.abs((today - date_next_calibration) / (24 * 60 * 60 * 1000)));
      dateOfCalibrationTD.html($('<label>').html(days_due + ' ' + suffix).attr('for', element.serialNumber));

      tr.append(
          checkboxTD,
          serialNumberTD,
          certificateNumberTD,
          descriptionTD,
          providerTD,
          // brandTD,
          modelTD,
          dateOfCalibrationTD
      )

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
  let array_resolutionTemp = [];
  let array_resolutionRH = [];
  $('input[data-group="checkbox"]:checked').each(function() {
    selectedStandardArray.push($(this).val())
    array_resolutionTemp.push(String($(this).data('resolutiontemp')))
    array_resolutionRH.push(String($(this).data('resolutionrh')))

  });
  let selectedStandard = selectedStandardArray.join('(SPLIT)');
  let resolutionTemp = array_resolutionTemp.join('(SPLIT)');
  let resolutionRH = array_resolutionRH.join('(SPLIT)');

  $('#selectedStandard').val(selectedStandard);
  $('#selectedStandard').attr('data-resolutiontemp', String(resolutionTemp));
  $('#selectedStandard').attr('data-resolutionrh', String(resolutionRH));

  return selectedStandard;
}


function selectStandardFromData(standard){
  let selectedStandardArray = standard.split('(SPLIT)');
  $('input[data-group="checkbox"]').each(function() {
    if(selectedStandardArray.includes($(this).val()))
      $(this).trigger('click')
  });
}

function getCustomerDetails(){
  var customer = document.getElementById('customer');
  var address = document.getElementById('address');
  var idOfCustomer = document.getElementById('idOfCustomer');
    
  const detailsSplit = customer.value.split(' @ ');
  if(detailsSplit.length > 1){
    customer.value = detailsSplit[0];
    address.value = detailsSplit[1];
  }else{
    address.value = '';
  }
}

function personnelFromDatabase(officer_ID, verifier_ID, position_ID, officer_db, verifier_db, position_db){
  $('#'+officer_ID).val(officer_db);
  $('#'+verifier_ID).val(verifier_db);
  $('#'+position_ID).val(position_db);
}

function setDate() {
  let d = new Date(document.getElementById("dateCalibrated").value)
  let mon = +document.getElementById("recommendedDueDateInterval").value;
  d.setMonth(d.getMonth()+mon)
  document.getElementById("recommendedDueDate").valueAsDate = d;
}

function addTablesToDiv(divId){
  let calibrationProcedure = $('#calibrationProcedure').val()

  var div = document.getElementById(divId);
  var divTable = document.createElement('div');
  divTable.setAttribute('class', 'row');
  var tableCount = (div.childElementCount + 1);
  var table = document.createElement('table');
  var tbody = document.createElement('tbody');
  table.setAttribute('class', 'table table-bordered table-hover align-middle text-center');
  table.setAttribute('id', 'table'+tableCount);
  tbody.setAttribute('id', 'TbodyTable'+tableCount);


  
  const thead = function(tableNumber){
      var head = document.createElement('thead');
      var tr1 = document.createElement('tr');
      var tr2 = document.createElement('tr');
      var trButton = document.createElement('tr');
      var buttonsDiv = document.createElement('div');
      var h3 = document.createElement('h3');

      buttonsDiv.setAttribute('class', 'btn-group float-end');
      buttonsDiv.setAttribute('role', 'group');
      var button = document.createElement('button');
      button.setAttribute('type', 'button');
      button.setAttribute('class', 'btn btn-success');
      button.setAttribute('id', 'addButtonTable'+tableNumber);
      button.innerHTML = 'Add Row';
      button.setAttribute('onclick', 'addRow("TbodyTable'+tableNumber+'")');
      buttonsDiv.appendChild(button);
      var button = document.createElement('button');
      button.setAttribute('type', 'button');
      button.setAttribute('class', 'btn btn-danger');
      button.setAttribute('id', 'removeButtonTable'+tableNumber);
      button.innerHTML = 'Remove Last Row';
      button.setAttribute('onclick', 'deleteRow("TbodyTable'+tableNumber+'")');
      buttonsDiv.appendChild(button);

      let tableNumberHidden = $('<input>', {
        'type': 'hidden',
        'id': 'numberOfTables'+tableNumber,
        'value': tableNumber,
        'data-group': 'raw_data',
      })
      $(buttonsDiv).append(tableNumberHidden)
      

      h3.innerHTML = 'Channel #'+tableNumber;
      h3.setAttribute('class', 'align-bottom display-6 m-0');
      h3.appendChild(buttonsDiv);

      

      var th = document.createElement('th');
      th.setAttribute('colspan', '8');
      th.appendChild(h3);
      trButton.appendChild(th);


      head.appendChild(trButton);


        let tr_lig = $('<tr>');
        let sensorTypeTD = $("<td>").html('Sensor Type');
        let manufacturerTD = $("<td>").html('Manufacturer');
        let modelNumberTD = $("<td>").html('Model Number');
        let serialNumberTD = $("<td>").html('Serial Number');
        let equipmentIDTD = $("<td>").html('Equipment ID');
        let channelTD = $("<td>").html('Channel');
        let probeLengthTD = $("<td>").html('Length of Probe');
        let trialCountTD = $("<td>").html('Number Of Trial');

        tr_lig.append(
          sensorTypeTD,
          manufacturerTD,
          modelNumberTD,
          serialNumberTD,
          equipmentIDTD,
          probeLengthTD,
          channelTD,
          trialCountTD
        ) 
       $(head).append(tr_lig)
        
        let array_id_LIG =['sensorTypeTable', 'manufacturerTable', 'modelNumberTable', 'serialNumberTable', 'equipmentIDTable', 'probeLengthTable', 'channelTable', 'trialCountTable']

        let tr_lig_inputs = $('<tr>')

        for (let i = 0; i < array_id_LIG.length; i++) {
          let inputTD = $('<td>')
          let inputLIG = $("<input>",{
            'class': "form-control",
            'id': array_id_LIG[i] + tableNumber,
            "data-group":"raw_data",
          })
          inputTD.append(inputLIG)
          tr_lig_inputs.append(inputTD)
        }
        $(head).append(tr_lig_inputs)




      var th = document.createElement('th');
      th.innerHTML = 'Test Points, °C';
      th.setAttribute('rowspan', '2');
      tr1.appendChild(th);

      var th = document.createElement('th');
      th.innerHTML = 'Resolution (-1 if n/a)';
      th.setAttribute('rowspan', '2');
      tr1.appendChild(th);

      var th = document.createElement('th');
      th.innerHTML = 'Standard Used';
      th.setAttribute('rowspan', '2');
      tr1.appendChild(th);

      var th = document.createElement('th');
      th.innerHTML = 'Temperature Source';
      th.setAttribute('rowspan', '2');
      tr1.appendChild(th);

      var th = document.createElement('th');
      th.innerHTML = 'Correction';
      th.setAttribute('rowspan', '2');
      tr1.appendChild(th);

      var th = document.createElement('th');
      th.innerHTML = 'UUC reading, °C';
      th.setAttribute('colspan', '1');
      th.setAttribute('id', 'uucReading'+tableNumber);
      tr1.appendChild(th);

      var th = document.createElement('th');
      th.innerHTML = 'Standard reading, °C';
      th.setAttribute('colspan', '1');
      th.setAttribute('id', 'standardReading'+tableNumber);
      tr1.appendChild(th);


      // var th = document.createElement('th');
      // th.innerHTML = 'Trial 1';
      // tr2.appendChild(th);

      // var th = document.createElement('th');
      // th.innerHTML = 'Trial 2';
      // tr2.appendChild(th);

      // var th = document.createElement('th');
      // th.innerHTML = 'Trial 3';
      // tr2.appendChild(th);

      // var th = document.createElement('th');
      // th.innerHTML = 'Trial 1';
      // tr2.appendChild(th);

      // var th = document.createElement('th');
      // th.innerHTML = 'Trial 2';
      // tr2.appendChild(th);

      // var th = document.createElement('th');
      // th.innerHTML = 'Trial 3';
      // tr2.appendChild(th);

      
      
      head.appendChild(tr1);
      // head.appendChild(tr2);

      return head;
  }

  table.appendChild(thead(tableCount));
  table.appendChild(tbody);
  divTable.appendChild(table);
  div.appendChild(divTable);

  
}

function deleteTable(divID){
  try {
    var div = document.getElementById(divID);
    var tableCount = div.childElementCount;			
    if(tableCount==0){
      console.log('No more table to delete')
    }else{
      div.lastChild.remove();
      tableCount = div.childElementCount;
    }
  }catch(e) {
    console.log(e);
  }
}

function addRow(id){    
  function addNewTD(rowNumber, nameID){
    try{
      let td = $('<td>');
      let div = $('<div>').attr('class', 'input-group')
      let input = $('<input>', {
        'class' : 'form-control',
        'type' : 'text',
        'data-group' : 'raw_data',
        'data-required': 'false', 
        'data-rowNumber' : rowNumber,
        'name' : nameID+id+"Row"+rowNumber,
        'id' : nameID+id+"Row"+rowNumber,
      })
      $(td).append($(div).append($(input)));
      return $(td);
    }catch(error){
      let td = $('<td>');
      let div = $('<div>').attr('class', 'input-group');
      let p = $('<p>').html(error);
      $(td).append($(div).append($(p)));
      return $(td);
    }
  }
  function addNewTD_with_default(rowNumber, nameID, default_value){
    try{
      let td = $('<td>');
      let div = $('<div>').attr('class', 'input-group')
      let input = $('<input>', {
        'class' : 'form-control',
        'type' : 'text',
        'data-group' : 'raw_data',
        'data-required': 'false', 
        'data-rowNumber' : rowNumber,
        'name' : nameID+id+"Row"+rowNumber,
        'id' : nameID+id+"Row"+rowNumber,
        'value' : default_value,
      })
      $(td).append($(div).append($(input)));
      return $(td);
    }catch(error){
      let td = $('<td>');
      let div = $('<div>').attr('class', 'input-group');
      let p = $('<p>').html(error);
      $(td).append($(div).append($(p)));
      return $(td);
    }
  }
  function addNewSTDUsed(rowNumber, nameID){
    let selected = $('#selectedStandard').val();
    let resolutionTemp = String($('#selectedStandard').data('resolutiontemp'));
    let resolutionRH = String($('#selectedStandard').data('resolutionrh'));
    
    let selectedSplit = selected.split('(SPLIT)');
    let selected_resolutionTemp_split = resolutionTemp.split('(SPLIT)');
    let selected_resolutionRH_split = resolutionRH.split('(SPLIT)');
    try{
      let td = $('<td>');
      let div = $('<div>').attr('class', 'input-group')
      let input = $('<select>', {
        'class' : 'form-control',
        'type' : 'text',
        'data-group' : 'raw_data',
        'data-required': 'false', 
        'data-rowNumber' : rowNumber,
        'name' : nameID+id+"Row"+rowNumber,
        'id' : nameID+id+"Row"+rowNumber,
      })
      for (let i = 0; i < selectedSplit.length; i++) {
          let option = $('<option>', {
            'html':selectedSplit[i],
            'value':selectedSplit[i],
            'data-resolutiontemp':selected_resolutionTemp_split[i],
            'data-resolutionrh':selected_resolutionRH_split[i],
          })
          if(i === 0){
            $(input).append($('<option>').html('Select Standard'))
          }
          $(input).append($(option))

          
      }
      $(td).append(
        $(div).append(
          $(input)
        )
      )

      return $(td)
    }catch(error){
      let td = $('<td>');
      let div = $('<div>').attr('class', 'input-group');
      let p = $('<p>').html(error);
      $(td).append($(div).append($(p)));
      return $(td);
    }
  }
  function addNewTempSource(rowNumber, nameID){
    try{
      let td = $('<td>');
      let div = $('<div>').attr('class', 'input-group')
      let input = $('<select>', {
        'class' : 'form-control',
        'type' : 'text',
        'data-group' : 'raw_data',
        'data-required': 'false', 
        'data-rowNumber' : rowNumber,
        'name' : nameID+id+"Row"+rowNumber,
        'id' : nameID+id+"Row"+rowNumber,
      })

      for (let i = 0; i < temperatureSource.length; i++) {
        let option = $('<option>').html(temperatureSource[i].code + " " + temperatureSource[i].description).val(temperatureSource[i].id)
        $(input).append($(option))
      }

      $(td).append(
        $(div).append(
          $(input)
        )
      )

      return $(td)
    }catch(error){
      let td = $('<td>');
      let div = $('<div>').attr('class', 'input-group');
      let p = $('<p>').html(error);
      $(td).append($(div).append($(p)));
      return $(td);
    }
  } 

  let default_resolution = $('#resolution').val();
  let tableNumber = id.replace('TbodyTable', '')
  let table_id = 'table' + tableNumber;
  let trial_count_input_value = $('#trialCountTable' + tableNumber).val() === '' ? 3 : $('#trialCountTable' + tableNumber).val();

  try{
    let tbody = $('#'+id); 
    let tr = $('<tr>');
    let numberOfRow = $(tbody).children().length;
    let rowNumber = numberOfRow + 1;

    tr.attr('data-row', rowNumber)
    tr.attr('data-table', tableNumber)
    
    tr.attr('data-bs-toggle', 'tooltip')
    tr.attr('data-bs-placement', 'top')
    tr.attr('title', '5 fast and consecutive clicks will delete this row')
    
$(tr).on('click', function(evt){
  if (evt.detail === 5) {
    // delete_row_specific(rowNumber, tableNumber)
    delete_row_specific($(this).data('row'), $(this).data('table'))
  }
})

    $(tr).append(
      addNewTD(rowNumber,'testPoint'),
      addNewTD_with_default(rowNumber,'resolution', default_resolution),
      addNewSTDUsed(rowNumber,'standardUsed'),
      addNewTempSource(rowNumber,'temperatureSource'),
      addNewTD(rowNumber,'correction'),
    )

    for (let i = 0; i < trial_count_input_value; i++) {
      $(tr).append(addNewTD(rowNumber,'UUCtrial'+(i+1)))
    }
    for (let i = 0; i < trial_count_input_value; i++) {
      $(tr).append(addNewTD(rowNumber,'standardTrial'+(i+1)))
    }

    $(tbody).append($(tr));

    $('#standardUsedTbodyTable' + tableNumber + 'Row' + rowNumber).on('change', function(){
      let testPoint = $('#testPointTbodyTable' + tableNumber + 'Row' + rowNumber).val();
      let correction = correctionFromCert(testPoint, $(this).val(), standardValue); 
      $('#correctionTbodyTable' + tableNumber + 'Row' + rowNumber).val(correction);
    });

    if(rowNumber === 1){
      let number_for_colspan = (trial_count_input_value * 2) + 5;
      let table_head = $('#' + table_id + ' thead')
      let thead_tr = table_head.children();
      for (let i = 0; i < (thead_tr.length - 1); i++) {
        let array_colspan = []
        let thead_tr_td = $(thead_tr[i]).children()
        for (let ii = 0; ii < thead_tr_td.length; ii++) {
          const td = thead_tr_td[ii];
          let colspan_in_td = $(td).attr('colspan') ?? 1;
          array_colspan.push(Number(colspan_in_td))
        }
      
        let sum = array_colspan.reduce((a, b) => a + b, 0);
        while(sum != number_for_colspan){
          for(let x = 0; x < array_colspan.length; x++){     
            sum = array_colspan.reduce((a, b) => a + b, 0);
            if(sum == number_for_colspan){
              break;
            }else{
              array_colspan[x] += 1
            }
            
          }
        }
        
        for (let ii = 0; ii < thead_tr_td.length; ii++) {
          const td = thead_tr_td[ii];
          let colspan_in_td = $(td).attr('colspan', array_colspan[ii]);
        }
       
      }
      $('#uucReading' + tableNumber).attr('colspan',trial_count_input_value)
      $('#standardReading' + tableNumber).attr('colspan',trial_count_input_value)

      let tr_trials = $('<tr>')
      for (let i = 1; i <= trial_count_input_value; i++) {
        let td_trails = $('<td>').html('Trial '+ i)
        tr_trials.append(td_trails)
      }
      for (let i = 1; i <= trial_count_input_value; i++) {
        let td_trails = $('<td>').html('Trial '+ i)
        tr_trials.append(td_trails)
      }
      table_head.append(tr_trials)
    }
  }catch(e){
    console.log(e);
  }

  
}

function deleteRow(tableID) {
  try {
    var table = document.getElementById(tableID);
    let tableNumber = tableID.replace('TbodyTable', '')
    var rowCount = table.rows.length;			
    if(rowCount-1 === 0){
      let array_colspan = [[7],[1,1,1,1,1,1,1],[1,1,1,1,1,1,1],[1,1,1,1,1]]
      $('#table'+tableNumber+' thead').children().last().remove()
      let thead_tr = $('#table'+tableNumber+' thead').children()
      for (let i = 0; i < thead_tr.length; i++) {
        let thead_tr_td = $(thead_tr[i]).children();
        for (let ii = 0; ii < thead_tr_td.length; ii++) {
          let td = $(thead_tr_td[ii]);
          td.attr('colspan', array_colspan[i][ii])
        }
        
      }
    }
    if(rowCount==0){
      console.log('No more row to delete')
    }else{
      table.deleteRow(rowCount-1);
      console.log("table.rows.length "+table.rows.length);
      rowOfTable = table.rows.length;
      linearityTestNumberOfRow -= 1;
    }
  }catch(e) {
    console.log(e);
  }
}

function delete_row_specific(row_number, table_number){
  let row_count = $('#table' + table_number + ' tbody').children().length

  if(row_count-1 === 0){
    let array_colspan = [[7],[1,1,1,1,1,1,1],[1,1,1,1,1,1,1],[1,1,1,1,1]]
    $('#table'+table_number+' thead').children().last().remove()
    let thead_tr = $('#table'+table_number+' thead').children()
    for (let i = 0; i < thead_tr.length; i++) {
      let thead_tr_td = $(thead_tr[i]).children();
      for (let ii = 0; ii < thead_tr_td.length; ii++) {
        let td = $(thead_tr_td[ii]);
        td.attr('colspan', array_colspan[i][ii])
      }
      
    }
  }
  if(row_count === 0){
    console.log('No more row to delete')
  }

  let suffix = 'TbodyTable'+ table_number + 'Row' +row_number
  let old_row = ''
  let old_table = ''

  let ids = [
    'testPoint',
    'resolution',
    'standardUsed',
    'temperatureSource',
    'correction',
    'UUCtrial1',
    'UUCtrial2',
    'UUCtrial3',
    'standardTrial1',
    'standardTrial2',
    'standardTrial3'
  ]

  let old_id;
  let row_to_delete;
  for (let i = 0; i < ids.length; i++) {
    let element_id =  ids[i] + suffix;
    let element = $('#' + element_id);
    old_id = element.attr('id')
    element.attr('id', old_id + '_old')
    element.attr('name', old_id + '_old')
    if(i===0){
      row_to_delete = $('#' + old_id + '_old').parent().parent().parent()
      old_row = $(row_to_delete).data('row')
      old_table = $(row_to_delete).data('table')
    }
  }

  // $(row_to_delete).remove();
  $("tr[data-row='"+old_row+"'][data-table='"+old_table+"']").remove()

  for (let i = (Number(row_number) + 1); i <= row_count; i++) {
    let suffix_per_row = 'TbodyTable'+ table_number + 'Row' + i
    let suffix_replacement = 'TbodyTable'+ table_number + 'Row' + (i - 1)
    for (let ii = 0; ii < ids.length; ii++) {
      if(ii===0){
        tr_toRename = $('#' + ids[ii] + suffix_per_row).parent().parent().parent()
        tr_toRename.attr('data-table', table_number)
        tr_toRename.attr('data-row', (i - 1))
      }
      let id_replacement = ids[ii] + suffix_replacement;
      let element_id =  ids[ii] + suffix_per_row;
      let element = $('#' + element_id);
      element.attr('id', id_replacement)
      element.attr('name', id_replacement)
    }
  }

}


function filterDataDynamic(searchingFor, searchIn, UnfilteredArray){
  let filteredDATA = UnfilteredArray.filter(function (e) {
  if (searchingFor != '' ) {
    return e[searchIn] == searchingFor;
    }else{
              return e[searchIn] != searchingFor;
          }
  });
  return filteredDATA;
}

function correctionFromCert(midValue, serialNum, standardArray){	

  var details = filterDataDynamic(serialNum,'serialNumber',standard)
  if(!details[0].standard.includes('PRT') && !details[0].standard.includes('Platinum Resistance Thermometer with Digital Readout')){
      console.log('Check Standard Used: Not PRT (Correction From Certificate)');
      return 0;
  }

  var arrayofTemp = [];
  var sortedArrayofTemp = [];
  let mid = midValue;
  let midIndex;
  var arrayOfSet = filterDataDynamic(serialNum,'serialNumber',standardArray)

  for(x=0;x<arrayOfSet.length;x++){
  if (arrayOfSet[x].serialNumber == serialNum) {
    if (arrayOfSet[x].unit == "Temperature") {
      arrayofTemp.push({
        TP:	arrayOfSet[x].testPoint,
        Corr : arrayOfSet[x].correction
      });
    }
  }
  };
  sortedArrayofTemp = arrayofTemp.sort(function(a, b){return a.TP - b.TP});
  for(var i=0; i<sortedArrayofTemp.length; i++) {
  if(sortedArrayofTemp[i].TP == mid) {
    // midIndex is set to the index of the element
    midIndex = i;
    break;
  }
  };
  if(midIndex == undefined){
  return interpolationCorr(midValue, serialNum, standardArray);
  }else{
  return sortedArrayofTemp[midIndex].Corr;
  }
}

function getReadout(serialNum, standardArray){
  var arrayOfReadout = [];
  for(x=0;x<standardArray.length;x++){
    if (standardArray[x].serialNumber == serialNum) {
      if (standardArray[x].unit == "Temperature") {
        let readout = Number(standardArray[x].readoutStandardUncertaintyFromCertificate) == NaN ? 0 : Number(standardArray[x].readoutStandardUncertaintyFromCertificate);
        arrayOfReadout.push(
          readout
        );
      }
    }
  };
  return Math.max(...arrayOfReadout);
}

function getPRTstandardUncertainty(serialNum, standardArray){
  var arrayOfPrtUncert = [];
  for(x=0;x<standardArray.length;x++){
    if (standardArray[x].serialNumber == serialNum) {
      if (standardArray[x].unit == "Temperature") {
        var uncert = standardArray[x].uncertainty;
        if(uncert.length > 0){
          arrayOfPrtUncert.push(
            parseFloat(standardArray[x].uncertainty)
          );
        }
      }
    }
  };
  return Math.max(...arrayOfPrtUncert);
}

function getDriftNextHigher(testPointVal, array_drift){
  let testPointNumber = Number(testPointVal)

  let drift = 0;
  let driftChanged = false;

  let array_testpoints = [];

  array_drift.forEach(item=>{
      array_testpoints.push(Number(item.testPoint))
      if(item.testPoint == testPointNumber){
          drift = item.drift
          driftChanged = true;
      }
  })
  if(!driftChanged){
      array_testpoints.push(testPointNumber)
      array_testpoints = array_testpoints.sort(function(a,b) {
        return (+a) - (+b);
      });
      let indexOfTestPoint = array_testpoints.indexOf(testPointNumber)
      let nextHigherTestPoint;
      if(indexOfTestPoint == array_testpoints.length-1){
          nextHigherTestPoint = indexOfTestPoint - 1
      }else{
          nextHigherTestPoint = indexOfTestPoint + 1
      }
      let testpointToGetDrift = array_testpoints[nextHigherTestPoint]

      array_drift.forEach(item=>{
          array_testpoints.push(item.testPoint)
          if(item.testPoint == testpointToGetDrift){
              drift = item.drift
          }
      })
  
  }
  return Number(drift);
}
function getUncertaintyNextHigher(testPointVal, array_uncertainty){
  let testPointNumber = Number(testPointVal)

  let uncertainty = 0;
  let uncertaintyChanged = false;

  let array_testpoints = [];

  array_uncertainty.forEach(item=>{
      array_testpoints.push(Number(item.testPoint))
      if(item.testPoint == testPointNumber){
          uncertainty = item.uncertainty
          uncertaintyChanged = true;
      }
  })
  if(!uncertaintyChanged){
      array_testpoints.push(testPointNumber)
      array_testpoints = array_testpoints.sort(function(a,b) {
        return (+a) - (+b);
      });
      let indexOfTestPoint = array_testpoints.indexOf(testPointNumber)
      let nextHigherTestPoint;
      if(indexOfTestPoint == array_testpoints.length-1){
          nextHigherTestPoint = indexOfTestPoint - 1
      }else{
          nextHigherTestPoint = indexOfTestPoint + 1
      }
      let testpointToGetDrift = array_testpoints[nextHigherTestPoint]

      array_uncertainty.forEach(item=>{
          array_testpoints.push(item.testPoint)
          if(item.testPoint == testpointToGetDrift){
              uncertainty = item.uncertainty
          }
      })
  
  }
  return Number(uncertainty);
}


function getDriftPRT(serialNum, driftArray, detailsArray, rowNumber){
  var details = filterDataDynamic(serialNum,'serialNumber',detailsArray)
  if(!details[0].standard.includes('PRT') && !details[0].standard.includes('Platinum Resistance Thermometer with Digital Readout')){
      console.log('Check Standard Used in Row '+rowNumber+': Not PRT (Drift)');
      return 0;
  }
  var arrayOfPrtDrift = [];
  for(x=0;x<driftArray.length;x++){
    if (driftArray[x].serialNumber == serialNum) {
      var drift = driftArray[x].drift;
      if(drift.length > 0){
        arrayOfPrtDrift.push(
          parseFloat(driftArray[x].drift)
        );
      }
    }
  };
  return Math.max(...arrayOfPrtDrift);
}

function getBathInstability(code, tempSource){
  for(x=0;x<tempSource.length;x++){
    if (tempSource[x].id == code) {
      return parseFloat(tempSource[x].maxInstability)/Math.sqrt(3);
    }
  };
}
function getAxialHomo(code, tempSource){
  for(x=0;x<tempSource.length;x++){
    if (tempSource[x].id == code) {
      return parseFloat(tempSource[x].maxAxial)/Math.sqrt(3);
    }
  };
}
function getRadialHomo(code, tempSource){
  for(x=0;x<tempSource.length;x++){
    if (tempSource[x].id == code) {
      return parseFloat(tempSource[x].maxRadial)/Math.sqrt(3);
    }
  };
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

function calculateValues(){
  let calculatedArray = [];

  let divOfTables = document.getElementById('measurementDataTables');
  let countOfTables = divOfTables.childElementCount;

  for (let i = 1; i <= countOfTables; i++) {
      let tableArray = {};
      let table = document.getElementById('table'+i); 
      let tbody = table.children['TbodyTable'+i]
      let tableNumberOfRows = tbody.childElementCount;

      tableArray['table'+i] = {};

      for (let x = 0; x < tableNumberOfRows; x++) {
        let tbodyRow = tbody.childNodes[x];
        let tbodyRowStart = tbody.childNodes[0];
        let tbodyRowEnd = tbody.childNodes[tableNumberOfRows-1];

        let uucTrialArray = [
            Number(tbodyRow.querySelector('#UUCtrial1TbodyTable'+i+'Row'+(x+1)).value),
            Number(tbodyRow.querySelector('#UUCtrial2TbodyTable'+i+'Row'+(x+1)).value),
            Number(tbodyRow.querySelector('#UUCtrial3TbodyTable'+i+'Row'+(x+1)).value),
        ];
        let standardTrialArray = [
            Number(tbodyRow.querySelector('#standardTrial1TbodyTable'+i+'Row'+(x+1)).value),
            Number(tbodyRow.querySelector('#standardTrial2TbodyTable'+i+'Row'+(x+1)).value),
            Number(tbodyRow.querySelector('#standardTrial3TbodyTable'+i+'Row'+(x+1)).value),
        ];

        let uucTrialArrayStart = [
            Number(tbodyRowStart.querySelector('#UUCtrial1TbodyTable'+i+'Row'+(1)).value),
            Number(tbodyRowStart.querySelector('#UUCtrial2TbodyTable'+i+'Row'+(1)).value),
            Number(tbodyRowStart.querySelector('#UUCtrial3TbodyTable'+i+'Row'+(1)).value),
        ];
        let uucTrialArrayEnd = [
            Number(tbodyRowEnd.querySelector('#UUCtrial1TbodyTable'+i+'Row'+(tableNumberOfRows)).value),
            Number(tbodyRowEnd.querySelector('#UUCtrial2TbodyTable'+i+'Row'+(tableNumberOfRows)).value),
            Number(tbodyRowEnd.querySelector('#UUCtrial3TbodyTable'+i+'Row'+(tableNumberOfRows)).value),
        ];

        let standardTrialArrayStart = [
            Number(tbodyRowStart.querySelector('#standardTrial1TbodyTable'+i+'Row'+(1)).value),
            Number(tbodyRowStart.querySelector('#standardTrial2TbodyTable'+i+'Row'+(1)).value),
            Number(tbodyRowStart.querySelector('#standardTrial3TbodyTable'+i+'Row'+(1)).value),
        ];
        let standardTrialArrayEnd = [
            Number(tbodyRowEnd.querySelector('#standardTrial1TbodyTable'+i+'Row'+(tableNumberOfRows)).value),
            Number(tbodyRowEnd.querySelector('#standardTrial2TbodyTable'+i+'Row'+(tableNumberOfRows)).value),
            Number(tbodyRowEnd.querySelector('#standardTrial3TbodyTable'+i+'Row'+(tableNumberOfRows)).value),
        ];


        const getSelectedStandardValue = (standardUsed) => {
          let array_selected = [];
          standardValue.forEach(items=>{
            if(items.serialNumber == standardUsed){
              array_selected.push(items)
            }
          })
          return array_selected;
        }


       

        let uucResolution = document.getElementById('resolution').value;
        let perTestPoint_resolution = tbodyRow.querySelector('#resolutionTbodyTable'+i+'Row'+(x+1)).value;
        uucResolution = perTestPoint_resolution == '' ? uucResolution : perTestPoint_resolution;
        let readability = document.getElementById('readability').value;
        let testPoint = Number(tbodyRow.querySelector('#testPointTbodyTable'+i+'Row'+(x+1)).value);
        let standardUsed = tbodyRow.querySelector('#standardUsedTbodyTable'+i+'Row'+(x+1)).value;
        let correction = tbodyRow.querySelector('#correctionTbodyTable'+i+'Row'+(x+1)).value;
        let standardUsed_resolutiontemp = $('#standardUsedTbodyTable'+i+'Row'+(x+1)).find(':selected').data('resolutiontemp');
        let standardUsed_resolutionrh = $('#standardUsedTbodyTable'+i+'Row'+(x+1)).find(':selected').data('resolutionrh');
        
        let tempSourceId = tbodyRow.querySelector('#temperatureSourceTbodyTable'+i+'Row'+(x+1)).value;

        let selectedStandardValues = getSelectedStandardValue(standardUsed);

        let testPointStart = Number(tbodyRowStart.querySelector('#testPointTbodyTable'+i+'Row'+(1)).value);
        let testPointEnd = Number(tbodyRowEnd.querySelector('#testPointTbodyTable'+i+'Row'+(tableNumberOfRows)).value);
        let standardUsedStart = tbodyRowStart.querySelector('#standardUsedTbodyTable'+i+'Row'+(1)).value;
        let standardUsedEnd = tbodyRowEnd.querySelector('#standardUsedTbodyTable'+i+'Row'+(tableNumberOfRows)).value;
                        
        let correctionFromCertificate = correctionFromCert(testPoint, standardUsed, standardValue); // interpolation calculated if correction not found
        let readoutStandardUncertainty = getReadout(standardUsed, standardValue); //**not confirmed** get largest readout from standard
        //let PRTstandardUncertainty = getPRTstandardUncertainty(standardUsed, standardValue); //get largest uncertainty from standard
        //let drift = getDriftPRT(standardUsed, driftValuePRT, standard,x); //get largest drift from standard
        let PRTstandardUncertainty = getUncertaintyNextHigher(testPoint, selectedStandardValues) // get next higher uncertainty from standard
        let drift = getDriftNextHigher(testPoint, selectedStandardValues); // get next higher drift from standard

        let bathInstability = getBathInstability(tempSourceId, temperatureSource);
        let axialHomogenity = getAxialHomo(tempSourceId, temperatureSource);
        let radialHomogenity = getRadialHomo(tempSourceId, temperatureSource);
        
        let uucTrialAverage = average(uucTrialArray);
        let standardTrialAverage = average(standardTrialArray);

        let uncUUCResolution = UncUUCReso(uucResolution, readability);
        let uncStandardPRT = PRTstandardUncertainty/2;

        let uucStdDev = standardDev(uucTrialArray);
        let standardStdDev = standardDev(standardTrialArray);
        let correctedOfValue = correctedValue(standardTrialAverage, correctionFromCertificate);
        let correctedValue_input = correctedValue(standardTrialAverage, correction);
        let UncRepeatabilityUUC = UncRepeatability(uucStdDev);
        let UncRepeatabilityStandard = UncRepeatability(standardStdDev);
        let UncReadoutStandardUncertainty = UncStandardReadout(readoutStandardUncertainty);
        let UncertaintyDrift = UncDrift(drift);

        const hysteresisValue = (arrayUUCStart,arrayUUCEnd,arraySTDStart,arraySTDEnd,startPoint,endPoint,standardUsedStart,standardUsedEnd,arrayStandardValues) => {
            let uucAverageStart = average(arrayUUCStart);
            let uucAverageEnd = average(arrayUUCEnd);

            let standardAverageStart = average(arraySTDStart);
            let standardAverageEnd = average(arraySTDEnd);

            let correctionFromCertificateStart = correctionFromCert(startPoint, standardUsedStart, arrayStandardValues); 
            let correctionFromCertificateEnd = correctionFromCert(endPoint, standardUsedEnd, arrayStandardValues); 

            let correctedValueStart = correctedValue(standardAverageStart, correctionFromCertificateStart);
            let correctedValueEnd = correctedValue(standardAverageEnd, correctionFromCertificateEnd);

            return hysteresis({
            uucReadingAve1:Number(uucAverageStart),
            uucReadingAve2:Number(uucAverageEnd),
            correctedValue1:Number(correctedValueStart),
            correctedValue2:Number(correctedValueEnd),
            });

        }

        let hyst = hysteresisValue(uucTrialArrayStart,uucTrialArrayEnd,standardTrialArrayStart,standardTrialArrayEnd,testPointStart,testPointEnd,standardUsedStart,standardUsedEnd,standardValue);
        let combinedUncert = combinedUncertainty(uncUUCResolution,UncRepeatabilityStandard,UncRepeatabilityUUC,UncReadoutStandardUncertainty,UncertaintyDrift,bathInstability,axialHomogenity,radialHomogenity,hyst,uncStandardPRT)
        let veffect = vEffective(combinedUncert,uncUUCResolution,UncRepeatabilityStandard,UncRepeatabilityUUC,uncStandardPRT,UncertaintyDrift,bathInstability,axialHomogenity,radialHomogenity,hyst)
        let k = calculateK(veffect);
        let expandUncert = expandedUncertainty(combinedUncert, k);

        tableArray['table'+i]['row'+(x+1)] = {};
        tableArray['table'+i]['row'+(x+1)]['testPoint'] = testPoint;
        tableArray['table'+i]['row'+(x+1)]['uucTrialArray'] = uucTrialArray;
        tableArray['table'+i]['row'+(x+1)]['standardTrialArray'] = standardTrialArray;
        tableArray['table'+i]['row'+(x+1)]['uucTrialAverage'] = uucTrialAverage;
        tableArray['table'+i]['row'+(x+1)]['standardTrialAverage'] = standardTrialAverage;
        tableArray['table'+i]['row'+(x+1)]['uucStdDev'] = uucStdDev;
        tableArray['table'+i]['row'+(x+1)]['uncStandardPRT'] = uncStandardPRT;
        tableArray['table'+i]['row'+(x+1)]['standardStdDev'] = standardStdDev;
        tableArray['table'+i]['row'+(x+1)]['uncUUCResolution'] = uncUUCResolution;
        tableArray['table'+i]['row'+(x+1)]['UncRepeatabilityUUC'] = UncRepeatabilityUUC;
        tableArray['table'+i]['row'+(x+1)]['UncRepeatabilityStandard'] = UncRepeatabilityStandard;
        tableArray['table'+i]['row'+(x+1)]['correctionFromCertificate'] = correctionFromCertificate;
        tableArray['table'+i]['row'+(x+1)]['correction'] = correction;
        
        tableArray['table'+i]['row'+(x+1)]['correctedValue'] = correctedOfValue;
        tableArray['table'+i]['row'+(x+1)]['correctedValue_input'] = correctedValue_input;
        
        tableArray['table'+i]['row'+(x+1)]['readoutStandardUncertainty'] = readoutStandardUncertainty;
        tableArray['table'+i]['row'+(x+1)]['UncReadoutStandardUncertainty'] = UncReadoutStandardUncertainty;
        tableArray['table'+i]['row'+(x+1)]['PRTstandardUncertainty'] = PRTstandardUncertainty;
        tableArray['table'+i]['row'+(x+1)]['drift'] = drift;
        tableArray['table'+i]['row'+(x+1)]['UncDrift'] = UncertaintyDrift;
        tableArray['table'+i]['row'+(x+1)]['bathInstability'] = bathInstability;
        tableArray['table'+i]['row'+(x+1)]['axialHomogenity'] = axialHomogenity;
        tableArray['table'+i]['row'+(x+1)]['radialHomogenity'] = radialHomogenity;
        tableArray['table'+i]['row'+(x+1)]['hysteresis'] = hyst;
        tableArray['table'+i]['row'+(x+1)]['combinedUncertainty'] = combinedUncert;
        tableArray['table'+i]['row'+(x+1)]['veffect'] = veffect; 
        tableArray['table'+i]['row'+(x+1)]['k'] = k;  
        tableArray['table'+i]['row'+(x+1)]['expandedUncertainty'] = expandUncert; 
        tableArray['table'+i]['row'+(x+1)]['tempSourceId'] = tempSourceId; 
        tableArray['table'+i]['row'+(x+1)]['standardUsed'] = standardUsed; 
        tableArray['table'+i]['row'+(x+1)]['resolutiontemp'] = standardUsed_resolutiontemp; 
        tableArray['table'+i]['row'+(x+1)]['resolutionrh'] = standardUsed_resolutionrh; 
        

                
      }
      calculatedArray.push(tableArray);
  }
  $('#calculatedData').val(JSON.stringify(calculatedArray))
  addToUncertaintyBudgetTable()  
}

function addToUncertaintyBudgetTable(){
  $('#uncertBudgetTBody').html('');
  let uncBudgetTbody = $('#uncertBudgetTBody');
  let CalData = JSON.parse($('#calculatedData').val());

  let countofTable = CalData.length;
  for (let i = 0; i < countofTable; i++) {
    let tableName = 'table'+(i+1);
    let countOfRows = Object.keys(CalData[i][tableName]).length;
    for (let x = 1; x <= countOfRows; x++) {
      let rowName = 'row'+x;
               
      let tr = $('<tr>');
      let td1 = $('<td>').html(CalData[i][tableName][rowName]['testPoint'])
      let td2 = $('<td>').html(CalData[i][tableName][rowName]['uncUUCResolution'])
      let td3 = $('<td>').html(CalData[i][tableName][rowName]['UncRepeatabilityStandard'])
      let td4 = $('<td>').html(CalData[i][tableName][rowName]['UncRepeatabilityUUC'])
      let td5 = $('<td>').html(CalData[i][tableName][rowName]['uncStandardPRT'])
      let td6 = $('<td>').html(CalData[i][tableName][rowName]['UncDrift'])
      let td7 = $('<td>').html(CalData[i][tableName][rowName]['bathInstability'])
      let td8 = $('<td>').html(CalData[i][tableName][rowName]['axialHomogenity'])
      let td9 = $('<td>').html(CalData[i][tableName][rowName]['radialHomogenity'])
      let td10 = $('<td>').html(CalData[i][tableName][rowName]['hysteresis'])
      let td11 = $('<td>').html(CalData[i][tableName][rowName]['combinedUncertainty'])
      let td12 = $('<td>').html(CalData[i][tableName][rowName]['veffect'])
      let td13 = $('<td>').html(CalData[i][tableName][rowName]['k'])
      let td14 = $('<td>').html(CalData[i][tableName][rowName]['expandedUncertainty'])

      $(uncBudgetTbody).append(
        $(tr).append(td1,td2,td3,td4,td5,td6,td7,td8,td9,td10,td11,td12,td13,td14)
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
      if($(this).attr('type') == 'radio'){
        if($(this).prop('checked') == true){
          equipmentValues[key] = 'checked';
        }else{
          equipmentValues[key] = value;
        }
      }
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
    if($(this).attr('type') == 'radio'){
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
      url: "/digitalThermometer/add_New_Worksheet_Data",
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
          window.location.href = "/digitalThermometer/worksheet/"+JSON.parse(result).id;

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
    if($(this).attr('type') == 'radio'){
      if($(this).prop('checked') == true){
        equipmentValues[key] = 'checked';
      }else{
        equipmentValues[key] = value;
      }
    }
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
    if($(this).attr('type') == 'radio'){
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
      url: "/digitalThermometer/update_Worksheet_Data",
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


function usePreviousDataAddRows(){
  let tbody = $('#previousDataModalTableTbody');
  $.ajax({
      cache: false,
      type: "post",
      url: "/digitalThermometer/get_data_for_previous_table",
      success: function(result) {
          tbody.html('');
          let previousData = result.previousData;
          previousData.forEach(items => {
              let tr = $('<tr>');
              let tdId = $('<td>').html(items.id).addClass('d-none');
              let tdcertNum = $('<td>').html(items.certificateNumber);
              let tdButton = $('<td>').append(
                  $('<button>').attr('type', 'button').addClass('btn btn-success').attr('data-bs-dismiss', 'modal').html('Use').on('click', function(){
                      usePreviousDataAddData(items.id)
                  })
              )
              tr.append(tdId, tdcertNum, tdButton)
              tbody.append(tr)
          })
          $('#previousDataModalTable').DataTable({
              "order": [[ 0, "desc" ]]
          });
      },
      error: function (error) {
          console.log(error);
      },
  })
}

function usePreviousDataAddData(id){
  let idOfCertificate = id;
  $.ajax({
      cache: false,
      type: "post",
      url: "/digitalThermometer/get_data_by_id",
      data: {
          'idOfCertificate' : idOfCertificate,
      },
      success: function(result) {
        if(result.worksheetData['standard'] != null){
          selectStandardFromData(result.worksheetData['standard']);
          $('#modalStandardSelect').trigger('click')
        }
        
        let numberOfTable = countKeysWithPattern(result.worksheetData['dataInputs'], 'numberOfTables'); 

        for (let i = 1; i <= numberOfTable; i++) {
              $('#addButtonMeasurementTables').trigger('click')
              let numberOfRowsPerTable = countKeysWithPattern(result.worksheetData['dataInputs'], 'testPointTbodyTable'+i+'Row');
              for (let x = 0; x < numberOfRowsPerTable; x++) {
                  $('#addButtonTable'+i).trigger('click')
              }                    
        }
            
          let infoArray = ['customerInfo', 'equipmentInfo', 'environmentInfo', 'dataInputs'];
          let blacklistID = ['certificateNumber', 'customer', 'address', 'tsrNumber']
          for (let i = 0; i < infoArray.length; i++) {
              let infoValues = JSON.parse(result.worksheetData[infoArray[i]]);
              let keys = Object.keys(infoValues);
              for (let x = 0; x < keys.length; x++) {
                  let id = keys[x];
                  if(blacklistID.includes(id)){
                      continue;
                  }else(
                      $('#'+id).val(infoValues[id])
                  )



              }
          }


      },
      error: function (error) {
          console.log(error);
      },
  })
}