<html>
<head>
<title>ATUALIZA&Ccedil;&Atilde;O DO SISTEMA</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?
$ip=$HTTP_SERVER_VARS['REMOTE_ADDR']; 
$tabela=$HTTP_POST_VARS["tabela"];
$csv=$HTTP_POST_VARS["arquivo"];
$data=date("d/m/Y H:i:s");
$ascii="\\";


$csv_r="/export/www_root/bio/avaliardocente/rootz/upload/".$csv;
echo "Carregar o aquivo \"";
echo $csv_r; 
echo "\"";
echo " para a tabela: "; echo $tabela;echo " <b>";

//abre conexão com o banco
include "conexao.php";


$sql="load data infile '$csv_r' into table $tabela fields terminated by ';' lines terminated by '\r\n'";
mysql_query($sql,$conexao) or die(mysql_error());

echo "<p>";
$sql2="INSERT INTO registro_acesso (ip,data,tabela) VALUES ('$ip','$data','$tabela')";
mysql_query($sql2) or die(mysql_error());

echo "</b>";

mysql_close($conexao);
?>
</body>
</html>
