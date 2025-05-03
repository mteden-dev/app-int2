{extends file="main.html"}

{block name=content}
<div class="error-container">
    <h2>Wystąpił błąd</h2>
    
    {if isset($messages) && count($messages) > 0}
        <div class="error-message">
            <ul>
                {foreach $messages as $msg}
                    <li>{$msg}</li>
                {/foreach}
            </ul>
        </div>
    {/if}
    
    <div class="form-group" style="margin-top: 30px;">
        <a href="{$action_url}" class="button">Powrót do strony głównej</a>
    </div>
</div>
{/block}

{block name=wyloguj}
    <a href="{$action_url}" class="button scrolly">Powrót</a>
{/block}