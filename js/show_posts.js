/*$.ajax({
              url: "/php/get_posts.php",
              type: "GET",
              dataType: 'json',
              crossDomain: true,
              success: function(result) {
                  
                 $.each(result,function(index,obj){     
                 
                
                     $("#get-title").append(obj.title);
                     $("#get-text").append(obj.text);
                      $("#get-datetime").append(obj.datetime);
                        
                  });
              }
          });
          */