<?php

namespace App\Core;

abstract class Controller
{
    protected function view(
        string $view,
        array $data = []
    ): void {
        $file = __DIR__ . '/../Views/' . $view . '.php';

        if (!is_file($file)) {
            throw new \RuntimeException(
                "View não encontrada: $view"
            );
        }

        // Disponibiliza os dados como variáveis
        // locais dentro da View.
        extract($data, EXTR_SKIP);

        require $file;
    }

    protected function json(
        array $data,
        int $status = 200
    ): void {
        http_response_code($status);

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode(
            $data,
            JSON_UNESCAPED_UNICODE |
            JSON_UNESCAPED_SLASHES |
            JSON_THROW_ON_ERROR
        );

        exit;
    }

    protected function redirect(
        string $url,
        int $status = 302
    ): void {
        header('Location: ' . $url, true, $status);
        exit;
    }

    protected function model(string $model): object
{
    $modelClass = '\\App\\Models\\' . $model;

    if (!class_exists($modelClass)) {
        throw new \RuntimeException(
            "Model não encontrada: $model"
        );
    }

    return new $modelClass();
}
}
