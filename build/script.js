window.onload = readyGenerate;

var cont = 0;
var urlHost;
var securityFlag = '0';

function readyGenerate(){
	var temp = document.getElementById('urlLocal').innerHTML;
	urlHost = temp + "OneForAll.php";
}

function startGenerate(sec){
	securityFlag = sec;
	var box = document.getElementById('securityBox');
	if (box) {
		box.style.display = 'none';
	}
	service(urlHost + "?security=" + securityFlag, "");
}

function initRequest() {
	if (window.XMLHttpRequest) {
		if (navigator.userAgent.indexOf("MSIE") != -1)
			isIE = true;
		return new XMLHttpRequest();
	} else if (window.ActiveXObject) {
		isIE = true;
		try {
			return new ActiveXObject("Microsoft.XMLHTTP");
		} catch(e) {
			try {
				return new ActiveXObject("Msxml2.XMLHTTP");
			} catch(e) { }
		}
	}
}

function service(url, param) {
	var request = initRequest();
	request.open("GET", url + param, true);
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
	request.onreadystatechange = function() {
		if (request.readyState == 4 && request.status == 200) {
			var respText = request.responseText;
			var res = respText.split(",");
			var status = res[0];
			var txt    = res[1];
			var method = res[2];

			if (cont > 0) {
				var anterior = document.getElementById(cont - 1);
				anterior.innerHTML = '<p class="accept">&#10003</p>';
			}
			var table = document.getElementById("tableMain");
			table.innerHTML = table.innerHTML + '<tr><td>' + txt + '</td><td id="' + cont + '"><div class="loader" ></div></td></tr>';

			if (method == 'Fim') {
				var anterior = document.getElementById(cont);
				anterior.innerHTML = '<p class="accept">&#10003</p>';
				var response = document.getElementById("tableMain");
				response.innerHTML = table.innerHTML + '<tr><td>Finalizado</td><td><p class="accept">&#10003</p></td></tr>';
				response.innerHTML = table.innerHTML + '<tr><td>Acessar Barramento</td><td><a href="barramento.php">AQUI</a></td></tr>';
				setTimeout(function () {
					window.open('barramento.php', '_blank');
				}, 2000);
			} else {
				if (status == 'OK') {
					service(urlHost + "?method=" + method + "&security=" + securityFlag, "");
				} else {
					var error = document.getElementById('error');
					error.innerHTML = '' + status;
				}
			}
			cont++;
		}
	};
	request.send();
}