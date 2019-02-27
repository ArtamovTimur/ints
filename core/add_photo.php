<?php
	session_start();
	$title = $_POST['title'];
	$descp = $_POST['descp'];

	$photo = $_FILES['photo'];

	if(empty($title) || empty($descp))
	{
		echo "zapolnite nazvanie i opisanie!!!";
		exit;
	}
	$conn = mysqli_connect('localhost', 'root', '', 'inst');

	if(empty($photo['name']))
	{
		echo "dabavte foto!!!";
		exit;
	}
	$id = $_SESSION['user']['id'];
	if(move_uploaded_file($photo['tmp_name'], '../photos/' . $photo['name']))
	{
		mysqli_query($conn, "INSERT INTO photos (title, photo, user_id) VALUES ('{$title}', '{$photo['name']}', '{$id}')");
		header('Location: /lenta.php');
	}
?>