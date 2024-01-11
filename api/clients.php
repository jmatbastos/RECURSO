<?php

include 'db.php';

// CHECK IF USER EXISTS IN DATABASE
if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['email']) && !isset($_GET['password'])) {
	// ligaçã base de dados
	$db = dbconnect($hostname,$db_name,$db_user,$db_passwd);

			// criar query numa string (avoid SQL injection)
			$query  = "SELECT email FROM clients where email='" . mysqli_real_escape_string($db, trim($_GET['email'])) . "'";
			// executar a query
			if(!($result = @ mysqli_query($db, $query)))
					showerror($db);
			// vai buscar o resultado da query
			$user = mysqli_fetch_assoc($result);
		
			// allow cross-origin requests (CORS)
			header('Access-Control-Allow-Origin: *');
			header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
			header("Access-Control-Allow-Headers: Authorization, Origin, User-Token, X-Requested-With, Content-Type");			
			// convert to JSON
			$json = json_encode($user);
			echo $json; 
		

		// fechar a ligaçãbase de dados
		mysqli_close($db);

}

// LOGIN USER (POPULATE SESSION)
if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['email']) && isset($_GET['password'])) {

	// ligacao base de dados
	$db = dbconnect($hostname,$db_name,$db_user,$db_passwd);

	$email = mysqli_real_escape_string($db, trim($_GET['email']));
	$password = substr(md5($_GET['password']),0,32);



		// criar query numa string
		$query  = "SELECT id, name, email FROM clients WHERE email='$email' AND password_digest='$password'";

		// executar a query
		if(!($result = @ mysqli_query($db, $query)))
				showerror($db);

		$user = mysqli_fetch_assoc($result);

		// fechar a ligaço base de dados
		mysqli_close($db);
		
		// filter non UTF-8 characters
		$user = mb_convert_encoding($user,'UTF-8', 'ISO-8859-1');
		// convert to JSON
		$json=json_encode($user);

		// allow cross-origin requests (CORS)
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		header("Access-Control-Allow-Headers: Authorization, Origin, User-Token, X-Requested-With, Content-Type");
		
		echo $json;	
	


}




// REGISTER NEW USER
if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $json=file_get_contents('php://input');

    $data = json_decode($json, true);  
	
	if (isset($data['name']) && isset($data['email']) && isset($data['password'])) {

		// ligacao base de dados
		$db = dbconnect($hostname,$db_name,$db_user,$db_passwd);

		$name = mysqli_real_escape_string($db, trim($data['name']));
		$email = mysqli_real_escape_string($db, trim($data['email']));
		$password = substr(md5($data['password']),0,32);



		// criar query numa string
		$query  = "INSERT INTO clients SET name='$name',email='$email',password_digest='$password',created_at=NOW(),updated_at=NOW()";
	
		// executar a query
		if(!($result = @ mysqli_query($db, $query)))
			showerror($db);

		// criar query numa string
		$query  = "SELECT id, name, email FROM clients order by id desc limit 1";

		// executar a query
		if(!($result = @ mysqli_query($db, $query)))
				showerror($db);

		$user = mysqli_fetch_assoc($result);

		// fechar a ligaço base de dados
		mysqli_close($db);
		
		// filter non UTF-8 characters
		$user = mb_convert_encoding($user,'UTF-8', 'ISO-8859-1');
		// convert to JSON
		$json=json_encode($user);

		// allow cross-origin requests (CORS)
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		header("Access-Control-Allow-Headers: Authorization, Origin, User-Token, X-Requested-With, Content-Type");
		echo $json;	
	
	}
	else {
		header($_SERVER["SERVER_PROTOCOL"] . " 400 Bad Request");    
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        header("Access-Control-Allow-Headers: Authorization, Origin, User-Token, X-Requested-With, Content-Type");
        die('{"Error":"missing one or more properties \'name\' or \'email\' or \'password\' in data object"}');
	}


}



// allow cross-origin requests (CORS)
if($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
	header("Access-Control-Allow-Headers: Authorization, Origin, User-Token, X-Requested-With, Content-Type");	
}

?>

