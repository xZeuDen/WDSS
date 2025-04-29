<?php
require_once '../layout/header.php';
require_once '../lib/functions.php';

// Get property ID from URL
$propertyID = $_GET['propertyID'] ?? null;


if (!$propertyID) {
    echo "Error: Invalid or missing propertyID.";
    exit; // Stop execution if propertyID is invalid
}

$property = get_house($propertyID);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $pricePerNight = $property['price_per_night'];

    // Calculate total price
    $checkinDate = new DateTime($checkin);
    $checkoutDate = new DateTime($checkout);
    $interval = $checkinDate->diff($checkoutDate);
    $days = $interval->days;
    $totalPrice = $days * $pricePerNight;
    $userID = 1;

    // Add booking to database and get booking ID
    $bookingID = add_booking_to_database($userID, $propertyID, $checkin, $checkout, $totalPrice);

    // Redirect to confirmation
    header("Location: bookingconfirmation.php?bookingID=$bookingID");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Property Details</title>
    <link rel="stylesheet" href="../css/show.css">
    <link rel="stylesheet" href="../css/navbar.css">
</head>
<body>

<div class="property-container">
    <h1><?php echo htmlspecialchars($property['title']); ?></h1>
    <img src="<?php echo htmlspecialchars($property['image']); ?>" alt="Property Image" style="max-width:400px; max-height:300px;">
    <p><strong>Address:</strong> <?php echo htmlspecialchars($property['property_address']); ?></p>
    <p><strong>Type:</strong> <?php echo htmlspecialchars($property['property_type']); ?></p>
    <p><strong>Price per night:</strong> $<?php echo htmlspecialchars($property['price_per_night']); ?></p>
    <p><strong>Description:</strong> <?php echo htmlspecialchars($property['property_description']); ?></p>
</div>

<div class="booking-form">
    <h2>Book This Property</h2>
    <form action="show.php?propertyID=<?php echo $propertyID; ?>" method="post">
        <label for="checkin">Check-in Date:</label>
        <input type="date" name="checkin" required>

        <label for="checkout">Check-out Date:</label>
        <input type="date" name="checkout" required>

        <button type="submit">Book Now</button>
    </form>
</div>

</body>
</html>
