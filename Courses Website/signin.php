<?php
session_start();
$Err='';
$nameErr="";
$passErr ="";
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

if(empty($_POST['password']))
{
    $passErr = "password is required";
    
}
else
{
    $password=$_POST['password'];
    $db++;
}
if($db===2)
{
    $db_servername = "localhost";
    $db_username = "root";
    // Create connection
    $conn = new mysqli($db_servername, $db_username);

    // Check connection
    if ($conn->connect_error) {
    $Err="Error connect to server";
    }
    
    $sql="select user_name,password from project.subscriber where user_name='$user_name' ";
    $result=$conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
        if($password==$row['password'])
        {
            $Err='sign in successfully';
            header("Location: main.php");
            exit();
            
        }
        else{
            $Err='error user name or password!';
        }
        }
    } 
    else {
        $Err='error user name or password!';
    }
    unset($_POST);
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
    <title>signin</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body class="body_account">
    <!-- Registration -->
    <section id="registration">
    <form method="post" action="<?php ($_SERVER["PHP_SELF"]);?>" class="form">
    <h2 class="logo">corgram</h2>
        <h3>sign in</h3>
        <input type="text", placeholder="User Name", name="user_name">
        <span class="error">* <?php echo $nameErr;?></span>
        <input type="password", placeholder="Password", name="password", id="">
        <span class="error">* <?php echo $passErr;?></span>
        <input type="submit" class="yellow" value="sign in">
        <span class="error"> <?php echo $Err;?></span>
    </form>
    
</section>

</body>
</html>