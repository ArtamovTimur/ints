<?php
	session_start();
	$name = $_POST['name'];
	$lastname = $_POST['lastname'];

	if(empty($name) || empty($lastname))
	{
		echo "odno iz polei ne zapolneno!!!";
		exit;
	}
	$conn = mysqli_connect('localhost', 'root', '', 'inst');
	$id = $_SESSION['user']['id'];
	$sql = "UPDATE users SET name='{$name}', lastname='{$lastname}' WHERE id=$id";
	if(mysqli_query($conn, $sql))
	{
		header('Location: /profile.php');
	}
?>