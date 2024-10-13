<?php
    include_once 'includes/database.php'; 
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $status = 0;
    $currentDateTime = date("Y-m-d H:i:s");
    $carId = $_GET['CAR'];
    if(isset($_GET['LD']) && isset($_GET['LR']) && isset($_GET['DD']) && isset($_GET['DR']) && isset($_GET['HD'])){
        $LD = $_GET['LD'];
        $LR = $_GET['LR'];
        $DD = $_GET['DD'];
        $DR = $_GET['DR'];
        $HD = $_GET['HD'];
        // ECHO "ALL SET";
    }else{
            // ECHO "PLEASE FILL ALL FIELDS";
    }
    // Example database check function (replace with actual database logic)
    function checkDatabaseForCode($code) {
        include 'includes/database.php'; 
        $stmt = $pdo->prepare('SELECT COUNT(*) FROM reservations WHERE ReservationNum = :code');
        $stmt->bindParam(':code', $code);
        $stmt->execute();
        
        // If the count is more than 0, the code exists
        return $stmt->fetchColumn() > 0;
    }
    function generateReservationCode($length = 10) {
        do {
            // Generate a random binary string and convert it to hexadecimal
            $randomBytes = bin2hex(random_bytes($length / 2));
            $reservationCode = strtoupper($randomBytes);

            // Check if the code is already in the database
            $isUnique = !checkDatabaseForCode($reservationCode);

        } while (!$isUnique); // Keep generating until a unique code is found

        return $reservationCode;
    }

    // echo generateReservationCode(10); // Example output: A9F4C7D2E1
    $reservationCode = generateReservationCode(10);
    $sqlState = $pdo->prepare('INSERT INTO reservations VALUES(NULL,?,?,?,?,?,?,?,?,?,?,?,?)');
    $rsult = $sqlState->execute(array($reservationCode,$status,$currentDateTime,$carId,$name,$email,$phone,$LD,$LR,$DD,$DR,$HD));
    if($rsult){
      $SuccesMessage = "Voiture Bien Ajouté";
      header("location:../SingleVehiclePgae/SingleVehicle.php?id=$SuccesMessage");
    }else{
      $Error = "Erreur lors de l'ajout de la voiture";
    }
?>