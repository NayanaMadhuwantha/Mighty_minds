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
                  <h3 class="card-title">New Team member</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="layout/newevent.include.php" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Heading 1</label>
                      <input name="heading1" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Description</label>
                      <input name="description" type="text" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">File input</label>
                      <input type="file" placeholder="Event photo" id="exampleInputFile" accept="image/jpeg" name="eventPhoto" required>
                    
                    </div>
                    <div class="form-group">
                      <label for="attachment">Attachment</label>
                      <input type="file" class="form-control"  id="attachment"  name="attachment">
                    </div>
                   
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
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