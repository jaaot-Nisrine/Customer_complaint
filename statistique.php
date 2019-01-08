<?php
session_start();
require_once('connexion.php');
if (isset($_SESSION['authentification'])){ 
}
else {
header("Location: index.php?erreur=intru"); 
exit;
}
   if(isset($_POST["afficher"]))
 {
	$numero= $_POST["numero"] ;        
	$dat= $_POST["dat"] ;  
	header("Location: imprimerPVnotification.php?numero=$numero&dat=$dat");         

 }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
		<title>Al-omrane</title>
		
		<!--                       CSS                       -->
	  
		<!-- Reset Stylesheet -->
		<link rel="stylesheet" href="resources/css/reset.css" type="text/css" media="screen" />
	  
		<!-- Main Stylesheet -->
		<link rel="stylesheet" href="resources/css/style.css" type="text/css" media="screen" />
		
		<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
		<link rel="stylesheet" href="resources/css/invalid.css" type="text/css" media="screen" />	
		
		<!-- Colour Schemes
	  
		Default colour scheme is green. Uncomment prefered stylesheet to use it.
		
		<link rel="stylesheet" href="resources/css/blue.css" type="text/css" media="screen" />
		
		<link rel="stylesheet" href="resources/css/red.css" type="text/css" media="screen" />  
	 
		-->
		
		<!-- Internet Explorer Fixes Stylesheet -->
		
		<!--[if lte IE 7]>
			<link rel="stylesheet" href="resources/css/ie.css" type="text/css" media="screen" />
		<![endif]-->
		
		<!--                       Javascripts                       -->
  
		<!-- jQuery -->
		<script type="text/javascript" src="resources/scripts/jquery-1.3.2.min.js"></script>
		
		<!-- jQuery Configuration -->
		<script type="text/javascript" src="resources/scripts/simpla.jquery.configuration.js"></script>
		
		<!-- Facebox jQuery Plugin -->
		<script type="text/javascript" src="resources/scripts/facebox.js"></script>
		
		<!-- jQuery WYSIWYG Plugin -->
		<script type="text/javascript" src="resources/scripts/jquery.wysiwyg.js"></script>
		
		<!-- jQuery Datepicker Plugin -->
		<script type="text/javascript" src="resources/scripts/jquery.datePicker.js"></script>
		<script type="text/javascript" src="resources/scripts/jquery.date.js"></script>
		<!--[if IE]><script type="text/javascript" src="resources/scripts/jquery.bgiframe.js"></script><![endif]-->

		
		<!-- Internet Explorer .png-fix -->
		
		<!--[if IE 6]>
			<script type="text/javascript" src="resources/scripts/DD_belatedPNG_0.0.7a.js"></script>
			<script type="text/javascript">
				DD_belatedPNG.fix('.png_bg, img, li');
			</script>
		<![endif]-->
		
	</head>
  
	<body><div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
	  <div id="sidebar">
	    <div id="sidebar-wrapper" >
	      <!-- Sidebar with logo and menu -->
	      <h1 id="sidebar-title"><a href="#">Simpla Admin</a></h1>
	      <!-- Logo (221px wide) -->
	      <a href="accueil.php">
	        <center>
	          <img id="logo" src="resources/images/logo.png" alt=""  />
          </center>
	      </a>
	      <p><a href="accueil.php">          </a>
	        <!-- Sidebar Profile links --></p>
	      <p><a href="index.php?erreur=logout"><img src="resources/images/icons/deconnexion.png" alt="" /></a><!-- End #main-nav -->
	        </p>
	      <div id="messages" style="display: none">
	        <!-- Messages are shown when a link with these attributes are clicked: href="#messages" rel="modal"  -->
	        <h3>3 Messages</h3>
	        <p> <strong>17th May 2009</strong> by Admin<br />
	          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue. <small><a href="#" class="remove-link" title="Remove message">Remove</a></small> </p>
	        <p> <strong>2nd May 2009</strong> by Jane Doe<br />
	          Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est. <small><a href="#" class="remove-link" title="Remove message">Remove</a></small> </p>
	        <p> <strong>25th April 2009</strong> by Admin<br />
	          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue. <small><a href="#" class="remove-link" title="Remove message">Remove</a></small> </p>
	        <form action="#" method="post">
	          <h4>New Message</h4>
	          <fieldset>
	            <textarea class="textarea" name="textfield" cols="79" rows="5"></textarea>
              </fieldset>
	          <fieldset>
	            <select name="dropdown" class="small-input">
	              <option value="option1">Send to...</option>
	              <option value="option2">Everyone</option>
	              <option value="option3">Admin</option>
	              <option value="option4">Jane Doe</option>
                </select>
	            <input class="button" type="submit" value="Send" />
              </fieldset>
            </form>
          </div>
	      <!-- End #messages -->
        </div>
      </div>
	  <!-- End #sidebar -->
		
		<div id="main-content"> <!-- Main Content Section with everything -->
			
        <form id="form1" method="post" action="">
			
		  <!-- Page Head -->
		  <h2>Gestion des r&eacute;clamations</h2>
		  <ul class="shortcut-buttons-set">
		    <li><a class="shortcut-button" href="agence.php"><span> <img src="resources/images/agence.png" alt="icon" width="80" height="80" /><br />
		      Agence </span></a></li>
		    <li><a class="shortcut-button" href="produit.php"><span> <img src="resources/images/produit.png" alt="icon" width="80" height="80" /><br />
		      Produit </span></a></li>
		    <li><a class="shortcut-button" href="nature.php"><span> <img src="resources/images/nature.png" alt="icon" width="80" height="80" /><br />
		      Nature de la r&eacute;clamation </span></a></li>
		    <li><a class="shortcut-button" href="client.php"><span> <img src="resources/images/client.png" alt="icon" width="80" height="80" /><br />
		      Client </span></a></li>
		    <li><a class="shortcut-button" href="reclamation.php"><span> <img src="resources/images/reclamation.png" alt="icon" width="80" /><br />
		      R&eacute;clamation</span></a></li>
		    <li><a class="shortcut-button" href="traitement.php"><span> <img src="resources/images/traitement.png" alt="icon" width="80" /><br />
		      Traitement </span></a></li>
		    <li><a class="shortcut-button" href="statistique.php"><span> <img src="resources/images/statistiques.png" alt="icon" width="80" /><br />
		      Statistiques </span></a></li>
		    <li><a class="shortcut-button" href="utilisateur.php"><span> <img src="resources/images/utilisateurs.png" alt="icon" width="80" /><br />
		      Utilisateur </span></a></li>
	      </ul>
		  <!-- End .shortcut-buttons-set -->
			
		  <div class="clear"></div> <!-- End .clear -->
			
			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Statistiques</h3>
					<ul class="content-box-tabs">
					  <li><a href="#rechercher" class="default-tab">SECTEUR</a></li>
                    <li><a href="#ajouter">Histogramme reclamation traitées</a></li>
                    <li><a href="#modifier">Histogramme réclamations non traitées</a></li>
				  </ul>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
                <div class="tab-content default-tab" id="rechercher">
                
                
                <iframe name="graphe" src="jpgraph/secteur.php" width="500" height="600">
 </iframe>		
                
                
 
                </div>            <!-- End #rechercher -->
                      
                                
      <div class="tab-content" id="ajouter"> <!-- This is the target div. id must match the href of this div's tab -->

      		<iframe name="grapheSecteur" src="jpgraph/histogramme.php" width="500" height="600">
 </iframe>	
      </div> 
      <div class="tab-content" id="modifier"> <!-- This is the target div. id must match the href of this div's tab -->

      		<iframe name="grapheSecteur" src="jpgraph/histogramment.php" width="500" height="600">
 </iframe>	
      </div> 
      <!-- End #ajouter -->
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
			
			
		  <div class="clear"></div>
			
			
			<!-- Start Notifications -->

			<!-- End Notifications -->
			
			<div id="footer">
				<small> 
						&#169; Copyright 2016  | Webmaster <a href="#">J.Nisrine </a> | <a href="#">En haut</a>
				</small>
			</div><!-- End #footer -->
			</form>
		</div> <!-- End #main-content -->
		
	</div></body>
  


</html>
