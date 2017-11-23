<html>
<head>
<title> </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<?
$id_doc=$HTTP_GET_VARS['idx'];

//abre conexão com o banco
include "conexao.php";


$sql="select * from doc_disc where id_doc_disc = '$id_doc'";
$reg_query=mysql_query($sql,$conexao);
?>
<body>
<form method="post" action="alterar_cad_disc_exe.php">
  <table width="770" border="0">
    <tr> 
      <td colspan="4"><div align="center"><font size="4" face="Verdana, Arial, Helvetica, sans-serif"><strong>Alterar 
          Disciplinas</strong></font></div></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Docente</font></strong></td>
      <td colspan="3"> 
        <? while($reg=mysql_fetch_array($reg_query)){; ?>
        <input type="text" name="docente" size="60" value="<? echo $reg["docente"]; ?>"> 
      </td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Disciplina</font></strong></td>
      <td colspan="3"><input name="disciplina" type="text" id="disciplina" value="<? echo $reg["disciplina"]; ?>" size="50"> 
        <input name="id" type="hidden" id="id" value="<? echo $id_doc; ?>"></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Semestre</font></strong></td>
      <td><select name="semestre" id="semestre">
          <option value="<? echo $reg["semestre"]; ?>" name="semestre" selected><? echo $reg["semestre"]; ?></option>
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
      <td><div align="right"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>C&oacute;digo</strong></font></div></td>
      <td><input name="cod_disc" type="text" id="cod_disc" value="<? echo $reg["cod_disc"]; ?>" size="12" maxlength="10"></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Creditos</font></strong></td>
      <td><select name="credito" id="credito">
          <option value="<? echo $reg["creditos"]; ?>"><? echo $reg["creditos"]; ?></option>
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
          <option value="11">11</option>
          <option value="12">12</option>
        </select></td>
      <td><div align="right"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Ativa</strong></font></div></td>
      <td><select name="ativo" id="ativo">
          <option value="<?php echo $reg["ativo"];?>"><?php echo $reg["ativo"];?></option>
          <option value="s">s</option>
          <option value="n">n</option>
        </select></td>
      <? }; 
	   $reg_query=null;
	   $reg=null;
	   // fecha conexao com o mysql
	   mysql_close($conexao);
	   ?>
    </tr>
    <tr> 
      <td colspan="4"><input type="submit" value="Alterar"></td>
    </tr>
  </table>
</form>

</body>
</html>
