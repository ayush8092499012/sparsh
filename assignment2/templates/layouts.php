<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    @header('Content-Type: text/html; charset=utf-8');

    require_once('templates/components/base/links.php'); // include all cdn's

    if ($view === "home") {
        echo '<link rel="stylesheet" href="css/pages/style.css" />'; // css file
    }
    ?>
</head>

<body>
    <div id="content">
        <?php require_once('pages/' . $view . '.php'); // View file ?>
    </div>
    <?php require_once('templates/components/base/scripts.php'); // script files ?>
</body>

</html>