<head>
 	    <style type="text/css">
        table
        {
            border-collapse: collapse;
            margin: 0 auto;
            text-align: center;
            width: 80%;
        }
        table td, table th
        {
            border: 1px solid #cad9ea;
            color: #666;
            height: 30px;
        }
        table thead th
        {
            background-color: #CCE8EB;
            width: 100px;
        }
        table tr:nth-child(odd)
        {
            background: #fff;
        }
        table tr:nth-child(even)
        {
            background: #F5FAFA;
        }
    </style>
 </head>


<?php 
	require $_SERVER['DOCUMENT_ROOT'].'/demo01/inc/conn.php';
	$rs = mysql_query('select * from 01_title');
 ?>

 <table>
 	<tr>
 		<?php 
 			$n = 0;
 			while ($rows = mysql_fetch_assoc($rs)):?>
				<td><a href="?titleid=<?php echo $rows['id'] ?>" style="text-decoration:none;"><?php echo $rows['title']?>
					
				</a></td>
		<?php 
			if(++$n%10 == 0)
				echo '</tr><tr>';
			endwhile ?>
 	</tr>
 </table>
 