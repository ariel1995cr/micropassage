<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function __construct()
    {
    	parent::__construct();
        $this->load->model('Usuario_model');

    	//Do your magic here
    }

	public function index()
	{
        $this->Usuario_model->setDni($this->session->userdata('Dni'));

        $data['usuario'] = $this->Usuario_model->obtenerDatosDni();


        $this->load->view('usuario/index', $data);
	}

    public function edit()
    {
          $this->Usuario_model->setDni($this->session->userdata('Dni'));
          $data['usuario'] = $this->Usuario_model->obtenerDatosDni();
          $this->load->view('usuario/editar', $data);



    }

    public function ActualizarDatos(){
    $boton = $this->input->post('Boton');
        if ($boton == "ConfirmarDatos"){
            $this->load->helper('security');
        $this->load->library('form_validation');


        $this->form_validation->set_rules('email', 'Email', 'required|trim|min_length[5]|valid_email|is_unique[usuario.email]');
        $this->form_validation->set_rules('nombres', 'nombres', 'required|trim|max_length[20]|regex_match[/^[a-zñáéíóúüA-ZÑÁÉÍÓÚÜ ,.]*$/u]');
        $this->form_validation->set_rules('apellido', 'apellido', 'required|trim|required|max_length[18]|regex_match[/^[a-zñáéíóúüA-ZÑÁÉÍÓÚÜ ,.]*$/u]');
        $this->form_validation->set_rules('dni', 'dni', 'required|trim|integer|is_unique[usuario.dni]');
        $this->form_validation->set_rules('telefono', 'telefono', 'trim|regex_match[/[\+]?(\(?[0-9]{3}\)?)?[\s]?[\+\-]?[\s]?[0-9]{4}[\-\s]?[0-9]{4}/]');
        $this->form_validation->set_rules('pasajeroFrecuente', 'pasajeroFrecuente', 'trim|required|in_list[SI,NO]');
            if ($this->form_validation->run() == FALSE) {
                $this->edit();
            } else {
                $this->load->model('Usuario_model');
                $usuario = $this->Usuario_model;
                $usuario->setEmail($this->input->post('email'));
                $usuario->setNombres($this->input->post('nombres'));
                $usuario->setApellido($this->input->post('apellido'));
                $usuario->setDni($this->input->post('dni'));
                $usuario->setTelefono($this->input->post('telefono'));
                $usuario->setPasajeroFrecuente($this->input->post('pasajeroFrecuente'));
                $updateCompletado = $usuario->actualizarDatos($usuario);
                if ($updateCompletado == true){
                    $this->session->sess_destroy();
                    $this->session->set_flashdata('message', 'Perfil Actualizado Correctamente');
                    redirect('index.php/Ventas');
                } else {
                    $this->session->sess_destroy();
                    $this->session->set_flashdata('message', 'Error no se Actualizo su Perfil');
                    redirect('index.php/Ventas');
                }
            }
        }else {
            redirect('index.php');
        }
    }


    function cambiarContrasenia(){
        $boton=$this->input->Post('confirmarContrasenia');
        if ($boton == "Guardar") {
            $this->load->library('encrypt');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('contraseñaActual', 'contraseña actual','min_length[6]|required');
            $this->form_validation->set_rules('contraseñaNueva', 'contraseña nueva','min_length[6]|required|disffers[contraseñaActual]');
            $this->form_validation->set_rules('contraseñaRepetir', 'Repetir contraseña nueva','min_length[6]|required|matches[contraseñaNueva]');
            if ($this->form_validation->run() == "false") {
                redirect('/index.php/usuario/cambiarContrasenia');

            }else {
                $this->load->model('Usuario_model');
                $usuario = $this->Usuario_model;
                $verification_key = MD5(rand());
                $contraseñaNueva = $this->input->post('contraseñaNueva');
                $claveEncriptada = $this->encrypt->encode($contraseñaNueva);
                $usuario->setPassword($claveEncriptada);
                $resultado = $usuario->actualizarContrasenia($verification_key);
                if ($resultado == "true") {
                    $this->session->sess_destroy();
                    redirect("index.php/Ventas");
                }else {
                    redirect("index.php");
                }
            }
        }else {
            $this->load->view('usuario/cambiarContrasenia');
        }

    }



    function cerrarSesion(){
        $this->session->sess_destroy();
        $this->session->set_tempdata('message', 'Cerro Session Correctamente', 60);
        redirect('index.php/Login');
    }
}

?>
