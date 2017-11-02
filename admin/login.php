<?php
session_start();

?>
<html ng-app="formExample">
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
     <link href="https://olympikesoft.com/css/signup.css"  rel="stylesheet" type="text/css"/>
     
      <link href="https://olympikesoft.com/css/style.css"  rel="stylesheet" type="text/css"/>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

   <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.25/angular.min.js"></script>	


<script>
    $(document).ready(function () {

    $('#myform').validate({ // initialize the plugin
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 5
            }
        }
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
                    Sign In</p>
                     <div ng-controller="formCtrl">
	        <form  name="userForm" post="/php/login.php"
 <div class="form-group">
                <input type="email" ng-model="email" class="input-medium search-query" placeholder="Email" required >
               
                 <div class="form-group">
                <input type="password" ng-model="password" class="input-medium search-query" placeholder="password" required >
                </div>
                
               <button type="submit" class="btn" ng-click="insertData()">Submit </button>
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
   
   <script>
       var app = angular.module('formExample',[]);
    app.controller('formCtrl',function($scope,$http,$url){    
        $scope.insertData=function(){      
            
          //  if($scope.name =='' && $scope.email == '' && $scope.message = '' && $scope.price =='' && $scope.date == null && $scope.client == ''){return;}
            $http.post("/php/login.php", {
               "email": $scope.email, "password": $scope.password
            }).then(function(response, $location){
                    alert("Login Successfully");
                    $scope.email = '';
                    $scope.password = '';
                    window.location.href = '/clients.php'


                     //$window.location.href = '/clients.php';


                },function(error){
                    alert("Sorry! Data Couldn't be inserted!");
                    console.error(error);

                });
            }
        });


   </script>
</body>
</html>

