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
               <?php
  echo $_SESSION['userInfo']['Name'];
  echo date("Y/m/d") ;
  echo date("l") ;


  //find whether mood submitted or not
  $Database = new Database();
  $conn = $Database->getConnection();
  $sql="SELECT * FROM mood WHERE EmployeeID='".$_SESSION['userInfo']['ID']."' AND DatePosted='".date("Y-m-d")."'";
  $result=$conn->query($sql);


  echo "<br><hr>";
  if (!$row=$result->fetch_assoc()) {
      echo '<form action="includes/Mood.include.php" method="post">
            <input type="hidden" name="employeeID" value="' . $_SESSION['userInfo']['ID'] . '">
            <input type="radio" id="vehicle1" name="mood" value="Bad" required>
            <label for="mood">Bad</label><br>
            <input type="radio" id="vehicle2" name="mood" value="Okay" required>
            <label for="mood">Okay</label><br>
            <input type="radio" id="vehicle3" name="mood" value="Good" required>
            <label for="mood">Good</label><br>
            <input type="radio" id="vehicle3" name="mood" value="Great" required>
            <label for="mood">Great</label><br>
            <button type="submit">Submit</button>
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