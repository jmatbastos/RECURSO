<?php

include 'db.php';

// ligação à base de dados
$db = dbconnect($hostname,$db_name,$db_user,$db_passwd);

   if( $_SERVER['REQUEST_METHOD'] == 'GET'  ) {
		$query  = "SELECT  c.id as cat_id, c.name as cat_name, b.id, b.name, b.description, b.price, b.image FROM beverages as b inner join categories as c on (b.cat_id = c.id)";	

	

	// executar a query
	if(!($result = @ mysqli_query($db, $query)))
		showerror($db);
	
	// vai buscar o resultado da query

	$nrows  = mysqli_num_rows($result);
	$beverages = [];
	for($i=0; $i<$nrows; $i++)
		$beverages[$i] = mysqli_fetch_assoc($result);

	
	// allow cross-origin requests (CORS)
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
	header("Access-Control-Allow-Headers: Authorization, Origin, User-Token, X-Requested-With, Content-Type");

	// filter non UTF-8 characters
	//$beverages = mb_convert_encoding($beverages,'UTF-8','ISO-8859-1');
	// convert to JSON
	$beveragesJSON = json_encode($beverages);
	echo $beveragesJSON;
	 
    }

	// allow cross-origin requests (CORS)
	if( $_SERVER['REQUEST_METHOD'] == 'OPTIONS' ) {
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		header("Access-Control-Allow-Headers: Authorization, Origin, User-Token, X-Requested-With, Content-Type");	
	}	

// fechar a ligação à base de dados
mysqli_close($db);




?>

