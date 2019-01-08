<?php
require_once("connexion.php");
if(isset($_POST["AJOUTER"]))
{
	//ECHO "ok";
	$nom= $_POST["NOM_PRENOM"];
	$cin= $_POST["CIN"];
	$tel= $_POST["TEL"];
	$source= $_POST["SOURCE"];
	$email= $_POST["EMAIL"];
	$idproduit= $_POST["IDPRODUIT"];
	$req= "insert into client(NOM_PRENOM,CIN,TEL,SOURCE,EMAIL,IDPRODUIT)values('$nom','$cin','$tel','$source','$email','$idproduit')";
	mysql_query($req);
}
?>
<hmtl>
<head>
<title>Gestion des reclamation</title>
</head>
<body>

<p>
    <br />
    Espace pour la gestion des reclamations des clients
</p>

<form action="" method="post" name="form1">
<table>
<tr>
<td> Nom & Prenom: </td>
<td><input type="text"  name="NOM_PRENOM" /> </td>
</tr>
<tr>
<td> Cin:</td>
<td> <input type="text"  name="CIN" /></td>
</tr>
<tr>
<td> Tel:</td>
<td>  <input type="text"  name="TEL" /></td>
</tr>
<tr>
<td>Source: </td>
<td> <input type="text"  name="SOURCE" /> </td>
</tr>
<tr>
<td>Email: </td>
<td> <input type="text"  name="EMAIL" /></td>
</tr>
<tr>
<td> Produit:</td>
<td> <select name="IDPRODUIT">
<?php
$rq="select* from produit";
$res=mysql_query($rq);
while($l= mysql_fetch_array($res))
{
	?>
      <option value="<?php  echo $l["TYPEPRODUIT"] ?>"><?php  echo $l["TYPEPRODUIT"] ?></option>
<?php } ?>   
    </select></td>
</tr>
<tr>
<td> </td>
<td> <input type="submit"  name="AJOUTER" value="Ajouter" /></td>
</tr>
</table>
</form>

</body>
</html