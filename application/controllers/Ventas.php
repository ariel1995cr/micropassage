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
    
    function Comprar($fecha,$idViaje,$idFrecuencia){
        $data['datos'] = array(
            'fecha' => $fecha,
            'IdViaje' => $idViaje,
            'IdFrecuencia' => $idFrecuencia
        );


        $this->load->model('Viaje_model');

        $data['datosViaje'] = $this->Viaje_model->obtenerViaje($idViaje,$idFrecuencia);



        $this->load->view('venta/comprar.php', $data);

    }
    

}

/* End of file Controllername.php */