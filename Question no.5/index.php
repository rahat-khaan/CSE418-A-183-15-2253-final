<?php
session_start();
?>
<html>
<head>
<title>User Login</title>
</head>

<body>
<a href="home.php">Home</a>
<?php
if(isset($_SESSION["id"])) {
?>
Welcome <?php echo $_SESSION["name"]; ?>. Click here to <a href="logout.php" title="Logout">Logout.
<?php
}else {echo "<h1>Please login first .</h1>";

require_once __DIR__ . "/login.php";}

?>
</body>
</html>