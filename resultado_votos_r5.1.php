<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<? 
//vari�veis
$sem=$_GET["sem"];

$ano=date("Y");

$r=1;

if($sem==2){
	$semestre=2;
	$parametro="2 OR semestre=4 OR semestre=6 OR semestre=8";
	
}else{
	$semestre=1;
	$parametro="1 OR semestre=3 OR semestre=5 OR semestre=7";
}

//abre conex�o com o banco
include "conexao.php";

//olhe aqui!!!!!! para resolver o problema dos semestres
//seleciona respostas
$sqltemp="select * from perguntas p inner join resposta r on p.id_pergunta = r.id_pergunta where r.semestre = '$semestre' and r.datahora LIKE '$ano' order by p.id_pergunta";
$rstemp_query=mysql_query($sqltemp,$conexao);

//seleciona docentes
$sqltemp2="select * from doc_disc where semestre=$parametro AND ativo='s'"; 
$rstemp_query2=mysql_query($sqltemp2,$conexao);
$tt=mysql_num_rows($rstemp_query2);

//seleciona perguntas
$sqltemp_p="select * from perguntas";
$rstemp_p=$rstemp_query_c=mysql_query($sqltemp_p,$conexao);
$contp=mysql_num_rows($rstemp_p);

// disciplinas e docentes
$sqltemp_c="select * from doc_disc where semestre=$parametro and ativo='s'";
$rstemp_c=$rstemp_query_c=mysql_query($sqltemp_c,$conexao);
$contt=mysql_num_rows($rstemp_c);

//Perguntas
$perg[1]= " ... foi pontual?";
$perg[2]= " ... utilizou todo hor�rio dispon�vel?";
$perg[3]= " ... pareceu dominar o conte�do da disciplina?";
$perg[4]= " ... demonstrou estar atualizado nos temas abordados?";
$perg[5]= " ... foi claro na exposi��o do assunto?";
$perg[6]= " ... respondeu as d�vidas dos alunos?";
$perg[7]= " ... foi acess�vel fora da sala de aula?";
$perg[8]= " ... A disciplina acrescentou conte�do em rela��o ao ensino?";
$perg[9]= " O docente correlacionou a disciplina com as demais?";
$perg[10]= " As aulas lhe pareceram planejadas?";
$perg[11]= " Os exemplos apresentados foram apropriados?";
$perg[12]= " O prof. utilizou recursos multim�dias?";
$perg[13]= " ... foi coerente com os objetivos propostos?";
$perg[14]= " Houve tempo suficiente para execut�-la?";
$perg[15]= " As quest�es foram adequadas ao conte�do?";
$perg[16]= " Houve est�mulo � criatividade?";
$perg[17]= " O professor apresentou os objetivos da disciplina?";
$perg[18]= " O professor concluiu o cronograma?";
$perg[19]= " A quantidade de provas foi suficiente?";
$perg[20]= " Voc� acredita que o seu aprendizado teria sido melhor com m�dulos de 2h ao inv�s de m�dulos de 4h?";
$perg[21]= " O equil�brio entre teoria e atividade pr�tica foi...";
$perg[22]= " O relacionamento com o docente foi...";
$perg[23]= " Seu interesse pela disciplina antes de freq�ent�-la era...";
$perg[24]= " Seu interesse pela disciplina depois de freq�ent�-la foi...";
$perg[25]= " A reten��o final do conte�do de cada disciplina foi...";


?>
<title>Resultado : Avalia��o de Docentes : <? echo $sem;?>� Semestre <? echo $ano;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>

<table width=80% border="1" cellspacing="0" bordercolor="#000000">
  <tr> 
    <td colspan="46"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Semestre: 
      [<a href="resultado_votos_r5.1.php?sem=1">1</a>] [<a href="resultado_votos_r5.1.php?sem=2">2</a>] 
      :::::<font color="#FF0000" size="3"><? echo " ".$sem."� Semestre "; echo $ano; echo " $sqltemp2";?></font></strong></font> 
    </td>
  </tr>
  <tr> 
<?
$zz=1;
while($rstemp2=mysql_fetch_array($rstemp_query2)){
?>
    <td rowspan="2" bgcolor="#6699FF"> <div align="center"><font color="#FFFFFF"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">N&ordm; 
        da Pergunta</font></strong></font></div></td>
    <td colspan="5" bgcolor="#6699FF"> <div align="center"><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong> 
        
        <? $idd[$zz]=$rstemp2["id_doc_disc"];  echo $rstemp2["docente"]; ?>
        / <? echo $rstemp2["disciplina"]; echo " - $idd[$zz]" ?> <br>[<a href="resultado_votos_r5.1.detalhe.php?sem=<? echo $semestre;?>&id_disc=<? echo $idd[$zz];?>&ano=<? $ano;?>"> Detalhe...</a> ] </strong></font></div></td>
  </tr>
  <tr> 
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
  </tr>
  <tr> 
  	<? 
	
		for($fm=1;$fm<=$contp;$fm++){
	?>
    <td> <div align="left"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <? echo "$fm ) $perg[$fm]"; ?> </font><font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        </font></div></td>
    	<? 
			
  			for($ii=0;$ii<=4;$ii++){ 
			
	  			//seleciona respostas
				$sqltemp_r="select count(*) from resposta where id_pergunta='$fm' and id_doc_disc='$idd[$zz]' and nota='$ii'";
				$rstemp_r=mysql_query($sqltemp_r,$conexao);
				$nota=mysql_result($rstemp_r,0,0);
		?>
    <td colspan="1" bgcolor="#FFFFCC"><div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $nota;//.":".$idd[$zz]."-".$fm; ?></font></div></td>
    <? 		}	 
?>
  </tr>
 
  <? }
 $zz++; 

	}
$rstemp=null;
$rstemp_r=null;
$rstemp_c=null;
 ?>
</table>

<p> 
  <? 
mysql_close($conexao);
$conexao=null;
$rstempcont2=null;
?>
</p>
</body>
</html>
