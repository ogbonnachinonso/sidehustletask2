<?php
 include "connect.php";
 if (isset($_GET['edit_task'])) {
	$e_id = $_GET['edit_task'];
 }
 if(isset($_POST['edit_task'])){
	 $edit_task = $_POST['task'];

	 $query = "UPDATE tasks SET task = '$edit_task' WHERE id = $e_id";
	 $run = mysqli_query($connect, $query);
	 if(!$run){
		 die("Edit Failed");
	 }else{
		header('location: todo.php');
	 }  
 }
?>

 


 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Todo</title>
  <style>
		.heading{
	width: 50%;
	margin: 40px auto;
	text-align: center;
	color: 	#660e0e;
	background: #b8b7b4;
	border: 2px solid #660e0e;
	border-radius: 10px;
}
form {
	width: 75%; 
	margin: 30px auto; 
	border-radius: 5px; 
	padding: 15px;
	background: #b8b7b4;
	border: 1px solid #660e0e;
}
form p {
	color: red;
	margin: 0px;
}
.task_input {
	width: 75%;
	height: 13px; 
	padding: 15px;
	border: 1px solid #660e0e;
	border-radius: 5px;
}
.add_btn {
	height: 39px;
	background: #660e0e;
	color: 	#fff;
	border: 2px solid #660e0e;
	border-radius: 5px; 
	padding: 5px 20px;
}
.task {
	text-align: left;
}
</style>
</head>
<body>
  <div class="heading">
		<h2 style="font-style: 'Hervetica'; color: darkred;">Edit ToDo List </h2>
  </div>
	<form method="post" action="" class="input_form">
  <?php 
     $sql = "SELECT *FROM tasks WHERE id = $e_id";
		$result = mysqli_query($connect, $sql);
		$data = mysqli_fetch_array($result);
		 ?>	
		<input type="text" name="task" class="task_input" value="<?php echo $data['task'];?>">
    <input type="hidden" name="update_id" value="">
		<button type="submit" name="edit_task" id="add_btn" class="add_btn">Update</button>
	</form>
  

</body>

</html>

