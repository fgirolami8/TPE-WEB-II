{include file = 'header.tpl'}
<h3>{$titulo}</h3>
<div>
    <ul>
        {foreach from=$song item=$item}
            <li>{$item}</li>
        {/foreach}
    </ul>
</div>
<a href="songs">volver</a>

{include file = 'footer.tpl'}

