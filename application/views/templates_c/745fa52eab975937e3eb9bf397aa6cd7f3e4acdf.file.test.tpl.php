<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-08-15 08:11:49
         compiled from "D:\wamp\www\test\application\views\templates\test.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2115357b155dac63ba7-64180236%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '745fa52eab975937e3eb9bf397aa6cd7f3e4acdf' => 
    array (
      0 => 'D:\\wamp\\www\\test\\application\\views\\templates\\test.tpl',
      1 => 1471241504,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2115357b155dac63ba7-64180236',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57b155dae0e4b7_92986327',
  'variables' => 
  array (
    'data' => 0,
    'v' => 0,
    'item' => 0,
    'k' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57b155dae0e4b7_92986327')) {function content_57b155dae0e4b7_92986327($_smarty_tpl) {?>
<div id="allpage">
<a href="test" name="down" value ="123">下载 </a>
<input type="submit" name="down" value="下载">
    <select id="select_table"  name="table" style="width:100px;height: 30px;" >
        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['table']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
    <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
" <?php if (((string)$_smarty_tpl->tpl_vars['v']->value)==$_smarty_tpl->tpl_vars['data']->value['where']['table']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</option>
        <?php } ?>
    </select>


    <input id="click_submit" type="button" name="213" value="确定">
    <?php echo '<script'; ?>
>
        $('#click_submit').click(function () {
            $('#allpage').append("<div class='loading' style='width:100%;float: top;'><img style='margin-left:50%;margin-top:200px ;' src='/application/views/image/loading7.gif'></div>");
            $.post('/test/index',{
                table:$('#select_table').val(),
            },function(data){
               //console.log(data);
                $('#allpage').html(data);
            });
        });
    <?php echo '</script'; ?>
>

    <div id="pane1">
    <table class="table"  >
    <!--  table头加 排序 开始-->
    <thead >
    <tr>
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['data']['title']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
 $_from = $_smarty_tpl->tpl_vars['data']->value['data']['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
        <tr>
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['data']['title']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
    <div id="pageSize">

        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['page']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
        <label>
            <input type="radio" class="page_class_<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
" name="page" value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value;?>

        </label>
        <?php echo '<script'; ?>
>
            $('.page_class_<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
').click(function(){
                $.post('/test/index',{
                    table:$('#select_table').val(),
                    page:$('.page_class_<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
').val(),
                },function(data){
                    //console.log(data);
                    $('#allpage').html(data);
                });
            });
        <?php echo '</script'; ?>
>
        <?php } ?>

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
</div>
<?php }} ?>
