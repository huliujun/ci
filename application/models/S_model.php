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
    function getDBData($param) {
        $this->db = $this->load->database($param['db'],true,null);
        $res = $this->db->query($param['sql'])->result_array();
        return $res;
    }

    
}