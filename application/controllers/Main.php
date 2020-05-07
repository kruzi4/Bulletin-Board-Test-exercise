<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('ads_model');
	}

	public function index() {
		$this->data['title'] = "Главная страница";
		$this->data['ads'] = $this->ads_model->getAds();

		$this->load->view('templates/header', $this->data);
		$this->load->view('main/index', $this->data);
		$this->load->view('templates/footer');
	}
}
