<?php

include 'includes/Database.include.php';
date_default_timezone_set("Asia/Colombo");

include('layout/header.php');
include('layout/navbar.php');
include('layout/sidebar.php');

$Database = new Database();
$conn = $Database->getConnection();

$mode = 'past';
$from = '2021-02-15';
$to = date("Y-m-d");
if (isset($_POST['mode'])){
    if ($_POST['mode'] == 'future'){
        $mode = 'future';
    }
    if (!empty($_POST['fromDate']) && !empty($_POST['toDate'])){
        $from = $_POST['fromDate'];
        $to = $_POST['toDate'];
    }
}


$sql="SELECT DISTINCT EmployeeID FROM Mood";
$result=$conn->query($sql);
$happiestEmployee = null;
$maxGreatCount = 0;
$frustratedEmployee = null;
$maxBadCount = null;

if ($mode=='past') {
    while ($row = $result->fetch_assoc()) {
        $sql1 = "SELECT COUNT(mood) AS 'moodCount' FROM Mood WHERE EmployeeID = " . $row['EmployeeID'] . " AND mood = 'Great' AND DatePosted BETWEEN '" . $from . "' AND '" . $to . "'";
        $result1 = $conn->query($sql1);
        while ($row1 = $result1->fetch_assoc()) {
            if ($maxGreatCount < $row1['moodCount']) {
                $maxGreatCount = $row1['moodCount'];
                $happiestEmployee = $row['EmployeeID'];
            }
        }
        $sql2 = "SELECT COUNT(mood) AS 'moodCount' FROM Mood WHERE EmployeeID = " . $row['EmployeeID'] . " AND mood = 'Bad' AND DatePosted BETWEEN '" . $from . "' AND '" . $to . "'";
        $result2 = $conn->query($sql2);
        while ($row2 = $result2->fetch_assoc()) {
            if ($maxBadCount < $row2['moodCount']) {
                $maxBadCount = $row2['moodCount'];
                $frustratedEmployee = $row['EmployeeID'];
            }
        }
    }
}
else{
    $now = time(); // or your date as well
    $your_date = strtotime($to);
    $datediff = $your_date - $now;
    $datediff = round($datediff / (60 * 60 * 24));

    while ($row = $result->fetch_assoc()) {
        $empID= $row['EmployeeID'];
        $tmp = shell_exec("python includes/predict.py ".$empID." " . $datediff);
        $res = str_replace(array('[', ']', '\''), '', $tmp);
        $pieces = explode(",", $res);
        $badCount = 0;
        $greatCount = 0;
        foreach ($pieces as $row) {
            if (trim($row) == 'Bad') {
                $badCount++;
            }
            if (trim($row) == 'Great') {
                $greatCount++;
            }
        }
        if ($maxBadCount<$badCount){
            $maxBadCount = $badCount;
            $frustratedEmployee = $empID;
        }
        if ($maxGreatCount<$greatCount){
            $maxGreatCount = $greatCount;
            $happiestEmployee = $empID;
        }
    }
}


?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="employeeCredits.php">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="mode">Mode</label>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <select name="mode" class="form-control" id="mode">
                                                <?php
                                                if ($mode=='past'){
                                                    echo '<option value="past">Past</option>
                                                          <option value="future">Future</option>';
                                                }
                                                else{
                                                    echo '<option value="future">Future</option>
                                                          <option value="past">Past</option>';
                                                }
                                                ?>

                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="location">Time range</label>
                                    <div class="row">
                                        <div class="col-md-1">
                                            From
                                        </div>
                                        <div class="col-md-4">
                                            <input id="from-date" name="fromDate" type="date" <?=($mode=='past') ? 'max="'.date("Y-m-d").'"' : 'min="'.date("Y-m-d").'" max="'.date("Y-m-d").'"'?> class="form-control" placeholder="Location">
                                        </div>
                                        <div class="col-md-1">
                                            <label>To</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input id="to-date" name="toDate" type="date" <?=($mode=='past') ? 'max="'.date("Y-m-d").'"' : 'min="'.date("Y-m-d").'"'?> class="form-control" placeholder="Location">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Happiest employee from <?=$from?> to <?=$to?></h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table">
                                <thead>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql="SELECT * FROM employee WHERE ID = ".$happiestEmployee;
                                    $result=$conn->query($sql);
                                    if ($result) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>
                                        <td width='50%'><b>Happiest Employee of the Period!</b></td>
                                            <td>" . $row['Name'] . " (Employee Number = " . $row['ID'] . ")</td>
                                        </tr>
                                        <tr>
                                            <td width='50%'><b>Coolest supervisor of the Period!</b></td>
                                            <td>" . $row['Supervisor'] . "</td>
                                        </tr>
                                        <tr>
                                            <td width='50%'><b>Coolest Department of the Period!</b></td>
                                            <td>" . $row['Department'] . "</td>
                                        </tr>";
                                        }
                                    }
                                    ?>


                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Frustrated employee from <?=$from?> to <?=$to?></h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table">
                                <thead>
                                </thead>
                                <tbody>
                                <?php
                                $sql="SELECT * FROM employee WHERE ID = ".$frustratedEmployee;
                                $result=$conn->query($sql);
                                if ($result) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>
                                        <td width='50%'><b>Frustrated Employee of the Period!</b></td>
                                            <td>" . $row['Name'] . " (Employee Number = " . $row['ID'] . ")</td>
                                        </tr>
                                        <tr>
                                            <td width='50%'><b>Hottest supervisor of the Period!</b></td>
                                            <td>" . $row['Supervisor'] . "</td>
                                        </tr>
                                        <tr>
                                            <td width='50%'><b>Hottest Department of the Period!</b></td>
                                            <td>" . $row['Department'] . "</td>
                                        </tr>";
                                    }
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

            </div>
           
        </div>
    </div>
</div>



<?php
include('layout/scripts.php');
include('layout/footer.php');
?>

