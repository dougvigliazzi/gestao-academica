<?php

//abre conex�o com o banco
include "conexao.php";

$excluir = "DELETE FROM perguntas WHERE id='$_GET[id_pergunta]'";
$error=mysql_error;
$sql = mysql_query($excluir) or die ("<h2>Houve erro na grava��o dos dados, por favor, clique em voltar e verifique os campos obrigat�rios!</h2>");

echo "<h1>Exclus�o efetuada com sucesso!</h1>";


// fecha conexao com o mysql
mysql_close($conexao);

$md5f=md5('douglas');
echo "<a href=javascript:window.close()>Fechar</a>";
//echo $$md5f;
?>
