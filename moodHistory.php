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
           
            

            <div style="margin:10px;" class="form-inline">
            <label for="search">Search</label>
            <input style="width:50%; margin:10px" value="1" id="empId"  type="text" class="form-control" placeholder="Id">
            <button  id="search" class="btn btn-primary">Search</button>
            </div>
           

          
            <button id="threeday2" class="btn btn-primary">3 day</button>
            <button id="sevenday2" class="btn btn-primary">7 day</button>
            <button id="fourteenday2" class="btn btn-primary">14 day</button>
            <button id="thirtyday2" class="btn btn-primary">30 day</button>
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
<script src="dist/js/moodhistory_graph.js"></script>

<?php

include('layout/footer.php');
?>