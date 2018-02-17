<?php

/* session_start(); */

include_once("../includes/connexion.php");

/* $adm=$_SESSION['adm']; */



$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$genre=$_POST['genre'];
$adresse=$_POST['adresse'];
$tel=$_POST['tel'];
$email=$_POST['email'];
$date_naissance=$_POST['date_naissance'];
$photo=$_FILES['photo2']['name'];
$cycle=$_POST['cycle'];
$matiere=$_POST['matiere'];



if(!empty($photo)){

	 $photo = $nom.$prenom.'-'.$photo;	 
     $fichier = basename($photo);
	 $dossier = '../../assets/images/photo/';

     if(move_uploaded_file($_FILES['photo2']['tmp_name'], $dossier . $fichier))
	 {
          echo 'Upload effectué avec succès !';
     }
}else{

$photo='user-prof.png';

}




/* if($adm==0){ */

	$req_rec="select  MAX(id_auth) as id_max from authentification ";
	$cmd_rec=mysql_query($req_rec);

	$data = mysql_fetch_assoc($cmd_rec);	
	$val_rec=$data['id_max'];
	$id_auth_prof=$val_rec + 1 ;
	
	

 	$req_insc="insert into prof(nom,prenom,genre,adresse,tel,email,date_naissance,photo,cycle,matiere,id_auth_prof)
			values('$nom','$prenom','$genre','$adresse','$tel','$email','$date_naissance','$photo','$cycle','$matiere',$id_auth_prof)";
			
    $cmd_insc=mysql_query($req_insc); 
	
   
	$login='p'.'.'.$_POST['nom'].'.'.$_POST['prenom'];
	$mdp=sha1("123");

	
    $req_ath_prof="insert into authentification(id_auth,login,mdp,droit) values($id_auth_prof,'$login','$mdp',3)";			
    $cmd_ath_prof=mysql_query($req_ath_prof);	
	


    
     header("Location: ../ajouter-prof.php?erreur=non"); 








?>