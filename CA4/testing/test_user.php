<?php

use classes\User;

require_once '../User.php';

$user = new User();

$user->setUserID(1);
$user->setUserFirstName('Alex');
$user->setUserLastName('Smith');
$user->setUserPhoneNumber('0987654222');
$user->setUserEmail('alex.smith@yahoo.com');
$user->setUserPassword('1234');

echo ($user->getUserID() === 1) ? "ID Test Passed<br>" : "ID Test Failed<br>";
echo ($user->getUserFirstName() === 'Alex') ? "FName Test Passed<br>" : "FName Test Failed<br>";
echo ($user->getUserLastName() === 'Smith') ? "LName Test Passed<br>" : "LName Test Failed<br>";
echo ($user->getUserPhoneNumber() === '0987654222') ? "Phone Test Passed<br>" : "Phone Test Failed<br>";
echo ($user->getUserEmail() === 'alex.smith@yahoo.com') ? "Email Test Passed<br>" : "Email Test Failed<br>";
echo ($user->getUserPassword() === '1234') ? "Password Test Passed<br>" : "Password Test Failed<br>";
?>
