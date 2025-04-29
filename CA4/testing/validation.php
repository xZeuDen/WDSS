//Validation for registering action, to make sure all fields have been completed
if (!$firstName || !$lastName || !$email || !$phone || !$password) {
echo "All fields are required.";
exit;

// Phone validation: Check if phone is 10 digits long
if (strlen($phone) > 10) {
echo "Phone number cannot exceed 10 digits.";
exit;
}
// Validation to ensure that landlord cannot put a price of 0 per night
if ($price_per_night == 0) {
echo "Price per night cannot be 0.";
exit;
}
