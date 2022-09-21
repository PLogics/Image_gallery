<?php
    include("header.php");
    include("dbconnect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="image_gallery.css"/>
    <title>Document</title>
</head>
<body>
    <!-- component -->
<form method="post" action="" enctype="multipart/form-data">
    <div class="min-h-screen bg-gray-100 flex justify-center items-center">
        <div class="container flex justify-center">
            <div class="max-w-sm py-32">
            <div class="bg-white relative shadow-lg hover:shadow-xl transition duration-500 rounded-lg i1">
                <img class="rounded-t-lg" src="https://images.unsplash.com/photo-1583511655857-d19b40a7a54e?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1049&q=80" alt="" />
                <div class="py-6 px-8 rounded-lg bg-white">
                <h1 class="text-gray-700 font-bold text-2xl mb-3 hover:text-gray-900 hover:cursor-pointer">Title</h1>
                <input type="submit" name="like" value="Like" class="mt-6 py-2 px-4 bg-gray-400 text-gray-800 font-bold rounded-lg shadow-md hover:shadow-lg transition duration-300"/>
                <input type="submit" name="addtofavourite" value="Add To Favourite" class="mt-6 py-2 px-4 bg-gray-400 text-gray-800 font-bold rounded-lg shadow-md hover:shadow-lg transition duration-300"/>
                </div>
            </div>
        </div>
    </div>
</form>
</body>
</html>