<?php
	/**
		Your Google+ user id, en example is 111120527868392930329
		You can find this by looking at your profile URL, for example
		mine is https://plus.google.com/111120527868392930329/posts
	*/
	$google_user_id = "111120527868392930329";
	
	/**
		To access the API you need an API key, you can sign up for one here
		https://code.google.com/apis/console/
		
		Visit that page and click on "API Access" on the left side.
		Then click on "Services" on the left side and select "Google+ API"
	*/
	$google_api_key = "API_KEY";
	
	/**
		To change the URLS of your page links such as Facebook, Twitter, etc 
		all you have to do is edit the /js/main.js file and change the URL in the "services_array"
	*/
	
	/**
		You do not need to edit anything below this line.
		The following will GET information about you from your Google+ profile
	*/
	$urlStructure = "https://www.googleapis.com/plus/v1/people/" . $google_user_id . "?key=". $google_api_key . "&userIp=" . $_SERVER['REMOVE_ADDR'];
	$response = json_decode(file_get_contents($urlStructure), true);
	
	$name = $response['displayName'];
	$aboutMe = $response['aboutMe'];
	$profilePhoto = $response['image']['url'] . "0";
	
	$urlStructure = "https://www.googleapis.com/plus/v1/people/". $google_user_id . "/activities/public?key=" . $google_api_key . "&userIp=" . $_SERVER['REMOVE_ADDR'];
	$response = json_decode(file_get_contents($urlStructure), true);
	
	$recentPost = $response['items'][0]['title'];
	$recentPostLink = $response['items'][0]['url'];
	
	if($recentPost == "")
	{
		$recentPost = "Click here to view my most recent activity on Google+";
		$recentPostLink = "http://plus.google.com/" . $google_user_id;
	}
		
?>
<!DOCTYPE html>
<html>
<head>
    <title><?= $name ?></title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <link rel="stylesheet" href="/css/main.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
    <link href='http://fonts.googleapis.com/css?family=Aclonica&v2' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
    <script type="text/javascript" src="/js/jquery.mousewheel.js"></script>
    <script type="text/javascript" src="/js/jScrollPane.js"></script>
    <script type="text/javascript" src="/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
    <script type="text/javascript" src="/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
</head>

<body>
<div id="main">
    <h1><?= $name ?></h1>
    <div id="bio" class="scroll-pane">
    	<p class="profile_image"><a href="<?= $profilePhoto ?>" id="profile_pic"><img src="<?= $profilePhoto ?>" width="100" alt="<?= $name ?>"></a></p>
         <p class="bio_text"><?= $aboutMe ?></p>
         <p>Recent Google+ post: <a href="<?= $recentPostLink ?>" target="_blank"><?= $recentPost ?></a></p>
    </div>
    <div id="services">
        <ul class="services">
        	<li class="service-icon site_1" rel="twitter">
        		<img class="icon" src="/images/services/twitter-32x32.png" alt="Twitter">
		</li>
		<li class="service-icon site_3" rel="facebook">
        		<img class="icon" src="/images/services/facebook-32x32.png" alt="Facebook">
		</li>
		<li class="service-icon site_4" rel="wordpress">
        		<img class="icon" src="/images/services/wordpress-32x32.png" alt="Blog">
		</li>
		<li class="service-icon site_6" rel="instagram">
        		<img class="icon" src="/images/services/instagram-32x32.png" alt="Instagram">
		</li>
		<li class="service-icon site_7" rel="foursquare">
        		<img class="icon" src="/images/services/foursquare-32x32.png" alt="Foursquare">
		</li>
		<li class="service-icon site_8" rel="google+">
        		<img class="icon" src="/images/services/google+-32x32.png" alt="Google+">
		</li>
		<li class="service-icon site_9" rel="web">
        		<img class="icon" src="/images/services/web-32x32.png" alt="Website">
		</li>
		<li class="service-icon site_10" rel="resume">
        		<img class="icon resume" src="/images/services/resume-32x32.png" alt="Resume">
		</li>
	</ul>
    </div>
</div>
</body>
</html>