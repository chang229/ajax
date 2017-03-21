<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>php基础语法--函数</title>
	<script type="text/javascript">
		// js函数命名时是区分大小写的
		function foo(info){
			console.log(info);
			return info;
		};
		var ret = foo(123);
		console.log(ret);
	</script>
</head>
<body>
	<?php 
		// php中函数的命名不区分大小写
		// php函数的形参也要加$声明
		function foo($info){
			return $info;
		};
		$ret = Foo("hi tom");
		echo $ret;
		echo '<br>';
		// json_encode()对变量进行json编码；
		$arr = array("username"=>"zs","age"=>"18","sex"=>"man");
		print_r($arr);
		var_dump($arr);
		echo json_encode($arr);
	 ?>
</body>
</html>