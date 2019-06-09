<?php
require __DIR__.'/../bibleexchange/bootstrap/autoload.php';
$app = require_once __DIR__.'/../bibleexchange/bootstrap/app.php';
$kernel = $app->make('Illuminate\Contracts\Http\Kernel');
$response = $kernel->handle(
	$request = Illuminate\Http\Request::capture()
);
$response->send();
$kernel->terminate($request, $response);