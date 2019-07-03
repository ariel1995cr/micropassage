<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Colectivo_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get colectivo by idColectivo
     */
    function get_colectivo($idColectivo)
    {
        return $this->db->get_where('colectivo',array('idColectivo'=>$idColectivo))->row_array();
    }
    
    /*
     * Get all colectivos count
     */
    function get_all_colectivos_count()
    {
        $this->db->from('colectivo');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all colectivos
     */
    function get_all_colectivos($params = array())
    {
        $this->db->order_by('idColectivo', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('colectivo')->result_array();
    }
        
    /*
     * function to add new colectivo
     */
    function add_colectivo($params)
    {
        $this->db->insert('colectivo',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update colectivo
     */
    function update_colectivo($idColectivo,$params)
    {
        $this->db->where('idColectivo',$idColectivo);
        return $this->db->update('colectivo',$params);
    }
    
    /*
     * function to delete colectivo
     */
    function delete_colectivo($idColectivo)
    {
        return $this->db->delete('colectivo',array('idColectivo'=>$idColectivo));
    }
}
