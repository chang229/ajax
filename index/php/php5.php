<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>php基础语法--get</title>
	<script type="text/javascript">
		// http常用请求方式（增删改查）
		// get 从服务器请求数据，参数一般作为查询条件
		// post 向服务器发送数据
		// delete 用来删除数据
		// put 用来修改数据
	</script>
</head>
<body>
	<div>测试get获取数据</div>
	<div>
		<?php 
			// $_GET["val"]用来获取url中携带参数的值；
			$f = $_GET["putint"];
			echo $f.'<br>';
			if($f == 1){
				echo '得到参数'.$f;
			}else{
				echo '参数获取失败';
			};
		 ?>
	</div>
</body>
</html>