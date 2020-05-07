<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function dashboard() {
		// if(!is_user()) {
		// 	$this->load->helper('url-helper');
		// 	redirect('/user/login', 'location');
		// }
		$this->data['title'] = "Личный кабинет";

		$this->load->view('templates/header', $this->data);
		$this->load->view('user/dashboard');
		$this->load->view('templates/footer');
	}

	public function login() {
		$this->data['title'] = "Авторизация";

		$this->load->view('templates/header', $this->data);
		$this->load->view('user/login');
		$this->load->view('templates/footer');
	}

	public function register() {
		$this->data['title'] = "Регистрация";

		$this->load->view('templates/header', $this->data);
		$this->load->view('user/register');
		$this->load->view('templates/footer');
	}
}
