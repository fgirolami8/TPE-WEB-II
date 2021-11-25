{include file = 'header.tpl'}
<div>
    <h2>{$title}</h2>
    {foreach from=$users item=$user}
        <div>   
        <li>
            <h3>{$user->user} - 
            {if $user->rol == 1}
                (Admin)
                {else}
                    (User)
            {/if}
            </h3>
            
            <a href="deleteUser/{$user->user}"  class="estiloBtnDelete">Delete User</a>
            
            <a href="changeRolUser/{$user->user}"  class="estiloBtnRol">Change Rol</a>            
        </li>
        <br>
        </div><br>
    {/foreach}
</div>
{include file = 'footer.tpl'}