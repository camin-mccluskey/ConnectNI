$(function(){
      $('.likeButton').one('click', function(e){
        // prevents hash symbol loading in address bar
          e.preventDefault();

       // fetch commentID (it is the like button's ID)
          commentID = this.id;

          $.ajax({
              url: 'updateComments.php',
              type: 'post',
              data: {'commentID': commentID},
                success: function(data, status) {
                  // echo the comment back into view.php from updateComments.php
                  $('#likeCount_'+commentID).html(data);
                  // Turn like button blue
                  $('#'+commentID).css("color","blue");
                  // thank the user for their like (alertify.js)
                  // default: 5000
                  alertify.set({ delay: 2000 });
                  // log will hide after 2 seconds - setting the delay to 0 will leave the notification until it's clicked
                  // randomise the comment
                  num = Math.random()
                  if (num < 0.5) {
                    alertify.success("Why not leave your own comment?");
                  } else if (num > 0.5) {
                    alertify.success("Thanks for liking")
                  }
              },
                error: function(xhr, desc, err) {
                  console.log(xhr);
                  console.log("Details: " + desc + "\nError:" + err);
                }
            }); // end ajax call */
        });
      });
