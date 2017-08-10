<?php
namespace App\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Framework\Core\Controller;
use Framework\Core\Model;
use App\Models\UserModel;

class UserController extends Controller {

	public function __construct(Model $model) 
	{
        parent::__construct($model);
    }

	public function index() 
	{
		session_start();
		$model = new UserModel;
		$users = $model->fetchAllRecords();
		$this->view->render("users/index", $users);
		unset($_SESSION['message']);
	}

	public function create() 
	{
		session_start();
		$this->view->render("users/create");
		unset($_SESSION['message']);
	}

	public function store() 
	{
		session_start();
		$user = new UserModel;
        $user->firstName = $_POST['firstName'];
        $user->lastName = $_POST['lastName'];
        $user->email = $_POST['email'];
        $user->username = $_POST['username'];
        $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $id = $user->save();
        if($id>0) {
        	$_SESSION['message'] = 'User created sussessfully.';
        	echo json_encode(['success' => $_SESSION['message']]);
        } else {
        	echo json_encode(['failure' => 'Action failied: this email is taken.']);
        }
		// header ("Location: /user/create");

	}

	public function edit(int $id) 
	{
		session_start();
		$user = new UserModel;
		$contact = $user->fetchOne($id);
		$this->view->render("users/edit", $contact);
		unset($_SESSION['message']);
	}

	public function update() 
	{
		session_start();
		$user = new UserModel;
        $user->firstName = $_POST['firstName'];
        $user->lastName = $_POST['lastName'];
        $user->email = $_POST['email'];
        $user->username = $_POST['username'];
        $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user->id = $_POST['id'];
        $id = $user->update();

        if($id>0) {
        	$_SESSION['message'] = 'User updated sussessfully.';
        	echo json_encode(['success' => $_SESSION['message']]);
        } else {
        	echo json_encode(['failure' => 'Action failied: check you info and update again.']);
        }
	}

	public function delete(int $id) 
	{
		session_start();
		$model = new UserModel;
		$id = $model->delete($id);
		$users = $model->fetchAllRecords();
		// $this->view->render("users/index", $users);
		if($id > 0) {
			$_SESSION['message'] = 'User deleted successfully.';
			header ("Location: /user/index");
		}
	}




































	public function show() 
	{
		$contact = ['id'=>'1', 'firstName'=>'First Name', 'lastName' => 'Last Name', 'email' => 'Email'];
		$this->view->render("users/show", $contact);
	}



	
}