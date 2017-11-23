<html>

<? // conexao com o mysql
//abre conexão com o banco
include "conexao.php";

$consulta="SELECT * FROM tabagenda order by anopara desc";
$resultado=mysql_query($consulta,$conexao);
$totallinhas=mysql_num_rows($resultado);
$cont=1;


echo "<FONT FACE=ARIAL><center>Total de itens <b>$totallinhas</b>.</center></font><p>\n";

echo "<hr>\n";
	echo "<form action=excluir_reuniao_exe.php method=post> <font size=2 face=arial>";
while ($linha = mysql_fetch_array($resultado)) {
	echo "<b>Agendamentos</b>:  <input type=checkbox name=n_agenda value=", $linha["id"], "> Ano:<i>",$linha["anopara"],"</i><b> Equipamento:</b><i> ",$linha["equipamento"],"</i><b> Para:</b><i>  ",$linha["requisitante"],"</i><b> Data:</b><i>  ",$linha["diapara"],"/",$linha["mespara"]," </i> <b>Período:</b><i>  ",$linha["codhorapara"],"</i>
	<a href="excluir_reunioes.php?hash=<? echo session_id(); ?>&data=<? echo $data; ?>]&md5=<? echo md5; ?>&action=<? echo $excluir; ?>"><img src="imagens/button_drop.png" width="20" border="0"></a>  
	<br>\n";
	$cont = ++$cont;
};
$excluir = "DELETE FROM tabagenda WHERE id_reuniao='$HTTP_POST_VARS[n_agenda]'";

// fecha conexao com o mysql
mysql_close($conexao);

?>

</html>
