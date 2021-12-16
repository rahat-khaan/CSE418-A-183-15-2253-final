<?php
    
    $message="";
    if($_SERVER["REQUEST_METHOD"]=="POST") {
        
        $con = mysqli_connect('127.0.0.1:3306','root','','task2') or die('Unable To connect');
        $result = mysqli_query($con,"SELECT * FROM admin WHERE username='" . $_POST["username"] . "' and password = '". $_POST["password"]."'");
        $row  = mysqli_fetch_array($result);
        if(is_array($row)) {
        $_SESSION["id"] = $row['id'];
        $_SESSION["name"] = $row['name'];
        $_SESSION["username"] = $row['username'];
        header("Location:index.php");
        } else {
         $message = "Invalid Username or Password!";
        }
    }
    
?>

<form name="frmUser" method="post" action="" align="center">
<div class="message"><?php if($message!="") { echo $message; } ?></div>
<h3 align="center">Enter Login Details</h3>
 Username:<br>
 <input type="text" name="username">
 <br>
 Password:<br>
<input type="password" name="password">
<br><br>
<input type="submit" name="submit" value="Submit">
<input type="reset">
</form>
<a href="registration.php">Register Here</a>
