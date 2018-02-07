<!DOCTYPE html>
<html>
  <head>
  	<link rel = "stylesheet" type = "text/css" href = "./Stylesheets/normalize.css">
  	<link rel = "stylesheet" type = "text/css" href = "./Stylesheets/Main.css">
  	<link rel = "stylesheet" type = "text/css" href = "./Stylesheets/Gallery.css?v=2">

  	<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">

  	<?php require 'gallery_import.php'; ?>

    <script src = "gallery.js"></script>
  </head>

  <body>

      <!--Navigation Bar-->
    <div class = "centerThings">
      <div id = "NavBar" class = "centerThings">
        <a href = "index.php">
          <div class = "navButton">
            Home
          </div>
        </a>
        <a href = "about.php">
          <div class = "navButton">
            About
          </div>
        </a>
        <a href = "gallery.php">
          <div class = "navButton">
            Gallery
          </div>
        </a>
        <a href = "reviews.php">
          <div class = "navButton">
            Reviews
          </div>
        </a>
        <a href = "contact.php">
          <div class = "navButton">
            Contact
          </div>
        </a>
      </div>
    </div>

    <!-- Superscreen -->
    <div id = "SuperScreen" onClick = "this.innerHTML = ''; this.style = 'background-color: transparent;'"></div>
    <div id = "SuperScreenCaption"></div>
    <div id = "SuperScreenPurchaseArea">
        <div id = "SuperScreenPrice"></div>
        <div id = "SuperScreenButton">
          <button>
            Add to Cart
          </button>
        </div>
    </div>

    <!-- Window logo -->
    <div class = "col-3">
      <img id = "WindowLogo" src = "./Photos/SeeThroughWindow.png">
    </div>

    <!-- Title -->
  	<div class = "centerThings col-6">
      <div id = "Title">
        Old Window Photography
      </div>
    </div>

    <!-- search bar -->
    <div id = "SearchBarPos" class = "centerThings col-3">
      <div id = "SearchBar">
        <form id = "SearchInput" action = "gallery.php" method = "get">
            What are you looking for?
            <input type = "text" name = "searchKey">
            <input type = "submit" value = "Search for images">
        </form>
      </div>
    </div>

    <!-- columns of pictures -->
    <div style = " position: relative; top: 5vw;">
      <div id = "pillar1" class = "clear_left"></div>
    	<div id = "pillar2"></div>
    	<div id = "pillar3"></div>
    	<div id = "pillar4"></div>
      <div id = "pillar5"></div>
    </div>

  	<script>
      //for storing the images and keywords from the database
      var PictureArray, CaptionArray, KeywordArray, PriceArray;

      loadGallery();

      //Get the pictures from the database
      function getGalleryPhotos () {
        PictureArray = <?php echo json_encode($pictures); ?>;
      }
      function getGalleryCaptions () {
        CaptionArray = <?php echo json_encode($captions); ?>;
      }
      //Get the keywords from the database
      function getGalleryKeywords () {
        KeywordArray = <?php echo json_encode($keywords); ?>;
      }
      //main function that operates loading of the gallery
      function getGalleryPrices () {
        PriceArray = <?php echo json_encode($prices); ?>;
      }

      function loadGallery() {

        //Checks the size of the viewport and sets the number of columns of pictures accordingly
        setNumberOfColumns();
        setColumnWidth();

        //load content from the database
        getGalleryPhotos();
        getGalleryCaptions();
        getGalleryKeywords();
        getGalleryPrices();

        createPictureEntryObjects();
        createPictureDivs();
      }
  	</script>
  </body>
</html>
