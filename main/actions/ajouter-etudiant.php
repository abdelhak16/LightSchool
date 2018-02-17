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

	$req_rec="select  MAX(id_auth) as id_max from authentification ";
	$cmd_rec=mysql_query($req_rec);

	$data = mysql_fetch_assoc($cmd_rec);	
	$val_rec=$data['id_max'];
	$id_auth_etu=$val_rec + 1 ;
	$id_auth_tut=$id_auth_etu + 1;
	

 	$req_insc="insert into etudiant(nom,prenom,genre,adresse,tel,email,date_naissance,photo,classe,session,nom_tuteur,prenom_tuteur,genre_tuteur,adresse_tuteur,tel_tuteur1,tel_tuteur2,email_tuteur,profession,id_auth_etudiant,id_auth_tuteur)
			values('$nom','$prenom','$genre','$adresse','$tel','$email','$date_naissance','$photo','$classe','$session','$nom_tuteur','$prenom_tuteur','$genre_tuteur','$adresse_tuteur','$tel_tuteur1','$tel_tuteur2','$email_tuteur','$profession',$id_auth_etu,$id_auth_tut)";
			
    $cmd_insc=mysql_query($req_insc); 
	
	$req_matr="select  MAX(id_etudiant) as id_etu from etudiant ";
	$cmd_matr=mysql_query($req_matr);	
	$data_matr = mysql_fetch_assoc($cmd_matr);	
	$val_matr=$data_matr['id_etu'];	

	$req_insc_matr="UPDATE `etudiant` SET `matricule`=$val_matr WHERE `id_etudiant`=$val_matr";
    $cmd_insc_matr=mysql_query($req_insc_matr); 
   
   
	$login=$_POST['nom'].'.'.$_POST['prenom'];
	$mdp=sha1("123");

	$login_tuteur='t'.'.'.$_POST['nom'].'.'.$_POST['prenom'];
	$mdp_tuteur=sha1("123");	
	
    $req_ath_etu="insert into authentification(id_auth,login,mdp,droit) values($id_auth_etu,'$login','$mdp',1)";			
    $cmd_ath_etu=mysql_query($req_ath_etu);	
	
    $req_ath_tut="insert into authentification(id_auth,login,mdp,droit) values($id_auth_tut,'$login_tuteur','$mdp_tuteur',2)";			
    $cmd_ath_tut=mysql_query($req_ath_tut);
	


    
     header("Location: ../ajouter-etudiant.php?erreur=non"); 








?>