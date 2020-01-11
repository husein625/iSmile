
<?php
session_start();
// initializing variables

 $descriptionError  = "";
$role ="patient";
$db = mysqli_connect('localhost', 'root', 'root', 'ismile');

// REGISTER USER
if (isset($_POST['submit'])) {
  // receive all input values from the form  $username = mysqli_real_escape_string($db, $_POST['username']);
  $description = $_POST['description'];
  
 

  if (empty($_POST["description"])) {
    $dateToError= "Description is required!";
  } 
  

  // Finally, register user if there are no errors in the form
  if (empty($descriptionError)) {

  	$query = "INSERT INTO appointment (description, UserId) 
  			  VALUES('$description', " . $_SESSION['userId'] .")";
  	mysqli_query($db, $query);
  	header('location: index.php');
  }
  else {
 
  }
}



?>











<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Make appointment</title>

<link rel="stylesheet" href="css/design-iconic-font.min.css">

<link rel="stylesheet" href="css/make-appointment.css">
</head>
<body>







<div class="main">
<section class="signup">

<div class="container">
<div class="signup-content">

<form action="make-appointment.php" method="POST" id="signup-form" class="signup-form">
<h2 class="form-title">Make appointment</h2>
<div class="form-group">

</div>
<div class="form-group">
<div class="form-group">
<input type="text" class="form-input" name="description" id="telephone" placeholder="description"  style="height: 150px;" />
<span class="error1" style="color: red;font-size: 15px;position: absolute;left: 340px;top: 120px;"><?php echo $descriptionError;?></span>

</div>
<div class="form-group">
</div>
<div class="form-group">
</div>
<div class="form-group">
</div>
<div class="form-group">
<input type="submit" name="submit" id="submit" class="form-submit" value="Submit" />
</div>
</form>
<script>
  $(function () {
    $('#datetimepicker1').datetimepicker();
 });
</script>

</div>
</div>
</section>
</div>



<script src="scripts/jquery.min.js" type="7ba176c96d36e3d20864ed5f-text/javascript"></script>
<script src="scripts/main.js" type="7ba176c96d36e3d20864ed5f-text/javascript"></script>

<script async src="scripts/textjavasecript.js" type="7ba176c96d36e3d20864ed5f-text/javascript"></script>
<script type="7ba176c96d36e3d20864ed5f-text/javascript">
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
<script src="scripts/rocket-loader.min.js" data-cf-settings="7ba176c96d36e3d20864ed5f-|49" defer=""></script></body>
</html>

<script>
  $(function () {
    $('#datetimepicker1').datetimepicker();
 });
</script>