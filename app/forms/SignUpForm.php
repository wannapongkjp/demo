<?php

namespace App\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Submit;
use Phalcon\Forms\Element\Check;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Identical;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Confirmation;
use Phalcon\Forms\Element\Radio;
use Phalcon\Forms\Element\Select;
use App\Model\Sex;
use App\Model\AccountType;

class SignUpForm extends Form{
	public function initialize($entity = null, $options = null){
		/*
		 * Account Type
		 */
		$sex = new Select('account_type');
		$sex->setLabel('คุณคือ (Account Type)');
		$sex->setOptions(AccountType::find('status = 1'));
		$sex->setAttributes(array(
			'using' => array(
				'id',
				'name' 
			),
			'useEmpty' => false,
			'class' => 'form-control' 
		));
		$this->add($sex);
		
		/*
		 * Firstname
		 */
		$firstname = new Text('firstname');
		$firstname->setLabel('ชื่อ (Firstname)');
		$firstname->setAttribute("class", "form-control");
		$firstname->addValidators(array(
			new PresenceOf(array(
				'message' => 'Firstname is required' 
			)) 
		));
		$this->add($firstname);
		
		/*
		 * Lastname
		 */
		$lastname = new Text('lastname');
		$lastname->setLabel('นามสกุล (Lastname)');
		$lastname->setAttribute("class", "form-control");
		$lastname->addValidators(array(
			new PresenceOf(array(
				'message' => 'Lastname is required' 
			)) 
		));
		$this->add($lastname);
		
		/*
		 * Sex
		 */
		$sex = new Select('sex');
		$sex->setLabel('เพศ (Sex)');
		$sex->setOptions(Sex::find('status = 1'));
		$sex->setAttributes(array(
			'using' => array(
				'id',
				'name' 
			),
			'useEmpty' => true,
			'emptyText' => '== Please choose your Gender. ==',
			'emptyValue' => '',
			'class' => 'form-control' 
		));
		$this->add($sex);
		
		/*
		 * Username
		 */
		$username = new Text('username');
		$username->setLabel('ชื่อบัญชีผู้ใช้ (Username)');
		$username->setAttribute("class", "form-control");
		$username->addValidators(array(
			new PresenceOf(array(
				'message' => 'Username is required' 
			)) 
		));
		$this->add($username);
		
		/*
		 * E-mail
		 */
		$email = new Text('email');
		$email->setLabel('อีเมล์ (E-mail)');
		$email->setAttribute("class", "form-control");
		$email->addValidators(array(
			new PresenceOf(array(
				'message' => 'E-mail is required' 
			)),
			new Email(array(
				'message' => 'E-mail is not valid' 
			)) 
		));
		$this->add($email);
		
		/*
		 * Password
		 */
		$password = new Password('password');
		$password->setLabel('Password');
		$password->setAttribute("class", "form-control");
		$password->addValidators(array(
			new PresenceOf(array(
				'message' => 'The password is required' 
			)),
			new StringLength(array(
				'min' => 8,
				'messageMinimum' => 'Password is too short. Minimum 8 characters' 
			))
		));
		$this->add($password);
		
		/*
		 * Confirm Password
		 */
		$confirmPassword = new Password('confirm_password');
		$confirmPassword->setLabel('ยืนยันรหัสผ่าน (Confirm-Password)');
		$confirmPassword->setAttribute("class", "form-control");
		$confirmPassword->addValidators(array(
			new PresenceOf(array(
				'message' => 'The confirmation password is required' 
			)),
			new Confirmation(array(
				'message' => 'Password doesn\'t match confirmation',
				'with' => 'password'
			))
		));
		$this->add($confirmPassword);
		
		/*
		 * TOS
		 */
		$terms = new Check('terms', array(
			'value' => 'yes' 
		));
		$terms->setLabel('Accept terms and conditions');
		$terms->addValidator(new Identical(array(
			'value' => 'yes',
			'message' => 'Terms and conditions must be accepted' 
		)));
		$this->add($terms);
		
		/*
		 * CSRF
		 */
		$csrf = new Hidden('csrf');
		$csrf->addValidator(new Identical(array(
			'value' => $this->security->getSessionToken(),
			'message' => 'CSRF validation failed' 
		)));
		$this->add($csrf);
		
		/*
		 * Sign Up button
		 */
		$this->add(new Submit('Sign Up', array(
			'class' => 'btn btn-lg btn-primary btn-block' 
		)));
	}
	
	/**
	 * Prints messages for a specific element
	 */
	public function messages($name){
		if($this->hasMessagesFor($name)){
			foreach($this->getMessagesFor($name) as $message){
				$this->flash->error($message);
			}
		}
	}
}
