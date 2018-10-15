
var  elSelectPeroid, elComment;
elSelectPeroid = document.getElementById('peroid');
elComment   = document.getElementById('dropDownPeroid');


function switchPeroid() {
		
	var comment = this.options[this.selectedIndex].value;    
	  
	if 				(comment === 'BM') {	elComment.innerHTML = 'Bieżący miesiąc'; pie(); calculateBalance();}
	else if		 (comment === 'PM'){		elComment.innerHTML = 'Poprzedni miesiąc'; pie(); calculateBalance();}
	else if 			(comment === 'BR'){	elComment.innerHTML = 'Bieżący rok'; pie(); calculateBalance();}
	else {

		elComment.innerHTML = 'Zakres wybranych dat: '  + '<br/>'; pie(); calculateBalance();
	  }
}

	elSelectPeroid.addEventListener('change', switchPeroid, false);


