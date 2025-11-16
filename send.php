<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = isset($_POST["name"]) ? trim($_POST["name"]) : '';
    $email = isset($_POST["email"]) ? trim($_POST["email"]) : '';
    $phone = isset($_POST["phone"]) ? trim($_POST["phone"]) : '';
    $comment = isset($_POST["comment"]) ? trim($_POST["comment"]) : '';

    $mail = new PHPMailer(true);

    try {
        // Configuration SMTP Gmail
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'malekfhima1@gmail.com';
        $mail->Password = 'hvvj xmfl lvzu qbzb';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Expéditeur et destinataire
        $mail->setFrom('malekfhima1@gmail.com', 'Nuraya Contact');
        if ($email !== '') {
            $mail->addReplyTo($email, $name ?: $email);
        }
        $mail->addAddress('malekfhima1@gmail.com');

        // Contenu HTML
        $mail->isHTML(true);
        $mail->Subject = 'Nouveau message du formulaire de contact';

        $mail->Body = "
            <div style='font-family: Arial, sans-serif; color: #333; padding: 20px;'>
                <h2 style='color: #007BFF;'>Nouveau message reçu</h2>
                <p><strong>Nom :</strong> {$name}</p>
                <p><strong>Email :</strong> {$email}</p>
                <p><strong>Téléphone :</strong> {$phone}</p>
                <p><strong>Message :</strong><br>
                <span style='display: inline-block; margin-top: 10px; padding: 10px; background-color: #f8f9fa; border-left: 4px solid #007BFF;'>{$comment}</span></p>
            </div>
        ";

        $mail->AltBody = "Nom: $name\nEmail: $email\nTéléphone: $phone\n\nMessage:\n$comment";

        $mail->send();
        header('Location: contact_us.php?sent=1');
        exit;
    } catch (Exception $e) {
        header('Location: contact_us.php?sent=0&error=' . urlencode($mail->ErrorInfo));
        exit;
    }
}
?>