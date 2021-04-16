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
              <h3 class="card-title">Add Vendor</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="layout/newevent.include.php" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input id="name" name="name" type="text" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input id="email" name="email" type="text" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                  <label for="service">Service</label>
                  <select name="service" class="form-control" id="service">
                    <option value="counselling">Counselling</option>
                    <option value="yoga">Yoga</option>
                    <option value="meditation">Meditation</option>
                    <option value="psychological consultancy">Psychological Consultancy</option>
    
                  </select>
                </div>
                <div class="form-group">
                  <label for="website">Website</label>
                  <input id="website" name="website" type="text" class="form-control" placeholder="Website">
                </div>
                <div class="form-group">
                  <label for="location">Location</label>
                  <input id="location" name="location" type="text" class="form-control" placeholder="Location">
                </div>
                <div class="form-group">
                  <label for="contactNumber">Contact Number</label>
                  <input id="contactNumber" name="contactNumber" type="text" class="form-control" placeholder="Contact Number">
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