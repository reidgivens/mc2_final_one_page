<?php
/**
	* Handles the Database connection
	*
	*/

// The basic connection details
$db_name		 = "myDbName";
$db_username = "MyDBUsername";
$db_password = "somethingReallySecure";
$db_server	 = "localhost";

GLOBAL $DB; // this will hold the connection info

$DB = new PDO("pgsql:host=". $db_server.";dbname= ".$db_name, $db_username, $db_password);
$DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// connect to the database, using PDO
function query($statement, $args=array()){
	
	global $DB;
	// in case we get a scalar value
	$args = (!is_array($args) ? $args = array($args) : $args);
	
	if (count($args) == 0) {
		// no arguments; just execute and return the result object
		return $DB->query($statement);
	} else {
		try{
			// prepare the statement and then execute it against $args, returning the result
			$sth = $DB->prepare($statement);
			$sth->execute($args);
			return $sth;
		} catch(PDOException $e) {
			throw new Exception($e->getMessage());
		}
	}
}

?>