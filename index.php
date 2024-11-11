<?php
require_once 'CustomAutoload.php';

use Classes\User\User;
use Classes\CustomException\BadMethodRequest;

$my_user = new User();
$my_user->setName('Misha');
$my_user->setAge(23);

echo '<br>';
var_dump($my_user->getName());
echo '<br>';
var_dump($my_user->getAge());
echo '<br>';
var_dump($my_user->getAll());
echo '<br>';
$my_user->getEmail();
echo '<br>';
$my_user->setEmail('my@ukr.net');

