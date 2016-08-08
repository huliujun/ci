<?php
/**
 * Created by PhpStorm.
 * User: hulj
 * Date: 2016/7/14
 * Time: 17:18
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Test extends CI_Controller {
    function __construct(){
        parent::__construct();
    }

    
    function index(){
        $this->load->model('test_model');
//        $this->load->library('calendar');
//        echo $this->calendar->generate();
//        $this->load->helper('url');
//        echo base_url("views/js");
//        echo current_url();
//        $this->load->helper('download');
//        $down = ($this->input->post('down'));
//        $down2 = ($this->input->get('down'));
//
//        if ($down){
//            force_download('123.txt','woshi yige meimei');
//        }if ($down2){
//            force_download('123.txt','woshi yige meimei');
//        }
        $vaa = $_SERVER["PHP_SELF"];
        $data = $this->test_model->getData();
        $this->tpl->assign("vaa",$vaa);
        $this->tpl->assign("data",$data);
        $this->tpl->display('test.tpl');
    }

}