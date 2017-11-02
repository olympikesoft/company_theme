<?php

include_once("connection.php");

session_start();

?>


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta property="og:url"           content="http://www.olympikesoft.com" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="OUR WEBSITE" />
  <meta property="og:description"   content="Game Unity 3D is here" />
  <meta property="og:image"         content="http://www.olympike.com" />


    <title>Olympikesoft - Projects</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/clean-blog.min.css" rel="stylesheet">
    <link href="css/pop_login.css" rel="stylesheet">
    <!-- <link href="css/clean-blog.min.css" rel="stylesheet"> Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/themes/bootstrap.min.css"/>

<!-- 
    RTL version
-->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/alertify.rtl.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/themes/default.rtl.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/themes/semantic.rtl.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/themes/bootstrap.rtl.min.css"/>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<script>
    
    var headerHeight = 200;

$(window).bind('scroll', function () {
if ($(window).scrollTop() > headerHeight) {
    $('#myNav').removeClass('navbar-top');
    $('#myNav').addClass('navbar-fixed-top');
} else {
    $('#myNav').removeClass('navbar-fixed-top');
    $('#myNav').addClass('navbar-top');
}
});  

// Plugin options and our code
$("#modal_trigger").leanModal({
		top: 100,
		overlay: 0.6,
		closeButton: ".modal_close"
});


</script>
<script>
$('button.zoomPlus').click(function(){
  $('.zoomin img').addClass('zoomer');
});

$('button.zoomMinus').click(function(){
  $('.zoomin img').removeClass('zoomer');
});

</script>

<style>
    .zoomin img { height: 500px; width: 500px;
    -webkit-transition: all 2s ease;
    -moz-transition: all 2s ease;
    -ms-transition: all 2s ease;
    transition: all 2s ease; }
    .zoomin img:hover,
    img.zoomer{ width: 600px; height: 600px; }
    body {
       overflow-x:hidden;
}
</style>

</head>

<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_PT/sdk.js#xfbml=1&version=v2.10";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

    <!-- Navigation -->
    <nav id="myNav" class="navbar navbar-default" role="navigation">
           <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="/">Olympike Soft</a>
            </div>
            
            

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href=/"></a>
                    </li>

                    <li>
                        <a class="page-scroll" href="#portfolio">Portfolio</a>
                    </li>
                    <li>
                        
                       
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                  <!--  <li>
                        <a class="page-scroll" href="#team">Team</a>
                    </li>!-->
                    <li>
                        <a href="/products.html">Products</a>
                    </li>
                    <li>
                        <a href="/blogs.php">Blog</a>
                    </li>
                    
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Page Header -->
    
    <?php



	if(isset($_GET['id'])) {
	 
	
 
 $id = $_GET['id'];

/* LEFT(post_content, 120)*/


$sql = "SELECT * from Projects where id='$id'";



$result = mysqli_query($link, $sql);

    if(!$result)
    {
       die(mysqli_error($link));
    }
    
    $numrows = mysqli_num_rows($result);
    
    


 if($numrows >0) {
 // output data of each row
 while($row = mysqli_fetch_array($result))
 

 
{

?>
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('img/post-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-heading">
                    
                       
                        <h2 class="subheading"></h2>
                        <span class="meta"> </span>
                    </div>
                 
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                 <!-- Go to www.addthis.com/dashboard to customize your tools --> <div class="addthis_inline_share_toolbox"></div>
                      
                    <?php echo  $row['name'];?>
                    	<div class="productbox">
			    <div class="zoomin"> 
					<img class="image-to-zoom" 
     id="zoom_01" src="/uploads/<?php echo $row['image_url'];?>" data-zoom-image="image1.jpg"/>
  </div>
  </div>>
  
        <div class="container">
        <div class="row">
         <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                 <div class="app_rating">

    <div>
<?php

    /*if(empty($_SESSION['admin_id']))
    {
        ?>
        <div class="container">
	
		<a href="/admin/login.php" class="btn">Click here to Login</a><span><a href="/admin/register.php" class="btn">Click here to Register</a></span>

		</div>
        <?php
    }*/
 ?>
 <?php
    
    if($_SESSION['admin_id']>0)
    {
        ?>
      <form action="#" method="post"  id="myForm">
<input type="hidden" name="post_id" value="<?php echo $id  ; ?>"/>
 <div class="stars" >
 <?php
        $sql_get_rating = "Select DISTINCT
         (Select avg(rating) from Projects where id='$id')/
         ( Select count(id) from rating where rating.Projects_id='$id') as result from Projects"; ?>
        <?php
   
        $result_rating = mysqli_query($link, $sql_get_rating);
        
        if(!$result_rating)
        {
            die(mysqli_error($link));
        }
        
        while($row_r = mysqli_fetch_array($result_rating))
        {
        ?>
    <input class="star star-5" id="star-5" type="radio" value="5" name="star"/>
    <label class="star star-5" for="star-5"></label>
    <input class="star star-4" id="star-4" type="radio" value="4"  name="star"/>
    <label class="star star-4" for="star-4"></label>
    <input class="star star-3" id="star-3" type="radio" value="3"  name="star"/>
    <label class="star star-3" for="star-3"></label>
    <input class="star star-2" id="star-2" type="radio" value="2" name="star"/>
    <label class="star star-2" for="star-2"></label>
    <input class="star star-1" id="star-1" type="radio" value="1"  name="star"/>
    <label class="star star-1" for="star-1"></label>
    <input type="submit" name="send" value="Send review">
    <?php echo "Rating is " . $row_r['result'] ." ";?>
    <?php
    }
    ?>
</div>
<form>
<?php

    }
    
?>
    </div>
        </div>

   <?php echo  $row ['description'];?>
                    </div>
            </div>
        </div>
    </article>



 <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
<div class="fb-comments" data-href="https://olympikesoft.com/post.php?id=<?php echo $row['id'];?>" data-numposts="5"></div>
   </div>
   </div>
   </div>
<?php

}
}
?>

<?php
    if(isset($_POST['send'])){
        
        $_id = $_POST['post_id'];
        $_user_id = $_SESSION['admin_id'];
        $_rating_value = $_POST['star'];
        
        $_check_voted = "Select * from rating where Projects_id='$_id' and user_id='$_user_id'";
        
        
        $result = mysqli_query($link, $_check_voted);
        
        $num_rows = mysqli_num_rows($result);
        
   
        
         if(!$result)
                {
                    die(mysqli_error($link));
                }
        
        if($num_rows > 0)
        {
            ?>
            <script>
             alertify
  .alert("You have already voted!.", function(){
    alertify.message('OK');
  });
  </script>
  <?php
           
        }else{
            
            $update_rating = "Update Projects set rating  = '$_rating_value' + rating where id='$_id'";
            $result_upd = mysqli_query($link, $update_rating);
            
            
     /* Listen will be the admin, id=1 */
            
            if($result_upd)
            {
                $insert = "Insert into rating (user_id, projects_id) values ('$_user_id', '$_id')";
                $result_in = mysqli_query($link, $insert);
                
                if($result_in)
                {
                    $insertevent = "Insert into event(type, time) values ('1', Now())";
                    $result_ev = mysqli_query($link, $insertevent);
                    if(!$result_ev)
                    {
                        die(mysqli_error($link));
                    }
                    
                    if($result_ev)
                    {
                        $notificationinsert = "Insert into notification(user_fired_id, user_listen_id, date, readed) values('$_user_id','1', Now(), '1')";
                        
                      
                        $result_notf  = mysqli_query($link, $notificationinsert);
                        
                        if($result_notf)
                        {
                            ?>
                            <script>
             alertify
  .alert("Thank you for voting!", function(){
    alertify.message('OK');
  });
  </script>
                            
                            <?php
                        }
                        
                        if($result_notf)
                        {
                            die(mysqli_error($link));
                        }
                        
                        
                    }
                    
                    
                   
                  
                }
                
                if(!$result_in)
                {
                    die(mysqli_error($link));
                }
                
            }
            
             if(!$result_upd)
                {
                    die(mysqli_error($link));
                }
        }
        
        
    }
}
?>


 
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; OlympikeSoft.com 2017</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                       
                    </ul>
                </div>
                
                    <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        
                        <li>
                            
          <h4>
            Subscribe for
            newsletter 
          </h4>
       
    
              <form name="ajaxform" id="ajaxform" action="/php/newsletter.php" method="POST">
              <div class="input-group">
                 <input class="btn btn-lg" name="email" id="email" type="email" placeholder="Your Email">
                 <input  type="submit" value="Submit" />
              </div>
             </form>
    
         <small class="promise"><em>We won't send spam.</em></small>
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
    </footer>
    </footer>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>
    

    <!-- Theme JavaScript -->
    <script src="js/clean-blog.min.js"></script>
    
       <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>



    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>

   

    
    <script src="js/insert_newsletter.js"></script>
     <script src="js/getposts.js"></script>
<!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5982378d6943797d"></script> 
</body>

</html>