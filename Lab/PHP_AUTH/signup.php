<?php
    session_start();
    include("connect.php");
    include("function.php");

    if($_SERVER['REQUEST_METHOD']=="POST"){

        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];

        if(!empty($user_name) && !empty($user_email) && !empty($user_password) )
        {
            $query = "insert into users (user_name,user_email,user_password) values ('$user_name','$user_email','$user_password')";

            mysqli_query($con,$query);

            header("Location: login.php");
            die;
        }else
        {
            echo("Please Enter Some Valid information");
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
</head>
<body>
    <div style="text-align: center;padding-top: 200px;">
        <h1>Signup Page</h1>

        <form method="post">
            <input type="text" name="user_name" placeholder="Enter Your Name.."><br><br>
            <input type="text" name="user_email" placeholder="Enter Your Email.."><br><br>
            <input type="text" name="user_password" placeholder="Enter Your Password.."><br><br>
            <button type="submit">Signup</button><br><br>
        </form>

        <a href="login.php">Click To Login</a>
    </div>
</body>
</html>