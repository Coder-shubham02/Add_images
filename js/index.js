
function vld(){
	var nm=document.getElementById("unm").value;
	nm=nm.trim();
	if(nm==""){
	alert("please enter your first name");
	document.getElementById("unm").focus();
	document.getElementById("unm").value="";
	 return false;
	 }
	if(nm.length<2){
	alert("please enter at least 2 chr");
	document.getElementById("unm").focus();
	  return false;
	}		
}