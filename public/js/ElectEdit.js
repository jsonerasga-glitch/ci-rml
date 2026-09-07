function pabLOGO(logo) {
  var checkPab = document.getElementById("checkBoxPabLogo");
  if (checkPab.checked == true) {
    console.log("true");
    document.getElementById("pabLogo").src = logo;
    document.getElementById("pablogoValue").value = true;
  } else {
    console.log("false");
    document.getElementById("pabLogo").src = "";
    document.getElementById("pablogoValue").value = false;
  }
}
