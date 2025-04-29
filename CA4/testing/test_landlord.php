<?php

use classes\Landlord;

require_once '../Landlord.php';

$landlord = new Landlord();

$landlord->setLandlordID(10);
$landlord->setLandlordFirstName('Bogdan');
$landlord->setLandlordLastName('Maftei');
$landlord->setLandlordEmail('bada12@yahoo.com');
$landlord->setLandlordPhone('0852686755');
$landlord->setLandlordPassword('pass');

echo ($landlord->getLandlordID() === 10) ? "ID Test Passed<br>" : "ID Test Failed<br>";
echo ($landlord->getLandlordFirstName() === 'Bogdan') ? "First NameTest Passed<br>" : "First Name Test Failed<br>";
echo ($landlord->getLandlordLastName() === 'Maftei') ? "Last Name Test Passed<br>" : "Last Name Test Failed<br>";
echo ($landlord->getLandlordEmail() === 'bada12@yahoo.com') ? "Email Test Passed<br>" : "Email Test Failed<br>";
echo ($landlord->getLandlordPhone() === '0852686755') ? "Phone Test Passed<br>" : " Phone Test Failed<br>";
echo ($landlord->getLandlordPassword() === 'pass') ? "Password Test Passed<br>" : "Password Test Failed<br>";
?>
