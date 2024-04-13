<?php
/* Smarty version 4.3.2, created on 2024-04-13 13:19:33
  from 'C:\xampp\htdocs\php_03\app\templates\main.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_661a6a45c9bed7_80230992',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7cc31778e366ac5e40be2608dfef5b6eafdf4630' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_03\\app\\templates\\main.html',
      1 => 1713007158,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661a6a45c9bed7_80230992 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE HTML>
<!--
	Hyperspace by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title><?php echo (($tmp = $_smarty_tpl->tpl_vars['page_title']->value ?? null)===null||$tmp==='' ? "Tytuł domyślny" ?? null : $tmp);?>
</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="/php_03/app/templates/assets/css/main.css" />
		<noscript><link rel="stylesheet" href="/php_03/app/templates/assets/css/noscript.css" /></noscript>
		<style>
			.slider {
				width: 600px;
				background-color: #5052a0;
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
							<h1><?php echo (($tmp = $_smarty_tpl->tpl_vars['page_title']->value ?? null)===null||$tmp==='' ? "Tytuł domyślny" ?? null : $tmp);?>
</h1>
							<p><?php echo (($tmp = $_smarty_tpl->tpl_vars['page_description']->value ?? null)===null||$tmp==='' ? "Opis domyślny" ?? null : $tmp);?>
</p>
							<ul class="actions">
								<li><a href="#one" class="button scrolly">Przejdź do kalkulatora</a></li>
								<li><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_543798325661a6a45c99198_89880458', 'wyloguj');
?>
</li>
							</ul>
						</div>
					</section>

				<!-- One -->
					<section id="one" class="wrapper style2 spotlights">
						<section>
							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1376173371661a6a45c99a53_20626255', 'content');
?>

						</section>



			</div>		

		<!-- Footer -->
			<footer id="footer" class="wrapper style1-alt">
				<div class="inner">
					<ul class="menu">
						<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_666290246661a6a45c99fa2_09442257', 'footer');
?>

					</ul>
				</div>
			</footer>

		<!-- Scripts -->
			<?php echo '<script'; ?>
 src="/php_03/app/templates/assets/js/jquery.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="/php_03/app/templates/assets/js/jquery.scrollex.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="/php_03/app/templates/assets/js/jquery.scrolly.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="/php_03/app/templates/assets/js/browser.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="/php_03/app/templates/assets/js/breakpoints.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="/php_03/app/templates/assets/js/util.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="/php_03/app/templates/assets/js/main.js"><?php echo '</script'; ?>
>
			<?php if ($_smarty_tpl->tpl_vars['hide_intro']->value) {?>
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
class Block_543798325661a6a45c99198_89880458 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'wyloguj' => 
  array (
    0 => 'Block_543798325661a6a45c99198_89880458',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 wyloguj <?php
}
}
/* {/block 'wyloguj'} */
/* {block 'content'} */
class Block_1376173371661a6a45c99a53_20626255 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1376173371661a6a45c99a53_20626255',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyślna treść zawartości .... <?php
}
}
/* {/block 'content'} */
/* {block 'footer'} */
class Block_666290246661a6a45c99fa2_09442257 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_666290246661a6a45c99fa2_09442257',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyślna treść stopki .... <?php
}
}
/* {/block 'footer'} */
}
