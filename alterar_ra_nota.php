<html>
<head>
<title> </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>
<?
$ra=$HTTP_GET_VARS['ra'];

//abre conexão com o banco
include "conexao.php";


$sql="select DISTINCT dd.disciplina,rd.ra,rd.nota,rd.freq,rd.situacao,rd.semestre,rd.id from ra_disc rd inner join doc_disc dd on rd.id_doc_disc=dd.id_doc_disc where rd.ra = '$ra' order by rd.semestre DESC";
$reg_query=mysql_query($sql,$conexao);
?>
<body>
  
<table width="770" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td colspan="8"><div align="center"><font size="4" face="Verdana, Arial, Helvetica, sans-serif"><strong>[ Alterar 
        Notas ]</strong></font></div></td>
  </tr>
  <tr bgcolor="#6699FF"> 
    <td><strong><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">RA</font></strong></td>
    <td><strong><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Disciplina</font></strong></td>
    <td><strong><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Nota</font></strong></td>
    <td><strong><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Freq&uuml;&ecirc;ncia</font></strong></td>
    <td><strong><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Situa&ccedil;&atilde;o</font></strong></td>
    <td><strong><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Semestre</font></strong></td>
    <td colspan="2"><font color="#FFFFFF">&nbsp;</font></td>
  </tr>
  <? 
$ii=0;
while($reg=mysql_fetch_array($reg_query)){; 
?>
  <form method="post" action="alterar_ra_nota_exe.php">
    <tr id="linha<? echo $ii; ?>" onMouseOver="linha<? echo $ii; ?>.bgColor='#FFCC66'" onMouseOut="linha<? echo $ii; ?>.bgColor='#FFFFFF'" onClick="linha<? echo $ii; ?>.bgColor='#FFCC66'"> 
      <td><strong>
        <input type="hidden" name="id" value="<? echo $reg["id"]; ?>">
        <? echo $reg["ra"]; ?></strong></td>
      <td> <? echo strtoupper($reg["disciplina"]); ?> </td>
      <td><input name="nota" type="text" id="nota" value="<? echo $reg["nota"]; ?>" size="5"></td>
      <td><input name="falta" type="text" id="frequencia" value="<? echo $reg["freq"]; ?>" size="5"></td>
      <td><input name="situacao" type="text" id="situacao" value="<? echo $reg["situacao"]; ?>" size="5"></td>
      <td><input name="sem" type="text" id="situacao" value="<? echo $reg["semestre"]; ?>" size="5"></td>
      <td> <input type="submit" value="Alterar"> </td>
      <td><a href="excluir_ra_disc_exe.php?id=<? echo $reg["id"]; ?>"><img src="imagens/button_drop.png" width=20 border=0 alt="Excluir Disciplina"></a></td>
    </tr>
  </form>
  <? 
	$ii++;
}; 
$reg_query=null;
$reg=null;

// fecha conexao com o mysql
mysql_close($conexao);
?>
</table>
  
</body>
</html>
