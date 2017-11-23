<?php
$ip=$HTTP_SERVER_VARS['REMOTE_ADDR'];
$id=$HTTP_POST_VARS['id'];
$disciplina=$HTTP_POST_VARS['disciplina'];
$nota=$HTTP_POST_VARS['nota'];
$falta=$HTTP_POST_VARS['falta'];
$situacao=$HTTP_POST_VARS['situacao'];

$data=date("d/m/y  h:i");

//abre conexão com o banco
include "conexao.php";

$alterar = "UPDATE ra_disc SET nota='$nota',freq='$falta',situacao='$situacao' WHERE id='$id'";
$error=mysql_error();
$sql = mysql_query($alterar,$conexao) or die ("<h2>Houve erro na gravação dos dados, por favor, clique em voltar!</h2>");



echo "<h1>Altera&ccedil;&atilde;o efetuada com sucesso!</h1>";
echo "$data -- Ação:<b> $alterar </b> || IP: <b>$ip </b><p>";

$incluir_sub=addslashes($alterar);

$incluir="INSERT INTO logs(ip,data,acao) values('$ip','$data','$incluir_sub')";
$sql2 = mysql_query($incluir,$conexao); // or die ($error);

// fecha conexao com o mysql
mysql_close($conexao);

$md5f=md5('douglas');
echo "<a href=javascript:history.go(-1)>Voltar</a>";
//echo $$md5f;
?>
