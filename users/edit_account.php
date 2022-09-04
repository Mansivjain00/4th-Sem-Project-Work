<?php
    if(isset($_GET['edit_account'])){
        $user_session_name=$_SESSION['username'];
        $select_query="select * from `user_table` where username='$user_session_name'";
        $result_query=mysqli_query($con,$select_query);

        $row_fetch=mysqli_fetch_assoc($result_query);
        $user_id=$row_fetch['user_id'];
        $username=$row_fetch['username'];
        $user_email=$row_fetch['user_email'];  
        $user_address=$row_fetch['user_address'];
        $user_mobile=$row_fetch['user_mobile'];

        if(isset($_POST['user_update'])){
            $update_id=$user_id;
            $username=$_POST['user_username'];
            $user_email=$_POST['user_email'];
            $user_address=$_POST['user_address'];
            $user_mobile=$_POST['user_contact'];
            $user_img=$_FILES['user_image']['name'];
            $user_img_tmp=$_FILES['user_image']['tmp_name'];

            move_uploaded_file($user_img_tmp,"./user_images/$user_img");
            $update_query="update `user_table` set username='$username', user_email='$user_email',user_address='$user_address',user_mobile='$user_mobile', user_image='$user_img' where user_id=$update_id";
            $result_update=mysqli_query($con,$update_query);

            echo $user_img;

            if($result_update){
                echo "<script>alert('Data updated successfully')</script>";
                echo "<script>window.open('logout.php','_self')</script>";
            }

        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spree: Edit Account</title>
</head>
<body>
    <h4 class="text-center text-secondary my-2">Edit Account</h4>
    <form action="" method="post" enctype="multipart/form-data" class="text-center">
        <div class="form-outline my-3">
            <input type="text" name="user_username" id="" class="form-control w-50 m-auto text-center" value="<?php echo $username?>">
        </div>
        <div class="form-outline my-3">
            <input type="email" name="user_email" id="" class="form-control w-50 m-auto text-center" value="<?php echo $user_email?>">
        </div>
        <div class="form-outline my-3 d-flex">
            <input type="file" name="user_image" id="" class="form-control w-50 m-auto text-center" value="<?php echo $user_img?>">
        </div>
        <div class="form-outline my-3">
            <input type="text" name="user_address" id="" class="form-control w-50 m-auto text-center" value="<?php echo $user_address?>" >
        </div>
        <div class="form-outline my-3">
            <input type="text" name="user_contact" id="" class="form-control w-50 m-auto text-center" value="<?php echo $user_mobile?>">
        </div>

        <input type="submit" value='Update' class="m-auto btn btn-secondary p-2 border-0 my-1" name="user_update">
    </form>
</body>
</html>