<?php

if (isset($_COOKIE['test'])) {
	echo 'Есть, значение: ' . $_COOKIE['test'];
} else {
	echo 'Нет';
}
