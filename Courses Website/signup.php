<?php
session_start();
$user_name = "";
$nameErr="";
$emErr ="";
$passErr ="";
$conErr = "";
$Err="";
$db=0;
if(empty($_POST['user_name']))
{
    $nameErr = "User Name is required";
}
else
{
    $user_name=$_POST['user_name'];
    $db++;
    $_SESSION['username']=$user_name;
}
if(empty($_POST['email_add']))
{
    $emErr = "Email is required";
}
else
{
    $email_add=$_POST['email_add'];
    $db++;
}
if(empty($_POST['password']))
{
    $passErr = "password is required";
    
}
else
{
    $password=$_POST['password'];
    $db++;
}
if(!empty($_POST['con_password']))
{
    if($_POST['con_password']!=$_POST['password'])
    {
        $conErr = "password is wrong";
        $db--;
    }
}
$phoneNum=0;
if(!empty($_POST['phone_num']))
{
    $phoneNum=$_POST['phone_num'];
}
if($db===3)
{
    $db_servername = "localhost";
    $db_username = "root";
    // Create connection
    $conn = new mysqli($db_servername, $db_username);

    // Check connection
    if ($conn->connect_error) {
    $Err="Error connect to server";
    }
    

    $sql="insert into project.subscriber values('$user_name' ,'$password','$email_add',$phoneNum)";
    if($conn->query($sql) === TRUE) {
    $Err="creating account successfully";
    header("Location: main.php");
exit();
    } 
    else {
    $Err="Error Create account...may user name or email isn't a valuable";
    }
    $conn->close();
    $db=0;
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
        <h3>Create Free Account Now!</h3>
        <input type="text", placeholder="User Name", name="user_name">
        <span class="error">* <?php echo $nameErr;?></span>
        <input type="email", placeholder="Email Address", name="email_add", id="">
        <span class="error">* <?php echo $emErr;?></span>
        <input type="password", placeholder="Password", name="password", id="">
        <span class="error">* <?php echo $passErr;?></span>
        <input type="password", placeholder="Confirm Password", name="con_password", id="">
        <span class="error">* <?php echo $conErr;?></span>
        <input type="text", placeholder="Phone Number", name="phone_num", id="">
        <input type="submit" class="yellow" value="sign up">
        <span class="error"><?php echo $Err;?></span>
        <a href="signin.php">you have account? sign in</a>
    </form>
</section>
</body>
</html>