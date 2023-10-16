<?php
 
 include 'config.php';

 if(isset($_POST['register'])){

    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $name=mysqli_real_escape_string($conn,$_POST['name']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);
    $cpassword=mysqli_real_escape_string($conn,$_POST['cpassword']);


 $select_users=mysqli_query($conn,"select * from friend where email='$email' && password='$password'") or die('query failed');

 if(mysqli_num_rows($select_users)>0){
    $error_user[]='User Email already exists';
 }

 else{
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
        if($password===$cpassword){
            mysqli_query($conn,"insert into friend (email,password,profile_name,no_friends) values ('$email','$password','$name',0)") or die('query failed:'.mysqli_error($conn));
            header('location:login.php');
        }
        else{
            $error_pw[]='password does not match';
        }
       
    }
    else{
        $error_email[]='email is invalid';
    }
 }
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>



<div class="header">
<h1>My Friend System</h1>
</div>

<div class="form">
<form action="" method="POST">
    <h3>Registration Page</h3>

    <div class="input">
        <p>Email:</p>
        <input type="email" name="email" required>
        
            <?php
        if(isset($error_email)){
    foreach($error_email as $message){
        echo'
        <div class="error">
         <span>'.$message.'</span>
        </div>
        ';
    }
}
?>
        
    </div>

    <div class="input">
        <p>Profile Name:</p>
        <input type="text" name="name" required>
 
    </div>

    <div class="input">
        <p>Password:</p>
        <input type="password" name="password" required>
        <div class="error">
        <?php
        if(isset($error_pw)){
    foreach($error_pw as $message){
        echo'
        <div class="error">
         <p>'.$message.'</p>
        </div>
        ';
    }
}
?>
        </div>
    </div>

    <div class="input">
        <p>Confirm Password:</p>
        <input type="password" name="cpassword" required>
        <div class="error">
    </div>


    <div class="btn">
        <input type="submit" name="register" value="Register">
        <input type="reset" name="clear" value="Clear">
    </div>


    </form>
    </div>

    <div class="footer">
<p>copyright setu.kln.ac.lk</p>
</div>
</body>
</html>