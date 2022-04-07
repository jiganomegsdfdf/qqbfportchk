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
			$command = "/app/nmap/bin/nmap -v -p 0-1000 -T5 -sT " . $ip . " 2>&1";

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
		$pings1 = explode("s elapsed",explode(", ", $str)[1])[0];
		$pingms1 = explode("s elapsed",explode(", ", $str)[1])[0]*1000;

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
		
		$command = "/app/nmap/bin/nmap -v -p 1001-2000 -T5 -sT " . $ip . " 2>&1";

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
		$pings2 = explode("s elapsed",explode(", ", $str)[1])[0];
		$pingms2 = explode("s elapsed",explode(", ", $str)[1])[0]*1000;

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
		
		$command = "/app/nmap/bin/nmap -v -p 2001-3000 -T5 -sT " . $ip . " 2>&1";

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
		$pings3 = explode("s elapsed",explode(", ", $str)[1])[0];
		$pingms3 = explode("s elapsed",explode(", ", $str)[1])[0]*1000;

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
		
		$command = "/app/nmap/bin/nmap -v -p 3001-4000 -T5 -sT " . $ip . " 2>&1";

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
		$pings4 = explode("s elapsed",explode(", ", $str)[1])[0];
		$pingms4 = explode("s elapsed",explode(", ", $str)[1])[0]*1000;

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
		
		$command = "/app/nmap/bin/nmap -v -p 4001-5000 -T5 -sT " . $ip . " 2>&1";

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
		$pings5 = explode("s elapsed",explode(", ", $str)[1])[0];
		$pingms5 = explode("s elapsed",explode(", ", $str)[1])[0]*1000;

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
		
		$command = "/app/nmap/bin/nmap -v -p 5001-6000 -T5 -sT " . $ip . " 2>&1";

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
		$pings6 = explode("s elapsed",explode(", ", $str)[1])[0];
		$pingms6 = explode("s elapsed",explode(", ", $str)[1])[0]*1000;

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
		
		$command = "/app/nmap/bin/nmap -v -p 6001-7000 -T5 -sT " . $ip . " 2>&1";

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
		$pings7 = explode("s elapsed",explode(", ", $str)[1])[0];
		$pingms7 = explode("s elapsed",explode(", ", $str)[1])[0]*1000;

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
		
		$command = "/app/nmap/bin/nmap -v -p 7001-8000 -T5 -sT " . $ip . " 2>&1";

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
		$pings8 = explode("s elapsed",explode(", ", $str)[1])[0];
		$pingms8 = explode("s elapsed",explode(", ", $str)[1])[0]*1000;

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
		
		$command = "/app/nmap/bin/nmap -v -p 8001-9000 -T5 -sT " . $ip . " 2>&1";

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
		$pings9 = explode("s elapsed",explode(", ", $str)[1])[0];
		$pingms9 = explode("s elapsed",explode(", ", $str)[1])[0]*1000;

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
		
		$command = "/app/nmap/bin/nmap -v -p 9001-10000 -T5 -sT " . $ip . " 2>&1";

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
		$pings10 = explode("s elapsed",explode(", ", $str)[1])[0];
		$pingms10 = explode("s elapsed",explode(", ", $str)[1])[0]*1000;

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
		
		$pings = $pings1 + $pings2 + $pings3 + $pings4 + $pings5 + $pings6 + $pings7 + $pings8 + $pings9 + $pings10;
		$pings = $pings / 10;
		
		$pingms = $pingms1 + $pingms2 + $pingms3 + $pingms4 + $pingms5 + $pingms6 + $pingms7 + $pingms8 + $pingms9 + $pingms10;
		$pingms = $pingms / 10;
		
		print("<p>ping seconds" . $pings . "s</p><br>");
		print("<p>ping milliseconds" . $pingms . "ms</p><br>");
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
