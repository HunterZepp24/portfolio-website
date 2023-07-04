if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $firstName = $_POST["first"];
    $lastName = $_POST["last"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    $emailAddress = "hunterzeppdesigns@gmail.com";

    $to = $emailAddress;
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-type: text/plain; charset=UTF-8\r\n";

    $fullMessage = "Name: " . $firstName . " " . $lastName . "\n\n" . $message;

    // Send the email
    mail($to, $subject, $fullMessage, $headers);

    // Redirect back to the contact page after form submission
    header("Location: contact.html");
    exit();
}