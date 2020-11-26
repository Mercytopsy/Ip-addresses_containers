<?php
   ini_set("display_errors", "On");
   error_reporting(E_ALL);
   $val = $_POST["msg"];
   echo $val;
   $con = mysqli_connect("aqx5w9yc5brambgl.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "y3cratgrhdyh0er4", "wbnk5i1ymw3vukpz");
   $db = mysqli_select_db($con,"m1jzacxsz4z2bsxn");
  // $information = mysqli_real_escape_string($con, $val);
   $creating = "CREATE TABLE containers(
	   id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY_KEY,
	   information VARCHAR(50) NOT NULL,
   )";
  // $result = mysqli_query($con, $sql);
   if (mysqli_query($con, $creating)) {
   echo "Table created successfully";
   } else {
   echo "Error creating table". mysqli_error($con);
   }
   $sql = "INSERT INTO containers (information) VALUES ('$val')";
  // $result = mysqli_query($con, $sql);
   if (mysqli_query($con, $sql)) {
   echo "New record created successfully";
   } else {
   echo "Error: " . $sql . "<br>" . mysqli_error($con);
   }
   mysqli_close($con);


?>
