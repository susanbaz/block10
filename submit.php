<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    $phone = test_input($_POST["phone"]);

    // Validate the form data
    if (empty($name) || empty($email) || empty($phone)) {
        // Display an error message if any of the fields are empty
        echo "Please fill out all fields.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Display an error message if the email address is invalid
        echo "Please enter a valid email address.";
    } else {
        // Send the form data to your email or database
        // Replace the following lines with your own code
        $to = "you@example.com";
        $subject = "New form submission";
        $message = "Name: $name\nEmail: $email\nPhone: $phone";
        $headers = "From: webmaster@example.com";

        if (mail($to, $subject, $message, $headers)) {
            // Display a success message if the form data is submitted successfully
            echo "Thank you for submitting the form!";
        } else {
            // Display an error message if the form data could not be submitted
            echo "Something went wrong. Please try again later.";
        }
    }
} else {
    // Redirect to the homepage if the form was not submitted
    header("Location: index.html");
    exit;
}

// Sanitize the form data to prevent SQL injection and other attacks
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
