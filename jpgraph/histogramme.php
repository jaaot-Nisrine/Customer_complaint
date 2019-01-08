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
//========================================= trates===================================================
$res=mysql_query("SELECT COUNT(*)  from traitement where NOMAGENCE='DIVISION JURIDIQUE'");
$ligne=mysql_fetch_array($res);
$donnees_t[0]=$ligne[0];

$res=mysql_query("SELECT COUNT(*)  from traitement where NOMAGENCE='EL HAJEB'");
$ligne=mysql_fetch_array($res);
$donnees_t[1]=$ligne[0];

$res=mysql_query("SELECT COUNT(*)  from traitement where NOMAGENCE='EL MENZEH'");
$ligne=mysql_fetch_array($res);
$donnees_t[2]=$ligne[0];

$res=mysql_query("SELECT COUNT(*)  from traitement where NOMAGENCE='ERRACHIDIA'");
$ligne=mysql_fetch_array($res);
$donnees_t[3]=$ligne[0];

$res=mysql_query("SELECT COUNT(*)  from traitement where NOMAGENCE='SIEGE'");
$ligne=mysql_fetch_array($res);
$donnees_t[4]=$ligne[0];

$res=mysql_query("SELECT COUNT(*)  from traitement where NOMAGENCE='AL ISMAILIA'");
$ligne=mysql_fetch_array($res);
$donnees_t[5]=$ligne[0];


$moisFr = array('DIVISION JURIDIQUE', 'EL HAJEB', 'EL MENZEH', 'ERRACHIDIA', 'SIEGE', 'AL ISMAILIA'); 

$largeur = 500;
$hauteur = 400;

// Initialisation du graphique
$graphe = new Graph($largeur, $hauteur);
// Echelle lineaire ('lin') en ordonnee et pas de valeur en abscisse ('text')
// Valeurs min et max seront determinees automatiquement
$graphe->img->SetMargin(40,30,50,40); 
$graphe->setScale("textlin");

// Creation de l'histogramme
$histo = new BarPlot($donnees_t);
// Ajout de l'histogramme au graphique
$graphe->add($histo);

// Ajout du titre du graphique
$graphe->title->set("Histogramme: Traitement des réclamations ");
$graphe->xaxis->SetTickLabels($moisFr); 
// Affichage du graphique
$graphe->stroke();




?>
