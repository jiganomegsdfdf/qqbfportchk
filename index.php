<?php

print("<head>");
print("		<link rel='stylesheet' href='s.css'>");
print("</head>");

function checker($from, $to, $ip) {
		$command = "/app/nmap/bin/nmap --version-intensity 0 -v -p " . $from . "-" . $to . " -sT " . $ip . " 2>&1";

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
		$portcount = 0;
		$preportsarr = $textarr;
		while (true){
			if (count($preportsarr) > 1){
				$str = array_shift($preportsarr);
				if (str_contains($str, "Discovered")){
					$portcount += 1;
					array_push($portarr, $str);
					array_shift($textarr);
				}else{
					break;
				}
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
		/*list($pings1, $pingms1, $portcount1, $portarr1) = checker(0,1000, $ip);
		list($pings2, $pingms2, $portcount2, $portarr2) = checker(1001,2000, $ip);
		list($pings3, $pingms3, $portcount3, $portarr3) = checker(2001,3000, $ip);
		list($pings4, $pingms4, $portcount4, $portarr4) = checker(3001,4000, $ip);
		list($pings5, $pingms5, $portcount5, $portarr5) = checker(4001,5000, $ip);
		list($pings6, $pingms6, $portcount6, $portarr6) = checker(5001,6000, $ip);
		list($pings7, $pingms7, $portcount7, $portarr7) = checker(6001,7000, $ip);
		list($pings8, $pingms8, $portcount8, $portarr8) = checker(7001,8000, $ip);
		list($pings9, $pingms9, $portcount9, $portarr9) = checker(8001,9000, $ip);
		list($pings10, $pingms10, $portcount10, $portarr10) = checker(9001,10000, $ip);
		
		$portcount = $portcount1 + $portcount2 + $portcount3 + $portcount4 + $portcount5 + $portcount6 + $portcount7 + $portcount8 + $portcount9 + $portcount10;  
		$portarr = array_merge($portarr1, $portarr2, $portarr3, $portarr4, $portarr5, $portarr6, $portarr7, $portarr8, $portarr9, $portarr10);
		
		list($pings1, $pingms1, $portcount1, $portarr1) = checker(10000+1,10000+1000, $ip);
		list($pings2, $pingms2, $portcount2, $portarr2) = checker(10000+1001,10000+2000, $ip);
		list($pings3, $pingms3, $portcount3, $portarr3) = checker(10000+2001,10000+3000, $ip);
		list($pings4, $pingms4, $portcount4, $portarr4) = checker(10000+3001,10000+4000, $ip);
		list($pings5, $pingms5, $portcount5, $portarr5) = checker(10000+4001,10000+5000, $ip);
		list($pings6, $pingms6, $portcount6, $portarr6) = checker(10000+5001,10000+6000, $ip);
		list($pings7, $pingms7, $portcount7, $portarr7) = checker(10000+6001,10000+7000, $ip);
		list($pings8, $pingms8, $portcount8, $portarr8) = checker(10000+7001,10000+8000, $ip);
		list($pings9, $pingms9, $portcount9, $portarr9) = checker(10000+8001,10000+9000, $ip);
		list($pings10, $pingms10, $portcount10, $portarr10) = checker(10000+9001,10000+10000, $ip);
		
		$portcount = $portcount1 + $portcount2 + $portcount3 + $portcount4 + $portcount5 + $portcount6 + $portcount7 + $portcount8 + $portcount9 + $portcount10 + $portcount;
		$portarr = array_merge($portarr, $portarr1, $portarr2, $portarr3, $portarr4, $portarr5, $portarr6, $portarr7, $portarr8, $portarr9, $portarr10); 
		
		list($pings1, $pingms1, $portcount1, $portarr1) = checker(20000+1,20000+1000, $ip);
		list($pings2, $pingms2, $portcount2, $portarr2) = checker(20000+1001,20000+2000, $ip);
		list($pings3, $pingms3, $portcount3, $portarr3) = checker(20000+2001,20000+3000, $ip);
		list($pings4, $pingms4, $portcount4, $portarr4) = checker(20000+3001,20000+4000, $ip);
		list($pings5, $pingms5, $portcount5, $portarr5) = checker(20000+4001,20000+5000, $ip);
		list($pings6, $pingms6, $portcount6, $portarr6) = checker(20000+5001,20000+6000, $ip);
		list($pings7, $pingms7, $portcount7, $portarr7) = checker(20000+6001,20000+7000, $ip);
		list($pings8, $pingms8, $portcount8, $portarr8) = checker(20000+7001,20000+8000, $ip);
		list($pings9, $pingms9, $portcount9, $portarr9) = checker(20000+8001,20000+9000, $ip);
		list($pings10, $pingms10, $portcount10, $portarr10) = checker(20000+9001,20000+10000, $ip);
		
		$portcount = $portcount1 + $portcount2 + $portcount3 + $portcount4 + $portcount5 + $portcount6 + $portcount7 + $portcount8 + $portcount9 + $portcount10 + $portcount;
		$portarr = array_merge($portarr, $portarr1, $portarr2, $portarr3, $portarr4, $portarr5, $portarr6, $portarr7, $portarr8, $portarr9, $portarr10); 
		
		list($pings1, $pingms1, $portcount1, $portarr1) = checker(30000+1,30000+1000, $ip);
		list($pings2, $pingms2, $portcount2, $portarr2) = checker(30000+1001,30000+2000, $ip);
		list($pings3, $pingms3, $portcount3, $portarr3) = checker(30000+2001,30000+3000, $ip);
		list($pings4, $pingms4, $portcount4, $portarr4) = checker(30000+3001,30000+4000, $ip);
		list($pings5, $pingms5, $portcount5, $portarr5) = checker(30000+4001,30000+5000, $ip);
		list($pings6, $pingms6, $portcount6, $portarr6) = checker(30000+5001,30000+6000, $ip);
		list($pings7, $pingms7, $portcount7, $portarr7) = checker(30000+6001,30000+7000, $ip);
		list($pings8, $pingms8, $portcount8, $portarr8) = checker(30000+7001,30000+8000, $ip);
		list($pings9, $pingms9, $portcount9, $portarr9) = checker(30000+8001,30000+9000, $ip);
		list($pings10, $pingms10, $portcount10, $portarr10) = checker(30000+9001,30000+10000, $ip);
		
		$portcount = $portcount1 + $portcount2 + $portcount3 + $portcount4 + $portcount5 + $portcount6 + $portcount7 + $portcount8 + $portcount9 + $portcount10 + $portcount;
		$portarr = array_merge($portarr, $portarr1, $portarr2, $portarr3, $portarr4, $portarr5, $portarr6, $portarr7, $portarr8, $portarr9, $portarr10); 
					
		list($pings1, $pingms1, $portcount1, $portarr1) = checker(40000+1,40000+1000, $ip);
		list($pings2, $pingms2, $portcount2, $portarr2) = checker(40000+1001,40000+2000, $ip);
		list($pings3, $pingms3, $portcount3, $portarr3) = checker(40000+2001,40000+3000, $ip);
		list($pings4, $pingms4, $portcount4, $portarr4) = checker(40000+3001,40000+4000, $ip);
		list($pings5, $pingms5, $portcount5, $portarr5) = checker(40000+4001,40000+5000, $ip);
		list($pings6, $pingms6, $portcount6, $portarr6) = checker(40000+5001,40000+6000, $ip);
		list($pings7, $pingms7, $portcount7, $portarr7) = checker(40000+6001,40000+7000, $ip);
		list($pings8, $pingms8, $portcount8, $portarr8) = checker(40000+7001,40000+8000, $ip);
		
		$portcount = $portcount1 + $portcount2 + $portcount3 + $portcount4 + $portcount5 + $portcount6 + $portcount7 + $portcount8 + $portcount9 + $portcount10 + $portcount;
		$portarr = array_merge($portarr, $portarr1, $portarr2, $portarr3, $portarr4, $portarr5, $portarr6, $portarr7, $portarr8, $portarr9, $portarr10); */
		
		$command = "/app/nmap/bin/nmap --version-intensity 0 -v -p U:0,T:20-25,80,443,8080,5800-5950,3389,3399,3398,3378,3387,3397,3379,53,70,113,135,139,389,445,1002,1025,1720 -T5 -sT " . $ip . " 2>&1";

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
		$portcount = 0;
		$preportsarr = $textarr;
		while (true){
			if (count($preportsarr) > 1){
				$str = array_shift($preportsarr);
				if (str_contains($str, "Discovered")){
					$portcount += 1;
					array_push($portarr, $str);
					array_shift($textarr);
				}else{
					break;
				}
			}else{
				break;
			}
		}
		
		print("<p>average ping seconds " . $pings . "s</p><br>");
		print("<p>average ping milliseconds " . $pingms . "ms</p><br>");
		print("<p>port's count: " . $portcount . "</p><br>");
		//var_dump($portarr);
		foreach ($portarr as $value) {
		    	print("<p>" . $value . "</p><br>");
		   	$port = str_replace("/tcp on " . $ip,"",str_replace("Discovered open port ", "", $value));
			$socket = stream_socket_client('tcp://' . $ip . ':' . $port);
			if ($socket) {
			    $sent = stream_socket_sendto($socket, 'message');
			    if ($sent > 0) {
				$server_response = fread($socket, 4096);
				print("<p>Response: " . $server_response . "</p><br>");
				if(str_contains($server_response, "RFB")){
					$command = "vncsnapshot " . $ip . ":" . $port . " ". $ip . "_" . $port . ".jpg 2>&1";
					exec($command, $output, $return_var);
					$img = $ip . "_" . $port . ".jpg";
					print("<img src='" . $img . "'><br>");
				}
			    }
			} else {}
		}
		print("<p>" . end($textarr) . "</p><br>");
	}else{
	  	echo "Not valid ip address.";
	}
}else{
  printl("Error! incorrect token");  
}

?>
