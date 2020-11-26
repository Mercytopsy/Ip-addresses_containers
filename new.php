<?php
   ini_set("display_errors", "On");
   error_reporting(E_ALL);
   $val = $_POST["msg"];
   echo $val;
   $con = mysqli_connect("localhost", "odunayo", "1234");
   $db = mysqli_select_db($con,"Ipcontainer");
  // $information = mysqli_real_escape_string($con, $val);
   $sql = "INSERT INTO container (information) VALUES ('$val')";
  // $result = mysqli_query($con, $sql);
   if (mysqli_query($con, $sql)) {
   echo "New record created successfully";
   } else {
   echo "Error: " . $sql . "<br>" . mysqli_error($con);
   }
   mysqli_close($con);


?>