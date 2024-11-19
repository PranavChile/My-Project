<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Validate data (Optional)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    // Format the message to be saved
    $entry = "Name: $name\nEmail: $email\nMessage: $message\n---\n";

    // Save the form data to a file
    $file = fopen("messages.txt", "a"); // Opens or creates the file
    if ($file) {
        fwrite($file, $entry);
        fclose($file);
        
        // Redirect to home page after submission
        header("Location: index.html"); // Change this to your home page URL
        exit(); // Ensure no further code is executed after the redirect
    } else {
        echo "Sorry, we are unable to save your message at this time.";
    }
} else {
    echo "Invalid request method.";
}
?>
