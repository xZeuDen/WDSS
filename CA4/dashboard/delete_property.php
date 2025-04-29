<?php

require_once '../lib/functions.php';
require_once '../lib/db.php';
require_once '../classes/Property.php';

session_start();

echo "<!DOCTYPE html>";
echo "<html lang='en'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<title>Delete Property</title>";
echo "<link rel='stylesheet' href='../css/dashboard.css'>";
echo "</head>";
echo "<body>";

if (isset($_GET["propertyID"])) {
    try {
        $db = new Database();
        $pdo = $db->getConnection();

        // Initialize the Property class
        $property = new Property($pdo); // Pass the PDO connection to the Property class

        $propertyID = $_GET["propertyID"];

        // Check if there are any bookings for this property using the Property class
        $bookingCount = $property->checkBookings($propertyID); // Use the checkBookings method

        if ($bookingCount > 0) {
            echo "<div class='message error'>Cannot delete this property as it has associated bookings.</div>";
        } else {
            // Delete the property using the Property class
            $property->delete($propertyID); // Use the delete method

            echo "<div class='message success'>Property with ID $propertyID successfully deleted!</div>";
        }
    } catch(PDOException $error) {
        echo "<div class='message error'>Error: " . $error->getMessage() . "</div>";
    }
} else {
    echo "<div class='message error'>No property ID specified.</div>";
}
?>

<div style="margin-top: 20px;">
    <a href="dashboard.php" class="btn">Back to Dashboard</a>
</div>

</body>
</html>
