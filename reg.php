<?php

$s = 'key:value';

preg_match('#^([a-zA-Z-.]+)@([a-z]+\.[a-z]{2,3})$#', 'my-mail@mail.ru', $matches);

var_dump($matches);
