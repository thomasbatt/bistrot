<?php
if( $statut == 'editing' && $session_role == 'admin' )
	$file_content = 'edit_content_plat';
else 
	$file_content = 'content_plat';

// var_dump($content);

require('views/'.$file_content.'.phtml');
?>