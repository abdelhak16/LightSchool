<?php

/* session_start(); */

include_once("../includes/connexion.php");

/* $adm=$_SESSION['adm']; */

$id=$_POST['id'];
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$genre=$_POST['genre'];
$adresse=$_POST['adresse'];
$tel=$_POST['tel'];
$email=$_POST['email'];
$date_naissance=$_POST['date_naissance'];
$photo=$_FILES['photo2']['name'];
$classe=$_POST['classe'];
$session=$_POST['session'];
$nom_tuteur=$_POST['nom_tuteur'];
$prenom_tuteur=$_POST['prenom_tuteur'];
$genre_tuteur=$_POST['genre_tuteur'];
$adresse_tuteur=$_POST['adresse_tuteur'];
$tel_tuteur1=$_POST['tel_tuteur1'];
$tel_tuteur2=$_POST['tel_tuteur2'];
$email_tuteur=$_POST['email_tuteur'];
$profession=$_POST['profession'];



if(!empty($photo)){

	 $photo = $nom.$prenom.'-'.$photo;	 
     $fichier = basename($photo);
	 $dossier = '../../assets/images/photo/';

     if(move_uploaded_file($_FILES['photo2']['tmp_name'], $dossier . $fichier))
	 {
          echo 'Upload effectué avec succès !';
     }
}else{

$photo='user.png';

}




/* if($adm==0){ */

	

 	$req_modif="UPDATE `etudiant` SET `nom`='$nom',`prenom`='$prenom',`genre`='$genre',`adresse`='$adresse',`tel`='$tel',`email`='$email',`date_naissance`='$date_naissance',`photo`='$photo',`classe`='$classe',
	`session`='$session',`nom_tuteur`='$nom_tuteur',`prenom_tuteur`='$prenom_tuteur',`genre_tuteur`='$genre_tuteur',`adresse_tuteur`='$adresse_tuteur',`tel_tuteur1`='$tel_tuteur1',`tel_tuteur2`='$tel_tuteur2'
	,`email_tuteur`='$email_tuteur',`profession`='$profession' WHERE `id_etudiant`=$id";
			
    $cmd_modif=mysql_query($req_modif); 
	
	

    
    header("Location: ../modifier-etudiant.php?id=$id"); 








?>