<?php
require '../layout/header.php';
require '../lib/functions.php';

// Get booking ID from URL
$bookingID = $_GET['bookingID'] ?? null;

if (!$bookingID) {
    echo "Error: Invalid or missing bookingID.";
    exit;
}

// Get booking details
$booking = get_booking($bookingID);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking Confirmation</title>
    <link rel="stylesheet" href="../css/bookingconfirmation.css">
    <link rel="stylesheet" href="../css/navbar.css">
    
</head>
<body>

<div class="container">
    <h1>Booking Confirmation</h1>
    <h2>Thank you for your booking!</h2>

    <div class="confirmation-message">
        <h3>Your booking was successful!</h3>
        <p>Your booking ID is: <strong><?php echo $booking['bookingID']; ?></strong></p>
        <p>We look forward to welcoming you!</p>
    </div>

    <h3>Booking Details:</h3>
    <table>
        <tr>
            <th>Property Title</th>
            <td><?php echo $booking['title']; ?></td>
        </tr>
        <tr>
            <th>Check-in Date</th>
            <td><?php echo $booking['check_in']; ?></td>
        </tr>
        <tr>
            <th>Check-out Date</th>
            <td><?php echo $booking['check_out']; ?></td>
        </tr>
        <tr>
            <th>Total Price</th>
            <td>$<?php echo $booking['total_price'], 2; ?></td>
        </tr>
        <tr>
            <th>Max Guests</th>
            <td><?php echo $booking['max_guests']; ?></td>
        </tr>

    </table>

    <div class="button-container">
        <form action="../index.php" method="get">
            <button type="submit">Back to Home</button>
        </form>
    </div>

</div>

</body>
</html>
