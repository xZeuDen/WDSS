<?php
require_once '../lib/functions.php';
require_once '../lib/db.php';
require_once '../classes/Property.php';

session_start();

if (!isset($_SESSION['landlordID'])) {
    echo "You must be logged in.";
    exit;
}

$propertyID = $_GET['propertyID'] ?? null;
if (!$propertyID) {
    echo "No property selected.";
    exit;
}

$db = new Database();
$pdo = $db->getConnection();

// Initialize the Property class
$property = new Property($pdo); // Pass the PDO connection to the Property class

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $property_address = $_POST['property_address'];
    $property_type = $_POST['property_type'];
    $email = $_POST['email'];
    $property_description = $_POST['property_description'];
    $max_guests = $_POST['max_guests'];
    $price_per_night = $_POST['price_per_night'];
    $availability = $_POST['availability'];

    // Use the Property class's update method to update the property
    $result = $property->update($propertyID, $_SESSION['landlordID'], $title, $property_description, $property_address, $price_per_night, $max_guests, null);

    if ($result) {
        echo "<p>Property updated successfully!</p>";
    } else {
        echo "<p>Failed to update property.</p>";
    }
}

// Load current property data using the Property class
$currentProperty = $property->readOne($propertyID);
if (!$currentProperty) {
    echo "Property not found.";
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Property</title>
    <link rel="stylesheet" href="../css/addyours.css">
    <link rel="stylesheet" href="../css/navbar.css">
</head>
<body>
<?php include('../layout/header.php'); ?>

<h2>Edit Property</h2>

<form method="POST">
    <label>Title: <input type="text" name="title" value="<?= htmlspecialchars($currentProperty['title']) ?>" required></label><br>
    <label>Address: <input type="text" name="property_address" value="<?= htmlspecialchars($currentProperty['property_address']) ?>" required></label><br>
    <label>Type: <input type="text" name="property_type" value="<?= htmlspecialchars($currentProperty['property_type']) ?>" required></label><br>
    <label>Email: <input type="email" name="email" value="<?= htmlspecialchars($currentProperty['email']) ?>" required></label><br>
    <label>Description:<br>
        <textarea name="property_description" rows="4" required><?= htmlspecialchars($currentProperty['property_description']) ?></textarea>
    </label><br>
    <label>Price per Night: <input type="number" step="0.01" name="price_per_night" value="<?= htmlspecialchars($currentProperty['price_per_night']) ?>" required></label><br>
    <label>Availability Date: <input type="date" name="availability" value="<?= htmlspecialchars($currentProperty['availability']) ?>" required></label><br>
    <label>Max Guests: <input type="number" name="max_guests" value="<?= htmlspecialchars($currentProperty['max_guests']) ?>" required></label><br>

    <button type="submit">Update Property</button>
</form>

<a href="dashboard.php">Back to Dashboard</a>
</body>
</html>
