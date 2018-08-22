<?php

spl_autoload_register(function ($class) {
	$path = __DIR__ . '/classes/' . str_replace('\\', '/', $class). '.php';
	include $path;
});

error_reporting(E_ALL);
ini_set('display_errors', true);

$pdo = new PDO('mysql:host=localhost;dbname=test;charset=UTF8', 'root', 'root');
