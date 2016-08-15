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
            $this->tpl->assign("parent_menu",$parent_menu);
            $this->tpl->assign("child_menu",$child_menu);
            $this->tpl->display('home.tpl');
        }
    }
    