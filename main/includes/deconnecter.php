<?php

session_start();
include_once("includes/connexion.php");



$_SESSION=array();

if (isset($_COOKIE[session_name()])){
    setcookie(session_name(),'',time()-3000,'/');
}

session_destroy();



header("Location: ../index.php");

?>