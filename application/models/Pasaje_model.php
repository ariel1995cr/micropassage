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
    private $ciudadOrigen;
    private $ciudadDestino;
    private $hora;




    public function __construct()
        {
        	parent::__construct();


        	//Do your magic here
        }

    public function ContarFilas() {
        $this->db->where('idUsuario', $this->session->userdata('id'));
        return $this->db->count_all_results('pasaje');
    }


        public function ObtenerTodoslosPasajes($limit, $start){
            $this->db->limit($limit, $start);
            $this->db->select('pasaje.idBoleto,
                            pasaje.idViaje,
                            pasaje.idFrecuencia,
                            pasaje.nombre,
                            pasaje.dniAsignado,
                            pasaje.apellidos AS apellido,
                            pasaje.nroButaca,
                            pasaje.fechaPasaje,
                            viaje.idciudadorigen,
                            viaje.idciudadestino,
                            ciudadOrigen.nombreCiudad AS ciudadOrigen,
                            ciudadDestino.nombreCiudad AS ciudadDestino,
                            frecuencia.hora');
            $this->db->where('idUsuario', $this->session->userdata('id'));
            $this->db->join('Viaje', 'Viaje.idViaje = pasaje.idViaje', 'inner');
            $this->db->join('ciudad as ciudadOrigen', 'viaje.idciudadorigen = ciudadOrigen.idCiudad', 'inner');
            $this->db->join('ciudad as ciudadDestino', 'viaje.idciudadestino = ciudadDestino.idCiudad', 'inner');
            $this->db->join('frecuencia', 'frecuencia.idViaje = viaje.idViaje AND pasaje.idFrecuencia = frecuencia.idFrecuencia', 'inner');
            $this->db->order_by('pasaje.idBoleto', 'DESC');
            return $this->db->get('pasaje')->custom_result_object('Pasaje_model');
        }

    public function ObtenerPasajeID(){
        $this->db->select('pasaje.idBoleto,
                            pasaje.idViaje,
                            pasaje.idFrecuencia,
                            pasaje.nombre,
                            pasaje.dniAsignado,     
                            pasaje.apellidos AS apellido,
                            pasaje.nroButaca,
                            pasaje.fechaPasaje,
                            viaje.idciudadorigen,
                            viaje.idciudadestino,
                            ciudadOrigen.nombreCiudad AS ciudadOrigen,
                            ciudadDestino.nombreCiudad AS ciudadDestino,
                            frecuencia.hora');
        $this->db->where('idBoleto', $this->idBoleto);
        $this->db->where('idUsuario', $this->session->userdata('id'));
        $this->db->join('Viaje', 'Viaje.idViaje = pasaje.idViaje', 'inner');
        $this->db->join('ciudad as ciudadOrigen', 'viaje.idciudadorigen = ciudadOrigen.idCiudad', 'inner');
        $this->db->join('ciudad as ciudadDestino', 'viaje.idciudadestino = ciudadDestino.idCiudad', 'inner');
        $this->db->join('frecuencia', 'frecuencia.idViaje = viaje.idViaje AND pasaje.idFrecuencia = frecuencia.idFrecuencia', 'inner');
        return $this->db->get('pasaje')->custom_result_object('Pasaje_model');

    }


    public function AgregarPasaje($pasajes){
        $ids = array();

        $this->db->trans_start();
        foreach ($pasajes as $pasaje)
        {
            $this->db->insert('pasaje', array(
                'idViaje'=> $pasaje->getIdViaje(),
                'idFrecuencia'=> $pasaje->getIdFrecuencia(),
                'idUsuario'=> $pasaje->getIdUsuario(),
                'precioPasaje'=> $pasaje->getPrecioPasaje(),
                'nroButaca'=> $pasaje->getNroButaca(),
                'fechaPasaje'=> $pasaje->getFechaPasaje(),
                'nombre'=> $pasaje->getNombre(),
                'apellidos'=> $pasaje->getApellido(),
                'dniAsignado'=> $pasaje->getDniAsignado(),
                'kmacumulados'=> $pasaje->getKmacumulados(),
                'metodopago'=> $pasaje->getMetodopago()
            ));

                $ids[] = $this->db->insert_id();
        }
        $this->db->trans_complete();
        return $ids;
    }

    public function ConseguirPasajes($idPasajes){
        $this->db->trans_start();
        foreach ($idPasajes as $idPasaje)
        {
            $this->db->select('pasaje.idBoleto,
                            pasaje.idViaje,
                            pasaje.idFrecuencia,
                            pasaje.nombre,
                            pasaje.dniAsignado,
                            pasaje.apellidos AS apellido,
                            pasaje.nroButaca,
                            pasaje.fechaPasaje,
                            viaje.idciudadorigen,
                            viaje.idciudadestino,
                            ciudadOrigen.nombreCiudad AS ciudadOrigen,
                            ciudadDestino.nombreCiudad AS ciudadDestino,
                            frecuencia.hora');
            $this->db->where('idBoleto', $idPasaje);
            $this->db->where('idUsuario', $this->session->userdata('id'));
            $this->db->join('Viaje', 'Viaje.idViaje = pasaje.idViaje', 'inner');
            $this->db->join('ciudad as ciudadOrigen', 'viaje.idciudadorigen = ciudadOrigen.idCiudad', 'inner');
            $this->db->join('ciudad as ciudadDestino', 'viaje.idciudadestino = ciudadDestino.idCiudad', 'inner');
            $this->db->join('frecuencia', 'frecuencia.idViaje = viaje.idViaje AND pasaje.idFrecuencia = frecuencia.idFrecuencia', 'inner');


            $pasajes[] = $this->db->get('pasaje')->custom_result_object('Pasaje_model');
        }
        $this->db->trans_complete();
        return $pasajes;
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
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * @param mixed $hora
     */
    public function setHora($hora)
    {
        $this->hora = $hora;
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


    /**
     * @return mixed
     */
    public function getCiudadOrigen()
    {
        return $this->ciudadOrigen;
    }

    /**
     * @param mixed $ciudadOrigen
     */
    public function setCiudadOrigen($ciudadOrigen)
    {
        $this->ciudadOrigen = $ciudadOrigen;
    }

    /**
     * @return mixed
     */
    public function getCiudadDestino()
    {
        return $this->ciudadDestino;
    }

    /**
     * @param mixed $ciudadDestino
     */
    public function setCiudadDestino($ciudadDestino)
    {
        $this->ciudadDestino = $ciudadDestino;
    }
}

/* End of file .php */