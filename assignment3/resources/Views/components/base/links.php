<!-- Favicon -->
<link rel="icon" type="image/x-icon" href="public/assets/img/favicon/favicon.ico" />

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />

<!-- Icons. Uncomment required icon fonts -->
<link rel="stylesheet" href="public/assets/vendor/fonts/boxicons.css" />

<!-- Core CSS -->
<link rel="stylesheet" href="public/assets/vendor/css/core.css" class="template-customizer-core-css" />
<link rel="stylesheet" href="public/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
<link rel="stylesheet" href="public/assets/css/demo.css" />

<!-- Vendors CSS -->
<link rel="stylesheet" href="public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

<link rel="stylesheet" href="public/assets/vendor/libs/apex-charts/apex-charts.css" />

<!-- Helpers -->
<script src="public/assets/vendor/js/helpers.js"></script>

<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
<script src="public/assets/js/config.js"></script>

<!-- CSS FILES -->
<?php
$cssArray = [
    'login' => ['page-auth.css'],
    'register' => ['page-auth.css', 'register.css'],
    'dashboard' => ['css/dashboard.css'],
];

if (array_key_exists($view, $cssArray)) {
    foreach ($cssArray[$view] as $cssFile) {
        echo '<link rel="stylesheet" href="/css/pages/' . $cssFile . '">';
    }
}
?>