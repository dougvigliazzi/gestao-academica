<html>
<head>
<title>Completo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body oncontextmenu="return false" ondragstart="return false" onselectstart="return false" onview="return false">
<?
$perg=$_POST["pergunta"];
$bloco=$_POST["bloco"];

//abre conex�o com o banco
include "conexao.php";

$hoje = date("d/m/Y - h");

$erro = mysql_error();

$incluir="insert into perguntas(perguntas,bloco) values('$perg','$bloco')";
$sql = mysql_query($incluir) or die ("<h2>Voc� j� incluiu este item.</h2>");

echo "<h1>Inclus�o efetuada com sucesso!</h1>";

// fecha conexao com o mysql
mysql_close($conexao);
?>
</body>
</html>
