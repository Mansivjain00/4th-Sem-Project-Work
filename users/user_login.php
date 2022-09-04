<?php
    include('../includes/connect.php');
    include('../functions/common_function.php');
    // @ to make sure session starts only if this file is active
    @session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spree: User Login</title>

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
                            <a class="nav-link" href="../feedback.php">Contact</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search" action="../index.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <input type="submit" value="Search" class="btn btn-outline-light w-50" name="search_data_product">
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
            <h3 class="text-center overflow-hidden">User Login</h3>
            <div class="row d-flex align-items-center justify-content-center">
                <div class="lg-12 col-xl-6">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-outline my-2">
                            <label for="user_username" class="form-label">Username</label>
                            <input type="text" id="user_username" class="form-control" placeholder="Enter Your Username" autocomplete="off" required="required" name="user_username">
                        </div>
                        <div class="form-outline my-2">
                            <label for="user_password" class="form-label">Password</label>
                            <input type="password" id="user_password" class="form-control" placeholder="Enter Your Password" autocomplete="off" required="required" name="user_password">
                        </div>
                        <div class="text-center my-2">
                            <input type="submit" value='Login' class="btn btn-secondary p-2 border-0 my-1" name="user_login">
                            <p class="small m-2 p-1 ">Dont have an account? <a href="user_registration.php" class="text-decoration-none">Register</a> </p>
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

<!-- PHP Codes -->
<?php
global $con;
if (isset($_POST['user_login'])) {
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];
    $user_ip=getIPAddress();

    $select_query = "select * from `user_table` where username='$user_username'";
    $result_select = mysqli_query($con, $select_query);
    $rows = mysqli_num_rows($result_select);
    $row_data = mysqli_fetch_assoc($result_select);

    // Checking if user has added items to redirect accordingly
    $select_cart_items = "select * from `cart_details` where ip_address='$user_ip'";
    $result_cart = mysqli_query($con, $select_cart_items);
    $rows_count_cart = mysqli_num_rows($result_cart);

    if ($rows > 0) {
        $_SESSION['username']=$user_username;
        if (password_verify($user_password, $row_data['user_password'])) {
            echo "<script>alert('You have Logged In Successfully!!')</script>";
            if ($rows_count_cart > 0) {
                $_SESSION['username'] = $user_username;
                // echo "<script>alert('You have items in your cart!')</script>";
                echo "<script>window.open('payment.php','_self')</script>";
            } else {
                $_SESSION['username']=$user_username;
                echo "<script>window.open('profile.php','_self')</script>";
            }
        } else {
            echo "<script>alert('Invalid Credentials')</script>";
        }
    } else {
        echo "<script>alert('Invalid Credentials')</script>";
    }

    // Selecting cart items to see if user has added items without registering
    

    
}
?>