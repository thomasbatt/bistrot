<?php
// require('apps/dev_dbinsert_plats.php');

$jours = ['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche'];

if (!isset($week))
	$week = date('W');

$year = date('Y');

$curent_week = week2str( $year, $week);

// var_dump($curent_week);

require('views/list_plat.phtml');

?>