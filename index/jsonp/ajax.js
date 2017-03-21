function ajax(obj){
	// 设置默认参数
	var defauls = {
		type:"get",
		url:"#",
		asynce:true,
		data:{},
		dataType:"json",
		jsonp:"callback",
		success:function(data){console.log(data);},
		error:function(data){console.log(data);}
	};
	// 根据传入的参数修改默认参数
	for( k in obj ){
		defauls[k] = obj[k];
	};
	var param = "";
	for( attr in defauls.data ){
		param += attr + "=" + defauls.data[attr] + "&";
	};
	param = encodeURI( param.substring(0,param.length-1) );
	if( defauls.dataType == "jsonp" ){
		var cd = "jquery" + ( "1.11.1" + Math.random() ).replace(/\D/g,"") + "_" + ( new Date().getTime() );
		if( defauls.jsonpcallback ){
			cd = defauls.jsonpcallback;
		};
		// 添加自定义函数
		window[cd] = function(data){
			defauls.success(data);
		};
		if( param ){
			param = "&" + param;
		};
		var script = document.createElement("script");
		script.src = defauls.url + "?" + defauls.jsonp + "=" + cd + param;
		var head = document.getElementsByTagName("head")[0];
		head.appendChild( script );
	}else{
		var xhr = null;
		if( window.XMLHttpRequest ){
			xhr = new XMLHttpRequest();
		}else{
			xhr = new ActiveXObject("Msxml2.XMLHTTP");
		};
		// 准备发送
		if( defauls.type == "get" ){
			defauls.url += "?" + param;
		};
		xhr.open(defauls.type,defauls.url,defauls.asynce);
		// 发送请求
		var data = null;
		if( defauls.type == "post" ){
			data = param;
			xhr.setRequestHeader("Content-Type","Application/x-www-form-urlencoded");
		};
		xhr.send(data);
		// 处理同步还是异步请求
		if( !defauls.asynce ){
			if( defauls.dataType == "json" ){
				return JSON.parse( xhr.responseText );
			};
			return xhr.responseText;
		};
		// 异步请求处理服务器返回的数据
		xhr.onreadystatechange = function(){
			if( xhr.readyState == 4 && xhr.status == 200 ){
				var data = xhr.responseText;
				if( defauls.dataType == "json" ){
					data = JSON.parse( data );
				};
				defauls.success(data);
			}
		}
	}
}