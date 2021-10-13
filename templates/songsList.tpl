{include file = 'header.tpl'}
<div class="container_songs">
    {if $log_state neq "login"}
        <div class="cajaA">
            <button id="btnshow" class="btnShow">Add new song to list</button>
            <section id="showing" class="hideoptionAdd">
                <h3>Add Song: <span>(fill in all the fields)</span></h3>
                <form action="addSong" method="POST" class="formAdd">
                    <input type="text" name="name" placeholder="nombre">
                    <select name="artist" id="">
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
    {else}
        <div></div>
    {/if}
    <div class="cajaB">
        {if $log_state neq "login"}
            <h2>{$titulo}</h2>
        <ul>
            {foreach from=$songs item=$song}
                    <br>
                <li><div>
                    <a href="songs/{$song->name}" class="estiloSong">{$song->name}</a>
                    <br>
                    <br>
                    <a href="deleteSong/{$song->name}" class="estiloBtnDelete">Borrar</a>
                    <br>
                    <br>
                    Editar cancion 
                    <br>
                    <br>

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
                    <br>
                </div></li>
            {/foreach}
        </ul>
    </div>
                
        {else}
            <h2>{$titulo}</h2>
            {foreach from=$songs item=$song}
                    <br>
                <li><div>
                    <a href="songs/{$song->name}" class="estiloSong">{$song->name}</a>
                </div></li>
            {{/foreach}}
        {/if}
        
</div>

{include file = 'footer.tpl'}
