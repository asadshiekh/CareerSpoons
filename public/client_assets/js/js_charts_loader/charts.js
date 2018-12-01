
var ctx = document.getElementById("linechart");
var myChart = new Chart(ctx, {
	type: 'bar',
	data: {
		labels: ["User Resume info"],
		datasets: [{
			label: 'Eduction',
			data: [22],
			backgroundColor: [
			'rgba(255, 99, 132, 0.2)'
			],
			borderColor: [
			'rgba(255,99,132,1)'
			],
			borderWidth: 1
		},{
			label: 'Experience',
			data: [41],
			backgroundColor: [
			'rgba(54, 162, 235, 0.2)'
			],
			borderColor: [
			'rgba(54, 162, 235, 1)'
			],
			borderWidth: 1
		},{
			label: 'Project',
			data: [34],
			backgroundColor: [
			'rgba(255, 206, 86, 0.2)'
			],
			borderColor: [
			'rgba(255, 206, 86, 1)'
			],
			borderWidth: 1
		},{
			label: 'Skills',
			data: [27],
			backgroundColor: [
			'rgba(75, 192, 192, 0.2)'
			],
			borderColor: [
			'rgba(75, 192, 192, 1)'
			],
			borderWidth: 1
		},{
			label: 'Languages',
			data: [32],
			backgroundColor: [
			'rgba(153, 102, 255, 0.2)'
			],
			borderColor: [
			'rgba(153, 102, 255, 1)'
			],
			borderWidth: 1
		},{
			label: 'Hobbies',
			data: [18],
			backgroundColor: [
			'rgba(255, 159, 64, 0.2)'
			],
			borderColor: [
			'rgba(255, 159, 64, 1)'
			],
			borderWidth: 1
		}
		]
	},
	options: {
		scales: {
			yAxes: [{
				ticks: {
					beginAtZero:true
				}
			}]
		}
	}
});

var ctx = document.getElementById("doughnut");

var myChart = new Chart(ctx, {
	type: 'doughnut',
	data: {
		labels: ["User Profile"],
		datasets: [{
			data: [12],
			backgroundColor: [
			'rgba(255, 99, 132, 0.2)'
			],
			borderColor: [
			'rgba(255,99,132,1)'
			],
			borderWidth: 1
		}]
	},
	options: {
		scales: {
			yAxes: [{
				ticks: {
					beginAtZero:true
				}
			}]
		}
	}
});
