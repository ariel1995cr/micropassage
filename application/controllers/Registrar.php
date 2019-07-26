<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Registrar extends CI_Controller {
    public function __construct()
    {
    	parent::__construct();

    	//Do your magic here
        if ($this->session->userdata('id'))
        {
            redirect('index.php');
        }
        $this->load->library('form_validation');
        $this->load->library('encrypt');
        $this->load->model('Register_model');
    }

	public function index()
	{
        $this->load->view('registrar/index');
	}

    function validation()
    {
        $this->form_validation->set_rules('nombres', 'Nombres', 'required|trim');
        $this->form_validation->set_rules('apellido', 'Apellido', 'required|trim');
        $this->form_validation->set_rules('dni', 'Dni', 'required|trim|is_unique[usuario.dni]|integer');
        $this->form_validation->set_rules('telefono', 'Telefono', 'required|trim|integer');
        $this->form_validation->set_rules('nombreUsuario', 'Nombre Usuario', 'required|trim');
        $this->form_validation->set_rules('email', 'Email Address', 'required|trim|valid_email|is_unique[usuario.email]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('pasajerofrecuente', 'pasajero frecuente', 'required');
        if($this->form_validation->run())
        {
            $verification_key = md5(rand());
            $encrypted_password = $this->encrypt->encode($this->input->post('password'));
            $data = array(
                'nombreUsuario'  => $this->input->post('nombreUsuario'),
                'email'  => $this->input->post('email'),
                'password' => $encrypted_password,
                'verification_key' => $verification_key,
                'nombres' => $this->input->post('nombres'),
                'apellido' => $this->input->post('apellido'),
                'dni' => $this->input->post('dni'),
                'telefono' => $this->input->post('telefono'),
                'pasajeroFrecuente' => $this->input->post('pasajerofrecuente'),
            );
            $id = $this->Register_model->insert($data);
            if($id > 0)
            {
                $subject = "Please verify email for login";
                $message = "
                <p>Hola ".$this->input->post('user_name')."</p>
                <p>Este es un mensaje de validacion de PASSAGESUSTEM. Para Completar el registro y poder Logearse en el sitema debe primero verificar su email Haciendo click en este: <a href='".base_url()."index.php/registrar/verify_email/".$verification_key."'>link</a>.</p>
                <p>Al hacer click ingresara a la web y tendra su email verificado! para poder usar el sistema correctamente.</p>
                <p>Muchas Gracias.</p>
                ";
                $config = array(
                    'protocol'  => 'smtp',
                    'smtp_host' => 'smtp.tecno-soluciones.com.ar',
                    'smtp_port' => 2525,
                    'smtp_user'  => 'robot@tecno-soluciones.com.ar',
                    'smtp_pass'  => 'SanLuis2017',
                    'mailtype'  => 'html',
                    'charset'    => 'iso-8859-1',
                    'wordwrap'   => TRUE
                );
                $this->load->library('email', $config);
                $this->email->set_newline("\r\n");
                $this->email->from('robot@tecno-soluciones.com.ar');
                $this->email->to($this->input->post('email'));
                $this->email->subject($subject);
                $this->email->message($message);
                if($this->email->send())
                {
                    $this->session->set_flashdata('message', 'Verifique en su correo en la Carpeta no deseados o Spam para validar el Registro hecho recientemente.');
                    redirect('index.php/login');
                }
            }
        }
            else {
            $this->index();
        }
    }

    function verify_email()
    {
        if($this->uri->segment(3))
        {
            $verification_key = $this->uri->segment(3);
            if($this->Register_model->verify_email($verification_key))
            {
                $data['message'] = '<h1 align="center">Su email fue Validad Correctamente, puede continuar haciendo click <a href="'.base_url().'index.php/login">AQUI</a></h1>';
            }
            else
            {
                $data['message'] = '<h1 align="center">LINK INVALIDO</h1>';
            }
            $this->load->view('email_verification', $data);
        }
    }

}

/* End of file Registrar.php */
?>