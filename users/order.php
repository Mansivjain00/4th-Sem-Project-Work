<!-- Connecting database -->
<?php
    include('../includes/connect.php');
    include('../functions/common_function.php');
    @session_start();

    if(isset($_GET['user_id'])){
        $user_id=$_GET['user_id'];
    }

    // getting total items and total price of all items
    
    $user_ip=getIPAddress();
    $total_price=0;

    $cart_query_price="select * from `cart_details` where ip_address='$user_ip'";
    $sql=mysqli_query($con,$cart_query_price);
    $rows_count=mysqli_num_rows($sql);

    while($row_price=mysqli_fetch_array($sql)){
        $product_id=$row_price['product_id'];
        $select_product="select * from `products` where product_id=$product_id";
        $result=mysqli_query($con,$select_product);

        while($row_product_price=mysqli_fetch_array(($result))){
            $product_price=array($row_product_price['price']);
            $product_price_1=array_sum($product_price);
            $total_price+=$product_price_1;
        }
    }
    echo $total_price;
?>