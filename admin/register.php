<?php
session_start();

?>
<head>
    
     <!-- Bootstrap Core CSS -->
    <link href="https://olympikesoft.com/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="https://olympikesoft.com/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Theme CSS -->
    <link href="https://olympikesoft.com/css/agency.min.css" rel="stylesheet">
    
     
      <link href="https://olympikesoft.com/css/style.css"  rel="stylesheet" type="text/css"/>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

   


<script>
    $(document).ready(function () {

    $('#form').validate({ // initialize the plugin
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 5
            },username:{
                required: true, 
                minlength: 10
            }
        }
    });

});
</script>

   <script>
 $(document).ready(function(){
        // click on button submit
        $("#submit").on('click', function (e){
    /*  var email =  $('input[name=email]').val();
      var username =  $('input[name=username]').val();
      var pass =  $('input[name=password]').val();
           var dataTosend='username='+username+'&password='+pass+'&email='+email;*/
        
        //    var formData= $(this).closest('form').serialize();        //fetch form data
            $.ajax({
                url: "/php/register.php",
                type : "POST", // type of action POST || GET
                data : $("#form").serialize(), // post data || get data
                success: function(result) {
                 console.log(result);
                                if(result.status > 0)
                                {
                                    href="/admin/login.php"
                                }

                },
                error: function(result)
                {
                    alert(result);
                }
            });
             e.preventDefault();        //prevent form to submit

        });
 });
</script> 
    



</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="pr-wrap">
                <div class="pass-reset">
                    <label>
                        Enter the email you signed up with</label>
                    <input type="email" placeholder="Email" />
                    <input type="submit" value="Submit" class="pass-reset-submit btn btn-success btn-sm" />
                </div>
            </div>
            <div class="wrap">
                <p class="form-title">
                    Register</p>
                 <form id="form" action="" method="post">
                <input type="text" name="username" placeholder="Username" />
                <input type="text" name="email" placeholder="Email" />
                <input type="password" name="password" placeholder="Password" />
                <input id="submit" type="button" name="submit" value="Register IN" class="btn btn-success btn-sm" />
                <div class="remember-forgot">
                    <div class="row">
                        <div class="col-md-6">
                          
                        </div>
                        
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
  
</div>


  <div class="posted-by">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; OlympikeSoft.com 2017</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="https://www.facebook.com/olympikesoftPortugal/"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="https://www.linkedin.com/company-beta/11211172/"><i class="fa fa-linkedin"></i></a>
                        </li>
                      
                    </ul>
                </div>
                
              
             <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="#">Privacy Policy</a>
                        </li>
                        <li><a href="#">Terms of Use</a>
                        </li>
                          <li><a href="mailto:admin@olympikesoft.com">Contact</a>
                        </li>
                        
                    </ul>
                </div>      
                            
          
      
                     
                </div>
               
               
      
	
              
                
                
            </div>
       
   </div>
</body>

