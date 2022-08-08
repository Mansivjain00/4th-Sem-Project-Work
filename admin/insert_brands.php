<?php
    include('../includes/connect.php');
    if(isset($_POST['insert_brand'])){
        $brand_title=$_POST['brand_title'];

        // Inserting queries
        $select_query="Select * from `brands` where brand_title='$brand_title'";
        $result=mysqli_query($con,$select_query);
        $num=mysqli_num_rows($result);
        if($num>0){
            echo "<script>alert('Brand is already present')</script>";
        }
        else{
            $insert_query="insert into `brands` (brand_title) values('$brand_title')";
            $result=mysqli_query($con,$insert_query);
            if($result){
                echo "<script>alert('Brand has been inserted successfully')</script>";
            }
        }
        
    }
?>

<h3 class="text-center">Insert Brands</h3>

<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-secondary" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" placeholder="Insert Brands" aria-label="Brands" aria-describedby="basic-addon1" name="brand_title">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        <!-- <input type="submit" class="form-control bg-secondary" value="Insert Categories"  name="insert_cat"> -->
        <input type="submit" class="border-0 p-1 my-3 bg-secondary" value="Insert Brands"  name="insert_brand">
    </div>
</form>