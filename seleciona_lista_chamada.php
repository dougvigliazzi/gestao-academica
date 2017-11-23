<html>

<? 
//abre conexão com o banco
include "conexao.php";

$consulta="SELECT * FROM doc_disc order by disciplina";
$resultado=mysql_query($consulta,$conexao);
$totallinhas=mysql_num_rows($resultado);
$cont=1;


echo "<FONT FACE=ARIAL><center>Total de itens <b>$totallinhas</b>.</center></font><p>\n";
$ii=0;
echo "<hr><table>\n";
while ($reg = mysql_fetch_array($resultado)) {
	echo "<tr  id=linha$ii onMouseOver=\"linha$ii.bgColor='#FFCC66'\" onMouseOut=\"linha$ii.bgColor='#FFFFFF'\" onClick=\"linha$ii.bgColor='#FFCC66'\"><td><a href=folha_frequencia.php?hash=", session_id() ,"&creditos=",$reg["creditos"],"&data=", $data , "&md5=" ,md5('douglas'), "&id_doc_disc=", $reg["id_doc_disc"] ,"></i><img src=imagens/lista.png width=20 border=0></a> </td><td> Disciplina: <i>",$reg["disciplina"],"</i></td><td> Docente: <i>",$reg["docente"],"</i></td><td><b>",$reg["cod_disc"],"</b></td></tr>\n";
	$cont = ++$cont;
	$ii++;
};

// fecha conexao com o mysql
mysql_close($conexao);

?>
</table>
</html>
