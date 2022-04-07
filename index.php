<?php

print("<head>");
print("		<link rel='stylesheet' href='s.css'>");
print("</head>");

function checker($from, $to) {
		$command = "/app/nmap/bin/nmap -v -p " . $from . "-" . $to . " -T5 -sT " . $ip . " 2>&1";

		exec($command, $output, $return_var);
		//var_dump($output);
		$textarr = $output;
		array_shift($textarr);
		$portarr = array("");
		array_shift($portarr);
		array_shift($textarr);
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
		$all = array($pings, $pingms, $portcount, $portarr);
		return $all;
}

$token = str_replace('"', '', $_GET['auth']);
$tokenold = $token;
$token = md5($token);
if ($token == "9e78c5c20b172e66f75779d35040796a" or $token == "d2555ef8faa2788ebb5434b6dc9955cd"){
	$ip = $_GET['ip'];

	if(filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
		$pings1, $pingms1, $portcount1, $portarr1 = checker(0,1000);
		
		//$pings = $pings1 + $pings2 + $pings3 + $pings4 + $pings5 + $pings6 + $pings7 + $pings8 + $pings9 + $pings10;
		//$pings = $pings / 10;
		
		//$pingms = $pingms1 + $pingms2 + $pingms3 + $pingms4 + $pingms5 + $pingms6 + $pingms7 + $pingms8 + $pingms9 + $pingms10;
		//$pingms = $pingms / 10;
		
		print("<p>ping seconds " . $pings1 . "s</p><br>");
		print("<p>ping milliseconds " . $pingms1 . "ms</p><br>");
		print("<p>port's count: " . $portcount1 . "</p><br>");
		//var_dump($portarr);
		foreach ($portarr1 as $value) {
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
