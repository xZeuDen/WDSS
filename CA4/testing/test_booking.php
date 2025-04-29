<?php

use classes\Booking;

require_once '../Booking.php';

$booking = new Booking(null);

$booking->setUserID(1);
$booking->setPropertyID(10);
$booking->setCheckin('2025-05-08');
$booking->setCheckout('2025-05-13');
$booking->setTotalPrice(960.00);
$booking->setStatus('pending');

echo ($booking->getUserID() === 1) ? "User passed<br>" : "User Failed<br>";
echo ($booking->getPropertyID() === 10) ? "Property ID passed<br>" : "Property ID Failed<br>";
echo ($booking->getCheckin() === '2025-05-08') ? "Check-in passed<br>" : "Check-in Failed<br>";
echo ($booking->getCheckout() === '2025-05-13') ? "Check-out passed<br>" : "Check-out Failed<br>";
echo ($booking->getTotalPrice() === 960.00) ? "Total Price passed<br>" : "Total Price Failed<br>";
echo ($booking->getStatus() === 'pending') ? "Status Passed<br>" : "Status Failed<br>";
?>
