<?php
namespace App\Controller;

use App\Model\Users;
class IndexController extends \Phalcon\Mvc\Controller{
	public function initialize(){
		// add css
		$this->assets->addCss('css/base.min.css');
		$this->assets->addCss('css/profile.min.css');
		// add javascript
		$this->assets->addJs("js/base.min.js");
		$this->assets->addJs('js/profile.min.js');
	}
	public function route404Action(){
		$this->view->title = "404 Not Found";
	}
	public function welcomeAction(){
		$auth = $this->di->get("auth");
		if(!$auth->isLogin()){
			$this->response->redirect("auth/login");
			$this->view->disable();
		}
		$user = Users::findFirst($auth->getUser()->id);
		$this->view->title = "eStudent";
		$this->view->user = $user;
	}
}