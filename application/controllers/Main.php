<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Main extends CI_Controller
    {

        public function index()
        {
            
            $this->load->library('session');
            $this->load->library('auth');
            
            if ($this->auth->loginCheck('web')) { //已登入
                
                $data = [
                    'userRealName' => $this->auth->userData['frontendUser']['member_realname'],
                    'action' => 'logout',
                    'actionName' => 'Logout', 
                ];

            } else { //未登入
                
                $data = [
                    'userRealName' => '',
                    'action' => 'login',
                    'actionName' => 'Login', 
                ];

            }

            echo $this->twig->render('frontend/index.twig',$data);

        }

    }

?>