<?php echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?".">"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<SCRIPT LANGUAGE="JavaScript">

oldvalue = "";
function passText(passedvalue) {
  if (passedvalue != "") {
    var totalvalue = oldvalue+" "+passedvalue;
    document.displayform.campos.value = totalvalue;
    oldvalue = document.displayform.campos.value;
  }
}

oldvalue_w = "";
function passWhere(passedvalue_w) {
  if (passedvalue_w != "") {
    var totalvalue_w = passedvalue_w;
    document.displayform.campos_where.value = totalvalue_w;
    oldvalue_w = document.displayform.campos_where.value;
  }
}

//  End -->
</script>

<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<?php 
include "conexao.php";

$campos="SHOW FIELDS FROM aluno_cad";
$campos_q=mysql_query($campos,$conexao);

?>

<form name="selectform">
  <font face="Arial, Helvetica, Sans Serif" size="3"><b>Selecione os campos:</b></font><br>
  <select name="dropdownbox" size=1>
<?php 
while($reg=mysql_fetch_array($campos_q)){
?>
    <option value="<?php echo $reg["Field"]; ?>"><?php echo $reg["Field"]; ?></option>
<?php 
}
?>
  </select>
  <input type=button value="Inserir em LISTA" onClick="passText(this.form.dropdownbox.options[this.form.dropdownbox.selectedIndex].value);">
  <input name="button" type="button" value="Inserir em ONDE" onclick="passWhere(this.form.dropdownbox.options[this.form.dropdownbox.selectedIndex].value);" />
  <br />
  <font color="#FF0000" size="2" face="Verdana, Arial, Helvetica, sans-serif">selecione 
  at&eacute; 10 campos para inserir na LISTA</font> 
</form>

<form action="consulta_par_res.php" method="post" name="displayform" >
  <font face="Arial, Helvetica, Sans Serif" size="3"><b>LISTA de campos selecionados 
  para relat&oacute;rio:</b></font><br>
  <textarea cols="40" rows="5" name="campos"></textarea>
  <br />
  <strong><font size="3" face="Verdana, Arial, Helvetica, sans-serif"><br />
  CONDI&Ccedil;&Otilde;ES:</font></strong><br />
  <strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">ONDE</font></strong>: 
  <input name="campos_where" type="text" value="" size="20">
  <select name="igual" id="igual">
    <option value="=" selected>IGUAL</option>
    <option value="&lt;&gt;">DIFERENTE</option>
    <option value="&gt;">MAIOR</option>
    <option value="&gt;=">MAIOR OU IGUAL</option>
    <option value="&lt;">MENOR</option>
    <option value="&lt;=">MENOR OU IGUAL</option>
    <option value="1">COME&Ccedil;ANDO COM</option>
    <option value="2">CONTENDO</option>
  </select>
  <input name="valor_busca" type="text" id="valor_busca" size="30" />
  <select name="tipo" id="tipo">
    <option selected="selected">EXATA</option>
    <option value="%">APROXIMADA</option>
  </select>
  <br />
  <input type="submit" name="Submit" value="Enviar" />
</form>

<?php 
$reg=null;
mysql_close($conexao);
?>

</body>
</html>
