

<?php
    
    $message="";

        $con = mysqli_connect('127.0.0.1:3306','root','','task2') or die('Unable To connect');
        $result = mysqli_query($con,"SELECT id,name,username FROM admin ");
        


    
?>

<html>
<head>
<title>Home</title>
</head>
<body>

<table width="50%" style="text-align: center;">
<tr>
<th>ID</th>
<th>Name</th>
<th>Username</th>
<th>Edit</th>
</tr>
<?php

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo <<< EOT
        <tr>
        <td>{$row["id"]}</td>
        <td>{$row["name"]}</td>
        <td>{$row["username"]}</td>
        <td>
        <a href="edit.php?id={$row["id"]}" >Edit</a>
        </td>
        </tr>
        EOT;

    }
  } else {
    echo <<< EOT
      <tr>
      <td colspan="3">0 results</td>
      </tr>
      EOT;

  }
  ?>
</table>




</body>
</html>