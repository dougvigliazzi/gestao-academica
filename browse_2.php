<html>
<head>
<title>Busca de documento</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<font size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong>Inclusão de 
foto para RA: <? $ra=$_GET["ra"]; echo $ra; ?></strong></font> 
<form action="recebeupload.php" method="post" enctype="multipart/form-data" name="csv">
  <p> 
    <input name="arquivo" type="file" value="Clique em procurar" size="50">
    <input type="hidden" name="escreve">
    <input type="hidden" name="ra" value="<? echo $ra ?>">

    <input name="Enviar" type="submit" value="Enviar">
</form>
</body>
</html>
