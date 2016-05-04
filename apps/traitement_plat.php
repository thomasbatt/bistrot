<?php
// var_dump('coucou');
// var_dump($_POST);

if (isset($_POST['action']))
{
	$action = $_POST['action'];
	if ($action == 'next_week')
	{
		// Etape 1
		if (isset($_POST['week']))
		{
			// Etape 2
			$week = $_POST['week'];
			// Etape 3
			if (strlen($week) < 1 || $week < 1 ){
				$error = "Contenu trop court (< 1)";
				$week = $week+1;
			}
			else if (strlen($week) > 2 || $week > 54 ){
				$error = "Contenu trop long (> 54)";
				$week = $week-1;
			}
			else
				$week = $week+1;
		}
	}
	else if ($action == 'previous_week')
	{
		// Etape 1
		if (isset($_POST['week']))
		{
			// Etape 2
			$week = $_POST['week'];
			// Etape 3
			if (strlen($week) < 1 || $week < 1 ){
				$error = "Contenu trop court (< 1)";
				$week = $week+1;
			}
			else if (strlen($week) > 2 || $week > 54 ){
				$error = "Contenu trop long (> 54)";
				$week = $week-1;
			}
			else
				$week = $week-1;
		}
	}
	else if ($action == 'edit_plat')
	{
		// Etape 1
		if ( isset( $_POST['week'],$_POST['day'],$_POST['statut'],$_POST['content'],$_POST['price'] ) )
		{
			// Etape 2
			$week = $_POST['week'];
			$day = $_POST['day'];
			$statut = $_POST['statut'];
			$content = $_POST['content'];
			$price = $_POST['price'];
			// Etape 3
			if (empty($statut))
				$error = "Statut est vide";
			if (strlen($week) < 1)
				$error = "Contenu trop court (< 1)";
			else if (strlen($week) > 54)
				$error = "Contenu trop long (> 54)";
			else if (strlen($day) < 1)
				$error = "Contenu trop court (< 1)";
			else if (strlen($day) > 7)
				$error = "Contenu trop long (> 7)";
			else if (strlen($content) < 5)
				$error = "Contenu trop court (< 5)";
			else if (strlen($content) > 255)
				$error = "Contenu trop long (> 255)";
			else if (strlen($price) < 1)
				$error = "Contenu trop court (< 1)";
			else if (strlen($price) > 3)
				$error = "Contenu trop long (> 3)";
			else
			{
				if ( $statut == 'default')
					$statut = 'editing';
				else 
					$statut = 'default';

				$week = intval($week);
				$day = intval($day);
				$price = intval($price);
				$statut = mysqli_real_escape_string($db, $statut);
				$content = mysqli_real_escape_string($db, $content);

				$query = "UPDATE bistrot_plats SET content = '".$content."',price = '".$price."',statut = '".$statut."' WHERE week = '".$week."' AND day = '".$day."' ";
				$res = mysqli_query($db, $query);
				if ($res)
				{
					// Etape 5
					// $_SESSION['week'] = $week;
					// header('Location: index.php');
					// exit;
				}
				else
					$error = "Erreur interne au serveur";
				
			}
		}
	}
	else
		$error = "Erreur interne (vous avez essayé de m'entuber)";
}

?>