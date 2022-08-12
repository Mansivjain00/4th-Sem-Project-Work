<!-- Connecting database -->
<?php
include('./includes/connect.php');
include('functions/common_function.php');
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Spree: Cart</title>
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

        .cart_img {
            width: 25%;
            height: 25%;
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
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="displayall.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php
                                                                                                                count_of_items_in_cart();
                                                                                                                ?></sup></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <?php
        cart();
        ?>
        <!-- Second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Welcome Guest</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./users/user_login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./users/user_registration.php">Sign In</a>
                </li>
            </ul>
        </nav>

        <!-- Third child -->
        <div class="bg-light my-3" id="main">
            <h3 class="text-center overflow-hidden">Spree</h3>
            <p class="text-center">Your One Stop Solution!</p>
        </div>

        <!-- Fourth Child -->
        <div class="container">
            <div class="row table-responsive">
                <form action="" method="post">
                    <table class="table table-bordered text-center table-striped">
                        
                            <!-- Php code for dynamic data -->
                            <?php
                            global $con;
                            $ip = getIPAddress();
                            $total = 0;
                            $select_query = "Select * from `cart_details` where ip_address='$ip'";
                            $result = mysqli_query($con, $select_query);

                            $result_count = mysqli_num_rows($result);
                            if ($result_count > 0) {

                                echo "<thead>
                                <th>Product Title</th>
                                <th>Product Image</th>
                                <th>Price</th>
                                <th>Remove</th>
                                <th colspan='2'>Operations</th>
                            </thead>
                            <tbody>";

                                while ($row = mysqli_fetch_array($result)) {
                                    $product_id = $row['product_id'];
                                    $price_query = "Select * from `products` where product_id='$product_id'";
                                    $result_products = mysqli_query($con, $price_query);
                                    while ($row_product_price = mysqli_fetch_array($result_products)) {
                                        $product_price = array($row_product_price['price']);
                                        $product_table = $row_product_price['price'];
                                        $product_title = $row_product_price['product_title'];
                                        $product_image = $row_product_price['product_image'];
                                        $price = array_sum($product_price);
                                        $total += $price;
                                        echo "<tr>
                            <td style='width:30%'>$product_title</td>
                            <td style='width:30%'><img src='./admin/product_images/$product_image' alt='' class='cart_img'></td>
                            <td>&#8377;$product_table</td>
                            <td><input type='checkbox' name='removeitem[]' value=$product_id></td>
                            <td class='m-auto'>
                                <input type='submit' value='Remove' name='remove_cart' class='btn btn-secondary mx-1'>
                            </td>
                        </tr>";
                                    }
                                }
                                echo "</tbody></table>
                                <!-- subtotal -->
                                <div class='d-flex my-4'>
                                    <h5 class='p-2 my-2'>Subtotal:&#8377;$total</h5>
                                    <a href='index.php' class='btn btn-secondary p-2 border-0 mx-3 my-2'> Continue Shopping..</a>
                                    <a href='./users/checkout.php' class='btn btn-secondary p-2 border-0 my-2'>Checkout</a>
                                </div>";
                            }
                            else{
                                echo "<div class='d-flex my-4'>
                                <h3 class='p-2 my-2'>Cart is Empty!</h3>
                                <a href='index.php' class='btn btn-secondary p-2 border-0 mx-3 my-2'> Continue Shopping..</a>";
                            }
                            ?>

                        
                    
            </div>
        </div>
        </form>

        <!-- function to remove item -->

        <?php
        function remove_cart_item()
        {
            global $con;
            if (isset($_POST['remove_cart'])) {
                foreach ($_POST['removeitem'] as $remove_id) {
                    echo $remove_id;
                    $delete_query = "delete from `cart_details` where product_id=$remove_id";
                    $run_delete = mysqli_query($con, $delete_query);
                    if ($run_delete) {
                        echo "<script>window.open('cart.php','_self')</script>";
                    }
                }
            }
        }

        echo $remove_item = remove_cart_item();
        ?>


        <!-- include footer -->
        <?php
            include('./includes/footer.php');
        ?>
    </div>



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</html>