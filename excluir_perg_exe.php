<?php
$ip=$HTTP_SERVER_VARS['REMOTE_ADDR'];
$data=date("d/m/y  h:i");

//abre conexão com o banco
include "conexao.php";
$excluir = "DELETE FROM perguntas WHERE id_pergunta='$_GET[idx]'";
$error=mysql_error();
$sql = mysql_query($excluir) or die ("<h2>Houve erro na gravação dos dados, por favor, clique em voltar e verifique os campos obrigatórios!</h2>");

echo "<h1>Exclus&atilde;o efetuada com sucesso!</h1>";
echo "$data -- Ação:<b> $excluir </b>|| IP: <b>$ip </b><p>";

$incluir_sub=addslashes($excluir);

$incluir="INSERT INTO logs(ip,data,acao) values('$ip','$data','$incluir_sub')";
$sql2 = mysql_query($incluir) or die ($error);

// fecha conexao com o mysql
mysql_close($conexao);

$md5f=md5('douglas');
echo "<a href=javascript:window.close()>Fechar</a>";
//echo $$md5f;
?>
