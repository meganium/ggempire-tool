﻿<?php
session_start();
include('bdd.php');
if(!empty($_COOKIE['pseudo']) && !empty($_COOKIE['password']) && !empty($_COOKIE['id'])){
if(isset($_COOKIE['pseudo']) && isset($_COOKIE['password']) && isset($_COOKIE['id'])){

$pseudo = mysql_real_escape_string(htmlspecialchars($_COOKIE['pseudo']));
$passe = mysql_real_escape_string(htmlspecialchars($_COOKIE['password']));
$sec = 1;
	
$quete = mysql_query("SELECT * FROM validation WHERE pseudo='$pseudo';");
$resultat = mysql_fetch_array($quete);
if($pseudo == $resultat['pseudo']){

$quete = mysql_query("SELECT * FROM validation WHERE pass='$passe';");
$resultat = mysql_fetch_array($quete);
if($passe == $resultat['pass']){
	
$quete = mysql_query("SELECT * FROM validation WHERE pseudo='$pseudo';");
$resultat = mysql_fetch_array($quete);
if($sec == $resultat['id']){

// authentification ok 
$_SESSION['pseudo'] = $resultat['pseudo'];// le pseudo
$_SESSION['password'] = $resultat['pass'];// le mdp
$_SESSION['id'] = $resultat['id'];// 1
}else{echo "<script>alert('Votre compte n'a pas été encore activer');</script>";}
}else{echo "<script>alert('Mot de passe incorrect!');</script>";}
}else{echo "<script>alert('Pseudo inconnu!);</script>";}
}else{include('noco.php');}}

if(!empty($_SESSION['pseudo']) && !empty($_SESSION['password']) && !empty($_SESSION['id'])){	
if(isset($_SESSION['pseudo']) && isset($_SESSION['password']) && isset($_SESSION['id'])){
?>
<?php include('cssmenu/menu_source/index.php'); ?>
<center>
<div style="background-color:#FFFFFF;width:900px;">
<h1>Informations sur la version 2-0 : </h1>
</div>
<br><br>
<div style="background-color:#FFFFFF;width:600px;">
Amélioration sur le site (visible) : <br>
<br>
Amélioration des profils des utilisateurs.<br>
Amélioration du mini chat.<br>
Un raccourci pour votre profil sur la page d'accueil.<br>
Boite de messagerie en version beta.<br>
Possibilité de modifié son profil.<br>
<br>
Non visible (technique) :<br>
Amélioration de la vitesse des pages.<br>
Amélioration de divers bug du mini chat.<br>
Failles de sécurité patché.
</div>




</center>
<?php
include('cont.php');
}
else{include('noco.php');}
}
else{include('noco.php');}

?>

