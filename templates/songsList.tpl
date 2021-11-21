{include file = 'header.tpl'}
<div class="container_songs">
    {if $log_state neq "login"}
        {if $rol_user eq "true"}
            <div class="cajaA">
                <button class="btnshow" class="btnShow">Add new song to list</button>
                            <section class="showing hideoptionAdd">

                    <h3>Add Song: <span>(fill in all the fields)</span></h3>
                    <form action="addSong" method="POST" class="formAdd">
                        <input type="text" name="name" placeholder="nombre">
                        <select name="artist" >
                            {foreach from=$artists item=$artista}
                                <option value="{$artista->artist}">{$artista->artist}</option>
                            {/foreach}
                        </select>
                        <input type="text" name="genre" placeholder="genero">
                        <input type="number" name="year" placeholder="año">
                        <input type="text" name="album" placeholder="album">
                        <input type="submit" value="Add Song" class="btnAddsong">
                    </form>
                            <br>
                </section>
            </div>
        {/if}
    {/if}
    <div class="cajaB">
        {if $log_state neq "login"}
            {if $rol_user eq "true"}
                <h2>{$titulo}</h2>
            <ul>
                {foreach from=$songs item=$song}
                    <li><div>
                        <a href="songs/{$song->id}" class="estiloSong">{$song->name}</a>
                        <br>
                        <br>

                        <a href="deleteSong/{$song->id}" class="estiloBtnDelete">Borrar</a>
                        <br>
                        <br>
    <button class="btnshow" class="btnShow">Editar Cancion</button>
                                <section class="showing hideoptionAdd">

                            <form action="editSong/{$song->name}" method="POST" class="formEdit">
                                <input type="text" name="name" placeholder="nombre">
                                <select name="artist">
                                    {foreach from=$artists item=$artista}
                                        <option value="{$artista->artist}">{$artista->artist}</option>
                                    {/foreach}
                                </select>
                                <input type="text" name="genre" placeholder="genero">
                                <input type="number" name="year" placeholder="año">
                                <input type="text" name="album" placeholder="album">
                                <input type="submit" value="Edit Song" class="btnEditsong">
                            </form>
                            </section>
                        <br><br>
                    </div></li>
                {/foreach}
            </ul>
        </div>
        {else}
            <h2>{$titulo}</h2>
            {foreach from=$songs item=$song}
                <li>
                    <a href="songs/{$song->id}" class="estiloSong">{$song->name}</a>
                </li>
            {{/foreach}}
            
        {/if}
                    
        {else}
            <h2>{$titulo}</h2>
            {foreach from=$songs item=$song}
                <li>
                    <a href="songs/{$song->id}" class="estiloSong">{$song->name}</a>
                </li>
            {{/foreach}}
        {/if}
        
</div>

{include file = 'footer.tpl'}
