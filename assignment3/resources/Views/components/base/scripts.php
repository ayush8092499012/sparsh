<!-- build:js assets/vendor/js/core.js -->
<script src="public/assets/vendor/libs/jquery/jquery.js"></script>
<script src="public/assets/vendor/libs/popper/popper.js"></script>
<script src="public/assets/vendor/js/bootstrap.js"></script>
<script src="public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="public/assets/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="public/assets/vendor/libs/apex-charts/apexcharts.js"></script>

<!-- Main JS -->
<script src="public/assets/js/main.js"></script>

<!-- Page JS -->
<script src="public/assets/js/dashboards-analytics.js"></script>

<!-- SWEETALERT 2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- JS FILE -->
<?php
$jsArray = [
    'register' => ['register.js'],
];

if (array_key_exists($view, $jsArray)) {
    foreach ($jsArray[$view] as $jsFile) {
        echo '<link rel="stylesheet" href="/js/pages/' . $jsFile . '">';
    }
}
?>