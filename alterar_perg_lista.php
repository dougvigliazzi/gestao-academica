<html>

<? // conexao com o mysql

//abre conexão com o banco
include "conexao.php";


$consulta="SELECT * FROM perguntas";
$resultado=mysql_query($consulta,$conexao);
$totallinhas=mysql_num_rows($resultado);
$cont=1;


echo "<FONT FACE=ARIAL><center>Total de itens <b>$totallinhas</b>.</center></font><p>\n";

echo "<hr><table>\n";
while ($reg = mysql_fetch_array($resultado)) {
	echo "<tr><td><a href=alt_perguntas.php?hash=", session_id() ,"&data=", $data , "&md5=" ,md5('douglas'), "&idx=", $reg["id_pergunta"] ,"></i><img src=imagens/button_edit.png width=20 border=0></a> </td><td> Pergunta:<i>",$reg["perguntas"],"</i></td></tr>\n";
	$cont = ++$cont;
};

// fecha conexao com o mysql
mysql_close($conexao);

?>
</table>
</html>
