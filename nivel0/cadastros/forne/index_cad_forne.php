<?
session_start();

include("../../../include/arruma_link.php");
include($pontos."barra.php");
include($pontos."conexao.php");

$usuario = $_SESSION["sessao_login"];
$nivel = $_SESSION["sessao_nivel"];

if ($nivel ==1){$nivel_conv="Usu�rio";}
if ($nivel ==2){$nivel_conv="Gerente";}
if ($nivel ==3){$nivel_conv="Administrador";}

// APAGA OS DADOS DAS VARIVEIS

$_SESSION["rad_sel_visl"] ="";
$_SESSION["rad_animal_clie"] ="";
$_SESSION["checa_retorno"] ="";
$_SESSION["rad_clie"] ="";
$_SESSION["retorno"] ="";

//APAGA DADOS TAB_TEMP_CLIE
$sql_ref = mysql_query("SELECT * FROM `tab_temp_fornecedor` WHERE user_cadastro='$usuario'") or die("erro ao selecionar1");

if ($linha_ref = mysql_fetch_array($sql_ref)) {
//APAGA DADOS TEMPORARIOS TABELA CLIENTE
$sql1 = "DELETE FROM `tab_temp_fornecedor` WHERE `user_cadastro` = '$usuario'";
$resultado1 = mysql_query($sql1) or die ("Problema no Delete tab_temp_clie - SQL1");
}

$select = 3;
?>
<html>
<head>
<title>PetLivre - Sistema para Gerenciamento de Petshop  </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="<?=$pontos;?>css/config.css" type="text/css">
</head>
<body>
<table width="740" height="420" border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td height="102" colspan="2" valign="top"><? include($pontos."include/titulo_cima.php"); ?></td>
  </tr>
  <tr>
    <td width="150" height="280" valign="top"><? include ($pontos."include/menu.php"); ?></td>
    <td width="589" valign="top"><div align="center"><?php  include($pontos."include/menu_cadastros.php"); ?>
	<? include("lista_forne.php"); ?></div></td>
  </tr>
  <tr>
    <td height="20" colspan="2" valign="top"><div align="center">
      <? include ($pontos."include/rodape.php"); ?>
    </div></td>
  </tr>
</table>
</body>
</html>
