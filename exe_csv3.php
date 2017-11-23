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


$csv_r="upload/".$csv;
echo "Carregar o aquivo \"";
echo $csv_r; 



?>
</body>
</html>
