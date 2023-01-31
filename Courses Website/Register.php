<?php
session_start();
$id_img=$_GET['id'];
$user_name=$_SESSION['username'];
$Err="";
$db_servername = "localhost";
$db_username = "root";
$conn = new mysqli($db_servername, $db_username);
$sql="insert into project.Register values('$user_name','$id_img')";
if($conn->query($sql) === TRUE) {
$Err="Register successfully";
}
else{
    $Err="Rsfvfds";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body>
<section id="registration">
    <form class="form">
    <h2 class="logo"><?php echo $Err; ?></h2>
        <a href="main.php">go to the main page</a>
    </form>
</section>
</body>
</html>