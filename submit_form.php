use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $firstName = $_POST["first"];
    $lastName = $_POST["last"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Replace these email addresses with your desired email addresses
    $emailAddress1 = "first@example.com";
    $emailAddress2 = "second@example.com";

    $fullMessage = "Name: " . $firstName . " " . $lastName . "\n\n" . $message;

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'your-gmail-account@gmail.com';
        $mail->Password = 'your-gmail-password';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Sender and recipient settings
        $mail->setFrom($email, $firstName . ' ' . $lastName);
        $mail->addAddress($emailAddress1);
        $mail->addAddress($emailAddress2);

        // Email content
        $mail->Subject = $subject;
        $mail->Body = $fullMessage;

        // Send the email
        $mail->send();

        echo 'Email sent successfully';
    } catch (Exception $e) {
        echo 'Email could not be sent. Error: ', $mail->ErrorInfo;
    }

    exit();
}