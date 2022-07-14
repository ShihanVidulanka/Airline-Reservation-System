<?php
class Email_Api{

    private $url;
    public function __construct()
    {
        $airline_administrator_settings_controller = new Airline_Administrator_Settings_Controller();
        $settings=$airline_administrator_settings_controller->getSettingsDetails();
        $this->url = $settings['url'];

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

