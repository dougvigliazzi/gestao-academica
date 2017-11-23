<html>
<head>
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">



<? 
$disc=$HTTP_POST_VARS["disc"];
$ra=$HTTP_POST_VARS["ra"];
$cred=$HTTP_POST_VARS["credito"];

//abre conexão com o banco
include "../conexao.php";


$hoje = date("d/m/Y - h:i");
$mensagem="<p>&nbsp;<p><font size='3' face='Verdana, Arial, Helvetica, sans-serif' color=red><B><center>Você já se matriculou nesta disciplina! <br>Selecione outra Disciplina $error</center></b></font>";
$mensagem2="<p>&nbsp;<p><font size='3' face='Verdana, Arial, Helvetica, sans-serif' color=red><B><center>Não é possível se matricular pois já está com o número máximo de Disciplinas de RER! </center></b></font>";
$mensagem3="<p>&nbsp;<p><font size='3' face='Verdana, Arial, Helvetica, sans-serif' color=red><B><center>Matricula efetuada com sucesso!<br>AGUARDE!</center></b></font>";

$soma="select * from ra_disc_rer";
$rs_soma=mysql_query($soma,$conexao);
$tsoma=mysql_num_rows($rs_soma);

$mais_q=$tsoma+$cred;

//incuir registros
$incluir="insert into ra_disc_rer_disp(ra,id_doc_disc,creditos,data) values('$ra','$disc','$cred','$hoje')";
$sql = mysql_query($incluir) or die ($mensagem);
echo $mensagem3;
echo "<meta HTTP-EQUIV='Refresh' CONTENT='3;URL=matriculado_rer.php?ra=$ra'>";

// fim rematricula

?>

</head>
<body>
</body>
</html>
