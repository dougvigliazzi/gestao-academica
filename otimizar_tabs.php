<html>
<body>

<? // conexao com o mysql

//abre conexão com o banco
include "conexao.php";

$consulta="SHOW TABLES IN notas";
$resultado=mysql_query($consulta,$conexao);
$totallinhas=mysql_num_rows($resultado);
$cont=1;

echo "<h1><FONT FACE=ARIAL><center>Otimiza&ccedil;&atilde;o de Tabelas<p>Total de itens <b>$totallinhas</b>.</center></font></h1><p>\n";
?>
<a href="otimizar_todas_tabs_exe.php">Otimizar Todas as Tabelas na BASE Notas</a>
<?
echo "<hr><table>\n";
$ii=0;
while ($reg = mysql_fetch_array($resultado)) {
	echo "<tr  id=linha$ii onMouseOver=\"linha$ii.bgColor='#FFCC66'\" onMouseOut=\"linha$ii.bgColor='#FFFFFF'\" onClick=\"linha$ii.bgColor='#FFCC66'\"><td><a href=otimizar_tabs_exe.php?hash=", session_id() ,"&data=", $data , "&md5=" ,md5('douglas'), "&tabela=",$reg["Tables_in_notas"]," target=_rightMain></i><img src=imagens/otimiza.png width=20 border=0 title=Otimizar></a> </td><td>TABELA: <i>",$reg["Tables_in_notas"]," </i></td></tr>\n";
	$cont = ++$cont;
	$ii++;
};

// fecha conexao com o mysql
mysql_close($conexao);

?>
</table>
</html>
