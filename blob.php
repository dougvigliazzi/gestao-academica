<? // conexao com o mysql

//abre conexão com o banco
include "conexao.php";

$fotos="SELECT foto FROM aluno_cad WHERE id = '180'";
$rf=mysql_query($fotos,$conexao);

$totallinhas=mysql_num_rows($resultado);
$cont=1;

while ($reg = mysql_fetch_array($rf)) {
	header("Content-type: image/jpeg");
	echo $reg["foto"];
};

// fecha conexao com o mysql
mysql_close($conexao);

?>
