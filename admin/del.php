<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php 
	require '../inc/conn.php';
	$id = $_GET['id'];
	$titleid = $_GET['titleid'];
	$sql = "delete from 01_news where id = $id";
	if(mysql_query($sql))
		header('location:admin.php?titleid='.$titleid);
	else
		echo 'delete error';
	?>

</body>
</html>