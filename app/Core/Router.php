<?php

namespace App\Core;

class Router
{
    private array $routes = [];

    public function get(
        string $path,
        string $action,
        bool $auth = false
    ): void {
        $this->add('GET', $path, $action, $auth);
    }

    public function post(
        string $path,
        string $action,
        bool $auth = false
    ): void {
        $this->add('POST', $path, $action, $auth);
    }

    private function add(
        string $method,
        string $path,
        string $action,
        bool $auth = false
    ): void {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'action' => $action,
            'auth' => $auth
        ];
    }

    public function dispatch(
        string $method,
        string $uri
    ): void {
        $pathEncontrado = false;

        foreach ($this->routes as $route) {
            $pattern = preg_replace_callback(
                '/\{([a-zA-Z_][a-zA-Z0-9_]*)\}/',
                fn($matches) => '(?P<' . $matches[1] . '>[^/]+)',
                $route['path']
            );

            $pattern = '#^' . $pattern . '$#';

            if (!preg_match($pattern, $uri, $matches)) {
                continue;
            }

            $pathEncontrado = true;

            if ($route['method'] !== strtoupper($method)) {
                continue;
            }

            $params = [];

            foreach ($matches as $key => $value) {
                if (is_string($key)) {
                    $params[$key] = rawurldecode($value);
                }
            }

            if ($route['auth'] && !\App\Core\Auth::check()) {
                header('Location: /FichasMonis/login');
                exit;
            }

            $this->run(
                $route['action'],
                $params
            );

            return;
        }

        if ($pathEncontrado) {
            http_response_code(405);
            header('Allow: ' . implode(', ', array_unique(
                array_column(
                    array_filter(
                        $this->routes,
                        fn($r) => $r['path'] === $uri
                    ),
                    'method'
                )
            )));
            exit('Método não permitido');
        }

        http_response_code(404);
        exit('Página não encontrada');
    }

    private function run(
        string $action,
        array $params
    ): void {
        [$controller, $method] = explode('@', $action, 2);

        $controllerClass = 'App\\Controllers\\' . $controller;

        if (!class_exists($controllerClass)) {
            throw new \RuntimeException(
                "Controller não encontrado: $controllerClass"
            );
        }

        $instance = new $controllerClass();

        if (!method_exists($instance, $method)) {
            throw new \RuntimeException(
                "Método não encontrado: $method"
            );
        }

        // Parâmetros nomeados são passados
        // na ordem definida pela URL.
        $instance->$method(...array_values($params));
    }
}
