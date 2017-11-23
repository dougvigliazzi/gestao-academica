<?php

$disciplina=$_GET["disciplina"];
$disc=$_GET["disc"];
$quem=$_GET["ra"];
$sem=$_GET["sem"];
$nome=$_GET["nome"];

echo "$quem - $disciplina";

//abre conexão com o banco
include "../conexao.php";


$excluir = "DELETE FROM ra_disc WHERE id_doc_disc='$disc' and ra='$quem'";

$excluir_nota = "DELETE FROM notas WHERE disc='$disciplina' and ra='$quem'";

$error=" ";

$sql = mysql_query($excluir) or die ("<h2>Houve erro na exclus&atilde;o dos dados [Disciplina], por favor, clique em voltar e verifique os campos obrigatórios!</h2>");
$sql_nota = mysql_query($excluir_nota) or die ("<h2>Houve erro na exclus&atilde;o dos dados [Nota - ".$disciplina."], por favor, clique em voltar e verifique os campos obrigat&oacute;rios!</h2>");

echo "<h1>Exclusão efetuada com sucesso!</h1>";



// fecha conexao com o mysql
mysql_close($conexao);


echo "<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=matriculado.php?ra=$quem&sem=$sem&nome=$nome'>";

?>
