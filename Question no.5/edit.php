<?php
    
    $message="";
    
        
        $con = mysqli_connect('127.0.0.1:3306','root','','task2') or die('Unable To connect');
        $result = mysqli_query($con,"SELECT id,name,username FROM admin WHERE id = '". $_GET["id"]."'");
        $row  = mysqli_fetch_array($result);
        if(!is_array($row))
        {
            $message= "Info Not Found!";
        }
        

    

    if($_SERVER["REQUEST_METHOD"]=="POST") {
        
        $con = mysqli_connect('127.0.0.1:3306','root','','task2') or die('Unable To connect');
        $reg = mysqli_query($con,"UPDATE admin set id='".$_POST["id"]."' ,name='".$_POST["name"]."' WHERE username='".$_POST["username"]."' ");
        if($reg){
            $message= "Successfully Edited!";
        }
        else
        {
            $message= "Please Try Again!";
        }

    }
    
?>

<html>
<head>
<title>Edit Infos</title>
</head>
<body>
<form name="frmUser" method="post" action="" align="center">
<div class="message"><?php if($message!="") { echo $message; } ?></div>
<h3 align="center">Edit Info</h3>
Username:<br>
 <input type="text" name="username" value="<?php echo $row["username"] ?>" readonly>
 <br>

ID:<br>
 <input type="number" name="id" value="<?php echo $row["id"] ?>">
 <br>
 Name:<br>
 <input type="text" name="name" value="<?php echo $row["name"] ?>">
 <br>
 <br>
<input type="submit" name="submit" value="Submit">
<input type="reset">
</form>
<a href="login.php">Login</a>
</body>