<?php
// Connect to server and start browsing session
	session_start();
  $connection = mysqli_connect("localhost", "root", "") or die(mysqli_error($connection));
  mysqli_select_db($connection,"ConnectNI");

// Check if AJAX POST is coming from dynamicLiking.js or dynamicPosting.js
	if(isset($_POST['commentID'])) {
		$commentID = strip_tags(mysql_real_escape_string($_POST['commentID']));

			// Code to inc the vote count on that comment up one and echo new likeCount to DOM
				$sql = "SELECT Vote FROM posts WHERE ID = $commentID";
				$query = mysqli_query($connection,$sql) or die ("Error: Could not establish connection to database1");
				$query = mysqli_fetch_assoc($query);
				$oldLikeCount = $query['Vote'];
				$newLikeCount = $oldLikeCount + 1;

			// Update the Table
		    $sql = "UPDATE posts SET `Vote` = $newLikeCount WHERE ID = $commentID";
		    $query = mysqli_query($connection,$sql) or die ("Error Could not establish connection to database");

			// echo new vote count to DOM
				echo $newLikeCount;

	} else {
			// Fetch input from dynamicPosting.js
 				$Area_ID	= $_POST['Area_ID'];
 				$Comment = $_POST['Comment'];

			//  Post Comment to server
				$sql = "INSERT INTO posts (Comment, Area_ID) VALUES ('$Comment', '$Area_ID')";
				$query = mysqli_query($connection,$sql) or die ("Error: Could not establish connection to database");

			// Fetch Comment ID back from server
				$sql = "SELECT * FROM posts WHERE Comment = '$Comment'";
				$query = mysqli_query($connection,$sql) or die ("Error: Could not establish connection to database1");
				$commentData = mysqli_fetch_assoc($query);

			// Echo the comment text back to dynamically update the view.page
				echo
				"<div class='row'>
	          <div style='margin-top: 2%; height: 20%; color: white; background-color: gray; border-radius: 5px;' class='col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-8 col-xs-offset-0'>
	              <p style=''>" . htmlentities($commentData['Comment']) ."</p>
	          </div>
	          <div style='margin-top: 2%; text-align: left;' class='col-lg-1 col-md-1 col-sm-1 col-xs-2'>
	              <i id='".$commentData['ID']."' class='glyphicon glyphicon-thumbs-up likeButton'></i><span id='likeCount_".$commentData['ID']."' >" . $commentData['Vote']. "</span>
	          </div>
	      </div>";
			}
 ?>
