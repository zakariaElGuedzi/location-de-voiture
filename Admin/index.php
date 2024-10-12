<?php
include "includes/navbar.php";
// $stmt = $pdo->prepare('SELECT COUNT(UserID) as NbVendeur FROM users WHERE Role = :role');
// $stmt->execute([':role' => 'Operateur']);
// $NbVendeur = $stmt->fetchColumn();

// $stmt2 = $pdo->prepare('SELECT COUNT(ProduitID) as NbProduit FROM produit');
// $stmt2->execute();
// $NbProduit = $stmt2->fetchColumn();

// $stmt3 = $pdo->prepare('SELECT COUNT(NumeroFacture) as NbFacture FROM facture');
// $stmt3->execute();
// $NbFacture = $stmt3->fetchColumn()
?>
<main class="content">
  <div class="py-4">
      <div class="dropdown">
          <button class="btn btn-gray-800 d-inline-flex align-items-center me-2 dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
              Nouvelle Actions
          </button>
          <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1">
              <a class="dropdown-item d-flex align-items-center" href="AjouterOperateur.php">
                  <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path></svg>
                  Ajouter Voiture
              </a>
              <a class="dropdown-item d-flex align-items-center" href="AjouterProduit.php">
                  <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z"></path>
                  </svg>                            
                  Ajouter Categorie
              </a>
              <a class="dropdown-item d-flex align-items-center" href="CreeFacture.php">
                  <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"></path>
                  </svg>                            
                  Liste Reservation
              </a>
          </div>
      </div>
  </div>
  <div class="row">
      <div class="col-12 col-sm-6 col-xl-4 mb-4">
          <div class="card border-0 shadow">
              <div class="card-body">
                  <div class="row d-block d-xl-flex align-items-center">
                      <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                          <div class="icon-shape icon-shape-primary rounded me-4 me-sm-0">
                          <i class="fa-solid fa-car fs-4"></i>
                        </div>
                          <div class="d-sm-none">
                              <h2 class="h5">Total Voitures</h2>
                              <h3 class="fw-extrabold mb-1">11</h3>
                          </div>
                      </div>
                      <div class="col-12 col-xl-7 px-xl-0">
                          <div class="d-none d-sm-block">
                              <h2 class="h6 text-gray-400 mb-0">Total Voitures</h2>
                              <h3 class="fw-extrabold mb-2">11</h3>
                          </div>

                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-12 col-sm-6 col-xl-4 mb-4">
          <div class="card border-0 shadow">
              <div class="card-body">
                  <div class="row d-block d-xl-flex align-items-center">
                      <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                          <div class="icon-shape icon-shape-secondary rounded me-4 me-sm-0">
                          <i class="fa-solid fa-folder-open fs-4"></i>
                        </div>
                          <div class="d-sm-none">
                              <h2 class="fw-extrabold h5">Total Reservation</h2>
                              <h3 class="mb-1">3</h3>
                          </div>
                      </div>
                      <div class="col-12 col-xl-7 px-xl-0">
                          <div class="d-none d-sm-block">
                              <h2 class="h6 text-gray-400 mb-0">Total Reservation</h2>
                              <h3 class="fw-extrabold mb-2">3</h3>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-12 col-sm-6 col-xl-4 mb-4">
          <div class="card border-0 shadow">
              <div class="card-body">
                  <div class="row d-block d-xl-flex align-items-center">
                      <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                          <div class="icon-shape icon-shape-info rounded me-4 me-sm-0">
                          <i class="fa-solid fa-bookmark fs-4"></i>
                        </div>
                          <div class="d-sm-none">
                              <h2 class="fw-extrabold h5">Total Brands</h2>
                              <h3 class="mb-1">8</h3>
                          </div>
                      </div>
                      <div class="col-12 col-xl-7 px-xl-0">
                          <div class="d-none d-sm-block">
                              <h2 class="h6 text-gray-400 mb-0">Total Brands</h2>
                              <h3 class="fw-extrabold mb-2">8</h3>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- <div class="col-12 col-sm-6 col-xl-4 mb-4">
          <div class="card border-0 shadow">
              <div class="card-body">
                  <div class="row d-block d-xl-flex align-items-center">
                      <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                          <div class="icon-shape icon-shape-success rounded me-4 me-sm-0">
                          <i class="fa-solid fa-check-double fs-4"></i>
                        </div>
                          <div class="d-sm-none">
                              <h2 class="fw-extrabold h5">Reservation Confirmé</h2>
                              <h3 class="mb-1">1</h3>
                          </div>
                      </div>
                      <div class="col-12 col-xl-7 px-xl-0">
                          <div class="d-none d-sm-block">
                              <h2 class="h6 text-gray-400 mb-0">Reservation Confirmé</h2>
                              <h3 class="fw-extrabold mb-2">1</h3>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div> -->
      <!-- <div class="col-12 col-sm-6 col-xl-4 mb-4">
          <div class="card border-0 shadow">
              <div class="card-body">
                  <div class="row d-block d-xl-flex align-items-center">
                      <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                          <div class="icon-shape icon-shape-danger rounded me-4 me-sm-0">
                          <i class="fa-solid fa-ban fs-4"></i>
                        </div>
                          <div class="d-sm-none">
                              <h2 class="fw-extrabold h5">Reservation Annulé</h2>
                              <h3 class="mb-1">1</h3>
                          </div>
                      </div>
                      <div class="col-12 col-xl-7 px-xl-0">
                          <div class="d-none d-sm-block">
                              <h2 class="h6 text-gray-400 mb-0">Reservation Annulé</h2>
                              <h3 class="fw-extrabold mb-2">1</h3>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div> -->
  </div>
</main>
<script>
</script>