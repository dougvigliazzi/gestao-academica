<html>

<? // conexao com o mysql

//abre conexão com o banco
include "conexao.php";


$consulta="SELECT * FROM aluno ORDER BY ra DESC";
$resultado=mysql_query($consulta,$conexao);
$totallinhas=mysql_num_rows($resultado);
$cont=1;


echo "<h1><FONT FACE=ARIAL><center>Selecione um dos <b>$totallinhas</b> Alunos.</center></font></h1>\n";
echo "<FONT FACE=ARIAL><center>Alunos Ordenados pelo RA em ordem Decrescente.</center></font>\n";

echo "<hr><table>\n";
while ($reg = mysql_fetch_array($resultado)) {
	echo "<tr><td><a href=alterar_ra_nota.php?hash=", session_id() ,"&data=", $data , "&md5=" ,md5('douglas'), "&ra=", $reg["ra"] ,"></i><img src=imagens/button_edit.png width=20 border=0></a> </td><td><b> RA: </b><i>",$reg["ra"],"</i></td><td> <b>Nome: </b><i>",$reg["nome"],"</i></td></tr>\n";
	$cont = ++$cont;
};

// fecha conexao com o mysql
mysql_close($conexao);

?>
</table>
</html>
