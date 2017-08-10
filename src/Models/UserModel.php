<?php
namespace App\Models;

use Framework\Core\Model;

class UserModel extends Model
{
	public $id = null;
	
	public $firstName;
	public $lastName;
	public $email;
	public $username;
	public $password;

	public $table = 'users';

	public function __construct()
	{}

	public function fetchAllRecords() 
	{
		return $this->fetchAll('users');
	}
}