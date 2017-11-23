<html>
<head>
<script language="JavaScript">
<!--
function teste(){
if (document.upload.arquivo.value=="") {
alert("Arquivo para upload não informado!")
document.upload.arquivo.focus()
return false
}
}
//-->
</script>
<title>Gera upload</title></head>
<body><center>
<h2>Upload Simples</h2><br>
  <form name="upload" action="recebeupload.php" method="post" enctype="multipart/form-data" onsubmit="return teste()">
    <input type="file" name="arquivo" size="60">
<br>
<input type="submit" name="enviar" value="Upload!">
</form>
</center>
</body>
</html>

