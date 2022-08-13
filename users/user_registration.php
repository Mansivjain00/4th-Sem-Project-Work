<?php

use LDAP\Result;

include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spree: User Registration</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

    <!-- CSS file -->
    <link rel="stylesheet" href="style.css">
</head>

<body>


    <!-- Navbar -->
    <div class="container-fluid p-0">
        <!-- First Child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Spree</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../displayall.php">Products</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search" action="../index.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <input type="submit" value="Search" class="btn btn-outline-light p-1" name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>
        <!-- Second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <ul class="navbar-nav me-auto">
                <?php
                    if(isset($_SESSION['username'])){
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='profile.php'>My Account</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='logout.php'>Logout</a>
                    </li>";
                    }else{
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='#'>Welcome Guest</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='user_login.php'>Login</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='user_registration.php'>Sign In</a>
                    </li>";
                    }
                ?>
            </ul>
        </nav>


        <!-- Third child -->
        <div class="bg-light my-3" id="main">
            <h3 class="text-center overflow-hidden">Spree</h3>
            <p class="text-center">Your One Stop Solution!</p>
        </div>

        <div class="container-fluid my-3">
            <h3 class="text-center">New User Registration</h3>
            <div class="row d-flex align-items-center justify-content-center">
                <div class="lg-12 col-xl-6">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-outline my-2">
                            <label for="user_username" class="form-label">Username</label>
                            <input type="text" id="user_username" class="form-control" placeholder="Enter Your Username" autocomplete="off" required="required" name="user_username">
                        </div>
                        <div class="form-outline my-2">
                            <label for="user_email" class="form-label">Email</label>
                            <input type="email" id="user_email" class="form-control" placeholder="Enter Your Email" autocomplete="off" required="required" name="user_email">
                        </div>
                        <div class="form-outline my-2">
                            <label for="user_image" class="form-label">Profile Picture</label>
                            <input type="file" id="user_image" class="form-control" placeholder="" autocomplete="off" required="required" name="user_image">
                        </div>
                        <div class="form-outline my-2">
                            <label for="user_password" class="form-label">Password</label>
                            <input type="password" id="user_password" class="form-control" placeholder="Enter Your Password" autocomplete="off" required="required" name="user_password">
                        </div>
                        <div class="form-outline my-2">
                            <label for="confirm_user_password" class="form-label">Confirm Password</label>
                            <input type="password" id="confirm_user_password" class="form-control" placeholder="Confirm Your Password" autocomplete="off" required="required" name="confirm_user_password">
                        </div>
                        <div class="form-outline my-2">
                            <label for="user_address" class="form-label">Address</label>
                            <input type="text" id="user_address" class="form-control" placeholder="Enter Your Address" autocomplete="off" required="required" name="user_address">
                        </div>
                        <div class="form-outline my-2">
                            <label for="user_contact" class="form-label">Contact</label>
                            <input type="text" id="user_contact" class="form-control" placeholder="Enter Your Contact" autocomplete="off" required="required" name="user_contact">
                        </div>
                        <div class="text-center my-2">
                            <input type="submit" value='Register' class="btn btn-secondary p-2 border-0 my-1" name="user_register">
                            <p class="small m-2 p-1 ">Already have an account? <a href="user_login.php" class="text-decoration-none">Login</a> </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php
        include('../includes/footer.php');
        ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</html>


<!-- PHP Code -->
<?php
if (isset($_POST['user_register'])) {
    // Getting form information
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_temp = $_FILES['user_image']['tmp_name'];
    $user_password = $_POST['user_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $confirm_user_password = $_POST['confirm_user_password'];
    $user_address = $_POST['user_address'];
    $user_contact = $_POST['user_contact'];

    $user_ip = getIPAddress();

    $select_query = "select * from `user_table` where username='$user_username' or user_email='$user_email'";
    $result_select = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result_select);

    // Checking is user already exists, and checking if the passwords match

    if ($rows_count >0) {
        echo "<script>alert('Username/Email already exists!')</script>";     
    }else if($user_password!=$confirm_user_password){
        echo "<script>alert('Passwords do not match!')</script>";
    }
    else{
        move_uploaded_file($user_image_temp, "./user_images/$user_image");
        $insert_query = "insert into `user_table`(username,user_email,user_password,user_image,user_ip,user_address,user_mobile) values('$user_username','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_contact')";
        $insert_result = mysqli_query($con, $insert_query);

        if ($insert_result) {
            echo "<script>alert('User Registered Successfully')</script>";
        } 
        else {
            echo "<script>alert('couldnt register user')</script>";
        }
    }

    // Selecting cart items to see if user has added items without registering
    $select_cart_items="select * from `cart_details` where ip_address='$user_ip'";
    $result_cart=mysqli_query($con,$select_cart_items);
    $rows = mysqli_num_rows($result_cart);

    if($rows>0){
        $_SESSION['username']=$user_username;
        // echo "<script>alert('You have items in your cart!')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    }else{
        echo "<script>window.open('user_login.php','_self')</script>";
    }
}
?>