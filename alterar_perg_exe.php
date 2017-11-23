<?php
$ip=$HTTP_SERVER_VARS['REMOTE_ADDR'];
$pergunta=$HTTP_POST_VARS['pergunta'];
$bloco=$HTTP_POST_VARS['bloco'];
$id=$HTTP_POST_VARS['idx'];

$data=date("d/m/y  h:i");

//abre conexão com o banco
include "conexao.php";

$alterar = "UPDATE perguntas SET perguntas='$pergunta',bloco='$bloco' WHERE id_pergunta='$id'";
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
echo "<a href=javascript:history(-1)>Voltar</a>";
//echo $$md5f;
?>
