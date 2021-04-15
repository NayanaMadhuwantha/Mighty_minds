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
                  <h3 class="card-title">New event</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="layout/newevent.include.php" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input id="title" name="title" type="text" class="form-control"  placeholder="Title">
                    </div>
                    <div class="form-group">
                    <label for="author">Title</label>
                      <input id="author" name="author" type="text" class="form-control"  placeholder="Author">
                    </div>
                    <div class="form-group">
                      <label for="banner">Banner Image</label>
                      <input type="file" class="form-control" placeholder="BannerImage" id="banner" accept="image/jpeg" name="bannerImage" required>
                    </div>
                    <div class="form-group">
                      <label for="authorImage">Banner Image</label>
                      <input type="file" class="form-control" placeholder="AuthorImage" id="authorImage" accept="image/jpeg" name="authorImage" required>
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