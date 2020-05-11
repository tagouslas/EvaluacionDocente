<?php 
require_once 'controllers/errors.php';

class App
{
    function __construct()
    {
        // echo '<p>A new app has created.</p>';
        $url = isset($_GET['url']) ? $_GET['url']:null;
        $url = rtrim($url,'/');
        $url = explode('/', $url);

        // Cuando se ingresa sin definir controlador
        if(empty($url[0])){
            $fileController = 'controllers/main.php';
            require_once $fileController;
            $controller = new Main();
            $controller->loadModel('main');
            $controller->render();
            return false;
        }

        $fileController = 'controllers/'.$url[0].'.php';
        

        if(file_exists($fileController)){
            require_once $fileController;

            // Inicializar controlador
            $controller = new $url[0];
            $controller->loadModel($url[0]);
             
            // Si hay un método que se requiere cargar
            if (isset($url[1])) {
                $controller->{$url[1]}();
            }else{
                $controller->render();
            }
        }else{
            $controller = new Errors('error');
        }         
    }
}
?>