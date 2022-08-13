<h4 class="text-center text-secondary">All my Orders</h4>
<table class="table table borderes my-3 table-striped">
    <thead>
        <tr>
            <th>Serial number</th>
            <th>Amount Due</th>
            <th>Total Products</th>
            <th>Invoice number</th>
            <th>Date</th>
            <th>Complete/Incomplete</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $username=$_SESSION['username'];
            $get_user="select * from `user_table` where username='$username'";
            $result_get=mysqli_query($con,$get_user);

            $row_fetch=mysqli_fetch_assoc($result_get);
            $user_id=$row_fetch['user_id'];

            $get_order_details="select * from `user_orders` where user_id=$user_id";
            $result_get_orders=mysqli_query($con,$get_order_details);
            $count=0;
            while($row=mysqli_fetch_assoc($result_get_orders)){
                $order_id=$row['order_id'];
                $amount=$row['amount_due'];
                $total_products=$row['total_products'];
                $invoice_number=$row['invoice_number'];
                $order_status=$row['order_status'];
                if($order_status=='pending'){
                    $order_status='Incomplete';
                }
                else{
                    $order_status='Complete';
                }
                $order_date=$row['order_date'];
                $count++;

                echo "<tr>
                <td>$count</td>
                <td>$amount</td>
                <td>$total_products</td>
                <td>$invoice_number</td>
                <td>$order_date</td>
                <td>$order_status</td>";

                if($order_status!='Complete'){
                    echo "<td><a href='confirm_payment.php?order_id=$order_id' style='text-decoration:none;'>Confirm</a></td>
                    </tr>";
                }else{
                    echo "<td>Paid</td>
                    </tr>";
                }

                
            }
        ?>
        
    </tbody>
</table>