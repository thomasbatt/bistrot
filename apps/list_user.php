<?php
	// var_dump($week);
	// var_dump($plat['day']);

$query = "SELECT 
			bistrot_commands.id as command_id,bistrot_commands.user_id,bistrot_commands.plat_id,bistrot_commands.statut as statut_command,bistrot_commands.date AS date_command,
			bistrot_plats.content,bistrot_plats.price,bistrot_plats.statut as statut_plat,bistrot_plats.date AS date_plats,
			bistrot_users.login,bistrot_users.email,bistrot_users.phone,bistrot_users.first_name,bistrot_users.last_name,bistrot_users.role,bistrot_users.avatar,bistrot_users.statut as statut_user,bistrot_users.date AS date_user
			FROM bistrot_users 
			LEFT JOIN bistrot_commands ON bistrot_users.id = bistrot_commands.user_id 
			LEFT JOIN bistrot_plats ON bistrot_commands.plat_id = bistrot_plats.id 
			WHERE week = '".$week."' AND day = '".$plat['day']."' 
			ORDER BY bistrot_commands.id ";
$res_user = mysqli_query($db, $query);

$command_plat_user = null;
while ($command_plat_user = mysqli_fetch_assoc($res_user))
{
	$command_id = $command_plat_user['command_id'];
	$date_command = $command_plat_user['date_command'];
	$statut_command = $command_plat_user['statut_command'];

	$user_id = $command_plat_user['user_id'];
	$login = $command_plat_user['login'];
	$first_name = $command_plat_user['first_name'];
	$last_name = $command_plat_user['last_name'];
	$email = $command_plat_user['email'];
	$phone = $command_plat_user['phone'];


	// var_dump($command_plat_user);
	require('views/user.phtml');
}
?>