<?php
  include("dbconnect.php");
  include("header.php");

  $ob=new data();
	
	if(!empty($_REQUEST['uploadimage']))
	{
		$ob->insertimage($_REQUEST);
	}

?>

<html>
    <head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" type="text/css" href="image_gallery.css"/>
    </head>
<body>

    <div class="bg-#EEE-400 h-screen overflow-hidden flex items-center justify-center">
    <div class="bg-white lg:w-5/12 md:6/12 w-10/12 shadow-inner rounded-3xl c1">
      
    <form class="p-12 md:p-24" method="post" action="" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php if(isset($r1 ['id'])) echo $r1 ['id'] ?>"><br/>
        <div class="flex items-center text-lg mb-6 md:mb-8">
          <input type="file" name="f" value="<?php if(!empty($r1 ['image'])) echo $r1['image'] ?>" id="upload" class="bg-gray-200 pl-12 py-2 md:py-4 focus:outline-none w-full"/>
        </div>
        <div class="flex items-center text-lg mb-6 md:mb-8">
          <input type="text" name="title" value="<?php if(!empty($r1 ['title'])) echo $r1['title'] ?>" id="title" class="bg-gray-200 pl-12 py-2 md:py-4 focus:outline-none w-full" placeholder="Title of Image" />
        </div>
        <a href="imagedisplay.php"><input type="submit" value="Upload Image" name="uploadimage" class="bg-gradient-to-b from-gray-700 to-gray-900 font-medium p-2 md:p-4 text-white uppercase w-full"></a>
    </form>
    
    </div>
    </div>
    <?php 
      $r=$ob->displayimage($_POST);
      foreach($r as $row)
      { 
	  ?>
      <div class="flex1">
        <div>
          <div>
          
          </div>
        </div>
      </div>
    <?php 
			} 
		?>
</body> 
</html>