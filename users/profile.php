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
    <title>Welcome <?php echo $_SESSION['username']?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

    <!-- CSS file -->
    <link rel="stylesheet" href="../style.css">

    <style>
        .profile_img{
            width: 90%;
            margin: auto;
            object-fit: contain;
        }
    </style>
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
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0" >
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../displayall.php">Products</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php
                                                                                                                count_of_items_in_cart();
                                                                                                                ?></sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total: &#8377;<?php
                                                                        total_cart_price();
                                                                        ?></a>
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



        <!-- Fourth Child -->
        <div class="row">
            <div class="col-md-2 my-2">
                <ul class="navbar-nav bg-secondary text-center"style="height: 100vh;">
                        <li class="nav-item bg-secondary text-light">
                            <a class="nav-link "  href="#"><h5 class="overflow-hidden">Your Profile</h5></a>
                        </li>
                        <?php
                            $username=$_SESSION['username'];
                            $user_image="select * from `user_table` where username='$username'";
                            $result_image=mysqli_query($con,$user_image);
                            $row_image=mysqli_fetch_array($result_image);
                            $image=$row_image['user_image'];
                            echo "<li class='nav-item bg-secondary text-light'>
                            <img src='./user_images/$image' alt='' class='profile_img'>
                        </li>";
                        ?>
                        
                        <li class="nav-item bg-secondary text-light">
                            <a class="nav-link "  href="profile.php">Pending Orders</a>
                        </li>
                        <li class="nav-item bg-secondary text-light">
                            <a class="nav-link "  href="profile.php?edit_account">Edit Account</a>
                        </li>
                        <li class="nav-item bg-secondary text-light">
                            <a class="nav-link "  href="profile.php?my_orders">My Orders</a>
                        </li>                       
                        <li class="nav-item bg-secondary text-light">
                            <a class="nav-link "  href="logout.php">Logout</a>
                        </li>                        

                </ul>
            </div>
            <div class="col-md-10 p-0">
                <?php
                    get_user_order_details();
                    if(isset($_GET['edit_account'])){
                        include('edit_account.php');
                    }

                    if(isset($_GET['my_orders'])){
                        include('user_orders.php');
                    }
                ?>
            </div>
        </div>




        <?php
        include('../includes/footer.php');
        ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</html>