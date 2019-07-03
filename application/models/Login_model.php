<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
{
    function can_login($email, $password)
    {
        $this->db->where('email', $email);
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
                        $this->session->set_userdata('email', $email);
                        $this->session->set_userdata('nombreUsuario', $row->nombreUsuario);
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

    function can_loginCaminante($email)
    {
        $this->db->where('emailCaminante', $email);
        $query = $this->db->get('ResponsableVotante');
        if($query->num_rows() > 0)
        {
            foreach($query->result() as $row)
            {
                        $this->session->set_userdata('email', $row->emailCaminante);
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