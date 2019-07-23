<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function __construct()
    {
    	parent::__construct();
        $this->load->model('Usuario_model');

    	//Do your magic here
    }

	public function index()
	{
        $this->Usuario_model->setDni($this->session->userdata('Dni'));

        $data['usuario'] = $this->Usuario_model->obtenerDatosDni();


        $this->load->view('usuario/index', $data);
	}



}

?>
