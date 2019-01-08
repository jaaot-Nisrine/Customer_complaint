<?php
session_start();
if (isset($_SESSION['authentification'])){ 
}
else {
header("Location: index.php?erreur=intru"); 
exit;
}
require_once("include_path_inc.php");
require_once("jpgraph.php");
require_once("jpgraph_bar.php");
require_once('../connexion.php');

$donnees_t = array(0,0,0,0,0,0); 
$donnees_nt = array(0,0,0,0,0,0); 


//========================================= non trates ===================================================
$res=mysql_query("SELECT COUNT(*)  from reclamation where NOMAGENCE='DIVISION JURIDIQUE'");
$ligne=mysql_fetch_array($res);
$donnees_nt[0]=$ligne[0];

$res=mysql_query("SELECT COUNT(*)  from reclamation where NOMAGENCE='EL HAJEB'");
$ligne=mysql_fetch_array($res);
$donnees_nt[1]=$ligne[0];

$res=mysql_query("SELECT COUNT(*)  from reclamation where NOMAGENCE='EL MENZEH'");
$ligne=mysql_fetch_array($res);
$donnees_nt[2]=$ligne[0];

$res=mysql_query("SELECT COUNT(*)  from reclamation where NOMAGENCE='ERRACHIDIA'");
$ligne=mysql_fetch_array($res);
$donnees_nt[3]=$ligne[0];

$res=mysql_query("SELECT COUNT(*)  from reclamation where NOMAGENCE='SIEGE'");
$ligne=mysql_fetch_array($res);
$donnees_nt[4]=$ligne[0];

$res=mysql_query("SELECT COUNT(*)  from reclamation where NOMAGENCE='AL ISMAILIA'");
$ligne=mysql_fetch_array($res);
$donnees_nt[5]=$ligne[0];


$moisFr = array('DIVISION JURIDIQUE', 'EL HAJEB', 'EL MENZEH', 'ERRACHIDIA', 'SIEGE', 'AL ISMAILIA'); 

$largeur = 500;
$hauteur = 400;






// Initialisation du graphique
$graphent = new Graph($largeur, $hauteur);
// Echelle lineaire ('lin') en ordonnee et pas de valeur en abscisse ('text')
// Valeurs min et max seront determinees automatiquement
$graphent->img->SetMargin(40,30,50,40); 
$graphent->setScale("textlin");

// Creation de l'histogramme
$histont = new BarPlot($donnees_nt);
// Ajout de l'histogramme au graphique
$graphent->add($histont);

// Ajout du titre du graphique
$graphent->title->set("Histogramme: Reclamation non traitees ");
$graphent->xaxis->SetTickLabels($moisFr); 
// Affichage du graphique
$graphent->stroke();
?>
