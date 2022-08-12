<?php

include('./includes/connect.php');

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
                <a href='index.php?add_to_cart=$product_id' class='btn btn-secondary'>Add To Cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-light'>View More</a>
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
                <a href='index.php?add_to_cart=$product_id' class='btn btn-secondary'>Add To Cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-light'>View More</a>
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
                <a href='index.php?add_to_cart=$product_id' class='btn btn-secondary'>Add To Cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-light'>View More</a>
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
                <a href='index.php?add_to_cart=$product_id' class='btn btn-secondary'>Add To Cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-light'>View More</a>
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
                <a href='index.php?add_to_cart=$product_id' class='btn btn-secondary'>Add To Cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-light'>View More</a>
            </div>
        </div>
    </div>";
            }
        }
    }
}


// Viewing product details
function view_details()
{
    global $con;

    // condition to check isset
    // if brand and category are not set, show 6 random products
    if (isset($_GET['product_id'])) {
        if (!isset($_GET['category'])) {
            if (!isset($_GET['brand'])) {
                $product_id = $_GET['product_id'];
                $select_query = "Select * from `products` where product_id=$product_id";
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


                    echo "<section class='section product-detail'>
                    <div class='details container '>
                        <div class='left'>
                            <div class='main bg-light'>
                                <img src='./admin/product_images/$product_image' alt='' />
                            </div>
                        </div>
                        <div class='right'>
                            <span>Product</span>
                            <h3>$product_title</h3>
                            <div class='price'>&#8377;$product_price</div>

                            <h4>Product Detail</h4>
                            <p>
                                $product_description
                            </p>
                            
                            <form class='form'>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-secondary p-2'>Add To Cart</a>
                            <a href='index.php' class='btn btn-secondary p-2'>Go to Home</a>
                            </form>
                        </div>
                    </div>
                </section>";
                }
            }
        }
    }
}

// get IP address function
function getIPAddress()
{
    $ipaddress = getenv("REMOTE_ADDR");
    return $ipaddress;
}

// cart function
function cart()
{
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $ip = getIPAddress();
        $get_product_id = $_GET['add_to_cart'];

        $select_query = "Select * from `cart_details` where ip_address='$ip' and product_id=$get_product_id";
        $result = mysqli_query($con, $select_query);

        $num = mysqli_num_rows($result);
        if ($num > 0) {
            echo "<script>alert('This item is already present in the cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        } else {
            $insert_query = "insert into `cart_details`(product_id,ip_address,quantity) values($get_product_id,'$ip',1)";
            $result = mysqli_query($con, $insert_query);
            echo "<script>alert('Successfully added item to the cart!')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}

// function to get cart item numbers
function count_of_items_in_cart()
{   
        global $con;
        $ip = getIPAddress();

        $select_query = "Select * from `cart_details` where ip_address='$ip'";
        $result = mysqli_query($con, $select_query);

        $cart_items = mysqli_num_rows($result);
    
    echo $cart_items;
}

// Total Price of the cart
function total_cart_price(){
    global $con;
        $ip = getIPAddress();
        $total=0;
        $select_query = "Select * from `cart_details` where ip_address='$ip'";
        $result = mysqli_query($con, $select_query);

        while($row=mysqli_fetch_array($result)){
            $product_id=$row['product_id'];
            $price_query="Select * from `products` where product_id='$product_id'";
            $result_products = mysqli_query($con, $price_query);
            while($row_product_price=mysqli_fetch_array($result_products)){
                $product_price=array($row_product_price['price']);
                $price=array_sum($product_price);
                $total+=$price;
        }
    }

        echo $total;

}
