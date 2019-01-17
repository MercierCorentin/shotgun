<?php
	// Include config 
	require_once('../config.php');

	//Function that connect to MySQL database
	function sql_connect() {
		global $config;
		try {
	        $db = new PDO('mysql:host='.$config['dbHost'].';dbname='.$config['dbName'], $config['dbUser'], $config['dbPassword'], array(\PDO::MYSQL_ATTR_INIT_COMMAND =>  'SET NAMES utf8'));
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    }
	    catch(Exception $e) {
	        die('line '.__LINE__ .': Error : '.$e->getMessage());
	    }
	    return $db;
	}
	
	//Executes a query and return some data or error infos
	function sql_query($query_string,$params, $get = true){
		global $db;
		$query = $db->prepare($query_string);
		try {
			$query -> execute($params);
			if($get){
				$data = $query->fetchAll();
				return $data;
			}else{
				$data['query_success'] = true;
				$data['last_insert_id'] = $db -> lastInsertId();
				return $data;
			}
		}catch(Exception $e){
			$error_info = $e->errorInfo;
			array_unshift($error_info,"error");
			return $error_info;
		}
	}

	//Function that display errors
	function display_errors($error_array){
		if(!empty($error_array)||isset($error_array)){
			foreach ($error_array as $value) {
				echo "
				<div class='error_message'>
					<p>".$value."</p>
				</div>
				";
			}
		}else{
			return;
		}
	}

	// check if user input really is a student login
	function check_login($login,$error_array){
		$login_regex			= "#^[a-z _\-]{4,25}$#i"; //lowercase letters, space and "-" accepted
		$error_login_existence	= "Veuillez entrez un login ";
		$error_login_format		= "Format de login invalide";

		if(empty($login)){

			array_push($error_array,$error_login_existence);
		
		}elseif(preg_match($login_regex,$login)!=1){
		
			array_push($error_array,$error_login_format);
		}
		return $error_array;
	}

	// Return a random input name 
	function name_gen(){
        $lower_alphabet = "abcdefghijklmnopqrstuvwxyz";
		$upper_alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		//Min 8 characters; Max 25 characters; At least 1 uppercase char, 1 lowercase char and 1 digit
        $regex 			= '/^((?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9]).{8,25})\S$/';
        $correct_name 	= false;
		$letter 		= "";
		
        while(!$correct_name) {
            $name = "";
            for($i = 0; $i<=16 ;$i++){
                $type = rand(0,3);
                switch ($type) {
                    case 0:
                        $letter = $lower_alphabet[rand(0,25)];    
                        break;
                    case 1:
                        $letter = $lower_alphabet[rand(0,25)];    
                        break;
                    case 2:
                        $letter = $upper_alphabet[rand(0,25)];
                        break;
                    case 3:
                        $letter = strval(rand(0,9));
                        break;
                }
                $name .= $letter;
            }
            if(preg_match($regex,$name)==1){
                $correct_name = true;
            }
		}
		
        return $name;
	}

	// Check if shotgun is open 
	function check_time(){
		global $config;
		$current_time 	= strtotime(date("Y-m-d\TH:i:s"));
		$openning_time 	= strtotime(substr($config['openningDate'],0,-1));
		$opened 		= false;
		if($current_time >= $openning_time){
			$opened = true;
		}
		return $opened;
	}
?>