<?php
// Query the db - increment vote up and return current vote count. - Only allow this once a session (track user)
  session_start();
  $connection = mysqli_connect("localhost", "root", "") or die(mysqli_error($connection));
  mysqli_select_db($connection,"ConnectNI");

// get the vote parameter dynamicVoting.js - Housing, Education, Economy, Environment or Health
  $voteCategory = $_POST['voteCategory'];

// get Area_ID from the saved session
  $Area_ID = $_SESSION['Area_ID'];

// Query returns current number of votes for clicked category
    $sql = "SELECT `$voteCategory` FROM area WHERE Area_ID = $Area_ID";
    $query = mysqli_query($connection,$sql) or die ("Error Could not establish connection to database");

// fetch new vote count
    $vote = mysqli_fetch_assoc($query);
    $oldVoteCount = $vote[$voteCategory];
    $newVoteCount = $oldVoteCount + 1;
    echo $newVoteCount;

// Update the Table
    $sql = "UPDATE area SET `$voteCategory` = $newVoteCount WHERE Area_ID = $Area_ID";
    $query = mysqli_query($connection,$sql) or die ("Error Could not establish connection to database");

?>
