<?php

function homeRoot($request, $response, $args) { 
    global $twig; 
    $template = $twig ->loadTemplate ('home.twig');    
    return $response->write( $template ->render(array(
        'content' => 'My content'
        )));
}