<?php
class News extends CI_Controller {
	public function __construct () {
		parent::__construct();
		$this->load->model('news_model');
	}

	public function index () {
		$data['news'] = $this->news_model->get_news();
		$data['title'] = "News archive";

		$this->load->view('template/header', $data);	//header needs title
		$this->load->view('news/index', $data);
		$this->load->view('template/footer');
	}

	public function view ($slug) {
		$data['news_item'] = $this->news_model->get_news($slug);

		if (empty($data['news_item'])) {
			show_404();
		}

		$data['title'] = $data['news_item']['title'];

		$this->load->view('template/header', $data);
		$this->load->view('news/view', $data);
		$this->load->view('template/footer', $data);
	}

	public function create () {
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Create a news form';

		//form_validation library
		$this->form_validation->set_rules('title', 'Title', 'required');	//set_rules(input_field_name, error_name, rule)
		$this->form_validation->set_rules('text', 'text', 'required');

		if ($this->form_validation->run() === FALSE) {	//form data failed validation
			$this->load->view('template/header', $data);
			$this->load->view('news/create', $data);
			$this->load->view('template/footer');
		}
		else {
			$this->news_model->set_news();
			$this->load->view('news/success');
		}
	}
}
?>