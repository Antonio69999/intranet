<?php
session_start();

// Include the autoload file
require_once './config/autoload.php';

// Récupérer les paramètres GET
$controller = $_GET['controller'] ?? 'home';
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

// Construire le nom de la classe du contrôleur
$controllerClass = ucfirst($controller) . 'Controller';

// Vérifier si la classe du contrôleur existe
if (class_exists($controllerClass)) {
    $controllerInstance = new $controllerClass();

    // Vérifier si l'action existe dans le contrôleur
    if (method_exists($controllerInstance, $action)) {
        $controllerInstance->$action($id);
    } else {
        echo "Action not found";
    }
} else {
    echo "Controller not found";
}
