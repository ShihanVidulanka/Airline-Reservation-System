<?php
class Email_Api{

    private $url;
    public function __construct()
    {
        $this->url = "https://script.google.com/macros/s/AKfycbzrMI49cP8sxZL3Mm2i4Q8QHTKt2XM7DyAGsuC8vV91nn9KK6wyRkpDAIGOo2jFY0ZL/exec";

    }
    public function sendMail(Email $email){
        $recipient = $email->getTo();
        $subject = $email->getSubject();
        $body = $email->getBody();

        $ch = curl_init($this->url);
        curl_setopt_array($ch,[
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_POSTFIELDS=>http_build_query([
                "recipient"=>$recipient,
                "subject"=>$subject,
                "body"=>$body
            ])
        ]);
        $result = curl_exec($ch);
        return $result;
    }
}

