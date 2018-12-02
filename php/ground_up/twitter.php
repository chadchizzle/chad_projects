<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Twitter API Test (using PHP)</title>
</head>
<body>
<?php

/** 12/2/2018 Author: Chad D. Mills **/
/** Tools: Adobe Brackets + Easy Dev PHP Server ^^/

echo "<h2>Chad's Twitter API Script </h2>";
require_once('TwitterAPIExchange.php');
 
/** Set access tokens/app configuration via https://dev.twitter.com/apps/ **/

$settings = array(
    'oauth_access_token' => "YOUR_OAUTH_ACCESS_TOKEN",
    'oauth_access_token_secret' => "YOUR_OAUTH_ACCESS_TOKEN_SECRET",
    'consumer_key' => "YOUR_CONSUMER_KEY",
    'consumer_secret' => "YOUR_CONSUMER_SECRET"
	
	
/** construct URL variable & string	**/
$url = "https://api.twitter.com/1.1/statuses/user_timeline.json";


/** connect to Twitter API using creditentials **/
 
$requestMethod = "GET";
 
$getfield = '?screen_name=bigchadchizzle&count=20';
 
$twitter = new TwitterAPIExchange($settings);
echo $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();

			 
/** Error Check and or Render Message to Client **/

$string = json_decode($twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest(),$assoc = TRUE);


if(array_key_exists("errors", $string)) {echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>".$string[errors][0]["message"]."</em></p>";exit();}

foreach($string as $items)
    {
        // Do Stuff
    }
?>
	
</body>
</html>