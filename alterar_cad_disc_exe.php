<?php
$ip=$HTTP_SERVER_VARS['REMOTE_ADDR'];
$docente=$HTTP_POST_VARS['docente'];
$disciplina=$HTTP_POST_VARS['disciplina'];
$creditos=$HTTP_POST_VARS['credito'];
$id=$HTTP_POST_VARS['id'];
$semestre=$HTTP_POST_VARS['semestre'];
$cod_disc=$HTTP_POST_VARS['cod_disc'];
$ativo=$HTTP_POST_VARS["ativo"];

$data=date("d/m/y  h:i");

//abre conexão com o banco
include "conexao.php";

$alterar = "UPDATE doc_disc SET docente='$docente',disciplina='$disciplina',semestre='$semestre',creditos='$creditos',cod_disc='$cod_disc',ativo='$ativo' WHERE id_doc_disc='$id'";
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
