<?php
// include_once "database.php";

?>
<head> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Primary Meta Tags -->
<title>Location Voiture</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="title" content="Volt - Free Bootstrap 5 Dashboard">
<meta name="author" content="Themesberg">
<meta name="description" content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
<meta name="keywords" content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, themesberg, themesberg dashboard, themesberg admin dashboard" />
<link rel="canonical" href="https://themesberg.com/product/admin-dashboard/volt-premium-bootstrap-5-dashboard">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="https://demo.themesberg.com/volt-pro">
<meta property="og:title" content="Volt - Free Bootstrap 5 Dashboard">
<meta property="og:description" content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
<meta property="og:image" content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/volt-pro-bootstrap-5-dashboard/volt-pro-preview.jpg">
<script src="https://kit.fontawesome.com/cfd6df17a2.js" crossorigin="anonymous"></script>

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="https://demo.themesberg.com/volt-pro">
<meta property="twitter:title" content="Volt - Free Bootstrap 5 Dashboard">
<meta property="twitter:description" content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
<meta property="twitter:image" content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/volt-pro-bootstrap-5-dashboard/volt-pro-preview.jpg">

<!-- Favicon -->
<link rel="apple-touch-icon" sizes="120x120" href=" assets/img/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href=" assets/img/lc.png">
<link rel="icon" type="image/png" sizes="16x16" href=" assets/img/lc.png">
<link rel="manifest" href=" assets/img/favicon/site.webmanifest">
<link rel="mask-icon" href=" assets/img/favicon/safari-pinned-tab.svg" color="#ffffff">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="theme-color" content="#ffffff">

<!-- Sweet Alert -->
<link type="text/css" href=" vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
<link type="text/css" href=" vendor/apexcharts/dist/apexcharts.css" rel="stylesheet">

<!-- Notyf -->
<link type="text/css" href=" vendor/notyf/notyf.min.css" rel="stylesheet">

<!-- Volt CSS -->
<link type="text/css" href="css/volt.css" rel="stylesheet">

<!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->

</head>



<script src=" vendor/@popperjs/core/dist/umd/popper.min.js"></script>
<script src=" vendor/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Vendor JS -->
<script src=" vendor/onscreen/dist/on-screen.umd.min.js"></script>

<!-- Slider -->
<!-- <script src=" vendor/nouislider/distribute/nouislider.min.js"></script> -->

<!-- Smooth scroll -->
<script src=" vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>

<!-- Charts -->
<script src=" vendor/chartist/dist/chartist.min.js"></script>
<script src=" vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>

<!-- Datepicker -->
<script src=" vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>

<!-- Sweet Alerts 2 -->
<script src=" vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>

<!-- Moment JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>

<!-- Vanilla JS Datepicker -->
<script src=" vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>
<script src=" vendor/simple-datatables/dist/umd/simple-datatables.js"></script>
<script src=" vendor/apexcharts/dist/apexcharts.min.js"></script> 


<!-- Notyf -->
<script src=" vendor/notyf/notyf.min.js"></script>

<!-- Simplebar -->
<script src=" vendor/simplebar/dist/simplebar.min.js"></script>

<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<!-- Volt JS -->
<script src="assets/js/volt.js"></script>
<style>
    #loader {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.1); /* semi-transparent background */
            z-index: 9999; /* high z-index to overlay content */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Spinner (loader) style */
        .spinner {
            border: 8px solid #f3f3f3; /* Light grey */
            border-top: 8px solid #3498db; /* Blue */
            border-radius: 50%;
            width: 60px;
            height: 60px;
            animation: spin 1.5s linear infinite;
        }

        /* Keyframes for spinning effect */
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Hide content until the page fully loads */
        #content {
            display: none;
        }
</style>
<script>
  // scripts.js
function loadContent(page) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', page, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('content').innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}
window.addEventListener("beforeunload", function() {
            // Show the loader
        document.getElementById("loader").style.visibility = "visible";
    });

    // Also, hide the loader after the page is fully loaded
    window.addEventListener("load", function() {
        document.getElementById("loader").style.visibility = "hidden";
    });

</script>