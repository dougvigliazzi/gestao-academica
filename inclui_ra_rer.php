<html>
<head>
<title>Completo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body oncontextmenu="return false" ondragstart="return false" onselectstart="return false" onview="return false">
<?
$ip=$HTTP_SERVER_VARS['REMOTE_ADDR'];
$disc=$_POST["disciplina"];
$ra=$_POST["ra"];


//abre conexão com o banco
include "conexao.php";

$hoje = date("d/m/Y - h:i");

$erro = mysql_error();

//echo "$disc - $ra - $hoje";

$incluir="insert into ra_disc_rer_disp(ra,id_doc_disc,data) values('$ra','$disc','$hoje')";
$sql = mysql_query($incluir,$conexao) or die ("<h2>Problemas durante a inclusão. $erro</h2>");

//inclui log
$incluir_log="INSERT INTO logs(ip,data,acao) values('$ip','$hoje','$incluir')";
$sql_l = mysql_query($incluir_log,$conexao); // or die ($error);

// fecha conexao com o mysql
mysql_close($conexao);

echo "<h1>Inclusão efetuada com sucesso!</h1>";
echo "<a href='Javascript:history.go(-1)'><< Voltar</a>";

?>
</body>
</html>
