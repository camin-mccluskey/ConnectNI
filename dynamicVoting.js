$(function(){
  var executed = false;
      $('#Housing, #Education, #Economy, #Environment, #Health').on('click', function(e){
        // prevents hash symbol loading in address bar
          e.preventDefault();

        // check which element has been clicked - Housing, Education, Economy, Environment or Health
          voteCategory = this.id;

        // check if this session user has voted before

        if (!executed) {
          executed = true;

            $.ajax({
              url: 'updateVoteCounts.php',
              type: 'post',
              data: {'voteCategory': voteCategory},
                success: function(data, status) {
                  $('#voteCount_'+voteCategory).html(data);
                  $('#'+voteCategory).css("color","blue");
              },
                error: function(xhr, desc, err) {
                  console.log(xhr);
                  console.log("Details: " + desc + "\nError:" + err);
                }
            }); // end ajax call */
          };
        });
      });
