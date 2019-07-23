<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasaje extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('id')){
            redirect(index.php/Login);
        }
    }

    public function compraExitosa()
	{
        $this->load->model('Pasaje_model');

        $butacas =  $this->input->post('ButacasCompradas');
        print_r($butacas);
        $butacas = json_decode($butacas);
        echo "<br>";

        print_r($butacas);

        $arrayPasajes = array();
        $x = 0;
        foreach($butacas as $butaca){
            if($butaca->metodoPago=="Tarjeta"){

                 $pasaje = new $this->Pasaje_model;
                 $pasaje->setIdViaje($butaca->idViaje);
                 $pasaje->setIdFrecuencia($butaca->idFrecuencia);
                 $pasaje->setIdUsuario($this->session->userdata('id'));
                 $pasaje->setPrecioPasaje($butaca->valorPasaje);
                 $pasaje->setNroButaca($butaca->butaca);
                 $pasaje->setFechaPasaje($butaca->fechaViaje);
                 $pasaje->setNombre($butaca->nombre);
                 $pasaje->setApellido($butaca->apellido);
                 $pasaje->setDniAsignado($butaca->dni);
                if($this->$this->session->userdata('pasajeroFrecuente')=="SI"){
                    if ($butaca->tipoAsiento="promocional"){
                         $pasaje->setKmacumulados($butaca->valorPasaje+($butaca->valorPasaje*0.05));
                    }else if($butaca->tipoAsiento="ejecutivo"){
                         $pasaje->setKmacumulados($butaca->valorPasaje+($butaca->valorPasaje*0.50));
                    }else{
                         $pasaje->setKmacumulados($butaca->valorPasaje+($butaca->valorPasaje*0.25));
                    }
                }else {
                     $pasaje->setKmacumulados(0);
                }
                $pasaje->setMetodopago("Tarjeta");
                array_push($arrayPasajes,$pasaje);

            }else {
                $pasaje = new $this->Pasaje_model;
                $pasaje->setIdViaje($butaca->idViaje);
                $pasaje->setIdFrecuencia($butaca->idFrecuencia);
                $pasaje->setIdUsuario($this->session->userdata('id'));
                $pasaje->setPrecioPasaje($butaca->valorPasaje);
                $pasaje->setNroButaca($butaca->butaca);
                $pasaje->setFechaPasaje($butaca->fechaViaje);
                $pasaje->setNombre($butaca->nombre);
                $pasaje->setApellido($butaca->apellido);
                $pasaje->setDniAsignado($butaca->dni);
                $pasaje->setKmacumulados($butaca->valorPasaje*-2.5);
                $pasaje->setMetodopago("Puntos");

                array_push($arrayPasajes,$pasaje);
            }

        }

        $this->load->model('Pasaje_model');
        $this->Pasaje_model->AgregarPasaje($arrayPasajes);

	}

    public function compraExitosaPuntos()
    {
        $butacas =  $this->input->post('ButacasCompradas');
        print_r($butacas);
        $butacas = json_decode($butacas);
        echo "<br>";

        print_r($butacas);

        $arrayPasajes = array();
        $this->load->model('Pasaje_model');

        $x = 0;
        foreach($butacas as $butaca){
            $pasaje = new $this->Pasaje_model;
            $pasaje->setIdViaje($butaca->idViaje);
            $pasaje->setIdFrecuencia($butaca->idFrecuencia);
            $pasaje->setIdUsuario($this->session->userdata('id'));
            $pasaje->setPrecioPasaje($butaca->valorPasaje);
            $pasaje->setNroButaca($butaca->butaca);
            $pasaje->setFechaPasaje($butaca->fechaViaje);
            $pasaje->setNombre($butaca->nombre);
            $pasaje->setApellido($butaca->apellido);
            $pasaje->setDniAsignado($butaca->dni);
            $pasaje->setKmacumulados($butaca->valorPasaje*-2.5);
            $pasaje->setMetodopago("Puntos");

            array_push($arrayPasajes,$pasaje);

        }

        $this->load->model('Pasaje_model');
        $this->Pasaje_model->AgregarPasaje($arrayPasajes);

    }



}

/* End of file Controllername.php */