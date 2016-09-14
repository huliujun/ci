<?php
/**
 * Created by PhpStorm.
 * User: hulj
 * Date: 2016/8/15
 * Time: 14:34
 */
    class Home extends CI_Controller{
        function index(){
            $this->load->model('home_model');
            $data = $this->home_model->getMenuFile();
            $parent_menu = $data['pm'];
            $child_menu = $data['cm'];
            assign("parent_menu",$parent_menu);
            assign("child_menu",$child_menu);
            display('home.tpl');
        }
    }
    