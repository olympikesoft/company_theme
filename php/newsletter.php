<?php
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
        echo "Database connected";
    }else{
       // echo "Error";
    }
  
    ?>
    
    
<?php
if(isset($_POST['email']))
{

 $email=$_POST["email"];
 
 $query = "insert into subscription(email) values('$email')";
 echo $query;
 $result =  mysqli_query($link, $query);
 
 $_SESSION['email'] = $email;
 
 if($result)
 {
    //header( "Location: http://www.olympikesoft.com" );
    echo " window.location =  'http://www.olympikesoft.com'";
 }
 if(!$result)
 {
  	die("Error in query #1" .  mysqli_error($link));
    
 }echo " window.location =  'http://www.google.com'";
 
}
?>