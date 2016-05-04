<?php
// var_dump('coucou');
// var_dump($_POST);

//////////////////////////// THOM ///////////////////////////////////////////////////////

if (isset($_POST['action']))
{
	$action = $_POST['action'];
	if ($action == 'creat_command')
	{
		if ( isset( $_POST['user_id'],$_POST['plat_id'],$_POST['week'] ) )
		{
			// Etape 2
			$user_id = $_POST['user_id'];
			$plat_id = $_POST['plat_id'];
			$week = $_POST['week'];
			// Etape 3
			if (strlen($user_id) < 1)
				$error = "Contenu trop court (< 1)";
			else if (strlen($user_id) > 10)
				$error = "Contenu trop long (> 10)";
			else if (strlen($plat_id) < 1)
				$error = "Contenu trop court (< 1)";
			else if (strlen($plat_id) > 10)
				$error = "Contenu trop long (> 10)";
			else
			{
				// Etape 4
				$user_id = intval($user_id);
				$plat_id = intval($plat_id);
				$statut = 'in_progress';

				$query = "SELECT *
					FROM bistrot_users 
					LEFT JOIN bistrot_commands ON bistrot_users.id = bistrot_commands.user_id 
					LEFT JOIN bistrot_plats ON bistrot_commands.plat_id = bistrot_plats.id 
					WHERE user_id = '".$user_id."' AND plat_id = '".$plat_id."' ";
				$res = mysqli_query($db, $query);

				if ( $command_plat_user = mysqli_fetch_assoc($res) )
					$error = "Commande deja enregistree";	
				else
				{
					$query = "INSERT INTO bistrot_commands (user_id,plat_id,statut) 
						VALUES('".$user_id."','".$plat_id."','".$statut."')";
					$res = mysqli_query($db, $query);
					if ($res === false)
						$error = "Erreur interne au serveur";
					else
					{
						// Etape 5
						// header('Location: index.php');
						// exit;
					}
				}
			}
		}
	}
  else if ($action == 'delete_command')
  {
    if ( isset( $_POST['user_id'],$_POST['plat_id'],$_POST['week'] ) )
    {
      // Etape 2
      $user_id = $_POST['user_id'];
      $plat_id = $_POST['plat_id'];
      $week = $_POST['week'];
      // Etape 3
      if (strlen($user_id) < 1)
        $error = "Contenu trop court (< 1)";
      else if (strlen($user_id) > 10)
        $error = "Contenu trop long (> 10)";
      else if (strlen($plat_id) < 1)
        $error = "Contenu trop court (< 1)";
      else if (strlen($plat_id) > 10)
        $error = "Contenu trop long (> 10)";
      else
      {
        // Etape 4
        $user_id = intval($user_id);
        $plat_id = intval($plat_id);

        $query = "DELETE FROM bistrot_commands
          WHERE user_id = '".$user_id."' AND plat_id = '".$plat_id."' ";
        $res = mysqli_query($db, $query);

        if ($res === false)
          $error = "Erreur interne au serveur";
        else
        {
          // Etape 5
          // header('Location: index.php');
          // exit;
        }
      }
    }
  }
  else if ($action == 'valid_command')
  {
    if ( isset( $_POST['user_id'],$_POST['plat_id'],$_POST['week'] ) )
    {
      // Etape 2
      $user_id = $_POST['user_id'];
      $plat_id = $_POST['plat_id'];
      $week = $_POST['week'];
      // Etape 3
      if (strlen($user_id) < 1)
        $error = "Contenu trop court (< 1)";
      else if (strlen($user_id) > 10)
        $error = "Contenu trop long (> 10)";
      else if (strlen($plat_id) < 1)
        $error = "Contenu trop court (< 1)";
      else if (strlen($plat_id) > 10)
        $error = "Contenu trop long (> 10)";
      else
      {
        // Etape 4
        $user_id = intval($user_id);
        $plat_id = intval($plat_id);

        $query = "UPDATE bistrot_commands 
          SET statut = 'paid' 
          WHERE user_id = '".$user_id."' AND plat_id = '".$plat_id."' ";
        $res = mysqli_query($db, $query);

        if ($res === false)
          $error = "Erreur interne au serveur";
        else
        {
          // Etape 5
          // header('Location: index.php');
          // exit;
        }
      }
    }
  }

/////////////////////////// TITUX ///////////////////////////////////////////////////////
	
	// else if ($action == 'valid_command')
	// {
	// 	$commandId = $_POST['id'];

	// 	$query = "UPDATE bistrot_commands SET statut = 'paid' WHERE id = '" . $commandId . "'";
	// 	$res = mysqli_query($db, $query);
	// 	if ($res) 
	// 	{
	// 		header('Location: list_command');
	// 		exit;
	// 	}
	// 	else
	// 	{
	//   		$error = "Erreur interne au serveur";
	// 	}
	// }

/////////////////////////////// FIN //////////////////////////////////////////////////////

	else
		$error = "Erreur interne (vous avez essayé de m'entuber)";
}
?>