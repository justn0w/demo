<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php require 'inc/head.php' ?>
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

	$startno = ($pageno-1)*$pagesize;
	$sql = "select * from 01_news where titleid = '$titleid' order by id desc limit $startno,$pagesize";
	$rs = mysql_query($sql);
 	?>

	<div align="center">
	<a href="./admin/login.php" style="color: black;text-decoration:none;background-color: pink">登陆后台</a>
	</div>
	<table>

	<tr>
		<th>编号</th><th>内容</th><th>作者</th>
	</tr>
	<?php while($rows=mysql_fetch_assoc($rs)):?>
	<tr>
		<td><?php echo $rows['id']?></td>
	    <td><?php echo $rows['contents']?></td>
	    <td><?php echo $rows['author']?></td>
	</tr>
	<?php endwhile ?>
	</table>
	<div style="height: 100px">
		
	</div>
	<table align="center">	
		<td>
			<?php if($pageno==1):?>
	        【首页】
	        【上一页】
	        <?php else:?>
	        【<a href="?pageno=1&titleid=<?php echo $titleid?>">首页</a>】
	        【<a href="?pageno=<?php echo $pageno-1?>&titleid=<?php echo $titleid?>">上一页</a>】
	        <?php endif?>
			<?php 
			for ($i=1; $i <= $pagecount ; $i++):
			?>
			 	<a href="?pageno=<?php echo $i?>&titleid=<?php echo $titleid ?>"><?php echo $i ?></a>
			<?php endfor;?>
	        <?php if($pageno==$pagecount):?>
	        【下一页】
	        【末页】
	        <?php else:?>
	        【<a href="?pageno=<?php echo $pageno+1?>&titleid=<?php echo $titleid?>">下一页</a>】
	        【<a href="?pageno=<?php echo $pagecount?>&titleid=<?php echo $titleid?>">末页</a>】
	        <?php endif;?>
	</table>
	
</body>
</html>