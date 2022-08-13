<?php
include('../includes/connect.php');
// @ to make sure session starts only if this file is active
@session_start();

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    $select_data = "select * from `user_orders` where order_id=$order_id";
    $result_select = mysqli_query($con, $select_data);
    $row_fetch = mysqli_fetch_assoc(($result_select));
    $invoice_number = $row_fetch['invoice_number'];
    $amount_due = $row_fetch['amount_due'];
}

if (isset($_POST['confirm_payment'])) {
    $invoice_number=$_POST['invoice_number'];
    $amount=$_POST['amount'];
    $payment_mode=$_POST['payment_mode'];

    $insert_query="insert into `user_payments`(order_id,invoice_number,amount,payment_mode,payment_date) values($order_id,$invoice_number,$amount,'$payment_mode',NOW())";
    $result_insert=mysqli_query($con,$insert_query);

    if($result_insert){
        echo "<script>alert('Payment was made successfully')</script>";
        echo "<script>window.open('profile.php?my_orders','_self')</script>";
    }

    $update_orders="update `user_orders` set order_status='Complete' where order_id=$order_id";
    $result_confirm=mysqli_query($con,$update_orders);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spree: Order Confirmation</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

    <!-- CSS file -->
    <link rel="stylesheet" href="../style.css">
</head>

<body class="bg-light">

    <h3 class="text-center text-secondary overflow-hidden my-3">Confirm Payment</h3>

    <div class="container my-3">
        <form action="" method="post" class="text-center">
            <div class="form-outline my-4 text-center">
                <label for="" class="text-secondary">Invoice Number</label>
                <input type="text" name="invoice_number" id="" class="form-control w-50 m-auto" value="<?php echo $invoice_number ?>">
            </div>
            <div class="form-outline my-4 text-center">
                <label for="" class="text-secondary">Amount</label>
                <input type="text" name="amount" id="" class="form-control w-50 m-auto" value="<?php echo $amount_due ?>">
            </div>
            <div class="form-outline my-4 text-center">
                <select name="payment_mode" id="" class="form-select w-50 m-auto text-center">
                    <option  class="text-secondary">Select Payment Mode</option>
                    <option  class="text-secondary">UPI</option>
                    <option  class="text-secondary">Paypal</option>
                    <option  class="text-secondary">Cash On Delivery</option>
                </select>
            </div>

            <input type="submit" value='Confirm' class="m-auto btn btn-secondary p-2 border-0 my-1" name="confirm_payment">

        </form>
    </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</html>