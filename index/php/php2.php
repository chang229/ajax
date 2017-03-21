<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script type="text/javascript">
		//数组字面量 
		var arr = ["123","456"];
		console.log( arr[0] );
		console.log( arr[1] );
		console.log( arr.length );
		// 数组构造函数
		// 数组的构造函数中如果只有一个数字，则该数字表示该数组的长度；
		// 数组字面量中只有一个数字，表示数组中只有一个元素；
		var arr1 = new Array(789,123);
		console.log( arr1[0] );
		console.log( arr1[1] );
		console.log( arr1.length );
		// 二维数组：数组中的每一项还是一个数组；
		var arr2 = new Array();
		arr2[0] = [1,2,3];
		arr2[1] = [4,5,6];
		arr2[2] = [7,8,9];
		console.log( arr2 );
		for( i = 0 ; i < arr2.length ; i++ ){
			for( j = 0 ; j < arr2[i].length ; j++ ){
				console.log( "arr2的第" +i + "项的第" + j + "位是" + arr2[i][j] );
			};
		};
	</script>
</head>
<body>
	<div>测试内容</div>
	<div>
		<?php 
			// 数组的两种形式
			$arr = array(1,2,3,4);
			// echo输出简单数据类型 如：字符串，数字；
			echo $arr[0];
			// print_r()输出复杂数据类型，如：数组；
			print_r($arr);
			// var_dump()输出详细信息，如：对象，数组；
			var_dump($arr);
			//
			$arr1 = array("username"=>"ceshi","age"=>"18","sex"=>"man");
			echo $arr1["username"]; 
			print_r( $arr1 );
			var_dump( $arr1 );
			// 二维数组
			$arr2 = array();
			$arr2[0] = array("a","b","c");
			$arr2[1] = array("d","e","f");
			$arr2[2] = array("g","h","i");
			print_r( $arr2 );
			var_dump( $arr2 );
			// 
			$arr3 = array();
			$arr3["apple"] = array("color"=>"red","wd"=>"swit","xz"=>"yuan");
			$arr3["banner"] = array("color"=>"yellow","wd"=>"swit","xz"=>"juxing");
			$arr3["orange"] = array("color"=>"orange","wd"=>"suan","xz"=>"yuan");
			print_r($arr3);
			var_dump($arr3);
		?>
	</div>
</body>
</html>
