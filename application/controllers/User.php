<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->data['title'] = "Личный кабинет";

		$this->load->view('templates/header', $this->data);
		$this->load->view('user/dashboard');
		$this->load->view('templates/footer');
	}

	public function dashboard() {
		$this->data['title'] = "Личный кабинет";

		$this->load->view('templates/header', $this->data);
		$this->load->view('user/dashboard');
		$this->load->view('templates/footer');
	}
}
