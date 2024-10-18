<?php
    include_once 'includes/database.php'; 
    $status = 0;
    $currentDateTime = date("Y-m-d H:i:s");

    if (isset($_GET['CAR'])) {
        $carId = htmlspecialchars($_GET['CAR']);
        echo  $carId;

    } 

    if (isset($_GET['LD'])) {
        $LD = htmlspecialchars($_GET['LD']);
        echo  $LD;

    }       
    
    if (isset($_GET['LR'])) {
        $LR = htmlspecialchars($_GET['LR']);
        echo $LR;
    }       
    
    if (isset($_GET['DD'])) {
        $DD = htmlspecialchars($_GET['DD']);
        echo  $DD;

    }       
    
    if (isset($_GET['DR'])) {
        $DR = htmlspecialchars($_GET['DR']);
        echo $DR;
    }       
    
    if (isset($_GET['HD'])) {
        $HD = htmlspecialchars($_GET['HD']);
        echo  $HD;

    } 

    if (isset($_GET['name'])) {
        $name = htmlspecialchars($_GET['name']);
        echo $name;
    }

    if (isset($_GET['email'])) {
        $email = htmlspecialchars($_GET['email']);
        echo $email;
    }

    if (isset($_GET['phone'])) {
        $phone = htmlspecialchars($_GET['phone']);
        echo $phone;
    }
    echo  $carId;


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