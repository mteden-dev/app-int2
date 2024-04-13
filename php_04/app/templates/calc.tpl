{extends file="main.html"}
{block name=footer}przykładowa tresć stopki wpisana do szablonu głównego z szablonu kalkulatora{/block}

{block name=content}
<div style="width:90%; margin: 2em auto;">    

<form action="{$app_url}/app/calc.php" method="post">
    <label for="id_kwota">Kwota kredytu: </label>
    <input id="id_kwota" type="text" name="kwota" value="{$kwota|default:''}" /><br />
    <label for="id_lata">Okres kredytu (w latach): </label>
    <input id="id_lata" type="range" name="lata" class="slider" min="1" max="30" value="{$lata|default:1}" oninput="updateLata(this.value)" /> <span id="lataValue">{$lata|default:1}</span><br />
    <label for="id_oprocentowanie">Oprocentowanie (w %): </label>
    <input id="id_oprocentowanie" type="text" name="oprocentowanie" value="{$oprocentowanie|default:''}" /><br />
    <div style="width:90%; margin: 2em auto;">    
    <input type="submit" value="Oblicz ratę" class="pure-button pure-button-primary"/>
    </div>
</form>
<script>
    function updateLata(val) {
        document.getElementById('lataValue').innerHTML = val;
    }
</script>

{if isset($messages) && count($messages) > 0}
    <ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">
        {foreach $messages as $msg}
            <li>{$msg}</li>
        {/foreach}
    </ol>
{/if}

{if isset($rata)}
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #5052a0; width:300px;">
    Miesięczna rata: {$rata} zł
</div>
{/if}

</div>
{/block}

{block name=wyloguj}
    <a href="{$app_root}/app/security/logout.php" class="button scrolly">Wyloguj</a>
{/block}