<?php
error_reporting(E_ALL);
@ini_set('display_errors', '1');
    	$servername = 'localhost';
	$username = 'grannyho_startup';
	$password = 'antonio10';
	$db = 'grannyho_startup';	// Create linkection
	$link = mysqli_connect($servername, $username, $password,$db);
	mysqli_query($link,"SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_linkection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");

	
	if (!mysqli_set_charset($link, "utf8")) {
    # TODO - Error: Unable to set the character set
    exit;
}

    if($link)
    {
      //  echo "Database connected";
    }else{
      //  echo "Error";
    }

?>
<?php
session_start();


if(empty($_SESSION['admin_id']))
{
    window.location.replace("/admin/login.php");

}
?>

<!DOCTYPE html>
<html ng-app="formExample">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!--- <script src="/socket.io/socket.io.js"></script> !--->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.25/angular.min.js"></script>			  
	
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>			  
			 
</head>
<body>  



<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    
  </div><!-- /.container-fluid -->
</nav>
    </div>
  </div>
</nav>

<div class="container">    
  <div class="row">
     <div ng-controller="FirstCtrl">

<table class="table table-striped">
    <thead>
      <tr>
        <th>Name of Project</th>
        <th>Date_inserted</th>
        <th>Budget</th>
        <th>Total Commission (*35%)</th>
      </tr>
    </thead>
    <tbody>
  <tr ng-repeat="x in names">
    <td>{{ x.name }}</td>
    <td>{{ x.date_initial }}</td>
    <td>{{ x.price }}</td>
    <td>{{parseInt(x.price) * 0.35}}</td>
  </tr>
</table>

</div>
	</div>
</div><br><br>





			
	  

 
	         <div ng-controller="formCtrl">
	        <form  name="userForm" post="/php/clients.php" class="well form-search"   >
	             <div class="form-group">
  <input type="text" ng-model="name" class="input-medium search-query" placeholder="Name of Project" required >
    </div>
     <div class="form-group">
                <input type="email" ng-model="email" class="input-medium search-query" placeholder="Email of client" required >
                </div>
                 <div class="form-group">
                     <textarea ng-model="message">Description</textarea>
                
                </div>
                 <div class="form-group">
                <input type="text" ng-model="price" class="input-medium search-query" placeholder="Price" required >
                </div>
                 <div class="form-group">
                <input type="date" ng-model="date" class="input-medium search-query" placeholder="Date-final" required >
                </div>
                 <div class="form-group">
                 <input type="text" ng-model="client" class="input-medium search-query" placeholder="FB client URL" required >
                 </div>
                <button type="submit" class="btn" ng-click="insertData()">Submit </button>
                </form>
                
              
</div>


 





<script>
var app = angular.module('formExample',[]);
    app.controller('formCtrl',function($scope,$http){    
        $scope.insertData=function(){      
            
          //  if($scope.name =='' && $scope.email == '' && $scope.message = '' && $scope.price =='' && $scope.date == null && $scope.client == ''){return;}
            $http.post("/php/clients.php", {
               "name": $scope.name, "email": $scope.email, "message": $scope.message, "price": $scope.price, "date": $scope.date, "client": $scope.client
            }).then(function(response){
                    alert("Data Inserted Successfully");
                    $scope.name = '';
                    $scope.email = '';
                    $scope.message = '';
                    $scope.price ='';
                    $scope.date = null//or new Date();
                    $scope.client= '';


                },function(error){
                    alert("Sorry! Data Couldn't be inserted!");
                    console.error(error);

                });
            }
        });


</script>

<script>

app.controller('FirstCtrl', function($scope, $http) {
    $http.get("/php/get_clients.php")
    .then(function (response) {$scope.names = response.data.records;});
});
</script>


 
</footer>

<!---
<div ng-app="myApp" ng-controller="myCtrl">
{{ firstName + " " + lastName }}
</div>!--->




</body>
</html>
