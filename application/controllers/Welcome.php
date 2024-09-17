<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->library('sharingclass');
		$pref_info = $this->sharingclass->pref_info();
		$school_info = $this->sharingclass->school_info();
		$field_info = $this->sharingclass->field_info();

		$this->load->view('common/header', array('page' => 'top', 'path' => ''));
		$this->load->view('welcome_message', array('path' => '', 'pref_info' => $pref_info, 'school_info' => $school_info, 'field_info' => $field_info));
		$this->load->view('common/footer', array('path' => ''));
	}
}
