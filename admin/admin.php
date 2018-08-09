<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<div align="center">
		<p>管理员中心</p>
	</div>
	<?php require $_SERVER['DOCUMENT_ROOT'].'/demo01/inc/head.php'; ?>
	<!--获取笑话-->
	<div style="height: 10px"></div>
	<?php 
		$titleid=isset($_GET['titleid'])?$_GET['titleid']:1;  //获取笑话类别编号
		$sql = "select * from 01_news where titleid = $titleid order by id desc";
		$rs = mysql_query($sql);
	?>
	<table>

	<tr>
		<th>编号</th><th>内容</th><th>作者</th><th>删除</th><th>修改</th><th>添加</th>
	</tr>
	<?php while($rows=mysql_fetch_assoc($rs)):?>
	<tr>
		<td><?php echo $rows['id']?></td>
	    <td><?php echo $rows['contents']?></td>
	    <td><?php echo $rows['author']?></td>
		<td><input type="button" value="删除" onclick="if(confirm('确定要删除吗'))
		location.href='del.php?id=<?php echo $rows['id']?>&titleid=<?php echo $titleid ?>'" ></td>
		<td><input type="button" value="修改" onclick="location.href='update.php?id=<?php echo $rows['id'] ?>'"></td>
		<td><input type="button" value="添加" onclick="location.href='add.php?titleid=<?php echo $rows['titleid'] ?>'" name=""></td>

	</tr>
	<?php endwhile ?>
	</table>
	
</body>
</html>