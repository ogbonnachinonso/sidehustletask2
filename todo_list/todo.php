<?php 
  include "connect.php";

	$sql = "SELECT * FROM tasks";
  $result = mysqli_query($connect, $sql);


  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    // $task = $_POST['task'];
    // echo $task;
    $created_at = date('l dS F\, Y');
    // echo $created_at;
      
		 if (empty($_POST['task'])) {
			$errors = "You must fill in the task";
		 }else{
			$task = $_POST['task'];
			if (!preg_match("/^[a-zA-Z ]*$/",$task)) {
				$errors = "Only letters and white space allowed";
			}elseif (array_filter($errors)) {
	       echo $error;
       }
       else{
    $task = mysqli_real_escape_string($connect, $_POST['task']);
    
   	 $sql = "INSERT INTO tasks (task,created_at) VALUES ('$task', '$created_at')";
	 if(mysqli_query($connect, $sql)){
		header('location: todo.php');
	  }else{
		echo 'query error:'.mysqli_error($conn);
	 }
  }
 }
}

   // delete task
   if (isset($_GET['del_task'])) {
    $del = $_GET['del_task'];
  
  $sqli = "DELETE FROM tasks WHERE id=".$del;
   $res = mysqli_query($connect, $sqli);
    header('location: todo.php');
   }


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todo Page</title>
  <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
  <style>
    .heading{
	width: 50%;
	margin: 20px auto;
	text-align: center;
	color: 	#660e0e;
	background: #a5a4a0;
	border: 2px solid #660e0e;
	border-radius: 20px;
}
form {
	width: 50%; 
	margin: 30px auto; 
	border-radius: 5px; 
	padding: 10px;
	background: #b8b7b4;
	border: 1px solid #660e0e;
}
form p {
	color: red;
	margin: 0px;
}
.task_input {
	width: 75%;
	height: 15px; 
	padding: 10px;
	border: 2px solid #660e0e;
}
.add_btn {
	height: 39px;
	background: #660e0e;
	color: 	#fff;
	border: 2px solid #660e0e;
	border-radius: 5px; 
	padding: 5px 20px;
}

table {
    width: 75%;
    margin: 30px auto;
    border-collapse: collapse;
}

tr {
	border-bottom: 1px solid #cf8484;
}

th {
	font-size: 19px;
	color: #660e0e;
}

th, td{
	border: none;
    height: 30px;
    padding: 2px;
}

tr:hover {
	background: #E9E9E9;
}

.task {
	text-align: left;
}
button{
	text-align: center;
	background: #1a5a0a;
	color: white;
	text-decoration: none;
}

.delete{
	text-align: center;
}
.delete a{
	color: white;
	background: #a52a2a;
	padding: 1px 6px;
	border-radius: 3px;
	text-decoration: none;
}
  </style>
</head>
<body>
  <div class="heading">
		<h2 style="font-style: 'Hervetica'; color: darkred;">ToDo List Application</h2>
  </div>
	<form method="post" action="todo.php" class="input_form">
  <?php if (isset($errors)) { ?>
	<p><?php echo $errors; ?></p>
  <?php } ?>
		<input type="text" name="task" class="task_input">
		<button type="submit" name="submit" id="add_btn" class="add_btn">Add Task</button>
	</form>

  
<table>
	<thead>
		<tr>
			<th>No</th>
			<th>Tasks</th>
      <th>Date</th>
			<th style="width: 60px; ">Update</th>
			<th style="width: 120px; ">Delete</th>
			
		</tr>
	</thead>

	<tbody>
  <?php
      while ($row = mysqli_fetch_assoc($result)) {
         $id = $row['id'];
         $task = $row['task'];
         $created_at = $row['created_at'];
       ?>
	<tr>
    <td><?php echo $id; ?></td>
    <td><?php echo $task; ?></td>
    <td><?php echo $created_at; ?></td>
    <td class="update"> 
			 <a href="edit.php?edit_task=<?php echo $row ['id']; ?>"><button type="button" class="btn ">Edit</button></a>
		 </td>
     <td class="delete"> 
			 <a href="todo.php?del_task=<?php echo $row['id'] ?>">delete</a> 
		 </td>
    </tr>
 <?php   
        }
  ?>
	
	</tbody>
</table>
  
</body>
</html>