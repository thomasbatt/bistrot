<?php

  $userId = mysqli_real_escape_string($db, $_SESSION['id']);
  $sql = "SELECT bistrot_commands.id AS commandeId,
                bistrot_commands.user_id AS commandUserId,
                bistrot_commands.plat_id AS commandPlatId,
                bistrot_commands.statut AS commandStatut,
                bistrot_commands.date AS commandDate,
                bistrot_plats.content AS platContent,
                bistrot_plats.price AS platPrice,
                bistrot_plats.day AS platDay,
                bistrot_plats.week AS platWeek,
                bistrot_plats.date AS platDate,
                bistrot_users.login AS userLogin
          FROM bistrot_commands
          LEFT JOIN bistrot_plats
                ON bistrot_commands.plat_id = bistrot_plats.id
          LEFT JOIN bistrot_users
                ON bistrot_commands.user_id = bistrot_users.id";
  if($_SESSION['role'] == 'user') {
    $sql .= " WHERE bistrot_users.id = '" . $userId . "'";
  }

  $commands = mysqli_query($db, $sql);

  while ($command = mysqli_fetch_assoc($commands)) {
    $jours = ['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche'];
    $commandId = $command['commandeId'];
    $commandUserId = $command['commandUserId'];
    $commandPlatId = $command['commandPlatId'];
    $commandStatut = $command['commandStatut'];
    $commandDate = $command['commandDate'];
    $platContent = $command['platContent'];
    $platPrice = $command['platPrice'];
    $platDay = $jours[$command['platDay']-1];
    $platWeek = $command['platWeek'];
    $platDate = $command['platDate'];
    $userLogin = $command['userLogin'];
    require 'views/command.phtml';
  }

  // var_dump($data);
  // die();

  // for($i = 1;$i < 7; $i++) {
  // }

?>
