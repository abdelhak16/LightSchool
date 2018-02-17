<?php
$cn=@mysql_connect('Localhost', 'root', '');
if (!$cn){
    die("probleme de connection");
}
$bd=mysql_select_db("lightschool",$cn);
mysql_query ('SET NAMES UTF8');
if (!$bd){
    die("probleme de selection");
}
?>