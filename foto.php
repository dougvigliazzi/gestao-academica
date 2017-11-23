<? 
$ra=$_GET["ra"];

//abre conexão com o banco
include "conexao.php";

$qr = "SELECT * FROM aluno_cad WHERE ra = '$ra' ORDER BY ra DESC";
$sql = mysql_query($qr);
$l = mysql_fetch_array($sql);
	$tipo = $l["tipo_foto"];
	header("Content-type: ".$tipo."");
	echo $l["foto"];

// fecha conexao com o mysql
mysql_close($conexao);

?>
