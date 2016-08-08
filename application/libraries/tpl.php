<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Smartytpl library. Extends default Smarty class
 *
 * @author	JohnHeroHD <johnherohd@gmail.com>
 * @author	Eric 'Aken' Roberts <eric@cryode.com>
 * @link	https://github.com/JohnHeroHD/Codeigniter-Smarty
 * @version	1.0.1
 */

// Require the Smarty class from our third_party directory.
require_once APPPATH . 'libraries/smarty/Smarty.class.php';

class Tpl extends Smarty {

    /**
     * Constructor!
     *
     * @access	public
     * @return	void
     */
    public function __construct(){
        parent::__construct();

        // Get CodeIgniter super object.
        $CI =& get_instance();

        // Get Smarty config items.
        $CI->load->config('smarty');
        // Set appropriate paths.
        // 在此设置模板常量

        $this->assign('VIEWPATH','/'.APPPATH.'views/');
        //设置左右定界符

        $this->left_delimiter = $CI->config->item('left_delimiter');
        $this->right_delimiter = $CI->config->item('right_delimiter');
        //设置缓存
        $this->debugging = $CI->config->item('debugging');
        //设置缓存目录
        $this->cache_dir = $CI->config->item('cache_dir');
        //是否开启缓存
        $this->caching = $CI->config->item('caching');
        $this->setTemplateDir($CI->config->item('smarty_template_dir'));
        $this->setCompileDir($CI->config->item('smarty_compile_dir'));



    }

    // ------------------------------------------------------------------------------
    /**
     * Takes the data array passed as the second parameter of
     * CodeIgniter's $this->load->view() function, and assigns
     * data to Smarty.
     */
    public function assign_variables($variables = array()){
        if (is_array($variables)){
            foreach ($variables as $name => $val){
                $this->assign($name, $val);
            }
        }
    }

}