<?php

$ip = $_GET['ip'];
print("<head>");
print("		<link rel='stylesheet' href='s.css'>");
print("		<link rel='icon' type='image/x-icon' href='/images/favicon.ico'>");
print("		<title>SHO.SYS - {$ip}</title>");
print("</head>");

function code_to_country( $code ){

    $code = strtoupper($code);

    $countryList = array(
        'AF' => 'Afghanistan',
        'AX' => 'Aland Islands',
        'AL' => 'Albania',
        'DZ' => 'Algeria',
        'AS' => 'American Samoa',
        'AD' => 'Andorra',
        'AO' => 'Angola',
        'AI' => 'Anguilla',
        'AQ' => 'Antarctica',
        'AG' => 'Antigua and Barbuda',
        'AR' => 'Argentina',
        'AM' => 'Armenia',
        'AW' => 'Aruba',
        'AU' => 'Australia',
        'AT' => 'Austria',
        'AZ' => 'Azerbaijan',
        'BS' => 'Bahamas the',
        'BH' => 'Bahrain',
        'BD' => 'Bangladesh',
        'BB' => 'Barbados',
        'BY' => 'Belarus',
        'BE' => 'Belgium',
        'BZ' => 'Belize',
        'BJ' => 'Benin',
        'BM' => 'Bermuda',
        'BT' => 'Bhutan',
        'BO' => 'Bolivia',
        'BA' => 'Bosnia and Herzegovina',
        'BW' => 'Botswana',
        'BV' => 'Bouvet Island (Bouvetoya)',
        'BR' => 'Brazil',
        'IO' => 'British Indian Ocean Territory (Chagos Archipelago)',
        'VG' => 'British Virgin Islands',
        'BN' => 'Brunei Darussalam',
        'BG' => 'Bulgaria',
        'BF' => 'Burkina Faso',
        'BI' => 'Burundi',
        'KH' => 'Cambodia',
        'CM' => 'Cameroon',
        'CA' => 'Canada',
        'CV' => 'Cape Verde',
        'KY' => 'Cayman Islands',
        'CF' => 'Central African Republic',
        'TD' => 'Chad',
        'CL' => 'Chile',
        'CN' => 'China',
        'CX' => 'Christmas Island',
        'CC' => 'Cocos (Keeling) Islands',
        'CO' => 'Colombia',
        'KM' => 'Comoros the',
        'CD' => 'Congo',
        'CG' => 'Congo the',
        'CK' => 'Cook Islands',
        'CR' => 'Costa Rica',
        'CI' => 'Cote d\'Ivoire',
        'HR' => 'Croatia',
        'CU' => 'Cuba',
        'CY' => 'Cyprus',
        'CZ' => 'Czech Republic',
        'DK' => 'Denmark',
        'DJ' => 'Djibouti',
        'DM' => 'Dominica',
        'DO' => 'Dominican Republic',
        'EC' => 'Ecuador',
        'EG' => 'Egypt',
        'SV' => 'El Salvador',
        'GQ' => 'Equatorial Guinea',
        'ER' => 'Eritrea',
        'EE' => 'Estonia',
        'ET' => 'Ethiopia',
        'FO' => 'Faroe Islands',
        'FK' => 'Falkland Islands (Malvinas)',
        'FJ' => 'Fiji the Fiji Islands',
        'FI' => 'Finland',
        'FR' => 'France, French Republic',
        'GF' => 'French Guiana',
        'PF' => 'French Polynesia',
        'TF' => 'French Southern Territories',
        'GA' => 'Gabon',
        'GM' => 'Gambia the',
        'GE' => 'Georgia',
        'DE' => 'Germany',
        'GH' => 'Ghana',
        'GI' => 'Gibraltar',
        'GR' => 'Greece',
        'GL' => 'Greenland',
        'GD' => 'Grenada',
        'GP' => 'Guadeloupe',
        'GU' => 'Guam',
        'GT' => 'Guatemala',
        'GG' => 'Guernsey',
        'GN' => 'Guinea',
        'GW' => 'Guinea-Bissau',
        'GY' => 'Guyana',
        'HT' => 'Haiti',
        'HM' => 'Heard Island and McDonald Islands',
        'VA' => 'Holy See (Vatican City State)',
        'HN' => 'Honduras',
        'HK' => 'Hong Kong',
        'HU' => 'Hungary',
        'IS' => 'Iceland',
        'IN' => 'India',
        'ID' => 'Indonesia',
        'IR' => 'Iran',
        'IQ' => 'Iraq',
        'IE' => 'Ireland',
        'IM' => 'Isle of Man',
        'IL' => 'Israel',
        'IT' => 'Italy',
        'JM' => 'Jamaica',
        'JP' => 'Japan',
        'JE' => 'Jersey',
        'JO' => 'Jordan',
        'KZ' => 'Kazakhstan',
        'KE' => 'Kenya',
        'KI' => 'Kiribati',
        'KP' => 'Korea',
        'KR' => 'Korea',
        'KW' => 'Kuwait',
        'KG' => 'Kyrgyz Republic',
        'LA' => 'Lao',
        'LV' => 'Latvia',
        'LB' => 'Lebanon',
        'LS' => 'Lesotho',
        'LR' => 'Liberia',
        'LY' => 'Libyan Arab Jamahiriya',
        'LI' => 'Liechtenstein',
        'LT' => 'Lithuania',
        'LU' => 'Luxembourg',
        'MO' => 'Macao',
        'MK' => 'Macedonia',
        'MG' => 'Madagascar',
        'MW' => 'Malawi',
        'MY' => 'Malaysia',
        'MV' => 'Maldives',
        'ML' => 'Mali',
        'MT' => 'Malta',
        'MH' => 'Marshall Islands',
        'MQ' => 'Martinique',
        'MR' => 'Mauritania',
        'MU' => 'Mauritius',
        'YT' => 'Mayotte',
        'MX' => 'Mexico',
        'FM' => 'Micronesia',
        'MD' => 'Moldova',
        'MC' => 'Monaco',
        'MN' => 'Mongolia',
        'ME' => 'Montenegro',
        'MS' => 'Montserrat',
        'MA' => 'Morocco',
        'MZ' => 'Mozambique',
        'MM' => 'Myanmar',
        'NA' => 'Namibia',
        'NR' => 'Nauru',
        'NP' => 'Nepal',
        'AN' => 'Netherlands Antilles',
        'NL' => 'Netherlands the',
        'NC' => 'New Caledonia',
        'NZ' => 'New Zealand',
        'NI' => 'Nicaragua',
        'NE' => 'Niger',
        'NG' => 'Nigeria',
        'NU' => 'Niue',
        'NF' => 'Norfolk Island',
        'MP' => 'Northern Mariana Islands',
        'NO' => 'Norway',
        'OM' => 'Oman',
        'PK' => 'Pakistan',
        'PW' => 'Palau',
        'PS' => 'Palestinian Territory',
        'PA' => 'Panama',
        'PG' => 'Papua New Guinea',
        'PY' => 'Paraguay',
        'PE' => 'Peru',
        'PH' => 'Philippines',
        'PN' => 'Pitcairn Islands',
        'PL' => 'Poland',
        'PT' => 'Portugal, Portuguese Republic',
        'PR' => 'Puerto Rico',
        'QA' => 'Qatar',
        'RE' => 'Reunion',
        'RO' => 'Romania',
        'RU' => 'Russian Federation',
        'RW' => 'Rwanda',
        'BL' => 'Saint Barthelemy',
        'SH' => 'Saint Helena',
        'KN' => 'Saint Kitts and Nevis',
        'LC' => 'Saint Lucia',
        'MF' => 'Saint Martin',
        'PM' => 'Saint Pierre and Miquelon',
        'VC' => 'Saint Vincent and the Grenadines',
        'WS' => 'Samoa',
        'SM' => 'San Marino',
        'ST' => 'Sao Tome and Principe',
        'SA' => 'Saudi Arabia',
        'SN' => 'Senegal',
        'RS' => 'Serbia',
        'SC' => 'Seychelles',
        'SL' => 'Sierra Leone',
        'SG' => 'Singapore',
        'SK' => 'Slovakia (Slovak Republic)',
        'SI' => 'Slovenia',
        'SB' => 'Solomon Islands',
        'SO' => 'Somalia, Somali Republic',
        'ZA' => 'South Africa',
        'GS' => 'South Georgia and the South Sandwich Islands',
        'ES' => 'Spain',
        'LK' => 'Sri Lanka',
        'SD' => 'Sudan',
        'SR' => 'Suriname',
        'SJ' => 'Svalbard & Jan Mayen Islands',
        'SZ' => 'Swaziland',
        'SE' => 'Sweden',
        'CH' => 'Switzerland, Swiss Confederation',
        'SY' => 'Syrian Arab Republic',
        'TW' => 'Taiwan',
        'TJ' => 'Tajikistan',
        'TZ' => 'Tanzania',
        'TH' => 'Thailand',
        'TL' => 'Timor-Leste',
        'TG' => 'Togo',
        'TK' => 'Tokelau',
        'TO' => 'Tonga',
        'TT' => 'Trinidad and Tobago',
        'TN' => 'Tunisia',
        'TR' => 'Turkey',
        'TM' => 'Turkmenistan',
        'TC' => 'Turks and Caicos Islands',
        'TV' => 'Tuvalu',
        'UG' => 'Uganda',
        'UA' => 'Ukraine',
        'AE' => 'United Arab Emirates',
        'GB' => 'United Kingdom',
        'US' => 'United States of America',
        'UM' => 'United States Minor Outlying Islands',
        'VI' => 'United States Virgin Islands',
        'UY' => 'Uruguay, Eastern Republic of',
        'UZ' => 'Uzbekistan',
        'VU' => 'Vanuatu',
        'VE' => 'Venezuela',
        'VN' => 'Vietnam',
        'WF' => 'Wallis and Futuna',
        'EH' => 'Western Sahara',
        'YE' => 'Yemen',
        'ZM' => 'Zambia',
        'ZW' => 'Zimbabwe'
    );

    if( !$countryList[$code] ) return $code;
    else return $countryList[$code];
}

function getAsnFromIP($ip){
        $query = 'whois -h whois.cymru.com " -f ' . (string) $ip . '"';
        $whoisResult = shell_exec($query);
        $asnArray = explode('|', $whoisResult);
        $cleanAsn = array_map('trim', $asnArray);
        return $cleanAsn;
}

$token = str_replace('"', '', $_GET['auth']);
$tokenold = $token;
$token = md5($token);
if ($token == "d2555ef8faa2788ebb5434b6dc9955cd" or $token == "9e78c5c20b172e66f75779d35040796a"){
	if(filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
		
		$command = "/app/nmap/bin/nmap -v -Pn -p U:0,T:20-25,80,443,8080,5900-5950,3389,3399,3398,3378,3387,3397,3379,53,70,113,135,139,389,445,1002,1025,1720 -T5 -sT " . $ip . " 2>&1";
		var_dump($command);
		exec($command, $output, $return_var);
		var_dump($output);
		$textarr = $output;
		$portarr = array("");
		$portresparr = array("");
		array_shift($portarr);
		array_shift($portresparr);
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
		//print("<p>Average ping seconds " . $pings . "s</p><br>");
		//print("<p>Average ping milliseconds " . $pingms . "ms</p><br>");
		//print("<p>Port's count: " . $portcount . "</p><br>");
		//var_dump($portarr);
		foreach ($portarr as $value) {
		   	$port = str_replace("/tcp on " . $ip,"",str_replace("Discovered open port ", "", $value));
			//print("<p>tcp://" . $ip . ":" . $port . "</p><br>");
			$socket = stream_socket_client('tcp://' . $ip . ':' . $port);
			if ($socket) {
			    $server_response = fread($socket, 8192);
			    $all="<div class='portresponse'><div class='portresponsehead'><p style='color: #444!important; text-transform: uppercase;'>// <strong>" . $port . "</strong> / TCP</p><br></div><div class='portresponsebody card card-padding'><p>" . $server_response . "</p><br></div></div>";
			    array_push($portresparr, $all);
			} else {}
		}
		$asn = getAsnFromIP($ip)[0];
		$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
		$loc = explode(",", $details->loc);
		print("<div class='map'><div style='padding: 5px 25px 5px 5px; height: 4%; position: absolute; background: black; top: 4%;'><img src='/images/favicon.ico' style='height: 4vh; display: inline-block;'></img><p style='vertical-align: 13; display: inline-block; font-size: 20px; color: white; position: relative; left: 10px;'>SHO.SYS</p><form action='/index.php' style='display: inline-block;left: 20px;position: relative;bottom: 15px; height: 100%;' method='GET'><div class='searchbox'><div class='input-wrapper'><label for='search-query' value='Enter search query' class='visually-hidden'></label><input type='hidden' name='auth' value='{$tokenold}'><input type='text' name='ip' placeholder='Enter IP...' id='search-query'><button type='submit' aria-label='Submit search querxy' data-balloon-disable='data-balloon-disable' class='button-red'><svg class='svg-inline--fa fa-search fa-w-16 fa-fw' aria-hidden='true' focusable='false' data-prefix='fas' data-icon='search' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512' data-fa-i2svg=''><path fill='currentColor' d='M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z'></path></svg><!-- <i class='fas fa-search  fa-fw '></i> Font Awesome fontawesome.com --></button></div></div></form></div><div style='padding: 5px; position: absolute; background: black; top: 17%;'><p style='font-size: 30px; color: white;'>{$ip}</p></div><iframe style='width: 100%; height: 20%; margin-bottom: 5px;' src='https://api.maptiler.com/maps/hybrid/?key=JbVUUx31lOPoXakQzYBc#1.0/" . $loc[0] . "/" . $loc[1] . "'></iframe></dev>");
		
		print("<div class='left'>");
		print("<div class='geninfo card card-yellow card-padding'><img src='earth.jpg' style='width: 30px; height: 30px;'><p style='font-weight: normal; margin-bottom: 20px; font-size: 20px; '><strong>General</strong> Information</p>");
		print("<table><tbody>");
		print("<tr><td>Country: " . code_to_country($details->country) . "</p><br></tr></td>");
		print("<tr><td>City: " . $details->city . "</p><br></tr></td");
		print("<tr><td>Org: " . $details->org . "</p><br></tr></td");
		if ($asn != ""){
			print("<tr><td>ASN: " . $asn . "</p><br></tr></td>");
		} else {}
		print("</tbody></table>");
		print("</div>");
		print("</div>");
		print("<div class='right'>");
		print("<div class='portlist card card-light-blue card-padding'>");
		print("<img src='Ports.png' style='width: 30px; height: 30px;'><p style='font-weight: normal; font-size: 20px; '>Open <strong>Ports</strong></p>");
		//foreach ($portarr as $value) {
		//	$port = str_replace("/tcp on " . $ip,"",str_replace("Discovered open port ", "", $value));
		//	print("<div class='portblock'><p style='color: white; font-weight: normal; font-size: 14px; '>" . $port . "</p></div>");
		//}
		print("</div>");
		print("<div class='portrestlist'>");
		foreach ($portresparr as $value) {
			print($value);
		}
		print("</div>");
		print("</div>");
	}else{
	  	echo "Not valid ip address.";
		header( "refresh:5;url=index.php" );
	}
}else{
  print("<form action='/index.php' method='GET'><div class='searchboxf'><div class='input-wrapperf'><label for='search-queryf' value='Enter search query' class='visually-hidden'></label><label for='authf' value='Enter api key' class='visually-hidden'></label><input type='text' name='auth' placeholder='Enter api key' id='authf'><input type='text' name='ip' placeholder='Enter IP...' id='search-queryf'><button type='submit' aria-label='Submit' data-balloon-disable='data-balloon-disable'>Login</button></div></div></form>");
}

?>
