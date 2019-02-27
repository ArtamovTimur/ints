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
	<h1>Редактирование профиля</h1>
	<form action="core/update_profile.php" method="post">
		<h3>Введите имя</h3>
		<input type="text" name="name" value="<?= $user['name']?>">
		<h3>Введите фамилию</h3>
		<input type="text" name="lastname" value="<?= $user['lastname']?>">
		<br><br>
		<button>Сохранить</button>
	</form>
</body>
</html>