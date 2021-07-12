<?php
 session_start();
if (isset($_SESSION['name']) && isset($_SESSION['password'])) {
   
       if($_SESSION['name'] === $_POST['name'] && $_SESSION['password'] === $_POST['password']){
                
            $name =  $_SESSION['name'] ;
             $password =  $_SESSION['password'] = $_POST['password'];

?> <!DOCTYPE html>
<html lang="en">
 <head>
   <style>
      div {
         margin : auto;
          width: 50%;
        }
      a{
        text-decoration: none;
       }
   </style>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- <link rel="stylesheet" type="text/css" href="../css/index.css"> -->
   </head>
     <body>
     <div class="" id="ti">
       <p>
         <?php echo "<h1>Hello, $name!!</h1> <h3>You have successfully logged in</h3>";?>
          <h5>want to change password or username? <a href="signup.php">Sign up</a></h5>
          <a href="login.php">Logout</a>
           </p>
           </div>
     </body>
  </html>
  <?php
}else{

  echo  ' <!DOCTYPE html>
  <html lang="en">
  <head>
  <style>
      div {
          margin : auto;
          width: 50%;
          border-radius: 20px;
          height: 70vh;
      }
      input[type=\'text\'], input[type=\'password\'], input[type=\'email\']{
          width:90%;
          border: 2px solid grey;
          border-radius: 30px;
          margin: auto;
      }
      a{
          text-decoration: none;
      }
      
      </style>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
  </head>
  <body>
      <div>
      <h1>Log In</h1>
      <p style="color:red;">wrong username or password!!</p> 
      <form action="index.php" method="post">
          <label for="">Username:</label><br><input type="text" name="name" id="" required><br>
          <br>
          <label for="">Password:</label><br><input type="password" name="password" id="" required><br>
          <br>
          <input type="submit" value="submit">
      </form>
      <h5>Don\'t have account yet? </h5>
      <h4><a href="signUp.php">go to Sign up</a></h4>
      </div>
  </body>
  </html>';

 }
  
  
  
} else {
  // if (isset($_POST['username']) && isset($_POST['password'])) {
      if (isset($_POST['submit'])) {

?>                       
  <!DOCTYPE html>
  <html lang="en">
       <head>
       <style>
           div {
               margin : auto;
               width: 50%;
               border-radius: 20px;
               height: 70vh;
           }
           input[type='text'], input[type='password'], input[type='email']{
               width:90%;
               border: 2px solid grey;
               border-radius: 30px;
               margin: auto;
           }
           a{
               text-decoration: none;
           }
          
           </style>
      
           <meta charset="UTF-8">
           <meta name="viewport" content="width=device-width, initial-scale=1.0">
           <title>Document</title>
       </head>
       <body>
           <div>
           <h1>Sign Up</h1>
           <p style="color:red;">You do not have an account!!</p> 
           <form action="signUp.php" method="post">
               <label for="">Username:</label><br><input type="text" name="name" id="" required><br>
               <br>
               <label for="">Password:</label><br><input type="password" name="password" id="" required><br>
               <br>
               <input type="submit" name="submit" value="submit">
           </form>
           <h5>Already Signed up? </h5>
           <h4><a href="login.php">go to login</a></h4>
           </div>
       </body>
   </html>
   <?php
  } else{            
 
      header("location: signup.php");

 }
}


?>

