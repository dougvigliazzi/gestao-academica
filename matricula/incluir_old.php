<html>
<head>
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<? 
$disc=$HTTP_GET_VARS["disc"];
$disciplina=$HTTP_GET_VARS["disciplina"];
$ra=$HTTP_GET_VARS["ra"];
$cred=$HTTP_GET_VARS["credito"];
$sem=$HTTP_GET_VARS["sem"];

//abre conexão com o banco
include "../conexao.php";


$hoje = date("d/m/Y - h:i");
$mensagem="<p>&nbsp;<p><font size='3' face='Verdana, Arial, Helvetica, sans-serif' color=red><B><center>Você já se matriculou nesta disciplina! <br>Selecione outra Disciplina $error</center></b></font>";
$mensagem2="<p>&nbsp;<p><font size='3' face='Verdana, Arial, Helvetica, sans-serif' color=red><B><center>Não é possível se matricular pois já está com o número máximo de créditos <br>ou irá exceder a quantidade de créditos! </center></b></font>";
$mensagem3="<p>&nbsp;<p><font size='3' face='Verdana, Arial, Helvetica, sans-serif' color=red><B><center>Matricula efetuada com sucesso!<br>AGUARDE!</center></b></font>";

$soma="select sum(creditos) from ra_disc where ra = '$ra' and semestre = '$sem'";
$rs_soma=mysql_query($soma,$conexao);
$tsoma=mysql_result($rs_soma,0);

$mais_q=$tsoma+$cred;

if($tsoma>=40||$mais_q>40){
	echo $mensagem2;
}else{

//incuir registros
$incluir="insert into ra_disc(ra,id_doc_disc,creditos,semestre,data) values('$ra','$disc','$cred','$sem','$hoje')";
$sql = mysql_query($incluir) or die ($mensagem);

$incluir_nota="insert into notas(ra,disc,sem,data) values('$ra','$disciplina','$sem','$hoje')";
$sql_nota = mysql_query($incluir_nota) or die ($mensagem);


echo $mensagem3;
echo "<meta HTTP-EQUIV='Refresh' CONTENT='3;URL=matriculado.php?ra=$ra&sem=$sem'>";
}

// fim matricula


echo "<meta HTTP-EQUIV='Refresh' CONTENT='3;URL=matriculado.php?ra=$ra&sem=$sem'>";
 
?>

</head>
<body>
</body>
</html>
