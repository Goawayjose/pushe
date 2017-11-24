<?php

use Illuminate\Http\Request;

Route::get('controller', function () {
	return view('controller');
});

Route::any('/push', function (Request $request) {
	$app_id = '411299';
	$app_key = 'cec231f8de255ff07ffb';
	$app_secret = '90f5193435197dc21310';
	$app_cluster = 'us2';

	$pusher = new Pusher\Pusher( $app_key, $app_secret, $app_id, array('cluster' => $app_cluster));
 	$message = $request->input('message');
 	$color = $request->input('color');
	$text = $request->input('text');

 	$pusher->trigger( 'my-channel', 'my-event', [
 		'message' => $message,
 		'color' => $color,
		'text' => $text
 	]);
});


Route::get('/', function () {

	return view('results');
});
