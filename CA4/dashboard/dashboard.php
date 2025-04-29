<?php
// Start the session
session_start();

// Check if the landlord is logged in
if (!isset($_SESSION['landlordID'])) {
    header("Location: login.php");
    exit();
}


include '../layout/header.php';


require '../lib/db.php';

// Initialize the Database class
$db = new Database();
$pdo = $db->getConnection(); // Get the PDO instance from the Database class

// Fetch the landlord's information from the database
$landlordID = $_SESSION['landlordID'];
$sql = "SELECT * FROM landlord WHERE landlordID = :landlordID";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':landlordID', $landlordID);
$stmt->execute();
$landlord = $stmt->fetch(PDO::FETCH_ASSOC);

// Fetch properties belonging to this landlord
$sql = "SELECT * FROM properties WHERE landlordID = :landlordID";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':landlordID', $landlordID);
$stmt->execute();
$properties = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landlord Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/navbar.css">
</head>
<body>
<div class="dashboard-container">
    <h1>Welcome, <?php echo htmlspecialchars($landlord['landlordFirstName']); ?>!</h1>

    <h2>Your Properties</h2>
    <table>
        <thead>
        <tr>
            <th>Property Title</th>
            <th>Price Per Night</th>
            <th>Max Guests</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php if ($properties): ?>
            <?php foreach ($properties as $property): ?>
                <tr>
                    <td><?php echo htmlspecialchars($property['title']); ?></td>
                    <td>€<?php echo htmlspecialchars($property['price_per_night']); ?></td>
                    <td><?php echo htmlspecialchars($property['max_guests']); ?></td>
                    <td>
                        <a href="update_property.php?propertyID=<?php echo $property['propertyID']; ?>">Update</a> |
                        <a href="delete_property.php?propertyID=<?php echo $property['propertyID']; ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">You don't have any properties listed yet.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>

    <a href="../properties/addyours.php" class="button">Add New Property</a>
    <a href="../auth/logout/logout.php" class="button">Log Out</a>

    <div style="margin-top: 20px;">
        <a href="../index.php" class="button back-button">Back to Home</a>
    </div>
</div>
</body>
</html>
