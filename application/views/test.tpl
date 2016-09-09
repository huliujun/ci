<!DOCTYPE >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="text/javascript" src="/application/views/js/jquery-3.1.0.min.js"></script>
    <title>demo</title>
</head>


<style>
    #pane1 {
        position: relative;
        cursor: pointer;
    }
</style>

<body>

<form  action="#">
    <a href="test" name="down" value ="123">下载 </a>
<input type="submit" name="down" value="下载">
    <select   name="table" style="width:100px;height: 30px;" >
        <{foreach from=$data.table item=v key=k}>
    <option id="table_id" value="<{$v}>" <{if "$v" eq $data.where.table}>selected<{/if}>><{$v}></option>
        <{/foreach}>
    </select>
    <input id="send"  type="button" value="确定">
    <script>
        $('#send').click(function () {
            $.post('/test/index',{
                table:$('#table_id').val(),
            },function (data,testStatus) {
                console.log(data);

                $('#pane1').html(data);
            });
        });
    </script>

<div id="pane">
    </div>
<div id="pane1">
<table class="table"  >
    <!--  table头加 排序 开始-->
    <thead >
    <tr>
        <{foreach from=$data.data.title item=item}>
        <td >
            <a href="javascript:void" style="color:#0000cc;"><{$item}></a>
        </td>
        <{/foreach}>
    </tr>
    </thead>
    <!--  table头加 排序 结束-->
    <tbody>
    <{foreach from=$data.data.data item=value  }>
        <tr>
            <{foreach from=$data.data.title item=v key=k }>
            <td style="text-align:center; border:1px solid #ddd"><{$value.$k}> </td>
            <{/foreach}>
        </tr>
        <{/foreach}>
    </tbody>
</table>
</div>
<script>
    $(function(){
        $('#pane1').click(function(){
            $(this).animate({left:"500px"},3000);
        });

    });
</script>
</form>
</body>
</html>