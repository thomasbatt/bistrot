<?php

  if(isset($_SESSION['id'])) {
    if($_SESSION['role'] == 'admin') {
      require 'views/list_command_admin.phtml';
    } elseif($_SESSION['role'] == 'user') {
      require 'views/list_command_user.phtml';
    }
  }

?>
