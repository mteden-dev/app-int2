<?php
/* Smarty version 5.4.5, created on 2025-05-03 17:17:14
  from 'file:home.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_68164f9a388f09_35096377',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '07f372059c204d64613e2a1a31b3f3cc814c8571' => 
    array (
      0 => 'home.tpl',
      1 => 1746283487,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_68164f9a388f09_35096377 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Users/przemyslawbanasz/Documents/Code/APP INT/app-int2/php_05b/app/views/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_184035511168164f9a383344_55962093', 'footer');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_88529692468164f9a385ac5_41125265', 'content');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_44534927368164f9a386075_54916966', 'wyloguj');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.html", $_smarty_current_dir);
}
/* {block 'footer'} */
class Block_184035511168164f9a383344_55962093 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Users/przemyslawbanasz/Documents/Code/APP INT/app-int2/php_05b/app/views/templates';
?>

<li>&copy; System kredytowy 2025. Projekt na zaliczenie PSS.</li>
<li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_88529692468164f9a385ac5_41125265 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Users/przemyslawbanasz/Documents/Code/APP INT/app-int2/php_05b/app/views/templates';
?>

<div class="content">
    <h2>Witaj w systemie obsługi kredytów</h2>
    
    <p>System umożliwia obliczenie raty kredytu na podstawie podanych parametrów:</p>
    
    <ul>
        <li>Kwoty kredytu w PLN</li>
        <li>Okresu kredytowania w latach</li>
        <li>Oprocentowania rocznego</li>
    </ul>
    
    <p>Aby skorzystać z kalkulatora, kliknij przycisk poniżej:</p>
    
    <a href="<?php echo $_smarty_tpl->getValue('action_url');?>
calcShow" class="button button-calc">Przejdź do kalkulatora</a>
    
    <div class="features">
        <section>
            <span class="icon solid major fa-calculator"></span>
            <h3>Dokładne obliczenia</h3>
            <p>Nasz kalkulator zapewnia precyzyjne obliczenia raty kredytu.</p>
        </section>
        <section>
            <span class="icon solid major fa-lock"></span>
            <h3>Bezpieczeństwo</h3>
            <p>System posiada mechanizm uwierzytelniania i autoryzacji, który chroni Twoje dane przed nieuprawnionym dostępem.</p>
        </section>
        <section>
            <span class="icon solid major fa-cog"></span>
            <h3>Łatwość użycia</h3>
            <p>Intuicyjny interfejs pozwala na szybkie i bezproblemowe korzystanie z kalkulatora.</p>
        </section>
    </div>
</div>
<?php
}
}
/* {/block 'content'} */
/* {block 'wyloguj'} */
class Block_44534927368164f9a386075_54916966 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Users/przemyslawbanasz/Documents/Code/APP INT/app-int2/php_05b/app/views/templates';
?>

    <?php if ((true && (true && null !== ($_smarty_tpl->getValue('session')['role'] ?? null)))) {?>
        <a href="<?php echo $_smarty_tpl->getValue('action_url');?>
logout" class="button scrolly">Wyloguj</a>
    <?php } else { ?>
        <a href="<?php echo $_smarty_tpl->getValue('action_url');?>
login" class="button scrolly">Zaloguj</a>
    <?php }
}
}
/* {/block 'wyloguj'} */
}
