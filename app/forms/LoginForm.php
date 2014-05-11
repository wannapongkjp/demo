<?php
namespace App\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Submit;
use Phalcon\Forms\Element\Check;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Identical;

class LoginForm extends Form
{

    public function initialize()
    {
        /*
		 * E-mail
		 */
		$email = new Text('email');
		$email->setLabel('อีเมล์ (E-mail)');
		$email->setAttribute("class", "form-control");
		$email->addValidators(array(
			new PresenceOf(array(
				'message' => 'E-mail is required' 
			))
		));
		$this->add($email);

        /*
		 * Password
		 */
		$password = new Password('password');
		$password->setLabel('รหัสผ่าน (Password)');
		$password->setAttribute("class", "form-control");
		$password->addValidators(array(
			new PresenceOf(array(
				'message' => 'The password is required' 
			))
		));
		$this->add($password);

        /* // Remember
        $remember = new Check('remember', array(
            'value' => 'yes'
        ));
        $remember->setLabel('Remember me');
        $this->add($remember); */

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
		 * Sign In button
		 */
		$this->add(new Submit('Sign In', array(
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
