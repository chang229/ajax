function ajax(obj) {
	// 设置默认参数
	var defauls = {
		type: "get",
		url: "#",
		asynce: true,
		data: {},
		dataType: "json",
		jsonp: "cb",
		success: function(data) {
			console.log(data);
		}
	};
	// 根据传入的参数修改默认参数
	for (k in obj) {
		defauls[k] = obj[k];
	};
	// 参数处理
	var param = "";
	for (attr in defauls.data) {
		param += attr + "=" + defauls.data[attr] + "&";
	};
	param = encodeURI(param.substring(0, param.length - 1));
	if (param) {
		param = "?" + param;
	};
	// 判断是jsonp跨域还是ajax异步请求
	if (defauls.dataType == "jsonp") {
		// 设置自定义函数
		var cd = "common" + ("1.11.1" + Math.random()).replace(/\D/g, "") + "_" + (new Date().getTime());
		if (defauls.jsonpCallback) {
			cd = defauls.jsonpCallback;
		};
		window[cd] = function(data) {
			defauls.success(data);
		}
		var script = document.createElement("script");
		script.src = defauls.url + param + "&" + defauls.jsonp + "=" + cd;
		var head = document.getElementsByTagName("head")[0];
		head.appendChild(script);
	} else {
		// ajax异步请求
		var xhr = null;
		if (window.XMLHttpRequest) {
			xhr = new XMLHttpRequest();
		} else {
			xhr = new ActiveXObject("Msxml2.XMLHTTP");
		};
		// 准备发送
		if (defauls.type == "get") {
			defauls.url += param;
		};
		xhr.open(defauls.type, defauls.url, defauls.asynce);
		// 发送请求
		var data = null;
		if (defauls.type == "post") {
			data = param.substring(1, param.length);
			xhr.setRequestHeader("Content-Type", "Application/x-www-form-urlencoded");
		};
		xhr.send(data);
		// 处理同步请求
		if (!defauls.asynce) {
			if (defauls.dataType == "json") {
				return JSON.parse(xhr.responseText);
			};
			return xhr.responseText;
		};
		// 异步请求处理服务器数据
		xhr.onreadystatechange = function() {
			if (xhr.readyState == 4 && xhr.status == 200) {
				var data = xhr.responseText;
				if (defauls.dataType == "json") {
					data = JSON.parse(data);
				};
				defauls.success(data);
			};
		};
	};
};
// 获取计算后的样式
function getStyle(element, attr) {
	if (window.getComputedStyle) {
		return window.getComputedStyle(element, null)[attr];
	} else {
		return element.currentStyle[attr];
	}
};
// 封装缓动函数方法
function animate(obj, json, fn) {
	clearInterval(obj.timer);
	obj.timer = setInterval(function() {
		var flog = true;
		for (k in json) {
			if (k === "zIndex") {
				obj.style[k] = json[k];
			} else if (k === "opacity") {
				// 调用上面的获取计算后样式函数
				var leader = getStyle(obj, k) * 100;
				var target = json[k] * 100;
				var step = (target - leader) / 10;
				step = step > 0 ? Math.ceil(step) : Math.floor(step);
				leader = leader + step;
				obj.style[k] = leader / 100;
			} else {
				var leader = parseInt(getStyle(obj, k));
				var target = json[k];
				var step = (target - leader) / 10;
				step = step > 0 ? Math.ceil(step) : Math.floor(step);
				leader = leader + step;
				obj.style[k] = leader + "px";
			};
			if (leader !== target) {
				flog = false;
			};
		};
		if (flog) {
			clearInterval(obj.timer);
			if (fn) {
				fn();
			};
		};
	}, 15);
};