<html>

<? // conexao com o mysql

//abre conexão com o banco
include "conexao.php";

$consulta="SELECT * FROM controle_ra_mat ORDER BY ra,semestre DESC";
$resultado=mysql_query($consulta,$conexao);
$totallinhas=mysql_num_rows($resultado);
$cont=1;


echo "<FONT FACE=ARIAL><center>Libera&ccedil;&atilde;o de Alunos para Matr&iacute;cula<p>Total de itens <b>$totallinhas</b>.</center></font><p>\n";

echo "<hr><table>\n";
$ii=0;
while ($reg = mysql_fetch_array($resultado)) {
	echo "<tr  id=linha$ii onMouseOver=\"linha$ii.bgColor='#FFCC66'\" onMouseOut=\"linha$ii.bgColor='#FFFFFF'\" onClick=\"linha$ii.bgColor='#FFCC66'\"><td><a href=liberar_mat_exe.php?hash=", session_id() ,"&data=", $data , "&md5=" ,md5('douglas'), "&ra=", $reg["ra"] ," target=_rightMain></i><img src=imagens/button_drop.png width=20 border=0></a> </td><td>DATA: <i>",$reg["data"]," </i>- RA: <b>",$reg["ra"],"</b> Semestre: <b>",$reg["semestre"], "</b></td></tr>\n";
	$cont = ++$cont;
	$ii++;
};

// fecha conexao com o mysql
mysql_close($conexao);

?>
</table>
</html>
