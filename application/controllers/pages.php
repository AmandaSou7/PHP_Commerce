<?php 
class Pages extends CI_Controller {
	
	public function view ($page = 'home') {
		if (! file_exists('application/views/pages/'.$page.'.php')) {
			//404 Error Page
			show_404();
		}

		$data['title'] = ucfirst($page); //proper case

		//load static page views - ensure every page contains header and footer
		$this->load->view('template/header',$data);
		$this->load->view('pages/'.$page,$data);
		$this->load->view('template/footer');
	}
}
?>