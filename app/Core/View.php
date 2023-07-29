<?php

namespace App\Core;

class View
{
    /**
     * @param $viewName
     * @param $data
     * @return void
     */
    public function render($viewName, $data = [])
    {
        $viewFile = '../app/Views/' . $viewName . '.php';

        if (file_exists($viewFile)) {
            extract($data);
            ob_start();
            include($viewFile);
            ob_end_flush();
        } else {
            // Handle view not found
            echo 'View not found: ' . $viewName;
        }
    }
}
