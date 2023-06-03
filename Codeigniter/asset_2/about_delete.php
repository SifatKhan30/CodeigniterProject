<?php
$db= new mysqli('localhost','root','','react_js');
$id= $_GET['id'];
$query= "delete from about where id=$id";
$db->query($query);
header('Location: about.php');
?>