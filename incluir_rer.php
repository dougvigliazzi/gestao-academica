<html>
<head>
<title>Inclus&atilde;o de RER</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<?
//abre conexão com o banco
include "conexao.php";

$sql="select distinct disciplina,docente,id_doc_disc from doc_disc where docente is not null";
$reg_query=mysql_query($sql,$conexao);
?>
<body>
<form method="post" action="inclui_ra_rer.php">
  <table width="770" border="0">
    <tr> 
      <td colspan="2"><div align="center"><font size="4" face="Verdana, Arial, Helvetica, sans-serif"><strong>Incluir 
          Disciplinas em RER</strong></font></div></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">RA</font></strong></td>
      <td><input name="ra" type="text" id="ra" value="" size="10"></td>
    </tr>
    <tr> 
      <td><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Disciplina</font></strong></td>
      <td> 
        <select name="disciplina" id="select2">
          <? while($reg=mysql_fetch_array($reg_query)){; ?>
          <option value="<? echo $reg["id_doc_disc"]; ?>"><? echo $reg["disciplina"]; ?> - <? echo $reg["docente"]; ?></option>
          <? }; 
	   $reg_query=null;
	   $reg=null;
	   mysql_close($conexao);
	   ?>
        </select><input name="semestre" type="hidden" id="semestre" value="0">
      </td>
    </tr>
   
      <td colspan="2"><input type="submit" value="Enviar"></td>
    </tr>
  </table>
</form>

</body>
</html>
