<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas extends CI_Controller {

    public function __construct()
    {
    	parent::__construct();

    	//Do your magic here
    }

	public function index()
	{
	    $data = [];
        $this->load->model('Ciudad_model');

        $data['ciudades'] = $this->Ciudad_model->obtener_ciudades();


        $this->load->view('venta/index.php',$data);
    }
    
    function ElegirViaje(){
        $datosViaje = array(
            'fecha' => $this->input->get('fecha'),
            'hora' => $this->input->get('origen'),
            'origen' => $this->input->get('destino'),
            'destino' => $this->input->get('hora')
            );
        
        print_r($datosViaje);
        
    }
    

}

/* End of file Controllername.php */