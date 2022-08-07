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
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup>1</sup></a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-light" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Welcome Guest</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>
            </ul>
        </nav>

        <!-- Third child -->
        <div class="bg-light my-3">
            <h3 class="text-center">Spree</h3>
            <p class="text-center">Your One Stop Solution!</p>
        </div>

        <!-- Fourth Child -->
        <div class="row">
            <div class="col-md-10">
                <!-- Products -->
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <div class="card">
                            <img src="./images/tshirt1.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-secondary">Add To Cart</a>
                                <a href="#" class="btn btn-light">View More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="card">
                            <img src="./images/tshirt2.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-secondary">Add To Cart</a>
                                <a href="#" class="btn btn-light">View More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="card">
                            <img src="./images/tshirt3.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-secondary">Add To Cart</a>
                                <a href="#" class="btn btn-light">View More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="card">
                            <img src="./images/tshirt3.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-secondary">Add To Cart</a>
                                <a href="#" class="btn btn-light">View More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="card">
                            <img src="./images/tshirt3.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-secondary">Add To Cart</a>
                                <a href="#" class="btn btn-light">View More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 bg-secondary p-0">
                <!-- sidenav -->
                <!-- brands -->
                <ul class="navbar-nav me-auto text-center text-light">
                    <li class="nav-item">
                        <a href="#" class="nav-link "><h5>Delivery Brands</h5></a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link ">Brand 1</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link ">Brand 2</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link ">Brand 3</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link ">Brand 4</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link ">Brand 5</a>
                    </li>
                </ul>
                <!-- categories -->
                <ul class="navbar-nav me-auto text-center text-light">
                    <li class="nav-item">
                        <a href="#" class="nav-link "><h5>Categories</h5></a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link ">Category 1</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link ">Category 2</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link ">Category 3</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link ">Category 4</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link ">Category 5</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Last child -->
        <div class="bg-dark text-center p-3">
        <p style="color: white;">All rights reserved &#169;</p>
    </div>
    </div>



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</html>