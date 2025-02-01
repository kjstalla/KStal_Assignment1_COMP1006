<!DOCTYPE html> <!-- documentation -->
<html lang="en">
<head>
    <meta charset="utf-8"> <!-- metadata -->
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <title>Elevate Fitness - Submission Form</title> <!-- page title -->
    <meta name="description" content="Assignment 1 - Kris Stallard">
    <link rel="icon" type="image/x-icon" href="images/logo.png"> <!-- favicon -->
    <link rel="stylesheet" href="css/style.css"> <!-- linking the css sheet -->
</head>
<body>
    
  <header> <!-- header -->
        <div class="header1">
            <div class="logotitle2"> <!-- logo -->
                <h1><em>ELEVATE</em></h1> 
                <img src="images/logo.png" alt="Logo" height="50">
            </div>
        </div>
  </header>

    <main>
        <!-- Add PHP Logic -->
        <?php

        // including other php files
        include_once('crud.php'); // database.php comes with crud.php
        include_once('validate.php');

        $crud = new crud(); // creating object inputs
        $valid = new validate();

        if (isset($_POST['Submit'])) {

            $first_name      = $crud->escape_string($_POST['first_name']); // escape user input
            $last_name       = $crud->escape_string($_POST['last_name']);
            $date_of_birth   = $crud->escape_string($_POST['date_of_birth']);
            $gender          = $crud->escape_string($_POST['gender']);
            $email           = $crud->escape_string($_POST['email']);
            $phone_number    = $crud->escape_string($_POST['phone_number']);
            $address         = $crud->escape_string($_POST['address']);
            $membership_type = $crud->escape_string($_POST['membership_type']);

            $ageValidation = $valid->validAge($date_of_birth); // validates age email and phone
            $checkEmail = $valid->validEmail($email);
            $checkPhone = preg_match('/^[0-9]{10,15}$/', $phone_number); 

            if ($ageValidation !== true) { // if the user is under 18 as return would be true if they are older
                echo "<div class='error'><p>$ageValidation</p></div>"; // prints error message
                echo "<a href='javascript:self.history.back();'>Go Back</a>"; // allows user to go back without clearing their form data 
                exit; 
            }
            if ($valid->emailExists($email, $crud)) { // if the email exists already
                echo "<div class='error'><p>This email is already taken. Please use a different email.</p></div>";
                echo "<a href='javascript:self.history.back();'>Go Back</a>";
            }
            if ($valid->phoneExists($phone_number, $crud)) { // if the phone exists already
                echo "<div class='error'><p>This phone number is already taken. Please use a different number.</p></div>"; // prints error message
                echo "<a href='javascript:self.history.back();'>Go Back</a>";
            }
            if ($msg != null) {
                echo "<p>$msg</p>";
                echo "<a href='javascript:self.history.back();'>Go Back</a>";
            } elseif (!$checkEmail) { // if the user enters an invalid email
                echo "<div class='error'><p>Please provide a valid email</p></div>"; // prints error message
                echo "<a href='javascript:self.history.back();'>Go Back</a>";
            } elseif (!$checkPhone) { // if the user enters a invalid phone number
                echo "<div class='error'><p>Please enter a valid phone number (10-15 digits)</p></div>"; // prints error message
                echo "<a href='javascript:self.history.back();'>Go Back</a>"; 
            } else {
                $query = "INSERT INTO members (first_name, last_name, date_of_birth, gender, email, phone_number, address, membership_type) 
                          VALUES ('$first_name', '$last_name', '$date_of_birth', '$gender', '$email', '$phone_number', '$address', '$membership_type')"; 
                // if all goes well the data is inserted into the database
                $result = $crud->execute($query);

                if ($result) {
                    echo "<div class='success'><p>Membership successfully registered!</p></div>"; // prints success message
                    echo "<a href='index.php'>Go Back</a>"; // goes right back to the original page clearing data
                } else {
                    echo "<div class='error-message'><p>There was an error processing your request.</p></div>"; // prints error message
                    echo "<a href='javascript:self.history.back();'>Go Back</a>";
                }
            }
        }
        ?>
    </main>
</body>
</html>
