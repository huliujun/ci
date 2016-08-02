<!DOCTYPE >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="text/javascript" src="/jquery-1.11.2.min.js"></script>
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

        <{foreach from=$title item=item}>
        <td >
            <a href="javascript:void" style="color:#0000cc;"><{$item}></a>
        </td>
        <{/foreach}>
    </tr>

    </thead>
    <!--  table头加 排序 结束-->
    <tbody>
    <{foreach from=$data item=value  }>
        <tr>
            <{foreach from=$title item=v key=k }>
            <td style="text-align:center; border:1px solid #ddd"><{$value.$k}> </td>
            <{/foreach}>
        </tr>
        <{/foreach}>
    </tbody>
</table>
<script>
    $(function(){
        $('#pane1').click(function(){
            $(this).animate({left:"500px"},3000);
        });
    });
</script>

</body>
</html>