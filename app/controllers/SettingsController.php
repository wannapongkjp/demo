<?php

namespace App\Controller;

use App\Model\Users;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Confirmation;

class SettingsController extends \Phalcon\Mvc\Controller{
	private $auth;
	public function initialize(){
		$this->auth = $this->di->get("auth");
		// add css
		$this->assets->addCss('css/base.min.css');
		$this->assets->addCss('css/settings.min.css');
		// add javascript
		$this->assets->addJs("js/base.min.js");
		$this->assets->addJs('js/settings.min.js');
	}
	public function indexAction(){
		if(!$this->auth->isLogin()){
			$this->response->redirect("auth/login");
			$this->view->disable();
		}else{
			$this->response->redirect("settings/profile");
			$this->view->disable();
		}
	}
	
	/*
	 * Profile
	 */
	public function profileAction(){
		$this->hasLogin();
		if($this->request->isPost()){
			if($this->security->checkToken()){
				$messages = $this->validateProfileData();
				if($messages===true){
					$data = $this->request->getPost();
					$user = Users::findFirst($data["id"]);
					if($user){
						if($user->save($data)){
							$this->auth->updateSession($user);
							$messages = "บันทึกข้อมูลเรียบร้อย.";
						}else{
							$messages = "บันทึกข้อมูลไม่สำเร็จ กรุณาลองใหม่อีกครั้ง.";
						}
					}else{
						echo "Incorrect User Account!";
						$this->view->disable();
					}
				}else{
					$messages = $this->renderErrorMessage($messages);
				}
			}else{
				echo "Invalid Token!";
				$this->view->disable();
			}
		}
		// Render view data
		$this->renderView(array(
			"title" => "Settings - profile",
			"messages" => $messages
		));
	}
	private function validateProfileData(){
		$validation = new \Phalcon\Validation();
		
		// Set Validation Rules
		$validation->add('firstname', new PresenceOf(array(
			'message' => 'The firstname is required' 
		)));
		$validation->add('lastname', new PresenceOf(array(
			'message' => 'The lastname is required' 
		)));
		
		// Filter any extra space
		$validation->setFilters('firstname', 'trim');
		$validation->setFilters('lastname', 'trim');
		
		// Run validation data
		$messages = $validation->validate($this->request->getPost());
		if(count($messages)){
			return $messages;
		}
		return true;
	}
	
	/*
	 * Account
	 */
	public function accountAction(){
		$this->hasLogin();
		if($this->request->isPost()){
			if($this->security->checkToken()){
				$messages = $this->validateAccountData();
				if($messages===true){
					$data = $this->request->getPost();
					$user = Users::findFirst($data["id"]);
					if($user){
						if($user->save($data)){
							$this->auth->updateSession($user);
							$messages = "บันทึกข้อมูลเรียบร้อย.";
						}else{
							$messages = "บันทึกข้อมูลไม่สำเร็จ กรุณาลองใหม่อีกครั้ง.";
						}
					}else{
						echo "Incorrect User Account!";
						$this->view->disable();
					}
				}else{
					$messages = $this->renderErrorMessage($messages);
				}
			}else{
				echo "Invalid Token!";
				$this->view->disable();
			}
		}
		// Render view data
		$this->renderView(array(
			"title" => "Settings - account",
			"messages" => $messages
		));
	}
	private function validateAccountData(){
		$validation = new \Phalcon\Validation();
		
		// Set Validation Rules
		$validation->add('username', new PresenceOf(array(
			'message' => 'The username is required' 
		)));
		$validation->add('email', new PresenceOf(array(
			'message' => 'The email is required' 
		)));
		$validation->add('email', new Email(array(
			'message' => 'The e-mail is not valid' 
		)));
		
		// Filter any extra space
		$validation->setFilters('username', 'trim');
		$validation->setFilters('email', 'trim');
		
		// Run validation data
		$messages = $validation->validate($this->request->getPost());
		if(count($messages)){
			return $messages;
		}
		return true;
	}
	
	/*
	 * Password
	 */
	public function passwordAction(){
		// Allow login access only
		$this->hasLogin();
		if($this->request->isPost()){
			if($this->security->checkToken()){
				// Validation data
				$messages = $this->validatePasswordData();
				if($messages===true){
					$data = $this->request->getPost();
					$user = Users::findFirst($data["id"]);
					// Check old password
					$old_password = md5($data["old_password"]);
					$new_password = md5($data["new_password"]);
					if($user){
						if($user->password == $old_password){
							$passwordData = array(
								"password" => $new_password 
							);
							// Store data
							if($user->save($passwordData)){
								$messages = "บันทึกข้อมูลเรียบร้อย.";
							}else{
								$messages = "บันทึกข้อมูลไม่สำเร็จ กรุณาลองใหม่อีกครั้ง.";
							}
						}else{
							$messages = "รหัสผ่านเดิมไม่ถูกต้อง";
						}
					}else{
						echo "Incorrect User Account!";
						$this->view->disable();
					}
				}else{
					$messages = $this->renderErrorMessage($messages);
				}
			}else{
				echo "Invalid Token!";
				$this->view->disable();
			}
		}
		// Render view data
		$this->renderView(array(
			"title" => "Settings - password",
			"messages" => $messages
		));
	}
	private function validatePasswordData(){
		$validation = new \Phalcon\Validation();
		
		// Set Validation Rules
		$validation->add('old_password', new PresenceOf(array(
			'message' => 'The old_password is required' 
		)));
		$validation->add('new_password', new PresenceOf(array(
			'message' => 'The new_password is required' 
		)));
		$validation->add('confirm_new_password', new PresenceOf(array(
			'message' => 'The confirm_new_password is required' 
		)));
		$validation->add('new_password', new Confirmation(array(
			'message' => 'new_password doesn\'t match confirmation',
			'with' => 'confirm_new_password' 
		)));
		
		// Filter any extra space
		$validation->setFilters('old_password', 'trim');
		$validation->setFilters('new_password', 'trim');
		$validation->setFilters('confirm_new_password', 'trim');
		
		// Run validation data
		$messages = $validation->validate($this->request->getPost());
		if(count($messages)){
			return $messages;
		}
		return true;
	}
	
	/*
	 * Common
	 */
	private function renderView($data){
		$user = Users::findFirst($this->auth->getUser()->id);
		$this->view->title = $data["title"];
		$this->view->user = $user;
		$this->view->messages = $data["messages"];
	}
	private function hasLogin(){
		$auth = $this->di->get("auth");
		if(!$auth->isLogin()){
			$this->response->redirect("auth/login");
			$this->view->disable();
		}
	}
	private function renderErrorMessage($messages){
		$html = '<div class="alert alert-danger">';
		if(is_string($messages)){
			$html .= $messages;
		}else{
			foreach($messages as $message){
				var_dump($message->getMessage());
				$html .= $message->getMessage() . "<br/>";
			}
		}
		$html .= '</div>';
		return $html;
	}
}