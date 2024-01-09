<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Management</title>
     <link rel="stylesheet" href="../assets/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <h1>User Management</h1>
    <div class="container">
        <!-- Load default content here -->
        <?php include('views/users_table.php'); ?>
        <?php include('views/user_form.php'); ?>
    </div>

    <!-- Confirmation modal for delete action -->
    <div id="confirmationModal" class="modal">
        <div class="modal-content">
            <p>Are you sure you want to delete this user?</p>
            <button id="confirmDelete">Delete</button>
            <button id="cancelDelete">Cancel</button>
        </div>
    </div>

    <script src="assets/script.js"></script>
    <script>
        // JS logic for the confirmation modal, delete action, etc.
        // ...
    </script>
</body>
</html>
