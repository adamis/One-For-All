<?php 

function callJs() {
	$str = <<<'JS'
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
JS;
	gravar("script.js", $str, true);
}

function callIndex() {
	$str = <<<'PHP'
<?php
header('Content-Type: text/html; charset=utf-8');
$project = str_replace('index.php', '', $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
?>
<html lang="pt-br">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta http-equiv="content-language" content="pt-br">
<meta name="title" content="OneForAll">
<style>
 td { padding-left:32px; }
 .loader {
  border: 4px solid #f3f3f3;
  border-radius: 50%;
  border-top: 4px solid #3498db;
  width: 20px;
  height: 20px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
 }
 @-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
 }
 @keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
 }
 .accept { color: green; font-size: 24px; font-weight: bold; }
 .nameOne { text-align:center; font-weight: bold; font-size: 30px; vertical-align: middle; }
 p { margin:0; }
 .copiart { text-align:center; font-weight: bold; }
 .security-box {
  max-width: 560px;
  margin: 24px auto;
  padding: 20px;
  border: 1px solid #bdbdbd;
  border-radius: 8px;
  background: #fafafa;
  text-align: center;
  font-family: Arial, sans-serif;
 }
 .security-box h2 { margin: 0 0 8px 0; font-size: 20px; }
 .security-box p { margin: 0 0 16px 0; color: #444; }
 .btn-sec {
  display: inline-block;
  margin: 0 8px;
  padding: 10px 18px;
  border: 0;
  border-radius: 4px;
  color: #fff;
  font-weight: bold;
  cursor: pointer;
 }
 .btn-yes { background:#2e7d32; }
 .btn-no { background:#546e7a; }
</style>
<script charset="UTF-8" src="script.js"></script>
</head>
<body>
<div id="urlLocal" style="display:none;">http://<?php echo htmlspecialchars($project, ENT_QUOTES, 'UTF-8'); ?></div>
<p class="nameOne"><img src="https://adamis.com.br/oru_maito.png" height="64" alt="">OneForAll Framework</p>
<div id="securityBox" class="security-box">
<h2>Proteções de segurança</h2>
<p>Deseja construir as proteções de segurança? Se sim, serão criadas tabelas de usuário e senha, tokens OAuth2 e todas as APIs ficarão protegidas pelo Bearer token.</p>
<button class="btn-sec btn-yes" type="button" onclick="startGenerate('1')">Sim, gerar OAuth2</button>
<button class="btn-sec btn-no" type="button" onclick="startGenerate('0')">Não, APIs abertas</button>
</div>
<table id="tableMain"></table>
<p id="redir"></p>
<p class="copiart">Adamis © <?php echo date('Y'); ?> OneForAll v{{VERSION}}</p>
<div id="error"></div>
</body>
</html>
PHP;
	$version = defined('ONEFORALL_VERSION') ? ONEFORALL_VERSION : '2.0.0';
	$str = str_replace('{{VERSION}}', htmlspecialchars($version, ENT_QUOTES, 'UTF-8'), $str);
	gravar("index.php", $str, true);
}

?>
