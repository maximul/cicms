<?php

/**
 * @author phpdesigner
 * @copyright 2015
 */


if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mdl_link extends Crud {
    
    var $table = 'links'; //Имя таблицы
    
    var $idkey = 'link_id';
    
    //Правила валидации для добавления
    var $add_rules = array (
       
        array (
            'field'   => 'link_id', 
            'label'   => 'ID ссылки', 
            'rules'   => 'required|az_numeric|uniq[link_id]'
        ),
        
        array (
            'field'   => 'descr', 
            'label'   => 'Описание', 
            'rules'   => 'required|valid_title'
        ),
        
        array (
            'field'   => 'url', 
            'label'   => 'URL', 
            'rules'   => 'required|valid_url'
        )
              
    );
    
    //Правила валидации для редактирования
    var $edit_rules = array (
       
       array (
            'field'   => 'descr', 
            'label'   => 'Описание', 
            'rules'   => 'required|valid_title'
        ),
        
        array (
            'field'   => 'url', 
            'label'   => 'URL', 
            'rules'   => 'required|valid_url'
        )
              
    );
    
}
?>