<!-- Connecting database -->
<?php
include('./includes/connect.php');
include('functions/common_function.php');
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Spree</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

    <!-- CSS file -->
    <link rel="stylesheet" href="style.css">
    <style>
        * {
            overflow-x: hidden;
        }

        #main {
            overflow: hidden;
        }


        .product-detail {
            margin-top: 3%;
        }

        .product-detail .details {
            display: grid;
            grid-template-columns: 1fr 1.2fr;
            gap: 3%;
        }

        .product-detail .left {
            display: flex;
            flex-direction: column;
        }

        .product-detail .left .main {
            text-align: center;
            background-color: white;
            margin-bottom: 2%;
            height: 50%;
            padding: 1%;
        }

        .product-detail .left .main img {
            object-fit: contain;
            height: 100%;
            width: 100%;
        }

        .product-detail .right span {
            display: inline-block;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .product-detail .right h3 {
            line-height: 1.2;
            margin-bottom: 4%;
            overflow: hidden;
        }

        .product-detail .right .price {
            font-size: 1rem;
            color: var(--primary);
            margin-bottom: 4%;
        }

        .product-detail .right div {
            display: inline-block;
            position: relative;
            z-index: 1;
        }

        .product-detail form {
            margin-bottom: 4%;
        }

        .product-detail form span {
            position: absolute;
            top: 50%;
            right: 1rem;
            transform: translateY(-50%);
            font-size: 2rem;
            z-index: 0;
        }

        .product-detail .form {
            margin-bottom: 3rem;
        }

        .product-detail .form input {
            padding: 0.8rem;
            text-align: center;
            width: 3.5rem;
            margin-right: 2rem;
        }

        .product-detail h4 {
            margin-bottom: 2%;
            overflow: hidden;
        }

        @media only screen and (max-width: 996px) {
            .product-detail .left {
                height: 45rem;
            }

            .product-detail .details {
                gap: 3%;
            }
        }

        @media only screen and (max-width: 650px) {
            .product-detail .details {
                grid-template-columns: 1fr;
            }

            .product-detail .right {
                margin-top: 1%;
            }

            .product-detail .left {
                height: 50%;
                width: 100%;
            }

            .product-detail .details {
                gap: 3%;
            }

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
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="displayall.php">Products</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="feedback.php">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php
                                count_of_items_in_cart();
                            ?></sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total: &#8377;<?php
                            total_cart_price();
                            ?></a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search" action="index.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <input type="submit" value="Search" class="btn btn-outline-light w-50" name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>
        <?php
            cart();
        ?>
        <!-- Second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <ul class="navbar-nav me-auto">
                <?php
                    if(isset($_SESSION['username'])){
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='./users/profile.php'>My Account</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='./users/logout.php'>Logout</a>
                    </li>";
                    }else{
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='#'>Welcome Guest</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='./users/user_login.php'>Login</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='./users/user_registration.php'>Sign In</a>
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
            <div class="col-md-10">
                <!-- Products -->
                <div class="row">
                    <!-- Fetching Products -->
                    <?php
                    // if (isset($_GET['search_data_product'])) {
                    //     search_product();
                    // } else {
                    //     get_products();
                    // }
                    view_details();
                    get_unique_categories();
                    get_unique_brands();

                    ?>



                </div>
            </div>
            <div class="col-md-2 bg-secondary p-0">
                <!-- sidenav -->
                <!-- brands -->
                <ul class="navbar-nav me-auto text-center text-light">
                    <li class="nav-item">
                        <a href="#" class="nav-link ">
                            <h5 class="overflow-hidden">Delivery Brands</h5>
                        </a>
                    </li>

                    <?php
                    get_brands();
                    ?>
                </ul>
                <!-- categories -->
                <ul class="navbar-nav me-auto text-center text-light">
                    <li class="nav-item">
                        <a href="#" class="nav-link ">
                            <h5 class="overflow-hidden">Categories</h5>
                        </a>
                    </li>

                    <?php
                    get_categories();
                    ?>
                </ul>
            </div>
        </div>

        <!-- include footer -->
        <?php
        include('./includes/footer.php');
        ?>
    </div>



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</html>