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
    $invoice_number=mt_rand();
    $status='pending';
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

    $insert_orders="insert into `user_orders`(user_id,amount_due,invoice_number,total_products,order_date,order_status) values($user_id,$total_price,$invoice_number,$rows_count,NOW(),'$status')";
    $result_insert=mysqli_query($con,$insert_orders);
    if($result_insert){
        echo "<script>alert('Order submitted successfully')</script>";
        echo "<script>window.open('profile.php','_self')</script>";
    }

    // Orders_pending
    // $insert_pending_orders="insert into `pending_orders`(user_id,invoice_number,product_id,order_status) values($user_id,$invoice_number,$product_id,'$status')";
    // $result_pending=mysqli_query($con,$insert_pending_orders);

    // Delete items from the cart
    $empty_cart="delete from `cart_details` where ip_address='$user_ip'";
    $result_delete=mysqli_query($con,$empty_cart);
?>