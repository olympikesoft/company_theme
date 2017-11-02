<?php

include_once("connection.php");


?>


<head>
    <?php 
    if(isset($_POST['id']))
    {
        
        $sql_t = "Select * from Projects where id = '{$_POST['id']}'";
        $results -> mysqli_query($link, $sql_t);
        
        $rows -> mysqli_fetch_assoc($results);
        
?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta property="og:url"           content="https://www.olympikesoft.com" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="<?php echo $rows['name'];?>" />
  <meta property="og:description"   content="<?php echo $rows['description'];?>" />
  <meta property="og:image"         content="https://www.olympikesoft.com/<?php echo $rows['image_url'];?><" />


    <title><?php echo $rows['name'];?></title>
<?php

}
?>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/clean-blog.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>


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
</script>

<style>
    .imgwrapper {
   width: 80%;
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


$sql = "SELECT distinct * from posts where id='$id'";



$result = mysqli_query($link, $sql);

    if(!$result)
    {
       echo mysql_errno($link) . ": " . mysql_error($link) . "\n";
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
                       
                        <h2 class="subheading"><?php echo  nl2br ( $row['title']);?></h2>
                        <span class="meta"> <?php echo $row['datetime'];?></span>
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
                      
                    <div class="imgwrapper">
   <img src="<?php echo $row['image_url'];?>" class="img-responsive">
</div>
                      <?php echo  $row['text'];?>
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
}
?>


  <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
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
                 <input class="btn btn-lg" name="email" id="email" type="email" placeholder="Your Email" required>
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

   

    <!-- Theme JavaScript -->
    <script src="js/agency.min.js"></script>
    <script src="js/insert_newsletter.js"></script>
     <script src="js/getposts.js"></script>
<!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5982378d6943797d"></script> 
</body>

</html>