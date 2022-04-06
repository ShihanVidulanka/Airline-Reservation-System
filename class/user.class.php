<?php
class User{
    // private $id;
    private $username;
    private $password;
    private $email;
    private $account_type;


	public function getId(){return $this->id;}
    public function getUsername(){return $this->username;}
    public function getPassword(){return $this->password;}
	public function getEmail(){return $this->email;}
	public function getAccount_type(){return $this->account_type;}


	
	public function setId($id){$this->id = $id;}
	public function setUsername($username){$this->username = $username;}
	public function setPassword($password){$this->password = $password;}
	public function setEmail($email){$this->email = $email;}
	public function setAccount_type($account_type){$this->account_type = $account_type;}
}