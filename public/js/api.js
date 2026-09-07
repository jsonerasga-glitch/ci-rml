//var urlAPI = 'http://192.168.2.5/rml-api/api';
//var urlAPI = 'http://192.168.2.16/ulims/site/rmlapi'
var urlAPI = 'http://192.168.2.18/ulims/site/rmlapi'
//var urlAPI = '/API JSON/rmlapi.json';
let dataFromAPI;

let arrayOfWorksheets = [
  'BALANCE', 
  'PRESSURE GAUGE', 
  'THICKNESS GAUGE',
  'THERMOHYGROMETER', 
  'TEST WEIGHT', 
  'MASS STANDARD',
  'SET OF WEIGHTS',
  'SCALE',
  'THERMOMETER',
  'PIPETTE',
  'PIPETTOR',
  'VOLUMETRIC', 
  'POVA', 
  'OVEN', 
  'CHILLER',
  'INCUBATOR',
  'WATER BATH',
  'AUTOCLAVE',
  'FREEZER',
  'PH METER',
  'DIGIMATIC CALIPER',
  "N/A"
]

const object_linksToWorksheet = {
  'BALANCE':"/TSR/worksheetElectronicBalance",
  'PRESSURE GAUGE':"/TSR/worksheetPressure", 
  'THERMOHYGROMETER':"/TSR/worksheetThermoHygrometer",
  'TEST WEIGHT':"/TSR/worksheetTestWeight",
  'MASS STANDARD':"/TSR/worksheetTestWeight",
  'SET OF WEIGHTS':"/TSR/worksheetTestWeight",
  'SCALE':'/TSR/worksheetWeighingScale',
  'THERMOMETER':'/TSR/worksheetThermometer',
  'PIPETTE':'/TSR/worksheetVolumetric',
  'PIPETTOR':'/TSR/worksheetVolumetric',
  'VOLUMETRIC':'/TSR/worksheetVolumetric', 
  'POVA':'/TSR/worksheetVolumetric', 
  'OVEN':'/TSR/worksheetEnclosure',
  'CHILLER':'/TSR/worksheetEnclosure',
  'INCUBATOR':'/TSR/worksheetEnclosure',
  'WATER BATH':'/TSR/worksheetEnclosure',
  'AUTOCLAVE':'/TSR/worksheetEnclosure',
  'FREEZER':'/TSR/worksheetEnclosure',
  'PH METER': '/TSR/worksheetPHmeter',
  'THICKNESS GAUGE': '/TSR/worksheetPressure',
  'DIGIMATIC CALIPER': '/TSR/worksheetCaliper',
  

}

/*
"/TSR/worksheetElectronicBalance",
"/TSR/worksheetThermoHygrometer",
"/TSR/worksheetTestWeight",
"/TSR/worksheetWeighingScale",
"/TSR/worksheetThermometer",
"/TSR/worksheetTimer",
"/TSR/worksheetPressure",
"/TSR/worksheetPHmeter",
"/TSR/worksheetVolumetric",
"/TSR/worksheetEnclosure",
"/TSR/worksheetRefractometer",
"/TSR/worksheetCaliper",
"/TSR/worksheetElectricalMeters",
*/
const cp_linksToWorksheet = {

}

fetch(urlAPI)                                
  .then(response => response.json())
  .then(data=>{
     dataFromAPI = simplifyArray(data);
     addToTable();
  
});

function simplifyArray(array){
    const result = {};
    for (const item of array) {
        const {requestDate, requestRefNum, customerId, customerName, address, id, sampleCode, sampleName, description} = item;

        if(!result[requestRefNum]){
            result[requestRefNum] = {
                requestDate : requestDate,
                requestRefNum : requestRefNum,
                customerId : customerId,
                customerName : customerName,
                address : address,
                samples : [] 
            }
        }

        result[requestRefNum].samples.push({
            id : id,
            sampleCode : sampleCode,
            sampleName : sampleName,
            description : description
           
        })
    }
    return result;
}
function addToTable(){
    Object.keys(dataFromAPI).forEach(key => {
        let countOfSamples = dataFromAPI[key]['samples'].length;

        let addToDBButton = $('<button>').text('View Samples').click(function(){addWorksheet(key)});

        let tr = $('<tr>')
        let requestRefNum = $('<td>').html(dataFromAPI[key]['requestRefNum']);
        let customerName = $('<td>').html(dataFromAPI[key]['customerName']);
        let address = $('<td>').html(dataFromAPI[key]['address']);
        let requestDate = $('<td>').html(dataFromAPI[key]['requestDate']);
        let count = $('<td>').html(countOfSamples);
        let addButton = $('<td>').append(addToDBButton);

        tr.append(requestRefNum, customerName, address, requestDate, count, addButton);
        $('#requestTable tbody').append(tr);
    })
    $('#requestTable').DataTable({
        "order": [[3, "desc"], [0, "desc"]],
        "bScrollInfinite": true,
        "bScrollCollapse": true,
    });
}

function addWorksheetOLD(referenceNumber){
    $('#modalSamplesRequestNumber').text(referenceNumber);
    $('#sampleTable tbody').html('');
    let numberOfSample = dataFromAPI[referenceNumber]['samples'].length;
    let customerName = dataFromAPI[referenceNumber]['customerName'];
    let requestDate = dataFromAPI[referenceNumber]['requestDate'];
    let requestRefNum = dataFromAPI[referenceNumber]['requestRefNum'];
    let address = dataFromAPI[referenceNumber]['address'];

    let object_worksheetWithCount = {
      'BALANCE':0, 
      'PRESSURE GAUGE':0, 
      'THICKNESS GAUGE':0,
      'THERMOHYGROMETER':0, 
      'TEST WEIGHT':0, 
      'MASS STANDARD':0,
      'SET OF WEIGHTS':0,
      'SCALE':0,
      'THERMOMETER':0,
      'PIPETTE':0,
      'PIPETTOR':0,
      'VOLUMETRIC':0, 
      'POVA':0, 
      'OVEN':0, 
      'CHILLER':0,
      'INCUBATOR':0,
      'WATER BATH':0,
      'AUTOCLAVE':0,
      'FREEZER':0,
      'PH METER':0,
      'DIGIMATIC CALIPER':0,
      "N/A":0,
    };
    let object_worksheetWithCountFromDatabase = {
      'BALANCE':0, 
      'PRESSURE GAUGE':0, 
      'THICKNESS GAUGE':0,
      'THERMOHYGROMETER':0, 
      'TEST WEIGHT':0, 
      'MASS STANDARD':0,
      'SET OF WEIGHTS':0,
      'SCALE':0,
      'THERMOMETER':0,
      'PIPETTE':0,
      'PIPETTOR':0,
      'VOLUMETRIC':0, 
      'POVA':0, 
      'OVEN':0, 
      'CHILLER':0,
      'INCUBATOR':0,
      'WATER BATH':0,
      'AUTOCLAVE':0,
      'FREEZER':0,
      'PH METER':0,
      'DIGIMATIC CALIPER':0,
      "N/A":0,
    };

    for (let i = 0; i < numberOfSample; i++) {
      let sampleName = dataFromAPI[referenceNumber]['samples'][i]['sampleName'];
      let isThereAWorksheet = checkArrayForString(arrayOfWorksheets, sampleName);
      let worksheetUsed = isThereAWorksheet.found;

      object_worksheetWithCount[worksheetUsed] += 1;
    }

    for (let x = 0; x < arrayOfWorksheets.length; x++) {
      let worksheet = arrayOfWorksheets[x];
      $.ajax({
        cache: false,
        type: "post",
        url: "/TSR/countPerType",
        async:false,
        data: {
          'requestReferenceNumber': referenceNumber,
          'worksheetType': worksheet,
        },
      })
      .done(function(result){
        object_worksheetWithCountFromDatabase[result.worksheetType] = result.count;
      })
      .fail(function(error) {
        console.log(error);
      })
    }

    var matchingKeys = getMatchingKeys(object_worksheetWithCount, object_worksheetWithCountFromDatabase);

    let filterdWorksheet = arrayOfWorksheets.filter(function(value) {
      return !matchingKeys.includes(value);
    });

    for (let i = 0; i < numberOfSample; i++) {
        let sampleID = dataFromAPI[referenceNumber]['samples'][i]['id'];
        let sampleName = dataFromAPI[referenceNumber]['samples'][i]['sampleName'];
        let sampleCode = dataFromAPI[referenceNumber]['samples'][i]['sampleCode'];
        let description = dataFromAPI[referenceNumber]['samples'][i]['description'];

        let descArray = description
          .split(/[\r\n:]/)
          .filter(function(entry){return entry.trim() != '';})
          .map(function(word){return word.trim();})
          .map(function(word){return word.replace(/No\./g, "Number");})
          .map(function(word){return word.replace(/Cert\./g, "Certificate");});;

        let descriptionObject = arrayToObject(descArray)
        //console.log(descriptionObject)

        let tr = $('<tr>')
        let sampleCodeTD = $('<td>').html(sampleCode);
        let sampleNameTD = $('<td>').html(sampleName);
        let statusTD = $('<td>')
        let isThereAWorksheet = checkArrayForString(filterdWorksheet, sampleName);
        let worksheetUsed = isThereAWorksheet.found;
        let worksheetInDatabase = checkArrayForString(matchingKeys, sampleName);

        let customerData = {
          "customer":customerName,
          "address":address,
          "tsrNumber":requestRefNum,
          "dateReceived":requestDate,
        }
        let customerInfo = JSON.stringify(customerData);

        let equipmentData = {
             "certificateNumber": descriptionObject.CertificateNumber,
             "equipmentDescription": worksheetUsed,
             "manufacturer": descriptionObject.Manufacturer,
             "modelNumber": descriptionObject.Model,
             "serialNumber": descriptionObject.SerialNumber,
             "equipmentId": descriptionObject.EquipmentId,
             
        }
        let equipmentInfo = JSON.stringify(equipmentData);
                
        if(worksheetUsed === 'N/A'){
          statusTD.html('no worksheet available');
        }

        if(worksheetInDatabase.matches){
          statusTD.html('on database');
        }

        if(isThereAWorksheet.matches){
          let url = object_linksToWorksheet[worksheetUsed]
          addWorksheetReference(url, customerInfo, equipmentInfo, referenceNumber, worksheetUsed, sampleCode);
          statusTD.html('worksheet added');
        }

        tr.append(sampleCodeTD, sampleNameTD, statusTD)
        $('#sampleTable tbody').append(tr);
    }

    async function addWorksheetReference(url, customerInfo, equipmentInfo, referenceNumber, worksheetUsed, sampleCode){
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
    
        const addReference = await $.ajax({
          cache: false,
          url: "/TSR/samplePerRequestID",
          method: 'POST',
          data: {
            'requestReferenceNumber': referenceNumber,
            'sampleCode': sampleCode,
            'worksheetType': worksheetUsed,
            'worksheetID':  addWorksheet.worksheetID  
          },
        });

        const addReferenceID = await $.ajax({
          cache: false,
          url: "/TSR/updateTSRID",
          method: 'POST',
          data: {
            'worksheetID': addWorksheet.worksheetID,
            'tsrID': addReference.tsrID,
            'worksheetUsed': worksheetUsed,
          },
        });

        console.log(addReferenceID)

      } catch (error) {
        // Handle any errors that occurred
        console.error(error);
      }
    }
    
    $('#modalSamples').modal('show')
}

function addWorksheet(referenceNumber){
  view_samples(dataFromAPI[referenceNumber])
  $('#modalRequestData').modal('show')
    
}

function checkArrayForString(arr, searchString){
    var lowercaseSearchString = searchString.toLowerCase();
    let worksheetUsed;
    var matches = arr.some(function(item) {
      if(lowercaseSearchString.indexOf(item.toLowerCase()) !== -1){
        worksheetUsed = item;
      }else{
        worksheetUsed = "N/A"
      }
      return lowercaseSearchString.indexOf(item.toLowerCase()) !== -1;
    });
  
    return {
      found: worksheetUsed,
      matches: matches
    };
}

function checkWord(word, fullWord) {
  // Convert both words to lowercase for case-insensitive comparison
  let lowercaseWord = word.toLowerCase();
  let lowercaseFullWord = fullWord.toLowerCase();

  let replacedWord = lowercaseWord.replace('no.', 'number');

  // Remove any non-alphanumeric characters from fullWord
  let cleanedFullWord = lowercaseFullWord.replace(/[^a-z0-9]/g, '');
  let cleanedWord = replacedWord.replace(/[^a-z0-9]/g, '');
  // Check if the cleanedFullWord contains the lowercaseWord
  if (cleanedFullWord.includes(cleanedWord)) {
    return true;
  } else {
    return false;
  }
}

function arrayToObject(arr) {
  var obj = {};
  
  // Iterate through the array, considering pairs of elements
  for (var i = 0; i < arr.length; i += 2) {
    var key = arr[i].replace(/\s/g, "");
    var value = arr[i + 1];
    
    // Assign the key-value pair to the object
    obj[key] = value;
  }
  
  return obj;
}

function getMatchingKeys(obj1, obj2) {
  var matchingKeys = [];

  $.each(obj1, function(key, value) {
    if (obj2.hasOwnProperty(key) && obj2[key] > 0 && value > 0) {
      matchingKeys.push(key);
    }
  });

  return matchingKeys;
}

function checkIfInDatabase(sampleID){
  return new Promise((resolve, reject) => {
    $.ajax({
      cache: false,
      url: "/TSR/checkSampleId",
      method: 'POST',
      data: {
        'sampleID': sampleID,
      },
      success: function (data) {
        resolve(data)
      },
      error: function (error) {
        reject(error)
      },
    })
  })
}

async function addWorksheetReference(url, id, customerInfo, equipmentInfo, referenceNumber, worksheetUsed, sampleCode, rawData){
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
  
  if(!in_databse){
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
  
      const addReference = await $.ajax({
        cache: false,
        url: "/TSR/samplePerRequestID",
        method: 'POST',
        data: {
          'sampleID': id,
          'requestReferenceNumber': referenceNumber,
          'sampleCode': sampleCode,
          'worksheetType': worksheetUsed,
          'worksheetID':  addWorksheet.worksheetID,
          'rawData': rawData
        },
      });
  
      const addReferenceID = await $.ajax({
        cache: false,
        url: "/TSR/updateTSRID",
        method: 'POST',
        data: {
          'worksheetID': addWorksheet.worksheetID,
          'tsrID': addReference.tsrID,
          'worksheetUsed': worksheetUsed,
        },
      });
    } catch (error) {
      // Handle any errors that occurred
      console.log(error); 
    }
  }
}


async function addReferenceToDatabase(referenceNumber){
  let sampleCount = dataFromAPI[referenceNumber]['samples'].length;
  for (let i = 0; i < sampleCount; i++) {

    let customerName = dataFromAPI[referenceNumber]['customerName'];
    let requestDate = dataFromAPI[referenceNumber]['requestDate'];
    let requestRefNum = dataFromAPI[referenceNumber]['requestRefNum'];
    let address = dataFromAPI[referenceNumber]['address'];
    let sampleID = dataFromAPI[referenceNumber]['samples'][i]['id'];
    let sampleName = dataFromAPI[referenceNumber]['samples'][i]['sampleName']
    let sampleCode = dataFromAPI[referenceNumber]['samples'][i]['sampleCode'];
    let description = dataFromAPI[referenceNumber]['samples'][i]['description'];

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
    let rawData = JSON.stringify(dataFromAPI[referenceNumber]['samples'][i]);

    await addWorksheetReference(url, sampleID, customerInfo, equipmentInfo, referenceNumber, worksheetUsed, sampleCode, rawData)
    
  } 
  refreshStatus(referenceNumber)
  return 1;
}




function view_samples(requestData){
  $('#requestRefNum').html("");
  $('#requestDate').html("");
  $('#customerName').html("");
  $('#address').html("");
  $('#id').html("");
  $('#sampleCode').html("");
  $('#sampleName').html("");
  $('#certNo').html("");
  $('#serialNumber').html("");
  $('#manufacturer').html("");
  $('#model').html("");
  $('#requestSamplesTable tbody').html('')

  $('#exportButton').html('Export')
  $('#exportButton').addClass('disabled')


  let samples = requestData.samples;

  let address = requestData.address;
  let customerId = requestData.customerId;
  let customerName = requestData.customerName;
  let requestDate = requestData.requestDate;
  let requestRefNum = requestData.requestRefNum;

  $('#addToDatabaseButton').off('click')
  $('#exportProcess').off('click')

  $('#addToDatabaseButton').on('click', function(){
    addReferenceToDatabase(requestRefNum)
  })

  $('#exportProcess').on('click', function(){
    exportData(requestRefNum)
  })

  $('#requestRefNum').html(requestRefNum);
  $('#requestDate').html(requestDate);
  $('#customerName').html(customerName);
  $('#address').html(address);

  let samplesTbody = $('#requestSamplesTable tbody')

  for (let i = 0; i < samples.length; i++) {
    let description = samples[i].description;
    let id = samples[i].id;
    let sampleCode = samples[i].sampleCode;
    let sampleName = samples[i].sampleName;

    let status = "Pending";
    checkIfInDatabase(id)
    .then((data) => {
      let stat = $("#"+id+"Status")
      let inDatabase = data.isInDB;
      if(inDatabase){
        status = "in Database"
        stat.html(status)
      }
      if(!inDatabase){
          status = "not in Database"
          stat.html(status)
      }
    })

    let actionButton = $("<button>", {
      "type":'button',
      "class":'btn btn-outline-primary btn-sm',
      "html":"View Details"
    }).on('click', function(){
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

      $('#id').html(id)
      $('#sampleCode').html(sampleCode)
      $('#sampleName').html(sampleName)
      $('#cp').html("CP - " + (descriptionObject.CP || ""))
      $('#certNo').html(descriptionObject.Certificate || "")
      $('#serialNumber').html(descriptionObject.Serial || "")
      $('#manufacturer').html(descriptionObject.Manufacturer || "")
      $('#model').html(descriptionObject.Model || ""  )
      
    })

    let tr = $('<tr>')
    let trID = $('<td>').html(id)
    let trCode = $('<td>').html(sampleCode)
    let trName = $('<td>').html(sampleName)
    let trStatus = $('<td>', {
      "id": id+"Status",
      "html":status
    })
    let trAction = $('<td>').html(actionButton)

    tr.append(trID, trCode, trName, trStatus, trAction)
    samplesTbody.append(tr)
  }
}

function refreshStatus(referenceNumber){
  let data = dataFromAPI[referenceNumber];
  let sampleCount = data['samples'].length;

  for (let i = 0; i < sampleCount; i++) {
    let sampleId = data['samples'][i]['id']
    let status = "Pending";
    checkIfInDatabase(sampleId)
    .then((data) => {
      let stat = $("#"+sampleId+"Status")
      let inDatabase = data.isInDB;
      if(inDatabase){
        status = "in Database"
        stat.html(status)
      }
      if(!inDatabase){
          status = "not in Database"
          stat.html(status)
      }
    })
  }
}

/*
use reference number to add worksheet from type then id, then arrage it using id from requestSample
use json as a reference only
manually add worksheet button
also add sample code
*/