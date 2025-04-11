<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate inputs
    if (empty($name) || empty($email) || empty($message)) {
        echo "Wszystkie pola są wymagane.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Podano nieprawidłowy adres email.";
        exit;
    }

    $to = "impulsprad@gmail.com"; // Replace with your email address
    $subject = "Nowa wiadomość od: $name";
    $body = "Imię i nazwisko: $name\nEmail: $email\n\nWiadomość:\n$message";
    $headers = "From: no-reply@yourdomain.com\r\n"; // Use a valid domain email
    $headers .= "Reply-To: $email\r\n";

    if (mail($to, $subject, $body, $headers)) {
        echo "Wiadomość została wysłana pomyślnie.";
    } else {
        echo "Wystąpił błąd podczas wysyłania wiadomości.";
    }
} else {
    echo "Nieprawidłowe żądanie.";
}
?>
