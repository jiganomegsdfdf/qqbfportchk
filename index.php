<?php

$token = str_replace('"', '', $_GET['auth']);
$tokenold = $token;
$token = md5($token);
if ($token == "9e78c5c20b172e66f75779d35040796a" or $token == "d2555ef8faa2788ebb5434b6dc9955cd"){
	$ip = $_GET['ip']

	if(filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
	  	$command = "nmap -v" . $ip . "2>&1";

		exec($command, $output, $return_var);
	
		// If return code is not zero, the command failed
		if ($return_var != 0) 
		{
 		   // dump all output, including error messages
		    var_dump($output);
		}
	}
	else {
	  	echo "Not valid ip address."
	}
}else{
  printl("Error! incorrect token");  
  $alltext = substr($alltext, 1, -1);
  print($alltext);
}

?>
