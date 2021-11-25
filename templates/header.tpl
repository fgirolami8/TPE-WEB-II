<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{BASE_URL}"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Musica 2021</title>
    <link rel="stylesheet" href="css/estilo.css">
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    
</head>
<body>
    <header>
        <h1>Musica 2021 - TPE Especial</h1>
        <b>
                {if $rol_user eq 1}
                    <h2 class="session_iniciadaADMIN">[SESION DE ADMIN INICIADA]</h2>
                {else if $rol_user eq 0}
                    <h2 class="session_iniciadaUSER">[SESION DE USUARIO INICIADA]</h2>
                {else}
                    <h2 class="session_cerrada">[INICIE SESION O REGISTRESE!]</h2>
                {/if}
                
        </b>
        <div class="cont_nav">
            <nav>
                <ul class="nav">
                    <li><a class="a_nav" href="home">Home</a></li>
                    <li><a class="a_nav" href="songs">Songs</a></li>
                    <li><a class="a_nav" href="artists">Artists</a></li>

                    {if $rol_user eq 1}
                        <li><a class="a_nav" href="users">Users</a></li>        
                    {/if}

                    {if $rol_user eq -1}
                        <li><a class="a_nav" href="login">Log in</a></li>
                        <li><a class="a_nav" href="register">Register</a></li>
                    {else}
                        <li><a class="a_nav" href="logout">Log out</a></li>
                        <li><a class="a_nav" href="search">Search</a></li>
                    {/if} 

                </ul>
            </nav>
        </div>
    </header>
    

