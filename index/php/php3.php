<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>php 基础语法</title>
	<script type="text/javascript">
		// js基本数据类型
		// string number undefined null boolean
		// 复杂数据类型
		// Object(Array,function,Math,ReglarExpress,
		// Date,Error,String,Number,Boolean,Object);
		var num = 123;
		console.log( typeof num );//number
		var str = "abc";
		console.log( typeof str );//string
		var flog = true;
		console.log( typeof flog );//boolean
		var arr = [];
		console.log( typeof arr );//object
    	console.log(typeof undefined);//undefined
		console.log( typeof null );//object
		// typeof判断数据类型只能判断5种基本
		// 数据类型：string,number,boolean,object,undefined;
		// prototype向对象追加属性和方法；
		function obj(name,age,sex){
			this.name = name ;
			this.age = age ;
			this.sex = sex ;
		};
		var obj1 = new obj("zs",18,"man");
		obj.prototype.val = null ;
		obj1.val = 200 ;
		console.log( obj1 );
		// Object.prototype.toString.call()用来判断具体的数据类型
		console.log( Object.prototype.toString.call([]) );//Array
		console.log( Object.prototype.toString.call({}) );//Object
		console.log( Object.prototype.toString.call(true) );//Boolean
		console.log( Object.prototype.toString.call(null) );//null
		console.log( Object.prototype.toString.call(undefined) );//undefined
	</script>
</head>
<body>
	<?php 
		// php数据类型和js数据类型相似，都是弱数据类型
		// gettype()内置函数，判断数据类型
		$num = 123;
		echo gettype($num);//integer整数
		echo '<br>';
		$float = 1.2;
		echo gettype($float);//double浮点数
		echo '<br>';
		$str = "abs";
		echo gettype($str);//string
		echo '<br>';
		$flog = true;
		echo gettype($flog);//boolean
		echo '<br>';
		$arr = array(1,2,3);
		echo gettype($arr);//array
		echo '<br>';
		$nul = null;
		echo gettype($nul);//null
		echo '<br>';
		$obj = function(){};//object
		echo gettype($obj);
		echo '<br>';
		// count()内置函数，用来计算数组的长度
		$arr1 = array(1,2,3,4,5,6);
		echo count($arr1);
		// 遍历数组
		for( $i = 0; $i < count($arr1); $i++){
			echo $arr1[$i];
		};
		echo '<br>';
		// foreach遍历
		foreach($arr1 as $val){
			echo $val.'<br>';
		};
		$arr2 = array('usernamr'=>'zs','age'=>'18','sex'=>'man');
		foreach($arr2 as $key=>$val){
			echo $key.'=>'.$val.'<br>';
		};
	 ?>
</body>
</html>