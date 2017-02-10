<?php

/**
 * @author phpdesigner
 * @copyright 2014
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class lib_view {
    
    //Ф-я отобр. стр. админки на осн. хедера, футера и серединки
    function admin_page ($pagename, $data = array(), $title = '') {
        
        //Вначале выводим хедер - передаём ему только заголовок
        $d = array();
        $d['page_title'] = $title;
        
        $CI = &get_instance(); //Доступ к CI
        
        $CI->load->view('admin/header.php', $d);
        
        //Готовим вывод серединки
        $CI->load->view('admin/'.$pagename, $data);
        
        //Данные для футера
        $fdata = array();
        $fdata['validatin_errors'] = validation_errors();
        
        //Готовим вывод футера
        $CI->load->view('admin/footer.php', $fdata);
    
    }
    
    //Ф-я отобр. стр. юзера на осн. хедера, футера и серединки
    function user_page ($pagename) {
        
        $CI = &get_instance(); //Доступ к CI
                
        //Готовим вывод серединки
        $CI->db->where('page_id', $pagename);
        $query = $CI->db->get('pages');
        
        if($query->num_rows() > 0) {
            
            $row = $query->row_array();
            
            $ddd = array();
            $ddd['content'] = $row['text'];
            
            if($row['showed'] != 1) {
                die('Эта страничка скрыта');
            }
            
        } else {
            die('Такой страницы не существует');
        }
        
        //Вначале выводим хедер - передаём ему только заголовок
        $d = array();
        $d['page_title'] = $row['title'];
        
        $CI->load->view('header.php', $d);
        
        $CI->load->view('content.php', $ddd);
        
        //Данные для футера
        $fdata = array();
        //$fdata['validatin_errors'] = validation_errors();
        
        //Готовим вывод футера
        $CI->load->view('footer.php', $fdata);
    
    }
    
    //Ф-я отобр. стр. на осн. хедера, футера и серединки
    function simple_page($page, $data = array(), $title = '') {
        
        $CI = &get_instance(); //Доступ к CI
        
        //Вначале выводим хедер - передаём ему только заголовок
        $d = array();
        $d['page_title'] = $title;
        
        $CI->load->view('header.php', $d);
        
        //Готовим вывод серединки
        $CI->load->view($page, $data);
        
        //Данные для футера
        $fdata = array();
        $fdata['validatin_errors'] = validation_errors();
        
        //Готовим вывод футера
        $CI->load->view('footer.php', $fdata);
        
    }
    
}

?>