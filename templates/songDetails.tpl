{include file = 'header.tpl'}

{* DETALLES DE LA CANCION *}
<h3>{$titulo}</h3>
<div>
    <ul>
            <li>id: {$song->id}</li>
            <li>Nombre: {$song->name}</li>
            <li>Artista: {$song->artist}</li>
            <li>Genero: {$song->genre}</li>
            <li>Album: {$song->album}</li>
            <li>Fecha de lanzamiento: {$song->year}</li>
    </ul>
</div>
{if $song->image}
    <div>
        <img src="{$song->image}" alt="imagen de la cancion" width="200">
    </div>
{/if}
<section>

<!-- FORMA (en esta guardo songID y rol_user)-->
<form id="commentForm" data-songID="{$song->id}" data-rol_user="{$rol_user}" class="{if $rol_user eq -1} ocultar {/if}">
    <input type="text" name="comment_text">
    <select name="score">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>
    <input type="submit" value="Add comment">
</form>


<!-- COMMENTS -->
{include file = 'vue/commentsSection.tpl'}

</section>

<a href="songs">volver</a>

<script src="js/apiService.js"></script>
{include file = 'footer.tpl'}

