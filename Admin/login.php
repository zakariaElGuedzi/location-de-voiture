<?php
include "./includes/database.php";
include "./includes/dependencies.php";
session_start();
if (isset($_POST['connecter'])) {
    $username = $_POST['Username'];
    $password = $_POST['Password'];
    // $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare('SELECT * FROM admin WHERE Username = :username AND Password = :passwor');
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':passwor', $password);
    $stmt->execute();
    $result = $stmt->fetchAll();
    if (!empty($result)) {
        $message =  "Login successful!";
        $type = "success";
        $_SESSION['username'] = $username;
        header("refresh:1;index.php");
    } else {
        $message = "Login failed!";
        $type = "danger";
    }
}
?>
<main>
  <section class="vh-lg-100 mt-5 mt-lg-0 bg-soft d-flex align-items-center">
     <div class="container">
        <p class="text-center">
           <a href="https://perlaplaya.site/index.php" class="d-flex align-items-center justify-content-center">
              <svg class="icon icon-xs me-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                 <path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
              </svg>
              Revenir au siteweb
           </a>
        </p>
        <div class="row justify-content-center form-bg-image">
           <div class="col-12 d-flex align-items-center justify-content-center">
              <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500">
                 <div class="text-center text-md-center mb-4 mt-md-0">
                    <img src="https://perlaplaya.site/img/lgBlack.png" alt="" width="200px">
                 </div>
                 <form  method="post" class="mt-4">
                    <?php
                        if(isset($message)){
                            echo"<div class='alert alert-".$type."' role='alert'>
                                $message
                            </div>";
                        }
                    ?>
                    <div class="form-group mb-4">
                       <label for="email">Your Email</label>
                       <div class="input-group">
                          <span class="input-group-text" id="basic-addon1">
                             <svg class="icon icon-xs text-gray-600" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                             </svg>
                          </span>
                          <input type="text" class="form-control" name="Username" placeholder="Username" id="email" autofocus="" required="">
                       </div>
                    </div>
                    <div class="form-group">
                       <div class="form-group mb-4">
                          <label for="password">Your Password</label>
                          <div class="input-group">
                             <span class="input-group-text" id="basic-addon2">
                                <svg class="icon icon-xs text-gray-600" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                   <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                                </svg>
                             </span>
                             <input type="password" placeholder="Password" name="Password" class="form-control" id="password" required="">
                          </div>
                       </div>
                       <!-- <div class="d-flex justify-content-between align-items-top mb-4">
                          <div class="form-check"><input class="form-check-input" type="checkbox" value="" id="remember"> <label class="form-check-label mb-0" for="remember">Remember me</label></div>
                          <div><a href="forgot-password.html" class="small text-right">Lost password?</a></div>
                       </div> -->
                    </div>
                    <div class="d-grid"><button type="submit" name="connecter" class="btn btn-gray-800">Se connecter</button></div>
                 </form>
              </div>
           </div>
        </div>
     </div>
  </section>
</main>