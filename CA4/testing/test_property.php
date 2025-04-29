<?php

use classes\Property;

require_once '../Property.php';

$property = new Property(null);

// Set test values
$property->setTitle("Marrakech House");
$property->setDescription("2 bedrooms, 1 bathroom");
$property->setAddress("45 High Street");
$property->setPricePerNight(100);
$property->setMaxGuests(4);
$property->setImage("Villa1.png");


// Test Title
if ($property->getTitle() === "Marrakech House") {
    echo "Title Test Passed<br>";
} else {
    echo "Title Test Failed<br>";
}

// Test Description
if ($property->getDescription() === "2 bedrooms, 1 bathroom") {
    echo "Description Test Passed<br>";
} else {
    echo "Description Test Failed<br>";
}

// Test Address
if ($property->getAddress() === "45 High Street") {
    echo "Address Test Passed<br>";
} else {
    echo "Address Test Failed<br>";
}

// Test Price Per Night
if ($property->getPricePerNight() === 100) {
    echo "Price Per Night Test Passed<br>";
} else {
    echo "Price Per Night Test Failed<br>";
}

// Test Max Guests
if ($property->getMaxGuests() === 4) {
    echo "Max Guests Test Passed<br>";
} else {
    echo "Max Guests Test Failed<br>";
}
?>
