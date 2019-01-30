<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Energie extends CI_controller
{

	function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
  		$this->load->helper(array('form','url'));
    }

	// PROJET METEO NEWS
    function index(){
	    //$this->uri->slash_segment(3);
	    //$data =  $this->User_model->get();
		//$this->load->model('User_model');
	    //$data['weather'] = $this->User_model->city();

	    //------------Give lieu and maybe units later -------
	  	$data['object_weather'] = $this->User_model->get_json_weather();
	  	$data['object_news'] = $this->User_model->send_data_country_news();
	    $this->load->view('vue_page_dashbord',$data);
	    //---------------------------------------------
	   
	    //$this->load->view('vue_page_dashbord');
    }
    function fullweather(){

    	$data['object_weather'] = $this->User_model->get_json_weather();
	    $this->load->view('vue_page_fullweather',$data);


    }

    function editlieu(){

    	$this->form_validation->set_rules('lieu', 'lieu', 'required');


		if ($this->form_validation->run() == FALSE)
        {
			// fails
			$this->load->view('vue_page_dashbord');
			$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Veuillez saisir une ville avant de faire une recherche</div>');
			
				redirect('index.php/Energie/index');
        }
		else
		{
			//insert user details into db
		
		$lieu = $this->input->post("lieu");
		$this->User_model->set_data_city_cookie($lieu);

		
		
		$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Votre ville a bien été saisie </div>');
		
		redirect('index.php/Energie/index');
		}

		
		}

	
    	//$this->input->set_cookie($cookie);
    	//$this->User_model->set_data_city($lieu);
    	




}
