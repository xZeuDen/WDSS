<?php
// Include the database connection and necessary files
require_once '../lib/functions.php';
require_once '../lib/db.php';

session_start();

// Get the search term and price range
$search = $_GET['search'] ?? '';
$priceRange = $_GET['priceRange'] ?? '';

// Initialize the Database class
$db = new Database();
$pdo = $db->getConnection();

// Start building the SQL query
$sql = "SELECT * FROM properties WHERE title LIKE :search";


if ($priceRange) {
    // Check if the price range is "300+" (special case)
    if ($priceRange === '300+') {
        $sql .= " AND price_per_night >= :price_min";
    } else {
        $sql .= " AND price_per_night BETWEEN :price_min AND :price_max";
    }
}

// Prepare the statement
$stmt = $pdo->prepare($sql);

// Bind parameters
$stmt->bindValue(':search', "%$search%");

// Handle the price range
if ($priceRange) {
    if ($priceRange === '300+') {

        $stmt->bindValue(':price_min', 300); // Any price over 300
    } else {
        list($min, $max) = explode('-', $priceRange);
        $stmt->bindValue(':price_min', $min);
        $stmt->bindValue(':price_max', $max);
    }
}

// Execute the query
$stmt->execute();

// Fetch all results
$properties = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="../css/search.css">
    <link rel="stylesheet" href="../css/navbar.css">
</head>
<body>

<?php include '../layout/header.php'; ?>

<div class="search-results-container">
    <h1>Search Results</h1>
    <form action="search.php" method="GET" class="search-filter">
    <div class="search-bar">
        <input type="text" name="search" placeholder="Search.." value="<?php echo htmlspecialchars($search); ?>">
        <button type="submit">Search</button>
    </div>

    <select name="priceRange">
        <option value="">Select Price Range</option>
        <option value="0-150" <?php if ($priceRange == '0-150') echo 'selected'; ?>>€0 - €150</option>
        <option value="150-300" <?php if ($priceRange == '150-300') echo 'selected'; ?>>€150 - €300</option>
        <option value="300+" <?php if ($priceRange == '300+') echo 'selected'; ?>>€300+</option>
    </select>
</form>


    <div class="properties-container">
        <?php if (count($properties) > 0): ?>
            <?php foreach ($properties as $property): ?>
                <div class="property-card">
                    <h3><?php echo htmlspecialchars($property['title']); ?></h3>
                    <p><?php echo htmlspecialchars($property['property_address']); ?></p>
                    <p><strong>€<?php echo number_format($property['price_per_night'], 2); ?></strong> / night</p>
                    <a href="show.php?propertyID=<?php echo $property['propertyID']; ?>" class="book-now-button">Book Now</a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No properties found matching your search criteria.</p>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
