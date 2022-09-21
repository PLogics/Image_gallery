<?php
    include("header.php");
    include("dbconnect.php");
    $ob=new data();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="image_gallery.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
        <title>Document</title>
        <style>
            .imagecontainer{
            width: 200px;
            height: 310px;
            margin:30px 20px 0px 30px;
        }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="container2">
                <?php
                    $r=$ob->displayfav($_POST);
                    foreach($r as $row){
                ?>
                <div class="imagecontainer">
                    <img src="pics/<?php echo $row['image']?>" class="image"/>
                <div>
                    <h5 clas=""><?php echo $row['title']?></h5>
                </div>
                <div>
                    <a href=favorite.php><input type="submit" class="btn btn-primary f1" name="favourite" value="Favourite"/></a>
                    <input type="submit" class="f2" name="views" value="Views"/>
                </div>
            </div>
                <?php } ?>
            </div>
        </div>
    </body>
</html>