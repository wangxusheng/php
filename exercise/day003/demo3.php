<?php
class Person{
	private $name;
	private $sex;
	public function setName($name){
		$this->name = $name;
	}
	public function getName(){
		return $this->name;
	}
	public function setSex($sex){
		if($sex=="男" || $sex=="女"){
			$this->sex=$sex;
		}
	}
	public function getSex(){
		return $this->sex;
	}
}	
