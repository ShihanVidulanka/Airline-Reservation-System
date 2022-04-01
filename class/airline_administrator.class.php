<?php


    class Airline_Administrator{
        private $account_no;
        private $user_id;
        private $user_name;
        private $name;
        private $telephone_no;


        public function __construct($account_no,$user_id,$user_name,$name,$telephone_no)
        {
            $this->setAccount_no($account_no);
            $this->setUser_id($user_id);
            $this->setUser_name($user_name);
            $this->setName($name);
            $this->setTelephone_no($telephone_no);
        }
        //getters
        public function getAccount_no()
        {
                return $this->account_no;
        }
        public function getUser_id()
        {
                return $this->user_id;
        } 
        public function getUser_name()
        {
                return $this->user_name;
        }
        public function getName()
        {
                return $this->name;
        } 
        public function getTelephone_no()
        {
                return $this->telephone_no;
        }
        
        // setters
        public function setAccount_no($account_no)
        {
                $this->account_no = $account_no;

                return $this;
        }
        public function setUser_id($user_id)
        {
                $this->user_id = $user_id;

                return $this;
        } 
        public function setUser_name($user_name)
        {
                $this->user_name = $user_name;

                return $this;
        } 
        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }
        public function setTelephone_no($telephone_no)
        {
                $this->telephone_no = $telephone_no;

                return $this;
        }
    }
