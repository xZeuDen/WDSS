<?php

class Booking
{
    private $db;
    private $bookingID;
    private $userID;
    private $propertyID;
    private $checkin;
    private $checkout;
    private $totalPrice;
    private $status;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // Getters
    public function getBookingID()
    {
        return $this->bookingID;
    }

    public function getUserID()
    {
        return $this->userID;
    }

    public function getPropertyID()
    {
        return $this->propertyID;
    }

    public function getCheckin()
    {
        return $this->checkin;
    }

    public function getCheckout()
    {
        return $this->checkout;
    }

    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    public function getStatus()
    {
        return $this->status;
    }

    // Setters
    public function setUserID($userID)
    {
        $this->userID = $userID;
    }

    public function setPropertyID($propertyID)
    {
        $this->propertyID = $propertyID;
    }

    public function setCheckin($checkin)
    {
        $this->checkin = $checkin;
    }

    public function setCheckout($checkout)
    {
        $this->checkout = $checkout;
    }

    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    // Create a new booking
    public function create($userID, $propertyID, $checkin, $checkout, $totalPrice)
    {
        $query = "INSERT INTO booking (booking_userID, booking_propertyID, check_in, check_out, total_price, status) 
                  VALUES (:userID, :propertyID, :checkin, :checkout, :totalPrice, 'pending')";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':userID', $userID);
        $stmt->bindParam(':propertyID', $propertyID);
        $stmt->bindParam(':checkin', $checkin);
        $stmt->bindParam(':checkout', $checkout);
        $stmt->bindParam(':totalPrice', $totalPrice);
        $stmt->execute();
        return $this->db->lastInsertId();  // return ID of inserted booking
    }

    // Retrieve a single booking by ID (with property title)
    public function readOne($id)
    {
        $query = "SELECT b.*, p.title AS property_title 
                  FROM bookings b 
                  JOIN properties p ON b.booking_propertyID = p.propertyID 
                  WHERE b.bookingID = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ?: null;
    }

    // Retrieve all bookings
    public function readAll()
    {
        $query = "SELECT * FROM booking";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Update booking status
    public function updateStatus($bookingID, $newStatus)
    {
        $query = "UPDATE booking SET status = :status WHERE bookingID = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':status', $newStatus);
        $stmt->bindParam(':id', $bookingID);
        return $stmt->execute();
    }
}

?>
