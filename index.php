<?php
require 'vendor/autoload.php';

use Kreait\Firebase\Configuration;
use Kreait\Firebase\Firebase;


$databaseUri 	= 'https://fir-realtime-e9a30.firebaseio.com';
$secret 		= 'TMNoYQdPXanf3lRRsqNksPwgSzzlA1EEzcdJUFn3';

$config = new Configuration();
$config->setFirebaseSecret($secret);

$firebase = new Firebase($databaseUri, $config);
$dateTime = new DateTime();

while(true){
	$firebase->set([ 'point' => rand(10,1000) ], '/points/1');
	$firebase->set([ 'point' => rand(10,1000) ], '/points/2');
	$firebase->set([ 'point' => rand(10,1000) ], '/points/3');
	$firebase->set([ 'point' => rand(10,1000) ], '/points/4');
	$firebase->set([ 'point' => rand(10,1000) ], '/points/5');
	$firebase->set([ 'point' => rand(10,1000) ], '/points/100');
	$firebase->set([ 'point' => rand(10,1000) ], '/points/200');
	$firebase->set([ 'point' => rand(10,1000) ], '/points/300');
	$firebase->set([ 'point' => rand(10,1000) ], '/points/400');
	$firebase->set([ 'point' => rand(10,1000) ], '/points/500');
	sleep(1);
}