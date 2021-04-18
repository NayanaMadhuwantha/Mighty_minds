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
              <h3 class="card-title">Add Employee</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="includes/AddEmployee.include.php">
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input id="name" name="name" type="text" class="form-control" placeholder="Name" required>
                </div>     
              
                <div class="form-group">
                  <label for="supervisor">Email</label>
                  <input id="supervisor" name="email" type="text" class="form-control" placeholder="email" required>
                </div>      

                <div class="form-group">
                  <label for="password">Password</label>
                  <input id="password" name="password" type="password" class="form-control" placeholder="password" required>
                </div>
                <div class="form-group">
                  <label for="supervisor">Supervisor</label>
                  <input id="supervisor" name="supervisor" type="text" class="form-control" placeholder="supervisor">
                </div>
                <div class="form-group">
                  <label for="department">Department</label>
                  <select name="department" class="form-control" id="department">
                    <option value="HR">HR</option>
                    <option value="finance">Finance</option>
                    <option value="engineering">Engineering</option>
                    <option value="QA">QA</option>
                    <option value="BA">BA</option>

                  </select>
                </div>

                <div class="form-group">
                  <label for="location">Location</label>
                  <input id="location" name="location" type="text" class="form-control" placeholder="Location">
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
                    <th>Emp ID</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Email</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                     
                <?php

$Database = new Database();
$conn = $Database->getConnection();
            
            $sq="SELECT * FROM employee WHERE role='user'";
            $result=$conn->query($sq);

              while ($row=$result->fetch_assoc()) {
               echo "
               <tr>
               <td>".$row['ID']."</td>
               <td>".$row['Name']."</td>
               <td>".$row['Department']."</td>
               <td>".$row['Email']."</td>
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