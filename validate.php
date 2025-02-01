<?php

class Validate { // main validation class


    public function validAge($dob) { // validates if the user is older than 18
        $birthDate = new DateTime($dob);
        $today = new DateTime(); 
        $age = $today->diff($birthDate)->y;
    
        if ($age < 18) {
            
            return "You must be at least 18 years old to register."; // returns an error message if the user is not older than 18
        }
        return true; // if the user is older than 18 it is true
    }

    public function validEmail($email) { // validates the format of the email
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public function validPhoneNumber($phone) { // validates the format of the number only digits 0-9 and has to be 10-15 characters
        return preg_match("/^[0-9]{10,15}$/", $phone);
    }

    public function emailExists($email, $crud) { // checks if a user has already signed up with the email before

        $email = $crud->escape_string($email); // prevents sql injection
    
        $query = "SELECT COUNT(*) FROM members WHERE email = '$email'"; // query to check if the email exists
    
        $result = $crud->execute($query); // executes the query
    
        if ($result) {  // if the result is greater than 0 then the email exists

            $queryResult = $crud->getConnection()->query($query);  // gets the connection and fetches the count number
            $row = $queryResult->fetch_assoc();
            return $row['COUNT(*)'] > 0;
        }
    
        return false;
    }

    // made this to test if it also works like the email however is not the best idea as numbers can get reassigned or people could just sign up with other peoples numbers to stop them from signing up
    public function phoneExists($phone_number, $crud) { // checks if a user has already signed up with the phone number before

        $phone_number = $crud->escape_string($phone_number); // prevents sql injection
    
        $query = "SELECT COUNT(*) FROM members WHERE phone_number = '$phone_number'"; // query to check if the number exists
    
        $result = $crud->execute($query); // executes the query
    
        if ($result) { // if the result is greater than 0 then the number exists
            $queryResult = $crud->getConnection()->query($query);  // gets the connection and fetches the count number
            $row = $queryResult->fetch_assoc();
            return $row['COUNT(*)'] > 0;
        }
        return false;
    }
    
    
}

?>
