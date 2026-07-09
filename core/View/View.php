<?php

declare(strict_types=1);

namespace RetroCore\View;

final class View
{
    public function __construct(private readonly string $viewPath) {}

    public function render(string $template, array $data = [], ?string $layout = null): string
    {
        $content = $this->renderFile($template, $data);

        if ($layout !== null) {
            return $this->renderFile($layout, array_merge($data, ['content' => $content]));
        }

        return $content;
    }

    private function renderFile(string $template, array $data): string
    {
        $file = $this->viewPath . '/' . ltrim($template, '/') . '.php';

        if (! is_file($file)) {
            throw new \RuntimeException('View not found: ' . $template);
        }

        extract($data, EXTR_SKIP);

        ob_start();
        require $file;

        return (string) ob_get_clean();
    }
}
