{include file = 'header.tpl'}

{* DETALLES DE LA CANCION *}
<h3>{$titulo}</h3>
<div>
    <ul>
        {foreach from=$song item=$item}
            <li>{$item}</li>
        {/foreach}
    </ul>
</div>

<section>

<!-- FORMA -->
<form id="commentForm" songID="{$song->id}">
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

