<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('ads_model');
		$this->load->model('user_model');
	}

	public function index() {
		$this->data['title'] = "Главная страница";
		$this->data['ads'] = $this->ads_model->getAds();

		if($this->input->post('title') && $this->input->post('text')) {
			$title = $this->input->post('title');
			$text = $this->input->post('text');
			$user = $this->user_model->getUser()['firstname'];
			$user .= " ".$this->user_model->getUser()['secondname'];

			if($this->ads_model->setAds($title, $text, $user)) {
				header('Location: /');
			}

		}

		$this->load->view('templates/header', $this->data);
		$this->load->view('main/index', $this->data);
		$this->load->view('templates/footer');
	}
}
