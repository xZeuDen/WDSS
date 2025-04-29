<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Landlord Registration</title>
    <link rel="stylesheet" href="../../css/register.css">
</head>
<body>
    <div class="form-container">
        <h2>Register as a Landlord</h2>
        <form action="register_action.php" method="POST">
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" required>

            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Register</button>
        </form>
        <a href="../../dashboard/dashboard.php" class="back-link">Back to Dashboard</a>
    </div>
</body>
</html>
