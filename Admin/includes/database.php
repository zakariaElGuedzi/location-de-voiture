<?php
ob_start();
try{
  $pdo = new PDO('mysql:host=localhost;dbname=locvoi','root','');
}catch(PDOException $e){
  echo 'ERROR: ' . $e->getMessage();
  die();
}
?>