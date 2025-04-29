<div class="topnav">
    <a href="../index.php">Home</a>
    <a href="../properties/addyours.php">Add yours</a>
    <a href="../contact/contact.php">Contact</a>

    <?php if (isset($_SESSION['landlordID'])): ?>
        <!-- if the user is logged in, show My Dashboard and Log Out -->
        <a href="../dashboard/dashboard.php">My Dashboard</a>
        <a href="../auth/logout/logout.php">Log Out</a>
    <?php else: ?>
        <!-- if the user is not logged in, show Login -->
        <a href="../auth/login/login.php">Login</a>
    <?php endif; ?>

    <div class="search-container">
        <form action="../properties/search.php" method="GET">
            <!-- Search by title or address -->
            <input type="text" placeholder="Search..." name="search" required>

            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
</div>
