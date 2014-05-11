<?php

namespace App\Model;

class AccountType extends \Phalcon\Mvc\Model{
	
	/**
	 *
	 * @var integer
	 */
	public $id;

	/**
	 *
	 * @var string
	 */
	public $name;
	
	/**
	 *
	 * @var integer
	 */
	public $status;

	public function initialize(){
		$this->setSource("account_type");
	}

	/**
	 * Independent Column Mapping.
	 */
	public function columnMap(){
		return array(
			'id' => 'id',
			'name' => 'name',
			'status' => 'status' 
		);
	}
}
