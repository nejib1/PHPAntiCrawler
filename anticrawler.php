<?php
/**
 * PHP Simple ANTI Crawler for your website 
 * Please see the README File first (it's important to see how to use this script)
 * Author : Nejib BEN AHMED
*/
session_start();
$max_calls_per_hour = 500;
$hostname           = gethostbyaddr(getRealIP()); // get the reverse IP from User REAL IP

// Google and Bing bots are authorized to make unlimited calls
if(!strstr($hostname, "google") and !strstr($hostname, "search.msn.com") and !strstr($hostname, "bing")) 
{
	if(isset($_SESSION['calls']))
	{
		$session_content = explode("#", $_SESSION['calls']);
		if(isset($session_content[0]) && isset($session_content[1]))
		{
			$_SESSION['calls'] = date("Ymdh")."#".($session_content[1] + 1);

			// if session older than one hour, reset counter
			if(date("Ymdh") - $session_content[0] > 1) unset($_SESSION['calls']);

			// if more than 500 calls within one hour, this is not normal (only google and bing bots are authorized)
			if($session_content[1] > $max_calls_per_hour)
			{
				if($session_content[1] == $max_calls_per_hour+1) mail("contact@".$_SERVER['HTTP_HOST'], "ATTENTION!! ".$_SERVER['HTTP_HOST']." Is Being Crawled","The Hacker's Reverse Ip is ".$hostname);
				die('Your IP has been identified as illegal crawler. We will take all legal measures against you.');
			}
		}
	}
	else $_SESSION['calls'] = date("Ymdh")."#1"; // if first visit (no session yet) create it
}

function getRealIP()
{
    // Get real visitor IP behind Clouds or Proxies
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"]))
    {
		$_SERVER['REMOTE_ADDR']    = $_SERVER["HTTP_CF_CONNECTING_IP"];
		$_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }

    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if     (filter_var($client, FILTER_VALIDATE_IP))  return $client;
    elseif (filter_var($forward, FILTER_VALIDATE_IP)) return $forward;
    else                                              return $remote;
}

?>
