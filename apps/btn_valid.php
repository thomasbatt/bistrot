<?php

  if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
    require 'views/valid_command.phtml';
  }

?>
