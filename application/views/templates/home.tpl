<!DOCTYPE >
<html lang="zh-cn">
<head>
    <meta charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/application/views/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/application/views/css/mystyle.css" />
    <!--link rel="stylesheet" type="text/css" href="/application/views/css/style.css" /-->

    <script type="text/javascript" src="/application/views/js/jquery-3.1.0.min.js"></script>
    <script type="text/javascript" src="/application/views/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/application/views/js/common.js"></script>
    <script type="text/javascript" src="/application/views/js/jquery.form.js"></script>
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
            <{foreach from = $parent_menu key = key item = item}>
                <{if $item.show == 1}><tr class="parent" id="row_<{$item.id}>"><td><{$item.filename}></td></tr>
                <{foreach from = $child_menu key = k item = i}>
                <{if $i.show == 1 and $i.parent_id == $item.id}>
                <tr class="child_row_<{$item.id}>" id="c_r_<{$i.id}>"><td><{$i.filename}></td></tr>
                <script>
                    $('#c_r_<{$i.id}>').click(function () {
                        $.post('<{$i.filepath}>',{
                        },function(data){
                            $('#ajaxnode').html(data);
                        });
                    });
                </script>
                <{/if}>
                <{/foreach}>
                <{/if}>
            <{/foreach}>
        </tbody>
    </table>
    <script>
        $(function () {
            $('tr.parent').click(function () {
                $(this)
                        .toggleClass('selected')
                        .siblings('.child_'+this.id).toggle();
            }).click();
        });
    </script>
</div>

<div class="table-box">

    <div id="ajaxnode">

    </div>
    <script>
        $('#ajaxnode').append("<div class='loading' style='width:100%;float: top;'><img style='margin-left:50%;margin-top:200px ;' src='/application/views/img/loading7.gif'></div>");
        $.post('/test',{
        },function(data){
            $('#ajaxnode').html(data);
        });
    </script>
</div>
</div>
</body>
</html>