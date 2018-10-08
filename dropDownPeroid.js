var elementDD_1=document.getElementById("BM");
var elementDD_2=document.getElementById("PM");
var elementDD_3=document.getElementById("BR");
var elementDD_4=document.getElementById("NS");



elementDD_1.addEventListener('change', switchPeroid, false);
elementDD_2.addEventListener('change', switchPeroid, false);
elementDD_3.addEventListener('click', switchPeroid, false);
elementDD_4.addEventListener('click', switchPeroid, false);


function switchPeroid(){
	
	var peroid = this.options[this.selectedIndex].value; 
	
	if (elementDD_1) peroid.innerHTML = "Bieżący miesiąc";
	else if (elementDD_2) peroid.innerHTML = "Poprzedni miesiąc";
	else if (elementDD_3) peroid.innerHTML = "Bieżący rok";
	else (elementDD_4) peroid.innerHTML = "Niestandardowy";
	
	//if (elementDD_4)
	
	
	
}