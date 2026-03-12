<?php
session_start();

// ini_set('display_errors', 1);
// error_reporting(E_ALL);

require_once __DIR__ . '/../vendor/autoload.php';

$router = new AltoRouter();
// Automatisch den Base Path ermitteln
$basePath = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
$router->setBasePath($basePath);

// Twig
$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../views');
$twig = new \Twig\Environment($loader);

// Routen erstellen
$router->map('GET', '/', __DIR__ . '/../controller/register.php', 'register');
$router->map('POST', '/answer', __DIR__ . '/../controller/answer.php', 'answer');
$router->map('GET', '/home', __DIR__ . '/../controller/home.php', 'home');
$router->map('GET', '/contact', __DIR__ . '/../controller/contact.php', 'contact');
$router->map('GET', '/page', __DIR__ . '/../controller/page.php', 'page');

// haben wir einen Treffer
$match = $router->match();

if ($match) {
    require $match['target'];
} else {
    http_response_code(404);
    require __DIR__ . '/404.html';
}
