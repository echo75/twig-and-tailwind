<?php
    session_start();

    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    require_once __DIR__ . '/../vendor/autoload.php';

    $router = new AltoRouter();
    $router->setBasePath('/twig-and-tailwind/public');

    // Twig
    $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../views');
    $twig = new \Twig\Environment($loader);

// Routen erstellen
    $router->map('GET', '/', '../controller/register.php', 'register');
    $router->map('POST', '/answer', '../controller/answer.php', 'answer');
    $router->map('GET', '/home', '../controller/home.php', 'home');
    $router->map('GET', '/contact', '../controller/contact.php', 'contact');
    $router->map('GET', '/page1', '../controller/page1.php', 'page1');

    // haben wir einen Treffer
    $match = $router->match();

    if ( $match ) {
        require $match['target'];
    } else {
        require '404.html';
    }

