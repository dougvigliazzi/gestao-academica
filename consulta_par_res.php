<?php echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?".">"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

<body>
<?php 
// variaveis recebidas de lista_campos.php
$campos=$_POST["campos"];
$campos_where =$_POST["campos_where"];
$igual=$_POST["igual"];
$valor_busca=$_POST["valor_busca"];
$tipo=$_POST["tipo"];
$ordenar=$_POST["ordenar"];

$valor_buscado=$valor_busca.$tipo;

//verificacao de criterios LIKE
if($igual==1){
   $igual = "LIKE '";
}else if($igual==2){
   $igual = "LIKE '%";
}else{
   $igual;
}

echo "Termo procurado: <b>$valor_busca</b>";

$criterio=explode(" ",ltrim(rtrim($campos)));
$criterio1=implode(",",$criterio);

$contar = 0;
$i = 1;
$cols=0;

echo $conta;

include "conexao.php";

$campos="SELECT $criterio1 FROM aluno_cad WHERE $campos_where $igual$valor_buscado' ORDER BY 1";
$campos_q=mysql_query($campos,$conexao);

foreach($criterio as $conta){
  $contar = $contar + 1;
}
 echo "<table border=1 cellspacing=1>";

 echo "<tr bgcolor=\"#FFFFCC\" ALIGN=CENTER>";
for($cols = 0; $cols < $contar; $cols++){
 echo "<td>";
 echo $criterio[$cols];
 echo "</td>";
}
 echo "</tr> ";


while($reg=mysql_fetch_array($campos_q)){
   if($i %2){
	echo "<tr bgcolor=\"#6699CC\">";
   	for($cols = 0; $cols < $contar; $cols++){
 	  echo "<td><font color=WHITE>";
	  echo str_replace('**','<b>',str_replace('***','</b>',str_replace('+','<br>',str_replace('~','<p>',$reg[$cols])))); 
	  echo "</td> ";
	}
	echo "</tr> ";
   }else{
	echo "<tr>";
   	for($cols = 0; $cols < $contar; $cols++){
	  echo "<td>";
	  echo str_replace('**','<b>',str_replace('***','</b>',str_replace('+','<br>',str_replace('~','<p>',$reg[$cols])))); 
	  echo "</td>";
	}
	echo "</tr> ";
   }
   $i++;
   echo "</tr> ";
}
echo "</table>";
?>
</body>
</html>
