<?php

/**
 * @author phpdesigner
 * @copyright 2015
 */


if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {
        
    /**
     * Просмотр страницы
     */
    function show($page_id = '') {
        
        $this->lib_view->user_page($page_id);
         
    }
    
    function index() {
        redirect('index.html');
            
    }
    
    //Форма обратной связи
    function contact() {
        
        //Правила валидации
        $rules = array(
        
            array(
                'field' => 'email',
                'label' => 'Ваш e-mail',
                'rules' => 'required|valid_email'
            ),
            
            array(
                'field' => 'subject',
                'label' => 'Тема сообщения',
                'rules' => 'required|valid_title|max_length[150]|xss_clean'
            ),
            
            array(
                'field' => 'text',
                'label' => 'Текст сообщения',
                'rules' => 'required|xss_clean'
            ),
            
            array(
                'field' => 'captcha',
                'label' => 'Код с картинки',
                'rules' => 'required|numeric|min__length[6]|max_length[6]'
            )
            
        );
        
        //Применяем правила
        $this->form_validation->set_rules($rules);
        
        //Проверяем - проходит ли форма валидацию
        $ok_form = $this->form_validation->run();
        
        if ($ok_form) { //Если остальные поля в порядке
            //Проверка строки Каптчи - сравн-ем со зн-ем сессии
            $entered_captcha = $this->input->post('captcha');
            
            if ($entered_captcha != $this->session->userdata('captcha_rnd_str')) {
                $ok_form = false; //Если не соотв. зн-ю сессии
            }
        }
        
        //Если валидация не пройдена - показываем форму
        if (!$ok_form) {
            //Загружаем плагин Каптча
            $this->load->helper('captcha');
            
            //Модуль для генерирования случ. строки
            $this->load->helper('string');
            $rnd_str = random_string('numeric', 6);
            
            //Записываем строку в сессию
            $ses_data = array();
            $ses_data['captcha_rnd_str'] = $rnd_str;
            $this->session->set_userdata($ses_data);
            
            //Формируем картинку
            $vals = array(
                'word'       => $rnd_str,
                'img_path'   => './img/captcha/',
                'img_url'    => base_url().'img/captcha/',
                'font_path'  => './system/fonts/bkant.ttf',
                'img_width'  => 120,
                'img_height' => 30,
                'expiration' => 10
            );
            
            $cap = create_captcha($vals);
            
            $data = array();
            $data['imgcode'] = $cap['image']; //Код картинки
            
            $this->lib_view->simple_page('contact', $data, 'Обратная связь');
            
        } else {
            
            //Иначе - отправляем письмо
            $this->load->library('phpmailer'); //Класс phpmailer
            
            $this->phpmailer->ClearAllRecipients();
            
            //Email получателя
            $this->phpmailer->AddAddress($this->input->post('email'));
            
            //От кого
            $this->phpmailer->From = 'me@mysite.ru';
            $this->phpmailer->FromName = 'Пользователь';
            
            //Тема
            $this->phpmailer->Subject = $this->input->post('subject', true);
            //Тип
            $this->phpmailer->ContentType = 'text/plain';
            //Текст
            $this->phpmailer->Body = $this->input->post('text', true);
            
            //Отправляем
            $this->phpmailer->send();
            
            //Здесь можно сделать редирект на любую стрвницу
            die('Ваше сообщение отправлено');
            
        }
        
    }
       
}
?>