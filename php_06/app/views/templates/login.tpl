{extends file="main.html"}

{block name=content}
<div class="form-container">
    <form action="{$action_url}login" method="post" class="pure-form pure-form-stacked">
        <legend>Logowanie</legend>
        <fieldset>
            <div class="form-group">
                <label for="id_login" class="form-label">Login: </label>
                <input id="id_login" type="text" name="login" value="{$form.login|default:''}" class="form-control" />
            </div>
            
            <div class="form-group">
                <label for="id_pass" class="form-label">Hasło: </label>
                <input id="id_pass" type="password" name="pass" class="form-control" />
            </div>
            
            <div class="form-group">
                <input type="submit" value="Zaloguj" class="button button-calc"/>
                <a href="{$action_url}" class="button">Powrót</a>
            </div>
        </fieldset>
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
</div>
{/block}

{block name=wyloguj}
    <a href="{$action_url}" class="button scrolly">Powrót</a>
{/block}