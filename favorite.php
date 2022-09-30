<?php

include("dbconnect.php");
include("header.php");
$ob = new data();

if (!empty($_REQUEST['favorite'])) {
    $ob->favorite($_REQUEST);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="image_gallery.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
    <style>
    </style>
</head>

<body>
    <div class="container">
        <div class="container2">
            <?php
            $ob->displayfav($_POST);
            foreach ($r as $row) {
            ?>
                <div class="imagecontainer">
                    <img src="pics/" />
                </div>
            <?php }
            ?>
        </div>
    </div>
</body>

</html>