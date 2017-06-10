<?php
/**
 * Created by PhpStorm.
 * User: hulj
 * Date: 2016/8/15
 * Time: 14:37
 */
class Home_model extends CI_Model{
    protected $db = null;
    function __construct()
    {
        $this->db = $this->load->database('ci_db',true);
    }

    function getMenuFile(){
        $sql = 'select * from menu ORDER BY `order`';
        $res = $this->db->query($sql)->result_array();
        
        foreach ($res as $k => $v) {
            if ($v['parent_id'] == 0){
                $parent_menu[] = $v;
            }else {
                $child_menu[] = $v;
            }
        }
        return ['pm'=>$parent_menu, 
                'cm'=>$child_menu];
    }


}