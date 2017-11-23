<?php

$disciplina=$_GET["disciplina"];
$disc=$_GET["disc"];
$quem=$_GET["ra"];
$sem=$_GET["sem"];
$nome=$_GET["nome"];

echo "$quem - $disc";
$conexao=mysql_connect("localhost","root","") or die ("Configura&ccedil;&atilde;o de Banco de Dados Errada!");

$db = mysql_select_db("notas",$conexao) or die ("Banco de Dados Inexistente!");

$excluir = "DELETE FROM ra_disc_rer WHERE id_doc_disc='$disc' and ra='$quem'";

$excluir_nota = "DELETE FROM notas WHERE disc='$disciplina' and ra='$quem'";

$error=" ";

$sql = mysql_query($excluir) or die ("<h2>Houve erro na exclus&atilde;o dos dados [Disciplina], por favor, clique em voltar e verifique os campos obrigatórios!</h2>");
$sql_nota = mysql_query($excluir_nota) or die ("<h2>Houve erro na exclus&atilde;o dos dados [Nota], por favor, clique em voltar e verifique os campos obrigat&oacute;rios!</h2>");


echo "<h1>Exclus&atilde;o efetuada com sucesso!</h1>";

// fecha conexao com o mysql
mysql_close($conexao);
$md5f=md5('douglas');
//echo "<a href=javascript:window.close()>Fechar</a>";


echo "<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=matriculado.php?ra=$quem&sem=$sem&nome=$nome'>";
 ?>
