<?php
session_start();
require_once('connexion.php');
if (isset($_SESSION['authentification'])){ 
}
else {
header("Location: index.php?erreur=intru"); 
exit;
}
//--------- afficher    -----------------
if(isset($_POST["afficher"]))
{
	$_SESSION['annees']=$_POST["annees"];
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		
		<title>Hopital-accueil</title>
		
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
		
		<div id="sidebar"><div id="sidebar-wrapper" > <!-- Sidebar with logo and menu -->
			
			<h1 id="sidebar-title"><a href="#">Simpla Admin</a></h1>
		  
			<!-- Logo (221px wide) -->
			<a href="accueil.php"><center><img id="logo" src="resources/images/logo.png" alt=""  /></center></a>
		  
			<!-- Sidebar Profile links -->
			        
			
			<ul id="main-nav">  <!-- Accordion Menav-top-itemnu -->
				

				
				<li> 
					<a href="#"  class="nav-top-item"> <!-- Add the class "current" to current menu item -->
					Spécialité
					</a>
					<ul>
                     <?php  if ($_SESSION['privilege'] == "admin") { ?>
						<li><a class="current" href="specialite.php">Ajouter spécialité</a></li>
						<li><a  href="specialite.php">Modifier spécialité </a></li> 
						<li><a href="specialite.php">Supprimer spécialité</a></li>
                         <?php  } ?>
						<li><a href="specialite.php">Rechercher spécialité</a></li>
					</ul>
				</li>
				
				<li>
					<a href="#" class="nav-top-item">
						Medecin
					</a>
					<ul>
                     <?php  if ($_SESSION['privilege'] == "admin") { ?>
						<li><a href="medecin.php">Ajouter Medecin</a></li>
						<li><a  href="medecin.php">Modifier Medecin </a></li> 
						<li><a href="medecin.php">Supprimer Medecin</a></li>
                        <?php  } ?>
						<li><a href="medecin.php">Rechercher Medecin</a></li>
					</ul>
				</li>
				
				<li>
					<a href="#" class="nav-top-item">
						Maladie / Symptomes
					</a>
					<ul>
                     <?php  if ($_SESSION['privilege'] == "admin") { ?>
						<li><a href="maladie.php">Nouvelle maladie</a></li>
						<li><a href="symptome.php">Nouveau symptome</a></li>
                        <?php  } ?>
                        <li><a href="maladie.php">Liste  maladies</a></li>
						<li><a href="symptome.php">Liste des symptomes par maladie </a></li>
					</ul>
				</li>
				
				<li>
					<a href="#" class="nav-top-item">
						Patient
					</a>
					<ul>
						<li><a href="patient.php">Ajouter Patient</a></li>
						<li><a  href="patient.php">Modifier Patient </a></li>
						<li><a href="patient.php">Rechercher Patient</a></li>
					</ul>
				</li>
				
				<li>
					<a href="#"  class="nav-top-item current">
						Rendez-vous
					</a>
					<ul>
						<li><a href="rdv.php">Prendre Rendez-vous</a></li>
						<li><a href="rdv.php">Annuler Rendez-vous </a></li> 
						<li><a href="rdv.php">Modifier Rendez-vous</a></li>
						<li><a href="rdv.php">Rechercher RDV / Patient</a></li>
                        <li><a href="rdv.php">Liste RDV / Date</a></li>
					</ul>
				</li>      
            <?php if ($_SESSION['privilege'] == "Medecin") { ?>
	        <li> <a href="consultation.php" class="nav-top-item"> Consultation m&eacute;dical </a>
	          <ul>
	            <li><a href="consultation.php">Cr&eacute;er dossier m&eacute;dical</a></li>
	            <li><a href="consultation.php">Consulter dossier m&eacute;dical</a></li>
	            <li><a href="consultation.php">Liste Consultations</a></li>
              </ul>
            </li>
             <?php } ?> 
             <?php  if ($_SESSION['privilege'] == "admin") { ?>

	        <li> <a href="utilisateur.php" class="nav-top-item"> Gestion des utilisateurs </a>
	          <ul>
	            <li><a href="utilisateur.php">Cr&eacute;er utilisateur</a></li>
	            <li><a href="utilisateur.php">Supprimer utilisateur</a></li>
              </ul>
            </li>
            <?php } ?>
                <li>
                	<a href="index.php?erreur=logout"><img src="resources/images/icons/deconnexion.png" /></a>
				</li>
		  </ul> <!-- End #main-nav -->
			

			
		</div></div> <!-- End #sidebar -->
		
		<div id="main-content"> <!-- Main Content Section with everything -->
			

			
		  <!-- Page Head -->
			<h2>Administration Hôpital</h2>
			
			<ul class="shortcut-buttons-set">
				
				<li><a class="shortcut-button" href="specialite.php"><span>
                	<img src="resources/images/icons/pencil_48.png" alt="icon" /><br />
					Spécialité
			  </span></a></li>
				
				<li><a class="shortcut-button" href="medecin.php"><span>
					<img src="resources/images/icons/paper_content_pencil_48.png" alt="icon" /><br />
					Medecin
			  </span></a></li>
				<li><a class="shortcut-button" href="maladie.php"><span>
					<img src="resources/images/icons/image_add_48.png" alt="icon" /><br />
					Maladie<br />Symptomes
				</span></a></li>
			  <li><a class="shortcut-button" href="patient.php"><span>
					<img src="resources/images/icons/patient.png" alt="icon" /><br />
					Patient
			  </span></a></li>
				
				<li><a class="shortcut-button" href="rdv.php"><span>
					<img src="resources/images/icons/clock_48.png" alt="icon" /><br />
					Rendez-vous
			  </span></a></li>
				 <?php  if ($_SESSION['privilege'] == "Medecin") { ?>
				<li><a class="shortcut-button" href="consultation.php"><span>
					<img src="resources/images/icons/comment_48.png" alt="icon" /><br />
					Consultation
			  </span></a></li><?php  } ?>
              				<li><a class="shortcut-button" href="agenda.php"><span>
					<img src="resources/images/icons/agenda.jpg" alt="icon" /><br />
					Agenda
			  </span></a></li>
                                             <li><a class="shortcut-button" href="graphique.php"><span>
					<img src="resources/images/icons/graphique.png" alt="icon" /><br />
					Statistiques
			  </span></a></li>
				 
		  </ul><!-- End .shortcut-buttons-set -->
			
			<div class="clear"></div> <!-- End .clear -->
			
			<div class="content-box"><!-- Start Content Box -->
            <form id="form1" method="post" action="">

                <div class="content-box-header">
					
					<h3>Statistiques</h3>
					
					<ul class="content-box-tabs">
						<li><a href="#Histogramme" class="default-tab">Histogramme</a></li>
						<li><a href="#Secteur">Secteur</a></li>
                      <!-- <li><a href="#supprimer">Supprimer</a></li> -->
					</ul>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
            
<div class="content-box-content">


  				
		  <div class="tab-content default-tab" id="Histogramme"> <!-- This is the target div. id must match the href of this div's tab -->
      <table width="200" border="1">
      <tr>
        <td>Choisir une année : </td>
        <td>			<select name="annees" id="select">
                        <?php for($i=2000;$i<=2020;$i++){ ?>
						  <option value="<?php echo $i?>"><?php echo $i?></option>
                          <?php }?>
                          </select>
           				 <input type="submit" name="afficher" id="afficher" value="afficher" />
          </td>
      </tr>

    </table>

		<iframe name="graphe" src="jpgraph/histogramme.php" width="500" height="600">
 </iframe>		
						
						
			</div> 
					<!-- End #rechercher -->
                
      <div class="tab-content" id="Secteur"> <!-- This is the target div. id must match the href of this div's tab -->

      		<iframe name="grapheSecteur" src="jpgraph/secteur.php" width="500" height="600">
 </iframe>	
      </div> 
      <!-- End #ajouter -->
      <div class="tab-content" id="modifier">
        
      </div>
      <!-- End #modifier --> 
  
					
			  </div> <!-- End .content-box-content -->
				</form>
			</div> <!-- End .content-box -->
			
			
		  <div class="clear"></div>
			
			
			<div id="footer">
				<small> 
						&#169; Copyright 2016  | Webmaster <a href="#">Chaimae Benabdelhak</a> | <a href="#">En haut</a>
				</small>
			</div><!-- End #footer -->
			
		</div> <!-- End #main-content -->
		
	</div>
	</body>
  


</html>
