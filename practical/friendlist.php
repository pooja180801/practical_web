<?php

session_start();
include 'config.php';

$id=$_SESSION['id'];
$name=$_SESSION['name'];

if(isset($_GET['page'])){
    $page=$_GET['page'];

}
else{
    $page=1;
}

$rows_per_page=5;
$start_from=($page-1)*$rows_per_page;

$results=mysqli_query($conn,"SELECT * from friend inner join my_friend on (friend.friend_id=my_friend.friend_id or friend.friend_id=my_friend.user_id )
where (my_friend.user_id='$id' or my_friend.friend_id='$id' ) LIMIT $start_from,$rows_per_page") or die(mysqli_error($conn));

if(isset($_POST['unfriend'])){

    $fid=mysqli_real_escape_string($conn,$_POST['fid']);

    mysqli_query($conn,"delete from my_friend where (user_id='$id' && friend_id='$fid') or (user_id='$fid' && friend_id='$id') ");
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friend list</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<div class="container">
    <h4>Friend list</h4>

    <table>

       
        <?php
        while($row=mysqli_fetch_assoc($results)){
            if($row['profile_name']!=$name){
        ?>
 <tr>
            <form action="" method="post">
            <td><?php echo $row['profile_name'] ?></td>
            <td><input type="hidden" name="fid" value="<?php echo $row['friend_id']?>"></td>
            <td><input type="submit" name="unfriend" value="unfriend"></td>

</form>
        </tr>
        <?php
        }
    }
        ?>
    </table>

    <?php
    $total_results=mysqli_query($conn,"select * from friend inner join my_friend on (friend.friend_id=my_friend.friend_id or friend.friend_id=my_friend.user_id )
    where (my_friend.user_id='$id' or my_friend.friend_id='$id' )");
    $total_records=mysqli_num_rows($total_results);
    $total=ceil($total_records/$rows_per_page);


    if($page>1){
        
        echo "<a href='friendlist.php?page=".($page-1)."'>previous</a>";
    }

    if($page<$total){
        echo "<a href='friendlist.php?page=".($page+1)."'>next</a>";
    }

    ?>

</div>

</body>
</html>