<!DOCTYPE html>
<html>
  <head>
  	<link rel = "stylesheet" type = "text/css" href = "./Stylesheets/normalize.css">
  	<link rel = "stylesheet" type = "text/css" href = "./Stylesheets/Main.css">
  	<link rel = "stylesheet" type = "text/css" href = "./Stylesheets/Gallery.css?v=2">

  	<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">

  	<?php
  		$servername = "127.0.0.1";
  		$username = "root";
  		$password = "sea";
  		$dbname = "OldWindowPhotography";
  		$pictures[] = "";
      $keywords[] = "";
  		$a = 0;

      if (isset($_GET['searchKey'])){
        if ($_GET['searchKey'] != ""){
          $searchKey = $_GET['searchKey'];
        }
        else
        {
          $searchKey = true;
        }
      }

  		$conn = new mysqli($servername, $username, $password, $dbname);

  		if ($conn->connect_error){
  			die ("Connection failed: " . $conn->connect_error);
  		}

  		$sql = "select image, caption, price, keywords from Pictures where instr(keywords, '$searchKey') or instr(caption , '$searchKey')";

  		$result = $conn->query($sql);

  		if ($result->num_rows > 0){

  			while ($row = $result->fetch_assoc()){
  				$pictures[$a] =
            '<div class = "gallery-slot">' .
              $row['image'] .
              '<br />' .
              '<span class = "caption">' .
                $row['caption'] .
              '</span>
              <br />
              <form action = "cart.php">
                <span class = "price">
                $' .
                $row['price'] .
                '</span>

                <button class = "cart-button" type = "submit">
                  Add to Cart
                </button>
              </form>
            </div>

            <div style = "height: 10px; background-color: rgba(50,50,50,0.3);"></div>';
          $keywords[$a] = $row['keywords'];

  				$a++;
  			}
  		}
  		else
  		{
  			echo '<p style = "position: relative; top: 30vw; font-size: 2vw; text-align: center">There are no results to show for your search.</p>';
  		}

  		$conn->close();
  	?>
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

    <div id = "SuperScreen" onClick = "this.innerHTML = ''; this.style = 'background-color: transparent;'"></div>

    <div class = "col-3"><img id = "WindowLogo" src = "./Photos/SeeThroughWindow.png"></div>

  	<div class = "centerThings col-6">
      <div id = "Title">
        Old Window Photography
      </div>
    </div>

    <div id = "SearchBarPos" class = "centerThings col-3">
      <div id = "SearchBar">
        <form id = "SearchInput" action = "Gallery.php" method = "get">
            What are you looking for?
            <input type = "text" name = "searchKey">
            <input type = "submit" value = "Search for images">
        </form>
      </div>
    </div>

    <div style = " position: relative; top: 5vw;">
      <div id = "pillar1" class = "clear_left"></div>
    	<div id = "pillar2"></div>
    	<div id = "pillar3"></div>
    	<div id = "pillar4"></div>
      <div id = "pillar5"></div>
    </div>

    <div id = "Footer"></div>

  	<script>
      //for storing the images and keywords from the database
  		var PictureArray, KeywordArray, keywords;

      //counters
      var a, b, c;

      //for creating divs to hold the pictures
      var div;

      //for setting up the columns of pictures
      var numberOfColumns, columnWidth, winSize;

      //for tracking mouse movement -> displaying keywords
      var running, hovering;

      //Gets the pictures from the database
  		PictureArray = <?php echo json_encode($pictures); ?>;
      KeywordArray = <?php echo json_encode($keywords); ?>;
      defineCols();

      //this line has the page's columns adjust as the window is resized, but doesn't work.
      //window.addEventListener("resize", defineCols());

      //set the columns' width
      for (b = 0; b < numberOfColumns; b++){
        document.getElementById("pillar" + (b + 1)).style = "width: " + columnWidth + "%; float: left; padding; 0.1%;";
      }

      //Monitors the size of the window and changes the number of columns of pictures accordingly
      function defineCols(){
        winSize = document.documentElement.clientWidth;

        //for view width up to 550px, 1 col; +1 col for each 275px up to 5 cols.
        numberOfColumns = Math.floor(winSize / 275);

        if (numberOfColumns < 1){
          numberOfColumns = 1;
        }
        if (numberOfColumns > 5){
          numberOfColumns = 5;
        }

        columnWidth = 100 / numberOfColumns;
        distributePics();
      }

      //Creates the pictures in divs and distributes them into columns
      function distributePics(){
        a = 0;
        c = 0;

    		while (PictureArray[a]){
        	div = document.createElement("photo" + a);
    			div.innerHTML = PictureArray[a];
          div.setAttribute("id", ("Photo" + a));

          //when the picture is clicked, make it expand and fade out the rest.
          div.onclick = function() {
            var SuperScreen = document.getElementById("SuperScreen"); SuperScreen.innerHTML = this.innerHTML;
            SuperScreen.style = "z-index: 4; background-color: rgba(50,50,50,0.7);";
          }

          //make the keywords appear if hovering for a short delay. The divs know who they are when they go out to the page. Where are they getting confused?
          hovering = false;
          running = false;

          div.onmouseover = function(){
            if (running === false){

            running = this.id;
            hovering = this.id;
            var thisDiv = this;

              setTimeout(function(){
                if (hovering !== false){
                  //get the keywords into 'keywords'
                  hovering = hovering.substr(5);
                  keywords = KeywordArray[hovering];
                  keywords = keywords.substr(4);

                  //get the keywords into the Footer div
                  var footer = document.getElementById("Footer");
                  footer.style = "z-index: 10;";
                  footer.innerHTML = keywords;

                  //make the footer div fade out when the picture is left
                  thisDiv.onmouseleave = function(){
                    footer.innerHTML = "";
                    footer.style = "z-index: -3";
                  }
                }
                running = false;
              }, 1000);
            }
          }
          div.onmouseleave = function(){
            hovering = false;
          }

          //add the div to the page
    			document.getElementById("pillar" + ((a % numberOfColumns) + 1)).appendChild(div);
    			a++;
    		}
      }

  	</script>

  </body>
</html>
