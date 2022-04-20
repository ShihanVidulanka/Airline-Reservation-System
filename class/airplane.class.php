<?php
class AirPlane{
    private $id;
    private $tail_no;
    private $model;
    private $no_platinum_seats;
    private $no_economy_seats;
    private $no_business_seats;
    private $in_service;
    private $image;
    private $file_type;

	public function getId() {
		return $this->id;
	}
	

	public function setId($id){
		$this->id = $id;
	}
	

	public function getTail_no() {
		return $this->tail_no;
	}

	public function setTail_no($tail_no){
		$this->tail_no = $tail_no;
	}
	

	public function getModel() {
		return $this->model;
	}
	

	public function setModel($model){
		$this->model = $model;
	}
	

	public function getNo_platinum_seats() {
		return $this->no_platinum_seats;
	}
	

	public function setNo_platinum_seats($no_platinum_seats){
		$this->no_platinum_seats = $no_platinum_seats;
	}
	

	public function getNo_economy_seats() {
		return $this->no_economy_seats;
	}
	

	public function setNo_economy_seats($no_economy_seats){
		$this->no_economy_seats = $no_economy_seats;
	}
	

	public function getNo_business_seats() {
		return $this->no_business_seats;
	}
	

	public function setNo_business_seats($no_business_seats){
		$this->no_business_seats = $no_business_seats;
	}
	

	public function getIn_service() {
		return $this->in_service;
	}
	

	public function setIn_service($in_service){
		$this->in_service = $in_service;
	}
	

	public function getImage() {
		return $this->image;
	}

	public function setImage($image){
		$this->image = $image;
	}
	

	public function getFile_type() {
		return $this->file_type;
	}
	

	public function setFile_type($file_type){
		$this->file_type = $file_type;
	}
}