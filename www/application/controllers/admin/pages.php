<?php

/**
 * @author phpdesigner
 * @copyright 2015
 */


if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {
    
    var $iname = 'page';
    
    function __construct() {
        
        parent::__construct();
        
        //Проверка - был ли вход
        $this->lib_auth->check_admin();
        
        $mdl_name = 'mdl_'.$this->iname; //Имя модели
        
        $this->load->model($mdl_name); //Загруженная модель
        
    }
    
    function index($link_num = 0) {
        
        $this->lib_mng->show_index($this->iname, 'Список страниц', $link_num);
        
    }
    
    /**
     * Добавление новой страницы
     */
    function add() {
        
        $this->load->helper('tinymce');
        
        $this->lib_mng->add($this->iname, 'Добавление новой страницы');
    }
    
    /**
     * Просмотр страницы
     */
    function show($id) {
        $this->lib_mng->show($this->iname, $id, 'Просмотр страницы'); 
    }
    
    /**
     * Редактирование страницы
     */
    function edit($id) {
        
        $this->load->helper('tinymce');
        
        $this->lib_mng->edit($this->iname, $id, 'Изменение страницы'); 
    }
    
    /**
     * Удаление страницы
     */
    function del($id) {
        $this->lib_mng->del($this->iname, $id); 
    }
    
    /**
     * Сортировка
     */
    function sort($field) {
        $this->lib_mng->set_sort($this->iname, $field); 
    }
    
    /**
     * Поиск
     */
    function search() {
        $this->lib_mng->do_search($this->iname); 
    }
}
?>