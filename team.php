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
                  <div class="col-md-12">
                      <div class="card card-info">
                          <div class="card-header">
                              <h3 class="card-title">Articles</h3>

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
                                      <th>Article Name</th>
                                      <th>size(KB)</th>
                                      <th>FileName</th>
                                      <th>Action</th>
                                      <th></th>
                                  </tr>
                                  </thead>
                                  <tbody>

                                  <?php

                                  $Database = new Database();
                                  $conn = $Database->getConnection();

                                  $sq="SELECT * FROM articles";
                                  $result=$conn->query($sq);

                                  while ($row=$result->fetch_assoc()) {
                                      echo "
                                               <tr>
                                               <td>".$row['ArticleName']."</td>
                                               <td>".floor($row['Size'] / 1000)."</td>
                                               <td>".$row['Name']."</td>
                                               <td><a href='includes/fileDownload.include.php?file_id=".$row['ID']."'>Download</a></td>
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
              </div>

            <div class="row">
              <div class="col-md-12">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Upload Article</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="includes/fileupload.include.php" enctype="multipart/form-data">
                  <div class="card-body">
                      <div class="form-group">
                          <label for="name">Article Name</label>
                          <input id="articleName" name="articleName" type="text" class="form-control" placeholder="Article Name" required>
                      </div>

                      <div class="form-group">
                      <label for="exampleInputFile">File input</label>
                      <input type="file" placeholder="Event photo" id="exampleInputFile" name="file" required>
                    
                    </div>
                   
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Upload</button>
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