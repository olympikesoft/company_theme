$.ajax({
              url: "/php/getposts.php",
              type: "GET",
              dataType: 'json',
              crossDomain: true,
              success: function(result) {
                  
                 $.each(result,function(index,obj) {
                 
                
                     $("#get-all").append(
                          "<div class='span12'><div class='row'><div class='span8'><h4><strong><a href='https://olympikesoft.com/post.php?id="+obj.id+"'>" + obj.title + "</div></a></strong></h4> </div></div>" +
                         
                          "<span>" + obj.datetime + "    </div></span></div>");
                  });
              }
          });