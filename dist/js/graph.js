var ctx = document.getElementById('myChart').getContext('2d');

$(document).ready(function(){

   
	chart(3);


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