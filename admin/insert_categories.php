<?php
    include('../includes/connect.php');
    if(isset($_POST['insert_cat'])){
        $category_title=$_POST['Category_title'];

        // Inserting queries
        $select_query="select * from `categories` where category_title='$category_title'";
        $result=mysqli_query($con,$select_query);
        $num=mysqli_num_rows($result);
        if($num>0){
            echo "<script>alert('Category is already present in the database')</script>";
        }
        else{
            $insert_query="insert into `categories` (category_title) values('$category_title')";
            $result=mysqli_query($con,$insert_query);
            if($result){
                echo "<script>alert('Category has been inserted successfully')</script>";
            }
        }
        
    }
?>

<h3 class="text-center">Insert Categories</h3>

<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-secondary" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" placeholder="Insert Categories" aria-label="Username" aria-describedby="basic-addon1" name="Category_title">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="border-0 p-1 my-3 bg-secondary" value="Insert Categories"  name="insert_cat">
        
    </div>
</form>