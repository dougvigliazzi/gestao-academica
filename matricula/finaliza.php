<html>
<head>
<? 
$ra=$HTTP_GET_VARS["ra"];
$sem=$HTTP_GET_VARS["sem"];
$nome=$HTTP_GET_VARS["nome"];
$nome_s=$nome;

//abre conexao com o banco
$conntemp=mysql_connect("localhost","root","");
mysql_select_db("notas",$conntemp);

$hoje = date("m/Y");
$sessao=session_id();
?>
  <title>Confirma&ccedil;&atilde;o das Disciplinas matriculadas</title>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?
//seleciona registros
$sqltemp="select * from ra_disc inner join doc_disc on ra_disc.id_doc_disc=doc_disc.id_doc_disc where ra = '$ra' and ra_disc.semestre = '$sem' order by disciplina";
$rstemp_query=mysql_query($sqltemp,$conntemp);
$totalreg=mysql_num_rows($rstemp_query);

$sql_rer="select * from ra_disc_rer inner join doc_disc on ra_disc_rer.id_doc_disc=doc_disc.id_doc_disc where ra = '$ra' and ra_disc_rer.semestre = '$sem' order by disciplina";
$rs_rer_query=mysql_query($sql_rer,$conntemp);


$mensagem_inc="<p>&nbsp;<p><font size='3' face='Verdana, Arial, Helvetica, sans-serif' color=red><B><center>N&atilde;o foi poss&iacute;vel concluir a matr&iacute;cula. <br> Comunique a Gradua&ccedil;&atilde;o ou STI.</center></b></font>";


$incluir="insert into controle_ra_mat(ra,sessao,semestre,data) values('$ra','$sessao','$sem','$hoje')";
$sql_incluir = mysql_query($incluir) or die ($mensagem_inc);

$soma="select sum(creditos) from ra_disc";
$rs_soma=mysql_query($soma,$conntemp);
$tsoma=mysql_result($rs_soma,0);

/*$sql_nome="select nome from alunos where ra = $ra";
$rs_nome=mysql_query($sql_nome,$conntemp);
$nome=mysql_result($rs_nome,0);*/
?>
<table width="100%" border="0">
  <tr>
    <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>
      <div align="center"></div>
      </strong></font></td>
  </tr>
</table>
<tr> 
              
  <td></td>
</tr></table>
<?
//envio de e-mail
	$EmailRemetente = "sti@csv.unesp.br";
	$EmailDestinatario = "douglas@clp.unesp.br,acgazzola@clp.unesp.br";
#de:
	$headers = "From:".$ra."<\"$EmailRemetente\">\r \n";
	$headers .= "Content-Type: text/html;\n\tcharset=\"iso-8859-1\"\n";
    //$headers .= "MIME-Version: 1.0\r\n";
    //echo $headers;
# quem recebe (Para)
 $recipient = $EmailDestinatario;
  //echo $recipient;
 $subject  = "Matrícula do ".$ra;
 $x=1;
 $xx=1;
 $mensagem = "<br>";
 $mensagem = $mensagem."Nome: <b>".$nome_s."</b> <br>";
 $mensagem = $mensagem."<br><br><b>Matr&iacute;cula do R.A. <i>".$ra." para o ".$sem. "o. semestre</i> foi realizada!</b><br>";
 $mensagem = $mensagem."====================================================<br>";
 while($rstemp=mysql_fetch_array($rstemp_query)){
	$disc=$rstemp["disciplina"];
	$cred=$rstemp["creditos"];
  	$mensagem = $mensagem."$x: Disciplina: ".$disc." - Cr&eacute;ditos: ".$cred."<br>";
	$x++;
}

 $mensagem = $mensagem."===================<b> RER </b>=====================<br>";
 while($rs_rer=mysql_fetch_array($rs_rer_query)){
				$discr=$rs_rer["disciplina"];
  	$mensagem = $mensagem."$xx: Disciplina: ".$discr."<br>";
	$xx++;
}
$mensagem = $mensagem."<p>Se houve mudança em seu endereco favor informar:<p>";
$mensagem = $mensagem."_________________________________________________________________<p>";
$mensagem = $mensagem."_________________________________________________________________<p>";
$mensagem = $mensagem."_________________________________________________________________<p>";
$mensagem = $mensagem."<br><br>OBS:_____________________________________________________________<p>";
$mensagem = $mensagem."_________________________________________________________________<p>";
$mensagem = $mensagem."<p><p>";
$mensagem = $mensagem."São Vicente ______, ___________________________ de __________<p>";
$mensagem = $mensagem."<br><br><p>________________________________________________________<br> Assinatura";


 $message = '<p><font face="Verdana" size="2">'.$mensagem.'</font></p>';

 //Envia e-mail
   mail($recipient, $subject, $message, $headers) or die ("mensagem de erro: comunique ao STI, falha no sistema!!!");
 //Echo "Mensagem enviada para ".$EmailDestinatario;

		$rstemp=null;

		mysql_close($conntemp);
		$conntemp=null;
		echo $mensagem;
   ?>

</body>
</html>
