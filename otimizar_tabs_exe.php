<?php
$ip=$HTTP_SERVER_VARS['REMOTE_ADDR'];
$data=date("d/m/y  h:i");
$tabela=$_GET["tabela"];

//abre conex�o com o banco
include "conexao.php";
$otimizar = "OPTIMIZE TABLE $tabela";
$error=mysql_error();
$sql = mysql_query($otimizar) or die ("<h2>Houve erro na grava��o dos dados, por favor, clique em voltar e verifique os campos obrigat�rios!</h2>");

echo "<h1>Otimiza&ccedil;&atilde;o efetuada com sucesso!</h1>";
echo "$data -- A��o:<b> $otimizar </b>|| IP: <b>$ip </b><p>";

$incluir_sub=addslashes($otimizar);

$incluir="INSERT INTO logs(ip,data,acao) values('$ip','$data','$incluir_sub')";
$sql2 = mysql_query($incluir) or die ($error);

// fecha conexao com o mysql
mysql_close($conexao);


?>
