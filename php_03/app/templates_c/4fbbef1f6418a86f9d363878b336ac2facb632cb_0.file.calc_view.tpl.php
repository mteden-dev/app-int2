<?php
/* Smarty version 4.3.2, created on 2024-04-13 11:58:18
  from 'C:\xampp\htdocs\php_03\app\templates\calc_view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_661a573aa27272_90034667',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4fbbef1f6418a86f9d363878b336ac2facb632cb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_03\\app\\templates\\calc_view.tpl',
      1 => 1713002287,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661a573aa27272_90034667 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Kalkulator kredytowy</title>
    <style>
        .slider {
            width: 300px;
        }
    </style>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
</head>
<body>

<div style="width:90%; margin: 2em auto;">    

<form action="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/app/calc.php" method="post">
    <label for="id_kwota">Kwota kredytu: </label>
    <input id="id_kwota" type="text" name="kwota" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['kwota']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" /><br />
    <label for="id_lata">Okres kredytu (w latach): </label>
    <input id="id_lata" type="range" name="lata" class="slider" min="1" max="30" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['lata']->value ?? null)===null||$tmp==='' ? 1 ?? null : $tmp);?>
" oninput="updateLata(this.value)" /> <span id="lataValue"><?php echo (($tmp = $_smarty_tpl->tpl_vars['lata']->value ?? null)===null||$tmp==='' ? 1 ?? null : $tmp);?>
</span><br />
    <label for="id_oprocentowanie">Oprocentowanie (w %): </label>
    <input id="id_oprocentowanie" type="text" name="oprocentowanie" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['oprocentowanie']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" /><br />
    <div style="width:90%; margin: 2em auto;">    
    <input type="submit" value="Oblicz ratę" class="pure-button pure-button-primary"/>
    </div>
</form>
<div style="width:90%; margin: 2em auto;">
    <a href="<?php echo $_smarty_tpl->tpl_vars['app_root']->value;?>
/app/security/logout.php" class="pure-button pure-button-active">Wyloguj</a>
</div>
<?php echo '<script'; ?>
>
    function updateLata(val) {
        document.getElementById('lataValue').innerHTML = val;
    }
<?php echo '</script'; ?>
>

<?php if ((isset($_smarty_tpl->tpl_vars['messages']->value)) && count($_smarty_tpl->tpl_vars['messages']->value) > 0) {?>
    <ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['messages']->value, 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
            <li><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</li>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </ol>
<?php }?>

<?php if ((isset($_smarty_tpl->tpl_vars['rata']->value))) {?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
    Miesięczna rata: <?php echo $_smarty_tpl->tpl_vars['rata']->value;?>
 zł
</div>
<?php }?>

</div>
</body>
</html><?php }
}
