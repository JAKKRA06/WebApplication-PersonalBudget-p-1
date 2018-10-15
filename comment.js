 function calculateBalance(){
	
	var sum_incomes = 22;
	var sum_expenses = 30;
	var sum = sum_incomes - sum_expenses;
		
		if (sum_incomes > sum_expenses)
			{
				var comment = 'Świetnie zarządzasz swoimi wydatkami !' + '<br/>' + sum;
				
			}
			else
			{
				comment = 'Uwazaj ! W tym okresie wygenerowałes straty !' + '<br/>' + sum;
					
			}
									

	document.getElementById('comment').innerHTML = comment;
}

//var elComment = document.getElementById('commnet');