<?php
    //controllers array
    $controllers = array(
        'pages'=>['home', 'error', 'create', 'update', 'read', 'delete'],
        'login'=>['login', 'signup', 'logout']
    );

    // if parameter of url invalid -> call error page
    if(!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])){
        $controller = 'pages';
        $action = 'error';
    }

    include_once 'controllers/'.$controller.'_controller.php';

    $nameClass = str_replace('_', '', ucwords($controller, '_')).'Controller';
    $controller = new $nameClass;
    $controller->$action();

?>