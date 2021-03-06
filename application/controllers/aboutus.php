<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aboutus extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('view_helper');
        $this->load->helper('language');        
        $this->load->helper('url');
        $this->lang->load('common');
    }
    
    public function index() {
       
        $head_params = array(
            'title' => 'About Us | Grab Talent',
            'description' => "Grab Talent is the best online recruitment portal",
            'keywords' => 'jobs singapore, recruitment agency, GT, Grab Talent',
        );
        
        $template["head"] = $this->load->view('common/head', $head_params, true);
        $template["header"] = $this->load->view('common/header', null, true);
        $template["contents"] = $this->load->view('aboutus/index', null, true);
        $template["footer"] = $this->load->view('common/footer', null, true);
        $this->load->view('common/layout', $template);
        
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */