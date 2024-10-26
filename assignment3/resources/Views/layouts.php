<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
  data-assets-path="public/assets/" data-template="vertical-menu-template-free">

<head>
  <?php
  @header('Content-Type: text/html; charset=utf-8');
  ?>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <?php require_once("components/base/links.php"); ?>
</head>

<body>
  <?php
  // Array of pages to exclude the full layout
  $noLayoutPages = ['login', 'register']; // Define pages where only content is shown
  
  // Check if the current view matches any in the no-layout array
  if (in_array($view, $noLayoutPages)) {
    // Only show page content without the layout
    require_once('pages/' . $view . '.php');
  } else {
    ?>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <?php require_once('components/sidebar/sidebar.php'); // sidebar ?>
        <!-- Layout container -->
        <div class="layout-page">
          <?php require_once('components/navbar/navbar.php'); // Navbar ?>
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- content -->
            <?php require_once('pages/' . $view . '.php'); // View file ?>
            <!-- /content -->
            <?php require_once("components/footer/footer.php"); ?>
            <div class="content-backdrop fade"></div>
          </div>
          <!-- /Content wrapper -->
        </div>
        <!-- /Layout container -->
      </div>
      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- /Layout wrapper -->

    <div class="buy-now">
      <a href="/language" target="_blank" class="btn btn-danger btn-buy-now">Start test</a>
    </div>
    <?php
  }
  ?>

  <?php require_once("components/base/scripts.php"); ?>
</body>

</html>