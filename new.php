<?php
   $WEBSITE_ENVIRONMENT = "Development";

   // detect the URL to determine if it's development or production
   if(stristr($_SERVER['HTTP_HOST'], 'localhost') === FALSE) $WEBSITE_ENVIRONMENT = "Production";
   
   // value of variables will change depending on if Development vs Production
   if ($WEBSITE_ENVIRONMENT =="Development") {
   
      $host 		= "localhost";
      $user 		= "root";
      $password 	= "";
      $database 	= "my-database-name-here";
      
      define("APP_ENVIRONMENT", "Development");
      define("APP_BASE_URL", "http://localhost");
      error_reporting(E_ALL ^ E_NOTICE); // turn ON showing errors
   
   } else {
   
      $cleardb_url 		= parse_url(getenv("CLEARDB_DATABASE_URL"));
      $host				=   $cleardb_url["host"];
      $user 				= $cleardb_url["user"];
      $password			= $cleardb_url["pass"];
      $database 			= substr($cleardb_url["path"],1);
   
      define("APP_ENVIRONMENT", "Production");
      define("APP_BASE_URL", "https://your-health-care.herokuapp.com");
      #error_reporting(0); // turn OFF showing errors
      error_reporting(E_ALL ^ E_NOTICE); // turn ON showing errors			
   
   }
   ini_set("display_errors", "On");
   $val = $_POST["msg"];
   echo $val;
   $con = mysqli_connect(getenv('HOST'), getenv('USERNAME'), getenv('PASSWORD'));
   $db = mysqli_select_db($con, getenv('DATABASE_NAME'));
   $sql = "INSERT INTO container (information) VALUES ('$val')";
  // $result = mysqli_query($con, $sql);
   if (mysqli_query($con, $sql)) {
   echo "New record created successfully";
   } else {
   echo "Error: " . $sql . "<br>" . mysqli_error($con);
   }
   mysqli_close($con);


?>
