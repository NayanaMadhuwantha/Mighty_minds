var ctx2 = document.getElementById('myChart2').getContext('2d');
var serverAddress="http://localhost/mightyMinds/Mighty_minds";

$(document).ready(function(){
   

    window.bla=1;
	chart3(3,bla);
   
    

    $("#threeday3").click(function(){
       
        destroyChart2();
        chart3(3,bla);

    });

    $("#sevenday3").click(function(){
       
        destroyChart2();
        chart3(7,bla);

    });
    $("#fourteenday3").click(function(){
       
        destroyChart2();
        chart3(14,bla);

    });
    $("#thirtyday3").click(function(){
       
        destroyChart2();
        chart3(30,bla);

    });

    $("#search").click(function(){
        window.bla = $('#empId').val();
        console.log(bla);
        destroyChart2();
        chart3(3,bla);

    });

});

function chart3(range=2,id) {
    $.ajax({
		url : serverAddress+"/includes/predict.include.php?range="+range+"&empId="+id,
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

  