<?php 
if ( $session_role == 'admin' )
	$btn_user_file = 'modal_user';
else if ( $session_role == 'user' )
{
	if ($user_id == $session_id)
		$btn_user_file = 'modal_user';
	else{
		$btn_user_file = 'name_user';
		$target_modal = 'login-admin';
	}
}
else{
	$btn_user_file = 'name_user';
	$target_modal = 'login';
}

require('views/'.$btn_user_file.'.phtml');
?>