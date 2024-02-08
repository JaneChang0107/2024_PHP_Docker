<?php
// index.php (Front Controller)

// Example of basic routing logic
$controllerName = $_GET['controller'] ?? 'EmployeesController';
$action = $_GET['action'] ?? 'index';

// Include the appropriate controller file
require_once 'controllers/' . $controllerName . '.php';

// Create an instance of the controller and call the action method
$controller = new $controllerName();
$controller->$action();
?>

