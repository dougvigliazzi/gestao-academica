<html>
<head>
<? 
$disc=$HTTP_GET_VARS["disc"];
$ra=$HTTP_GET_VARS["ra"];
$quem=$HTTP_GET_VARS["quem"];
$sem=$HTTP_GET_VARS["sem"];
$nome=$HTTP_GET_VARS["nome"];
$nome_s=$nome;
$SID=session_id();

$nome=$HTTP_SESSION_VARS["nome"];

//abre conexão com o banco
include "../conexao.php";


$hoje = date("d/m/Y - h:i");

?>

<title>Disciplinas matriculadas</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?
//seleciona registros
$sqltemp="select * from ra_disc inner join doc_disc on ra_disc.id_doc_disc=doc_disc.id_doc_disc where ra = '$ra' and ra_disc.semestre = '$sem' order by disciplina";
$rstemp_query=mysql_query($sqltemp,$conexao);
$totalreg=mysql_num_rows($rstemp_query);


$sql_rer="select * from ra_disc_rer inner join doc_disc on ra_disc_rer.id_doc_disc=doc_disc.id_doc_disc where ra = '$ra' and ra_disc_rer.semestre = '$sem' order by disciplina";
$rs_rer_query=mysql_query($sql_rer,$conexao);
$totalreg_rer=mysql_num_rows($rs_rer_query);

$soma="select sum(creditos) from ra_disc where ra ='$ra' and semestre = '$sem'";
$rs_soma=mysql_query($soma,$conexao);
$tsoma=mysql_result($rs_soma,0);

?>
<table width="100%" border="0">
  <tr> 
    <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong> 
      <div align="center">Disciplinas matriculadas para o [<font color="#0066CC"> 
        R.A. 
        <?   echo $ra ; echo $nome;?>
        </font>] </div>
      </strong></font> <table width="100%" border="1" cellpadding="1" cellspacing="0" bordercolor="#000000">
        <tr bgcolor="#CCCCCC"> 
          <td> <div align="left"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Disciplinas 
              e N&ordm; Total de disciplinas escolhidas: [ 
              <?   echo $totalreg ; ?>
              ] </strong></font></div>
            <div align="center"></div></td>
          <td width="10%" colspan="2"> <div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
              <strong>Cr&eacute;d:</strong> </font></div></td>
        </tr>
        <tr> 
          <td><div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Total 
              de cr&eacute;ditos: </font></strong></div></td>
          <td colspan="2"><div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
              <?  echo $tsoma; ?>
              </font></strong> </div></td>
        </tr>
        <? 
				//escreve os registros selecionados
	   			while($rstemp=mysql_fetch_array($rstemp_query) ){
				$id=$rstemp["id_doc_disc"];
				?>
        <tr> 
          <td> <div align="left"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"></font></div>
            <font size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo strtoupper($rstemp["disciplina"]); ?></strong></font></td>
          <td width="5%"> <div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><b> 
              <? echo $rstemp["creditos"]; ?></b></font><br>
            </div></td>
          <td width="5%"><a href="excluir_exe.php?ra=<? echo $ra;?>&disciplina=<? echo $rstemp["disciplina"]; ?>&disc=<? echo $id;?>&sem=<? echo $sem;?>&nome=<? echo $nome_s;?>"><img src="imagens/x.gif" width="19" height="19" border="0" title="Apagar" alt="Remover"></a></td>
          <? }  
		$rstemp=null;

?>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td height="10">&nbsp;</td>
  </tr>
  <tr>
    <td><table width="100%" border="1" cellpadding="1" cellspacing="0" bordercolor="#000000">
        <tr bgcolor="#CCCCCC"> 
          <td> <div align="left"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Disciplinas 
              RER e N&ordm; Total de disciplinas: [ 
              <?   echo $totalreg_rer ; ?>
              ] </strong></font></div>
            <div align="center"></div></td>
          <td width="10%"> <div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
              <strong>Cr&eacute;d:</strong> </font></div></td>
        </tr>
        <? 
				//escreve os registros selecionados
	   			while($rs_rer=mysql_fetch_array($rs_rer_query) ){
				$idr=$rs_rer["id_doc_disc"];
				$dsc=$rs_rer["disciplina"]; 
				?>
        <tr> 
          <td> <div align="left"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"></font></div>
            <font size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo strtoupper($rs_rer["disciplina"]); ?></strong></font></td>
          <td> <div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><b> 
              </b></font></div>
            <div align="center"><a href="excluir_rer_exe.php?ra=<? echo $ra;?>&disciplina=<? echo $dsc; ?>&disc=<? echo $idr;?>&sem=<? echo $sem;?>&nome=<? echo $nome_s;?>"><img src="imagens/x.gif" width="19" height="19" border="0" title="Apagar" alt="Remover"></a></div></td>
          <? }  
		$rs_rer=null;

		mysql_close($conexao);
		$conexao=null;


?>
        </tr>
      </table></td>
  </tr>
</table>
<tr> 
              
  <td>&nbsp; </td>
</tr>
<div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong></table> 

  <a href="finaliza.php?ra=<? echo $ra; ?>&sem=<? echo $sem; ?>&nome=<? echo $nome_s;?>">Concluir</a> </strong></font> </div>

</body>
</html>
