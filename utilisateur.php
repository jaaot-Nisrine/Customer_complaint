<?php
session_start();
require_once('connexion.php');
if (isset($_SESSION['authentification'])){ 
}
else {
header("Location: index.php?erreur=intru"); 
exit;
}
// ------ AJOUT D'UN UTILISATEUR --------
if (isset($_POST['login'])){ 
	if(($_POST['login'] == "") || ($_POST['pass'] == "")){ 
	header("Location:utilisateur.php?erreur=empty");
	exit;
}
else {
    if ($_POST['pass'] != $_POST['pass2']) { 
        header("Location:utilisateur.php?erreur=pass"); 
		exit;
    }
    else {
        $login = mysql_real_escape_string($_POST['login']);
        $verif_query = sprintf("SELECT * FROM membres WHERE login='$login'"); 
        $verif = mysql_query($verif_query);
        $row_verif = mysql_fetch_assoc($verif);
        $utilisateur = mysql_num_rows($verif);
			
		if ($utilisateur) {
            header("Location:utilisateur.php?erreur=login"); 
            exit;
        }
        else {
			$pass = sha1($_POST['pass']); 
			$nom = $_POST['nom'];
			$prenom = $_POST['prenom'];
			$privilege = $_POST['privilege'];
			
				$add_user = sprintf("INSERT INTO membres (login, pass, nom, prenom, privilege) VALUES ('$login', '$pass', '$nom', '$prenom', '$privilege')");
				$result = mysql_query($add_user);
				header("Location:utilisateur.php?add=ok"); 
				exit;
				}
				
			}
		}
    }



// ------ SUPPRESSION D'UN UTILISATEUR --------

$query_users = "SELECT * FROM membres ORDER BY nom ASC"; 
$users = mysql_query($query_users);
$row_users = mysql_fetch_assoc($users);

if (isset($_POST['suppr'])){ 
	$id = $_POST['suppr'];
    $query_user = mysql_query("SELECT * FROM membres WHERE id_user='$id'");
    $row_verif = mysql_fetch_assoc($query_user);
    $privilege = $row_verif['privilege'];
    $query_admin = mysql_query("SELECT * FROM membres WHERE privilege = 'admin'");
    $admin = mysql_num_rows($query_admin);
    
    if ($privilege == 'admin' && $admin == 1) {
        header("Location:utilisateur.php?delete=erreur_admin");
        exit;
    }
    else {
        $delete_user = sprintf("DELETE FROM membres WHERE id_user='$id'");
        $result = mysql_query($delete_user);
        header("Location:utilisateur.php?delete=ok");
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

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
			

			
		  <!-- Page Head -->
			<h2>Administration Al-Omrane</h2>
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
<form action="" method="post" name="add" class="Style6" id="add">
          <p align="center"><em>Gestion des utilisateurs</em></p>
          <p align="center"><strong>
            <?php if(isset($_GET['erreur']) && ($_GET['erreur'] == "login")) { // Affiche l'erreur  ?>
            Veuillez entrer un login inutilisé SVP!
            <?php } ?>
            <?php if(isset($_GET['erreur']) && ($_GET['erreur'] == "pass")) { // Affiche l'erreur  ?>
            Veuillez entrer deux fois votre mot de passe SVP!
            <?php } ?>
            <?php if(isset($_GET['add']) && ($_GET['add'] == "ok")) { // Affiche l'erreur ?>
            L'utilisateur a &eacute;t&eacute; cr&eacute;&eacute; avec succ&egrave;s !
            <?php } ?>
            <?php if(isset($_GET['erreur']) && ($_GET['erreur'] == "empty")) { // Affiche l'erreur  ?>
            Un petit oubli non ? Veuillez renseigner au moins un login et un mot de passe SVP!
            <?php } ?>
          </strong></p>
          <p align="center"><strong><u>Cr&eacute;er un utilisateur</u></strong></p>
          <table width="416" border="0" align="center" cellpadding="5" cellspacing="0">
            <tr>
              <td width="188"><span class="Style8">Login</span></td>
              <td width="208"><input name="login" type="text" id="login" /></td>
            </tr>
            <tr>
              <td><span class="Style8">Mot de passe </span></td>
              <td><input name="pass" type="password" id="pass" /></td>
            </tr>
            <tr>
              <td><span class="Style8">Confirmer le mot de passe </span></td>
              <td><input name="pass2" type="password" id="pass2" /></td>
            </tr>
            <tr>
              <td><span class="Style8">Nom</span></td>
              <td><input name="nom" type="text" id="nom" /></td>
            </tr>
            <tr>
              <td><span class="Style8">Pr&eacute;nom</span></td>
              <td><input name="prenom" type="text" id="prenom" /></td>
            </tr>
            <tr>
              <td><span class="Style8">Privil&egrave;ge</span></td>
              <td><select name="privilege" id="privilege">
                <option value="Chef de projet">Chef de projet</option>
                <option value="D&eacute;l&egrave;gue commercial">D&eacute;l&egrave;gue commercial</option>
                <option value="MOS Suivi">MOS Suivi</option>
                <option value="Administrateur">Administrateur</option>
              </select></td>
            </tr>
            <tr>
              <td height="50" colspan="2"><div align="center">
                <input type="submit" name="Submit2" value="Créer cet utilisateur" />
              </div></td>
            </tr>
          </table>
        </form>
				<p><strong>
        <?php if(isset($_GET['delete']) && ($_GET['delete'] == "ok")) { // Affiche l'erreur  ?>
        L'utilisateur a &eacute;t&eacute; supprim&eacute; avec succ&egrave;s !
        <?php } ?>
        <?php if(isset($_GET['delete']) && ($_GET['delete'] == "erreur_admin")) { // Affiche l'erreur  ?>
        >L'utilisateur n'a pas pu &ecirc;tre supprim&eacute; ; c'est le seul administrateur !
        <?php } ?>
        </strong></p>
        <form action="" method="post" name="suppr" class="Style6" id="suppr">
          <p align="center"><strong><u>Supprimer un utilisateur</u></strong></p>
          <div align="center">
            <table border="0" cellpadding="5" cellspacing="0">
              <tr>
                <td><select name="suppr" size="5" class="textform" id="select2">
                  <?php
do {  
?>
                  <option value="<?php echo $row_users['id_user']?>">
                    <?php if($row_users['privilege']== "admin") echo ">> ";echo $row_users['nom']; echo " "; echo $row_users['prenom']; echo " ("; echo $row_users['login']; echo ")"; if($row_users['privilege']== "admin") echo " <<"?>
                    </option>
                  <?php
} while ($row_users = mysql_fetch_assoc($users));
  $rows = mysql_num_rows($users);
  if($rows > 0) {
      mysql_data_seek($users, 0);
	  $row_users = mysql_fetch_assoc($users);
  }
?>
                </select></td>
                <td><input type="submit" name="Supprimer" value="Supprimer cet utilisateur" /></td>
              </tr>
            </table>

          </div>
        </form>
			</div> <!-- End .content-box -->
			
			
		  <div class="clear"></div>
			
			
			<div id="footer">
				<small> 
						&#169; Copyright 2016  | Webmaster <a href="#">J.Nisrine</a> | <a href="#">En haut</a>
				</small>
			</div><!-- End #footer -->
			
		</div> <!-- End #main-content -->
		
	</div></body>
  


</html>
