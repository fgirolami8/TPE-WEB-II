{include file = 'header.tpl'}
<div>
<h3>{$titulo}</h3>
</div>
<div>
<h3>{$artist[0]->artist}</h3>
<p>Comienzos: {$artist[0]->beginnings} | Albumes: {$artist[0]->albums}</p>
</div>
<div>
    {if $artist[0]->name neq null}
        <ul>
            {foreach from = $artist item = $item}
                <li>{$item->name} | Album: {$item->album} | año: {$item->year} | Genero: {$item->genre}</li>
            {/foreach}
        </ul>
    {else}
        apa, this artist have no songs! :p
    {/if}
</div>

<a href="artists">volver</a>

{include file = 'footer.tpl'}