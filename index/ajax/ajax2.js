function ajax(obj){
	// 设置默认对象
	var defares = {
		type:"get",
		url:"#",
		data:{},
		asynce:true,
		dataType:"json",
		success:function(data){console.log(data)}
	};
	// 根据传入的对象修改默认参数
	for( k in obj ){
		defares[k] = obj[k];
	};
	// 创建xhr对象
	var xhr = null;
	if( window.XMLHttpRequest ){
		xhr = new XMLHttpRequest();
	}else{
		xhr = new ActiveXObject("Msxml2.XMLHTTP");
	};
	// 准备发送
	var parma ="";
	for( attr in defares.data ){
		parma = parma + attr+ "=" + defares.data[attr] + "&";
	};
	parma = encodeURI( parma.substring(0,parma.length-1) );
	if( defares.type == "get" ){
		defares.url += "?" + parma; 
	};
	xhr.open(defares.type,defares.url,defares.asynce);
	// 发送请求
	var data = null;
	if( defares.type == "post" ){
		data = parma;
		xhr.setRequestHeader("Content-Type","Application/x-www-form-urlencoded");
	};
	xhr.send( data );
	// 处理同步还是异步请求
	if( !defares.asynce ){
		if( defares.dataType == "json" ){
			return JSON.parse( xhr.responseText );
		};
		return xhr.responseText;
	};
	// 处理服务器返回的数据
	xhr.onreadystatechange = function(){
		if( xhr.readyState == 4 && xhr.status == 200 ){
			var data = xhr.responseText;
			if( defares.dataType == "json" ){
				data = JSON.parse( data );
			};
			defares.success(data);
		};
	};
}



