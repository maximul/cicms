<?php

/**
 * @author phpdesigner
 * @copyright 2015
 */


if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Form_Validation extends CI_Form_Validation {
    
    /**
     * Вызов родительского класса
     */
    function __construct() {
        parent::__construct();
        
        //Загружаем новый языковый файл
        $CI = &get_instance();
        $CI->lang->load('validation_new');
        
    }
    
    /**
     * Ф-я проверки на наличие маленьких букв и цифр
     */
    function az_numeric($str) {
        return (!preg_match("/^([a-z0-9])+$/", $str)) ? false : true;
    }
     
    /**
     * Валидация url
     */
    function valid_url($str) {
        return (!preg_match('/(http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:;.?+=&%@!\-\/]))?/', $str)) ? false : true;
    }
    
    /**
     * Валидное название
     */
    function valid_title($str) {
        return (!preg_match('/^[А-Яа-яЁё"\w\d\s\.\,\+\-\_\!\?\#\%\@\№\/\(\)\[\]\:\&\$\*]{1,250}$/u', $str)) ? false : true;
    }
      
    /**
     * Проверка на уникальность
     */
    function uniq($str, $param) {
        //Объект CI
        $CI = &get_instance();
        //Имя таблицы
        $tname = str_replace('_id', 's', $param);
        
        $CI->db->where($param, $str);
        return ($CI->db->count_all_results($tname) == 0);
    }
        
}
?>