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
              <h3 class="card-title">Add Vendor</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="includes/AddVendor.include.php" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input id="name" name="vendorName" type="text" class="form-control" placeholder="Name" required>
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input id="email" name="email" type="text" class="form-control" placeholder="Email" required>
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
                  <input id="contactNumber" name="contact" type="text" class="form-control" placeholder="Contact Number">
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
          <div class="col-md-6">
              <div class="card card-info">
                  <div class="card-header">
                      <h3 class="card-title">Records</h3>

                      <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                              <i class="fas fa-minus"></i>
                          </button>
                      </div>
                  </div>
                  <div class="card-body p-0">
                      <table class="table">
                          <thead>
                          <tr>
                              <th>Vendor ID</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Service</th>
                              <th></th>
                          </tr>
                          </thead>
                          <tbody>

                          <?php

                          $Database = new Database();
                          $conn = $Database->getConnection();

                          $sq="SELECT * FROM vendor";
                          $result=$conn->query($sq);

                          while ($row=$result->fetch_assoc()) {
                              echo "
               <tr>
               <td>".$row['ID']."</td>
               <td>".$row['Name']."</td>
               <td>".$row['Email']."</td>
               <td>".$row['Service']."</td>
               <td class='text-right py-0 align-middle'>
                 <div class='btn-group btn-group-sm'>
                   <a href='#' class='btn btn-info'><i class='fas fa-edit'></i></a>
                 </div>
               </td>
               ";

                          }
                          ?>



                          </tbody>
                      </table>
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