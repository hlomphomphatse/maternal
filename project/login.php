<?php
// Start PHP session at the beginning 
session_start();

// Create database connection using config file
include_once("database2.php");

// If form submitted, collect email and password from form
if (isset($_POST['Login'])) {
    $email    = $_POST['email'];
    $password = $_POST['password'];

    // Check if a user exists with given username & password
    $result = mysqli_query($mysqli, "select 'email', 'password' from registration
        where email='$email' and password='$password'");

    // Count the number of user/rows returned by query 
    $user_matched = mysqli_num_rows($result);

    // Check If user matched/exist, store user email in session and redirect to sample page-1
    if ($user_matched > 0) {

        $_SESSION["name"] = $name;
        header("location: homepage.html");
    } else {
        echo "User email or password is not matched <br/><br/>";
    }
}
?>