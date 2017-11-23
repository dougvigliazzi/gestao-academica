<?php

$ip=$HTTP_SERVER_VARS['REMOTE_ADDR'];
$data=date("d/m/y  h:i");
$tabela=$_GET["tabela"]; 

//abre conexão com o banco
include "conexao.php";

$consulta="SHOW TABLES IN notas";
$resultado=mysql_query($consulta,$conexao);
$totallinhas=mysql_num_rows($resultado);
$cont=1;
echo "<h1>Otimiza&ccedil;&atilde;o efetuada com sucesso!</h1>";

echo "<hr><table>\n";
$ii=0;
while ($reg = mysql_fetch_array($resultado)) {

	$rs=$reg["Tables_in_notas"];
	$otimizar = "OPTIMIZE TABLE $rs";
	$error=mysql_error();
	$sql = mysql_query($otimizar,$conexao) or die ("<h2>Houve erro na gravação dos dados, por favor, clique em voltar e verifique os campos obrigatórios!</h2>");
	echo "<i>Otimizacao da Tabela <b>".$reg["Tables_in_notas"]."</b> concluida. <img src=imagens/visto.gif width=20></i><br>";
	$cont = ++$cont;
	$ii++;





echo "LOG GERADO: $data -- Ação:<b> $otimizar </b>|| IP: <b>$ip </b><p>";

$incluir_sub=addslashes($otimizar);

$incluir="INSERT INTO logs(ip,data,acao) values('$ip','$data','$incluir_sub')";
$sql2 = mysql_query($incluir) or die ($error);
};
// fecha conexao com o mysql
mysql_close($conexao);


?>
