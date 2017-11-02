<?php

include_once("connection.php");


?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="generator" content="">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto:200,300,400,500,600,700" rel="stylesheet">
<style>
    .paginate {
    font-family:"Times New Roman", Times, serif;
    padding: 3px;
    margin: 3px;
}
.paginate a {
    padding:2px 5px 2px 5px;
    margin:2px;
    border:1px solid #999;
    text-decoration:none;
    color: #666;
}
.paginate a:hover, .paginate a:active {
    border: 1px solid #999;
    color: #0066FF;
}
.paginate span.current {
    margin: 2px;
    padding: 2px 5px 2px 5px;
    border: 1px solid #999;
    font-weight: bold;
    background-color: #999;
    color: #FFF;
}
.paginate span.disabled {
    padding:2px 5px 2px 5px;
    margin:2px;
    border:1px solid #eee;
    color:#DDD;
}
</style>
</head>
<body id="page-top" class="index">

    <!-- Navigation -->

    
  

    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
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
                        <a href="/"></a>
                    </li>

                   
                     <li>
                        <a href="/blog.php">Blog</a>
                    </li>
                    
                   
                  <!--  <li>
                        <a class="page-scroll" href="#team">Team</a>
                    </li>!-->
                   
                 
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

<!-- CONTENT =============================-->
<section class="item content">
<div class="container toparea">
	<div class="underlined-title">
		<div class="editContent">
			<h1 class="text-center latestitems">Blog</h1>
		</div>
		<div class="wow-hr type_short">
			<span class="wow-hr-h">
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			</span>
		</div>
	</div>
	<div class="row">
	    <?php
	  // find out how many rows are in the table 
$sql = "SELECT COUNT(*) as conta FROM posts";
$result = mysqli_query($link, $sql);

        if(!$result)
        {
            die(mysqli_error($link));
        }
$r = mysqli_fetch_assoc($result);
$numrows = $r['conta'];

// number of rows to show per page
$rowsperpage = 10;
// find out total pages
$totalpages = ceil($numrows / $rowsperpage);

// get the current page or set a default
if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
   // cast var as int
   $currentpage = (int) $_GET['currentpage'];
} else {
   // default page num
   $currentpage = 1;
} // end if

// if current page is greater than total pages...
if ($currentpage > $totalpages) {
   // set current page to last page
   $currentpage = $totalpages;
} // end if
// if current page is less than first page...
if ($currentpage < 1) {
   // set current page to first page
   $currentpage = 1;
} // end if

// the offset of the list, based on current page 
$offset = ($currentpage - 1) * $rowsperpage;

// get the info from the db 
$sql = "SELECT * FROM posts LIMIT $offset, $rowsperpage";
$result = mysqli_query($link, $sql);

  if(!$result)
        {
            die(mysqli_error($link));
        }

// while there are rows to be fetched...
while ($list = mysqli_fetch_array($result)) {
?>

<div class="col-md-4">
				<div class="productbox">
					<div class="fadeshop">
						<div class="captionshop text-center" style="display: none;">
							<?php  echo $list['name'];?>
							<p>
							<!--	 This is a short excerpt to generally describe what the item is about. !--->
							</p>
							<p>
							<!---	<a href="/checkout.php?id=<?php echo $list['id'];?>" class="learn-more detailslearn"><i class="fa fa-shopping-cart"></i> Purchase</a> --->
						
							</p>
						</div>
						<span class="maxproduct"><img src="https://olympikesoft.com/uploads/<?php echo $list['image_url'];?>" alt=""></span>
					</div>
					<div class="product-details">
						<span class="name">
						<span class="edd_name"><?php echo $list['name'];?> </span>
						</span>
						
					</div>
					<div>
					    <?php echo $list['text'];?>
					</div>
				</div>
			</div>


<?php

  // echo $list['id'] . " : " . $list['name'] . "<br />";
} // end while

/******  build the pagination links ******/
// range of num links to show
$range = 3;

// if not on page 1, don't show back links
if ($currentpage > 1) {
   // show << link to go back to page 1
   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=1'><<</a> ";
   // get previous page num
   $prevpage = $currentpage - 1;
   // show < link to go back to 1 page
   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$prevpage'><</a> ";
} // end if 

// loop to show links to range of pages around current page
for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
   // if it's a valid page number...
   if (($x > 0) && ($x <= $totalpages)) {
      // if we're on current page...
      if ($x == $currentpage) {
         // 'highlight' it but don't make a link
         echo " [<b>$x</b>] ";
      // if not current page...
      } else {
         // make it a link
         echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$x'>$x</a> ";
      } // end else
   } // end if 
} // end for

// if not on last page, show forward and last page links        
if ($currentpage != $totalpages) {
   // get next page
   $nextpage = $currentpage + 1;
    // echo forward link for next page 
   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$nextpage'>></a> ";
   // echo forward link for lastpage
   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$totalpages'>>></a> ";
} // end if
/****** end build pagination links ******/
?>
</body>