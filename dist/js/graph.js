$(document).ready(function(){
	chart();

    console.log(jsVar);

    $("#threeday").click(function(){
       
        destroyChart();
        chart(3);

    });

    $("#sevenday").click(function(){
       
        destroyChart();
        chart(7);

    });
    $("#fourteenday").click(function(){
       
        destroyChart();
        chart(14);

    });
    $("#thirtyday").click(function(){
       
        destroyChart();
        chart(30);

    });



    $("#threeday2").click(function(){
       
        destroyChart();
        chart2(3,bla);

    });

    $("#sevenday2").click(function(){
       
        destroyChart();
        chart2(7,bla);

    });
    $("#fourteenday2").click(function(){
       
        destroyChart();
        chart2(14,bla);

    });
    $("#thirtyday2").click(function(){
       
        destroyChart();
        chart2(30,bla);

    });

    $("#search").click(function(){
        window.bla = $('#empId').val();
        console.log(bla);
        destroyChart();
        chart2(2,bla);

    });


    $("#threeday3").click(function(){
       
        destroyChart();
        chart3(3);

    });

    $("#sevenday3").click(function(){
       
        destroyChart();
        chart3(7);

    });
    $("#fourteenday3").click(function(){
       
        destroyChart();
        chart3(14);

    });
    $("#thirtyday3").click(function(){
       
        destroyChart();
        chart3(30);

    });

});






function chart(range=2) {
    $.ajax({
		url : "http://localhost/mightyMinds/Mighty_minds/includes/graph.include.php?range="+range,
		type : "GET",
        dataType: "json",
		success : function(data){
			console.log(data);

			var date_r = [];
			var mood_r = [];
			
            console.log(data.DatePosted);

			for(var i in data) {
				date_r.push(data[i].DatePosted);
				mood_r.push(data[i].Mood);

 
			}

            var date=date_r.reverse();
            var mood=mood_r.reverse();


			var ctx = document.getElementById('myChart').getContext('2d');
window.myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: date,
        datasets: [{
            label: 'Mood',
            data: mood,
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        }]
    },
    options: {
        scales: {
            y: {
                type: 'category',
                labels: ['Great','Good','Okay','Bad']
            }
        }
    }
});


		},
		error : function(data) {

		}
	});
    

}

function chart2(range=2,id) {
    $.ajax({
		url : "http://localhost/mightyMinds/Mighty_minds/includes/moodhistory.include.php?range="+range+"&empId="+id,
		type : "GET",
        dataType: "json",
		success : function(data){
			console.log(data);

			var date_r = [];
			var mood_r = [];
			
            console.log(data.DatePosted);

			for(var i in data) {
				date_r.push(data[i].DatePosted);
				mood_r.push(data[i].Mood);

 
			}

            var date=date_r.reverse();
            var mood=mood_r.reverse();


			var ctx = document.getElementById('myChart').getContext('2d');
window.myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: date,
        datasets: [{
            label: 'Mood',
            data: mood,
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        }]
    },
    options: {
        scales: {
            y: {
                type: 'category',
                labels: ['Great','Good','Okay','Bad']
            }
        }
    }
});


		},
		error : function(data) {

		}
	});
    

}

function chart3(range=2) {
    $.ajax({
		url : "http://localhost/mightyMinds/Mighty_minds/includes/predict.include.php?range="+range,
		type : "GET",
        dataType: "json",
		success : function(data){
			console.log(data);

			var date_r = [];
			var mood_r = [];
			
            console.log(data.DatePosted);

			for(var i in data) {
				date_r.push(data[i].DatePosted);
				mood_r.push(data[i].Mood);

 
			}

            var date=date_r.reverse();
            var mood=mood_r.reverse();


			var ctx = document.getElementById('myChart').getContext('2d');
window.myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: date,
        datasets: [{
            label: 'Mood',
            data: mood,
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        }]
    },
    options: {
        scales: {
            y: {
                type: 'category',
                labels: ['Great','Good','Okay','Bad']
            }
        }
    }
});


		},
		error : function(data) {

		}
	});
    

}

function destroyChart() {
    myChart.destroy();
  }