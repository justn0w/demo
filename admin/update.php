<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php 
	require '../inc/conn.php';
	$id = $_GET['id'];//获取在01_news中的id值，从而获取相应的内容
	//取出新闻内容
	$sql = "select * from 01_news where id = '$id'";
	$rs = mysql_query($sql);
	$info = mysql_fetch_assoc($rs);
	?>
	<form name="form1" method="post" action="" >
		<table width="500" border="1" style="text-align: left;">
			<tr>
				<th colspan="2">修改新闻</th>
			</tr>
			<tr>
				<td>类别：</td>
				<td><select name="type" id="type">
					<?php 
						$sql = 'select * from 01_title';
						$rs = mysql_query($sql);
						while($rows=mysql_fetch_assoc($rs)):
					 ?>
					 <option value="<?php echo $rows['id']?>" 
					 	<?php 
					 	if($rows['id']==$info['titleid']) //$info['titleid']与$rows['id']来判断在该while循环中，标题的id值为与本次修改titleid值是否一致。如果一致，则显示为选择的，否则只是正常的option
					 		echo 'selected' 
					 	?>
					 >
					 <?php echo $rows['title'] ?>	
					 </option>
					 <?php 
					 endwhile; ?>
				</select></td>
			</tr>
			<tr>
			<td>内容：</td>
			<td><textarea name="content" id="content" style="text-align: center" ><?php echo $info['contents'] //注意这里一定不能在textarea两个标签中出现空格或者换行等情况。因为这样，最终显示的内容不会左对齐?></textarea></td>
			</tr>
			<tr>
				<td>作者：</td>
				<td><input type="text" name="author" id="author" value="<?php echo $info['author'] ?>"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="button" value="修改新闻">
					<input type="button" name="button2" value="返回" onclick="location.href='admin.php'"/></td>
			</tr>
		</table>
	</form>

	<?php
		//开始修改
		if (isset($_POST['button']))
		{
			$type = $_POST['type'];
			$content = $_POST['content'];
			$author = $_POST['author'];
			$sql = "update 01_news set titleid='$type',contents='$content',author='$author' where id='$id'";
			echo $sql;
			$rs = mysql_query($sql);
			if ($rs) 
				header('location:admin.php?titleid='.$type);
			else
				echo '修改失败';
		}

	?>


</body>
</html>