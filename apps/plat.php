<?php

$query = "SELECT id,day,week,content,price,statut FROM bistrot_plats WHERE week = '".$week."' ORDER BY id";
$res = mysqli_query($db, $query);

$plat = null;
while ($plat = mysqli_fetch_assoc($res))
{
	$user_id = $session_id;
	$plat_id = $plat['id'];
	$jour = $jours[ $plat['day']-1 ];
	$content = $plat['content'];
	$price = $plat['price'];
	$statut = $plat['statut'];
	require('views/plat.phtml');
}
?>