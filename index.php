<?php
require_once __DIR__ . '/vendor/autoload.php';
use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;
use controllers\MainController;




$loader = new FilesystemLoader(__DIR__ . '/views');


$twig = new Environment($loader, [
    'debug' => true,
]);


$twig->addExtension(new DebugExtension());

$controller = new MainController($twig);
$controller->index();

?>





