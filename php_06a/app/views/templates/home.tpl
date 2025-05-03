{extends file="main.html"}

{block name=footer}
<li>&copy; System kredytowy 2025. Projekt na zaliczenie PSS.</li>
<li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
{/block}

{block name=content}
<div class="content">
    <h2>Witaj w systemie obsługi kredytów</h2>
    
    <p>System umożliwia obliczenie raty kredytu na podstawie podanych parametrów:</p>
    
    <ul>
        <li>Kwoty kredytu w PLN</li>
        <li>Okresu kredytowania w latach</li>
        <li>Oprocentowania rocznego</li>
    </ul>
    
    <p>Aby skorzystać z kalkulatora, kliknij przycisk poniżej:</p>
    
    <a href="{$action_url}calcShow" class="button button-calc">Przejdź do kalkulatora</a>
    
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
{/block}

{block name=wyloguj}
    {if isset($session.role)}
        <a href="{$action_url}logout" class="button scrolly">Wyloguj</a>
    {else}
        <a href="{$action_url}login" class="button scrolly">Zaloguj</a>
    {/if}
{/block}