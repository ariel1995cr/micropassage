<?php

use MercadoPago\Item;
use MercadoPago\Preference;
use MercadoPago\SDK;

defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas extends CI_Controller {

    public function __construct()
    {
    	parent::__construct();
        if (!$this->session->userdata('id')){
            redirect(index.php/Login);
        }
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
        $fecha = explode("-",$fecha);

        $fecha = $fecha[2]."-".$fecha[1]."-".$fecha[0];

        $data['datos'] = array(
            'fecha' => $fecha,
            'IdViaje' => $idViaje,
            'IdFrecuencia' => $idFrecuencia
        );



        $this->load->model('Colectivo_model');
        $data['pasajes'] = $this->Colectivo_model->obtenerPasajes($idViaje,$idFrecuencia,$fecha);


        $this->load->model('Viaje_model');

        $data['datosViaje'] = $this->Viaje_model->obtenerViaje($idViaje,$idFrecuencia);



        $this->load->view('venta/comprar.php', $data);

    }

    function terminarCompra(){
        $datos = $this->input->post('datos');
        $data['datosCompra'] = $this->input->post('datos');
        $datos = json_decode($datos);


        $butacasCompradas = array();


        foreach ($datos as $dato) {
            $this->load->model('Butacas_model');

            $this->Butacas_model->setNroButaca($dato[3]);
            $this->Butacas_model->setTipoButaca($dato[5]);
            $this->Butacas_model->setValor($dato[4]);
            $this->Butacas_model->setNombreAsignado($dato[0]);
            $this->Butacas_model->setApellidoAsignado($dato[2]);
            $this->Butacas_model->setDniAsignado($dato[1]);
            $this->Butacas_model->setIdComprador($this->session->userdata('id'));

            array_push($butacasCompradas, $this->Butacas_model);
        }
        echo "<pre>";
        print_r($butacasCompradas);
        echo"</pre>";

        $this->load->model('Usuario_model');
        $this->Usuario_model->setDni($this->session->userdata('Dni'));
        $datosUsuario = $this->Usuario_model->obtenerDatosDni();
        print_r($datosUsuario);
        require_once 'vendor/autoload.php';

        MercadoPago\SDK::setAccessToken("TEST-7666547261035560-061917-b3827db4841fb02755468af4d6bd24a1-134046859");
        // Crea un objeto de preferencia
        $data['preference'] = new MercadoPago\Preference();

        $x = 0;
        $valor = 0;
        for ($x; $x<sizeof($butacasCompradas); $x++){
            $valor = $valor + $butacasCompradas[$x]->getValor();
        }
        //USUARIO PREFERENCIA
        $data['payer'] = new MercadoPago\Payer();
        $data['payer']->name = $datosUsuario[0]->getNombres();
        $data['payer']->surname = $datosUsuario[0]->getApellido();
        $data['payer']->email = $datosUsuario[0]->getEmail();
        $data['payer']->phone = array(
            "area_code" => "",
            "number" => $datosUsuario[0]->getTelefono()
        );
        $data['payer']->identification = array(
            "type" => "DNI",
            "number" => $datosUsuario[0]->getDni()
        );


        // Crea un ítem en la preferencia
        $data['item'] = new MercadoPago\Item();
        $data['item']->title = 'Pasajes Colectivo';
        $data['item']->quantity = 1;
        $data['item']->unit_price = $valor;
        $data['item']->currency_id = "ARS";
        $data['preference']->items = array($data['item']);
        $data['preference']->binary_mode = true;
        $data['preference']->save();

        $this->load->view('venta/terminarCompra', $data);
    }

    function VentaExitosa(){
        print_r($this->input->post());

        if ($this->input->post('payment_status')=="approved "){

        }
    }
    

}

/* End of file Controllername.php */