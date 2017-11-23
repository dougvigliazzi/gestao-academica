<?php echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?".">"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

<body>
<?php 
// variaveis
$campos=$_POST["campos"];
$campos_where =$_POST["campos_where"];
$igual=$_POST["igual"];
$valor_busca=$_POST["valor_busca"];
$tipo=$_POST["tipo"];
$ordenar=$_POST["ordenar"];

$valor_buscado=$valor_busca.$tipo;

echo "$campos_where $igual $valor_buscado";

$criterio=explode(" ",ltrim(rtrim($campos)));
$criterio1=implode(",",$criterio);

include "conexao.php";

$campos="SELECT $criterio1 FROM aluno_escolaridade WHERE $campos_where $igual '$valor_buscado' ORDER BY ra";
$campos_q=mysql_query($campos,$conexao);
echo "<table border=0 cellspacing=1>";
 echo "<tr bgcolor=\"#FFFFCC\" ALIGN=CENTER><td><B>";
 echo $criterio[0]; 
 echo "</td><td> <B>";
 echo $criterio[1];
 echo "</td><td> <B>";
 echo $criterio[2];
 echo "</td><td> <B>";
 echo $criterio[3];
 echo "</td><td> <B>";
 echo $criterio[4];
 echo "</td><td> <B>";
 echo $criterio[5];
 echo "</td><td> <B>";
 echo $criterio[6];
 echo "</td><td> <B>";
 echo $criterio[7];
 echo "</td><td> <B>";
 echo $criterio[8];
 echo "</td><td> <B>";
 echo $criterio[9];
 echo "</td></tr> ";

while($reg=mysql_fetch_array($campos_q)){
 echo "<tr><td>";
 echo $reg[0]; 
 echo "</td><td> ";
 echo $reg[1];
 echo "</td><td> ";
 echo $reg[2];
 echo "</td><td> ";
 echo $reg[3];
 echo "</td><td> ";
 echo $reg[4];
 echo "</td><td> ";
 echo $reg[5];
 echo "</td><td> ";
 echo $reg[6];
 echo "</td><td> ";
 echo $reg[7];
 echo "</td><td> ";
 echo $reg[8];
 echo "</td><td> ";
 echo $reg[9];
 echo "</td></tr> ";
}
echo "</table>";
?>
</body>
</html>
