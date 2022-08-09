<?php

include("./includes/connect.php");

function get_products()
{
    global $con;

    // condition to check isset
    // if brand and category are not set, show 6 random products
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {
            $select_query = "Select * from `products` order by  rand() limit 0,6";
            $result = mysqli_query($con, $select_query);

            while ($row_data = mysqli_fetch_assoc($result)) {
                $product_id = $row_data['product_id'];
                $product_title = $row_data['product_title'];
                $product_description = $row_data['product_description'];
                $product_keywords = $row_data['product_keywords'];
                $product_category = $row_data['category_id'];
                $product_brand = $row_data['brand_id'];
                $product_image = $row_data['product_image'];
                $product_price = $row_data['price'];


                echo "<div class='col-md-4 mb-2'>
        <div class='card'>
            <img src='./admin/product_images/$product_image' class='card-img-top' alt='...'>
            <div class='card-body m-auto'>
                <h5 class='text-center card-title' style='overflow:hidden'>$product_title</h5>
                <p class='text-center card-text'>$product_description</p>
                <a href='#' class='btn btn-secondary'>Add To Cart</a>
                <a href='#' class='btn btn-light'>View More</a>
            </div>
        </div>
    </div>";
            }
        }
    }
}
function get_all_products()
{
    global $con;

    // condition to check isset
    // if brand and category are not set, show 6 random products
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {
            $select_query = "Select * from `products` order by product_title";
            $result = mysqli_query($con, $select_query);

            while ($row_data = mysqli_fetch_assoc($result)) {
                $product_id = $row_data['product_id'];
                $product_title = $row_data['product_title'];
                $product_description = $row_data['product_description'];
                $product_keywords = $row_data['product_keywords'];
                $product_category = $row_data['category_id'];
                $product_brand = $row_data['brand_id'];
                $product_image = $row_data['product_image'];
                $product_price = $row_data['price'];


                echo "<div class='col-md-4 mb-2'>
        <div class='card'>
            <img src='./admin/product_images/$product_image' class='card-img-top' alt='...'>
            <div class='card-body m-auto'>
                <h5 class='text-center card-title' style='overflow:hidden'>$product_title</h5>
                <p class='text-center card-text'>$product_description</p>
                <a href='#' class='btn btn-secondary'>Add To Cart</a>
                <a href='#' class='btn btn-light'>View More</a>
            </div>
        </div>
    </div>";
            }
        }
    }
}


// getting unique categories
function get_unique_categories()
{
    global $con;

    // condition to check isset
    // if brand and category are not set, show 6 random products
    if (isset($_GET['category'])) {
        $category_id = $_GET['category'];
        $select_query = "Select * from `products` where category_id=$category_id";
        $result = mysqli_query($con, $select_query);

        $num = mysqli_num_rows($result);
        if ($num == 0) {
            echo "<h3 class='text-center text-danger' style='overflow:hidden'>No Stock available for this category!</h3>";
        } else {

            while ($row_data = mysqli_fetch_assoc($result)) {
                $product_id = $row_data['product_id'];
                $product_title = $row_data['product_title'];
                $product_description = $row_data['product_description'];
                $product_keywords = $row_data['product_keywords'];
                $product_category = $row_data['category_id'];
                $product_brand = $row_data['brand_id'];
                $product_image = $row_data['product_image'];
                $product_price = $row_data['price'];


                echo "<div class='col-md-4 mb-2'>
        <div class='card'>
            <img src='./admin/product_images/$product_image' class='card-img-top' alt='...'>
            <div class='card-body m-auto'>
                <h5 class='text-center card-title' style='overflow:hidden'>$product_title</h5>
                <p class='text-center card-text'>$product_description</p>
                <a href='#' class='btn btn-secondary'>Add To Cart</a>
                <a href='#' class='btn btn-light'>View More</a>
            </div>
        </div>
    </div>";
            }
        }
    }
}

// getting unique brands
function get_unique_brands()
{
    global $con;

    // condition to check isset
    // if brand and category are not set, show 6 random products
    if (isset($_GET['brand'])) {
        $brand_id = $_GET['brand'];
        $select_query = "Select * from `products` where brand_id=$brand_id";
        $result = mysqli_query($con, $select_query);

        $num = mysqli_num_rows($result);
        if ($num == 0) {
            echo "<h3 class='text-center text-danger' style='overflow:hidden'>No Stock available for this brand!</h3>";
        } else {

            while ($row_data = mysqli_fetch_assoc($result)) {
                $product_id = $row_data['product_id'];
                $product_title = $row_data['product_title'];
                $product_description = $row_data['product_description'];
                $product_keywords = $row_data['product_keywords'];
                $product_category = $row_data['category_id'];
                $product_brand = $row_data['brand_id'];
                $product_image = $row_data['product_image'];
                $product_price = $row_data['price'];


                echo "<div class='col-md-4 mb-2'>
        <div class='card'>
            <img src='./admin/product_images/$product_image' class='card-img-top' alt='...'>
            <div class='card-body m-auto'>
                <h5 class='text-center card-title' style='overflow:hidden'>$product_title</h5>
                <p class='text-center card-text'>$product_description</p>
                <a href='#' class='btn btn-secondary'>Add To Cart</a>
                <a href='#' class='btn btn-light'>View More</a>
            </div>
        </div>
    </div>";
            }
        }
    }
}


function get_brands()
{
    global $con;
    $select_brands = "select * from `brands`";
    $result_brands = mysqli_query($con, $select_brands);
    while ($row_data = mysqli_fetch_assoc($result_brands)) {
        $brand_title = $row_data['brand_title'];
        $brand_id = $row_data['brand_id'];
        echo "<li class='nav-item'>
        <a href='index.php?brand=$brand_id' class='nav-link '>$brand_title</a>
    </li>";
    }
}

function get_categories()
{
    global $con;
    $select_category = "select * from `categories`";
    $result_category = mysqli_query($con, $select_category);
    while ($row_data = mysqli_fetch_assoc($result_category)) {
        $category_title = $row_data['category_title'];
        $category_id = $row_data['category_id'];
        echo "<li class='nav-item'>
        <a href='index.php?category=$category_id' class='nav-link '>$category_title</a>
    </li>";
    }
}

// Searching Products
function search_product()
{
    global $con;
    if (isset($_GET['search_data_product'])) {
        $user_search = $_GET['search_data'];


        $search_query = "Select * from `products` where product_keywords like '%$user_search%'";
        $result = mysqli_query($con, $search_query);
        $num = mysqli_num_rows($result);
        if ($num == 0) {
            echo "<h3 class='text-center text-danger' style='overflow:hidden'>No search results available</h3>";
        } else {
            while ($row_data = mysqli_fetch_assoc($result)) {
                $product_id = $row_data['product_id'];
                $product_title = $row_data['product_title'];
                $product_description = $row_data['product_description'];
                $product_keywords = $row_data['product_keywords'];
                $product_category = $row_data['category_id'];
                $product_brand = $row_data['brand_id'];
                $product_image = $row_data['product_image'];
                $product_price = $row_data['price'];


                echo "<div class='col-md-4 mb-2'>
        <div class='card'>
            <img src='./admin/product_images/$product_image' class='card-img-top' alt='...'>
            <div class='card-body m-auto'>
                <h5 class='text-center card-title' style='overflow:hidden'>$product_title</h5>
                <p class='text-center card-text'>$product_description</p>
                <a href='#' class='btn btn-secondary'>Add To Cart</a>
                <a href='#' class='btn btn-light'>View More</a>
            </div>
        </div>
    </div>";
            }
        }
    }
}
