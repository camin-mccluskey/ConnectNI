$(function(){
  var executed = false;
      $('#postButton').on('click', function(e){
        // prevents hash symbol loading in address bar
          e.preventDefault();

        // fetch contents of text area and fetch Area_ID
          comment = $('#comment').val();
          area = $('#Area_ID').val();

        // check that comment box isnt empty
          if (!comment == "") {
            $.ajax({
              url: 'updateComments.php',
              type: 'post',
              data: {'Comment': comment, 'Area_ID': area},
                success: function(data, status) {
                  // echo the comment back into view.php from updateComments.php
                  $('body').append(data);
                  // Remove the comment text from the textarea
                  $('#comment').val(" ");
                  // thank the user for their comment (alertify.js)
                  // default: 5000
                  alertify.set({ delay: 2000 });
                  // log will hide after 2 seconds - setting the delay to 0 will leave the notification until it's clicked
                  alertify.log("Thank you for your comment");
              },
                error: function(xhr, desc, err) {
                  console.log(xhr);
                  console.log("Details: " + desc + "\nError:" + err);
                }
            }); // end ajax call */
          }  
        });
      });
