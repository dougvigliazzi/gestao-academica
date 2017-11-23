<?php
//abre conexão com o banco
include "conexao.php";

$id = $HTTP_GET_VARS['idx'];

$sql = "SELECT * FROM perguntas WHERE id_pergunta=$id";
$sql_q = mysql_query($sql,$conexao) or die ("<h2>Houve erro na gravação dos dados, por favor, clique em voltar e verifique os campos obrigatórios!</h2>");

?>
<html>
<head>
<title>Aterar Perguntas</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<form method="post" action="alterar_perg_exe.php">
  <p></p><table width="770" border="0">
    <tr> 
      <td colspan="2"><div align="center"><font size="4" face="Verdana, Arial, Helvetica, sans-serif"><strong>Alterar 
          Pergunta</strong></font></div></td>
    </tr>
    <tr> 
      <td>Pergunta</td>
	  <? while($rstemp=mysql_fetch_array($sql_q)){
	  ?>
      <td><textarea name="pergunta" cols="50" rows="3" id="pergunta"><? echo $rstemp["perguntas"];?></textarea></td>
<? }?>
    </tr>
    <tr> 
      <td>Bloco</td>
      <td><select name="bloco" id="bloco">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
        </select></td>
    </tr>
    <tr> 
      <td colspan="2"><input type="hidden" name="idx" value="<? echo $id; ?>"><input type="submit" value="Alterar"></td>
    </tr>
  </table>
</form>
<? 
// fecha conexao com o mysql
mysql_close($conexao);

?>
</body>
</html>
