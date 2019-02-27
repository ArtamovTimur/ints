<?php
	session_start();
	$id = $_SESSION['user']['id'];
	$conn = mysqli_connect('localhost', 'root', '', 'inst');
	$dbh = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");
	$user = mysqli_fetch_assoc($dbh);
?>	

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
</head>
<body>
	<h1>Профиль</h1>
	<h3>Ваше имя: <?= $user['name']?></h3>
	<h3>Ваша фамилия: <?= $user['lastname']?></h3>
	<h3>Ваш логин: <?= $user['login']?></h3>
	<h3>Ваш пароль: <?= $user['password']?></h3>
	<button><a href="update_profile.php">Редактировать профиль</a></button>
	<br><br>
	<button><a href="add_photo.php">Добавить публикацию</a></button>
</body>
</body>
</html>

