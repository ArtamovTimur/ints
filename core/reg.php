<?php
session_start();
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$login = $_POST['login'];
$password = $_POST['password'];

if(empty($name) || empty($lastname) || empty($login) || empty($password))
{
	echo "odno iz polei ne zapolneno!!!";
	exit;
}
if(strlen($password) < 10)
{
	echo "parol dolzhen bit bolshe 10 simvolov!!!";
}

$conn = mysqli_connect('localhost', 'root', '', 'inst');
if(empty($conn)){
	echo "soedinenie s bd ne ustanovleno!!!";
}

if(mysqli_query($conn, "SELECT * FROM users WHERE login='{$login}'")->num_rows > 0)
{
	echo "login " . $login . " zanyat!!!";
	exit;
}

$sql = "INSERT INTO users (name, lastname, login, password)
VALUES ('{$name}', '{$lastname}', '{$login}', '$password')";

if(mysqli_query($conn, $sql))
{
	$id = mysqli_fetch_assoc(
		mysqli_query($conn, "SELECT id FROM users WHERE login='{$login}'"
	))['id'];
	$_SESSION['user'] = $_POST;
	$_SESSION['user']['id'] = $id;
	header('Location: /profile.php');
}


?>