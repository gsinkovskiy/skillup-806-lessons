<?php

use Entity\User;
use Form\EmailFormField;
use Form\Form;
use Form\FormField;
use Form\PasswordFormField;

require_once __DIR__ . '/init.php';

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
		$values = $form->getValues();
		$user = User::createFromArray($values);
		saveUser($user);
		header('Location: done.html');
		exit();
	}
}

function saveUser(User $user)
{
	$file = fopen(USERS_FILENAME, 'a');
	fputs($file, serialize($user) . "\n");
	fclose($file);
}
