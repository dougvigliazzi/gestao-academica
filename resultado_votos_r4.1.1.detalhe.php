<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<? 
//variáveis
$sem=$_GET["sem"];
$disc=$_GET["id_disc"];
$r=1;

//abre conexão com o banco
include "conexao.php";

//olhe aqui!!!!!! para resolver o problema dos semestres
//seleciona respostas
$sqltemp="select * from perguntas inner join resposta on perguntas.id_pergunta = resposta.id_pergunta where resposta.sem = '$sem' and resposta.id_doc_disc ='$disc' order by perguntas.id_pergunta";
$rstemp_query=mysql_query($sqltemp,$conexao);

//seleciona docentes
$sqltemp2="select * from doc_disc where semestre=$sem and id_doc_disc ='$disc'"; 
$rstemp_query2=mysql_query($sqltemp2,$conexao);
$tt=mysql_num_rows($rstemp_query2);

//seleciona perguntas
$sqltemp_p="select * from perguntas";
$rstemp_p=$rstemp_query_c=mysql_query($sqltemp_p,$conexao);
$contp=mysql_num_rows($rstemp_p);

// disciplinas e docentes
$sqltemp_c="select * from doc_disc where semestre='$sem' and id_doc_disc ='$disc' ";
$rstemp_c=$rstemp_query_c=mysql_query($sqltemp_c,$conexao);
$contt=mysql_num_rows($rstemp_c);

//Perguntas
$perg[1]= "... foi pontual?";
$perg[2]= " ... utilizou todo horário disponível?";
$perg[3]= " ... pareceu dominar o conteúdo da disciplina?";
$perg[4]= " ... demonstrou estar atualizado nos temas abordados?";
$perg[5]= " ... foi claro na exposição do assunto?";
$perg[6]= " ... respondeu as dúvidas dos alunos?";
$perg[7]= " ... foi acessível fora da sala de aula?";
$perg[8]= " ... A disciplina acrescentou conteúdo em relação ao ensino?";
$perg[9]= " O docente correlacionou a disciplina com as demais?";
$perg[10]= " As aulas lhe pareceram planejadas?";
$perg[11]= " Os exemplos apresentados foram apropriados?";
$perg[12]= " O prof. utilizou recursos multimídias?";
$perg[13]= " ... foi coerente com os objetivos propostos?";
$perg[14]= " Houve tempo suficiente para executá-la?";
$perg[15]= " As questões foram adequadas ao conteúdo?";
$perg[16]= " Houve estímulo à criatividade?";
$perg[17]= " O professor apresentou os objetivos da disciplina?";
$perg[18]= " O professor concluiu o cronograma?";
$perg[19]= " A quantidade de provas foi suficiente?";
$perg[20]= " Você acredita que o seu aprendizado teria sido melhor com módulos de 2h ao invés de módulos de 4h?";
$perg[21]= " O equilíbrio entre teoria e atividade prática foi...";
$perg[22]= " O relacionamento com o docente foi...";
$perg[23]= " Seu interesse pela disciplina antes de freqüentá-la era...";
$perg[24]= " Seu interesse pela disciplina depois de freqüentá-la foi...";
$perg[25]= " A retenção final do conteúdo de cada disciplina foi...";


?>
<title>Resultado : Avaliação de Docentes : <? echo $sem;?>º Semestre</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>

<table width="100%" border="1" cellspacing="0" bordercolor="#000000">
  <tr> 
    <td colspan="46"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong> 
      [<a href="javascript:history.go(-1)">Voltar</a>] <font color="#FF0000" size="3"></font></strong></font> 
    </td>
  </tr>
  <tr> 
    <?
$zz=1;
while($rstemp2=mysql_fetch_array($rstemp_query2)){
?>
    <td rowspan="2" bgcolor="#6699FF"> <div align="center"><font color="#FFFFFF"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">N&ordm; 
        da Pergunta</font></strong></font></div></td>
    <td colspan="6" bgcolor="#6699FF" width="200"> <div align="center"><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong> 
        <? $idd[$zz]=$rstemp2["id_doc_disc"];  echo $rstemp2["docente"]; ?>
        / <? echo $rstemp2["disciplina"]; echo " - $idd[$zz]" ?> </strong></font></div></td>
  </tr>
  <tr> 
    <td width="15"> <div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
        <? $k=0; echo $k; ?>
        <br>
        <img src="imagens/b0.jpg" width="15" height="15"> </font></strong></div></td>
    <td width="15" bgcolor="#FFFFCC"><div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
        <? $x=1; echo $x; ?>
        <br>
        <img src="imagens/b1.jpg" width="15" height="15"> </font></strong></div></td>
    <td width="15"> <div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
        <? $y=2; echo $y; ?>
        <br>
        <img src="imagens/b2.jpg" width="15" height="15"> </font></strong></div></td>
    <td width="15" bgcolor="#FFFFCC"> <div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
        <? $w=3; echo $w; ?>
        <br>
        <img src="imagens/b3.jpg" width="15" height="15"> </font></strong></div></td>
    <td width="15"> <div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
        <? $k=4; echo $k; ?>
        <br>
        <img src="imagens/b4.jpg" width="15" height="15"> </font></strong></div></td>
    <td width="30"> <div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
        <? $k="Total"; echo $k; ?>
        </font></strong></div></td>
  </tr>
  <tr> 
    <? 
	
		for($fm=1;$fm<=$contp;$fm++){
	?>
    <td> <div align="left"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <? echo "$fm ) $perg[$fm]"; ?> </font><font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        </font></div></td>
    <td colspan=5 valign="middle" bgcolor="#FFFFCC"> 
      <? 
			
  			for($ii=0;$ii<=4;$ii++){ 
			
	  			//seleciona respostas
				$sqltemp_r="select count(*) from resposta where id_pergunta='$fm' and id_doc_disc='$idd[$zz]' and nota='$ii'";
				$rstemp_r=mysql_query($sqltemp_r,$conexao);
				$nota=mysql_result($rstemp_r,0,0);
				$sql_total_r="select count(nota) from resposta where id_pergunta='$fm' and id_doc_disc='$idd[$zz]'";
				$total_rstemp_r=mysql_query($sql_total_r,$conexao);
				$total=mysql_result($total_rstemp_r,0,0);
				if($total==NULL||$total==0){
					$percentual=0;
				} else{
					$percentual=($nota*100)/$total;
				}
				
		?>
      <img src="imagens/b<? echo $ii;?>.jpg" width="<? echo $percentual;?>" height="15" border="0" vspace="0" alt="<? echo $percentual;?>"> 
      <? 		}	 
?>
    </td>
    <td><font size="2"><? echo $total;?></font></td>
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
