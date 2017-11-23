<html>
<head>
<title> </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<?
$conntemp=mysql_connect("localhost","root","");
mysql_select_db("notas",$conntemp);
$sql="select distinct docente from doc_disc where docente is not null";
$reg_query=mysql_query($sql,$conntemp);
?>
<body>
<form method="post" action="inclui_aluno_exe.php">
  <table width="770" border="0">
    <tr> 
      <td colspan="2"><div align="center"><font size="4" face="Verdana, Arial, Helvetica, sans-serif"><strong>Cadastrar 
          Novo Aluno</strong></font></div></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">RA</font></strong></td>
      <td><input name="ra" type="text" id="ra" size="12" maxlength="8"></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Nome</font></strong></td>
      <td><input name="nome" type="text" size="70"></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Senha</font></strong></td>
      <td><input name="senha" type="text" id="senha" value="12345" size="8"></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Semestre</font></strong></td>
      <td><select name="semestre" id="semestre">
          <option value="1" selected>1</option>
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
      <td colspan="2"><div align="right">
          <input type="submit" value="Cadastrar">
        </div></td>
    </tr>
  </table>
</form>
</body>
</html>
