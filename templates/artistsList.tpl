{include file = 'header.tpl'}

{* AGREGAR ARTISTA *}
<div>
{if $rol_user eq 1}
    <div class="cajaA">
        <button class="btnshow" class="btnShow">Add new Artist to list</button>
        <section class="showing hideoptionAdd">
            <h3>Add Artist: <span>(fill in all the fields)</span></h3>
            <form action="addArtist" method="POST" class="formAdd">
                <input type="text" name="name" placeholder="Banda/Artista">
                <input type="number" name="beginnings" placeholder="comienzos">
                <input type="number" name="albums" placeholder="cantidad de albumes">
                <input type="submit" value="Add Artist">
            </form>
        </section>
    </div>
{/if}
</div>

{* ARTIST LIST *}
<h3>{$titulo}</h3>
<ul>
    {if $rol_user eq 1}
        {foreach from=$artists item=$artist}
            <div><li><script>console.log({$artist->artist})</script>
                <a href="artists/{$artist->artist|replace:" ":"-"}">{$artist->artist}</a> <br>
                <a href="deleteArtist/{$artist->artist}"  class="estiloBtnDelete">Borrar</a> <br>
                <button class="btnshow" class="btnShow">Editar Artista</button>
                {* EDIT ARTIST *}
                <section class="showing hideoptionAdd">
                <form action="editArtist/{$artist->artist}" method="POST" class="formAdd" >
                    <input type="text" name="name" placeholder="Banda/Artista">
                    <input type="number" name="beginnings" placeholder="comienzos">
                    <input type="number" name="albums" placeholder="cantidad de albumes">
                    <input type="submit" value="Edit Artist">
                </form>
                </section>
            </li> <br> </div> <br>
        {/foreach}
    {else}
        {foreach from=$artists item=$artist}   
            <li>
                <a href="artists/{$artist->artist|replace:" ":"-"}">{$artist->artist}</a>
                <br>
            </li>
        {/foreach} 
    {/if}
</ul>

{include file = 'footer.tpl'}