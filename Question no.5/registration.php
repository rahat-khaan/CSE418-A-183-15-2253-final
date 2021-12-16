<?php
    
    $message="";
    if($_SERVER["REQUEST_METHOD"]=="POST") {
        
        $con = mysqli_connect('127.0.0.1:3306','root','','task2') or die('Unable To connect');
        $result = mysqli_query($con,"SELECT * FROM admin WHERE username='" . $_POST["username"] . "' and id = '". $_POST["id"]."'");
        $row  = mysqli_fetch_array($result);
        if(is_array($row))
        {
            $message= "Already Registered!";
        }
        else
        {
            $reg = mysqli_query($con,"INSERT INTO admin(id, name, username, password) values(".$_POST["id"].", '".$_POST["name"]."','".$_POST["username"]."', '".$_POST["password"]."')");
        if($reg){
            $message= "Successfully Registered!";
        }
        else
        {
            $message= "Please Try Again!";
        }
        }

    }

    
?>

<html>
<head>
<title>User Registration</title>
</head>
<body>
<form name="frmUser" method="post" action="" align="center">
<div class="message"><?php if($message!="") { echo $message; } ?></div>
<h3 align="center">Registration Form</h3>
ID:<br>
 <input type="number" name="id">
 <br>
 Name:<br>
 <input type="text" name="name">
 <br>
 Username:<br>
 <input type="text" name="username">
 <br>
 Password:<br>
<input type="password" name="password">
<br><br>
<input type="submit" name="submit" value="Submit">
<input type="reset">
</form>
<a href="login.php">Login</a>
</body>