<?php 
 	$config = require $_SERVER['DOCUMENT_ROOT'].'/demo01/config/config.php';
  	mysql_connect($config['host'].':'.$config['port'],$config['name'],$config['pwd']) or die('数据库连接失败');
 	mysql_select_db($config['database']);
 	//设置执行环境 强调下，想要在字符窜中显示标量，方法一定要记好
 	mysql_query("set names {$config['charset']}");
 	
 ?>
 