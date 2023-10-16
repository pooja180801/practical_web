<?php
  session_start();
  include 'config.php';

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin Profile</title>

    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/superadmin.css">
    <link href="https://fonts.cdnfonts.com/css/samsung-logo-font" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>
<body>

<nav>
        <div class="logo">
            <h3>ABC SAMSUNG STORE</h3>
            </div>

            <ul>
           <li> <a href="superadmin_home.php">View_products</a></li>
           <li> <a href="add_admin.php">Add_Admin</a></li>
           <li><a href="sa_add_products.php">Add_Products</a></li> 
           <li><a href="superadmin_profile.php">My_Profile</a></li> 
            <li><a href="logout.php">Logout</a></li>    

            </ul>   
                <div class="icons">
    
                <a href="superadmin_home.php" class="home" title="home"><i class="fa-solid fa-house"></i></a>
                <a href="add_admin.php" class="add_admin" title="Add_admin"><i class="fa-solid fa-user-plus"></i></a>
                <a href="sa_add_products.php" class="add_product " title="Add_Product"><i class="fa-solid fa-plus"></i></a>
                <a href="superadmin_profile.php" class="profile " title="profile"><i class="fa-solid fa-user"></i></a>
                <a href="logout.php" class="logout.php" title="logout"> <i class="fa-solid fa-right-from-bracket"></i></a>
            
          </div>

            
            </nav> 
           



<section class="userdetails">
 
<h2>My Profile</h2>

    <p>Username: 
        <br><span><?php echo isset($_SESSION['superadmin_name']) ? $_SESSION['superadmin_name'] : ''; ?></span></p>
        <hr>
    <p>Email: <br><span><?php echo isset($_SESSION['superadmin_email']) ? $_SESSION['superadmin_email'] : ''; ?></span></p>  
</div>
<hr>
<p>User Type: 
        <br><span><?php echo isset($_SESSION['user_type']) ? $_SESSION['user_type'] : ''; ?></span></p>
        <hr>
<p>Telephone Number: <br><span><?php echo isset($_SESSION['superadmin_tel']) ? $_SESSION['superadmin_tel'] : ''; ?></span></p>  

   
</section>


    
</body>
</html>