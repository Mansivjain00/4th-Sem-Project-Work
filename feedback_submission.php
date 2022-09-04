<!-- Connecting database -->
<?php
include('./includes/connect.php');
include('functions/common_function.php');
session_start();


$name=$_POST['name1'];
$email=$_POST['email'];
$message=$_POST['message'];



// Submitting it to the database


$sql = "INSERT INTO `feedback` (`feedback_id`, `name`, `email`, `feedback`, `date`) VALUES (NULL, '$name', '$email', '$message', current_timestamp());";
$result=mysqli_query($con,$sql);

if($result){
    echo "<script>alert('Feedback Submitted Successfully!')</script>";
    echo "<script>window.open('index.php','_self')</script>";
}
else{
    echo "We are facing technical issues, and hence your submission was not succesful";
}

?>