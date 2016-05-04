<?php

  if (isset($_POST['action'])) {
  	$action = mysqli_real_escape_string($db, $_POST['action']);
  	if ($action == 'creat_comment') {
      $commandId = mysqli_real_escape_string($db, $_POST['commandId']);
      $commandContent = mysqli_real_escape_string($db, $_POST['content']);
      $userId = mysqli_real_escape_string($db, $_SESSION['id']);
  		$sql = "INSERT INTO bistrot_comments (content,command_id,user_id)
              VALUES('" . $commandContent . "','" . $commandId . "','" . $userId . "')";
  		$res = mysqli_query($db, $sql);
  		if($res) {
  			header('Location: list_command');
  			exit;
  		}
  	} else {
      $error = "Erreur interne au serveur";
    }
  } else {
    $error = "Erreur interne (vous avez essayé de m'entuber)";
  }

?>
