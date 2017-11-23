<html>
<head>
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?
//abre conexão com o banco
include "conexao.php";

$cons_perg="select * from controle_ra inner join aluno on controle_ra.ra=aluno.ra";
$consulta=mysql_query($cons_perg,$conexao);
$a=1;

echo "<h1>Alunos habilitados para Rematrícula</h1>";

while($registro=mysql_fetch_array($consulta)){
	echo "$a: <b>";
	echo $registro["ra"];
	echo "</b>";	
	echo " - ";
	echo $registro["nome"];
	echo " <B> => [STATUS: OK]</B> <br> ";
	$a++;
}

// fecha conexao com o mysql
mysql_close($conexao);
?>
</body>
</html>
