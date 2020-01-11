<?php
session_start();

$username = "";
$success="You are now logged in";
$usernameError  = $passwordError = "";
$noUsername = "";
$db = mysqli_connect('localhost', 'root', 'root', 'iSmile');


// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  if (empty($_POST["username"])) {
    $usernameError = "Username is required!";
  } 

  if (empty($_POST["password"])) {
    $passwordError = "Password is required!";
  } 

    $username_check_query = "SELECT * FROM signup WHERE username ='$username'";
  $isNotExistUsername = mysqli_query($db, $username_check_query);
  if (mysqli_num_rows($isNotExistUsername) <= 1) {
    
            $noUsername ="Wrong username/password combination!";
        
    } 

  //if (count($usernameError && $passwordError) == 0) {
if (!empty($username) && !empty($password)) {
    $query = "SELECT * FROM signup WHERE username ='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($results);

    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['role'] = $row['role'];   
      $_SESSION['userId'] = $row['UserId'];
      $_SESSION['success'] = $success;
       
      header('location:index.php');}
      

      
    
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
<title>Login</title>

<link rel="stylesheet" href="css/design-iconic-font.min.css">

<link rel="stylesheet" href="css/L-form.css">
</head>
<body>
<div class="main">
<section class="signup">

<div class="container">
<div class="signup-content">
<form method="POST" id="signup-form" class="signup-form" action="login.php">
	

<h2 class="form-title">Login</h2>

<div class="form-group">
<input type="text" class="form-input" name="username" id="userName" placeholder="Username" />
<span class="error1" style="color: red;font-size: 12px;position: absolute;left: 420px;top: 140px;"><?php echo $usernameError." ".$noUsername?></span> 
</div>
<div class="form-group">
<input type="password" class="form-input" name="password" id="password" placeholder="Password" />
<span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
<span class="error1" style="color: red;font-size: 12px;position: absolute;left: 450px;top: 235px;"><?php echo $passwordError;?></span>

</div>
<div class="form-group">
<input type="submit" name="login_user" id="submit" class="form-submit" value="Submit" />
</div>
</form>
<p class="loginhere" style="position: absolute;top:260px">
Don't have an account ? <a href="contact.php" class="loginhere-link">Sign up here</a>
</p>
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











