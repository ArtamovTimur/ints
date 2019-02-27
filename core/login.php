<?php 
	session_start();
	$login = $_POST['login'];
	$password = $_POST['password'];

	if(empty($login) || empty($password))
	{
		echo "Одно из полей не заполнено!!!";
		exit;
	}
	$conn = mysqli_connect('localhost', 'root', '', 'inst');

	$sql = "SELECT * FROM users WHERE login='{$login}' AND password='{$password}'";
	$res = mysqli_query($conn, $sql);
	
	if($res->num_rows == 0){
		echo "Неверный логин или пароль!!!";
	}else {
		$_SESSION['user'] = mysqli_fetch_assoc($res);
		header('Location: /profile.php');
	}
?>