<!DOCTYPE html>
<html>
  <head>
    <link rel = "stylesheet" type = "text/css" href = "./Stylesheets/Main.css">
  </head>

  <body>
    <?php

    $current_address = $_SERVER['REMOTE_ADDR'];

      //connect to the database
      $sql = new mysqli("127.0.0.1", "root", "sea", "OldWindowPhotography");

      //check connection
      if ($sql->connect_error) {
        die("Connection failed" . $sql->connect_error);
      }


      $query = "SELECT * FROM Cart WHERE customer_id = '$current_address'";

      $result = $sql->query($query);

      $num_rows = $result->num_rows;

      $a = 0;
      $ImageArray[] = "";
      $CaptionArray[] = "";
      $PriceArray[] = "";
      $

      while ($a < $num_rows) {
        $row = $result->fetch_assoc();
  			echo $row['image'] . " caption: " . $row['caption'] . " price: " . $row['price'] . "<br />";

        $ImageArray[$a] = $row['image'];
        $CaptionArray[$a] = $row['caption'];
        $PriceArray[$a] = $row['price'];

  			$a++;
      }

      $sql->close();

    ?>
    <script>
    //parse the cart items through JSON into an array and display them in the DOM.

    </script>
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



  </body>
</html>
