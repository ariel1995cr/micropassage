<?php

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
        $token = $_REQUEST["token"];
        $payment_method_id = $_REQUEST["payment_method_id"];
        $installments = $_REQUEST["installments"];
        $issuer_id = $_REQUEST["issuer_id"];

        print_r($_REQUEST);
        require_once 'vendor/autoload.php';

        MercadoPago\SDK::setAccessToken("TEST-7666547261035560-061917-b3827db4841fb02755468af4d6bd24a1-134046859");
        //...
        $payment = new MercadoPago\Payment();
        $payment->transaction_amount = 163;
        $payment->token = $token;
        $payment->description = "Practical Copper Shirt";
        $payment->installments = $installments;
        $payment->payment_method_id = $payment_method_id;
        $payment->issuer_id = $issuer_id;
        $payment->payer = array(
            "email" => "arielrnr1995@gmail.com"
        );
        // Guarda y postea el pago
        $payment->save();
        //...
        // Imprime el estado del pago
        echo $payment->status;

        print_r($payment);
        //...
    }
    

}

/* End of file Controllername.php */