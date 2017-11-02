<?php

session_start();

?>
<?php

if(empty($_SESSION['admin_id'])&&empty($_SESSION['admin_code']))
{
    header("Location: /admin/login.php");
}

 
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Light Bootstrap Dashboard by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="/css/demo.css" rel="stylesheet" />


      <link href="https://olympikesoft.com/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link href="/css/pe-icon-7-stroke.css" rel="stylesheet" />
    
    
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

<script>
    $.ajax({
              url: "/php/getposts.php",
              type: "GET",
              dataType: 'json',
              crossDomain: true,
              success: function(result) {
                  
                 $.each(result,function(index,obj) {
                 
                     $("#get-all").append(
                         "<table border='1px'>"+
                             "<tr>"+
                                 "<td>"+obj.title+"</td>"+
                                 "<td>"+obj.datetime+"</td>"+
                                 "<td><a href='/admin/edit_post.php?id="+obj.id+"'>Editar post</a></td>"+
                                 "<td><a href='/php/removepost.php?id="+obj.id+"'> Remover Post</a></td></tr>"
                          +"</table>");
                  });
              }
          });
    
</script>

<script>
    $.ajax({
              url: "/php/getprojects.php",
              type: "GET",
              dataType: 'json',
              crossDomain: true,
              success: function(result) {
                  
                 $.each(result,function(index,obj) {
                 
               
                     $("#get-projects").append(
                         "<table border='1px'>"+
                             "<tr>"+
                                 "<td>"+obj.name+"</td>"+
                                 "<td>"+obj.date_initial+"</td>"+
                                 "<td><a href='/admin/edit_projects.php?id="+obj.id+"'>Editar post</a></td>"+
                                 "<td><a href='/php/removeprojects.php?id="+obj.id+"'> Remover Post</a></td></tr>"
                          +"</table>");
                  });
              }
          });
    
</script>

<script>

var strBuilder = [];

    $.ajax({
              url: "/php/getnotications.php",
              type: "GET",
              dataType: 'json',
              success: function(result) {
              
               /*  $.each(JSON.parse(result.data), function(index,obj){
                 j.value);
                     console.log(obj.value); /*if (obj.hasOwnProperty(valor)) {
         strBuilder.push("Key is " + valor +"\n");
    }else{
         strBuilder.push("error");
    }*/
                  console.log('success', result, result.name);
               
                     $("#get-not").append(result.value);
                    /* alert(strBuilder.join(""));*/
                 /*});*/
                  },
                   error: function (result, status, err) {
       console.log('error', result);
    }
              })
    
</script>

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
       

            <ul class="nav">
                <li class="active">
                    <a href="dashboard.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="create_post.php">
                        <i class="pe-7s-user"></i>
                        <p>Create NEWS</p>
                    </a>
                </li>
                <li>
                    <a href="create_projects.php">
                        <i class="pe-7s-note2"></i>
                        <p>Create Project</p>
                    </a>
                </li>
                
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret"></b>
                                    <span class="notification"><div id="get-not"></div></span>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
                        <li>
                           <a href="">
                                <i class="fa fa-search"></i>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="">
                               Account
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    Dropdown
                                    <b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                              </ul>
                        </li>
                        <li>
                            <a href="/php.logout.php">
                                Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                      
                            <div class="content">
                            
                            </div>
                     
                    </div>

                    <div class="col-md-8">
                        <div class="card">
                           
                            <div class="content">
                             <div id="get-all"></div>
                                <div id="get-projects"></div>
                            </div>
                        </div>
                    </div>
                </div>



        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; 2016 <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

   
	
    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

   
	<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: 'pe-7s-gift',
            	message: "Welcome to <b>Light Bootstrap Dashboard</b> - a beautiful freebie for every web developer."

            },{
                type: 'info',
                timer: 4000
            });

    	});
	</script>


</html>

