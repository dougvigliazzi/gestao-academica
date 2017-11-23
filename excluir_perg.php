<html>

<? 
//abre conexão com o banco
include "conexao.php";


$consulta="SELECT * FROM perguntas";
$resultado=mysql_query($consulta,$conexao);
$totallinhas=mysql_num_rows($resultado);
$cont=1;

$periodo[1]="manhã";
$periodo[2]="almoço";
$periodo[4]="tarde";
$periodo[5]="noite";

echo "<FONT FACE=ARIAL><center>Total de itens <b>$totallinhas</b>.</center></font><p>\n";

echo "<hr><table>\n";
while ($reg = mysql_fetch_array($resultado)) {
	echo "<tr><td><a href=excluir_perg_exe.php?hash=", session_id() ,"&data=", $data , "&md5=" ,md5('douglas'), "&idx=", $reg["id_pergunta"] ," target=_parent></i><img src=imagens/button_drop.png width=20 border=0 alt='Excluir Pergunta'></a> </td><td> Pergunta:<i>",$reg["perguntas"],"</i></td></tr>\n";
	$cont = ++$cont;
};

// fecha conexao com o mysql
mysql_close($conexao);

?>
</table>
</html>
