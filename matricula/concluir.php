<html>
<body>
<?
$ip=getenv('REMOTE_ADDR');//echo $ip;
$nao=0;
$datahj = date("Y/m/d");//echo $datahj;
$horahj = date('H:i:s');//echo $horahj;
$equip=$HTTP_GET_VARS["txtequip"];
$setor=$HTTP_GET_VARS["txtsetorb"];
$nome=$HTTP_GET_VARS["txtnome"];
$mesp=$HTTP_GET_VARS["txtmes"];//echo $mesp;
$diap=$HTTP_GET_VARS["txtdia"];//echo $diap;
$anop=$HTTP_GET_VARS["txtano"];//echo $diap;
  $mespmandar=$mesp;
  if(($mesp==1)and(date('Y')<$anop)){$mespmandar=13;}
@$horario=$HTTP_GET_VARS["horario"];
@$local=$HTTP_GET_VARS["txtlocalb"];
@$colocal=$HTTP_GET_VARS["chkolocal"];//echo $colocal;
@$olocal=$HTTP_GET_VARS["txtolocal"];
@$obs=$HTTP_GET_VARS["txtobs"];
$localbom =$local;
if($colocal=='checkbox'){$localbom=$olocal;}
//echo "local:".$localbom;
$codhora = $horario;
echo "codhora:".$codhora;
//banco de dados
$conn = mysql_connect("localhost","root","");
$db = mysql_select_db("agenda",$conn);
$sqlseguro = mysql_query("select codhorapara from tabagenda where((equipamento='$equip')and(diapara='$diap')and(anopara='$anop')and(mespara='$mesp'))");
while($result=mysql_fetch_array($sqlseguro)){
if(($manha==$result[0])or($manha1==$result[0])or($tarde==$result[0])or($tarde1==$result[0])or($almoco==$result[0])or($noite==$result[0])or($codhora==$result[0]))
{$nao=1;}
}
if($nao==1){?>
              <table align="center" width="295">
                <tr> 
                  <td> 
                    <div align="center"> 
                      <p>&nbsp;</p>
                      <p>&nbsp;</p>
                      <p><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#FF0000">Equipamento 
                        já agendado para esta data e período!!! </font></b></p>
                    </div>
                  </td>
                </tr>
              </table>
              <? }else{
if($horario!=0){
$stringsql = "insert into tabagenda(ip,datafeito,horafeito,setor,requisitante,mespara,";
$stringsql = $stringsql."localdeuso,codhorapara,equipamento,diapara,anopara,";
$stringsql = $stA?B?<?Ð??6?6rringsql."observacao)values('$ip','$datahj','$horahj','$setor','$nome','$mesp'";
$stringsql = $stringsql.",'$localbom','$horario','$equip','$diap','$anop','$obs')";
$sqlinsere = mysql_query($stringsql);}
?>
              <table border="0" cellspacing="1" cellpadding="0" align="center" width="68%">
                <tr bgcolor="#003399"> 
                  <td colspan="2"> 
                    <div align="center"><font face="Verdana, Arial, Helvetica, sans-serif" size="3" color="#FFFFFF"><b><br>
                      <? echo $equip." ";?>
                      <br>
                      <br>
                      </b></font></div>
                  </td>
                </tr>
                <tr bgcolor="#66CCFF"> 
                  <td> 
                    <div align="left"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#990000"><b>requisitante: 
                      </b></font></div>
                  </td>
                  <td> 
                    <div align="left"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#000000"> 
                      <? echo " ".$nome; ?>
                      </font></b></div>
                  </td>
                </tr>
                <tr bgcolor="#0099FF"> 
                  <td width="43%"> 
                    <div align="left"><font color="#990000"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">requisi&ccedil;&atilde;o 
                      para:</font></b></font></div>
                  </td>
                  <td width="57%"> 
                    <div align="left"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="3" color="#000000"> 
                      <? echo $diap."/".$mesp."/".$anop;?>
                      </font> </b></div>
                  </td>
                </tr>
                <tr bgcolor="#66CCFF"> 
                  <td width="43%"> 
                    <div align="left"><font color="#990000"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2"> 
                      per&iacute;odo(s):</font></b></font></div>
                  </td>
                  <td width="57%"> 
                    <div align="left"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="3" color="#000000"> 
                      <? 
						$periodo[1]="manhã 8:00-10:00";
						$periodo[2]="manhã-10:00-12:00";
						$periodo[3]="almoço";
						$periodo[4]="tarde-14:00-16:00";
						$periodo[5]="tarde-16:00-18:00";
						$periodo[6]="noite";
						$periodos = $periodo[$codhora];
						echo $periodos;
					?>
                      </font> </b></div>
                  </td>
                </tr>
                <tr bgcolor="#0099FF"> 
                  <td width="43%"> 
                    <div align="left"><font color="#990000"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">local 
                      de uso:</font></b></font></div>
                  </td>
                  <td width="57%"> 
                    <div align="left"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="3" color="#000000"> 
                      <? echo $localbom;?>
                      </font> </b></div>
                  </td>
                </tr>
                <tr bgcolor="#66CCFF"> 
                  <td width="43%"> 
                    <div align="left"><font color="#990000"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">observa&ccedil;&atilde;o:</font></b></font></div>
                  </td>
                  <td width="57%"> 
                    <div align="center"><font face="Verdana, Arial, Helvetica, sans-serif" size="3" color="#000000"> 
                      <?if($obs!=''){?>
                      <textarea cols="20" rows="4"><?echo $obs;?></textarea>
                      <?}else{?>
                      <b>-----</b> 
                      <?}?>
                      </font> </div>
                  </td>
                </tr>
                <tr> 
                  <td width="43%"> 
				  <div align="left"><font face="Verdana, Arial, Helvetica, sans-serif"><font face="Verdana, Arial, Helvetica, sans-serif"><font size="2"><font size="2"><font color="#0099FF"><b><font color="#990000"></font></b></font></font></font></font></font></div>
                  </td>
                  <td width="57%"> 
                    <div align="left"><font face="Verdana, Arial, Helvetica, sans-serif"><font face="Verdana, Arial, Helvetica, sans-serif"><font size="3"><font size="3"><font color="#FF6633"></font></font></font></font></font></div>
                  </td>
                </tr>
                <tr> 
                  <td width="43%"> 
                    <div align="left"><font face="Verdana, Arial, Helvetica, sans-serif"><font face="Verdana, Arial, Helvetica, sans-serif"><font size="2"><font size="2"><font color="#0099FF"><b><font color="#990000"></font></b></font></font></font></font></font></div>
                  </td>
                  <td width="57%"> 
                    <div align="left"><font face="Verdana, Arial, Helvetica, sans-serif"><font face="Verdana, Arial, Helvetica, sans-serif"><font size="3"><font size="3"><font color="#FF6633"></font></font></font></font></font></div>
                  </td>
                </tr>
                <tr> 
                  <td width="43%"> 
                    <div align="left"><font face="Verdana, Arial, Helvetica, sans-serif"><font face="Verdana, Arial, Helvetica, sans-serif"><font size="2"><font size="2"><font color="#0099FF"><b><font color="#990000"></font></b></font></font></font></font></font></div>
                  </td>
                  <td width="57%"> 
                    <div align="left"><font face="Verdana, Arial, Helvetica, sans-serif"><font face="Verdana, Arial, Helvetica, sans-serif"><font size="3"><font size="3"><font color="#FF6633"></font></font></font></font></font></div>
                  </td>
                </tr>
                <tr> 
                  <td colspan="2"> 
                    <div align="left"><font face="Verdana, Arial, Helvetica, sans-serif" color="#990000"><font size="2"><font size="2"><b></b></font></font></font></div>
                    <div align="center"><font face="Verdana, Arial, Helvetica, sans-serif" color="#990000"><font size="3"><font size="3"> 
                      </font></font></font></div>
                  </td>
                </tr>
              </table>
              <?}?>
              <p align="center"><font face="Verdana, Arial, Helvetica, sans-serif"><font face="Verdana, Arial, Helvetica, sans-serif"><font size="3"><font size="3"><font color="#FF6633"> 
                <input type="button" name="Submit" value="OK" onClick="window.close();">
                </font></font></font></font></font><br>
              </p>
              <?
			  $sqlcodigo = mysql_query("select codigo from equipamentos where equipamento='$equip'");
			  while($lincod = mysql_fetch_array($sqlcodigo)){$codequip=$lincod[0];}
			  ?>
              <script>
			  //,'menubar=no,resizable=no,height=500,width=755,left=5,screenX=5,top=5,screenY=5'
			  codequip="<? echo $codequip;?>";
			  mes="<? echo $mespmandar;?>";
			  pagina="agenda.php?txtequip="+codequip+"&txtmes="+mes+"";
			  window.open(pagina,'principal','scrollbars,menubar=no,resizable=no,height=520,width=775,left=5,screenX=5,top=5,screenY=5');
			  </script>
              <? $fecha = mysql_close($conn);?>
			  <?
			 if($obs==""){$obs="Sem observações.";}
$EmailRemetente = "paulo@csv.unesp.br";
$EmailDestinatario = "paulo@csv.unesp.br,claudio@csv.unesp.br,douglas@csv.unesp.br";
#de:
 $headers = "From:".$nome."<\"$EmailRemetente\">\r \n";
 $headers .= "Content-Type: text/html;\n\tcharset=\"iso-8859-1\"\n";
    //$headers .= "MIME-Version: 1.0\r\n";
    //echo $headers;
# quem recebe (Para)
     $recipient = "claudio@csv.unesp.br,paulo@csv.unesp.br,douglas@csv.unesp.br";
  //echo $recipient;
     $subject  = "Agendamento de ".$equip;
  $mensagem = 'O equipamento '.$equip.' está agendado para:<br><b> '.$noA?B?<?Ð??6?6rme;
  $mensagem =$mensagem.'</b><br>no dia:<b> '.$diap.'/'.$mesp.'/'.$anop.'</b><br>no local:<b>'.$localbom.' ';
  $mensagem =$mensagem.'</b><br> no(s) periodo(s):<b> '.$periodos.'.</b>';
  $mensagem =$mensagem."<br>Observações:<b>".$obs."</b>";
  $message = '<p><font face="Verdana" size="2">'.$mensagem.'</font></p>';

 //Envia e-mail
   mail($recipient, $subject, $message, $headers) or die ("mensagem de erro: comunique o agendamento ao STI, falha no sistema eletrônico!!!");
 //Echo "Mensagem enviada para ".$EmailDestinatario;
   ?>
</body>
</html>