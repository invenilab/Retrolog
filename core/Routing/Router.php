<?php

declare(strict_types=1);

namespace RetroCore\Routing;

use RetroCore\Http\Request;
use RetroCore\Http\Response;

final class Router
{
    private array $routes = [];

    public function get(string $path, callable|array $handler, array $middleware = []): self
    {
        return $this->add('GET', $path, $handler, $middleware);
    }

    public function post(string $path, callable|array $handler, array $middleware = []): self
    {
        return $this->add('POST', $path, $handler, $middleware);
    }

    public function add(string $method, string $path, callable|array $handler, array $middleware = []): self
    {
        $this->routes[] = [
            'method' => strtoupper($method),
            'path' => '/' . trim($path, '/'),
            'handler' => $handler,
            'middleware' => $middleware,
        ];

        return $this;
    }

    public function dispatch(Request $request): Response
    {
        foreach ($this->routes as $route) {
            if ($route['method'] === $request->method() && $route['path'] === $request->path()) {
                foreach ($route['middleware'] as $middleware) {
                    $result = (new $middleware())->handle($request);
                    if ($result instanceof Response) {
                        return $result;
                    }
                }

                return $this->execute($route['handler'], $request);
            }
        }

        return Response::html(view('errors/404', ['path' => $request->path()]), 404);
    }

    private function execute(callable|array $handler, Request $request): Response
    {
        if (is_array($handler)) {
            [$class, $method] = $handler;
            return (new $class())->{$method}($request);
        }

        return $handler($request);
    }
}
