<?php
  
  session_start();
  include 'config.php';

if(isset($_POST['additems'])){
    $product_name = mysqli_real_escape_string($conn,$_POST['name']);
    $price=mysqli_real_escape_string($conn,$_POST['price']);
    $description=mysqli_real_escape_string($conn,$_POST['description']);
    $sourceFolder = 'downloads/';
    $filename=$_FILES['image']['name'];
    $filetmpname=$_FILES['image']['tmp_name'];
    $folder='images/';


    move_uploaded_file($filetmpname,$folder.$filename);
  
   
        mysqli_query($conn,"insert into products (product_name,product_price,product_discription,image) VALUES ('$product_name','$price','$description','$filename')") or die ('query failed'. mysqli_error($conn));
       
        echo '<script>alert("product added successfully!")</script>';
       
        
       }
    

// header('location:add_product.php');
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Items</title>

    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/admin.css">
    <link href="https://fonts.cdnfonts.com/css/samsung-logo-font" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>
<body>

<nav>
        <div class="logo">
            <h3>ABC SAMSUNG STORE</h3>
            </div>

            <ul>
           <li> <a href="admin_home.php">View_products</a></li>
           <li><a href="add_product.php">Add_Products</a></li> 
           <li><a href="admin_profile.php">Profile</a></li> 
            <li><a href="logout.php">Logout</a></li>    

            </ul>   
                <div class="icons">
    
                <a href="admin_home.php" class="home" title="home"><i class="fa-solid fa-house"></i></a>
                <a href="add_product.php" class="add_product " title="Add_Product"><i class="fa-solid fa-plus"></i></a>
                <a href="admin_profile.php" class="profile " title="profile"><i class="fa-solid fa-user"></i></a>
                <a href="logout.php" class="logout" title="logout"> <i class="fa-solid fa-right-from-bracket"></i></a>
            
          </div>

            
            </nav> 
           



<section class="form_container">
   

    <form action="" class="form" method="post" enctype="multipart/form-data">
    <h2>Add Items</h2>
    <div class="input">
    <input type="text" name="name" id="name" placeholder="Enter the product name" required>
    
    </div>
    

    <div class="input">
    <input type="text" name="price"  placeholder="Enter the product price in Rupees" required>
   
    </div>

    <div class="input">
    <textarea name="description" id="" cols="" rows="6" placeholder="Enter the description here........"></textarea>
    

    </div>

    <div class="input">
    <input type="file" name="image"  placeholder="Upload the image" required>
    
    </div>

 
    <input type="submit" name="additems" value="Add items" class="btn">


    </form>
   
</section>


    
</body>
</html>