<?php
namespace task_manager\Views;

class View {

    public static function render($view, $data=[]) {
        $filePath = __DIR__ . '/../Views/' . $view . '.view.php';
        if (!file_exists($filePath)) {
            throw new \Exception('View не найдено.');
        }
        if (!empty($data)) {
            foreach ($data as $key => $value) {
                $$key = $value;
            }
        }

        require $filePath;
    }
}