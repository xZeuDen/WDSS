<?php

require_once '../lib/functions.php';
require_once '../lib/db.php';
session_start();

if (!isset($_SESSION['landlordID'])) {
    echo "You need to be logged in to add a property.";
    exit;
}

// Get the landlord ID from session
$landlordID = $_SESSION['landlordID'];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? null;
    $address = $_POST['address'] ?? null;
    $propertyType = $_POST['propertyType'] ?? null;
    $dateAdded = date('Y-m-d');
    $email = $_POST['email'] ?? null;
    $description = $_POST['description'] ?? null;
    $maxGuests = $_POST['maxGuests'] ?? null;
    $price_per_night = $_POST['price_per_night'] ?? null;
    $availability = $_POST['availability'] ?? null;

    // Validation: Check if price per night is 0
    if ($price_per_night == 0) {
        echo "Price per night cannot be 0.";
        exit;
    }

    // Handle the file upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $imageTmpPath = $_FILES['image']['tmp_name'];
        $imageName = $_FILES['image']['name'];
        $imageUploadDir = '../uploads/';
        $imagePath = $imageUploadDir . basename($imageName);

        // Move uploaded file to directory
        if (move_uploaded_file($imageTmpPath, $imagePath)) {
            // Add the property to the database, including the image path
            $propertyID = add_house_to_database($landlordID, $title, $address, $price_per_night, $propertyType, $availability, $email, $description, $imagePath, $maxGuests);

            // Check if property was added successfully
            if ($propertyID) {
                echo "Property added successfully!";
            } else {
                echo "Error adding property.";
            }
        } else {
            echo "Error uploading the image.";
        }
    } else {
        echo "No image uploaded or an error occurred with the file.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Property</title>
    <link rel="stylesheet" href="../css/addyours.css">
    <link rel="stylesheet" href="../css/navbar.css">
</head>
<body>

<?php include('../layout/header.php'); ?>

<div class="container">
    <h1>Add a New Property</h1>

    <form action="addyours.php" method="POST" enctype="multipart/form-data">

        <label for="title">Property Title:</label>
        <input type="text" name="title" required>

        <label for="address">Property Address:</label>
        <input type="text" name="address" required>

        <label for="propertyType">Property Type:</label>
        <input type="text" name="propertyType" required>

        <label for="email">Email Address:</label>
        <input type="email" name="email" required>

        <label for="description">Description:</label>
        <textarea name="description" required></textarea>

        <label for="price_per_night">Price Per Night:</label>
        <input type="number" name="price_per_night" required>

        <label for="availability">Availability Date:</label>
        <input type="date" name="availability" required>

        <label for="image">Property Image:</label>
        <input type="file" name="image" required>

        <label for="maxGuests">Max Guests:</label>
        <input type="number" name="maxGuests" required>

        <button type="submit">Add Property</button>
    </form>
</div>

</body>
</html>
