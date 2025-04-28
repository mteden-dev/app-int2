<?php
/* Smarty version 5.0.0, created on 2025-04-27 19:12:18
  from 'file:calc.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.0.0',
  'unifunc' => 'content_680e8192820283_83522429',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c5a3dd774e9f6a80a106aabf259709fe8b70b33d' => 
    array (
      0 => 'calc.tpl',
      1 => 1745781085,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_680e8192820283_83522429 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Users/przemyslawbanasz/Documents/Code/APP INT/app-int2/php_04/app/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_924723366680e819281bd29_66322205', 'footer');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_769611945680e819281c5e3_81480031', 'content');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_866133473680e819281fde8_69937893', 'wyloguj');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.html", $_smarty_current_dir);
}
/* {block 'footer'} */
class Block_924723366680e819281bd29_66322205 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Users/przemyslawbanasz/Documents/Code/APP INT/app-int2/php_04/app/templates';
?>

<li>&copy; Kalkulator Kredytowy 2024. Projekt na zaliczenie PSS.</li>
<li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_769611945680e819281c5e3_81480031 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Users/przemyslawbanasz/Documents/Code/APP INT/app-int2/php_04/app/templates';
?>

<div class="form-container">
    <form action="<?php echo $_smarty_tpl->getValue('app_url');?>
/app/calc.php" method="post">
        <div class="form-group">
            <label for="id_kwota" class="form-label">Kwota kredytu (PLN): </label>
            <input id="id_kwota" type="text" name="kwota" value="<?php echo (($tmp = $_smarty_tpl->getValue('kwota') ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" class="form-control" />
        </div>

        <div class="form-group">
            <label for="id_lata" class="form-label">Okres kredytu (w latach): </label>
            <input id="id_lata" type="range" name="lata" class="slider" min="1" max="30" value="<?php echo (($tmp = $_smarty_tpl->getValue('lata') ?? null)===null||$tmp==='' ? 1 ?? null : $tmp);?>
" oninput="updateLata(this.value)" />
            <span id="lataValue" class="slider-value"><?php echo (($tmp = $_smarty_tpl->getValue('lata') ?? null)===null||$tmp==='' ? 1 ?? null : $tmp);?>
</span>
        </div>

        <div class="form-group">
            <label for="id_oprocentowanie" class="form-label">Oprocentowanie (w %): </label>
            <input id="id_oprocentowanie" type="text" name="oprocentowanie" value="<?php echo (($tmp = $_smarty_tpl->getValue('oprocentowanie') ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" class="form-control" />
        </div>

        <div class="form-group">
            <input type="submit" value="Oblicz ratę kredytu" class="button button-calc"/>
        </div>
    </form>

    <?php if ((null !== ($_smarty_tpl->getValue('messages') ?? null)) && $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('messages')) > 0) {?>
        <div class="error-message">
            <ul>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('messages'), 'msg');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('msg')->value) {
$foreach0DoElse = false;
?>
                    <li><?php echo $_smarty_tpl->getValue('msg');?>
</li>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </ul>
        </div>
    <?php }?>

    <?php if ((null !== ($_smarty_tpl->getValue('rata') ?? null))) {?>
    <div class="result-box">
        <p>Miesięczna rata Twojego kredytu wynosi:</p>
        <span class="result-value"><?php echo $_smarty_tpl->getValue('rata');?>
 PLN</span>

                <p style="margin-top: 20px; font-size: 0.8em;">
            Kwota kredytu: <?php echo $_smarty_tpl->getValue('kwota');?>
 PLN<br>
            Okres kredytu: <?php echo $_smarty_tpl->getValue('lata');?>
 <?php if ($_smarty_tpl->getValue('lata') == 1) {?>rok<?php } elseif ($_smarty_tpl->getValue('lata') < 5) {?>lata<?php } else { ?>lat<?php }?><br>
            Oprocentowanie: <?php echo $_smarty_tpl->getValue('oprocentowanie');?>
%
        </p>
    </div>
    <?php }?>
</div>

<?php echo '<script'; ?>
>
    function updateLata(val) {
        document.getElementById('lataValue').innerHTML = val;
    }
<?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'content'} */
/* {block 'wyloguj'} */
class Block_866133473680e819281fde8_69937893 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Users/przemyslawbanasz/Documents/Code/APP INT/app-int2/php_04/app/templates';
?>

    <a href="<?php echo $_smarty_tpl->getValue('app_root');?>
/app/security/logout.php" class="button scrolly">Wyloguj</a>
<?php
}
}
/* {/block 'wyloguj'} */
}
