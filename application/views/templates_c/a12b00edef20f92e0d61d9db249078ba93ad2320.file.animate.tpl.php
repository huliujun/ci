<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-09-20 03:26:48
         compiled from "D:\wamp\www\ci\application\views\templates\animate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1333357e09058415de0-51735644%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a12b00edef20f92e0d61d9db249078ba93ad2320' => 
    array (
      0 => 'D:\\wamp\\www\\ci\\application\\views\\templates\\animate.tpl',
      1 => 1473651129,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1333357e09058415de0-51735644',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57e09058467e06_87311337',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57e09058467e06_87311337')) {function content_57e09058467e06_87311337($_smarty_tpl) {?><style>
    /*容器*/
    .container {
        perspective: 1000px;
    }

    /*piece盒子*/
    .piece-box {
        position: relative;
        width: 200px;
        height: 200px;
        margin: 300px auto;
        perspective-origin: 50% 50%;
        transform-style: preserve-3d;
        animation: pieceRotate 5s;

    }

    /*为了实现第二个动画加的盒子*/
    .piece-box2 {
        transform-style: preserve-3d;
        animation: boxRotate 5s 10s infinite;

    }

    /*piece通用样式*/
    .piece {
        position: absolute;
        width: 200px;
        height: 200px;
        background: red;
        opacity: 0.5;
    }

    .piece-1 {
        background: #FF6666;
        transform: rotateY(0deg) translateZ(173.2px);
        animation: piece1Rotate 5s 5s;
        animation-fill-mode: forwards;
    }

    .piece-2 {
        background: #FFFF00;
        transform: rotateY(60deg) translateZ(173.2px);
        animation: piece2Rotate 5s 5s;
        animation-fill-mode: forwards;
    }

    .piece-3 {
        background: #006699;
        transform: rotateY(120deg) translateZ(173.2px);
        animation: piece3Rotate 5s 5s;
        animation-fill-mode: forwards;
    }

    .piece-4 {
        background: #009999;
        transform: rotateY(180deg) translateZ(173.2px);
        animation: piece4Rotate 5s 5s;
        animation-fill-mode: forwards;
    }

    .piece-5 {
        background: #FF0033;
        transform: rotateY(240deg) translateZ(173.2px);
        animation: piece5Rotate 5s 5s;
        animation-fill-mode: forwards;
    }

    .piece-6 {
        background: #FF6600;
        transform: rotateY(300deg) translateZ(173.2px);
        animation: piece6Rotate 5s 5s;
        animation-fill-mode: forwards;
    }

    /*走马灯动画*/
    @keyframes pieceRotate {
        0% {
            transform: rotateY(0deg);
        }
        100% {
            transform: rotateY(360deg);
        }
    }

    /*以下是走马灯转变为六面正方体的动画*/

    /*front*/
    @keyframes piece1Rotate {
        0% {
            transform: rotateY(0deg) translateZ(173.2px);
        }
        100% {
            transform: rotateY(0deg) translateZ(100px);
        }
    }

    /*back*/
    @keyframes piece2Rotate {
        0% {
            transform: rotateY(60deg) translateZ(173.2px);
        }
        100% {
            transform: rotateY(0deg) translateZ(-100px);
        }
    }

    /*left*/
    @keyframes piece3Rotate {
        0% {
            transform: rotateY(120deg) translateZ(173.2px);
        }
        100% {
            transform: translateX(-100px) rotateY(90deg);
        }
    }

    /*right*/
    @keyframes piece4Rotate {
        0% {
            transform: rotateY(180deg) translateZ(173.2px);
        }
        100% {
            transform: translateX(100px) rotateY(90deg);
        }
    }

    /*top*/
    @keyframes piece5Rotate {
        0% {
            transform: rotateY(240deg) translateZ(173.2px);
        }
        100% {
            transform: translateY(-100px) rotateX(90deg);
        }
    }

    /*bottom*/
    @keyframes piece6Rotate {
        0% {
            transform: rotateY(300deg) translateZ(173.2px);
        }
        100% {
            transform: translateY(100px) rotateX(90deg);
        }
    }

    /*正方体旋转动画*/
    @keyframes boxRotate {
        0% {
            transform: rotateX(0deg) rotateY(0deg);
        );
        }
        100% {
            transform: rotateX(360deg) rotateY(360deg);
        }
    }

</style>
<div id="allpage">
    <div class="container">
        <div class="piece-box">
            <div class="piece-box2">
                <div class="piece piece-1"></div>
                <div class="piece piece-2"></div>
                <div class="piece piece-3"></div>
                <div class="piece piece-4"></div>
                <div class="piece piece-5"></div>
                <div class="piece piece-6"></div>
            </div>
        </div>
    </div>
    <?php echo '<script'; ?>
>
        $(function () {
            $('#pane1').click(function () {
                $(this).animate({left:"500px"}, 3000);
            });
            fun.show_title('tooltip');
        });
    <?php echo '</script'; ?>
>
</div>

<?php }} ?>
