var ctx2 = document.getElementById('myChart2').getContext('2d');
var serverAddress="http://localhost/mightyMinds/Mighty_minds";

$(document).ready(function(){
	chart3(3);
   
    

    $("#threeday3").click(function(){
       
        destroyChart2();
        chart3(3);

    });

    $("#sevenday3").click(function(){
       
        destroyChart2();
        chart3(7);

    });
    $("#fourteenday3").click(function(){
       
        destroyChart2();
        chart3(14);

    });
    $("#thirtyday3").click(function(){
       
        destroyChart2();
        chart3(30);

    });

});

function chart3(range=2) {
    $.ajax({
		url : serverAddress+"/includes/predict.include.php?range="+range,
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

            


			
        
window.myChart2 = new Chart(ctx2, {
    type: 'line',
    data: {
        labels: date_r,
        datasets: [{
            label: 'Mood',
            data: mood_r,
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

function destroyChart2() {
    myChart2.destroy();
  }

  