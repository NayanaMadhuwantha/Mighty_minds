var serverAddress="http://localhost/mightyMinds/Mighty_minds";

$(document).ready(function(){

    window.bla=1;
	chart2(3,bla);

 
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


    

});


function chart2(range=2,id) {
    $.ajax({
		url : serverAddress+"/includes/moodhistory.include.php?range="+range+"&empId="+id,
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