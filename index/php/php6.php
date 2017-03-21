<?php 
	//$_POST根据保单中的name属性获取值； 
	$username = $_POST['username'];
	$pw = $_POST['pw'];
	// 设置服务器相应的文件类型
	header("Content-Type:text/plain;charset=utf-8");
	if($username == "zs" && $pw == '888'){
		echo '登录<br>成功';
	}else{
		echo '用户名或密码错误';
	};
 ?>