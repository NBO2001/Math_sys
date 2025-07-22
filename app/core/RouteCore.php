<?php
declare(strict_types=1);

namespace Core;

class RouteCore
{
    private string $method;
    private array $uri = [];
    private array $routes = [];

    public function __construct()
    {
        $this->initialize();
        require HOME . '/app/config/Routes.php';
        $this->execute();
    }

    private function initialize(): void
    {
        $this->method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        $this->uri = $this->prepareUri($_SERVER['REQUEST_URI'] ?? '/');
    }

    public function get(string $path, callable|string $call): void
    {
        $this->routes[] = [
            'Route' => $path,
            'Call'  => $call,
        ];
    }

    public function post(string $path, callable|string $call): void
    {
        $this->routes[] = [
            'Route' => $path,
            'Call'  => $call,
        ];
    }

    private function execute(): void
    {
        if ($this->method === 'POST') {
            $this->exePost();
            return;
        }

        $this->exeGet();
    }

    private function exePost(): void
    {
        $index = $this->searchRoute();
        if ($index === -1) {
            echo 'error';
            return;
        }

        $funcCall = $this->routes[$index];
        if (is_callable($funcCall['Call'])) {
            ($funcCall['Call'])();
        } else {
            $this->searchMethod($funcCall['Call']);
        }
    }

    private function exeGet(): void
    {
        $index = $this->searchRoute();

        if ($index === -1) {
            $this->searchMethod('ErrorsController@pgNotFound');
            return;
        }

        $funcCall = $this->routes[$index];
        if (is_callable($funcCall['Call'])) {
            ($funcCall['Call'])();
        } else {
            $this->searchMethod($funcCall['Call']);
        }
    }

    /**
     * Procura o método correspondente.
     */
    private function searchMethod(string $call): void
    {
        $funcCall = explode('@', $call);
        if (!isset($funcCall[0], $funcCall[1])) {
            echo 'erro';
            return;
        }

        $control = 'Control\\' . $funcCall[0];
        if (!class_exists($control)) {
            echo 'Class not exists';
            return;
        }

        if (!method_exists($control, $funcCall[1])) {
            echo 'Method not exists!';
            return;
        }

        call_user_func([new $control(), $funcCall[1]]);
    }

    private function searchRoute(): int
    {
        $i = 0;
        $index = -1;

        foreach ($this->routes as $arr) {
            $routes = $this->prepareUri($arr['Route']);
            $route = implode('/', $routes);
            $uri = implode('/', $this->uri);

            if ($route === $uri) {
                $index = $i;
            }
            $i++;
        }

        return $index;
    }

    private function prepareUri(string $uri): array
    {
        $uri = array_filter(explode('/', $uri));
        if (count($uri) === 0) {
            $uri = array_filter(explode('/', '/home'));
        }
        return $uri;
    }
}