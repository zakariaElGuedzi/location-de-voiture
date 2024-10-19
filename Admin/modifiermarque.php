<?php
  include "includes/database.php";
  $ID = $_GET['id'];
  $newmarque = $_GET['newmarque'];
  $SQLSTATE = $pdo->prepare('UPDATE brands set Brand=? WHERE BrandId=?');
  $delete = $SQLSTATE->execute(array($newmarque,$ID));
  header("location:Marque.php")
?>