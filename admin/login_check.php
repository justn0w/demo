<?php 
	require $_SERVER['DOCUMENT_ROOT'].'/demo01/inc/conn.php';
	$username = $_POST['username'];
	$passwd = $_POST['pwd'];
	var_dump($passwd);
	$sql = "select name, password from 01_admin where name = '$username' and password = '$passwd'";//明白了。如果要是数字型的话，变量前不用加上双引号，否则需要双引号
	$rs = mysql_query($sql);
	//如果这里查询失败，在if语句里仍旧会认为这是一个true的
	$num = mysql_fetch_array($rs);
	if($num)
	{
		header("location:admin.php");
	}
	else
	{
		header('location:error.php');
	}

 ?>