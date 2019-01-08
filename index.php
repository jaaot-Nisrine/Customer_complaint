<?php
session_start();
require_once('connexion.php');
if (isset($_POST['login'])){ 
	$login =$_POST['login']; 
	$pass = sha1($_POST['pass']); 
    $verif_query = "SELECT * FROM membres WHERE login='$login' AND pass='$pass'"; 
    $verif = mysql_query($verif_query);
    $row_verif = mysql_fetch_assoc($verif);
    $utilisateur = mysql_num_rows($verif);

	
	if ($utilisateur) {	
	    $_SESSION['authentification'] = 1; 
		$_SESSION['privilege'] = $row_verif['privilege']; 
		$_SESSION['nom'] = $row_verif['nom'];
		$_SESSION['prenom'] = $row_verif['prenom'];
		$_SESSION['login'] = $row_verif['login'];
		$_SESSION['pass'] = $row_verif['pass'];
		
		header("Location: accueil.php?"); 
		exit;
}
	else {
		header("Location: index.php?erreur=login"); 
		exit;
	}
}


// GESTION DE LA Déconnexion
if (isset($_GET['erreur']) && $_GET['erreur'] == 'logout'){ 
header("Location: index.php?erreur=delog");
exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		
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
		
		<!-- Internet Explorer .png-fix -->
		
		<!--[if IE 6]>
			<script type="text/javascript" src="resources/scripts/DD_belatedPNG_0.0.7a.js"></script>
			<script type="text/javascript">
				DD_belatedPNG.fix('.png_bg, img, li');
			</script>
		<![endif]-->
		
	</head>
  
	<body id="login">
		
		<div id="login-wrapper" class="png_bg">
		  <div id="login-top">
			
			<h1>Simpla Admin</h1>
			  <!-- Logo (221px width) --><img src="resources/images/img_regions.jpg" alt="" width="229" height="129" />
			</div> 
			<!-- End #logn-top -->
			
			<div id="login-content">
				
			  <form method="post" action="" name="form1">
				
					<div class="notification information png_bg">
						<div>Authentification</div>
					</div>
					
					<p>
						<label>Login</label>
						<input type="text" class="text-input" id="login" name="login" />
					</p>
					<div class="clear"></div>
					<p>
						<label>Mot de passe</label>
						<input type="password" class="text-input" id="pass" name="pass" />
					</p>
					<div class="clear"></div>

				  <div class="clear"></div>
					<p>
						<input type="submit" class="button" id="connecter" value="Connecter" />
					</p>
                    

					<p><?php 
					if(isset($_GET['erreur']) && ($_GET['erreur'] == "login")) { 
	  echo 'Echec d\'authentification !!! &gt; login ou mot de passe incorrect'; 
	  }
	  if(isset($_GET['erreur']) && ($_GET['erreur'] == "delog")) {
	  echo 'D&eacute;connexion r&eacute;ussie... A bient&ocirc;t '.$_SESSION['prenom'].' !';
	  session_unset();
	  }
	  if(isset($_GET['erreur']) && ($_GET['erreur'] == "intru")) {
	  echo 'Echec d\'authentification !!! &gt; Aucune session n\'est ouverte
      ou vous n\'avez pas les droits pour afficher cette page.';
      } ?></p>
				</form>
			</div> <!-- End #login-content -->
			
		</div> <!-- End #login-wrapper -->
		
  </body>
  </html>
