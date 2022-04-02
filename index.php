<?php

print("<head>");
print("		<link rel='stylesheet' href='s.css'>");
print("</head>");

$token = str_replace('"', '', $_GET['auth']);
$tokenold = $token;
$token = md5($token);
if ($token == "9e78c5c20b172e66f75779d35040796a" or $token == "d2555ef8faa2788ebb5434b6dc9955cd"){
	$ip = $_GET['ip'];

	if(filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
	  	$command = "/app/nmap/bin/nmap -v -p U:0,T:21-25,80,443,5900-5950,3389,3399,3379,3388,3398,3378,3387 -T5 -sT " . $ip . " 2>&1";
		//print($command);

		exec($command, $output, $return_var);
		//var_dump($output);
		$textarr = $output;
		array_shift($textarr);
		$portarr = array("");
		array_shift($portarr);
		array_shift($textarr);
		array_shift($textarr);
		array_shift($textarr);
		array_shift($textarr);
		array_shift($textarr);
		$str = array_shift($textarr);
		$pings = explode("s elapsed",explode(", ", $str)[1])[0];
		$pingms = explode("s elapsed",explode(", ", $str)[1])[0]*1000;

		array_shift($textarr);
		array_shift($textarr);
		array_shift($textarr);
		array_shift($textarr);

		$preportsarr = $textarr;
		$portcount = 0;
		while (true){
			$str = array_shift($preportsarr);
			if (str_contains($str, "Discovered")){
				$portcount += 1;
				array_push($portarr, $str);
				array_shift($textarr);
			}else{
				break;
			}
		}
		print("<p>ping " . $pings . "s</p><br>");
		print("<p>ping " . $pingms . "ms</p><br>");
		print("<p>port's count: " . $portcount . "</p><br>");
		//var_dump($portarr);
		foreach ($portarr as $value) {
		    print("<p>" . $value . "</p><br>");
		}
		print("<p>" . end($textarr) . "</p><br>");
	}else{
	  	echo "Not valid ip address.";
	}
}else{
  printl("Error! incorrect token");  
}

?>
