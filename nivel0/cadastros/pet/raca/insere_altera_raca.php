<?
session_start();

require_once("../../../../conexao.php");
include("../../../../barra.php");

/*
 ******************************************************************************
 **                                                                          **
 **                                                                          **
 **          MARCELO DE SOUZA TADIM           -         WebMaster            **
 **                                                                          **
 **                                                                          **
 **                                                                          **
 **                      Data de cria��o:  Dez 2007                          **
 **										                                     **
 ******************************************************************************
*/

$txt_raca = $_POST["txt_raca"];
$txt_rad_sel = $_SESSION["rad_sel"];

$sql_consulta = mysql_query("SELECT * FROM combo_raca WHERE raca like '$txt_raca'") or die (mysql_error());

if ($linha = mysql_fetch_array($sql_consulta)) { ?>
<script>
alert ("Aten��o!\nEssa Ra�a j� existe.\n\n")
window.location = "cad_raca.php";
</script>
<? }else{

$sql4 = mysql_query("UPDATE combo_raca SET raca= '$txt_raca' WHERE codigo = '$txt_rad_sel'");


header("Location: cad_raca.php");   
} 

?>