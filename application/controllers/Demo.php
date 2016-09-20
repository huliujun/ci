<?php
/**
 * Created by PhpStorm.
 * User: hulj
 * Date: 2016/8/15
 * Time: 18:06
 */
class Demo extends CI_Controller{
    function index(){
        echo 'demo index';

        //Header( "Content-type: image/gif");

        $res = query('net_spider','select * from web_page limit 20');

        echo  ($res[0]['page_content']);
        foreach ($res as $k=>$v) {
            
        }


        //echo $img['file_data'];
    }

    function foo(){
        echo 'demo foo';
        $this->tpl->display('animate.tpl');
    }
}