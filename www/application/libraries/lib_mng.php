<?php

/**
 * @author phpdesigner
 * @copyright 2015
 */


if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class lib_mng {
    
    /**
     * Добавление новой ссылки
     */
    function add($name, $title = '') {
        
        $CI = &get_instance(); //Доступ к CI
        
        $md = 'mdl_'.$name;
        
        $CI->load->model($md); //Загрузка модели
        
        if ($CI->{$md}->add() !== false) {
            
            //Делаем редирект на список ссылок
            redirect('admin/'.$name.'s');
            
        } else {
            
            //Иначе показываем форму добавления
            $CI->lib_view->admin_page($name.'/add', array(), $title);
            
        }
    }
    
    /**
     * Просмотр ссылки
     */
    function show($name, $id, $title = '') {
        
        $CI = &get_instance();
        
        $md = 'mdl_'.$name;
        
        $CI->load->model($md); //Загрузка модели
        
        $data = $CI->{$md}->get($id);
        
        if (empty($data)) {
            die('Такой записи нет в базе');
        }
        
        $CI->lib_view->admin_page($name.'/view', $data, $title);
        
    }
    
    /**
     * Редактирование ссылки
     */
    function edit($name, $id, $title = '') {
        
        $CI = &get_instance();
        
        $md = 'mdl_'.$name;
        
        $CI->load->model($md); //Загрузка модели
        
        //Загружаем данные для этого объекта
        $data = $CI->{$md}->get($id);
        
        if ($CI->{$md}->edit($id) !== false) {
            
            //Делаем редирект на список ссылок
            redirect('admin/'.$name.'s');
            
        } else {
            
            //Иначе показываем форму добавления
            $CI->lib_view->admin_page($name.'/edit', $data, $title);
            
        }
    }
    
    /**
     * Удаление ссылки
     */
    function del($name, $id) {
        
        $CI = &get_instance();
        
        $md = 'mdl_'.$name;
        
        $CI->load->model($md); //Загрузка модели
        
        $CI->{$md}->del($id);
        
        redirect('admin/'.$name.'s'); //Уходим к списку ссылок
                    
    }
    
    /**
     * Просмотр ссылок
     */
    function show_index($name, $title = '', $start_page = 0) {
        
        //Проверяем, не был ли сброшен список
        if ($start_page === 'list') {
            
            $this->reset_set(); //Здесь сброс списка
            
            $start_page = 0; //Ставим 0 - для сброса
        }
        
        //Если не число - ставим 0
        if (!is_numeric($start_page)) {
            $start_page = 0;
        }
        
        $CI = &get_instance();
        
        $md = 'mdl_'.$name;
        
        $CI->load->model($md); //Загрузка модели
        
        //Грузим библиотеку Pagination
        $CI->load->library('pagination');
        
        //Загрузка обшего количества
        $total = $CI->{$md}->getlist();
        
        //Подставка массива настроек
        $config = array();
        $config['base_url'] = base_url().'admin/'.$name.'s/index/';
        $config['total_rows'] = count($total);
        $config['per_page'] = $CI->config->item('cms_per_page');
        $config['uri_segment'] = 4;
        
        //Устанавливаем настройки
        $CI->pagination->initialize($config);
        
        unset($total); //Освбождаем память от этой переменной
        
        $list = $CI->{$md}->getlist($start_page);
        
        $data = array();
        $data['list'] = $list; //Присваеваем список записей
        $data['page_links'] = $CI->pagination->create_links(); //Ссылки
        
        $CI->lib_view->admin_page($name.'/index', $data, $title);
        
    }
    
    //Ф-я уст-ки сорт-ки
    function set_sort($name, $field) {
        
        $CI = &get_instance();        
        $md = 'mdl_'.$name;        
        $CI->load->model($md);
        
        //Массив с данными для сессии
        $data = array();
        $data['sort_by'] = $field;
        $data['sort_dir'] = 'ASC';
        
        //Если в сессии тек-я сорт-ка - меняем на обр-ю
        if (($CI->session->userdata('sort_by') == $field) and ($CI->session->userdata('sort_dir') == 'ASC')) {
            $data['sort_dir'] = 'DESC';
        }
        
        //Записываем в сессию
        $CI->session->set_userdata($data);
        
        //Уходим к списку записей
        redirect('admin/'.$name.'s');
         
    }
    
    //Сброс сорт-ки и поиска
    function reset_set() {
        
        $CI = &get_instance();
        
        //Массив полей для очистки
        $data = array();
        $data['sort_by'] = '';
        $data['sort_dir'] = '';
        $data['search'] = '';
        $data['search_by'] = '';
        
        //Уничтожаем
        $CI->session->unset_userdata($data);
    }
    
    //Поиск
    function do_search($name) {
        
        $CI = &get_instance();
        
        $search = $CI->input->post('str');
        $search_by = $CI->input->post('field');
        
        //Если ничего не задали для поиска
        if (empty($search)) {
           redirect('admin/'.$name.'s'); 
        }
        
        //Устан-ем данные для сессии    
        
        //Массив с данными для сессии
        $data = array();
        $data['search'] = $search;
        $data['search_by'] = $search_by;
        
        //Записываем в сессию
        $CI->session->set_userdata($data);
        
        //Уходим к списку записей
        redirect('admin/'.$name.'s');
        
    }
    
}
?>