function currentDate(){
	
	var getDate = new Date();
	var year = getDate.getFullYear();
	var month = getDate.getMonth()+1;
	if(month<10) month = "0" + month;
	var day = getDate.getDate();
	if(day<10) day = "0" + day;
	
	var dataString = year + "-" + month + "-" + day;
	document.getElementById("currentDate").value = dataString;
}

currentDate();