<?php $page= $_GET ['page'];
?>
<?php
    include_once 'php/config.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KPN Helpdesk</title>
    <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&family=Patrick+Hand+SC&display=swap" rel="stylesheet">
    <script src="js/styles.js"></script>
</head>
    <body>
    <?php
    include 'Mains/' . $page . '.inc.php'
    ?>
</body>
</html>