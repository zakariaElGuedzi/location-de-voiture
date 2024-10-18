<?php
    include_once 'includes/database.php'; 

    $status = 0;
    $currentDateTime = date("Y-m-d H:i:s");
    $carId = $_GET['CAR'];
    if(isset($_GET['Search']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone'])){
        $LD = $_GET['LD'];
        $LR = $_GET['LR'];
        $DD = $_GET['DD'];
        $DR = $_GET['DR'];
        $HD = $_GET['HD'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        echo "Seeach is Set 2";
        echo "---------------";
        echo  $LD;
        echo  $LR;
        echo  $DD;
        echo  $DR;
        echo  $HD;
        echo  $name;
        echo  $email;
        echo  $phone;


    }elseif(isset($_POST['LD']) && isset($_POST['LR']) && isset($_POST['DD']) && isset($_POST['DR']) && isset($_POST['HD']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone'])){
        $LD = $_POST['LD'];
        $LR = $_POST['LR'];
        $DD = $_POST['DD'];
        $DR = $_POST['DR'];
        $HD = $_POST['HD'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        echo "Seeach is not Set 2";
        echo "---------------";
        echo  $LD;
        echo  $LR;
        echo  $DD;
        echo  $DR;
        echo  $HD;
        echo  $name;
        echo  $email;
        echo  $phone;

    }else{
        echo "none of these";
    }

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