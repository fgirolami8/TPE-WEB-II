USER ---
    a . a
    b . b
ADMIN ---
    fran . 123
    brian . qwe








SEGURIDAD-------------------------------

isset lo q me pase
confirmo q es usuario y que tiene el rol solicitado para la accion

cuando hago getData tengo q ver si sus atrib no son null?

nada->ver
usuario / admin-> filtrar, ordenar y add
admin -> borrar

<!-- getTask($id);
        if ($tarea) {
            $this->view->response("La tarea fue modificada con exito.", 200);
        } else
            $this->view->response("La tarea con el id={$id} no existe", 404);
    }
create task $x
    getTask($x);
    if ($task)
        $this->view->response($task, 200);
    else
        $this->view->response("La tarea no fue creada", 500);
} -->

200 todo bien
401 trataste de hacer abm pero no podes papi
404 tratas de hacer abm con item q no existe
500 trato de crearla pero no se pudo




HICE------------------------------------

cambie setAdministrator x setUser
hacer rol_state con return 0,1 o -1 y borrar log_state() (actualizando todos los archivos q usaban estas funciones)
arregle comprobar existencia cancion


puse base url en route api xq tmb la voy a usar si no no puedo xq esta definida en route normal y nadie hace require de este en el tema api




QUIERO MOSTRAR MSJ CUANDO: no se encuentra id de cancion/artists q quiero mostrar (lo q hago actualmente es redirijirlos a la listaPrincipal)



FALTA-----------------------------------


.puedo entrar a login aunq este logeado

meter addcomment en literal
actualizar db import
dividir bien mvc music y artists
corregir espacio de url %20
hay q ordenar los filtrados tmb? osea q cuando toco unorden no me muestre todos los comentarios sin importar filtro de score.
CORROBORAR SEGURIDAD DE MUSICCONTROLLER .validar q exista cancion en music controller
esta bien q cuando borre/edite/agrege se vuelva a pag 1 de songs
si entro a http://localhost/Proyectos/TPE-WEB-II/songs/paginiuhha/21 entra a songdetail sin nada
http://localhost/Proyectos/TPE-WEB-II/songs/pagina/2123251 hay q restringir no?


EDIT SONG HABRIA Q ONERLO EN SONGDETAILS XQ
                        ..se ve instantaneamentelos cambios
                        .. puedomostrar msg de error si es repetido (xej), xq en song details no tengo el blablabla_Location
                        ..veo img al toq






DUDAS:

-comentario en funcion registerUser() del loginController

-duda con que mostrar y que no (dependiendo de user) en el template

-chequeo de rol en funciones ABM (esta bien?)

-ERROR en funcion viewArtists() al chequear rol



corroborar repet de artists
