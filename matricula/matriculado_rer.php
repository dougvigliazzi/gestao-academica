<html>
<head>
<? 
$disc=$HTTP_GET_VARS["disc"];
$ra=$HTTP_GET_VARS["ra"];

//abre conexão com o banco
include "../conexao.php";


$hoje = date("d/m/Y - h:i");

?>

<title>Disciplinas matriculadas</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../folha.css" rel="stylesheet" type="text/css">
</head>

<body leftmargin="0" topmargin="0" class="FundoPaginaInterna">
<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>

<?
//seleciona registros
$sql_rer="select * from ra_disc_rer_disp inner join doc_disc on ra_disc_rer_disp.id_doc_disc=doc_disc.id_doc_disc where ra = '$ra' order by disciplina";
$rs_rer_query=mysql_query($sql_rer,$conexao);
$totalreg_rer=mysql_num_rows($rs_rer_query);

?>
<table width="785" border="0">
  <tr> 
    <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong> 
      <div align="center">Disciplinas matriculadas para o [<font color="#0066CC"> 
        R.A. 
        <?   echo $ra ; ?>
        </font>] </div>
      </strong></font> </td>
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
				?>
        <tr> 
          <td> <div align="left"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"></font></div>
            <font size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $rs_rer["disciplina"]; ?></strong></font></td>
          <td> <div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><b> 
              </b></font></div>
            <div align="center"><a href="excluir_rer_exe.php?ra=<? echo $ra;?>&disciplina=<? echo $idr;?>"><img src="imagens/x.gif" width="19" height="19" border="0"></a></div></td>
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
<div align="left"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong></table> 
  <a href="javascript:history.go(-1)">Voltar</a> </strong></font> </div>
</body>
</html>
