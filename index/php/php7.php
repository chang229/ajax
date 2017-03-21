<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>php基础语法-data</title>
</head>
<body>
	<div>
		<?php 
			$arr = array();
			$arr[123] = array('name'=>'zs','age'=>'18','score'=>'100');
			$arr[124] = array('name'=>'ls','age'=>'18','score'=>'80');
			$arr[125] = array('name'=>'ww','age'=>'18','score'=>'50');
			$arr[126] = array('name'=>'zl','age'=>'18','score'=>'90');
			// 获取post数据
			$f = $_POST['num'];
			if($f=='admin'){
				foreach($arr as $key){
					echo '<ul><li>'.$key['name'].'</li><li>'.$key['age'].'</li><li>'.$key['score'].'</li></ul>';
				};
			}else{
				echo '<ul><li>'.$arr[$f]['name'].'</li><li>'.$arr[$f]['age'].'</li><li>'.$arr[$f]['score'].'</li></ul>';
			};
		 ?>
	</div>
</body>
</html>