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
        echo "Error";
    }
    ?>
<?php

 if(isset($_POST['email'])&&isset($_POST['password'])&&isset($_POST['username']))
 {
	 
	
 
 $email = $_POST['email'];
 $website = $_POST['password'];
 $country_id = $_POST['username'];



 $swebsite = mysqli_real_escape_string($link, $website);
 
 $pass = md5( $swebsite);
 
 $email = filter_var($email, FILTER_SANITIZE_EMAIL);

// Validate e-mail
if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
    


$query = "SELECT * from user where email = '$email' or username='$country_id'";
$result = mysqli_query($link, $query);
$n = mysqli_num_rows($result);
if($n>0){
  $data = array(
        'status'    => 0
  );
   echo json_encode($data);
}else{
 
 $sql = "Insert into user(username, email, password, state, last_login)
	values('$country_id','$email',' $pass','1',now())";

	
	$result = mysqli_query($link, $sql);
	
	
	if(!$result)
	{
	     	die("Error in query #1" .  mysqli_error($link));
	    $data = array(
        'status'    => 2
  );
   echo json_encode($data);
	}
	
	if($result)
	{
	    $data = array(
        'status'    => 1
  );
	 echo json_encode($data);

	}
}
}else {
     $data = array(
        'status'    => 3
  );
  echo json_encode($data);
}
 
		mysqli_close($link);
		
 }
 


 


?>