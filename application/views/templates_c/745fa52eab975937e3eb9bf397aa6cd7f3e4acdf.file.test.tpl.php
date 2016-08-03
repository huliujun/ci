<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-08-03 14:41:36
         compiled from "D:\wamp\www\test\application\views\templates\test.tpl" */ ?>
<?php /*%%SmartyHeaderCode:90035799a3f7810463-02251838%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '745fa52eab975937e3eb9bf397aa6cd7f3e4acdf' => 
    array (
      0 => 'D:\\wamp\\www\\test\\application\\views\\templates\\test.tpl',
      1 => 1470228095,
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
    'vaa' => 0,
    'db' => 0,
    'k' => 0,
    'where' => 0,
    'v' => 0,
    'title' => 0,
    'item' => 0,
    'data' => 0,
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
        cursor: pointer;
    }
</style>

<body>

<form method="post" action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['vaa']->value);?>
">
    <a href="test" name="down" value ="123">下载 </a>
<input type="submit" name="down" value="下载">
    <select   name="db" style="width:100px;height: 30px;" >
        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['db']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
    <option value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" <?php if (((string)$_smarty_tpl->tpl_vars['k']->value)==$_smarty_tpl->tpl_vars['where']->value['db']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</option>
        <?php } ?>
    </select>

    <input type="submit" name="213" value="确定">



<div id="pane1">


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
</div>
<?php echo '<script'; ?>
>
    $(function(){
        $('#pane1').click(function(){
            $(this).animate({left:"500px"},3000);
        });
    });
<?php echo '</script'; ?>
>
</form>
</body>
</html><?php }} ?>
