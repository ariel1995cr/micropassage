<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Butacas_model extends CI_Model
{
    private $nroButaca;
    private $tipoButaca;
    private $valor;
    private $nombreAsignado;
    private $apellidoAsignado;
    private $dniAsignado;
    private $idComprador;




    /**
     * @return mixed
     */
    public function getNroButaca()
    {
        return $this->nroButaca;
    }

    /**
     * @param mixed $nroButaca
     */
    public function setNroButaca($nroButaca)
    {
        $this->nroButaca = $nroButaca;
    }

    /**
     * @return mixed
     */
    public function getTipoButaca()
    {
        return $this->tipoButaca;
    }

    /**
     * @param mixed $tipoButaca
     */
    public function setTipoButaca($tipoButaca)
    {
        $this->tipoButaca = $tipoButaca;
    }

    /**
     * @return mixed
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @param mixed $valor
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    /**
     * @return mixed
     */
    public function getNombreAsignado()
    {
        return $this->nombreAsignado;
    }

    /**
     * @param mixed $nombreAsignado
     */
    public function setNombreAsignado($nombreAsignado)
    {
        $this->nombreAsignado = $nombreAsignado;
    }

    /**
     * @return mixed
     */
    public function getApellidoAsignado()
    {
        return $this->apellidoAsignado;
    }

    /**
     * @param mixed $apellidoAsignado
     */
    public function setApellidoAsignado($apellidoAsignado)
    {
        $this->apellidoAsignado = $apellidoAsignado;
    }

    /**
     * @return mixed
     */
    public function getDniAsignado()
    {
        return $this->dniAsignado;
    }

    /**
     * @param mixed $dniAsignado
     */
    public function setDniAsignado($dniAsignado)
    {
        $this->dniAsignado = $dniAsignado;
    }

    /**
     * @return mixed
     */
    public function getIdComprador()
    {
        return $this->idComprador;
    }

    /**
     * @param mixed $idComprador
     */
    public function setIdComprador($idComprador)
    {
        $this->idComprador = $idComprador;
    }




}

/* End of file .php */