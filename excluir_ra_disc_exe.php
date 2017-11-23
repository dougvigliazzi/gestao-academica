<?php
$ip=$HTTP_SERVER_VARS['REMOTE_ADDR'];
$data=date("d/m/y  h:i");

$conexao=mysql_connect("localhost","root","") or die ("Configuração de Banco de Dados Errada!");
$db = mysql_select_db("notas",$conexao) or die ("Banco de Dados Inexistente!");

$excluir = "DELETE FROM ra_disc WHERE id='$_GET[id]'";
$error=mysql_error();
$sql = mysql_query($excluir) or die ("<h2>Houve erro na gravação dos dados, por favor, clique em voltar e verifique os campos obrigatórios!</h2>");

echo "<h1>Exclus&atilde;o efetuada com sucesso!</h1>";
echo "$data -- Ação:<b> $excluir </b>|| IP: <b>$ip </b><p>";

$excluir_sub=addslashes($excluir);

$incluir="INSERT INTO logs(ip,data,acao) values('$ip','$data','$excluir_sub')";
$sql2 = mysql_query($incluir,$conexao);// or die ($error);

// fecha conexao com o mysql
mysql_close($conexao);
$md5f=md5('douglas');
echo "<a href=javascript:history.go(-1)>Voltar</a>";
//echo $$md5f;
?>
