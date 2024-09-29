<?php
include "includes/navbar.php";
?>
<main class="content">
  <div class="row">
    <div class="col-12 col-xl-12">
        <div class="card card-body border-0 shadow mb-4">
            <h2 class="h5 mb-4">General information</h2>
            <form method="POST">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div>
                            <label for="first_name">Nom Vehicle</label>
                            <input class="form-control" name="NomComplet" type="text" placeholder="Exemple : AUDI RS4" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="my-1 me-2" for="country">Marque</label>
                        <select class="form-select" id="country" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">BMW</option>
                            <option value="2">Clio</option>
                            <option value="3">Peugeot</option>
                        </select>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-6 mb-3">
                        <div class="">
                            <label for="exampleInputIconRight">Prix par jour:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="exampleInputIconRight" placeholder="Exemple : 1500" aria-label="Search">
                                <span class="input-group-text" id="basic-addon2">
                                    MAD
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="Password">Type Fuel</label>
                        <select class="form-select" id="country" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">Diesel</option>
                            <option value="2">Essence</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="my-1 me-2" for="country">Vitesse</label>
                        <select class="form-select" id="country" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">Manuel</option>
                            <option value="2">Automatic</option>
                        </select>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-6 mb-3">
                        <div class="">
                            <label for="exampleInputIconRight">Annee Model:</label>
                            <input class="form-control" name="NomComplet" type="text" placeholder="Exemple : 2020" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="Password">Nombre Siege :</label>
                        <input class="form-control" name="NomComplet" type="text" placeholder="Exemple : 5 " required>
                    </div>
                </div>
                <hr>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Voiture Image :</label>
                    <input class="form-control" type="file" id="formFile">
                </div>
                <hr>
                <h6>Accesories :</h6>
                <div class="d-flex flex-wrap align-content-center gap-3 mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck10">
                        <label class="form-check-label" for="defaultCheck10">
                            Default checkbox
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck11">
                        <label class="form-check-label" for="defaultCheck11">
                            Default checkbox
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck12">
                        <label class="form-check-label" for="defaultCheck12">
                            Default checkbox
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck13">
                        <label class="form-check-label" for="defaultCheck13">
                            Default checkbox
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck14">
                        <label class="form-check-label" for="defaultCheck14">
                            Default checkbox
                        </label>
                    </div>                    
                </div>

                <div class="">
                    <button class="btn btn-gray-800 mt-2 animate-up-2" name="AjouterOperateur" type="submit">Ajouter</button>
                </div>
                </div>
            </form>
        </div>
    </div>
  </div>
</main>