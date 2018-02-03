<!DOCTYPE html>
<html>
  <head>
    <link rel = "stylesheet" type = "text/css" href = "./Stylesheets/normalize.css">
  	<link rel = "stylesheet" type = "text/css" href = "./Stylesheets/Main.css"?>
  	<link rel = "stylesheet" type = "text/css" href = "./Stylesheets/index.css?v=7"><!-- the version thing affects Chrome, but not Firefox.-->


    <meta charset = "UTF-8">
    <meta name = "description" content = "Photo Gallery">
    <meta name = "keywords" content = "photos, gallery, old window">
    <meta name = "author" content = "Doug Sauve">
    <meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
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

    <div class = "col-3"></div>

    <div class = "centerThings col-6">
      <div id = "Title">
        Old Window Photography
      </div>
    </div>

    /<!--Search Bar-->
    <div id = "SearchBarPos" class = "centerThings col-3">
      <div id = "SearchBar">
      <form id = "SearchInput" action = "Gallery.php" method = "get">
          What are you looking for?
          <br />
          <br />
          <input type = "text" name = "searchKey">
          <input type = "submit" value = "Search for images">
      </form>
    </div>
    </div>

    <!--Left sidebar and three pictures-->
    <div id = "Sidebar" class = "col-3" style = "clear:left">
      <img src = "./Photos/SmallWindow.png" id = "SmallWindow1">
  	  <img src = "./Photos/Sky.jpg" class = "small1Pos">
      <a href = "about.php">
        <div class = "hoverScreen small1Pos"></div>
      </a>
      <div class = "small1Pos window-caption centerThings">
        About
      </div>

  	  <img src = "./Photos/SmallWindow.png" id = "SmallWindow2">
  	  <img src = "./Photos/People.jpg" class = "small2Pos">
  	  <a href = "reviews.php">
        <div class = "hoverScreen small2Pos"></div>
      </a>
  	  <div class = "small2Pos window-caption centerThings">
        Reviews
      </div>

    	<img src = "./Photos/SmallWindow.png" id = "SmallWindow3">
    	<img src = "./Photos/Culture.jpg" class = "small3Pos">
    	<a href = "contact.php">
        <div class = "hoverScreen small3Pos"></div>
      </a>
    	<div class = "small3Pos window-caption centerThings">
        Contact
      </div>
    </div>

    <!--Main Window in the center of the page-->
    <div class = "col-6 centerThings">
      <div id = "WindowHolder">
        <img src = "./Photos/SeeThroughWindow.png" id = "Window">

        <img src = "./Photos/Scenery.jpg" id = "SceneryLink" class = "window-top-left">
  	    <a href = "Gallery.php?searchKey=Scenery">
          <div class = "hoverScreen window-top-left"></div>
        </a>
  	    <div class = "window-top-left window-caption centerThings" style = "margin-top: 0.2vw;">
          Scenery
        </div>

        <img src = "./Photos/People.jpg" id = "PeopleLink" class = "window-top-right">
    	  <a href = "Gallery.php?searchKey=People">
          <div class = "hoverScreen window-top-right"></div>
        </a>
    	  <div class = "window-top-right window-caption centerThings" style = "margin-top: 0.2vw;">
          People
        </div>

        <img src = "./Photos/Animals.jpg" id = "AnimalLink" class = "window-bottom-left">
    	  <a href = "Gallery.php?searchKey=Animals">
          <div class = "hoverScreen window-bottom-left"></div>
        </a>
    	  <div class = "window-bottom-left window-caption centerThings" style = "margin-top: 0.2vw;">
          Animals
        </div>

    	  <img src = "./Photos/Culture.jpg" id = "CultureLink" class = "window-bottom-right">
    	  <a href = "Gallery.php?searchKey=Culture">
          <div class = "hoverScreen window-bottom-right"></div>
        </a>
        <div class = "window-bottom-right window-caption centerThings" style = "margin-top: 0.2vw;">
          Culture
        </div>
      </div>
    </div>

    <!--Right Sidebar and three pictures-->
    <div id = "Sidebar" class = "col-3">
      <img src = "./Photos/SmallWindow.png" id = "SmallWindow4">
    	<img src = "./Photos/extra.jpg" class = "small4Pos">
    	<a href = "Gallery.php">
        <div class = "hoverScreen small4Pos"></div>
      </a>
    	<div class = "small4Pos window-caption centerThings">
        Gallery
      </div>

    	<img src = "./Photos/SmallWindow.png" id = "SmallWindow5">
    	<img src = "./Photos/Animals.jpg" class = "small5Pos">
    	<a href = "reviews.php">
        <div class = "hoverScreen small5Pos"></div>
      </a>
    	<div class = "small5Pos window-caption centerThings">

      </div>

    	<img src = "./Photos/SmallWindow.png" id = "SmallWindow6">
    	<img src = "./Photos/Sky.jpg" class = "small6Pos">
    	<a href = "contact.php">
        <div class = "hoverScreen small6Pos"></div>
      </a>
    	<div class = "small6Pos window-caption centerThings">

      </div>
    </div>

  </body>
</html>
