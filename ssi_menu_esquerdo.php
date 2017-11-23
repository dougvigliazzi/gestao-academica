<!-- DEPENDENDO DA LOCALIZAÇÃO DO SEU ARQUIVO DENTRO DA HIERARQUIA DAS PASTAS DO SEU SITE, A FOLHA DE ESTILOS PODE NÃO ENCONTRAR O CAMINHO CORRETO, SE DER ERRO AO VISUALIZAR O ARQUIVO, VERIFIQUE O CAMINHO QUE DEVE SER COLOCADO NA SUA PÁGINA (SOMENTE A PÁGINA QUE ESTÁ COM ERRO) PARA SOLUCIONAR O PROBLEMA - ENTRE EM CONTATO COM O ADMINISTRADOR DE REDES LOCAL PARA IDENTIFICAR O CAMINHO  -->
<link href="../folha.css" rel="stylesheet" type="text/css"> 
<!-- PARTE 1 PHP: CRIAR FORMATO DE APRESENTAÇÃO DO SUBMENU - NÃO MEXER NESSE CÓDIGO -->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<form action="<? echo $PATH_INFO; ?>"  name="formmenu_esq" method="post">
<input name="menu_esq1" type="text" style="display:none" value="<?php if($_REQUEST['menu_esq1'] != null){ ?>
<?php echo $_REQUEST['menu_esq1'];?>
<?php }else{?>
<?php }?>">
<input name="menu_esq2" type="text" style="display:none" value="<?php if($_REQUEST['menu_esq2'] != null){ ?>
<?php echo $_REQUEST['menu_esq2'];?>
<?php }else{?>
<?php }?>">
<!-- FIM PARTE 1 -->


  <table width="150"  border="0" cellpadding="0" cellspacing="0" id="menu_esquerdo">
    <tr> 
      <td valign="top">&nbsp;</td>
    </tr>
    <tr> 
      <td class="MenuEsqDivisor">&nbsp;</td>
    </tr>
    <tr> 
      <td class="MenuEsqFundo_subitem"><a href="#" class="MenuEsqEfeito_subitem" onClick="disciplina();"> 
        Grad. Disciplinas </a></td>
      <?php if($_REQUEST['menu_esq1'] == 1 ){?>
    </tr>
    <tr> 
      <td height="15" class="MenuEsqFundo"><a href="cad_doc_disc.php" target="rightFrame" class="MenuEsqEfeitoSubItem">Cadastrar 
        Disciplina </a></td>
    </tr>
    <tr> 
      <td height="15" class="MenuEsqFundo"><a href="alterar_doc_disc_lista.php" target="rightFrame" class="MenuEsqEfeitoSubItem">Alterar 
        Disc./Docente </a></td>
    </tr></tr>
    <td height="15" class="MenuEsqFundo"><a href="seleciona_lista_chamada.php" target="rightFrame" class="MenuEsqEfeitoSubItem">Lista 
      de Chamada</a></td>
    </tr>
    <td height="15" class="MenuEsqFundo"><a href="seleciona_lista_nota_disc.php" target="rightFrame" class="MenuEsqEfeitoSubItem">Incluir 
      Notas Disciplinas </a></td>
    </tr>
      <td height="15" class="MenuEsqFundo"><a href="seleciona_lista_folha_notas_disc.php" target="rightFrame" class="MenuEsqEfeitoSubItem">Form. 
        Notas </a></td>
    </tr>
    <tr> 
      <td height="15" class="MenuEsqFundo">&nbsp;</td>
    </tr>
    <?php }?>
    <tr> 
      <td class="MenuEsqDivisor">&nbsp;</td>
    </tr>
    <tr> 
      <td class="MenuEsqFundo_subitem"><p><a href="#" class="MenuEsqEfeito_subitem" onClick="alunos();">Alunos</a></p></td>
      <?php if($_REQUEST['menu_esq1'] == 2 ){?>
    <tr> 
      <td height="15" class="MenuEsqFundo"><a href="cad_aluno.php" target="rightFrame" class="MenuEsqEfeitoSubItem">Cadastrar 
        Aluno </a></td>
    </tr>
    <tr> 
      <td height="15" class="MenuEsqFundo"><a href="incluir_rer.php" target="rightFrame" class="MenuEsqEfeitoSubItem">Incluir 
        RER </a></td>
    </tr>
    <tr> 
      <td height="15" class="MenuEsqFundo"><a href="selec_ra_nota_lista.php" target="rightFrame" class="MenuEsqEfeitoSubItem">Alterar 
        Notas </a></td>
    </tr>
    <tr> 
      <td height="15" class="MenuEsqFundo"><a href="selec_ra_cad_lista.php" target="rightFrame" class="MenuEsqEfeitoSubItem">Alterar 
        Cadastro</a></td>
    </tr>
    <tr> 
      <td height="15" class="MenuEsqFundo"><a href="liberar_mat.php" target="rightFrame" class="MenuEsqEfeitoSubItem">Liberar 
        Matr&iacute;cula </a></td>
    </tr>
    <tr> 
      <td height="15" class="MenuEsqFundo">&nbsp;</td>
    </tr>
    <?php }?>
    <tr> 
      <td class="MenuEsqDivisor">&nbsp;</td>
    </tr>
    <tr> 
      <td class="MenuEsqFundo_subitem"><p><a href="#" class="MenuEsqEfeito_subitem" onClick="matriculas();">Matr&iacute;culas</a></p></td>
      <?php if($_REQUEST['menu_esq1'] == 3 ){?>
    <tr> 
      <td height="15" class="MenuEsqFundo"><a href="matricula/index.php" target="rightFrame" class="MenuEsqEfeitoSubItem">Matricular 
        aluno</a></td>
    </tr>
    <tr> 
      <td height="15" class="MenuEsqFundo">&nbsp;</td>
    </tr>
    <?php }?>
    <tr> 
      <td class="MenuEsqDivisor">&nbsp;</td>
    </tr>
    <tr> 
      <td class="MenuEsqFundo_subitem"><p><a href="#" class="MenuEsqEfeito_subitem" onClick="av_doc();">Avaliar 
          Docentes </a></p></td>
      <?php if($_REQUEST['menu_esq1'] == 4 ){?>
    <tr> 
      <td height="15" class="MenuEsqFundo"><a href="cad_perguntas.php" target="rightFrame" class="MenuEsqEfeitoSubItem">Incluir 
        Pergunta </a></td>
    </tr>
    <tr> 
      <td height="15" class="MenuEsqFundo"><a href="excluir_perg.php" target="rightFrame" class="MenuEsqEfeitoSubItem">Excluir 
        Pergunta </a></td>
    </tr>
    <tr> 
      <td height="15" class="MenuEsqFundo"><a href="alterar_perg_lista.php" target="rightFrame" class="MenuEsqEfeitoSubItem">Alterar 
        Pergunta </a></td>
    </tr>
    <tr> 
      <td height="15" class="MenuEsqFundo"><a href="resultado_votos_r4.1.1.t1.php?sem=1" target="rightFrame" class="MenuEsqEfeitoSubItem">Estat&iacute;stica</a></td>
    </tr>
    <tr> 
      <td height="15" class="MenuEsqFundo">&nbsp;</td>
    </tr>
    <?php }?>
    <tr> 
      <td class="MenuEsqDivisor">&nbsp;</td>
    </tr>
    <tr> 
      <td class="MenuEsqFundo_subitem"><a href="#" onClick="academica();" class="MenuEsqEfeito_subitem">Acad&ecirc;mica</a></td>
      <?php if($_REQUEST['menu_esq1'] == 11 ){?>
    <tr> 
      <td height="15" class="MenuEsqFundo"><a href="seleciona_lista_documentos.php" target="rightFrame" class="MenuEsqEfeitoSubItem">Atestado 
        Matr&iacute;cula</a></td>
    </tr>
    <tr> 
      <td height="15" class="MenuEsqFundo">&nbsp;</td>
    </tr>
    <?php }?>
    <tr> 
      <td class="MenuEsqDivisor">&nbsp;</td>
    </tr>
    <tr> 
      <td class="MenuEsqFundo_subitem"><a href="#" onClick="extra();" class="MenuEsqEfeito_subitem">Extra</a></td>
      <?php if($_REQUEST['menu_esq1'] == 7 ){?>
    <tr> 
      <td height="15" class="MenuEsqFundo"><a href="lista_campos.php" target="rightFrame" class="MenuEsqEfeitoSubItem">Criar Consulta Alunos</a></td>
    </tr>
    <tr> 
      <td height="15" class="MenuEsqFundo"><a href="lista_campos_escola.php" target="rightFrame" class="MenuEsqEfeitoSubItem">Criar Consulta Escolar.</a></td>
    </tr>
    <tr> 
      <td height="15" class="MenuEsqFundo">&nbsp;</td>
    </tr>
    <?php }?>
    <tr> 
      <td class="MenuEsqDivisor">&nbsp;</td>
    </tr>
    <tr> 
      <td class="MenuEsqFundo_subitem"><a href="#" onClick="posgraduacao();" class="MenuEsqEfeito_subitem">Pos-Grad. Disciplinas</a></td>
      <?php if($_REQUEST['menu_esq1'] == 8 ){?>
    <tr> 
      <td height="15" class="MenuEsqFundo"><a href="pgrad/cad_doc_disc.php" target="rightFrame" class="MenuEsqEfeitoSubItem">Cadastrar 
        Disciplina </a></td>
    </tr>
    <tr> 
      <td height="15" class="MenuEsqFundo"><a href="pgrad/alterar_doc_disc_lista.php" target="rightFrame" class="MenuEsqEfeitoSubItem">Alterar 
        Disc./Docente </a></td>
    </tr></tr>
    <td height="15" class="MenuEsqFundo"><a href="pgrad/seleciona_lista_chamada.php" target="rightFrame" class="MenuEsqEfeitoSubItem">Lista 
      de Chamada</a></td>
    </tr>
    <td height="15" class="MenuEsqFundo"><a href="pgrad/seleciona_lista_nota_disc.php" target="rightFrame" class="MenuEsqEfeitoSubItem">Incluir 
      Notas Disciplinas </a></td>
    </tr>
      <td height="15" class="MenuEsqFundo"><a href="pgrad/seleciona_lista_folha_notas_disc.php" target="rightFrame" class="MenuEsqEfeitoSubItem">Form. 
        Notas </a></td>
    </tr>
    <tr> 
      <td height="15" class="MenuEsqFundo">&nbsp;</td>
    </tr>
    <?php }?>
    <tr> 
      <td class="MenuEsqDivisor">&nbsp;</td>
    </tr>
    <tr> 
      <td class="MenuEsqFundo"><a href="index.php" target="_top" class="MenuEsqEfeito">Sair 
        Intranet</a></td>
    </tr>
    <tr> 
      <td class="MenuEsqDivisor">&nbsp;</td>
    </tr>
  </table>


<!-- PARTE 2 PHP: DEFININDO OS ITENS PRINCIPAIS COM SUBITENS - UTILIZAR CUIDADOSAMENTE, UTILIZE O MANUAL -->

<script language="JavaScript" type="text/JavaScript">
function disciplina(){
    if(document.formmenu_esq.menu_esq1.value != 1 ){
	 	document.formmenu_esq.menu_esq1.value = 1;
     	document.formmenu_esq.submit();
	}else{
		document.formmenu_esq.menu_esq1.value = "";
     	document.formmenu_esq.submit();
	}
}
function alunos(){
    if(document.formmenu_esq.menu_esq1.value != 2 ){
	 	document.formmenu_esq.menu_esq1.value = 2;
     	document.formmenu_esq.submit();
	}else{
		document.formmenu_esq.menu_esq1.value = "";
     	document.formmenu_esq.submit();
	}
}
function matriculas(){
    if(document.formmenu_esq.menu_esq1.value != 3 ){
	 	document.formmenu_esq.menu_esq1.value = 3;
     	document.formmenu_esq.submit();
	}else{
		document.formmenu_esq.menu_esq1.value = "";
     	document.formmenu_esq.submit();
	}
}

function posgraduacao(){
    if(document.formmenu_esq.menu_esq1.value != 8 ){
	 	document.formmenu_esq.menu_esq1.value = 8;
     	document.formmenu_esq.submit();
	}else{
		document.formmenu_esq.menu_esq1.value = "";
     	document.formmenu_esq.submit();
	}
}
function av_doc(){
    if(document.formmenu_esq.menu_esq1.value != 4 ){
	 	document.formmenu_esq.menu_esq1.value = 4;
     	document.formmenu_esq.submit();
	}else{
		document.formmenu_esq.menu_esq1.value = "";
     	document.formmenu_esq.submit();
	}
}
function extensao(){
    if(document.formmenu_esq.menu_esq1.value != 5 ){
	 	document.formmenu_esq.menu_esq1.value = 5;
     	document.formmenu_esq.submit();
	}else{
		document.formmenu_esq.menu_esq1.value = "";
     	document.formmenu_esq.submit();
	}
}
function orgaos(){
    if(document.formmenu_esq.menu_esq1.value != 6 ){
	 	document.formmenu_esq.menu_esq1.value = 6;
     	document.formmenu_esq.submit();
	}else{
		document.formmenu_esq.menu_esq1.value = "";
     	document.formmenu_esq.submit();
	}
}
function extra(){
    if(document.formmenu_esq.menu_esq1.value != 7 ){
	 	document.formmenu_esq.menu_esq1.value = 7;
     	document.formmenu_esq.submit();
	}else{
		document.formmenu_esq.menu_esq1.value = "";
     	document.formmenu_esq.submit();
	}
}
function eventos(){
    if(document.formmenu_esq.menu_esq1.value != 9 ){
	 	document.formmenu_esq.menu_esq1.value = 9;
     	document.formmenu_esq.submit();
	}else{
		document.formmenu_esq.menu_esq1.value = "";
     	document.formmenu_esq.submit();
	}
}
function contatos(){
    if(document.formmenu_esq.menu_esq1.value != 10 ){
	 	document.formmenu_esq.menu_esq1.value = 10;
     	document.formmenu_esq.submit();
	}else{
		document.formmenu_esq.menu_esq1.value = "";
     	document.formmenu_esq.submit();
	}
}
function academica(){
    if(document.formmenu_esq.menu_esq1.value != 11 ){
	 	document.formmenu_esq.menu_esq1.value = 11;
     	document.formmenu_esq.submit();
	}else{
		document.formmenu_esq.menu_esq1.value = "";
     	document.formmenu_esq.submit();
	}
}

</script>
</form>
