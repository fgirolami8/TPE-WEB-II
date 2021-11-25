{include file="header.tpl"}
<div>
    <h1>Search Songs.</h1>
</div>
<div class="search">
    <form action="results" method="POST" class="formAdd">
    <input type="text" name="name" placeholder="nombre">
    <select name="artist" >
        {foreach from=$artists item=$artista}
            <option value="{$artista->artist}">{$artista->artist}</option>
        {/foreach}
            <option value="">ninguno</option>
    </select>
    <input type="text" name="genre" placeholder="genero"> 
    <input type="number" name="year" placeholder="año">  
    <input type="text" name="album" placeholder="album"> 
    <input type="submit" value="Search">
    </form>
    <div>
        <h2>{$titulo}</h2>
    <ul>
        {foreach from=$songs item=$song}
            <li><a href="songs/{$song->id}" class="estiloSong">{$song->name}</a></li>
        {/foreach}
    </ul>
    </div>
</div>
</body>
</html>