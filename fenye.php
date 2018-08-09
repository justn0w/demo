<?php require 'inc/head.php'?>
<?php 
	$titleid=isset($_GET['titleid'])?$_GET['titleid']:1;
	$pagesize = 10;
	$sql = "select count(*) from 01_news where titleid = '$titleid'";
	$rs = mysql_query($sql);
	$rows=mysql_fetch_row($rs);
	$recordcount = $rows[0];//总记录数
	//求出总页数
	$pagecount = ceil($recordcount/$pagesize);
	//获取当前页
	$pageno = isset($_GET['pageno'])?$_GET['pageno']:1;
	

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<table>
		<td></td>
	</table>
</body>
</html>