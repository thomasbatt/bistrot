<?php
$btn_action_file = null;
if ( $session_role == 'admin' )
{
	$btn_action_file = 'btn_admin';
	if ( $statut_command == 'in_progress' )
		$class_glyphicon = 'record';
	else if ( $statut_command = 'in_progress' )
		$class_glyphicon = 'ok';

}
else if ( $session_role == 'user' && $user_id == $session_id )
	$btn_action_file = 'btn_delete_command';

if ($btn_action_file !== null)
	require('views/'.$btn_action_file.'.phtml');

?>