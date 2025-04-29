<?php
require_once 'db.php';

// Function to get a PDO connection
function get_connection() {
    $config = require 'config.php';

    try {
        // Create and return a PDO instance
        $pdo = new PDO(
            $config['database_dsn'],
            $config['database_user'],
            $config['database_pass']
        );

        // Set PDO to throw exceptions on errors
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        // Handle connection errors
        echo "Connection failed: " . $e->getMessage();
        exit; // Stop the script if connection fails
    }
}

// Function to get all houses/properties
function get_houses() {
    $pdo = get_connection();
    $stmt = $pdo->query('SELECT * FROM properties');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function add_house_to_database($landlordID, $title, $property_address, $price_per_night, $propertyType, $availability, $email, $description, $image, $maxGuests) {
    // Create a new instance of the Database class and get the connection
    $db = new Database();
    $pdo = $db->getConnection();


    $sql = "INSERT INTO properties (landlordID, title, property_address, price_per_night, property_type, availability, email, property_description, image, max_guests) 
            VALUES (:landlordID, :title, :property_address, :price_per_night, :propertyType, :availability, :email, :description, :image, :maxGuests)";
    $stmt = $pdo->prepare($sql);

    // Bind parameters to the SQL query
    $stmt->bindParam(':landlordID', $landlordID);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':property_address', $property_address);
    $stmt->bindParam(':price_per_night', $price_per_night);
    $stmt->bindParam(':propertyType', $propertyType);
    $stmt->bindParam(':availability', $availability);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':maxGuests', $maxGuests);

    // Execute the query and return the last inserted ID if successful
    if ($stmt->execute()) {
        return $pdo->lastInsertId();  // Return the last inserted ID
    } else {
        return false; // Return false if the query fails
    }
}



// Function to get a specific house by property ID
function get_house($propertyID) {
    $pdo = get_connection();
    $stmt = $pdo->prepare('SELECT * FROM properties WHERE propertyID = :propertyID');
    $stmt->execute(['propertyID' => $propertyID]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Function to add a booking to the database
function add_booking_to_database($userID, $propertyID, $checkin_date, $checkout_date, $total_price) {
    $pdo = get_connection();

    $sql = 'INSERT INTO booking (booking_userID, booking_propertyID, check_in, check_out, total_price, status)
            VALUES (:userID, :propertyID, :checkin_date, :checkout_date, :total_price, "pending")';

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':userID' => $userID,
        ':propertyID' => $propertyID,
        ':checkin_date' => $checkin_date,
        ':checkout_date' => $checkout_date,
        ':total_price' => $total_price
    ]);

    // Return the last inserted booking ID
    return $pdo->lastInsertId();
}

function get_booking($bookingID) {
    $pdo = get_connection();
    $stmt = $pdo->prepare("SELECT b.bookingID, b.check_in, b.check_out, b.total_price, p.title, p.max_guests
                           FROM booking b
                           JOIN properties p ON b.booking_propertyID = p.propertyID
                           WHERE b.bookingID = :bookingID");
    $stmt->execute([':bookingID' => $bookingID]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

?>
