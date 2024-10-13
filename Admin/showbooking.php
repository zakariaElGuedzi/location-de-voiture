<?php
include "includes/navbar.php";

?>

<div id="loader">
    <div class="spinner"></div>
</div>

<?php
   $id = $_GET['id'];
    $Booking = $pdo->prepare('SELECT * FROM reservations where ResID=?');
    $Booking->execute(array($id));
    $bk = $Booking->fetch(PDO::FETCH_OBJ);
?>

<main class="content">
  <div class="row">
    <div class="col-12 col-xl-12">
        <!-- <div class="card card-body border-0 shadow mb-4">
            <h2 class="h5 mb-4">Booking Information</h2>
        </div> -->
         <div class="row justify-content-center mt-4">
            <div class="col-12 col-xl-12">
               <div class="card shadow border-0 p-4 p-md-5 position-relative">
                  <div class="mb-6 d-flex align-items-center justify-content-center">
                     <h4 class="h4 mb-0">Numero Reservation: <?php echo  $bk->ReservationNum; ?></h4>
                     <?php
                    if($bk->Status == 0){
                      $STATUS = "En Attente";
                      $bg = "warning";
                    }elseif($res->Status == 1){
                      $STATUS = "Accepté";
                      $bg = "success";
                    }else{
                      $STATUS = "Refusé";
                      $bg = "danger";
                    }
                  ?>
                     <span class="badge badge-lg bg-<?PHP ECHO $bg?> text-black ms-4"><?php echo $STATUS?></span>
                  </div>
                  <div class="row justify-content-between mb-4 mb-md-5">
                     <div class="col-sm">
                        <h5>Information Client:</h5>
                        <div>
                           <ul class="list-group simple-list">
                              <li class="list-group-item fw-normal"><?php echo  $bk->Name; ?></li>
                              <li class="list-group-item fw-normal"><?php echo  $bk->PhoneNum; ?></li>
                              <li class="list-group-item fw-normal"><?php echo  $bk->Mail; ?></li>
                           </ul>
                        </div>
                     </div>
                     <div class="col-sm col-lg-4">
                        <dl class="row text-sm-right">
                           <dt class="col-6"><strong>Lieu Prise en charge:</strong></dt>
                           <dd class="col-6"><?php echo  $bk->Departure; ?></dd>
                           <dt class="col-6"><strong>Lieu restitution:</strong></dt>
                           <dd class="col-6"><?php echo  $bk->Arrival; ?></dd>
                           <dt class="col-6"><strong>Date charge:</strong></dt>
                           <dd class="col-6"><?php echo  $bk->DepartureDate; ?></dd>
                           <dt class="col-6"><strong>Date restitution:</strong></dt>
                           <dd class="col-6"><?php echo  $bk->ArrivalDate; ?></dd>
                        </dl>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-12">
                        <div class="table-responsive">
                           <table class="table mb-0">
                              <thead class="bg-light border-top">
                                 <tr>
                                    <th scope="row" class="border-0 text-left">Voiture</th>
                                    <th scope="row" class="border-0">Marque</th>
                                    <th scope="row" class="border-0">Prix pour 4 jour</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                        $Cars = $pdo->prepare('SELECT * FROM cars where CarId=?');
                                        $Cars->execute(array($bk->CarId));
                                        $cr = $Cars->fetch(PDO::FETCH_OBJ);

                                        $Brand = $pdo->prepare('SELECT Brand FROM brands where BrandId=?');
                                        $Brand->execute(array($cr->BrandId));
                                        $br = $Brand->fetch(PDO::FETCH_OBJ);
                                 ?>
                                 <tr>
                                    <th scope="row" class="text-left fw-bold h6"><?php echo  $cr->CarName; ?></th>
                                    <td><?php echo  $br->Brand; ?></td>
                                    <td><?php echo  $cr->CarPricewithReduction; ?></td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                        <div class="d-flex justify-content-end text-right mb-4 py-4">
                           <div class="mt-4">
                              <table class="table table-clear">
                                 <tbody>
                                    <tr>
                                       <td class="left"><strong>Prix</strong></td>
                                       <td class="right"><?php echo  $cr->CarOriginalPrice; ?> DH</td>
                                    </tr>
                                    <tr>
                                       <td class="left"><strong>Reduction (0%)</strong></td>
                                       <td class="right"><?php echo  $cr->CarReduction; ?> DH</td>
                                    </tr>
                                    <tr>
                                       <td class="left"><strong>Total</strong></td>
                                       <td class="right"><strong><?php echo  $cr->CarPricewithReduction; ?> DH</strong></td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
    </div>
  </div>
</main>
