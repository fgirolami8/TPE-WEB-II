{include file = 'header.tpl'}
<div class="container_songs">

{* ADD SONG SECTION (ADMIN) *}
{if $rol_user eq 1}
    <div class="cajaA">
        <button class="btnshow" class="btnShow">Add new song to list</button>
        <section class="showing hideoptionAdd">
            <h3>Add Song: <span>(fill in all the fields)</span></h3>

            {* ADD SONG FORM *}
            <form action="addSong" method="POST" class="formAdd" enctype="multipart/form-data">
                <input type="text" name="name" placeholder="nombre">
                <select name="artist" >
                    {foreach from=$artists item=$artista}
                        <option value="{$artista->artist}">{$artista->artist}</option>
                    {/foreach}
                </select>
                <input type="text" name="genre" placeholder="genero">
                <input type="number" name="year" placeholder="año">
                <input type="text" name="album" placeholder="album">
                <input type="file" name="image" placeholder="imagen">
                <input type="submit" value="Add Song" class="btnAddsong">
            </form>

        </section>
    </div> <br>
{/if}

{* PAGINACION *}
{if $rol_user neq -1}
    <nav>
    {if $actual_page neq 1}
        <a id="anterior" href="songs/pagina/{$actual_page - 1}">Anterior ({$actual_page - 1})</a>
    {/if}
    {if $actual_page neq $cant_pag} {*TRAER LENGTH PAGINAS*}
        <a id="siguiente" href="songs/pagina/{$actual_page + 1}">Siguiente ({$actual_page + 1})</a>
    {/if}
{/if}
</nav>

{* SONG LIST SECTION *}
<div class="cajaB">
    {* SI ES ADMIN LE PERMITO EDITAR *}
    {if $rol_user eq 1}
        <h2>{$titulo}</h2>
        {foreach from=$songs item=$song}
            <li><div>
                <a href="songs/{$song->id}" class="estiloSong">{$song->name}</a> <br><br>
                <a href="deleteSong/{$song->id}" class="estiloBtnDelete">Borrar</a> <br><br>
                <button class="btnshow" class="btnShow">Editar Cancion</button>
                <section class="showing hideoptionAdd">
                    {* EDIT SONG FORM *}
                    <form action="editSong/{$song->id}" method="POST" class="formEdit" enctype="multipart/form-data">
                        <input type="text" name="name" placeholder="nombre">
                        <select name="artist">
                            {foreach from=$artists item=$artista}
                                <option value="{$artista->artist}">{$artista->artist}</option>
                            {/foreach}
                        </select>
                        <input type="text" name="genre" placeholder="genero">
                        <input type="number" name="year" placeholder="año">
                        <input type="text" name="album" placeholder="album">
                        <input type="file" name="image">
                        <input type="submit" value="Edit Song" class="btnEditsong">
                    </form>
                </section> <br><br>
            </div></li>
        {/foreach}
    {* SI NO ES ADMIN *}
    {else}
        <h2>{$titulo}</h2>
        {foreach from=$songs item=$song}
            <li>
                <a href="songs/{$song->id}" class="estiloSong">{$song->name}</a>
            </li>
        {/foreach}
    {/if}
</div>

</div>
{include file = 'footer.tpl'}
