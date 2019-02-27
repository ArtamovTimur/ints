<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
</head>
<body>
	<h1>Добавить новость</h1>
	<form action="core/add_photo.php" method="post" enctype="multipart/form-data">
		<h3>Заголовок</h3>
		<input type="text" name="title">
		<h3>Описание</h3>
		<textarea name="descp" cols="40" rows="10"></textarea>
		<br><br>
		<h3>Добавьте фото</h3>
		<input type="file" name="photo">
		<br><br>
		<button>Добавить</button>
	</form>
</body>
</html>