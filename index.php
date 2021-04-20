<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: setmood.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
        <div style="margin-top: 100px;" class=" card-primary">
                <div class="card-header">
                    <h3 class="card-title">Log In</h3>
                </div>
                <div class="card-body">
                    <form action="includes/login.include.php" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input name="username" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>



                        <div class="card-footer">
                            <?php
                            if (isset($_GET['error'])) {
                                echo "<p style='color:red'>Wrong username or password</p>";
                            }
                            ?>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
           
        </div>
    </div>

</body>

</html>