<?php

if ( $session_role == 'admin' )
{
	$btn_file = 'btn_edit_plat';
	if ($statut == 'editing')
		$btn = 'Valider';
	else {
		$btn = 'Editer';
		$statut = 'default';
	}
}
else if ( $session_role == 'user' )
{
	$btn_file = 'btn_command_plat_user';
	$btn = 'Commander';
}
else
{
	$btn_file = 'btn_command_plat';
	$btn = 'Commander';
}


require('views/'.$btn_file.'.phtml');
?>