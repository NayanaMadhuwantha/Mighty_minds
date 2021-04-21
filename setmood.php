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
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Set your mood</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
           
              <div class="card-body">
                  <div class="row">
                      <div class="col-md-6">
                          <div>Date : <?=date("Y/m/d")?></div>
                      </div>
                      <div class="col-md-6">
                          <div>Department : <?=$_SESSION['userInfo']['Department']?></div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                          <div>Day : <?=date("l")?></div>
                      </div>
                      <div class="col-md-6">
                          <div>Supervisor : <?=$_SESSION['userInfo']['Supervisor']?></div>
                      </div>
                  </div>
               <?php

  //find whether mood submitted or not
  $Database = new Database();
  $conn = $Database->getConnection();
  $sql="SELECT * FROM mood WHERE EmployeeID='".$_SESSION['userInfo']['ID']."' AND DatePosted='".date("Y-m-d")."'";
  $result=$conn->query($sql);


  echo "<br>";
  if (!$row=$result->fetch_assoc()) {
      echo '
      <h4 style="padding:5px;">How would you rate your overall wellbeing levels when you are at work?</h4>
      <form action="includes/Mood.include.php" method="post">
      <input type="hidden" name="employeeID" value="' . $_SESSION['userInfo']['ID'] . '">
      <table style="width:50%; margin: 10px;">
      <tr>
      <td> <input type="radio" id="vehicle1" name="mood" value="Bad" required></td>
      <td> <label for="mood">Bad</label></td>
      <td><i class="fas fa-frown"></i></td>
      </tr>
      <tr>
      <td> <input type="radio" id="vehicle2" name="mood" value="Okay" required></td>
      <td> <label for="mood">Okay</label></td>
      <td> <i class="fas fa-meh"></i></td>
      </tr>
      <tr>
      <td> <input type="radio" id="vehicle3" name="mood" value="Good" required></td>
      <td><label for="mood">Good</label></td>
      <td><i class="fas fa-smile"></i></td>
      </tr>
      <tr>
      <td> <input type="radio" id="vehicle3" name="mood" value="Great" required></td>
      <td>  <label for="mood">Great</label></td>
      <td>  <i class="fas fa-laugh"></i></td>
      </tr>
      </table>
           
        <button class="btn btn-primary" type="submit">Submit</button>
          </form>';
  }
  else{
      echo 'You already submitted today. Mood: '.$row['Mood'];
  }



                ?>
               

              </div>
              <!-- /.card-body -->

             
            <!-- /.card-body -->
          </div>



        </div>
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
</div>




<?php
include('layout/scripts.php');
include('layout/footer.php');
?>