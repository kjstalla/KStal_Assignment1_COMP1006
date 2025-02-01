<?php
require_once 'database.php'; // gets the database file and therefore doesnt need to do it again in the add.php

class crud extends database { // extends the databse class
    public function __construct() {
        parent::__construct();  // establishes the connection
    }

    public function execute($query) { // executes any sql query
        $result = $this->connection->query($query);
        if ($result == false) {
            echo "<p>Error: Cannot execute the command - " . $this->connection->error . "</p>"; // was not able to execute the command
            return false;
        } else {
            return true;
        }
    }

    public function escape_string($value) { // escape string method to stop special characters
        return $this->connection->real_escape_string($value);
    }

    public function getConnection() { // returns the database connection
        return $this->connection;
    }

    public function insertMember($first_name, $last_name, $date_of_birth, $gender, $email, $phone_number, $address, $membership_type) { // inserts a member

        $first_name = $this->escape_string($first_name); // escapes user input
        $last_name = $this->escape_string($last_name);
        $date_of_birth = $this->escape_string($date_of_birth);
        $gender = $this->escape_string($gender);
        $email = $this->escape_string($email);
        $phone_number = $this->escape_string($phone_number);
        $address = $this->escape_string($address);
        $membership_type = $this->escape_string($membership_type);

        $query = "INSERT INTO members (first_name, last_name, date_of_birth, gender, email, phone_number, address, membership_type) 
                  VALUES ('$first_name', '$last_name', '$date_of_birth', '$gender', '$email', '$phone_number', '$address', '$membership_type')"; // executes the sql query

        return $this->execute($query);
    }
}
?>
