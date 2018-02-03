<!DOCTYPE html>
<html>
  <head>
    <link rel = "stylesheet" type = "text/css" href = "./Stylesheets/Main.css">
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

    <h1 id = "Title">Hi there!</h1>
    <br /><br />
    <h1 id = "Size">Size here</h1>
    <br /><br />
    <h2 id = "Display">Display</h2>

    <button id = "button" onmouseover = "enter()" onmouseleave = "leave()">Over Me</button>
    <script>

    var arr = [];
    arr[0] ="baby";
    alert(arr[0]);

    var running = false;
    var hovering = false;
          function leave(){
            hovering = false;
          }

          function enter(){

              if (running === false){
              running = true;
              hovering = true;
                setTimeout(function(){
                  if (hovering){
                    alert ("yeah!");
                  }
                  running = false;
                }, 1000);
              }
          }

          var smallSize;
          var bigSize;

          var winSize;

          monitorSize();

          smallSize.addListener(monitorSize);
          bigSize.addListener(monitorSize);

          function monitorSize (){
            var title = document.getElementById("Title");
            smallSize = window.matchMedia("(max-width: 500px)");

             bigSize = window.matchMedia("(min-width: 700px)");
            var small = false;
            var big = false;

            if (smallSize.matches){
              small = true;
              title.innerHTML = "little";
            }

            if (bigSize.matches){
              big = true;
              title.innerHTML = "big";
            }

            if ((small === false)&&(big === false)){
              title.innerHTML = "medium";
            }
          }

          saySize();

          window.addEventListener("resize", saySize);

                 function saySize(){
            winSize = document.documentElement.clientWidth;
            document.getElementById("Size").innerHTML = winSize;

          }
    </script>
  </body>
</html>
