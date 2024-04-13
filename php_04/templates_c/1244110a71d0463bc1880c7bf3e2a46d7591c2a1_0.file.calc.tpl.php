<?php
/* Smarty version 4.3.2, created on 2024-04-13 12:51:52
  from 'C:\xampp\htdocs\php_03\app\templates\calc.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_661a63c8be8559_32003068',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1244110a71d0463bc1880c7bf3e2a46d7591c2a1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_03\\app\\templates\\calc.tpl',
      1 => 1713005466,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661a63c8be8559_32003068 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1961475766661a63c8bda093_56548876', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_174456050661a63c8bda861_13211777', 'content');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7660051661a63c8be7f15_26432079', 'wyloguj');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.html");
}
/* {block 'footer'} */
class Block_1961475766661a63c8bda093_56548876 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_1961475766661a63c8bda093_56548876',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
przykładowa tresć stopki wpisana do szablonu głównego z szablonu kalkulatora<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_174456050661a63c8bda861_13211777 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_174456050661a63c8bda861_13211777',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

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
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #5052a0; width:300px;">
    Miesięczna rata: <?php echo $_smarty_tpl->tpl_vars['rata']->value;?>
 zł
</div>
<?php }?>

</div>
<?php
}
}
/* {/block 'content'} */
/* {block 'wyloguj'} */
class Block_7660051661a63c8be7f15_26432079 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'wyloguj' => 
  array (
    0 => 'Block_7660051661a63c8be7f15_26432079',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <a href="<?php echo $_smarty_tpl->tpl_vars['app_root']->value;?>
/app/security/logout.php" class="button scrolly">Wyloguj</a>
<?php
}
}
/* {/block 'wyloguj'} */
}
