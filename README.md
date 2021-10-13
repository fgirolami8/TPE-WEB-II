-----HECHO
le meti a cada function de view un parametro para q me diga log in o log out y en smarty un if para q si es login escriba log in (osea para q se vea  el log_state per en separado)


-------EXTRAS

//podriamos usar authhelper con function callback para no ser repetitivo:
    function funcion_con_authentication(callback){
        authHelper();
        callback();
    }
//register?
//cambia primary_key xq sino no puedo agregar canciones con igual nombre?
//es mala practica 2 display seguidos? asi pongo header y footer solos
//agrego botones cuando logeo //meto assign de una clase q si no la paso x parametro no le hago el js?
            ADMIN
            {if true}
                muestro las forms
                boton borrar
            {/if}
//tengo q poder editar todo los datos del registro?(espero :/) osea ¿obligo a completar campos?
//basta con poder eliminar de a un item?
//al borrar artista se tienen q borrar sus canciones?es automatico? ON DELETE CASCADE/ SET NULL (x ahora no se pueden eliminar artistas con temas asignados x el restrict)
//poder hacer abm desde cualquier lado?




//verificar si el artista ya existia o si existia la cancion y etc
//agregar error cunado ingreso artista inexistente
//mostrar error si no se pudo editar 
//meter form en otro template y pasarolo a songlist y a edit




//fijarse musicaxartist ... x cada cancion q traje va acompañada de los datos de banda entonces estos ultimos los imprimo con $artist[0]->..., ya q fetchAll me devuelve arr. pero capaz es mala practica si no puedo hacer 2 query





