<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $fullName = htmlspecialchars($_POST['fullName']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars($_POST['phone']);
    $dob = htmlspecialchars($_POST['dob']);
    $gender = htmlspecialchars($_POST['gender']);
    $address = htmlspecialchars($_POST['address']);
    $course = htmlspecialchars($_POST['course']);

    // Create formatted output
    $output = "
    <div class='submitted-details'>
        <h4>Submitted Registration Details</h4>
        <p><strong>Full Name:</strong> $fullName</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Phone:</strong> $phone</p>
        <p><strong>Date of Birth:</strong> $dob</p>
        <p><strong>Gender:</strong> " . ucfirst($gender) . "</p>
        <p><strong>Address:</strong> $address</p>
        <p><strong>Course:</strong> " . str_replace('_', ' ', ucwords($course)) . "</p>
    </div>
    ";

    echo $output;
} else {
    echo "Invalid request method.";
}
?>