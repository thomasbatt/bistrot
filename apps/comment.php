<?php

  $sql = "SELECT content FROM bistrot_comments WHERE command_id='" . $commandId . "'";
  $comments = mysqli_query($db, $sql);

  while($comment = mysqli_fetch_assoc($comments)) {
    $commentContent = mysqli_real_escape_string($db, $comment['content']);
    require 'views/comment.phtml';
  }
  require 'views/creat_comment.phtml';



?>
