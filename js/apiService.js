"use strict";

document.addEventListener("DOMContentLoaded", function(){


    //AGREGO EVENTO A FORMAS DE...

    //...AGREGADO DE COMENTARIO
    let commentForm = document.querySelector("#commentForm");
    commentForm.addEventListener('submit', addComment);
    // TOMO SONG-ID
    let songID = commentForm.getAttribute('data-songID');
    let rol_user =  commentForm.getAttribute('data-rol_user');

    //...FILTRADO DE COMENTARIO
    let filterForm = document.querySelector("#filterForm");
    filterForm.addEventListener('submit', filterComments)

    //para recordad orden actual (x defecto el mas nuevo va primero)
    let actualSortFilter = "id";
    let actualSortMode = "DESC";



    // LINKING VUE WITH COMMENT SECTION
    let comments_box = new Vue({
        el: "#comments",
        data: {
            title: "Comentarios",
            selected: '',
            rol: rol_user,//PARA USAR ROL (var smarty) DENTRO DE {literal}
            comments: [],//COMENTARIOS
        },
        methods:{//EVENT HANDLER
            delComment: deleteComment,
            updComments: updateComments,
            filter: filterComments,
        }
    });


    //AGREGO COMENTARIO
    async function addComment(e){
        e.preventDefault();
        let form = new FormData(commentForm);
        let comment = {
            "comment": form.get('comment_text'),
            "score": form.get('score')
        }
        try{
            let promise = await fetch(`api/comments/songs/${songID}`, {
                'method': 'POST',
                'headers': {'Content-Type': 'application/json'},
                'body': JSON.stringify(comment)
            });
            if(promise.ok){
                updateComments();//no le hago push xq no quiero agregarla a lo ultimo (para q persista el orden)
            }else{
                alert("no pudimos agregar el comentario");
            }
        }catch(exc){
            console.log(exc);
        }
    }


    //BORRO COMENTARIO
    async function deleteComment(comm_id){
        try{
            let promise = await fetch(`api/comments/${comm_id}`, {
                'method': 'DELETE',
            });
            if(promise.ok){
                updateComments();  
            }else{
                alert("no pudimos eliminar el comentario");
            }

        }catch(exc){
            console.log(exc);
        }
    }

    //el valor x defecto es para q se sepa q tiene q utilizar esos valores, cuando llamo a esta funcion, sin pedir explicitamente un ordenamiento determinado (como cuando borro/ agrego comments, osea quiero q se use ord q estaba y no redefinirlo)
    async function updateComments(sort_filter = actualSortFilter, sort_mode = actualSortMode){
        //si no me pasan parametros este "cache" seguira con el mismo valor pero cuando sí lo pasan (cuando ordeno) voy a poder cachear el ordenamiento elegido para mantener mi lista con ese orden
        actualSortFilter = sort_filter;
        actualSortMode = sort_mode;
        try{
            let promise = await fetch(`api/comments/songs/${songID}/${sort_filter}/${sort_mode}`);
            if(promise.ok){
                let response = await promise.json();
                comments_box.comments = response;
            }else{
                alert("no se pudo cargar la lista de comentarios");
            }
        }catch(e){
            console.log(e)
        }
    }


    function filterComments(event){
        event.preventDefault();
        let score = comments_box.selected;
        fetch(`api/comments/songs/${songID}/${actualSortFilter}/${actualSortMode}/${score}`)
        .then(res => {
            if(res.ok){
                res.json().then(res => comments_box.comments = res);
            }else{
                alert("no pudimos mostrar los comentarios filtrados");
            }
        })
        .catch(e => console.log(e))
    }














    updateComments();//para q se actualice arr de vue
})