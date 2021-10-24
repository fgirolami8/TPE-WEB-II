<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{BASE_URL}"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Musica 2021</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <header>
        <h1>Musica 2021 - TPE Especial</h1>
        <b>
            {if $log_state neq "login"}
                <h2 class="session_iniciada">[SESION DE ADMIN INICIADA]</h2>
            {else}
                <h2 class="session_cerrada">[INICIE SESION DE ADMIN]</h2>
            {/if}
        </b>
        <div class="cont_nav">
            <nav>
                <ul class="nav">
                    <li><a class="a_nav" href="home">Home</a></li>
                    <li><a class="a_nav" href="songs">Songs</a></li>
                    <li><a class="a_nav" href="artists">Artists</a></li>
                    <li><a class="a_nav" href="{$log_state}">
                        {if $log_state eq "login"}Log in
                        {else}Log out
                        {/if}
                    </a></li>            
                </ul>
            </nav>
        </div>
    </header>
    

