<!-- Connecting to the database -->

<?php
    $con=mysqli_connect('localhost','root','','spree');

    if(!$con){
        die(mysqli_error($conn));
    }
    // else{
    //     echo "connected";
    // }
?>