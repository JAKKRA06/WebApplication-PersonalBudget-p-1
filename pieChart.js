
window.onload = function() {

		var chart = new CanvasJS.Chart("chartContainer", {
			animationEnabled: true,
			title: {
				text: "Wykres przedstawia Twoje wydatki z wybranego okresu"
			},
			data: [{
				type: "pie",
				startAngle: 220,
				yValueFormatString: "##00.00\"zł\"",
				indexLabel: "{label} {y}",
				dataPoints: [
					{y: 79.45, label: "Mieszkanie"},
					{y: 7.31, label: "Transport"},
					{y: 7.06, label: "Jedzenie"},
					{y: 4.91, label: "Kursy"},
					{y: 1.26, label: "Opieka medyczna"}
				]
			}]
		});
		chart.render();

		}