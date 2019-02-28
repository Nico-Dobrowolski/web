<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class WeatherNews_controller extends CI_controller
{

	function __construct()
    {
        parent::__construct();
        $this->load->model('Data_Model');
  			$this->load->helper(array('form','url'));
    }

	// PROJET METEO NEWS
    function index(){
	    //------------Give lieu and maybe units later -------
	  	$data['object_weather'] = $this->Data_Model->get_json_weather();
	  	$data['object_news'] = $this->Data_Model->send_data_country_news();
	    $this->load->view('vue_page_dashbord',$data);
	    //---------------------------------------------
    }
    function fullweather(){
    	$data['object_weather'] = $this->Data_Model->get_json_weather();
	    $this->load->view('vue_page_fullweather',$data);
    }

    function editlieu(){

    $this->form_validation->set_rules('lieu', 'lieu', 'required');
		if ($this->form_validation->run() == FALSE)
    {
			// fails
			$this->load->view('vue_page_dashbord');
			$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Veuillez saisir une ville avant de faire une recherche</div>');
				redirect('index.php/WeatherNews_controller/index');
    }
		else
		{
			//insert user details into cokkie
			$lieu = $this->input->post("lieu");
			$this->Data_Model->set_data_city_cookie($lieu);
			$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Votre ville a bien été saisie </div>');
			redirect('index.php/WeatherNews_controller/index');
		}

		
		}

	
    	//$this->input->set_cookie($cookie);
    	//$this->Data_Model->set_data_city($lieu);
    	




}
