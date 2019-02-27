<?php
	$user_id = $_GET['uid'];
	$photo_id = $_GET['pid'];


	// test
	$conn = mysqli_connect('localhost', 'root', '', 'inst');

	$user_like = mysqli_query($conn, "SELECT * FROM likes WHERE user_id=$user_id AND photo_id=$photo_id");
	if($user_like->num_rows == 0)
	{
		mysqli_query($conn, "INSERT INTO likes (user_id, photo_id, status) VALUES ($user_id, $photo_id, 1)");
		header('Location: /lenta.php');
	}
	elseif(mysqli_fetch_assoc($user_like)['status'] == 1)
	{
		mysqli_query($conn, "UPDATE likes SET status=0 WHERE user_id=$user_id AND photo_id=$photo_id");
		header('Location: /lenta.php');	
	}
	else 
	{
		mysqli_query($conn, "UPDATE likes SET status=1 WHERE user_id=$user_id AND photo_id=$photo_id");	
		header('Location: /lenta.php');
	}

?>