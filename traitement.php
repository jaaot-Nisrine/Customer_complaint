<?php
session_start();
require_once('connexion.php');
if (isset($_SESSION['authentification'])){ 
}
else {
header("Location: index.php?erreur=intru"); 
exit;
}
//--------- Ajout UN traitement    -----------------
if(isset($_POST["AJOUTER"]))
{
	$suite= $_POST["SUITEDONNEE"];
	$daterep= $_POST["DATEREPONSE"];
	$observation= $_POST["OBSERVATION"];
	$freins= $_POST["FREINS"];
	$ref= $_POST["REFRECLAMATION"];
	$agence= $_POST["NOMAGENCE"];
	

	if ( $suite != ''or $daterep != ''or  $observation != ''or $ref != ''or $agence != '' )
	{

$req= "insert into traitement(SUITEDONNEE,DATEREPONSE,OBSERVATION,FREINS,REFRECLAMATION,NOMAGENCE)
	values('$suite','$daterep','$observation','$freins','$ref','$agence')";
	mysql_query($req);
	

	
	header("location:traitement.php?err_formulaire=FALSE");
				
	} else {
	header("location:traitement.php?err_formulaire=TRUE");

	}
}
//========================== Modification ================================

 if(isset($_POST['modifier']) and isset($_GET['nt'])){
	    $nt =$_GET['nt'];
		
	$suite= $_POST["SUITEDONNEE2"];
	$daterep= $_POST["DATEREPONSE2"];
	$observation= $_POST["OBSERVATION2"];
	$freins= $_POST["FREINS2"];

	

		$reqmL="update traitement set SUITEDONNEE='$suite', DATEREPONSE='$daterep', OBSERVATION='$observation', FREINS='$freins' where NUMTRAITEMENT='$nt'";
		mysql_query($reqmL);
		header("location:traitement.php");
		exit;
}
//===================== Fin de la modification =======================
//--------- Suppression UN traitement    -----------------
  if(isset($_POST['suppr'])){
		$liste = $_POST['maListe'];
		for($j=0;$j<sizeof($liste);$j++)
		{	$numSup=$liste[$j];
			$rqq="delete from traitement where NUMTRAITEMENT='$numSup'";
	 		mysql_query($rqq);


		}
		header("location:traitement.php");
		
	} 
	
		// ==================== Pagination ===================
		$rq="select * from traitement";
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
	          <p>&nbsp;</p>
	          <p>&nbsp;</p>
	          <p><img id="logo" src="resources/images/logo.png" alt=""  /></p>
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
					
					<h3>Traitement</h3>
					<ul class="content-box-tabs">
					  <li><a href="#rechercher" class="<?php if(!isset($_GET['num']))echo 'default-tab';?>">Liste</a></li>
					  <li><a href="#ajouter">Ajouter</a></li>
                        <li><a href="#modifier"  class="<?php if(isset($_GET['num']))echo 'default-tab';?>">Modifier</a></li>
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
								   <th>Suite donnée</th>
								   <th>Date de réponse</th>
                                   <th>Observation</th>
                                   <th>Reference </th>
                                   <th>Frein </th>
                                   <th>Agence </th>
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
                                        -<a href="traitement.php?page=<?php echo "$i"; ?>"class="number 
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
							$req="select * from traitement  limit $d,5";
							$res=mysql_query($req);
							while($ligne=mysql_fetch_array($res))
							{
							?>
								<tr>
									<td><input type="checkbox" name="maListe[]" value="<?php echo $ligne[0];?>"></td>
									<td><?php echo $ligne[1];?></td>
									<td><?php echo $ligne[2];?></td>
                                    <td><?php echo $ligne[3];?></td>
                                    <td><?php echo $ligne[4];?></td>
                                    <td><?php echo $ligne[5];?></td>
                                    <td><?php echo $ligne[6];?></td>
                                  <td><a href="imprimerBC.php?num=<?php echo $ligne[0];?>">Imprimer</a></td>


								</tr>
							<?php } ?>

							</tbody>
							
						</table>
						
					</div> <!-- End #rechercher -->
         
      <div class="tab-content" id="ajouter"> <!-- This is the target div. id must match the href of this div's tab -->

<table>
<tr>
<td> Suite donnée:</td>
<td><textarea name="SUITEDONNEE" rows="5" cols="40"></textarea> </td>
</tr>
<tr>
<td> Date de réponse: </td>
<td><input type="date"  name="DATEREPONSE" /> </td>
</tr>
<tr>
<td> Observation:</td>
<td><textarea name="OBSERVATION" rows="5" cols="40"></textarea> </td>
</tr>
<tr>
<td> Freins à la résolution:</td>
<td><textarea name="FREINS" rows="5" cols="40"></textarea> </td>
</tr>
<tr>
<td> Reference de la reclamation:</td>
<td> <select name="REFRECLAMATION">
<?php
$rq="select* from reclamation";
$res=mysql_query($rq);
while($l= mysql_fetch_array($res))
{
	?>
      <option value="<?php  echo $l["REFRECLAMATION"] ?>"><?php  echo $l["REFRECLAMATION"] ?></option>
<?php } ?>   
    </select></td>
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
<td> </td>
<td> <input type="submit"  name="AJOUTER" id="AJOUTER"value="Ajouter" /></td>
</tr>
</table>
  
      </div> 
      <!-- End #ajouter -->
					
	<div class="tab-content <?php if(isset($_GET['num']))echo 'default-tab';?>" id="modifier">
	  <table width="200" border="1">
      							
							<thead>
								<tr>
								   <th>Suite donnée</th>
								   <th>Date de réponse</th>
                                   <th>Observation</th>
                                   <th>Reference </th>
                                   <th>Frein </th>
                                   <th>Agence </th>
								</tr>
								
							</thead>
      <?php
							if (isset($_GET["page"])) $d=($_GET["page"]-1)*5; else $d=0;
							$req="select * from traitement limit $d,5";
							$res=mysql_query($req);
							while($ligne=mysql_fetch_array($res))
							{

							?>
								<tr>
									<td><?php echo $ligne[1];?></td>
									<td><?php echo $ligne[2];?></td>
                                    <td><?php echo $ligne[3];?></td>
                                    <td><?php echo $ligne[4];?></td>
                                  <td><?php echo $ligne[5];?></td>
                                    <td><?php echo $ligne[6];?></td>
									<td>
                                <a href="?nt=<?php echo $ligne[0];?>&suite=<?php echo $ligne[1];?>&dat=<?php echo $ligne[2];?>&obs=<?php echo $ligne[3];?>&freins=<?php echo $ligne[4];?>#modifier"><img src="resources/images/icons/pencil.png" alt="Modifier" /></a></li>
							        </td>
								</tr>
							<?php } ?>

	    <tr>
	      <td>Suite donn&eacute;e:</td>
	      <td>
	        <textarea name="SUITEDONNEE2" rows="5" cols="40"><?php if(isset($_GET['suite']))echo $_GET['suite'];?></textarea></td>
	      </tr>
	    <tr>
	      <td>Date de r&eacute;ponse: </td>
	        <td><input type="date"  name="DATEREPONSE2"value="<?php if(isset($_GET['dat']))echo $_GET['dat'];?>"/></td>
	      </tr>
          <tr>
        <td>Observation:</td>
        <td>
          <textarea name="OBSERVATION2" rows="5" cols="40"><?php if(isset($_GET['obs']))echo $_GET['obs'];?></textarea></td>
      </tr>
          	    <tr>
	      <td>Freins &agrave; la r&eacute;solution:</td>
	      <td>
	        <textarea name="FREINS2" rows="5" cols="40"><?php if(isset($_GET['freins']))echo $_GET['freins'];?></textarea></td>
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
