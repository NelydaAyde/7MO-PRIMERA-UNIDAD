<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

function sendNotificationEmail($to, $url, $load_time, $word_count, $image_count, $link_count, $script_count) {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'cnelyda7201@gmail.com';
        $mail->Password = 'nacond72ori@';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('cnelyda7201@gmail.com', 'Web Evaluation');
        $mail->addAddress($to);

        $mail->isHTML(true);
        $mail->Subject = 'Evaluation Results';
        $mail->Body    = "
            <h1>Evaluation Results</h1>
            <p>URL: $url</p>
            <p>Load Time: $load_time seconds</p>
            <p>Word Count: $word_count</p>
            <p>Image Count: $image_count</p>
            <p>Link Count: $link_count</p>
            <p>Script Count: $script_count</p>
        ";

        $mail->send();
        echo 'Message sent!';
    } catch (Exception $e) {
        echo "Error sending message: {$mail->ErrorInfo}";
    }
}
?>
