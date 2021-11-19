

document.addEventListener("DOMContentLoaded", function(){
    
    //AGREGO EVENTO A FORMA
    let commentForm = document.querySelector("#commentForm");
    commentForm.addEventListener('submit', addComment);
    let songID = commentForm.getAttribute('songID');

    // LINKING VUE & COMMENT SECTION
    let comments_box = new Vue({
        el: "#comments",
        data: {
            title: "Comentarios",
            comments: [],
        },
        methods:{
            delComment: deleteComment,
            orderComments: getComments,
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
            let response = await promise.json();
            comments_box.comments.push(response);
            
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
            getComments();
            
        }catch(exc){
            console.log(exc);
        }

    }

//x default se ordena en newest first
async function getComments(orden = "newest_first"){
    //esta bien usar songID q es un atrib del form?
    let promise;
    switch(orden){
        case 'newest_first': 
            promise = await fetch(`api/comments/songs/${songID}/sort_newest_id`);
            break;
        case 'oldest_first': 
            promise = await fetch(`api/comments/songs/${songID}/sort_oldest_id`);
            break;
        case 'best_first': 
            promise = await fetch(`api/comments/songs/${songID}/sort_best_score`);
            break;
        case 'worst_first': 
            promise = await fetch(`api/comments/songs/${songID}/sort_worst_score`);
            break;
    }
    let response = await promise.json();
    comments_box.comments = response; 
}

getComments();//para q se actualice arr de vue








})