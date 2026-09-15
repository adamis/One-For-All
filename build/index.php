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
<p class="copiart">Adamis © <?php echo date('Y'); ?> OneForAll v2.0.2</p>
<div id="error"></div>
</body>
</html>