{include file = 'header.tpl'}
<div>
    <h3>Agregar Artista: </h3>
    <form action="addArtist" method="POST">
        <input type="text" name="name" placeholder="Banda/Artista">
        <input type="number" name="beginnings" placeholder="comienzos">
        <input type="number" name="albums" placeholder="cantidad de albumes">
        <input type="submit" value="Add Artist">
    </form>
    <br>
</div>
    <h3>{$titulo}</h3>
    <ul>
        {foreach from=$artists item=$artist}
        <div>   
        <li>
            <a href="artists/{$artist->artist}">{$artist->artist}</a>
            <br>
            <a href="deleteArtist/{$artist->artist}">Borrar</a>
            <br>
            <p>Editar Artista: </p>
            <form action="editArtist/{$artist->artist}" method="POST">
                <input type="text" name="name" placeholder="Banda/Artista">
                <input type="number" name="beginnings" placeholder="comienzos">
                <input type="number" name="albums" placeholder="cantidad de albumes">
                <input type="submit" value="Edit Artist">
            </form>
        </li>
        <br>
        </div><br>
        {/foreach}
    </ul>

{include file = 'footer.tpl'}