<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Make sure to include PHPMailer's autoload file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the expected keys exist in the $_POST array
    $name = isset($_POST['name']) ? htmlspecialchars(trim($_POST['name'])) : '';
    $email = isset($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : '';
    $phno = isset($_POST['phno']) ? htmlspecialchars(trim($_POST['phno'])) : '';

    // Handle file upload
    $uploadDir = 'uploads/';
    $uploadFile = $uploadDir . basename($_FILES['file']['name']);

    // Check if the uploads directory exists, if not create it
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    // Check if the file was uploaded without errors
    if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
        if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)) {
            // Send email using PHPMailer
            $mail = new PHPMailer(true);
            try {
                // Server settings
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
                $mail->SMTPAuth = true; // Enable SMTP authentication
                $mail->Username = 'shraddhayeole04@gmail.com'; // Your Gmail address
                $mail->Password = 'hifc knzu wwed orll'; // Your Gmail password or App Password
                $mail->SMTPSecure = 'tls'; // Enable TLS encryption
                $mail->Port = 587; // TCP port to connect to

                // Recipients
                $mail->setFrom('shraddhayeole04@gmail.com', 'Shraddha'); // Use your email
                $mail->addAddress('shraddhayeole04@gmail.com'); // Add a recipient

                // Content
                $mail->isHTML(true); // Set email format to HTML
                $mail->Subject = 'New Contact Form Submission';
                $mail->Body    = "Name: $name<br>Email: $email<br>Phone: $phno<br>File: <a href='$uploadFile'>$uploadFile</a>";

                $mail->send();
                echo 'Thank you for contacting us!';
            } catch (Exception $e) {
                echo "Email sending failed. Mailer Error: {$mail->ErrorInfo}";
            }
        } else {
            echo "File upload failed.";
        }
    } else {
        echo "File upload error: " . $_FILES['file']['error'];
    }
}
?>