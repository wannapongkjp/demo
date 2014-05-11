<?php

namespace App\Model;

use Phalcon\Mvc\Model\Validator\Email as Email;
use Phalcon\Mvc\Model\Validator\Uniqueness;

class Users extends \Phalcon\Mvc\Model{
	
	/**
	 *
	 * @var integer
	 */
	public $id;
	
	/**
	 *
	 * @var integer
	 */
	public $account_type;
	
	/**
	 *
	 * @var integer
	 */
	public $sex;
	
	/**
	 *
	 * @var string
	 */
	public $token;
	
	/**
	 *
	 * @var string
	 */
	public $firstname;
	
	/**
	 *
	 * @var string
	 */
	public $lastname;
	
	/**
	 *
	 * @var string
	 */
	public $username;
	
	/**
	 *
	 * @var string
	 */
	public $email;
	
	/**
	 *
	 * @var string
	 */
	public $password;
	
	/**
	 *
	 * @var integer
	 */
	public $activate;
	
	/**
	 *
	 * @var integer
	 */
	public $status;
	
	/**
	 *
	 * @var integer
	 */
	public $guest;
	public function initialize(){
		$this->setSource("users");
		$this->belongsTo('sex', 'App\Model\Sex', 'id', array(
				'alias' => 'sex',
				'reusable' => true
		));
	}
        
	public function validation(){
		$this->validate(new Email(array(
			'field' => 'email',
			'required' => true 
		)));
		$this->validate(new Uniqueness(array(
			'field' => 'email',
			'message' => "The E-mail is already registered!" 
		)));
		$this->validate(new Uniqueness(array(
			'field' => 'username',
			'message' => "The Username is already registered!" 
		)));
		if($this->validationHasFailed() == true){
			$flash = $this->getDI()->get("flash");
			$messages = $this->getMessages();
			$error = "";
			foreach($messages as $message){
				$error .= $message . "<br/>";
			}
			$flash->error($error);
			return false;
		}
	}
	
	/**
	 * Independent Column Mapping.
	 */
	public function columnMap(){
		return array(
			'id' => 'id',
			'account_type' => 'account_type',
			'sex' => 'sex',
			'firstname' => 'firstname',
			'lastname' => 'lastname',
			'username' => 'username',
			'email' => 'email',
			'password' => 'password',
			'token' => 'token',
			'activate' => 'activate',
			'status' => 'status' 
		);
	}
}
