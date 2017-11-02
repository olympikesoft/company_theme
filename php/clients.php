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

$post_date = file_get_contents("php://input");
$data = json_decode($post_date);

//


//saving to database
//save query

//now i am just printing the values

	$name = $data->name;
	$email = $data->email;
	$message = $data->message;
	$date = $data -> date;
	$client_fb = $data ->client;
	$price = $data -> price;

	$sql = "Insert into Projects (name, date_initial, description, User_id, price, email, fb_url, state) values ('$name', '$date', '$message', '{$_SESSION['admin_id']}', '$price', '$email', '$client_fb', '2')";
	$result = mysqli_query($link, $sql);
	
	if(!$result){
		die(mysqli_error($link));
	}
	
		if($result)
		{
		
		}



?>