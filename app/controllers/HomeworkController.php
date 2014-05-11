<?php

namespace App\Controller;

use App\Model\Users;

class HomeworkController extends \Phalcon\Mvc\Controller{
	public function initialize(){
		// add css
		$this->assets->addCss('css/base.min.css');
		$this->assets->addCss('css/homework.min.css');
		// add javascript
		$this->assets->addJs("js/base.min.js");
		$this->assets->addJs('js/homework.min.js');
	}
	public function indexAction(){
		$auth = $this->di->get("auth");
		if(!$auth->isLogin()){
			$this->response->redirect("auth/login");
			$this->view->disable();
		}
		$user = Users::findFirst($auth->getUser()->id);
		$this->view->title = "Homework";
		$this->view->user = $user;
	}
}