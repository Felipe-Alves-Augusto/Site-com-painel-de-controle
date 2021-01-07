<?php

    class Email{

        private $mailer;

        public function __construct($host, $username, $senha, $nome){

            $this->mailer = new PHPMailer();

            // necessita a hospedagem

            try {
                //Server settings
                $this->mailer->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                 $this->mailer->isSMTP();                                            // Send using SMTP
                 $this->mailer->Host       = $host;                    // Set the SMTP server to send through
                 $this->mailer->SMTPAuth   = true;                                   // Enable SMTP authentication
                 $this->mailer->Username   = $username;                     // SMTP username
                 $this->mailer->Password   = $senha;                               // SMTP password
                 $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                //Recipients
                $mail->setFrom($username, $nome);
   

                // Attachments
                $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                // Content
      

                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

        }

        // adicionando os endereços de email para ser enviado para a hospedagem
        public function address($email,$nome){

            $this->mailer->addAddress($email, $nome);  
        }

        //essa função formatarEmail faz serve para passar o que quiser no email

        public function formatarEmail($info){

            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $info['assunto'];
            $mail->Body    = $info['corpo'];
            $mail->AltBody = strip_tags($info['corpo']);

        }
        //aqui essa função faz o envio do email
        public function sendEmail(){
            if($this->mailer->send()){

                return true;

            } else{

                return false;
            }
        }
    }

?>