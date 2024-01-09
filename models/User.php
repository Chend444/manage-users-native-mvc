<?php

 require_once(__DIR__ . '/../db/database.php');

class User
{
    private $db;


    public function __construct()
    {
        // Initialize the database connection
        $this->db = (new Database())->getConnection();
    }

    // Insert user data into the database
    public function insertUser($username, $email, $password, $birthdate, $phoneNumber, $url)
    {
        $sql = "INSERT INTO users (Username, Email, Password, Birthdate, PhoneNumber, URL)
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$username, $email, $password, $birthdate, $phoneNumber, $url]);
    }

    // Fetch user data by username
    public function getUserByUsername($username)
    {
        $sql = "SELECT * FROM users WHERE Username = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Delete user by username
    public function deleteUserByUsername($username)
    {
        $sql = "DELETE FROM users WHERE Username = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$username]);
    }

    // Inside User.php model
    public function getAllUsers()
    {
        // Implement the logic to fetch all users from the database
        // Example:
        $sql = "SELECT * FROM users";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>
