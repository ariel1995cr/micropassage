<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Frecuencia_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get frecuencia by idFrecuencia
     */
    function get_frecuencia($idFrecuencia)
    {
        return $this->db->get_where('frecuencia',array('idFrecuencia'=>$idFrecuencia))->row_array();
    }
    
    /*
     * Get all frecuencias count
     */
    function get_all_frecuencias_count()
    {
        $this->db->from('frecuencia');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all frecuencias
     */
    function get_all_frecuencias($params = array())
    {
        $this->db->order_by('idFrecuencia', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('frecuencia')->result_array();
    }
        
    /*
     * function to add new frecuencia
     */
    function add_frecuencia($params)
    {
        $this->db->insert('frecuencia',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update frecuencia
     */
    function update_frecuencia($idFrecuencia,$params)
    {
        $this->db->where('idFrecuencia',$idFrecuencia);
        return $this->db->update('frecuencia',$params);
    }
    
    /*
     * function to delete frecuencia
     */
    function delete_frecuencia($idFrecuencia)
    {
        return $this->db->delete('frecuencia',array('idFrecuencia'=>$idFrecuencia));
    }
}
