<html>
<head>
<title>Dispon&iacute;veis</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" type="text/JavaScript">
<!--

function muda(){
document.Image1.src="imagens/x.gif";
}


function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
</head>

<body onLoad="MM_preloadImages('imagens/xis.gif','imagens/x.gif')">
<? 
$dis=$HTTP_GET_VARS["d"];
$sem=$HTTP_GET_VARS["sem"];
$ra=$HTTP_GET_VARS["ra"];
$nome=$HTTP_GET_VARS["nome"];

//abre conexão com o banco
include "../conexao.php";


//seleciona registros
//$sqltemp="select * from doc_disc where semestre <= '$sem' order by disciplina ASC";
$sqltemp="select * from doc_disc where ativo='s' order by disciplina ASC";
$rstemp_query=mysql_query($sqltemp,$conexao);

// seleciona disciplinas de rer ORIGINAL
/*$sql_rer="select * from ra_disc_rer_disp inner join doc_disc on ra_disc_rer_disp.id_doc_disc=doc_disc.id_doc_disc where ra = '$ra' order by disciplina ASC";*/

// seleciona disciplinas de rer
$sql_rer="select * from doc_disc where ativo='s' order by disciplina ASC";
//"select * from ra_disc inner join doc_disc on ra_disc.id_doc_disc=doc_disc.id_doc_disc where ra = '$ra' and ra_disc.situacao='rer'";// or ra_disc.situacao='RER' order by disciplina ASC";
$rs_rer_query=mysql_query($sql_rer,$conexao);
?>

<table width="100%" border="0">
  <tr> 
    <td><font size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong> 
      <div align="center">Disciplinas dispon&iacute;veis para matricula para o 
        [<font color="#0066CC"> R.A. 
        <?   echo $ra ; ?>
        </font>]</div>
      </strong></font> </td>
  </tr>
  <tr> 
    <td><table width="100%" border="1" cellpadding="1" cellspacing="0" bordercolor="#000000">
        <tr bgcolor="#CCCCCC"> 
          <td colspan="2"> <div align="left"><font size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong>Disciplinas 
              de <font color=red>RER</font>: Selecionar at&eacute; 2 (duas) disciplinas.</strong></font></div>
            <div align="center"></div></td>
          <td colspan="2"> <div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Cr&eacute;d:</strong></font> 
              <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
              <? 
				$conta=1;
			  	//escreve os registros de RER selecionados
	   			while($rs_rer=mysql_fetch_array($rs_rer_query) ){?>
              </font></div></td>
        </tr>
        <tr> 
          <td width="10"> <div align="left"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"></font></div>
            <div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
              </font><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><b> 
              <? echo $conta;?> </b></font></div></td>
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? $dsc=$rs_rer["disciplina"];echo strtoupper($dsc); ?></strong></font></td>
          <td width="5%"> <div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b> 
              </b></font><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $rs_rer["creditos"];?> </strong></font><br>
            </div></td>
          <td width="5%"><div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b><a href="incluir_rer.php?ra=<? echo $ra; ?>&disc=<? echo $rs_rer["id_doc_disc"]; ?>&credito=0&sem=<? echo $sem; ?>&disciplina=<? echo $rs_rer["disciplina"]; ?>&nome=<? echo $nome; ?>" target="disciplinas" onClick="MM_swapImage('Image1<? echo $conta?>','','imagens/x.gif',1)"><img src="imagens/visto.gif" name="Image1<? echo $conta?>" width="20" height="20" border="0" id="Imagel<? echo $conta;?>" alt="Incluir/Excluir"></a></b></font></div></td>
	<? 
		  $conta++;
		  }  
		  
		$rs_rer=null;

		mysql_close($conexao);
		$conexao=null;
	?>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td height="10">&nbsp;</td>
  </tr>
  <tr> 
    <td><table width="100%" border="1" cellpadding="1" cellspacing="0" bordercolor="#000000">
        <tr bgcolor="#3366CC"> 
          <td colspan="2"> <div align="left"><font size="3" color="#FFFFFF" face="Verdana, Arial, Helvetica, sans-serif"><strong>Disciplinas: 
              Selecionar 3 disciplinas ou at&eacute; 40 cr&eacute;ditos.</strong></font></div>
            <div align="center"></div></td>
          <td colspan="2"> <div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Cr&eacute;d:</strong></font> 
              <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
              <? 
				$cont=1;
			  	//escreve os registros selecionados
	   			while($rstemp=mysql_fetch_array($rstemp_query) ){?>
              </font></div></td>
        </tr>
        <tr> 
          <td width="10"> <div align="left"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"></font></div>
            <div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
              </font><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><b> 
              <? echo $cont;?> </b></font></div></td>
          <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? $dscr=$rstemp["disciplina"]; echo strtoupper($dscr); ?></strong></font></td>
          <td width="5%"> <div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b> 
              </b></font><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $rstemp["creditos"]; ?></strong></font><br>
            </div></td>
          <td width="5%"><div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b><a href="incluir.php?ra=<? echo $ra; ?>&disc=<? echo $rstemp["id_doc_disc"]; ?>&sem=<? echo $sem; ?>&credito=<? echo $rstemp["creditos"]; ?>&disciplina=<? echo $rstemp["disciplina"]; ?>&nome=<? echo $nome; ?>" target="disciplinas" onClick="MM_swapImage('Image1l<? echo $cont?>','','imagens/x.gif',1)"><img src="imagens/visto.gif" name="Image1l<? echo $cont?>" width="20" height="20" border="0" id="Image1l<? echo $cont?>" alt="Incluir/Excluir"></a></b></font></div></td>
          <? 
		  $cont++;
		  }  
		  
		$rstemp=null;

?>
        </tr>
      </table></td>
  </tr>
</table>
</table>
</body>
</html>
