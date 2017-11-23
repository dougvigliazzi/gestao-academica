<html>
<head>
<title>Completo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body oncontextmenu="return false" ondragstart="return false" onselectstart="return false" onview="return false">
<?
$ip=$HTTP_SERVER_VARS['REMOTE_ADDR'];
$disc=$_POST["disciplina"];
$sem=$_POST["semestre"];
$doc=$_POST["docente"];
$cred=$_POST["credito"];
$tipo=$_POST["tipo"];
$cod_disc=$HTTP_POST_VARS['cod_disc'];
$ativo=$_POST["ativo"];

//abre conexão com o banco
include "conexao.php";


$hoje = date("d/m/Y - h:i");

$erro = mysql_error();

echo "$disc - $docente - $sem - $cred  - $tipo - $hoje";

$incluir="INSERT INTO doc_disc(docente,disciplina,semestre,cod_disc,creditos,tipo,ativo) VALUES('$doc',UCASE('$disc'),'$sem','$cod_disc','$cred','$tipo','$ativo')";
$sql = mysql_query($incluir);// or die ("<h2>Problemas durante a inclusão. $erro</h2>");

$incluir_sub=addslashes($incluir);

$incluir_log="INSERT INTO logs(ip,data,acao) values('$ip','$hoje','$incluir_sub')";
$sql_l = mysql_query($incluir_log,$conexao); // or die ($error);

// fecha conexao com o mysql
//mysql_close($conexao);

echo "<h1>Inclusão efetuada com sucesso!</h1>";
echo "<a href='Javascript:history.go(-1)'><< Voltar</a>";

?>
</body>
</html>
