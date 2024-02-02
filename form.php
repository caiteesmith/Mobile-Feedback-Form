<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Thorlabs Toolkit Feedback Form</title>
</head>

<body>
	
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Function to sanitize input data
    function sanitizeInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Function to validate email address
    function isValidEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    // Retrieve and sanitize form data
    $rating = isset($_POST["rate"]) ? (int)$_POST["rate"] : null;
    $name = isset($_POST["name"]) ? sanitizeInput($_POST["name"]) : null;
    $email = isset($_POST["email"]) ? sanitizeInput($_POST["email"]) : null;
    $generalFeedback = isset($_POST["General_Feedback"]) ? sanitizeInput($_POST["General_Feedback"]) : null;
    $requestFeedback = isset($_POST["Request_Feedback"]) ? sanitizeInput($_POST["Request_Feedback"]) : null;
    $additionalFeedback = isset($_POST["Additional_Feedback"]) ? sanitizeInput($_POST["Additional_Feedback"]) : null;

    // Validate email address
    if (!isValidEmail($email)) {
        die("Invalid email address");
    }

    // Create CSV data
    $csvData = "Rating,Name,Email,General Feedback,Request Feedback,Additional Feedback\n";
    $csvData .= "$rating,$name,$email,$generalFeedback,$requestFeedback,$additionalFeedback";

    // Create a unique filename for the CSV file
    $csvFileName = "feedback_" . date("YmdHis") . ".csv";

    // Set the email subject
    $subject = "Feedback Submission";

    // Set the recipient email address
    $to = "app-dev@thorlabs.com"; // Replace with your actual email address

    // Set additional headers for attachment and content type
    $headers = "From: $email\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/csv; charset=utf-8\r\n";
    $headers .= "Content-Disposition: attachment; filename=$csvFileName\r\n";

    // Send email with CSV attachment
    if (mail($to, $subject, $csvData, $headers)) {
        // Display a success message or redirect to a thank-you page
        echo "Feedback submitted successfully!";
    } else {
        // Display an error message
        die("Error sending email");
    }
	
	// After processing, redirect back to index.html
    header("Location: index.html");
    exit();
} else {
    // If the form is not submitted, you can redirect the user to the form page or show an error message
    echo "Form not submitted. Please try again.";
}
?>

</body>
</html>