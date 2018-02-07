<?php
  $servername = "127.0.0.1";
  $username = "root";
  $password = "sea";
  $dbname = "OldWindowPhotography";
  $pictures[] = "";
  $captions[] = "";
  $keywords[] = "";
  $prices[] = "";
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
      $pictures[$a] = $row['image'];
      $captions[$a] = $row['caption'];
      $keywords[$a] = $row['keywords'];
      $prices[$a] = $row['price'];
      $a++;
    }
  }
  else
  {
    echo '<p style = "position: relative; top: 30vw; font-size: 2vw; text-align: center">There are no results to show for your search.</p>';
  }

  $conn->close();
?>
