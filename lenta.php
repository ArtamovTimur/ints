<?php
	session_start();
	$id = $_SESSION['user']['id'];
	$conn = mysqli_connect('localhost', 'root', '', 'inst');
	$dbh = mysqli_query($conn, "SELECT * FROM photos");

	while($row = mysqli_fetch_assoc($dbh))
	{
		$author = mysqli_fetch_assoc(mysqli_query($conn, "SELECT *FROM users WHERE id=$row[user_id]"));
		$l = mysqli_query($conn, "SELECT COUNT(id) count FROM likes WHERE photo_id=$row[id] AND status=1");
		$row['like'] = mysqli_fetch_assoc($l)['count'];
		$row['author'] = $author['login'];
		$photos[] = $row;
	}


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<style>
		.pub {
			padding: 20px;
			border: 1px solid red;
			display: inline-block;
			margin-top: 50px;
		}
		.like {
			width: 30px;height: 30px;
			background: red;
			text-align: center;
			padding-top: 4px;
			color: white;
			font-size: 24px;
		}.like:hover {
			cursor: pointer;
		}a {
			color: white;
			text-decoration: none;
		}
	</style>
</head>
<body>
	<h1>Лента</h1>
	<?php for($i = 0; $i < count($photos); $i++):?>
		<div class="pub">
			<h3><?= $photos[$i]['title']?></h3>
			<img src="photos/<?= $photos[$i]['photo']?>" width="300">
			<h3>Опубликовал: <?= $photos[$i]['author']?></h3>
			<div class="like"><a href="core/like.php?uid=<?= $id?>&pid=<?= $photos[$i]['id']?>"><?= $photos[$i]['like']?></a></div>
		</div><br>
	<?php endfor; ?>
</body>
</html>