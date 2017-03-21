function ajax(type,url,param,asynce,dataType,fn){
	// 创建xhr对象
	var xhr = null;
	if( window.XMLHttpRequest ){
		xhr = new XMLHttpRequest();
	}else{
		xhr = new ActiveXObject("Msxml2.XMLHTTP");
	};
	// 准备发送
	param = encodeURI(param);
	if( type == "get" ){
		url = url + "?" + param;
	};
	xhr.open(type,url,asynce);
	// 发送请求
	var data = null;
	if( type == "post" ){
		data = param;
		xhr.setRequestHeader("Content-Type","Application/x-www-form-urlencoded");
	};
	xhr.send(data);
	// 判断同步还是异步
	if( !asynce ){
		if( dataType == "json" ){
			return JSON.parse( xhr.responseText );
		};
		return xhr.responseText;
	};
	// 处理后台返回的数据
	xhr.onreadystatechange = function(){
		if( xhr.readyState == 4 && xhr.status == 200 ){
			var data = xhr.responseText;
			if( dataType == "json" ){
				data = JSON.parse(data);
			};
			fn( data );
		};
	};
}