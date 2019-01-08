<?php
 // --- Inclure les bibliotheques
 require 'jpgraph.php';
 require 'jpgraph_pie.php';
 require_once('../connexion.php');
 //===================================================
 $donnees = array(0,0,0,0,0,0,0); 

$res=mysql_query("SELECT COUNT(*) from reclamation  where N=1");
$ligne=mysql_fetch_array($res);
$donnees[0]=$ligne[0];

$res=mysql_query("SELECT COUNT(*) from reclamation  where N=2");
$ligne=mysql_fetch_array($res);
$donnees[1]=$ligne[0];

$res=mysql_query("SELECT COUNT(*) from reclamation  where N=3");
$ligne=mysql_fetch_array($res);
$donnees[2]=$ligne[0];

$res=mysql_query("SELECT COUNT(*) from reclamation  where N=4");
$ligne=mysql_fetch_array($res);
$donnees[3]=$ligne[0];

$res=mysql_query("SELECT COUNT(*) from reclamation  where N=5");
$ligne=mysql_fetch_array($res);
$donnees[4]=$ligne[0];

$res=mysql_query("SELECT COUNT(*) from reclamation  where N=6");
$ligne=mysql_fetch_array($res);
$donnees[5]=$ligne[0];

$res=mysql_query("SELECT COUNT(*) from reclamation  where N=7");
$ligne=mysql_fetch_array($res);
$donnees[6]=$ligne[0];

$legende = array('PLOMBERIE',  'MENUISERIE','GROS ŒUVRES', 'PEINTURE', 'ASSAINISSEMENT', 'COMMERCIAL ET DIVERS', 'JURIDIQUE'); 
 
 //======================================================
 // --- Creer le conteneur graphique
 $graph = new PieGraph(500, 200);
 // --- Creer le diagramme a secteurs
 $camembert = new PiePlot($donnees);
 $camembert->SetLegends($legende);
 // --- Ajouter le camembert au graphique
 $graph->Add($camembert);
 // --- Choisir le format d'image
 $graph->img->SetImgFormat("png");
 // --- Envoyer au navigateur
 $graph->Stroke();
?>