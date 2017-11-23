<html>
<head>
<title>Recebe Upload</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body bgcolor="#FFFFFF" text="#003399">
<?

$tabela=$HTTP_POST_VARS["tabela"];
$csv=$HTTP_POST_VARS["escreve"];

$csv_r="/export/www_root/html/alunos/upload/".$csv;
echo "Carregar o aquivo<b> \"";
echo $csv_r; 
echo "\"</b>";
echo " para a tabela:<b> "; echo $tabela;echo " </b>";


//$arq=$HTTP_POST_FILES["arquivo"];
$arq=$csv;
echo "<br>nome: ".$arq['name'];
echo "<br>tamanho: ".$arq['size'];
echo "<br>tipo: ".$arq['type'];
echo "<br>diretório temporário: ".$arq['tmp_name'];
echo "<br>erro: ".$arq['error'];
copy($arq['tmp_name'],"upload/".$arq['name']);


//abre conexão com o banco
$conntemp=mysql_connect("localhost","root","");
mysql_select_db("notas",$conntemp);

$sql="load data infile '$csv_r' into table $tabela fields terminated by ';' lines terminated by '\r\n'";
mysql_query($sql,$conntemp) or die(mysql_error());
echo "</b>";

?>
</body>
</html>
