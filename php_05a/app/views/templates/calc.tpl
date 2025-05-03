{extends file="main.html"}

{block name=footer}
<li>&copy; Kalkulator Kredytowy 2024. Projekt na zaliczenie PSS.</li>
<li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
{/block}

{block name=content}
<div class="form-container">
    <!-- Zmiana akcji formularza na użycie kontrolera głównego -->
    <form action="{$action_url}calcCompute" method="post">
        <div class="form-group">
            <label for="id_kwota" class="form-label">Kwota kredytu (PLN): </label>
            <input id="id_kwota" type="text" name="kwota" value="{$kwota|default:''}" class="form-control" />
        </div>

        <div class="form-group">
            <label for="id_lata" class="form-label">Okres kredytu (w latach): </label>
            <input id="id_lata" type="range" name="lata" class="slider" min="1" max="30" value="{$lata|default:1}" oninput="updateLata(this.value)" />
            <span id="lataValue" class="slider-value">{$lata|default:1}</span>
        </div>

        <div class="form-group">
            <label for="id_oprocentowanie" class="form-label">Oprocentowanie (w %): </label>
            <input id="id_oprocentowanie" type="text" name="oprocentowanie" value="{$oprocentowanie|default:''}" class="form-control" />
        </div>

        <div class="form-group">
            <input type="submit" value="Oblicz ratę kredytu" class="button button-calc"/>
        </div>
    </form>

    {if isset($messages) && count($messages) > 0}
        <div class="error-message">
            <ul>
                {foreach $messages as $msg}
                    <li>{$msg}</li>
                {/foreach}
            </ul>
        </div>
    {/if}

    {if isset($rata)}
    <div class="result-box">
        <p>Miesięczna rata Twojego kredytu wynosi:</p>
        <span class="result-value">{$rata} PLN</span>

        <p style="margin-top: 20px; font-size: 0.8em;">
            Kwota kredytu: {$kwota} PLN<br>
            Okres kredytu: {$lata} {if $lata == 1}rok{elseif $lata < 5}lata{else}lat{/if}<br>
            Oprocentowanie: {$oprocentowanie}%
        </p>
    </div>
    {/if}
    
    <!-- Dodajemy link powrotu do strony głównej -->
    <div class="form-group" style="margin-top: 30px;">
        <a href="{$action_url}" class="button">Powrót do strony głównej</a>
    </div>
</div>

<script>
    function updateLata(val) {
        document.getElementById('lataValue').innerHTML = val;
    }
</script>
{/block}

{block name=wyloguj}
    <a href="{$action_url}logout" class="button scrolly">Wyloguj</a>
{/block}