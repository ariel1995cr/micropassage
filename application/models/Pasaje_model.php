<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasaje_model extends CI_Model
{
    private $idBoleto;
    private $idViaje;
    private $idFrecuencia;
    private $idUsuario;
    private $precioPasaje;
    private $nroButaca;
    private $fechaPasaje;
    private $nombre;
    private $apellido;
    private $dniAsignado;
    private $kmacumulados;
    private $metodopago;




    public function __construct()
    {
        parent::__construct();
    }


    public function AgregarPasaje($pasajes){
        $i = 0;
        foreach ($pasajes as $pasaje)
        {
                $data[$i]['idViaje'] = $pasaje->getIdViaje();
                $data[$i]['idFrecuencia'] = $pasaje->getIdFrecuencia();
                $data[$i]['idUsuario'] = $pasaje->getIdUsuario();
                $data[$i]['precioPasaje'] =  $pasaje->getPrecioPasaje();
                $data[$i]['nroButaca'] = $pasaje->getNroButaca();
                $data[$i]['fechaPasaje'] = $pasaje->getFechaPasaje();
                $data[$i]['nombre'] = $pasaje->getNombre();
                $data[$i]['apellidos'] = $pasaje->getApellido();
                $data[$i]['dniAsignado'] = $pasaje->getDniAsignado();
                $data[$i]['kmacumulados'] = $pasaje->getKmacumulados();
                $data[$i]['metodopago'] = $pasaje->getMetodopago();

                $i++;
        }
        $this->db->insert_batch('pasaje', $data);
    }
    public function ObtenerPuntos(){
        $this->db->select_sum('kmacumulados');
        $this->db->where('idUsuario', $this->session->userdata('id'));
        $query = $this->db->get('pasaje');

        if ($query->num_rows()>0){
            return $query->custom_result_object('Pasaje_model');
        } else {
            return 0;
        }
    }




    /**
     * @return mixed
     */
    public function getMetodopago()
    {
        return $this->metodopago;
    }

    /**
     * @param mixed $metodopago
     */
    public function setMetodopago($metodopago)
    {
        $this->metodopago = $metodopago;
    }

    /**
     * @return mixed
     */
    public function getKmacumulados()
    {
        return $this->kmacumulados;
    }

    /**
     * @param mixed $kmacumulados
     */
    public function setKmacumulados($kmacumulados)
    {
        $this->kmacumulados = $kmacumulados;
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
    public function getIdBoleto()
    {
        return $this->idBoleto;
    }

    /**
     * @param mixed $idBoleto
     */
    public function setIdBoleto($idBoleto)
    {
        $this->idBoleto = $idBoleto;
    }

    /**
     * @return mixed
     */
    public function getIdViaje()
    {
        return $this->idViaje;
    }

    /**
     * @param mixed $idViaje
     */
    public function setIdViaje($idViaje)
    {
        $this->idViaje = $idViaje;
    }

    /**
     * @return mixed
     */
    public function getIdFrecuencia()
    {
        return $this->idFrecuencia;
    }

    /**
     * @param mixed $idFrecuencia
     */
    public function setIdFrecuencia($idFrecuencia)
    {
        $this->idFrecuencia = $idFrecuencia;
    }

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * @param mixed $idUsuario
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    /**
     * @return mixed
     */
    public function getPrecioPasaje()
    {
        return $this->precioPasaje;
    }

    /**
     * @param mixed $precioPasaje
     */
    public function setPrecioPasaje($precioPasaje)
    {
        $this->precioPasaje = $precioPasaje;
    }

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
    public function getFechaPasaje()
    {
        return $this->fechaPasaje;
    }

    /**
     * @param mixed $fechaPasaje
     */
    public function setFechaPasaje($fechaPasaje)
    {
        $this->fechaPasaje = $fechaPasaje;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
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



}

/* End of file .php */