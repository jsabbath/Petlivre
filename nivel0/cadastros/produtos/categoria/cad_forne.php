<?
session_start();

include("../../../include/arruma_link.php");
include($pontos."barra.php");
include($pontos."conexao.php");
include("checagem/func_data.php");

$usuario = $_SESSION["sessao_login"];
$nivel = $_SESSION["sessao_nivel"];

$rad_sel_visl = $_SESSION["rad_sel_visl"];
$retorno = $_SESSION["retorno"];

if (empty($rad_sel_visl)){$rad_sel_visl = $_GET["id"];}
if (empty($retorno)){$retorno = $_GET["ret"];}

if (empty($rad_sel_visl)){
//echo "Entrou 1";
$checa_retorno ='cad_forne';
include("checagem/variaveis_tab_temp_forne.php");
}else{
//echo "Entrou 2";
$checa_retorno ='alt_forne';
include("checagem/variaveis_tab_forne.php");
}

// SETA AS SESS�ES
$_SESSION["rad_sel_visl"]=$rad_sel_visl;
$_SESSION["checa_retorno"]=$checa_retorno;
$_SESSION["retorno"]=$retorno;



if ($nivel ==1){$nivel_conv="Usu�rio";}
if ($nivel ==2){$nivel_conv="Gerente";}
if ($nivel ==3){$nivel_conv="Administrador";}

?>
<html>
<head>
<title>PetLivre - Sistema para Gerenciamento de Petshop (Pet)</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="<?=$pontos;?>css/config.css" type="text/css">
<script type="text/javascript" src="<?=$pontos;?>js/func_cad_forne.js"></script>
</head>
<body>
<table width="740" height="420" border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td height="102" colspan="2" valign="top"><? include($pontos."include/titulo_cima.php"); ?></td>
  </tr>
  <tr>
    <td width="140" height="282" valign="top"><? include ($pontos."include/menu.php"); ?></td>
    <td width="593" valign="top">
      <div align="right">
        <? include("form_cad_forne.php"); ?>
    </div></td>
  </tr>
  <tr>
    <td height="20" colspan="2" valign="top"><div align="center">
      <? include ($pontos."include/rodape.php"); ?>
    </div></td>
  </tr>
</table>
</body>
</html>