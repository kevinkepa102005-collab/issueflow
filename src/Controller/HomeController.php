<?php

declare(strict_types= 1);

namespace App\Controller;

//clase de symfony para construir las respuestas para el cliente
use Symfony\Component\HttpFoundation\Response;
//clase de symfony para definir las rutas
use Symfony\Component\Routing\Attribute\Route;

//clase controlador HomeController
final class HomeController {

    /*definimos una ruta para este cotrolador
    la ruta sera la ruta de home: '/' -> 1er argumento
    tendra un nombre interno: 'app_home' -> 2do argumento
    solo para metodos GET -> 3er argumento
    luego de la ruta, definimos el metodo correspondiente a ella,
    el cual genera la respuesta para el cliente.
     */
    #[Route('/', name: 'app_home', methods: ['GET'])]
    public function index(): Response {
    $projectName = 'IssueFlow';
    $message = 'symfony ha recibido la peticion y ha devuelto un response';

    $html = <<<HTML
        <!DOCTYPE html>
        <html lang="eS">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>{$projectName}</title>
        </head>
        <body>
            <main>  
                <h1>{$projectName}</h1>
                    <p>{$message}</p>
                    <p><a href="/tickets">Ver incidencias</a></p>
                    <p><a href="/health">Comprobar estado</a></p>
            </main>
        </body>
        </html>
    HTML;

    //retornamos la respuesta
    return new Response($html, Response::HTTP_OK);
    }

    #[Route('/health', name: 'app_health', methods: ['GET'])]
    public function health(): Response {
        return new Response('IssueFlow ok', Response::HTTP_OK);
    }

    return new Response('IssueFlow OK', Response::HTTP_OK, ['Content-Type' => 'text/plain']);
}
?>