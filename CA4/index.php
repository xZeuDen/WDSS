<?php
session_start();
?>

<style>
<?php require 'css/navbar.css';?>
</style>
 <?php   
require 'lib/functions.php';

//Calling the function to get houses from database
$houses = get_houses();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Key Rentals</title>
    <style>
        <?php require 'css/index.css'; ?>
    </style>
</head>
<body>
    <?php require 'layout/header.php';?>
    <h1>Welcome to Our Holiday Villas</h1>
    <div class="container">
    <?php foreach ($houses as $house): ?>
        <div class="house">
            <img src="<?php echo $house['image']; ?>" alt="<?php echo $house['title']; ?>">
            <h2><?php echo $house['title']; ?></h2>
            <p>€<?php echo $house['price_per_night']; ?> per night</p>
            <a href="/properties/show.php?propertyID=<?php echo $house['propertyID'] ?>" class="button">Book Now</a>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>
