<?php
    $pagetitel = 'Anmelden';
    $_SESSION['vorname'] = '';
    $_SESSION['name'] = '';

    $template = $twig->load('register.twig');
    echo $template->render(array(
    'pagetitel' => $pagetitel
));