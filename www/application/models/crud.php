<?php

/**
 * @author phpdesigner
 * @copyright 2015
 */


if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crud extends CI_Model {
    
    var $table = '';
    
    var $idkey = 'id';
    
    var $add_rules = array ();
    
    var $edit_rules = array ();
    
    //Конструктор    
    function  __construct() {
        parent:: __construct();
    }
    
    //Добавление
    function add() {
        
        $this->form_validation->set_rules($this->add_rules);
       
        if ($this->form_validation->run()) {
            
            $data = array();
            
            foreach ($this->add_rules as $one) {
                
                $f = $one['field'];
                
                $data[$f] = $this->input->post($f);
            }
            
            $this->db->insert($this->table,$data);        
            return $this->db->insert_id();
            
        } else {
            
            return false;
            
        }
            
    }

    //Редактирование
    function edit($id) {
        
        $this->form_validation->set_rules($this->edit_rules);
       
        if ($this->form_validation->run()) {
            
            $data = array();
            
            foreach ($this->edit_rules as $one) {
                
                $f = $one['field'];
                
                $data[$f] = $this->input->post($f);
            }
            
            $this->db->where($this->idkey,$id);
            $this->db->update($this->table,$data);        
            return true;
            
        } else {
            
            return false;
            
        }
            
    }

    //Удаление
    function del($id) {
        $this->db->where($this->idkey,$id);
        $this->db->delete($this->table);    
    }

    //Получение данных о товаре
    function get($id) {
        $this->db->where($this->idkey,$id);
        $query = $this->db->get($this->table);
        return $query->row_array();    
    }
    
    //Получение списка товаров
    function getlist($start_from = false)
    {
        //Ставим список сортировки
        $sort_by = $this->session->userdata('sort_by');
        $sort_dir = $this->session->userdata('sort_dir');
        
        //Если не пустые значения - ставим сортировку
        if (!empty($sort_by)) {
            $this->db->order_by($sort_by, $sort_dir);
        }
        
        //Для поиска
        $search = $this->session->userdata('search');
        $search_by = $this->session->userdata('search_by');
        
        //Если не пустые значения - ставим поиск
        if (!empty($search)) {
            $this->db->like($search_by, $search);
        }
        
        if ($start_from !== false) {
            $this->db->limit($this->config->item('cms_per_page'), $start_from);
            //Ограничение
        }
        
        $query = $this->db->get($this->table);
        return $query->result_array();    
    }
}
?>