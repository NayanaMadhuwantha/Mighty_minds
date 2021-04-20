<?php

include 'includes/Database.include.php';
date_default_timezone_set("Asia/Colombo");

include('layout/header.php');
include('layout/navbar.php');
include('layout/sidebar.php');

$vendorName = null;
if (isset($_POST['VendorName'])){
    $vendorName =$_POST['VendorName'];
}

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Search Vendor</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="searchVendors.php" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Vendor Name</label>
                                    <?php
                                        if ($vendorName){
                                            echo '<input id="VendorName" name="VendorName" type="text" class="form-control" placeholder="Vendor Name" value="'.$vendorName.'" required>';
                                        }
                                        else{
                                            echo '<input id="VendorName" name="VendorName" type="text" class="form-control" placeholder="Vendor Name" required>';
                                        }
                                    ?>
                                    </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-body p-0">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Department</th>
                                    <th>Contact Number</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php

                                $Database = new Database();
                                $conn = $Database->getConnection();

                                $sq="SELECT * FROM vendor WHERE `Name` LIKE '%".$vendorName."%'";
                                $result=$conn->query($sq);

                                if ($result) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "
                                               <tr>
                                               <td>" . $row['Name'] . "</td>
                                               <td>" . $row['Email'] . "</td>
                                               <td>" . $row['Service'] . "</td>
                                               <td>" . $row['ContactNumber'] . "</td>
                                               </tr>
                                               ";
                                    }
                                }
                                else{
                                    echo "
                                               <tr>
                                               <td>No results found</td>
                                               </tr>
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


        </div>
    </div>
</div>



<?php
include('layout/scripts.php');
include('layout/footer.php');
?>