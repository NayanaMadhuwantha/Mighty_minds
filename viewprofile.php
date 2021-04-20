<?php
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
              <h3 class="card-title">Profile</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
              <div class="card-body">
                <div class="form-group">
                  <label>Name</label>
                  <h3><?=$_SESSION['userInfo']['Name']?></h3>
                </div>
                <div class="form-group">
                  <label>Employee ID</label>
                  <h3><?=$_SESSION['userInfo']['ID']?></h3>
                </div>
                <div class="form-group">
                  <label >Supervisor</label>
                  <h3><?=$_SESSION['userInfo']['Supervisor']?></h3>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <h3><?=$_SESSION['userInfo']['Email']?></h3>
                </div>
                <div class="form-group">
                  <label>Department</label>
                  <h3><?=$_SESSION['userInfo']['Department']?></h3>
                </div>
                <div class="form-group">
                  <label>Location</label>
                  <h3><?=$_SESSION['userInfo']['Location']?></h3>
                </div>

              </div>
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