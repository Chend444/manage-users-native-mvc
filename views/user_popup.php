<?php
// user_popup.php
if (isset($_POST['username'])) {
    $username = $_POST['username'];

    // Example: Fetch user details using UserController based on the username
    $userController = new UserController();
    $userData = $userController->getUserByUsername($username);

    // Display user details in the popup
    if ($userData) {
        echo "<h2>User Details</h2>";
        echo "<p><strong>Username:</strong> {$userData['Username']}</p>";
        echo "<p><strong>Email:</strong> {$userData['Email']}</p>";
        // Display other user details accordingly
    } else {
        echo "<p>User details not found.</p>";
    }
} else {
    echo "<p>No username provided.</p>";
}
?>
