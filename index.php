<?php
require_once 'autoload.php';

use Classes\Developer\Developer; 
use Classes\Tester\Tester as CurrentTester;
use Classes\User\User as CurrentUser;


$my_dev = new Developer(1, 'John', 'Doe');
$my_tester = new CurrentTester(2, 'Vasiliy', 'Клік');
$my_user = new CurrentUser(3, 'user', 'user');

var_dump($my_dev);
echo '<br>';
var_dump($my_tester);
echo '<br>';
var_dump($my_user);