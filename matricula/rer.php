<html>
<head>
<?
//abre conexão com o banco
include "../conexao.php";


$sql="select disciplina,semestre,id_doc_disc,creditos from doc_disc order by disciplina";
$rslista_query=mysql_query($sql,$conexao);

?>
<title>Sele&ccedil;&atilde;o de disciplinas para RER</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../folha.css" rel="stylesheet" type="text/css">
</head>

<body leftmargin="0" topmargin="0" class="FundoPaginaInterna">
<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>

<p><strong><font size="3" face="Verdana, Arial, Helvetica, sans-serif">Matricular 
  alunos em RER</font></strong> </p>
<form action="incluir_rer_adm.php" method="post" name="rer" id="rer">
  <table width="785" border="0">
    <tr> 
      <td><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">R.A.</font></strong></td>
      <td><input name="ra" type="text" size="10" maxlength="10"></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Disciplina: 
        </font> </strong> </td>
      <td><select name="disc">
          <option value="rer.php" selected>Disciplina - Semestre</option>
          <? while($rslista=mysql_fetch_array($rslista_query)){

?>
          <option value="<?  echo $rslista["id_doc_disc"]; ?>"><? echo $rslista["disciplina"]; ?> 
          - 
          <?   echo $rslista["semestre"]; ?>
          </option>
          <?   } ?>
        </select>
        <input name="creditos" type="hidden" value="<?  echo $rslista["creditos"]; ?>"></td>
    </tr>
    <tr> 
      <td colspan="2"><div align="center">
          <input type="submit" name="Submit" value="Enviar">
        </div></td>
    </tr>
  </table>
  <strong></strong> <strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><br>
  </font></strong> 
</form>
<? 

$rslista=null;

mysql_close($conexao);
$conexao=null;
?>
</body>
</html>
