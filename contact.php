
<?php

// initializing variables

$usernameError = $emailError  = $usernameError = "";
$role ="patient";
$db = mysqli_connect('localhost', 'root', 'root', 'iSmile');

// REGISTER USER
if (isset($_POST['submit'])) {
  // receive all input values from the form  $username = mysqli_real_escape_string($db, $_POST['username']);
  $name = $_POST['name'];
  $surname = $_POST['surname'];
  $telephone = $_POST['telephone'];
  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  
 

  if (empty($_POST["name"])) {
    $usernameError = "Name is required!";
  } 
   if (empty($_POST["username"])) {
    $usernameError = "Username is required!";
  } 
  if (empty($_POST["email"])) {
    $emailError = "Email is required!";
  } 


 

  // Finally, register user if there are no errors in the form
  if (empty($usernameError) && empty($emailError) && empty($usernameError)) {

  	$query = "INSERT INTO signup (name, surname, telephone, email, username, password, role) 
  			  VALUES('$name', '$surname', '$telephone', '$email','$username', '$password', 'patient')";
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
<title>Sign Up</title>

<link rel="stylesheet" href="css/design-iconic-font.min.css">

<link rel="stylesheet" href="css/contact.css">
</head>
<body>
<div class="main">
<section class="signup">

<div class="container">
<div class="signup-content">

<form action="contact.php" method="POST" id="signup-form" class="signup-form">
<h2 class="form-title">Sign Up</h2>
<div class="form-group">
<input type="text" class="form-input" name="name" id="name" placeholder="Your Name" />
<span class="error1" style="color: red;font-size: 15px;position: absolute;left: 340px;top: 120px;"><?php echo $usernameError;?></span>
</div>
<div class="form-group">
<input type="text" class="form-input" name="surname" id="surName" placeholder="Your Surname" />
</div>
<div class="form-group">
<input type="text" class="form-input" name="telephone" id="telephone" placeholder="Phone Number" />
</div>
<div class="form-group">
<input type="text" class="form-input" name="email" id="email" placeholder="Your Email" />
<span class="error1" style="width:150px;color: red;font-size: 15px;position: absolute;left: 350px;top: 340px;"><?php echo $emailError;?></span>
</div>
<div class="form-group">
<input type="text" class="form-input" name="username" id="surName" placeholder="Username" />
</div>
<div class="form-group">
<input type="password" class="form-input" name="password" style="color: #999;height: 50px;" placeholder="Password" />
</div>
<div class="form-group">
<input type="submit" name="submit" id="submit" class="form-submit" value="Submit" />
</div>
</form>

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