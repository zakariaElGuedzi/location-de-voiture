<?php
    include_once 'includes/database.php'; 
    $status = 0;
    $currentDateTime = date("Y-m-d H:i:s");
    $carId = $_GET['CAR'];
    // $IsFromSearch = $_GET['search']
    if(isset($_GET['Search'])){
        // $LD = $_GET['LD'];
        // $LR = $_GET['LR'];
        // $DD = $_GET['DD'];
        // $DR = $_GET['DR'];
        // $HD = $_GET['HD'];
        echo "Search is set 2";

    }else{
        // if(isset($_POST['LD']) && isset($_POST['LR']) && isset($_POST['DD']) && isset($_POST['DR']) && isset($_POST['HD'])){
        // $LD = $_POST['LD'];
        // $LR = $_POST['LR'];
        // $DD = $_POST['DD'];
        // $DR = $_POST['DR'];
        // $HD = $_POST['HD'];
        // }
        echo "Search is not set 2";

    }
        // Retrieve the 'name' field from the form
    if (isset($_POST['name'])) {
        $name = htmlspecialchars($_GET['name']);
        echo "Name: " . $name . "<br>";
    }else{
        echo "Name is not set";
    }

    // Retrieve the 'email' field from the form
    if (isset($_POST['email'])) {
        $email = htmlspecialchars($_POST['email']);
        echo "Email: " . $email . "<br>";
    }

    // Retrieve the 'age' field from the form
    if (isset($_POST['phone'])) {
        $phone = htmlspecialchars($_POST['phone']);
        echo "Age: " . $phone . "<br>";
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