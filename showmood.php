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
        <button id="threeday" class="btn btn-primary">3 day</button>
        <button id="sevenday" class="btn btn-primary">7 day</button>
        <button id="fourteenday" class="btn btn-primary">14 day</button>
        <button id="thirtyday" class="btn btn-primary">30 day</button>
            <div class="row">
               
            
                <div id="chart-container">
                <canvas id="myChart" width="80%"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://use.fontawesome.com/ef4ad7671b.js"></script>
<!-- jQuery -->

<script src="dist/js/jquery.min.js"></script>
<!-- Bootstrap 4 -->

<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.1.1/dist/chart.min.js"></script>
<script src="dist/js/graph.js"></script>

<?php

include('layout/footer.php');
?>