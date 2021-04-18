<?php 
session_start();
if(isset($_SESSION['username'])){
    header("Location: setmood.php");
  }
  include('layout/header.php');
   
?>

<div class="container-fluid">
            <div class="row">
            <div class="col-md-3"></div>
              <div class="col-md-6">
              <div class="card card-primary login-card">
                <div class="card-header">
                  <h3 class="card-title">Log In</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="includes/login.include.php"  method="post" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input name="username" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                   
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                  <?php
                     if(isset($_GET['error'])){
                        echo "<p style='color:red'>Wrong username or password</p>";
                      }
                  ?>
                 
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-md-3"></div>
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->

</div>
          <?php
    include('layout/scripts.php');
    include('layout/footer.php');
    ?>