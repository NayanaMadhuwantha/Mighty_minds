<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
            <h4>Past Moodswings</h4>
                <button id="threeday" class="btn btn-primary">3 day</button>
                <button id="sevenday" class="btn btn-primary">7 day</button>
                <button id="fourteenday" class="btn btn-primary">14 day</button>
                <button id="thirtyday" class="btn btn-primary">30 day</button>
                <div id="chart-container">
                <canvas id="myChart" width="80%"></canvas>
                </div>
            </div>
            <div class="col-md-6">
            <h4>Future Moodswings</h4>
                <button id="threeday3" class="btn btn-primary">3 day</button>
                <button id="sevenday3" class="btn btn-primary">7 day</button>
                <button id="fourteenday3" class="btn btn-primary">14 day</button>
                <button id="thirtyday3" class="btn btn-primary">30 day</button>
                <div id="chart-container">
                    <canvas id="myChart2" width="80%"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script src="dist/js/jquery.min.js"></script>
    <!-- Bootstrap 4 -->

    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.1.1/dist/chart.min.js"></script>

    <script src="dist/js/graph.js"></script>
    <script src="dist/js/prediction_graph.js"></script>
</body>

</html>