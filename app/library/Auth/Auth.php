<?php
namespace App\Library\Auth;

use App\Model\Users;
class Auth extends \Phalcon\Mvc\User\Component{
	private $di;
	private $user;
	public function __construct($di=NULL){
		$this->setDI($di);
	}
	public function getDI(){
		return $this->di;		
	}
	public function setDI($di){
		$this->di = $di;
	}
	public function isLogin() {
		return $this->di->get("session")->get("auth");
	}
	public function authenticate($data){
		$flash = $this->di->get("flash");
		$session = $this->di->get("session");
		$email = (isset($data["email"])?$data["email"]:"");
		$password = (isset($data["password"])?$data["password"]:"");
		$password = md5($password);
		
		$userData = Users::findFirst(" email='{$email}' AND password='{$password}' ");
		$result = false;
		$session->auth = false;
		$session->user = false;
		if(!empty($userData)){
			if($userData->activate==0){
				$result = "Please activate account before and login again.";
			}else if($userData->status==0){
				$result = "Your account has temporary access, please contact Administrator.";
			}else{
				$this->updateSession($userData);
				$result = true;
			}
		}else{
			$result = "Incorrect";
		}
		return $result;
	}
	public function getUser(){
		return $this->di->get("session")->get("user");
	}
	public function updateSession($data){
		$session = $this->di->get("session");
		$user = new \stdClass();
		$user->id = $data->id;
		$user->firstname = $data->firstname;
		$user->lastname = $data->lastname;
		$user->username = $data->username;
		$user->email = $data->email;
		//set session data
		$session->auth = true;
		$session->user = $user;
		$result = true;
	}
}