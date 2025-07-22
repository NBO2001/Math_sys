<?php
declare(strict_types=1);

namespace Core;

class Controller
{
    public function load(string $view, array $param = []): string
    {
        $twig = new \Twig\Environment(
            new \Twig\Loader\FilesystemLoader(HOME . '/app/view')
        );
        return $twig->render($view . '.php', $param);
    }
}