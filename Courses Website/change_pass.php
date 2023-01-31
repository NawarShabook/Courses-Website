<?php
session_start();
$user_name=$_SESSION['username'];

$db_servername = "localhost";
$db_username = "root";


$current_password_Err="";
$con_password_Err="";
// Create connection
$conn = new mysqli($db_servername, $db_username);
$sql="select user_name,password from project.subscriber where user_name='$user_name' ";
$result=$conn->query($sql);
$row = $result->fetch_assoc();
if(!empty($_POST['password']) && !empty($_POST['new_password']) && !empty($_POST['con_password']))
{
        $new_pass=$_POST['new_password'];
        if($_POST['password']==$row['password'])
        {
            if($_POST['new_password']==$_POST['con_password'])
            {
                $sql="update project.subscriber set password='$new_pass' where user_name = '$user_name'";
                if($conn->query($sql) === TRUE) {
                    $con_password_Err="Password Updated Successfully!";
                }
            }
            else{
                $con_password_Err="Error..password is wrong!!";
            }
        }
    else{
        $current_password_Err="Error..password is wrong!!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="body_account">
    <section id="registration">
    <form method="post" action="<?php ($_SERVER["PHP_SELF"]);?>" class="form">
    <h2 class="logo">corgram</h2>
        <h3>Change Password</h3>
        <label for=""><?php echo $row['user_name']; ?></label>
        <input type="password", placeholder="Current Password", name="password", id="">
        <span class="error">* <?php echo $current_password_Err;?></span>
        <input type="password", placeholder="New Password", name="new_password", id="">
        <input type="password", placeholder="Confirm Password", name="con_password", id="">
        <span class="error">* <?php echo $con_password_Err;?></span>
        <input type="submit" class="yellow" value="Confirm">
    </form>
</section>
</body>
</html>