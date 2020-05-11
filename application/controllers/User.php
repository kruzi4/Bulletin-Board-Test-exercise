<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
	}

	public function dashboard() {
		$this->data['title'] = "Личный кабинет";
		$this->data['isLogged'] = $this->user_model->isLogged();

		if(!$this->user_model->isLogged())
			header('Location: /');

		$id = $this->user_model->getUser()['id'];

		$firstname = $this->input->post('firstname');
		if( $firstname ) {
			$this->user_model->setUserName( $firstname );
		}

		$email = $this->input->post('email');
		if( $email && !$this->user_model->emailExists($email) ) {
			$this->user_model->setUserEmail( $email );
		}

		$pass = $this->input->post('pass');
		$old_pass = $this->input->post('old-pass');
		if( $pass ) {
			$this->user_model->setUserPassword( $id , $old_pass , $pass );
		}

		if($this->input->post('logout')) {
			$this->user_model->LogOut();
			header('Location: /');
		}

		$this->data['user'] = $this->user_model->getUser();

		$this->load->view('templates/header', $this->data);
		$this->load->view('user/dashboard', $this->data);
		$this->load->view('templates/footer');
	}

	public function login() {
		$user = $this->user_model;

		if($user->isLogged())
			header('Location: /');

		$email = $this->input->post('email');
		$pass = $this->input->post('password');

		$this->data = [
			'title' => 'Авторизация',
			'isLogged' => $user->isLogged(),
			'err' => '',
			'input_email' => $email,
			'input_pass' => $pass
		];

		if($email) {
			if($user->checkAuthData($email, $pass) === true) {
				header('Location: /user/dashboard');
			}else{
				$this->data['err'] = $user->checkAuthData($email, $pass);
			}
		}

		$this->load->view('templates/header', $this->data);
		$this->load->view('user/login', $this->data);
		$this->load->view('templates/footer');
	}

	public function register() {
		$user = $this->user_model;

		$first = $this->input->post('firstname');
		$second = $this->input->post('secondname');
		$email = $this->input->post('email');
		$pass = $this->input->post('pass');

		if($first) {
			$user->checkRegData($first, $second, $email, $pass);
		}

		$this->data = [
			'title' => 'Регистрация',
			'isLogged' => $user->isLogged(),
			'err' => $user->checkRegData($first, $second, $email, $pass),
			'inputFirst' => $first,
			'inputSecond' => $second,
			'inputEmail' => $email,
			'inputPass' => $pass
		];

		if($user->isLogged())
			header('Location: /');

		$this->load->view('templates/header', $this->data);
		$this->load->view('user/register');
		$this->load->view('templates/footer');
	}
}
