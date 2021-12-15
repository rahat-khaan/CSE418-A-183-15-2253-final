<?php
    session_start();
    include("connect.php");
    include("function.php");

    if($_SERVER['REQUEST_METHOD']=="POST"){

        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];

        if( !empty($user_email) && !empty($user_password) )
        {
            $query = "select * from users where user_email = '$user_email' limit 1";

            $result = mysqli_query($con,$query);

            if($result)
            {
                if($result && mysqli_num_rows($result) > 0){
                    $user_data= mysqli_fetch_assoc($result);
                    if($user_data['user_password'] === $user_password){
                        $_SESSION['id'] = $user_data['id'];
                        header('Location: index.php');
                        die;
                    }
                }
            }

            echo"Wrong User Name or Password ";
        }else
        {
            echo"Wrong User Name or Password !";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <div style="text-align: center;padding-top: 200px;">
        <h1>Login Page</h1>

        <form method="post">
            <input type="text" name="user_email" placeholder="Enter Your Email.."><br><br>
            <input type="text" name="user_password" placeholder="Enter Your Password.."><br><br>
            <button type="submit">Login</button><br><br>
        </form>

        <a href="signup.php">Click To Signup</a>
    </div>
</body>
</html>