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
                         $pasaje->setKmacumulados($butaca->valorPasaje*0.05);
                    }else if($butaca->tipoAsiento="ejecutivo"){
                         $pasaje->setKmacumulados($butaca->valorPasaje*0.50);
                    }else{
                         $pasaje->setKmacumulados($butaca->valorPasaje*0.25);
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
        $pasajes = $this->Pasaje_model->AgregarPasaje($arrayPasajes);
        $data['asientos'] = $this->Pasaje_model->ConseguirPasajes($pasajes);

        $this->load->view('pasaje/CompraExitosa',$data);


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

    public function PasajesComprados()
    {

        $this->load->library('pagination');
        $pasaje = $this->Pasaje_model;

        $config['base_url'] = 'http://localhost/PassageSystem/index.php/Pasaje/PasajesComprados/page/';
        $config['total_rows'] = $pasaje->ContarFilas();
        $config['per_page'] = 10;
        $config["uri_segment"] = 4;

        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li class="page-link">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='page-link'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li class='page-link'>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li class='page-link'>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li class='page-link'>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li class='page-link'>";
        $config['last_tagl_close'] = "</li>";




        $config['prev_link'] = '<a class="page-link" href="#">Previous Page</a>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';


        $config['next_link'] = '<a class="page-link" href="#">Next Page</a>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';



        $this->session->userdata('id');


        $data['paginacion'] = $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;


        $data['pasajes'] = $pasaje->ObtenerTodoslosPasajes($config["per_page"], $page);

        $this->load->view('pasaje/listarPasajes.php', $data);


    }



}

/* End of file Controllername.php */