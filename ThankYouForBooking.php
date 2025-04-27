<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href='https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat:700' rel='stylesheet' type='text/css'>
	<style>
		@import url(//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.min.css);
		@import url(//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);
	</style>
	<link rel="stylesheet" href="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/default_thank_you.css">
	<script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/jquery-1.9.1.min.js"></script>
	<script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/html5shiv.js"></script>
</head>
<style>
    header{
        padding-top: 80px !important;
    }
</style>
<body>
	<header class="site-header" id="header">
        <img src="/img/lgBlack.png" width="200px" alt="">
		<!-- <h6 class="site-header__title" data-lead-id="site-header-title">MERCI</h6> -->
	</header>

	<div class="main-content">
		<!-- <i class="fa fa-check main-content__checkmark" id="checkmark"></i> -->
        <h4>Votre code de reservation : <h1 style="font-weight: bolder;"><?php echo $_GET['ref']?></h3></h4>
		<p class="main-content__body" data-lead-id="main-content-body">Merci d'avoir choisi de réserver avec nous ! Nous sommes ravis de pouvoir répondre à vos besoins en location de voiture et nous engageons à vous offrir une expérience fluide et agréable. Si vous avez des questions ou besoin d'assistance, n'hésitez pas à nous contacter. Nous avons hâte de vous offrir un service exceptionnel !</p>
	</div>
    <a href="index.php" style="text-decoration: none; color: blue; font-weight: 900;border: 2px solid blue; padding: 12px; margin-top: 10px; border-radius: 8px; display: inline-block; ">Revenir au site web</a>
</body>
</html>