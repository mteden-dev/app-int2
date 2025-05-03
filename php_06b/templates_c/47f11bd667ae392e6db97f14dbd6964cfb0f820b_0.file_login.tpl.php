<?php
/* Smarty version 5.4.5, created on 2025-05-03 19:07:21
  from 'file:login.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_6816696955c7f4_86648630',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '47f11bd667ae392e6db97f14dbd6964cfb0f820b' => 
    array (
      0 => 'login.tpl',
      1 => 1746296961,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6816696955c7f4_86648630 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Users/przemyslawbanasz/Documents/Code/APP INT/app-int2/php_06/app/views/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_158403538668166969544e13_79782073', 'content');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_14293848016816696955c224_46521388', 'wyloguj');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.html", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_158403538668166969544e13_79782073 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Users/przemyslawbanasz/Documents/Code/APP INT/app-int2/php_06/app/views/templates';
?>

<div class="form-container">
    <form action="<?php echo $_smarty_tpl->getValue('action_url');?>
login" method="post" class="pure-form pure-form-stacked">
        <legend>Logowanie</legend>
        <fieldset>
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
        </fieldset>
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
</div>
<?php
}
}
/* {/block 'content'} */
/* {block 'wyloguj'} */
class Block_14293848016816696955c224_46521388 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Users/przemyslawbanasz/Documents/Code/APP INT/app-int2/php_06/app/views/templates';
?>

    <a href="<?php echo $_smarty_tpl->getValue('action_url');?>
" class="button scrolly">Powrót</a>
<?php
}
}
/* {/block 'wyloguj'} */
}
