
<?php

// initializing variables

$dateToError = $dateFromError  = "";
$role ="patient";
$db = mysqli_connect('localhost', 'root', 'root', 'iSmile');

// REGISTER USER
if (isset($_POST['submit'])) {
  // receive all input values from the form  $username = mysqli_real_escape_string($db, $_POST['username']);
  $dateFrom = $_POST['dateFrom'];
  $dateTo = $_POST['dateTo'];
  $description = $_POST['description'];
  
 

  if (empty($_POST["dateFrom"])) {
    $dateFromError = "Date is required!";
  } 
   if (empty($_POST["dateTo"])) {
    $dateToError = "Date is required!";
  } 
 

  // Finally, register user if there are no errors in the form
  if (empty($dateFromError) && empty($dateToError)) {

  	$query = "INSERT INTO appointment (dateFrom, dateTo, description) 
  			  VALUES('$dateFrom', '$dateTo', '$description', )";
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
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Dancing+Script&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Baskervville&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/smile.css">
<link rel="stylesheet" href="css/design-iconic-font.min.css">

<link rel="stylesheet" href="css/check-appointments.css">
</head>
<body>

   <div class="container" >

     <div class="header" >
      <a href ="index.php" style="text-decoration:none;color:black;">Home</a>
         <a href="#contact" style="text-decoration:none;color:black;" > Contact</a> 
      <a href="#about" style="text-decoration:none; color:black;">About</a>


    </div>

       <?php 
session_start();
if(!empty($_SESSION['role'])){
if ($_SESSION['role'] == "doctor")
{
 ?>   
  <a href="check-appointments.php"> <button style="position: absolute;left: 500px;top: 30px; "class="button1">Check appointments</button></a>
 

<?php } 
else{
  ?>
   <a href="make-appointment.php"> <button style="position: absolute;left: 500px;top: 30px; "class="button1">Make an appointment</button></a>
<?php  
}
}
?>

    <?php 
if (empty($_SESSION['username']))
{
 ?>
<div class="request-appointment">
<a href="contact.php"><button class="button3"> Sign Up</button></a>
<a href="login.php"><button class="button4"> Login</button></a>
<?php } 
else {
?>
  <form class="form-inline">
  <a href="configuration.php">  <button class="button1" style="position: absolute;left: 1200px;top: 60px;" type="button">Logout</button> </a>
      <a href="" style="width:100px;color:black; position: absolute; left: 1205px;text-decoration: none;font-size: 17px;"><?php echo "User:" . $_SESSION['username'] . "";?></a> 
  </form>
  <?php } 
?>





</div>

<table style="position: absolute; top: 150px;">
  <tr>
    <th>Name</th>
    <th>Surname</th>
    <th>Email</th>
     <th>Telephone</th>
      <th>Description</th>
  </tr>

    <?php
  $dbc = mysqli_connect('localhost', 'root', 'root', 'ismile');
  $query=mysqli_query($dbc, "SELECT appointment.description AS description, 
                              signup.name as name, signup.surname as surname, signup.email as email, signup.telephone as telephone
                                    FROM appointment 
                                    left outer join signup on signup.UserId = appointment.UserId");
                while ($row = mysqli_fetch_assoc($query)) { ?>
                
                <tbody>
                
                 <?php

                    echo "<tr>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['surname'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['telephone'] . "</td>";
                    echo "<td>" . $row['description'] . "</td>";
                    echo "</tr>";


                  
                              ?>
                </tbody>
                <?php
                }
                 ?>
</table>

</div>










</body>
</html>