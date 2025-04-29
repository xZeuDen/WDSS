<?php

class Payment
{
    private $paymentID;
    private $bookingID;
    private $amount;
    private $paymentDate;
    private $paymentStatus;

    public function __construct()
    {
    }

    // Getters
    public function getPaymentID()
    {
        return $this->paymentID;
    }

    public function getBookingID()
    {
        return $this->bookingID;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getPaymentDate()
    {
        return $this->paymentDate;
    }

    public function getPaymentStatus()
    {
        return $this->paymentStatus;
    }

    // Setters
    public function setPaymentID($paymentID)
    {
        $this->paymentID = $paymentID;
    }

    public function setBookingID($bookingID)
    {
        $this->bookingID = $bookingID;
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    public function setPaymentDate($paymentDate)
    {
        $this->paymentDate = $paymentDate;
    }

    public function setPaymentStatus($paymentStatus)
    {
        $this->paymentStatus = $paymentStatus;
    }
}

?>
