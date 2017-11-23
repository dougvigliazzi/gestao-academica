<html>
<head>
<title>Recebe Upload</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body bgcolor="#FFFFFF" text="#003399">
<?
include "conexao.php";

$ra=$_POST["ra"];
$arq=$HTTP_POST_FILES["arquivo"];
$tamanho=$arq['size'];
echo "<br>nome: ".$arq['name'];
echo "<br>tamanho: ".$arq['size'];
echo "<br>tipo: ".$arq['type'];
echo "<br>diretório temporário: ".$arq['tmp_name'];
echo "<br>erro: ".$arq['error'];
copy($arq['tmp_name'],"fotos/".$arq['name']);
$path="fotos/".$arq['name'];
$abre = fopen($path,"r");
$tipo=$arq['type'];
$le = addslashes(fread(fopen($path,"r"),filesize($path)));
fclose($abre);

echo "<br>Copiado para: $path";

mysql_select_db($notas,$conexao);

$inserir_foto="UPDATE aluno_cad SET foto='$le',tipo_foto='$tipo' where ra = '$ra'";
mysql_query($inserir_foto,$conexao) or die (mysql_error());

?>
</body>
</html>
