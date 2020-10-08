<?php 

function callJs() {
	$str = "
window.onload = loading;

var cont = 0;

var urlHost;

function loading(){
	var temp = document.getElementById('urlLocal').innerHTML;
	urlHost = temp+\"OneForAll.php\";	
	service(urlHost,\"\");
}

function initRequest() {
	if (window.XMLHttpRequest) {
		if (navigator.userAgent.indexOf(\"MSIE\") != -1)
			isIE = true;

		return new XMLHttpRequest();
	} else if (window.ActiveXObject) {
		isIE = true;

		try {   	
			return new ActiveXObject(\"Microsoft.XMLHTTP\");	
		} catch(e) {
			try {
				return new ActiveXObject(\"Msxml2.XMLHTTP\");
			} catch(e) { }
		}
	}
}

/**
 * Request for a service.
 *
 * @param {String} url

 */
function service(url,param) {	
	var request = initRequest();
	request.open(\"GET\", url+param, true);
	request.setRequestHeader(\"Content-Type\", 
	\"application/x-www-form-urlencoded; charset=UTF-8\");
	request.onreadystatechange = function() {
		if (request.readyState == 4 && request.status == 200) {

			var respText = request.responseText;			
			var res = respText.split(\",\");
			
			var status = res[0];
			var txt    = res[1];
			var method = res[2];

			if(cont>0){
				var anterior = document.getElementById(cont-1);
				anterior.innerHTML = '<p class=\"accept\">&#10003</p>';
			}
			var table = document.getElementById(\"tableMain\");
			table.innerHTML = table.innerHTML+'<tr><td>'+txt+'</td><td id=\"'+cont+'\"><div class=\"loader\" ></div></td></tr>';

			if (method == 'Fim') {
				
				var anterior = document.getElementById(cont);
				anterior.innerHTML = '<p class=\"accept\">&#10003</p>';
				
				var response = document.getElementById(\"tableMain\");
				response.innerHTML = table.innerHTML+'<tr><td>Finalizado</td><td><p class=\"accept\">&#10003</p></td></tr>';			
				response.innerHTML = table.innerHTML+'<tr><td>Acessar Barramento</td><td><a href=\"barramento.php\">AQUI</a></td></tr>';

				setTimeout(function () {					
					window.open('barramento.php', '_blank');
				}, 2000); //will call the function after 2 secs.

			} else {
				if(status == 'OK'){
					service(urlHost+\"?method=\",method);
				}else{
					var error = document.getElementById('error');
					error.innerHTML = ''+status;
				}
			} 

			cont++;
		}
	};
	request.send();
}";
	
	gravar("script.js", $str);
	
}

function callIndex() {
	$str = "
<?php

echo '<html lang=\"pt-br\">';

echo '<head>';
echo '<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\">';
echo '<meta http-equiv=\"content-language\" content=\"pt-br\">';
echo '<meta name=\"title\" content=\"OneForAll\">';

echo '<style>
		 td{
			padding-left:32px;
		 }
		.loader {
		  border: 4px solid #f3f3f3;
		  border-radius: 50%;
		  border-top: 4px solid #3498db;
		  width: 20px;
		  height: 20px;
		  -webkit-animation: spin 2s linear infinite; /* Safari */
		  animation: spin 2s linear infinite;
		}
		
		/* Safari */
		@-webkit-keyframes spin {
		  0% { -webkit-transform: rotate(0deg); }
		  100% { -webkit-transform: rotate(360deg); }
		}
		
		@keyframes spin {
		  0% { transform: rotate(0deg); }
		  100% { transform: rotate(360deg); }
		}
		.accept{
			color: green;    
	    	font-size: 24px;
	    	font-weight: bold;
		}
	
		.nameOne{
			text-align:center; 
			font-weight: bold; 
			font-size: 30px;
    		vertical-align: middle;
		}
		
		p{
			margin:0;
		}
		.copiart{
			text-align:center; 
			font-weight: bold;
		}
		</style>';

echo '<script charset=\"UTF-8\" src=\"script.js\"></script>';

echo '</head>';

echo '<body>';

/* \$project = \$_SERVER ['HTTP_HOST'] .\"/\". explode('/', \$_SERVER['REQUEST_URI'])[1].\"/\"; */

\$project = str_replace('index.php','',\$_SERVER['HTTP_HOST'].\$_SERVER['REQUEST_URI']);
//echo \$project;

echo '<div id=\"urlLocal\" style=\"display:none;\">http://' . \$project . '</div>';
echo '<p class=\"nameOne\"><img src=\"https://adamis.com.br/oru_maito.png\" height=64 >OneForAll Framework</p>';

echo '<p class=\"copiart\">Build 1.0 %dataAtual%</p>';
echo '<br>';
echo '<table id=\"tableMain\"></table>';
echo '<p id=\"redir\"></p>';
echo '<p class=\"copiart\">Adamis © 2018 OneForAll</p>';
echo '<div id=\"error\"></div>';

echo '</body>';

echo '</html>';
?>";
	
	gravar("index.php", $str);
}

?>



