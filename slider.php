<?php  

	$unControleur->setTable ("image");
	$lImage = null;

	$tab=array("*");
	$lesImages = $unControleur->selectAll ($tab); 
	require_once("vue/vue_slider.php");


?>