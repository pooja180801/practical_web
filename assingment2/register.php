<?php

include 'config.php';


  if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);
    $confirmPassword =mysqli_real_escape_string($conn,$_POST['cpassword']);
    $tel_num = mysqli_real_escape_string($conn, $_POST['telephone']);



    $select_users = mysqli_query($conn,"SELECT * FROM users where email='$email' && password='$password'") or die('query failed');
   

    if(mysqli_num_rows($select_users) >0){
        $message[] = 'user already exists!';
        
        
    }else{

$cleanedNumber = preg_replace('/[^0-9]/', '', $tel_num);

if (strlen($cleanedNumber) === 10) {
    if($password === $confirmPassword){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
       
        mysqli_query($conn,"insert into users (name,email,password,tel_num,user_type) VALUES ('$name','$email','$password',$tel_num,'user')") or die ('query failed'. mysqli_error($conn));
        $message[] = 'registered successfully!';
        header('location:login.php');
        }
        else{
            $message[] = 'Invalid Email address!'; 
        }
       }
       else{
        $message[] = 'confirm password does not match!';
       }

}
 else {
    $message[] = 'Invalid telephone number';
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

    
<section class="form_container">
   

    <form action="" class="form" method="post">
    <h2>Register Now</h2>
    <div class="input">
    <input type="text" name="name" id="name" placeholder="Enter your name" required>
    
    </div>
    

    <div class="input">
    <input type="email" name="email" id="email" placeholder="Enter your Email" required>
   
    </div>

    <div class="input">
    <input type="password" name="password" id="password" placeholder="Enter the password" required>
    

    </div>

    <div class="input">
    <input type="password" name="cpassword" id="cpassword" placeholder="Confirm your password" required>
    
    </div>

    <div class="input">
    <input type="text" name="telephone" id="telephone"  placeholder="Enter your Tel-Number:07XXXXXXXX" required>
    
    
    </div>


    <input type="submit"   name="submit" value="Register" class="btn">
<p class="login">Already have an account? <a href="login.php">Login here</a></p>

    </form>
   
</section>



</body>
</html>