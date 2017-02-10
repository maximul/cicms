<?php

/**
 * @author phpdesigner
 * @copyright 2015
 */


if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mdl_page extends Crud {
    
    var $table = 'pages'; //Имя таблицы
    
    var $idkey = 'page_id';
    
    //Правила валидации для добавления
    var $add_rules = array (
       
        array (
            'field'   => 'page_id', 
            'label'   => 'ID страницы', 
            'rules'   => 'required|az_numeric|uniq[page_id]'
        ),
        
        array (
            'field'   => 'title', 
            'label'   => 'Название', 
            'rules'   => 'required|valid_title'
        ),
        
        array (
            'field'   => 'text', 
            'label'   => 'Текст', 
            'rules'   => ''
        ),
        
        array (
            'field'   => 'date', 
            'label'   => 'Дата', 
            'rules'   => 'required|numeric'
        ),
        
        array (
            'field'   => 'showed', 
            'label'   => 'Показать', 
            'rules'   => 'numeric'
        )
              
    );
    
    //Правила валидации для редактирования
    var $edit_rules = array (
       
      array (
            'field'   => 'title', 
            'label'   => 'Название', 
            'rules'   => 'required|valid_title'
        ),
        
        array (
            'field'   => 'text', 
            'label'   => 'Текст', 
            'rules'   => ''
        ),
        
        array (
            'field'   => 'showed', 
            'label'   => 'Показать', 
            'rules'   => 'numeric'
        )
              
    );
    
}
?>