<?php
include "includes/navbar.php";
if(isset($_POST['AjouterVoiture'])){
    $carname = $_POST['carname'];
    $carbrand = $_POST['carbrand'];
    $originalcarprice = $_POST['originalcarprice'];
    $reduction = $_POST['reduction'];
    $carpricewithreduction = $_POST['carpricewithreduction'];
    $carmodel = $_POST['carmodel'];
    $carsteats = $_POST['carsteats'];
    $carfuel = $_POST['carfuel'];
    $cartransmission = $_POST['cartransmission'];
    // $carimg = $_POST['carimg'];

    // $sqlState = $pdo->prepare('INSERT INTO cars VALUES(NULL,?,?,?,?,?,?,?,?,?,?)');
    // $sqlState->execute(array($carname, $carbrand, $originalcarprice,
    // $reduction, $carpricewithreduction, $carmodel, $carsteats,$carfuel,$cartransmission,$carimg
    // ));

    $targetDir = "uploads/";  // Folder to store the uploaded images
    $fileName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

    // Allow certain file formats
    $allowedTypes = array("jpg", "jpeg", "png");
    if (in_array($imageFileType, $allowedTypes)) {
        // Move the uploaded file to the server directory
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            // Insert file path into the database
            // $insert = $conn->query("INSERT INTO images (image_path) VALUES ('$targetFilePath')");
            $sqlState = $pdo->prepare('INSERT INTO cars VALUES(NULL,?,?,?,?,?,?,?,?,?,?)');
            $sqlState->execute(array($carname, $carbrand, $originalcarprice,
            $reduction, $carpricewithreduction, $carmodel, $carsteats,$carfuel,$cartransmission,$targetFilePath
            ));
        } else {
            echo "File upload failed.";
        }
    } else {
        $TypeError = "Image extension Only JPG, JPEG, PNG autorisé";
    }

    // $currentDateTime = date("Y-m-d H:i:s");
    // $UserID = $_SESSION['userid'];
    // $sqlState2 = $pdo->prepare('INSERT INTO historique VALUES(NULL,"Creation Operateur",?,?)');
    // $sqlState2->execute(array($currentDateTime,$UserID));
    $SuccesMessage = "Voiture Bien Ajouté";
    header("refresh:1;AjouterVoiture.php");
}
?>

<div id="loader">
    <div class="spinner"></div>
</div>

<main class="content">
  <div class="row">
    <div class="col-12 col-xl-12">
            <?php
                if(isset($TypeError)){
                    echo "
                    <div class='alert alert-danger' role='alert'>
                        $TypeError
                    </div>
                    ";
                }elseif(isset($SuccesMessage)){
                    echo "
                    <div class='alert alert-success' role='alert'>
                        $SuccesMessage
                    </div>
                    ";
                }
            ?>

        <div class="card card-body border-0 shadow mb-4">
            <h2 class="h5 mb-4">Ajouter Marque</h2>
            <form method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div>
                            <label for="first_name">Nom Vehicle</label>
                            <input class="form-control" name="carname" type="text" placeholder="Exemple : AUDI RS4" required>
                        </div>
                    </div>
                </div>
                <div class="">
                    <button class="btn btn-gray-800 mt-2 animate-up-2" name="AjouterVoiture" type="submit">Ajouter</button>
                </div>
                </div>
            </form>
        </div>
    </div>
  </div>
</main>
