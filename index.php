<?php
require 'vendor/autoload.php';

//$firebase = Firebase::fromServiceAccount(__DIR__.'/fir-realtime-e9a30-firebase-adminsdk-ba300-1e97c922b6.json');
$dateTime = new DateTime();
//server/saving-data/fireblog/posts
$databaseUri 	= 'https://fir-realtime-e9a30.firebaseio.com';
$secret 		= 'TMNoYQdPXanf3lRRsqNksPwgSzzlA1EEzcdJUFn3';
$firebase = Firebase::fromDatabaseUriAndSecret($databaseUri, $secret);

$database = $firebase->getDatabase();

//$newPost = $database->getReference('/points')->push([ 'point' => 100 ]);

while(true){
	$newPost = $database->getReference('/points')->set([
	   'point' => (!empty($_REQUEST['point']) ? $_REQUEST['point'] : rand(10,1000))
	]);
	sleep(1);
}


//$db->getReference('config/website/name')->set('New name');

//$firebase->set(DEFAULT_PATH . '/' . $dateTime->format('c'), $test);

print_r($newPost);

//$newPost->getKey(); // => -KVr5eu8gcTv7_AHb-3-
//$newPost->getUri(); // => https://my-project.firebaseio.com/blog/posts/-KVr5eu8gcTv7_AHb-3-

//$newPost->getChild('title')->set('Changed post title');
//$newPost->getValue(); // Fetches the data from the realtime database
//$newPost->remove();