<?php

    session_start();
    include("connect.php");
    include("function.php");

    $user_data = check_login($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Page</title>
</head>
<body>
    <div style="text-align: center;">
        <a href="logout.php">Logout</a>

        <h1>This Index Page</h1>
        Hi , <?php  echo $user_data['user_name'];?>
    </div>
    
</body>
</html>