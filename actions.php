<?php

require_once __DIR__ . '/classes/Form.php';
require_once __DIR__ . '/classes/EmailFormField.php';
require_once __DIR__ . '/classes/PasswordFormField.php';

error_reporting(E_ALL);
ini_set('display_errors', true);

define('USERS_FILENAME', __DIR__ . '/users.txt');

$form = new Form('post');
$form->addField(new FormField('Имя', 'first_name'));
$form->addField(new FormField('Фамилия', 'last_name'));
$form->addField(new EmailFormField('Email', 'email'));
$form->addField(new PasswordFormField('Пароль', 'password'));

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	processRequest();
}

function processRequest()
{
	global $form;

	$isValid = $form->processRequest();

	if ($isValid) {
		//saveUser();
		header('Location: done.html');
		exit();
	}
}

function saveUser()
{
	global $data;

	$file = fopen(USERS_FILENAME, 'a');
	fputs($file, implode("\t", $data) . "\n");
	fclose($file);
}

