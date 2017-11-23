<html>
<head>
<title>Recebe Upload</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body bgcolor="#FFFFFF">
<strong><font size="4" face="Verdana, Arial, Helvetica, sans-serif">Confirmação 
de dados:</font></strong> <p></p><FONT color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
<?
$ip=$HTTP_SERVER_VARS['REMOTE_ADDR'];

$tabela=$HTTP_POST_VARS["tabela"];
$arq=$HTTP_POST_FILES["arquivo_csv"];
$datahora=date("d/m/Y - h:i:s");";

echo "<br><B>Arquivo:</B> ".$arq['name'];
echo "<br><B>Tamanho:</B> ".$arq['size'];
echo "<br><B>Tipo:</B> ".$arq['type'];
echo "<br><B>Diretório temporário:</B> ".$arq['tmp_name'];
echo "<br><B>Erro:</B> ".$arq['error'];
echo "<br><B>Data/hora:</B> $datahora -- <B>IP:</B> $ip";
copy($arq['tmp_name'],"upload/".$arq['name']);

//$csv=$HTTP_POST_VARS["escreve"];


?>
<form action="exe_csv2.php" method="post">
  <input name="arquivo" type="hidden" value="<? echo $arq['name']; ?>">
  <input name="tabela" type="hidden" value="<? echo $tabela; ?>">
  <input name="datahora" type="hidden" value="<? echo $datahora; ?>"><p></p>
  <input type="submit" value="CONFIRMAR INCLUS&Atilde;O">
</form>
</FONT> 
</body>
</html>
