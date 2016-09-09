<?php
/**
 * Created by PhpStorm.
 * User: hulj
 * Date: 2016/7/14
 * Time: 20:30
 */
class S_model extends CI_Model {
    public $db;
    function __construct()
    {
        parent::__construct();
    }
    function query($db,$sql,$type='select') {
        $this->db = $this->load->database($db,true,null);
        if ($type != 'select')
            $res = $this->db->query($sql);
        else
            $res = $this->db->query($sql)->result_array();
        return $res;
    }

    
}