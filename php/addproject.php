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

if(isset($_POST['btn-upload']))
{    

 $text = $_POST['text'];
 $title = $_POST['title'];

 $file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder= "/home/grannyho/public_html/olympikesoft.com/uploads/";
 
 // new file size in KB
 $new_size = $file_size/1024;  
 // new file size in KB
 
 // make file name in lower case
 $new_file_name = strtolower($file);
 // make file name in lower case
 
 $final_file=str_replace(' ','-',$new_file_name);
 
 if(move_uploaded_file($file_loc,$folder.$final_file))
 {
  $sql="INSERT INTO Projects (name, description	, User_id, date_initial, image_url, state) VALUES('$title','$text', '{$_SESSION['admin_id']}', Now(),'$final_file', '1')";
  
  echo $sql;
  
  $result = mysqli_query($link, $sql);
 
  	if(!$result)
		{
			die("Error in query #1" .  mysqli_error($link));
		}else{
		
	
	  header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
	
 }
 
 }
 ?>
 