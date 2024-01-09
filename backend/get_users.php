<?php
// get_users.php
require_once(__DIR__ . '/../controllers/UserController.php');

$userController = new UserController();
$users = $userController->getAllUsers();

return $users; // Return the fetched users
?>
