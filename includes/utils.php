<?php

// check and array for s et of values and return waht is missing
// this is used to make sure we got the POST vars we require
function hasRequired($required, $data){
  $missing = array();
	foreach($required as $req){
		if(!isset($data[$req]) || empty($data[$req])){
			$missing[] = $req;
		}
	}
	return $missing;
}
	
// strip out any stuff we don't want in a STR variable
function cleanStr($str){
  $str = preg_replace('/[^a-zA-Z0-9_ %\/:[\]\.\@()%&\-+,|]/s', '', $str);
	$str = trim($str);
	if(strlen($str) > 255){
		$str = substr($str, 0, 255);
	}
	return $str;
}

?>