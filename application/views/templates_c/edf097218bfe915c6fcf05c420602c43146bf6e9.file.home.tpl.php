<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-09-11 10:25:10
         compiled from "D:\wamp\www\test\application\views\templates\home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1249757c21118b03234-67994412%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'edf097218bfe915c6fcf05c420602c43146bf6e9' => 
    array (
      0 => 'D:\\wamp\\www\\test\\application\\views\\templates\\home.tpl',
      1 => 1473581202,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1249757c21118b03234-67994412',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57c21118cbc921_24800089',
  'variables' => 
  array (
    'parent_menu' => 0,
    'item' => 0,
    'child_menu' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57c21118cbc921_24800089')) {function content_57c21118cbc921_24800089($_smarty_tpl) {?><!DOCTYPE >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?php echo '<script'; ?>
 type="text/javascript" src="/application/views/js/jquery-3.1.0.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="/application/views/js/common.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="/application/views/js/jquery.form.js"><?php echo '</script'; ?>
>
    <!--link rel="stylesheet" type="text/css" href="/application/views/js/bootstrap.min.css" /-->
    <link rel="stylesheet" type="text/css" href="/application/views/css/mystyle.css" />
    <link rel="stylesheet" type="text/css" href="/application/views/css/style.css" />
    <title>demo</title>
</head>

<body>
<div style="min-width: 1000px">
<div class="menu-box">
    <table>
        <thead>
            <tr><td>菜单</td></tr>
        </thead>
        <tbody class="sparent">
            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['parent_menu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                <?php if ($_smarty_tpl->tpl_vars['item']->value['show']==1) {?><tr class="parent" id="row_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><td><?php echo $_smarty_tpl->tpl_vars['item']->value['filename'];?>
</td></tr>
                <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['child_menu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value) {
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
                <?php if ($_smarty_tpl->tpl_vars['i']->value['show']==1&&$_smarty_tpl->tpl_vars['i']->value['parent_id']==$_smarty_tpl->tpl_vars['item']->value['id']) {?>
                <tr class="child_row_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" id="c_r_<?php echo $_smarty_tpl->tpl_vars['i']->value['id'];?>
"><td><?php echo $_smarty_tpl->tpl_vars['i']->value['filename'];?>
</td></tr>
                <?php echo '<script'; ?>
>
                    $('#c_r_<?php echo $_smarty_tpl->tpl_vars['i']->value['id'];?>
').click(function () {
                        $.post('<?php echo $_smarty_tpl->tpl_vars['i']->value['filepath'];?>
',{
                        },function(data){
                            console.log(123);
                            $('#ajaxnode').html(data);
                        });
                    });
                <?php echo '</script'; ?>
>
                <?php }?>
                <?php } ?>
                <?php }?>
            <?php } ?>
        </tbody>
    </table>
    <?php echo '<script'; ?>
>
        $(function () {
            $('tr.parent').click(function () {
                $(this)
                        .toggleClass('selected')
                        .siblings('.child_'+this.id).toggle();
            }).click();
        });
    <?php echo '</script'; ?>
>
</div>

<div class="table-box" style="height: auto; width: 75%;">

    <div id="ajaxnode">

    </div>
    <?php echo '<script'; ?>
>
        $('#ajaxnode').append("<div class='loading' style='width:100%;float: top;'><img style='margin-left:50%;margin-top:200px ;' src='/application/views/image/loading7.gif'></div>");
        $.post('/test',{
        },function(data){
            $('#ajaxnode').html(data);
        });
    <?php echo '</script'; ?>
>
</div>
</div>
</body>
</html><?php }} ?>
