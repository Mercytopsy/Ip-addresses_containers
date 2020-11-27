<?php
$con = mysqli_connect(getenv('HOST'), getenv('USERNAME'), getenv('PASSWORD'), getenv('DATABASE_NAME'));
$result = mysqli_query($con, "SELECT * FROM container");
?>

<!DOCTYPE html>
<html lang="en">
<head>

<title>Health</title>

<meta charset="UTF-8">
<link rel="stylesheet" href="css/style.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
var c;
function getName(){
  $.getJSON("https://api.ipify.org?format=json",
    function first(data){
      $("#info").html(" Your IP address is: " + data.ip + "");
      c = data.ip;
      second();
  });  
  
}
getName()
function second(){
  var information = c;
  
  $.ajax({
    type: "POST",
    url: "new.php",
    data: {"msg": information},
    datatype: "json",
    success: function(response){
    alert(response);
           
    },
    error: function(request, status, error){
    alert("didn't work");
    }
  })
} 
</script> 
</head>
<body>
<p>Welcome to our Health Center</p>
<table>
<tr>
<td>Addresses Visited</td>
</tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
if($i%2==0)
$classname="even";
else
$classname="odd";
?>
<tr class="<?php if(isset($classname)) echo $classname;?>">
<td><?php echo $row; ?></td>
</tr>
<?php
$i++;
}
?>
</table>
<div class="Time">
<p id="info"></p>
</div>
  <div class="row">
    <div class="column">
      <img src="images/team-image1.jpg" alt="doctor1" style="width:100%">
    </div>
    <div class="column">
      <img src="images/team-image2.jpg" alt="doctor2" style="width:100%">
    </div>
    <div class="column">
      <img src="images/team-image3.jpg" alt="doctor3" style="width:100%">
    </div>
  </div>
</body>
</html>