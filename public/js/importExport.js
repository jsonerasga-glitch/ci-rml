$( document ).ready(function() {
  bindToElements();  
});



async function get_sample_id(id){
  let url = '/TSR/get_request_sample_id';
  let res;
  await $.ajax({
    cache: false,
    type: "post",
    url: url,
    data: {
        'sampleID' : id,
    }, 
  })
  .done(function(result){
    res = result.sampleData;
  })
  .fail(function(error){
    console.log(error)
  })
  return res;
}

async function get_reference_data(referenceNumber){
  let url = '/TSR/reference_data';
  let res;
  await $.ajax({
    cache: false,
    type: "post",
    url: url,
    data: {
        'request_number' : referenceNumber,
    }, 
  })
  .done(function(result){
    res = result.request_data;
  })
  .fail(function(error){
    console.log(error)
  })
  return res;
}


function encode(str) {
  const utf8Bytes = new TextEncoder().encode(str);
  const binaryString = String.fromCharCode(...utf8Bytes);
  return btoa(binaryString);
}

function decode(str) {
  const binaryString = atob(str);
  const bytes = Uint8Array.from(binaryString, char => char.charCodeAt(0));
  return new TextDecoder().decode(bytes);
}

async function exportData(referenceNumber){
    let spinner = '<div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div>'
    try {
      $("#exportButton").html(spinner)
      await addReferenceToDatabase(referenceNumber)
    

      let dataSamples = dataFromAPI[referenceNumber]['samples'];
      let samplesCount = dataSamples.length;
      let request_samples_data = [];
      let is_valid = true;
      for (let i = 0; i < samplesCount; i++) {
        let sampleId = dataFromAPI[referenceNumber]['samples'][i]['id'];
        let result = await get_sample_id(sampleId)
        if(result != null){
          request_samples_data.push(result)
        }else{
          let null_data = {
            "id"	:	null,
            "sampleID":sampleId,
            "requestReferenceNumber":referenceNumber,
          }
          request_samples_data.push(null_data)
          if(samplesCount == 1){
            is_valid = false;
          }else{
            is_valid = "with_null";
          }
        }
      }
    
      if(is_valid){
        let data_with_reference = {
          "data":dataFromAPI[referenceNumber],
          "reference":request_samples_data
        }
        let string_data = JSON.stringify(data_with_reference);
        let encoded_data = encode(string_data);
        let dataUri = "data:application/json;base64," + encoded_data;

        let with_null_text = "Download Availble with Partial Data : ";
        let is_valid_text = "Download Available : ";
    
        $('#exportButton').removeClass('disabled')
        $("#exportButton").attr({        
          'href': dataUri,
          'target': '_blank',
          'download': referenceNumber+'.json',
        })
        if(is_valid == 'with_null'){
          $("#exportButton").html(with_null_text + referenceNumber)
        }else{
          $("#exportButton").html(is_valid_text + referenceNumber)
        }
      }else{
        $("#exportButton").html("Download Not Available")
      }
    } catch (error) {
      console.log(error)
    }
}

async function exportData_standard(){
  let spinner = '<div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div>'
  try {
    $("#getStandardButton").html(spinner)

    $.ajax({
      cache: false,
      type: "post",
      url: "/TSR/standard_update",

    })
    .done(function(result){
      let data_with_reference = result.data;
      let string_data = JSON.stringify(data_with_reference);
      //let encoded_data = encode(string_data);
      let encoded_data = string_data;
      // let dataUri = "data:application/json;base64," + encoded_data;
      let dataUri = '/std_json/std.json';

      let with_null_text = "Download Availble with Partial Data : ";
      let is_valid_text = "Download Available : ";

      let today = new Date();
    
      $('#exportStandardButton').removeClass('disabled')
      $("#exportStandardButton").attr({        
        'href': dataUri,
        'target': '_blank',
        'download': today+"_standard-data"+'.json',
      })
      $("#getStandardButton").html("Export Standard Data")
      //$("#exportStandardButton").trigger('click')
    })
    .fail(function(error) {
      console.log(error);
      $("#getStandardButton").html("Error fetching Standard Data")
    })
  } catch (error) {
    console.log(error)
  }
}



async function importData(){
    let spinner = '<div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div>'

    let file_element = $('#tsrFileJson')
    const file = file_element[0].files[0];
    let to_decode_string = await new Promise((resolve, reject) => {
        const reader = new FileReader();

        reader.onload = function (e) {
            const string_data = e.target.result;
            resolve(string_data);
        };

        reader.onerror = function (e) {
            reject(e.target.error);
        };

        reader.readAsText(file);
    });
    
    let parsed_string = JSON.parse(to_decode_string)
    
    let reference = parsed_string.reference
    let data = parsed_string.data
    let url = '/TSR/samplePerRequestIDImport'

    let reference_count = reference.length;
    let referenceNumber = data.requestRefNum

    $("#importFromFile").html(spinner)

    for (let i = 0; i < reference_count; i++) {
      await $.ajax({
        cache: false,
        type: "post",
        url: url,
        data: {
          'id':reference[i].id,
          'sampleID':reference[i].sampleID,
          'requestReferenceNumber':reference[i].requestReferenceNumber,
          'sampleCode':reference[i].sampleCode,
          'worksheetType':reference[i].worksheetType,
          'worksheetID':reference[i].worksheetID,
          'rawData':reference[i].rawData,
        }
      })
      .done(function(result){
        console.log('imported successfully')
        $("#importFromFile").html("Import Successful")
      })
      .fail(function(error){
        console.log(error)
        alert('cant import reference')
        $("#importFromFile").html("Import Error")
      })
    }

    addReferenceToDatabaseImport(referenceNumber, data)
    
}


function bindToElements(){
    $("#importFromFile").on('click',function(){
      importData()
    })
    $("#updateAdd").on('click',function(){
      get_updated_data()
    })
    $("#exportUpdated").on('click',function(){
      export_updated_data()
    })
    $("#importFromOffline").on('click',function(){
      update_server_data()
    })   

    $("#getStandardButton").on('click',function(){
      exportData_standard()
    })  
    
    
}

async function addWorksheetReferenceImport(url, id, customerInfo, equipmentInfo, referenceNumber, worksheetUsed, sampleCode, rawData){
  let in_databse;
  try {
    await checkIfInDatabase(id)
    .then((data) => {
      in_databse = data.isInDB;
    })
    console.log(in_databse)
  } catch (error) {
    console.log(error); 
  }
  
  if(in_databse){
    try {
      const addWorksheet = await $.ajax({
        cache: false,
        type: "post",
        url: url,
        data: {
            'customerInfo' : customerInfo,
            'equipmentInfo' :equipmentInfo,
        }, 
      });
  
      const getReference = await $.ajax({
        cache: false,
        url: "/TSR/get_request_sample_id",
        method: 'POST',
        data: {
          'sampleID': id,
          'worksheetType': worksheetUsed,
        },
      });
  
      const updateID = await $.ajax({
        cache: false,
        url: "/TSR/updateTSRIDImport",
        method: 'POST',
        data: {
          'lan_ID': getReference.lan_ID,
          'this_ID':addWorksheet.worksheetID,
          'reference_id': getReference.reference_id,
          'worksheetUsed': worksheetUsed,
        },
      });
    } catch (error) {
      // Handle any errors that occurred
      console.log(error); 
    }
  }
}

async function addReferenceToDatabaseImport(referenceNumber, data){
  let sampleCount = data['samples'].length;
  for (let i = 0; i < sampleCount; i++) {

    let customerName = data['customerName'];
    let requestDate = data['requestDate'];
    let requestRefNum = data['requestRefNum'];
    let address = data['address'];
    let sampleID = data['samples'][i]['id'];
    let sampleName = data['samples'][i]['sampleName']
    let sampleCode = data['samples'][i]['sampleCode'];
    let description = data['samples'][i]['description'];

    let descArray =  description
      .replaceAll('\r\n', "(SPACE)")
      .replaceAll(/\s*:\s*/g, '(COLON)')
      .replaceAll(/\b(?<=CP)\-/g, '(COLON)')
      .replaceAll(/\bno\.\s(?!\(COLON\))/gi, 'NuMbeR')
      .replaceAll(/\bno\.(?=\(COLON\))/gi, 'NuMbeR')
      .replaceAll(/\bNuMbeR\(COLON\)|\bNuMbeR\s|\bNuMbeR/g, '(COLON)')
      .replaceAll(/\bCert\.?\s/gi, 'Certificate')
      .replaceAll(/\bSerial\s/gi, 'Serial')
      .split(/\b\(SPACE\)/)
      .flatMap(item => item.split(/\b\(COLON\)/).map(word => word.trim()))
        
    let descriptionObject = arrayToObject(descArray)

    let isThereAWorksheet = checkArrayForString(arrayOfWorksheets, sampleName);
    let worksheetUsed = isThereAWorksheet.found;
    let url = object_linksToWorksheet[worksheetUsed]
    
    let customerData = {
      "customer":customerName,
      "address":address,
      "tsrNumber":requestRefNum,
      "dateReceived":requestDate,
    }
    let customerInfo = JSON.stringify(customerData);
    let equipmentData = {
      "certificateNumber": descriptionObject.Certificate,
      "equipmentDescription": worksheetUsed,
      "manufacturer": descriptionObject.Manufacturer,
      "modelNumber": descriptionObject.Model,
      "serialNumber": descriptionObject.Serial,
      "equipmentId": descriptionObject.EquipmentId,
    }
    let equipmentInfo = JSON.stringify(equipmentData);
    let rawData = JSON.stringify(data['samples'][i]);

    await addWorksheetReferenceImport(url, sampleID, customerInfo, equipmentInfo, referenceNumber, worksheetUsed, sampleCode, rawData)
    
  } 
  refreshStatus(referenceNumber)
  return 1;
}


function get_updated_data(){
  let url = "/TSR/request_samples"
   $.ajax({
    cache: false,
    type: "post",
    url: url,
  })
  .done(function(result){
    console.log(result)


    let tbody = $('#in_db_table tbody');
    let requestCount = result.data.data.length

    for (let i = 0; i < requestCount; i++) {
      let requestReferenceNumber = result.data.data[i].requestReferenceNumber
      let worksheetType = result.data.data[i].worksheetType
      let tr = $("<tr>");
      let requestReferenceNumberTD = $("<td>").html(requestReferenceNumber)
      let worksheetTypeTD = $("<td>").html(worksheetType)
      tr.append(requestReferenceNumberTD, worksheetTypeTD)
      tbody.append(tr)
    }
    

  })
  .fail(function(error){
    console.log(error)
  })
  
  
}


async function check_extra(referenceNumber, worksheetType){
  let url = "/TSR/have_extra_worksheet";
  let updated_data = [];
  let have_extra = await $.ajax({
    cache: false,
    method: "POST",
    url: url,
    data:{
      'referenceNumber': referenceNumber,
      'worksheetType' : worksheetType,
    }
  })
  .done(function(result){
    console.log(result)
    return result.with_extra 
  })
  .fail(function(error){
    console.log(error)
  })
  return have_extra;
}

// async function export_updated_data(referenceNumber){
async function export_updated_data(){
  let spinner = '<div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div>'

  $("#exportUpdatedDownload").html(spinner)

  //let reference_data = await get_reference_data(referenceNumber)

  let array_worksheetType = []
  let updated_data_by_type = {};
  let reference_data_per_type = {};
  let all_reference;

  let sampleID;
  let worksheetID;
  let worksheetType;



  

  await $.ajax({
    cache: false,
    method: "POST",
    url: '/TSR/request_samples',
  })
  .done(function(result){
    all_reference = result.data
  })
  .fail(function(error){
    console.log(error)
  })


  for (let i = 0; i < all_reference.data.length; i++) {
    sampleID = all_reference.data[i].sampleID;
    worksheetID = all_reference.data[i].worksheetID;
    worksheetType = all_reference.data[i].worksheetType;

    //array_worksheetType.push(all_reference.data[i].worksheetType)
  }


  array_worksheetType = [
    "BALANCE",
    "THERMOHYGROMETER",
    "TEST WEIGHT",
    "SCALE",
    "THERMOMETER",
    "TIMER",
    "PRESSURE GAUGE",
    "PH",
    "VOLUMETRIC",
    "INCUBATOR",
    "WATERBATH",
    "REFRACTOMETER",
    "CALIPER",
    "OHM",
    "VOLT",
  ]

  for (let i = 0; i < array_worksheetType.length; i++) {    
    await $.ajax({
      cache: false,
      method: "POST",
      url: '/TSR/get_all_from_type',
      data:{
        'worksheetType' : array_worksheetType[i],
      }
    })
    .done(function(result){
      updated_data_by_type[array_worksheetType[i]] = {
        "worksheetType" : array_worksheetType[i],
        "data" : result.data,
      }
    })
    .fail(function(error){
      console.log(error)
    })
  
    await $.ajax({
      cache: false,
      method: "POST",
      url: '/TSR/get_data_from_worksheet_type',
      data:{
        //'referenceNumber' : referenceNumber,
        'worksheetType' : array_worksheetType[i],
      }
    })
    .done(function(result){
      reference_data_per_type[array_worksheetType[i]] = {
        "worksheetType" : array_worksheetType[i],
        "data" : result.data,
      }
    })
    .fail(function(error){
      console.log(error)
    })
  }
  
  let all_data = {
    "reference_data_per_type" : reference_data_per_type,
    "updated_data_by_type" : updated_data_by_type,
  }

  let string_data = JSON.stringify(all_data);
  let encoded_data = encode(string_data);
  let dataUri = "data:application/json;base64," + encoded_data;
  let is_valid_text = "Download Available";

  $('#exportUpdatedDownload').removeClass('disabled')
  $("#exportUpdatedDownload").attr({        
    'href': dataUri,
    'target': '_blank',
    'download': "OFFLINE SERVER DATA" +'.json',
  })

  $("#exportUpdatedDownload").html(is_valid_text)


}

async function update_server_data(){
  let spinner = '<div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div>'

  let file_element = $('#offlineFile')
  const file = file_element[0].files[0];
  let to_decode_string = await new Promise((resolve, reject) => {
      const reader = new FileReader();

      reader.onload = function (e) {
          const string_data = e.target.result;
          resolve(string_data);
      };

      reader.onerror = function (e) {
          reject(e.target.error);
      };

      reader.readAsText(file);
  });
  
  let parsed_string = JSON.parse(to_decode_string)
  

  let type = Object.keys(parsed_string.updated_data_by_type)

  for (let i = 0; i < type.length; i++) {
    let type_key = type[i];
    let data_count = parsed_string.updated_data_by_type[type_key].data.length
    for (let ii = 0; ii < data_count; ii++) {
      let data = parsed_string.updated_data_by_type[type_key].data[ii]
      let worksheetID = data.id;
      let tsrID = data.tsrID;
      if(tsrID == null){
        delete data.id;
      }

      let stringed_data = JSON.stringify(data)

      await $.ajax({
        cache: false,
        async: true,
        type: "post",
        url: '/TSR/update_from_offline',
        data: {
          "worksheetType":type_key,
          "worksheetID":worksheetID,
          "tsrID":tsrID,
          "data":stringed_data,
        }
      })
      .done(function(result){
        console.log('update successfully')
        // $("#importFromOffline").html("Import Successful")
      })
      .fail(function(error){
        console.log(error)
        //alert('cant update reference')
        // $("#importFromOffline").html("Import Error")
      })
      .always(function(){
        $("#importFromOffline").html("Import Done")
      })

    }
  }
}