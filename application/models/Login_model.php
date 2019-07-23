<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
{
    function can_login($nombreUsuario, $password)
    {
        $this->db->where('nombreUsuario', $nombreUsuario);
        $query = $this->db->get('Usuario');
        if($query->num_rows() > 0)
        {
            foreach($query->result() as $row)
            {
                if($row->is_email_verified == 'yes')
                {
                    $store_password = $this->encrypt->decode($row->password);
                    if($password == $store_password)
                    {
                        $this->session->set_userdata('id', $row->id);
                        $this->session->set_userdata('email', $row->email);
                        $this->session->set_userdata('nombreUsuario', $nombreUsuario);
                        $this->session->set_userdata('Dni', $row->dni);
                        $this->session->set_userdata('pasajeroFrecuente', $row->pasajeroFrecuente);
                    }
                    else
                    {
                        return 'Wrong Password';
                    }
                }
                else
                {
                    return 'First verified your email address';
                }
            }
        }
        else
        {
            return 'Wrong Email Address';
        }
    }



}

/* End of file .php */
?>