<?php
    include_once 'includes/database.php'; 
    $carId = $_GET['CAR'];
    $name = isset($_GET['name']) ? $_GET['name'] : null;
    $email = isset($_GET['email']) ? $_GET['email'] : null;
    $phone = isset($_GET['phone']) ? $_GET['phone'] : null;
    $status = 0;
    $currentDateTime = date("Y-m-d H:i:s");
    // $IsFromSearch = $_GET['search']
    if(isset($_GET['Search'])){
        $LD = $_GET['LD'];
        $LR = $_GET['LR'];
        $DD = $_GET['DD'];
        $DR = $_GET['DR'];
        $HD = $_GET['HD'];

    }else{
        if(isset($_GET['LD']) && isset($_GET['LR']) && isset($_GET['DD']) && isset($_GET['DR']) && isset($_GET['HD'])){
        $LD = $_GET['LD'];
        $LR = $_GET['LR'];
        $DD = $_GET['DD'];
        $DR = $_GET['DR'];
        $HD = $_GET['HD'];
        }
    }
    echo $name;
    echo $email;
    echo  $phone;

    function checkDatabaseForCode($code) {
        include 'includes/database.php'; 
        $stmt = $pdo->prepare('SELECT COUNT(*) FROM reservations WHERE ReservationNum = :code');
        $stmt->bindParam(':code', $code);
        $stmt->execute();        
        return $stmt->fetchColumn() > 0;
    }
    function generateReservationCode($length = 10) {
        do {
            $randomBytes = bin2hex(random_bytes($length / 2));
            $reservationCode = strtoupper($randomBytes);
            $isUnique = !checkDatabaseForCode($reservationCode);

        } while (!$isUnique); 

        return $reservationCode;
    }
    $reservationCode = generateReservationCode(10);
    $sqlState = $pdo->prepare('INSERT INTO reservations VALUES(NULL,?,?,?,?,?,?,?,?,?,?,?,?)');
    $rsult = $sqlState->execute(array($reservationCode,$status,$currentDateTime,$carId,$name,$email,$phone,$LD,$LR,$DD,$DR,$HD));
    if($rsult){
      $SuccesMessage = "Voiture Bien Ajouté";
        //   header("location:../ThankYouForBooking.php?ref=$reservationCode");
    }else{
      $Error = "Erreur lors de l'ajout de la voiture";
    }
?>