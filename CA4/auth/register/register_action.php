<?php
require '../../lib/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = $_POST['first_name'] ?? null;
    $lastName = $_POST['last_name'] ?? null;
    $email = $_POST['email'] ?? null;
    $phone = $_POST['phone'] ?? null;
    $password = $_POST['password'] ?? null;

    // validation
    if (!$firstName || !$lastName || !$email || !$phone || !$password) {
        echo "All fields are required.";
        exit;
    }

    // Phone validation
    if (strlen($phone) > 10) {
        echo "Phone number cannot exceed 10 digits.";
        exit;
    }

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Get database connection
    $db = new Database();
    $pdo = $db->getConnection();

    try {
        $stmt = $pdo->prepare("
            INSERT INTO landlord (landlordFirstName, landlordLastName, landlordEmail, landlordPhone, landlord_password)
            VALUES (:first_name, :last_name, :email, :phone, :password)
        ");

        $stmt->execute([
            ':first_name' => $firstName,
            ':last_name' => $lastName,
            ':email' => $email,
            ':phone' => $phone,
            ':password' => $hashedPassword
        ]);

        // Redirect to login page after successful registration
        header("Location: ../login/login.php");
        exit;

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit;
    }
}
?>
