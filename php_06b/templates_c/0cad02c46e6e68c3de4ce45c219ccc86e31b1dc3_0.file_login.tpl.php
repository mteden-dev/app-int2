<?php
/* Smarty version 5.4.5, created on 2025-05-03 19:15:56
  from 'file:login.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_68166b6cca9184_36138815',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0cad02c46e6e68c3de4ce45c219ccc86e31b1dc3' => 
    array (
      0 => 'login.tpl',
      1 => 1746299738,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_68166b6cca9184_36138815 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Users/przemyslawbanasz/Documents/Code/APP INT/app-int2/php_06a/app/views/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_101536344768166b6cc908e6_33737214', 'footer');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_168560831468166b6cc91463_31468248', 'content');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_131038669068166b6cca89a3_59599551', 'wyloguj');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.html", $_smarty_current_dir);
}
/* {block 'footer'} */
class Block_101536344768166b6cc908e6_33737214 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Users/przemyslawbanasz/Documents/Code/APP INT/app-int2/php_06a/app/views/templates';
?>

<li>&copy; System kredytowy 2024. Projekt na zaliczenie PSS.</li>
<li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_168560831468166b6cc91463_31468248 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Users/przemyslawbanasz/Documents/Code/APP INT/app-int2/php_06a/app/views/templates';
?>

<div class="form-container">
    <form action="<?php echo $_smarty_tpl->getValue('action_url');?>
login" method="post">
        <div class="form-group">
            <label for="id_login" class="form-label">Login: </label>
            <input id="id_login" type="text" name="login" value="<?php echo (($tmp = $_smarty_tpl->getValue('form')['login'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" class="form-control" />
        </div>
        
        <div class="form-group">
            <label for="id_pass" class="form-label">Hasło: </label>
            <input id="id_pass" type="password" name="pass" class="form-control" />
        </div>
        
        <div class="form-group">
            <input type="submit" value="Zaloguj" class="button button-calc"/>
            <a href="<?php echo $_smarty_tpl->getValue('action_url');?>
" class="button">Powrót</a>
        </div>
    </form>

    <?php if ((true && ($_smarty_tpl->hasVariable('messages') && null !== ($_smarty_tpl->getValue('messages') ?? null))) && $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('messages')) > 0) {?>
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
    
    <div style="margin-top: 30px; color: #fff; text-align: center;">
        <p>Dane dostępowe:</p>
        <p>Administrator: login = admin, hasło = admin</p>
        <p>Użytkownik: login = user, hasło = user</p>
    </div>
</div>
<?php
}
}
/* {/block 'content'} */
/* {block 'wyloguj'} */
class Block_131038669068166b6cca89a3_59599551 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Users/przemyslawbanasz/Documents/Code/APP INT/app-int2/php_06a/app/views/templates';
?>

    <a href="<?php echo $_smarty_tpl->getValue('action_url');?>
" class="button scrolly">Powrót</a>
<?php
}
}
/* {/block 'wyloguj'} */
}
