<?php
class PHP_Email_Form {

    public $to;
    public $from_name;
    public $from_email;
    public $subject;
    public $message;

    public function add_message($message, $label) {
        $this->message .= "$label: $message\n";
    }

    public function send() {
        // You can customize this method to send the email using the mail() function or any other method you prefer.
        // Example:
        $headers = 'From: ' . $this->from_email . "\r\n" .
                   'Reply-To: ' . $this->from_email . "\r\n" .
                   'X-Mailer: PHP/' . phpversion();

        $success = mail($this->to, $this->subject, $this->message, $headers);

        if ($success) {
            return 'OK';
        } else {
            return 'Error: Unable to send the email.';
        }
    }
}
