<?php
require_once(__DIR__ . '/../models/User.php');

class UserController
{
    public function insertUser($data)
    {
        $userModel = new User();

        // Extract form data
        $username = $data['username'];
        $email = $data['email'];
        $password = $data['password'];
        $birthdate = $data['birthdate'];
        $phoneNumber = $data['phoneNumber'];
        $url = $data['url'];

        // Perform validation
        $validationErrors = $this->validateUserData($username, $email, $password, $birthdate, $phoneNumber, $url);

        if (empty($validationErrors)) {
            // Insert user data into the database
            $userModel->insertUser($username, $email, $password, $birthdate, $phoneNumber, $url);
            // Handle success of insertion and provide feedback to the user
            return ['success' => true, 'message' => 'User inserted successfully.'];
        } else {
            // Handle validation errors and provide feedback to the user
            return ['success' => false, 'errors' => $validationErrors];
        }
    }

    // Function to validate user data
    private function validateUserData($username, $email, $password, $birthdate, $phoneNumber, $url)
    {
        $errors = [];

        // Username validation
        if (!preg_match("/^[a-zA-Z]+$/", $username)) {
            $errors['username'] = 'Username should contain letters only.';
        }

        // Email validation
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Invalid email format.';
        }

        // Password validation
        if (strlen($password) < 8 || !preg_match("/[a-z]/", $password) || !preg_match("/[A-Z]/", $password) || !preg_match("/[^a-zA-Z0-9]/", $password)) {
            $errors['password'] = 'Password should be at least 8 characters long and include uppercase, lowercase, and special characters.';
        }

        // Birthdate validation (Example: check if it's a valid date format)
        if (!strtotime($birthdate)) {
            $errors['birthdate'] = 'Invalid birthdate format.';
        }

        // Phone number validation
        if (!preg_match("/^[0-9]{10}$/", $phoneNumber)) {
            $errors['phoneNumber'] = 'Phone number should be numeric and 10 digits long.';
        }

        // URL validation
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            $errors['url'] = 'Invalid URL format.';
        }

        return $errors; // Return array of errors
    }

    // Function to fetch all users
    public function getAllUsers()
    {
        $userModel = new User();
        return $userModel->getAllUsers(); // Implement this method in the User model
    }

    // Function to delete a user by username
    public function deleteUser($username)
    {
        $userModel = new User();
        return $userModel->deleteUserByUsername($username); // Implement this method in the User model
    }

    // Function to fetch user data by username
    public function getUserByUsername($username)
    {
        $userModel = new User();
        return $userModel->getUserByUsername($username); // Implement this method in the User model
    }

    public function handleFormSubmission($data)
    {
        $userModel = new User();

        // Extract form data
        $username = $data['username'];
        $email = $data['email'];
        $password = $data['password'];
        $birthdate = $data['birthdate'];
        $phoneNumber = $data['phoneNumber'];
        $url = $data['url'];

        // Perform validation
        $validationErrors = $this->validateUserData($username, $email, $password, $birthdate, $phoneNumber, $url);

        if (empty($validationErrors)) {
            // Insert user data into the database
            $insertResult = $userModel->insertUser($username, $email, $password, $birthdate, $phoneNumber, $url);

            if ($insertResult) {
                // Handle success of insertion and provide feedback to the user
                return ['success' => true, 'message' => 'User inserted successfully.'];
            } else {
                // Handle failure of insertion
                return ['success' => false, 'message' => 'Failed to insert user.'];
            }
        } else {
            // Handle validation errors and provide feedback to the user
            return ['success' => false, 'errors' => $validationErrors];
        }
    }
}
?>
