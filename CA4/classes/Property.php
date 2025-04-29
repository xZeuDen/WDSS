<?php

class Property
{
    private $db;
    private $propertyID;
    private $landlordID;
    private $title;
    private $description;
    private $address;
    private $pricePerNight;
    private $maxGuests;
    private $image;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // Getters
    public function getPropertyID()
    {
        return $this->propertyID;
    }

    public function getLandlordID()
    {
        return $this->landlordID;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getPricePerNight()
    {
        return $this->pricePerNight;
    }

    public function getMaxGuests()
    {
        return $this->maxGuests;
    }

    public function getImage()
    {
        return $this->image;
    }

    // Setters
    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function setPricePerNight($pricePerNight)
    {
        $this->pricePerNight = $pricePerNight;
    }

    public function setMaxGuests($maxGuests)
    {
        $this->maxGuests = $maxGuests;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    // Create a new property
    public function create($landlordID, $title, $description, $address, $pricePerNight, $maxGuests, $image)
    {
        $query = "INSERT INTO properties (property_landlordID, title, property_description, property_address, price_per_night, max_guests, image) 
                  VALUES (:landlordID, :title, :description, :address, :pricePerNight, :maxGuests, :image)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':landlordID', $landlordID);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':pricePerNight', $pricePerNight);
        $stmt->bindParam(':maxGuests', $maxGuests);
        $stmt->bindParam(':image', $image);
        return $stmt->execute();
    }

    // Retrieve a single property by ID
    public function readOne($id)
    {
        $query = "SELECT * FROM properties WHERE propertyID = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result : null;
    }

    // Retrieve all properties
    public function readAll()
    {
        $query = "SELECT * FROM properties";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Update property details
    public function update($id, $landlordID, $title, $description, $address, $pricePerNight, $maxGuests, $image)
    {
        $query = "UPDATE properties SET landlordID = :landlordID, title = :title, property_description = :description, 
              property_address = :address, price_per_night = :pricePerNight, max_guests = :maxGuests, image = :image 
              WHERE propertyID = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':landlordID', $landlordID);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':pricePerNight', $pricePerNight);
        $stmt->bindParam(':maxGuests', $maxGuests);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }


    // Delete property
    public function delete($id)
    {
        $query = "DELETE FROM properties WHERE propertyID = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function checkBookings($propertyID)
    {
        $query = "SELECT COUNT(*) FROM booking WHERE booking_propertyID = :propertyID";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':propertyID', $propertyID);
        $stmt->execute();
        return $stmt->fetchColumn();  // Returns the count of bookings
    }

}

?>
