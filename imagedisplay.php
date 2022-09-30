<?php

include("dbconnect.php");

include("header.php");
$ob = new data();

if (!empty($_POST['logout'])) {
    $ob->logout($_POST);
}
echo $_SESSION['userid'];
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
        .imagecontainer {
            width: 200px;
            height: 310px;
            margin: 50px 50px 0px 30px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="container2">
            <?php
            $r = $ob->displayimagepublic($_POST);
            foreach ($r as $row) {
            ?>
                <div class="imagecontainer">
                    <img src="pics/<?php echo $row['image'] ?>" class="image" />
                    <div>
                        <h5 clas=""><?php echo $row['title'] ?></h5>
                    </div>
                    <div>
                        <input type="submit" class="btn btn-primary f1" name="favourites" value="Favourites" />
                        <input type="submit" class="f2" name="views" value="Views" />
                    </div>

                </div>
                <!-- <div class="card" style="width: 18rem;"> -->
                <!-- <img src="pics/" class="card-img-top"  alt="..."> -->
                <!-- <div class="card-body"> -->
                <!-- <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
            <?php } ?>
        </div>
    </div>
</body>

</html>