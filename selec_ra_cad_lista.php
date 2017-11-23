<html>

<? // conexao com o mysql

//abre conexão com o banco
include "conexao.php";


$consulta="SELECT * FROM aluno_cad ORDER BY ra DESC";
$resultado=mysql_query($consulta,$conexao);
$totallinhas=mysql_num_rows($resultado);
$cont=1;

echo "<h1><FONT FACE=ARIAL><center>Selecione um dos <b>$totallinhas</b> Alunos.</center></font></h1>\n";
echo "<FONT FACE=ARIAL><center>Alunos Ordenados pelo RA em ordem Decrescente.</center></font>\n";

echo "<hr><table>\n";
while ($reg = mysql_fetch_array($resultado)) {
if($reg["foto"]==NULL || $reg["foto"]=""){
	echo "<tr><td valign=center><a href=alterar_cad_aluno.php?hash=", session_id() ,"&data=", $data , "&md5=" ,md5('douglas'), "&ra=", $reg["ra"] ,"></i><img src=imagens/button_edit.png width=20 border=0 title=\"Alterar\" alt=\"Alterar\"></a> </td><td width=\"15%\"><b> RA: </b><i>",$reg["ra"],"</i></td><td> <b>Nome: </b><i>",$reg["nome"],"</i></td><td width=\"55\"><a href=\"browse_2.php?ra=".$reg["ra"]."\"><img src=\"imagens/semfoto.jpg\" width=50 bordercolor=\"black\" border=1></a></td></tr>\n";
	$cont = ++$cont;
}else{
	echo "<tr><td valign=center><a href=alterar_cad_aluno.php?hash=", session_id() ,"&data=", $data , "&md5=" ,md5('douglas'), "&ra=", $reg["ra"] ,"></i><img src=imagens/button_edit.png width=20 border=0 title=\"Alterar\" alt=\"Alterar\"></a> </td><td width=\"15%\"><b> RA: </b><i>",$reg["ra"],"</i></td><td> <b>Nome: </b><i>",$reg["nome"],"</i></td><td width=\"55\"><a href=\"browse_2.php?ra=".$reg["ra"]."\"><img src=\"foto.php?ra=".$reg["ra"]."\" width=50 bordercolor=\"black\" border=1></a></td></tr>\n";
	$cont = ++$cont;
}
};

// fecha conexao com o mysql
mysql_close($conexao);

?>
</table>
</html>
