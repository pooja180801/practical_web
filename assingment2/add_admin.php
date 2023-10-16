<?php
  
  session_start();
  include 'config.php';

  if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);
    $confirmPassword =mysqli_real_escape_string($conn,$_POST['cpassword']);
    $tel_num = mysqli_real_escape_string($conn, $_POST['telephone']);



    $select_users = mysqli_query($conn,"SELECT * FROM users where email='$email' && password='$password'") or die('query failed');
   

    if(mysqli_num_rows($select_users) >0){
     echo '<script>alert("user already exist!")</script>';
        
        
    }else{
       if($password != $confirmPassword){
       echo '<script>alert("confirm password not matched!")</script>';
       
       }
       else{
        mysqli_query($conn,"insert into users (name,email,password,tel_num,user_type) VALUES ('$name','$email','$password',$tel_num,'admin')") or die ('query failed'. mysqli_error($conn));
        echo '<script>alert("registered successfully!")</script>';
       
        
       }
    }
    header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add_Product</title>
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
                <a href="superadmin_profile" class="profile " title="profile"><i class="fa-solid fa-user"></i></a>
                <a href="logout.php" class="logout.php" title="logout"> <i class="fa-solid fa-right-from-bracket"></i></a>
            
          </div>

            
            </nav> 
    
<section class="form_container">
   

    <form action="" class="form" method="post">
    <h2>Add Admin</h2>
    <div class="input">
    <input type="text" name="name" id="name" placeholder="Enter the name of the admin" required>
    
    </div>
    

    <div class="input">
    <input type="email" name="email" id="email" placeholder="Enter admin's Email" required>
   
    </div>

    <div class="input">
    <input type="password" name="password" id="password" placeholder="Enter the password" required>
    

    </div>

    <div class="input">
    <input type="password" name="cpassword" id="cpassword" placeholder="Confirm your password"  required>
    
    </div>

    <div class="input">
    <input type="text" name="telephone" id="telephone"  placeholder="Enter admin's Tel-Number:07XXXXXXXX" required>
    
    
    </div>


    <input type="submit"   name="submit" value="Register" class="btn">


    </form>
   
</section>



</body>
</html>