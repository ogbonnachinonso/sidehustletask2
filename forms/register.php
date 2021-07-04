<?php

session_start();
$nameErr = $emailErr = $passwordErr = $msgErr = "";
$name = $email =  $password = $msg = ""; 

if(isset($_POST['submit'])){ 
  $_SESSION['name'] = $_POST['name'];
  $_SESSION['email'] = $_POST['email'];
  
  //echo $_SESSION['name'].'<br>';
 
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else{
    $name= ($_POST["name"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }else{
      echo "welcome:".htmlspecialchars($_POST["name"])."<br>";
    }
  }
  if (empty($_POST["email"])) {
    $emailErr = "An email is required";
  } else{
    $email = ($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }else{
      echo "This is the email you entered:".htmlspecialchars($_POST["email"])."<br>";
    }
  }
  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  } else{
    $password = ($_POST["password"]);
    $number = preg_match('@[0-9]@', $password);
     $uppercase = preg_match('@[A-Z]@', $password);
     $lowercase = preg_match('@[a-z]@', $password);
     $specialChars = preg_match('@[^\w]@', $password);
  }if(strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
    $msgErr = "<p>Password must be at least 8 characters in length <br> It must contain at least one number, <br> It must have an upper case letter,<br> A lower case letter<br> And one special character.</p>";
  } else {
    // echo $msg = "Your have successfully created an account.";
    header("location: login.php");
    
  } 
  
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../css/index.css">
  <title>Form Handling</title>
</head>
<body>


<h1>Register </h1>
	<div id="tip">
  <?php 
  echo "Welcome:". $_SESSION['name'].'<br>';
  echo "Your Email Address is:".$_SESSION['email'].'<br>';
  
   ?>
		<form action="register.php" method="POST">
			<label for="Name">Name:</label>
			<input type="text"  id="name" name="name" value="<?php echo $name?>"><br><span style="color: red; font-size: 14px; padding-left: 250px"><?php echo $nameErr?></span>
			<br>

			<label for="email">Email:</label>
			<input type="text"  id="email" name="email" value="<?php echo $email?>" ><br><span style="color: red; font-size: 14px; padding-left: 250px"><?php echo $emailErr?></span>
			<br>
      <label for="password">Passw:</label>
			<input type="password"  id="password" name="password" value="<?php echo $msg?>"><br><span style="color: red; font-size: 14px; padding-left: 10px"><?php echo $msgErr?></span>
			<br>
			
			<button type="submit" name="submit">Register</button>

		</form>
    
	</div>
</body>
</html>