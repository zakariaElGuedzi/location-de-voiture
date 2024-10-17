<?php
ob_start();
try{
  $pdo = new PDO('mysql:host=localhost;dbname=u674441585_locvoi','PerlaPlaya','PerlaPlayaPlayaPerla12345!@#');
}catch(PDOException $e){
  echo 'ERROR: ' . $e->getMessage();
  die();
}
?>