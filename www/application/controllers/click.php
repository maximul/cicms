<?php

/**
 * @author phpdesigner
 * @copyright 2015
 */


if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Click extends CI_Controller {
    
    function go($link_id = '') {
        
        $this->db->where('link_id', $link_id);
        $query = $this->db->get('links');
        
        if ($query->num_rows() > 0) {
            
            $link = $query->row_array();
            $url = $link['url'];
            
            $clicks = $link['clicks'] + 1;
            
            $newlink = array();
            $newlink['clicks'] = $clicks;
            
            $this->db->where('link_id', $link_id);
            $this->db->update('links', $newlink);
            
            header("Location: $url");
            die();
            
        } else {
            //header("Location: ".base_url());
            die('Такого адреса на существует');
        }
    }
}
?>