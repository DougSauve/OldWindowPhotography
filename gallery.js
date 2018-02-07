

var numberOfColumns;
var divs = [];

function setNumberOfColumns() {

  numberOfColumns = Math.floor(document.documentElement.clientWidth / 275);
}
function setColumnWidth(){
  var columnWidth, a;


  if (numberOfColumns < 1){
    numberOfColumns = 1;
  }
  if (numberOfColumns > 5){
    numberOfColumns = 5;
  }

  columnWidth = 100 / numberOfColumns;

  for (a = 0; a < numberOfColumns; a++){
    document.getElementById("pillar" + (a + 1)).style = "width: " + columnWidth + "%; float: left; padding; 0.1%;";
  }
}

function createPictureEntryObjects(){

  var a = 0;

  while (PictureArray[a]){

    divs[a] = {

      img_id: "Slot" + a,
      img_class: "gallery-slot",
      img_content: PictureArray[a],

      cap_id: "Caption" + a,
      cap_class: "gallery-caption",
      cap_content: CaptionArray[a],

  //    divs[a].kyw_id = "Keywords" + a;
  //    divs[a].kyw_class = "gallery-keywords";
  //    divs[a].kyw_content = KeywordArray[a];

      prc_id: "Price" + a,
      prc_class: "gallery-price",
      prc_content: PriceArray[a]
    };

    a++;
  }
}

function createPictureDivs(){

  var divToBe, captionToBe, price;
  var picBeingHoveredOver = "";
  var SuperScreen, SuperScreenCaption, SuperScreenPrice, SuperScreenButton;
  var a = 0;

  while (divs[a]){

    //create divToBe
    divToBe = document.createElement("Slot" + a);

    //set divToBe's content to picture info from the database
    divToBe.setAttribute("id", divs[a].img_id);
    divToBe.setAttribute("class", divs[a].img_class);
    divToBe.innerHTML = divs[a].img_content;

    //add the div to the page
    document.getElementById("pillar" + ((a % numberOfColumns) + 1)).appendChild(divToBe);

    //reset divToBe to point to the newly created element
    divToBe = document.getElementById("Slot" + a);


    //create a div for captions
    captionToBe = document.createElement("Caption" + a);
    captionToBe.setAttribute("id", divs[a].cap_id);
    captionToBe.setAttribute("class", divs[a].cap_class);
    captionToBe.innerHTML = divs[a].cap_content;

    //add the caption div to the main one
    divToBe.appendChild(captionToBe);

    //reset captionToBe to point to the newly created element
    captionToBe = document.getElementById("Caption" + a);

    //set price here so it can be accessed from within the onClick function
    price = divs[a].prc_content;

    //REACTIONS

    //when divToBe's picture is clicked, make it expand and everything else fade to grey.
    divToBe.onclick = function() {

      //get SuperScreen divs from the html
      SuperScreen = document.getElementById("SuperScreen");
      SuperScreenCaption = document.getElementById("SuperScreenCaption");
      SuperScreenButton = document.getElementById("SuperScreenButton");
      SuperScreenPrice = document.getElementById("SuperScreenPrice");

      //show picture over ghosted background
      SuperScreen.innerHTML = this.innerHTML;
      SuperScreen.style = "display: block;";

      //when the superscreen is clicked on, make it and everything in it disappear
      SuperScreen.onclick = function() {

        SuperScreen.innerHTML = "";
        SuperScreen.style = "display: none;";

        SuperScreenCaption.innerHTML = "";
        SuperScreenCaption.style = "display: none;";

        SuperScreenPrice.style = "display: none;";
        SuperScreenButton.style = "display: none;";
      }

      SuperScreenCaption.innerHTML = this.children[1].innerHTML;
      SuperScreenCaption.style = "display: block;";

      SuperScreenPrice.innerHTML = "Price: " + price;
      SuperScreenPrice.style = "display: inline-block;";

      SuperScreenButton.setAttribute("class", "gallery-button");
      SuperScreenButton.style = "display: inline-block;";
      SuperScreenButton.onclick = function () {

        //send the image, the caption, and the price via AJAX to the cart.

        AJAX_addToCart(divs[a].img_content, SuperScreenCaption.innerHTML, price);

        /*  alert(SuperScreenCaption.innerHTML + " was added to your cart.");
        }else{
          alert(SuperScreenCaption.innerHTML + " could not be added to your cart.");
          */
        //}

      }
    }

    //while the user is hovering over divToBe's picture, make its keywords appear in the footer after a 1/2-second delay.
    divToBe.onmouseenter = function(){

      thisDiv = this;

        setTimeout(function(){

            thisDiv.children[1].style = "z-index: 2;";

       }, 500);

    }

    divToBe.onmouseleave = function(){

      thisDiv = this;

      thisDiv.children[1].style = "x-index: -2;";
    }

    a++;
  }
}
function AJAX_addToCart(img, cpn, prc) {
  alert(img);

  var ajax = new XMLHttpRequest();

  ajax.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      alert(this.responseText);

    }
  };

  ajax.open ("POST", "addToCart.php", true);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.send("image=" + img + "&caption=" + cpn + "&price=" + prc);
}
