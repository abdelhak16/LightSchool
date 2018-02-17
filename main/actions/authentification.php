<?php
session_start();
include_once("includes/connexion.php");



	$heure=date("H:i");
	
	if ($heure>'22:00'){
    $reqd="update user2 set active='non' where adm='991'";
    $cmdd=mysql_query($reqd);
	
    }

$u=$_POST['id'];
$ps=$_POST['psw'];
$p=sha1($ps);


if (empty($u) || empty($p)){
    header("Location: index.php?erreur=oui");
    exit;
}


$re="select * from user where login='{$u}' and psw='{$p}' ";
$cmd=mysql_query($re);

if (mysql_num_rows($cmd)==1){ 
    $v=mysql_fetch_assoc($cmd);
    if ($v['adm']==1){
    $_SESSION['login']=$v['login'];
    $_SESSION['psw']=$v['psw'];
    $_SESSION['adm']=$v['adm']; 
    $_SESSION['id']=$v['id'];        
    }else if ($v['adm']==0){
    $_SESSION['login']=$v['login'];
    $_SESSION['psw']=$v['psw'];
    $_SESSION['adm']=$v['adm']; 
    $_SESSION['id']=$v['id']; 
	
	$_SESSION['login2']=$v['login'];
    $_SESSION['psw2']=$v['psw'];
    $_SESSION['adm2']=$v['adm']; 
    $_SESSION['id2']=$v['id'];
	header("Location: prospect.php");
	exit ;
    }else {
    $_SESSION['login']=$v['login'];
    $_SESSION['psw']=$v['psw'];
    $_SESSION['adm']=$v['adm'];  
    $_SESSION['id']=$v['id'];  
    
    header("Location: agenda.php");     
	exit;	
    }
    $heure = date("H:i");  
    $date=  date("d/m/Y");
    $hd=$date.'  '.$heure;  
    $id=$v['id'];
    $re4="update user set connecte='1',heurec='$hd' where id=$id ";
    mysql_query($re4);
    
    
    header("Location: prospect.php");     
	exit;
}

    header("Location: index.php?erreur=oui");


?>