<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model
{
    private $id;
    private $nombreUsuario;
    private $email;
    private $password;
    private $nombres;
    private $apellido;
    private $dni;
    private $telefono;
    private $pasajeroFrecuente;

    public function actualizarDatos($usuario){
        $this->db->where('id', $this->session->userdata('id'));
        $this->db->set('nombres',$usuario->getNombres());
        $this->db->set('apellido',$usuario->getApellido());
        $this->db->set('email',$usuario->getEmail());
        $this->db->set('dni',$usuario->getDni());
        $this->db->set('telefono',$usuario->getTelefono());
        $this->db->set('pasajeroFrecuente',$usuario->getPasajeroFrecuente());
       return $this->db->update('usuario');

    }


    public function obtenerDatosDni(){
        $this->db->where('dni', $this->getDni());
        $query = $this->db->get('usuario');
        return $query->custom_result_object('Usuario_model');
    }

    public function actualizarContrasenia($claveEncriptada)
    {
        $this->db->where('id', $this->session->userdata('id'));
        $this->db->set('password', $this->getPassword());
        $this->db->set('verification_key', $claveEncriptada);

        return $this->db->update('usuario');
    }

    /**
     * @return mixed
     */
    public function getNombreUsuario()
    {
        return $this->nombreUsuario;
    }

    /**
     * @param mixed $nombreUsuario
     */
    public function setNombreUsuario($nombreUsuario)
    {
        $this->nombreUsuario = $nombreUsuario;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }/**
 * @param mixed $id
 */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getNombres()
    {
        return $this->nombres;
    }

    /**
     * @param mixed $nombres
     */
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;
    }

    /**
     * @return mixed
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * @param mixed $apellido
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    /**
     * @return mixed
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * @param mixed $dni
     */
    public function setDni($dni)
    {
        $this->dni = $dni;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param mixed $telefono
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    /**
     * @return mixed
     */
    public function getPasajeroFrecuente()
    {
        return $this->pasajeroFrecuente;
    }

    /**
     * @param mixed $pasajero_frecuente
     */
    public function setPasajeroFrecuente($pasajeroFrecuente)
    {
        $this->pasajeroFrecuente = $pasajeroFrecuente;
    }



}

/* End of file .php */