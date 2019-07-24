<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasaje extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('id')){
            redirect(index.php/Login);
        }
        $this->load->model('Pasaje_model');
    }

    public function compraExitosa()
	{

        $butacas =  $this->input->post('ButacasCompradas');
        $butacas = json_decode($butacas);
        echo "<br>";

        $data['butacas'] = $butacas;


        $arrayPasajes = array();
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
                if($this->session->userdata('pasajeroFrecuente')=="SI"){
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
        $pasajes = $this->Pasaje_model->AgregarPasaje($arrayPasajes);
        $data['asientos'] = $this->Pasaje_model->ConseguirPasajes($pasajes);

        $this->load->view('pasaje/CompraExitosa',$data);

	}

    public function compraExitosaPuntos()
    {
        $butacas =  $this->input->post('ButacasCompradas');
        $butacas = json_decode($butacas);
        echo "<br>";

        $arrayPasajes = array();


        $x = 0;
        foreach($butacas[0] as $butaca){
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
        $pasajes = $this->Pasaje_model->AgregarPasaje($arrayPasajes);
        print_r($pasajes);

    }

    public function ImprimirPasaje($boleto)
    {

        $viewdata = [];


        $this->Pasaje_model->setIdBoleto($boleto);

        $pasaje = $this->Pasaje_model->ObtenerPasajeID();

        $viewdata['datos'] = $pasaje[0];



        $html = $this->load->view('pasaje/ImprimirPasaje', $viewdata, TRUE);
        // Cargamos la librería
        $this->load->library('pdfgenerator');
        // definamos un nombre para el archivo. No es necesario agregar la extension .pdf
        $filename = 'comprobante_pago';
        // generamos el PDF. Pasemos por encima de la configuración general y definamos otro tipo de papel
        $this->pdfgenerator->generate($html, $filename, true, 'A4', 'landscape');


    }



}

/* End of file Controllername.php */