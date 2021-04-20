<?php

include 'includes/Database.include.php';
date_default_timezone_set("Asia/Colombo");

include('layout/header.php');
include('layout/navbar.php');
include('layout/sidebar.php');
?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <button id="threeday3" class="btn btn-primary">3 day</button>
        <button id="sevenday3" class="btn btn-primary">7 day</button>
        <button id="fourteenday3" class="btn btn-primary">14 day</button>
        <button id="thirtyday3" class="btn btn-primary">30 day</button>
            <div class="row">
               
            
                <div id="chart-container">
                <canvas id="myChart2" width="80%"></canvas>
                </div>
            </div>
            
           

        </div>
    </div>
</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
  var ctx = document.getElementById('myChart3').getContext('2d');
  console.log(ctx);
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

  

</script>


<script src="https://use.fontawesome.com/ef4ad7671b.js"></script>
<!-- jQuery -->

<script src="dist/js/jquery.min.js"></script>
<!-- Bootstrap 4 -->

<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.1.1/dist/chart.min.js"></script>
<script src="dist/js/prediction_graph.js"></script>

<?php
echo $server;

include('layout/footer.php');
?>