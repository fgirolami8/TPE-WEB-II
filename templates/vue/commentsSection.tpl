{literal}
<section id="comments">

<!-- si esta logeado le permito ordenar/filtrar comentarios -->
<div  v-if="rol != -1">
    <!-- FILTRADO -->
    <form id="filterForm" v-on:submit="filter($event)">
        Muestre los comentarios segun el puntaje deseado:
        <select name="score" v-model="selected">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <input type="submit" value="Filtrar">
    </form> <br>
    <!-- ORDENADO -->
    <div>U ordene todos los comentarios a gusto: 
        <button v-on:click="updComments('id', 'DESC')">Mas reciente</button>
        <button v-on:click="updComments('id', 'ASC')">Mas antiguo</button>
        <button v-on:click="updComments('score', 'DESC')">Mayor puntaje</button>
        <button v-on:click="updComments('score', 'ASC')">Menor puntaje</button>
    </div> <br>
</div>


    <!-- COMENTARIOS -->
    <h1 id="comm_title">{{title}}</h1>
    <article v-for="comment in comments" class="comment">
        <p class="comment_text">{{comment.comment}}</p>
        <p class="comment_score"><b>Score: {{comment.score}}</b></p>
        <p>Posted by: {{comment.user}}</p>
        <button v-on:click="delComment(comment.id)" v-if="rol == 1">Borrar</button>
    </article>

</section>
{/literal}