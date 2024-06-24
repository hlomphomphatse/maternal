
<?php
        //including the database connection file
        include_once("database2.php");

        // Check If form submitted, insert user data into database.
        if (isset($_POST['submit'])) {
            $name     = $_POST['name'];
            $surname  = $_POST['surname'];
			$email = $_POST['email'];
            $password = $_POST['password'];

            // If email already exists, throw error
            $email_result = mysqli_query($mysqli, "select 'email' from  registration where email='$email' and password='$password'");

            // Count the number of row matched 
            $user_matched = mysqli_num_rows($email_result);

            // If number of user rows returned more than 0, it means email already exists
            if ($user_matched > 0) {
                echo "<br/><br/><strong>Error: </strong> User already exists with the email'$email'.";
            } else {
                // Insert user data into database
                $result   = mysqli_query($mysqli, "INSERT INTO  registration(name,surname,email,password) VALUES('$name','$surname','$email','$password')");

                // check if user data inserted successfully.
                if ($result) {
                    echo "<br/><br/>User Registered successfully.";
					 header("Location: login.html");
    
                } else {
                    echo "Registration error. Please try again." . mysqli_error($mysqli);
                }
            }
        }

        ?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	 <script>
        function showRegistrationSuccess() {
            alert("Registration successful! Welcome to Sunnie Babies Maternal Healthcare Consultations Lesotho.");
        }
    </script>
	
    <title>Welcome to Sunnie Babies Registration Page</title>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
			background: linear-gradient(to right, #3494e6, #ec6ead);
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #3498db;
            padding: 20px 0;
            text-align: center;
        }

        .header h1 {
            color: #fff;
            font-family: 'Roboto', sans-serif;
            margin: 0;
        }

        .registration-container {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .registration-container h1 {
            color: #3498db;
            text-align: center;
        }

        .registration-container form {
            display: flex;
            flex-direction: column;
        }

        .registration-container label {
            font-weight: bold;
            margin-top: 10px;
        }

        .registration-container input {
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .registration-container input[type="submit"] {
            background-color: #3498db;
            color: #fff;
            cursor: pointer;
        }

        .registration-container input[type="submit"]:hover {
            background-color: #2577b5;
        }

        .footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }

        .footer a {
            color: #3498db;
            text-decoration: none;
            margin: 0 10px;
        }

        .footer p {
            margin: 10px 0;
        }

        .footer img {
            width: 20px;
            height: 20px;
            margin: 0 5px;
        }
		
		
		
		
		
.label {
    font-weight: bold;
    margin-top: 10px;
}


<label class="label" for="name">Name:</label>
<label class="label" for="surname">Surname:</label>
<label class="label" for="email">Email:</label>
<label class="label" for="password">Password:</label>

    </style>
</head>
<body>
    <div class="header">
        <h1>Welcome to Sunnie Babies Maternal Healthcare Consultations Lesotho</h1>
    </div>

    <div class="registration-container">
        <h1>REGISTER WITH US!</h1>
        <form action="registration.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="surname">Surname:</label>
            <input type="text" id="surname" name="surname" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" name="submit" value="Register">
            <p>Already a member? <a href="index.html">LOGIN</a></p>
        </form>
    </div>

    <div class="footer">
        <a href="#privacy">Privacy Policy</a>
        <a href="#aboutus">About</a>
        <div>
            <a href="https://facebook.com"><img src="facebook.png" alt="Facebook"></a>
            <a href="https://whatsapp.com"><img src="whatsapp.png" alt="WhatsApp"></a>
            <a href="https://instagram.com"><img src="instagram.png" alt="Instagram"></a>
        </div>
        <p>&copy; 2023 Maternal Healthcare Consultations in Lesotho. All rights reserved.</p>
    </div>
</body>
</html>
