{literal}
<section id="comments">
    <div>Ordenar: 
        <button v-on:click="orderComments('newest_first')">mas reciente</button>
        <button v-on:click="orderComments('oldest_first')">mas antiguo</button>
        <button v-on:click="orderComments('best_first')">mayor puntaje</button>
        <button v-on:click="orderComments('worst_first')">menor puntaje</button>
    
    <div>
    <h1 id="comm_title">{{title}}</h1>
    <article v-for="comment in comments" class="comment">
        <p class="comment_text">{{comment.comment}}</p>
        <p class="comment_score"><b>Score: {{comment.score}}</b></p>
        <button v-on:click="delComment(comment.id)">Borrar</button>
    </article>
</section>
{/literal}