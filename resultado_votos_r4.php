<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<? 
//variáveis
$sem=$_GET["sem"];
$r=1;

//abre conexão com o banco
$conntemp=mysql_connect("localhost","root","");
mysql_select_db("avalia_ol",$conntemp);



//olhe aqui!!!!!! para resolver o problema dos semestres
//seleciona respostas
$sqltemp="select * from perguntas inner join resposta on perguntas.id_pergunta = resposta.id_pergunta where resposta.sem = '$sem' order by perguntas.id_pergunta";
$rstemp_query=mysql_query($sqltemp,$conntemp);

//seleciona docentes
$sqltemp2="select * from doc_disc where semestre=$sem"; 
$rstemp2=$rstemp_query2=mysql_query($sqltemp2,$conntemp);
$tt=mysql_num_rows($rstemp_query2);

//seleciona perguntas
$sqltemp_p="select * from perguntas";
$rstemp_p=$rstemp_query_c=mysql_query($sqltemp_p,$conntemp);
$contp=mysql_num_rows($rstemp_p);


// disciplinas e docentes
$sqltemp_c="select * from doc_disc where semestre=$sem";
$rstemp_c=$rstemp_query_c=mysql_query($sqltemp_c,$conntemp);
$contt=mysql_num_rows($rstemp_c);

		/*while($rstemp=mysql_fetch_array($rstemp_query)){
			$perg[$inc]=$rstemp["perguntas"];
			$inc++;
		}*/

?>
<title>Avaliar Docentes</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>

<table width="100%" border="1" cellspacing="0" bordercolor="#000000">
  <tr> 
    <td colspan="46"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Semestre: 
      [<a href="resultado_votos_r4.php?sem=1">1</a>] [<a href="resultado_votos_r4.php?sem=2">2</a>] 
      [<a href="resultado_votos_r4.php?sem=3">3</a>] [<a href="resultado_votos_r4.php?sem=4">4</a>] 
      [<a href="resultado_votos_r4.php?sem=5">5</a>] [<a href="resultado_votos_r4.php?sem=6">6</a>] 
      [<a href="resultado_votos_r4.php?sem=7">7</a>] [<a href="resultado_votos_r4.php?sem=80">BioMar</a>] 
      [<a href="resultado_votos_r4.php?sem=9">9</a>] [<a href="resultado_votos_r4.php?sem=81">GerCo</a>] 
      :::::<font color="#FF0000" size="3"><? echo " $sem º Semestre"; ?></font></strong></font> 
    </td>
  </tr>
  <tr> 
    <td rowspan="2" bgcolor="#6699FF"> <div align="center"><font color="#FFFFFF"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">N&ordm; 
        da Pergunta</font></strong></font></div></td>
    <?
		$zz=1;
 		while($rstemp2=mysql_fetch_array($rstemp_query2)){
	?>
    <td colspan="5" bgcolor="#6699FF"> <div align="center"><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong> 
        <? $idd[$zz]=$rstemp2["id_doc_disc"];  echo $rstemp2["docente"]; ?>
        / 
        <? echo $rstemp2["disciplina"]; echo " - $idd[$zz]" ?>
        </strong></font></div></td>
    <? $zz++;
	}?>
	

  </tr>
  <tr> 
    <?  for($i=1;$i<=$tt;$i++){ ?>
    <td width="15"> 
      <div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
        <? $k=0; echo $k; ?>
        </font></strong></div></td>
    <td width="15" bgcolor="#FFFFCC"><div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
        <? $x=1; echo $x; ?>
        </font></strong></div></td>
    <td width="15"> <div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
        <? $y=2; echo $y; ?>
        </font></strong></div></td>
    <td width="15" bgcolor="#FFFFCC"> <div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
        <? $w=3; echo $w; ?>
        </font></strong></div></td>
    <td width="15"> <div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
        <? $k=4; echo $k; ?>
        </font></strong></div></td>
    <? 
	} ?>
  </tr>
  	<? 
		while($rstemp=mysql_fetch_array($rstemp_query)){
		for($fm=1;$fm<=$contp;$fm++){
	?>
  <tr> 
    <td> <div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <? echo $fm; ?> </font><font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        </font></div></td>
    <? 	for($s=1;$s<=$contt;$s++){
			$pkg=$fm;
  			for($ii=0;$ii<=4;$ii++){ 
	  			//seleciona respostas
				$sqltemp_r="select count(*) from resposta where id_pergunta='$s' and id_doc_disc='$idd[$r]' and nota='$ii' and sem='$sem'";
				$rstemp_r=mysql_query($sqltemp_r,$conntemp);
				$res=mysql_result($rstemp_r,0,0);
		?>
    <td colspan="1" bgcolor="#FFFFCC"><div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $res.":".$idd[$r]; ?></font></div></td>
    <?   	} 
		}
		$r++;
	}?>
  </tr>
  <?	}
$rstemp=null;
$rstemp_r=null;
$rstemp_c=null;
 ?>
</table>

<p> 
  <? 
$sqlcont="select * from controle_ra where semestre = '$sem'";
$rstempcont=$rstemp_query=mysql_query($sqlcont,$conntemp);
$cont=mysql_num_rows($rstempcont);

echo "<b>Alunos participantes:</b> $cont";
$sqlcount="select * from resposta where sem = '$sem'";
$rstempcont2=$rstemp_query2=mysql_query($sqlcount,$conntemp);
$cont2=mysql_num_rows($rstempcont2);
if($cont2==NULL){
$total=0;
}else{
$total=$cont2/$cont;
}
//echo $rstempcont2;

echo "<br><b>Total de Registros: </b>$total";
?>
  <?
mysql_close($conntemp);
$conntemp=null;
$rstempcont2=null;
?>
</p>
</body>
</html>