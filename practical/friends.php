<?php
session_start();
include 'config.php';

$id = $_SESSION['id'];

if(isset($_GET['page'])){
    $page=$_GET['page'];
}

else{
    $page=1;
}


$rows_per_page=5;
$start_from=($page-1)*5;

//$results = mysqli_query($conn,"select * from friend where friend_id != '$id' && friend_id NOT IN (select friend_id from my_friend where user_id='$id') limit $start_from,$rows_per_page") or die('query failed:'mysqli_error($conn));
$results=mysqli_query($conn,"select * from friend where friend_id!='$id' && friend_id not in(select friend_id from my_friend where user_id='$id') limit $start_from,$rows_per_page") or die('query failed');



if(isset($_POST['add_friend'])){

    $fid=mysqli_real_escape_string($conn,$_POST['fid']);


    $name=mysqli_query($conn,"select * from friend where friend_id='$fid' ");

    
    $row1=mysqli_fetch_assoc($name);
    $friend_id=$row1['friend_id'];

    mysqli_query($conn,"insert into my_friend (user_id,friend_id) values ($id,$friend_id) ");

}

$friend=mysqli_query($conn,"select * from my_friend where user_id='$id'");
$total_friends=mysqli_num_rows($friend);
mysqli_query($conn,"update friend set no_friends='$total_friends' where friend_id='$id'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friends List</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
        <table>
        <?php
                    while($row=mysqli_fetch_assoc($results)){
                    
                    ?>
            <tr>
           
                

                <form action="" method="post">
                <td><?php echo $row['profile_name'] ?></td>
                <td><input type="hidden" name="fid" value="<?php echo $row['friend_id'] ?>"></td>
                <td><input type="submit" name="add_friend" value="Add Friend" ></td>

                </form>
                
               
            </tr>
            <?php
                    }
                ?>
        </table>

        <?php

     
        $total_results=mysqli_query($conn,"select * from friend where friend_id!='$id' && friend_id not in(select friend_id from my_friend where user_id='$id')");
        $total_records=mysqli_num_rows($total_results);
        $total=ceil($total_records/5);
       

       if($page>1){
       echo  "<a href='friends.php?page=".($page-1)."'> previous </a>";
       }

       if($page<$total){
        echo  "<a href='friends.php?page=".($page+1)."'> next </a>";
       }
        
        ?>

        <a href="friendlist.php">view friend list</a>

    </div>
</body>
</html>