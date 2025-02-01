<!DOCTYPE html> <!-- documentation -->
<html lang="en">
<head>
	<meta charset="utf-8"> <!-- metadata -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Elevate Fitness - Home</title> <!-- page title -->
	<meta name="description" content="Assignment 1 - Kris Stallard">
  <link rel="icon" type="image/x-icon" href="images/logo.png"> <!-- favicon -->
  <link rel="stylesheet" href="css/style.css"> <!-- linking the css sheet -->
</head>
<body>
  <header> <!-- header -->
        <div class="header">
            <div class="logotitle"> <!-- logo -->
                <h1><em>ELEVATE</em></h1> 
                <img src="images/logo.png" alt="Logo" height="50">
            </div>
            <nav>
                <ul class="nav-menu"> <!-- nav -->
                    <li><a href="index.php"><strong>HOME</strong></a></li>
                    <li><a href="#form"><strong>SIGN UP</strong></a></li>
                    <li><a href="#facility"><strong>FACILITY</strong></a></li>
                </ul>
            </nav>
        </div>
  </header>

  <main> 

        <div class="dual-images"> <!-- 2 images next to each other -->
          <img src="images/treadmill.jpg" alt="Picture of guy running on treadmill" height="500">
          <img src="images/gym.webp" alt="Picture of gym facility" height="500">
        </div>

    <div class="sidebyside"> <!-- places the form next to the text -->

        <section class="form" id="form"> <!-- form -->
          <h2>Membership Hub</h2>
          <form method="post" action="add.php"> <!-- posts the submission to add.php -->
            
            <p><strong>First Name</strong></p> <!-- inputs -->
            <p><input type="text" name="first_name" placeholder="" required></p>

            <p><strong>Last Name</strong></p>
            <p><input type="text" name="last_name" placeholder="" required></p>

            <p><strong>Date of Birth</strong></p>
            <p><input type="date" name="date_of_birth" value="2007-01-01" required></p>

            <p><strong>Gender</strong></p>
            <p>
              <select name="gender" required>
                <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
              </select>
            </p>

            <p><strong>Email</strong></p>
            <p><input type="email" name="email" placeholder="" required></p>

            <p><strong>Phone Number</strong></p>
            <input type="text" name="phone_number" placeholder="" required>

            <p><strong>Address</strong></p>
            <p><textarea name="address" placeholder="" required></textarea></p>

            <p><strong>Membership Type</strong></p>
            <p>
              <select name="membership_type" required>
                <option value="">Select Membership Type</option>
                <option value="Basic">Basic</option>
                <option value="Standard">Standard</option>
                <option value="Premium">Premium</option>
              </select>
            </p>
           
            <input class="btn" type="submit" name="Submit" value="Sign Up"> <!-- submit and clear buttons -->

            <input class="btn" type="reset" value="Clear">
          </form>
        </section>

        <section class="text"> <!-- business text -->
        
          <h3><em>"Reach new Heights"</em> - Kris Stallard</h3>

          <p>Here at Elevate FITNESS, we present you with the most welcoming and a state-of-the-art gym experience. After being founded in 2012, owner Kris Stallard was determined to build a global empire, bringing Elevate to over 20 countries.</p>
          
          <p>We offer a variety of membership options to suit your personal fitness journey. From flexible month-to-month plans to discounted annual memberships, we strive to provide affordable pricing that makes world-class fitness accessible to everyone. Whether you're just starting out or are a seasoned athlete, we have the perfect membership to support your goals and fit your budget.</p>

          <p>We believe fitness is for everyone, no matter their background or fitness level. Elevate FITNESS offers specialized programs for athletes, beginners, and those looking to improve their overall health. Whether you're here to crush your fitness goals or just get moving, we have the resources and support to help you succeed.</p>
          

          <div class=pictures> <!-- pictures below the text in the same section -->
            <img src="images/100percent.png" alt="Picture of award" height="400">
            <img src="images/logo.png" alt="Picture of logo" height="400">
          </div>  
        </section>
    </div>


        <div class="single-image" id="facility"> <!-- single image -->
          <img src="images/image.jpg" alt="Picture of gym facility" height="500">
        </div>

        <footer> <!-- footer -->
        <p>© Elevate Fitness - 2025 - Kris Stallard</p>
        </footer>

     </main>
   </body>
</html> <!-- closing tags -->
