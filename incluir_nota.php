<html>
<head>
<title> </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<?
//abre conexão com o banco
include "conexao.php";

$sql="select distinct disciplina,docente,id_doc_disc from doc_disc where docente is not null";
$reg_query=mysql_query($sql,$conexao);
?>
<body>
<form method="post" action="inclui_nota.php">
  <table width="770" border="0">
    <tr> 
      <td colspan="2"><div align="center"><font size="4" face="Verdana, Arial, Helvetica, sans-serif"><strong>Cadastrar Disciplinas/ 
          Notas</strong></font></div></td>
    </tr>
    <tr> 
      <td width="180"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Disciplina-Docente</font></strong></td>
      <td><select name="disciplina" id="select2">
          <? while($reg=mysql_fetch_array($reg_query)){; ?>
          <option value="<? echo $reg["disciplina"]; ?>"><? echo $reg["disciplina"]; ?> 
          - <? echo $reg["docente"]; ?></option>
          <? }; 
	   $reg_query=null;
	   $reg=null;
	   mysql_close;
	   ?>
        </select></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">RA</font></strong></td>
      <td><input name="ra" type="text" id="ra" value="" size="10"></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Semestre</font></strong></td>
      <td><select name="semestre" id="semestre">
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
      <td><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Nota</font></strong></td>
      <td><input name="nota" type="text" id="nota" value="" size="5"></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Freq&uuml;&ecirc;ncia</font></strong></td>
      <td><input name="freq" type="text" id="freq" value="" size="5"></td>
    </tr>
    <tr> 
      <td colspan="2"><input type="submit" value="Enviar"></td>
    </tr>
  </table>
</form>
<?
// fecha conexao com o mysql
mysql_close($conexao);
?>
</body>
</html>
