<!DOCTYPE html>
<html>
<?php
include 'fetchData.php';
$twitter_URL = 'https://twitter.com/'.$Twitter_Handle;
$imgURL = 'assets/img/'.$img;
// Intialise this for later
//$_SESSION['hasVoted'] == 0;
?>
<head>
    <meta charset="utf-8">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
    <title>view</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.7/yeti/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,400,300,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/alertify.js-0.3.11/themes/alertify.core.css" />
    <link rel="stylesheet" href="assets/alertify.js-0.3.11/themes/alertify.default.css" />
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="dynamicVoting.js"></script>
    <script src="dynamicPosting.js"></script>
    <script src="dynamicLiking.js"></script>
</head>
<body>
    <div class="row">
        <div class="col-lg-3 col-lg-offset-2 col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-3 col-xs-offset-4">
          <?php echo "<h1>" . $Name . "</h1>"; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2 col-lg-offset-2 col-md-2 col-md-offset-2 col-sm-2 col-sm-offset-2 col-xs-2 col-xs-offset-0">
          <img id='imgine' style="height: 12em; width: 12em" src=<?php echo $imgURL ?> alt="">
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-6">
            <?php echo "<p>" . $MP . " - " . $Party . "</p>" .
            "<p>" . $Description . "</p>"; ?>
            <p style="text-align: center;">
              <i id="Housing" class="glyphicon glyphicon-home"></i><span id="voteCount_Housing"><?php echo $Housing ?></span>
              <i id="Education" class="glyphicon glyphicon-education"></i><span id="voteCount_Education"><?php echo $Education ?></span>
              <i id="Economy" class="glyphicon glyphicon-gbp"></i><span id="voteCount_Economy"><?php echo $Economy ?></span>
              <i id="Environment" class="glyphicon glyphicon-tree-conifer"></i><span id="voteCount_Environment"><?php echo $Environment ?></span>
              <i id="Health" class="icon ion-medkit"></i><span id="voteCount_Health"><?php echo $Health ?></span>
            </p>
        </div>
    </div>
    <div style="position: fixed; top: 5%; right: 2%;"class="col-lg-2 col-lg-offset-10 col-md-2 col-md-offset-2 col-sm-2 col-sm-offset-10 col-xs-4 col-xs-offset-8">
        <a class="twitter-timeline" data-width="1000" data-height="600" data-theme="light" href=<?php echo $twitter_URL ?>>Tweets by <?php echo $Twitter_Handle ?></a>
        <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
    </div>
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-8 col-xs-offset-2">
          <form style="height: 10%;">
            <textarea id="comment" name="Comment" style="height: 100%; width: 100%;" placeholder="Have your say..."></textarea>
            <input id="Area_ID" type="hidden" name="Area_ID" value=<?php echo $Area_ID ?>>
            <button id="postButton" name="postComment" style="float: right;">Post</button>
          </form>
        </div>
    </div>
    <!-- Fetching comments from the SQL query in fetchData.php -->
    <?php while ($usersComments = mysqli_fetch_assoc($query)) {
      echo "<div class='row'>
          <div style='margin-top: 2%; height: 20%; color: white; background-color: gray; border-radius: 5px;' class='col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-8 col-xs-offset-0'>
              <p style=''>" . htmlentities($usersComments['Comment']) ."</p>
          </div>
          <div style='margin-top: 2%; text-align: left;' class='col-lg-1 col-md-1 col-sm-1 col-xs-2'>
              <i id='".$usersComments['ID']."' class='glyphicon glyphicon-thumbs-up likeButton'></i><span id='likeCount_".$usersComments['ID']."' >" . $usersComments['Vote']. "</span>
          </div>
      </div>";
    }
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="assets/alertify.js-0.3.11/lib/alertify.min.js"></script>
</body>
</html>
