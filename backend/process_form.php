<?php
require_once(__DIR__ . '/../controllers/UserController.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userController = new UserController();
    $formData = [
        'username' => $_POST['username'],
        'email' => $_POST['email'],
        'password' => $_POST['password'],
        'birthdate' => $_POST['birthdate'],
        'phoneNumber' => $_POST['phoneNumber'],
        'url' => $_POST['url']
    ];

    // Handle form submission
    $submissionResult = $userController->handleFormSubmission($formData);

    // Handle the result as needed
    if ($submissionResult['success']) {
        // Process success
        // Redirect or display success message
        header("Location: success.php"); // Redirect to a success page
        exit();
    } else {
        // Process failure
        // Redirect or display error messages
        $errors = $submissionResult['errors']; // Retrieve validation errors
        // Redirect back to form with error messages or show error messages on the same page
        header("Location: user_form.php?error=" . urlencode(serialize($errors))); // Redirect back with errors
        exit();
    }
} else {
    // Handle non-POST requests (optional)
    // Redirect or display an error message for invalid requests
    header("Location: error.php");
    exit();
}
?>
