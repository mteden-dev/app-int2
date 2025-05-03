<?php
/* Smarty version 5.4.5, created on 2025-05-03 19:43:13
  from 'file:error.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_681671d16cbce4_97354373',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3e40b1547376e6c92cc7306621bb6c9061c8dfc5' => 
    array (
      0 => 'error.tpl',
      1 => 1746300789,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_681671d16cbce4_97354373 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Users/przemyslawbanasz/Documents/Code/APP INT/app-int2/php_06b/app/views/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_768766711681671d16c0186_29596993', 'content');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1938157985681671d16cb6f3_67443335', 'wyloguj');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.html", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_768766711681671d16c0186_29596993 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Users/przemyslawbanasz/Documents/Code/APP INT/app-int2/php_06b/app/views/templates';
?>

<div class="error-container">
    <h2>Wystąpił błąd</h2>
    
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
    
    <div class="form-group" style="margin-top: 30px;">
        <a href="<?php echo $_smarty_tpl->getValue('action_url');?>
" class="button">Powrót do strony głównej</a>
    </div>
</div>
<?php
}
}
/* {/block 'content'} */
/* {block 'wyloguj'} */
class Block_1938157985681671d16cb6f3_67443335 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Users/przemyslawbanasz/Documents/Code/APP INT/app-int2/php_06b/app/views/templates';
?>

    <a href="<?php echo $_smarty_tpl->getValue('action_url');?>
" class="button scrolly">Powrót</a>
<?php
}
}
/* {/block 'wyloguj'} */
}
