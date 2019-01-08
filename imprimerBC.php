<?php
session_start();
require_once('connexion.php');
if (isset($_SESSION['authentification'])){ 
}
else {
header("Location: index.php?erreur=intru"); 
exit;
}


	$numero= $_GET["num"] ;        
	$reqp="select * from ligne where NCOMMANDE='$numero'";
	$resp=mysql_query($reqp);
	$ligne=mysql_fetch_array($resp);
	$qte=$ligne["QUANTITE"];
	$des=$ligne["DESIGNATION"];
	$pu=$ligne["PRIXUNITAIRE"];
	$obj=$ligne["OBJET"];
	$pt=$pu*$qte;
	$th=$pt;
	$tva=$th*0.2;
	$ttc=$th+$tva;
	
	   
	$reqd="select * from bon_commande where NCOMMANDE='$numero'";
	$resd=mysql_query($reqd);
	$ligned=mysql_fetch_array($resd);
	$dat=$ligned["DATEBC"];
	$pres=$ligned["IDPRESTATAIRE"];
 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Al-omrane</title>
<script type="text/javascript">
 window.print() ;
 </script>
</head>

<body>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="1000" height="309" border="0" align="center">
  <tr>
    <td width="459"><p><img src="resources/images/alomrane-mekn-s-2.png.jpg" width="156" height="77" /></p>
    <p>D. Système d'Information</p></td>
    <td width="171" align="right">&nbsp;</td>
    <td width="156" align="right">&nbsp;</td>
    <td width="196" align="right"><p>ROYAUME DU MAROC</p>
    <p>Le : <?php echo $dat; ?></p></td>
  </tr>
  <tr>
    <td colspan="4" align="center"><strong>BON DE COMMANDE  N° <?php echo $numero; ?> / 2016</strong></td>
  </tr>
  <tr>
    <td colspan="4">Objet:  <?php echo $obj; ?></td>
  </tr>
   </table>
  <table width="1000" height="309" border="1" align="center">
  <tr>
    <td colspan="4">Prestataire: <?php echo $pres; ?></td>
  </tr>
  <tr>
    <td><p>Désignation
      </p></td>
    <td>Qté</td>
    <td>PU / DH</td>
    <td>PT / DH</td>
  </tr>
  <tr>
    <td height="39"><?php echo $des; ?></td>
    <td align="right"><?php echo $qte; ?></td>
    <td align="right"><?php echo $pu; ?></td>
    <td align="right"><?php echo $pt; ?></td>
  </tr>
  <tr>
    <td height="53" colspan="3" align="right"><strong>TOTAL HT</strong></td>
    <td align="right"><?php echo $th; ?></td>
  </tr>
  <tr>
    <td height="53" colspan="3" align="right"><strong>TVA 20%</strong></td>
    <td align="right"><?php echo $tva; ?></td>
  </tr>
  <tr>
    <td height="53" colspan="3" align="right"><strong>TOTAL TTC</strong></td>
    <td align="right"><?php echo $ttc; ?></td>
  </tr>
        <tr>
    <td height="53" colspan="4" align="left"><p>Arrêté le présent bon de commande à la somme de :----------------------------------------------------------------------------------------- Dirhams</p>
      <p><strong>Modalités d'exécution</strong></p>
      <p>- délai d'exécution : 3 semaines après notification de l'ordre de service de commancer les traveaux.</p>
      <p>- Pénalités de retard : 500 dhs/jour calendaire.</p>
      <p><strong>Mode de règelement:</strong></p>
      <p>- Paiment après la réception.</p></td>
    </tr>
      <tr>
    <td height="53" colspan="4" align="left"><hr><p>Rue Ibn Sina, BP 253</p>
      <p>Tél.: L.G : +(212)05.35.52.55.55 - Fax :+(212)05.35.51.04.40</p>
      <p>Site web: www.alomrane.ma</p>
      <p>S.A. au capitale de 222.147.100 DH. RC Meknès 26139 - IF 04102372 - Patente 17490164</p></td>
    </tr>
</table>
                      
                  
</body>
</html>