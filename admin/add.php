<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script type="text/javascript">
		function check(){
			if(document.getElementById('content').value== ''){
				alert('笑话不能为空');
				document.getElementById('content').focus();
				return false;
			}
			if(document.getElementById('author').value== ''){
				alert('作者不能为空');
				document.getElementById('author').focus();
				return false;
			}
			return true;
		}
	</script>
</head>
<body>
	<?php require '../inc/conn.php'; ?>
	<form id="form1" name="form1" method="post" action="" onsubmit="return check()" >
		<table width="500" border="1">
			<tr>
				<th colspan="2">添加笑话</th>
			</tr>
			<tr>
				<td>类别：</td>
				<td><select name="type" id="type">
					<?php //取出标题
					$sql = "select * from 01_title";
					$rs = mysql_query($sql);
					while ($rows=mysql_fetch_assoc($rs)):
					?>
					<option value="<?php echo $rows['id'] ?>">
						<?php echo $rows['title'] ?>
					</option>
					<?php endwhile;?>
				</select></td>
			</tr>
			<tr>
				<td>内容：</td>
				<td><textarea name="content" id="content"></textarea></td>
			</tr>
			<tr>
				<td>作者：</td>
				<td>
					<input type="text" name="author" id="author">
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="button"
					id="button" value="添加笑话">
				<input type="button" name="button2" id="button2" value="返回"
				onclick="location.href='admin.php'">
				</td> 
			</tr>
			
		</table>
	</form>
	<?php 
	//添加逻辑
	if (isset($_POST['button'])) {
		$type = $_POST['type'];
		$content = $_POST['content'];
		$author = $_POST['author'];
		if (trim($content)=='' || trim($author)=='') {
			# code...
			echo '内容不能为空';
			exit;
		}
		$sql = "insert into 01_news (contents, author, titleid) values ('$content', '$author', '$type')";
		$rs = mysql_query($sql);
		if($rs)
			header('location:admin.php?titleid='.$type);
		else
			echo '插入失败','<br>','<a href="add.php">点击返回</a>';
		exit;
	}

	?>
</body>
</html>