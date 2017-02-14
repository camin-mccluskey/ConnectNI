<?php
//connect to server and start browsing session
	session_start();
  $connection = mysqli_connect("localhost", "root", "") or die(mysqli_error($connection));
  mysqli_select_db($connection,"ConnectNI");

// Fetch input from index.html - returns 1-18 (ID's on server or venture.docx)
  $area	= $_POST["area"];

// Query returns parameter to populate view.php
  $sql = "SELECT * FROM area WHERE Area_ID = $area";
  $query = mysqli_query($connection,$sql) or die ("Error Could not establish connection to database");

    while ($areaData = mysqli_fetch_assoc($query)) {
      $Area_ID = $areaData['Area_ID'];
      $Name = $areaData['Name'];
      $Description = $areaData['Description'];
      $MP = $areaData['MP'];
      $Party = $areaData['Party'];
      $Twitter_Handle = $areaData['Twitter_Handle'];
      $Housing = $areaData['Housing'];
      $Education = $areaData['Education'];
      $Economy = $areaData['Economy'];
      $Environment = $areaData['Environment'];
      $Health = $areaData['Health'];
      $img = $areaData['img'];
    }

// Save Area_ID as a session variable
	$_SESSION['Area_ID'] = $Area_ID;

 // Fetch comments for the Area
  $sql = "SELECT * FROM posts WHERE Area_ID = $Area_ID";
  $query = mysqli_query($connection,$sql) or die ("Error Could not establish connection to database");

?>
