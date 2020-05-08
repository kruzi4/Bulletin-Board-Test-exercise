<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
	}

	public function dashboard() {
		// if(!is_user()) {
		// 	$this->load->helper('url-helper');
		// 	redirect('/user/login', 'location');
		// }
		$this->data['title'] = "Личный кабинет";

		if($this->input->post('logout')) {
			$this->user_model->LogOut();
			header('Location: /');
		}

		$this->load->view('templates/header', $this->data);
		$this->load->view('user/dashboard');
		$this->load->view('templates/footer');
	}

	public function login() {
		$this->data['title'] = "Авторизация";

		if($this->user_model->isLogged())
			header('Location: /');

		$email = $this->input->post('email');
		$pass = $this->input->post('password');

		if($email) {
			if($this->user_model->checkAuthData($email, $pass) === true) {
				header('Location: /');
			}else{
				$this->data['err'] = $this->user_model->checkAuthData($email, $pass);
			}
		}

		$this->load->view('templates/header', $this->data);
		$this->load->view('user/login', $this->data);
		$this->load->view('templates/footer');
	}

	public function register() {
		$this->data['title'] = "Регистрация";

		if($this->user_model->isLogged())
			header('Location: /');

		$first = $this->input->post('firstname');
		$second = $this->input->post('secondname');
		$email = $this->input->post('email');
		$pass = $this->input->post('pass');

		if($first && $second && $email && $pass ) {
			$this->user_model->setData($first, $second, $email, $pass);
			$this->user_model->setAuth($email);
    	header('Location: /user/dashboard');
		}

		$this->load->view('templates/header', $this->data);
		$this->load->view('user/register');
		$this->load->view('templates/footer');
	}
}
