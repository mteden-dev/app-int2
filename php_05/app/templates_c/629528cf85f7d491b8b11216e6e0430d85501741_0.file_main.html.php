<?php
/* Smarty version 5.0.0, created on 2025-04-27 19:17:30
  from 'file:main.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.0.0',
  'unifunc' => 'content_680e82ca19cc85_21296659',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '629528cf85f7d491b8b11216e6e0430d85501741' => 
    array (
      0 => 'main.html',
      1 => 1745781445,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_680e82ca19cc85_21296659 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Users/przemyslawbanasz/Documents/Code/APP INT/app-int2/php_04/app/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title><?php echo (($tmp = $_smarty_tpl->getValue('page_title') ?? null)===null||$tmp==='' ? "Tytuł domyślny" ?? null : $tmp);?>
</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->getValue('app_url');?>
/app/templates/assets/css/main.css" />
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->getValue('app_url');?>
/app/styles/custom.css" />
        <noscript><link rel="stylesheet" href="<?php echo $_smarty_tpl->getValue('app_url');?>
/app/templates/assets/css/noscript.css" /></noscript>
        <style>
            .slider {
                width: 600px;
                background-color: #5052a0;
            }
            .debug-panel {
                position: fixed;
                top: 0;
                left: 0;
                background: #f8f9fa;
                border: 1px solid #dee2e6;
                padding: 10px;
                z-index: 9999;
                color: #000;
            }
        </style>
    </head>
    <body class="is-preload">


        <!-- Sidebar -->
            <section id="sidebar">
                <div class="inner">
                    <nav>
                        <ul>
                            <li><a href="#intro">Witaj</a></li>
                            <li><a href="#one">Kalkulator</a></li>
                        </ul>
                    </nav>
                </div>
            </section>

        <!-- Wrapper -->
            <div id="wrapper">

                <!-- Intro -->
                    <section id="intro" class="wrapper style1 fullscreen fade-up">
                        <div class="inner">
                            <h1><?php echo (($tmp = $_smarty_tpl->getValue('page_title') ?? null)===null||$tmp==='' ? "Tytuł domyślny" ?? null : $tmp);?>
</h1>
                            <p><?php echo (($tmp = $_smarty_tpl->getValue('page_description') ?? null)===null||$tmp==='' ? "Opis domyślny" ?? null : $tmp);?>
</p>
                            <ul class="actions">
                                <li><a href="#one" class="button scrolly">Przejdź do kalkulatora</a></li>
                                <li><?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_524158422680e82ca19a099_98374798', 'wyloguj');
?>
</li>
                            </ul>
                        </div>
                    </section>

                <!-- One -->
                    <section id="one" class="wrapper style2 spotlights">
                        <section>
                            <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_2070937282680e82ca19ae56_21137054', 'content');
?>

                        </section>



            </div>		

        <!-- Footer -->
<footer id="footer" class="wrapper style1-alt">
    <div class="inner">
        <ul class="menu">
            <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1848472508680e82ca19b330_53740015', 'footer');
?>

        </ul>
    </div>
</footer>

        <!-- Scripts -->
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('app_url');?>
/app/templates/assets/js/jquery.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('app_url');?>
/app/templates/assets/js/jquery.scrollex.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('app_url');?>
/app/templates/assets/js/jquery.scrolly.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('app_url');?>
/app/templates/assets/js/browser.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('app_url');?>
/app/templates/assets/js/breakpoints.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('app_url');?>
/app/templates/assets/js/util.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('app_url');?>
/app/templates/assets/js/main.js"><?php echo '</script'; ?>
>
        <?php if ($_smarty_tpl->getValue('hide_intro')) {?>
        <?php echo '<script'; ?>
>
            document.addEventListener("DOMContentLoaded", function() {
                location.hash = "#one";
            });
        <?php echo '</script'; ?>
>
        <?php }?>
    </body>
</html><?php }
/* {block 'wyloguj'} */
class Block_524158422680e82ca19a099_98374798 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Users/przemyslawbanasz/Documents/Code/APP INT/app-int2/php_04/app/templates';
?>
 wyloguj <?php
}
}
/* {/block 'wyloguj'} */
/* {block 'content'} */
class Block_2070937282680e82ca19ae56_21137054 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Users/przemyslawbanasz/Documents/Code/APP INT/app-int2/php_04/app/templates';
?>
 Domyślna treść zawartości .... <?php
}
}
/* {/block 'content'} */
/* {block 'footer'} */
class Block_1848472508680e82ca19b330_53740015 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Users/przemyslawbanasz/Documents/Code/APP INT/app-int2/php_04/app/templates';
?>
 Domyślna treść stopki .... <?php
}
}
/* {/block 'footer'} */
}
