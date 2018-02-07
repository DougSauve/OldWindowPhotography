<?php

$customer_id = $_SERVER['REMOTE_ADDR'];

$image = $_REQUEST['image'];
$caption = $_REQUEST['caption'];
$price = $_REQUEST['price'];

//***if the user is logged in, change $address to their username!!


//access SQL; database = OldWindowPhotography, table = Cart

/* Cart:
id tinyint(6) unsigned auto_increment primary key,
customer_id text not null,
image text not null,
caption text not null,
price text not null,
reg_date timestamp
*/

$sql = new mysqli("127.0.0.1", "root", "sea", "OldWindowPhotography");

//check connection
if ($sql->connect_error) {
  die("Connection failed" . $sql->connect_error);
}

$query = "INSERT INTO Cart (customer_id, image, caption, price) VALUES ('$customer_id', '$image', '$caption', '$price')";

if ($sql->query($query) === true){
  echo $caption . " was added to your cart.";
  //make this send a callback to make this message a fading header at the top of the screen.
  //also make this message change a button showing the number of items in the cart.
} else {
  echo "There was a problem adding " . $caption . " to your cart.";
}

$sql->close();


?>
