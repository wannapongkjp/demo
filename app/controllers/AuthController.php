<?php

namespace App\Controller;

use App\Model\Users;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Confirmation;
use App\Forms\SignUpForm;
use App\Forms\LoginForm;

class AuthController extends \Phalcon\Mvc\Controller{
	public function initialize(){
		// add css
		$this->assets->addCss('css/base.min.css');
		$this->assets->addCss('css/auth.min.css');
		// add javascript
		$this->assets->addJs("js/base.min.js");
		$this->assets->addJs('js/auth.min.js');
	}
	public function indexAction(){
		$this->response->redirect("auth/login");
	}
	/*
	 * Sign In
	 */
	public function loginAction(){
		$email = $this->request->get("email");
		$password = $this->request->get("password");
		$messages = false;
		$form = new LoginForm();
		if($this->request->isPost()){
			if($form->isValid($this->request->getPost()) != false){
				$auth = $this->di->get("auth");
				$data = array(
					"email" => $email,
					"password" => $password 
				);
				$result = $auth->authenticate($data);
				if($result===true){
					$this->response->redirect("");
					$this->view->disable();
				}else{
					$messages .= $this->renderErrorMessage($result);
				}
			}
		}
		$this->view->title = "Login Form";
		$this->view->messages = $messages;
		$this->view->form = $form;
	}
	/*
	 * Sign Out
	 */
	public function logoutAction(){
		$this->session->destroy();
		$this->response->redirect("auth/login");
		$this->view->disable();
	}
	/*
	 * Sign Up
	 */
	public function registerAction(){
		$messages = false;
		$form = new SignUpForm();
		if($this->request->isPost()){
			if($form->isValid($this->request->getPost()) != false){
				$data = $this->request->getPost();
				$data["password"] = md5($data["password"]);
				$data["status"] = 1;
				$data["activate"] = 0;
				$data["token"] = md5(time());
				$user = new Users();
				if($user->save($data)){
					$this->sendActivationEmail($user);
					$this->response->redirect("auth/success");
					$this->view->disable();
				}else{
					$messages .= $this->renderErrorMessage($user->getMessages());
				}
			}
		}
		$this->view->title = "Register Form";
		$this->view->messages = $messages;
		$this->view->form = $form;
	}
	private function renderErrorMessage($messages){
		$html = '<div class="alert alert-danger">';
		if(is_string($messages)){
			$html .= $messages;
		}else{
			foreach($messages as $message){
				$html .= $message . "<br/>";
			}
		}
		$html .= '</div>';
		return $html;
	}
	public function successAction(){
		$this->view->title = "Register success!";
		$this->view->message = "Please verified your account <br/>
								by click verified link on your E-mail";
		$this->view->status = true;
	}
	private function sendActivationEmail($user){
		$mail = $this->di->get('mail');
		$mail->addAddress($user->email);
		$mail->Subject = 'Confirmation for Registration Account';
		$activate_link = 'http://' . $_SERVER['SERVER_NAME'] . $this->url->get('auth/activate/' . $user->token);
		$mail->Body = 'Your activate link is: <a href="' . $activate_link . '">Activate Account</a><br/>' . $activate_link;
		return $mail->send();
	}
	public function testMailAction(){
		$mail = $this->di->get('mail');
		$mail->addAddress("free_flash_design@hotmail.com");
		$mail->Subject = 'Confirmation for Registration Account';
		$activate_link = 'http://' . $_SERVER['SERVER_NAME'] . $this->url->get('auth/activate/123');
		$mail->Body = 'Your activate link is: <a href="' . $activate_link . '">Activate Account</a><br/>' . $activate_link;
		return $mail->send();
	}
	/*
	 * Forgot Password
	 */
	public function forgotAction(){
		if($this->request->isPost()){
			$this->response->redirect("auth/forgot/success");
			$this->view->disable();
		}
		$this->view->title = "Forgot Password";
	}
	public function forgotSuccessAction(){
		$this->view->title = "Forgot Success";
		$this->view->message = "Please verify New Token code for reset new password we have sent to your E-mail.";
	}
	/*
	 * Reset Password
	 */
	public function resetAction(){
		if($this->request->isPost()){
			$this->response->redirect("auth/reset/success");
			$this->view->disable();
		}
		$this->view->title = "Reset Password";
	}
	public function resetSuccessAction(){
		$this->view->title = "Reset Success";
		$this->view->message = "Reset password successfully.";
	}
	/*
	 * Activation
	 */
	public function activateAction(){
		$token = $this->dispatcher->getParam("token");
		$user = Users::findFirst(array(
			"token = '{$token}'" 
		));
		if($user){
			$user->token = "1";
			$user->activate = 1;
			if($user->save()){
				$this->view->message = "Activate completed";
				$this->view->status = true;
			}else{
				$this->view->message = "Can not save data!";
				$this->view->status = false;
			}
			$this->view->title = "Activate Account";
		}else{
			$this->view->title = "Activate Account";
			$this->view->message = "Activate fail!";
			$this->view->status = false;
		}
	}
}