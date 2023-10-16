<?php
  
  session_start();
  include 'config.php';
  

  if(isset($_POST['login'])){
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);
   
    $select= mysqli_query($conn,"SELECT * FROM users where email='$email' && password='$password'") or die('query failed');
   

    if(mysqli_num_rows($select) >0){
        $row = mysqli_fetch_assoc($select);
 
        if($row['user_type'] == 'admin'){
         $_SESSION['admin_name'] = $row['name'];
         $_SESSION['admin_email'] = $row['email'];
         $_SESSION['admin_id'] = $row['id'];
         $_SESSION['admin_tel'] = $row['tel_num'];
         $_SESSION['user_type'] = $row['user_type'];

        
         header('location:admin_home.php');

         echo '<script>alert("You logged in as as ADMIN!")</script>';
        }
        elseif($row['user_type'] == 'user'){
         $_SESSION['user_name'] = $row['name'];
         $_SESSION['user_email'] = $row['email'];
         $_SESSION['user_id'] = $row['id'];
         $_SESSION['user_tel'] = $row['tel_num'];
         $_SESSION['user_type'] = $row['user_type'];

         header('location:user_home.php');

        }
        elseif($row['user_type']=='superadmin'){
            $_SESSION['superadmin_name'] = $row['name'];
            $_SESSION['superadmin_email'] = $row['email'];
            $_SESSION['superadmin_id'] = $row['id'];
            $_SESSION['superadmin_tel'] = $row['tel_num'];
            $_SESSION['user_type'] = $row['user_type'];

            echo '<script>alert("You logged in as as ADMIN!")</script>';


            header('location:superadmin_home.php');

        }
     }
     else{
        $message[] = 'incorrect email or password!';
         
        }
 }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


</head>
<body>

<?php
   if(isset($message)){
    foreach($message as $message){
        echo '
        <div class="message">
           <span>'.$message.'</span>
           <i class="fas fa-times" onclick="this.parentElement.remove()"></i>
        </div>
         ';
    }
   }

   
?>
   
<main>

<section class="container">


<form action="" class="form" method="post">
    <h2>Login</h2>

    <div class="input">
    <input type="email" name="email" id="email" class="input" placeholder="Enter your Email" required>
    
    </div>

    <div class="input">
    <input type="password" name="password" id="password" class="input" placeholder="Enter the password" required>
    

    </div>

    <input type="submit" name="login" value="Login" class="btn">
<p class="login">Don't have an account? <a href="register.php">Register here</a></p>

</form>
</section>
</body>
</html>