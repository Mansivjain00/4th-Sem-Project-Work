<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">

    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            overflow-x: hidden;
        }
        .admin-image {
            width:60%;
            object-fit: contain;
        }

        .footer{
            position: absolute;
            bottom: 0;
            width: 100%;
        }
    </style>

    <!-- font awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

</head>

<body>
    <!-- navbar -->
    <!-- first child -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <div class="container-fluid">
                <img src="../images/adminprofile.jpg" alt="" class="logo">
                <nav class="navbar navbar-expand-lg navbar-light bg-dark">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link text-light">Welcome Guest</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

        <!-- second child -->
        <div class="bg-light">
            <h4 class="text-center my-3">Manage Details</h4>
        </div>

        <!-- Third child -->
        <div class="row">
            <div class="col-md-12 bg-dark p-1 d-flex align-items-center">
                <div class="my-2">
                    <a href="#"><img src="../images/adminprofile.jpg" alt="" class="admin-image"></a>
                </div>
                <div class="button text-center">
                    <button class="btn btn-light"><a href="insert_product.php" class="nav-link text-dark my-1 mx-1">Insert Products</a></button>
                    <button class="btn btn-light"><a href="" class="nav-link text-dark my-1 mx-1">View Products</a></button>
                    <button class="btn btn-light"><a href="index.php?insert_category" class="nav-link text-dark my-1 mx-1">Insert Categories</a></button>
                    <button class="btn btn-light"><a href="" class="nav-link text-dark my-1 mx-1">View Categories</a></button>
                    <button class="btn btn-light"><a href="index.php?insert_brands" class="nav-link text-dark my-1 mx-1">Insert Brands</a></button>
                    <button class="btn btn-light"><a href="" class="nav-link text-dark my-1 mx-1">View Brands</a></button>
                    <button class="btn btn-light"><a href="" class="nav-link text-dark my-1 mx-1">All Orders</a></button>
                    <button class="btn btn-light"><a href="" class="nav-link text-dark my-1 mx-1">All Payments</a></button>
                    <button class="btn btn-light"><a href="" class="nav-link text-dark my-1 mx-1">Users</a></button>
                    <button class="btn btn-light"><a href="" class="nav-link text-dark my-1 mx-1">Logout</a></button>
                </div>
            </div>
        </div>

        <!-- fourth child -->
        <div class="container my-5">
            <?php
                if(isset($_GET['insert_category'])){
                    include('insert_categories.php');
                }

                if(isset($_GET['insert_brands'])){
                    include('insert_brands.php');
                }
            ?>
        </div>

        <!-- Footer -->
        <div class="bg-dark text-center p-3 footer">
        <p style="color: white;">All rights reserved &#169;</p>
    </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</html>