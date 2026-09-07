 //Datas

 //Variables

 var selectedStandard;
 var selectedTestpoint = [];  
 var lineraityTestSelectedRow = 0;
 var linearityTestNumberOfRow = 0;

 var kForFormula = 2;
 
 //Data Manipulation

 $(document).ready(function(){
     addPersonnel();
     bindEventsToInputAndButtons();
 });

 function getAllCheckedCheckbox(idOfCheckbox){
     var array1 = selectedTestpoint;
     var array2 = [];
     
     var checkboxes = document.querySelectorAll('input[name='+idOfCheckbox+']:checked')
     for (var i = 0; i < checkboxes.length; i++) {
         array2.push(checkboxes[i].value)
     }
     selectedTestpoint.push(array2);
     console.log('array 1 ',array1)
     console.log('array 2 ',array2)
     var testPointSplitted = '';
     for (let x = 0; x < array2.length; x++) {
         var testPointMarkings = array2[x].split("(SPLIT)");
         testPointSplitted += testPointMarkings[2]+" + ";
     }
     document.getElementById('testWeightSelectedTestPoint').innerHTML = testPointSplitted;
     
 }

 function recheckCheckbox(idOfCheckbox){
     var checkboxes = document.querySelectorAll('input[name='+idOfCheckbox+']');
     for (var i = 0; i < checkboxes.length; i++) {
         for (var x = 0; x < selectedTestpoint.length; x++) {
             if (checkboxes[i].value == selectedTestpoint[x]) {
                 checkboxes[i].setAttribute('checked','');
             }  
         }
     }
 }

 function addPersonnel(){
     var calibrationOfficer = document.getElementById('personnelList');
     var verifier = document.getElementById('verifierList');
     var verifierPosition = document.getElementById('verifierPositionList');

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
         option.innerHTML = item.verifierName;
         verifier.appendChild(option);

         var option = document.createElement('option');
         option.setAttribute('value', item.verifierPosition);
         option.setAttribute('data-verifiername', item.verifierName);
         option.innerHTML = item.verifierPosition;
         verifierPosition.appendChild(option);
     })
 }

function personnelFromDatabase(officer_ID, verifier_ID, position_ID, officer_db, verifier_db, position_db){
    $('#'+officer_ID).val(officer_db);
    $('#'+verifier_ID).val(verifier_db);
    $('#'+position_ID).val(position_db);
}

 function getCustomerDetails() {
    var customerDetails = document.getElementById('CustomerDetails');
    var customer = document.getElementById('customer');
    var address = document.getElementById('address');
    var idOfCustomer = document.getElementById('idOfCustomer');

    const detailsSplit = customer.value.split(' @ ');
    if (detailsSplit.length > 1) {
        customer.value = detailsSplit[0];
        address.value = detailsSplit[1];
    } else {
        address.value = ''
    }
}

 function getValueFromUseButton(button){
     var selected = JSON.parse(document.getElementById('StandardUsedHiddenRow'+lineraityTestSelectedRow).value);
     var tempArray = [];
     selected.push(button.id);
     selectedTestpoint = selected;
     var testPointSplitted = '';
     for (let x = 0; x < selected.length; x++) {
         var testPointMarkings = selected[x].split("(SPLIT)");
         testPointSplitted += testPointMarkings[2]+" + ";
     }
     getValuesFromSelectedStandard(selected, 'ConventionalMassRow'+lineraityTestSelectedRow , 'UncertaintyRow'+lineraityTestSelectedRow, 'StandardUsedRow'+lineraityTestSelectedRow);

     document.getElementById('testWeightSelectedTestPoint').innerHTML = document.getElementById('StandardUsedRow'+lineraityTestSelectedRow).value;
     document.getElementById(button.id).innerHTML = 'Unselect';
     document.getElementById(button.id).setAttribute('class','btn btn-outline-warning');
     document.getElementById(button.id).setAttribute('onclick','removeValueFromUseButton(this)');
     document.getElementById('StandardUsedHiddenRow'+lineraityTestSelectedRow).value = JSON.stringify(selected);
     
 }

 function removeValueFromUseButton(button){
     var selected = selectedTestpoint;
     var toDeleteArray = [];
     var newSelected = [];

     toDeleteArray.push(button.id);
     for (let x = 0; x < selected.length; x++) {
         for (let i = 0; i < toDeleteArray.length; i++) {
             if(selected[x] != toDeleteArray[i]){
                 newSelected.push(selected[x]);
             }
         }
     }   
     selectedTestpoint = newSelected;
     var testPointSplitted = document.getElementById('StandardUsedRow'+lineraityTestSelectedRow).value;
     for (let x = 0; x < selectedTestpoint.length; x++) {
         var testPointMarkings = selectedTestpoint[x].split("(SPLIT)");
         testPointSplitted += testPointMarkings[2]+" + ";
     }
     document.getElementById('testWeightSelectedTestPoint').innerHTML = testPointSplitted;
     document.getElementById(button.id).innerHTML = 'Use';
     document.getElementById(button.id).setAttribute('class','btn btn-outline-secondary');
     document.getElementById(button.id).setAttribute('onclick','getValueFromUseButton(this)');
     document.getElementById('StandardUsedHiddenRow'+lineraityTestSelectedRow).value = JSON.stringify(selectedTestpoint);
     getValuesFromSelectedStandard(selectedTestpoint, 'ConventionalMassRow'+lineraityTestSelectedRow , 'UncertaintyRow'+lineraityTestSelectedRow , 'StandardUsedRow'+lineraityTestSelectedRow);
 }

 function useButtonState(button){
     var buttonForReturn = document.createElement("button");
     if(selectedTestpoint.length!=0){
         var isSelected = selectedTestpoint.includes(button);
         if(!isSelected){
             buttonForReturn.setAttribute('type','button');
             buttonForReturn.setAttribute('class','btn btn-outline-secondary');
             buttonForReturn.innerHTML = "Use";
             buttonForReturn.setAttribute('id',button);
             buttonForReturn.setAttribute('onclick', 'getValueFromUseButton(this)');
             console.log(false);
         }else{
             buttonForReturn.setAttribute('type','button');
             buttonForReturn.setAttribute('class','btn btn-outline-warning');
             buttonForReturn.innerHTML = "Unselect";
             buttonForReturn.setAttribute('id',button);
             buttonForReturn.setAttribute('onclick', 'removeValueFromUseButton(this)');
             console.log(true);
         }
     }else{
         buttonForReturn.setAttribute('type','button');
         buttonForReturn.setAttribute('class','btn btn-outline-secondary');
         buttonForReturn.innerHTML = "Use";
         buttonForReturn.setAttribute('id',button);
         buttonForReturn.setAttribute('onclick', 'getValueFromUseButton(this)');
         console.log('no selected');
     }
     return buttonForReturn;
     
 }

 function addRow(id){    
     function addNewTD(rowNumber, nameID){
         try {
             var td = document.createElement("td");
             var div = document.createElement("div");
             var input = document.createElement("input");
             div.setAttribute('class', 'input-group');
             input.setAttribute('class', 'form-control');
             input.setAttribute('type', 'text');
             input.setAttribute('data-rowNumber', rowNumber);
             //Edit after adding db
             input.setAttribute('name', nameID+"Row"+rowNumber);
             input.setAttribute('id', nameID+"Row"+rowNumber);
             input.setAttribute('data-group', "raw_data");
             if(nameID == 'ConventionalMass' || nameID == 'Uncertainty'){
                 input.setAttribute('style', 'background-color:yellow');
                 input.setAttribute('tabindex', '-1');
                 td.setAttribute('class','d-none');
             }
             
             div.appendChild(input);
             td.appendChild(div);
             return td
         } catch (error) {
             var td = document.createElement("td");
             var div = document.createElement("div");
             var input = document.createElement("input");
             var p = document.createElement("p");
             div.setAttribute('class', 'input-group');
             p.innerHTML = error;
             div.appendChild(p);
             td.appendChild(div);
             return td 
         }
     }
     function addNewTDWithButton(rowNumber){
         try {
             var td = document.createElement("td");
             var div = document.createElement("div");
             var divOutside = document.createElement("div");
             var AddButton = document.createElement("button");
             var DeleteButton = document.createElement("button");
             div.setAttribute('class', 'col btn-group');
             divOutside.setAttribute('class', 'row');
             AddButton.setAttribute('class', 'btn btn-success addBtn');
             AddButton.setAttribute('data-toggle', 'modal');
             AddButton.setAttribute('data-target', '#testWeightSelectModal');
             AddButton.setAttribute('data-rowNumber', rowNumber);
             AddButton.setAttribute('onclick', 'linearityTestGetRowNumber(this);addRowToTestWeightSelectModal("testWeightSelectHead","testWeightSelectBody");');
             DeleteButton.setAttribute('class', 'btn btn-danger');
             DeleteButton.setAttribute('onclick', 'clearRow(this);');
             DeleteButton.setAttribute('data-rowNumber', rowNumber);
             AddButton.setAttribute('type', 'button');
             DeleteButton.setAttribute('type', 'button');
             AddButton.innerHTML = "Add";
             DeleteButton.innerHTML = "Clear";
             div.appendChild(AddButton);
             div.appendChild(DeleteButton);
             divOutside.appendChild(div);
             var div = document.createElement("div");
             var input = document.createElement("input");
             div.setAttribute('class', 'col btn-group');
             input.setAttribute('class', 'form-control');
             input.setAttribute('type', 'text');
             input.setAttribute('name', 'StandardUsedRow'+rowNumber);
             input.setAttribute('id', 'StandardUsedRow'+rowNumber);
             input.setAttribute('data-group', "raw_data");
             var inputHidden = document.createElement("input");
             inputHidden.setAttribute('type', 'hidden');
             inputHidden.setAttribute('name', 'StandardUsedHiddenRow'+rowNumber);
             inputHidden.setAttribute('id', 'StandardUsedHiddenRow'+rowNumber);
             inputHidden.setAttribute('value', '[]');
             inputHidden.setAttribute('data-group', "raw_data");
             div.appendChild(input);
             div.appendChild(inputHidden);
             divOutside.appendChild(div);
             td.appendChild(divOutside);
             return td
         } catch (error) {
             var td = document.createElement("td");
             var div = document.createElement("div");
             var p = document.createElement("p");
             div.setAttribute('class', 'input-group input-group-sm');
             p.innerHTML = error;
             div.appendChild(p);
             td.appendChild(div);
             return td 
         }
     }
     try {
         var tbody = document.getElementById(id);
         var tr = document.createElement("tr");
         linearityTestNumberOfRow += 1;
         var rowNumber = linearityTestNumberOfRow;
         tr.appendChild(addNewTD(rowNumber,'NominalValue'));
         tr.appendChild(addNewTDWithButton(rowNumber));
         tr.appendChild(addNewTD(rowNumber,'ConventionalMass'));
         tr.appendChild(addNewTD(rowNumber,'Uncertainty'));
         tr.appendChild(addNewTD(rowNumber,'Upward'));
         tr.appendChild(addNewTD(rowNumber,'Downward'));
         tbody.appendChild(tr);
     } catch (e) {
         alert(e);
     }
 }

 function clearRow(row){
    lineraityTestSelectedRow = row.dataset.rownumber;
    $('#NominalValueRow'+lineraityTestSelectedRow).val('')
    $('#StandardUsedRow'+lineraityTestSelectedRow).val('')
    $('#StandardUsedHiddenRow'+lineraityTestSelectedRow).val('')
    $('#UpwardRow'+lineraityTestSelectedRow).val('')
    $('#DownwardRow'+lineraityTestSelectedRow).val('')
 }

 function deleteRow(tableID) {
     try {
         var table = document.getElementById(tableID);
         var rowCount = table.rows.length;			
         if(rowCount==0){
             alert('No more row to delete')
         }else{
             table.deleteRow(rowCount-1);
             console.log("table.rows.length "+table.rows.length);
             rowOfTable = table.rows.length;
             linearityTestNumberOfRow -= 1;
         }
     }catch(e) {
         alert(e);
     }
 }

 function getWeight(){
     var markedCheckbox = document.getElementsByName('weightCheckbox');  
     var PlaceholderWeight;
     for (var checkbox of markedCheckbox) {  
         if (checkbox.checked){
             if(PlaceholderWeight == null){
                 PlaceholderWeight = checkbox.value ;  
             }else {
                 if(!PlaceholderWeight.includes(checkbox.value)){
                     PlaceholderWeight += '(SPLIT)'+checkbox.value;}
             }
         }  
     }  
     selectedStandard = PlaceholderWeight;
     weightSplitted = selectedStandard.split("(SPLIT)");
     document.getElementById('standardUsed').value = selectedStandard;
 }

 function addRowToTestWeightSelectModal(idOfDetails,idOfBody){
    document.getElementById('testWeightSelectedTestPoint').innerHTML = $('#StandardUsedRow'+lineraityTestSelectedRow).val() == null? '' :document.getElementById('StandardUsedRow'+lineraityTestSelectedRow).value == []? '' :document.getElementById('StandardUsedRow'+lineraityTestSelectedRow).value;
    selectedTestpoint = JSON.parse($('#StandardUsedHiddenRow'+lineraityTestSelectedRow).val());
     function addDetails(classes,serial,description,type){
         try {
             var div = document.createElement("div");
             var p_class = document.createElement("p");
             var p_serial = document.createElement("p");
             var p_desc = document.createElement("p");
             var p_type = document.createElement("p");
             div.setAttribute('class', 'input-group input-group-sm');
             p_class.setAttribute('class', 'h6 col');
             p_class.setAttribute('type', 'text');
             p_class.innerHTML = classes;
             
             p_serial.setAttribute('class', 'h6 col');
             p_serial.setAttribute('type', 'text');
             p_serial.innerHTML = serial;

             p_desc.setAttribute('class', 'h6 col');
             p_desc.setAttribute('type', 'text');
             p_desc.innerHTML = description;

             p_type.setAttribute('class', 'h6 col');
             p_type.setAttribute('type', 'text');
             p_type.innerHTML = type;


             div.appendChild(p_class);
             div.appendChild(p_serial);
             div.appendChild(p_desc);
             div.appendChild(p_type);
             return div;
         } catch (error) {
             var td = document.createElement("td");
             var div = document.createElement("div");
             var p = document.createElement("p");
             div.setAttribute('class', 'input-group input-group-sm');
             p.innerHTML = error;
             div.appendChild(p);
             td.appendChild(div);
             return td 
         }
     }
     function addNewTD(value){
         try {
             var td = document.createElement("td");
             var div = document.createElement("div");
             var p = document.createElement("p");
             div.setAttribute('class', 'input-group input-group-sm');
             p.setAttribute('class', 'h6');
             p.innerHTML = value
             div.appendChild(p);
             td.appendChild(div);
             return td
         } catch (error) {
             var td = document.createElement("td");
             var div = document.createElement("div");
             var p = document.createElement("p");
             div.setAttribute('class', 'input-group input-group-sm');
             p.innerHTML = error;
             div.appendChild(p);
             td.appendChild(div);
             return td 
         }
     }

     try {
         const standardSplitted = selectedStandard.split("(SPLIT)");
         var details = document.getElementById(idOfDetails);
         var tbody = document.getElementById(idOfBody);

         while (tbody.hasChildNodes()) {
             tbody.removeChild(tbody.firstChild);
         }
         while (details.hasChildNodes()) {
             details.removeChild(details.firstChild);
         }
        
         for (let i = 0; i < standardSplitted.length; i++) {
             const e = standardSplitted[i];
            //  var filteredDetails = filterDataDynamic(e,"serialNumber",standardArrayDetails);
             var filteredDetails = filterDataDynamic(e,"id",standardArrayDetails);
             details.appendChild(addDetails(filteredDetails[0].class,filteredDetails[0].serialNumber,filteredDetails[0].description,filteredDetails[0].type));
            //  var filteredValues = filterDataDynamic(e,"serialNumber",standardArrayValues);
             var filteredValues = filterDataDynamic(e,"standardID",standardArrayValues);
             for (let x = 0; x < filteredValues.length; x++) {
                 var tr = document.createElement("tr");
                 var td = document.createElement("td");

                 var idForButton = e+"(SPLIT)"+filteredValues[x].id+"(SPLIT)"+filteredValues[x].marking;
                 
                 tr.appendChild(addNewTD(filteredValues[x].nominalValue));
                 tr.appendChild(addNewTD(filteredValues[x].nominalUnit));
                 tr.appendChild(addNewTD(filteredValues[x].serialNumber));
                 tr.appendChild(addNewTD(filteredValues[x].marking));
                 tr.appendChild(addNewTD(filteredValues[x].conventionalMass));
                 tr.appendChild(addNewTD(filteredValues[x].unit));
                 tr.appendChild(addNewTD(filteredValues[x].uncertainty));
                 td.appendChild(useButtonState(idForButton));
                 tr.appendChild(td);
                 tbody.appendChild(tr);
             }
         }
     } catch (e) {
         console.log(e);
     }
 }

 function filterTestWeightSelectModal(idOfBody){
     function addNewTD(value){
         try {
             var td = document.createElement("td");
             var div = document.createElement("div");
             var p = document.createElement("p");
             div.setAttribute('class', 'input-group input-group-sm');
             p.setAttribute('class', 'h6');
             p.innerHTML = value
             div.appendChild(p);
             td.appendChild(div);
             return td
         } catch (error) {
             var td = document.createElement("td");
             var div = document.createElement("div");
             var p = document.createElement("p");
             div.setAttribute('class', 'input-group input-group-sm');
             p.innerHTML = error;
             div.appendChild(p);
             td.appendChild(div);
             return td 
         }
     }
     try {
         const standardSplitted = selectedStandard.split("(SPLIT)");
         var tbody = document.getElementById(idOfBody);

         while (tbody.hasChildNodes()) {
             tbody.removeChild(tbody.firstChild);
         }       

         for (let i = 0; i < standardSplitted.length; i++) {
             const e = standardSplitted[i];
             var filteredValues = filterDataDynamic(e,"standardID",standardArrayValues);

             //var filteredSerialNumber = filterDataDynamic(document.getElementById('searchStandardSerialNumber').value,"serialNumber",filteredValues);
             var filteredNominalUnit = filterDataDynamic(document.getElementById('searchStandardUnit').value,"nominalUnit",filteredValues);
             var filteredNominalValue = filterDataDynamic(document.getElementById('searchStandard').value,"nominalValue",filteredNominalUnit);
             var filteredMarking = filterDataDynamic(document.getElementById('searchStandardUnitMarking').value,"marking",filteredNominalValue);

             for (let x = 0; x < filteredMarking.length; x++) {
                 
                 var tr = document.createElement("tr");
                 var td = document.createElement("td");
                 var idForButton = e+"(SPLIT)"+filteredMarking[x].id+"(SPLIT)"+filteredMarking[x].marking;
                 var button = useButtonState(idForButton);
                 
                 tr.appendChild(addNewTD(filteredMarking[x].nominalValue));
                 tr.appendChild(addNewTD(filteredMarking[x].nominalUnit));
                 tr.appendChild(addNewTD(filteredMarking[x].serialNumber));
                 tr.appendChild(addNewTD(filteredMarking[x].marking));
                 tr.appendChild(addNewTD(filteredMarking[x].conventionalMass));
                 tr.appendChild(addNewTD(filteredMarking[x].unit));
                 tr.appendChild(addNewTD(filteredMarking[x].uncertainty));
                 td.appendChild(button);
                 tr.appendChild(td);
                 tbody.appendChild(tr);
             }
         }
     } catch (e) {
         alert(e);
     }
 }

 function getValuesFromSelectedStandard(selected,convenMassID,uncertID,standardUsedID){
     var testPointSplitted = '';
     var testPointMarks = '';
     var addedConventionalMassToFloat = 0;
     var addedUncertaintyToFloat = 0;
     for (let x = 0; x < selected.length; x++) {
         var testPointMarkings = selected[x].split("(SPLIT)");
         testPointSplitted += testPointMarkings[1]+"(SPLIT)";
     } 
     for (let x = 0; x < selected.length; x++) {
         var testPointMarkings = selected[x].split("(SPLIT)");
         testPointMarks += testPointMarkings[2]+" + ";
     }
     var testPointIDS = testPointSplitted.split("(SPLIT)");
     for (let x = 0; x < testPointIDS.length - 1; x++) {
         var allValue = filterDataDynamic(testPointIDS[x], 'id', standardArrayValues);
         addedConventionalMassToFloat += parseFloat(allValue[0].conventionalMass);
         addedUncertaintyToFloat += parseFloat(allValue[0].uncertainty);
     }        

     document.getElementById(convenMassID).value = addedConventionalMassToFloat;
     document.getElementById(uncertID).value = addedUncertaintyToFloat;
     document.getElementById(standardUsedID).value = testPointMarks;
     document.getElementById('testWeightSelectedTestPoint').innerHTML = testPointMarks;
     console.log('addedConventionalMassToFloat ', addedConventionalMassToFloat)
     console.log('addedUncertaintyToFloat ', addedUncertaintyToFloat)
     console.log('testPointMarks ', testPointMarks)
 }

 function linearityTestGetRowNumber(row){
     lineraityTestSelectedRow = row.dataset.rownumber;
 }

 function calculate(){
     var sumOflinearityTestUN = 0;
     var calculatedArray = {"calculated":{}};

     
     for (let x = 1; x <= linearityTestNumberOfRow; x++) {
         var uncertainty = document.getElementById('UncertaintyRow'+x).value;
         sumOflinearityTestUN += linearityTestUN(uncertainty, kForFormula);
         console.log(uncertainty)
     }

     var uncertaintyReferenceWeightCalculated = uncertaintyReferenceWeights(sumOflinearityTestUN);
     var uncertaintyReferenceWeightsSensitivityTestCalculated = uncertaintyReferenceWeightsSensitivityTest();
     var uncertaintySDSensitivityTestCalculated = uncertaintySDSensitivityTest();
     var uncertaintySensitivityCalculated = uncertaintySensitivity(uncertaintyReferenceWeightsSensitivityTestCalculated,uncertaintySDSensitivityTestCalculated)
     var uncertaintyReadabilityCalculated = uncertaintyReadability();
     var uncertaintyEccenticityCalculated = uncertaintyEccenticity();
     var uncertaintyBalanceCalculated = uncertaintyBalance(uncertaintySensitivityCalculated, uncertaintyReadabilityCalculated, uncertaintyEccenticityCalculated);
     var uncertaintyRepeatabilityCalculated = uncertaintyRepeatability();
     var combinedUncertaintyCalculated = combinedUncertainty(uncertaintyReferenceWeightCalculated, uncertaintyBalanceCalculated, uncertaintyRepeatabilityCalculated);
     var expandedUncertaintyCalculated = expandedUncertainty(combinedUncertaintyCalculated);

     calculatedArray.calculated["uncertaintyReferenceWeightCalculated"] = uncertaintyReferenceWeightCalculated;
     calculatedArray.calculated["uncertaintyReferenceWeightsSensitivityTestCalculated"] = uncertaintyReferenceWeightsSensitivityTestCalculated;
     calculatedArray.calculated["uncertaintySDSensitivityTestCalculated"] = uncertaintySDSensitivityTestCalculated;
     calculatedArray.calculated["uncertaintySensitivityCalculated"] = uncertaintySensitivityCalculated;
     calculatedArray.calculated["uncertaintyReadabilityCalculated"] = uncertaintyReadabilityCalculated;
     calculatedArray.calculated["uncertaintyEccenticityCalculated"] = uncertaintyEccenticityCalculated;
     calculatedArray.calculated["uncertaintyBalanceCalculated"] = uncertaintyBalanceCalculated;
     calculatedArray.calculated["uncertaintyRepeatabilityCalculated"] = uncertaintyRepeatabilityCalculated;
     calculatedArray.calculated["combinedUncertaintyCalculated"] = combinedUncertaintyCalculated;
     calculatedArray.calculated["expandedUncertaintyCalculated"] = expandedUncertaintyCalculated;

    //  console.log('uncertaintyReferenceWeights', uncertaintyReferenceWeightCalculated);
    //  console.log('uncertaintyReferenceWeightsSensitivityTestCalculated', uncertaintyReferenceWeightsSensitivityTestCalculated);
    //  console.log('uncertaintySDSensitivityTestCalculated', uncertaintySDSensitivityTestCalculated);
    //  console.log('uncertaintySensitivityCalculated', uncertaintySensitivityCalculated);
    //  console.log('uncertaintyReadabilityCalculated', uncertaintyReadabilityCalculated);    
    //  console.log('uncertaintyEccenticityCalculated', uncertaintyEccenticityCalculated); 
    //  console.log('uncertaintyBalanceCalculated', uncertaintyBalanceCalculated);   
    //  console.log('uncertaintyRepeatabilityCalculated', uncertaintyRepeatabilityCalculated);     
    //  console.log('combinedUncertaintyCalculated', combinedUncertaintyCalculated);   
    //  console.log('expandedUncertaintyCalculated', expandedUncertaintyCalculated);  
     
     return calculatedArray;   
 }

 function getInputtedValuesFromSpecifications(){
     var equipmentDescription = document.getElementById('equipmentDescription');
     var manufacturer = document.getElementById('manufacturer');
     var modelNumber = document.getElementById('modelNumber');
     var serialNumber = document.getElementById('serialNumber');
     var equipmentNumber = document.getElementById('equipmentNumber');
     var maxCapacity = document.getElementById('maxCapacity');
     var maxCapacityMeasurement = document.getElementById('maxCapacityMeasurement');
     var readability = document.getElementById('readability');
     var readabilityUnit = document.getElementById('readabilityUnit');
     var readabilityX = document.getElementById('readabilityX');
     var e = document.getElementById('e');
     var equipmentRemarks = document.getElementById('equipmentRemarks');
     var equipment_class = document.getElementById('equipment_class');
     var specificationsArray = {"specifications":{}};

     specificationsArray.specifications["equipmentDescription"] = equipmentDescription.value;
     specificationsArray.specifications["manufacturer"] = manufacturer.value;
     specificationsArray.specifications["modelNumber"] = modelNumber.value;
     specificationsArray.specifications["serialNumber"] = serialNumber.value;
     specificationsArray.specifications["equipmentNumber"] = equipmentNumber.value;
     specificationsArray.specifications["maxCapacity"] = maxCapacity.value;
     specificationsArray.specifications["maxCapacityMeasurement"] = maxCapacityMeasurement.value;
     specificationsArray.specifications["readability"] = readability.value;
     specificationsArray.specifications["readabilityUnit"] = readabilityUnit.value;
     specificationsArray.specifications["readabilityX"] = readabilityX.value;
     specificationsArray.specifications["e"] = e.value;
     specificationsArray.specifications["equipmentRemarks"] = equipmentRemarks.value;
     specificationsArray.specifications["equipment_class"] = equipment_class.value;

     return specificationsArray;
 }

 function getInputtedValuesFromEnvironment(){
    //  var startTemp = document.getElementById('startTemp');
    //  var endTemp = document.getElementById('endTemp');
    //  var averageTemp = document.getElementById('averageTemp');
    //  var startRH = document.getElementById('startRH');
    //  var endRH = document.getElementById('endRH');
    //  var averageRH = document.getElementById('averageRH');
     
    let tempStart = $('#tempStart').val();
    let rhStart = $('#rhStart').val();
    let startAtmPressure = $('#startAtmPressure').val();
    let tempEnd = $('#tempEnd').val();
    let rhEnd = $('#rhEnd').val();
    let endAtmPressure = $('#endAtmPressure').val();

    var environmentArray = {"environment":{}};

    // environmentArray.environment["startTemp"] = startTemp.value;
    // environmentArray.environment["endTemp"] = endTemp.value;
    // environmentArray.environment["averageTemp"] = averageTemp.value;
    // environmentArray.environment["startRH"] = startRH.value;
    // environmentArray.environment["endRH"] = endRH.value;
    // environmentArray.environment["averageRH"] = averageRH.value;

    environmentArray.environment["tempStart"] = tempStart;
    environmentArray.environment["rhStart"] = rhStart;
    environmentArray.environment["startAtmPressure"] = startAtmPressure;
    environmentArray.environment["tempEnd"] = tempEnd;
    environmentArray.environment["rhEnd"] = rhEnd;
    environmentArray.environment["endAtmPressure"] = endAtmPressure;

    return environmentArray;
 }

 function getInputtedValuesFromSpanCalibration(){
     var spanCalibrationTable = document.getElementById('spanCalibrationTable');
     var spanTableArray = {"spanCalibrationTable":{}};
     var inputs = spanCalibrationTable.getElementsByTagName('input');
     var selects = spanCalibrationTable.getElementsByTagName('select'); 

     spanTableArray.spanCalibrationTable["spanBeforeUnit"] = selects["spanBeforeUnit"].value;
     spanTableArray.spanCalibrationTable["spanAfterUnit"] = selects["spanAfterUnit"].value;
     spanTableArray.spanCalibrationTable["datas"] = {};

     for (let item of inputs) {
         spanTableArray.spanCalibrationTable.datas[item.id] = item.value;
     }

     return spanTableArray;
 }

 function getInputtedValuesFromSensitivityTest(){
     var sensitivityReferenceWeight = document.getElementById('sensitivityReferenceWeight');
     var sensitivityNominalValue = document.getElementById('sensitivityNominalValue');
     var sensitivityNominalUnit = document.getElementById('sensitivityNominalUnit');
     var sensitivityMarking = document.getElementById('sensitivityMarking');
     var sensitivityCM = document.getElementById('sensitivityCM');
     var sensitivityCMUnit = document.getElementById('sensitivityCMUnit');
     var sensitivityU = document.getElementById('sensitivityU');
     var sensitivityUUnit = document.getElementById('sensitivityUUnit');

     var sensitivityTable = document.getElementById('sensitivityTable');
     var sensitivityTableArray = {"sensitivityTable":{}};
     var inputs = sensitivityTable.getElementsByTagName('input');
     var selects = sensitivityTable.getElementsByTagName('select'); 

     sensitivityTableArray.sensitivityTable["sensitivityReferenceWeight"] = sensitivityReferenceWeight.value;
     sensitivityTableArray.sensitivityTable["sensitivityNominalValue"] = sensitivityNominalValue.value;
     sensitivityTableArray.sensitivityTable["sensitivityNominalUnit"] = sensitivityNominalUnit.value;
     sensitivityTableArray.sensitivityTable["sensitivityMarking"] = sensitivityMarking.value;
     sensitivityTableArray.sensitivityTable["sensitivityCM"] = sensitivityCM.value;
     sensitivityTableArray.sensitivityTable["sensitivityCMUnit"] = sensitivityCMUnit.value;
     sensitivityTableArray.sensitivityTable["sensitivityU"] = sensitivityU.value;
     sensitivityTableArray.sensitivityTable["sensitivityUUnit"] = sensitivityUUnit.value;
     sensitivityTableArray.sensitivityTable["sensitivityEmptyUnit"] = selects["sensitivityEmptyUnit"].value;
     sensitivityTableArray.sensitivityTable["sensitivityMaxUnit"] = selects["sensitivityMaxUnit"].value;
     sensitivityTableArray.sensitivityTable["sensitivityMaxNominalValue"] = inputs["sensitivityMaxNominalValue"].value;
     sensitivityTableArray.sensitivityTable["datas"] = {};

     for (let item of inputs) {
         if(item.id == 'sensitivityMaxNominalValue'){continue;}
         sensitivityTableArray.sensitivityTable.datas[item.id] = item.value;
     }

     return sensitivityTableArray;
 }
 
 function getInputtedValuesFromEccentricityTest(){
     var eccentricityTable = document.getElementById('eccentricityTable');
     var eccentricityTableArray = {"eccentricityTable":{}};
     var inputs = eccentricityTable.getElementsByTagName('input');
     var selects = eccentricityTable.getElementsByTagName('select'); 

     eccentricityTableArray.eccentricityTable["eccentricityIndicationUnit"] = selects["eccentricityIndicationUnit"].value;
     eccentricityTableArray.eccentricityTable["eccentricityErrorUnit"] = selects["eccentricityErrorUnit"].value;
     eccentricityTableArray.eccentricityTable["datas"] = {};

     for (let item of inputs) {
         eccentricityTableArray.eccentricityTable.datas[item.id] = item.value;
     }

     return eccentricityTableArray;
 }

 function getInputtedValuesFromLinearityTest(){
     var linearityTestTable = document.getElementById('linearityTestTable');
     var linearityTestTableArray = {"linearityTestTable":{}};
     var inputs = linearityTestTable.getElementsByTagName('input');
     var selects = linearityTestTable.getElementsByTagName('select'); 

     linearityTestTableArray.linearityTestTable["linearityNominalValueUnit"] = selects["linearityNominalValueUnit"].value;
     linearityTestTableArray.linearityTestTable["linearityIndicationUnit"] = selects["linearityIndicationUnit"].value;
     linearityTestTableArray.linearityTestTable["linearityConventionalMassUnit"] = selects["linearityConventionalMassUnit"].value;
     linearityTestTableArray.linearityTestTable["datas"] = {};

     for (let item of inputs) {
         linearityTestTableArray.linearityTestTable.datas[item.id] = item.value;
     }

     return linearityTestTableArray;
 } 

 function getInputtedValuesFromRepeatabilityTest(){
     var repeatabilityTable = document.getElementById('repeatabilityTable');
     var repeatabilityTableArray = {"repeatabilityTable":{}};
     var inputs = repeatabilityTable.getElementsByTagName('input');
     var selects = repeatabilityTable.getElementsByTagName('select'); 

     repeatabilityTableArray.repeatabilityTable["repeatabilityIndicationUnit"] = selects["repeatabilityIndicationUnit"].value;
     repeatabilityTableArray.repeatabilityTable["repeatabilityIndicationUnit2"] = selects["repeatabilityIndicationUnit2"].value;
     repeatabilityTableArray.repeatabilityTable["repeatabilitySUnit"] = selects["repeatabilitySUnit"].value;
     repeatabilityTableArray.repeatabilityTable["datas"] = {};

     for (let item of inputs) {
         repeatabilityTableArray.repeatabilityTable.datas[item.id] = item.value;
     }

     return repeatabilityTableArray;
 } 

 function sensitivityReference(){
    if($('#sensitivityTableTbody').children().length <= 0){
        $('#sensitivityTableTbody').html('')

        let used_standard = selectedStandard.split('(SPLIT)')

        let filtred_standard_values = standardArrayValues.filter(function(obj){
            if(used_standard.includes(obj.standardID)){
            return obj;
            }
        });


        filtred_standard_values.forEach(item => {
            let tr = $('<tr>')
            let nominalValueTD = $('<td>').html(item.nominalValue)
            let nominalUnitTD = $('<td>').html(item.nominalUnit)
            let serialNumberTD = $('<td>').html(item.serialNumber)
            let markingTD = $('<td>').html(item.marking)
            let conventionalMassTD = $('<td>').html(item.conventionalMass)
            let unitTD = $('<td>').html(item.unit)
            let uncertaintyTD = $('<td>').html(item.uncertainty)

            let useButton = $('<td>').html($('<button>',{
                'html':"Select",
                'class': 'btn btn-secondary',
                
                }).on('click', function(){
                    if($(this).html() == 'Select'){
                        let Markings = $('#sensitivityMarking').val()
                        let CMTotal = Number($('#sensitivityCM').val())
                        let UTotal = Number($('#sensitivityU').val())
                        let markToValue = '';
                        
                        if(Markings.length == 0){
                            markToValue = item.marking
                        }else{
                            markToValue += Markings + ' + ' + item.marking
                        }
                        
                        CMTotal += parseFloat(item.conventionalMass);
                        UTotal += parseFloat(item.uncertainty);

                        $('#sensitivityMarking').val(markToValue)
                        $('#sensitivityCM').val(CMTotal)
                        $('#sensitivityU').val(UTotal)
                        $(this).html('Unselect')
                        $(this).removeClass('btn-secondary')
                        $(this).addClass('btn-primary')
                    }else if($(this).html() == 'Unselect'){
                        let Markings = $('#sensitivityMarking').val()
                        let CMTotal = Number($('#sensitivityCM').val())
                        let UTotal = Number($('#sensitivityU').val())
                        let markToValue = '';

                        if(item.marking == Markings){
                            markToValue = ''
                        }else{
                            markToValue = Markings.replace((' + ' + item.marking), '')
                        }


                        CMTotal -= parseFloat(item.conventionalMass);
                        UTotal -= parseFloat(item.uncertainty);

                        $('#sensitivityMarking').val(markToValue)
                        $('#sensitivityCM').val(CMTotal)
                        $('#sensitivityU').val(UTotal)

                        $(this).html('Select')
                        $(this).removeClass('btn-primary')
                        $(this).addClass('btn-secondary')
                    }

                    
                })
            )
            
            tr.append(
                nominalValueTD,
                nominalUnitTD,
                serialNumberTD,
                markingTD,
                conventionalMassTD,
                unitTD,
                uncertaintyTD,
                useButton
            )
            $('#sensitivityTableTbody').append(tr)
        })
    }

 }
 function storeToHiddens(){
     var specificationsArray = document.getElementById('specificationsArray');
     var environmentArray = document.getElementById('environmentArray');
     var spanTableArray = document.getElementById('spanTableArray');
     var sensitivityTableArray = document.getElementById('sensitivityTableArray');
     var eccentricityTableArray = document.getElementById('eccentricityTableArray');
     var linearityTestTableArray = document.getElementById('linearityTestTableArray');
     var repeatabilityTableArray = document.getElementById('repeatabilityTableArray');
     var calculatedValues = document.getElementById('calculatedValues');

     specificationsArray.value = JSON.stringify(getInputtedValuesFromSpecifications());
     environmentArray.value = JSON.stringify(getInputtedValuesFromEnvironment());
     spanTableArray.value = JSON.stringify(getInputtedValuesFromSpanCalibration());
     sensitivityTableArray.value = JSON.stringify(getInputtedValuesFromSensitivityTest());
     eccentricityTableArray.value = JSON.stringify(getInputtedValuesFromEccentricityTest());
     linearityTestTableArray.value = JSON.stringify(getInputtedValuesFromLinearityTest());
     repeatabilityTableArray.value = JSON.stringify(getInputtedValuesFromRepeatabilityTest());

     let calculatedDatas = calculate();
     calculatedValues.value = JSON.stringify(calculatedDatas);

     $('#calculatedData').val(JSON.stringify(calculatedDatas));
     addDataToUncertaintyBudget(calculatedDatas);
 }
 function addDataToUncertaintyBudget(calculatedDatas){
    let uncertBudgetTbody = document.getElementById('uncertaintyBudgetTableTbody');
    uncertBudgetTbody.lastChild.remove();
    let tr = document.createElement('tr');

    let valuesKey = ['uncertaintyReferenceWeightCalculated',
    'uncertaintyReferenceWeightsSensitivityTestCalculated',
    'uncertaintySDSensitivityTestCalculated',
    'uncertaintySensitivityCalculated',
    'uncertaintyReadabilityCalculated',
    'uncertaintyEccenticityCalculated',
    'uncertaintyBalanceCalculated',
    'uncertaintyRepeatabilityCalculated',
    'combinedUncertaintyCalculated',
    'expandedUncertaintyCalculated',]

    for (let i = 0; i < valuesKey.length; i++) {
        let td = document.createElement('td');
        td.innerHTML = calculatedDatas['calculated'][valuesKey[i]];
        tr.append(td);
    }
    uncertBudgetTbody.append(tr);
    
}
 //Utilities

 var loadFile = function(event) {
     var output = document.getElementById('output');
     output.src = URL.createObjectURL(event.target.files[0]);
     output.onload = function() {
         URL.revokeObjectURL(output.src) // free memory
     }
 };

 function setDate() {
     let d = new Date(document.getElementById("sDate").value)
     let mon = +document.getElementById("mon").value;
     d.setMonth(d.getMonth()+mon)
     document.getElementById("eDate").valueAsDate = d;
 }

 function saveOnly(idOfForm){
     document.getElementById('completion').value = "Not Completed";
     try {
         storeToHiddens();
         document.getElementById(idOfForm).submit();
     } catch (error) {
         console.log(error)
         alert('Unable to Calculate \n'+error.message);
     }
     
     
 }

 function submitForm(idOfForm){
     document.getElementById('completion').value = "Pending";
     try {
         storeToHiddens();
         document.getElementById(idOfForm).submit();
     } catch (error) {
         console.log(error);
         alert('Unable to Calculate \n'+error.message);
     }
     
 }

 function copyValue(copyFrom,copyTo){
     var from = document.getElementById(copyFrom);
     var to = document.getElementById(copyTo);
     to.value = from.value
 }

 function copyFromDataset(copyFrom, copyTo, datasetName){
     var from = document.getElementById(copyFrom);
     var to = document.getElementById(copyTo);
     to.value = from.selectedOptions[0].dataset[datasetName];
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

 function checkCertNum(){
     var search = document.getElementById('certificateNumber').value;
     var certNum = document.getElementById('certificateNumber');
     $.ajax({
         cache: false,
         type: "post",
         url: "<?= base_url('WeighingScaleController/checkCertNum')?>",
         data: {'q': search},
         success:function(result){
             if(result == 'true'){
                 certNum.setAttribute('style','background-color:rgba(255,0,0,0.5)')
             }else{
                 certNum.setAttribute('style','background-color:rgba(0,255,0,0.5)')
             }
             window.setTimeout(checkCertNum, 5000);
         },
     })
 }

 function bind(id, evt, func) {
     var el = document.getElementById(id);
     if (el.addEventListener){
         el.addEventListener(evt, func);
     } else if (el.attachEvent) {
         el.attachEvent('on' + evt, func);
     }
 }

 function bindEventsToInputAndButtons(){
     bind('spanBeforeUnit','change',function(){
         copyValue('spanBeforeUnit','spanAfterUnit')
     });
     bind('sensitivityEmptyUnit','change',function(){
         copyValue('sensitivityEmptyUnit','sensitivityMaxUnit')
     });
     bind('eccentricityIndicationUnit','change',function(){
         copyValue('eccentricityIndicationUnit','eccentricityErrorUnit')
     });
     bind('repeatabilityIndicationUnit','change',function(){
         copyValue('repeatabilityIndicationUnit','repeatabilityIndicationUnit2');
         copyValue('repeatabilityIndicationUnit','repeatabilitySUnit')
     });
     bind('eccentricityIndicationPosition1Start','input',function(){
         copyValue('eccentricityIndicationPosition1Start','eccentricityIndicationPosition1End');
     });
     bind('eccentricityErrorPosition1Start','input',function(){
         copyValue('eccentricityErrorPosition1Start','eccentricityErrorPosition1End');
     });
     bind('sDate','change',function(){
         setDate()
     });
     bind('mon','change',function(){
         setDate()
     });
     bind('verifierList','change',function(){
         copyFromDataset('verifierList', 'verifierPositionList', 'verifierposition')
     });
     bind('verifierPositionList','change',function(){
         copyFromDataset('verifierPositionList', 'verifierList', 'verifiername')
     });


     bind('standardModalSelect','click',function(){
         getWeight();
         addRowToTestWeightSelectModal('testWeightSelectHead','testWeightSelectBody');
     });

     bind('senditivityTestSelectButton','click',function(){
        sensitivityReference();
    });

     bind('linearityTestAddButton','click',function(){
         addRow('linearityTestTableBody')
     }); 
     bind('linearityTestDeleteButton','click',function(){
         deleteRow('linearityTestTableBody')
     }); 
    //  bind('generateDataButton','click',function(){
    //      storeToHiddens();
    //      submitForm('weighingScaleForm');
    //  }); 


     for (let i = 1; i <= 5; i++) {
         bind('sensitivityEmptyTrial'+i,'input',function(){
             document.getElementById('sensitivityEmptyStandardDev').value = convertUnit(stdDev([
             document.getElementById('sensitivityEmptyTrial1').value,
             document.getElementById('sensitivityEmptyTrial2').value,
             document.getElementById('sensitivityEmptyTrial3').value,
             document.getElementById('sensitivityEmptyTrial4').value,
             document.getElementById('sensitivityEmptyTrial5').value]),
             'g',document.getElementById('sensitivityEmptyUnit').value)
         });
         bind('sensitivityMaxTrial'+i,'input',function(){
             document.getElementById('sensitivityMaxStandardDev').value = convertUnit(stdDev([
             document.getElementById('sensitivityMaxTrial1').value,
             document.getElementById('sensitivityMaxTrial2').value,
             document.getElementById('sensitivityMaxTrial3').value,
             document.getElementById('sensitivityMaxTrial4').value,
             document.getElementById('sensitivityMaxTrial5').value]),
             'g',document.getElementById('sensitivityMaxUnit').value)
         });
     }

     for (let i = 2; i <= 5; i++) {
         bind('eccentricityIndicationPosition'+i,'input',function(){
             for (let x = 2; x <=5 ; x++) {
                 document.getElementById('eccentricityErrorPosition'+x).value = (document.getElementById('eccentricityIndicationPosition'+x).value) - (average([document.getElementById('eccentricityIndicationPosition1Start').value,document.getElementById('eccentricityIndicationPosition1End').value]))
             }
             document.getElementById('eccentricityErrorPosition1End').value = (document.getElementById('eccentricityIndicationPosition1End').value) - (average([document.getElementById('eccentricityIndicationPosition1Start').value,document.getElementById('eccentricityIndicationPosition1End').value]))
         });
         if(i==5){
             bind('eccentricityIndicationPosition1Start','input',function(){
                 for (let x = 2; x <=5 ; x++) {
                     document.getElementById('eccentricityErrorPosition'+x).value = (document.getElementById('eccentricityIndicationPosition'+x).value) - (average([document.getElementById('eccentricityIndicationPosition1Start').value,document.getElementById('eccentricityIndicationPosition1End').value]))
                 }
                 document.getElementById('eccentricityErrorPosition1End').value = (document.getElementById('eccentricityIndicationPosition1End').value) - (average([document.getElementById('eccentricityIndicationPosition1Start').value,document.getElementById('eccentricityIndicationPosition1End').value]))
             });
             bind('eccentricityIndicationPosition1End','input',function(){
                 for (let x = 2; x <=5 ; x++) {
                     document.getElementById('eccentricityErrorPosition'+x).value = (document.getElementById('eccentricityIndicationPosition'+x).value) - (average([document.getElementById('eccentricityIndicationPosition1Start').value,document.getElementById('eccentricityIndicationPosition1End').value]))
                 }
                 document.getElementById('eccentricityErrorPosition1End').value = (document.getElementById('eccentricityIndicationPosition1End').value) - (average([document.getElementById('eccentricityIndicationPosition1Start').value,document.getElementById('eccentricityIndicationPosition1End').value]))
             });
         }
     }

     for (let i = 1; i <= 10; i++) {
         bind('repeatabilityTrial'+i,'input',function(){
             document.getElementById('repeatabilitySD').value = 
             stdDev([
                 document.getElementById('repeatabilityTrial1').value,
                 document.getElementById('repeatabilityTrial2').value,
                 document.getElementById('repeatabilityTrial3').value,
                 document.getElementById('repeatabilityTrial4').value,
                 document.getElementById('repeatabilityTrial5').value,
                 document.getElementById('repeatabilityTrial6').value,
                 document.getElementById('repeatabilityTrial7').value,
                 document.getElementById('repeatabilityTrial8').value,
                 document.getElementById('repeatabilityTrial9').value,
                 document.getElementById('repeatabilityTrial10').value,
             ])
         });
     }
 }

function processModalStandardCheckbox(){
    var selected = $("input[name^='weightCheckbox']:checked").map(function () {
        return this.value;
    }).get();
    selectedStandard = selected.join('(SPLIT)');
}

function updateProcessStandard(standardPicked){
    let selectedStandard = standardPicked.split("(SPLIT)")
    $('input[type="checkbox"][name^="weightCheckbox"]').each(function(){
        let currentCheckboxValue = $(this).val();
        if(selectedStandard.includes(currentCheckboxValue)){
            $(this).prop('checked', true);
        }
    })
    processModalStandardCheckbox();
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

function saveData(){
    let certificateNumber = $('#certificateNumber').val();
    let standard = selectedStandard;
    let calculatedData = $('#calculatedData').val();

    // let completion = $('#completion').val();
    let completion = 'Not Completed';
    let calibratorAccountEmail = $('#calibratorAccountEmail').val();
    let calibratorAccountID = $('#calibratorAccountID').val();
    let verifierEmail = $('#verifierEmail').val();
    let calibratedBy = $('#calibratedBy').val();
    let checkedBy = $('#encodedBy').val();
    let verifierPosition = $('#checkedby').val();    

    let customer_information = $('input[data-group="customer_information"], select[data-group="customer_information"], textarea[data-group="customer_information"]');
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
        if($(this).prop('checked') == true){
            rawValues[key] = 'checked';
        }
    });

    var dataInputs = JSON.stringify(rawValues);

    $.ajax({
        cache: false,
        async: false,
        type: "post",
        url: "/weighingScale/add_New_Worksheet_Data",
        data: {
            'calibrationCertificate' : certificateNumber,
            'standard' : standard,
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
            console.log(result);
            $('#idOfCertificate').val(JSON.parse(result).id);
            storeToHiddens();
            saveDataUsingForm();
            window.location.href = "/weighingScale/worksheet/"+JSON.parse(result).id;

        },
        error: function (error) {
            console.log(error);
        },
    })

}

function saveDataUsingForm(){
    let formElement = $("#weighingScaleForm");
    var formData = formElement.serialize();
    storeToHiddens()
    $.ajax({
        cache: false,
        async: false,
        type: "POST",
        url: "/weighingScaleUpdateData",
        data: formData,
        success: function(response) {
            console.log("Form submitted successfully:", response);
        },
        error: function(error) {
            console.error("Error submitting form:", error);
        }
    });
  
}

function updateData(){
    let certificateNumber = $('#certificateNumber').val();
    let standard = selectedStandard;
    let calculatedData = $('#calculatedData').val();
    let idOfCertificate = $('#idOfCertificate').val();

    // let completion = $('#completion').val();
    let completion = 'Not Completed';
    let calibratorAccountEmail = $('#calibratorAccountEmail').val();
    let calibratorAccountID = $('#calibratorAccountID').val();
    let verifierEmail = $('#verifierEmail').val();
    let calibratedBy = $('#calibratedBy').val();
    let checkedBy = $('#encodedBy').val();
    let verifierPosition = $('#checkedby').val();    

    let customer_information = $('input[data-group="customer_information"], select[data-group="customer_information"], textarea[data-group="customer_information"]');
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
        if($(this).prop('checked') == true){
            rawValues[key] = 'checked';
        }
    });

    var dataInputs = JSON.stringify(rawValues);

     $.ajax({
         cache: false,
         type: "post",
         url: "/weighingScale/update_Worksheet_Data",
         data: {
                'idOfCertificate' : idOfCertificate,
                'calibrationCertificate' : certificateNumber,
                'standard' : standard,
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
            console.log(result);
            $('#idOfCertificate').val(JSON.parse(result).id)
            storeToHiddens();
            saveDataUsingForm();
            var toastElement = document.getElementById('toastSaved');//select id of toast
            var toast = new bootstrap.Toast(toastElement);//inizialize it
            toast.show();//show it
        },
         error: function (error) {
             console.log(error);
         },
     })

}

function uploadFiles(){
    let files = $('#fileInput')[0].files;
    let idOfCertificate = $('#idOfCertificate').val();
    let formData = new FormData();

    for (let i = 0; i < files.length; i++) {
        formData.append('imageFiles[]', files[i]);
    }

    $.ajax({
        url: '/weighingScale/imageUpdate/' + idOfCertificate,
        type: 'POST',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(response) {
            console.log('Files uploaded successfully:', response);
        },
        error: function(error) {
            console.error('Error uploading files:', error);
        }
    });
}

$( window ).on( "load", function() {
    if ($('#idOfCertificate').val() != ''){
        let idOfCertificate = $('#idOfCertificate').val();
        $.ajax({
            cache: false,
            type: "post",
            url: "/weighingScale/get_data_by_id",
            data: {
                'idOfCertificate' : idOfCertificate,
            },
            success: function(result) {
                $('#saveButton').html('Update')
                $('#saveButton').on("click", function(){updateData()});

                $('#calculatedData').val(result.worksheetData['calculatedData']);

                if(result.worksheetData['standard'] != null){
                    updateProcessStandard(result.worksheetData['standard']);
                }

                let count = 0;
                for (let key in JSON.parse(result.worksheetData['dataInputs'])) {
                    if (key.startsWith('linearLoad')) {
                        count++;
                    }
                }
                let numberOfRow = countKeysWithPattern(result.worksheetData['dataInputs'], 'NominalValueRow')
                

                for (let index = 0; index < numberOfRow; index++) {
                    $('#linearityTestAddButton').trigger('click')
                }

                let infoArray = ['customerInfo', 'equipmentInfo', 'environmentInfo', 'dataInputs'];
                for (let i = 0; i < infoArray.length; i++) {
                    let infoValues = JSON.parse(result.worksheetData[infoArray[i]]);
                    let keys = Object.keys(infoValues);
                    for (let x = 0; x < keys.length; x++) {
                        let id = keys[x];
                        $('#'+id).val(infoValues[id])                        
                    }   
                }    

                if(result.worksheetData['calculatedData'] != null){
                    let specification = JSON.parse(result.worksheetData['equipmentInfo']);
                    let dataInputs = JSON.parse(result.worksheetData['dataInputs']);
                    makeChart(specification, dataInputs)
                    addDataToUncertaintyBudget(JSON.parse(result.worksheetData['calculatedData']))
                }

                personnelFromDatabase('personnelList', 'verifierList', 'verifierPositionList', result.worksheetData['calibrationOfficer'], result.worksheetData['checkedBy'], result.worksheetData['verifierPosition'])

                $('#status').val(result.worksheetData['completion'])     
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



/*
    GRAPH FUNCTIONS
    blue = upward
    red = downward
*/
function countKeysWithPatternNoParse(data, pattern){
    let count = 0;
    for (let key in data) {
      if (key.startsWith(pattern)) {
        count++;
      }
    }
    return count;
}
function findMinMaxInArrayOfArrays(arrayOfArrays){
    var flatArray = $.map(arrayOfArrays, function (value) {
        return $.grep(value, function (item) {
            return typeof item === 'number';
        });
    });

    var min = Math.min.apply(null, flatArray);
    var max = Math.max.apply(null, flatArray);

    var objectMinMax = {};

    for (var i = 0; i < flatArray.length; i++) {
        if (typeof flatArray[i] === 'object') {
            for (var prop in flatArray[i]) {
                if (flatArray[i].hasOwnProperty(prop)) {
                    if (objectMinMax[prop]) {
                        objectMinMax[prop].min = Math.min(objectMinMax[prop].min, flatArray[i][prop]);
                        objectMinMax[prop].max = Math.max(objectMinMax[prop].max, flatArray[i][prop]);
                    } else {
                        objectMinMax[prop] = {
                            min: flatArray[i][prop],
                            max: flatArray[i][prop]
                        };
                    }
                }
            }
        }
    }

    return {
        min: min,
        max: max,
        objectMinMax: objectMinMax
    };
}
function getDataPointsForCharts(specification, dataInputs){
            const readabilityNumberOfDecimalPlace = getDecimalPlaces(specification.readability)
            let numberOftestPoint = countKeysWithPatternNoParse(dataInputs, 'NominalValueRow')
            let ConventionalMassUnit = dataInputs['linearityConventionalMassUnit'];
            //let array_datapoints = [['Nominal Value', 'Upward', 'Downward']];

            function getNextPoint(points) {
                const arr = points
                    .filter(v => v !== '')
                    .map(v => Number(v));
                if (arr.length < 2) return '';
                const intervals = arr.slice(1).map((v, i) => v - arr[i]);
                const lastIntervals = intervals.slice(-3);
                const avgInterval = lastIntervals.reduce((a, b) => a + b, 0) / lastIntervals.length;
                const nextValue = Math.round(arr[arr.length - 1] + avgInterval);

                return String(nextValue);
            }
           
            let nominal_points = [];
            let array_datapoints = [];
            for (let index = 1; index < numberOftestPoint; index++) {
                let datapoints = [];
                let NominalValueRowkey = 'NominalValueRow'+index;
                let ConventionalMassRowkey = 'ConventionalMassRow'+index;
                let UpwardRowkey = 'UpwardRow'+index;
                let DownwardRowkey = 'DownwardRow'+index;

                let conventionalMassValue = Number(dataInputs[ConventionalMassRowkey]);
                
                //let conventionalMassValuecompute = Number(convertWeight(conventionalMassValue, ConventionalMassUnit)).toFixed(readabilityNumberOfDecimalPlace);
                let conventionalMassValuecompute = Number(convertUnit(conventionalMassValue, 'g', ConventionalMassUnit));
                let indicationUpward = Number(dataInputs[UpwardRowkey]).toFixed(readabilityNumberOfDecimalPlace);
                let indicationDownward = Number(dataInputs[DownwardRowkey]).toFixed(readabilityNumberOfDecimalPlace);
                let errorUpward = Number((indicationUpward - conventionalMassValuecompute));
                let errorDownward = Number((indicationDownward - conventionalMassValuecompute));

                nominal_points.push(Number(dataInputs[NominalValueRowkey]).toFixed(readabilityNumberOfDecimalPlace));
                datapoints.push(Number(dataInputs[NominalValueRowkey]).toFixed(readabilityNumberOfDecimalPlace));
                datapoints.push(errorUpward);
                datapoints.push(errorDownward);

                array_datapoints.push(datapoints);
            }

            let lastPoint = [getNextPoint(nominal_points),0,0];

            array_datapoints.push(lastPoint);

            return array_datapoints;

}
function getDataPointsForxAxis(dataInputs){
            let numberOftestPoint = countKeysWithPattern(dataInputs, 'NominalValueRow')
            let array_datapoints = [];
            for (let index = 1; index <= numberOftestPoint; index++) {
                let datapoints = [];
                let NominalValueRowkey = 'NominalValueRow'+index;
                if(index == numberOftestPoint){
                    array_datapoints.push('null');
                }else{
                    array_datapoints.push(Number(dataInputs[NominalValueRowkey]));
                }
            }

            return array_datapoints;
}
function createIntervals(min, max, n){
            const intervalSize = (max - min) / (n - 1);
            const intervals = [];
            for (let i = 0; i < n; i++) {
                intervals.push(Number((min + i * intervalSize).toPrecision(2)));
            }
            return intervals;
}
function getDecimalPlaces(val){
            const floating_val = parseFloat(val);
            const decimalPart = (floating_val % 1).toString().split('.')[1];
            return decimalPart ? decimalPart.length : 0;
}
function convertWeight(val, unit){
            const weight = parseFloat(val);
            if (isNaN(weight)) {
                return 0;
            }
            let resultWeight;
            switch (unit) {
                case "mg":
                resultWeight = weight * 1000000;
                break;
                case "g":
                resultWeight = weight * 1000; 
                break;
                case "kg":
                resultWeight = weight / 1000;
                break;
                default:
                return 0;
            }
            return resultWeight;
}
function makeChart(specification, dataInputs){
            const readabilityNumberOfDecimalPlace = getDecimalPlaces(specification.readability)
            let dataPoints = getDataPointsForCharts(specification, dataInputs);
            let minMax = findMinMaxInArrayOfArrays(dataPoints);
            let errorPoints = createIntervals(minMax.min, minMax.max, 10);
            let array_x = [];
            let array_label = [];
            let array_up = [];
            let array_down = [];
            let symbolsUpward = [];
            let symbolsDownward = [];
            

            dataPoints.forEach((element, index) => {
                array_x.push(parseFloat(element[0]));
                array_up.push(parseFloat(element[1]));
                array_down.push(parseFloat(element[2]));
                // array_label.push(element[0]);
                if (index === dataPoints.length - 1) {
                    array_label.push(dataPoints[0][0]);
                } else {
                    array_label.push(element[0]);
                }

                if(index == dataPoints.length - 1){
                    symbolsUpward.push('arrow-up')
                }else{
                    symbolsUpward.push('square')
                }
                if(index == 0){
                    symbolsDownward.push('arrow-left')
                }else{
                    symbolsDownward.push('square')
                }
            });

            let upwardArrowPosition = dataPoints.length - 1;

            const traceUpward = {
                x: array_x,
                y: array_up,
                type: 'scatter',
                mode: 'line',
                name: 'Increasing',
                marker: {
                    size: 12, 
                    symbol:'square'
                },
                line: {
                    color: 'blue',
                    width: 3,
                    shape: 'spline'
                } 
            };
            
            const traceDownward = {
                x: array_x,
                y: array_down,
                type: 'scatter',
                mode: 'line',
                name: 'Decreasing',
                marker: {
                    size: 12, 
                    symbol:'square',
                },   
                line: {
                    color: 'red',
                    width: 3,
                    shape: 'spline',
                    dash:'dash',
                },
            };
           
            var data = [traceUpward, traceDownward];

            const layout = {
                xaxis : {
                    'type':'category',
                    'title': '<i>Load ('+dataInputs.linearityNominalValueUnit+')</i>',
                    'tickmode': 'array',
                    'tickvals': array_x,
                    'ticktext': array_label,
                    'showgrid': false,
                },  
                yaxis : {
                    'title': {
                        'text':'<i>Error ('+dataInputs.linearityIndicationUnit+')</i>',
                        'standoff': 10
                    },
                    'tickformat': '.'+readabilityNumberOfDecimalPlace+'f', // number of decimal points in y-axis label .4f = 0.0000, .5f = 0.00000
                    'showgrid': false,
                    // 'range': [minMax.min, minMax.max],
                },
                margin : {
                    t:50,
                    l:100,
                    r:30
                },
                paper_bgcolor : 'rgba(0,0,0,0)',
                plot_bgcolor : 'rgba(0,0,0,0)',
            };

           
            Plotly.newPlot('lineChart', data, layout).then(function(gd){
                Plotly.toImage(
                    gd,{
                        'format':'png',
                    }
                ).then(
                    function(url){
                        $('#chart').val(url)
                    }
                )
            })
}
        