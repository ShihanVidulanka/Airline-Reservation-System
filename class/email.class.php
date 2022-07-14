<?php
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/additional.inc.php";
require_once $_SERVER['DOCUMENT_ROOT']."/Airline-Reservation-System/include/autoloader.inc.php";

class Email{
    private $to;
    private $subject;
    private $body;
    private $senderName;
    private $recipientName;


    public function getSenderName(){return $this->senderName;}
    public function setSenderName($senderName){$this->senderName = $senderName;}
    public function getRecipientName(){return $this->recipientName;}
    public function setRecipientName($recipientName){$this->recipientName = $recipientName;}

    public function getTo(){return $this->to;}
    public function getSubject(){return $this->subject;}
    public function getBody(){return $this->body;}

    public function __construct($to,$subject,$body)
    {
        $this->to = $to;
        $this->subject = $subject;
        $this->body = $body;
        $this->senderName = "";
        $this->recipientName = "";
    }


}
