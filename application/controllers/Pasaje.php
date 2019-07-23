<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasaje extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function compraExitosa()
	{
	    $butacas =  $this->input->post('ButacasCompradas');
        print_r($butacas);
	    $butacas = json_decode($butacas);
        echo "<br>";

        print_r($butacas);

        $arrayPasajes = array();

        $x = 0;
	    foreach($butacas as $butaca){
            $this->load->model('Pasaje_model');
            $this->Pasaje_model->setIdViaje($butaca->idViaje);
            $this->Pasaje_model->setIdFrecuencia($butaca->idFrecuencia);
            $this->Pasaje_model->setIdUsuario($this->session->userdata('id'));
            $this->Pasaje_model->setPrecioPasaje($butaca->valorPasaje);
            $this->Pasaje_model->setNroButaca($butaca->butaca);
            $this->Pasaje_model->setFechaPasaje($butaca->fechaViaje);
            $this->Pasaje_model->setNombre($butaca->nombre);
            $this->Pasaje_model->setApellido($butaca->apellido);
            $this->Pasaje_model->setDniAsignado($butaca->dni);

            array_push($arrayPasajes,$this->Pasaje_model);

        }

        $this->load->model('Pasaje_model');
	    $this->Pasaje_model->AgregarPasaje($arrayPasajes);
	}



}

/* End of file Controllername.php */