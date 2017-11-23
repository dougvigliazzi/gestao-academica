<html>
<head>
<title>Completo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body oncontextmenu="return false" ondragstart="return false" onselectstart="return false" onview="return false">
<?
$disc=$_POST["disciplina"];
$sem=$_POST["semestre"];
$ra=$_POST["ra"];
$freq=$_POST["freq"];
$nota=$_POST["nota"];

//abre conexão com o banco
include "conexao.php";

$hoje = date("d/m/Y - h:i");

$erro = mysql_error();

echo "$disc - $ra - $sem - $nota - $freq";

$incluir="insert into notas(ra,disc,nota,freq,sem,data) values('$ra','$disc','$nota','$freq','$sem','$hoje')";
$sql = mysql_query($incluir) or die ("<h2>Problemas durante a inclusão. $erro</h2>");

echo "<h1>Inclusão efetuada com sucesso!</h1>";
echo "<a href='Javascript:history.go(-1)'><< Voltar</a>";


// fecha conexao com o mysql
mysql_close($conexao);
?>
</body>
</html>
