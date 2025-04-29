<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="../css/contact.css">
    <link rel="stylesheet" href="../css/navbar.css">
</head>
<body>
<?php require '../layout/header.php';?>
<div class="contact-container">
    <h1>Contact Us</h1>
    <form action="submit_contact.php" method="POST">
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>" required>

        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required>

        <label for="message">Your Message:</label>
        <textarea id="message" name="message" rows="4" required><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message']) : ''; ?></textarea>

        <button type="submit">Submit</button>
    </form>
</div>
</body>
</html>
