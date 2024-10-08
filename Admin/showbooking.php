<?php
include "includes/navbar.php";

?>

<div id="loader">
    <div class="spinner"></div>
</div>

<?php
    // $Cars = $pdo->prepare('SELECT * FROM cars where CarId=?');
    // $Cars->execute(array($id));
    // $cr = $Cars->fetch(PDO::FETCH_OBJ);
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
                     <h4 class="h4 mb-0">Numero Reservation: #00123</h4>
                     <span class="badge badge-lg bg-success ms-4">Confirmer</span>
                  </div>
                  <div class="row justify-content-between mb-4 mb-md-5">
                     <div class="col-sm">
                        <h5>Information Client:</h5>
                        <div>
                           <ul class="list-group simple-list">
                              <li class="list-group-item fw-normal">Henry M. Pike</li>
                              <li class="list-group-item fw-normal">06234768545</li>
                              <li class="list-group-item fw-normal">jeffery@gmail.com</li>
                           </ul>
                        </div>
                     </div>
                     <div class="col-sm col-lg-4">
                        <dl class="row text-sm-right">
                           <dt class="col-6"><strong>Lieu Prise en charge:</strong></dt>
                           <dd class="col-6">Laayoune</dd>
                           <dt class="col-6"><strong>Lieu restitution:</strong></dt>
                           <dd class="col-6">Laayoune</dd>
                           <dt class="col-6"><strong>Date charge:</strong></dt>
                           <dd class="col-6">10/10/2024 15:40</dd>
                           <dt class="col-6"><strong>Date restitution:</strong></dt>
                           <dd class="col-6">10/10/2024 15:40</dd>
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
                                 <tr>
                                    <th scope="row" class="text-left fw-bold h6">Origin License</th>
                                    <td>Extended License</td>
                                    <td>999,00</td>
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
                                       <td class="right">800 DH</td>
                                    </tr>
                                    <tr>
                                       <td class="left"><strong>Reduction (0%)</strong></td>
                                       <td class="right">0 DH</td>
                                    </tr>
                                    <tr>
                                       <td class="left"><strong>Total</strong></td>
                                       <td class="right"><strong>800 DH</strong></td>
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
