<?php
session_start();
$user_name=$_SESSION['username'];
$db_servername = "localhost";
$db_username = "root";
// Create connection
$conn = new mysqli($db_servername, $db_username);
$sql="select *from project.subscriber where user_name='$user_name' ";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="body_account">
    <!-- Registration -->
    <section id="registration">
    <form class="form">
    <h2 class="logo">corgram</h2>
        <h3>Account Information</h3> <br>
        <label for="">User Name</label>
        <input type="text", placeholder="<?php echo $row["user_name"]  ?>", name="user_name">
        <label for="">Email Address</label>
        <input type="text" , placeholder="<?php echo $row["email_address"]  ?>">
        <label for="">Phone Number</label>
        <input type="text" , placeholder="<?php echo $row["phone_number"]  ?>">
        <a href="account_courses.php">Show My Courses</a> <br>
        <a href="change_pass.php">Change Password</a> <br>
        <a href="logout.php">logout</a>
    </form>
</section>

</body>
</html>