<?php

/**
 * @author phpdesigner
 * @copyright 2015
 */


if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lunit extends CI_Controller {
    
    function login() {
        
        //Правила валидации
        $rules = array(
        
            array(
                'field' => 'login',
                'label' => 'Логин',
                'rules' => 'required|az_numeric'
            ),
            
            array(
                'field' => 'pass',
                'label' => 'Пароль',
                'rules' => 'required|max_length[40]'
            )
            
        );
        
        $this->form_validation->set_rules($rules);
        
        //Если валидация прошла - пытаемся сделать вход
        if ($this->form_validation->run()) {
            
            $this->lib_auth->do_login($this->input->post('login'), $this->input->post('pass'));
            
        } else {
            //Иначе - показываем форму
            $this->lib_view->simple_page('login', array(), 'Вход администратора');
        }
        
    }
    
    function logout() {
        //Проверка - выполнен ли вход
        $this->lib_auth->check_admin();
        
        $this->lib_auth->logout();
        
    }
    
    function index() {
        
        //Проверка - выполнен ли вход
        $this->lib_auth->check_admin();
        
        $data = array();
        
        //Число кликов
        $this->db->select_sum('clicks');
        $query = $this->db->get('links');
        
        $res = $query->row_array();
        $data['clicks'] = $res['clicks'];
        
        //Число страниц
        $data['pages'] = $this->db->count_all_results('pages');
        
        //Выбор
        $this->db->select_max('clicks');
        $query = $this->db->get('links');
        
        $res = $query->row_array();
        $data['maxcount'] = $res['clicks'];
        
        //Макс. значение
        $this->db->where('clicks', $data['maxcount']);
        $query = $this->db->get('links');
        
        $res = $query->row_array();
        $data['max'] = (!empty($res)) ? $res['url'] : 'отсутствует';
        
        $this->lib_view->admin_page('main', $data, 'Главная'); //ID ссылки с макс. посещ-ю
    }
}
?>