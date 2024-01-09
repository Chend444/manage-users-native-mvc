<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Users Table</title>
//     <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <h1>Users Table</h1>
    <table>
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $users = include(__DIR__ . '/../backend/get_users.php');

            foreach ($users as $user) {
                echo "<tr>";
                echo "<td>{$user['Username']}</td>";
                echo "<td>{$user['Email']}</td>";
                echo "<td><button onclick=\"confirmDelete('{$user['Username']}')\">Delete</button></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <div class="popup">
        <div class="popup-content">
            <!-- Content from user_popup.php will be loaded here -->
        </div>
        <button class="close-btn">Close</button>
    </div>
    <!-- External JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../assets/script.js"></script>
</body>
</html>
