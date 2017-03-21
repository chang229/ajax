<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script type="text/javascript">
		// js变量声明
		var num = "123";
		console.log( num );
		// js拼接
		var aaa = "456" + num ;
		console.log( aaa );
		// json
		var json = '{"username":"zhangsan","age":"18","sex":"man"}';
		console.log( json ); 
		// JSON.parse(text,fn)把一个json字符串转化为对象格式,text参数必须且是一个有效的json字符串，fn非必须表示json中的每一项都执行此函数
		console.log( JSON.parse( json ) );
	</script>
</head>
<body>
	<div> WELCOME TO PHP PAGE </div>
	<?php 
		// php变量声明使用$符号
		$num = 123;
		echo $num;
		// php字符串拼接使用.
		$aaa = "abc";$bbb = "def";
		echo $aaa.$bbb;
		// php中单引号和双引号的区别
		// 单引号讲变量按普通字符串进行处理；
		echo '<div>$aaa</div>';
		// 双引号直接把变量处理成值
		echo "<div>$aaa</div>";
	 ?>
</body>
</html>