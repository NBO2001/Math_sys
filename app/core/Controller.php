<?php

namespace Core;

class Controller{

    function load(string $view, $param = []){
        $twig = new \Twig\Environment(
            new \Twig\Loader\FilesystemLoader(HOME.'/app/view')
        );
        return $twig->render($view.".php", $param);
    }

}