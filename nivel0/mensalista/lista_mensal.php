<?php
// limpa vari�veis
$cod_produto="";
$txt_produto ="";

$data_atual = Convert_Data_Port_Ingl($data_atual2);

//pagina��o
$total_reg = "10"; 

$pagina = $_GET["pagina"];

if(!$pagina) {
$pc = "1";
} else {
$pc = $pagina;
}

$numero_links = "8";
// intevalo revebe o valor da variavel numero_links
$intervalo = $numero_links;
// inicio recebe pc - 1 para montamos o sql
$inicio = $pc-1;
$inicio = $inicio*$total_reg;
// fazemos a conex�o


echo '<script type="text/javascript" src="'.$pontos.'js/outros.js"></script>';


$dia_mes = date("d");// Coleta o dia do m�s
$mes_num = date("m"); // Nome do m&ecirc;s em n&uacute;mero. Ex.: 01 => January, 02 => February
$ano = date("Y");// Coleta o ano corrente

$mes_port = $mes_num; // Atribui&ccedil;&atilde;o de vari&aacute;veis

switch($mes_port){
case $mes_port == 01 or $mes_port == 1: $mes_conv="janeiro";break;
case $mes_port == 02 or $mes_port == 2: $mes_conv="fevereiro";break;
case $mes_port == 03 or $mes_port == 3: $mes_conv="mar�o";break;
case $mes_port == 04 or $mes_port == 4: $mes_conv="abril";break;
case $mes_port == 05 or $mes_port == 5: $mes_conv="maio";break;
case $mes_port == 06 or $mes_port == 6: $mes_conv="junho";break;
case $mes_port == 07 or $mes_port == 7: $mes_conv="julho";break;
case $mes_port == 08 or $mes_port == 8: $mes_conv="agosto";break;
case $mes_port == 09 or $mes_port == 9: $mes_conv="setembro";break;
case $mes_port == 10: $mes_conv="outubro";break;
case $mes_port == 11: $mes_conv="novembro";break;
case $mes_port == 12: $mes_conv="dezembro";break;
}


?>
<script type="text/javascript" src="../../js/func_caixa.js"></script>
<form method="POST" enctype="multipart/form-data" name="form">
  <table width="585" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="5" colspan="5">
	  
	  <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
          <tr bgcolor="#66CC66">
            <td height="22" colspan="4" align="center" bordercolor="#333333" bgcolor="#CCCCCC"><div align="center" class="style3">
              <p><strong>Mensalistas - <?php echo $dia_mes;?> de <? echo $mes_conv;?> de <? echo $ano;?></strong></p>
            </div></td>
          </tr>
          <tr bordercolor="#CC0000" bgcolor="#00FFFF" class="cabec_style11">
            <td width="35" height="20" bordercolor="#FFFFFF"><div align="center" >N&ordm;</div></td>
            <td width="272" height="20" bordercolor="#FFFFFF"><div align="center" >Produto</div></td>
            <td width="166" bordercolor="#FFFFFF"><div align="center">Mensalista</div></td>
            <td width="97" bordercolor="#FFFFFF"><div align="center">Valor</div></td>
          </tr>
<?php
	    $sql_somatoria = mysql_query("SELECT * FROM tab_mensalista WHERE status=0 and data_banho='$data_atual'");
		while($linha_somatoria = mysql_fetch_array($sql_somatoria)) {
		$txt_valor1 = $linha_somatoria['valor'];
		$total1 += $txt_valor1;
		}


    
 // Faz o Select pegando o registro inicial at&eacute; a quantidade de registros para p&aacute;gina
    $sql_registros = mysql_query("SELECT * FROM tab_mensalista WHERE status=0 and data_banho='$data_atual' ORDER BY id ASC LIMIT $inicio, $total_reg");

// Serve para contar quantos registros voc&ecirc; tem na seua tabela para fazer a pagina&ccedil;&atilde;o
    $sql_conta = mysql_query("SELECT * FROM tab_mensalista WHERE status=0 and data_banho='$data_atual'");
    $quantreg = mysql_num_rows($sql_conta); // Quantidade de registros pra pagina&ccedil;&atilde;o
    
 $tp = ceil($quantreg/$total_reg);    
   
$cor="#FFFFFF";
$nro =0;
while($linha_ref = mysql_fetch_array($sql_registros)) {

$cod = $linha_ref['id'];
$txt_cod_produto = $linha_ref['cod_produto'];
$txt_produto = $linha_ref['produto'];
$txt_cod_pet = $linha_ref['cod_pet'];
$txt_mensalista = $linha_ref['mensalista'];
$txt_valor = $linha_ref['valor'];

$cor=($cor=="#E6E6E6") ? "#FFFFFF": "#E6E6E6"; 
$nro++;




?>
          <tr bgcolor="<?=($cor=="#E6E6E6") ? "#FFFFFF": "#E6E6E6"; 
?>" class="info" onmouseover="this.style.backgroundColor='#66FF66'" onmouseout="this.style.backgroundColor='<?=($cor=="#FFFFFF") ? "#E6E6E6": "#FFFFFF"; 
?>'">
            <td width="35" height="5" class="info"><div align="center">&nbsp;<? echo $nro; ?></div></td>
            <td width="272" height="5" class="info"><div align="center">&nbsp;
<?php
echo '<font color="#0000FF">'.$txt_produto.'</font>';
?></div></td>
            <td width="166" class="info"><div align="center"><? echo $txt_mensalista; ?></div></td>
            <td width="97" class="info"><div align="center">&nbsp;<? echo number_format($txt_valor, 2, ',','.'); ?></div></td>
            <?php }
if ($quantreg==""){

echo '<tr><td height="45" colspan="6"><font color="#5F8FBF"><div align="center"><b>&nbsp;N&atilde;o h&aacute; registros</b></font></div></td>';}
?>
          </tr>
        </table>
		
          <table width="560" border="0" cellpadding="1" cellspacing="1">
        </table></td>
      <td height="5" colspan="5" class="info"><br /></td>
    </tr>
    <tr>
      <td height="10" colspan="10"><? if ($quantreg >=10){
echo "<div align='center'><font size='1' color='#cccccc' face='Verdana'>";
echo "P&aacute;gina: $pc de $tp &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; registros: $quantreg";
echo "</font></div>";
}
?>
        </td>
    </tr>
    <tr>
      <td height="20" colspan="5"><table width="560" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="175" class="info"><div align="center"><font size="2"><a href="javascript:cad_entrada_mensal()">Inserir</a></font></div></td>
            <td width="218" class="info"><div align="center"></div></td>
            <td width="135" colspan="3" class="info"><div align="center"><font color="#FFFFFF">
			<? echo number_format($total1, 2, ',','.');?></font></div></td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td height="20" colspan="5"><div align="center">       <? // Chama o arquivo que monta a pagina&ccedil;&atilde;o
if ($quantreg >=10){include("paginacao.php");}
?>
</div></td>
    </tr>
  </table>
</form>
<?php @mysql_close(); 
//print_r($data_atual);die();

?>
