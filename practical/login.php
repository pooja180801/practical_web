<?php

session_start();
include 'config.php';

if(isset($_POST['login'])){
   
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);
    
    $select=mysqli_query($conn,"SELECT * from friend where email='$email' && password='$password'") or die('query failed: '.mysqli_error($conn));

    if(mysqli_num_rows($select)>0){
        $row=mysqli_fetch_assoc($select);

        $_SESSION['email']=$row['email'];
        $_SESSION['password']=$row['password'];
        $_SESSION['name']=$row['profile_name'];
        $_SESSION['id']=$row['friend_id'];

        header('location:friends.php');
    }
    else{
        $message[]='user email not found';
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
    <h3>Login Page</h3>

    <div class="input">
        <p>Email:</p>
        <input type="email" name="email" required>
        
    </div>

    <div class="input">
        <p>Password:</p>
        <input type="password" name="password" required>
    </div>


    <div class="btn">
        <input type="submit" name="login" value="Login">
        <input type="reset" name="clear" value="Clear">
    </div>


    </form>
    </div>

    <div class="footer">
<p>copyright setu.kln.ac.lk</p>
</div>
</body>
</html>