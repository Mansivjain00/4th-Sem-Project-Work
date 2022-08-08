<!-- Connecting database -->
<?php
    include('../includes/connect.php');

    if(isset($_POST['insert_product'])){
        $title=$_POST['product_title'];
        $description=$_POST['description'];
        $keywords=$_POST['keywords'];
        $categories=$_POST['product_category'];
        $brand=$_POST['product_brands'];

        // Accesing Images
        $product_image=$_FILES['product_image']['name'];

        // Acccessing image temp name
        $product_image_temp=$_FILES['product_image']['tmp_name'];

        $price=$_POST['Price'];
        $status='true';

        // Checking null conditions
        if($title==''||$description==''||$keywords==''||$categories==''||$brand==''||$price==''||$product_image==''||$product_image_temp==''){
            echo "<script>alert('Please fill all the fields')</script>";
            exit();
        }else{
            move_uploaded_file($product_image_temp,"./product_images/$product_image");

            // Insert Products
            $query="insert into `products` (product_title,product_description,product_keywords,category_id,brand_id,product_image,price,date,status) values('$title','$description','$keywords','$categories','$brand','$product_image','$price',NOW(),$status)";
            $result=mysqli_query($con,$query);
            if($result){
                echo "<script>alert('Successfully Inserted')</script>";
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
    <title>Admin: Inserting Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

    <!-- CSS file -->
    <link rel="stylesheet" href="../style.css">
</head>
<body class="bg-light">
    <div class="container my-3">
        <h2 class="text-center">Inserting Products</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <!-- title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Product Title" autocomplete="off" required="required">
            </div>
            <!-- description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Product Description</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Enter Product Description" autocomplete="off" required="required">
            </div>
            <!-- Product keywords -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="keywords" class="form-label">Product Keywords</label>
                <input type="text" name="keywords" id="keywords" class="form-control" placeholder="Enter Product Keyword" autocomplete="off" required="required">
            </div>

            <!-- Categories -->
            <div class="form-outline mb-4 w-50 m-auto">
               <select name="product_category" id="" class="form-select">
                <option value="">Select a Category</option>
                <?php
                    $select_query="select * from `categories`";
                    $result=mysqli_query($con,$select_query);
                    while($row_data=mysqli_fetch_assoc($result)){
                        $category_title=$row_data['category_title'];
                        $category_id=$row_data['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }
                ?>
               </select>
            </div>
            <!-- Brands -->
            <div class="form-outline mb-4 w-50 m-auto">
               <select name="product_brands" id="" class="form-select">
                <option value="">Select a Brand</option>
                <?php
                    $select_query="select * from `brands`";
                    $result=mysqli_query($con,$select_query);
                    while($row_data=mysqli_fetch_assoc($result)){
                        $brand_title=$row_data['brand_title'];
                        $brand_id=$row_data['brand_id'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                    }
                ?>
               </select>
            </div>

            <!-- Image 1 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image" class="form-label">Product Image 1</label>
                <input type="file" name="product_image" id="product_image" class="form-control" placeholder="Enter Product Keyword" autocomplete="off" required="required">
            </div>

            <!-- Product Price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="Price" class="form-label">Product Price</label>
                <input type="text" name="Price" id="Price" class="form-control" placeholder="Enter Product Price" autocomplete="off" required="required">
            </div>

            <!-- Submitting -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-secondary my-2" value="Insert Product">
            </div>
        </form>
    </div>
</body>
</html>