<?php

	session_start();
   $name = $email = "";
  // $email = $_POST["email"];

  if(isset($_POST['submit'])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    if(isset($_POST["name"]) && ($_POST["name"] == $_SESSION["name"]) && isset($_POST["email"]) && ($_POST["email"] == $_SESSION["email"])){
      $_SESSION['Authenticated'] = 1;
    }else{
      $_SESSION['Authenticated'] = 0;
      header("location: register.php");
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
  <title>login page</title>
</head>
<body>
  <div class="container" id="tip">
   Welcome <?php echo $_POST["name"]; ?><br>
   Your email address is: <?php echo $_POST["email"]; ?>
   <form action="login.php" method="post">
   <p>
   <label for="name">Name:</label>
      <input type="text" name="name" id="name"required>
   </p>
   <p>
   <label for="email">email:</label>
   <input type="text" name="email" id="email" required>
   </p>
  
   <button type="submit" name="submit">Login</button>
   </form>
  </div>
</body>
</html>

