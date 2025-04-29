<?php
// Start the session
session_start();

// Include the database connection
require '../../lib/db.php';

// Initialize the Database class
$db = new Database();
$pdo = $db->getConnection();

// Check if the form is submitted and capture the inputs
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Ensure both fields are submitted
    if (isset($_POST['email']) && isset($_POST['psw'])) {
        $email = $_POST['email'];
        $password = $_POST['psw'];

        // Query the database for the entered email
        $stmt = $pdo->prepare("SELECT * FROM landlord WHERE landlordEmail = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $landlord = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if the landlord exists and the password is correct
        if ($landlord && password_verify($password, $landlord['landlord_password'])) {
            // Password is correct,store id in session
            $_SESSION['landlordID'] = $landlord['landlordID'];

            // Redirect to dashboard
            header("Location: ../../dashboard/dashboard.php");
            exit;
        } else {
            // If email or password is incorrect
            echo "Invalid email or password!";
        }
    } else {
        echo "Email and password are required!";
    }
}
?>
