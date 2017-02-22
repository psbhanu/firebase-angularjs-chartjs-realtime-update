<?php
require 'vendor/autoload.php';

$dateTime = new DateTime();

$databaseUri 	= 'https://fir-realtime-e9a30.firebaseio.com';
$secret 		= 'TMNoYQdPXanf3lRRsqNksPwgSzzlA1EEzcdJUFn3';
$firebase = Firebase::fromDatabaseUriAndSecret($databaseUri, $secret);

$database = $firebase->getDatabase();

while(true){
	$newPost = $database->getReference('/points/1')->set([
	   'point' => rand(10,1000)
	]);
	$newPost = $database->getReference('/points/2')->set([
	   'point' => rand(10,1000)
	]);
	$newPost = $database->getReference('/points/3')->set([
	   'point' => rand(10,1000)
	]);
	$newPost = $database->getReference('/points/4')->set([
	   'point' => rand(10,1000)
	]);
	$newPost = $database->getReference('/points/5')->set([
	   'point' => rand(10,1000)
	]);
	$newPost = $database->getReference('/points/100')->set([
	   'point' => rand(10,1000)
	]);
	$newPost = $database->getReference('/points/200')->set([
	   'point' => rand(10,1000)
	]);
	$newPost = $database->getReference('/points/300')->set([
	   'point' => rand(10,1000)
	]);
	$newPost = $database->getReference('/points/400')->set([
	   'point' => rand(10,1000)
	]);
	$newPost = $database->getReference('/points/500')->set([
	   'point' => rand(10,1000)
	]);
	sleep(1);
}