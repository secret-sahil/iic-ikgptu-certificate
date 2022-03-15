<!-- session check -->
<?php 
  session_start();
  if (empty($_SESSION['user'])) {
    header('location:./');
  }
  session_destroy();
  header('location:./')
?>