<?php
  include "includes/database.php";
  $ID = $_GET['id'];
  $SQLSTATE = $pdo->prepare('DELETE FROM brands WHERE BrandId=?');
  $delete = $SQLSTATE->execute(array($ID));
  header("location:Marque.php")
?>