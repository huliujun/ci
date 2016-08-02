<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-08-02 11:24:23
         compiled from "D:\wamp\www\test\application\views\templates\test.tpl" */ ?>
<?php /*%%SmartyHeaderCode:90035799a3f7810463-02251838%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '745fa52eab975937e3eb9bf397aa6cd7f3e4acdf' => 
    array (
      0 => 'D:\\wamp\\www\\test\\application\\views\\templates\\test.tpl',
      1 => 1470129861,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '90035799a3f7810463-02251838',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5799a3f7885765_48132833',
  'variables' => 
  array (
    'title' => 0,
    'item' => 0,
    'data' => 0,
    'k' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5799a3f7885765_48132833')) {function content_5799a3f7885765_48132833($_smarty_tpl) {?><!DOCTYPE >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?php echo '<script'; ?>
 type="text/javascript" src="/application/views/js/jquery-3.1.0.min.js"><?php echo '</script'; ?>
>
    <title>demo</title>
</head>


<style>
    #pane1 {
        position: relative;
        width:100px;
        height:100px;
        border:1px solid #0000cc;
        background: #5a0099;
        cursor: pointer;
    }
</style>

<body>
<div id="pane1">
    
</div>
<table class="table"  >
    <!--  table头加 排序 开始-->
    <thead >
    <tr>

        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['title']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
        <td >
            <a href="javascript:void" style="color:#0000cc;"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</a>
        </td>
        <?php } ?>
    </tr>

    </thead>
    <!--  table头加 排序 结束-->
    <tbody>
    <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
        <tr>
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['title']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
            <td style="text-align:center; border:1px solid #ddd"><?php echo $_smarty_tpl->tpl_vars['value']->value[$_smarty_tpl->tpl_vars['k']->value];?>
 </td>
            <?php } ?>
        </tr>
        <?php } ?>
    </tbody>
</table>
<?php echo '<script'; ?>
>
    $(function(){
        $('#pane1').click(function(){
            $(this).animate({left:"500px"},3000);
        });
    });
<?php echo '</script'; ?>
>

</body>
</html><?php }} ?>
