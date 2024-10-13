<?php
  include "includes/database.php";
  $ID = $_GET['id'];
  $SQLSTATE = $pdo->prepare('DELETE FROM cars WHERE CarId=?');
  $delete = $SQLSTATE->execute(array($ID));
  header("location:GererVoiture.php")
?>