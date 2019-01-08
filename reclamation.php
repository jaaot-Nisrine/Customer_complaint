<?php
session_start();
require_once('connexion.php');
if (isset($_SESSION['authentification'])){ 
}
else {
header("Location: index.php?erreur=intru"); 
exit;
}
//--------- Ajout UNE reclamation    -----------------
if(isset($_POST["AJOUTER"]))
{

	$ref= $_POST["REFRECLAMATION"];
	$datereclamation= $_POST["DATERECLAMATION"];
	$objet= $_POST["OBJET"];
	$projet= $_POST["PROJET"];
	$dateenvoi= $_POST["DATEENVOI"];
	$idclient= $_POST["ID_client"];
	$nn= $_POST["N"];
	$nomagence= $_POST["NOMAGENCE"];

	
	
	if ( $ref != '' or $datereclamation != '' or $objet != '' or $projet != '' or $dateenvoi != '' or $idclient != '' or $nn != '')
	{

	$req= "insert into reclamation(REFRECLAMATION,DATERECLAMATION,OBJET,PROJET,DATEENVOI,ID_client,N,NOMAGENCE)values('$ref','$datereclamation','$objet','$projet','$dateenvoi','$idclient','$nn','$nomagence')";
	mysql_query($req);
	header("location:reclamation.php?err_formulaire=FALSE");
				
	} else {
	header("location:reclamation.php?err_formulaire=TRUE");

	}
}
//========================== Modification ================================

 if(isset($_POST['modifier']) and isset($_GET['ref'])){
	    $ref=$_GET['ref'];
	
	//$ref= $_POST["REFRECLAMATION2"];
	$datereclamation= $_POST["DATERECLAMATION2"];
	$objet= $_POST["OBJET2"];
	$projet= $_POST["PROJET2"];
	$dateenvoi= $_POST["DATEENVOI2"];
	$idclient= $_POST["ID_client2"];
	$nn= $_POST["N2"];
	$nomagence= $_POST["NOMAGENCE2"];


		$reqmD="update reclamation set DATERECLAMATION='$datereclamation',OBJET='$objet',PROJET='$projet',DATEENVOI='$dateenvoi',ID_client='$idclient',N='$nn',NOMAGENCE='$nomagence' where REFRECLAMATION='$ref'";
		mysql_query($reqmD);

		header("location:reclamation.php");
		exit;
}
//===================== Fin de la modification =======================
//--------- Suppression UNE agence    -----------------
  if(isset($_POST['suppr'])){
		$liste = $_POST['maListe'];
		for($j=0;$j<sizeof($liste);$j++)
		{	$numSup=$liste[$j];
			$rqq="delete from reclamation where REFRECLAMATION='$numSup'";
	 		mysql_query($rqq);

		}
		header("location:reclamation.php");
		
	} 
	
		// ==================== Pagination ===================
		$rq="select * from reclamation";
		$rs=mysql_query($rq);
		$n=mysql_num_rows($rs);
		if($n%5==0)$np=$n/5; else $np=$n/5+1;
		$i=1;
		//======================= Fin de pagination ==========//
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
			
        <form action="" method="post" enctype="multipart/form-data" id="form1">
			
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
					
					<h3>Réclamation</h3>
					<ul class="content-box-tabs">
					  <li><a href="#rechercher" class="<?php if(!isset($_GET['ref']))echo 'default-tab';?>">Liste</a></li>
					  <li><a href="#ajouter">Ajouter</a></li>
                        <li><a href="#modifier"  class="<?php if(isset($_GET['ref']))echo 'default-tab';?>">Modifier</a></li>
                      <!-- <li><a href="#supprimer">Supprimer</a></li> -->
					</ul>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div class="tab-content <?php if(!isset($_GET['num']))echo 'default-tab';?>" id="rechercher"> <!-- This is the target div. id must match the href of this div's tab -->
						

						
						<table>
							
							<thead>
								<tr>
								   <th><input class="check-all" type="checkbox" /></th>
								   <th>Reference</th>
                                   <th>Date Rec</th>
                                    <th>Objet</th>
                                    <th>Projet</th>
                                    <th>Client</th>
                                    <th>Nature</th>
                                    <th>Agence</th>
								</tr>
								
							</thead>
						 
							<tfoot>
								<tr>
									<td colspan="6">
										 <div class="bulk-actions align-left">
										<!--	<select name="dropdown">
												<option value="option1">Choose an action...</option>
												<option value="option2">Edit</option>
												<option value="option3">Delete</option>
											</select>
											<a class="button" href="#">Apply to selected</a> -->
                                            <input type="submit" name="suppr" id="suppr" value="Supprimer" />
										</div>
										
										<div class="pagination">
											<?php while($i<=$np){?>
                                        -<a href="reclamation.php?page=<?php echo "$i"; ?>"class="number 
										<?php if (isset($_GET["page"]) && $_GET["page"]==$i)echo "current";?>">
										<?php echo " $i ";?></a>
										<?php echo " - ";$i++;} ?>
											
									  </div> <!-- End .pagination -->
										<div class="clear"></div>
									</td>
								</tr>
							</tfoot>
						 
							<tbody>
                            <?php
							if (isset($_GET["page"])) $d=($_GET["page"]-1)*5; else $d=0;
							$req="select * from reclamation  limit $d,5";
							$res=mysql_query($req);
							while($ligne=mysql_fetch_array($res))
							{
							?>
								<tr>
									<td><input type="checkbox" name="maListe[]" value="<?php echo $ligne[0];?>"></td>
									<td><?php echo $ligne[0];?></td>
                                    <td><?php echo $ligne[1];?></td>
                                    <td><?php echo $ligne[2];?></td>
                                    <td><?php echo $ligne[3];?></td>
                                  <td><?php echo $ligne[5];?></td>
                                    <td><?php echo $ligne[6];?></td>
                                    <td><?php echo $ligne[7];?></td>
									<td><a href="imprimeragence.php?num=<?php echo $ligne[0];?>">Imprimer</a></td>
							  </tr>
							<?php } ?>

							</tbody>
							
						</table>
						
					</div> <!-- End #rechercher -->
         
      <div class="tab-content" id="ajouter"> <!-- This is the target div. id must match the href of this div's tab -->

    <table>
<tr>
<td> Reference:</td>
<td><input type="text"  name="REFRECLAMATION" /> </td>
</tr>
<tr>
<td> date de la reclamation: </td>
<td><input type="date"  name="DATERECLAMATION" /> </td>
</tr>
<tr>
<td> Objet:</td>
<td> <textarea name="OBJET" rows="5" cols="40"></textarea> </td>
</tr>
<tr>
<td> Projet: </td>
<td><input type="text"  name="PROJET" /> </td>
</tr>
<tr>
<td> Date d'envoi: </td>
<td><input type="date"  name="DATEENVOI" /> </td>
</tr>
<tr>
<td> Client: </td>
<td><select name="ID_client" > 
<?php
$req="select* from client";
$res=mysql_query($req);
while($l= mysql_fetch_array($res))
{
	?>
      <option value="<?php  echo $l["ID_client"] ?>"><?php  echo $l["NOM_PRENOM"] ?></option>
<?php } ?>   
    </select></td>
</tr>
<tr>
<td> Nature de reclamation: </td>
<td><select name="N" > 
<?php
$requ="select* from nature_reclamation";
$resu=mysql_query($requ);
while($l= mysql_fetch_array($resu))
{
	?>
      <option value="<?php  echo $l["N"] ?>"><?php  echo $l["NATURE_DE_RECLAMATION"] ?></option>
<?php } ?>   
    </select>
</td>
</tr>
<tr>
<td> Agence:</td>
<td> <select name="NOMAGENCE">
<?php
$req="select* from agence";
$resu=mysql_query($req);
while($l= mysql_fetch_array($resu))
{
	?>
      <option value="<?php  echo $l["NOMAGENCE"] ?>"><?php  echo $l["NOMAGENCE"] ?></option>
<?php } ?>   
    </select></td>
</tr>

<tr>
<td> Pièce jointe </td>
<td><input type="file" name="FICHIER" id="FICHIER" /></td>
</tr>
<tr>
<td> </td>
<td> <input type="submit"  name="AJOUTER" value="Ajouter" /></td>
</tr>
</table>
  
      </div> 
      <!-- End #ajouter -->
					
	<div class="tab-content <?php if(isset($_GET['num']))echo 'default-tab';?>" id="modifier">
	  <table width="200" border="1">
      							
							<thead>
								<tr>
								   <th>Reference rec</th>
                                   <th>Date de réclamation</th>
                                   <th>Objet</th>
                                   <th>Action</th>
								</tr>
								
							</thead>
      <?php
							if (isset($_GET["page"])) $d=($_GET["page"]-1)*5; else $d=0;
							$req="select * from reclamation  limit $d,5";
							$res=mysql_query($req);
							while($ligne=mysql_fetch_array($res))
							{
								
							?>
								<tr>
									<td><?php echo $ligne[0];?></td>
                                    <td><?php echo $ligne[1];?></td>
                                    <td><?php echo $ligne[2];?></td>

								  <td>
                                <a href="?ref=<?php echo $ligne[0];?>&datr=<?php echo $ligne[1];?>&obj=<?php echo $ligne[2];?>&prj=<?php echo $ligne[3];?>&dateenv=<?php echo $ligne[4];?>&idc=<?php echo $ligne[5];?>&nnn=<?php echo $ligne[6];?>#modifier"><img src="resources/images/icons/pencil.png" alt="Modifier" /></a></li>
							        </td>
								</tr>
							<?php } ?>

	    

          	    <tr>
	      <td>Reference::</td>
	      <td><input type="text" name="REFRECLAMATION2" id="REFRECLAMATION2" value="<?php if(isset($_GET['ref']))echo $_GET['ref'];?>" /></td>
	      </tr>
       	      <tr>
	      <td>date de la reclamation:</td>
	      <td><input type="date" name="DATERECLAMATION2" id="DATERECLAMATION2" value="<?php if(isset($_GET['datr']))echo $_GET['datr'];?>" /></td>
	      </tr><tr>
          	        <td>Objet:</td>
	      <td><input type="text" name="OBJET2" id="OBJET2" value="<?php if(isset($_GET['obj']))echo $_GET['obj'];?>" /></td>
	      </tr>
          <tr>
          	        <td>Projet:</td>
	      <td><input type="text" name="PROJET2" id="PROJET2" value="<?php if(isset($_GET['prj']))echo $_GET['prj'];?>" /></td>
	      </tr>
                    <tr>
          	        <td>Date d'envoi:</td>
	      <td><input type="date" name="DATEENVOI2" id="DATEENVOI2" value="<?php if(isset($_GET['dateenv']))echo $_GET['dateenv'];?>" /></td>
	      </tr>
                    <tr>
          	        <td>Client:</td>
	      <td><input type="text" name="ID_client2" id="ID_client2" value="<?php if(isset($_GET['idc']))echo $_GET['idc'];?>" /></td>
	      </tr>
                    <tr>
          	        <td>Nature de reclamation:</td>
	      <td><input type="text" name="N2" id="N2" value="<?php if(isset($_GET['nnn']))echo $_GET['nnn'];?>" /></td>
	      </tr>
          <tr>
          	        <td>Agence:</td>
	      <td><input type="text" name="NOMAGENCE2" id="NOMAGENCE2" value="<?php if(isset($_GET['nomagence']))echo $_GET['nomagence'];?>" /></td>
	      </tr>

	    <tr>
	      <td>&nbsp;</td>
	      <td><input type="submit" name="modifier" id="modifier" value="Modifier" /></td>
	      </tr>
	    </table>
	</div> 
      <!-- End #modifier --> 
  
			  </div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
			
			
		  <div class="clear"></div>
			
			
			<!-- Start Notifications -->

			<?php if(isset($_GET["err_formulaire"]) and $_GET["err_formulaire"]=="FALSE"){ ?>
			<div class="notification success png_bg">
				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>L'opp&eacute;ration est bien eff&eacute;ctu&eacute;e...</div>
			</div>
			<?php } ?>
            <?php if(isset($_GET["err_formulaire"]) and $_GET["err_formulaire"]=="TRUE"){ ?>

			<div class="notification error png_bg">
				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>Erreur, veuillez remplir tous les champs !!!</div>
			</div>
			<?php } ?>
			<!-- End Notifications -->
			
			<div id="footer">
				<small> 
						&#169; Copyright 2016  | Webmaster <a href="#">J.Nisrine</a> | <a href="#">En haut</a>
				</small>
			</div><!-- End #footer -->
			</form>
		</div> <!-- End #main-content -->
		
	</div></body>
  


</html>
