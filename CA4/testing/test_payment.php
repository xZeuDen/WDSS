<?php

use classes\Payment;

require_once '../Payment.php';

$payment = new Payment();

$payment->setPaymentID(11);
$payment->setBookingID(11);
$payment->setAmount(199.00);
$payment->setPaymentDate('2025-02-29');
$payment->setPaymentStatus('Pending');

echo ($payment->getPaymentID() === 11) ? "Payment id Passed<br>" : "Payment ID Failed<br>";
echo ($payment->getBookingID() === 11) ? "Booking ID Passed<br>" : "Booking ID Failed<br>";
echo ($payment->getAmount() === 199.00) ? "Payment amount Passed<br>" : "Payment amount Failed<br>";
echo ($payment->getPaymentDate() === '2025-02-29') ? "Payment Date Passed<br>" : "Payment Date Failed<br>";
echo ($payment->getPaymentStatus() === 'Pending') ? "Payment Status Passed<br>" : "Payment Status Failed<br>";
?>
