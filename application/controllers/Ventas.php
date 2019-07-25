<?php

use MercadoPago\Item;
use MercadoPago\Payer;
use MercadoPago\Preference;
use MercadoPago\SDK;

defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas extends CI_Controller {

    public function __construct()
    {
    	parent::__construct();
        if (!$this->session->userdata('id')){
            redirect("index.php/Login", "refresh");
        }
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, OPTIONS");
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
        $fechaviaje = $fecha;
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

        $hoy = date_create();

        $fechaViaje =  date_create($fechaviaje." ".$data['datosViaje'][0]->hora);
        $fechaViaje->modify('-2 hours');
        $this->load->model('Pasaje_model');
        $data['puntos'] = $this->Pasaje_model->ObtenerPuntos();

        if ($hoy<$fechaViaje){
            $this->load->view('venta/comprar.php', $data);
        } else if($hoy>$fechaviaje){
            redirect("/");
        }


    }

    function terminarCompra(){
        $datos = $this->input->post('datos');
        if (!empty($datos)){


            $datos = $this->input->post('datos');

            $data['datosPost'] = $datos;

            $data['info'] = json_decode($datos);

            $datos = json_decode($datos);
            $this->load->model('Pasaje_model');


            foreach ($datos as $dato) {
                $pasaje = new $this->Pasaje_model;
                $pasaje->setIdViaje($dato->idViaje);
                $pasaje->setIdFrecuencia($dato->idFrecuencia);
                $pasaje->setIdUsuario($this->session->userdata('id'));
                $pasaje->setFechaPasaje($dato->fechaViaje);
                $pasaje->setPrecioPasaje($dato->valorPasaje);
                $pasaje->setNroButaca($dato->butaca);
                $pasaje->setNombre($dato->nombre);
                $pasaje->setApellido($dato->apellido);
                $pasaje->setDniAsignado($dato->dni);
                $pasaje->setMetodopago($dato->metodoPago);

                $data['butacasCompradas'][] = $pasaje;
            }


            echo "<pre>";
            print_r ($data['butacasCompradas']);
            echo "</pre>";


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
            for ($x; $x<sizeof($data['butacasCompradas']); $x++){
                if($data['butacasCompradas'][$x]->getMetodopago()=="Tarjeta"){
                    $valor = $valor + $data['butacasCompradas'][$x]->getPrecioPasaje();
                }
            }

            $data['valorTotal'] = $valor;

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
            $data['preference']->payment_methods = array(
                "excluded_payment_types" => array(
                    array("id" => "ticket"),
                    array("id" => "atm")
                ),
                "installments" => 12
            );
            $data['preference']->binary_mode = true;

            $data['preference']->save();

            $this->load->view('venta/terminarCompra', $data);
        } else {
            redirect('/index.php', 'refresh');
        }

    }


    

}

/* End of file Controllername.php */