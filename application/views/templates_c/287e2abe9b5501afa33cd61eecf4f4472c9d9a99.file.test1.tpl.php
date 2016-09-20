<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-09-20 03:26:06
         compiled from "D:\wamp\www\ci\application\views\templates\test1.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3118057e0902ed720a0-72477686%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '287e2abe9b5501afa33cd61eecf4f4472c9d9a99' => 
    array (
      0 => 'D:\\wamp\\www\\ci\\application\\views\\templates\\test1.tpl',
      1 => 1473651129,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3118057e0902ed720a0-72477686',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57e0902ee19f58_00011347',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57e0902ee19f58_00011347')) {function content_57e0902ee19f58_00011347($_smarty_tpl) {?>
<div id="allpage">


    <div >
    <table class="table"  >
    <!--  table头加 排序 开始-->
    <thead >
    <tr>

        <td >
            <a href="javascript:void" style="color:#0000cc;"></a>
        </td>

    </tr>

    </thead>
    <!--  table头加 排序 结束-->
    <tbody>
    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
        <tr><td class="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['v']->value['path'];?>
" style="text-align:center; border:1px solid #ddd"> <a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['path'];?>
" style="color:#0000cc;"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</a>   </td>
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
        fun.show_title('tooltip');
    });
<?php echo '</script'; ?>
>
</div>

<?php }} ?>
