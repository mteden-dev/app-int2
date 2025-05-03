<?php
/* Smarty version 5.0.0, created on 2025-05-03 15:30:13
  from 'file:home.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.0.0',
  'unifunc' => 'content_68163685281dd3_26326476',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '95e0151d2862d8b3169e4523c8bb6747e59b47ac' => 
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
function content_68163685281dd3_26326476 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Users/przemyslawbanasz/Documents/Code/APP INT/app-int2/php_05/app/templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1165032143681636852322e0_02787729', 'footer');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_897147661681636852403d4_77792835', 'content');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_196911750868163685248747_81264672', 'wyloguj');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.html", $_smarty_current_dir);
}
/* {block 'footer'} */
class Block_1165032143681636852322e0_02787729 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Users/przemyslawbanasz/Documents/Code/APP INT/app-int2/php_05/app/templates';
?>

<li>&copy; System kredytowy 2025. Projekt na zaliczenie PSS.</li>
<li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_897147661681636852403d4_77792835 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Users/przemyslawbanasz/Documents/Code/APP INT/app-int2/php_05/app/templates';
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
class Block_196911750868163685248747_81264672 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Users/przemyslawbanasz/Documents/Code/APP INT/app-int2/php_05/app/templates';
?>

    <?php if ((null !== ($_smarty_tpl->getValue('session')['role'] ?? null))) {?>
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
