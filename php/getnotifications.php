<?php

session_start();

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
        //echo "Database connected";
    }else{
       // echo "Error";
    }
  
    ?>
<?php


/* LEFT(post_content, 120)*/


$sql = "SELECT distinct count(id) as value from notification where user_listen_id='{$_SESSION['admin_id']}' and readed='1'";



$result = mysqli_query($link, $sql);

    if(!$result)
    {
      die(mysqli_error($link));
    }

mysql_query('SET CHARACTER SET utf8');
if ($result->num_rows >0) {
    
 // output data of each row
 while($row = mysqli_fetch_array($result)) {
 
 $myObj->value = $row['value'];
 
 $json = json_encode($myObj);
 // echo json_last_error_msg();
 
 }
 
} else {
 echo "0 results";
}
header('Content-type: application/json');
 echo $json;
$link->close();


?>