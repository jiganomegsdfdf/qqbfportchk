<?php

print("<head>");
print("		<link rel='stylesheet' href='s.css'>");
print("</head>");

function checker($from, $to, $ip) {
		$command = "/app/nmap/bin/nmap -v -p " . $from . "-" . $to . " -T5 -sT " . $ip . " 2>&1";

		exec($command, $output, $return_var);
		//var_dump($output);
		$textarr = $output;
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
		$pings = explode("s elapsed",explode(', ', $str)[1])[0];
		$pingms = explode("s elapsed",explode(', ', $str)[1])[0]*1000;

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
		list($pings1, $pingms1, $portcount1, $portarr1) = checker(0,1000, $ip);
		list($pings2, $pingms2, $portcount2, $portarr2) = checker(1001,2000, $ip);
		list($pings3, $pingms3, $portcount3, $portarr3) = checker(2001,3000, $ip);
		list($pings4, $pingms4, $portcount4, $portarr4) = checker(3001,4000, $ip);
		list($pings5, $pingms5, $portcount5, $portarr5) = checker(4001,5000, $ip);
		list($pings6, $pingms6, $portcount6, $portarr6) = checker(5001,6000, $ip);
		list($pings7, $pingms7, $portcount7, $portarr7) = checker(6001,7000, $ip);
		list($pings8, $pingms8, $portcount8, $portarr8) = checker(7001,8000, $ip);
		list($pings9, $pingms9, $portcount9, $portarr9) = checker(8001,9000, $ip);
		list($pings10, $pingms10, $portcount10, $portarr10) = checker(9001,10000, $ip);
		
		$pings = $pings1 + $pings2 + $pings3 + $pings4 + $pings5 + $pings6 + $pings7 + $pings8 + $pings9 + $pings10;
		$pings = $pings / 10;
		
		$pingms = $pingms1 + $pingms2 + $pingms3 + $pingms4 + $pingms5 + $pingms6 + $pingms7 + $pingms8 + $pingms9 + $pingms10;
		$pingms = $pingms / 10;
		
		$portcount = $portcount1 + $portcount2 + $portcount3 + $portcount4 + $portcount5 + $portcount6 + $portcount7 + $portcount8 + $portcount9 + $portcount10;
		
		
		
		print("<p>average ping seconds " . $pings . "s</p><br>");
		print("<p>average ping milliseconds " . $pingms . "ms</p><br>");
		print("<p>port's count: " . $portcount . "</p><br>");
		//var_dump($portarr);
		$portarr = array_merge($portarr1, $portarr2, $portarr3, $portarr4, $portarr5, $portarr6, $portarr7, $portarr8, $portarr9, $portarr10); 
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
