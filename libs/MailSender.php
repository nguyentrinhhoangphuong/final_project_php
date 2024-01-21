<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require_once LIBRARY_PATH . "PHPMailer/src/Exception.php";
require_once LIBRARY_PATH . "PHPMailer/src/PHPMailer.php";
require_once LIBRARY_PATH . "PHPMailer/src/SMTP.php";


class MailSender
{
    private $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        $this->mail->SMTPDebug = 0; // Enable verbose debug output
        $this->mail->isSMTP(); // gửi mail SMTP
        $this->mail->CharSet = 'UTF-8';
        $this->mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
        $this->mail->SMTPAuth = true; // Enable SMTP authentication
        $this->mail->Username = 'hoangphuong965@gmail.com'; // SMTP username
        $this->mail->Password = 'ekfr jhch cytm gtwk'; // SMTP password
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $this->mail->Port = 587; // TCP port to connect to
    }

    public function sendMail($arrParams, $options = null)
    {
        $result = true;
        try {

            if ($options['task'] == 'send-mail-to-admin') {
                // Set recipients
                $this->mail->setFrom('from@example.com', 'Mailer');
                $this->mail->addAddress('hoangphuong965@gmail.com');

                // Content
                $this->mail->isHTML(true);
                $this->mail->Subject = "Thông báo Admin: " . $arrParams['title'];
                $this->mail->Body = $arrParams['message'];
                $this->mail->send();
            }

            if ($options['task'] == 'send-mail-to-user') {
                // Set 
                $this->mail->setFrom('from@example.com', 'Mailer');
                $this->mail->addAddress($options['email']);

                // Content
                $this->mail->isHTML(true);
                $this->mail->Subject = $arrParams['title'];
                $this->mail->Body = $arrParams['message'];
                $this->mail->send();
            }
        } catch (Exception $e) {
            $result = false;
            $this->logError($e->getMessage());
        }
        return $result;
    }

    private function logError($message)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $userIP = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : 'Unknown';
        $logFile = './log/log.txt';

        // Tạo một ID đơn giản dựa trên thời gian
        $id = uniqid();

        // Ghi thông tin vào file log
        file_put_contents($logFile, date('Y-m-d H:i:s') . '||' . $id . '||' . $userIP . '||' . $message . '||process' . PHP_EOL, FILE_APPEND);
    }
}
